<section id="promo" class="sec service container">
        <div class="service-list">
            <div class="service-head">
                <p style="
            font-weight: 800;
            font-size: 18px;
            color: #238AED;
            margin-top: 55px;
            letter-spacing: 5px;
            ">DESTINASI FAVORIT</p>
                <h2>✈️ Temukan Destinasi Favoritmu</h2>
            </div>
            <div class="carousel-footer">
                <a href="{{ url('filter') }}"><h2>Lihat semua <i class="fa fa-chevron-right"></i></h2></a>
            </div>
            <div class="container-test">
                <div id="carousel" class="carousel" aria-live="polite">

                    <div class="slide" aria-label="1 / 9">
                        <img src="{{asset('ww')}}/img/fig1.svg" class="image fig1" data-slide="1">
                    </div>
                    
                </div>
            
                <span onclick="scrollLft()" aria-label="Previous slide" class="nav prev" role="button"><img src="{{asset('ww')}}/img/idompet-chevron-left.svg"> </span>
                <span onclick="scrollRght()" aria-label="Next slide" class="nav next" role="button"><img src="{{asset('ww')}}/img/idompet-chevron-right.svg"></span>
            
                
            </div>
        </div>
    </section>