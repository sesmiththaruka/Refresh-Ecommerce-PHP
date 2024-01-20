function goToOrders() {
    // alert("ok");
    window.location = "orders.php";
}

function goTOaddress() {
    // alert("ok");
    var div = document.getElementById("adddiv");
    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            div.innerHTML = t;
        }
    }
    r.open("GET", "userAddress.php", true);
    r.send();
}

function GoToBilling() {
    // alert("bil");
    window.location = "GoToBilling.php";
}

function GoToShipping() {
    // alert("ship");
    window.location = "GoToShipping.php";
}

function goToDashBoard() {
    window.location = "userprofile.php";
}

function saveBilling() {
    // alert("ok");

    var fname = document.getElementById("fn").value;
    var lname = document.getElementById("ln").value;
    var mobile = document.getElementById("m").value;
    var email = document.getElementById("e").value;
    var currentPassword = document.getElementById("currentp").value;
    var newPassword = document.getElementById("newp").value;
    var confirmPassword = document.getElementById("confirmp").value;

    var f = new FormData();
    f.append("fn", fname);
    f.append("ln", lname);
    f.append("m", mobile);
    f.append("e", email);
    f.append("cup", currentPassword);
    f.append("np", newPassword);
    f.append("conp", confirmPassword);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            // alert(text);
            if (text == "success") {
                // alert("your profile updated")
                swal("your profile updated!", "You clicked the button!", "success");

            } else {
                swal(text);
            }
        }
    }
    r.open("POST", "savedetails.php", true);
    r.send(f);
}

function saveShipping() {

    var al1 = document.getElementById("al1").value;
    var al2 = document.getElementById("al2").value;
    var city = document.getElementById("city").value;

    // alert(city);

    var f = new FormData();
    f.append("al1", al1);
    f.append("al2", al2);
    f.append("c", city);


    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            // alert(t);
            if (t == "success") {
                // alert("address Updated");
                swal("address Updated!", "You clicked the button!", "success");
            } else {
                swal(t);
            }
        }
    }

    r.open("POST", "saveAddress.php", true);
    r.send(f);
}

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

function gotocart() {
    window.location = "../cart.php";
}


function gotocart() {
    window.location = "../cart.php";
}