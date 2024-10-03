<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Category;
use App\Models\User;
use App\Models\Product;

class DashboardController extends Controller
{
    public function index() {
        $productCount = Product::count();
        $categoryCount = Category::count();
        $userCount = User::count();
        $appointmentCount = Appointment::count();
        return view('admin.dashboard', ['userCount' => $userCount, 'categoryCount' => $categoryCount, 'userCount' => $userCount, 'appointmentCount' => $appointmentCount, 'productCount' => $productCount]);
    }
}
