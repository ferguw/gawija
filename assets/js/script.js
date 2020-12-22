// ==============================================================================
// -------------SWEET ALERT-----
function successInput() {
    swal({
        title: 'Success',
        text: "Successfully ....",
        icon: 'success',
        closeOnClickOutside: false
    }).then(function (next) {
        if (next) {
            window.location = "index";
        }
    });
}

// ==============================================================================
function sidebar_move(menu_link) { // Sidebar Ketika Berpindah Halaman
    var linke = menu_link;
    if (linke == 'home') {

        document.getElementById('link-top').removeAttribute('class');
        var linkTop = document.getElementById("link-top");
        linkTop.classList.add("menu-link");
        linkTop.classList.add("close-up");

        document.getElementById('link-1').removeAttribute('class');
        var link1 = document.getElementById("link-1");
        link1.classList.add("menu-link");
        link1.classList.add("active");
            
        document.getElementById('link-2').removeAttribute('class');
        var link2 = document.getElementById("link-2");
        link2.classList.add("menu-link");
        link2.classList.add("close-down");

        document.getElementById('link-3').removeAttribute('class');
        var link3 = document.getElementById("link-3");
        link3.classList.add("menu-link");
        link3.classList.add("close-all");
        
        document.getElementById('link-4').removeAttribute('class');
        var link4 = document.getElementById("link-4");
        link4.classList.add("menu-link");
        link4.classList.add("close-all");
    }else if (linke == 'job-list') {
        
        document.getElementById('link-1').removeAttribute('class');
        var link1 = document.getElementById("link-1");
        link1.classList.add("menu-link");
        link1.classList.add("close-up");
            
        document.getElementById('link-2').removeAttribute('class');
        var link2 = document.getElementById("link-2");
        link2.classList.add("menu-link");
        link2.classList.add("active");

        document.getElementById('link-3').removeAttribute('class');
        var link3 = document.getElementById("link-3");
        link3.classList.add("menu-link");
        link3.classList.add("close-down");
        
        document.getElementById('link-4').removeAttribute('class');
        var link4 = document.getElementById("link-4");
        link4.classList.add("menu-link");
        link4.classList.add("close-all");
        
    }else if (linke == 'job-tawaran') {
        
        document.getElementById('link-1').removeAttribute('class');
        var link1 = document.getElementById("link-1");
        link1.classList.add("menu-link");
        link1.classList.add("close-all");
            
        document.getElementById('link-2').removeAttribute('class');
        var link2 = document.getElementById("link-2");
        link2.classList.add("menu-link");
        link2.classList.add("close-up");

        document.getElementById('link-3').removeAttribute('class');
        var link3 = document.getElementById("link-3");
        link3.classList.add("menu-link");
        link3.classList.add("active");
        
        document.getElementById('link-4').removeAttribute('class');
        var link4 = document.getElementById("link-4");
        link4.classList.add("menu-link");
        link4.classList.add("close-down");
        
    }else if (linke == 'report') {
        
        document.getElementById('link-1').removeAttribute('class');
        var link1 = document.getElementById("link-1");
        link1.classList.add("menu-link");
        link1.classList.add("close-all");
            
        document.getElementById('link-2').removeAttribute('class');
        var link2 = document.getElementById("link-2");
        link2.classList.add("menu-link");
        link2.classList.add("close-all");

        document.getElementById('link-3').removeAttribute('class');
        var link3 = document.getElementById("link-3");
        link3.classList.add("menu-link");
        link3.classList.add("close-up");
        
        document.getElementById('link-4').removeAttribute('class');
        var link4 = document.getElementById("link-4");
        link4.classList.add("menu-link");
        link4.classList.add("active");
        link4.classList.add("bottom-link");
        
        document.getElementById('link-bottom').removeAttribute('class');
        var linkDown = document.getElementById("link-bottom");
        linkDown.classList.add("menu-link");
        linkDown.classList.add("close-down");
    }else{
        rusak()
    }
}

function sidebar() { // Menampilkan Sidebar pada Mobile
    var element = document.getElementById("sidebar");
    element.classList.add("active");
}

function sidebar_close() { //Menutup Sidebar pada Mobile
    var element = document.getElementById("sidebar");
    element.classList.remove("active");
}

function rusak() {
    swal({
        title: 'Error',
        icon: 'error'
      })
}

// -------------------------------------------------------------------------
// JQUERY
// Scroll // pada Halaman
$(window).on("scroll", function () {
    if ($(window).scrollTop() != 0) {
    $("#menu-top-mobile").addClass("scroll");
    } else {
    $("#menu-top-mobile").removeClass("scroll");
    }
});

// Sidebar Scroll
$(window).on("scroll", function () {
    if ($(window).scrollTop() != 0) {
    $("#sidebar").removeClass("active");
    }
});