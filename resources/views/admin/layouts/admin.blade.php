
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags --> 
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Tebeng</title>
  <!-- base:css -->
 @include('admin.includes.style')
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
   @include('admin.includes.navbar')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
     @include('admin.includes.sidebar')
      <!-- partial -->
      <div class="main-panel">
        
            @yield('content')
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        @include('admin.includes.footer')
        <!-- partial -->
      </div>
     
      <!-- main-panel ends -->
    </div>

    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  @include('admin.includes.script')
  <!-- End custom js for this page-->
</body>

</html>

