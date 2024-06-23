@include('Admin.Panel.Layouts.Panel')



<!-- partial -->
<div class="main-panel">
    <!--Send Notification To User Start-->
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                  <i class="mdi mdi-account "></i>
                </span>{{__('all_strings.active_google_auth')}}
            </h3>
        </div>
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title" style="text-align: center;">{{__('all_strings.activeing')}}</h4>
                        <p class="card-description" style="text-align: center;">{{__('all_strings.please_scan_under_qr_code')}}</p>

                        <div>
                            <center>
                                <?php  echo $QR_Image; ?>
                            </center>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Send Notification To User End-->












@include('Admin.Panel.Layouts.Footer_Panel')
