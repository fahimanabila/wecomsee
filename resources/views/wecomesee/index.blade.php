<?php $css = 'style-ed.css'; ?>
@extends('wecomesee_layout.master')
@section('content')
    <section id="beranda" class="sec hero container">
        <div class="text-hero">
            <p></p>
            <p></p>
            <a href="{{url('filter')}}"><button class="btn-explore">Explore the wonderful Semarang!</button></a>

            <h1>Liburan & nikmati
                <font color="#4475F2">tempat baru</font> di
                Semarang </h1>
            <p>WeComeSee membuat kamu selalu update terkait tempat liburan baru di Semarang dengan mengikuti perkembangan para influencer di sosial media ✨</p>
            
            <a href="{{url('filter')}}"><button class="btn-cta">Mulai sekarang <i class="fas fa-arrow-right"></i></button></a>
        </div>
    </section>
    @include('wecomesee_partial/kecamatan')
    <section id="about" class="sec definition container">
        <div class="text-definition">
            <p style="
            font-weight: 800;
            font-size: 18px;
            color: #238AED;
            margin-top:125px;
            letter-spacing: 5px;
            ">KOTA SEMARANG</p>
            <h2>Semarang - Venetie Van Java</h2>
            
            <p>Ketika berbicara tentang wisata di Jawa Tengah, Solo dan Yogyakarta mungkin jauh lebih populer di kalangan banyak wisatawan. 
                Namun ternyata, ada banyak juga lho tempat wisata Semarang yang menarik untuk dikunjungi. 
                Dari taman bermain terbesar di Jawa Tengah, sampai tempat wisata alam nan Instagramable, semuanya ada di Semarang.<br/><br/>
                Tertarik liburan ke Semarang? WeComeSee sudah mengumpulkan tempat - tempat wisata di Semarang yang bisa kamu kunjungi. 
                Berapapun usia, anggaran liburan, maupun kegemaran Anda, selalu akan ada sesuatu yang menyenangkan untuk dijelajahi dan dinikmati oleh semua kalangan.</p>
        </div>
    </section>
    @include('wecomesee_partial/destinasi')
    <section id="fitur" style="margin-top:250px;" class="sec" style="background: linear-gradient(180deg, rgba(236, 240, 253, 0) 0%, rgba(236, 240, 253, 0.53) 14.32%, #ECF0FD 45.83%, #238AED4d 84.33%, rgba(236, 240, 253, 0) 100%);">
        <div class="icon container">
            <div class="icon-list">
                <div class="icon-head">
                    <p style="
                        font-weight: 800;
                        font-size: 18px;
                        color: #238AED;
                        margin-top:125px;
                        letter-spacing: 5px;
                        ">CARI TEMPAT WISATA</p>
                    <h2>🗺️ Cari Tempat Wisata Didekatmu</h2>
                    <p>Fitur ini memungkinkan kamu untuk mencari tempat wisata atau tempat yang sedang populer di daerah kamu dengan begitu kamu akan selalu update dan gak kudet lagi 👍🏻</p>
                </div>
                <div style="text-align: center;background-color: transparent;margin-bottom:0px;padding-bottom:0px;margin-top:0px;" class="icon-item">
                    <img onclick='window.open("https://www.google.com/maps/search/wisata+near+Kota+Semarang,+Semarang+City,+Central+Java,+Indonesia/@-6.9837522,110.4310591,13z/data=!3m1!4b1?entry=ttu")' class="upgrade-img" src="{{asset('ww')}}/img/wecomesee-maps.svg">
                </div> 
                <div class="icon-item" style="width:400px;background-color:transparent;display:flex;">
                    <img style="width: 50px;height: 50px;margin-right:20px;" src="{{asset('ww')}}/img/icon1.png">
                    <span>
                        <h2>Populer di dekatmu</h2>
                        <p style="margin:0px;">Tempat pariwisata yang populer dan pasti dikenal semua orang didekatmu</p>
                    </span>
                </div>
                <div class="icon-item" style="width:400px;background-color:transparent;display:flex;">
                    <img style="width: 50px;height: 50px;margin-right:20px;" src="{{asset('ww')}}/img/icon2.png">
                    <span>
                        <h2>Favorite di dekatmu</h2>
                        <p style="margin:0px;">Tempat favorit dan disukai semua orang orang di sekitar daerah kamu</p>
                    </span>
                </div>
                <div class="icon-item" style="width:400px;background-color:transparent;display:flex;">
                    <img style="width: 50px;height: 50px;margin-right:20px;" src="{{asset('ww')}}/img/icon3.png">
                    <span>
                        <h2>Ramai di dekatmu </h2>
                        <p style="margin:0px;">Spot yang paling ramai dikunjungi para warga sekaligus para wisatawan</p>
                    </span>
                </div>
            </div>
        </div>
    </section>

    <section id="cta" style="margin-top:100px;" class="sec" style="background: linear-gradient(180deg, rgba(236, 240, 253, 0) 0%, rgba(236, 240, 253, 0.53) 14.32%, #ECF0FD 45.83%, #238AED4d 84.33%, rgba(236, 240, 253, 0) 100%);">
        <div class="icon container">
            <div class="icon-list">
                <div style="text-align: center;background-color: transparent;margin-bottom:0px;padding-bottom:0px;margin-top:0px;" class="icon-item">
                    <img onclick="location.replace('https://wecomesee.my.id/filter')" style="width: 1200px" src="{{asset('ww')}}/img/wecomesee-cta.svg">
                </div> 
            </div>
        </div>
    </section>
    @include('wecomesee_partial/penawaran')
    <section id="translate">
        
    <div id="google_translate_element"></div>

    <script type="text/javascript">
    function googleTranslateElementInit() {
    new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
    }
    </script>

    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
    </section>
@endsection