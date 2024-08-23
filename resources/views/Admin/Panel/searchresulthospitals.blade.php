@include('Admin.Panel.Layouts.Panel')



<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                  <i class="mdi mdi-hospital-building"></i>
                </span></span>{{__('all_strings.HospitalsMgmt')}}
            </h3>
        </div>

        <div class="row">

            <!--Bottom Side Of Content Start-->
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">

                        <br>

                        @if(count($all_hospitals)>0)
{{--                            <h4 class="card-title">{{__('all_strings.Hospitals')}}</h4>--}}
{{--                            </p>--}}
                            <table class="table">
                            <thead>
                            <tr>
                                <th>{{__('all_strings.name')}}</th>
                                <th>{{__('all_strings.start_time')}}</th>
                                <th>{{__('all_strings.end_time')}}</th>
                                <th>{{__('all_strings.tel')}}</th>
                                <th>{{__('all_strings.status')}}</th>
                                <th>{{__('all_strings.edit')}}</th>
                            </tr>
                            </thead>
                            <tbody>

                                @foreach($all_hospitals as $hospital)
                                    <td>{{$hospital->name}}</td>
                                    <td>{{$hospital->start_time}}</td>
                                    <td>{{$hospital->end_time}}</td>
                                    <td><a href="tel:{{$hospital->tel}}"> {{$hospital->tel}}</a></td>

                                    @if($hospital->status==1)
                                        <td>{{__('all_strings.active')}}</td>
                                    @else
                                        <td>{{__('all_strings.passtive')}}</td>
                                    @endif

                                    <td><i onclick="Open_Link_Dialog(this,'{{url('/Admin/Hospitals/Edit')}}/{{$hospital->id}}')" class="mdi mdi-table-edit" style="font-size: 20px;color:var(--primary);cursor: pointer;"></i></td>
                                @endforeach

                            </tbody>
                        </table>
                        @else
                            <div style="width: 100%;height: 250px;display: flex;justify-content: center;align-items: center;">
                                <div style="width: 150px;">
                                    <img style="margin: 0 auto;" src="{{asset('admin-assets/images/icons/empty.png')}}" width="150px"/>
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


























