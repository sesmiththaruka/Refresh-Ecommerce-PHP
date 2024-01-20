function goToSingleProductView(id) {
    // alert(id);
    window.location = "singleProductView.php?id=" + id;
}

//////////////////GO TO Cart///////////////////////////////////////////

function gotocart() {
    window.location = "cart.php";
}
///////////////////////////SIGN OUT//////////////////////////////////////////////////////
function signout() {
    // alert("Ok");
    swal({
            title: "Are you sure?",
            text: "Log Out",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                var r = new XMLHttpRequest();

                r.onreadystatechange = function() {
                    if (r.readyState == 4) {
                        var text = r.responseText;

                        if (text == "success") {
                            window.location = "index.php";
                        }
                    }
                };

                r.open("GET", "signout.php", true);
                r.send();
            } else {

            }
        });
    //////////////////////////


}

///////////addToCart//////////////

function addToCart(id) {
    var qtytxt = document.getElementById("qtyinput").value;
    var pid = id;
    var size = document.getElementById("sizeSelect").value;

    // alert(pid);
    // alert(qtytxt);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            if (text == "success") {
                window.location = "cart.php";
            } else {
                swal(text);
            }
        }
    };

    r.open(
        "GET",
        "addToCartProcess.php?id=" + pid + "&txt=" + qtytxt + "&s=" + size,
        true
    );
    r.send();
}

///////////////////////////deletefromcart////////////////////////////////////////////

function deletefromcart(id) {
    var cid = id;
    // alert(cid);
    //////////////////////
    swal({
            title: "Are you sure?",
            text: "Delete from cart",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                ////////////////////////
                var r = new XMLHttpRequest();
                r.onreadystatechange = function() {
                    if (r.readyState == 4) {
                        var t = r.responseText;
                        // alert(t);

                        if (t == "success") {
                            window.location = "cart.php";
                        }
                    }
                };
                r.open("GET", "deleteFromCartProcess.php?id=" + cid, true);
                r.send();
                ////////////////////////
            } else {

            }
        });


    ///////////////////////

}

///////////////////////////////CART CHECKOUT/////////////////////////////////////////////////////

function checkout() {
    var email = document.getElementById("myemail").value;
    var mobile = document.getElementById("mymobile").value;
    var fname = document.getElementById("myfname").value;
    var lname = document.getElementById("mylname").value;
    var adl1 = document.getElementById("myaddress1").value;
    var adl2 = document.getElementById("myaddress2").value;
    var city = document.getElementById("mycity").value;
    var district = document.getElementById("mydistrict").value;


    // alert(email);
    // alert(mobile);
    // alert(fname);
    // alert(lname);
    // alert(adl1);
    // alert(adl2);
    // alert(city);
    // alert(district);


    // alert(email.value);
    // alert(mobile.value);
    // alert(name.value);
    // alert(adl1.value);
    // alert(adl2.value);
    // alert(city.value);
    // alert(district.value);
    // alert(province.value);
    // alert(zip.value);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            // alert(t);
            var obj = JSON.parse(t);

            var mail = obj["email"];
            var amount = obj["amount"];

            if (t == "1") {
                alert("Please sign in first");
                window.location = "index.php";
            } else if (t == "2") {
                alert("Please Update your profile first");
                window.location = "userprofile.php";
            } else if (t == "3") {
                // alert("Please Fill all field");
                swal("Oops", "Something went wrong! Please Fil All Field", "error")
            } else {
                // Called when user completed the payment. It can be a successful payment or failure
                payhere.onCompleted = function onCompleted(orderId) {
                    console.log("Payment completed. OrderID:" + orderId);
                    saveInvoice(
                        orderId,
                        email,
                        mobile,
                        fname,
                        lname,
                        adl1,
                        adl2,
                        district,
                        city
                    );

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
                    return_url: "http://localhost/eShop/singleproductview.php", // Important
                    cancel_url: "http://localhost/eShop/singleproductview.php", // Important
                    notify_url: "http://sample.com/notify",
                    order_id: obj["id"],
                    items: obj["item"],
                    amount: obj["amount"],
                    currency: "LKR",
                    first_name: obj["fname"],
                    last_name: obj["lname"],
                    email: mail,
                    phone: obj["mobile"],
                    address: "galle",
                    city: obj["city"],
                    country: "Sri Lanka",
                    delivery_address: "144",
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
    // r.open("GET", "checkoutProcess.php?c=" + city, true);
    r.open("GET", "checkoutProcess.php?c=" + city + "&e=" + email + "&m=" + mobile + "&fn=" + fname + "&ln=" + lname + "&adl1=" + adl1 + "&adl2=" + adl2, true);

    r.send();

}

// saveInvoice(orderId, id, mail, amount)

function saveInvoice(orderId) {
    alert("ok");
}

function saveInvoice(
    orderId,
    email,
    mobile,
    fname,
    lname,
    adl1,
    adl2,
    district,
    city
) {
    // alert("ok");
    var orderid = orderId;
    var demail = email; //delever ge email eka
    var dmobile = mobile;
    var dfname = fname;
    var dlname = lname;
    var dadl1 = adl1;
    var dadl2 = adl2;
    var ddistrict = district;

    var dcity = city;
    // var total = amount;

    var f = new FormData();
    f.append("oid", orderid);
    f.append("de", demail);
    f.append("dm", dmobile);
    f.append("dfn", dfname);
    f.append("dln", dlname);
    f.append("dal1", dadl1);
    f.append("dal2", dadl2);
    f.append("dal2", dadl2);
    f.append("dd", ddistrict);

    f.append("dc", dcity);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            // alert(t);

            if (t == "1") {
                window.location = "invoice.php?id=" + orderid;
            }
        }
    };
    r.open("POST", "saveinvoice.php", true);
    r.send(f);
}

