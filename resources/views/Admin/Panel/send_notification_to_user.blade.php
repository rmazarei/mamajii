@include('Admin.Panel.Layouts.Empty')


      <!--Send Notification To User Start-->
        <div class="content-wrapper" style="height: 100vh;">
          <div class="row">
            <div class="col-md-11 grid-margin stretch-card" style="margin: 50px auto;">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title" style="text-align: center;">{{__('all_strings.SendNotification')}}</h4>
                  <p class="card-description" style="text-align: center;">{{__('all_strings.PleaseFillUnderFeilds')}}</p>
                  <form class="forms-sample" method="post" action="{{url('/Admin/UserManager/Send_Notification_submit/')}}">
                      <input type="hidden" value="{{$User_Id}}" name="user_id"/>
                      <input type="hidden" value="{{csrf_token()}}" name="_token"/>
                    <div class="form-group">
                      <label for="exampleInputUsername1">{{__('all_strings.Title')}}</label>
                      <input type="text" class="form-control" id="exampleInputUsername1" placeholder="{{__('all_strings.Title')}}" name="title">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">{{__('all_strings.Text')}}</label>
                      <textarea style="height: 60px;" class="form-control" id="exampleInputPassword1" placeholder="{{__('all_strings.Text')}}" name="content_text"></textarea>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">{{__('all_strings.Link')}}</label>
                      <input type="text" class="form-control" id="exampleInputPassword1" placeholder="{{__('all_strings.Link')}}" name="link">
                    </div>
                    <button style="width: 100%;" type="submit" class="btn btn-gradient-primary mr-2">{{__('all_strings.done')}}</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
    <!--Send Notification To User End-->


@include('Admin.Panel.Layouts.Footer_Empty')
