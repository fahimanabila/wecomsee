const btnToggleAsk = document.querySelectorAll(".btn-toggle-ask"),
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

function showmodal(){
    var modal = document.getElementById("myModal");
    
    var btn = document.getElementById("myBtn");

    var span = document.getElementsByClassName("close-manual")[0];

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

$( document ).ready(function(){
    $('#bank option').each(
    function(c, index) {
        var b = $(index).attr('value')
        $(this).text(b)
    });
})

$('.close').on('click', function() {
    $(this).parent('.alert').hide();
});

function changeLayanan(th){
    let opt = $(th).val()

    if (opt == '1'){

        $('#body-target').html(`
        <h3>Informasi Transfer</h3>
    
        <span>ID Pelanggan</span>
        <input type="num" name="id_pel" value="86013722240" id="id_pel" placeholder="Masukkan ID Pelanggan">

        <span>Isi token</span>
        <select type="select">
            <option value="20.000">20.000 (Bayar Rp. 21.000)</option>
            <option value="50.000">50.000 (Bayar Rp. 51.000)</option>
            <option selected value="100.000">100.000 (Bayar Rp. 101.000)</option>
            <option value="200.000">200.000 (Bayar Rp. 201.000)</option>
            <option value="500.000">500.000 (Bayar Rp. 501.000)</option>
            <option value="1.000.000">1.000.000 (Bayar Rp. 1.001.000)</option>
        </select>

        <span>Voucher</span>
        <input type="text" name="voucher" id="voucher" placeholder="Masukkan Voucher jika tersedia">

        <span>Detail Tagihan</span>
        <div class="detail-definition">
        <p>Listrik PLN</p>
        <p>ID Pelanggan : 86013722240</p>
        <p>Jenis Layanan : Pengisian token</p>
        <p>Nama : John Doe</p>
        <p>Tarif/Daya : R1/1300</p>
        <p>Harga : Rp. 101.000,00-</p>
        </div>

            <button type="button" onclick="showmodal()" class="login-button">Bayar</button>
        </div>`)

    }else if (opt == '2'){

        $('#body-target').html(`
        <h3>Informasi Transfer</h3>
    
        <span>ID Pelanggan</span>
        <input type="num" name="id_pel" value="86013722240" id="id_pel" placeholder="Masukkan ID Pelanggan">

        <span>Pilih Wilayah</span>
        <select type="select">
            <option value="JKT/BANTEN/JABAR">JKT/BANTEN/JABAR</option>
            <option selected value="JATENG">JATENG</option>
            <option value="JATIM">JATIM</option>
            <option value="KALIMANTAN">KALIMANTAN</option>
        </select>

        <span>PAM</span>
        <input type="text" name="pam" id="pam" value="PDAM KOTA SEMARANG">

        <span>Voucher</span>
        <input type="text" name="voucher" id="voucher" placeholder="Masukkan Voucher jika tersedia">

        <span>Detail Tagihan</span>
        <div class="detail-definition">
        <p>Air PAM</p>
        <p>ID Pelanggan : 86013722240</p>
        <p>Jenis Layanan : Pembayaran Air PAM</p>
        <p>Nama : John Doe</p>
        <p>Wilayah : JATENG/PDAM KOTA SEMARANG</p>
        <p>Harga : Rp. 89.000,00-</p>
        </div>

            <button type="button" onclick="showmodal()" class="login-button">Bayar</button>
        </div>`)

    }else if (opt == '3'){

        $('#body-target').html(`
        <h3>Informasi Transfer</h3>
    
        <span>ID Pelanggan</span>
        <input type="num" name="id_pel" value="12201929331" id="id_pel" placeholder="Masukkan ID Pelanggan">


        <span>Nama Perusahaan</span>
        <select type="select">
            <option selected value="Indihome">Indihome</option>
            <option value="FIRST MEDIA">FIRST MEDIA</option>
            <option value="K-Vision">K-Vision</option>
            <option value="MNC Play">MNC Play</option>
            <option value="MyRepublic">MyRepublic</option>
            <option value="XL Home">XL Home</option>
            <option value="CBN">CBN</option>
            <option value="MNC Vision">MNC Vision</option>
            <option value="Transvision">Transvision</option>
        </select>

        <span>Voucher</span>
        <input type="text" name="voucher" id="voucher" placeholder="Masukkan Voucher jika tersedia">

        <span>Detail Tagihan</span>
        <div class="detail-definition">
        <p>Tagihan TV Kabel & Internet</p>
        <p>ID Pelanggan : 12201929331</p>
        <p>Jenis Layanan : Pembayaran Tagihan TV Kabel & Internet</p>
        <p>Nama : John Doe</p>
        <p>Harga : Rp. 112.000,00-</p>
        </div>

            <button type="button" onclick="showmodal()" class="login-button">Bayar</button>
        </div>`)

    }else if (opt == '4'){

        $('#body-target').html(`
        <h3>Informasi Transfer</h3>
    
        <span>NOP</span>
        <input type="num" name="id_pel" value="33.74.041.004.019.0051" id="id_pel" placeholder="Masukkan NOP">

        <span>Voucher</span>
        <input type="text" name="voucher" id="voucher" placeholder="Masukkan Voucher jika tersedia">

        <span>Detail Tagihan</span>
        <div class="detail-definition">
        <p>Tagihan Pajak Daerah PBB</p>
        <p>NOP : 33.74.041.004.019.0051</p>
        <p>Jenis Layanan : Pembayaran Tagihan Pajak Daerah PBB</p>
        <p>Nama : John Doe</p>
        <p>Periode : Tahun 2022</p>
        <p>Harga : Rp. 102.000,00-</p>
        </div>

            <button type="button" onclick="showmodal()" class="login-button">Bayar</button>
        </div>`)
    }

}

function changeTraveling(th){
    let opt = $(th).val()

    if (opt == '1'){

        $('#target-travel').html(`
        <h3>Informasi Pembayaran</h3>

        <span>Pilih Lokasi Awal</span>
        <select type="select">
            <option selected value="">AHMAD YANI (SRG)</option>
            <option value="">I GUSTI NGURAH RAI (DPS)</option>
            <option value="">KUALANAMU (KNO)</option>
            <option value="">INTERNATIONAL JOGJAKARTA (YIA)</option>
            <option value="">ADI SUMARMO (SOC)</option>
            <option value="">HALIM PERDANAKUSUMA (HLP)</option>
            <option value="">HUSEIN SASTRANEGARA (BDO)</option>
        </select>

        <span>Pilih Lokasi Tujuan</span>
        <select type="select">
            <option value="">AHMAD YANI (SRG)</option>
            <option selected value="">I GUSTI NGURAH RAI (DPS)</option>
            <option value="">KUALANAMU (KNO)</option>
            <option value="">INTERNATIONAL JOGJAKARTA (YIA)</option>
            <option value="">ADI SUMARMO (SOC)</option>
            <option value="">HALIM PERDANAKUSUMA (HLP)</option>
            <option value="">HUSEIN SASTRANEGARA (BDO)</option>
        </select>

        <span>Pilih Tanggal Keberangkatan</span>
        <input type="date" name="tgl" value="2022-09-22" id="tgl" placeholder="Masukkan tanggal keberangkatan">

        <span>Penumpang</span>
        <input value="2" type="text" name="email" id="email" placeholder="Masukkan jumlah penumpang">

        <span>Kursi</span>
        <input readonly type="text" name="email" id="email" value="12A,12B">

        <span>Kelas</span>
        <select type="select">
            <option selected value="">Ekonomi</option>
            <option value="">Bisnis</option>
        </select>
        
        <span>Voucher Promo</span>
        <input type="text" name="voucher" id="voucher" value="20IDOMPET" placeholder="Masukkan Voucher jika tersedia">

        <span>Detail Layanan</span>
        <div class="detail-definition">
        <p>Pembelian Tiket Pesawat Terbang</p>
        <p>Lokasi Asal : Semarang, Ahmad Yani (SRG)</p>
        <p>Lokasi Tujuan : Bali, I Gusti Ngurah Rai (DPS)</p>
        <p>Nama : John Doe, Stefany Young</p>
        <p>Harga : 2 x Rp. 1.500.000,00- </p>
        <p>Admin : 2 x Rp. 5.000,00-  </p>
        <p>Promo : - Rp. 20.000,00-  </p>
        <p>Total : Rp. 2.990.000,00-</p>
        </div>

        <button type="button" onclick="showmodal()" class="login-button">Bayar</button>`)

    }else if (opt == '2'){

        $('#target-travel').html(`
        <h3>Informasi Pembayaran</h3>

        <span>Pilih Lokasi Awal</span>
        <select type="select">
            <option selected value="">STASIUN GAMBIR</option>
            <option value="">STASIUN HALL BANDUNG</option>
            <option value="">STASIUN YOGYAKARTA</option>
            <option value="">STASIUN GUBENG</option>
            <option value="">STASIUN PASAR SENEN</option>
            <option value="">STASIUN SOLO BALAPAN</option>
            <option value="">STASIUN PURWOKERTO</option>
            <option value="">STASIUN CIREBON</option>
            <option value="">STASIUN MADIUN</option>
        </select>

        <span>Pilih Lokasi Tujuan</span>
        <select type="select">
            <option value="">STASIUN GAMBIR</option>
            <option value="">STASIUN HALL BANDUNG</option>
            <option selected value="">STASIUN TAWANG SEMARANG</option>
            <option value="">STASIUN YOGYAKARTA</option>
            <option value="">STASIUN GUBENG</option>
            <option value="">STASIUN PASAR SENEN</option>
            <option value="">STASIUN SOLO BALAPAN</option>
            <option value="">STASIUN PURWOKERTO</option>
            <option value="">STASIUN CIREBON</option>
            <option value="">STASIUN MADIUN</option>
        </select>

        <span>Pilih Tanggal Keberangkatan</span>
        <input type="date" name="tgl" value="2022-09-22" id="tgl" placeholder="Masukkan tanggal keberangkatan">

        <span>Penumpang</span>
        <input value="2" type="text" name="penumpang" id="penumpang" placeholder="Masukkan jumlah penumpang">

        <span>Kursi</span>
        <input readonly type="text" name="kursi" id="kursi" value="19A,19B">

        <span>Kelas</span>
        <select type="select">
            <option value="">Ekonomi</option>
            <option selected value="">Bisnis</option>
        </select>
        
        <span>Voucher Promo</span>
        <input type="text" name="voucher" id="voucher" value="20IDOMPET" placeholder="Masukkan Voucher jika tersedia">

        <span>Detail Layanan</span>
        <div class="detail-definition">
        <p>Pembelian Tiket Kereta Api</p>
        <p>Lokasi Asal : Jakarta, Gambir </p>
        <p>Lokasi Tujuan : Semarang, Tawang </p>
        <p>Nama : John Doe, Stefany Young</p>
        <p>Harga : 2 x Rp. 700.000,00- </p>
        <p>Admin : 2 x Rp. 5.000,00-  </p>
        <p>Promo : - Rp. 20.000,00-  </p>
        <p>Total : Rp. 1.390.000,00-</p>
        </div>
        
        <button type="button" onclick="showmodal()" class="login-button">Bayar</button>`)

    }else if (opt == '3'){

        $('#target-travel').html(`
        <h3>Informasi Pembayaran</h3>

        <span>Pilih Lokasi Awal</span>
        <select type="select">
            <option selected value="">SEMARANG</option>
            <option value="">SALATIGA</option>
            <option value="">SOLO</option>
            <option value="">BOYOLALI</option>
            <option value="">MAGELANG</option>
            <option value="">YOGYAKARTA</option>
            <option value="">KEBUMEN</option>
            <option value="">KUDUS</option>
            <option value="">DEMAK</option>
            <option value="">REMBANG</option>
            <option value="">PATI</option>
        </select>

        <span>Pilih Lokasi Tujuan</span>
        <select type="select">
            <option selected value="">SEMARANG</option>
            <option value="">SALATIGA</option>
            <option value="">SOLO</option>
            <option value="">BOYOLALI</option>
            <option value="">MAGELANG</option>
            <option selected value="">YOGYAKARTA</option>
            <option value="">KEBUMEN</option>
            <option value="">KUDUS</option>
            <option value="">DEMAK</option>
            <option value="">REMBANG</option>
            <option value="">PATI</option>
        </select>

        <span>Pilih Tanggal Keberangkatan</span>
        <input type="date" name="tgl" value="2022-09-22" id="tgl" placeholder="Masukkan tanggal keberangkatan">

        <span>Penumpang</span>
        <input value="1" type="text" name="penumpang" id="penumpang" placeholder="Masukkan jumlah penumpang">

        <span>Kursi</span>
        <input readonly type="text" name="kursi" id="kursi" value="14">

        <span>Tipe Bus</span>
        <select type="select">
            <option value="">Bus AC Ekonomi</option>
            <option selected value="">Bus AC Patas</option>
            <option value="">Bus AC Malam</option>
        </select>
        
        <span>Voucher Promo</span>
        <input type="text" name="voucher" id="voucher" value="20IDOMPET" placeholder="Masukkan Voucher jika tersedia">

        <span>Detail Layanan</span>
        <div class="detail-definition">
        <p>Pembelian Tiket Bus</p>
        <p>Lokasi Asal : Semarang, Terminal Sukun </p>
        <p>Lokasi Tujuan : Yogyakarta, Jombor </p>
        <p>Nama : John Doe</p>
        <p>Harga : Rp. 100.000,00- </p>
        <p>Admin : Rp. 2.000,00-  </p>
        <p>Promo : - Rp. 20.000,00-  </p>
        <p>Total : Rp. 82.000,00-</p>
        </div>
        
        <button type="button" onclick="showmodal()" class="login-button">Bayar</button>`)

    }else if (opt == '4'){

        $('#target-travel').html(`
        <h3>Informasi Pembayaran</h3>

        <span>Lokasi Terdekteksi</span>
        <input readonly type="text" name="lokasi" value="Tembalang, Semarang">

        <span>Pilih Hotel/Penginapan</span>
        <select type="select">
            <option value="">IBIS HOTEL</option>
            <option value="">UNDIP INN</option>
            <option value="">OAK TREE EMERALD</option>
            <option selected value="">LOUIS KIENE</option>
            <option value="">HAZOTEL</option>
            <option value="">HORISON INN</option>
            <option value="">ARTOTEL</option>
            <option value="">AWAN SEWUU</option>
            <option value="">PARAGON</option>
        </select>

        <span>Pilih Tanggal Pemesanan</span>
        <input type="date" name="tgl" value="2022-09-22" id="tgl" placeholder="Masukkan tanggal keberangkatan">

        <span>Waktu</span>
        <input type="time" name="time" value="13.00 AM" id="time">

        <span>Nomor Kamar</span>
        <input readonly type="text" name="kursi" id="kursi" value="18">

        <span>Jumlah Bed/Kasur</span>
        <select type="select">
            <option value="">1</option>
            <option selected value="">2</option>
            <option value="">Lebih dari 2</option>
        </select>
        
        <span>Voucher Promo</span>
        <input type="text" name="voucher" id="voucher" value="20IDOMPET" placeholder="Masukkan Voucher jika tersedia">

        <span>Detail Layanan</span>
        <div class="detail-definition">
        <p>Pemesanan Kamar Hotel</p>
        <p>Hotel : Louis Kiene Hotel</p>
        <p>Rating : 5/5 </p>
        <p>Bed : 2 Bed </p>
        <p>Nama : John Doe, Stefany Angela</p>
        <p>Harga : Rp. 800.000,00- </p>
        <p>Admin : Rp. 2.500,00-  </p>
        <p>Promo : - Rp. 20.000,00-  </p>
        <p>Total : Rp. 782.500,00-</p>
        </div>
        
        <button type="button" onclick="showmodal()" class="login-button">Bayar</button>`)
    }

}

