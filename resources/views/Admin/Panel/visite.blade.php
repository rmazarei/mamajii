@include('Admin.Panel.Layouts.Panel')


<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                  <i class="mdi mdi-application"></i>
                </span></span>{{__('all_strings.visites')}}
            </h3>
        </div>

        <div class="row">

            @if($visite->type=="DOCTOR")
            <?php
                $visite_doctor=\App\Models\users_tbl::where('id',$visite->doctor_id)->first();
            ?>

            <!--Top Side Of Content Start-->
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">

                            @if(!empty($visite))
                            <div class="form-group">
                                <label for="exampleInputUsername1">{{__('all_strings.name')}} {{__('all_strings.family')}}</label>
                                <label for="exampleInputUsername1">{{$visite_user->name}} {{$visite_user->family}}</label>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">{{__('all_strings.namedoctor')}}</label>
                                <label for="exampleInputUsername1">{{$visite_doctor->name}} {{$visite_doctor->family}}</label>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">{{__('all_strings.date')}}</label>
                                <label for="exampleInputUsername1">{{$visite->date}} {{$visite->time}}</label>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">{{__('all_strings.phone')}}</label>
                                <a style="display: -webkit-box;" href="tel:{{$visite_user->phone}}"><label for="exampleInputUsername1">{{$visite_user->phone}}</label></a>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">{{__('all_strings.phonephone')}}</label>
                                <a style="display: -webkit-box;" href="tel:{{$visite_doctor->phone}}"><label for="exampleInputUsername1">{{$visite_doctor->phone}}</label></a>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">{{__('all_strings.status')}}</label>
                                @if($visite->status=="0")
                                    <label for="exampleInputUsername1">{{__('all_strings.wait')}}</label>
                                @elseif($visite->status=="1")
                                    <label for="exampleInputUsername1">{{__('all_strings.end')}}</label>
                                @elseif($visite->status=="2")
                                    <label for="exampleInputUsername1">{{__('all_strings.canceled')}}</label>
                                @endif
                            </div>

                            <input id="location_text_input" type="hidden" name="location" value="0,0">
                            <div style="width:100%; height:300px;display: flex;justify-content: center;align-items: center;">
                                <div id ="map" style = "width:100%; height:300px;"></div>
                            </div>

                            @if($visite->status=="0")
                                <br>
                                <a href="{{url('/Admin/Visite/Cancel/')}}/{{$visite->id}}" style="width: 100%;" class="btn btn-gradient-primary mr-2">{{__('all_strings.cancel')}}</a>
                                <br>
                                <br>
                                <a href="{{url('/Admin/Visite/Done/')}}/{{$visite->id}}" style="width: 100%;" class="btn btn-gradient-primary mr-2">{{__('all_strings.oked')}}</a>
                            @endif

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
            <!--Top Side Of Content Start-->
            @else
            <?php
                $visite_doctor=\App\Models\Hospital::where('id',$visite->doctor_id)->first();
            ?>
            <!--Top Side Of Content Start-->
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">

                        @if(!empty($visite))
                            <div class="form-group">
                                <label for="exampleInputUsername1">{{__('all_strings.name')}} {{__('all_strings.family')}}</label>
                                <label for="exampleInputUsername1">{{$visite_user->name}} {{$visite_user->family}}</label>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">{{__('all_strings.namedoctor')}}</label>
                                <label for="exampleInputUsername1">{{$visite_doctor->name}}</label>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">{{__('all_strings.date')}}</label>
                                <label for="exampleInputUsername1">{{$visite->date}} {{$visite->time}}</label>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">{{__('all_strings.phone')}}</label>
                                <a style="display: -webkit-box;" href="tel:{{$visite_user->phone}}"><label for="exampleInputUsername1">{{$visite_user->phone}}</label></a>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">{{__('all_strings.phonephone')}}</label>
                                <a style="display: -webkit-box;" href="tel:{{$visite_doctor->phone}}"><label for="exampleInputUsername1">{{$visite_doctor->phone}}</label></a>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">{{__('all_strings.status')}}</label>
                                @if($visite->status=="0")
                                    <label for="exampleInputUsername1">{{__('all_strings.wait')}}</label>
                                @elseif($visite->status=="1")
                                    <label for="exampleInputUsername1">{{__('all_strings.end')}}</label>
                                @elseif($visite->status=="2")
                                    <label for="exampleInputUsername1">{{__('all_strings.canceled')}}</label>
                                @endif
                            </div>

                            <input id="location_text_input" type="hidden" name="location" value="0,0">
                            <div style="width:100%; height:300px;display: flex;justify-content: center;align-items: center;">
                                <div id ="map" style = "width:100%; height:300px;"></div>
                            </div>

                            @if($visite->status=="0")
                                <br>
                                <a href="{{url('/Admin/Visite/Cancel/')}}/{{$visite->id}}" style="width: 100%;" class="btn btn-gradient-primary mr-2">{{__('all_strings.cancel')}}</a>
                                <br>
                                <br>
                                <a href="{{url('/Admin/Visite/Done/')}}/{{$visite->id}}" style="width: 100%;" class="btn btn-gradient-primary mr-2">{{__('all_strings.oked')}}</a>
                            @endif

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
            <!--Top Side Of Content Start-->
            @endif



        </div>

    </div>
    <!-- content-wrapper ends -->








    <!--Open Street Map Start-->
    <link rel = "stylesheet" href = "{{asset('admin-assets/Map/leaflet.css')}}" />
    <script src = "{{asset('admin-assets/Map/leaflet.js')}}"></script>
    <script>

        var mapOptions = {
            center: [{{$visite_doctor->lat}}, {{$visite_doctor->lng}}],
            zoom: 14
        }

        var map = new L.map('map', mapOptions);
        var layer = new L.TileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png');
        map.addLayer(layer);

        function onMoveEnd(e){
            var location_text_input=window.document.getElementById("location_text_input");
            location_text_input.value=map.getCenter().lat+","+map.getCenter().lng;
        }

        let marker = new L.Marker([{{$visite_doctor->lat}}, {{$visite_doctor->lng}}]);
        marker.addTo(map);

        map.on('moveend', onMoveEnd);

    </script>
    <!--Open Street Map End-->







@include('Admin.Panel.Layouts.Footer_Panel')


























