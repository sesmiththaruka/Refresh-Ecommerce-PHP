function loadAddProduct() {
    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            var addContent = document.getElementById("addContent");
            addContent.innerHTML = t;
        }
    };
    r.open("GET", "add_product.php", true);
    r.send();
}

function loadManageCategory() {
    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            var addContent = document.getElementById("addContent");
            addContent.innerHTML = t;
        }
    };
    r.open("GET", "manage_category.php", true);
    r.send();
}

function loadManageProduct() {
    // alert("ok");
    // var r = new XMLHttpRequest();
    // r.onreadystatechange = function() {
    //     if (r.readyState == 4) {
    //         var t = r.responseText;
    //         var addContent = document.getElementById("addContent");
    //         addContent.innerHTML = t;
    //     }
    // };
    // r.open("GET", "manage_product.php", true);
    // r.send();
    window.location = "manage_product.php";
}

function loadUsers() {
    window.location = "manageUsers.php";
}

function loadDashBoard() {
    window.location = "adminpanel.php";
}

function loadManageOrder() {
    window.location = "dispatcher.php";
}

function goToSite() {
    window.location = "../index.php";
}

function ManageDelevery() {
    window.location = "manageDelevery.php";
}

function goToQty() {
    window.location = "maxQty.php";
}

function goToOrder() {
    window.location = "dispatcher.php";
}

function gotochat() {
    window.location = "chat.php";
}
var swal;

function addProduct() {
    // alert("ok");
    var category = document.getElementById("ca");
    var title = document.getElementById("ti");
    var condition;

    if (document.getElementById("veg").checked) {
        condition = 1;
    } else if (document.getElementById("non-veg").checked) {
        condition = 2;
    }
    ////////////////////

    var breakfast = "0";
    var lunch = "0";
    var dinner = "0";

    if (document.getElementById("breakfast").checked) {
        breakfast = 1;
    } else if (document.getElementById("lunch").checked) {
        lunch = 1;
    } else if (document.getElementById("lunch").checked) {
        dinner = 1;
    }

    // alert(breakfast);
    // alert(lunch);
    // alert(dinner);

    var lprice = document.getElementById("lcost");
    var rprice = document.getElementById("rcost");
    var description = document.getElementById("desc");
    var image = document.getElementById("imguploader");
    var image1 = document.getElementById("imguploader1");
    var image2 = document.getElementById("imguploader2");

    // alert(category.value);
    // alert(title.value);
    // alert(condition);
    // alert(price.value);
    // alert(description.value);
    // alert(image.value);

    var form = new FormData();
    form.append("c", category.value);
    form.append("t", title.value);
    form.append("co", condition);
    form.append("bf", breakfast);
    form.append("l", lunch);
    form.append("d", dinner);
    form.append("lp", lprice.value);
    form.append("rp", rprice.value);
    form.append("desc", description.value);
    form.append("img", image.files[0]);
    form.append("img1", image1.files[0]);
    form.append("img2", image2.files[0]);

    // form.append("img3", image3.files[0]);

    var rp = new XMLHttpRequest();
    rp.onreadystatechange = function() {
        if (rp.readyState == 4) {
            var text = rp.responseText;
            // alert(text);
            swal(text)

            if ((text == "success")) {
                var category = document.getElementById("ca");
                var title = document.getElementById("ti");
                var lprice = document.getElementById("lcost");
                var rprice = document.getElementById("rcost");
                var description = document.getElementById("desc");
                var image = document.getElementById("prev");
                var image1 = document.getElementById("prev1");
                var image2 = document.getElementById("prev2");


                category.value = "0";
                title.value = "";
                lprice.value = "";
                rprice.value = "";
                description.value = "";
                image.src = "../resources/addproductimg.svg";
                image1.src = "../resources/addproductimg.svg";
                image2.src = "../resources/addproductimg.svg";
            } else {
                // alert(text);
                // swal(text);
            }
        }
    };

    rp.open("POST", "addProductProcess.php", true);
    rp.send(form);
}

//image_preview
// function changeImg() {
//     // image1

