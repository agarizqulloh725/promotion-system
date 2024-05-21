@extends('v1.backend.layout.main')

@section('title', 'Dashboard')

@push('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">
@endpush

@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h2 class="page-title"> Kategori Produk </h2>
    </div>
    <div class="d-flex justify-content-end">
        <button type="button" id="btnCreate" class="btn btn-primary mb-2">
            <i class="fa fa-plus"></i> Tambah Kategori
        </button>        
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
            <div class="card-body">
                <table id="dataTable" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                    <th> No </th>
                    <th> name </th>
                    <th> Action </th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
                </table>
            </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="createProductModal" tabindex="-1" role="dialog" aria-labelledby="createProductModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createProductModalLabel">Create New Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="createProductForm">
                    <div class="form-group">
                        <label for="productName">Name</label>
                        <input type="text" class="form-control" id="productName" placeholder="Enter product name">
                    </div>
                    <div class="form-group">
                        <label for="productSlug">slug</label>
                        <input type="text" class="form-control" id="productSlug" placeholder="Enter product name">
                    </div>
                    <div class="form-group">
                        <label for="productDescription">Description</label>
                        <textarea class="form-control" id="productDescription" placeholder="Enter description"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="productPrice">Price</label>
                        <input type="number" step="0.01" class="form-control" id="productPrice" placeholder="Enter price">
                    </div>
                    <div class="form-group">
                        <label for="productVideoLink">Video Link</label>
                        <input type="url" class="form-control" id="productVideoLink" placeholder="Enter video URL">
                    </div>
                    <div class="form-group">
                        <label for="productTokopediaLink">Tokopedia Link</label>
                        <input type="url" class="form-control" id="productTokopediaLink" placeholder="Enter Tokopedia URL">
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="productShow">
                        <label class="form-check-label" for="productShow">Show Product?</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="productPopular">
                        <label class="form-check-label" for="productPopular">Mark as Popular?</label>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <button type="button" class="btn btn-secondary closeModal" data-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="showProductModal" tabindex="-1" role="dialog" aria-labelledby="showProductModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="showProductModalLabel">Product Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Name:</label>
                    <div id="showProductName" class="form-text"></div>
                </div>
                <div class="form-group">
                    <label>Slug:</label>
                    <div id="showProductSlug" class="form-text"></div>
                </div>
                <div class="form-group">
                    <label>Description:</label>
                    <div id="showProductDescription" class="form-text"></div>
                </div>
                <div class="form-group">
                    <label>Price:</label>
                    <div id="showProductPrice" class="form-text"></div>
                </div>
                <div class="form-group">
                    <label>Video Link:</label>
                    <a id="showProductVideoLink" href="" target="_blank">View Video</a>
                </div>
                <div class="form-group">
                    <label>Tokopedia Link:</label>
                    <a id="showProductTokopediaLink" href="" target="_blank">View on Tokopedia</a>
                </div>
                <div class="form-group">
                    <label>Visibility:</label>
                    <div id="showProductIsShow" class="form-text"></div>
                </div>
                <div class="form-group">
                    <label>Popularity:</label>
                    <div id="showProductIsPopular" class="form-text"></div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary closeModal" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editProductModal" tabindex="-1" role="dialog" aria-labelledby="editProductModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editProductModalLabel">Edit Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editProductForm">
                    <input type="hidden" id="editProductId">
                    <div class="form-group">
                        <label for="editProductName">Name</label>
                        <input type="text" class="form-control" id="editProductName" placeholder="Enter product name">
                    </div>
                    <div class="form-group">
                        <label for="editProductSlug">Slug</label>
                        <input type="text" class="form-control" id="editProductSlug" placeholder="Enter product Slug">
                    </div>
                    <div class="form-group">
                        <label for="editProductDescription">Description</label>
                        <textarea class="form-control" id="editProductDescription" placeholder="Enter description"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="editProductPrice">Price</label>
                        <input type="number" step="0.01" class="form-control" id="editProductPrice" placeholder="Enter price">
                    </div>
                    <div class="form-group">
                        <label for="editProductVideoLink">Video Link</label>
                        <input type="url" class="form-control" id="editProductVideoLink" placeholder="Enter video URL">
                    </div>
                    <div class="form-group">
                        <label for="editProductTokopediaLink">Tokopedia Link</label>
                        <input type="url" class="form-control" id="editProductTokopediaLink" placeholder="Enter Tokopedia URL">
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="editProductShow">
                        <label class="form-check-label" for="editProductShow">Show Product?</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="editProductPopular">
                        <label class="form-check-label" for="editProductPopular">Mark as Popular?</label>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <button type="button" class="btn btn-secondary closeModal" data-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Confirm Delete</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Yakin ingin menghapus kategori ini ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" id="confirmDelete">Delete</button>
                <button type="button" class="btn btn-secondary closeModal" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

@endsection

@push('script')
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{ asset('utils.js') }}"></script>
<script>
const token = getCookieValue('access_token');
$(document).ready(function() {
    var table = $('#dataTable').DataTable({
        responsive: true,
        ajax: {
            url: '/api/v1/admin/product/',
            type:'GET',
            beforeSend: function(xhr) {
                xhr.setRequestHeader('Authorization', 'Bearer ' + token);
            },
            dataSrc: ''
        },
        columnDefs: [{
            "searchable": false,
            "orderable": false,
            "targets": 0
        }],
        columns: [
            { data: null, render: function (data, type, full, meta) {
                return meta.row + 1;
            }},
            { data: "name" },
            { data: null, render: function (data, type, row) {
                return `<button onclick="showProduct(${row.id})" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></button>
                        <button onclick="editProduct(${row.id}, '${row.name}')" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></button>
                        <button class="btn btn-danger btn-sm delete-btn" data-id="${row.id}"><i class="fa fa-trash"></i></button>`;
            }}
        ]
    });

    $('#btnCreate').click(function() {
        $('#createProductModal').modal('show');
    })
    $('#createProductForm').submit(function(e) {
    e.preventDefault();
    var formData = new FormData(this);

    formData.append('name', $('#productName').val());
    formData.append('slug', $('#productSlug').val());
    formData.append('description', $('#productDescription').val());
    formData.append('price', $('#productPrice').val());
    formData.append('link_video', $('#productVideoLink').val());
    formData.append('link_tokopedia', $('#productTokopediaLink').val());
    formData.append('is_show', $('#productShow').is(':checked') ? 1 : 0);
    formData.append('is_popular', $('#productPopular').is(':checked') ? 1 : 0);

    // Handle file uploads for images, if any
    // var files = $('#createBrandImages').get(0).files;  // Ensure this ID matches your actual file input's ID
    // if (files.length > 0) {
    //     for (var i = 0; i < files.length; i++) {
    //         formData.append('images[]', files[i]);  // Change 'image[]' to 'images[]' if your backend expects an array
    //     }
    // }

    $.ajax({
        url: '/api/v1/admin/product/', 
        type: 'POST',
        headers: {
            'Authorization': 'Bearer ' + token 
        },
        processData: false,
        contentType: false, 
        data: formData,
        success: function(result) {
            $('#createProductModal').modal('hide');
            if (typeof table !== 'undefined' && $.isFunction(table.ajax.reload)) {
                table.ajax.reload(null, false);
            }
            Swal.fire({
                title: 'Success!',
                text: 'Product created successfully!',
                icon: 'success',
                confirmButtonText: 'OK'
            });
        },
        error: function(request, status, error) {
            console.log('Error creating product:', error);
            $('#createProductModal').modal('hide');
            Swal.fire({
                title: 'Error!',
                text: 'Failed to create product. Please try again.',
                icon: 'error',
                confirmButtonText: 'OK'
            });
        }
    });
});

    $('#dataTable').on('click', '.delete-btn', function() {
        var categoryId = $(this).data('id');
        $('#deleteModal').modal('show');
        $('#confirmDelete').data('id', categoryId); 
    });

    $('#confirmDelete').click(function() {
        var categoryId = $(this).data('id');
        $.ajax({
            url: '/api/v1/admin/product/' + categoryId,
            type: 'DELETE',
            headers: {
                'Authorization': 'Bearer ' + token
            },
            success: function(result) {
                $('#deleteModal').modal('hide');
                table.ajax.reload();
                Swal.fire({
                    title: 'Success!',
                    text: 'Category Deleted successfully!',
                    icon: 'success',
                    confirmButtonText: 'OK'
                });
            },
            error: function(request, msg, error) {
                console.log('Error deleting category:', error);
                Swal.fire({
                    title: 'Error!',
                    text: 'Failed to deleting category. Please try again.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            }
        });
    });

    $('#editProductForm').submit(function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    formData.append('_method', 'PUT'); 

    formData.append('name', $('#editProductName').val());
    formData.append('slug', $('#editProductSlug').val());
    formData.append('description', $('#editProductDescription').val());
    formData.append('price', $('#editProductPrice').val());
    formData.append('link_video', $('#editProductVideoLink').val());
    formData.append('link_tokopedia', $('#editProductTokopediaLink').val());
    formData.append('is_show', $('#editProductShow').is(':checked') ? 1 : 0);
    formData.append('is_popular', $('#editProductPopular').is(':checked') ? 1 : 0);

    // var files = $('#editBrandImages').get(0).files; 
    // if (files.length > 0) {
    //     $.each(files, function(i, file) {
    //         formData.append('images[]', file);
    //     });
    // }

    $.ajax({
        url: '/api/v1/admin/product/' + $('#editProductId').val(), 
        type: 'POST',
        headers: {
            'Authorization': 'Bearer ' + token
        },
        processData: false, 
        contentType: false,
        data: formData,
        success: function(result) {
            $('#editProductModal').modal('hide');
            if (typeof table !== 'undefined' && $.isFunction(table.ajax.reload)) {
                table.ajax.reload(null, false); 
            }
            Swal.fire({
                title: 'Success!',
                text: 'Product updated successfully!',
                icon: 'success',
                confirmButtonText: 'OK'
            });
        },
        error: function(request, status, error) {
            console.log('Error updating product:', error);
            $('#editProductModal').modal('hide');
            Swal.fire({
                title: 'Error!',
                text: 'Failed to update product. Please try again.',
                icon: 'error',
                confirmButtonText: 'OK'
            });
        }
    });
});


    $('.close,.closeModal').on('click', function() {
        $('#deleteModal').modal('hide');
        $('#createProductModal').modal('hide');
        $('#editProductModal').modal('hide');
        $('#showProductModal').modal('hide');
    });
});
function showProduct(id) {
    $.ajax({
        url: '/api/v1/admin/product/' + id, 
        type: 'GET',
        headers: {
            'Authorization': 'Bearer ' + token
        },
        contentType: 'application/json',
        success: function(response) {
            $('#showProductId').val(response.id);
            $('#showProductName').text(response.name);
            $('#showProductSlug').text(response.slug);
            $('#showProductDescription').text(response.description);
            $('#showProductPrice').text(response.price);
            $('#showProductVideoLink').attr('href', response.link_video).text(response.link_video);
            $('#showProductTokopediaLink').attr('href', response.link_tokopedia).text(response.link_tokopedia);
            $('#showProductIsShow').text(response.is_show ? 'Yes' : 'No');
            $('#showProductIsPopular').text(response.is_popular ? 'Yes' : 'No');

            $('#showImagePreviewContainer').empty();
            if (response.images) {
                let images = Array.isArray(response.images) ? response.images : [response.images];
                images.forEach(function(imageUrl) {
                    var fullPath = '/images/product/' + imageUrl;
                    var img = $('<img>').attr("src", fullPath);
                    img.css({ "max-width": "150px", "height": "auto" });
                    $("#showImagePreviewContainer").append(img);
                });
            }
            $('#showProductModal').modal('show');
        },
        error: function(error) {
            console.log('Error fetching product:', error);
            Swal.fire({
                title: 'Error!',
                text: 'Failed to fetch product details. Please try again.',
                icon: 'error',
                confirmButtonText: 'OK'
            });
        }
    });
}

function editProduct(id) {
    $.ajax({
        url: '/api/v1/admin/product/' + id,
        type: 'GET',
        headers: {
            'Authorization': 'Bearer ' + token
        },
        contentType: 'application/json',
        success: function(response) {
            $('#editProductId').val(response.id);
            $('#editProductName').val(response.name);
            $('#editProductSlug').val(response.slug);
            $('#editProductDescription').val(response.description);
            $('#editProductPrice').val(response.price);
            $('#editProductVideoLink').val(response.link_video);
            $('#editProductTokopediaLink').val(response.link_tokopedia);
            $('#editProductShow').prop('checked', response.is_show);
            $('#editProductPopular').prop('checked', response.is_popular);

            if (response.images) {
                $("#editImagePreviewContainer").empty();
                let images = Array.isArray(response.images) ? response.images : [response.images];
                images.forEach(function(imageUrl) {
                    var fullPath = '/images/product/' + imageUrl;
                    var img = $('<img>').attr("src", fullPath);
                    img.css({ "max-width": "150px", "height": "auto" });
                    $("#editImagePreviewContainer").append(img);
                });
            }

            $('#editProductModal').modal('show');
        },
        error: function(error) {
            console.log('Error fetching product:', error);
            Swal.fire({
                title: 'Error!',
                text: 'Failed to fetch product details. Please try again.',
                icon: 'error',
                confirmButtonText: 'OK'
            });
        }
    });
}

function previewImages() {
    var files = $("#createBrandImages").get(0).files;
    $("#imagePreviewContainer").empty(); 
    if (files.length > 0) {
        Array.from(files).forEach(file => {
            var reader = new FileReader();

            reader.onload = function(e) {
                var img = $('<img>').attr("src", e.target.result);
                img.css({ "max-width": "150px", "height": "auto" });
                $("#imagePreviewContainer").append(img);
            };

            reader.readAsDataURL(file);
        });
    }
}
function editPreviewImages() {
    var files = $("#editBrandImages").get(0).files; 
    var container = $("#editImagePreviewContainer");
    container.empty(); 

    if (files.length > 0) {
        Array.from(files).forEach(function(file) {
            var reader = new FileReader(); 

            reader.onload = function(event) {
                var img = $('<img>').attr("src", event.target.result); 
                img.css({ "max-width": "150px", "height": "auto" }); 
                container.append(img);
            };

            reader.readAsDataURL(file);
        });
    }
}

</script>
@endpush
