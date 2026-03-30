<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function login()
    {
        return view('backend.login');
    }

    public function dashboard()
    {
        $stats = [
            'users' => User::count(),
            'products' => Product::count(),
            'categories' => Category::count(),
            'orders' => Order::count(),
            'revenue' => Order::where('status', '!=', 'cancelled')->sum('total_amount'),
            'pendingOrders' => Order::where('status', 'pending')->count(),
        ];

        $recentOrders = Order::orderBy('id', 'asc')->get();

        return view('backend.dashboard', compact('stats', 'recentOrders'));
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('home');
    }

    public function users()
    {
        $users = User::orderBy('id', 'asc')->get();

        return view('backend.users', compact('users'));
    }

    public function destroyUser($id)
    {
        $user = User::findOrFail($id);

        if ($user->role === 'admin') {
            return back()->with('error', 'Cannot delete admin user!');
        }

        $user->delete();

        return back()->with('success', 'User deleted successfully!');
    }
}
