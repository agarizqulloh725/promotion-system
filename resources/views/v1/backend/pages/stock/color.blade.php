@extends('v1.backend.layout.crud')

@section('title', 'Dashboard')

@push('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">

@endpush
<style>
    .select2-container--default .select2-selection--single {
        height: 38px !important;
        border: 1px solid #e7e7e7 !important; 
    }
    
    .select2-container--default .select2-selection--single .select2-selection__rendered {
        line-height: 38px !important;
        border-color: #e7e7e7 !important;
        outline: none;
    }
    
    .select2-container .select2-selection--single .select2-selection__arrow {
        height: 38px !important;
        border-color: #e7e7e7 !important; 
    }
</style>

@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <div>
            <h2 >Color</h2>
            <h5>{{$branch->name}} / {{$prd->name}} / {{$spec->name}}</h5>
        </div>
        <div class="d-flex justify-content-end">
            <button type="button" id="btnCreate" class="btn btn-primary mb-2" style="display: none;">
                <i class="fa fa-plus"></i> Add Color
            </button>        
        </div>
    </div>

    <!-- Back button at the top -->
    <div class="d-flex justify-content-start">
        <div class="btn-index mb-2">
            <a href="{{ route('stockAdmin') }}" class="btn btn-primary mr-3">
                <i class="fa fa-arrow-left"></i> Back to stock index
            </a>
        </div>

        <div class="btn-back mb-2" style="margin-left: 4px">

            <button type="button" class="btn btn-secondary ml-2" onclick="window.history.back();">
                <i class="fa fa-arrow-left"></i> Back
            </button>
        </div>

    </div>


    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
            <div class="card-body">
                <table id="dataTable" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                    <th> No </th>
                    <th> Color Code </th>
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
    <div>
        <div>
            <h5>
                Stok total cabang : {{ $totalStock }} unit
            </h5>
        </div>
    </div>
</div>
<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createModalLabel">Add Color</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="createForm">

                    <div class="form-group mb-2">
                        <label for="createColor" class="mb-2">Color</label>
                        <select class="form-control select2" id="createColor" style="width: 100%; height:100%">
                            <option disabled value="" selected>Choose Color</option>
                            @foreach ($color as $cat)
                                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group mb-3 pt-2">
                        <label for="createColor" >Total Stock</label>
                        <input type="number" name="amountStock" id="amountStock">
                    </div>
                    <div class="form-group mb-3">
                        <label for="createBrandImages">Brand Image</label>
                        <input type="file" class="form-control-file" id="createBrandImages" multiple onchange="previewImages();">
                        <div id="imagePreviewContainer" style="display: flex; flex-wrap: wrap; gap: 10px; margin-top: 10px;"></div>
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
<div class="modal fade" id="showModal" tabindex="-1" role="dialog" aria-labelledby="showModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="showModalLabel">Show Category</h5>
                <button type="button" class="close closeModal" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="showForm">
                    <input type="hidden" id="showId" value="">
                    <div class="form-group">
                        <label for="showName">Nama Kategori</label>
                        <input type="text" class="form-control" id="showName" placeholder="Masukan Nama">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editForm">
                    <input type="hidden" id="editId" value="">
                    <div class="form-group">
                        <label for="editStock">Nama Kategori</label>
                        <input type="text" class="form-control" id="editStock" placeholder="Masukan Nama">
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
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{ asset('utils.js') }}"></script>
<script>
const token = getCookieValue('access_token');
const userHandle = fetchMe();
const currentUrl = window.location.href;
const urlParts = currentUrl.split('/');
const idProd = urlParts[urlParts.length - 2];
const idBranch = urlParts[urlParts.length - 3];
const idSpec = urlParts[urlParts.length - 1];

