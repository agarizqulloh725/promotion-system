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
</style>
@endpush

@section('content')

{{-- content header --}}
<div class="image-background p-3">
    <h3 class="text-white poppins-semibold title">Promo</h3>
    <p class="text-white poppins-regular t-desc spacing-1 mt-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit,
    sed do eiusmod tempor <br> incididunt ut labore et dolore magna aliqua.
    </p>
    <nav aria-label="breadcrumb mt-2">
        <ol class="breadcrumb">
            <li class="breadcrumb-item poppins-light"><a href="#">Beranda</a></li>
            <li class="breadcrumb-item poppins-medium active text-white" aria-current="page">Produk</li>
        </ol>
    </nav>
</div>

{{-- content body --}}
<div class="container mt-3">
    <div class="row">
        <div class="col-md-3">
            <h5 class="poppins-semibold mb-3 mt-2">Filter</h5>
            <div class="border border-1 rounded-4 p-4 shadow">
                <div class="dropdown">
                    <a class="text-reset text-body text-decoration-none" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="d-flex align-items-center justify-content-between">
                            <p class="mb-0 poppins-regular">iPhone</p>
                            <i class="fas fa-chevron-right"></i>
                        </div>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <li><a class="dropdown-item" href="#">iPhone 13</a></li>
                        <li><a class="dropdown-item" href="#">iPhone 13 Pro</a></li>
                        <li><a class="dropdown-item" href="#">iPhone 12</a></li>
                    </ul>
                </div>
                <hr>
                <div class="dropdown mt-2">
                    <a class="text-reset text-body text-decoration-none" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="d-flex align-items-center justify-content-between">
                            <p class="mb-0 poppins-semibold" style="font-size: 20px">Seri Produk</p>
                        </div>
                    </a>
                    <div class="container mt-2">
                        <div class="row g-2">
                            <div class="col"><button class="btn btn-outline-secondary rounded-pill">2016</button></div>
                            <div class="col"><button class="btn btn-outline-secondary rounded-pill">2017</button></div>
                            <div class="col"><button class="btn btn-outline-secondary rounded-pill">2018</button></div>
                            <div class="col"><button class="btn btn-outline-secondary rounded-pill">2019</button></div>
                            <div class="col"><button class="btn btn-outline-secondary rounded-pill">2020</button></div>
                            <div class="col"><button class="btn btn-outline-secondary rounded-pill">2021</button></div>
                            <div class="col"><button class="btn btn-outline-secondary rounded-pill">2022</button></div>
                            <div class="col"><button class="btn btn-danger rounded-pill">2023</button></div>
                            <div class="col"><button class="btn btn-outline-secondary rounded-pill">2024</button></div>
                        </div>
                    </div>  
                </div>
                <hr>
                <div class="dropdown">
                    <a class="text-reset text-body text-decoration-none" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="d-flex align-items-center justify-content-between">
                            <p class="mb-0 poppins-semibold" style="font-size: 20px">Promo</p>
                        </div>
                    </a>
                    <ul class=" px-2 py-2 list-unstyled" aria-labelledby="dropdownMenuButton">
                        <li><button class="btn btn-outline-secondary rounded-pill w-100 mb-2">Discount</button></li>
                        <li><button class="btn btn-outline-secondary rounded-pill w-100 mb-2">Cashback</button></li>
                        <li><button class="btn btn-outline-secondary rounded-pill w-100">Bonus</button></li>
                    </ul>
                </div>
                <div class="px-2">
                    <button class=" pt-3 pb-3 btn btn-danger rounded-pill w-100 text-white poppins-medium" style="font-size: 14px">Terapkan Filter</button>
                </div>

            </div>
            
        </div>
        <div class="col-md-9">
            <div class="d-flex justify-content-end align-items-center pt-0 pt-lg-0 pt-sm-3 pt-md-3 ctr-urutkan">
                <span class="me-2 poppins-semibold">Urutkan: </span>
                <div class="dropdown">
                    <button class="btn btn-outline-danger dropdown-toggle rounded-pill poppins-medium" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                        Paling Sesuai
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <li><a class="dropdown-item" href="#">Paling Sesuai</a></li>
                        <li><a class="dropdown-item" href="#">Terbaru</a></li>
                        <li><a class="dropdown-item" href="#">Paling Populer</a></li>
                    </ul>
                </div>
            </div>
            <div class="row pt-3">
                <!-- Single product -->
                <div class="col-md-4 mb-4">
                    <div class="card border-1 rounded-4 shadow">
                        <img class="card-img-top pt-2" src="{{asset('images/product/samsung.png')}}" alt="Samsung Galaxy S24">
                        <div class="card-body">
                            <h5 class="card-title">SAMSUNG GALAXY S24</h5>
                            <p class="card-text mb-4">
                                Triple Camera 50MP + OIS | Layar Super Amoled + 120Hz | Baterai 5000mAh
                            </p>  
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h5 class="fw-bold m-0">Rp 21.999.000</h5>
                                <span class="badge bg-danger">35% Off</span>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-center align-items-center gap-2">
                                <button class="btn btn-danger rounded-pill w-100">Lihat Produk</button>
                                <button class="btn btn-outline-danger rounded-circle">
                                    <i class="fas fa-heart"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card border-1 rounded-4 shadow">
                        <img class="card-img-top pt-2" src="{{asset('images/product/samsung.png')}}" alt="Samsung Galaxy S24">
                        <div class="card-body">
                            <h5 class="card-title">SAMSUNG GALAXY S24</h5>
                            <p class="card-text mb-4">
                                Triple Camera 50MP + OIS | Layar Super Amoled + 120Hz | Baterai 5000mAh
                            </p>  
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h5 class="fw-bold m-0">Rp 21.999.000</h5>
                                <span class="badge bg-danger">35% Off</span>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-center align-items-center gap-2">
                                <button class="btn btn-danger rounded-pill w-100">Lihat Produk</button>
                                <button class="btn btn-outline-danger rounded-circle">
                                    <i class="fas fa-heart"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card border-1 rounded-4 shadow">
                        <img class="card-img-top pt-2" src="{{asset('images/product/samsung.png')}}" alt="Samsung Galaxy S24">
                        <div class="card-body">
                            <h5 class="card-title">SAMSUNG GALAXY S24</h5>
                            <p class="card-text mb-4">
                                Triple Camera 50MP + OIS | Layar Super Amoled + 120Hz | Baterai 5000mAh
                            </p>  
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h5 class="fw-bold m-0">Rp 21.999.000</h5>
                                <span class="badge bg-danger">35% Off</span>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-center align-items-center gap-2">
                                <button class="btn btn-danger rounded-pill w-100">Lihat Produk</button>
                                <button class="btn btn-outline-danger rounded-circle">
                                    <i class="fas fa-heart"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card border-1 rounded-4 shadow">
                        <img class="card-img-top pt-2" src="{{asset('images/product/samsung.png')}}" alt="Samsung Galaxy S24">
                        <div class="card-body">
                            <h5 class="card-title">SAMSUNG GALAXY S24</h5>
                            <p class="card-text mb-4">
                                Triple Camera 50MP + OIS | Layar Super Amoled + 120Hz | Baterai 5000mAh
                            </p>  
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h5 class="fw-bold m-0">Rp 21.999.000</h5>
                                <span class="badge bg-danger">35% Off</span>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-center align-items-center gap-2">
                                <button class="btn btn-danger rounded-pill w-100">Lihat Produk</button>
                                <button class="btn btn-outline-danger rounded-circle">
                                    <i class="fas fa-heart"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card border-1 rounded-4 shadow">
                        <img class="card-img-top pt-2" src="{{asset('images/product/samsung.png')}}" alt="Samsung Galaxy S24">
                        <div class="card-body">
                            <h5 class="card-title">SAMSUNG GALAXY S24</h5>
                            <p class="card-text mb-4">
                                Triple Camera 50MP + OIS | Layar Super Amoled + 120Hz | Baterai 5000mAh
                            </p>  
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h5 class="fw-bold m-0">Rp 21.999.000</h5>
                                <span class="badge bg-danger">35% Off</span>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-center align-items-center gap-2">
                                <button class="btn btn-danger rounded-pill w-100">Lihat Produk</button>
                                <button class="btn btn-outline-danger rounded-circle">
                                    <i class="fas fa-heart"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card border-1 rounded-4 shadow">
                        <img class="card-img-top pt-2" src="{{asset('images/product/samsung.png')}}" alt="Samsung Galaxy S24">
                        <div class="card-body">
                            <h5 class="card-title">SAMSUNG GALAXY S24</h5>
                            <p class="card-text mb-4">
                                Triple Camera 50MP + OIS | Layar Super Amoled + 120Hz | Baterai 5000mAh
                            </p>  
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h5 class="fw-bold m-0">Rp 21.999.000</h5>
                                <span class="badge bg-danger">35% Off</span>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-center align-items-center gap-2">
                                <button class="btn btn-danger rounded-pill w-100">Lihat Produk</button>
                                <button class="btn btn-outline-danger rounded-circle">
                                    <i class="fas fa-heart"></i>
                                </button>
                            </div>
                        </div>
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
