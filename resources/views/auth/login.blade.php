<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Aplikasi | Login </title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{asset('')}}assets/vendors/feather/feather.css">
  <link rel="stylesheet" href="{{asset('')}}assets/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="{{asset('')}}assets/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="{{asset('')}}assets/vendors/typicons/typicons.css">
  <link rel="stylesheet" href="{{asset('')}}assets/vendors/simple-line-icons/css/simple-line-icons.css">
  <link rel="stylesheet" href="{{asset('')}}assets/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{asset('')}}assets/css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{asset('')}}assets/images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <img src="{{asset('')}}/logo2.png" style="width: 200px;" alt="logo">
              </div>
              <h4>Hello! let's get started</h4>
              <h6 class="fw-light">Sign in to continue.</h6>
              <form action="{{route('post_login')}}" method="POST" class="pt-3">
                @csrf
                <div class="form-group">
                  <input name="email" required type="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Email">
                </div>
                <div class="form-group">
                  <input name="password" required type="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password">
                </div>
                <div class="mt-3">
                  <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">SIGN IN</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="{{asset('')}}assets/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="{{asset('')}}assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="{{asset('')}}assets/js/off-canvas.js"></script>
  <script src="{{asset('')}}assets/js/hoverable-collapse.js"></script>
  <script src="{{asset('')}}assets/js/template.js"></script>
  <script src="{{asset('')}}assets/js/settings.js"></script>
  <script src="{{asset('')}}assets/js/todolist.js"></script>
  <script src="{{asset('')}}assets/vendors/sweetalert2/dist/sweetalert2.min.js"></script>
  <link rel="stylesheet" href="{{asset('')}}assets/vendors/sweetalert2/dist/sweetalert2.min.css">

  @if(session('error'))
  <script>
    Swal.fire({
      title: 'Gagal!',
      text: '{{session("error")}}',
      icon: 'error',
    })
  </script>
  @endif
  <!-- endinject -->
</body>

</html>