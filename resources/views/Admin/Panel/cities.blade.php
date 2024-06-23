@include('Admin.Panel.Layouts.Panel')



<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                  <i class="mdi mdi-map "></i>
                </span></span>{{__('all_strings.cities')}}
            </h3>
        </div>

        <div class="row">

            <!--Top Side Of Content Start-->
            <div class="col-lg-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        @if(!isset($edit_city))
                            <form action="{{url('/Admin/Cities/new')}}" class="forms-sample" method="post">
                                <input type="hidden" value="{{csrf_token()}}" name="_token"/>
                                <div class="form-group">
                                    <label for="exampleInputUsername1">{{__('all_strings.city_name')}}</label>
                                    <input type="text" class="form-control" id="exampleInputUsername1"
                                           placeholder="{{__('all_strings.city_name')}}" name="name">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputUsername1">{{__('all_strings.city_area')}}</label>
                                    <select class="form-control" id="exampleInputUsername1" name="area">
                                        <option value="0">{{__('all_strings.city_area')}}</option>
                                        @foreach($all_cities as $city)
                                            @if($city->area=="0")
                                                <option value="{{$city->id}}">{{$city->name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputUsername1">{{__('all_strings.status')}}</label>
                                    <select class="form-control" id="exampleInputUsername1" name="status">
                                        <option value="1">{{__('all_strings.active')}}</option>
                                        <option value="0">{{__('all_strings.passtive')}}</option>
                                    </select>
                                </div>
                                <button style="width: 100%;" type="submit"
                                        class="btn btn-gradient-primary mr-2">{{__('all_strings.new')}}</button>
                            </form>
                        @else
                            <form class="forms-sample" method="post" action="{{url('/Admin/Cities/EditSubmit')}}">
                                <input type="hidden" value="{{csrf_token()}}" name="_token"/>
                                <input type="hidden" value="{{$edit_city->id}}" name="id"/>
                                <div class="form-group">
                                    <label for="exampleInputUsername1">{{__('all_strings.city_name')}}</label>
                                    <input type="text" class="form-control" id="exampleInputUsername1"
                                           placeholder="{{__('all_strings.city_name')}}" name="name">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputUsername1"
                                           style="width: 100%;text-align: right;">{{__('all_strings.city_area')}}</label>
                                    <select class="form-control" id="exampleInputUsername1" name="area">
                                        <option value="0">{{__('all_strings.city_area')}}</option>
                                        @foreach($all_cities as $city)
                                            @if($city->area=="0")
                                                <option value="{{$city->id}}">{{$city->name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputUsername1">{{__('all_strings.status')}}</label>
                                    <select class="form-control" id="exampleInputUsername1" name="status">
                                        <option value="1">{{__('all_strings.active')}}</option>
                                        <option value="0">{{__('all_strings.passtive')}}</option>
                                    </select>
                                </div>
                                <button style="width: 100%;" type="submit"
                                        class="btn btn-gradient-primary mr-2">{{__('all_strings.new')}}</button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
            <!--Top Side Of Content Start-->


            <!--Bottom Side Of Content Start-->
            <div class="col-lg-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{__('all_strings.cities')}}</h4>
                        </p>
                        @if(count($all_cities)>0)
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>{{__('all_strings.city_name')}}</th>
                                    <th>{{__('all_strings.city_area')}}</th>
                                    <th>{{__('all_strings.city_disable')}}</th>
                                    <th>{{__('all_strings.city_edit')}}</th>
                                </tr>
                                </thead>
                                <tbody>

                                {{--Get Fetch All Categories Form DataBase Start--}}
                                @foreach($all_cities as $city)

                                    <tr>
                                        <td>{{$city->name}}</td>

                                        @if($city->area==0)
                                            <td>-</td>
                                        @else
                                            <td>{{\App\Models\city::where('id',$city->area)->get()[0]->name}}</td>
                                        @endif

                                        @if($city->status=="1")
                                            <td>{{__('all_strings.active')}}</td>
                                        @elseif($city->status=="0")
                                            <td>{{__('all_strings.passtive')}}</td>
                                        @endif

                                        <td><a href="/Admin/Cities/Edit/{{$city->id}}"><i class="mdi mdi-table-edit"
                                                                                          style="font-size: 20px;color:color:var(--primary);cursor: pointer;"></i></a>
                                        </td>

                                    </tr>

                                @endforeach
                                {{--Get Fetch All Categories Form DataBase End--}}


                                </tbody>
                            </table>
                        @else
                            <div class="card-body">
                                <img src="{{asset('Admin\images\icons\empty.png')}}"
                                     style="width: 150px;display: block;margin: 0 auto;"/>
                                <p style="text-align: center;">{{__('all_strings.notfound')}}</p>
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


























