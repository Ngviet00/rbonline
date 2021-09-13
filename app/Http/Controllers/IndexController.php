<?php
namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Book;
use App\Models\Chapper;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function index()
    {
        $book = Book::with('category')
                    ->where("active", "=", 1)
                    ->where("category_id", '!=' ,3)
                    ->whereIn("outstanding", [ 1,0 ])
                    ->orderBy('id','desc')
                    ->get();

        $listOutStandingBooks = $book->where('outstanding',1)->take(6);

        $listNewBooks = $book->where('outstanding',0)->take(6);

        $listNewUpdateBooks = Chapper::with('book')
                            ->whereIn('id', [DB::raw("(select max(`id`) FROM chappers group by book_id)")])
                            ->orderBy('id', 'DESC')
                            ->limit(15)
                            ->get();
        return view('pages.home')
                ->with(compact('listOutStandingBooks','listNewBooks', 'listNewUpdateBooks')
        );
    }
    public function show($slug){

         $book = Book::where('slug','=',$slug)->first();

         $listChappers = Chapper::where('book_id', '=', $book->id)->paginate(20);

         $numberListChapper = count($listChappers);

         $listRelativeBooks = Book::with('category')
                                    ->where('category_id', '=', $book->category_id)
                                    ->whereNotIn('id',[$book->id])->limit(6)
                                    ->get();
         return view('pages.detail')
                ->with(compact(
                        'book',
                        'listChappers',
                        'numberListChapper',
                        'listRelativeBooks'
                ));
    }

     public function chapper($slug_book, $slug_chapper){

         $book = Book::with('category')->where('slug',$slug_book)->first();

         $list_chappers = Chapper::where('book_id', $book->id)->get();

         $currenChapper = Chapper::with('book')
                                 ->where('book_id', $book->id)
                                 ->where('slug',$slug_chapper)
                                 ->first();

         $prevChapper = Chapper::with('book')
                         ->select('slug')
                         ->where('book_id', $book->id)
                         ->where('id', '<', $currenChapper->id)
                         ->orderBy('id', 'DESC')
                         ->first();

         $nextChapper = Chapper::with('book')
                         ->where('book_id', $book->id)
                         ->where('id', '>', $currenChapper->id)
                         ->orderBy('id', 'ASC')
                         ->first();

         if ($prevChapper != null){
             $prev = $prevChapper->slug;
         }else{
             $prev = null;
         }
         if ($nextChapper != null){
             $next = $nextChapper->slug;
         }else{
             $next = null;
         }

         $maxId = Chapper::where('book_id', $book->id)->orderBy('id','DESC')->first();

         $minId = Chapper::where('book_id', $book->id)->orderBy('id','ASC')->first();

         return view('pages.chapper')
            ->with(compact(
                'currenChapper',
                'book',
                'list_chappers',
                'prev',
                'next',
                'minId',
                'maxId'));
     }

    public function category($slug){
         $category = Category::where('slug','=',$slug)->first();

         $list_books_by_slug = Book::with('category')->where('category_id', $category->id)->get();

         return view('pages.category')
                ->with(compact(
                    'category',
                    'list_books_by_slug'));

    }

    public function search(){

         $value = $_GET['q'];

         $data = Book::where('name', 'like', '%'.$value.'%')
                       ->orWhere('description', 'like', '%'.$value.'%')
                       ->get();
         return view('pages.search')->with(compact('data'));
    }
    public function filter(){
        return view('pages.filter');
    }
}
