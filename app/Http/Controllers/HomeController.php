<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use App\Models\Chapper;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $countCategory = Category::count();
        $countChapper = Chapper::count();
        $countUser = User::count();
        $countBook = Book::count();
        $idUser = Auth::user()->id;
        $name = Auth::user()->name;
        $email = Auth::user()->email;
        return view('admincp.home')->with(compact('countCategory', 'countChapper', 'countUser', 'countBook', 'idUser','name','email'));
    }
    public function rules(){
        return view('admincp.rules');
    }
}
