<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>URL Shortener | Add URL Form</title>

  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('public/css/adminlte.min.css') }}">

  <!-- Custom style -->
  <link rel="stylesheet" href="{{ asset('public/css/custom.css') }}">

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
              <a href="{{ url('/') }}" class="btn btn-info float-right">Back</a>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item active">Add Form</li>
              </ol>
            </div>
          </div>
        </div>
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card card-secondary">
                <div class="card-header">
                  <h3 class="card-title">Add URL Form</h3>
                </div>
                <form method="POST" action="{{ route('shorturl.store') }}" id="addurl_form">
                @csrf
                @method('POST') 
                  <div class="card-body">
                    <div class="form-group">
                      <label for="title">Title<span class="required">*</span></label>
                      <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Enter Title" value="{{ old('title') }}" required>
                      @error('title')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="url">URL<span class="required">*</span></label>
                      <input type="text" name="url" class="form-control @error('url') is-invalid @enderror" id="url" placeholder="Enter URL" value="{{ old('url') }}" required>
                      @error('url')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
                  </div>
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>
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

<!-- jquery-validation -->
<script src="{{ asset('public/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
<script src="{{ asset('public/plugins/jquery-validation/additional-methods.min.js') }}"></script>

<!-- Page specific script -->
<script>
$(function () {
  $('#addurl_form').validate({
    rules: {
      title: {
        required: true,
        maxlength:50
      },
      url: {
        required: true,
        maxlength: 255,
        url: true
      },
    },
    messages: {
      title: {
        required: "Please enter a title",
      },
      url: {
        required: "Please provide a url",
        url: "Please enter a vaild url"
      },
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});
</script>
</body>
</html>
