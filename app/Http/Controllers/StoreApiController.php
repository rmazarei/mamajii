<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\notification;
use App\Models\order;
use App\Models\storeCategorie;
use App\Models\storeImage;
use App\Models\store;
use App\Models\Transcation;
use App\Models\users_tbl;
use Illuminate\Http\Request;

class StoreApiController extends Controller
{

    //Get All Categories start
    function StoreCetegories(Request $request)
    {
        return storeCategorie::where('visible','1')->where('delete_flag','0')->get();
    }
    //Get All Categories end


    //Get All Categories start
    function StorePostsByCategories(Request $request)
    {
        $result=[];
        $all_stores = store::where('category_id',$request->cat_id)->where('delete_flag','0')->where('visible','1')->get();
        foreach ($all_stores as $stores)
        {
            $store_imgae=storeImage::join('Files','store_images_tbls.file_id','=','Files.id')->where('store_id',$stores->id)->first()->file_hash;
            array_push($result,array(
                "id"=>$stores->id,
                "title"=>$stores->title,
                "content"=>$stores->content,
                "date"=>$stores->date,
                "type"=>$stores->type,
                "json"=>$stores->json,
                "price"=>$stores->price,
                "discount"=>$stores->discount,
                "adiscount"=>$stores->adiscount,
                "image"=>$store_imgae,
            ));
        }
        return $result;
    }
    //Get All Categories end


    //Get submit order start
    function DoneOrder(Request $request)
    {
        $user=users_tbl::where('login_token',$request->header('auth'))->where('user_type','USER')->where('status','1')->first();

        $order=new order();
        $order->type="PRODUCT";
        $order->date=date('Y-m-d');
        $order->time=date('h:i:sa');
        $order->order_status="1";
        $order->price=$request->order_price;
        $order->store_id=$request->order_id;
        $order->user_id=$user->id;
        $order->save();

        users_tbl::where('login_token',$request->header('auth'))->where('user_type','USER')->where('status','1')->update(array("address"=>$request->address));

        $transation=new transcation();
        $transation->value=$request->order_price;
        $transation->date=date('Y-m-d h:i:sa');
        $transation->order_id=$order->id;
        $transation->user_id=$user->id;
        $transation->save();

        $notif=new notification();
        $notif->title="ثبت سفارش";
        $notif->content="سفارش شما با موفقیت انجام شد\n\n"."شماره پیگیری : ".$order->id;
        $notif->link="-";
        $notif->from="ماماجی";
        $notif->date=date('Y-m-d h:i:sa');
        $notif->seen=false;
        $notif->user_id=$user->id;
        $notif->save();

        return array("statis"=>"success");
    }
    //Get submit order end


    //Get all user orders start
    function GetAllUserOrders(Request $request)
    {
        $result=[];
        $user=users_tbl::where('login_token',$request->header('auth'))->where('user_type','USER')->where('status','1')->first();
        $orders=order::where('orders_tbls.user_id',$user->id)->get();

        foreach ($orders as $order)
        {
            $store=store::where('id',$order->store_id)->first();
            $transaction=transcation::where('order_id',$order->id)->get();

            array_push($result,array(
                "id"=>$order->id,
                "title"=>$store->title,
                "date"=>$order->date,
                "time"=>$order->time,
                "pay"=>count($transaction),
            ));
        }

        return $result;
    }
    //Get all user orders end



}
