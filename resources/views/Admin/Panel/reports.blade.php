@include('Admin.Panel.Layouts.Panel')



<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                  <i class="mdi mdi-account-multiple "></i>
                </span>{{__('all_strings.All Reports')}}
            </h3>
        </div>

        <div class="row">


            <!--Bottom Side Of Content Start-->
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{__('all_strings.AllReports')}}</h4>
                        </p>
                        @if(count($Reports)>0)
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>{{__('all_strings.report')}}</th>
                                    <th>{{__('all_strings.reporttext')}}</th>
                                    <th>{{__('all_strings.datetime')}}</th>
                                    <th>{{__('all_strings.type')}}</th>
                                    <th>{{__('all_strings.Properties')}}</th>
                                </tr>
                                </thead>
                                <tbody>

                                {{--Get Fetch All Categories Form DataBase Start--}}
                                @foreach($Reports as $Report)
                                    @if(count(\App\Models\post::where('id',$Report->post_id)->where('visible','1')->where('delete_flag',0)->get())>0)
                                        <tr>
                                            <td>{{ \App\Models\Post::where('id',$Report->post_id)->first()->title  }}</td>
                                            <td>{{ $Report->content}}</td>
                                            <td>{{ $Report->date_time}}</td>
                                            <td>{{ \App\Models\report::where('id',$Report->report_id)->first()->title }}</td>
                                            <td><a href="{{url('/Admin/ReportSeen')}}/{{$Report->id}}"><i
                                                        style="color:#00adee;" class="mdi mdi-check-all"></i></a>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                                {{--Get Fetch All Categories Form DataBase End--}}

                                </tbody>
                            </table>
                        @else
                            <div
                                style="width: 100%;height: 250px;display: flex;justify-content: center;align-items: center;">
                                <div style="width: 150px;">
                                    <img style="margin: 0 auto;" src="{{asset('admin-assets/images/icons/empty.png')}}"
                                         width="150px"/>
                                    <p style="margin: 10px auto;text-align: center;">{{__('all_strings.notfound')}}</p>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <!--Bottom Side Of Content Start-->

        </div>

    </div>
    <!-- content-wrapper ends -->


@include('Admin.Panel.Layouts.Footer_Panel')
