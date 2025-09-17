<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of blog posts.
     */
    public function index()
    {
        // Get published blog posts with pagination
        $blogPosts = BlogPost::published()
            ->latest()
            ->paginate(9);

        // Get categories for filtering
        $categories = BlogPost::published()
            ->distinct()
            ->pluck('category')
            ->filter()
            ->values();

        // Get statistics
        $stats = [
            'total_posts' => BlogPost::published()->count(),
            'total_views' => BlogPost::published()->sum('views_count'),
            'categories' => $categories->count(),
        ];

        return view('blog', compact('blogPosts', 'categories', 'stats'));
    }

    /**
     * Display the specified blog post.
     */
    public function show(BlogPost $blogPost)
    {
        // Increment view count
        $blogPost->incrementViews();

        // Get related blog posts
        $relatedPosts = BlogPost::published()
            ->where('id', '!=', $blogPost->id)
            ->where(function($query) use ($blogPost) {
                $query->where('category', $blogPost->category)
                      ->orWhere('content', 'like', '%' . $blogPost->title . '%');
            })
            ->take(3)
            ->get();

        // Get recent posts
        $recentPosts = BlogPost::published()
            ->where('id', '!=', $blogPost->id)
            ->latest()
            ->take(5)
            ->get();

        return view('blog.show', compact('blogPost', 'relatedPosts', 'recentPosts'));
    }

    /**
     * Filter blog posts by category.
     */
    public function category($category)
    {
        $blogPosts = BlogPost::published()
            ->where('category', $category)
            ->latest()
            ->paginate(9);

        $categories = BlogPost::published()
            ->distinct()
            ->pluck('category')
            ->filter()
            ->values();

        return view('blog', compact('blogPosts', 'categories', 'category'));
    }
}
