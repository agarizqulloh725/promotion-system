@extends('v1.backend.layout.main')

@section('title', 'Dashboard')

@push('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush
<!-- CSS untuk Select2 -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-rc.0/css/select2.min.css" rel="stylesheet" />

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
        <h2 class="page-title"> Promo Product </h2>
    </div>
    <div class="d-flex justify-content-end">
        <button type="button" id="btnCreate" class="btn btn-primary mb-2">
            <i class="fa fa-plus"></i> Create Promo Product
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
                    <th> Product </th>
                    <th> Name</th>
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
                <h5 class="modal-title" id="createModalLabel">Create Promo Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="createForm">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="createBrandName" class="mb-2">Name</label>
                                <input type="text" class="form-control" id="createBrandName" placeholder="Name">
                            </div>

                            <div class="form-group">
                                {{-- <label for="createProduct" class="mb-2 pt-3">Product</label> --}}
                                <label for="createProduct" class="mb-2 pt-3">Product</label>

                                <select class="form-control select2" id="createProduct" style="width: 100%; height:100%">
                                    <option disabled value="">Choose Product</option>
                                    @foreach ($product as $cat)
                                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                    @endforeach
                                </select>
                            </div>
        
                            <div class="form-group">
                                <label for="createDiscount" class="mb-2 pt-3">Discount</label>
                                <input type="number" class="form-control" id="createDiscount" placeholder="Discount" step="0.01">
                            </div>

                        </div>
                        <div class="col-md-6">

                            <div class="form-group">
                                <label for="createCashback" class="mb-2">Cashback</label>
                                <input type="number" class="form-control" id="createCashback" placeholder="Cashback" step="0.01">
                            </div>
                            <div class="form-group">
                                <label for="createBonus" class="mb-2 pt-3">Bonus</label>
                                <input type="number" class="form-control" id="createBonus" placeholder="Bonus" step="0.01">
                            </div>
                            <div class="form-group mb-3">
                                <label for="createBrandDescription" class="mb-2 pt-3">Description</label>
                                <input type="text" class="form-control" id="createBrandDescription" placeholder="Description">
                            </div>
                            <div class="form-group">
                                <label for="createPromoFront" class="mb-2 pt-3">Front Promotion</label>
                                <input type="text" class="form-control" id="createPromoFront" placeholder="Promotion Text">
                            </div>
                            <div class="form-group">
                                <label for="createPromoStart" class="mb-2 pt-3">Start Date</label>
                                <input type="date" class="form-control" id="createPromoStart">
                            </div>
                            <div class="form-group">
                                <label for="createPromoEnd" class="mb-2 pt-3">End Date</label>
                                <input type="date" class="form-control" id="createPromoEnd">
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
  <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="showModalLabel">Show Promo Product</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
              <form id="showForm">
                  <input type="hidden" id="showId" value="">
                  <div class="form-group">
                      <label for="showName">Nama Brand</label>
                      <input type="text" class="form-control" id="showName" placeholder="Masukan Nama">
                  </div>
                  <div class="form-group">
                      <label for="showBrandCategory">Category</label>
                      <select class="form-control" id="showBrandCategory">
                          @foreach ($product as $cat)
                              <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                          @endforeach
                      </select>
                  </div>
                  <div class="form-group">
                      <label for="showDescription">Description</label>
                      <input type="text" class="form-control" id="showDescription" placeholder="Description">
                  </div>
                  <div class="form-group">
                      <label for="showImagePreviewContainer">Brand Image</label>
                      <div id="showImagePreviewContainer" style="display: flex; flex-wrap: wrap; gap: 10px; margin-top: 10px;"></div>
                  </div>
                  <div class="form-group">
                    <label class="form-check-label mx-auto" for="showIsShow">Show this brand?</label>
                    <input type="checkbox" class="form-check-input mx-auto" id="showIsShow">
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
                <h5 class="modal-title" id="editModalLabel">Edit Promo Product</h5>
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
                                <label for="editName" class="mb-2">Name</label>
                                <input type="text" class="form-control" id="editName" placeholder="Name">
                            </div>
                            <div class="form-group">
                                {{-- <label for="editProduct" class="mb-2 pt-3">Product</label> --}}
                                <label for="editProduct" class="mb-2 pt-3">Product</label>
                                <select class="form-control select2" id="editProduct" style="width: 100%; height:100%">
                                    <option disabled value="" selected>Choose Product</option>
                                    @foreach ($product as $cat)
                                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="editDiscount" class="mb-2 pt-3">Discount</label>
                                <input type="number" class="form-control" id="editDiscount" placeholder="Discount" step="0.01">
                            </div>
                        </div>
                        <div class="col-md-6">

                            <div class="form-group">
                                <label for="editCashback" class="mb-2">Cashback</label>
                                <input type="number" class="form-control" id="editCashback" placeholder="Cashback" step="0.01">
                            </div>
                            <div class="form-group">
                                <label for="editBonus" class="mb-2 pt-3">Bonus</label>
                                <input type="number" class="form-control" id="editBonus" placeholder="Bonus" step="0.01">
                            </div>
                            <div class="form-group mb-3">
                                <label for="editBrandDescription" class="mb-2 pt-3">Description</label>
                                <input type="text" class="form-control" id="editBrandDescription" placeholder="Description">
                            </div>
                            <div class="form-group">
                                <label for="editPromoFront" class="mb-2 pt-3">Front Promotion</label>
                                <input type="text" class="form-control" id="editPromoFront" placeholder="Promotion Text">
                            </div>
                            <div class="form-group">
                                <label for="editPromoStart" class="mb-2 pt-3">Start Date</label>
                                <input type="date" class="form-control" id="editPromoStart">
                            </div>
                            <div class="form-group">
                                <label for="editPromoEnd" class="mb-2 pt-3">End Date</label>
                                <input type="date" class="form-control" id="editPromoEnd">
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Save</button>
                                <button type="button" class="btn btn-secondary closeModal" data-dismiss="modal">Cancel</button>
                            </div>                            
                        </div>
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
                Yakin ingin menghapus Brand ini ?
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
$(document).ready(function() {
    $('#createProduct').select2({
        dropdownParent: $("#createModal")              
    }); 

    $('#editProduct').select2({
    dropdownParent: $("#editModal"),
    disabled: true
});


    var table = $('#dataTable').DataTable({
        responsive: true,
        ajax: {
            url: '/api/v1/admin/pro-promo/',
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
            { data: null, 
                render: function (data, type, full, meta) {
                return meta.row + 1;
            }},
            { data: "product_id" },
            { data: "name" },
            { data: null, render: function (data, type, row) {
                return `<button onclick="showBrand(${row.id})" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></button>
                        <button onclick="editBrand(${row.id}, '${row.name}')" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></button>
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
    formData.append('name', $('#createBrandName').val());
    formData.append('product_id', $('#createProduct').val());
    formData.append('discount', $('#createDiscount').val());
    formData.append('cashback', $('#createCashback').val());
    formData.append('bonus', $('#createBonus').val());
    formData.append('promo_front', $('#createPromoFront').val());
    formData.append('promo_start', $('#createPromoStart').val());
    formData.append('promo_end', $('#createPromoEnd').val());


    $.ajax({
        url: '/api/v1/admin/pro-promo/',
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
                text: 'Brand created successfully!',
                icon: 'success',
                confirmButtonText: 'OK'
            });
        },
        error: function(request, msg, error) {
            console.log('Error creating Brand:', error);
            $('#createModal').modal('hide');
            Swal.fire({
                title: 'Error!',
                text: 'Failed to create Brand. Please try again.',
                icon: 'error',
                confirmButtonText: 'OK'
            });
        }
    });
});



    $('#dataTable').on('click', '.delete-btn', function() {
        var brandId = $(this).data('id');
        $('#deleteModal').modal('show');
        $('#confirmDelete').data('id', brandId); 
    });

    $('#confirmDelete').click(function() {
        var brandId = $(this).data('id');
        $.ajax({
            url: '/api/v1/admin/pro-promo/' + brandId,
            type: 'DELETE',
            headers: {
                'Authorization': 'Bearer ' + token
            },
            success: function(result) {
                $('#deleteModal').modal('hide');
                table.ajax.reload();
                Swal.fire({
                    title: 'Success!',
                    text: 'Brand Deleted successfully!',
                    icon: 'success',
                    confirmButtonText: 'OK'
                });
            },
            error: function(request, msg, error) {
                console.log('Error deleting Brand:', error);
                Swal.fire({
                    title: 'Error!',
                    text: 'Failed to deleting Brand. Please try again.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            }
        });
    });
    $('#editForm').submit(function(e) {
    e.preventDefault();

    var formData = new FormData(this);
    formData.append('_method', 'PUT'); 
    formData.append('name', $('#editName').val());
    formData.append('product_id', $('#editProduct').val());
    formData.append('discount', $('#editDiscount').val());
    formData.append('cashback', $('#editCashback').val());
    formData.append('bonus', $('#editBonus').val());
    formData.append('promo_front', $('#editPromoFront').val());
    formData.append('promo_start', $('#editPromoStart').val());
    formData.append('promo_end', $('#editPromoEnd').val());

    $.ajax({
        url: '/api/v1/admin/pro-promo/' + $('#editId').val(), 
        type: 'POST',
        headers: {
            'Authorization': 'Bearer ' + token
        },
        processData: false, 
        contentType: false,  
        data: formData,
        success: function(result) {
            table.ajax.reload(null, false);
            $('#editModal').modal('hide');
            Swal.fire({
                title: 'Success!',
                text: 'Brand updated successfully!',
                icon: 'success',
                confirmButtonText: 'OK'
            });
        },
        error: function(request, msg, error) {
            console.log('Error updating Brand:', error);
            $('#editModal').modal('hide');
            Swal.fire({
                title: 'Error!',
                text: 'Failed to update Brand. Please try again.',
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
function showBrand(id) {
  $.ajax({
        url: '/api/v1/admin/pro-promo/' + id, 
        type: 'GET',
        headers: {
                'Authorization': 'Bearer ' + token
        },
        contentType: 'application/json',
        success: function(response) {
          console.log(response.image);
            $('#showId').val(response.id);
            $('#showName').val(response.name);
            $('#showDescription').val(response.description);
            $('#showImagePreviewContainer').empty();
            $('#showBrandCategory').val(response.product_category_id);

            if (response.image) {
              let images = Array.isArray(response.image) ? response.image : [response.image];
              images.forEach(function(imageUrl) {
                  var fullPath = '/images/brand/' + imageUrl;
                  var img = $('<img>').attr("src", fullPath);
                  img.css({ "max-width": "150px", "height": "auto" });
                  $("#showImagePreviewContainer").append(img);
              });
          }

            $('#showIsShow').prop('checked', response.is_show === 1);

            $('#showModal').modal('show');
        },
        error: function(error) {
            console.log('Error fetching Brand:', error);
            Swal.fire({
                title: 'Error!',
                text: 'Failed to fetch Brand details. Please try again.',
                icon: 'error',
                confirmButtonText: 'OK'
            });
        }
    });
}
function editBrand(id) {
    $.ajax({
        url: '/api/v1/admin/pro-promo/' + id, 
        type: 'GET',
        headers: {
            'Authorization': 'Bearer ' + token
        },
        contentType: 'application/json',
        success: function(response) {
            $('#editId').val(response.id);
            $('#editName').val(response.name);
            $('#editProduct').val(response.product_id).trigger('change');
            $('#editDiscount').val(response.discount);
            $('#editCashback').val(response.cashback);
            $('#editBonus').val(response.bonus);
            $('#editDescription').val(response.description);
            $('#editModal').modal('show');
            $('#editPromoFront').val(response.promo_front);
            $('#editPromoStart').val(response.promo_start);
            $('#editPromoEnd').val(response.promo_end);
        },
        error: function(xhr, status, error) {
            console.log('Error fetching Brand:', error);
            Swal.fire({
                title: 'Error!',
                text: 'Failed to fetch Brand details. Please try again.',
                icon: 'error',
                confirmButtonText: 'OK'
            });
        }
    });
}
</script>
@endpush
