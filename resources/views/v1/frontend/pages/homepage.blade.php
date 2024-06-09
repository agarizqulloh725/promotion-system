@extends('v1.frontend.layout.main')

@push('css')
<style>
.image-background {
    background-image: url({{asset('frontend/img/bg-nav.jpg')}});
    background-size: cover;
    background-position: center;
    text-align: center;
}
.image-backgroundfoot {
    background-image: url({{asset('frontend/img/bg-nav2.jpg')}});
    background-size: cover;
    background-position: center;
}
.image-backgroundfooter {
    background-image: url({{asset('frontend/img/bg-nav.jpg')}});
    background-size: cover;
    background-position: center;
}
.breadcrumb {
    padding-bottom: 200px;
    background: none;
    padding: 0;
    justify-content: center; 
}
.breadcrumb-item + .breadcrumb-item::before {
    color: white;
}
.breadcrumb-item a {
    color: lightblue;
}
.spacing-1{
    letter-spacing: 1px;
}
.timer-box {
    background-color: #fff;
    color: #333;
    font-size: 24px;
    font-weight: bold;
    width: 60px;
    height: 60px;
    display: flex;
    justify-content: center;
    align-items: center;
    border-radius: 8px;
    box-shadow: 0 2px 2px rgba(0,0,0,0.2);
}
.brand-line {
    display: inline-block;
    width: 3px; /* Lebar garis */
    height: 30px; /* Tinggi garis */
    background-color: red; /* Warna garis */
    margin-right: 10px; /* Jarak antara garis dan teks */
    vertical-align: middle; /* Menyelaraskan garis dengan tengah teks */
}
.brand-line-white {
    display: inline-block;
    width: 3px; /* Lebar garis */
    height: 30px; /* Tinggi garis */
    background-color: white; /* Warna garis */
    margin-right: 10px; /* Jarak antara garis dan teks */
    vertical-align: middle; /* Menyelaraskan garis dengan tengah teks */
}
.discount-tag {
    padding: 0.2em 0.6em; /* Menambah padding di dalam tag span */
    border: 2px solid #000; /* Menetapkan border tebal */
    font-size: 0.8rem; /* Menyesuaikan ukuran font */
    border-radius: 5px; /* Memberikan border bulat */
    display: inline-block; /* Membuat span berperilaku seperti elemen inline block */
}

@media (min-width: 200px) { 
    .t-desc {
        font-size: 13px;
    }
    .title{
        padding-top: 3rem;
        margin-top:0rem; 
    }
    .ctr-urutkan{
        padding-top: 18px !important;
    }
}


@media (min-width: 319px) { 
    .t-desc {
        font-size: 13px;
    }
    .title{
        padding-top: 3rem;
        margin-top:1rem; 
    }
    .ctr-urutkan{
        padding-top: 18px !important;
    }
}

@media (min-width: 374px) { 
    .t-desc {
        font-size: 13px; 
    }
    .title{
        padding-top: 3rem;
        margin-top:1rem; 
    }
    .ctr-urutkan{
        padding-top: 18px !important;
    }
}

@media (min-width: 425px) { 
    .t-desc {
        font-size: 13px; 
    }
    .title{
        padding-top: 3rem;
        margin-top:1rem; 
    }
    .ctr-urutkan{
        padding-top: 18px !important;
    }
}
@media (min-width: 767px) { 
    .t-desc {
        font-size: 14px;
    }
    .title{
        padding-top: 3rem;
        margin-top:1rem; 
    }
}
@media (min-width: 991px) { 
    .t-desc {
        font-size: 15px;
    }
    .title{
        padding-top: 3rem;
        margin-top:3rem; 
    }
}

@media (min-width: 1023px) { 
    .t-desc {
        font-size: 16px;
    }
    .title{
        padding-top: 3rem;
        margin-top:3rem; 
    }
}

@media (min-width: 1200px) { 
    .t-desc {
        font-size: 20px; 
    }
    .title{
        padding-top: 3rem;
        margin-top:3rem; 
    }
}

.embed-responsive-16by9 {
    position: relative;
    padding-bottom: 56.25%; /* 16:9 Aspect Ratio */
    height: 0;
}

.embed-responsive-item {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
}

ul li {
    margin-bottom: 10px;
    font-size: 16px; /* Adjust size as needed */
}

