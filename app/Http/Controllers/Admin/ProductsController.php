<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $products = Product::all();
        return view("admin.product.index", compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.product.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // error_log($request);
        $this->validate($request, [
            "product_name" => "required",
            "image" => "required|image|mimes:png,jpg,jpeg,svg|max:2048",
            "description" => "required",
        ]);

        $imageName = $request->file('image')->hashName();
        $request->image->move(public_path('images/products'), $imageName);
        $data = Product::create([
            'product_name' => $request->post('product_name'),
            'image' => $imageName,
            'description' => $request->post('description'),
            'user_id' => Auth::id(),
        ]);

        if ($data->save()) {
            return redirect()->route('product.index')
                ->with('success', 'Add Product has successfully');
        } else {
            return redirect()->route('product.create')
                ->with('failed', 'Add Product has failed');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $product = Product::find($id);
        $product = DB::table('products')
            ->join('users', 'products.user_id', '=', 'users.id')
            ->select('products.*', 'users.name')
            ->where('products.id', '=', $id)
            ->first();

        return view("admin.product.show", compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        return view('admin.product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            "product_name" => "required",
            "description" => "required",
            "image" => "image|mimes:png,jpg,jpeg,svg|max:2048",
        ]);

        $data = Product::find($id);

        if ($request->image == null) {
        } else {
            $image_file = public_path('images\\') . $data->image;
            if (File::exists($image_file)) {
                File::delete($image_file);
            }

            $imageName = $request->file('image')->hashName();
            $request->image->move(public_path('images/products'), $imageName);
            $data->image = $imageName;
        }

        $data->product_name = $request->product_name;
        $data->description = $request->description;

        if ($data->update()) {
            return redirect()->route('product.index')
                ->with('success', 'Edit Product has successfully');
        } else {
            return redirect()->route('product.edit')
                ->with('failed', 'Edit Product has failed');
        }
        // dd($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Product::find($id);
        $image_file = public_path("images/products/") . $data->image;
        // error_log($image_file);
        if (File::exists($image_file)) {
            File::delete($image_file);
        }
        $data->delete();
        return redirect()->route('product.index')
            ->with('success', 'Product has deleted');;
    }
}
