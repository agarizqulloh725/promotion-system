@extends('v1.backend.layout.crud')

@section('title', 'Dashboard')

@push('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
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
            <h2 >Stock Product Specification</h2>
            <h5>{{$branch->name}} / {{$product->name}}</h5>
        </div>
        <div class="d-flex justify-content-end">
            <button type="button" id="btnCreate" class="btn btn-primary mb-2" style="display: none">
                <i class="fa fa-plus"></i> Add Spesification
            </button>        
        </div>
    </div>

    <!-- Back button at the top -->
    <div class="d-flex justify-content-start mb-3">
    <button type="button" class="btn btn-secondary" onclick="window.history.back();">
        <i class="fa fa-arrow-left"></i> Back
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
                    <th> Spesification </th>
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
                Stok total cabang : {{$totalStock}} unit
            </h5>
        </div>
    </div>
</div>
<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createModalLabel">Add Spesification</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="createForm">
                    <div class="form-group mb-2">
                        <label for="createSpecification" class="mb-2">Spesification</label>
                        <select class="form-control select2" id="createSpecification" style="width: 100%; height:100%">
                            <option disabled value="" selected>Pilih Spesification</option>
                            @foreach ($specification as $cat)
                            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                        @endforeach
                        </select>
                    </div>

                    <div class="form-group mb-2">
                        <label for="entryName" class="mb-2">Name</label>
                        <input type="text" class="form-control" id="createName" placeholder="Name">
                    </div>
                    <div class="form-group mb-2">
                        <label for="createPrice" class="mb-2">Price</label>
                        <input type="number" class="form-control" id="createPrice" placeholder="Price">
                    </div>
                    <div class="form-group mb-3">
                        <label for="createDescription" class="mb-2">Description</label>
                        <textarea class="form-control" id="createDescription" placeholder="Description"></textarea>
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
                <h5 class="modal-title" id="editModalLabel">Edit Entry</h5>
                <button type="button" the="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editForm">
                    <input type="hidden" id="editId" value="">
                    <div class="form-group">
                        <label for="editSpecificationId">Specification ID</label>
                        <input type="number" class="form-control" id="editSpecificationId" placeholder="Specification ID">
                    </div>
                    <div class="form-group">
                        <label for="editProductId">Product ID</label>
                        <input type="number" class="form-control" id="editProductId" placeholder="Product ID">
                    </div>
                    <div class="form-group">
                        <label for="editName">Name</label>
                        <input type="text" class="form-control" id="editName" placeholder="Enter Name">
                    </div>
                    <div class="form-group">
                        <label for="editHarga">Price</label>
                        <input type="number" class="form-control" id="editHarga" placeholder="Enter Price">
                    </div>
                    <div class="form-group">
                        <label for="editDescription">Description</label>
                        <textarea class="form-control" id="editDescription" placeholder="Enter Description"></textarea>
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
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script src="{{ asset('utils.js') }}"></script>
<script>
const token = getCookieValue('access_token');
const userHandle = fetchMe();
const currentUrl = window.location.href;
const urlParts = currentUrl.split('/');
const idBranch = urlParts[urlParts.length - 2];
const idBranchProduct = urlParts[urlParts.length - 1];

$(document).ready(function() {
    $('#createSpecification').select2({
        dropdownParent: $("#createModal")              
    });
    var table = $('#dataTable').DataTable({
        responsive: true,
        ajax: {
            url: `/api/v1/admin/pro-specification/?idbranch=${idBranch}&idbranchproduct=${idBranchProduct}`,
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
                return `<a href='/admin/stock/${idBranch}/${idBranchProduct}/${row.id}' class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Stock</a>`;
            }}
        ]
    });

    $('#btnCreate').click(function() {
        $('#createModal').modal('show');
    })
    $('#createForm').submit(function(e) {
        e.preventDefault();
        var categoryName = $('#categoryName').val();
        $.ajax({
            url: '/api/v1/admin/pro-specification',
            type: 'POST',
            headers: {
            'Authorization': 'Bearer ' + token
            },
            contentType: 'application/json',
            data: JSON.stringify({
                name: $('#createName').val(),
                branch_product_id: idBranchProduct,
                specification_id:$('#createSpecification').val(),
                price:$('#createPrice').val(),
                description:$('#createDescription').val()
            }),
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
            url: '/api/v1/admin/pro-specification/' + categoryId,
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
        var updatedName = $('#editName').val();
        $.ajax({
            url: '/api/v1/admin/pro-specification/' + id,
            type: 'PUT',
            headers: {
                'Authorization': 'Bearer ' + token
            },
            data: { 
                name: updatedName,
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
function editStock(id, idBranch, idBranchProduct) {
    $.ajax({
        url: `/api/v1/admin/pro-stock/?idspec=${id}&idbranch=${idBranch}&idbranchproduct=${idBranch}`,
        type: 'GET',
        headers: {
                'Authorization': 'Bearer ' + token
            },
        contentType: 'application/json',
        success: function(response) {
            $('#editId').val(response.id); 
            $('#editName').val(response.name);             
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
