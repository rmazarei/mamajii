@include('Admin.Panel.Layouts.Panel')



<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                  <i class="mdi mdi-chart-bubble"></i>
                </span>{{__('all_strings.New Report')}}
            </h3>
        </div>

        <div class="row">

            <!--Right Side Of Content Start-->
            <div class="col-lg-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <form class="forms-sample" method="post" action="{{url('/Admin/NewReport/Add')}}">
                            <input type="hidden" value="{{csrf_token()}}" name="_token"/>
                            <div class="form-group">
                                <label for="exampleInputUsername1">{{__('all_strings.new')}}</label>
                                <input type="text" class="form-control" id="exampleInputUsername1" placeholder="{{__('all_strings.new')}}" name="new_report">
                            </div>
                            <button style="width: 100%;" type="submit" class="btn btn-gradient-primary mr-2">{{__('all_strings.done')}}</button>
                        </form>
                    </div>
                </div>
            </div>
            <!--Right Side Of Content End-->

            <!--Left Side Of Content Start-->
            <div class="col-lg-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title" >{{__('all_strings.AllReports')}}</h4>
                        </p>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>{{__('all_strings.Id')}}</th>
                                    <th>{{__('all_strings.Report')}}</th>
                                    <th>{{__('all_strings.Properties')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $Record=1; ?>
                                @foreach(\App\Models\report_tbl::where('delete_flag',false)->get() as $Report)
                                    <tr>
                                        <th>{{$Record}}</th>
                                        <th>{{$Report->title}}</th>
                                        <td><a href="{{url('/Admin/NewReport/Remove')}}/{{$Report->id}}"><i class="mdi mdi-delete" style="color: #F00;font-size: 20px;"></i></a></td>
                                        <?php $Record++; ?>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!--Left Side Of Content End-->

        </div>

    </div>
    <!-- content-wrapper ends -->












@include('Admin.Panel.Layouts.Footer_Panel')
