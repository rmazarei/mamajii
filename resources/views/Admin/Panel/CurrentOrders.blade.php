@include('Admin.Panel.Layouts.Panel')



<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                  <i class="mdi mdi-paperclip"></i>
                </span>{{__('all_strings.curentorders')}}
            </h3>
        </div>

        <div class="row">



            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        @if(count($orders)>0)
                        <table class="table">
                            <thead>
                            <tr>
                                <th>{{__('all_strings.Id')}}</th>
                                <th>{{__('all_strings.type')}}</th>
                                <th>{{__('all_strings.status')}}</th>
                                <th>{{__('all_strings.Properties')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $order)
                                    <tr>
                                        <td>{{$order->id}}</td>

                                        @if($order->type=="FILE")
                                            <td>{{(__('all_strings.file'))}}</td>
                                        @else
                                            <td>{{(__('all_strings.product'))}}</td>
                                        @endif


                                        @if($order->order_status=="0")
                                            <td>{{(__('all_strings.status_0'))}}</td>
                                        @elseif($order->order_status=="1")
                                            <td>{{(__('all_strings.status_1'))}}</td>
                                        @elseif($order->order_status=="2")
                                            <td>{{(__('all_strings.status_2'))}}</td>
                                        @else
                                            <td>{{(__('all_strings.status_3'))}}</td>
                                        @endif


                                        <td><i onclick="Open_Link_Dialog(this,'{{url('/Admin/Store/Order')}}/{{$order->id}}')" class="mdi mdi-table-edit" style="color: #F00;font-size: 20px;cursor: pointer;"></i></td>
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
    <!-- content-wrapper ends -->












@include('Admin.Panel.Layouts.Footer_Panel')
