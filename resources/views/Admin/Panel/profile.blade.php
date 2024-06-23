@include('Admin.Panel.Layouts.Panel')



<!-- partial -->
<div class="main-panel">
    <!--Send Notification To User Start-->
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                  <i class="mdi mdi-account "></i>
                </span>{{__('all_strings.Profile')}}
            </h3>
        </div>
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title" style="text-align: center;">{{__('all_strings.Profile')}}</h4>
                        <p class="card-description" style="text-align: center;">{{__('all_strings.PleaseFillUnderFeilds')}}</p>
                        <form class="forms-sample" enctype="multipart/form-data" method="post" action="{{url('/Admin/Profile/Update')}}">
                            <input type="hidden" value="{{$User->id}}" name="user_id"/>
                            <input type="hidden" value="{{csrf_token()}}" name="_token"/>
                            <div class="form-group">
                                <label for="exampleInputUsername1">{{__('all_strings.username')}}</label>
                                <input type="text" class="form-control" id="exampleInputUsername1" placeholder="{{__('all_strings.username')}}" name="username" value="{{$User->username}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">{{__('all_strings.name')}}</label>
                                <input type="text" class="form-control" id="exampleInputUsername1" placeholder="{{__('all_strings.name')}}" name="name" value="{{$User->name}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">{{__('all_strings.family')}}</label>
                                <input type="text" class="form-control" id="exampleInputUsername1" placeholder="{{__('all_strings.family')}}" name="family" value="{{$User->family}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">{{__('all_strings.newpassword')}}</label>
                                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="{{__('all_strings.newpassword')}}" name="password">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">{{__('all_strings.email')}}</label>
                                <input type="email" class="form-control" id="exampleInputPassword1" placeholder="{{__('all_strings.email')}}" name="email" value="{{$User->email}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">{{__('all_strings.profile_image')}}</label>
                                <input type="file" class="form-control" id="exampleInputPassword1" name="profile_image">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">{{__('all_strings.phone')}}</label>
                                <input type="text" class="form-control" id="exampleInputPassword1" placeholder="{{__('all_strings.phone')}}" name="phone" value="{{$User->phone}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">{{__('all_strings.address')}}</label>
                                <input type="text" class="form-control" id="exampleInputPassword1" placeholder="{{__('all_strings.address')}}" name="address" value="{{$User->address}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">{{__('all_strings.city_name')}}</label>
                                <select class="form-control" id="exampleInputUsername1" name="city">
                                    @foreach(App\Models\City::all() as $city)
                                        @if($city->area!="" && $city->status=="1")
                                            @if($city->id == $User->city_id )
                                                <option selected value="{{$city->id}}">{{$city->name}}</option>
                                            @else
                                                <option value="{{$city->id}}">{{$city->name}}</option>
                                            @endif
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">{{__('all_strings.bio')}}</label>
                                <textarea style="height: 150px;" class="form-control" id="exampleInputPassword1" placeholder="{{__('all_strings.bio')}}" name="bio">{{$User->bio}}</textarea>
                            </div>
                            @if(\Illuminate\Support\Facades\Auth::user()->google_auth=="")
                                <a href="{{url('Admin/Profile/ActiveGoogle2auth')}}" style="width: 100%;" type="submit" class="btn btn-gradient-primary mr-2">{{__('all_strings.active_google_auth')}}</a>
                            @else
                                <a href="{{url('Admin/Profile/PasstiveGoogle2auth')}}" style="width: 100%;" type="submit" class="btn btn-gradient-primary mr-2">{{__('all_strings.passtive_google_auth')}}</a>
                            @endif
                            <br>
                            <br>
                            <button style="width: 100%;" type="submit" class="btn btn-gradient-primary mr-2">{{__('all_strings.done')}}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Send Notification To User End-->












@include('Admin.Panel.Layouts.Footer_Panel')
