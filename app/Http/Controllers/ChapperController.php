<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Chapper;
use Illuminate\Http\Request;

class ChapperController extends Controller
{
    public function index($idBook)
    {
        $listChappers = Chapper::with('book')->where('book_id', '=', $idBook)->orderBy('id','desc')->get();
        return view('admincp.chapper.index')->with(compact('idBook','listChappers'));
    }

    public function create($idBook)
    {
        return view('admincp.chapper.create')->with(compact('idBook'));
    }

    public function store(Request $request,$idBook)
    {
        $data = $request->validate(
            [
                'name_chapper' => 'required|max:255',
                'slug' => 'required|max:255',
                'contents' => 'required',
            ],
        );

        $chapper = new Chapper();

        $chapper->book_id = $idBook;

        $chapper->name_chapper = $data['name_chapper'];

        $chapper->slug = $data['slug'];

        $chapper->content = $data['contents'];

        $chapper->save();

        return redirect()->route('book.chappers.index',$idBook)->with('status','Thêm chương mới thành công');
    }

    public function show(Chapper $chapper)
    {

    }

    public function edit($idBook, $idChapper)
    {
        $chapper = Chapper::findOrFail($idChapper);
        return view('admincp.chapper.edit')->with(compact('chapper', 'idChapper','idBook'));
    }

    public function update(Request $request, $idBook, $idChapper)
    {
        $chapper = Chapper::findOrFail($idChapper);

        $chapper->name_chapper = $request->name_chapper;

        $chapper->slug = $request->slug;

        $chapper->book_id = $idBook;

        $chapper->content = $request->contents;

        $chapper->save();

        return redirect()->route('book.chappers.index', $idBook)->with('status','Cập nhật chương thành công');
    }
    public function destroy($idBook, $idChapper)
    {
        $chapper = Chapper::findOrFail($idChapper);
        $chapper->delete();
        return redirect()->route('book.chappers.index',$idBook)->with('status', 'Xóa thành công');
    }
    public function deleteManyChappers(Request $request){
        $listChappers = $request->get('chappers');
        Chapper::whereIn("id",$listChappers)->delete();
        return redirect()->back()->with('status', 'Xóa danh mục thành công');
    }

    public function listChappers(){
        $listChappers = Chapper::with('book')->orderBy('id','desc')->paginate(20);
        return view('admincp.listChappers')->with(compact('listChappers'));
    }
}