//////////////////addres pop up ///////////////////////////////////
var k;

function address() {


    // alert(id);

    var feedmodel = document.getElementById("addressModal");
    k = new bootstrap.Modal(feedmodel);
    k.show();
}

/////////////////////addmydetails();////////////////////

function addmydetails() {
    // alert("ok");
    var check = document.getElementById("AddMyDetails").checked;
    // alert(check);

    if (check == true) {
        // alert("sss");
        var r = new XMLHttpRequest();
        r.onreadystatechange = function() {
            if (r.readyState == 4) {
                var text = r.responseText;
                // alert(text);
                var add_details = document.getElementById("add_details");
                add_details.innerHTML = text;
            }
        };
        r.open("GET", "fill_address.php", true);
        r.send();
    } else {
        var r = new XMLHttpRequest();
        r.onreadystatechange = function() {
            if (r.readyState == 4) {
                var text = r.responseText;
                // alert(text);
                var add_details = document.getElementById("add_details");
                add_details.innerHTML = text;
            }
        };
        r.open("GET", "clear_address.php", true);
        r.send();
    }
}

////////////////////search////////////////////////////

function Search() {
    var input = document.getElementById("search").value;
    // alert(input);

    var f = new FormData();
    f.append("v", input);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            var view = document.getElementById("view");
            view.innerHTML = t;
        }
    };
    r.open("POST", "search.php", true);
    r.send(f);
}

///////////////////////////price slider/////////////////////

var lowerSlider = document.querySelector("#lower");
var upperSlider = document.querySelector("#upper");

document.querySelector("#two").value = upperSlider.value;
document.querySelector("#one").value = lowerSlider.value;

var lowerVal = parseInt(lowerSlider.value);
var upperVal = parseInt(upperSlider.value);

upperSlider.oninput = function() {
    lowerVal = parseInt(lowerSlider.value);
    upperVal = parseInt(upperSlider.value);

    if (upperVal < lowerVal + 4) {
        lowerSlider.value = upperVal - 4;
        if (lowerVal == lowerSlider.min) {
            upperSlider.value = 4;
        }
    }
    document.querySelector("#two").value = this.value;
};

lowerSlider.oninput = function() {
    lowerVal = parseInt(lowerSlider.value);
    upperVal = parseInt(upperSlider.value);
    if (lowerVal > upperVal - 4) {
        upperSlider.value = lowerVal + 4;
        if (upperVal == upperSlider.max) {
            lowerSlider.value = parseInt(upperSlider.max) - 4;
        }
    }
    document.querySelector("#one").value = this.value;
};

///////////////////////

