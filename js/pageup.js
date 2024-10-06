// JavaScript code for scrolling to the top of the page
function scrollToTop() {
    window.scrollTo({
        top: 0,
        behavior: "smooth"  // Smooth scrolling
    });
}

// Show the button when scrolling down 20px from the top
window.onscroll = function() { scrollFunction() };

function scrollFunction() {
    var btn = document.getElementById("pageUpBtn");
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        btn.style.display = "block";
    } else {
        btn.style.display = "none";
    }
}


// JavaScript to hide the preloader when the page is fully loaded
window.addEventListener('load', function() {
    var preloader = document.getElementById('preloader');
    var content = document.getElementById('content');
    preloader.style.display = 'none'; // Hide the preloader
    content.style.display = 'block'; // Show the content
});