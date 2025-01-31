@include('Admin.Panel.Layouts.Panel')



<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                  <i class="mdi mdi-package-variant-closed"></i>
                </span>{{__('all_strings.new_product')}}
            </h3>
        </div>

        <div class="row">

            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <form enctype="multipart/form-data" class="forms-sample" method="post" action="{{url('/Admin/Store/NewStoreDone')}}">
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


                            <div class="form-group">
                                <label for="exampleInputUsername1">{{__('all_strings.price')}}</label>
                                <input type="number" class="form-control" id="exampleInputUsername1" placeholder="{{__('all_strings.price')}}" name="price" required>
                            </div>


                            <!--type start-->
                            <div style="display: none;">
                                <div class="form-group">
                                    <label for="exampleInputUsername1">{{__('all_strings.type')}}</label>
                                    <select onchange="onchnage_store_type(this)" id="store_type_combo" class="form-control" placeholder="{{__('all_strings.image_addrs')}}" name="type">
                                        <option value="PRODUCT">{{__('all_strings.product')}}</option>
                                        <option value="FILE">{{__('all_strings.file')}}</option>
                                    </select>
                                </div>

                                <!--On change store type event start-->
                                <script>

                                    function onchnage_store_type(e){

                                        var store_type_combo=window.document.getElementById("store_type_combo");
                                        var file_upload = window.document.getElementById("file_upload");
                                        var file_product=window.document.getElementById("file_product");

                                        if(store_type_combo.value=="FILE")
                                        {
                                            file_upload.style.display="block";
                                            file_product.required=true;
                                        }
                                        else
                                        {
                                            file_upload.style.display="none";
                                            file_product.required=false;
                                        }

                                    }

                                </script>
                                <!--On change store type event end-->

                                <div class="form-group" id="file_upload" style="display: none;">
                                    <label for="exampleInputPassword1" >{{__('all_strings.file')}}</label>
                                    <input type="file" class="form-control" id="file_product" name="file">
                                </div>
                            </div>
                            <!--type end-->

                            <!--Image upload start-->
                            <div>
                                <div class="form-group">
                                    <label for="exampleInputUsername1" style="width: 100%;text-align: right;">{{__('all_strings.uploadnewimage')}}</label>
                                    <div style="display: flex;">
                                        <label style="width: 60px;cursor: pointer;color: white;border-radius:3px;font-size: 18px;height: 35px;background: var(--primary);display: flex;justify-content: center;align-items: center;">
                                            +
                                            <input type="file" onchange="upload_store_image(this)" style="display: none;margin : 7px;height: 40px;" class="btn btn-gradient-primary mr-2"/>
                                        </label>
                                    </div>
                                </div>

                                <div id="uploaded_image_box" style="display: flex;">

                                </div>

                                <input type="hidden" id="store_photos" value="" name="all_images"/>

                                <!--wait area start-->
                                <div id="wait_panel" style="display: none;z-index: 999999999;position: fixed;top: 0;left: 0;width: 100%;height: 100vh;background: #66666699;">
                                </div>
                                <!--wait area end-->

                                <script>

                                    var images_and_id_array=[];
                                    var index=0;

                                    //upload file
                                    function upload_store_image(e)
                                    {
                                        var F = new FormData();
                                        F.append('image', e.files[0]);
                                        F.append('_token', '{{csrf_token()}}');

                                        //Ajax start
                                        var xhttp = new XMLHttpRequest();
                                        var store_photos=window.document.getElementById("store_photos");
                                        var upload_wait_box=window.document.getElementById("wait_panel");
                                        var uploaded_image_box=window.document.getElementById("uploaded_image_box");

                                        upload_wait_box.style.display="block";

                                        xhttp.onreadystatechange=function () {
                                            if(this.readyState==4 && this.status==200)
                                            {
                                                // console.log(this.responseText);
                                                store_photos.value+=JSON.parse(this.responseText).file_hash+",";
                                                upload_wait_box.style.display="none";
                                                const [file] = e.files
                                                uploaded_image_box.innerHTML+="<div class='preview_upload_imgae_div'><btn onclick='remove_store_image(this,\""+JSON.parse(this.responseText).file_hash+"\")' class='preview_upload_imgae_btn'><i class='mdi mdi-delete'></i></btn><img width='250px' src='"+URL.createObjectURL(file)+"'/></div>";
                                                images_and_id_array.push([JSON.parse(this.responseText).file_hash,file]);
                                            }
                                        };

                                        xhttp.open("Post","/File/Add/AddImage",true);
                                        xhttp.setRequestHeader("Cache-Control", "no-cache");
                                        xhttp.setRequestHeader("X-Requested-With", "XMLHttpRequest");
                                        xhttp.setRequestHeader("X-CSRF-Token", '{{csrf_token()}}');

                                        xhttp.send(F);
                                        //Ajax end

                                    }
                                    //upload end

                                    //remove uploaded a image start
                                    function remove_store_image(e,indexx)
                                    {
                                        var uploaded_image_box=window.document.getElementById("uploaded_image_box");
                                        var temp=images_and_id_array;
                                        images_and_id_array=[];
                                        uploaded_image_box.innerHTML="";
                                        for(var i=0;i<temp.length;i++)
                                        {
                                            var data=temp[i];
                                            if(data[0]!=parseInt(indexx))
                                            {
                                                images_and_id_array.push(data);
                                            }
                                        }

                                        for(var i=0;i<images_and_id_array.length;i++)
                                        {
                                            var data=images_and_id_array[i];
                                            uploaded_image_box.innerHTML+="<div class='preview_upload_imgae_div'><btn onclick='remove_store_image(this,\""+data[0]+"\")' class='preview_upload_imgae_btn'><i class='mdi mdi-delete'></i></btn><img width='250px' src='"+URL.createObjectURL(data[1])+"'/></div>";
                                        }

                                        var store_photos=window.document.getElementById("store_photos");
                                        var sval=store_photos.value;
                                        sval=sval.replace(indexx+",","");
                                        store_photos.value=sval;

                                    }
                                    //remove uploaded a image end

                                </script>
                                <style>

                                    .preview_upload_imgae_div
                                    {
                                        width: 250px;
                                        margin:14px;
                                        cursor: pointer;
                                        display: flex;
                                        justify-content: center;
                                        align-items: center;
                                    }

                                    .preview_upload_imgae_btn
                                    {
                                        position: absolute;
                                        color: red;
                                        font-size: 36px;
                                        display: none;
                                    }

                                    .preview_upload_imgae_div:hover .preview_upload_imgae_btn
                                    {
                                        display: block;
                                    }

                                    .preview_upload_imgae_div>btn>i{
                                        color: #F00;
                                    }

                                </style>
                            </div>
                            <!--Image upload end-->

                            <br>
                            <br>


                            <!--attr start-->
                            <div style="display: none;">
                                <div class="form-group">
                                    <label for="exampleInputUsername1" style="width: 100%;text-align: right;">{{__('all_strings.newattr')}}</label>
                                    <div style="display: flex;">
                                        <input type="text" style="margin: 5px" class="form-control" id="attr_imageaddress" placeholder="{{__('all_strings.key')}}">
                                        <input type="text" style="margin: 5px" class="form-control" id="attr_imagelink" placeholder="{{__('all_strings.value')}}">
                                        <btn onclick="AddNewattr(this)" style="margin : 7px;height: 40px;" class="btn btn-gradient-primary mr-2">+</btn>
                                    </div>
                                </div>
                                <input value="[]" name="attr" type="hidden" style="margin: 5px" class="form-control" id="attr_input" placeholder="{{__('all_strings.imageaddress')}}" value="[]">
                                <div class="form-group">
                                    <label for="exampleInputUsername1">{{__('all_strings.attr')}}</label>

                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th>{{__('all_strings.key')}}</th>
                                            <th>{{__('all_strings.value')}}</th>
                                            <th>{{__('all_strings.event')}}</th>
                                        </tr>
                                        </thead>
                                        <tbody id="attr_table_content">

                                        </tbody>
                                    </table>

                                </div>
                            </div>
                            <script>


                                //load event start
                                window.addEventListener('load',function (e) {

                                    //get load slider
                                    attr_load(e);

                                });
                                //load event end


                                //get on click add new slider item start
                                function AddNewattr(e){
                                    var attr_input=window.document.getElementById("attr_input");
                                    var attr_imagelink=window.document.getElementById("attr_imagelink");
                                    var attr_imageaddress=window.document.getElementById("attr_imageaddress");

                                    var attr_input_json=JSON.parse(attr_input.value);

                                    var n_js={"key":attr_imageaddress.value,"value":attr_imagelink.value};
                                    attr_input_json.push(n_js);

                                    attr_input.value=JSON.stringify(attr_input_json);

                                    attr_imageaddress.value=attr_imagelink.value="";

                                    attr_load(e);
                                }
                                //get on click add new slider item end


                                //load all silders function start
                                function attr_load(e){
                                    var attr_input=window.document.getElementById("attr_input");
                                    var attr_input_js=JSON.parse(attr_input.value);
                                    var attr_table_content=window.document.getElementById("attr_table_content");

                                    attr_table_content.innerHTML="";

                                    for(var i=0;i<attr_input_js.length;i++)
                                    {
                                        attr_table_content.innerHTML+="<tr><td><a href='"+attr_input_js[i].address+"'><i class='mdi mdi-image'/></a></td><td><a href='"+attr_input_js[i].link+"'><i class='mdi mdi-link'/></a></td><td><btn style='color: #F00;cursor: pointer;' onclick='get_remove_attr("+i+")'>-</btn></td></tr>";
                                    }
                                }

                                function attr_load(){
                                    var attr_input=window.document.getElementById("attr_input");
                                    var attr_input_js=JSON.parse(attr_input.value);
                                    var attr_table_content=window.document.getElementById("attr_table_content");

                                    attr_table_content.innerHTML="";

                                    for(var i=0;i<attr_input_js.length;i++)
                                    {
                                        attr_table_content.innerHTML+="<tr><td>"+attr_input_js[i].key+"</td><td>"+attr_input_js[i].value+"</td><td><btn style='color: #F00;cursor: pointer;' onclick='get_remove_attr("+i+")'>-</btn></td></tr>";
                                    }
                                }
                                //load all silders function end


                                //get remove slider item start
                                function get_remove_attr(index)
                                {
                                    var attr_input=window.document.getElementById("attr_input");
                                    var attr_input_js=JSON.parse(attr_input.value);
                                    delete attr_input_js[index];

                                    var result=JSON.stringify(attr_input_js);
                                    result=result.replaceAll(",null","");
                                    result=result.replaceAll("null,","");
                                    result=result.replaceAll(",null,",",");

                                    attr_input.value=result;

                                    attr_load();

                                }
                                //get remove slider item end


                            </script>
                            <!--attr end-->

                            <div class="form-group">
                                <label for="exampleInputUsername1">{{__('all_strings.ditales')}}</label>
                                <textarea style="height: 150px;" class="form-control" id="exampleInputUsername1" name="cntent"></textarea>
                            </div>



                            <button type="submit" style="width: 100%;" class="btn btn-gradient-primary mr-2">{{__('all_strings.done')}}</button>

                        </form>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <!-- content-wrapper ends -->














@include('Admin.Panel.Layouts.Footer_Panel')
