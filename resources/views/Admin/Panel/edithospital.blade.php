@include('Admin.Panel.Layouts.Empty')


<!--Send Notification To User Start-->
<div class="content-wrapper" style="height: 100vh;">
    <div class="row">
        <div class="col-md-11 grid-margin stretch-card" style="margin: 50px auto;">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title" style="text-align: center;">{{__('all_strings.EditHospital')}}</h4>
                    <p class="card-description" style="text-align: center;">{{__('all_strings.PleaseFillUnderTextFeilds')}}</p>
                    <form enctype="multipart/form-data" class="forms-sample" method="post">
                        <input type="hidden" value="{{csrf_token()}}" name="_token"/>
                        <div class="form-group">
                            <label for="exampleInputUsername1">{{__('all_strings.HospitalNmae')}}</label>
                            <input type="text" class="form-control" id="exampleInputUsername1" placeholder="{{__('all_strings.HospitalNmae')}}" name="name" value="{{$haspital->name}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputUsername1">{{__('all_strings.city_name')}}</label>
                            <select class="form-control" id="exampleInputUsername1" name="city">
                                @foreach(App\Models\City::all() as $city)
                                    @if($city->area!="0" && $city->status=="1")
                                        @if($city->id == $haspital->city_id)
                                            <option selected value="{{$city->id}}">{{$city->name}}</option>
                                        @else
                                            <option value="{{$city->id}}">{{$city->name}}</option>
                                        @endif
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputUsername1">{{__('all_strings.Address')}}</label>
                            <input type="text" class="form-control" id="exampleInputUsername1" placeholder="{{__('all_strings.Address')}}" name="address" value="{{$haspital->address}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputUsername1">{{__('all_strings.tel')}}</label>
                            <input type="text" class="form-control" id="exampleInputUsername1" placeholder="{{__('all_strings.tel')}}" name="tel" value="{{$haspital->tel}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputUsername1">{{__('all_strings.start_time')}}</label>
                            <input type="time" class="form-control" id="exampleInputUsername1" placeholder="{{__('all_strings.start_time')}}" name="start_time" value="{{$haspital->start_time}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputUsername1">{{__('all_strings.end_time')}}</label>
                            <input type="time" class="form-control" id="exampleInputUsername1" placeholder="{{__('all_strings.end_time')}}" name="end_time" value="{{$haspital->end_time}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">{{__('all_strings.status')}}</label>
                            <select class="form-control" name="status">
                                @if($haspital->status=="0")
                                    <option value="1">{{__('all_strings.active')}}</option>
                                    <option selected value="0">{{__('all_strings.passtive')}}</option>
                                @else
                                    <option value="1">{{__('all_strings.active')}}</option>
                                    <option value="0">{{__('all_strings.passtive')}}</option>
                                @endif
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">{{__('all_strings.about')}}</label>
                            <textarea style="height: 150px;" class="form-control" id="exampleInputPassword1" placeholder="{{__('all_strings.about')}}" name="bio">{{$haspital->bio}}</textarea>
                        </div>

                        <!--Map Start-->
                        <input id="location_text_input" type="hidden" name="location" value="0,0">
                        <div style="width:100%; height:300px;display: flex;justify-content: center;align-items: center;">
                            <div id ="map" style = "width:100%; height:300px;"></div>
                            <div style="position: absolute;"><i style="color:var(--primary);font-size: 50px;" class="mdi mdi-map-marker"></i></div>
                        </div>

                        <br>

                        <button style="width: 100%;" type="submit" class="btn btn-gradient-primary mr-2">{{__('all_strings.done')}}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Send Notification To User End-->


<!--Open Street Map Start-->
<link rel = "stylesheet" href = "{{asset('admin-assets/Map/leaflet.css')}}" />
<script src = "{{asset('admin-assets/Map/leaflet.js')}}"></script>
<script>

    var mapOptions = {
        center: [{{$haspital->lat}} , {{$haspital->lng}}],
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



@include('Admin.Panel.Layouts.Footer_Empty')
