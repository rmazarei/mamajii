@include('Admin.Panel.Layouts.Empty')


    <!--Login Main Content Start-->
        <div class="content-wrapper" style="height: 100vh;">
          <div class="row">
            <div class="col-md-6 grid-margin stretch-card" style="margin: 0 auto;">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title" style="text-align: center;">{{__('all_strings.loginform')}}</h4>
                  <p class="card-description" style="text-align: center;">{{__('all_strings.PleaseFillUnderFeilds')}}</p>
                  <form class="forms-sample" method="post">
                      <input type="hidden" value="{{csrf_token()}}" name="_token"/>
                    <div class="form-group">
                      <label for="exampleInputUsername1">{{__('all_strings.username')}}</label>
                      <input type="text" class="form-control" id="exampleInputUsername1" placeholder="{{__('all_strings.username')}}" name="username">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">{{__('all_strings.password')}}</label>
                      <input type="password" class="form-control" id="exampleInputPassword1" placeholder="{{__('all_strings.password')}}" name="password">
                    </div>
                    <button style="width: 100%;" type="submit" class="btn btn-gradient-primary mr-2">{{__('all_strings.login')}}</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
    <!--Login Main Content End-->


@include('Admin.Panel.Layouts.Footer_Empty')
