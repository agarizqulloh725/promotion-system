@extends('v1.backend.layout.main')

@section('title', 'Dashboard')

@push('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">
@endpush

@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h2 class="page-title"> Brand Produk </h2>
    </div>
    <div class="d-flex justify-content-end">
        <button type="button" id="btnCreate" class="btn btn-primary mb-2">
            <i class="fa fa-plus"></i> Tambah Brand
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
                    <th> Type Kategori </th>
                    <th> Name Brand</th>
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
              <h5 class="modal-title" id="createModalLabel">Create New Brand</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
              <form id="createForm">
                  <div class="form-group">
                      <label for="brandName">Name Brand</label>
                      <input type="text" class="form-control" id="brandName" placeholder="Enter Brand name">
                  </div>
                  <div class="form-group">
                      <label for="productCategory">Category</label>
                      <select class="form-control" id="productCategory">
                          @foreach ($category as $cat)
                              <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                          @endforeach
                      </select>
                  </div>
                  <div class="form-group">
                      <label for="brandDescription">Deskripsi Brand</label>
                      <input type="text" class="form-control" id="brandDescription" placeholder="Masukan Deskripsi">
                  </div>
                  <div class="form-group">
                      <label for="brandImage">Brand Image</label>
                      <input type="file" class="form-control-file" id="brandImage">
                  </div>
                  <div class="form-group">
                    <label class="form-check-label mx-auto" for="isShow">Show this brand?</label>
                    <input type="checkbox" class="form-check-input mx-auto" id="isShow">
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
                <h5 class="modal-title" id="showModalLabel">Show Brand</h5>
                <button type="button" class="close closeModal" data-dismiss="modal" aria-label="Close">
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
                        <label for="showDescription">Description</label>
                        <input type="text" class="form-control" id="showDescription" placeholder="Masukan deskripsi">
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
                <h5 class="modal-title" id="editModalLabel">Edit Brand</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editForm">
                    <input type="hidden" id="editId" value="">
                    <div class="form-group">
                        <label for="editName">Nama Brand</label>
                        <input type="text" class="form-control" id="editName" placeholder="Masukan Nama">
                    </div>
                    <div class="form-group">
                        <label for="updateDescription">Description</label>
                        <input type="text" class="form-control" id="updateDescription" placeholder="Masukan deskripsi">
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
            url: '/api/v1/admin/brand/',
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
        var brandName = $('#brandName').val();
        var brandDescription = $('#brandDescription').val();
        $.ajax({
            url: '/api/v1/admin/brand/',
            type: 'POST',
            headers: {
            'Authorization': 'Bearer ' + token
            },
            contentType: 'application/json',
            data: JSON.stringify({
                name: brandName,
                description: brandDescription
            }),
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
        var id = $('#editId').val();
        var updatedName = $('#editName').val();
        var updateDescription = $('#updateDescription').val(); 
        $.ajax({
            url: '/api/v1/admin/brand/' + id,
            type: 'PUT',
            headers: {
                'Authorization': 'Bearer ' + token
            },
            data: { 
                name: updatedName,
                description: updateDescription
            },
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
            $('#showId').val(response.id);             
            $('#showName').val(response.name);        
            $('#showDescription').val(response.description); 

            $('#showModal').modal('show');
        },
        error: function(error) {
            console.log('Error fetching brand:', error);
            Swal.fire({
                title: 'Error!',
                text: 'Failed to fetch brand details. Please try again.',
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
            $('#editId').val(response.id);             
            $('#editName').val(response.name);        
            $('#updateDescription').val(response.description); 

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

</script>
@endpush