.fa-check-circle, .fa-headset, .fa-credit-card {
    color: #28a745; /* Bootstrap success color */
    margin-right: 5px;
}

</style>
@endpush

@section('content')

{{-- content header --}}
<div class="container pt-5 mt-5 pb-5 mb-5">
    <div class="row pt-5 mt-5">
        <div class="col">
            <h2 class="poppins-semibold text-danger" >Temukan Inovasi Terkini dalam Gadget Pengalaman Belanja yang Tanpa Batas!</h2>
            <p class="poppins-regular pt-3" style="font-size: 18px">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
            </p>
            <div class="d-flex gap3 justify-content-between pb-4">
                <div class="poppins-medium"> <img width="25px" src="{{asset('frontend/img/checked-i.png')}}" alt=""> 100% Terpercaya </div>
                <div class="poppins-medium"> <img width="25px" src="{{asset('frontend/img/checked-i.png')}}" alt="">Bahan Berkualitas</div>
                <div class="poppins-medium"> <img width="25px" src="{{asset('frontend/img/checked-i.png')}}" alt="">Layanan Terbaik</div>
            </div>
            <button class="btn btn-danger p-2 poppins-medium" >Hubungi Kami Sekarang</button>
        </div>
        <div class="col d-flex justify-content-center align-items-center">
            <img src="{{asset('frontend/img/phone.png')}}" alt="Phone">
        </div>
    </div>
</div>

<div class="image-background" style="margin-top: 90px; margin-bottom: 90px">
    <div class="container">
        <div class="row p-4">
            <div class="col-8">
                <div class="d-flex justify-content-between">
                    <img src="{{asset('frontend/img/phone2.png')}}" alt="Phone">
                    <div class="text-white text-start ms-4 mt-5">
                        <h3 class="poppins-semibold">PROMO REALME 10 PRO 8GB/256GB</h3>
                        <p class="poppins-medium">
                            Spesifikasi : 
                        </p>
                        <ul class="text-start poppins-regular">
                            <li>
                                Ukuran layar: 6.5 inci, 1080 x 2340 pixels, Super AMOLED, 90Hz
                            </li>
                            <li>
                                Memori: RAM 8 GB, ROM 256 GB
                            </li>
                            <li>
                                Sistem operasi: Android
                            </li>
                            <li>
                                CPU: Mediatek Helio G99 (6nm), Octa-core up to 2.2Ghz
                            </li>
                        </ul>
                        <button class="btn btn-danger p-2 poppins-medium">Pesan Sekarang</button>
                    </div>
                </div>
            </div>
            <div class="col-4 text-white d-flex justify-content-center align-items-center">
                <div class="text-center">
                    <img src="{{asset('frontend/img/phone3.png')}}" alt="Phone" class="mb-2">
                    <p class="poppins-medium">Promo Akan Berakhir Dalam:</p>
                    <div class="d-flex justify-content-between">
                        <div class="px-2">
                            <div class="timer-box">13</div>
                            <small class="poppins-light-italic">Jam</small>
                        </div>
                        <div class="px-2">
                            <div class="timer-box">03</div>
                            <small class="poppins-light-italic">Hari</small>
                        </div>
                        <div class="px-2">
                            <div class="timer-box">23</div>
                            <small class="poppins-light-italic">Menit</small>
                        </div>
                        <div class="px-2">
                            <div class="timer-box">30</div>
                            <small class="poppins-light-italic">Detik</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container mt-5 mb-5 pt-5 pb-5">
    <h3 class="text-danger poppins-semibold">
        <span class="brand-line"></span>Brand Pilihan
    </h3>
    <p class="poppins-regular" style="width: 900px">
        Lorem ipsum dolor sit amet, consectetur adipiscing
        elit, sed do eiusmod tempor incididunt ut labore et 
        dolore magna aliqua. Ut enim ad minim veniam, quis nost
    </p>
    <img class="img-fluid" src="{{asset('frontend/img/merk.png')}}" alt="Phone">
</div>


