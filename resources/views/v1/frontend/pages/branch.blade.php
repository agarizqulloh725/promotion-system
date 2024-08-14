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
    height:400px;
    /* background-size: cover; */
    /* background-position: center; */
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
</style>
@endpush

@section('content')

{{-- content header --}}
<div class="image-background p-3">
    <div class="container">
        <h3 class="text-white poppins-semibold title">Toko Cabang</h3>
        <p class="text-white poppins-regular t-desc spacing-1 mt-4">Kunjungi berbagai cabang toko kami yang tersebar di seluruh wilayah untuk mendapatkan produk
            <br> unggulan kami. Setiap cabang menawarkan pengalaman berbelanja yang 
            <br> nyaman dan pelayanan terbaik untuk memenuhi kebutuhan Anda.
        
        </p>
        <nav aria-label="breadcrumb mt-2">
            <ol class="breadcrumb">
                <li class="breadcrumb-item poppins-light"><a href="#">Beranda</a></li>
                <li class="breadcrumb-item poppins-medium active text-white" aria-current="page">Toko Cabang</li>
            </ol>
        </nav>
    </div>
</div>

@foreach ($branch as $mybranch)
{{-- content body --}}
<div class="container my-4 pt-5">
    <div class="card border-1 shadow rounded-3">
        <div class="row g-0">
            <div class="col-md-4 d-flex justify-content-between align-items-center">
                <div class="p-2">
                    <img class="img-fluid rounded-3" width="450px" src="{{asset('public/images/branch/'.$mybranch->image)}}" alt="Lima Waktu - Waru">
                </div>
            </div>
            <!-- Content Column -->
            <div class="col-md-8">
                <div class="card-body">
                    <h3 class="card-title poppins-semibold">{{$mybranch->name}}</h3>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="" style="width: 700px">
                            <p class="poppins-regular">{{$mybranch->address}}</p>
                        </div>
                        <a href="https://wa.me/62{{ ltrim($mybranch->wa, '0') }}" target="_blank">
                            <img class="p-2" width="80px" src="{{ asset('frontend/img/icon/iconwa.png') }}" alt="WhatsApp Icon">
                        </a>
                    </div>
                    <!-- Map Embed -->
                    <div class="embed-responsive embed-responsive-16by9 ">
                        <iframe class="w-100 h-100" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3153.0153790414093!2d{{$mybranch->lang}}!3d{{$mybranch->lat}}!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x808fb5b5eacb96d3%3A0x2a6f263ad0b08b8!2sGoogleplex!5e0!3m2!1sen!2sus!4v1641393289245!5m2!1sen!2sus" allowfullscreen></iframe>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach


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

{{-- <div class="container pt-4 pb-3">
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
</div> --}}
@endsection
@push('script')
<script src="https://kit.fontawesome.com/d911015868.js" crossorigin="anonymous"></script>
@endpush
