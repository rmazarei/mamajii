@include('Admin.Panel.Layouts.Panel')



<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                  <i class="mdi mdi-package-variant-closed"></i>
                </span>{{__('all_strings.newsoundpost')}}
            </h3>
        </div>

        <div class="row">

            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <form class="forms-sample" enctype="multipart/form-data" method="post" action="{{url('/Admin/NewSoundPostDone')}}">
                            <input type="hidden" value="{{csrf_token()}}" name="_token"/>

                            <div class="form-group">
                                <label for="exampleInputUsername1">{{__('all_strings.title')}}</label>
                                <input type="text" class="form-control" id="exampleInputUsername1" placeholder="{{__('all_strings.title')}}" name="title" required>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputUsername1">{{__('all_strings.categorory')}}</label>
                                <select class="form-control" name="category" required>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->title}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputUsername1">{{__('all_strings.status')}}</label>
                                <select class="form-control" name="visible" required>
                                    <option value="1">{{__('all_strings.vis')}}</option>
                                    <option value="0">{{__('all_strings.hide')}}</option>
                                </select>
                            </div>

                            <div class="form-group" style="display: none;">
                                <label for="exampleInputUsername1">{{__('all_strings.image_addrs')}}</label>
                                <input value="-" type="text" class="form-control" id="exampleInputUsername1" placeholder="{{__('all_strings.image_addrs')}}" name="img_adrs" required>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputUsername1">{{__('all_strings.sound_file')}}</label>
                                <input type="file" class="form-control" id="exampleInputUsername1" name="sound_file" required>
                            </div>

                            <button type="submit" style="width: 100%;" class="btn btn-gradient-primary mr-2">{{__('all_strings.done')}}</btn>

                        </form>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <!-- content-wrapper ends -->




@include('Admin.Panel.Layouts.Footer_Panel')