console.log('branchPro', idProd);
console.log('idBranch', idBranch);
console.log('idSpec', idSpec);
$(document).ready(function() {
    $('#createColor').select2({
        dropdownParent: $("#createModal")              
    });
    var table = $('#dataTable').DataTable({
        responsive: true,
        ajax: {
            url: `/api/v1/admin/pro-color/?idbranch=${idBranch}&idproduct=${idProd}&idspec=${idSpec}`,
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
            { data: null, render: function (data, type, full, meta) {
                return data.color.name;
            }},
            { data: null, render: function (data, type, row) {
                return `<button onclick="editStock(${row.id}, '${row.name}')" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Stock</button>
                        <button class="btn btn-danger btn-sm delete-btn" data-id="${row.id}"><i class="fa fa-trash"></i></button>
                `;
            }}
        ]
    });

    $('#btnCreate').click(function() {
        $('#createModal').modal('show');
    })
    $('#createForm').submit(function(e) {
    e.preventDefault();

    // Ambil gambar multiple dari input file
    var files = $('#createBrandImages')[0].files;
    var formData = new FormData();

    // Tambahkan file ke FormData
    for (var i = 0; i < files.length; i++) {
        formData.append('color_images[]', files[i]);
    }

    // Tambahkan data lainnya ke FormData
    formData.append('color_id', $('#createColor').val());
    formData.append('stock', $('#amountStock').val());
    formData.append('branch_product_id', idProd);
    formData.append('branch_id', idBranch);
    formData.append('product_specification_id', idSpec);

    $.ajax({
        url: '/api/v1/admin/pro-color',
        type: 'POST',
        headers: {
            'Authorization': 'Bearer ' + token
        },
        processData: false,  // penting untuk mematikan proses default
        contentType: false,  // penting untuk mematikan jenis konten default
        data: formData,
        success: function(result) {
            table.ajax.reload(null, false);
            $('#createModal').modal('hide');
            Swal.fire({
                title: 'Success!',
                text: 'Category created successfully!',
                icon: 'success',
                confirmButtonText: 'OK'
            });
        },
        error: function(request, msg, error) {
            console.log('Error creating category:', request.responseJSON.error);
            $('#createModal').modal('hide');
            Swal.fire({
                title: 'Error!',
                text: request.responseJSON.error,
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
            url: '/api/v1/admin/pro-color/' + categoryId,
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

    $('#editForm').submit(function(e) {
        e.preventDefault();
        var id = $('#editId').val();
        $.ajax({
            url: '/api/v1/admin/pro-stock/' + id,
            type: 'PUT',
            headers: {
                'Authorization': 'Bearer ' + token
            },
            data: { 
                stock: $('#editStock').val(),
            },
            success: function(result) {
                table.ajax.reload();
                $('#editModal').modal('hide');
                Swal.fire({
                    title: 'Success!',
                    text: 'Category updated successfully!',
                    icon: 'success',
                    confirmButtonText: 'OK'
                });
            },
            error: function(request, msg, error) {
                console.log('Error updating category:', error);
                $('#editModal').modal('hide');
                Swal.fire({
                    title: 'Error!',
                    text: 'Failed to update category. Please try again.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            }
        });
    });

    $('.close,.closeModal').on('click', function() {
        $('#deleteModal').modal('hide');
        $('#createModal').modal('hide');
        $('#editModal').modal('hide');
        $('#showModal').modal('hide');
    });
});
function editStock(id) {
    $.ajax({
        url: `/api/v1/admin/pro-stock/?idprocolor=${id}`,
        type: 'GET',
        headers: { 
                'Authorization': 'Bearer ' + token
            },
        contentType: 'application/json',
        success: function(response) {
            $('#editId').val(response.id); 
            $('#editStock').val(response.stock);             
            $('#editModal').modal('show');
        },
        error: function(error) {
            console.log('Error fetching category:', error);
            Swal.fire({
                title: 'Error!',
                text: 'Failed to fetch category details. Please try again.',
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
async function fetchMe() {
    try {
        const response = await $.ajax({
            url: '/api/v1/me',
            type: 'GET',
            headers: {
                'Authorization': 'Bearer ' + token
            },
            contentType: 'application/json',
        });
        if (response.permission === "admin") {
            $('#btnCreate').hide();
        } else {
            $('#btnCreate').show();
        }
        console.log(response);
        return response.user.branch_id;
    } catch (error) {
        console.log('Error fetching user details:', error);
        return nul
    }
}

</script>
@endpush
