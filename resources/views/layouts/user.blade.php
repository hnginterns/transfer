
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title> @yield('title') </title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <link rel="stylesheet" type="text/css" href="{{   URL::asset('css/user-style.css')  }}">
  <!-- Datatables -->
  <link rel="stylesheet" href="https://adminlte.io/themes/AdminLTE/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

  <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.2/sweetalert2.min.css" />

</head>

<body style="background-color:#fff;">
    @include('layouts.user-nav') 

    <div class="container-fluid" style="margin-top: 60px;">
      <div class="row">
      
        <div class="col-sm-3 col-md-2 sidebar">
        @include('layouts.user-sidebar')
        </div>

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
 

        @yield('content')
        </div>

      </div>
    </div>
        @include('layouts.user-footer')

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://adminlte.io/themes/AdminLTE/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="https://adminlte.io/themes/AdminLTE/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.2/sweetalert2.js"></script>
  
  <!-- page script -->
<script>
  $(function () {
    $('#datatable').DataTable({
        "order": [[ 8, "desc" ]]
    });
    $('#datatable-history').DataTable({
        "order": [[ 3, "desc" ]]
    });
    $('#datatable-list').DataTable({
        "order": [[ 4, "desc" ]]
    });
    $('#datatable-transfer').DataTable({
        "order": [[ 4, "desc" ]]
    });
    $('#topuphistory').DataTable({
        "order": [[ 7, "desc" ]]
    });
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    });

  })
</script>

<script>

  @if(Session::has('success'))
        toastr.success("{{ Session::get('success') }}");
  @endif

  @if(Session::has('info'))
        toastr.info("{{ Session::get('info') }}");
  @endif

  @if(Session::has('warning'))
        toastr.warning("{{ Session::get('warning') }}");
  @endif

  @if(Session::has('error'))
        toastr.error("{{ Session::get('error') }}");
  @endif

  @if(Session::has('errors'))
      @foreach(Session::get('errors') as $key => $messages)	
        	toastr.error("{{$messages}}");
	@endforeach   
  @endif

  @if(Session::has('form-errors'))
      @foreach(Session::get('form-errors') as $key => $messages)
          @foreach($messages as $keys => $errors)	
        	  toastr.error("{{$errors}}");
          @endforeach
	    @endforeach   
  @endif


   </script>

      @yield('add_js')

</body>

</html>
