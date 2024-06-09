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

<div class="container pt-5 mt-5">
    <div class="row pt-5 mt-5">
        <div class="col-4 d-flex justify-content-center align-items-center">
            <img class="img-fluid" src="{{asset('frontend/img/limawrounded.png')}}" alt="Phone">
        </div>
        <div class="col">
            <h2 class="poppins-semibold text-danger" >LIMAWAKTU - Jujur Harganya</h2>
            <p class="poppins-regular pt-3" style="font-size: 18px">
                LIMAWAKTU adalah Lorem ipsum dolor sit amet, consectetur adipiscing elit, 
                sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim 
                ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.
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

{{-- content header --}}
<div class="container pt-5 pb-5 mb-5">
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

<div class="container mt-5 pt-5 pb-5 mb-4">
    <div class="row">
        <div class="col-md-6 mt-5">
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
