@include('Admin.Panel.Layouts.Panel')



<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                  <i class="mdi mdi-format-list-bulleted"></i>
                </span>{{__('all_strings.categories')}}
            </h3>
        </div>

        <div class="row">

            <!--Right Side Of Content Start-->
            <div class="col-lg-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <form class="forms-sample" method="post" action="{{url('/Admin/Categories/New')}}">
                            <input type="hidden" value="{{csrf_token()}}" name="_token"/>

                            @if(isset(request()->id))
                                <input type="hidden" value="{{request()->id}}" name="id"/>
                                <div class="form-group">
                                    <label for="exa1mpleInputUsername1">{{__('all_strings.new')}}</label>
                                    <input value="{{$edit_cat->title}}" type="text" class="form-control" id="exampleInputUsername1" placeholder="{{__('all_strings.new')}}" name="title" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputUsername1">آدرس عکس پوستر</label>
                                    <input value="{{$edit_cat->icon_address}}" type="text" class="form-control" id="exampleInputUsername1" placeholder="آدرس عکس پوستر" name="iconaddress">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputUsername1">آدرس ویدیو</label>
                                    <input value="{{$edit_cat->video}}" type="text" class="form-control" id="exampleInputUsername1" placeholder="آدرس ویدیو" name="video">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputUsername1">توضیحات</label>
                                    <textarea class="form-control" id="exampleInputUsername1" name="bio">{{$edit_cat->video}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputUsername1">{{__('all_strings.subcat')}}</label>
                                    <select class="form-control" id="exampleInputUsername1" name="root">
                                        <option value="0">{{__('all_strings.root')}}</option>
                                        @foreach($categories as $category)
                                            @if($edit_cat->root_cat_id==$category->id)
                                                <option selected value="{{$category->id}}">{{$category->title}}</option>
                                            @else
                                                <option value="{{$category->id}}">{{$category->title}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputUsername1">{{__('all_strings.visible')}}</label>
                                    <select class="form-control" id="exampleInputUsername1" name="visible">
                                        @if($edit_cat->visible=="1")
                                            <option selected value="1">{{__('all_strings.vis')}}</option>
                                            <option value="0">{{__('all_strings.vis')}}</option>
                                        @else
                                            <option value="1">{{__('all_strings.vis')}}</option>
                                            <option selected value="0">{{__('all_strings.hide')}}</option>
                                        @endif
                                    </select>
                                </div>
{{--                                <div class="form-group">--}}
{{--                                    <label for="exampleInputUsername1">{{__('all_strings.castomlink')}}</label>--}}
{{--                                    <input value="{{$edit_cat->castom_link}}" type="text" class="form-control" id="exampleInputUsername1" placeholder="{{__('all_strings.castomlink')}}" name="ca_link">--}}
{{--                                </div>--}}
                                <div class="form-group">
                                    <label for="exampleInputUsername1">قیمت محصول</label>
                                    <input value="{{$edit_cat->price}}" value="0" type="number" class="form-control" id="exampleInputUsername1" placeholder="مثال : 500000 تومان" name="price" <?php if(\Illuminate\Support\Facades\Auth::user()->user_type=="ADMIN"){echo "";}else{echo "required";} ?> >
                                </div>
                            @else
                                <div class="form-group">
                                    <label for="exampleInputUsername1">{{__('all_strings.new')}}</label>
                                    <input type="text" class="form-control" id="exampleInputUsername1" placeholder="{{__('all_strings.new')}}" name="title" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputUsername1">آدرس عکس پوستر</label>
                                    <input type="text" class="form-control" id="exampleInputUsername1" placeholder="آدرس عکس پوستر" name="iconaddress">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputUsername1">آدرس ویدیو</label>
                                    <input type="text" class="form-control" id="exampleInputUsername1" placeholder="آدرس ویدیو" name="video">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputUsername1">توضیحات</label>
                                    <textarea class="form-control" id="exampleInputUsername1" name="bio"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputUsername1">{{__('all_strings.subcat')}}</label>
                                    <select class="form-control" id="exampleInputUsername1" name="root">
                                        <option value="0">{{__('all_strings.root')}}</option>
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputUsername1">{{__('all_strings.visible')}}</label>
                                    <select class="form-control" id="exampleInputUsername1" name="visible">
                                        <option value="1">{{__('all_strings.vis')}}</option>
                                        <option value="0">{{__('all_strings.hide')}}</option>
                                    </select>
                                </div>
{{--                                <div class="form-group">--}}
{{--                                    <label for="exampleInputUsername1">{{__('all_strings.castomlink')}}</label>--}}
{{--                                    <input type="text" class="form-control" id="exampleInputUsername1" placeholder="{{__('all_strings.castomlink')}}" name="ca_link">--}}
{{--                                </div>--}}
                                <div class="form-group">
                                    <label for="exampleInputUsername1">قیمت محصول</label>
                                    <input type="number" class="form-control" value="0" id="exampleInputUsername1" placeholder="مثال : 500000 تومان" name="price" <?php if(\Illuminate\Support\Facades\Auth::user()->user_type=="ADMIN"){echo "";}else{echo "required";} ?>  >
                                </div>
                            @endif


                            <button style="width: 100%;" type="submit" class="btn btn-gradient-primary mr-2">{{__('all_strings.done')}}</button>
                        </form>
                    </div>
                </div>
            </div>
            <!--Right Side Of Content End-->

            <!--Left Side Of Content Start-->
            <div class="col-lg-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title" ></h4>
                        </p>
                        @if(count($categories)>0)
                        <table class="table">
                            <thead>
                            <tr>
                                <th>{{__('all_strings.Id')}}</th>
                                <th>{{__('all_strings.categorory')}}</th>
                                <th>قیمت</th>
                                <th>{{__('all_strings.ditales')}}</th>
                                <th>{{__('all_strings.Properties')}}</th>
                                <th>{{__('all_strings.delete')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $Record=1; ?>
                            @foreach($categories as $category)
                                <tr>
                                    <td>{{$category->id}}</td>
                                    <td>{{$category->title}}</td>
                                    <td>{{$category->price}}</td>

                                    @if($category->visible=="1")
                                        <td>{{__('all_strings.vis')}}</td>
                                    @else
                                        <td>{{__('all_strings.hide')}}</td>
                                    @endif

                                    <td><a href="{{url('/Admin/Category/Update')}}/{{$category->id}}"><i class="mdi mdi-table-edit" style="color: #F00;font-size: 20px;"></i></a></td>
                                    <td><a href="{{url('/Admin/Category/Remove')}}/{{$category->id}}"><i class="mdi mdi-delete" style="color: #F00;font-size: 20px;"></i></a></td>

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
            <!--Left Side Of Content End-->

        </div>

    </div>
    <!-- content-wrapper ends -->












@include('Admin.Panel.Layouts.Footer_Panel')
