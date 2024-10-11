@include('Admin.Panel.Layouts.Empty')


<!--Send Notification To User Start-->
<div class="content-wrapper" style="height: 100vh;">
    <div class="row">
        <div class="col-md-11 grid-margin stretch-card" style="margin: 50px auto;">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title" style="text-align: center;">{{__('all_strings.editusers')}}</h4>
                    <p class="card-description" style="text-align: center;">{{__('all_strings.PleaseFillUnderTextFeilds')}}</p>
                    <form enctype="multipart/form-data" class="forms-sample" method="post" action="{{route('admin.users.times.store', $user->id)}}">
                        <input type="hidden" value="{{$user->id}}" name="user_id"/>
                        <input type="hidden" value="{{csrf_token()}}" name="_token"/>

                        <table class="table">
                            <tr>
                                <td>
                                    <label class="form-group" style="width: 100%;display: -webkit-inline-box;float: right;direction: ltr;">
                                    شنبه

                                    @if($sat=="on")
                                        <input checked type="checkbox" style="height: auto;width: auto;margin-left: 10px;" class="form-control" id="exampleInputPassword1" name="satday_time">
                                    @else
                                        <input type="checkbox" style="height: auto;width: auto;margin-left: 10px;" class="form-control" id="exampleInputPassword1" name="satday_time">
                                    @endif

                                </label>
                                </td>

                                <td>
                                    <div class="form-group" style="width: 100%;">
                                        <label for="exampleInputPassword1">{{__('all_strings.startweek_days')}}</label>
                                        <input type="time" class="form-control" id="exampleInputPassword1" name="start_time_0" value="{{$start_0}}">
                                    </div>
                                </td>

                                <td>
                                    <div class="form-group" style="width: 100%;">
                                        <label for="exampleInputPassword1">{{__('all_strings.endweek_days')}}</label>
                                        <input type="time" class="form-control" id="exampleInputPassword1" name="end_time_0" value="{{$end_0}}">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="form-group" style="width: 100%;display: -webkit-inline-box;float: right;direction: ltr;">
                                        یکشنبه

                                        @if($sun=="on")
                                            <input checked type="checkbox" style="height: auto;width: auto;margin-left: 10px;" class="form-control" id="exampleInputPassword1" name="sunday_time">
                                        @else
                                            <input type="checkbox" style="height: auto;width: auto;margin-left: 10px;" class="form-control" id="exampleInputPassword1" name="sunday_time">
                                        @endif

                                    </label>
                                </td>

                                <td>
                                    <div class="form-group" style="width: 100%;">
                                        <label for="exampleInputPassword1">{{__('all_strings.startweek_days')}}</label>
                                        <input type="time" class="form-control" id="exampleInputPassword1" name="start_time_1" value="{{$start_1}}">
                                    </div>
                                </td>

                                <td>
                                    <div class="form-group" style="width: 100%;">
                                        <label for="exampleInputPassword1">{{__('all_strings.endweek_days')}}</label>
                                        <input type="time" class="form-control" id="exampleInputPassword1" name="end_time_1" value="{{$end_1}}">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="form-group" style="width: 100%;display: -webkit-inline-box;float: right;direction: ltr;">
                                        دوشنبه

                                        @if($mon=="on")
                                            <input checked type="checkbox" style="height: auto;width: auto;margin-left: 10px;" class="form-control" id="exampleInputPassword1" name="monday_time">
                                        @else
                                            <input type="checkbox" style="height: auto;width: auto;margin-left: 10px;" class="form-control" id="exampleInputPassword1" name="monday_time">
                                        @endif

                                    </label>
                                </td>

                                <td>
                                    <div class="form-group" style="width: 100%;">
                                        <label for="exampleInputPassword1">{{__('all_strings.startweek_days')}}</label>
                                        <input type="time" class="form-control" id="exampleInputPassword1" name="start_time_2" value="{{$start_2}}">
                                    </div>
                                </td>

                                <td>
                                    <div class="form-group" style="width: 100%;">
                                        <label for="exampleInputPassword1">{{__('all_strings.endweek_days')}}</label>
                                        <input type="time" class="form-control" id="exampleInputPassword1" name="end_time_2" value="{{$end_2}}">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="form-group" style="width: 100%;display: -webkit-inline-box;float: right;direction: ltr;">
                                        سه شنبه

                                        @if($tue=="on")
                                            <input checked type="checkbox" style="height: auto;width: auto;margin-left: 10px;" class="form-control" id="exampleInputPassword1" name="tueday_time">
                                        @else
                                            <input type="checkbox" style="height: auto;width: auto;margin-left: 10px;" class="form-control" id="exampleInputPassword1" name="tueday_time">
                                        @endif

                                    </label>
                                </td>

                                <td>
                                    <div class="form-group" style="width: 100%;">
                                        <label for="exampleInputPassword1">{{__('all_strings.startweek_days')}}</label>
                                        <input type="time" class="form-control" id="exampleInputPassword1" name="start_time_3" value="{{$start_3}}">
                                    </div>
                                </td>

                                <td>
                                    <div class="form-group" style="width: 100%;">
                                        <label for="exampleInputPassword1">{{__('all_strings.endweek_days')}}</label>
                                        <input type="time" class="form-control" id="exampleInputPassword1" name="end_time_3" value="{{$end_3}}">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="form-group" style="width: 100%;display: -webkit-inline-box;float: right;direction: ltr;">
                                        چهارشنبه

                                        @if($wed=="on")
                                            <input checked type="checkbox" style="height: auto;width: auto;margin-left: 10px;" class="form-control" id="exampleInputPassword1" name="wedday_time">
                                        @else
                                            <input type="checkbox" style="height: auto;width: auto;margin-left: 10px;" class="form-control" id="exampleInputPassword1" name="wedday_time">
                                        @endif

                                    </label>
                                </td>

                                <td>
                                    <div class="form-group" style="width: 100%;">
                                        <label for="exampleInputPassword1">{{__('all_strings.startweek_days')}}</label>
                                        <input type="time" class="form-control" id="exampleInputPassword1" name="start_time_4" value="{{$start_4}}">
                                    </div>
                                </td>

                                <td>
                                    <div class="form-group" style="width: 100%;">
                                        <label for="exampleInputPassword1">{{__('all_strings.endweek_days')}}</label>
                                        <input type="time" class="form-control" id="exampleInputPassword1" name="end_time_4" value="{{$end_4}}">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="form-group" style="width: 100%;display: -webkit-inline-box;float: right;direction: ltr;">
                                        {{__('all_strings.thursday')}}

                                        @if($thu=="on")
                                            <input checked type="checkbox" style="height: auto;width: auto;margin-left: 10px;" class="form-control" id="exampleInputPassword1" name="thursday_time">
                                        @else
                                            <input type="checkbox" style="height: auto;width: auto;margin-left: 10px;" class="form-control" id="exampleInputPassword1" name="thursday_time">
                                        @endif

                                    </label>
                                </td>

                                <td>
                                    <div class="form-group" style="width: 100%;">
                                        <label for="exampleInputPassword1">{{__('all_strings.startweek_days')}}</label>
                                        <input type="time" class="form-control" id="exampleInputPassword1" name="start_time_5" value="{{$start_5}}">
                                    </div>
                                </td>

                                <td>
                                    <div class="form-group" style="width: 100%;">
                                        <label for="exampleInputPassword1">{{__('all_strings.endweek_days')}}</label>
                                        <input type="time" class="form-control" id="exampleInputPassword1" name="end_time_5" value="{{$end_5}}">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="form-group" style="width: 100%;display: -webkit-inline-box;float: right;direction: ltr;">
                                        جمعه

                                        @if($fri=="on")
                                            <input checked type="checkbox" style="height: auto;width: auto;margin-left: 10px;" class="form-control" id="exampleInputPassword1" name="friday_time">
                                        @else
                                            <input type="checkbox" style="height: auto;width: auto;margin-left: 10px;" class="form-control" id="exampleInputPassword1" name="friday_time">
                                        @endif

                                    </label>
                                </td>

                                <td>
                                    <div class="form-group" style="width: 100%;">
                                        <label for="exampleInputPassword1">{{__('all_strings.startweek_days')}}</label>
                                        <input type="time" class="form-control" id="exampleInputPassword1" name="start_time_6" value="{{$start_6}}">
                                    </div>
                                </td>

                                <td>
                                    <div class="form-group" style="width: 100%;">
                                        <label for="exampleInputPassword1">{{__('all_strings.endweek_days')}}</label>
                                        <input type="time" class="form-control" id="exampleInputPassword1" name="end_time_6" value="{{$end_6}}">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <label for="hours">
                                        ساعات مورد نظر
                                        <span class="text-sm text-muted">(در هر سطر یک ساعت)</span>
                                    </label>
                                    <textarea rows="8" name="hours" id="hours" class="form-control"></textarea>
                                </td>
                            </tr>

                        </table>

                        <button style="width: 100%;" type="submit" class="btn btn-gradient-primary mr-2">{{__('all_strings.done')}}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Send Notification To User End-->


@include('Admin.Panel.Layouts.Footer_Empty')
