
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Nebengin Admin</title>
  <!-- base:css -->
  <link rel="stylesheet" href="{{asset('assets/backend/vendors/mdi/css/materialdesignicons.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/backend/vendors/feather/feather.css')}}">
  <link rel="stylesheet" href="{{asset('assets/backend/vendors/base/vendor.bundle.base.css')}}">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="{{asset('assets/backend/css/style.css')}}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{asset('assets/backend/images/logokotak.png')}}" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-stretch auth auth-img-bg">
        <div class="row flex-grow">
        <div class="col-lg-6 login-half-bg d-flex flex-row">
            <p class="text-white font-weight-medium text-center flex-grow align-self-end">Copyright &copy; 2020  All rights reserved.</p>
          </div>
          <div class="col-lg-6 d-flex align-items-center justify-content-center">
            <div class="auth-form-transparent text-left p-3">
              <div class="brand-logo">
                <img src="{{asset('assets/backend/images/nebenglogo.svg')}}" alt="logo">
              </div>
              <h4>Selamat Datang Kembali!!</h4>
              <h6 class="font-weight-light">Senang melihat anda kembali ke aplikasi ini lagi!</h6>
              <form class="pt-3" method="POST" action="{{route('CekLogin')}}" enctype="multipart/form-data" id="formLogin">
              @csrf   
              <div class="form-group">
                  <label for="exampleInputEmail" class="bold" >Email</label>
                  <div class="input-group">
                   
                    <input type="email" name="email" class="curve form-control form-control-lg border-left-0" id="exampleInputEmail" placeholder="Masukkan Email">
                    <!-- <input type="email" name="email" class="curve form-control form-control-lg border-left-0" placeholder="Masukkan Email"> -->
                 
                  </div>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword" class="bold">Password</label>
                  <div class="input-group ">
                   
                    <input type="password" name="password" class="curve form-control form-control-lg border-left-0" id="exampleInputPassword" placeholder="Password">     
                    <!-- <input type="password" name="password" class="curve form-control form-control-lg border-left-0" placeholder="Password">                                            -->
                  </div>
                </div>
                
                <div class="my-3">
                  <button type="submit" class="btn curve btn-block btn-primary btn-lg font-weight-medium auth-form-btn" >LOGIN</button>
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
  <!-- base:js -->
  <!-- <script src="{{asset('assets/backend/vendors/base/vendor.bundle.base.js')}}"></script>   -->
  <!-- endinject -->
  <!-- inject:js -->
  <script src="{{asset('assets/backend/js/off-canvas.js')}}"></script>
  <script src="{{asset('assets/backend/js/hoverable-collapse.js')}}"></script>
  <script src="{{asset('assets/backend/js/template.js')}}"></script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
//  <script>
      $(".toggle-password").click(function() {
            $(this).toggleClass("bi bi-eye-slash-fill");
            var input = $($(this).attr("toggle"));
            if (input.attr("type") == "password") {
                input.attr("type", "text");
            } else {
                input.attr("type", "password");
            }
        });

        $("#formLogin").on('submit', function(e) {
    e.preventDefault();
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    var form = $(this); // Store the form element

    $.ajax({
        url: form.attr('action'),
        method: form.attr('method'),
        data: new FormData(this),
        processData: false,
        dataType: 'json',
        cache: false,
        contentType: false,
        beforeSend: function() {  
            $(document).find('label.error-text').text('');
        },
        success: function(data) {
            if (data.status == 0) {
                $('label.login_error').text('Email atau Password anda salah !');
                swal({
                    title: "Login Gagal !",
                    text: `Email atau Password anda salah !`,
                    icon: "error",
                    successMode: true,
                });
                setTimeout(1000); // 1 second
            } else {
                swal({
                    title: "Berhasil Login !",
                    text: `${data.msg}`,
                    icon: "success",
                    successMode: true,
                });
                setTimeout(function() {
                    window.location.href = `${data.route}`;
                }, 1000); // 1 second
            }
        }
    });
  });

//   </script> 

  
  <!-- endinject -->
</body>

</html>