<div class="image-background" style="margin-top: 120px; margin-bottom: 80px">
    <div class="container text-start pt-4 pb-4">
        <h3 class="text-white poppins-semibold">
            <span class="brand-line-white"></span>Produk Populer Bulan Ini
        </h3>
        <p class="poppins-regular text-white pt-3" style="width: 900px">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud.
        </p>
        <div class="row pb-4 pt-2">
            <div class="col-md-3 d-flex justify-content-center">
                <div class="card border rounded-4">
                    <img src="{{asset('frontend/img/pop.png')}}" class="card-img-top" alt="Samsung Galaxy A25 5G">
                    <div class="card-body">
                        <h5 class="card-title poppins-semibold">SAMSUNG GALAXY A25 5G</h5>
                        <p style="color: #828282; font-size: 12px" class="card-text poppins-regular">Triple Camera 50MP + OIS | Layar Super Amoled + 120Hz | Baterai 5000mAh</p>
                        <p class=" poppins-bold"><strong>Rp 4.999.000</strong> <span class="discount-tag poppins-medium">35% Off</span></p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 d-flex justify-content-center">
                <div class="card border rounded-4">
                    <img src="{{asset('frontend/img/pop.png')}}" class="card-img-top" alt="Samsung Galaxy A25 5G">
                    <div class="card-body">
                        <h5 class="card-title poppins-semibold">SAMSUNG GALAXY A25 5G</h5>
                        <p style="color: #828282; font-size: 12px" class="card-text poppins-regular">Triple Camera 50MP + OIS | Layar Super Amoled + 120Hz | Baterai 5000mAh</p>
                        <p class=" poppins-bold"><strong>Rp 4.999.000</strong> <span class="discount-tag poppins-medium">35% Off</span></p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 d-flex justify-content-center">
                <div class="card border rounded-4">
                    <img src="{{asset('frontend/img/pop.png')}}" class="card-img-top" alt="Samsung Galaxy A25 5G">
                    <div class="card-body">
                        <h5 class="card-title poppins-semibold">SAMSUNG GALAXY A25 5G</h5>
                        <p style="color: #828282; font-size: 12px" class="card-text poppins-regular">Triple Camera 50MP + OIS | Layar Super Amoled + 120Hz | Baterai 5000mAh</p>
                        <p class=" poppins-bold"><strong>Rp 4.999.000</strong> <span class="discount-tag poppins-medium">35% Off</span></p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 d-flex justify-content-center">
                <div class="card border rounded-4">
                    <img src="{{asset('frontend/img/pop.png')}}" class="card-img-top" alt="Samsung Galaxy A25 5G">
                    <div class="card-body">
                        <h5 class="card-title poppins-semibold">SAMSUNG GALAXY A25 5G</h5>
                        <p style="color: #828282; font-size: 12px" class="card-text poppins-regular">Triple Camera 50MP + OIS | Layar Super Amoled + 120Hz | Baterai 5000mAh</p>
                        <p class=" poppins-bold"><strong>Rp 4.999.000</strong> <span class="discount-tag poppins-medium">35% Off</span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container mt-5 mb-5 pb-5 pt-5">
    <h3 class="text-danger poppins-semibold">
        <span class="brand-line"></span>Testimonial
    </h3>
    <p class="poppins-regular" style="width: 900px">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud.
    </p>
    <div class="row text-center g-4">
        <div class="col-md-4">
            <img src="{{asset('frontend/img/pop.png')}}" class=" rounded-circle mx-auto" style="width: 100px; height: 100px;" alt="Angga Anugerah">
            <div class=" card p-3 border-0 mt-3">
                <div class="card-body">
                    <h5 class="poppins-semibold card-title">Angga Anugerah</h5>
                    <p class="poppins-regular card-text">"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut"</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <img src="{{asset('frontend/img/pop.png')}}" class=" rounded-circle mx-auto" style="width: 100px; height: 100px;" alt="Dimas Anggara">
            <div class=" card p-3 border-0 mt-3">
                <div class="card-body">
                    <h5 class="poppins-semibold card-title">Dimas Anggara</h5>
                    <p class="poppins-regular card-text">"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut"</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <img src="{{asset('frontend/img/pop.png')}}" class=" rounded-circle mx-auto" style="width: 100px; height: 100px;" alt="Farah Nabila">
            <div class=" card p-3 border-0 mt-3">
                <div class="card-body">
                    <h5 class="poppins-semibold card-title">Farah Nabila</h5>
                    <p class="poppins-regular card-text">"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut"</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container pt-5 pb-5 mb-5">
    <div class="row">
        <div class="col-md-6 mt-5">
            <!-- Embed YouTube Video -->
            <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/VIDEO_ID" allowfullscreen></iframe>
            </div>
        </div>
        <div class="col-md-6">
            <h4 class="text-danger poppins-semibold">
                <span class="brand-line"></span>Kenapa Harus Di LimaWaktu?
            </h4>
            <p class="poppins-regular">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            <div class="list-unstyled">
                <div class="border border-1 rounded-4 p-2 mb-3 shadow d-flex align-items-center justify-content-start p-2">
                    <img class="p-2" width="70px" src="{{asset('frontend/img/icon/whycek.png')}}" alt="">
                    <div>
                        <p class="mb-0 poppins-semibold" style="font-size: 18px">Jaminan Produk Resmi</p>
                        <p class="mb-0 poppins-regular" style="font-size: 14px">Kami Menjamin Kualitas Produk Resmi yang Tidak Diragukan untuk Setiap Pembelian Anda.</p>
                    </div>
                </div>
                <div class="border border-1 rounded-4 p-2 mb-3 shadow d-flex align-items-center justify-content-start p-2">
                    <img class="p-2" width="70px" src="{{asset('frontend/img/icon/whyphone.png')}}" alt="">
                    <div>
                        <p class="mb-0 poppins-semibold" style="font-size: 18px">Jaminan Produk Resmi</p>
                        <p class="mb-0 poppins-regular" style="font-size: 14px">Kami Menjamin Kualitas Produk Resmi yang Tidak Diragukan untuk Setiap Pembelian Anda.</p>
                    </div>
                </div>
                <div class="border border-1 rounded-4 p-2 mb-3 shadow d-flex align-items-center justify-content-start p-2">
                    <img class="p-2" width="70px" src="{{asset('frontend/img/icon/whytouchp.png')}}" alt="">
                    <div>
                        <p class="mb-0 poppins-semibold" style="font-size: 18px">Jaminan Produk Resmi</p>
                        <p class="mb-0 poppins-regular" style="font-size: 14px">Kami Menjamin Kualitas Produk Resmi yang Tidak Diragukan untuk Setiap Pembelian Anda.</p>
                    </div>
                </div>
                {{-- <div class="border border-1">
                    <i class="fas fa-headset text-success"></i> Pusat Bantuan Pelanggan</div>
                <div class="border border-1">
                    <i class="fas fa-credit-card text-success"></i> Cara Beli & Bayar yang Fleksibel</div> --}}
            </div>
        </div>
    </div>
