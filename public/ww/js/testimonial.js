// testimonials
var $card = $('.card');
var lastCard = $(".card-list .card").length - 1;

$('.next-testi').click(function(){ 
    var prependList = function() {
        if( $('.card').hasClass('activeNow') ) {
            var $slicedCard = $('.card').slice(lastCard).removeClass('transformThis activeNow');
            $('ul').prepend($slicedCard);
        }
    }
    $('li').last().removeClass('transformPrev').addClass('transformThis').prev().addClass('activeNow');
    setTimeout(function(){prependList(); }, 150);
});

$('.prev-testi').click(function() {
    var appendToList = function() {
        if( $('.card').hasClass('activeNow') ) {
            var $slicedCard = $('.card').slice(0, 1).addClass('transformPrev');
            $('.card-list').append($slicedCard);
        }}
    
    $('li').removeClass('transformPrev').last().addClass('activeNow').prevAll().removeClass('activeNow');
    setTimeout(function(){appendToList();}, 150);
});

let currentSlide = 1;
const carousel = document.querySelector(".carousel");
const slides = document.querySelectorAll(".slide");
const images = document.querySelectorAll(".image");
const prev = document.querySelector(".prev");
const next = document.querySelector(".next");
const pagination = document.querySelector(".pagination");

const scrollIntoViewOptions = {
    behavior: "smooth",
    block: "start",
    inline: "start"
};
const observerOptions = {
    root: carousel,
    rootMargin: "0px",
    threshold: 1
};
const observer = new IntersectionObserver(handleIntersection, observerOptions);

// Observe each image.
images.forEach((div) => observer.observe(div));

/**
* Intersection handler.
*/
function handleIntersection(entries, observer) {
    // Loop over each image.
    entries.forEach((image) => {
        // If the image is viewable...
        if (image.intersectionRatio > 1) {
            // Update currentSlide.
            currentSlide = image.target.dataset.slide;
        }
    });
}

/**
* Previous navigation.
*/
prev.addEventListener("click", (e) => {
    // If on the first slide, go to the last slide.
    if (currentSlide <= 1) {
        currentSlide = slides.length + 1;
    }

    // Decrement.
    --currentSlide;

    // Get the current slide.
    const slide = document.querySelector(`[data-slide='${currentSlide}'`);

    // Use scrollIntoView() to move the carousel to the image.
    slide.scrollIntoView(scrollIntoViewOptions);
});

/**
* Next navigation.
*/
next.addEventListener("click", (e) => {
    // If we're on the last slide, go to the first slide.
    if (currentSlide >= slides.length) {
        currentSlide = 0;
    }

    // Increment.
    ++currentSlide;

    // Get the current slide.
    const slide = document.querySelector(`[data-slide='${currentSlide}'`);

    // Use scrollIntoView() to move the carousel to the image.
    slide.scrollIntoView(scrollIntoViewOptions);
});

/**
* Pagination.
*/
pagination.addEventListener("click", (e) => {
    // Get the target item.
    const target = e.target;

    // If they don't match, bail!
    if (!target.matches(".dot")) {
        return;
    }

    // Get the number of the clicked dots.
    const index = Array.from(pagination.children).indexOf(target) + 1;

    // Find the new carousel item.
    const slide = document.querySelector(`[data-slide='${index}'`);

    // Keep track in case user clicks a nav button.
    currentSlide = index;

    // Use scrollIntoView() to move the carousel to the image.
    slide.scrollIntoView(scrollIntoViewOptions);
});

function myFunction() {
document.getElementById("myDropdown").classList.toggle("show");
}
//-----------modal roles here-----------

function showRoles(){
    var modal = document.getElementById("myModal-roles");

    var btn = document.getElementById("myBtn");

    var span = document.getElementsByClassName("close-manual-roles")[0];

    modal.style.display = "block";

    span.onclick = function() {
    modal.style.display = "none";
    }

    window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
    }
}
