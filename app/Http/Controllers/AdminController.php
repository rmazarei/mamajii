<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\File;
use App\Models\HospitalImg;
use App\Models\Hospital;
use App\Models\Notification;
use App\Models\Post;
use App\Models\Setting;
use App\Models\store;
use App\Models\taxi_request_tbl;
use App\Models\Transcation;
use App\Models\User;
use App\Models\UserType;
use App\Models\view_tbl;
use App\Models\Visit;
//use Facade\FlareClient\Stacktrace\File;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use App\Models\video_tbl;
use App\Models\report;
use App\Models\reportDetail;
use App\Models\themes_tbl;
use App\Models\Chat;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use League\Flysystem\Exception;
use Illuminate\Support\Facades\App;
use ParagonIE\ConstantTime\Base32;
use PragmaRX\Google2FA\Google2FA;
use PragmaRX\Google2FALaravel\Support\Authenticator;

use Illuminate\Support\Facades\Log;

//Admin Controller Start
class AdminController extends Controller
{

    //******************Get Login Function Start
    function login()
    {
        //Get Check Session Is Empty Or Fail
        if(Auth::user())
        {
            return redirect(url("/Admin/Dashboard"));
        }

        return view('Admin/Panel/login');
    }

    function loginTo(Request $request)
    {
        $password=hash('sha256',$request->password);
        $password = password_hash($request->password, PASSWORD_BCRYPT);
        $user=User::where('username',$request->username)->where('password','$2y$10$yd2OhVyftKdaahzE5orp8Oclkf2eZT/O7Z.xCkRTjP.rF4GbFv2PK')->where('user_type','!=','USER')->where('status','1')->get();
//        dd($request->username, $password, $user);
        if(count($user)>0)
        {
            if($user[0]->google_auth!="")
            {
                $request->session()->put('login_token',$user[0]->login_token);
                return redirect("/Admin/Login2F");
            }
            else
            {
                Auth::login($user[0]);
            }
            return redirect(url('Admin/dashboard'));
        }
        else
        {
            return redirect(url('Admin/Login'));
        }
    }

    function Login2F(Request $request)
    {
        return view('Admin/Panel/login2F');
    }

    function Login2F_Done(Request $request)
    {
        $token = $request->session()->get('login_token');
        $user = User::where("login_token", $token)->where('user_type', 'ADMIN')->orwhere('user_type', 'ADMINSERVICE')->where('status', '1')->get();
        $otp=$request->post("google_auth_code");
        $google2fa = app('pragmarx.google2fa');
        $r=new Google2FA();

        $secret=Crypt::decrypt($user[0]->google_auth);
        $code=$r->getCurrentOtp($secret);

        if ($code==$otp)
        {
            if ($request->session()->has('login_token'))
            {
                if (count($user))
                {
                    $request->session()->forget('login_token');
                    Auth::login($user[0]);
                    return redirect("/Admin/Dashboard");
                }
                else
                {
                    $request->session()->forget('login_token');
                    return redirect("/Admin/Login");
                }
            }
            else
            {
                $request->session()->forget('login_token');
                return redirect("/Admin/Login");
            }
        }
        else
        {
            $request->session()->forget('login_token');
            return redirect("/Admin/Login");
        }
    }
    //******************Get Login Function End




    //******************Get Login Function Start
    function dashboard(Request $request)
    {
        return view('Admin/Panel/dashboard');
    }
    //******************Get Login Function End




    //**********************Get Settings Start

    //Get Settings
    function Settings(Request $request)
    {
        $settings=setting::orderBy('id','desc')->first();
        return view('Admin/Panel/settings')->with('Setting',$settings);
    }

    //Get Settings
    function Settings_Update(Request $request)
    {

        $result=[
            "logo"=>$request->icon,
            "law"=>$request->law,
            "sliders"=>json_decode($request->slider,true),
            "banners"=>json_decode($request->banner,true),
        ];

        $config=new setting();
        //$config->parametrs=$request->Config;
        $config->parametrs=json_encode($result);
        $config->discountall="";
        $config->save();
        return redirect()->back();
    }

    //**********************Get Settings End




    //******************Done Function Start
    function Done()
    {
        return view('Admin/Panel/done');
    }
    //******************Done Function End




    //******************Notification Seen Start
    function NotificationSeen(Request $request)
    {
        $output=["Action"=>"OK"];
        $USER_NOTIFICATIONS=Notification::join('Users','notifications.user_id','=','Users.id')->update(array("seen"=>true));
        return json_encode($output);
    }
    //******************Notification Seen End




