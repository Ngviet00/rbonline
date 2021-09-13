<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{

    public function index()
    {
        return view('admincp.category.index');
    }

    public function create()
    {
        return view('admincp.category.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate(
            [
                'name' => 'required|unique:categories|max:255',
                'slug' => 'required|unique:categories|max:255',
            ],
        );

        $category = new Category();

        $category->name = $data['name'];

        $category->slug = $data['slug'];

        $category->active = $request->active;

        $category->save();

        return redirect()->route('category.index')->with('status','Thêm danh mục thành công');
    }

    public function show(Category $category,$slug)
    {

    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view('admincp.category.edit')->with(compact('category'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate(
            [
                'name' => 'required|max:255',
                'slug' => 'required|max:255',
            ],
        );

        $category = Category::find($id);

        $category->name = $data['name'];

        $category->slug = $data['slug'];

        $category->active = $request->active;

        $category->save();

        return redirect()->route('category.index')->with('status','Câp nhật danh mục thành công');
    }

    public function destroy($id)
    {
        Category::find($id)->delete();
        return redirect()->back()->with('status', 'Xóa danh mục thành công');
    }

    public function deleteManyCategory(Request $request){
        $listCategories = $request->get('categories');
        Category::whereIn("id",$listCategories)->delete();
        return redirect()->back()->with('status', 'Xóa chương thành công');
    }
}
