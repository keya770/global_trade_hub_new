<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BlogPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogPosts = BlogPost::with('author')->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.blog-posts.index', compact('blogPosts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $authors = User::all();
        return view('admin.blog-posts.create', compact('authors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:blog_posts',
            'excerpt' => 'nullable|string',
            'content' => 'required|string',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'author_name' => 'nullable|string|max:255',
            'author_id' => 'nullable|exists:users,id',
            'category' => 'nullable|string|max:100',
            'tags' => 'nullable|array',
            'tags.*' => 'string|max:50',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'is_published' => 'boolean',
            'published_at' => 'nullable|date',
        ]);

        // Generate slug if not provided
        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['title']);
        }

        // Handle file upload
        if ($request->hasFile('featured_image')) {
            $imagePath = $request->file('featured_image')->store('blog-posts', 'public');
            $validated['featured_image'] = $imagePath;
        }

        // Set author name if author_id is provided
        if (!empty($validated['author_id'])) {
            $author = User::find($validated['author_id']);
            $validated['author_name'] = $author->name;
        }

        $validated['is_published'] = $request->has('is_published');
        $validated['published_at'] = $validated['is_published'] ? ($validated['published_at'] ?? now()) : null;
        $validated['tags'] = $validated['tags'] ?? [];

        BlogPost::create($validated);

        return redirect()->route('admin.blog-posts.index')
            ->with('success', 'Blog post created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $blogPost = BlogPost::with('author')->findOrFail($id);
        return view('admin.blog-posts.show', compact('blogPost'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $blogPost = BlogPost::findOrFail($id);
        $authors = User::all();
        return view('admin.blog-posts.edit', compact('blogPost', 'authors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $blogPost = BlogPost::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:blog_posts,slug,' . $id,
            'excerpt' => 'nullable|string',
            'content' => 'required|string',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'author_name' => 'nullable|string|max:255',
            'author_id' => 'nullable|exists:users,id',
            'category' => 'nullable|string|max:100',
            'tags' => 'nullable|array',
            'tags.*' => 'string|max:50',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'is_published' => 'boolean',
            'published_at' => 'nullable|date',
        ]);

        // Generate slug if not provided
        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['title']);
        }

        // Handle file upload
        if ($request->hasFile('featured_image')) {
            // Delete old image if exists
            if ($blogPost->featured_image) {
                Storage::disk('public')->delete($blogPost->featured_image);
            }
            
            $imagePath = $request->file('featured_image')->store('blog-posts', 'public');
            $validated['featured_image'] = $imagePath;
        }

        // Set author name if author_id is provided
        if (!empty($validated['author_id'])) {
            $author = User::find($validated['author_id']);
            $validated['author_name'] = $author->name;
        }

        $validated['is_published'] = $request->has('is_published');
        $validated['published_at'] = $validated['is_published'] ? ($validated['published_at'] ?? now()) : null;
        $validated['tags'] = $validated['tags'] ?? [];

        $blogPost->update($validated);

        return redirect()->route('admin.blog-posts.index')
            ->with('success', 'Blog post updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $blogPost = BlogPost::findOrFail($id);

        // Delete featured image if exists
        if ($blogPost->featured_image) {
            Storage::disk('public')->delete($blogPost->featured_image);
        }

        $blogPost->delete();

        return redirect()->route('admin.blog-posts.index')
            ->with('success', 'Blog post deleted successfully.');
    }

    /**
     * Toggle the published status of a blog post.
     */
    public function togglePublished(string $id)
    {
        $blogPost = BlogPost::findOrFail($id);
        $blogPost->update([
            'is_published' => !$blogPost->is_published,
            'published_at' => !$blogPost->is_published ? now() : null
        ]);

        return response()->json([
            'success' => true,
            'is_published' => $blogPost->is_published,
            'message' => 'Publication status updated successfully.'
        ]);
    }

    /**
     * Increment the view count for a blog post.
     */
    public function incrementViews(string $id)
    {
        $blogPost = BlogPost::findOrFail($id);
        $blogPost->incrementViews();

        return response()->json([
            'success' => true,
            'views_count' => $blogPost->views_count
        ]);
    }
}
