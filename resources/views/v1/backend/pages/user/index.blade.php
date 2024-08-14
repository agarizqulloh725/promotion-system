@extends('v1.backend.layout.main')

@section('title', 'Dashboard')

@push('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">
@endpush

@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h2 class="page-title"> User Produk </h2>
    </div>
    <div class="d-flex justify-content-end">
        <button type="button" id="btnCreate" class="btn btn-primary mb-2">
            <i class="fa fa-plus"></i> Tambah User
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
                    <th> email</th>
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
                <h5 class="modal-title" id="createModalLabel">Create New User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="createForm">
                  <div class="form-group">
                      <label for="createUserName">Name</label>
                      <input type="text" class="form-control" id="createUserName" placeholder="Enter User name">
                  </div>
                  <div class="form-group">
                      <label for="createUserEmail">Email</label>
                      <input type="email" class="form-control" id="createUserEmail" placeholder="Enter email">
                  </div>
                  <div class="form-group">
                    <label for="createPerimission">Role Akses</label>
                    <select class="form-control" id="createPermission">
                        @foreach ($permissions as $permis)
                            <option value="{{ $permis->id }}">{{ $permis->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group" id="branchHandleContainer" style="display: none;">
                    <label for="handleBranch">Handle Cabang</label>
                    <select class="form-control" id="handleBranch">
                    </select>
                </div>                
                  <div class="form-group">
                      <label for="createUserPassword">Password</label>
                      <input type="password" class="form-control" id="createUserPassword" placeholder="Enter password">
                  </div>
                  <div class="form-group">
                      <label for="createUserImages">User Image</label>
                      <input type="file" class="form-control-file" id="createUserImages" onchange="previewImages();">
                      <div id="imagePreviewContainer" style="display: flex; flex-wrap: wrap; gap: 10px; margin-top: 10px;"></div>
                  </div>
                  <div class="form-group">
                      <label class="form-check-label mx-auto" for="createIsShow">Show this User?</label>
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
              <h5 class="modal-title" id="showModalLabel">Edit User</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
              <form id="showForm">
                  <input type="hidden" id="showId" value="">
                  <div class="form-group">
                      <label for="showName">Nama User</label>
                      <input type="text" class="form-control" id="showName" placeholder="Masukan Nama">
                  </div>
                  <div class="form-group">
                      <label for="showDescription">Description</label>
                      <input type="text" class="form-control" id="showDescription" placeholder="Masukan deskripsi">
                  </div>
                  <div class="form-group">
                      <label for="showImagePreviewContainer">User Image</label>
                      <div id="showImagePreviewContainer" style="display: flex; flex-wrap: wrap; gap: 10px; margin-top: 10px;"></div>
                  </div>
                  <div class="form-group">
                    <label class="form-check-label mx-auto" for="showIsShow">Show this User?</label>
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
                <h5 class="modal-title" id="editModalLabel">Edit User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editForm">
                    <input type="hidden" id="editId" value="">
                    <div class="form-group">
                        <label for="editName">Name</label>
                        <input type="text" class="form-control" id="editName" placeholder="Enter User name">
                    </div>
                    <div class="form-group">
                        <label for="editEmail">Email</label>
                        <input type="email" class="form-control" id="editEmail" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label for="editPermission">Role Akses</label>
                        <select class="form-control" id="editPermission">
                            @foreach ($permissions as $perm)
                                <option value="{{ $perm->id }}">{{ $perm->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group" id="editBranchHandleContainer" style="display: none;">
                        <label for="editHandleBranch">Handle Cabang</label>
                        <select class="form-control" id="editHandleBranch">
                            <!-- Options will be dynamically added here -->
                        </select>
                    </div>                    
                    <div class="form-group">
                        <label for="editPassword">Password</label>
                        <input type="password" class="form-control" id="editPassword" placeholder="Enter new password (leave blank if unchanged)">
                    </div>
                    <div class="form-group">
                        <label for="editUserImages">User Image</label>
                        <input type="file" class="form-control-file" id="editUserImages" onchange="editPreviewImages();">
                        <div id="editImagePreviewContainer" style="display: flex; flex-wrap: wrap; gap: 10px; margin-top: 10px;"></div>
                    </div>
                    <div class="form-group">
                        <label class="form-check-label mx-auto" for="editIsShow">Show this User?</label>
                        <input type="checkbox" class="form-check-input mx-auto" id="editIsShow">
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
                Yakin ingin menghapus User ini ?
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
            url: '/api/v1/admin/user/',
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
            { data: "email" },
            { data: null, render: function (data, type, row) {
                return `<button onclick="showUser(${row.id})" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></button>
                        <button onclick="editUser(${row.id}, '${row.name}')" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></button>
                        <button class="btn btn-danger btn-sm delete-btn" data-id="${row.id}"><i class="fa fa-trash"></i></button>`;
            }}
        ]
    });

    $('#createPermission').change(function() {
        var selectedRole = $(this).val();
        if (selectedRole !== '1') {
            $.ajax({
                url: '/api/v1/admin/branch', 
                type: 'GET',
                headers: {
                    'Authorization': 'Bearer ' + token
                },
                success: function(response) {
                    var select = $('#handleBranch');
                    select.empty(); 
                    
                    response.forEach(function(branch) {
                        select.append($('<option>', {
                            value: branch.id,
                            text: branch.name
                        }));
                    });
                    $('#branchHandleContainer').show();
                },
                error: function() {
                    $('#branchHandleContainer').hide();
                }
            });
        } else {
            $('#branchHandleContainer').hide();
        }
    });

    // $('#editPermission').change(function() {
    //     handleBranchSelector($(this).val(), 'edit');
    // });


    $('#btnCreate').click(function() {
        $('#createModal').modal('show');
    })
    $('#createForm').submit(function(e) {
    e.preventDefault();

    var formData = new FormData(this);
    formData.append('name', $('#createUserName').val());
    formData.append('email', $('#createUserEmail').val());
    formData.append('password', $('#createUserPassword').val());
    formData.append('permission_id', $('#createPermission').val());

    var idBranch = $('#handleBranch').val();
    if (idBranch) {
        formData.append('branch_id', idBranch);
    }

    var files = $('#createUserImages').get(0).files;
    if (files.length > 0) {
        for (var i = 0; i < files.length; i++) {
            formData.append('image', files[i]);
        }
    }
    formData.append('is_show', $('#createIsShow').is(':checked') ? '1' : '0');

    $.ajax({
        url: '/api/v1/admin/user/',
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
                text: 'User created successfully!',
                icon: 'success',
                confirmButtonText: 'OK'
            });
        },
        error: function(request, msg, error) {
            console.log('Error creating User:', error);
            $('#createModal').modal('hide');
            Swal.fire({
                title: 'Error!',
                text: 'Failed to create User. Please try again.',
                icon: 'error',
                confirmButtonText: 'OK'
            });
        }
    });
});




    $('#dataTable').on('click', '.delete-btn', function() {
        var UserId = $(this).data('id');
        $('#deleteModal').modal('show');
        $('#confirmDelete').data('id', UserId); 
    });

    $('#confirmDelete').click(function() {
        var UserId = $(this).data('id');
        $.ajax({
            url: '/api/v1/admin/user/' + UserId,
            type: 'DELETE',
            headers: {
                'Authorization': 'Bearer ' + token
            },
            success: function(result) {
                $('#deleteModal').modal('hide');
                table.ajax.reload();
                Swal.fire({
                    title: 'Success!',
                    text: 'User Deleted successfully!',
                    icon: 'success',
                    confirmButtonText: 'OK'
                });
            },
            error: function(request, msg, error) {
                console.log('Error deleting User:', error);
                Swal.fire({
                    title: 'Error!',
                    text: 'Failed to deleting User. Please try again.',
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
    var files = $('#editUserImages').get(0).files;

    if (files.length > 0) {
        $.each(files, function(i, file) {
            formData.append('image', file);  
        });
    }

    var idBranchEdit = $('#editHandleBranch').val();
    if (idBranchEdit) {
        formData.append('branch_id', idBranchEdit);
    }

    formData.append('name', $('#editName').val());
    formData.append('email', $('#editEmail').val());
    var password = $('#editPassword').val();
    if (password) {
        formData.append('password', password);
    }
    formData.append('permission_id', $('#editPermission').val());
    formData.append('is_show', $('#editIsShow').is(':checked') ? 1 : 0);

    $.ajax({
        url: '/api/v1/admin/user/' + $('#editId').val(),
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
                text: 'User updated successfully!',
                icon: 'success',
                confirmButtonText: 'OK'
            });
        },
        error: function(request, msg, error) {
            console.log('Error updating User:', error);
            $('#editModal').modal('hide');
            Swal.fire({
                title: 'Error!',
                text: 'Failed to update User. Please try again.',
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
function showUser(id) {
  $.ajax({
        url: '/api/v1/admin/user/' + id, 
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
            $('#showUserCategory').val(response.product_category_id);

            if (response.image) {
              let images = Array.isArray(response.image) ? response.image : [response.image];
              images.forEach(function(imageUrl) {
                  var fullPath = 'https://lima-waktu.my.id/public/images/user/' + imageUrl;
                  var img = $('<img>').attr("src", fullPath);
                  img.css({ "max-width": "150px", "height": "auto" });
                  $("#showImagePreviewContainer").append(img);
              });
          }

            $('#showIsShow').prop('checked', response.is_show === 1);

            $('#showModal').modal('show');
        },
        error: function(error) {
            console.log('Error fetching User:', error);
            Swal.fire({
                title: 'Error!',
                text: 'Failed to fetch User details. Please try again.',
                icon: 'error',
                confirmButtonText: 'OK'
            });
        }
    });
}
function handleBranchSelector(selectedRole,selectedBranch, mode) {
        var url = '/api/v1/admin/branch';
        var branchSelectId = mode === 'edit' ? '#editHandleBranch' : '#handleBranch';
        var branchContainerId = mode === 'edit' ? '#editBranchHandleContainer' : '#branchHandleContainer';


        console.log(selectedRole);
        if (selectedRole !== 1) {
            $.ajax({
                url: url,
                type: 'GET',
                headers: {
                    'Authorization': 'Bearer ' + token
                },
                success: function(response) {
                    var select = $(branchSelectId);
                    select.empty();
                    response.forEach(function(branch) {
                        select.append($('<option>', {
                            value: branch.id,
                            text: branch.name,
                            selected: branch.id == selectedBranch
                        }));
                    });
                    $(branchContainerId).show();
                },
                error: function() {
                    $(branchContainerId).hide();
                    console.log('Error fetching branches');
                }
            });
        } else {
            $(branchContainerId).hide();
        }
    }
function editUser(id) {
    $.ajax({
        url: '/api/v1/admin/user/' + id, 
        type: 'GET',
        headers: {
                'Authorization': 'Bearer ' + token
        },
        contentType: 'application/json',
        success: function(response) {
            handleBranchSelector(response.role_permissions[0].permission_id,response.branch_id, 'edit');
            $('#editId').val(response.id);
            $('#editName').val(response.name);
            $('#editEmail').val(response.email);

            $('#editPassword').val('');

            $('#editPermission').val(response.role_permissions[0].permission_id);

            $('#editUserImages').val('');
            $('#editImagePreviewContainer').empty();
            if (response.image) {
                let fullPath = 'https://lima-waktu.my.id/public/images/user/' + response.image;
                var img = $('<img>').attr("src", fullPath).css({ "max-width": "150px", "height": "auto" });
                $("#editImagePreviewContainer").append(img);
            }

            $('#editIsShow').prop('checked', response.is_show === 1);

            $('#editModal').modal('show');
        },
        error: function(error) {
            console.log('Error fetching User:', error);
            Swal.fire({
                title: 'Error!',
                text: 'Failed to fetch User details. Please try again.',
                icon: 'error',
                confirmButtonText: 'OK'
            });
        }
    });
}



function previewImages() {
    var files = $("#createUserImages").get(0).files;
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
    var files = $("#editUserImages").get(0).files; 
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
