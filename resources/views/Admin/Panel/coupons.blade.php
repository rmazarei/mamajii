@include('Admin.Panel.Layouts.Panel')



<!-- partial -->
<div class="main-panel">
    <!--Send Notification To User Start-->
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                  <i class="mdi mdi-paperclip "></i>
                </span>{{__('all_strings.coponone')}}
            </h3>
        </div>
        <div class="row">

            <div class="col-lg-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title" ></h4>
                        </p>

                        <form method="post" action="{{url('/Admin/Store/Coupon/New')}}">
                            <input type="hidden" value="{{csrf_token()}}" name="_token"/>

                            <div class="form-group">
                                <label for="exampleInputUsername1">{{__('all_strings.count')}}</label>
                                <input type="number" class="form-control" id="exampleInputUsername1" placeholder="{{__('all_strings.count')}}" name="count" required>
                            </div>

                            <button type="submit" style="width: 100%;" class="btn btn-gradient-primary mr-2">{{__('all_strings.done')}}</btn>

                        </form>

                    </div>
                </div>
            </div>


            <div class="col-lg-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title" ></h4>
                        </p>

                        @if(count($coupons)>0)
                            <table class="table">

                                <thead>
                                    <th>{{__('all_strings.code')}}</th>
                                    <th>{{__('all_strings.count')}}</th>
                                    <th>{{__('all_strings.event')}}</th>
                                </thead>
                                <tbody>
                                    @foreach($coupons as $coupon)
                                        <tr>
                                            <td>{{$coupon->code}}</td>
                                            <td>{{$coupon->count}}</td>
                                            <td><a href="{{url('/Admin/Store/Coupon/Remove')}}/{{$coupon->id}}"><i class="mdi mdi-delete" style="color: #F00;font-size: 20px;"></i></a></td>
                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>
                        @else
                            <div style="width: 100%;height: 250px;display: flex;justify-content: center;align-items: center;">
                                <div style="width: 150px;">
                                    <img style="margin: 0 auto;" src="{{asset('Admin/images/icons/empty.png')}}" width="150px"/>
                                    <p style="margin: 10px auto;text-align: center;">{{__('all_strings.notfound')}}</p>
                                </div>
                            </div>
                        @endif

                    </div>
                </div>
            </div>


        </div>
    </div>
    <!--Send Notification To User End-->












@include('Admin.Panel.Layouts.Footer_Panel')
