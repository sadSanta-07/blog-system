<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\Blog;
use App\Models\Admin;

class DatabaseSeeder extends Seeder {
    public function run(): void {
        // Admin
        Admin::create([
            'name' => 'Admin',
            'email' => 'admin@blog.com',
            'password' => Hash::make('admin123'),
        ]);

        // Categories
        $categories = ['Admit Card', 'Result', 'Answer Key', 'Recruitment', 'Syllabus'];
        foreach ($categories as $cat) {
            Category::create([
                'name' => $cat,
                'slug' => Str::slug($cat),
            ]);
        }

        // Blogs
        $categoryIds = Category::pluck('id')->toArray();
        for ($i = 1; $i <= 12; $i++) {
            $title = "Sample Blog Post $i";
            Blog::create([
                'title' => $title,
                'slug' => Str::slug($title),
                'short_description' => "This is a short description for blog post number $i. It gives a quick overview of the content.",
                'content' => "This is the full content of blog post $i. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.",
                'image' => null,
                'category_id' => $categoryIds[array_rand($categoryIds)],
                'published_date' => now()->subDays(rand(1, 60))->toDateString(),
            ]);
        }
    }
}