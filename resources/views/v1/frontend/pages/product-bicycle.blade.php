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
.dropdown-item.activefill {
    background-color: #dc3545;
    color: white;
}
.slug {
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
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
    <h3 class="text-white poppins-semibold title">Produk</h3>
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
                    <a class="text-reset text-body text-decoration-none bg-primary" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="d-flex align-items-center justify-content-between">
                            <p class="mb-0 poppins-regular">Semua Merek</p>
                            <i class="fas fa-chevron-right"></i>
                        </div>
                    </a>
                    {{-- <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <li><a class="dropdown-item" href="#">iPhone 13</a></li>
                        <li><a class="dropdown-item" href="#">iPhone 13 Pro</a></li>
                        <li><a class="dropdown-item" href="#">iPhone 12</a></li>
                    </ul> --}}
                </div>
                <div id="brandUI"></div>
                <hr>
                <div class="dropdown mt-2">
                    <a class="text-reset text-body text-decoration-none" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="d-flex align-items-center justify-content-between">
                            <p class="mb-0 poppins-semibold" style="font-size: 20px">Seri Produk</p>
                        </div>
                    </a>
                    <div class="container mt-2">
                        <div class="row g-2 ctTahun">
                            <div class="col"><button class="btn btn-outline-secondary rounded-pill" onclick="setSelectedTahun(2016, event)">2016</button></div>
                            <div class="col"><button class="btn btn-outline-secondary rounded-pill" onclick="setSelectedTahun(2017, event)">2017</button></div>
                            <div class="col"><button class="btn btn-outline-secondary rounded-pill" onclick="setSelectedTahun(2018, event)">2018</button></div>
                            <div class="col"><button class="btn btn-outline-secondary rounded-pill" onclick="setSelectedTahun(2019, event)">2019</button></div>
                            <div class="col"><button class="btn btn-outline-secondary rounded-pill" onclick="setSelectedTahun(2020, event)">2020</button></div>
                            <div class="col"><button class="btn btn-outline-secondary rounded-pill" onclick="setSelectedTahun(2021, event)">2021</button></div>
                            <div class="col"><button class="btn btn-outline-secondary rounded-pill" onclick="setSelectedTahun(2022, event)">2022</button></div>
                            <div class="col"><button class="btn btn-outline-secondary rounded-pill" onclick="setSelectedTahun(2023, event)">2023</button></div>
                            <div class="col"><button class="btn btn-outline-secondary rounded-pill" onclick="setSelectedTahun(2024, event)">2024</button></div>
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
                    <ul class="px-2 py-2 list-unstyled ctPromo" aria-labelledby="dropdownMenuButton">
                        <li><button class="btn btn-outline-secondary rounded-pill w-100 mb-2" onclick="setSelectedPromo('Discount', event)">Discount</button></li>
                        <li><button class="btn btn-outline-secondary rounded-pill w-100 mb-2" onclick="setSelectedPromo('Cashback', event)">Cashback</button></li>
                        <li><button class="btn btn-outline-secondary rounded-pill w-100" onclick="setSelectedPromo('Bonus', event)">Bonus</button></li>
                    </ul>                    
                </div>
                <div class="px-2">
                    <button class=" pt-3 pb-3 btn btn-danger rounded-pill w-100 text-white poppins-medium" style="font-size: 14px" onclick="applyFilters()">Terapkan Filter</button>
                </div>

            </div>
            
        </div>
        <div class="col-md-9">
            <div class="d-flex justify-content-between align-items-center w-100">
                <div class="d-flex align-items-center">
                    <div class="d-flex">
                        <input type="text" class="form-control me-2 inputSearch" placeholder="Cari Product"  aria-label="Search">
                        {{-- <button class="btn btn-outline-danger buttonSearch" type="submit">Cari</button> --}}
                    </div>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                    <span class="me-2 poppins-semibold">Urutkan:</span>
                    <div class="dropdown">
                        <div class="btn btn-outline-danger dropdown-toggle rounded-pill poppins-medium" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                            Paling Sesuai
                        </div>
                        <ul class="dropdown-menu filterdropdown" aria-labelledby="dropdownMenuButton">
                            <li><div class="dropdown-item activefill" href="#" onclick="setSortOption('Paling Sesuai', event)">Paling Sesuai</div></li>
                            <li><div class="dropdown-item" href="#" onclick="setSortOption('Terbaru', event)">Terbaru</div></li>
                            <li><div class="dropdown-item" href="#" onclick="setSortOption('Paling Populer', event)">Paling Populer</div></li>
                        </ul>
                    </div>
                </div>                             
            </div>
            
            <div class="row pt-3" id="productListContainer">
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
            <div class="d-flex justify-content-center">
                <div>
                    <ul class="pagination" id="paginationContainer">
                    </ul>
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

<script>
var selectedYear = [];
var selectedBrand = [];
var selectedPromo = [];
var filterSort = "relevance";
var searchh = "";

async function fetchBrand() {
    try {
        const response = await fetch('http://127.0.0.1:8000/api/v1/get-brand');
        if (!response.ok) {
            throw new Error(`HTTP error! Status: ${response.status}`);
        }
        const result = await response.json();
        if (result.success && result.data) {
            updateUIBrand(result.data);
        } else {
            console.error('No brands data found:', result.message);
        }
    } catch (error) {
        console.error('Error fetching data: ', error);
    }
}
async function fetchTahun() {
    try {
        const response = await fetch('https://api.example.com/data');
        if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`);
        }
        const data = await response.json();
        console.log(data);
    } catch (error) {
        console.error('Error fetching data: ', error);
    }
} 
async function fetchProducts(pageUrl) {
    pageUrl = pageUrl || 'http://127.0.0.1:8000/api/v1/get-products';
    try {
        const response = await fetch(pageUrl);
        if (!response.ok) {
            throw new Error(`HTTP error! Status: ${response.status}`);
        }
        const result = await response.json();
        updateProductList(result.data.data);
        updatePagination(result.data.links);
    } catch (error) {
        console.error('Error fetching products:', error);
    }
}

async function applyFilters() {
    document.querySelector('.inputSearch').value = '';
    const years = selectedYear; 
    const brands = selectedBrand; 
    const promos = selectedPromo;

    const queryParams = new URLSearchParams({
        years: years.join(','),
        brands: brands.join(','),
        promos: promos.join(','),
    }).toString();

    const url = `http://127.0.0.1:8000/api/v1/get-products?${queryParams}`;

    try {
        const response = await fetch(url);
        if (!response.ok) {
            throw new Error(`HTTP error! Status: ${response.status}`);
        }
        const result = await response.json();
        if (result.success) {
            updateProductList(result.data.data);
        } else {
            console.error('Failed to fetch products:', result.message);
        }
    } catch (error) {
        console.error('Error fetching products:', error);
    }
}


function updateProductList(products) {
    const productListContainer = document.getElementById('productListContainer');
    productListContainer.innerHTML = '';
    products.forEach(product => {
    if(product){
        const imagePath = product.images.length > 0 ? product.images[0].name : 'default.jpg';
        const discountBadge = product.promo && product.promo.length > 0 && product.promo[0].discount ? 
            `<span class="badge bg-danger">${parseInt(product.promo[0].discount)}% Off</span>` : '';
        productListContainer.innerHTML += `
            <a class="col-md-4 mb-4 text-secondary text-decoration-none " href="/product/${product.id}">
                <div class="card border-1 rounded-4 shadow">
                    <img class="card-img-top pt-2" src="/images/product-image/${imagePath}" alt="${product.name}">
                    <div class="card-body">
                        <h5 class="card-title">${product.name}</h5>
                        <p class="card-text mb-4 slug">${product.slug}</p>
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h5 class="fw-bold m-0">Rp. ${parseInt(product.price)}</h5>
                            ${discountBadge}
                        </div>
                        <hr>
                        <div class="d-flex justify-content-center align-items-center gap-2">
                            <button class="btn btn-danger rounded-pill w-100">View Product</button>
                            <button class="btn btn-outline-danger rounded-circle">
                                <i class="fas fa-heart"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </a>
        `;
        }
    });
}

function updatePagination(links) {
    const paginationContainer = document.getElementById('paginationContainer');
    paginationContainer.innerHTML = '';
    links.forEach(link => {
        paginationContainer.innerHTML += `<a href="#" onclick="fetchProducts('${link.url}')" class="page-link ${link.active ? 'active' : ''}">${link.label}</a>`;
    });
}


function updateUIBrand(brands) {
    const container = document.getElementById('brandUI');
    container.innerHTML = ''; 
    brands.forEach(brand => {
        let dropdownHTML = `
            <div class="dropdown">
                <a onclick="setSelectedBrand(${brand.id}, event)" class="text-reset text-body text-decoration-none" href="#" id="dropdownMenuLink-${brand.id}">
                    <div class="d-flex align-items-center justify-content-between">
                        <p class="mb-0 poppins-regular">${brand.name}</p>
                        <i class="fas fa-chevron-right"></i>
                    </div>
                </a>
            </div>
        `;
        container.innerHTML += dropdownHTML;
    });
}

function setSelectedBrand(brandId, event) {
    event.preventDefault();
    console.log("Selected Brand ID:", brandId);

    const index = selectedBrand.indexOf(brandId);
    const isActive = index !== -1;
    const targetDiv = event.currentTarget.querySelector('div');

    if (isActive) {
        selectedBrand.splice(index, 1);
        targetDiv.classList.remove('bg-danger');
    } else {
        selectedBrand.push(brandId);
        targetDiv.classList.add('bg-danger');
    }

    console.log("Selected Brands:", selectedBrand);
}


function setSelectedPromo(typepromo, event) {
    event.preventDefault();
    console.log("Selected Promo Type:", typepromo);

    const index = selectedPromo.indexOf(typepromo);
    if (index === -1) {
        selectedPromo.push(typepromo);
    } else {
        selectedPromo.splice(index, 1);
    }

    const buttons = document.querySelectorAll('.ctPromo .btn');
    buttons.forEach(button => {
        if (selectedPromo.includes(button.textContent)) {
            button.classList.add('btn-danger');
            button.classList.remove('btn-outline-secondary');
        } else {
            button.classList.remove('btn-danger');
            button.classList.add('btn-outline-secondary');
        }
    });

    console.log("Selected Promos:", selectedPromo);
}


function setSelectedTahun(tahun, event) {
    event.preventDefault();
    console.log("Selected Year:", tahun);

    const index = selectedYear.indexOf(tahun);

    if (event.currentTarget.classList.contains('btn-danger')) {
        event.currentTarget.classList.remove('btn-danger');
        event.currentTarget.classList.add('btn-outline-secondary');
        if (index !== -1) {
            selectedYear.splice(index, 1);
        }
    } else {
        event.currentTarget.classList.remove('btn-outline-secondary');
        event.currentTarget.classList.add('btn-danger');
        if (index === -1) {
            selectedYear.push(tahun);
            selectedYear.sort((a, b) => a - b);
        }
    }
    console.log("Active Years:", selectedYear);
}

function setSortOption(option, event) {
    event.preventDefault();
    console.log("Selected Sort Option:", option);
    
    const dropdownButton = document.getElementById('dropdownMenuButton');
    dropdownButton.textContent = option;
    
    const dropdownItems = document.querySelectorAll('.dropdown-item');
    dropdownItems.forEach(item => {
        item.classList.remove('activefill');
    });
    event.currentTarget.classList.add('activefill');

    let sortParam = '';
    switch (option) {
        case 'Paling Sesuai':
            sortParam = 'relevance';
            break;
        case 'Terbaru':
            sortParam = 'newest';
            break;
        case 'Paling Populer':
            sortParam = 'popularity';
            break;
    }
    filterSort = sortParam;

    let queryParams = new URLSearchParams({
        sort: sortParam
    });

    if (selectedYear.length > 0) {
        queryParams.append('years', selectedYear.join(','));
    }

    if (selectedBrand.length > 0) {
        queryParams.append('brands', selectedBrand.join(','));
    }

    if (selectedPromo.length > 0) {
        queryParams.append('promos', selectedPromo.join(','));
    }

    if (searchh) {
        queryParams.append('search', encodeURIComponent(searchh));
    }

    const apiUrl = `http://127.0.0.1:8000/api/v1/get-products?${queryParams.toString()}`;
    fetchProducts(apiUrl);
}

document.addEventListener('DOMContentLoaded', () => {
    const searchInput = document.querySelector('.inputSearch');
    const searchButton = document.querySelector('.buttonSearch');
    // searchButton.addEventListener('click', function(event) {
    //     event.preventDefault();
    //     const query = searchInput.value;
    //     fetchProducts(`http://127.0.0.1:8000/api/v1/get-products?search=${encodeURIComponent(query)}`);
    // });

    const debounce = (func, delay) => {
        let debounceTimer;
        return function() {
            const context = this;
            const args = arguments;
            clearTimeout(debounceTimer);
            debounceTimer = setTimeout(() => func.apply(context, args), delay);
        };
    };

    searchInput.addEventListener('input', debounce(function() {
    const searchQuery = this.value;
    let queryParams = new URLSearchParams({
        search: encodeURIComponent(searchQuery)
    });
    if (selectedYear.length > 0) {
        queryParams.append('years', selectedYear.join(','));
    }
    if (selectedBrand.length > 0) {
        queryParams.append('brands', selectedBrand.join(','));
    }
    if (selectedPromo.length > 0) {
        queryParams.append('promos', selectedPromo.join(','));
    }
    if (filterSort) {
        queryParams.append('sort', filterSort);
    }
        const apiUrl = `http://127.0.0.1:8000/api/v1/get-products?${queryParams.toString()}`;
        fetchProducts(apiUrl);
    }, 250));

    fetchBrand();
    fetchProducts();
});

</script>
@endpush
