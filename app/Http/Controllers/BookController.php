<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Book;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    public function index(){

        $list_books = Book::with('category')->orderBy('id','DESC')->get();

        $count_listBook = Book::count();

        return view('admincp.book.index')->with(compact('list_books','count_listBook'));
    }
    public function create(){
        
        $list_categories = Category::all();

        $count_categories = DB::table('categories')->count();

        return view('admincp.book.create')->with(compact('list_categories','count_categories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate(
            [
                'name' => 'required|unique:books|max:255',
                'slug' => 'required|unique:books|max:255',
                'description' => 'required',
                'author' => 'required|max:40',
                'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg,webp|max:2048',
            ],
        );

        $book = new Book();

        $book->name = $data['name'];

        $book->slug = $data['slug'];
        
        $book->description = $data['description'];
        
        $book->author = $data['author'];

        $book->outstanding = $request->outstanding;
        
        $book->category_id = $request->category_id;
        
        $book->active = $request->active;

        $book->created_at = Carbon::now('Asia/Ho_Chi_Minh');
        
        $get_image = $request->image;

        $path = 'uploads/books';

        $get_name_image = $get_image->getClientOriginalName();

        $name_image = current(explode('.',$get_name_image));

        $new_image = $name_image.rand(0,99). '.'.$get_image->getClientOriginalExtension();

        $get_image->move($path, $new_image);

        $book->image = $new_image;

        $book->save();

        return redirect()->route('book.index')->with('status','Add story book success');
    }
    public function show( Request $request)
    {

    }

    public function edit($id)
    {
        $book = Book::find($id);

        $list_categories = Category::all();

        $count_categories = DB::table('categories')->count();

        return view('admincp.book.edit')->with(compact('book', 'list_categories','count_categories'));
    }

    public function update(Request $request, $id)
    {
        $book = Book::find($id);

        $book->name = $request->name;

        $book->slug = $request->slug;
        
        $book->description = $request->description;
        
        $book->author = $request->author;

        $book->outstanding = $request->outstanding;
        
        $book->category_id = $request->category_id;
        
        $book->active = $request->active;

        $book->updated_at = Carbon::now('Asia/Ho_Chi_Minh');

        $get_image = $request->image;

        if($get_image){
            $path = 'uploads/books/'.$book->image;

            if(file_exists($path)){
                unlink($path);
            }

            $path = 'uploads/books';

            $get_name_image = $get_image->getClientOriginalName();

            $name_image = current(explode('.',$get_name_image));

            $new_image = $name_image.rand(0,99). '.'.$get_image->getClientOriginalExtension();

            $get_image->move($path, $new_image);

            $book->image = $new_image;
        }

        $book->save();
        
        return redirect()->back()->with('status','Update story book success');
    }

    public function destroy($id)
    {
        $book = Book::find($id);
        $path = 'uploads/books/'.$book->image;
        if(file_exists($path)){
            unlink($path);
        }
        Book::find($id)->delete();
        return redirect()->back()->with('status', 'Xóa thành công');
    }
}
