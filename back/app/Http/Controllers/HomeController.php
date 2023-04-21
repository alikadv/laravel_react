<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('home');
    }

    public function posts(Request $request)
    {
        $title = $request->input('q');
        $categories = $request->input('categories');

        // Retrieve posts filtered by title and categories and their associated categories
        $posts = Post::where('title', 'LIKE', "%$title%")
                     ->whereHas('categories', function ($query) use ($categories) {
                         $query->whereIn('id', $categories);
                     })
                     ->with('categories')
                     ->get();

        return response()->json(['posts' => $posts], 200);
    }
}
