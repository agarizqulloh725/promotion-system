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
.color-circle {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    /* border: 2px solid #FF0000;  */
}
.active-color-circle {
    border: 2px solid #FF0000;
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
        <a href="/product/samsung-galaxy-a15" class="nameProduct1" style="color: #000000; text-decoration: none;">Samsung Galaxy A15</a>
    </p>    
<div class="row pt-3">
    <div class="col-6">
        <div class="row">
            <div class="col-3 cImg">
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
        <h4 class="nameProduct">SAMSUNG GALAXY A15</h4>
        <div class="d-flex align">
            <h4 class="text-danger poppins-bold dharga">Rp 3.999.000</h4>
            <p style="" class="poppins-semibold">&nbsp Rp 4.250.000</p>
            <button class="btn rounded-pill poppins-medium text-danger ddiscount" style="background-color: #ff00000e">-10%</button>
        </div>
        <hr>
        <p class="poppins-medium">SPESIFIKASI</p>
        <ul class="poppins-regular">
            <li>
                Ukuran layar: 6.5 inci, 1080 x 2340 pixels, Super AMOLED, 90Hz
            </li>
            <li>
                Memori: RAM 8 GB, ROM 256 GB.....
            </li>
        </ul>
        <p class="poppins-semibold text-danger">Lihat Selengkapnya</p>
        <hr>
        <p class="poppins-regular" style="color: #000000">Pilih Spesifikasi</p>
        <div class="d-flex gap-3 Cspecification">
            <button style="background-color: #F0F0F0" class="btn activ-spec poppins-regular rounded-pill">4/128gb</button>
            <button style="background-color: #F0F0F0" class="btn poppins-regular rounded-pill">4/128gb</button>
            <button style="background-color: #F0F0F0" class="btn poppins-regular rounded-pill">4/128gb</button>
        </div>
        <hr>
        <p class="poppins-regular">Pilih Varian Warna</p>
        <div class="d-flex justify-content-start gap-2 Ccolor">
            <div class="color-circle active-color-circle" style="background-color: #F9D423;"></div>
            <div class="color-circle" style="background-color: #4CAF50;"></div>
            <div class="color-circle" style="background-color: #3F51B5;"></div>
            <div class="color-circle" style="background-color: #BDBDBD;"></div>
        </div>
        
        <hr>
        <div class="d-flex">
            <p>Jumlah stock tersedia :&nbsp; </p>
            <p class="stockProduct">0</p>
        </div>
        <hr>
        <div class="d-flex justify-content-between gap-2">
            <button style="background-color: #31b16466; color: #31B164" class="btn poppins-medium rounded-pill pt-3 pb-3 w-25"> Available</button>
            <button class="btn btn-danger poppins-medium w-75 rounded-pill pt-3 pb-3" id="pesanSekarangBtn">Pesan Sekarang</button>
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
                {{-- <h5 class="poppins-medium" style="color: #7E7E7E">
                    Spesifikasi
                </h5>
                <h5 class="poppins-medium" style="color: #7E7E7E">
                    Promo
                </h5> --}}
            </div>
            <div>
                <p class="ddesc" style="text-align: justify;">
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
                        <td class="dram">4gb | 8gb</td>
                        <td class="dstorage">128gb | 256gb</td>
                        <td class="dprocessor">Mediatek Helio 699</td>
                    </tr>
                    <tr>
                        <th>Layar</th>
                        <th>Kamera</th>
                        <th>Baterai</th>
                    </tr>
                    <tr>
                        <td class="dlayar">6.5 inci, AMOLED</td>
                        <td class="dpixel">50MP</td>
                        <td class="dbattre">5000mAh</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="col-md-6">
            <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item dvideo" src="https://www.youtube.com/embed/VIDEO_ID" allowfullscreen></iframe>
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
var idSpec;
var idColor;

document.addEventListener('DOMContentLoaded', function () {
    fetchProduct({{ $id }});
    fetchSpesification({{ $id }});
    fetchColor({{ $id }});
    fetchStock({{ $id }});
});


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
function fetchProduct(id) {
        fetch(`/api/v1/show-products/${id}`)
            .then(response => {
                if (response.ok) {
                    return response.json();
                } else {
                    throw new Error('Network response was not ok.');
                }
            })
            .then(products => {
                updateImgUI(products);
                document.querySelector('.nameProduct').textContent = products.data.name;
                document.querySelector('.nameProduct1').textContent = products.data.name;
                document.querySelector('.dharga').textContent = products.data.price;
                // document.querySelector('.ddiscount').textContent = products.data.name;

                document.querySelector('.ddesc').textContent = products.data.description;
                document.querySelector('.dram').textContent = products.data.ram;
                document.querySelector('.dstorage').textContent = products.data.storage;
                document.querySelector('.dprocessor').textContent = products.data.cpu;
                document.querySelector('.dlayar').textContent = products.data.display;
                document.querySelector('.dpixel').textContent = products.data.kamera;
                document.querySelector('.dbattre').textContent = products.data.battery;

                // document.querySelector('.dvideo').src = products.data.name;
            })
            .catch(error => {
                console.error('There has been a problem with your fetch operation:', error);
        });
}
function fetchProductImages(id, colorid) {
    fetch(`/api/v1/imgbycolor/${id}/${colorid}`)
        .then(response => {
            if (response.ok) {
                return response.json();
            } else {
                throw new Error('Network response was not ok.');
            }
        })
        .then(products => {
            console.log('colorimg', products);

            const imageContainer = document.querySelector('.cImg .row');
            imageContainer.innerHTML = '';

            const imageNames = JSON.parse(products.data.name);

            if (imageNames.length === 1) {
                for (let i = 0; i < 3; i++) { 
                    const imgElement = document.createElement('img');
                    imgElement.src = `/images/color-product/${imageNames[0]}`;
                    imgElement.alt = 'Product Color Image';
                    imgElement.className = 'img-fluid thumbnail-img';
                    imgElement.style.width = '110px';
                    imgElement.onclick = function() { changeImage(this); };

                    const imgCol = document.createElement('div');
                    imgCol.className = 'col-12 mb-2';
                    imgCol.appendChild(imgElement);

                    imageContainer.appendChild(imgCol);
                }
            } else {
                // Create an image element for each name in the array
                imageNames.forEach(imageName => {
                    const imgElement = document.createElement('img');
                    imgElement.src = `/path/to/images/${imageName}`;
                    imgElement.alt = 'Product Color Image';
                    imgElement.className = 'img-fluid thumbnail-img';
                    imgElement.style.width = '110px';
                    imgElement.onclick = function() { changeImage(this); };

                    const imgCol = document.createElement('div');
                    imgCol.className = 'col-12 mb-2';
                    imgCol.appendChild(imgElement);

                    imageContainer.appendChild(imgCol);
                });
            }
        })
        .catch(error => {
            console.error('There has been a problem with your fetch operation:', error);
        });
}

function fetchSpesification(id) {
        fetch(`/api/v1/show-specification/${id}`)
            .then(response => {
                if (response.ok) {
                    console.log(response);
                    return response.json();
                } else {
                    throw new Error('Network response was not ok.');
                }
            })
            .then(specification => {
                updateSpecificationUI(specification);
            })
            .catch(error => {
                console.error('There has been a problem with your fetch operation:', error);
        });
}
function fetchColor(id) {
        fetch(`/api/v1/show-color/${id}`)
            .then(response => {
                if (response.ok) {
                    console.log(response);
                    return response.json();
                } else {
                    throw new Error('Network response was not ok.');
                }
            })
            .then(colors => {
                const container = document.querySelector('.Ccolor');
                container.innerHTML = '';

                colors.data.forEach(color => {
                    const colorDiv = document.createElement('div');
                    colorDiv.className = 'color-circle';
                    
                    if (color.image) {
                        // colorDiv.style.backgroundImage = `url(${color.image})`;
                        colorDiv.style.backgroundImage = `url('http://127.0.0.1:8000/images/color/${color.image}')`;
                        colorDiv.style.backgroundSize = 'cover';
                    } else {
                        colorDiv.style.backgroundColor = color.name.toLowerCase();
                    }

                    colorDiv.addEventListener('click', function() {
                        document.querySelectorAll('.Ccolor .color-circle').forEach(div => div.classList.remove('active-color-circle'));
                        colorDiv.classList.add('active-color-circle');
                        console.log(`Warna ${color.name} dengan ID ${color.id} dipilihhh.`);
                        idColor = color.id;
                        fetchStock({{ $id }});
                        fetchProductImages({{ $id }},color.id);
                    });
                    container.appendChild(colorDiv);
                });
            })
            .catch(error => {
                console.error('There has been a problem with your fetch operation:', error);
        });
}
function fetchStock(id) {
        let apiUrl = `/api/v1/show-stock/${id}`;

        let queryParams = [];
        if (idSpec) {
            queryParams.push(`spec=${idSpec}`);
        }
        if (idColor) {
            queryParams.push(`color=${idColor}`);
        }
        if (queryParams.length > 0) {
            apiUrl += '?' + queryParams.join('&');
        }
        fetch(apiUrl)
            .then(response => {
                if (response.ok) {
                    return response.json();
                } else {
                    throw new Error('Network response was not ok.');
                }
            })
            .then(stock => {
                document.querySelector('.stockProduct').textContent = stock.data;
                // console.log(stock);
                // function updateUIProduct
            })
            .catch(error => {
                console.error('There has been a problem with your fetch operation:', error);
        });
}
function clickSpecification(id) {
    console.log("Spesifikasi dengan ID " + id + " diklik.");
    idSpec = id;
        fetch(`/api/v1/click-specification/${id}`)
            .then(response => {
                if (response.ok) {
                    console.log(response);
                    return response.json();
                } else {
                    throw new Error('Network response was not ok.');
                }
            })
            .then(colors => {
                updateColorUI(colors,id)
                fetchStock({{ $id }});
            })
            .catch(error => {
                console.error('There has been a problem with your fetch operation:', error);
        });
}
function clickColor(id) {
        fetch(`/api/v1/show-stock/${id}`)
            .then(response => {
                if (response.ok) {
                    console.log(response);
                    return response.json();
                } else {
                    throw new Error('Network response was not ok.');
                }
            })
            .then(products => {
                // function updateUIProduct
            })
            .catch(error => {
                console.error('There has been a problem with your fetch operation:', error);
        });
}

function updateSpecificationUI(specifications) {
    const container = document.querySelector('.Cspecification');
    container.innerHTML = '';

    specifications.data.forEach(spec => {
        const button = document.createElement('button');
        button.className = 'btn poppins-regular rounded-pill';
        button.style.backgroundColor = '#F0F0F0';
        button.textContent = spec.name;

        button.addEventListener('click', function() {
            document.querySelectorAll('.Cspecification .btn').forEach(btn => btn.classList.remove('activ-spec'));
            button.classList.add('activ-spec');
            clickSpecification(spec.id);
        });

        container.appendChild(button);
    });
}
function updateColorUI(colors, idSpecification) {
    const container = document.querySelector('.Ccolor');
    container.innerHTML = '';

    colors.data.forEach(color => {
        const colorDiv = document.createElement('div');
        colorDiv.className = 'color-circle';
        
        if (color.image) {
            colorDiv.style.backgroundImage = `url(${color.image})`;
            // colorDiv.style.backgroundImage = `url('http://127.0.0.1:8000/images/product-image/product-image_66b878156aa47.png')`;
            colorDiv.style.backgroundImage = `url('http://127.0.0.1:8000/images/color/${color.image}')`;
            colorDiv.style.backgroundSize = 'cover';
        } else {
            colorDiv.style.backgroundColor = color.name.toLowerCase();
        }

        colorDiv.addEventListener('click', function() {
            document.querySelectorAll('.Ccolor .color-circle').forEach(div => div.classList.remove('active-color-circle'));
            colorDiv.classList.add('active-color-circle');
            console.log(`Warna ${color.name} dengan ID ${color.id} dipilih.`);
            idColor = color.id;
            fetchStock({{ $id }});
            fetchProductImages({{ $id }},color.id);
        });
        container.appendChild(colorDiv);
    });
}
function updateImgUI(products) {
    const imagesData = products.data.images;
    const imageContainer = document.querySelector('.cImg .row');

    const mainImage = document.getElementById('main-image');    
    if (imagesData.length > 0) {
        mainImage.src = `/images/product-image/${imagesData[0].name}`;
        mainImage.alt = 'Main Phone Image';

        imageContainer.innerHTML = '';

        imagesData.forEach((img, index) => {
            if (index < 3) { 
                const imgCol = document.createElement('div');
                imgCol.className = 'col-12 mb-2';
                const image = document.createElement('img');
                image.className = 'img-fluid thumbnail-img';
                image.src = `/images/product-image/${img.name}`;
                image.alt = 'Phone Image';
                image.style.width = '110px';
                image.onclick = function() { changeImage(this); };

                imgCol.appendChild(image);
                imageContainer.appendChild(imgCol);
            }
        });
    } else {
        imageContainer.innerHTML = '<p>No images available.</p>';
    }
}
document.getElementById('pesanSekarangBtn').addEventListener('click', function() {
    var nama =  document.querySelector('.nameProduct').textContent;
        const waMessage = encodeURIComponent(`Halo, saya tertarik dengan product ${nama} . Bisa dibantu?`);
        const waNumber = '6285792125743';
        const waUrl = `https://wa.me/${waNumber}?text=${waMessage}`;
        window.open(waUrl, '_blank');
    });
</script>
@endpush