<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function product_form()
    {
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Unauthorized');
        }
        return view('product.product_form');
    }

    public function store_product(Request $request){
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Unauthorized');
        }

        $validated_data = $request->validate(
            [
                'name' => 'required',
                'price' => 'required',
                'quantity' => 'required',
                'image' => 'nullable',
                'category' => 'required'
            ]
          );

        if ($request->hasFile('image')) {
            $imageName = $request->file('image')->getClientOriginalName();
            $imagePath = public_path('image');
            if (!file_exists($imagePath)) {
                mkdir($imagePath, 0777, true);
            }
            $request->file('image')->move($imagePath, $imageName);
            $validated_data['image'] = $imageName;
        }

    $validated_data['user_id'] = auth()->id();
    Product::create($validated_data);
        return redirect()->back()->with('message', 'Product Saved');
    }

    public function all_products()
    {
        if (auth()->user()->role === 'admin') {
            $all_products = Product::all();
        } else {
            $all_products = Product::where('user_id', auth()->id())->get();
        }
        return view('product.all_products', ['products' => $all_products]);
    }

    public function delete_product($product_id)
    {
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Unauthorized');
        }
        $product = Product::where('id', $product_id)->first();
        $product->delete();
        return redirect()->back()->with('message', 'Product Deleted');
    }
    public function edit_product($product_id)
    {
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Unauthorized');
        }
        $prod = Product::where('id', $product_id)->first();
        return view('product.edit_product', ['product' => $prod]);
    }

    public function update_product(Request $request, $id)
    {
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Unauthorized');
        }
    {

        $validated_data=$request->validate([
        'name'=> 'required',
        'price'=>'required',
        'quantity'=> 'required',
        'image'=> 'nullable',
        'category'=> 'required'
        ]);


            if($request->hasFile( 'image')){
                $imageName=$request->file('image')->getClientOriginalName();
                $request->file('image')->move(
                    public_path('image'),
                    $imageName
                );
                $validated_data['image']=$imageName;
            }
            
        $product=Product::where('id',$id)->first();
        $product->update($validated_data);
            return redirect()->back()->with('message' , 'product Updated');

    }
    }
    public function add_to_cart(Request $request, $id) {
        $cart = session()->get('cart', []);
        $cart[$id] = ($cart[$id] ?? 0) + 1; // Add one item
        session(['cart' => $cart]);
        return redirect()->back()->with('message', 'Product added to cart!');
    }

    public function user_cart() {
        $cart = session('cart', []);
        $products = Product::whereIn('id', array_keys($cart))->get();
        return view('user_cart', compact('products', 'cart'));
    }
    public function update_cart_quantity(Request $request, $id) {
        $cart = session()->get('cart', []);
        $quantity = max(1, (int)$request->input('quantity')); // Ensure at least 1
        $cart[$id] = $quantity;
        session(['cart' => $cart]);
        return redirect()->back()->with('message', 'Cart updated!');
    }
    public function sell_product(Request $request, $id) {
        $product = Product::findOrFail($id);
        // Example: reduce quantity by 1 (or by $request->quantity)
        if ($product->quantity > 0) {
            $product->quantity -= $request->quantity;
            $product->save();
            return redirect()->back()->with('message', 'Product sold!');
        } else {
            return redirect()->back()->with('error', 'Out of stock!');
        }
    }

    public function purchase_product(Request $request, $id) {
        $product = Product::findOrFail($id);
        $quantity = $request->quantity;
        // Create a purchase request
        $purchase = Purchase::create([
            'user_id' => auth()->id(),
            'product_id' => $product->id,
            'quantity' => $quantity,
            'status' => 'pending',
        ]);
        return redirect()->route('customer_purchases')->with('message', 'Purchase request submitted!');
    }
    // Admin view: all purchase requests
    public function admin_purchases() {
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Unauthorized');
        }
        $purchases = Purchase::with('user', 'product')->orderBy('created_at', 'desc')->get();
        return view('admin_purchases', compact('purchases'));
    }

    // Customer view: their own purchases
    public function customer_purchases() {
        $purchases = Purchase::with('product')->where('user_id', auth()->id())->orderBy('created_at', 'desc')->get();
        return view('customer_purchases', compact('purchases'));
    }
         public function homepage(Request $request)
    {
        $query = Product::query();
        // Only show products with quantity > 0
        $query->where('quantity', '>', 0);
        // Filter by category if selected
        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }
        $products = $query->get();
        return view('homepage', compact('products'));
    }
    }
   