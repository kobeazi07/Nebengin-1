<!--Template Javascript-->
<script src="{{asset('assets/backend/vendors/base/vendor.bundle.base.js')}}"></script>
  <script src="{{asset('assets/backend/js/off-canvas.js')}}"></script>
  <script src="{{asset('assets/backend/js/hoverable-collapse.js')}}"></script>
  <script src="{{asset('assets/backend/js/template.js')}}"></script>
  <script src="{{asset('assets/backend/vendors/chart.js/Chart.min.js')}}"></script>
  <script src="{{asset('assets/backend/vendors/jquery-bar-rating/jquery.barrating.min.js')}}"></script>
  <script src="{{asset('assets/backend/js/dashboard.js')}}"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
  <script src="{{asset('assets/backend/js/CodeSeven-toastr-50092cc/toastr.js')}}"></script>




   <!-- plugin js for  page -->
   <script src="{{asset('assets/backend/vendors/typeahead.js/typeahead.bundle.min.js')}}"></script>
  <script src="{{asset('assets/backend/vendors/select2/select2.min.js')}}"></script>
 

  <script src="{{asset('assets/backend/js/file-upload.js')}}"></script>
  <script src="{{asset('assets/backend/js/typeahead.js')}}"></script>
  <script src="{{asset('assets/backend/js/select2.js')}}"></script>
   <!-- End plugin js for page -->
    <script>

    $(document).ready(function () {
        $('#table_id').DataTable();
    });
    $(document).ready(function () {
        $('#table_id2').DataTable();
    });
    </script>
<script>
    function redirect(site) {
        window.location.href = site;
    }

    function newTab(site) {
        window.open(site, '_blank').focus();
    }
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>   
<script>
    function sum(){
        var txtFirstNumberValue = document.getElementBy.Id('').value;
        var txtSecondNumberValue = document.getElementBy.Id('').value;
        var result = parseInt(txtFirstNumberValue) + parseInt(txtSecondNumberValue);
        if (!isNan(result)){
            document.getElementById('').value=result;
        }
    }
</script>
<script>
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
            e.preventDefault()
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
            });
            $.ajax({
                url: $(this).attr('action'),
                method: $(this).attr('method'),
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
                            }),
                            setTimeout(1000); // 1 second
                    } else {
                        swal({
                                title: "Berhasil Login !",
                                text: `${data.msg}`,
                                icon: "success",
                                successMode: true,
                            }),
                            setTimeout(function() {
                                window.location.href = `${data.route}`;
                            }, 1000); // 1 second
                    }
                }
            })
        })
    </script>
