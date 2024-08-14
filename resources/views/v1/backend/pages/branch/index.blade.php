@extends('v1.backend.layout.main')

@section('title', 'Dashboard')

@push('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">
@endpush

@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h2 class="page-title"> Branch Store </h2>
    </div>
    <div class="d-flex justify-content-end">
        <button type="button" id="btnCreate" class="btn btn-primary mb-2">
            <i class="fa fa-plus"></i> Create Branch
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
                    <th> Name </th>
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

<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createModalLabel">Create Branch</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="createForm">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name" class="mb-2">Store Name</label>
                                <input type="text" class="form-control" id="name" placeholder="Store">
                            </div>
                            <div class="form-group">
                                <label for="branch" class="mb-2 pt-3">Branch Name</label>
                                <input type="text" class="form-control" id="branch" placeholder="Branch">
                            </div>
                            <div class="form-group">
                                <label for="address" class="mb-2 pt-3">Address</label>
                                <input type="text" class="form-control" id="address" placeholder="Address">
                            </div>
                            <div class="form-group mb-2 pt-3">
                                <label for="lat" class="mb-2">Latitude</label>
                                <input type="text" class="form-control" id="lat" placeholder="Latitude">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="lang" class="mb-2">Longitude</label>
                                <input type="text" class="form-control" id="lang" placeholder="Longitude">
                            </div>
                            <div class="form-group">
                                <label for="wa" class="mb-2 pt-3">Whatsapp</label>
                                <input type="text" class="form-control" id="wa" placeholder="Whatsapp">
                            </div>
                            <div class="form-group pt-5">
                                <label for="createBranchImages" class="mb-2">Image :</label>
                                <input type="file" class="form-control-file" id="createBranchImages" onchange="previewImages();">
                                <div id="imagePreviewContainer" style="display: flex; flex-wrap: wrap; gap: 10px; margin-top: 10px;"></div>
                            </div>
                        </div>
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
                <h5 class="modal-title" id="showModalLabel">Branch Detail</h5>
                <button type="button" class="close closeModal" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="showForm">
                    <input type="hidden" id="showId" value="">
                    {{-- <div class="form-group">
                        <label for="showName">Nama Kategori</label>
                        <input type="text" class="form-control" id="showName" placeholder="Masukan Nama">
                    </div> --}}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="showName" class="mb-2">Store Name</label>
                                <input type="text" class="form-control" id="showName" placeholder="Store">
                            </div>
                            <div class="form-group">
                                <label for="showBranch" class="mb-2 pt-3">Branch Name</label>
                                <input type="text" class="form-control" id="showBranch" placeholder="Branch">
                            </div>
                            <div class="form-group">
                                <label for="showAddress" class="mb-2 pt-3">Address</label>
                                <input type="text" class="form-control" id="showAddress" placeholder="Address">
                            </div>
                            <div class="form-group mb-2 pt-3">
                                <label for="showLat" class="mb-2">Latitude</label>
                                <input type="text" class="form-control" id="showLat" placeholder="Latitude">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="showLang" class="mb-2">Longitude</label>
                                <input type="text" class="form-control" id="showLang" placeholder="Longitude">
                            </div>
                            <div class="form-group">
                                <label for="showWa" class="mb-2 pt-3">Whatsapp</label>
                                <input type="text" class="form-control" id="showWa" placeholder="Whatsapp">
                            </div>
                            <div class="form-group pt-4">
                                <label for="showBranchImages" class="mb-2">Image</label>
                                <input type="file" class="form-control-file" id="showBranchImages" onchange="previewImages();">
                                <div id="imagePreviewContainer" style="display: flex; flex-wrap: wrap; gap: 10px; margin-top: 10px;"></div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Branch</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editForm">
                    <input type="hidden" id="editId" value="">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="editName" class="mb-2">Store Name</label>
                                <input type="text" class="form-control" id="editName" placeholder="Store">
                            </div>
                            <div class="form-group">
                                <label for="editBranch" class="mb-2 pt-3">Branch Name</label>
                                <input type="text" class="form-control" id="editBranch" placeholder="Branch">
                            </div>
                            <div class="form-group">
                                <label for="editAddress" class="mb-2 pt-3">Address</label>
                                <input type="text" class="form-control" id="editAddress" placeholder="Address">
                            </div>
                            <div class="form-group mb-2 pt-3">
                                <label for="editLat" class="mb-2">Latitude</label>
                                <input type="text" class="form-control" id="editLat" placeholder="Latitude">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="editLang" class="mb-2">Longitude</label>
                                <input type="text" class="form-control" id="editLang" placeholder="Longitude">
                            </div>
                            <div class="form-group">
                                <label for="editWa" class="mb-2 pt-3">Whatsapp</label>
                                <input type="text" class="form-control" id="editWa" placeholder="Whatsapp">
                            </div>
                            <div class="form-group pt-5">
                                <label for="editBranchImages" class="mb-2">Image :</label>
                                <input type="file" class="form-control-file" id="editBranchImages" onchange="previewImages();">
                                <div id="imagePreviewContainer" style="display: flex; flex-wrap: wrap; gap: 10px; margin-top: 10px;"></div>
                            </div>
                        </div>
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
            url: '/api/v1/admin/branch',
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
                return `<button onclick="showCategory(${row.id})" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></button>
                        <button onclick="editCategory(${row.id}, '${row.name}')" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></button>
                        <button class="btn btn-danger btn-sm delete-btn" data-id="${row.id}"><i class="fa fa-trash"></i></button>`;
            }}
        ]
    });

    $('#btnCreate').click(function() {
        $('#createModal').modal('show');
    })
    $('#createForm').submit(function(e) {
    e.preventDefault();

    var formData = new FormData(this);
    formData.append('name', $('#name').val());
    formData.append('branch', $('#branch').val());
    formData.append('address', $('#address').val());
    formData.append('lat', $('#lat').val());
    formData.append('lang', $('#lang').val());
    formData.append('wa', $('#wa').val());

    var files = $('#createBranchImages').get(0).files;
    if (files.length > 0) {
        for (var i = 0; i < files.length; i++) {
            formData.append('image[]', files[i]);
        }
    }

    $.ajax({
        url: '/api/v1/admin/branch',
        type: 'POST',
        headers: {
            'Authorization': 'Bearer ' + token
        },
        processData: false,
        contentType: false,
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
            console.log('Error creating category:', error);
            $('#createModal').modal('hide');
            Swal.fire({
                title: 'Error!',
                text: 'Failed to create category. Please try again.',
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
            url: '/api/v1/admin/branch/' + categoryId,
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
    var formData = new FormData(this);
    formData.append('_method', 'PUT');
    formData.append('name', $('#editName').val());
    formData.append('branch', $('#editBranch').val());
    formData.append('address', $('#editAddress').val());
    formData.append('lat', $('#editLat').val());
    formData.append('lang', $('#editLang').val());
    formData.append('wa', $('#editWa').val());

    var files = $('#editBranchImages').get(0).files;
    if (files.length > 0) {
        for (var i = 0; i < files.length; i++) {
            formData.append('image[]', files[i]);
        }
    }

    $.ajax({
        url: '/api/v1/admin/branch/' + $('#editId').val(),
        type: 'POST',
        headers: {
            'Authorization': 'Bearer ' + token
        },
        processData: false,
        contentType: false,
        data: formData,
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
function showCategory(id) {
    $.ajax({
        url: '/api/v1/admin/branch/' + id, 
        type: 'GET',
        headers: {
                'Authorization': 'Bearer ' + token
            },
        contentType: 'application/json',
        success: function(response) {
            $('#showId').val(response.id);             
            $('#showName').val(response.name);  

            $('#showBranch').val(response.branch);             
            $('#showAddress').val(response.address);             
            $('#showLat').val(response.lat);             
            $('#showLang').val(response.lang);             
            $('#showWa').val(response.wa);       

            $('#showModal').modal('show');
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
function editCategory(id) {
    $.ajax({
        url: '/api/v1/admin/branch/' + id, 
        type: 'GET',
        headers: {
            'Authorization': 'Bearer ' + token
        },
        contentType: 'application/json',
        success: function(response) {
            $('#editId').val(response.id); 
            $('#editName').val(response.name);             
            $('#editBranch').val(response.branch);             
            $('#editAddress').val(response.address);             
            $('#editLat').val(response.lat);             
            $('#editLang').val(response.lang);             
            $('#editWa').val(response.wa);             

            var container = $('#editImagePreviewContainer');
            container.empty();
            if (response.image) {
                let images = Array.isArray(response.image) ? response.image : [response.image];
                images.forEach(function(imageUrl) {
                    var fullPath = 'https://lima-waktu.my.id/public/images/branch/' + imageUrl;
                    var img = $('<img>').attr("src", fullPath);
                    img.css({ "max-width": "150px", "height": "auto" });
                    container.append(img);
                });
            }

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
    var files = $("#createBranchImages").get(0).files;
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
    var files = $("#editBranchImages").get(0).files; 
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
