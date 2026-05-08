<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::with('category')->latest()->get();

        return view('admin.blogs.index', compact('blogs'));
    }

    public function create()
    {
        $categories = Category::all();

        return view('admin.blogs.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'             => 'required',
            'short_description' => 'required',
            'content'           => 'required',
            'category_id'       => 'required',
            'published_date'    => 'required|date',
            'image'             => 'nullable|image|max:2048',
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {

            $image = $request->file('image');

            $imageName = time() . '_' . $image->getClientOriginalName();

            $destinationPath = $_SERVER['DOCUMENT_ROOT'] . '/storage/blogs';

            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0777, true);
            }

            $image->move($destinationPath, $imageName);

            $imagePath = 'blogs/' . $imageName;
        }

        Blog::create([
            'title'             => $request->title,
            'slug'              => Str::slug($request->title) . '-' . time(),
            'short_description' => $request->short_description,
            'content'           => $request->content,
            'category_id'       => $request->category_id,
            'published_date'    => $request->published_date,
            'image'             => $imagePath,
        ]);

        return redirect()
            ->route('admin.blogs.index')
            ->with('success', 'Blog created!');
    }

    public function edit(Blog $blog)
    {
        $categories = Category::all();

        return view('admin.blogs.edit', compact('blog', 'categories'));
    }

    public function update(Request $request, Blog $blog)
    {
        $request->validate([
            'title'             => 'required',
            'short_description' => 'required',
            'content'           => 'required',
            'category_id'       => 'required',
            'published_date'    => 'required|date',
            'image'             => 'nullable|image|max:2048',
        ]);

        $imagePath = $blog->image;

        if ($request->hasFile('image')) {

            $image = $request->file('image');

            $imageName = time() . '_' . $image->getClientOriginalName();

            $destinationPath = $_SERVER['DOCUMENT_ROOT'] . '/storage/blogs';

            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0777, true);
            }

            $image->move($destinationPath, $imageName);

            $imagePath = 'blogs/' . $imageName;
        }

        $blog->update([
            'title'             => $request->title,
            'slug'              => Str::slug($request->title) . '-' . time(),
            'short_description' => $request->short_description,
            'content'           => $request->content,
            'category_id'       => $request->category_id,
            'published_date'    => $request->published_date,
            'image'             => $imagePath,
        ]);

        return redirect()
            ->route('admin.blogs.index')
            ->with('success', 'Blog updated!');
    }

    public function destroy(Blog $blog)
    {
        $blog->delete();

        return back()->with('success', 'Blog deleted!');
    }
}