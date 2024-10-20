<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\File;
use App\Models\Hospital;
use App\Models\Notification;
use App\Models\post;
use App\Models\pricePackage;
use App\Models\Setting;
use App\Models\userVerify;
use App\Models\userType;
use App\Models\view_tbl;
use App\Models\visit;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use App\Models\report_tbl;
use App\Models\reportDetail;
use App\Models\themes_tbl;
use App\Models\Chat;

class ApiV1Controller extends Controller
{

    //Config Start
    function Config(Request $request)
    {
        return response(setting::orderBy('id','desc')->get()[0]->parametrs)->header('Content-Type', 'text/json');
    }
    //Config End


    function AllHospitals(Request $request)
    {
        return Hospital::where('status','1')->get();
    }


    //Login Function Start
    function Login(Request $request)
    {
        $users=User::where('phone',$request->phone)->where('user_type','USER')->first();
        $code=rand(1000,9999);
        $v_code=hash('sha256',$code);

        //send sms start
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,"https://api.msgway.com/send");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch, CURLOPT_POST,1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,'{
            "mobile": "'.$request->phone.'",
            "method": "sms",
            "templateID": 4656,
            "code":"'.$code.'"
        }');
        curl_setopt($ch, CURLOPT_HTTPHEADER,["apiKey:750fe4ce157f69c6d3ff6d2a0bba14c6"]);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $server_output = curl_exec($ch);
        curl_close($ch);
        //send sms end

        //Sms Send Code
        //file_put_contents('./log.log', $code."\n", FILE_APPEND);


        if($users==null)
        {
            $user = new User();
            $user->username="USR".date('Y-m-d h:i:sa');
            $user->email="";
            $user->phone=$request->phone;
            $user->status="1";
            $user->date_time=date('Y-m-d h:i:sa');
            $user->website="";
            $user->times="";
            $user->google_auth="";
            $user->name="";
            $user->family="";
            $user->bio="";
            $user->city_id=2;
            $user->address="";
            $user->lat="";
            $user->lng="";
            $user->b_date="";
            $user->sex="man";
            $user->user_type="USER";
            $user->password="Password";
            $user->login_token = hash('sha256', "USR" . $request->phone . "CODE" . date('Y-m-d h:i:sa'));
            $user->profile_image_file_id=1;
            $user->save();

            $users=User::where('phone',$request->phone)->where('user_type','USER')->first();
            $user_verify=new userVerify();
            $user_verify->hash_code=$v_code;
            $user_verify->user_id=$users->id;
            $user_verify->save();
        }
        else
        {
            $users=User::where('phone',$request->phone)->where('user_type','USER')->first();
            $user_verify=new userVerify();
            $user_verify->hash_code=$v_code;
            $user_verify->user_id=$users->id;
            $user_verify->save();
        }

        return array("status"=>"success","Phone"=>$request->phone);
    }
    //Login Function End


    //Verify Function Start
    function Verify(Request $request)
    {

        $user=User::where('phone',$request->phone)->where("user_type","USER")->first();

        if($user!=null)
        {
            $verify_code = userVerify::where('hash_code', hash('sha256', $request->code))->where('user_id', $user->id)->first();

            if ($verify_code != null)
            {
                $all_verify_code = userVerify::where('user_id', $user->id)->get();
                for ($i=0;$i<count($all_verify_code);$i++)
                {
                    $all_verify_code[$i]->delete();
                }

                return array("status" => "success","Login"=>$user->login_token);
            }
            else
            {
                return array("status" => "fail");
            }
        }
        else
        {
            return array("status" => "user_not_found");
        }
    }
    //Verify Function End


    //User Notifications Start
    function Notifications(Request $request)
    {
        $user=User::where('login_token',$request->header('auth'))->first();
        $notifications=Notification::where('user_id',$user->id)->get();
        Notification::where('user_id',$user->id)->update(array("seen"=>true));
        return $notifications;
    }
    //User Notifications End


    //Get All doctor by city start
    function GetCityAllDoctors(Request $request)
    {
        $city=City::where('name',$request->city)->where('area','!=',0)->where('status','1')->first();
        $doctors=User::join('files','users.profile_image_file_id','=','files.id')->join('user_types','users.user_type','=','user_types.en_title')->where('user_type','!=','USER')->where('user_type','!=','ADMIN')->where('city_id',$city->id)->where('status','1')->get();

        $reponse=array();
        foreach ($doctors as $doctor)
        {
            array_push($reponse,array(
                'id' => $doctor->id,
                'username' => $doctor->username,
                'name' => $doctor->name,
                'family' => $doctor->family,
                'user_type' => $doctor->title,
                'city' => $request->city,
                'lat' => $doctor->lat,
                'bio' => $doctor->bio,
                'times' => $doctor->times,
                'lng' => $doctor->lng,
                'avatar' => $doctor->file_hash,
            ));
        }

        return $reponse;
    }
    //Get All doctor by city end


    //Get All doctor by city start
    function GetSearchDoctor(Request $request)
    {
        $doctors=User::join('files','users.profile_image_file_id','=','files.id')->join('user_types','users.user_type','=','user_types.en_title')->where('user_type','!=','USER')->where('user_type','!=','ADMIN')->where('status','1')->where('name','LIKE','%'.$request->search.'%')->orwhere('family','LIKE','%'.$request->search.'%')->get();

        $reponse=array();
        foreach ($doctors as $doctor)
        {
            array_push($reponse,array(
                'id' => $doctor->id,
                'username' => $doctor->username,
                'name' => $doctor->name,
                'family' => $doctor->family,
                'user_type' => $doctor->title,
                'city' => City::where('id',$doctor->city_id)->first()->name,
                'lat' => $doctor->lat,
                'bio' => $doctor->bio,
                'times' => $doctor->times,
                'lng' => $doctor->lng,
                'avatar' => $doctor->file_hash,
            ));
        }

        return $reponse;
    }
    //Get All doctor by city end


    //Get user start
    function User(Request $request)
    {
        return $user=User::where('login_token',$request->header('auth'))->first();
    }

    function UserDone(Request $request)
    {
        $user=User::where('login_token',$request->header('auth'))->first();

        $user->name=$request->name;
        $user->family=$request->family;
        $user->email=$request->email;
        $user->sex=$request->sex;
        $user->b_date=$request->date;
        $user->save();

        return array("status"=>"success");
    }

    function GetCountofNotifications(Request $request)
    {
        $user=User::where('login_token',$request->header('auth'))->first();
        return array("count"=>count(Notification::where('seen',false)->where('user_id',$user->id)->get()));
    }
    //Get user end


    //Get All hospitals by city start
    function GetCityAllHospitals(Request $request)
    {
        $city=City::where('name',$request->city)->where('area','!=',0)->where('status','1')->first();
        $hospitals=Hospital::join('hospital_img_tbls','Hospital.id','=','hospital_img_tbls.hospital_id')->join('files','hospital_img_tbls.file_id','=','files.id')->where('status','1')->where('city_id',$city->id)->get();

        $reponse=array();
        foreach ($hospitals as $hospital)
        {
            array_push($reponse,array(
                'id' => $hospital->id,
                'username' => "",
                'name' => $hospital->name,
                'family' => "",
                'user_type' => "بیمارستان/درمانگاه",
                'city' => $request->city,
                'lat' => $hospital->lat,
                'bio' => $hospital->bio,
                'times' => json_encode(array("start"=>$hospital->start_time,"end"=>$hospital->end_time,'t_d'=>null)),
                'lng' => $hospital->lng,
                'avatar' => $hospital->file_hash,
            ));
        }

        return $reponse;
    }
    //Get All hospitals by city end


    //Get visite check start
    function GetCheckVisite(Request $request)
    {
        $result=visit::where('doctor_id',$request->doctor_id)->where('type',"DOCTOR")->where('status','!=','2')->where('date',$request->date)->get();
        return $result;
    }
    //Get visite check end


    //Get hospital visite check start
    function GetCheckHospitalVisite(Request $request)
    {
        $result=visit::where('doctor_id',$request->doctor_id)->where('type',"HOSPITAL")->where('status','!=','2')->where('date',$request->date)->get();
        return $result;
    }
    //Get hospital visite check end


    //Get payment doctor start
    function GetPaymentDoctorTime(Request $request)
    {
//        $user=User::where('login_token',$request->auth)->where('user_type','USER')->where('status','1')->first();
//        $dcotor=User::where('id',$request->doctor_id)->first();
//        $dat=$request->date;
//        $time=$request->time;

        return "<p>Click me</p>";
    }
    //Get payment doctor end


    //Set new doctor time start
    function SetDoctorTime(Request $request)
    {
        $user=User::where('login_token',$request->header('auth'))->where('user_type','USER')->where('status','1')->first();
        $dcotor=User::where('id',$request->doctor_id)->first();

        $visite=new visit();
        $visite->status="0";
        $visite->date=$request->date;
        $visite->time=$request->time;
        $visite->user_id=$user->id;
        $visite->doctor_id=$request->doctor_id;
        $visite->type="DOCTOR";
        $visite->save();

        $notif=new Notification();
        $notif->title="ثبت رزرو";
        $notif->content="دکتر ".$dcotor->name." ".$dcotor->family." برای شما در تاریخ ".$request->date." و ساعت ".$request->time." رزرو شد."."\n\n"."شماره پیگیری : ".$visite->id;
        $notif->link="-";
        $notif->from="ماماجی";
        $notif->seen=false;
        $notif->date=date('Y-m-d h:i:sa');
        $notif->user_id=$user->id;
        $notif->save();

        //send sms start
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,"https://api.msgway.com/send");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch, CURLOPT_POST,1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,'{
            "mobile": "'.$user->phone.'",
            "method": "sms",
            "templateID": 4665,
            "params":["'.$dcotor->name.' '.$dcotor->family.'","'.$request->date.' '.$request->time.'"],
            "code":"'.$visite->id.'"
        }');
        curl_setopt($ch, CURLOPT_HTTPHEADER,["apiKey:750fe4ce157f69c6d3ff6d2a0bba14c6"]);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $server_output = curl_exec($ch);
        curl_close($ch);
        //send sms end

        return "OK";
    }
    //Set new doctor time end


    //Set new hospital time start
    function SetHospitalTime(Request $request)
    {
        $user=User::where('login_token',$request->header('auth'))->where('user_type','USER')->where('status','1')->first();

        $visite=new visit();
        $visite->status="0";
        $visite->date=$request->date;
        $visite->time=$request->time;
        $visite->user_id=$user->id;
        $visite->doctor_id=$request->doctor_id;
        $visite->type="HOSPITAL";
        $visite->save();
        return array("status"=>"success","code"=>$visite->id);
    }
    //Set new hospital time end


    //Get all free posts start
    function GetAllFreePosts(Request $request)
    {
        $category=Category::where('price','0')->orwhere('price',null)->orwhere('price','')->first();
        $posts=post::where('category_id',$category->id)->where('Post.visible','1')->where('Post.delete_flag','0')->where('Post.type','TEXT')->get();
        $result=array();
        foreach ($posts as $post)
        {
            array_push($result,array(
                "id"=>$post->id,
                "title"=>$post->title,
                "content"=>$post->content,
                "date"=>$post->date
            ));
        }
        return $result;
    }
    //Get all free posts end


    //Get all categories and sounds free start
    function GetAllFreeSoundusers(Request $request)
    {
        $result=array();
        $all_categories=Category::where('visible','1')->where('delete_flag','0')->where('price','0')->get();

        foreach ($all_categories as $category)
        {
            $posts=post::where('type','SOUND')->where('delete_flag','0')->where('visible','1')->where('category_id',$category->id)->get();

            if(count($posts)>0)
            {
                $user=User::where('id',$category->user_id)->first();
                $avatar_=File::where('id',$user->profile_image_file_id)->first();

                $avatar="";
                if($avatar_!=null)
                {
                    $avatar=$avatar_->file_hash;
                }

                $user_type=userType::where('en_title',$user->user_type)->first();

                if($user_type!=null)
                {
                    array_push($result,array(
                        "id"=>$category->id,
                        "title"=>$category->title,
                        "user_name"=>$user->name,
                        "user_family"=>$user->family,
                        "user_type"=>$user_type->title,
                        "count"=>count($posts),
                        "avatar"=>$avatar,
                    ));
                }
                else
                {
                    array_push($result,array(
                        "id"=>$category->id,
                        "title"=>$category->title,
                        "user_name"=>$user->name,
                        "user_family"=>$user->family,
                        "user_type"=>"مدیرکل",
                        "count"=>count($posts),
                        "avatar"=>$avatar,
                    ));
                }
            }
        }

        return $result;
    }
    //Get all categories and sounds free end


    //Get all sound post by category start
    function GetAllSoundsPostByCategory(Request $request)
    {
        $post=post::join('files','Post.file_id','=','files.id')->where('category_id',$request->category_id)->where('visible','1')->where('delete_flag','0')->where('type','SOUND')->get();
        return $post;
    }
    //Get all sound post by category end


    //Get all categories and sounds free start
    function GetAllPackageSoundusers(Request $request)
    {
        $result=array();
        $all_categories=Category::where('visible','1')->where('delete_flag','0')->where('price','!=','0')->get();

        foreach ($all_categories as $category)
        {
            $posts=post::where('type','SOUND')->where('delete_flag','0')->where('visible','1')->where('category_id',$category->id)->get();

            if(count($posts)>0)
            {
                $user=User::where('id',$category->user_id)->first();
                $avatar_=File::where('id',$user->profile_image_file_id)->first();

                $avatar="";
                if($avatar_!=null)
                {
                    $avatar=$avatar_->file_hash;
                }

                $user_type=userType::where('en_title',$user->user_type)->first();

                if($user_type!=null)
                {
                    array_push($result,array(
                        "id"=>$category->id,
                        "title"=>$category->title,
                        "user_name"=>$user->name,
                        "user_family"=>$user->family,
                        "user_type"=>$user_type->title,
                        "count"=>count($posts),
                        "avatar"=>$avatar,
                    ));
                }
                else
                {
                    array_push($result,array(
                        "id"=>$category->id,
                        "title"=>$category->title,
                        "user_name"=>$user->name,
                        "user_family"=>$user->family,
                        "user_type"=>"مدیرکل",
                        "count"=>count($posts),
                        "avatar"=>$avatar,
                    ));
                }
            }
        }

        return $result;
    }
    //Get all categories and sounds free end


    //Get package info start
    function GetPackageInfo(Request $request)
    {
        $user=User::where('login_token',$request->header('auth'))->first();
        $category=Category::where('id',$request->Pack_Id)->first();
        $doctor=User::where('id',$category->user_id)->first();
        $doctor_type="";
        if($doctor->user_type=="ADMIN")
        {
            $doctor_type="مدیر کل";
        }
        else
        {
            $doctor_type=userType::where('en_title',$doctor->user_type)->first()->title;
        }
        $posts=post::where('visible','1')->where('delete_flag','0')->where('type','SOUND')->where('category_id',$category->id)->get();
        $check_price=pricePackage::where('user_id',$user->id)->where('category_id',$category->id)->get();
        $avatar=File::where('id',$doctor->profile_image_file_id)->first()->file_hash;

        return array(
            "id"=>$category->id,
            "doc_name"=>$doctor->family,
            "doc_family"=>$doctor->name,
            "doc_type"=>$doctor_type,
            "doc_avatar"=>$avatar,
            "bio"=>$category->bio,
            "video"=>$category->video,
            "price"=>$category->price,
            "count"=>count($posts),
            "price_status"=>count($check_price),
        );
    }
    //Get package info end


    //Get All chats start
    function GetAllChats(Request $request)
    {
        $user=User::where('login_token',$request->header('auth'))->first();
        return Chat::where('user_id',$user->id)->where('doctor_id',$request->doctor_id)->get();
    }
    //Get All chats end


    //Get add new chat start
    function AddNewChat(Request $request)
    {
        $user=User::where('login_token',$request->header('auth'))->first();

        $chat=new chat();
        $chat->content=$request->contentt;
        $chat->date=date('Y-m-d h:i:sa');
        $chat->user_id=$user->id;
        $chat->doctor_id=$request->doctor_id;
        $chat->save();

        return array("status"=>"success");
    }
    //Get add new chat end


    //Logout Function Start
    function Logout(Request $request)
    {
        $user=User::where('login_token',$request->header('auth'))->first();
        $user->login_token=hash('sha256', "USR" . $user->login_token);
        $user->save();
    }
    //Logout Function Start

}
