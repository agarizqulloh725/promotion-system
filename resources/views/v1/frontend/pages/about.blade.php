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
    /* background-image: url({{asset('frontend/img/bg-nav2.jpg')}}); */
    background-color: red;
    /* background-size: cover; */
    background-position: center;
    height: 370px;
    
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
    width: 3px;
    height: 30px;
    background-color: red; 
    margin-right: 10px; 
    vertical-align: middle; 
}
.brand-line-white {
    display: inline-block;
    width: 3px; 
    height: 30px; 
    background-color: white; 
    margin-right: 10px; 
    vertical-align: middle; 
}
.discount-tag {
    padding: 0.2em 0.6em; 
    border: 2px solid #000; 
    font-size: 0.8rem; 
    border-radius: 5px; 
    display: inline-block; 
}
.stat-row {
    position: relative;
}

.stat-item {
    padding: 20px;
    border-right: 1px solid #ccc; 
}

.stat-item:last-child {
    border-right: none; 
}


.btn-custom {
    background-color: white;
    color: red;
    border: 1px solid red;
    border-radius: 25px;
}
.btn-custom:hover {
    background-color: red;
    color: white;
}
.btn-custom .whatsapp-icon {
    margin-right: 8px;
}

@media (max-width: 768px) {
    .stat-item {
        border-right: none;
        border-bottom: 1px solid #ccc;
    }

    .stat-item:last-child {
        border-bottom: none;
    }
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
    .imgg {
        width: 50%;
    }
    .jj1{
        margin-top: -150px;
    }
    .jj2{
    }
    .textnav{
        font-size: 12px; !important
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
    .imgg {
        width: 50%;
    }
    .jj1{
        margin-top: -150px;
    }
    .mysosmed{
        width: 250px;
    }
    .mynav{
        width: 250px;
        font-size: 1px
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
    .imgg {
        width: 50%;
    }
    .jj1{
        margin-top: -150px;
    }
    .mysosmed{
        width: 300px;
    }
    .mynav{
        width: 300px;
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
    .imgg {
        width: 50%;
    }
    .jj1{
        margin-top: -150px;
    }
    .mysosmed{
        width: 350px;
    }
    .mynav{
        width: 350px;
    }
    .textnav{
        font-size: 18px; !important
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
    .imgg {
        width: auto;
    }
    .jj1{
        margin-top: 0px;
    }
    .mysosmed{
        width: 450px;
    }
    .mynav{
        width: 450px;
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
    .mysosmed{
        width: 450px;
    }
    .mynav{
        width: 450px;
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
    .mysosmed{
        width: 450px;
    }
    .mynav{
        width: 450px;
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

<div class="container pt-5 mt-5">
    <div class="row pt-5 mt-5">
        <div class="col-md-4 order-2 order-md-1 d-flex justify-content-center align-items-center">
            <img class="img-fluid" src="{{asset('frontend/img/limawrounded.png')}}" alt="Phone">
        </div>
        <div class="col order-2 order-md-1">
            <h2 class="poppins-semibold text-danger" >LIMAWAKTU - Jujur Harganya</h2>
            <p class="poppins-regular pt-3" style="font-size: 18px">
                LIMAWAKTU  adalah solusi terbaik untuk kebutuhan gadget Anda. Kami 
                menawarkan produk dengan harga yang jujur dan transparan, sehingga 
                Anda selalu mendapatkan nilai terbaik. Dengan lebih dari 5 tahun pengalaman, 
                kami telah melayani ribuan pelanggan dengan produk-produk berkualitas tinggi.
            </p>
            <div class="row stat-row">
                <div class="col-md-3 text-center stat-item">
                    <img  src="{{asset('frontend/img/icon/about1.png')}}" class="img-fluid mb-2" style="width: 35px;" alt="Icon">
                    <h5 class="mt-2 poppins-semibold">5 Tahun</h5>
                    <p class="poppins-regular">Berdiri Sejak 2019</p>
                </div>
                <div class="col-md-3 text-center stat-item">
                    <img  src="{{asset('frontend/img/icon/about2.png')}}" class="img-fluid mb-2" style="width: 35px;" alt="Icon">
                    <h5 class="mt-2 poppins-semibold">300+</h5>
                    <p class="poppins-regular">Produk Tersedia</p>
                </div>
                <div class="col-md-3 text-center stat-item">
                    <img  src="{{asset('frontend/img/icon/SmileyWink.png')}}" class="img-fluid mb-2" style="width: 35px;" alt="Icon">
                    <h5 class="mt-2 poppins-semibold">10rb+</h5>
                    <p class="poppins-regular">Pelanggan Puas</p>
                </div>
                <div class="col-md-3 text-center stat-item">
                    <img  src="{{asset('frontend/img/icon/about4.png')}}" class="img-fluid mb-2" style="width: 35px;" alt="Icon">
                    <h5 class="mt-2 poppins-semibold">#1</h5>
                    <p class="poppins-regular">Terbaik Di Indonesia</p>
                </div>
            </div>            
        </div>
    </div>
</div>

<div class="container pt-5 pb-5 mb-5">
    <div class="row pt-5 mt-5">
        <!-- Menggunakan kelas col-md-8 untuk medium devices dan col-lg-6 untuk large devices -->
        <div class="col-md-8 col-lg-6">
            <h2 class="poppins-semibold text-danger">Temukan Inovasi Terkini dalam Gadget Pengalaman Belanja yang Tanpa Batas!</h2>
            <p class="poppins-regular pt-3" style="font-size: 18px">
                Nikmati berbagai inovasi terbaru dalam gadget yang akan memberikan Anda pengalaman berbelanja yang tiada tanding.
                Temukan beragam produk berkualitas yang siap memenuhi kebutuhan teknologi Anda dengan jaminan layanan terbaik.
            </p>
            <div class="d-flex flex-column flex-sm-row justify-content-center justify-content-md-center pb-4 gap-3">
                <div class="poppins-medium text-center">
                    <img width="25px" src="{{asset('frontend/img/checked-i.png')}}" alt=""> 100% Terpercaya
                </div>
                <div class="poppins-medium text-center">
                    <img width="25px" src="{{asset('frontend/img/checked-i.png')}}" alt=""> Bahan Berkualitas
                </div>
                <div class="poppins-medium text-center">
                    <img width="25px" src="{{asset('frontend/img/checked-i.png')}}" alt=""> Layanan Terbaik
                </div>
            </div>            
            <button class="btn btn-danger p-2 poppins-medium">Hubungi Kami Sekarang</button>
        </div>
        <!-- Menggunakan kelas col-md-4 untuk medium devices dan col-lg-6 untuk large devices -->
        <div class="col-md-4 col-lg-6 d-flex justify-content-center align-items-center">
            <img src="{{asset('frontend/img/phone.png')}}" alt="Phone" class="img-fluid"> <!-- class img-fluid untuk responsive image -->
        </div>
    </div>
</div>


<div class="container mt-5 pt-5 pb-5 mb-4">
    <div class="row">
        <div class="col-md-6 mt-5">
        <div style="position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden;">
            <iframe src="https://www.youtube.com/embed/xXh3M8EFPV4?si=PXyHBebHVuB_1UAv" 
                    style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;" 
                    frameborder="0" 
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                    allowfullscreen 
                    title="YouTube video player">
            </iframe>
        </div>
        </div>
        <div class="col-md-6">
            <h4 class="text-danger poppins-semibold">
                <span class="brand-line"></span>Kenapa Harus Di LimaWaktu?
            </h4>
            <p class="poppins-regular">Kami menyediakan berbagai keuntungan dan jaminan bagi Anda yang berbelanja di toko kami. Berikut beberapa alasan mengapa Anda harus memilih kami:</p>
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
            </div>
        </div>
    </div>
</div>

<div class="image-backgroundfoot pt-5" style="margin-top: 100px;">
    <div class="container">
        <div class="row">
            <div class="col-md-6 d-flex justify-content-center justify-content-md-start">
                <img src="{{ asset('frontend/img/hubme.png') }}" alt="Gambar Layanan" class="img-fluid imgg" style="max-width: 100%; position: relative; top: -150px;">
            </div>
            <div class="col-md-6 text-white mt-md-0 pt-md-0">
                <h3 class="jj1 poppins-medium">Masih ragu dan bingung dengan layanan kami?</h3>
                <p class="jj2 poppins-light">
                    Jangan khawatir, kami siap membantu Anda! Hubungi kami sekarang juga untuk mendapatkan penawaran terbaik dan layanan yang memuaskan. Temukan berbagai promo menarik dan kemudahan dalam bertransaksi hanya di toko kami.
                </p>
                <button class="btn btn-custom">
                    <i class="fa fa-whatsapp whatsapp-icon"></i> Hubungi Kami
                </button>
            </div>
        </div>
    </div>
</div>

@endsection
@push('script')
<script src="https://kit.fontawesome.com/d911015868.js" crossorigin="anonymous"></script>
@endpush
