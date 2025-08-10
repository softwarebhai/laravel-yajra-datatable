<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users Yajra Datatable</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    <!-- for buttons -->
     <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">
     <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
     <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
     <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>

     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>

</head>
<body>

    <div class="container">
        <div class="card border-primary mt-3 mb-3">
            <div class="card-header">
                Users Yajra Datatable
            </div>
            <div class="card-body">
                <table class="table" id="users-table">
                    <thead>
                        <tr>
                            <td width="10">#</td>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Created</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>


    <script>
        $(function(){
            $('#users-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('users.index') }}",
                columns: [
                    { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                    { data: 'name', name: 'name' },
                    { data: 'email', name: 'email' },
                    { data: 'created_at', name: 'created_at' },
                    { data: 'action', name:'action', orderable:false, searchable: false }
                ],
                pageLength: 25, //Default per page
                lengthMenu: [ [10, 25, 50, 100, -1], [10,25,50,100, "All"] ], //Dropdown options
                responsive: true,
                autoWidth: false,
                dom: '<"d-flex justify-content-between"lfB>rtip', //Fix layout issue
                buttons: [
                    {
                        extend: 'copy',
                        text: 'Copy',
                        exportOptions: { columns: ':not(:last-child)' } //for remove action button column
                    },
                    {
                        extend: 'excel',
                        text: 'Export Excel',
                        exportOptions: { columns: ':not(:last-child)' } //for remove action button column
                    },
                    {
                        extend: 'pdf',
                        text: 'Export PDF',
                        exportOptions: { columns: ':not(:last-child)' } //for remove action button column
                    },
                    {
                        extend: 'print',
                        text: 'Print',
                        exportOptions: { columns: ':not(:last-child)' } //for remove action button column
                    }
                ]
            });
        });
    </script>

</body>
</html>