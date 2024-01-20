function changeprice(id) {
    var pid = id;
    var size = document.getElementById("sizeSelect").value;
    var qtyinput = document.getElementById("qtyinput").value;
    // alert(newvalue);
    // alert(size.value);

    var prosize = "";

    if (size == 0) {
        prosize = "0";
    } else if (size == 1) {
        prosize = "1";
    } else {
        prosize = "2";
    }

    var f = new FormData();
    f.append("pid", pid);
    f.append("ps", prosize);
    f.append("qty", qtyinput);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            // alert(text);
            var pricecal = document.getElementById("pricecal");
            pricecal.innerHTML = text;
        }
    };
    r.open("POST", "singleproductviewPriceCalculate.php", true);
    r.send(f);
}

//////qty change////////////

var newPrice = "0";

function max_qty(id) {

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            qty_inc(id, t);

        }
    }
    r.open("GET", "countMaxQty.php?id=" + id, true);
    r.send();

}

function qty_inc(id, t) {
    // var pqty = qty;

    var input = document.getElementById("qtyinput");

    // if (input.value < pqty) {
    var newvalue = parseInt(input.value) + 1;

    if (newvalue > t) {
        // alert("Maximum quantity count has been achieved");
        swal("Maximum quantity count has been achieved");
    } else {
        input.value = newvalue.toString();

        // alert(newPrice);
        var size = document.getElementById("sizeSelect").value;

        var r = new XMLHttpRequest();
        r.onreadystatechange = function() {
            if (r.readyState == 4) {
                var text = r.responseText;
                // alert(text);
                var price = document.getElementById("price");
                price.innerHTML = text;
            }
        };
        r.open("GET", "calculateqty.php?s=" + size + "&nv=" + newvalue + "&id=" + id, true);
        r.send();
    }
}

function qty_dec(id) {
    var input = document.getElementById("qtyinput");

    if (input.value > 1) {
        var newvalue = parseInt(input.value) - 1;
        input.value = newvalue.toString();
        var p = document.getElementById("price").innerHTML;

        // alert(newvalue);

        var size = document.getElementById("sizeSelect").value;

        var r = new XMLHttpRequest();
        r.onreadystatechange = function() {
            if (r.readyState == 4) {
                var text = r.responseText;
                // alert(text);
                var price = document.getElementById("price");
                price.innerHTML = text;
            }
        };
        r.open("GET", "calculateqty.php?s=" + size + "&mv=" + newvalue + "&id=" + id + "&p=" + p, true);
        r.send();
    } else {
        // alert("Minimum quantity count has been achieved.");
        swal("Minimum quantity count has been achieved");
    }
}

// payment method

function paynow(id) {
    // alert(id);
    var size = document.getElementById("sizeSelect").value;
    var qty = document.getElementById("qtyinput").value;
    // alert(qty);
    if (size == 0) {
        // alert("Please select some product options before buying your product.");
        swal("Please select some product options before buying your product.");

    } else {
        var r = new XMLHttpRequest();
        r.onreadystatechange = function() {
            if (r.readyState == 4) {
                var t = r.responseText;
                swal(t);
                var obj = JSON.parse(t);

                var mail = obj["email"];
                var amount = obj["amount"];

                if (t == "1") {
                    alert("Please sign in first");
                    window.location = "index.php";
                } else if (t == "2") {
                    alert("Please Update your profile first");
                    window.location = "userprofile.php";
                } else {
                    // Called when user completed the payment. It can be a successful payment or failure
                    payhere.onCompleted = function onCompleted(orderId) {
                        console.log("Payment completed. OrderID:" + orderId);
                        // saveInvoice(orderId, id, mail, amount, qty);
                        //Note: validate the payment and show success or failure page to the customer
                    };

                    // Called when user closes the payment without completing
                    payhere.onDismissed = function onDismissed() {
                        //Note: Prompt user to pay again or show an error page
                        console.log("Payment dismissed");
                    };

                    // Called when error happens when initializing payment such as invalid parameters
                    payhere.onError = function onError(error) {
                        // Note: show an error page
                        console.log("Error:" + error);
                    };

                    // Put the payment variables here
                    var payment = {
                        sandbox: true,
                        merchant_id: "1217986", // Replace your Merchant ID
                        return_url: "http://localhost/eShop/singleproductview.php?id=" + id, // Important
                        cancel_url: "http://localhost/eShop/singleproductview.php?id=" + id, // Important
                        notify_url: "http://sample.com/notify",
                        order_id: obj["id"],
                        items: obj["item"],
                        amount: amount,
                        currency: "LKR",
                        first_name: obj["fname"],
                        last_name: obj["lname"],
                        email: mail,
                        phone: obj["mobile"],
                        address: obj["address"],
                        city: obj["city"],
                        country: "Sri Lanka",
                        delivery_address: obj["address"],
                        delivery_city: obj["city"],
                        delivery_country: "Sri Lanka",
                        custom_1: "",
                        custom_2: "",
                    };

                    // Show the payhere.js popup, when "PayHere Pay" is clicked
                    payhere.startPayment(payment);
                }
            }
        };
        r.open("GET", "buynowprocess.php?id=" + id + "&qty=" + qty + "&s=" + size, true);
        r.send();
    }
}


//modal

function address(id) {
    // alert(id);

    var feedmodel = document.getElementById("addressModal");
    k = new bootstrap.Modal(feedmodel);
    k.show();
}

////////////////////load image /////////////////////////////////////////////

function loadmainimg(id) {

    var pid = id;
    var img = document.getElementById("pimg" + pid);

    var mainimg = document.getElementById("mainimg");

    // mainimg.style.backgroundImage = "url(" + img + ")";
    mainimg.style.backgroundImage = img.style.backgroundImage;

}