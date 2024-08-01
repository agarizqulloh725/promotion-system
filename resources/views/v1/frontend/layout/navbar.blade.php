    <nav class="navbar navbar-expand-lg fixed-top bg-black p-4">
        <div class="container">
            <a class="navbar-brand" href="#">
                {{-- <img src="{{asset('images/color/color_664ce8105d52c.jpg')}}" alt="logo" width="30"> --}}
                <img src="{{asset('frontend/img/logolima.png')}}" alt="logo-navbar"  width="50%" height="50%">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto gap-4">
                    <li class="nav-item">
                        <a class="nav-link poppins-regular text-white {{ request()->is('/') ? 'active' : '' }}" aria-current="page" href="/">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link poppins-regular text-white {{ request()->is('product') ? 'active' : '' }}" href="/product">Produk</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link poppins-regular text-white {{ request()->is('promo') ? 'active' : '' }}" href="/promo">Promo</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link poppins-regular text-white {{ request()->is('branch') ? 'active' : '' }}" href="/branch">Cabang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link poppins-regular text-white {{ request()->is('about') ? 'active' : '' }}" href="/about">About</a>
                    </li>
                </ul>                
                <button class="btn btn-outline-danger poppins-regular btn-custom-nav ms-2" type="button">Hubungi Kami</button>
            </div>
        </div>
    </nav> 