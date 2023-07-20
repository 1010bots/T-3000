<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Request as RequestFacade;
use Corcel\Model\Post;

class BlogPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Cache::remember("post-id-$id", 5 * 60, function () use ($id) {
            $post = Post::status('publish')->find($id);
            $post->content = str_replace('blogarchive.reinhart1010.id/blog/', 'reinhart1010.id/blog/', $post->content);
            $post->post_content = str_replace('blogarchive.reinhart1010.id/blog/', 'reinhart1010.id/blog/', $post->post_content);
            $post->excerpt = str_replace('blogarchive.reinhart1010.id/blog/', 'reinhart1010.id/blog/', $post->excerpt);
            $post->post_excerpt = str_replace('blogarchive.reinhart1010.id/blog/', 'reinhart1010.id/blog/', $post->post_excerpt);
            return $post;
        });
        if (!$post) abort(404);
        if (RequestFacade::query('debug') == "true") return response()->json($post);
        return view('blog-post', ['post' => $post]);
    }

    /**
     * Display the specified resource by slug.
     */
    public function showBySlug(string $slug, string|null $year = null, string|null $month = null, string|null $day = null)
    {
        $post = Cache::remember($year && $month && $day ? "post-$year-$month-$day-$slug" : "post-nd-$slug", 5 * 60, function () use ($slug, $year, $month, $day) {
            $post = Post::status('publish')->slug($slug);
            if (ctype_digit($year) && ctype_digit($month) && ctype_digit($day)) {
                $post = $post->where('post_date', 'LIKE', intval($year) . '-' . sprintf('%02d', intval($month)) . '-' . sprintf('%02d', intval($day)) . '%');
            }
            $post = $post->first();
            $post->content = str_replace('blogarchive.reinhart1010.id/blog/', 'reinhart1010.id/blog/', $post->content);
            $post->post_content = str_replace('blogarchive.reinhart1010.id/blog/', 'reinhart1010.id/blog/', $post->post_content);
            $post->excerpt = str_replace('blogarchive.reinhart1010.id/blog/', 'reinhart1010.id/blog/', $post->excerpt);
            $post->post_excerpt = str_replace('blogarchive.reinhart1010.id/blog/', 'reinhart1010.id/blog/', $post->post_excerpt);
            return $post;
        });
        if (!$post) abort(404);
        if (RequestFacade::query('debug') == "true") return response()->json($post);
        return view('blog-post', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
