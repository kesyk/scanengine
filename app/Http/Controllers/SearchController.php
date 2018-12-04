<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;
use mysql_xdevapi\Schema;

class SearchController extends Controller
{
    public function index()
    {
        $searches = DB::table('searches')->get();

        return view("main.searches", ["data" => $searches]);
    }

    public function showProducts($searchId)
    {
        $search = DB::table('searches')->where('id', $searchId)->first();

        if($search == null)
            return abort(404);

        $products = DB::table("upload_$search->hashedname")->get();

        return view("main.searchproducts", ["data" => $products]);
    }

    public function showSearch($searchId)
    {
       return view('main.index');
    }

}
