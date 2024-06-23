@include('Admin.Panel.Layouts.Empty')


    <!--Login Main Content Start-->
        <div class="content-wrapper" style="height: 100vh;">
          <div class="row">
            <div class="col-md-6 grid-margin stretch-card" style="margin: 0 auto;">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title" style="text-align: center;">{{__('all_strings.loginform')}}</h4>
                  <p class="card-description" style="text-align: center;">{{__('all_strings.please_enter_google_2_f')}}</p>
                  <form class="forms-sample" method="post">
                      <input type="hidden" value="{{csrf_token()}}" name="_token"/>
                    <div class="form-group">
                      <label for="exampleInputUsername1">{{__('all_strings.google2fpass')}}</label>
                      <input type="text" class="form-control" id="exampleInputUsername1" placeholder="{{__('all_strings.google2f')}}" name="google_auth_code">
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
