<style>
    .alert-success{
        background: green;
        padding: 10px;
        font-size: 12px;
        margin-bottom: 10px;
        color: white;
    }
</style>
<div class="works-item" style="margin:0px;background-color: #238AED;border-radius:20px;width:345px;height:580px;padding-top:20px">
@include('_partial/flash_message')
<form method="POST" action="{{ route('wecomesee.penawaran2') }}">
<input type="hidden" name="id_detail" value="{{ $id }}">
@csrf                    
<h3 style="color:white;margin-bottom:20px;margin:0px;">Ingin Wisata Anda Mengudara di WeComeSee?</h3>
<h3 style="color:white;margin:0px;margin-top:30px">Email</h3>
<p style="text-align:justify;font-family: 'Plus Jakarta Sans';">
    <input type="email" placeholder="Email..." class="form-control" style="
        width: 300px;
        height: 35px;
        border-radius: 5px;
        border: none;
        padding: 5px;
        font-family: 'Plus Jakarta Sans';" name="email">
</p>
<p style="text-align: justify;
font-family: 'Plus Jakarta Sans';
color: white;
font-size: 12px;margin-bottom:30px">

<p style="text-align:justify;font-family: 'Plus Jakarta Sans';">
    <input type="tel" placeholder="No, WhatsApp..." class="form-control" style="
        width: 300px;
        height: 35px;
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

<h3 style="color:white;margin:0px;">Nama Lengkap</h3>
<p style="text-align:justify;font-family: 'Plus Jakarta Sans';">
    <input type="text" placeholder="Nama lengkap..." class="form-control" style="
        width: 300px;
        height: 35px;
        border-radius: 5px;
        border: none;
        padding: 5px;
        font-family: 'Plus Jakarta Sans';" name="nama_lengkap">
</p>

<p style="text-align: left;
font-family: 'Plus Jakarta Sans';
color: white;
font-size: 12px;display: flex;
margin-bottom:30px">
    <input type="checkbox" style="
        width: 20px;
        height: 20px;
        border-radius: 5px;
        border: none;
        font-family: 'Plus Jakarta Sans';margin-right:10px;">
    Saya bersedia menerima penawaran WeComeSee pada email dan WhatsApp
</p>

<p style="text-align:justify;font-family: 'Plus Jakarta Sans';">
    <button style="
        font-family: 'Plus Jakarta Sans';
        font-size: medium;
        margin: 0px;
        color: white;
        background: #FF8619;
        padding: 8px 25px;
        border-radius: 5px;
        border:none" type="submit">Submit</button>
</p>
</form>
</div>