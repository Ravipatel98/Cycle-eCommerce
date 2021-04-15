
//setting the index to 1 for slide show
var slideIndex = 1;
var x = document.getElementsByClassName("mySlides");
x[slideIndex - 1].style.display = "block";
showDivs(slideIndex);

//plus divs function for slideshow
function plusDivs(n) {
    showDivs(slideIndex += n);
}

//show div for slideshow
function showDivs(n) {
    var i;
    if (n > x.length) {
        slideIndex = 1;
    }
    if (n < 1) {
        slideIndex = x.length;
    }
    for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
    }
    x[slideIndex - 1].style.display = "block";
}