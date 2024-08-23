@include('Admin.Panel.Layouts.Panel')



<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                  <i class="mdi mdi-paperclip"></i>
                </span>{{__('all_strings.posts')}}
            </h3>
        </div>

        <div class="row">



            <!--Top Side Of Content Start-->
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <form class="forms-sample" method="post" action="{{url('/Admin/AllPosts/Search')}}">
                            <input type="hidden" value="{{csrf_token()}}" name="_token"/>
                            <div class="form-group">
                                <label style="width: 100%;text-align: right;" for="exampleInputUsername1">{{__('all_strings.Search')}}</label>
                                <input type="text" class="form-control" id="exampleInputUsername1" placeholder="{{__('all_strings.Search')}}" name="search">
                            </div>
                            <button style="width: 100%;" type="submit" class="btn btn-gradient-primary mr-2">{{__('all_strings.Search')}}</button>
                        </form>
                    </div>
                </div>
            </div>
            <!--Top Side Of Content Start-->



            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        @if(count($posts)>0)
                        <table class="table">
                            <thead>
                            <tr>
                                <th>{{__('all_strings.Id')}}</th>
                                <th>{{__('all_strings.title')}}</th>
                                <th>{{__('all_strings.ditales')}}</th>
                                <th>{{__('all_strings.Properties')}}</th>
                                <th>{{__('all_strings.delete')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($posts as $post)
                                    <tr>
                                        <td>{{$post->id}}</td>
                                        <td>{{$post->title}}</td>

                                        @if($post->visible=="1")
                                            <td>{{__('all_strings.vis')}}</td>
                                        @else
                                            <td>{{__('all_strings.hide')}}</td>
                                        @endif

                                        <td><i onclick="Open_Link_Dialog(this,'{{url('/Admin/AllPosts')}}/{{$post->id}}')" class="mdi mdi-table-edit" style="color: #F00;font-size: 20px;cursor: pointer;"></i></td>
                                        <td><a href="{{url('/Admin/AllPosts/Remove')}}/{{$post->id}}"><i class="mdi mdi-delete" style="color: #F00;font-size: 20px;"></i></a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
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

        </div>

    </div>
    <!-- content-wrapper ends -->












@include('Admin.Panel.Layouts.Footer_Panel')
