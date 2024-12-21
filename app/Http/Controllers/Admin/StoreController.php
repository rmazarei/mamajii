<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\store;
use App\Models\StoreCategory;
use App\Models\StoreImage;
use Illuminate\Http\Request;

class StoreController extends Controller
{

    //******************New Store Function Start

    function create(Request $request)
    {
        $categories=StoreCategory::where('delete_flag','0')->get();
        return view('Admin/Panel/newStore')->with('categories',$categories);
    }

    function index(Request $request)
    {
        $stores=Store::where('delete_flag','0')->get();
        return view('Admin/Panel/allStores')->with('stores',$stores);
    }

    function show(Store $store)
    {
        $categories=StoreCategory::where('delete_flag','0')->get();
//        $images=StoreImage::where('store_id',$store->id)->join('Files','store_images.file_id',"=",'Files.id')->get();
        $images=$store->storeImages;
//        dd($images);

        return view('Admin/Panel/editStore')->with('post',$store)->with('categories',$categories)->with("images",$images);
    }

}
