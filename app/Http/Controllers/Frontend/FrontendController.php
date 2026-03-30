<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    public function index()
    {
        $categories = Category::where('status', 1)->take(6)->get();
        $featuredProducts = Product::where('status', 1)->with('category')->latest()->take(8)->get();

        return view('frontend.home', compact('categories', 'featuredProducts'));
    }

    public function about()
    {
        return view('frontend.about');
    }

    public function services()
    {
        return view('frontend.services');
    }

    public function products(Request $request)
    {
        $categories = Category::where('status', 1)->get();
        $products = Product::where('status', 1)->with('category');

        if ($request->category) {
            $products = $products->where('category_id', $request->category);
        }

        if ($request->search) {
            $products = $products->where('name', 'like', '%'.$request->search.'%');
        }

        if ($request->min_price) {
            $products = $products->where('price', '>=', $request->min_price);
        }

        if ($request->max_price) {
            $products = $products->where('price', '<=', $request->max_price);
        }

        $products = $products->paginate(12);

        return view('frontend.products', compact('products', 'categories'));
    }

    public function productDetail($slug)
    {
        $product = Product::with('category')->where('slug', $slug)->firstOrFail();
        $relatedProducts = Product::with('category')
            ->where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->where('status', 1)
            ->take(4)
            ->get();

        return view('frontend.product-detail', compact('product', 'relatedProducts'));
    }

    public function contact()
    {
        return view('frontend.contact');
    }

    public function contactSubmit(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        return back()->with('success', 'Thank you for contacting us! We will get back to you soon.');
    }

    public function myOrders()
    {
        if (Auth::user()->isAdmin()) {
            return redirect()->route('admin.dashboard');
        }

        $orders = Order::where('user_id', Auth::id())->latest()->get();

        return view('frontend.my-orders', compact('orders'));
    }
}
