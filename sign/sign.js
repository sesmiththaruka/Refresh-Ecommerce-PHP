function signin() {
    // alert("ok");
    var email = document.getElementById("email2").value;
    var password = document.getElementById("password2").value;
    var remember = document.getElementById("remember");



    var f = new FormData();
    f.append("e", email);
    f.append("p", password);
    f.append("remember", remember.checked);



    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            // alert(t);
            swal("Oops", t, "error")
            if (t == "success") {
                success();

            }
        }
    }
    r.open("POST", "signinprocess.php", true);
    r.send(f);
}

function success() {

    swal("login success")
        .then((value) => {
            window.location = "../index.php";
        });
}

function changeView() {
    // alert("ok");

    var signInBox = document.getElementById("signInBox");
    var signUpBox = document.getElementById("signUpBox");

    signInBox.classList.toggle("d-none");
    signUpBox.classList.toggle("d-none");
}



function signUp() {

    // alert("ok");

    var fname = document.getElementById("fname");
    var lname = document.getElementById("lname");
    var email = document.getElementById("email");
    var password = document.getElementById("password");
    var mobile = document.getElementById("mobile");

    // alert(fname.value);
    // alert(lname.value);
    // alert(email.value);
    // alert(password.value);
    // alert(mobile.value);

    var f = new FormData();
    f.append("fname", fname.value);
    f.append("lname", lname.value);
    f.append("email", email.value);
    f.append("password", password.value);
    f.append("mobile", mobile.value);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;

            if (text == "success") {
                fname.value = "";
                lname.value = "";
                email.value = "";
                mobile.value = "";
                password.value = "";
                document.getElementById("msg").innerHTML = "";
                swal("Registration success");
                changeView();
            } else {
                // document.getElementById("msg").innerHTML = text;
                swal("Oops", text, "error")

            }
        }
    };
    r.open("POST", "signUpProcess.php", true);
    r.send(f);
}

function showPassword1() {
    var np = document.getElementById("np");
    var npb = document.getElementById("npb");

    if (npb.innerHTML == "Show") {
        np.type = "text";
        npb.innerHTML = "Hide";
    } else {
        np.type = "password";
        npb.innerHTML = "Show";
    }
}

function showPassword2() {
    var rnp = document.getElementById("rnp");
    var rnpb = document.getElementById("rnpb");

    if (rnpb.innerHTML == "Show") {
        rnp.type = "text";
        rnpb.innerHTML = "Hide";
    } else {
        rnp.type = "password";
        rnpb.innerHTML = "Show";
    }
}

/////////////////////////////////
function forgotPassword() {
    // alert("ok");
    var email = document.getElementById("email2");

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;

            if (text == "success") {
                // alert("Verification email sent.Please check your inbox");
                swal("Verification email sent.Please check your inbox");

                var m = document.getElementById("forgetPasswordModal");
                bm = new bootstrap.Modal(m);
                bm.show();
            } else {
                // alert(text);
                swal(text);
            }
        }
    };
    r.open("GET", "forgotPasswordProcess.php?e=" + email.value, true);
    r.send();
}

//////////////////////////

function resetPassword() {
    var e = document.getElementById("email2");
    var np = document.getElementById("np");
    var rnp = document.getElementById("rnp");
    var vc = document.getElementById("vc");

    var f = new FormData();
    f.append("e", e.value);
    f.append("np", np.value);
    f.append("rnp", rnp.value);
    f.append("vc", vc.value);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;

            if (text == "Success") {
                // alert("password Reset Success");
                swal("password Reset Success");

                bm.hide();
            } else {
                // alert(text);
                swal(text);
            }
        }
    };

    r.open("POST", "resetPassword.php", true);
    r.send(f);

    // var r = new XMLHttpRequest();
    // r.onreadystatechange = function() {
    //     if (r.readyState == 4) {
    //         var text = r.responseText;
    //         alert(text);

    //         if (text == "Success") {
    //             alert("password Reset Success");
    //             bm.hide();
    //         } else {
    //             alert(text);
    //         }
    //     };
    // }

    // r.open("POST", "resetPassword.php", true);
    // r.send(f);
}