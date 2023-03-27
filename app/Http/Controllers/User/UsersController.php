<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    public function index()
    {
        $products = DB::table('products')->limit(4)->orderBy('created_at', 'desc')->get();
        // error_log($products);
        return view('user.home', compact('products'));
    }

    public function show_all_products()
    {
        $products = DB::table('products')->orderBy('created_at', 'desc')->get();

        return view('user.list_products', compact('products'));
    }

    public function about_us()
    {
        $about = DB::table('about')->first();
        $mission = DB::table('mission')->first();
        return view('user.about_us', compact('about'), compact('mission'));
    }
}
