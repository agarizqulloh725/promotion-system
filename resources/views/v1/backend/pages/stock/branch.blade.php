@extends('v1.backend.layout.main')

@section('title', 'Dashboard')

@push('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">
@endpush

@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h2 class="page-title"> Stock Product</h2>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <table id="dataTable" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Cabang</th>
                                <th>Action</th>
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
@endsection

@push('script')
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js" defer></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js" defer></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11" defer></script>
<script src="{{ asset('utils.js') }}" defer></script>
<script>
const token = getCookieValue('access_token');
document.addEventListener('DOMContentLoaded', function () {
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
            console.log(response.user.branch_id);
            if (response.permission === "admin") {
                $('#btnCreate').hide();
            } else {
                $('#btnCreate').show();
            }
            return response.user.branch_id;
        } catch (error) {
            console.log('Error fetching user details:', error);
            return null;
        }
    }

    async function initializeTable(userHandle) {
        $('#dataTable').DataTable({
            responsive: true,
            ajax: {
                url: '/api/v1/admin/branch',
                type: 'GET',
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
                    if (userHandle === null || userHandle == row.id) {
                        return `<a href='/admin/stock/${row.id}' class="btn btn-primary btn-sm">Stock</a>`;
                    } else {
                        return `<button class="btn btn-secondary btn-sm" onclick="showAccessDeniedAlert()">No Access</button>`;
                    }
                }}
            ]
        });
    }

    async function main() {
        const token = getCookieValue('access_token');
        const userHandle = await fetchMe();
        console.log(userHandle);
        
        initializeTable(userHandle);
    }

    main();
});

function showAccessDeniedAlert() {
    Swal.fire({
        icon: 'error',
        title: 'Akses dilarang!',
        text: 'kamu tidak memiliki akses ke halaman ini, harap hubungi admin',
        confirmButtonText: 'OK'
    });
}
</script>
@endpush
