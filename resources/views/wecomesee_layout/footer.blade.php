
<script>
        //experts slider
        const outsider = document.getElementById('carousel');
        const distance = 200;

        function scrollLft() {
                outsider.scrollBy({
                left: -distance,
                behavior: 'smooth'
            });
        }

        function scrollRght() {
                outsider.scrollBy({
                left: distance,
                behavior: 'smooth'
            });
        };
    </script>
    <script>
        var btnToggleAsk = document.querySelectorAll(".btn-toggle-ask"),
        bgBlurBody = document.querySelector(".bg-nav-mobile"),
        btnOpenNavMobile = document.querySelector(".btn-toggle-nav"),
        btnCloseNavMobile = document.querySelector(".close-nav-mobile"),
        bgBlackSeeService = document.querySelector(".bg-black-see-service"),
        btnServiceSeeAll = document.querySelector(".btn-service-see-all"),
        btnCloseModalService = document.querySelector(".btn-close-modal-service"),
        bgBlackFooter = document.querySelector(".bg-black-footer"),
        modalMenuFooter = document.querySelector(".modal-menu-footer"),
        btnOpenFooterMenuRedirect = document.querySelectorAll(".btn-open-footer-menu-redirect"),
        linkFooterRedirect = document.querySelectorAll(".link-footer-redirect")

            //nav mobile 
            btnOpenNavMobile.addEventListener('click', ()=> bgBlurBody.classList.add('bg-nav-mobile-active'))
            const closeNavMobile =()=> bgBlurBody.classList.remove('bg-nav-mobile-active')
            bgBlurBody.addEventListener('click', ()=> closeNavMobile())
            btnCloseNavMobile.addEventListener('click', ()=> closeNavMobile())

            // ask answer
            for (let btn of btnToggleAsk) {
                btn.addEventListener("click", (e)=>{
                    let getParent = e.target.parentElement
                    let paragraphAnswer = getParent.children[1]
            console.log(paragraphAnswer)
                    paragraphAnswer.classList.toggle('ask-active')
                })
            }

            for (let btns of btnOpenFooterMenuRedirect) {
                btns.addEventListener('click', (e)=> bgBlackFooter.classList.add("bg-black-footer-show"))
            }
    </script>
    <input value="1" type="hidden" id="feature">
    <script>
        

        const btnToggleAsk = document.querySelectorAll(".btn-toggle-ask")
        // ask answer
        for (let btn of btnToggleAsk) {
        btn.addEventListener("click", (e)=>{
        let getParent = e.target.parentElement
        let paragraphAnswer = getParent.children[1]
        let num = paragraphAnswer.id;
        document.getElementById("change-imgs").setAttribute("src", `img/safety${num}.png`); 
        paragraphAnswer.classList.toggle('ask-active')
        })
        }
        
        let section = document.querySelectorAll('section');
        let lists = document.querySelectorAll('.list');
        function activeLink(li) {
            lists.forEach((item) => item.classList.remove('active'));
            li.classList.add('active');
        }
        lists.forEach((item) =>
            item.addEventListener('click', function(){
                activeLink(this);
            }));

        window.onscroll = () => {
            section.forEach(sec => {
                let top = window.scrollY;
                let offset = sec.offsetTop;
                let height = sec.offsetHeight;
                let id = sec.getAttribute('id');

                if (top >= offset && top < offset + height) {
                    if (id == 'upgrade' || id == 'safety' || id == 'fitur'){
                        id = 'superapp';
                    }else{
                        id = id;
                    }
                    const target = document.querySelector(`[href='#${id}']`);
                    activeLink(target);
                }
            })
        };
    </script>

    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function(){
            const queryString = window.location.search;
            console.log(queryString);
            const urlParams = new URLSearchParams(queryString);
            const keyword_bar = urlParams.get('keyword')
            
            if (keyword_bar !== ""){
                var url = 'https://wecomesee.my.id/api/v1/destinasi/'+keyword_bar;
                console.log(url);
                $('#cari_destinasi').val(keyword_bar)
                $.ajax({
                type: 'get',
                url: url,
                success: function(result) {
                        console.log(result)
                        const arrs = result.data;
                        if (arrs.length === 0){
                            $('#filter-destinasi').html('<span>Destinasi "<b>'+keyword_bar+'</b>" tidak tersedia </span>');
                        }else{
                            $('#filter-destinasi').html('');
                            $.each(result.data, function (i, item) {
                                $('#filter-destinasi').append(`
                                <div style="background-color: #F4F5F7;
                                    width: 850px;
                                    height: 300px;
                                    margin-bottom: 30px;
                                    border-radius: 10px;">
                                        <img src="{{asset('ww')}}/img/${item.foto_sampul}" style="
                                        width: 400px;
                                        height:300px;
                                        margin:0px;
                                        border-radius:0px;
                                        object-fit: cover;
                                        border-top-left-radius: 10px;
                                        border-bottom-left-radius: 10px;">
                                        <span style="
                                        position: absolute;
                                        margin: 25px;
                                        width: 400px;">
                                        <p style="color: #14183E;
                                        font-weight: 700;
                                        font-family: 'Plus Jakarta Sans';
                                        font-size: 30px;">${item.nama_destinasi}</p>
                                        <p style="color: #14183E;
                                        font-weight: 500;
                                        font-family: 'Plus Jakarta Sans';
                                        font-size: 14px;">📍 ${item.alamat}</p>
                                        <p style="color: #14183E;
                                        font-weight: 500;
                                        font-family: 'Plus Jakarta Sans';
                                        font-size: 15px;
                                        margin-bottom:40px;">
                                            ${item.deskripsi_singkat}</p>
                                            <a style="
                                                font-family: 'Plus Jakarta Sans';
                                                font-size: small;
                                                margin: 0px;
                                                color: white;
                                                background: #238AED;
                                                padding: 9px 41px;
                                                border-radius: 5px;
                                                box-shadow: 0 5px 15px #4475F2" href="{{ url('detail') }}/${item.id}">Kunjungi Destinasi</a>
                                        </span>
                                    </div>
                            `)
                            });
                        }
                    }
                });
            }else if(keyword_bar == ""){
                $.ajax({
                type: 'get',
                url: 'https://wecomesee.my.id/api/v1/destinasi',
                success: function(result) {
                        $('#filter-destinasi').html('');
                        $.each(result.data, function (i, item) {
                            $('#filter-destinasi').append(`
                            <div style="background-color: #F4F5F7;
                                width: 850px;
                                height: 300px;
                                margin-bottom: 30px;
                                border-radius: 10px;">
                                    <img src="{{asset('ww')}}/img/${item.foto_sampul}" style="
                                    width: 400px;
                                    height:300px;
                                    margin:0px;
                                    border-radius:0px;
                                    object-fit: cover;
                                    border-top-left-radius: 10px;
                                    border-bottom-left-radius: 10px;">
                                    <span style="
                                    position: absolute;
                                    margin: 25px;
                                    width: 400px;">
                                    <p style="color: #14183E;
                                    font-weight: 700;
                                    font-family: 'Plus Jakarta Sans';
                                    font-size: 30px;">${item.nama_destinasi}</p>
                                    <p style="color: #14183E;
                                    font-weight: 500;
                                    font-family: 'Plus Jakarta Sans';
                                    font-size: 14px;">📍 ${item.alamat}</p>
                                    <p style="color: #14183E;
                                    font-weight: 500;
                                    font-family: 'Plus Jakarta Sans';
                                    font-size: 15px;
                                    margin-bottom:40px;">
                                        ${item.deskripsi_singkat}</p>
                                        <a style="
                                            font-family: 'Plus Jakarta Sans';
                                            font-size: small;
                                            margin: 0px;
                                            color: white;
                                            background: #238AED;
                                            padding: 9px 41px;
                                            border-radius: 5px;
                                            box-shadow: 0 5px 15px #4475F2" href="{{ url('detail') }}/${item.id}">Kunjungi Destinasi</a>
                                    </span>
                                </div>
                        `)
                        });
                    },
                });
            }

            if (urlParams == "")
            {
                $.ajax({
                type: 'get',
                url: 'https://wecomesee.my.id/api/v1/destinasi',
                success: function(result) {
                        $('#filter-destinasi').html('');
                        $.each(result.data, function (i, item) {
                            $('#filter-destinasi').append(`
                            <div style="background-color: #F4F5F7;
                                width: 850px;
                                height: 300px;
                                margin-bottom: 30px;
                                border-radius: 10px;">
                                    <img src="{{asset('ww')}}/img/${item.foto_sampul}" style="
                                    width: 400px;
                                    height:300px;
                                    margin:0px;
                                    border-radius:0px;
                                    object-fit: cover;
                                    border-top-left-radius: 10px;
                                    border-bottom-left-radius: 10px;">
                                    <span style="
                                    position: absolute;
                                    margin: 25px;
                                    width: 400px;">
                                    <p style="color: #14183E;
                                    font-weight: 700;
                                    font-family: 'Plus Jakarta Sans';
                                    font-size: 30px;">${item.nama_destinasi}</p>
                                    <p style="color: #14183E;
                                    font-weight: 500;
                                    font-family: 'Plus Jakarta Sans';
                                    font-size: 14px;">📍 ${item.alamat}</p>
                                    <p style="color: #14183E;
                                    font-weight: 500;
                                    font-family: 'Plus Jakarta Sans';
                                    font-size: 15px;
                                    margin-bottom:40px;">
                                        ${item.deskripsi_singkat}</p>
                                        <a style="
                                            font-family: 'Plus Jakarta Sans';
                                            font-size: small;
                                            margin: 0px;
                                            color: white;
                                            background: #238AED;
                                            padding: 9px 41px;
                                            border-radius: 5px;
                                            box-shadow: 0 5px 15px #4475F2" href="{{ url('detail') }}/${item.id}">Kunjungi Destinasi</a>
                                    </span>
                                </div>
                        `)
                        });
                    },
                });
            }

            $.ajax({
                type: 'get',
                url: 'https://api.goapi.id/v1/regional/kecamatan?kota_id=33.74&api_key=RhRnKsEtWzjvnQeD0xWusEshAMaImX',
                success: function(result) {
                    $('#filter-kecamatan').html('');
                    $.each(result.data, function (i, item) {
                        $('#filter-kecamatan').append(`
                    <span style="display: flex;align-items: center;padding-bottom:5px;">
                    <input onchange="filterDestinasiKecamatan(this)" class="kecamatan-box" kecamatan="${item.name}" type="checkbox" 
                    style="
                        width: 20px;
                        height: 20px;
                        border-radius: 5px;
                        border: none;
                        font-family: 'Plus Jakarta Sans';margin-right:10px" name="key">
                    <p style="text-align:justify;font-family: 'Plus Jakarta Sans';">
                        ${item.name}</p>
                    </span>`)
                    });
                },
            });


            $.ajax({
                type: 'get',
                url: 'https://wecomesee.my.id/api/v1/kategori',
                success: function(result) {
                    $('#filter-kategori').html('');
                    $.each(result.data, function (i, item) {
                        $('#filter-kategori').append(`<span style="display: flex;align-items: center;padding-bottom:5px;">
                    <input id="${item.nama}" type="checkbox" onchange="filterDestinasiKategori(this)" class="kategori-box" kategori="${item.nama}"
                    style="
                        width: 20px;
                        height: 20px;
                        border-radius: 5px;
                        border: none;
                        font-family: 'Plus Jakarta Sans';margin-right:10px" name="key2">
                    <p style="text-align:justify;font-family: 'Plus Jakarta Sans';">
                        ${item.nama}</p>
                </span>`)
                    });
                },
            });
            

            $.ajax({
                type: 'get',
                url: 'https://wecomesee.my.id/api/v1/kategori',
                success: function(result) {
                    $('#kategori').html('');
                    $.each(result.data, function (i, item) {
                        $('#kategori').append(`<a href="{{ url('filter?keyword=${item.nama}') }}" >${item.nama} <i class="fas fa-chevron-down"></i></a>`)
                    });
                },
            });

            const page = 'https://wecomesee.my.id/detail/';
            $.ajax({
                    type: 'get',
                    url: 'https://wecomesee.my.id/api/v1/destinasi',
                    success: function(result) {
                        $('#carousel').html('');
                        $.each(result.data, function (i, item) {
                            $('#carousel').append(`
                            <div onclick="window.location.replace('${page}${item.id}')" class="slide" aria-label="1 / ${i}">
                                <img src="{{asset('ww')}}/img/${item.foto_slider}" class="image fig1" data-slide=" ${i}">
                            </div>
                        `)
                        });
                    },
            });

            var id_destinasi = $('#id_destinasi').val();
            $.ajax({
                type: 'get',
                url: 'https://wecomesee.my.id/api/v1/detail/'+id_destinasi,
                success: function(result) {
                    $('#detail-sampul').html('');
                    $('#detail-sampul').append(`
                        <img src="{{asset('ww')}}/img/${result.data.foto_sampul}" style="
                        width: 850px;
                        height: 604px;
                        margin-bottom: 50px;
                        border-radius: 10px;
                        object-fit: cover;">
                    `)

                    $('#detail-child').html('');
                    $('#detail-child').append(`
                    <img src="{{asset('ww')}}/img/${result.data.foto_child1}" style="
                    width: 280px;
                    height: 160px;
                    margin-bottom: 30px;
                    border-radius: 10px;
                    margin: 0px 5px;
                    object-fit: cover;">
                    <img src="{{asset('ww')}}/img/${result.data.foto_child2}" style="
                    width: 280px;
                    height: 160px;
                    margin-bottom: 30px;
                    border-radius: 10px;
                    margin: 0px 5px;
                    object-fit: cover;">
                    <img src="{{asset('ww')}}/img/${result.data.foto_child3}" style="
                    width: 280px;
                    height: 160px;
                    margin-bottom: 30px;
                    border-radius: 10px;
                    margin: 0px 5px;
                    object-fit: cover;">
                    `)

                    $('#detail-judul').html(`${result.data.nama_destinasi}`)
                    $('#detail-deskripsi').html(`${result.data.deskripsi}`)
                    $('#detail-alamat').html(`📍 ${result.data.alamat}`)
                    $('#detail-harga').html(`💰 Rp. ${result.data.range_harga} (Estimasi biaya parkir dan tiket masuk)`)
                    $('#detail-maps').html(`<iframe id="detail-maps" src="${result.data.maps}" width="950" height="402" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>`)
                },
            });

            $.ajax({
                type: 'get',
                url: 'https://wecomesee.my.id/api/v1/rekomendasi/'+id_destinasi,
                success: function(result) {
                    $('#detail_rekomendasi').html('');
                    $.each(result.data, function (i, item) {
                        $('#detail_rekomendasi').append(`
                        <div style="background-color: #F4F5F7;
                        width: 350px;
                        height: 150px;
                        margin-bottom: 30px;
                        border-radius: 10px;">
                            <img src="{{asset('ww')}}/img/${item.foto_sampul}" style="
                            width: 175px;
                            height: 150px;
                            margin:0px;
                            border-radius:0px;
                            object-fit: cover;
                            border-top-left-radius: 10px;
                            border-bottom-left-radius: 10px;">
                            <span style="
                            position: absolute;
                            margin: 15px;
                            width: 150px;">
                            <p style="color: #14183E;
                            font-weight: 700;
                            font-family: 'Plus Jakarta Sans';
                            font-size: 22px;
                            margin-top:0px;
                            margin-bottom: 50px">${item.nama_destinasi}</p>
                            <a style="
                                font-family: 'Plus Jakarta Sans';
                                font-size: 12px;
                                margin: 0px;
                                color: white;
                                background: #238AED;
                                padding: 5px 10px;
                                border-radius: 5px;
                                box-shadow: 0 5px 15px #4475F2" href="{{ url('detail') }}/${item.id}">Kunjungi Destinasi</a>
                            </span>
                        </div>
                        `)
                    });
                },
            });

            
        });

        localStorage.setItem("kecamatan", NULL);
        localStorage.setItem("kategori", NULL);

        function resetAllFilter(){
            $('input.kecamatan-box').prop('checked', false)
            $('input.kategori-box').prop('checked', false)

            $.ajax({
                type: 'get',
                url: 'https://wecomesee.my.id/api/v1/destinasi',
                success: function(result) {
                    $('#filter-destinasi').html('');
                    $.each(result.data, function (i, item) {
                        $('#filter-destinasi').append(`
                        <div style="background-color: #F4F5F7;
                            width: 850px;
                            height: 300px;
                            margin-bottom: 30px;
                            border-radius: 10px;">
                                <img src="{{asset('ww')}}/img/${item.foto_sampul}" style="
                                width: 400px;
                                height:300px;
                                margin:0px;
                                border-radius:0px;
                                object-fit: cover;
                                border-top-left-radius: 10px;
                                border-bottom-left-radius: 10px;">
                                <span style="
                                position: absolute;
                                margin: 25px;
                                width: 400px;">
                                <p style="color: #14183E;
                                font-weight: 700;
                                font-family: 'Plus Jakarta Sans';
                                font-size: 30px;">${item.nama_destinasi}</p>
                                <p style="color: #14183E;
                                font-weight: 500;
                                font-family: 'Plus Jakarta Sans';
                                font-size: 14px;">📍 ${item.alamat}</p>
                                <p style="color: #14183E;
                                font-weight: 500;
                                font-family: 'Plus Jakarta Sans';
                                font-size: 15px;
                                margin-bottom:40px;">
                                    ${item.deskripsi_singkat}</p>
                                    <a style="
                                        font-family: 'Plus Jakarta Sans';
                                        font-size: small;
                                        margin: 0px;
                                        color: white;
                                        background: #238AED;
                                        padding: 9px 41px;
                                        border-radius: 5px;
                                        box-shadow: 0 5px 15px #4475F2" href="{{ url('detail') }}/${item.id}">Kunjungi Destinasi</a>
                                </span>
                            </div>
                    `)
                    });
                },
            });
        }

        function filterDestinasiKecamatan(th) {
            var filter_kecamatan = $(th).attr('kecamatan');
            localStorage.setItem("kecamatan", filter_kecamatan);
            const kecamatan = localStorage.getItem("kecamatan");
            const kategori = localStorage.getItem("kategori");

            var cbs = document.getElementsByClassName("kecamatan-box");
            for (var i = 0; i < cbs.length; i++) {
                cbs[i].checked = false;
            }
            th.checked = true;

            var url = 'https://wecomesee.my.id/api/v1/filter/kecamatan/'+kecamatan+'/kategori/'+kategori+'';
            console.log(url);

            $.ajax({
			type: 'get',
			url: url,
			success: function(result) {
                console.log(result)
                $('#filter-destinasi').html('');
                    $.each(result.data, function (i, item) {
                        $('#filter-destinasi').append(`
                        <div style="background-color: #F4F5F7;
                            width: 850px;
                            height: 300px;
                            margin-bottom: 30px;
                            border-radius: 10px;">
                                <img src="{{asset('ww')}}/img/${item.foto_sampul}" style="
                                width: 400px;
                                height:300px;
                                margin:0px;
                                border-radius:0px;
                                object-fit: cover;
                                border-top-left-radius: 10px;
                                border-bottom-left-radius: 10px;">
                                <span style="
                                position: absolute;
                                margin: 25px;
                                width: 400px;">
                                <p style="color: #14183E;
                                font-weight: 700;
                                font-family: 'Plus Jakarta Sans';
                                font-size: 30px;">${item.nama_destinasi}</p>
                                <p style="color: #14183E;
                                font-weight: 500;
                                font-family: 'Plus Jakarta Sans';
                                font-size: 14px;">📍 ${item.alamat}</p>
                                <p style="color: #14183E;
                                font-weight: 500;
                                font-family: 'Plus Jakarta Sans';
                                font-size: 15px;
                                margin-bottom:40px;">
                                    ${item.deskripsi_singkat}</p>
                                    <a style="
                                        font-family: 'Plus Jakarta Sans';
                                        font-size: small;
                                        margin: 0px;
                                        color: white;
                                        background: #238AED;
                                        padding: 9px 41px;
                                        border-radius: 5px;
                                        box-shadow: 0 5px 15px #4475F2" href="{{ url('detail') }}/${item.id}">Kunjungi Destinasi</a>
                                </span>
                            </div>
                    `)
                    });
                },
            });
            
        }

        function filterDestinasiKategori(th) {
            var filter_kategori = $(th).attr('kategori');
            localStorage.setItem("kategori", filter_kategori);
            const kecamatan = localStorage.getItem("kecamatan");
            const kategori = localStorage.getItem("kategori");

            var cbs = document.getElementsByClassName("kategori-box");
            for (var i = 0; i < cbs.length; i++) {
                cbs[i].checked = false;
            }
            th.checked = true;

            var url = 'https://wecomesee.my.id/api/v1/filter/kecamatan/'+kecamatan+'/kategori/'+kategori+'';
            console.log(url);

            $.ajax({
			type: 'get',
			url: url,
			success: function(result) {
                console.log(result)
                $('#filter-destinasi').html('');
                    $.each(result.data, function (i, item) {
                        $('#filter-destinasi').append(`
                        <div style="background-color: #F4F5F7;
                            width: 850px;
                            height: 300px;
                            margin-bottom: 30px;
                            border-radius: 10px;">
                                <img src="{{asset('ww')}}/img/${item.foto_sampul}" style="
                                width: 400px;
                                height:300px;
                                margin:0px;
                                border-radius:0px;
                                object-fit: cover;
                                border-top-left-radius: 10px;
                                border-bottom-left-radius: 10px;">
                                <span style="
                                position: absolute;
                                margin: 25px;
                                width: 400px;">
                                <p style="color: #14183E;
                                font-weight: 700;
                                font-family: 'Plus Jakarta Sans';
                                font-size: 30px;">${item.nama_destinasi}</p>
                                <p style="color: #14183E;
                                font-weight: 500;
                                font-family: 'Plus Jakarta Sans';
                                font-size: 14px;">📍 ${item.alamat}</p>
                                <p style="color: #14183E;
                                font-weight: 500;
                                font-family: 'Plus Jakarta Sans';
                                font-size: 15px;
                                margin-bottom:40px;">
                                    ${item.deskripsi_singkat}</p>
                                    <a style="
                                        font-family: 'Plus Jakarta Sans';
                                        font-size: small;
                                        margin: 0px;
                                        color: white;
                                        background: #238AED;
                                        padding: 9px 41px;
                                        border-radius: 5px;
                                        box-shadow: 0 5px 15px #4475F2" href="{{ url('detail') }}/${item.id}">Kunjungi Destinasi</a>
                                </span>
                            </div>
                    `)
                    });
                },
            });
            
        }
    </script>

    <script src="{{asset('ww')}}/js/testimonial-ed.js"></script>
</body>
</html>