@include('Admin.Panel.Layouts.Panel')



<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                  <i class="mdi mdi-paperclip"></i>
                </span>{{__('all_strings.coponall')}}
            </h3>
        </div>

        <div class="row">


            <!--Left Side Of Content Start-->
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">

                        @if($setting->discountall=="")
                            <!--Get new discount start-->
                            <form class="forms-sample" method="post" action="{{url('/Admin/Store/Discount/Done')}}">
                                <input type="hidden" value="{{csrf_token()}}" name="_token"/>
                                <div class="form-group">
                                    <label for="exampleInputUsername1">{{__('all_strings.newalldiscount')}}</label>
                                    <input type="text" class="form-control" id="exampleInputUsername1" placeholder="{{__('all_strings.discount_hint')}}" name="discount" required>
                                </div>
                                <button style="width: 100%;" type="submit" class="btn btn-gradient-primary mr-2">{{__('all_strings.done')}}</button>
                            </form>
                            <!--Get new discount end-->

                            <div style="width: 100%;height: 250px;display: flex;justify-content: center;align-items: center;">
                                <div style="width: 150px;">
                                    <img style="margin: 0 auto;" src="{{asset('Admin/images/icons/free.png')}}" width="150px"/>
                                    <p style="margin: 10px auto;text-align: center;">{{__('all_strings.notdiscount')}}</p>
                                </div>
                            </div>
                        @else
                            <div style="width: 100%;height: 250px;display: flex;justify-content: center;align-items: center;">
                                <div style="width: 150px;">
                                    <img style="margin: 0 auto;" src="{{asset('Admin/images/icons/free.png')}}" width="150px"/>
                                    @if(((int)$setting->discountall)>100)
                                        <p style="margin: 10px auto;text-align: center;">{{$setting->discountall}} {{__('all_strings.disount_for_all')}}</p>
                                    @else
                                        <p style="margin: 10px auto;text-align: center;">{{$setting->discountall}} {{__('all_strings.perdisount_for_all')}}</p>
                                    @endif
                                    <a href="{{url('/Admin/Store/Discount/Remove')}}" style="cursor: pointer;color:var(--primary);text-align: center;display: block;margin: 0 auto;">{{__('all_strings.removealldiscounts')}}</a>
                                </div>
                            </div>
                        @endif


                    </div>
                </div>
            </div>
            <!--Left Side Of Content End-->


        </div>

    </div>
    <!-- content-wrapper ends -->












@include('Admin.Panel.Layouts.Footer_Panel')