//     var image = document.getElementById("imguploader");
//     var image1 = document.getElementById("imguploader");
//     var image2 = document.getElementById("imguploader");
//     var view = document.getElementById("prev");

//     image.onchange = function() {
//         // image eke mokak hri wenasak una gmn me anonimase function eka start wenwa
//         var file = this.files[0]; // me tiyenne img eka athula me this kiyala ganne img eka
//         var url = window.URL.createObjectURL(file); // meken krnne api gattu file ekata url ekak hadima e kiyanne ara ape imge path eka url ekak widiyta hadnwa

//         view.src = url; // klim hadagttu url eka view eke src ekata set kranwa
//     };
// }
//image_preview
function changeImg() {
    // image1

    var image = document.getElementById("imguploader");

    var view = document.getElementById("prev");

    image.onchange = function() {
        // image eke mokak hri wenasak una gmn me anonimase function eka start wenwa
        var file = this.files[0]; // me tiyenne img eka athula me this kiyala ganne img eka
        var url = window.URL.createObjectURL(file); // meken krnne api gattu file ekata url ekak hadima e kiyanne ara ape imge path eka url ekak widiyta hadnwa

        view.src = url; // klim hadagttu url eka view eke src ekata set kranwa
    };

    // image 2

    var image1 = document.getElementById("imguploader1");
    var view1 = document.getElementById("prev1");

    image1.onchange = function() {
        // image eke mokak hri wenasak una gmn me anonimase function eka start wenwa
        var file1 = this.files[0]; // me tiyenne img eka athula me this kiyala ganne img eka
        var url1 = window.URL.createObjectURL(file1); // meken krnne api gattu file ekata url ekak hadima e kiyanne ara ape imge path eka url ekak widiyta hadnwa

        view1.src = url1; // klim hadagttu url eka view eke src ekata set kranwa
    };

    // image 3

    var image2 = document.getElementById("imguploader2");
    var view2 = document.getElementById("prev2");

    image2.onchange = function() {
        // image eke mokak hri wenasak una gmn me anonimase function eka start wenwa
        var file2 = this.files[0]; // me tiyenne img eka athula me this kiyala ganne img eka
        var url2 = window.URL.createObjectURL(file2); // meken krnne api gattu file ekata url ekak hadima e kiyanne ara ape imge path eka url ekak widiyta hadnwa

        view2.src = url2; // klim hadagttu url eka view eke src ekata set kranwa
    };

    // image 4

    var image3 = document.getElementById("imguploader3");
    var view3 = document.getElementById("prev3");

    image3.onchange = function() {
        // image eke mokak hri wenasak una gmn me anonimase function eka start wenwa
        var file3 = this.files[0]; // me tiyenne img eka athula me this kiyala ganne img eka
        var url3 = window.URL.createObjectURL(file3); // meken krnne api gattu file ekata url ekak hadima e kiyanne ara ape imge path eka url ekak widiyta hadnwa

        view3.src = url3; // klim hadagttu url eka view eke src ekata set kranwa
    };
}


function changeCatImg() {
    // image1
    // alert("ok");
    var image = document.getElementById("imgCatuploader");

    var view = document.getElementById("catprev");

    image.onchange = function() {
        // image eke mokak hri wenasak una gmn me anonimase function eka start wenwa
        var file = this.files[0]; // me tiyenne img eka athula me this kiyala ganne img eka
        var url = window.URL.createObjectURL(file); // meken krnne api gattu file ekata url ekak hadima e kiyanne ara ape imge path eka url ekak widiyta hadnwa

        view.src = url; // klim hadagttu url eka view eke src ekata set kranwa
    };
}


// add new category with modal 

function addnewmodal() {

    var pop = document.getElementById("addnewmodal")

    k = new bootstrap.Modal(pop);
    k.show();
}

