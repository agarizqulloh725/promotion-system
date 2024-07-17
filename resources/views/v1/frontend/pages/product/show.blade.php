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
.specs-table {
    width: 100%;
    text-align: center;
    border-collapse: collapse;
}
.specs-table td, .specs-table th {
    border: 1px solid #ddd;
    padding: 8px;
}
.specs-table th {
    background-color: #f2f2f2;
    color: red;
}
.thumbnail-img {
            cursor: pointer;
            opacity: 0.6;
        }
        .thumbnail-img:hover {
            opacity: 1;
        }
        .active-thumbnail {
            opacity: 1;
            border: 2px solid red;
        }
        #main-image {
            width: 100%;
            height: auto;
        }
.activ-spec{
    background-color: red !important;
    color: white !important;
}
.inactiv-spec{
    background-color: #F0F0F0;
    color: rgb(0, 0, 0) !important;
}
.color-circle {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    /* border: 2px solid #FF0000;  */
}
.active-color-circle {
    border: 2px solid #FF0000;
}

.show-more {
    color: red;
    cursor: pointer;
    display: none;
}
.hidden-text {
    display: none;
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
<div class="container pb-4" style="padding-top: 120px">
    <p class="poppins-regular" style="color: #828282;">
        <a href="/" style="color: #828282; text-decoration: none;">Beranda</a> >
        <a href="/product" style="color: #828282; text-decoration: none;">Product</a> >
        <a href="/product/samsung-galaxy-a15" style="color: #000000; text-decoration: none;">Samsung Galaxy A15</a>
    </p>    
<div class="row pt-3">
    <div class="col-6">
        <div class="row">
            <div class="col-3">
                <div class="row">
                    <div class="col-12 mb-2">
                        <img class="img-fluid thumbnail-img" src="{{asset('frontend/img/phone2.png')}}" alt="Phone Image" onclick="changeImage(this)" style="width: 110px;">
                    </div>
                    <div class="col-12 mb-2">
                        <img class="img-fluid thumbnail-img" src="{{asset('frontend/img/phone2.png')}}" alt="Phone Image" onclick="changeImage(this)" style="width: 110px;">
                    </div>
                    <div class="col-12">
                        <img class="img-fluid thumbnail-img" src="{{asset('frontend/img/phone2.png')}}" alt="Phone Image" onclick="changeImage(this)" style="width: 110px;">
                    </div>
                </div>
            </div>
            <div class="col">
                <img id="main-image" src="{{asset('frontend/img/phone.png')}}" alt="Main Phone Image">
            </div>
        </div>
    </div>
    <div class="col">
        @foreach ($product as $key => $prd)
            <h4 class=""  onclick="window.location='{{ route('productDetail', $prd['id']) }}'">{{ $prd['name'] }}</h4>
            <div class="d-flex align">
                <h4 class="text-danger poppins-bold">Rp {{ $prd['price'] }}</h4>
                <p style="" class="poppins-semibold">&nbsp Rp 4.250.000</p>
                <button class="btn rounded-pill poppins-medium text-danger" style="background-color: #ff00000e">-10%</button>
            </div>
        
            <hr>

            {{-- Spesification --}}
            <div class="spec">
                <p class="poppins-medium">SPESIFIKASI</p>
            <ul class="poppins-regular" id="spec-list">
                <li>
                    {{$prd['description']}}
                </li>
                <li>
                    Memori: RAM 8 GB, ROM 256 GB..... Ukuran layar: 6.5 inci, 1080 x 2340 pixels, Super AMOLED, 90Hz Ukuran layar: 6.5 inci, 1080 x 2340 pixels, Super AMOLED, 90Hz
                </li>
            </ul>
            <p class="poppins-semibold text-danger show-more" onclick="toggleText()">Lihat Selengkapnya</p>
            </div>

            <hr>
            <p class="poppins-regular" style="color: #000000">Pilih Spesifikasi</p>

            <div class="d-flex gap-3">
                @foreach ($prd['spec'] as $index => $spec)
                    <button data-index="{{ $index }}" id="spec-btn-{{ $index }}" class="btn spec-btn inactiv-spec poppins-regular rounded-pill">{{ $spec['spec_name'] }}</button>
                    
                    @endforeach
            </div>
        @endforeach
        <hr>
        <p class="poppins-regular">Pilih Varian Warna</p>
        <div class="d-flex justify-content-start gap-2">
            <div class="color-container " id="color-container">
                {{-- <div class="d-flex justify-content-start gap-2 color-list" id="color-list-{{ $index }}"
                    style="display: {{ $index == 0 ? 'flex' : 'none' }};">
                    @foreach ($spec['col'] as $col)
                        <img src="{{ asset('images/color/' . $col['color_image'])}}" alt="{{ $col['color_name'] }}">
                    @endforeach 
                {{-- </div> --}}
            </div>
        </div>
        
        <hr>
        <div class="d-flex justify-content-between gap-2">
            <button style="background-color: #31b16466; color: #31B164" class="btn poppins-medium rounded-pill pt-3 pb-3 w-25"> Available</button>
            <button class="btn btn-danger poppins-medium w-75 rounded-pill pt-3 pb-3">Pesan Sekarang</button>
        </div>
    </div>
</div>
</div>


<div class="container mt-5 mb-5 pt-5 pb-5">
    <div class="row">
        <div class="col-md-6">
            <h3 class="text-danger poppins-semibold">
                <span class="brand-line"></span>Product Description
            </h3>
            <div class="d-flex w-50 justify-content-between mt-3">
                <h5 class="poppins-medium">
                    Deskripsi
                </h5>
                <h5 class="poppins-medium" style="color: #7E7E7E">
                    Spesifikasi
                </h5>
                <h5 class="poppins-medium" style="color: #7E7E7E">
                    Promo
                </h5>
            </div>
            <div>
                <p style="text-align: justify;">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor 
                    incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis 
                    nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                </p>
                <table class="specs-table">
                    <tr>
                        <th>Ram</th>
                        <th>Storage</th>
                        <th>CPU</th>
                    </tr>
                    <tr>
                        <td>4gb | 8gb</td>
                        <td>128gb | 256gb</td>
                        <td>Mediatek Helio 699</td>
                    </tr>
                    <tr>
                        <th>Layar</th>
                        <th>Kamera</th>
                        <th>Baterai</th>
                    </tr>
                    <tr>
                        <td>6.5 inci, AMOLED</td>
                        <td>50MP</td>
                        <td>5000mAh</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="col-md-6">
            <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/VIDEO_ID" allowfullscreen></iframe>
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
@endsection
@push('script')
<script src="https://kit.fontawesome.com/d911015868.js" crossorigin="anonymous"></script>
<script>

</script>
<script >  
    
    var imageUrl  = "{{ asset('images/color/') }}";  
    document.addEventListener("DOMContentLoaded", function() {
        const listItems = document.querySelectorAll('#spec-list li');
        const showMoreText = document.querySelector('.show-more');

        listItems.forEach(item => {
            const words = item.textContent.trim().split(/\s+/);
            if (words.length > 20) {
                const visibleText = words.slice(0, 10).join(' ');
                const hiddenText = words.slice(10).join(' ');
                item.innerHTML = `${visibleText}<span class="hidden-text">${hiddenText}</span>`;
                showMoreText.style.display = 'block';
            }
        });

        const specButtons = document.querySelectorAll('.spec-btn.inactiv-spec');
        const product = @json($product);
        const colorContainer = document.querySelector('#color-container');

        if (specButtons.length > 0) {
            specButtons[0].classList.remove('inactiv-spec'); 
            specButtons[0].classList.add('activ-spec');
            colorContainer.innerHTML = '';

            const spec = product[0].spec[0];
            spec.col.forEach(color => {
                const img = document.createElement('img');
                img.src = imageUrl+'/'+color.color_image;
                img.alt = color.color_name;
                colorContainer.appendChild(img);
            });

        }

        // Color spec 
        specButtons.forEach(function(button, index) {
            button.addEventListener('click', function() {
                colorContainer.innerHTML = '';

                const spec = product[0].spec[index];
                spec.col.forEach(color => {
                    const img = document.createElement('img');
                    img.src = imageUrl+'/'+color.color_image;
                    console.log(img.src);
                    img.alt = color.color_name;
                    img.style.marginRight = '8px'; 
                    colorContainer.appendChild(img);
                });
                specButtons.forEach(b => {
                    b.classList.remove('activ-spec');
                    b.classList.add('inactiv-spec');
                });

                this.classList.remove('inactiv-spec');
                this.classList.add('activ-spec');
            });
        });
    });

        function toggleText() {
            const hiddenTexts = document.querySelectorAll('.hidden-text');
            const showMoreText = document.querySelector('.show-more');
            hiddenTexts.forEach(item => {
                if (item.style.display === 'none' || item.style.display === '') {
                    item.style.display = 'inline';
                    showMoreText.textContent = 'Lihat Lebih Sedikit';
                } else {
                    item.style.display = 'none';
                    showMoreText.textContent = 'Lihat Selengkapnya';
                }
            });
        }
    function changeImage(element) {
        var mainImage = document.getElementById('main-image');
        mainImage.src = element.src;
        mainImage.alt = element.alt;

        var thumbnails = document.querySelectorAll('.thumbnail-img');
        thumbnails.forEach(function(thumbnail) {
            thumbnail.classList.remove('active-thumbnail');
        });
        element.classList.add('active-thumbnail');
    }

    // document.addEventListener("DOMContentLoaded", function() {
    //     const listItems = document.querySelectorAll('#spec-list li');
    //     const showMoreText = document.querySelector('.show-more');

    //     listItems.forEach(item => {
    //         const words = item.textContent.split(' ');
    //         if (words.length > 20) {
    //             const visibleText = words.slice(0, 10).join(' ');
    //             const hiddenText = words.slice(10).join(' ');
    //             item.innerHTML = `${visibleText}<span class="hidden-text" style="display:none;"> ${hiddenText}</span>`;
    //             showMoreText.style.display = 'block';
    //         }
    //     });
    // });

    // function toggleText() {
    //     const hiddenTexts = document.querySelectorAll('.hidden-text');
    //     const showMoreText = document.querySelector('.show-more');
    //     hiddenTexts.forEach(item => {
    //         if (item.style.display === 'none' || item.style.display === '') {
    //             item.style.display = 'inline';
    //             showMoreText.textContent = 'Lihat Lebih Sedikit';
    //         } else {
    //             item.style.display = 'none';
    //             showMoreText.textContent = 'Lihat Selengkapnya';
    //         }
    //     });
    // }
</script>


@endpush
