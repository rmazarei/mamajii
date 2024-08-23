@include('Admin.Panel.Layouts.Panel')



<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                  <i class="mdi mdi-folder"></i>
                </span>{{__('all_strings.filemanager')}}
            </h3>
        </div>

        <div class="row">


            <!--Upload File Start-->
            <div class="col-lg-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{__('all_strings.fileupload')}}</h4>

                        <form action="{{url('Admin/FileManager/UploadFile')}}" method="POST" class="form-validate" enctype="multipart/form-data">
                            <input type="hidden" value="{{csrf_token()}}" name="_token"/>
                            <br />
                            <!--File Select Start-->
                            <input name="Upload_File" type="file" class="upload_file" id="file_upload_btn" onchange='uploadFile(this)' required/>

                            <!--Address Start-->
                            <input type="text" name="Address" style="display:none;" id="Upload_Address" value="{{request()->query("path")}}"/>
                            <!--Address End-->
                            <!--File Select Start-->
                            <br />
                            <br />
                            <button style="width: 100%;" type="submit" class="btn btn-gradient-primary mr-2">تایید</button>

                        </form>

                    </div>
                </div>
            </div>
            <!--Upload File End-->



            <!--New Folder Start-->
            <div class="col-lg-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{__('all_strings.newfolder')}}</h4>
                        <form class="forms-sample" method="post" action="{{url('/Admin/FileManager/NewFolder')}}">
                            <input type="hidden" value="{{csrf_token()}}" name="_token"/>
                            <input type="hidden" value="{{request()->query("path")}}" name="path" required/>
                            <div class="form-group">
                                <label for="exampleInputUsername1">{{__('all_strings.newfoldername')}}</label>
                                <input type="text" class="form-control" id="exampleInputUsername1" placeholder="{{__('all_strings.newfoldername')}}" name="name" required>
                            </div>
                            <button style="width: 100%;" type="submit" class="btn btn-gradient-primary mr-2">{{__('all_strings.done')}}</button>
                        </form>
                    </div>
                </div>
            </div>
            <!--New Folder End-->



            <!--Main Side Of Content Start-->
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title" ></h4>
                        </p>
                        @if(count($files)>2)
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>{{__('all_strings.name')}}</th>
                                    <th>{{__('all_strings.type')}}</th>
                                    <th>{{__('all_strings.delete')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($files as $file)
                                        @if($file!="." && $file!="..")
                                            <tr>
                                                @if(str_contains($file,"."))
                                                    <td><a target="_blank" href="{{public_path("FileManager")}}\{{request()->query("path")}}\{{$file}}">{{$file}}</a></td>
                                                    <td><i style="font-size:18px;" class="mdi mdi-file menu-icon"></i></td>
                                                    <td><a href="/Admin/FileManager/Remove?file={{request()->query("path")}}\{{$file}}"><i style="font-size:18px;" class="mdi mdi-delete menu-icon"></i></a></td>
                                                @else
                                                    <td><a href="?path={{$file}}">{{$file}}</a></td>
                                                    <td><i style="font-size:18px;" class="mdi mdi-folder menu-icon"></i></td>
                                                    <td><a href="/Admin/FileManager/RemoveDir?file={{request()->query("path")}}\{{$file}}"><i style="font-size:18px;" class="mdi mdi-delete menu-icon"></i></a></td>
                                                @endif
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <div style="width: 100%;height: 250px;display: flex;justify-content: center;align-items: center;">
                                <div style="width: 150px;">
                                    <img style="margin: 0 auto;" src="{{asset('admin-assets/images/icons/empty.png')}}" width="150px"/>
                                    <p style="margin: 10px auto;text-align: center;">{{__('all_strings.folder_is_empty')}}</p>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <!--Main Side Of Content End-->

        </div>

    </div>
    <!-- content-wrapper ends -->












@include('Admin.Panel.Layouts.Footer_Panel')