function savecategory() {

    var name = document.getElementById("categorytxt").value;
    var des = document.getElementById("catdesc").value;
    var image = document.getElementById("imgCatuploader");
    // alert(txt);
    // alert(name);
    // alert(des);
    // alert(image);

    var f = new FormData();
    f.append("n", name);
    f.append("d", des);
    f.append("img", image.files[0]);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            // alert(t);
            if (t == "success") {
                k.hide();
                // alert("Category saved successfully.");
                swal("Category saved successfully.");
                // window.location = "manageproduct.php";
            }
        }
    }

    r.open("POST", "addNewcategoryProcess.php", true);
    r.send(f);

}


///////////////////////////////////admin sign ////////////////////////////////////////////

// adminverification()
var k;

function adminverification() {
    // alert("ok");
    var e = document.getElementById("e").value;

    var f = new FormData();

    f.append("e", e);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "success") {
                var verificationmodal = document.getElementById("verificationmodal");
                k = new bootstrap.Modal(verificationmodal);
                k.show();
            } else {
                // alert(t);
                swal(t);
            }
        }
    };
    r.open("POST", "adminverificationprocess.php", true);
    r.send(f);
}

// verify()

function verify() {
    var verificationcode = document.getElementById("v").value;

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            if (text == "success") {
                k.hide();
                window.location = "adminpanel.php";
            } else {
                // alert(text);
                swal(text);
            }
        }
    };
    r.open("GET", "verifyprocess.php?v=" + verificationcode, true);
    r.send();
}


/////manage product ////// BLOCK PRODUCT///////////

function blockproduct(id) {
    // alert(email);

    var productid = id;
    var blockbtn = document.getElementById("blockbtn" + productid);

    var f = new FormData();
    f.append("id", productid);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            // alert(text);
            if (text == "success1") {
                // window.location = "manageUsers.php";
                blockbtn.className = "btn btn-success";
                blockbtn.innerHTML = "Unblock";
            } else if (text == "success2") {
                blockbtn.className = "btn btn-danger";
                blockbtn.innerHTML = "Block";
            }
        }
    }
    r.open("POST", "productBlockProcess.php", true);
    r.send(f);
}


//////////////manage user ////block user


function blockusers(email) {

    // alert(email);

    var mail = email;
    var blockbtn = document.getElementById("blockbtn" + mail);

    var f = new FormData();
    f.append("e", mail);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            // alert(text);
            if (text == "success1") {
                // window.location = "manageUsers.php";
                blockbtn.className = "btn btn-success";
                blockbtn.innerHTML = "Complete Order";
            } else if (text == "success2") {
                blockbtn.className = "btn btn-danger";
                blockbtn.innerHTML = "New Order";
            }
        }
    }
    r.open("POST", "userBlockProcess.php", true);
    r.send(f);
}



/////////////////////SELLING HISTORY///////////////////////////

function dailySellings() {
    // alert("ok");
    var from = document.getElementById("fromdate").value;
    var to = document.getElementById("todate").value;
    // var link = document.getElementById("historylink");

    // link.href = "ProductSellingHistory.php?f=" + from + "&t=" + to;
    // link.href = "sellinghistory.php?f=" + from + "&t=" + to;
    window.location = "sellinghistory.php?f=" + from + "&t=" + to;


}

var k;

function singleviewmodal(order_id) {
    // alert(order_id);
    window.location = "singleOrderView.php?id=" + order_id;

}

function singleProduct(id) {
    // alert(id);
    window.location = "update_product.php?id=" + id;
}

///////////////////////////change update image/////////////////////////////////

