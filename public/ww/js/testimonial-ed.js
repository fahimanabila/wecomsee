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


    (function() {
    // Bind Click event to the drop down navigation button
    document.querySelector('.nav-button').addEventListener('click', function() {
        /*  Toggle the CSS closed class which reduces the height of the UL thus 
            hiding all LI apart from the first */
        this.parentNode.parentNode.classList.toggle('closed')
    }, false);
    })();

    function myFunction() {
        document.getElementById("myDropdown").classList.toggle("show");
    }

    function myFunction2() {
        document.getElementById("myDropdown2").classList.toggle("show");
    }

    // Close the dropdown if the user clicks outside of it
    window.onclick = function(event) {
       document.getElementsByClassName("dropdown-content").removeClass("show");
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