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
}