function changeUpdateImg() {
    // image1
    var image = document.getElementById("imguploader" + 0);

    var view = document.getElementById("prev" + 0);


    image.onchange = function() {
        // image eke mokak hri wenasak una gmn me anonimase function eka start wenwa
        var file = this.files[0]; // me tiyenne img eka athula me this kiyala ganne img eka
        var url = window.URL.createObjectURL(file); // meken krnne api gattu file ekata url ekak hadima e kiyanne ara ape imge path eka url ekak widiyta hadnwa

        view.src = url; // klim hadagttu url eka view eke src ekata set kranwa
    };

    // image 2

    var image1 = document.getElementById("imguploader" + 1);
    var view1 = document.getElementById("prev" + 1);

    image1.onchange = function() {
        // image eke mokak hri wenasak una gmn me anonimase function eka start wenwa
        var file1 = this.files[0]; // me tiyenne img eka athula me this kiyala ganne img eka
        var url1 = window.URL.createObjectURL(file1); // meken krnne api gattu file ekata url ekak hadima e kiyanne ara ape imge path eka url ekak widiyta hadnwa

        view1.src = url1; // klim hadagttu url eka view eke src ekata set kranwa
    };

    // image 3

    var image2 = document.getElementById("imguploader" + 2);
    var view2 = document.getElementById("prev" + 2);

    image2.onchange = function() {
        // image eke mokak hri wenasak una gmn me anonimase function eka start wenwa
        var file2 = this.files[0]; // me tiyenne img eka athula me this kiyala ganne img eka
        var url2 = window.URL.createObjectURL(file2); // meken krnne api gattu file ekata url ekak hadima e kiyanne ara ape imge path eka url ekak widiyta hadnwa

        view2.src = url2; // klim hadagttu url eka view eke src ekata set kranwa
    };


}

////////////////////////////update image////////////////////////////

function updateproduct(id) {
    // alert(id);

    var product_id = id;
    var title = document.getElementById("ti");
    var condition;

    if (document.getElementById("veg").checked) {
        condition = 1;
    } else if (document.getElementById("non-veg").checked) {
        condition = 2;
    }

    var lprice = document.getElementById("lcost");
    var rprice = document.getElementById("rcost");
    var description = document.getElementById("desc");
    var img1 = document.getElementById("imguploader" + 0);
    var img2 = document.getElementById("imguploader" + 1);
    var img3 = document.getElementById("imguploader" + 2);

    // alert(category.value);
    // alert(title.value);
    // alert(condition);
    // alert(price.value);
    // alert(description.value);
    // alert(image.value);

    var form = new FormData();
    form.append("pid", product_id);
    form.append("t", title.value);
    form.append("co", condition);
    form.append("lp", lprice.value);
    form.append("rp", rprice.value);
    form.append("desc", description.value);
    form.append("i1", img1.files[0]);
    form.append("i2", img2.files[0]);
    form.append("i3", img3.files[0]);

    // form.append("img3", image3.files[0]);

    var rp = new XMLHttpRequest();
    rp.onreadystatechange = function() {
        if (rp.readyState == 4) {
            var text = rp.responseText;
            // alert(text);
            if ((text = "success")) {
                var category = document.getElementById("ca");
                var title = document.getElementById("ti");
                var lprice = document.getElementById("lcost");
                var rprice = document.getElementById("rcost");
                var description = document.getElementById("desc");
                var image = document.getElementById("prev");
                var image1 = document.getElementById("prev1");
                var image2 = document.getElementById("prev2");


                category.value = "0";
                title.value = "";
                lprice.value = "";
                rprice.value = "";
                description.value = "";
                image.src = "../resources/addproductimg.svg";
                image1.src = "../resources/addproductimg.svg";
                image2.src = "../resources/addproductimg.svg";
            } else {
                // alert(text);
                swal(text);
            }
        }
    };

    rp.open("POST", "updateProductProcess.php", true);
    rp.send(form);

}
var f;

function updateDelevery(id) {
    // alert(id)
    var p = document.getElementById("delevery" + id)

    f = new bootstrap.Modal(p);
    f.show();
}

function uDelevery(id) {
    // alert(id);
    var p = document.getElementById("dcost" + id).value;
    // alert(p.value);
    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            // alert(text);
            if (text == "success") {
                f.hide();
                window.location = "manageDelevery.php";
            }
        }
    }
    r.open("GET", "updateDeleverycose.php?id=" + id + "&dc=" + p, true);
    r.send();
}
var c;

function addnewDelevery() {

    var p = document.getElementById("newDelevry")

    c = new bootstrap.Modal(p);
    c.show();
}

