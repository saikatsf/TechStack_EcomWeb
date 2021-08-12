document.addEventListener("DOMContentLoaded", function(){
    window.addEventListener('scroll', function() {
        if (window.scrollY > 0) {
            document.getElementById('navs').classList.add('fixed-top');
            // add padding top to show content behind navbar
            navbar_height = document.querySelector('#navs').offsetHeight;
            document.body.style.paddingTop = navbar_height + 'px';


            document.getElementById('second_nav').style.background = "rgba(0, 0, 0, 0.5)";
        } else {
            document.getElementById('navs').classList.remove('fixed-top');
            // remove padding top from body
            document.body.style.paddingTop = '0';

            document.getElementById('second_nav').style.background = "rgba(0, 0, 0, 1)";
        } 
    });
});


$(document).ready(function () {

    $('#dismiss, .overlay, .sidebarSignIn').on('click', function () {
        // hide sidebar
        $('#sidebar').removeClass('active');
        // hide overlay
        $('.overlay').removeClass('active');
    });

    $('#sidebarCollapse').on('click', function () {
        // open sidebar
        $('#sidebar').addClass('active');
        // fade in the overlay
        $('.overlay').addClass('active');
        $('.collapse.in').toggleClass('in');
        $('a[aria-expanded=true]').attr('aria-expanded', 'false');
    });
});

function topFunction() {
    document.body.scrollTop = 0; // For Safari
    document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
}