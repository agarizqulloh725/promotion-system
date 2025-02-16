@extends('v1.backend.layout.main')

@section('title', 'Dashboard')

@push('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">
@endpush

@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h2 class="page-title"> Brand Product </h2>
    </div>
    <div class="d-flex justify-content-end">
        <button type="button" id="btnCreate" class="btn btn-primary mb-2">
            <i class="fa fa-plus"></i> Create Brand
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
                    <th> Category</th>
                    <th> Brand</th>
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
              <h5 class="modal-title" id="createModalLabel">Create Brand</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
              <form id="createForm">
                  <div class="form-group">
                      <label for="createBrandName" class="mb-2">Brand</label>
                      <input type="text" class="form-control" id="createBrandName" placeholder="Name">
                  </div>
                  <div class="form-group">
                      <label for="createBrandCategory" class="mb-2 pt-3">Category</label>
                      <select class="form-control" id="createBrandCategory">
                          @foreach ($category as $cat)
                              <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                          @endforeach
                      </select>
                  </div>
                  <div class="form-group">
                      <label for="createBrandDescription" class="mb-2 pt-3">Description</label>
                      <input type="text" class="form-control" id="createBrandDescription" placeholder="Description">
                  </div>
                  <div class="form-group pt-3">
                      <label for="createBrandImages">Image</label>
                      <input type="file" class="form-control-file" id="createBrandImages" multiple onchange="previewImages();">
                      <div id="imagePreviewContainer" style="display: flex; flex-wrap: wrap; gap: 10px; margin-top: 10px;"></div>
                  </div>
                  <div class="form-group pt-3">
                    <label class="form-check-label mx-auto" for="createIsShow">Show this brand?</label>
                    <input type="checkbox" class="form-check-input mx-auto" id="createIsShow">
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
              <h5 class="modal-title" id="showModalLabel">Edit Brand</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
              <form id="showForm">
                  <input type="hidden" id="showId" value="">
                  <div class="form-group">
                      <label for="showName" class="mb-2">Brand</label>
                      <input type="text" class="form-control" id="showName" placeholder="Name">
                  </div>
                  <div class="form-group">
                      <label for="showBrandCategory" class="mb-2 pt-3">Category</label>
                      <select class="form-control" id="showBrandCategory">
                          @foreach ($category as $cat)
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
              <h5 class="modal-title" id="editModalLabel">Edit Brand</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
              <form id="editForm">
                  <input type="hidden" id="editId" value="">
                  <div class="form-group">
                      <label for="editName" class="mb-2">Brand</label>
                      <input type="text" class="form-control" id="editName" placeholder="name">
                  </div>
                  <div class="form-group">
                      <label for="editBrandCategory" class="mb-2 pt-3">Category</label>
                      <select class="form-control" id="editBrandCategory">
                          @foreach ($category as $cat)
                              <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                          @endforeach
                      </select>
                  </div>
                  <div class="form-group">
                      <label for="editDescription" class="mb-2 pt-3">Description</label>
                      <input type="text" class="form-control" id="editDescription" placeholder="Descrition">
                  </div>
                  <div class="form-group">
                      <label for="editBrandImages" class="mb-2 pt-3">Image</label>
                      <input type="file" class="form-control-file" id="editBrandImages" multiple onchange="editPreviewImages();">
                      <div id="editImagePreviewContainer" style="display: flex; flex-wrap: wrap; gap: 10px; margin-top: 10px;"></div>
                  </div>
                  <div class="form-group pt-2">
                    <label class="form-check-label mx-auto" for="editIsShow">Show this brand?</label>
                    <input type="checkbox" class="form-check-input mx-auto" id="editIsShow">
                </div>                
                  <div class="modal-footer pt-3">
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{ asset('utils.js') }}"></script>
<script>
const token = getCookieValue('access_token');
$(document).ready(function() {
    var table = $('#dataTable').DataTable({
        responsive: true,
        ajax: {
            url: '/api/v1/admin/brand',
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
            { data: null, 
              render: function (data, type, full, meta) {
                return data.product_category.name;
            }},
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
      formData.append('description', $('#createBrandDescription').val());
      formData.append('product_category_id', $('#createBrandCategory').val());
      var files = $('#createBrandImages').get(0).files;
      if (files.length > 0) {
          for (var i = 0; i < files.length; i++) {
              formData.append('image[]', files[i]);
          }
      }
      formData.append('is_show', $('#createIsShow').is(':checked') ? '1' : '0');

      $.ajax({
          url: '/api/v1/admin/brand',
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
          error: function(xhr,request, msg, error) {
              console.log('Error creating Brand:', error);
              $('#createModal').modal('hide');
              const res = JSON.parse(xhr.responseText);
              Swal.fire({
                  title: 'Error!',
                  text: res.message,
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
            url: '/api/v1/admin/brand/' + brandId,
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
    var files = $('#editBrandImages').get(0).files;
    
    if (files.length > 0) {
        $.each(files, function(i, file) {
            formData.append('image[]', file);
        });
    }

    formData.append('name', $('#editName').val());
    formData.append('description', $('#editDescription').val());
    formData.append('product_category_id', $('#editBrandCategory').val());
    formData.append('is_show', $('#editIsShow').is(':checked') ? 1 : 0); 

    $.ajax({
        url: '/api/v1/admin/brand/' + $('#editId').val(),
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
        url: '/api/v1/admin/brand/' + id, 
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
                  var fullPath = 'https://lima-waktu.my.id/public/images/brand/' + imageUrl;
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
        url: '/api/v1/admin/brand/' + id, 
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
            $('#editImagePreviewContainer').empty();
            $('#editBrandCategory').val(response.product_category_id);

            if (response.image) {
                let images = Array.isArray(response.image) ? response.image : [response.image];
                images.forEach(function(imageUrl) {
                    var fullPath = 'https://lima-waktu.my.id/public/images/brand/' + imageUrl;
                    var img = $('<img>').attr("src", fullPath);
                    img.css({ "max-width": "150px", "height": "auto" });
                    $("#editImagePreviewContainer").append(img);
                });
            }

            $('#editIsShow').prop('checked', response.is_show === 1);

            $('#editModal').modal('show');
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
