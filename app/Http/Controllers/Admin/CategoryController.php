<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function listCate(){
        $cates = Category::all();

        return view('admin.categories.list', compact('cates'));
    }

    public function create(){
        return view('admin.categories.create');
    }

    public function store(Request $request){
        $data = $request->validate([
            'name' => ['required', "unique:categories,name"],
        ], [
            'name.required' => 'Không được bỏ trống',
            'name.unique' => 'Tên danh mục đã tồn tại',
        ]);

        Category::query()->create($data);
        return redirect()->route('cate.list')->with('message', 'Thêm mới thành công');

    }

    public function destroy($id){
        Category::query()->findOrFail($id)->delete();

        return redirect()->route('cate.list')->with('message', 'Xóa danh mục thành công');
    }

    public function edit($id) {
        $cate = Category::query()->findOrFail($id);

        return view('admin.categories.edit', compact('cate'));
    }

    public function update(Request $request, $id){
        $cate = Category::query()->findOrFail($id);
        $data = $request->validate([
            'name' => ['required', "unique:categories,name, $id"],
        ], [
            'name.required' => 'Không được bỏ trống',
            'name.unique' => 'Tên danh mục đã tồn tại',
        ]);
        $cate->update($data);
        return redirect()->back()->with('message', 'Sửa danh mục thành công');
    }
}
