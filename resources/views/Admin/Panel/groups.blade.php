@include('Admin.Panel.Layouts.Panel')


<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">

        @if(session("msg")!="")
            @if(session("msg")=="Done")
                <div class="alert alert-success" role="alert" style="text-align: right;">
                    {{session("msg")}}
                </div>
            @elseif(session("msg")=="User is Valid")
                <div class="alert alert-danger" role="alert" style="text-align: right;">
                    {{session("msg")}}
                </div>
            @endif
        @endif

        <?php
            //Despose Msg
            request()->session()->put('msg','');
        ?>



        <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                  <i class="mdi mdi-fingerprint"></i>
                </span></span>{{__('all_strings.Accessiblity')}}
            </h3>
        </div>

        <div class="row">

            <!--Right Side Of Content Start-->
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <form class="forms-sample" method="post">
                            <input type="hidden" value="{{csrf_token()}}" name="_token"/>
                            <div class="form-group">
                                <label for="exampleInputUsername1">{{__('all_strings.name_az')}}</label>
                                <input type="text" class="form-control" id="exampleInputUsername1" placeholder="{{__('all_strings.name_az')}}" name="title" style="text-align: center;" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">{{__('all_strings.name_en')}}</label>
                                <input type="text" class="form-control" id="exampleInputUsername1" placeholder="{{__('all_strings.name_en')}}" name="en_title" style="text-align: center;" required>
                            </div>
                            <button style="width: 100%;" type="submit" class="btn btn-gradient-primary mr-2">New</button>
                        </form>
                    </div>
                </div>
            </div>
            <!--Right Side Of Content End-->


            <!--Bottom Side Of Content Start-->
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{__('all_strings.AllAccess')}}</h4>


                        @if(count($allgroups)>0)
                        <table class="table">
                            <thead>
                            <tr>
                                <th>{{__('all_strings.name_az')}}</th>
                                <th>{{__('all_strings.name_en')}}</th>
                                <th>{{__('all_strings.Properties')}}</th>
                            </tr>
                            </thead>
                            <tbody>

                            {{--Get Fetch All Categories Form DataBase Start--}}
                            @foreach($allgroups as $user_type)
                                <tr>
                                    <td>{{$user_type->title}}</td>
                                    <td>{{$user_type->en_title}}</td>
                                    <td><a href="{{url('/Admin/Groups/Delete')}}/{{$user_type->id}}"><i class="mdi mdi-delete" style="color: #F00;font-size: 20px;"></i></a></td>
                                </tr>
                            @endforeach
                            {{--Get Fetch All Categories Form DataBase End--}}

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
