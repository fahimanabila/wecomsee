<style>
    .alert-success{
        background: green;
        padding: 17px;
        margin-bottom: 20px;
        color: white;
    }
</style>
<section id="narahubung" class="sec works container" style="width:100%;height:100%">
        <div class="works-list">
            <div class="works-head" style="margin-bottom: 50px;">
                <p style="
                        font-weight: 800;
                        font-size: 18px;
                        color: #238AED;
                        margin-top:125px;
                        letter-spacing: 5px;
                        ">NARAHUBUNG</p>
                <h2>📞Contact Us</h2>
                <p style="font-size:large">Pasang iklan bisnis wisata mu di WeComeSee!</p>
            </div>
            <div class="works-item">
                <h3>Links atau Pranala Luar</h3>
                <p style="text-align:justify;font-family: 'Plus Jakarta Sans';">
                    About</p>
                <p style="text-align:justify;font-family: 'Plus Jakarta Sans';">
                    Send Email to Our Team sales.wecomesee@gmail.com</p>
                <p onclick="location.replace('https://wecomesee.my.id/service')" style="text-align:justify;font-family: 'Plus Jakarta Sans';">
                    Layanan WeComeSee</p>
                <p onclick="location.replace('https://wecomesee.my.id/filter')" style="text-align:justify;font-family: 'Plus Jakarta Sans';">
                    Search</p>
                <p onclick="window.open('https://www.google.com/maps/search/wisata+near+Kota+Semarang,+Semarang+City,+Central+Java,+Indonesia/@-6.9837522,110.4310591,13z/data=!3m1!4b1?entry=ttu')" style="text-align:justify;font-family: 'Plus Jakarta Sans';">
                    Maps Semarang</p>
                <p onclick="window.open('https://instagram.com/wecomesee')" style="text-align:justify;font-family: 'Plus Jakarta Sans';">
                    Instagram</p>
            </div>
            <div class="works-item" style="background-color: #238AED;border-radius:20px;width:500px;height:600px;padding-top:50px">
                @include('_partial/flash_message')
                <form method="POST" action="{{ route('wecomesee.penawaran') }}">
                    @csrf
                <h3 style="color:white;">Email</h3>
                <p style="text-align:justify;font-family: 'Plus Jakarta Sans';">
                    <input type="email" placeholder="Email..." class="form-control" style="
                        width: 350px;
                        height: 30px;
                        border-radius: 5px;
                        border: none;
                        padding: 5px;
                        font-family: 'Plus Jakarta Sans';" name="email">
                </p>

                <h3 style="color:white;">WhatsApp</h3>
                <p style="text-align:justify;font-family: 'Plus Jakarta Sans';">
                    <input type="tel" placeholder="No. WhatsApp..." class="form-control" style="
                        width: 350px;
                        height: 30px;
                        border-radius: 5px;
                        border: none;
                        padding: 5px;
                        font-family: 'Plus Jakarta Sans';" name="nomor_telepon">
                </p>
                <p style="text-align: justify;
                font-family: 'Plus Jakarta Sans';
                color: white;
                font-size: 12px;margin-bottom:30px">
                    Silakan sertakan contact Anda untuk mendapat penawaran dari kami</p>
                
                <h3 style="color:white;">Nama</h3>
                <p style="text-align:justify;font-family: 'Plus Jakarta Sans';margin-bottom:30px">
                    <input type="text" placeholder="Nama..." class="form-control" style="
                        width: 350px;
                        height: 30px;
                        border-radius: 5px;
                        border: none;
                        padding: 5px;
                        font-family: 'Plus Jakarta Sans';" name="nama_lengkap">
                </p>

                <p style="text-align: justify;
                font-family: 'Plus Jakarta Sans';
                color: white;
                font-size: 12px;display: flex;
                margin-bottom:30px">
                    <input type="checkbox" style="
                        width: 20px;
                        height: 20px;
                        border-radius: 5px;
                        border: none;
                        font-family: 'Plus Jakarta Sans';margin-right:10px" name="flag">
                    Saya bersedia menerima penawaran WeComeSee pada email dan WhatsApp 
                </p>

                <p style="text-align:justify;font-family: 'Plus Jakarta Sans';">
                    <button type="submit" style="
                        font-family: 'Plus Jakarta Sans';
                        font-size: medium;
                        margin: 0px;
                        color: white;
                        background: #FF8619;
                        padding: 8px 25px;
                        border:none;
                        border-radius: 5px;">Submit</button>
                </p>
                </form>
            </div>
        </div>
    </section>