<!-- Option 2: jQuery, Popper.js, and Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
</script>
<script src="../assets/bootstrap-4.5.3-dist/js/bootstrap.min.js"
    integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
    integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- JS Lokal -->
<script>
// Sidebar
sidebar_move()
function sidebar_move() {
    var linke = '<?= $p?>';
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
        alert('Taik');
    }
}

function sidebar() {
    var element = document.getElementById("sidebar");
    element.classList.add("active");
}

function sidebar_close() {
    var element = document.getElementById("sidebar");
    element.classList.remove("active");
}

// Scroll
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

</script>