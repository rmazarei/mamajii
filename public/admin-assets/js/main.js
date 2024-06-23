//Browser Dialog Start
function Open_Link_Dialog(e,address)
{
    var Dialog=window.document.getElementById("iframe_dialog");
    var Iframe=window.document.getElementById("iframe_dialog_main_content_iframe");
    Dialog.style.display="flex";
    Iframe.src=address;
}

function Close_Ifram_Dialog(e)
{
    var Dialog=window.document.getElementById("iframe_dialog");
    Dialog.style.display="none";

    window.location.reload();
}
//Browser Dialog End





//Get Seen Notification Start
function Get_Seen_All_Notificatio(e)
{
    var XML=new XMLHttpRequest();
    XML.open("GET","/Admin/NotificationSeen");
    XML.send();
}
//Get Seen Notification End





//Get Add View To Theme Start
function add_view_video_theme_item(e)
{
    var input_title=window.document.getElementById("input_title");
    var input_len=window.document.getElementById("input_len");
    var input_type=window.document.getElementById("input_type");
    var input_name=window.document.getElementById("input_name");
    var video_theme_json_input=window.document.getElementById("video_theme_json_input");
    var theme_json_table=window.document.getElementsByClassName("theme_json_table")[window.document.getElementsByClassName("theme_json_table").length-1];
    var js=JSON.parse(video_theme_json_input.value);


    if(input_title.value!="" && input_len.value!="" && input_type.value!="" && input_name.value!="")
    {

        if(input_type.value=='txt')
        {
            js[js.length - 1].push({
                "type": input_type.value,
                "len": input_len.value,
                "name": input_name.value,
                "placeholder": input_title.value
            });
        }
        else if(input_type.value=='image')
        {
            js[js.length - 1].push({
                "type": input_type.value,
                "size": input_len.value,
                "name": input_name.value,
                "placeholder": input_title.value
            });
        }

        theme_json_table.innerHTML = "";

        var all_json=js[js.length-1];
        for (var i = 0; i < all_json.length; i++)
        {
            if(all_json[i].type=='txt')
            {
                theme_json_table.innerHTML += "<tr><td>" + all_json[i].placeholder + "</td><td>" + all_json[i].type + "</td><td>" + all_json[i].name + "</td><td>" + all_json[i].len + "</td></tr>";
            }
            else if(all_json[i].type=='image')
            {
                theme_json_table.innerHTML += "<tr><td>" + all_json[i].placeholder + "</td><td>" + all_json[i].type + "</td><td>" + all_json[i].name + "</td><td>" + all_json[i].size + "</td></tr>";
            }
        }

        input_title.value = "";
        input_len.value = "";
        input_type.value = "txt";
        input_name.value = "";
        video_theme_json_input.value = JSON.stringify(js);
    }
}
//Get Add View To Theme End




//Get Create a Sequence Start
function OnClick_Create_New_Sequence(e)
{
    var Sequence_Tbl=window.document.getElementById('sequence_bar');
    var sequence_json_maker=window.document.getElementById('sequence_json_maker');
    var video_theme_json_input=window.document.getElementById("video_theme_json_input");

    Sequence_Tbl.innerHTML+="<div class=\"col-lg-12 grid-margin stretch-card\"><div class=\"card\"><div class=\"card-body\"><table class=\"table\"><thead><tr><th>عنوان</th><th>نوع</th><th>نام</th><th>مقدار-سایز</th></tr></thead><tbody class=\"theme_json_table\"></tbody></table></div></div></div>";
    sequence_json_maker.style.display="block";

    var json=JSON.parse(video_theme_json_input.value);
    json.push([]);
    video_theme_json_input.value=JSON.stringify(json);
}
//Get Create a Sequence End




//Get Chosee Json File in Create Theme Start
function On_Chnage_Json_File(e)
{
    var video_theme_json_input=window.document.getElementById('video_theme_json_input');
    var json_file_chooser=window.document.getElementById('json_file_chooser');
    var file_reder=new FileReader();
    file_reder.onload=function(){
        video_theme_json_input.value=this.result;
    };
    file_reder.readAsText(json_file_chooser.files[0]);
}
//Get Chosee Json File in Create Theme End
