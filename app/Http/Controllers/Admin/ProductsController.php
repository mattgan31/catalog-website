<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

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
        $validator = $this->validateProductData($request);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $imageName = $this->uploadProductImage($request);

        $data = $this->createNewProduct($request, $imageName);

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
        $validator = $this->validateProductData($request, true);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $product = Product::find($id);

        $this->updateProductImage($request, $product);

        $product->update([
            'product_name' => $request->product_name,
            'description' => $request->description,
            'price' => $request->price,
        ]);

        if ($product->wasChanged()) {
            return redirect()->route('product.index')
                ->with('success', 'Edit Product has successfully');
        } else {
            return redirect()->route('product.edit')
                ->with('failed', 'Edit Product has failed');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $image_file = public_path("images/products/") . $product->image;

        if (File::exists($image_file)) {
            File::delete($image_file);
        }

        if ($product->delete()) {
            return redirect()->route('product.index')
                ->with('success', 'Product has deleted');
        } else {
            return redirect()->route('product.index')
                ->with('failed', 'Product could not be deleted');
        }
    }

    public function validateProductData($request, $update = false)
    {
        $rules = [
            'product_name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
        ];

        if (!$update) {
            $rules['image'] = 'required|image|max:2048';
        } else {
            $rules['image'] = 'nullable|image|max:2048';
        }

        $messages = [
            'product_name.required' => 'Nama produk harus diisi.',
            'product_name.string' => 'Nama produk harus berupa string.',
            'product_name.max' => 'Nama produk tidak boleh lebih dari 255 karakter.',
            'description.required' => 'Deskripsi produk harus diisi.',
            'description.string' => 'Deskripsi produk harus berupa string.',
            'price.required' => 'Harga produk harus diisi.',
            'price.numeric' => 'Harga produk harus berupa angka.',
            'price.min' => 'Harga produk tidak boleh kurang dari 0.',
            'image.required' => 'Gambar produk harus diisi.',
            'image.image' => 'Gambar produk harus berupa file gambar.',
            'image.max' => 'Ukuran gambar produk tidak boleh lebih dari 2MB.'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        return $validator;
    }


    private function uploadProductImage(Request $request)
    {
        $imageName = $request->file('image')->hashName();
        $request->image->move(public_path('images/products'), $imageName);
        return $imageName;
    }

    private function updateProductImage(Request $request, $product)
    {
        if ($request->hasFile('image')) {
            $image_file = public_path('images/products/') . $product->image;
            if (File::exists($image_file)) {
                File::delete($image_file);
            }
            $imageName = $request->file('image')->hashName();
            $request->image->move(public_path('images/products'), $imageName);
            $product->image = $imageName;
        } else {
            $product->image = $product->image;
        }
    }


    private function createNewProduct(Request $request, $imageName)
    {
        return Product::create([
            'product_name' => $request->post('product_name'),
            'image' => $imageName,
            'description' => $request->post('description'),
            'user_id' => Auth::id(),
            'price' => $request->post('price'),
        ]);
    }
}
