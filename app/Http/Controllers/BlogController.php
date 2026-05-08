<?php
namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;

class BlogController extends Controller {
    public function index(Request $request) {
        $categories = Category::all();
        $query = Blog::with('category');

        if ($request->ajax()) {
            if ($request->category && $request->category != 'all') {
                $query->where('category_id', $request->category);
            }
            if ($request->date) {
                $query->whereDate('published_date', $request->date);
            }
            if ($request->search) {
                $query->where('title', 'like', '%' . $request->search . '%')
                      ->orWhere('short_description', 'like', '%' . $request->search . '%');
            }
            $blogs = $query->latest()->get();
            return response()->json([
                'html' => view('partials.blog-cards', compact('blogs'))->render()
            ]);
        }

        $blogs = $query->latest()->get();
        return view('blogs.index', compact('blogs', 'categories'));
    }

    public function show($slug) {
        $blog = Blog::with('category')->where('slug', $slug)->firstOrFail();
        $categories = Category::all();
        return view('blogs.show', compact('blog', 'categories'));
    }
}