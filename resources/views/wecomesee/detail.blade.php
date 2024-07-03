<?php $css = 'style-fl.css'; ?>
@extends('wecomesee_layout.master')
@section('content')
    <section id="blog" class="works container" style="width:100%;height:100%">
        <div class="works-list">
            <input type="hidden" id="id_destinasi" value="{{ $id }}">
            @include('wecomesee_partial/detail_gambar')
            <div class="works-item" style="width: 25%;margin-bottom:50px">
                <span style="display: flex;align-items: center;border-bottom: 1px solid #D9D9D9;padding-bottom:15px;">
                    <h4>Rekomendasi</h4>
                    <a style="margin-left: 40%;" href="{{url('filter')}}">Kembali <i class="fas fa-chevron-right"></i></a>
                </span>
                @include('wecomesee_partial/detail_rekomendasi')
                @include('wecomesee_partial/detail_penawaran')
            </div>
        </div>
    </section>

    <section id="about" class="definition container">
        <div class="text-definition">
            <h2 id="detail-judul"></h2>
            
            <p id="detail-deskripsi"></p>

            <p id="detail-alamat" style="color: #14183E;
            font-weight: 600;
            font-family: 'Plus Jakarta Sans';
            font-size: 16px;"></p>

            <p id="detail-harga" style="color: #238AED;
            font-weight: 800;
            font-family: 'Plus Jakarta Sans';
            font-size: 16px;"></p>

            <h2 style="font-size: 35px;">Lokasi</h2>
            <div id="detail-maps"></div>
            
            <h2 style="font-size: 35px;">Bagikan</h2>
            <div>

            <a rel="nofollow" href="https://www.facebook.com/sharer/sharer.php?u=https://wecomesee.my.id/detail/{{ $id }}" onclick="return fbs_click()" target="_blank" class="fa fa-facebook"></a>
            <a target="_blank" href="http://twitter.com/share?text=Hi+Saya+berbagi+informasi+luar+biasa+di+Twitter!%0A&url=https://wecomesee.my.id/detail/{{ $id }}%0A%0A&hashtags=wecomesee,wonderfulindonesia,startup" class="fa fa-twitter"></a>
            <a target="_blank" href="mailto:info@example.com?&subject=&cc=&bcc=&body=https://wecomesee.my.id/detail/{{ $id }}%0AHi!%20Saya%20berbagi%20hal%20yang%20luar%20biasa%20kepada%20Anda.%20Mari%20berkunjung!" class="fa fa-google"></a>
            <a target="_blank" href="https://www.linkedin.com/shareArticle?mini=true&url=https://wecomesee.my.id/detail/{{ $id }}" class="fa fa-linkedin"></a>
            <a target="_blank" href="https://pinterest.com/pin/create/button/?url=https://wecomesee.my.id/detail/{{ $id }}&media=&description=Hi!%20Saya%20berbagi%20hal%20yang%20luar%20biasa%20kepada%20Anda%20di%20Pinterest.%20Mari%20berkunjung!" class="fa fa-pinterest"></a>
            <a target="_blank" href="https://web.whatsapp.com/send?text=Hi!+Saya+ingin+membagikan+link+menarik+untuk+Anda+kunjungi%0AYuk+kunjungi+https://wecomesee.my.id/detail/{{ $id }}" class="fa fa-whatsapp"></a>
            <!-- <a onclick="copyLink()" class="fa fa-flickr"></a> -->
            </div>

            <h2 style="font-size: 35px;">Diskusi</h2>

            <div class="fb-comments" data-lazy="true" data-href="https://fahimanabila.com/wecomesee/detail.html" data-mobile="true" data-numposts="10" data-width="600" data-colorscheme="light"></div>
        </div>
    </section>
    <script>
         function copyLink() {
            // Get the text field
            var copyText = window.location.href;

            // Select the text field
            copyText.select();
            copyText.setSelectionRange(0, 99999); // For mobile devices

            // Copy the text inside the text field
            navigator.clipboard.writeText(copyText.value);

            // Alert the copied text
            alert("Copied the text: " + copyText.value);
            }
    </script>
    <script>
    function fbs_click() {
        u=location.href;t=document.title;
        window.open('http://www.facebook.com/sharer.php?u='+encodeURIComponent(u)+'&t='+encodeURIComponent(t),'sharer','toolbar=0,status=0,width=626,height=436');
        return false;
    }
    </script>
@endsection