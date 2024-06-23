<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\discountCode;
use App\Models\File;
use App\Models\order;
use App\Models\post;
use App\Models\Setting;
use App\Models\storeCategorie;
use App\Models\storeImage;
use App\Models\store;
use App\Models\Transcation;
use App\Models\users_tbl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StoreController extends Controller
{


    //******************Categories Function Start

    function Categories(Request $request)
    {
        $categories=storeCategorie::where('delete_flag','0')->get();

        if(isset($request->id))
        {
            $edit_cat = storeCategorie::where('id', $request->id)->first();
            return view('Admin/Panel/store_categories')->with('categories',$categories)->with('edit_cat',$edit_cat);
        }

        return view('Admin/Panel/store_categories')->with('categories',$categories);
    }

    function Categories_New_Update(Request $request)
    {

        if($request->has('id'))
        {
            $category = storeCategorie::where('id', $request->id)->first();
            $category->title = $request->post('title');
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
            $category = new storeCategorie();
            $category->title = $request->post('title');
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
        $categories=storeCategorie::where('id',$request->id)->first();
        $categories->delete_flag = "1";
        $categories->save();
        return redirect()->back();
    }

    //******************Categories Function End




    //******************New Store Function Start

    function NewStore(Request $request)
    {
        $categories=storeCategorie::where('delete_flag','0')->get();
        return view('Admin/Panel/newstore')->with('categories',$categories);
    }


    function NewStoreDone(Request $request)
    {
        $usr=Auth::user();

        $post=new store();
        $post->title=$request->title;
        $post->content=$request->cntent;
        $post->type=$request->type;
        $post->json=$request->attr;
        $post->price=$request->price;
        $post->date=date("Y-m-d h:i:sa");
        $post->delete_flag="0";
        $post->visible=$request->visible;
        $post->user_id=$usr->id;
        $post->category_id=$request->category;
        $post->discount="";
        $post->adiscount="";

        if($request->type=="FILE")
        {
            if($request->hasFile('file'))
            {
                $file=$request->file('file');
                $file_name=hash_file('sha256',$file).".".$file->extension();
                $file->move(public_path()."/FileManager/Temp",$file_name);
                $result=$this->FileManager($file_name,"FileManager/Temp/".$file_name,"Image");
                $file_id=$result;
                $post->file_id=$file_id;
            }
        }
        else
        {
            $post->file_id=0;
        }

        $post->save();


        //echo $request->all_images;
        $images_array=explode(",",$request->all_images);
        for($i=0;$i<count($images_array) - 1;$i++)
        {
            $s_img=new storeImage();
            $s_img->date=date("Y-m-d h:i:sa");
            $s_img->store_id=$post->id;
            $s_img->file_id=(int)$images_array[$i];
            $s_img->save();
        }


        return redirect()->back();
    }

    //******************New Store Function End



    //******************All Post Start

    function AllPosts(Request $request)
    {
        $posts=store::where('delete_flag','0')->get();
        return view('Admin/Panel/allstores')->with('posts',$posts);
    }

    function all_store_search(Request $request)
    {
        $SearchLike='%'.$request->search.'%';
        $posts=store::where('delete_flag','0')->where('content','LIKE',$SearchLike)->orwhere('title','LIKE',$SearchLike)->get();
        return view('Admin/Panel/storesearchresult')->with('posts',$posts);
    }

    function RemovePost(Request $request)
    {
        $post=store::where('id',$request->id)->first();
        $post->delete_flag="1";
        $post->save();
        return redirect()->back();
    }

    function getpost(Request $request)
    {
        $categories=storeCategorie::where('delete_flag','0')->get();
        $post=store::where('id',$request->id)->first();
        $images=storeImage::where('store_id',$post->id)->join('Files','store_images_tbls.file_id',"=",'Files.id')->get();
//        dd($images);

        return view('Admin/Panel/editstore')->with('post',$post)->with('categories',$categories)->with("images",$images);
    }

    function update_post_submit(Request $request)
    {
        $usr=Auth::user();

        $post=store::where('id',$request->id)->first();
        $post->title=$request->title;
        $post->content=$request->cntent;
        $post->type=$request->type;
        $post->json=$request->attr;
        $post->price=$request->price;
        $post->date=date("Y-m-d h:i:sa");
        $post->delete_flag="0";
        $post->visible=$request->visible;
        $post->user_id=$usr->id;
        $post->category_id=$request->category;
        $post->discount = $request->discount;


        //discount start
        if($request->discount!="")
        {
            $discount = (float)$request->discount;
            $price_money = (float)$request->price;
            if ($discount > 100)
            {
                $price_money = $price_money - $discount;
                $post->adiscount = $price_money;
            }
            else
            {
                $discount = $discount / 100;
                $per = $price_money * $discount;
                $price_money = $price_money - $per;
                $post->adiscount = $price_money;
            }
        }
        //discount end


        if($request->type=="FILE")
        {
            if($request->hasFile('file'))
            {
                $file=$request->file('file');
                $file_name=hash_file('sha256',$file).".".$file->extension();
                $file->move(public_path()."/FileManager/Temp",$file_name);
                $result=$this->FileManager($file_name,"FileManager/Temp/".$file_name,"Image");
                $file_id=$result;
                $post->file_id=$file_id;
            }
        }
        else
        {
            $post->file_id=0;
        }
        $post->save();

        storeImage::where('store_id',$post->id).delete();

        $images_array=explode(",",$request->all_images);
        for($i=0;$i<count($images_array) - 1;$i++)
        {
            $s_img=new storeImage();
            $s_img->date=date("Y-m-d h:i:sa");
            $s_img->store_id=$post->id;
            $s_img->file_id=(int)$images_array[$i];
            $s_img->save();
        }

        return redirect()->back();
    }

    //******************All Post End




    //******************All orders start

    function AllOrders(Request $request)
    {
        return view('Admin/Panel/allorders');
    }

    function CurrentOrders(Request $request)
    {
        $orders=order::where('order_status','1')->get();
        return view('Admin/Panel/CurrentOrders')->with('orders',$orders);
    }

    function OrderSearch(Request $request)
    {
        $orders=order::where('id',$request->search)->get();
        return view('Admin/Panel/OrderSearchResult')->with('orders',$orders);
    }

    function OrderDitales(Request $request)
    {
        $order=order::join('store_tbls','orders_tbls.store_id','=','store_tbls.id')->join('users_tbls','orders_tbls.user_id','=','users_tbls.id')->where('orders_tbls.id',$request->id)->first();
        return view('Admin/Panel/order_ditales')->with('order',$order);
    }

    function OrderDlivery(Request $request)
    {
        $order=order::where('id',$request->id)->first();
        $order->order_status="3";
        $order->save();
        return redirect()->back();
    }

    function OrderRemove(Request $request)
    {
        $order=order::where('id',$request->id)->first();
        $order->order_status="4";
        $order->save();
        return redirect()->back();
    }

    function OrderPay(Request $request)
    {
        $user=Auth::user();

        $order=order::where('id',$request->id)->first();
        $order->order_status="1";
        $order->save();

        $transaction=new transcation();
        $transaction->date=date("Y-m-d h:i:sa");
        $transaction->value=$order->price;
        $transaction->user_id=$user->id;
        $transaction->order_id=$order->id;
        $transaction->save();

        return redirect()->back();
    }

    //******************All orders end




    //******************Discount Start

    function GetAllDiscounts()
    {
        $setting = setting::orderBy('id','desc')->get()[0];
        return view('Admin/Panel/alldiscount')->with('setting',$setting);
    }

    function GetAddAllDiscounts(Request $request)
    {
        $setting = setting::orderBy('id','desc')->get()[0];
        $setting->discountall=$request->discount;
        $setting->update();

        $discount = (float)$request->discount;
        $all_store=store::get();
        foreach ($all_store as $store)
        {
            if ($discount > 100)
            {
                $price_money = $store->price - $discount;
                $store->adiscount = $price_money;
            }
            else
            {
                $discount = $discount / 100;
                $per = $store->price * $discount;
                $price_money = $store->price - $per;
                $store->adiscount = $price_money;
            }
            $store->update();
        }

        return redirect()->back();
    }

    function GetRemoveAllDiscounts(Request $request)
    {
        $setting = setting::orderBy('id','desc')->get()[0];
        $setting->discountall="";
        $setting->update();

        $all_store=store::get();
        foreach ($all_store as $store)
        {
            if($store->discount=="")
            {
                $store->adiscount="";
                $store->discount="";
            }
            else
            {
                $discount=$store->discount;
                if ($discount > 100)
                {
                    $price_money = $store->price - $discount;
                    $store->adiscount = $price_money;
                } else {
                    $discount = $discount / 100;
                    $per = $store->price * $discount;
                    $price_money = $store->price - $per;
                    $store->adiscount = $price_money;
                }
            }
            $store->update();
        }

        return redirect()->back();
    }

    //******************Discount End





    //******************Coupon Start

    function Coupons(Request $request)
    {
        $coupons=discountCode::where('delete_flag','0')->get();
        return view('Admin/Panel/coupons')->with('coupons',$coupons);
    }

    function NewCoupon(Request $request)
    {
        $discount = new discountCode();
        $discount->code=$this->GenerateRandomString(10);
        $discount->count=$request->count;
        $discount->delete_flag="0";
        $discount->date=date("Y-m-d h:i:sa");
        $discount->save();

        return redirect()->back();
    }

    function RemoveCoupon(Request $request)
    {
        $discount = discountCode::where('id',$request->id)->first();
        $discount->delete_flag="1";
        $discount->update();

        return redirect()->back();
    }

    //******************Coupon End




    /************Get file to filemanager start*************/
    function FileManager($FileName,$FilePath,$type)
    {
        $user=users_tbl::where('login_token',session('login_token'))->first();

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
        $file->file_address_server=public_path().'/'.$FilePath;
        $file->file_size=filesize(public_path().'/'.$FilePath);
        $file->file_hash=hash_file('sha256',public_path().'/'.$FilePath);
        $file->file_date_time=date('Y-m-d h:i:sa');
        $file->file_type=$type;
        $file->file_extention=$file_extention;
        $file->user_id=Auth::user()->id;
        $file->save();

        return File::orderBy('id','desc')->get()[0]->id;
    }
    /************Get file to filemanager end*************/



    /************Get generate random string start*************/
    function GenerateRandomString($length = 10)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[random_int(0, $charactersLength - 1)];
        }
        return $randomString;
    }
    /************Get generate random string end*************/




}
