<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Flasher\Toastr\Prime\ToastrInterface;



class AdminController extends Controller
{
    public function viewCategory()
    {
        $datas = Category::all();
        return view('admin.category', compact('datas'));
    }

    public function addCategory(Request $request) {
         $request->validate(([
            'category' => 'required'
        ]));

        $category = new Category;
        $category->category_name = $request->category;
        $category->save();

        toastr()->success('Category Added Successfully.');

        return redirect()->back();
    }

    public function deleteCategory($id) {
        $data = Category::find($id);
        $data->delete();

        toastr()->success('Category deleted Successfully.');
        return redirect()->back();
    }

    public function editCategory($id) {
        $data = Category::find($id);
        return view('admin.edit_category', compact('data'));
    }

    public function updateCategory(Request $request, $id) {
       $request->validate([
            'category' => 'required'
        ]);

        $category = Category::find($id);
        $category->category_name = $request->category;

        $category->save();
        return redirect('/view_category');
    }

    public function addProduct() {
        $categories = Category::all();
        return view('admin.add_product', compact('categories')); 
    }

    public function uploadProduct(Request $request) {
        $validatedInput = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'category' => 'required'
        ]);

        $product = new Product;
        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->category = $request->category;

        $image = $request->image;
        if($image) {
            $imageName = time().'.'.$request->image->getClientOriginalExtension();

            $request->image->move('productsImages', $imageName);
            $product->image = $imageName;
        }

        $product->save();
        toastr()->success('Product Added Successfully.');

        return redirect('/admin/dashboard');
    }

    public function viewProduct() {
        $products = Product::paginate(3);
        return view('admin.view_product', compact('products')); 
    }

    public function deleteProduct($id) {
        $product = Product::find($id);

        $imagePath = public_path('productsImages/'.$product->image);
        if(file_exists($imagePath)) {
            unlink($imagePath);
        }

        $product->delete();
        return redirect()->back();
    }

    public function editProduct($id) {
        $product = Product::find($id);
        $categories = Category::all();
        return view('admin.edit_product', compact('product', 'categories'));
    }

    public function updateProduct($id, Request $request) {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'category' => 'required'
        ]);

        $product = Product::find($id);

        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->category = $request->category;

        $image = $request->image;
        if($image) {
            $imageName = time().'.'.$request->image->getClientOriginalExtension();

            $request->image->move('productsImages', $imageName);
            $product->image = $imageName;
        }

        $product->save();
        return redirect('/view_product');
    }


    public function productSearch(Request $request) {
        $search = $request->search;
        $products = Product::where('title', 'like', '%'.$search.'%')->orWhere('category', 'like', '%'.$search.'%')->paginate(3);
        return view('admin.view_product', compact('products'));
    }

}
