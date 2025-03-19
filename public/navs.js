function togglePwdEdit() {
    if (document.getElementById("list-account").style.display == "none") {
        document.getElementById("list-account").style.display = "block";
        document.getElementById("editPassword").style.display = "none";


    } else {
        document.getElementById("list-account").style.display = "none";
        document.getElementById("editPassword").style.display = "block";

    }

}
function toggleContact() {
    if (document.getElementById("main").style.display == "none") {
        document.getElementById("main").style.display = "block";
        document.getElementById("contact").style.display = "none";


    } else {
        document.getElementById("main").style.display = "none";
        document.getElementById("contact").style.display = "block";

    }

}
function toggleProfilEdit() {
    if (document.getElementById("list-account").style.display == "none") {
        document.getElementById("list-account").style.display = "block";
        document.getElementById("profil").style.display = "none";


    } else {
        document.getElementById("list-account").style.display = "none";
        document.getElementById("profil").style.display = "block";

    }

}
function toggleOrders() {
    if (document.getElementById("list-account").style.display == "none") {
        document.getElementById("list-account").style.display = "block";
        document.getElementById("orders").style.display = "none";


    } else {
        document.getElementById("list-account").style.display = "none";
        document.getElementById("orders").style.display = "block";

    }

}
function toggleShippingInfos() {
    if (document.getElementById("list-account").style.display == "none") {
        document.getElementById("list-account").style.display = "block";
        document.getElementById("shipping").style.display = "none";


    } else {
        document.getElementById("list-account").style.display = "none";
        document.getElementById("shipping").style.display = "block";

    }

}


function openNav() {

    if (screen.width > 760) {
        document.getElementById("mySidenav").style.width = "30%";

    } else {

        document.getElementById("mySidenav").style.width = "100%";
    }

}

function openrightNav() {

    if (screen.width > 760) {
        document.getElementById("myrightSidenav").style.width = "30%";

    } else {

        document.getElementById("myrightSidenav").style.width = "100%";
    }

}


function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
}

function signin() {
    document.getElementById("sign").style.display = "block";
    document.getElementById("signup").style.display = "none";
}

function opensub() {
    document.getElementById("mainsub").style.display = "block";
    document.getElementById("main").style.display = "none";
}

function signup() {
    document.getElementById("sign").style.display = "none";
    document.getElementById("signup").style.display = "block";
}

function closesub() {
    document.getElementById("mainsub").style.display = "none";
    document.getElementById("main").style.display = "block";
}


function closerightNav() {
    document.getElementById("myrightSidenav").style.width = "0";
}


function openlogNav() {

    if (screen.width > 760) {
        document.getElementById("loginnav").style.width = "30%";

    } else {

        document.getElementById("loginnav").style.width = "100%";
    }

}

function closelogNav() {
    document.getElementById("loginnav").style.width = "0";
}
