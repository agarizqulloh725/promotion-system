@extends('v1.backend.layout.main')

@section('title', 'Dashboard')

@push('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">
@endpush

@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h2 class="page-title"> Promo </h2>
    </div>
    <div class="d-flex justify-content-end">
        <button type="button" id="btnCreate" class="btn btn-primary mb-2">
            <i class="fa fa-plus"></i> Create Promo
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
                    <th> Start Date</th>
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
              <h5 class="modal-title" id="createModalLabel">Create Promo</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
            <form id="createForm">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="createPromoName" class="mb-2">Name</label>
                            <input type="text" class="form-control" id="createPromoName" placeholder="Promo Name">
                        </div>
                        <div class="form-group">
                            <label for="createPromoDescription" class="mb-2 pt-3">Description</label>
                            <input type="text" class="form-control" id="createPromoDescription" placeholder="Description">
                        </div>
                        <div class="form-group">
                            <label for="createStartTime" class="mb-2 pt-3">Start Time</label>
                            <input type="datetime-local" class="form-control" id="createStartTime">
                        </div>
                        <div class="form-group">
                            <label for="createEndTime" class="mb-2 pt-3">End Time</label>
                            <input type="datetime-local" class="form-control" id="createEndTime">
                        </div>
                        
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="createDiscount" class="mb-2">Discount</label>
                            <input type="number" step="0.01" class="form-control" id="createDiscount" placeholder="Discount">
                        </div>
                        <div class="form-group">
                            <label for="createCashback" class="mb-2 pt-3">Cashback</label>
                            <input type="number" step="0.01" class="form-control" id="createCashback" placeholder="Cashback">
                        </div>
                        <div class="form-group">
                            <label for="createBonus" class="mb-2 pt-3">Bonus</label>
                            <input type="number" step="0.01" class="form-control" id="createBonus" placeholder="Bonus">
                        </div>
                        <div class="form-group pt-3">
                            <label for="createPromoImages">Image</label>
                            <input type="file" class="form-control-file" id="createPromoImages" multiple onchange="previewImages();">
                            <div id="imagePreviewContainer" style="display: flex; flex-wrap: wrap; gap: 10px; margin-top: 10px;"></div>
                        </div>
                        <div class="form-group pt-3 mb-2">
                            <label class="form-check-label mx-auto" for="createIsShow">Show this Promo?</label>
                            <input type="checkbox" class="form-check-input mx-auto" id="createIsShow">
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
              <h5 class="modal-title" id="showModalLabel">Promo Detail</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
              <form id="showForm">
                <input type="hidden" id="showId" value="">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="showName" class="mb-2">Name</label>
                            <input type="text" class="form-control" id="showName" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <label for="showDescription" class="mb-2 pt-3">Description</label>
                            <input type="text" class="form-control" id="showDescription" placeholder="Description">
                        </div>
                        <div class="form-group">
                            <label for="showStartTime" class="mb-2 pt-3">Start Time</label>
                            <input type="datetime-local" class="form-control" id="showStartTime">
                        </div>
                        <div class="form-group">
                            <label for="showEndTime" class="mb-2 pt-3">End Time</label>
                            <input type="datetime-local" class="form-control" id="showEndTime">
                        </div>
                        
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="showDiscount" class="mb-2">Discount</label>
                            <input type="number" step="0.01" class="form-control" id="showDiscount" placeholder="Discount">
                        </div>
                        <div class="form-group">
                            <label for="showCashback" class="mb-2 pt-3">Cashback</label>
                            <input type="number" step="0.01" class="form-control" id="showCashback" placeholder="Cashback">
                        </div>
                        <div class="form-group">
                            <label for="showBonus" class="mb-2 pt-3">Bonus</label>
                            <input type="number" step="0.01" class="form-control" id="showBonus" placeholder="Bonus">
                        </div>
                        <div class="form-group pt-3" >
                            <label for="showPromoImages">Image</label>
                            <input type="file" class="form-control-file" id="showPromoImages" multiple onchange="showPreviewImages();">
                            <div id="showImagePreviewContainer" style="display: flex; flex-wrap: wrap; gap: 10px; margin-top: 10px;"></div>
                        </div>
                        <div class="form-group pt-3 mb-2">
                          <label class="form-check-label mx-auto" for="showIsShow">Show this Promo?</label>
                          <input type="checkbox" class="form-check-input mx-auto" id="showIsShow">
                      </div>
                        
                    </div>

                </div>                
              </form>
          </div>
      </div>
  </div>
</div>


<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Promo</h5>
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
                                <label for="editDescription" class="mb-2 pt-3">Description</label>
                                <input type="text" class="form-control" id="editDescription" placeholder="Description">
                            </div>
                            <div class="form-group">
                                <label for="editStartTime" class="mb-2 pt-3">Start Time</label>
                                <input type="datetime-local" class="form-control" id="editStartTime">
                            </div>
                            <div class="form-group">
                                <label for="editEndTime" class="mb-2 pt-3">End Time</label>
                                <input type="datetime-local" class="form-control" id="editEndTime">
                            </div>
                            
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="editDiscount" class="mb-2">Discount</label>
                                <input type="number" step="0.01" class="form-control" id="editDiscount" placeholder="Discount">
                            </div>
                            <div class="form-group">
                                <label for="editCashback" class="mb-2 pt-3">Cashback</label>
                                <input type="number" step="0.01" class="form-control" id="editCashback" placeholder="Cashback">
                            </div>
                            <div class="form-group">
                                <label for="editBonus" class="mb-2 pt-3">Bonus</label>
                                <input type="number" step="0.01" class="form-control" id="editBonus" placeholder="Bonus">
                            </div>
                            <div class="form-group pt-3" >
                                <label for="editPromoImages">Image</label>
                                <input type="file" class="form-control-file" id="editPromoImages" multiple onchange="editPreviewImages();">
                                <div id="editImagePreviewContainer" style="display: flex; flex-wrap: wrap; gap: 10px; margin-top: 10px;"></div>
                            </div>
                            <div class="form-group pt-3 mb-2">
                              <label class="form-check-label mx-auto" for="editIsShow">Show this Promo?</label>
                              <input type="checkbox" class="form-check-input mx-auto" id="editIsShow">
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
                Yakin ingin menghapus Promo ini ?
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
            url: '/api/v1/admin/promo/',
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
            { data: "name" },
            { data: "start_time" },
            { data: null, render: function (data, type, row) {
                console.log(data);
                return `<button onclick="showPromo(${row.id})" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></button>
                        <button onclick="editPromo(${row.id}, '${row.name}')" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></button>
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
    formData.append('name', $('#createPromoName').val());
    formData.append('description', $('#createPromoDescription').val());
    formData.append('start_time', $('#createStartTime').val());
    formData.append('end_time', $('#createEndTime').val());
    formData.append('discount', $('#createDiscount').val());
    formData.append('cashback', $('#createCashback').val());
    formData.append('bonus', $('#createBonus').val());
    var files = $('#createPromoImages').get(0).files;
    if (files.length > 0) {
        for (var i = 0; i < files.length; i++) {
            formData.append('image[]', files[i]);
        }
    }
    formData.append('is_show', $('#createIsShow').is(':checked') ? '1' : '0');

    $.ajax({
        url: '/api/v1/admin/promo/',
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
                text: 'Promo created successfully!',
                icon: 'success',
                confirmButtonText: 'OK'
            });
        },
        error: function(request, msg, error) {
            console.log('Error creating Promo:', error);
            $('#createModal').modal('hide');
            Swal.fire({
                title: 'Error!',
                text: 'Failed to create Promo. Please try again.',
                icon: 'error',
                confirmButtonText: 'OK'
            });
        }
    });
});



    $('#dataTable').on('click', '.delete-btn', function() {
        var PromoId = $(this).data('id');
        $('#deleteModal').modal('show');
        $('#confirmDelete').data('id', PromoId); 
    });

    $('#confirmDelete').click(function() {
        var PromoId = $(this).data('id');
        $.ajax({
            url: '/api/v1/admin/promo/' + PromoId,
            type: 'DELETE',
            headers: {
                'Authorization': 'Bearer ' + token
            },
            success: function(result) {
                $('#deleteModal').modal('hide');
                table.ajax.reload();
                Swal.fire({
                    title: 'Success!',
                    text: 'Promo Deleted successfully!',
                    icon: 'success',
                    confirmButtonText: 'OK'
                });
            },
            error: function(request, msg, error) {
                console.log('Error deleting Promo:', error);
                Swal.fire({
                    title: 'Error!',
                    text: 'Failed to deleting Promo. Please try again.',
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
    var files = $('#editPromoImages').get(0).files;
    
    if (files.length > 0) {
        $.each(files, function(i, file) {
            formData.append('image[]', file);
        });
    }

    formData.append('name', $('#editName').val());
    formData.append('description', $('#editDescription').val());
    formData.append('product_category_id', $('#editPromoCategory').val());
    formData.append('start_time', $('#editStartTime').val());
    formData.append('end_time', $('#editEndTime').val());
    formData.append('discount', $('#editDiscount').val());
    formData.append('cashback', $('#editCashback').val());
    formData.append('bonus', $('#editBonus').val());
    formData.append('is_show', $('#editIsShow').is(':checked') ? 1 : 0); 

    $.ajax({
        url: '/api/v1/admin/promo/' + $('#editId').val(),
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
                text: 'Promo updated successfully!',
                icon: 'success',
                confirmButtonText: 'OK'
            });
        },
        error: function(request, msg, error) {
            console.log('Error updating Promo:', error);
            $('#editModal').modal('hide');
            Swal.fire({
                title: 'Error!',
                text: 'Failed to update Promo. Please try again.',
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
function showPromo(id) {
  $.ajax({
        url: '/api/v1/admin/promo/' + id, 
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
            $('#showPromoCategory').val(response.product_category_id);
            $('#showStartTime').val(response.start_time);
            $('#showEndTime').val(response.end_time);
            $('#showDiscount').val(response.discount);
            $('#showCashback').val(response.cashback);
            $('#showBonus').val(response.bonus);
            $('#showImagePreviewContainer').empty();
            $('#showPromoCategory').val(response.product_category_id);

            if (response.image) {
              let images = Array.isArray(response.image) ? response.image : [response.image];
              images.forEach(function(imageUrl) {
                  var fullPath = '/images/promo/' + imageUrl;
                  var img = $('<img>').attr("src", fullPath);
                  img.css({ "max-width": "150px", "height": "auto" });
                  $("#showImagePreviewContainer").append(img);
              });
          }

            $('#showIsShow').prop('checked', response.is_show === 1);

            $('#showModal').modal('show');
        },
        error: function(error) {
            console.log('Error fetching Promo:', error);
            Swal.fire({
                title: 'Error!',
                text: 'Failed to fetch Promo details. Please try again.',
                icon: 'error',
                confirmButtonText: 'OK'
            });
        }
    });
}
function editPromo(id) {
    $.ajax({
        url: '/api/v1/admin/promo/' + id, 
        type: 'GET',
        headers: {
                'Authorization': 'Bearer ' + token
        },
        contentType: 'application/json',
        success: function(response) {
            console.log(response.image);
            $('#editId').val(response.id);
            $('#editName').val(response.name);
            $('#editDescription').val(response.description);
            $('#editStartTime').val(response.start_time);
            $('#editEndTime').val(response.end_time);
            $('#editDiscount').val(response.discount);
            $('#editCashback').val(response.cashback);
            $('#editBonus').val(response.bonus);
            $('#editImagePreviewContainer').empty();
            $('#editPromoCategory').val(response.product_category_id);

            if (response.image) {
                let images = Array.isArray(response.image) ? response.image : [response.image];
                images.forEach(function(imageUrl) {
                    var fullPath = '/images/promo/' + imageUrl;
                    var img = $('<img>').attr("src", fullPath);
                    img.css({ "max-width": "150px", "height": "auto" });
                    $("#editImagePreviewContainer").append(img);
                });
            }

            $('#editIsShow').prop('checked', response.is_show === 1);

            $('#editModal').modal('show');
        },
        error: function(error) {
            console.log('Error fetching Promo:', error);
            Swal.fire({
                title: 'Error!',
                text: 'Failed to fetch Promo details. Please try again.',
                icon: 'error',
                confirmButtonText: 'OK'
            });
        }
    });
}


function previewImages() {
    var files = $("#createPromoImages").get(0).files;
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
    var files = $("#editPromoImages").get(0).files; 
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
