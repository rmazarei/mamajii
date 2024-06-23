@include('Admin.Panel.Layouts.Empty')


<div class="content-wrapper">

    <div class="row">

        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">

                    <div class="form-group">
                        <label for="exampleInputUsername1">{{__('all_strings.title')}}</label>
                        <label for="exampleInputUsername1">{{$order->title}}</label>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputUsername1">{{__('all_strings.name')}} {{__('all_strings.family')}}</label>
                        <label for="exampleInputUsername1">{{$order->name}} {{$order->family}}</label>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputUsername1">{{__('all_strings.phone')}}</label>
                        <a style="display: table-caption;" href="tel:{{$order->phone}}">{{$order->phone}}</a>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputUsername1">{{__('all_strings.address')}}</label>
                        <label for="exampleInputUsername1">{{$order->address}}</label>
                    </div>

                    @if($order->order_status=="0")
                        <a href="{{url('/Admin/Store/Order/Pay')}}/{{$order->id}}" style="width: 100%;" class="btn btn-gradient-primary mr-2">{{__('all_strings.pay')}}</a>
                        <br>
                        <br>
                        <a href="{{url('/Admin/Store/Order/Remove')}}/{{$order->id}}" style="width: 100%;" class="btn btn-gradient-primary mr-2">{{__('all_strings.remove')}}</a>
                        <br>
                        <br>
                        <a href="{{url('/Admin/Store/Order/Delivery')}}/{{$order->id}}" style="width: 100%;" class="btn btn-gradient-primary mr-2">{{__('all_strings.status_2')}}</a>
                    @elseif($order->order_status=="1")
                        <a href="{{url('/Admin/Store/Order/Remove')}}/{{$order->id}}" style="width: 100%;" class="btn btn-gradient-primary mr-2">{{__('all_strings.remove')}}</a>
                        <br>
                        <br>
                        <a href="{{url('/Admin/Store/Order/Delivery')}}/{{$order->id}}" style="width: 100%;" class="btn btn-gradient-primary mr-2">{{__('all_strings.status_2')}}</a>
                    @elseif($order->order_status=="2")
                        <a href="{{url('/Admin/Store/Order/Remove')}}/{{$order->id}}" style="width: 100%;" class="btn btn-gradient-primary mr-2">{{__('all_strings.remove')}}</a>
                    @endif


                </div>
            </div>
        </div>

    </div>

</div>
<!-- content-wrapper ends -->




@include('Admin.Panel.Layouts.Footer_Empty')