function AddNew() {
    var name = document.getElementById("name").value;
    var cost = document.getElementById("cost").value;

    var f = new FormData();
    f.append("n", name);
    f.append("c", cost);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            // alert(t);
            if (t == "success") {
                c.hide();
                window.location = "manageDelevery.php";
            }
        }
    }
    r.open("POST", "addNewDelevery.php", true);
    r.send(f);

}

function updatemaxqty() {
    var qty = document.getElementById("qty").value;
    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            // alert(t);
            swal(t);
        }
    }

    r.open("GET", "updateqty.php?qty=" + qty, true);
    r.send();


}

/////////////////////////CHAT PART/////////////////////////////////

function gotochat() {
    // alert("ok");
    window.location = "chat.php";
}

function sendmessage(mail) {
    // alert("ok");

    var email = mail;
    var msgtxt = document.getElementById("msgtxt").value;

    var f = new FormData();
    f.append("e", email);
    f.append("t", msgtxt);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "success") {

                var msgtxtcl = document.getElementById("msgtxt")
                msgtxtcl.value = " ";
                loadmsges(email);
                // alert("Message Sent Successfully");

            } else {
                // alert(t);
                swal(t);
            }
        }
    }

    r.open("POST", "sendmessageprocess.php", true);
    r.send(f);

}


// refresher

function refresher() {


    // setInterval(refreshmsgare, 500);
    // setInterval(refreshrecentarea, 900);
    refreshrecentarea();

}

// refres msg view area

// function refreshmsgare() {

//     // alert(mail);

//     var chatrow = document.getElementById("chatrow");

//     var f = new FormData();

//     var r = new XMLHttpRequest();

//     r.onreadystatechange = function() {
//         if (r.readyState == 4) {
//             var t = r.responseText;

//             chatrow.innerHTML = t;

//         }
//     }

//     r.open("POST", "refreshmsgareaprocess.php", true);
//     r.send(f);

// }

// refreshrecentarea

function refreshrecentarea() {

    // alert("ok");
    var rcv = document.getElementById("rcv");

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            rcv.innerHTML = t;
        }
    }

    r.open("POST", "refreshrecentareaprocess.php", true);
    r.send();

}
var a = 0;

//////////////load meseges/////////////////////////
function loadmsges(email) {
    // alert(email);


    clearInterval(a);
    a = setInterval(ree, 500, email);
    // ree(email);

    var chatrow = document.getElementById("chatrow");

    var f = new FormData();

    f.append("e", email);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            // alert(t);
            chatrow.innerHTML = t;

        }
    }

    r.open("POST", "refreshmsgareaprocess.php", true);
    r.send(f);


}

function ree(email) {

    var f = new FormData();
    f.append("e", email);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            var ree = document.getElementById("chatload");
            ree.innerHTML = " ";
            ree.innerHTML = t;
        }
    }
    r.open("POST", "reefresh.php", true);
    r.send(f);
}

