@include('Admin.Panel.Layouts.Panel')

<?php

$user_profiel_data=\Illuminate\Support\Facades\Auth::user();

?>


<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                  <i class="mdi mdi-account-multiple "></i>
                </span></span>{{__('all_strings.User Managment')}}
            </h3>
        </div>

        <div class="row">

            <!--Top Side Of Content Start-->
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <form class="forms-sample" method="post" action="{{url('/Admin/UserManager/Search')}}">
                            <input type="hidden" value="{{csrf_token()}}" name="_token"/>
                            <div class="form-group">
                                <label for="exampleInputUsername1">{{__('all_strings.Search')}}</label>
                                <input type="text" class="form-control" id="exampleInputUsername1" placeholder="{{__('all_strings.Search')}}" name="search">
                            </div>
                            <button style="width: 100%;" type="submit" class="btn btn-gradient-primary mr-2">{{__('all_strings.Search')}}</button>
                        </form>
                    </div>
                </div>
            </div>
            <!--Top Side Of Content Start-->


            <!--Bottom Side Of Content Start-->
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">

                        <!--Add new start-->
                        <div style="float: right;">
                            <btn onclick="Open_Link_Dialog(this,'{{url('/Admin/User/New')}}')" style="cursor: pointer;color:var(--primary)">{{__('all_strings.NewUser')}}</btn>
                        </div>
                        <!--Add new end-->
                        <br>
                        <br>

                        <h4 class="card-title">{{__('all_strings.users')}}</h4>
                        </p>
                        <table class="table">
                            <thead>
                            <tr>
                                <th>{{__('all_strings.username')}}</th>
                                <th>{{__('all_strings.name')}}</th>
                                <th>{{__('all_strings.family')}}</th>
                                <th>{{__('all_strings.phone')}}</th>
                                <th>{{__('all_strings.status')}}</th>
                                <th>{{__('all_strings.usertype')}}</th>
                                <th>{{__('all_strings.old_notifications')}}</th>
                                <th>{{__('all_strings.SendNotification')}}</th>
                                <th>{{__('all_strings.times')}}</th>
                                <th>{{__('all_strings.Properties')}}</th>
                            </tr>
                            </thead>
                            <tbody>

                            {{--Get Fetch All Categories Form DataBase Start--}}
                            @foreach(\App\Models\User::all() as $user)
                                @if($user->id!=$user_profiel_data->id)
                                    <tr>
                                        <td>{{$user->username}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->family}}</td>
                                        <td><a href="tel:{{$user->phone}}"> {{$user->phone}}</a></td>
                                        @if($user->status==1)
                                            <td>{{__('all_strings.active')}}</td>
                                        @else
                                            <td>{{__('all_strings.passtive')}}</td>
                                        @endif


                                        @if($user->user_type=="ADMIN")
                                            <td>Admin</td>
                                        @elseif($user->user_type=="ADMIN_Web")
                                            <td>Admin Reports</td>
                                        @elseif($user->user_type=="USER")
                                            <td>User</td>
                                        @else
                                            <td>By Api</td>
                                        @endif

                                        <td><i onclick="Open_Link_Dialog(this,'{{url('/Admin/UserManager/Get_Notification/')}}/{{$user->id}}')" class="mdi mdi-comment" style="font-size: 20px;color:var(--primary);cursor: pointer;"></i></td>
                                        <td><i onclick="Open_Link_Dialog(this,'{{url('/Admin/UserManager/Send_Notification')}}/{{$user->id}}')" class="mdi mdi-comment" style="font-size: 20px;color:var(--primary);cursor: pointer;"></i></td>
                                        <td><i onclick="Open_Link_Dialog(this,'{{url('/Admin/UserManager/Times')}}/{{$user->id}}')" class="mdi mdi-timer" style="font-size: 20px;color:var(--primary);cursor: pointer;"></i></td>
                                        <td><i onclick="Open_Link_Dialog(this,'{{url('/Admin/UserManager/Edit_User')}}/{{$user->id}}')" class="mdi mdi-table-edit" style="font-size: 20px;color:var(--primary);cursor: pointer;"></i></td>
                                    </tr>
                                @endif
                            @endforeach
                            {{--Get Fetch All Categories Form DataBase End--}}

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!--Bottom Side Of Content Start-->

        </div>

    </div>
    <!-- content-wrapper ends -->












@include('Admin.Panel.Layouts.Footer_Panel')


























