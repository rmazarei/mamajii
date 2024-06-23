@include('Admin.Panel.Layouts.Panel')
<?php
    $parametrs=json_decode($Setting->parametrs);
?>

<!-- partial -->
<div class="main-panel">
    <!--Send Notification To User Start-->
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                  <i class="mdi mdi-settings"></i>
                </span></span></span>{{__('all_strings.Settings')}}
            </h3>
        </div>
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title" style="text-align: center;">{{__('all_strings.settings')}}</h4>
                        <form class="forms-sample" method="post" action="{{url('/Admin/Settings/Update')}}">
                            <input type="hidden" value="{{csrf_token()}}" name="_token"/>

                            <div class="form-group">
                                <label for="exampleInputUsername1">{{__('all_strings.iconaddress')}}</label>
                                <input value="{{$parametrs->logo}}" type="text" class="form-control" id="exampleInputUsername1" placeholder="{{__('all_strings.iconaddress')}}" name="icon" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">{{__('all_strings.law')}}</label>
                                <textarea style="height: 150px;" class="form-control" placeholder="{{__('all_strings.law')}}" name="law" required>{{$parametrs->law}}</textarea>
                            </div>


                            <br>
                            <br>


                            <!--Slider start-->
                            <div>
                                <div class="form-group">
                                    <label for="exampleInputUsername1">{{__('all_strings.newsllider')}}</label>

                                    <div style="display: flex;">
                                        <input type="text" style="margin: 5px" class="form-control" id="slider_imageaddress" placeholder="{{__('all_strings.imageaddress')}}">
                                        <input type="text" style="margin: 5px" class="form-control" id="slider_imagelink" placeholder="{{__('all_strings.btn_link')}}">
                                        <input type="text" style="margin: 5px" class="form-control" id="slider_imagetitle" placeholder="{{__('all_strings.btn_title')}}">
                                    </div>

                                    <div style="display: flex;">
                                        <input type="text" style="margin: 5px" class="form-control" id="slider_imagetext" placeholder="{{__('all_strings.btn_text')}}">
                                        <input type="text" style="margin: 5px" class="form-control" id="slider_backimage" placeholder="{{__('all_strings.backimageaddress')}}">
                                        <btn onclick="AddNewSlider(this)" style="margin : 7px;height: 40px;" class="btn btn-gradient-primary mr-2">+</btn>
                                    </div>

                                </div>
                                <input value="{{json_encode($parametrs->sliders)}}" name="slider" type="hidden" style="margin: 5px" class="form-control" id="silder_input" placeholder="{{__('all_strings.imageaddress')}}" value="[]">
                                <div class="form-group">
                                <label for="exampleInputUsername1">{{__('all_strings.sllider')}}</label>

                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>{{__('all_strings.imageaddress')}}</th>
                                            <th>{{__('all_strings.btn_link')}}</th>
                                            <th>{{__('all_strings.btn_text')}}</th>
                                            <th>{{__('all_strings.backimageaddress')}}</th>
                                            <th>{{__('all_strings.event')}}</th>
                                        </tr>
                                    </thead>
                                    <tbody id="silder_table_content">

                                    </tbody>
                                </table>

                            </div>
                            </div>
                            <script>


                                //load event start
                                window.addEventListener('load',function (e) {

                                    //get load slider
                                    slider_load(e);

                                });
                                //load event end


                                //get on click add new slider item start
                                function AddNewSlider(e){

                                    var silder_input=window.document.getElementById("silder_input");
                                    var slider_imagetext=window.document.getElementById("slider_imagetext");
                                    var slider_imagetitle=window.document.getElementById("slider_imagetitle");
                                    var slider_imagelink=window.document.getElementById("slider_imagelink");
                                    var slider_imageaddress=window.document.getElementById("slider_imageaddress");
                                    var slider_backimage=window.document.getElementById("slider_backimage");

                                    var silder_input_json=JSON.parse(silder_input.value);

                                    var n_js={"title":slider_imagetitle.value,"text":slider_imagetext.value,"address":slider_imageaddress.value,"link":slider_imagelink.value,"backimg":slider_backimage.value};
                                    silder_input_json.push(n_js);

                                    silder_input.value=JSON.stringify(silder_input_json);

                                    slider_imageaddress.value=slider_imagetext.value=slider_imagetitle.value=slider_imagelink.value=slider_backimage.value="";

                                    slider_load(e);
                                }
                                //get on click add new slider item end


                                //load all silders function start
                                function slider_load(e){
                                    var silder_input=window.document.getElementById("silder_input");
                                    var silder_input_js=JSON.parse(silder_input.value);
                                    var silder_table_content=window.document.getElementById("silder_table_content");
                                    var slider_backimage=window.document.getElementById("slider_backimage");

                                    silder_table_content.innerHTML="";

                                    for(var i=0;i<silder_input_js.length;i++)
                                    {
                                        silder_table_content.innerHTML+="<tr><td><a href='"+silder_input_js[i].address+"'><i class='mdi mdi-image'/></a></td><td><a href='"+silder_input_js[i].link+"'><i class='mdi mdi-link'/></a></td><td>"+silder_input_js[i].text+"</td><td><a href='"+silder_input_js[i].backimg+"'><i class='mdi mdi-image'/></a></td><td><btn style='color: #F00;cursor: pointer;' onclick='get_remove_slider("+i+")'>-</btn></td></tr>";
                                    }
                                }

                                function slider_load(){
                                    var silder_input=window.document.getElementById("silder_input");
                                    var silder_input_js=JSON.parse(silder_input.value);
                                    var silder_table_content=window.document.getElementById("silder_table_content");

                                    silder_table_content.innerHTML="";

                                    for(var i=0;i<silder_input_js.length;i++)
                                    {
                                        silder_table_content.innerHTML+="<tr><td><a href='"+silder_input_js[i].address+"'><i class='mdi mdi-image'/></a></td><td><a href='"+silder_input_js[i].link+"'><i class='mdi mdi-link'/></a></td><td>"+silder_input_js[i].text+"</td><td><a href='"+silder_input_js[i].backimg+"'><i class='mdi mdi-image'/></a></td><td><btn style='color: #F00;cursor: pointer;' onclick='get_remove_slider("+i+")'>-</btn></td></tr>";
                                    }
                                }
                                //load all silders function end


                                //get remove slider item start
                                function get_remove_slider(index)
                                {
                                    var silder_input=window.document.getElementById("silder_input");
                                    var silder_input_js = JSON.parse(silder_input.value);

                                    if(silder_input_js.length>1)
                                    {
                                        delete silder_input_js[index];

                                        var result = JSON.stringify(silder_input_js);
                                        result = result.replaceAll(",null", "");
                                        result = result.replaceAll("null,", "");
                                        result = result.replaceAll(",null,", ",");

                                        silder_input.value = result;

                                        slider_load();
                                    }
                                    else
                                    {
                                        alert("حداقل باید یک آیتم فعال باشد");
                                    }

                                }
                                //get remove slider item end


                            </script>
                            <!--Slider end-->


                            <br>
                            <br>

                            <!--Banner start-->
                            <div>
                                <div class="form-group">
                                    <label for="exampleInputUsername1">{{__('all_strings.newbanner')}}</label>
                                    <div style="display: flex;">
                                        <input type="text" style="margin: 5px" class="form-control" id="banner_imageaddress" placeholder="{{__('all_strings.imageaddress')}}">
                                        <input type="text" style="margin: 5px" class="form-control" id="banner_imagelink" placeholder="{{__('all_strings.btn_link')}}">
                                        <btn onclick="AddNewBanner(this)" style="margin : 7px;height: 40px;" class="btn btn-gradient-primary mr-2">+</btn>
                                    </div>
                                </div>
                                <input value="{{json_encode($parametrs->banners)}}" name="banner" type="hidden" style="margin: 5px" class="form-control" id="banner_input" placeholder="{{__('all_strings.imageaddress')}}" value="[]">
                                <div class="form-group">
                                    <label for="exampleInputUsername1">{{__('all_strings.banner')}}</label>

                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th>{{__('all_strings.imageaddress')}}</th>
                                            <th>{{__('all_strings.btn_link')}}</th>
                                            <th>{{__('all_strings.event')}}</th>
                                        </tr>
                                        </thead>
                                        <tbody id="banner_table_content">

                                        </tbody>
                                    </table>

                                </div>
                            </div>
                            <script>


                                //load event start
                                window.addEventListener('load',function (e) {

                                    //get load slider
                                    banner_load(e);

                                });
                                //load event end


                                //get on click add new slider item start
                                function AddNewBanner(e){
                                    var banner_input=window.document.getElementById("banner_input");
                                    var banner_imagelink=window.document.getElementById("banner_imagelink");
                                    var banner_imageaddress=window.document.getElementById("banner_imageaddress");

                                    var banner_input_json=JSON.parse(banner_input.value);

                                    var n_js={"address":banner_imageaddress.value,"link":banner_imagelink.value};
                                    banner_input_json.push(n_js);

                                    banner_input.value=JSON.stringify(banner_input_json);

                                    banner_imageaddress.value=banner_imagelink.value="";

                                    banner_load(e);
                                }
                                //get on click add new slider item end


                                //load all silders function start
                                function banner_load(e){
                                    var banner_input=window.document.getElementById("banner_input");
                                    var banner_input_js=JSON.parse(banner_input.value);
                                    var banner_table_content=window.document.getElementById("banner_table_content");

                                    banner_table_content.innerHTML="";

                                    for(var i=0;i<banner_input_js.length;i++)
                                    {
                                        banner_table_content.innerHTML+="<tr><td><a href='"+banner_input_js[i].address+"'><i class='mdi mdi-image'/></a></td><td><a href='"+banner_input_js[i].link+"'><i class='mdi mdi-link'/></a></td><td><btn style='color: #F00;cursor: pointer;' onclick='get_remove_banner("+i+")'>-</btn></td></tr>";
                                    }
                                }

                                function banner_load(){
                                    var banner_input=window.document.getElementById("banner_input");
                                    var banner_input_js=JSON.parse(banner_input.value);
                                    var banner_table_content=window.document.getElementById("banner_table_content");

                                    banner_table_content.innerHTML="";

                                    for(var i=0;i<banner_input_js.length;i++)
                                    {
                                        banner_table_content.innerHTML+="<tr><td><a href='"+banner_input_js[i].address+"'><i class='mdi mdi-image'/></a></td><td><a href='"+banner_input_js[i].link+"'><i class='mdi mdi-link'/></a></td><td><btn style='color: #F00;cursor: pointer;' onclick='get_remove_banner("+i+")'>-</btn></td></tr>";
                                    }
                                }
                                //load all silders function end


                                //get remove slider item start
                                function get_remove_banner(index)
                                {
                                    var banner_input=window.document.getElementById("banner_input");
                                    var banner_input_js=JSON.parse(banner_input.value);

                                    if(banner_input_js.length>1)
                                    {
                                        delete banner_input_js[index];

                                        var result = JSON.stringify(banner_input_js);
                                        result = result.replaceAll(",null", "");
                                        result = result.replaceAll("null,", "");
                                        result = result.replaceAll(",null,", ",");

                                        banner_input.value = result;

                                        banner_load();
                                    }
                                    else
                                    {
                                        alert("حداقل باید یک آیتم فعال باشد");
                                    }

                                }
                                //get remove slider item end


                            </script>
                            <!--Banner end-->


                            <br>
                            <br>

                            <div class="form-group" style="display: none;">
                                <textarea style="direction:ltr;resize:vertical;height:250px;" class="form-control" id="exampleInputUsername1" name="Config">{{$Setting->parametrs}}</textarea>
                            </div>
                            <button style="width: 100%;" type="submit" class="btn btn-gradient-primary mr-2">{{__('all_strings.done')}}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Send Notification To User End-->







@include('Admin.Panel.Layouts.Footer_Panel')
