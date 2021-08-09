<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>URL Shortener</title>

  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('public/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('public/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('public/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">

  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('public/css/adminlte.min.css') }}">

  <!-- Toastr -->
  <link href="{{ asset('public/css/toastr.min.css')}}" rel="stylesheet" />

</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <div>
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-12 col-md-10 col-lg-10">
              <h1>URL shortener API</h1>
            </div>
            <div class="col-sm-12 col-md-2 col-lg-2">
              <a href="{{ url('shorturl') }}" class="btn btn-info float-right">Add New URL</a>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-12">
            <ol class="breadcrumb">
              <li class="breadcrumb-item active">Home</li>
            </ol>
          </div>
          </div>
        </div>
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">

              <div class="card card-secondary">
                <div class="card-header">
                  <h3 class="card-title">Top 100 URL Lisiting</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="table_url" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Title</th>
                        <th>Short URL</th>
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
      </section>
      <!-- /.content -->
    </div>
  </div>

<!-- jQuery -->
<script src="{{ asset('public/plugins/jquery/jquery.min.js') }}"></script>

<!-- DataTables  & Plugins -->
<script src="{{ asset('public/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('public/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('public/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('public/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('public/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('public/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>

<!-- Toastr -->
<script src="{{ asset('public/js/toastr.min.js')}}"></script>

<script>
  $(function () {

    $(function() {
      toastr.options = {
          "newestOnTop": true,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "closeButton": true,
        }
        @if(Session::has('message'))
          var type="{{Session::get('alert-type','info')}}"

          switch(type){
              case 'info':
                toastr.info("{{ Session::get('message') }}");
                  break;
              case 'success':
                  toastr.success("{{ Session::get('message') }}");
                  break;
              case 'warning':
                  toastr.warning("{{ Session::get('message') }}");
                  break;
              case 'error':
                  toastr.error("{{ Session::get('message') }}");
                  break;
          }
        @endif
    });

   var dataTable = $('#table_url').DataTable({
      processing: true,
      serverSide: true,
      "responsive": true,
      ajax: "{{ url('/') }}",
      columns: [
        { data: 'title', name: 'title' },        
        {data: 'action', name: 'action'},
      ]
    });

  });
</script>
</body>
</html>
