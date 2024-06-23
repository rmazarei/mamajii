@include('Admin.Panel.Layouts.Empty')


<!--Send Notification To User Start-->
<div class="content-wrapper" style="height: 100vh;">
    <div class="row">
        <div class="col-md-11 grid-margin stretch-card" style="margin: 50px auto;">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title" style="text-align: center;">{{__('all_strings.editusers')}}</h4>
                    <p class="card-description" style="text-align: center;">{{__('all_strings.PleaseFillUnderTextFeilds')}}</p>
                    <form enctype="multipart/form-data" class="forms-sample" method="post" action="{{url('/Admin/User/New/Done')}}">
                        <input type="hidden" value="{{csrf_token()}}" name="_token"/>
                        <div class="form-group">
                            <label for="exampleInputUsername1">{{__('all_strings.username')}}</label>
                            <input type="text" class="form-control" id="exampleInputUsername1" placeholder="{{__('all_strings.username')}}" name="username" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputUsername1">{{__('all_strings.name')}}</label>
                            <input type="text" class="form-control" id="exampleInputUsername1" placeholder="{{__('all_strings.name')}}" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputUsername1">{{__('all_strings.family')}}</label>
                            <input type="text" class="form-control" id="exampleInputUsername1" placeholder="{{__('all_strings.family')}}" name="family" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">{{__('all_strings.newpassword')}}</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="{{__('all_strings.newpassword')}}" name="password" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">{{__('all_strings.email')}}</label>
                            <input type="email" class="form-control" id="exampleInputPassword1" placeholder="{{__('all_strings.email')}}" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">{{__('all_strings.profile_image')}}</label>
                            <input type="file" class="form-control" id="exampleInputPassword1" name="profile_image" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">{{__('all_strings.phone')}}</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" placeholder="{{__('all_strings.phone')}}" name="phone" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">{{__('all_strings.address')}}</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" placeholder="{{__('all_strings.address')}}" name="address" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">{{__('all_strings.bio')}}</label>
                            <textarea style="height: 150px;" class="form-control" id="exampleInputPassword1" placeholder="{{__('all_strings.bio')}}" name="bio" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputUsername1">{{__('all_strings.city_name')}}</label>
                            <select class="form-control" id="exampleInputUsername1" name="city" required>
                                @foreach(App\Models\City::all() as $city)
                                    @if($city->area!="" && $city->area!="0" && $city->status=="1")
                                        <option value="{{$city->id}}">{{$city->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">{{__('all_strings.status')}}</label>
                            <select class="form-control" name="status" required>
                                <option value="1" selected>{{__('all_strings.active')}}</option>
                                <option value="1">{{__('all_strings.active')}}</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">{{__('all_strings.usertype')}}</label>
                            <select class="form-control" name="user_type" required>
                                <option value="ADMIN">{{__('all_strings.admin')}}</option>
                                @foreach(\App\Models\UserType::all() as $user_type)
                                    <option value="{{$user_type->en_title}}">{{$user_type->title}}</option>
                                @endforeach

                            </select>
                        </div>
                        <!--Open Street Map Start-->
                        <!--Map Start-->
                        <input id="location_text_input" type="hidden" name="location" value="0,0">
                        <div style="width:100%; height:300px;display: flex;justify-content: center;align-items: center;">
                            <div id ="map" style = "width:100%; height:300px;"></div>
                            <div style="position: absolute;"><i style="color:var(--primary);font-size: 50px;" class="mdi mdi-map-marker"></i></div>
                        </div>


                        <link rel = "stylesheet" href = "{{asset('Admin/Map/leaflet.css')}}" />
                        <script src = "{{asset('Admin/Map/leaflet.js')}}"></script>
                        <script>

                            var mapOptions = {
                                center: [35.7406991, 51.4192106],
                                zoom: 14
                            }

                            var map = new L.map('map', mapOptions);
                            var layer = new L.TileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png');
                            map.addLayer(layer);

                            function onMoveEnd(e){
                                console.log(map.getCenter());
                                console.log(map.getCenter().lat);
                                console.log(map.getCenter().lng);

                                var location_text_input=window.document.getElementById("location_text_input");
                                location_text_input.value=map.getCenter().lat+","+map.getCenter().lng;
                            }

                            map.on('moveend', onMoveEnd);

                        </script>
                        <!--Open Street Map End-->

                        <button style="width: 100%;" type="submit" class="btn btn-gradient-primary mr-2">{{__('all_strings.done')}}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Send Notification To User End-->


@include('Admin.Panel.Layouts.Footer_Empty')