</div>

<div class="image-backgroundfoot p-3">
    <div class="row">
        <div class="col text-center">
            <img src="{{asset('frontend/img/hubme.png')}}" alt="">
        </div>
        <div class="col">
            <div class="pt-5 mt-5"></div>
            <h3 class="text-white mt-5 pt-5">Masih ragu dan bingung dengan layanan kami ?</h3>
            <p class="text-white">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
            </p>
            <button class="btn btn-primary">Hubungi Kami</button>
        </div>
    </div>
</div>
<div class="container pt-4 pb-3">
    <div class="mx-auto">
        <div class="d-flex justify-content-between">
            <img class="mt-2" width="80px" height="35px" src="{{asset('frontend/img/pay/ipay.png')}}" alt="">
            <img width="120px" height="60px" src="{{asset('frontend/img/pay/gpay.png')}}" alt="">
            <img class="mt-2" width="70px" height="40px" src="{{asset('frontend/img/pay/samsungpay.png')}}" alt="">
            <img class="mt-0" width="100px" height="70px" src="{{asset('frontend/img/pay/alipay.png')}}" alt="">
            <img class="mt-2" width="70px" height="50px" src="{{asset('frontend/img/pay/visa.png')}}" alt="">
            <img class="mt-2" width="70px" height="40px" src="{{asset('frontend/img/pay/maestro.png')}}" alt="">
            <img class="mt-2" width="70px" height="40px" src="{{asset('frontend/img/pay/mastercard.png')}}" alt="">
            <img class="mt-2" width="70px" height="40px" src="{{asset('frontend/img/pay/cirrus.png')}}" alt="">
        </div>
    </div>
</div>
@endsection
@push('script')
<script src="https://kit.fontawesome.com/d911015868.js" crossorigin="anonymous"></script>
@endpush
