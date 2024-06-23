@include('Admin.Panel.Layouts.Panel')



<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                  <i class="mdi mdi-search-web "></i>
                </span>{{__('all_strings.Search')}} - {{$Seach_Value}}
            </h3>
        </div>

        <div class="row">

            <!--Main Of Content Start-->
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">

                    @if(count($Users)>0)
                        <div class="card-body">
                        <h4 class="card-title" style="text-align: right;">{{__('all_strings.users')}}</h4>
                        </p>
                        <table class="table">
                            <thead>
                            <tr>
                                <th>{{__('all_strings.username')}}</th>
                                <th>{{__('all_strings.name')}}</th>
                                <th>{{__('all_strings.family')}}</th>
                                <th>{{__('all_strings.phone')}}</th>
                                <th>{{__('all_strings.old_notifications')}}</th>
                                {{-- <th>{{__('all_strings.StartDate')}}</th> --}}
                                <th>{{__('all_strings.status')}}</th>
                                <th>{{__('all_strings.usertype')}}</th>
                                <th>{{__('all_strings.SendNotification')}}</th>
                                <th>{{__('all_strings.Properties')}}</th>
                            </tr>
                            </thead>
                            <tbody>

                            {{--Get Fetch All Categories Form DataBase Start--}}
                            @foreach($Users as $user)
                                @if($user->login_token!=session("login_token"))
                                    <tr>
                                        <td>{{$user->username}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->family}}</td>
                                        <td><a href="tel:{{$user->phone}}"> {{$user->phone}}</a></td>
                                        <td><i onclick="Open_Link_Dialog(this,'{{url('/Admin/UserManager/Get_Notification/')}}/{{$user->id}}')" class="mdi mdi-comment" style="font-size: 20px;color:var(--primary);cursor: pointer;"></i></td>
                                        {{-- <td>{{$user->date_time}}</td> --}}
                                        @if($user->status==1)
                                            <td>Active</td>
                                        @else
                                            <td>Passtive</td>
                                        @endif


                                        @if($user->user_type=="ADMIN")
                                            <td>Admin</td>
                                        @elseif($user->user_type=="ADMIN_Web")
                                            <td>Manaer</td>
                                        @elseif($user->user_type=="USER")
                                            <td>User</td>
                                        @endif

                                        <td><i onclick="Open_Link_Dialog(this,'{{url('/Admin/UserManager/Send_Notification')}}/{{$user->id}}')" class="mdi mdi-comment" style="font-size: 20px;color:var(--primary);cursor: pointer;"></i></td>
                                        <td><i onclick="Open_Link_Dialog(this,'{{url('/Admin/UserManager/Edit_User')}}/{{$user->id}}')" class="mdi mdi-table-edit" style="font-size: 20px;color:var(--primary);cursor: pointer;"></i></td>
                                    </tr>
                                @endif
                            @endforeach
                            {{--Get Fetch All Categories Form DataBase End--}}

                            </tbody>
                        </table>
                    </div>
                    @else
                        <div class="card-body">
                            <img src="{{asset('Admin\images\icons\empty.png')}}" style="width: 150px;display: block;margin: 0 auto;"/>
                            <p style="text-align: center;">{{_('all_strings.notfound')}}</p>
                        </div>
                    @endif

                </div>
            </div>
            <!--Main Of Content Start-->

        </div>

    </div>
    <!-- content-wrapper ends -->












@include('Admin.Panel.Layouts.Footer_Panel')


























