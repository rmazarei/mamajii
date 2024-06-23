

<?php

//Get File With File Id
function Get_File($file_id)
{
    return \App\Models\file::where('id', $file_id)->first()->file_hash;
}

?>






        <!-- plugins:js -->
<script src="{{asset('/admin-assets/vendors/js/vendor.bundle.base.js')}}"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<script src="{{asset('/admin-assets/vendors/chart.js/Chart.min.js')}}"></script>
<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="{{asset('/admin-assets/js/off-canvas.js')}}"></script>
<script src="{{asset('/admin-assets/js/hoverable-collapse.js')}}"></script>
<script src="{{asset('/admin-assets/js/misc.js')}}"></script>
<!-- endinject -->
<!-- Custom js for this page -->
<script src="{{asset('/admin-assets/js/dashboard.js')}}"></script>
<script src="{{asset('/admin-assets/js/todolist.js')}}"></script>
<!-- End custom js for this page -->
</body>
</html>