function filterPrice(id) {
    var one = document.getElementById("one").value;
    var two = document.getElementById("two").value;
    var search = document.getElementById("search").value;
    /////////////
    var meal1 = document.getElementById("meal" + 0);
    var meal2 = document.getElementById("meal" + 1);
    var meal3 = document.getElementById("meal" + 2);
    //////////
    var meal = "0";
    ///////
    if (meal1.checked) {
        meal = meal1.value;
    } else if (meal2.checked) {
        meal = meal2.value;
    } else if (meal3.checked) {
        meal = meal3.value;
    }

    ///////
    var veg = "0";
    var con = document.getElementById("veg");
    if (con.checked) {
        veg = con.value;
    }
    ///////

    var cat_id = id;

    // alert(one);
    // alert(two);
    // alert(search);

    var f = new FormData();
    f.append("o", one);
    f.append("t", two);
    f.append("i", cat_id);
    f.append("s", search);
    f.append("m", meal);
    f.append("v", veg);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            // alert(t);
            var loadProduct = document.getElementById("loadProduct");
            loadProduct.innerHTML = t;
        }
    };

    r.open("POST", "sorting.php", true);
    r.send(f);
}

///////////////////////QTY UPDATE IN CART//////////////////////////////////

function qtyupdate_in_cart(id) {
    var qty = document.getElementById("qty" + id).value;

    // alert(id);
    // alert(qty);

    var f = new FormData();
    f.append("cid", id);
    f.append("qty", qty);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            // alert(t);
            if (t == "Maximum quantity count has been achieved") {
                swal("Maximum quantity count has been achieved");
            } else {
                var addbutton = document.getElementById("addbutton");
                addbutton.innerHTML = t;
            }
        }
    };
    r.open("POST", "qtyUpdateInCart.php", true);
    r.send(f);
}

function refreshcart() {
    window.location = "cart.php";
}


function success() {

    swal("Good job!", "You clicked the button!", "success");
}

function printDiv() {
    // var divContents = document.getElementById("GFG").innerHTML;
    // var a = window.open('', '', 'height=500, width=500');
    // a.document.write('<html>');
    // a.document.write('<body > <h1>Div contents are <br>');
    // a.document.write(divContents);
    // a.document.write('</body></html>');
    // a.document.close();
    // a.print();

    var restorepage = document.body.innerHTML;
    var page = document.getElementById("GFG").innerHTML;
    document.body.innerHTML = page;
    window.print();
    document.body.innerHTML = restorepage;
}

var k;

function addFeedback(id) {


    var feedmodel = document.getElementById("feedbackModel" + id);
    k = new bootstrap.Modal(feedmodel);
    k.show();
}

function saveFeedback(id) {
    // alert(id);
    var pid = id;
    var feedtext = document.getElementById("feedtext").value;

    var f = new FormData();
    f.append("i", pid);
    f.append("ft", feedtext);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            // alert(text);
            if (text == "1") {
                k.hide();
            }
        }
    };
    r.open("POST", "saveFeedBackProcess.php", true);
    r.send(f);
}



function sendmessage(email) {

    var email = email;

    var msgtxt = document.getElementById("msgtxt").value;

    var f = new FormData();

    f.append("t", msgtxt);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "success") {

                var msgtxtcl = document.getElementById("msgtxt")
                msgtxtcl.value = " ";
                refreshmsgare();
                $.getscript("admin/admin.js", function() {
                    loadmsges(email);
                });

            } else {
                alert(t);
            }
        }
    }

    r.open("POST", "sendmessageprocess.php", true);
    r.send(f);

}

// refresher

function refresher() {
    // alert(email);
    // refreshmsgare();
    setInterval(refreshmsgare, 500);
}

// refresh msg view area

function refreshmsgare() {
    var chatrow = document.getElementById("chatrow");
    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            chatrow.innerHTML = t;

        }
    }

    r.open("POST", "refreshmsgareaprocess.php", true);
    r.send();

}

// refreshrecentarea

// function refreshrecentarea() {

//     // alert("ok");
//     var rcv = document.getElementById("rcv");

//     var r = new XMLHttpRequest();

//     r.onreadystatechange = function() {
//         if (r.readyState == 4) {
//             var t = r.responseText;
//             rcv.innerHTML = t;
//         }
//     }

//     r.open("POST", "refreshrecentareaprocess.php", true);
//     r.send();

// }

function clearFilters(id) {
    window.location = "product_view.php?id=" + id;
}

function addToWatchList(id) {
    // alert(id);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            // alert(t);
            swal(t);

        }
    };

    r.open("GET", "saveWatchList.php?id=" + id, true);
    r.send();
}

function deletefromwatchlist(id) {
    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            // alert(t);
            swal(t);
            window.location = "watchlist.php";
        }
    }
    r.open("GET", "deleteFromwl.php?id=" + id, true);
    r.send();
}