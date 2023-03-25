<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    public function index()
    {
        $products = DB::table('products')->limit(3)->get();
        // error_log($products);
        return view('user.home', compact('products'));
    }
}