    //******************Visite Start

    function Visite(Request $request)
    {
        return view('Admin/Panel/allvisites');
    }

    function VisiteSearch(Request $request)
    {
        $visite=visit::where('id',$request->search)->first();
        $visite_user=User::where('id',$visite->user_id)->first();
        return view('Admin/Panel/visite')->with('visite',$visite)->with('visite_user',$visite_user);
    }

    function VisiteDone(Request $request)
    {
        $visite=visit::where('id',$request->id)->first();
        $visite->status="1";
        $visite->save();

        $notif=new Notification();
        $notif->title="ویزیت";
        $notif->content="کاربر گرامی ویزیت شما با موفقیت به پایان خود رسید";
        $notif->link="-";
        $notif->from="ماماجی";
        $notif->date=date('Y-m-d h:i:sa');
        $notif->seen=false;
        $notif->user_id=$visite->user_id;
        $notif->save();

        return redirect("/Admin/Visite/Search");
    }

    function VisiteCancel(Request $request)
    {
        $visite=visit::where('id',$request->id)->first();
        $visite->status="2";
        $visite->save();

        $notif=new Notification();
        $notif->title="کنسل شدن ویزیت";
        $notif->content="وقت ویزیت با شماره پیگیری ".$visite->id." برای شما از طرف ماماجی لغو شد";
        $notif->link="-";
        $notif->from="ماماجی";
        $notif->date=date('Y-m-d h:i:sa');
        $notif->seen=false;
        $notif->user_id=$visite->user_id;
        $notif->save();

        $user=User::where('id',$visite->user_id)->first();

        //send sms start
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,"https://api.msgway.com/send");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch, CURLOPT_POST,1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,'{
            "mobile": "'.$user->phone.'",
            "method": "sms",
            "templateID": 4882,
            "params":["'.$visite->id.'"],
            "code":"'.$visite->id.'"
        }');
        curl_setopt($ch, CURLOPT_HTTPHEADER,["apiKey:750fe4ce157f69c6d3ff6d2a0bba14c6"]);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $server_output = curl_exec($ch);
        curl_close($ch);
        //send sms end

        return redirect("/Admin/Visite/Search");
    }

    //******************Visite End




    //******************Logout Function Start
    function Logout(Request $request)
    {
        $us=Auth::user();
        $user=User::where('id',$us->id)->get()[0];
        $user->login_token=hash('sha256',$user->login_token);
        $user->save();

        Auth::logout();
        return redirect(url("/Admin/Dashboard"));
    }
    //******************Logout Function End






    //******************Categories Function Start

    function categories(Request $request)
    {
        if(Auth::user()->user_type=="ADMIN")
        {
            $categories = Category::where('delete_flag', '0')->get();
        }
        else
        {
            $categories = Category::where('delete_flag', '0')->where('user_id',Auth::user()->id)->get();
        }

        if(isset($request->id))
        {
            $edit_cat = Category::where('id', $request->id)->first();
            return view('Admin/Panel/categories')->with('categories',$categories)->with('edit_cat',$edit_cat);
        }

        return view('Admin/Panel/categories')->with('categories',$categories);
    }


    function Categories_New_Update(Request $request)
    {

        if($request->has('id'))
        {
            $category = Category::where('id', $request->id)->first();
            $category->title = $request->post('title');
            $category->price = $request->post('price');
            $category->bio = $request->post('bio');
            $category->video = $request->post('video');
            $category->root_cat_id = $request->post('root');
            $category->datetime = date("Y-m-d h:i:sa");
            if($request->has('iconaddress') && $request->post('iconaddress')!="")
            {
                $category->icon_address = $request->post('iconaddress');
            }
            else
            {
                $category->icon_address = "";
            }
            if($request->has('ca_link') && $request->post('ca_link')!="")
            {
                $category->castom_link = $request->post('ca_link');
            }
            else
            {
                $category->castom_link = "";
            }
            $category->visible = $request->post('visible');
            $category->delete_flag = "0";
            $category->save();
        }
        else
        {
            $category = new category();
            $category->user_id = Auth::user()->id;
            $category->price = $request->post('price');
            $category->title = $request->post('title');
            $category->bio = $request->post('bio');
            $category->video = $request->post('video');
            $category->root_cat_id = $request->post('root');
            $category->datetime = date("Y-m-d h:i:sa");
            if($request->has('iconaddress') && $request->post('iconaddress')!="")
            {
                $category->icon_address = $request->post('iconaddress');
            }
            else
            {
                $category->icon_address = "";
            }
            if($request->has('ca_link') && $request->post('ca_link')!="")
            {
                $category->castom_link = $request->post('ca_link');
            }
            else
            {
                $category->castom_link = "";
            }
            $category->visible = $request->post('visible');
            $category->delete_flag = "0";
            $category->save();
        }

        return redirect()->back();
    }

    function Categories_Remove(Request $request)
    {
        $categories=Category::where('id',$request->id)->first();
        $categories->delete_flag = "1";
        $categories->save();
        return redirect()->back();
    }

    //******************Categories Function End





    //******************New Post Function Start

    function NewPost(Request $request)
    {
        $categories=Category::where('delete_flag','0')->get();
        return view('Admin/Panel/newpost')->with('categories',$categories);
    }


    function NewSoundPost(Request $request)
    {
        $categories=Category::where('delete_flag','0')->get();
        return view('Admin/Panel/newsoundpost')->with('categories',$categories);
    }


    function NewPostDone(Request $request)
    {
        $usr=Auth::user();

        $post=new Post();
        $post->title=$request->title;
        $post->content=$request->cntent;
        $post->image=$request->img_adrs;
        $post->date=date("Y-m-d h:i:sa");
        $post->delete_flag="0";
        $post->visible=$request->visible;
        $post->user_id=$usr->id;
        $post->category_id=$request->category;
        $post->type="TEXT";
        $post->file_id=0;
        $post->save();

        return redirect()->back();
    }

    function NewPostSoundDone(Request $request)
    {

        $usr=Auth::user();

        $result_file=0;
        $duration_file="0";
        if($request->hasFile('sound_file'))
        {
            $image=$request->file('sound_file');
            $file_name=hash_file('sha256',$image).".".$image->extension();
            $image->move(base_path()."/FileManager/Temp",$file_name);
            $result_file=$this->FileManager($file_name,"FileManager/Temp/".$file_name,"Sound");

            //Get Duration start
            $audio=new \wapmorgan\Mp3Info\Mp3Info(base_path()."/FileManager/Temp/".$file_name,true);
            $duration_file=$audio->duration;
            //Get Duration end
        }

        $post=new Post();
        $post->title=$request->title;
        $post->content=$duration_file."";
        $post->image=$request->img_adrs;
        $post->date=date("Y-m-d h:i:sa");
        $post->delete_flag="0";
        $post->visible=$request->visible;
        $post->user_id=$usr->id;
        $post->category_id=$request->category;
        $post->type="SOUND";
        $post->file_id=$result_file;
        $post->save();

        return redirect()->back();
    }

    //******************New Post Function End



    //******************Questions Function Start

    function Questions(Request $request)
    {
        $user=Auth::user();

        $questions=Chat::where('doctor_id',$user->id)->orderByDesc('id')->get()->groupBy('user_id');
        return view('Admin/Panel/questions')->with('questions',$questions);
    }

    function QuestionsByUser(Request $request)
    {
        $questions=Chat::where('user_id',$request->user_id)->get();
        return view('Admin/Panel/answerquestion')->with('questions',$questions);
    }

    function QuestionsByUserDone(Request $request)
    {

        $user=Auth::user();

        $chat=new chat();
        $chat->content=$request->answer;
        $chat->date=date('Y-m-d h:i:sa');
        $chat->user_id=$request->user_id;
        $chat->doctor_id=$user->id;
        $chat->save();

        return view('Admin/Panel/done');
    }


    //******************Questions Function end



    //******************All Post Start

    function AllPosts(Request $request)
    {
        $usr=Auth::user();

        if($usr->user_type=="ADMIN")
        {
            $posts = Post::where('delete_flag', '0')->get();
        }
        else
        {
            $posts = Post::where('delete_flag', '0')->where('user_id',$usr->id)->get();
        }

        return view('Admin/Panel/allposts')->with('posts',$posts);
    }

    function all_post_search(Request $request)
    {
        $SearchLike='%'.$request->search.'%';
        $posts=Post::where('delete_flag','0')->where('content','LIKE',$SearchLike)->orwhere('title','LIKE',$SearchLike)->get();
        return view('Admin/Panel/postsearchresult')->with('posts',$posts);
    }

    function RemovePost(Request $request)
    {
        $post=Post::where('id',$request->id)->first();
        $post->delete_flag="1";
        $post->save();
        return redirect()->back();
    }

    function getpost(Request $request)
    {
        $categories=Category::where('delete_flag','0')->get();
        $post=Post::where('id',$request->id)->first();
        return view('Admin/Panel/editpost')->with('post',$post)->with('categories',$categories);
    }

    function update_post_submit(Request $request)
    {
        $post=Post::where('id',$request->id)->first();
        $post->title=$request->title;
        $post->image=$request->img_adrs;
        $post->date=date("Y-m-d h:i:sa");
        $post->delete_flag="0";
        $post->visible=$request->visible;
        $post->category_id=$request->category;

        if($post->type=="TEXT")
        {
            $post->content=$request->cntent;
        }
        else
        {
            $result_file=0;
            if($request->hasFile('sound_file'))
            {
                $image=$request->file('sound_file');
                $file_name=hash_file('sha256',$image).".".$image->extension();
                $image->move(base_path()."/FileManager/Temp",$file_name);
                $result_file=$this->FileManager($file_name,"FileManager/Temp/".$file_name,"Sound");

                //Get Duration start
                $audio=new \wapmorgan\Mp3Info\Mp3Info(base_path()."/FileManager/Temp/".$file_name,true);
                $duration_file=$audio->duration;
                //Get Duration end

                $post->content=$duration_file;
            }

            $post->file_id=$result_file;
        }

        $post->save();

        return redirect()->back();
    }

    //******************All Post End



    //******************Cities Function Start

    //Get List of Cities
    function Get_Cities()
    {
        $all_cities=City::all();
        return view('Admin/Panel/cities')->with('all_cities',$all_cities);
    }

    //Get List of Cities
    function Get_Edit_Cities(Request $request)
    {
        $all_cities=City::all();
        $edit_city=City::where('id',$request->id)->get()[0];
        return view('Admin/Panel/cities')->with('all_cities',$all_cities)->with('edit_city',$edit_city);
    }

    //Get City Edit Submit
    function Get_Submit_Edit_City(Request $request)
    {
        $city=City::where('id',$request->id)->get()[0];
        $city->name=$request->name;
        $city->area=intval($request->area);
        $city->status=$request->status;
        $city->datetime=date("Y-m-d h:i:sa");
        $city->save();

        return redirect('/Admin/Cities');
    }

    //Get Add New City
    function Add_City(Request $request)
    {
        $city=new city_tbl();
        $city->name=$request->name;
        $city->area=intval($request->area);
        $city->status=$request->status;
        $city->datetime=date("Y-m-d h:i:sa");
        $city->save();

        return redirect('/Admin/Cities');
    }

    //******************Cities Function End



    //**********************Get User Manager Start

    //Get Add new user
    function Get_New_User()
    {
        return view('Admin/Panel/new_user');
    }

    function Get_New_User_Done(Request $request)
    {
        $profile_image_id=0;
        if($request->hasFile('profile_image'))
        {
            $image=$request->file('profile_image');
            $file_name=hash_file('sha256',$image).".".$image->extension();
            $image->move(base_path()."/FileManager/Temp",$file_name);
            $result=$this->FileManager($file_name,"FileManager/Temp/".$file_name,"Image");
            $profile_image_id=$result;
        }

        $location=explode(",",$request->location);

        //Get Edit User Data
        $user=new User();
        $user->username=$request->username;
        $user->email=$request->email;
        $user->phone=$request->phone;
        $user->status=$request->status;
        $user->date_time=date('Y-m-d h:i:sa');
        $user->website="";
        $user->times="";
        $user->google_auth="";
        $user->name=$request->name;
        $user->family=$request->family;
        $user->bio=$request->bio;
        $user->city_id=$request->city;
        $user->address=$request->address;
        $user->lat=$location[0];
        $user->lng=$location[1];
        $user->phone=$request->phone;
        $user->b_date="";
        $user->sex="man";
        $user->email = $request->email;
        $user->user_type=$request->user_type;
        $user->password=hash("sha256",$request->password);
        $user->login_token=hash("sha256",$request->password."-".$request->username);

        if($profile_image_id!=0)
            $user->profile_image_file_id=$profile_image_id;


        $user->save();


        return view('Admin/Panel/done');
    }

    //Get User times
    function Get_User_Times(Request $request)
    {
        $user=User::where('id',$request->user_id)->first();

        if($user->times!="")
        {
            $times = json_decode($user->times);

            $start_0 = $times->start_0;
            $end_0 = $times->end_0;
            $sat = $times->sat;

            $start_1 = $times->start_1;
            $end_1 = $times->end_1;
            $sun = $times->sun;

            $start_2 = $times->start_2;
            $end_2 = $times->end_2;
            $mon = $times->mon;

            $start_3 = $times->start_3;
            $end_3 = $times->end_3;
            $tue = $times->tue;

            $start_4 = $times->start_4;
            $end_4 = $times->end_4;
            $wed = $times->wed;

            $start_5 = $times->start_5;
            $end_5 = $times->end_5;
            $thu = $times->thu;

            $start_6 = $times->start_6;
            $end_6 = $times->end_6;
            $fri = $times->fri;

        }
        else
        {
            $start_0 = "00:00";
            $end_0 = "00:00";
            $sat = "off";

            $start_1 = "00:00";
            $end_1 = "00:00";
            $sun = "off";

            $start_2 = "00:00";
            $end_2 = "00:00";
            $mon = "off";

            $start_3 = "00:00";
            $end_3 = "00:00";
            $tue = "off";

            $start_4 = "00:00";
            $end_4 = "00:00";
            $wed = "off";

            $start_5 = "00:00";
            $end_5 = "00:00";
            $thu = "off";

            $start_6 = "00:00";
            $end_6 = "00:00";
            $fri = "off";
        }

        return view('Admin/Panel/times_of_user')->with('user',$user)
            ->with('start_0',$start_0)->with('end_0',$end_0)->with('sat',$sat)
            ->with('start_1',$start_1)->with('end_1',$end_1)->with('sun',$sun)
            ->with('start_2',$start_2)->with('end_2',$end_2)->with('mon',$mon)
            ->with('start_3',$start_3)->with('end_3',$end_3)->with('tue',$tue)
            ->with('start_4',$start_4)->with('end_4',$end_4)->with('wed',$wed)
            ->with('start_5',$start_5)->with('end_5',$end_5)->with('thu',$thu)
            ->with('start_6',$start_6)->with('end_6',$end_6)->with('fri',$fri);
    }

    //Get User times done
    function User_Times_Done(Request $request)
    {

        $tms=array(
            "start_0"=>$request->start_time_0,'end_0'=>$request->end_time_0,'sat'=>$request->satday_time,
            "start_1"=>$request->start_time_1,'end_1'=>$request->end_time_1,'sun'=>$request->sunday_time,
            "start_2"=>$request->start_time_2,'end_2'=>$request->end_time_2,'mon'=>$request->monday_time,
            "start_3"=>$request->start_time_3,'end_3'=>$request->end_time_3,'tue'=>$request->tueday_time,
            "start_4"=>$request->start_time_4,'end_4'=>$request->end_time_4,'wed'=>$request->wedday_time,
            "start_5"=>$request->start_time_5,'end_5'=>$request->end_time_5,'thu'=>$request->thursday_time,
            "start_6"=>$request->start_time_6,'end_6'=>$request->end_time_6,'fri'=>$request->friday_time,
        );

        User::where('id',$request->user_id)->update(array("times"=>json_encode($tms)));
        return view('Admin/Panel/done');
    }

    //Get User Manager
    function Get_User_Manager()
    {
        return view('Admin/Panel/usermanager');
    }

    //Get Send Notification To User
    function Get_Notification_To_User(Request $request)
    {
        return view('Admin/Panel/send_notification_to_user')->with('User_Id',$request->User_Id);
    }

    //Get Old Notification To User
    function Get_Notification_OF_User(Request $request)
    {
        $all_notifications=Notification::join('Users','notifications.user_id','=','Users.id')->where('Users.id',$request->User_Id)->get();
        return view('Admin/Panel/getnotifications')->with('all_notifications',$all_notifications);
    }

    //Get Send Notification To User
    function Get_Send_Notification_To_User(Request $request)
    {
        $notification=new Notification();
        $notification->title=$request->title;
        $notification->content=$request->content_text;
        $notification->link=$request->link;
        $notification->user_id=$request->user_id;
        $notification->date=date('Y-m-d h:i:sa');;
        $notification->from="ADMIN";
        $notification->seen=false;
        $notification->save();
        return redirect(url("/Admin/Done"));
    }

    //Get Edit User
    function Get_Edit_User(Request $request)
    {
        return view('Admin/Panel/edit_user')->with('User',User::where('id',$request->User_Id)->get()[0]);
    }

    //Get Edit User Submit
    function Get_Edit_User_Submit(Request $request)
    {

        $profile_image_id=0;
        if($request->hasFile('profile_image'))
        {
            $image=$request->file('profile_image');
            $file_name=hash_file('sha256',$image).".".$image->extension();
            $image->move(base_path()."/FileManager/Temp",$file_name);
            $result=$this->FileManager($file_name,"FileManager/Temp/".$file_name,"Image");
            $profile_image_id=$result;
        }

        $location=explode(",",$request->location);

        //Get Edit User Data
        $user=User::where('id',$request->user_id)->get()[0];
        $user->username=$request->username;
        $user->email=$request->email;
        $user->phone=$request->phone;
        $user->status=$request->status;
        $user->name=$request->name;
        $user->family=$request->family;
        $user->bio=$request->bio;
        $user->city_id=$request->city;
        $user->address=$request->address;
        $user->lat=$location[0];
        $user->lng=$location[1];

        if($profile_image_id!=0)
            $user->profile_image_file_id=$profile_image_id;

        if($request->phone!="")
        {
            $user->phone=$request->phone;
        }

        if($request->email!="")
        {
            $user->email = $request->email;
        }

        $user->user_type=$request->user_type;

        //Get Chenage Password If Request Password Is Not Empty
        if($request->password!="")
        {
            $user->password=hash("sha256",$request->password);
        }


        $user->save();

        return redirect(url("/Admin/Done"));
    }

    function Search_User(Request $request)
    {
        return view('Admin/Panel/search_user')->with('Users',User::where('username','LIKE','%'.$request->search.'%')->orwhere('phone','LIKE','%'.$request->search.'%')->orwhere('email','LIKE','%'.$request->search.'%')->orwhere('name','LIKE','%'.$request->search.'%')->orwhere('family','LIKE','%'.$request->search.'%')->get())->with("Seach_Value",$request->search);
    }

    //**********************Get User Manager End



    //**********************Transactions Start

    function transactions(Request $request)
    {
        $all_trans=transcation::join('Users','transcations.user_id','=','Users.id')->get();
        return view('Admin/Panel/alltransactions')->with('all_trans',$all_trans);
    }

    //**********************Transactions End



    //**********************File Manager Start

    function fmanager(Request $request)
    {
        $c_path = $request->query("path");
        $path = base_path('public/FileManager'."/".$c_path);
        $files = scandir($path);

        return view('Admin/Panel/filemanager')->with('files',$files);
    }

    function remove_file(Request $request)
    {
        $path = base_path('FileManager/'.$request->query('file'));
        \Illuminate\Support\Facades\File::delete($path);
        return redirect()->back();
    }

    function remove_dir(Request $request)
    {
        $path = base_path('FileManager/'.$request->query('file'));
        \Illuminate\Support\Facades\File::deleteDirectory($path);
        return redirect()->back();
    }

    function newfolder(Request $request)
    {
        $path = base_path('FileManager/'.$request->query('path'))."/".$request->name;
        \Illuminate\Support\Facades\File::makeDirectory($path);
        return redirect()->back();
    }

    function uploadfile(Request $request)
    {
        $file=$request->file('Upload_File');
        $upload_path=base_path("FileManager/".$request->Address);
        $file_name=$file->getClientOriginalName();
        $file->move($upload_path,$file_name);
        return redirect()->back();
    }

    //**********************File Manager End




    //**********************Get Api Access Start

    //Get All Groups
    function Groups(Request $request)
    {
        $allgroups=\App\Models\UserType::all();
        return view('Admin/Panel/groups')->with('allgroups',$allgroups);
    }

    //Get Add New Group
    function NewGroupDone(Request $request)
    {
        $usertypes=UserType::where('en_title',$request->en_title)->get();

        if(count($usertypes)<=0 && $request->en_title!="ADMIN" && $request->en_title!="USER")
        {
            $usertype = new UserType();
            $usertype->title = $request->title;
            $usertype->en_title = $request->en_title;
            $usertype->save();
            $request->session()->put('msg','عملیات با موفقیت انجام شد');
        }
        else
        {
            $request->session()->put('msg','کاربر تکراری می باشد');
        }

        return redirect()->back();
    }


    //Get Remove Groupd
    function RemoveGroup(Request $request)
    {
        $user_type=UserType::where('id',$request->id)->first();
        $users=User::where('user_type',$user_type->en_title)->update(array('user_type'=>'USER'));
        $user_type->delete();
        return redirect()->back();
    }

    //**********************Get Api Access End





    //**********************Get Profile Start

    //Get Profile
    function Get_Profile(Request $request)
    {
        return view('Admin/Panel/profile')->with('User',Auth::user());
    }


    //Get Submit Update User Profile
    function Get_Profile_Update_Submti(Request $request)
    {
        $profile_image_id=0;
        if($request->hasFile('profile_image'))
        {
            $image=$request->file('profile_image');
            $file_name=hash_file('sha256',$image).".".$image->extension();
            $image->move(base_path()."/FileManager/Temp",$file_name);
            $result=$this->FileManager($file_name,"FileManager/Temp/".$file_name,"Image");
            $profile_image_id=$result;
        }

        $user=User::where('id',$request->user_id)->get()[0];
        $user->username=$request->username;
        $user->email=$request->email;
        $user->phone=$request->phone;
        $user->name=$request->name;
        $user->family=$request->family;
        $user->bio=$request->bio;
        $user->city_id=$request->city;
        $user->address=$request->address;


        if($profile_image_id!=0)
        {
            $user->profile_image_file_id = $profile_image_id;
        }

        if($request->password!="")
        {
            $user->password=hash("sha256",$request->password);
        }

//        dd($user);

        $user->save();
        return redirect()->back();
    }




    //Get Active Google Auth
    function PasstiveGoogle2auth(Request $request)
    {
        $user=User::where('id',1)->get()[0];
        $user->google_auth="";
        $user->save();

        return redirect()->back();
    }




    //Get Active Google Auth
    function ActiveGoogle2auth(Request $request)
    {
        //generate new secret
        $secret = $this->generateSecret();

        $user=User::where('id',1)->get()[0];
        $user->google_auth=Crypt::encrypt($secret);
        $user->save();


        $google2fa = app('pragmarx.google2fa');
        $QR_Image = $google2fa->getQRCodeInline(
            config('app.name'),
            $user->email,
            $secret
        );


        return view('Admin/Panel/ActiveGoogle2auth',['QR_Image' => $QR_Image, 'secret' => $secret]);
    }


    private function generateSecret()
    {
        $randomBytes = random_bytes(10);
        return Base32::encodeUpper($randomBytes);
    }

    //**********************Get Profile End






    //**********************Get Hospitals Start

    //Get View Hospitals
    function getHospitals(Request $request)
    {
        $all_hospitals = Hospital::all();
        return view('Admin/Panel/hospitals')->with('all_hospitals',$all_hospitals);
    }

    //Get Search Hospital
    function getSearchHospitals(Request $request)
    {
        //$city_id=City::where('name','LIKE','%'.$request.'%')->first();

        $all_hospitals = Hospital::where('name','LIKE','%'.$request->search.'%')->orwhere('address','LINK','%'.$request->search.'%')->orwhere('tel','LINK','%'.$request->search.'%')->get();
        return view('Admin/Panel/searchresulthospitals')->with('all_hospitals',$all_hospitals);
    }

    //Get Add New Hospitals
    function newHospital(Request $request)
    {
        return view('Admin/Panel/newhospital');
    }

    //Get Add New Hospitals Submit
    function newHospitalSubmit(Request $request)
    {
        $location=explode(",",$request->location);

        $new_hospital=new Hospital();
        $new_hospital->name=$request->name;
        $new_hospital->bio=$request->bio;
        $new_hospital->lat=$location[0];
        $new_hospital->lng=$location[1];
        $new_hospital->address=$request->address;
        $new_hospital->start_time=$request->start_time;
        $new_hospital->end_time=$request->end_time;
        $new_hospital->tel=$request->tel;
        $new_hospital->status=$request->status;
        $new_hospital->city_id=$request->city;
        $new_hospital->save();

        return view('Admin/Panel/done');
    }


    //Get Galery start
    function hospitalGallery(Request $request, Hospital $hospital)
    {
        $images=HospitalImg::Where('hospital_id',$hospital->id)->get();
        return view('Admin/Panel/hospital_gallery')->with('images',$images)->with('hospi_id',$hospital->id);
    }
    //Get Galery End


    //Get Galery start
    function hospitalGalleryNew(Request $request, Hospital $hospital)
    {
        if($request->hasFile('img'))
        {
            $image=$request->file('img');
            $file_name=hash_file('sha256',$image).".".$image->extension();
            $image->move(base_path()."/FileManager/Temp",$file_name);
            $result=$this->FileManager($file_name,"FileManager/Temp/".$file_name,"Image");
            $image_id=$result;

            $hospi=new HospitalImg();
            $hospi->hospital_id=$hospital->id;
            $hospi->file_id=$image_id;
            $hospi->save();

        }

        return redirect()->back();
    }
    //Get Galery End


    //Remove from gallery start
    function hospitalGalleryRemove(Request $request)
    {
        $images=HospitalImg::Where('hospital_id',$request->hospi_id)->Where('file_id',$request->img_id)->delete();
        return redirect()->back();
    }
    //Remove from gallery end


    //Get Edit Hospital Start
    function hospitalEdit(Request $request, Hospital $hospital)
    {
        // $haspital=Hospital::where('id',$request->id)->first();
        return view('Admin/Panel/edithospital')->with('haspital',$hospital);
    }
    //Get Edit Hospital End


    //Get Edit Hospital Submmit Start
    function hospitalEditSubmit(Request $request)
    {
        $location=explode(",",$request->location);
        $new_hospital=Hospital::where('id',$request->id)->first();
        $new_hospital->name=$request->name;
        $new_hospital->bio=$request->bio;
        $new_hospital->lat=$location[0];
        $new_hospital->lng=$location[1];
        $new_hospital->address=$request->address;
        $new_hospital->start_time=$request->start_time;
        $new_hospital->end_time=$request->end_time;
        $new_hospital->tel=$request->tel;
        $new_hospital->status=$request->status;
        $new_hospital->city_id=$request->city;
        $new_hospital->update();

        return view('Admin/Panel/done');
    }
    //Get Edit Hospital Submmit End

    //**********************Get Hospitals End





    //**********************Get New Report Start

    //Get View Reports
    function New_Report()
    {
        return view('Admin/Panel/new_report');
    }

    //Add New Report
    function New_Report_Add(Request $request)
    {
        $Report=new report();
        $Report->title=$request->new_report;
        $Report->delete_flag=false;
        $Report->save();
        return redirect(url("/Admin/NewReport"));
    }

    //Remove Report
    function Remove_Report(Request $request)
    {
        $Report=report_tbl::where('id',$request->report_id)->get()[0];
        $Report->delete_flag=true;
        $Report->save();
        return redirect(url("/Admin/NewReport"));
    }

    //**********************Get New Report End








    //**********************Get Reports Start
    function Reports()
    {
        $Reports=reportDetail::where('reports_tbls.condition',false)->get();
        return view('Admin/Panel/reports')->with("Reports",$Reports);
    }

    function Seen_Report(Request $request)
    {
        reportDetail::where('id',$request->id)->update(array("condition"=>true));
        return redirect(url('/Admin/Reports'));
    }
    //**********************Get Reports End

















    //**********************Get Charts Start
    function Get_Charts()
    {
        $count_of_all_users=count(User::where('user_type','USER')->get());
        $count_of_all_doctors=count(User::where('user_type','DOCTOR')->get());
        return view('Admin/Panel/charts')->with('count_of_all_users',$count_of_all_users)->with('count_of_all_doctors',$count_of_all_doctors);
    }
    //**********************Get Charts End














    /************Get file to filemanager start*************/
    function FileManager($FileName,$FilePath,$type)
    {
        $file_extention="";
        if($type=="zip")
        {
            $file_extention="zip";
        }
        else if($type=="mp3")
        {
            $file_extention="mp3";
        }
        else
        {
            $file_extention=explode('.',$FileName)[count(explode('.',$FileName))-1];
        }

        $file=new File();
        $file->file_name=$FileName;
        $file->file_address=$FilePath;
        $file->file_address_server=base_path().'/'.$FilePath;
        $file->file_size=filesize(base_path().'/'.$FilePath);
        $file->file_hash=hash_file('sha256',base_path().'/'.$FilePath);
        $file->file_date_time=date('Y-m-d h:i:sa');
        $file->file_type=$type;
        $file->file_extention=$file_extention;
        $file->user_id=Auth::user()->id;
        $file->save();

        return File::orderBy('id','desc')->get()[0]->id;
    }
    /************Get file to filemanager end*************/




}
//Admin Controller End
