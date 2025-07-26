<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Work;
use App\Models\Category;
use Illuminate\Http\Request;

class WorkController extends Controller
{

    //Halaman Work
    public function index(){
        $works = Work::latest()->get();
        return view('pages.works.index',[
        'title' => 'My Works',
        'works' => $works
        ]);
    }

    //halaman Detail Work atau detail dari 1 project
    public function work(Work $work){
            return view('pages.works.work',[
                'title' => $work->title,
                'work' => $work
            ]);
    }

    //halaman Show All Works atau menampilkan semua project
    public function works(Request $request){
        $works = Work::latest()->filter($request->only(['searching', 'category', 'creator']))->paginate(10)->withQueryString();
        // $work = Work::with('category')->latest()->first();
        //Nilai default dari title
        $title = 'All Projects';
        $firstTitle = 'This Is';
        //Jika query string ?category=
        if($request->filled('category')){
            $firstTitle = 'Projects By Category';
            $title = Category::where('slug', $request->category)->value('name'); //hanya ambil kolom name
        }
        //Jika query string ?user=
        if($request->filled('creator')){
            $firstTitle = 'Projects By Creator';
            $title =  User::where('username', $request->creator)->value('username'); //hanya ambil kolom username
        }

        //Menampilkan halaman yang berisi semua project
        return view('pages.works.show', [
            'firstTitle' => $firstTitle,
            'title' =>$title,
            'show' => $works
        ]);
    }

    //halaman Show All Works atau menampilkan semua project dari seorang Creator
    public function users(User $user){
        return view('pages.works.show', [
            'title' => count($user->work) . " Project By Creator " . $user->username,
            'show' => $user->work
        ]);
    }

}