function searchOrder(id) {
    // alert(id);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            // alert(t);
            var Load_Orders = document.getElementById("Load_Orders");
            Load_Orders.innerHTML = t;
        }
    }

    r.open("GET", "searchOrder.php?sid=" + id, true);
    r.send();

    if (id == "1") {
        /////
        document.getElementById("2").className = " order text-center border border-1 border-light col-2";
        document.getElementById("3").className = " order text-center border border-1 border-light col-2";
        document.getElementById("4").className = " order text-center border border-1 border-light col-2";
        document.getElementById("5").className = " order text-center border border-1 border-light col-2";
        document.getElementById("6").className = " order text-center border border-1 border-light col-2";
        ////

        document.getElementById("1").className = "active_order order text-center border border-1 border-light col-2";
    } else if (id == "2") {
        /////
        document.getElementById("1").className = " order text-center border border-1 border-light col-2";
        document.getElementById("3").className = " order text-center border border-1 border-light col-2";
        document.getElementById("4").className = " order text-center border border-1 border-light col-2";
        document.getElementById("5").className = " order text-center border border-1 border-light col-2";
        document.getElementById("6").className = " order text-center border border-1 border-light col-2";
        ////
        document.getElementById("2").className = "active_order order text-center border border-1 border-light col-2";

    } else if (id == "3") {
        /////
        document.getElementById("1").className = " order text-center border border-1 border-light col-2";
        document.getElementById("2").className = " order text-center border border-1 border-light col-2";
        document.getElementById("4").className = " order text-center border border-1 border-light col-2";
        document.getElementById("5").className = " order text-center border border-1 border-light col-2";
        document.getElementById("6").className = " order text-center border border-1 border-light col-2";
        ////
        document.getElementById("3").className = "active_order order text-center border border-1 border-light col-2";

    } else if (id == "4") {
        /////
        document.getElementById("1").className = " order text-center border border-1 border-light col-2";
        document.getElementById("2").className = " order text-center border border-1 border-light col-2";
        document.getElementById("3").className = " order text-center border border-1 border-light col-2";
        document.getElementById("5").className = " order text-center border border-1 border-light col-2";
        document.getElementById("6").className = " order text-center border border-1 border-light col-2";
        ////
        document.getElementById("4").className = "active_order order text-center border border-1 border-light col-2";

    } else if (id == "5") {
        /////
        document.getElementById("1").className = " order text-center border border-1 border-light col-2";
        document.getElementById("2").className = " order text-center border border-1 border-light col-2";
        document.getElementById("3").className = " order text-center border border-1 border-light col-2";
        document.getElementById("4").className = " order text-center border border-1 border-light col-2";
        document.getElementById("6").className = " order text-center border border-1 border-light col-2";
        ////
        document.getElementById("5").className = "active_order order text-center border border-1 border-light col-2";

    } else if (id == "6") {
        /////
        document.getElementById("1").className = " order text-center border border-1 border-light col-2";
        document.getElementById("2").className = " order text-center border border-1 border-light col-2";
        document.getElementById("3").className = " order text-center border border-1 border-light col-2";
        document.getElementById("4").className = " order text-center border border-1 border-light col-2";
        document.getElementById("5").className = " order text-center border border-1 border-light col-2";
        ////
        document.getElementById("6").className = "active_order order text-center border border-1 border-light col-2";

    }
}

function goToOtherDetails(oid) {
    window.location = "singleOrderView.php?id=" + oid;
}

function gotocancel(oid) {
    window.location = "CancelOrder.php?id=" + oid;
}

function gotoApprove(id) {
    // alert(id);
    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            if (r.responseText == "approve") {
                searchOrder(2);

                add_dispatcher_nav(2);

            }

        }
    }

    r.open("GET", "approveOrder.php?oid=" + id + "&idx=" + '1', true);
    r.send();
}

function process(id) {
    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            if (r.responseText == "process") {
                add_dispatcher_nav(3);
                searchOrder(3);
            }

        }
    }

    r.open("GET", "approveOrder.php?oid=" + id + "&idx=" + '2', true);
    r.send();
}

function shipped(id) {
    // alert(id);
    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            if (r.responseText == "shipped") {
                add_dispatcher_nav(4);
                searchOrder(4);
            }

        }
    }

    r.open("GET", "approveOrder.php?oid=" + id + "&idx=" + '3', true);
    r.send();
}

function complete(id) {
    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {

            if (r.responseText == "complete") {
                add_dispatcher_nav(5);

                searchOrder(5);
            }

        }
    }

    r.open("GET", "approveOrder.php?oid=" + id + "&idx=" + '4', true);
    r.send();
}


function add_dispatcher_nav(id) {
    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            var addnav = document.getElementById("addnav");
            addnav.innerHTML = " ";
            addnav.innerHTML = t;
        }
    }
    r.open("POST", "load_dispatcher_nav.php?id=" + id, true);
    r.send();
}

function SearchOrder() {
    var search = document.getElementById("search").value;
    // alert(search);
    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            var so = document.getElementById("so");
            so.innerHTML = t;
        }
    }
    r.open("GET", "so.php?s=" + search, true);
    r.send();
}


function gomuser(email) {
    // alert(email);
    window.location = "manageUserdetails.php?e=" + email;
}