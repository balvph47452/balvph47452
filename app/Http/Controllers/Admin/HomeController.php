<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $tongtk = User::count();
        $tongsanpham = Post::count();
        $tongdm = Category::count();

        $listTk = Category::withCount('posts')->get(); // Tính số sản phẩm trong từng danh mục

        return view('admin.home', compact('tongtk', 'tongsanpham', 'tongdm', 'listTk'));
    }
}
