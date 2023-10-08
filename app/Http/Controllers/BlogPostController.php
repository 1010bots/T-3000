<?php

namespace App\Http\Controllers;

use Corcel\Model\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Request as RequestFacade;

class BlogPostController extends Controller
{
    /**
     * Utility method to find post by WordPress post ID
     * @param   string      $id   The post ID
     * @return  mixed               The blog post content, if available
     */
    public static function getPostById(string $id) {
        return Cache::remember('post-id-$id', 15 * 60, function () use ($id) {
            $post = Post::status('publish')->find($id);
            if ($post) {
                $post->content = str_replace('blogarchive.reinhart1010.id/blog/', env('APP_URL', 'http://127.0.0.1') . '/blog/', $post->content);
                $post->post_content = str_replace('blogarchive.reinhart1010.id/blog/', env('APP_URL', 'http://127.0.0.1') . '/blog/', $post->post_content);
                $post->excerpt = str_replace('blogarchive.reinhart1010.id/blog/', env('APP_URL', 'http://127.0.0.1') . '/blog/', $post->excerpt);
                $post->post_excerpt = str_replace('blogarchive.reinhart1010.id/blog/', env('APP_URL', 'http://127.0.0.1') . '/blog/', $post->post_excerpt);
            }
            return $post;
        });
    }

    /**
     * Utility method to find post by slug or date
     * @param   string      $slug   The post slug
     * @param   string|null $year   The post year (optional)
     * @param   string|null $month  The post month (optional)
     * @param   string|null $day    The post day of month (optional)
     * @return  mixed               The blog post content, if available
     */
    public static function getPostBySlug(string $slug, string|null $year = null, string|null $month = null, string|null $day = null) {
        return Cache::remember($year && $month && $day ? "post-$year-$month-$day-$slug" : "post-nd-$slug", 15 * 60, function () use ($slug, $year, $month, $day) {
            $post = Post::status('publish')->slug($slug);
            if (ctype_digit($year) && ctype_digit($month) && ctype_digit($day)) {
                $post = $post->where('post_date', 'LIKE', intval($year) . '-' . sprintf('%02d', intval($month)) . '-' . sprintf('%02d', intval($day)) . '%');
            }
            $post = $post->first();
            if ($post) {
                $post->content = str_replace('blogarchive.reinhart1010.id/blog/', env('APP_URL', 'http://127.0.0.1') . '/blog/', $post->content);
                $post->post_content = str_replace('blogarchive.reinhart1010.id/blog/', env('APP_URL', 'http://127.0.0.1') . '/blog/', $post->post_content);
                $post->excerpt = str_replace('blogarchive.reinhart1010.id/blog/', env('APP_URL', 'http://127.0.0.1') . '/blog/', $post->excerpt);
                $post->post_excerpt = str_replace('blogarchive.reinhart1010.id/blog/', env('APP_URL', 'http://127.0.0.1') . '/blog/', $post->post_excerpt);
            }
            return $post;
        });
    }

    /**
     * Utility method to display post content
     */
    public function displayPost(mixed $post) {
        if (!$post) abort(404);
        if (RequestFacade::has('embed')) return view('blog-post.embed', ['post' => $post]);
        if (RequestFacade::query('debug') == "true") return response()->json($post);
        return view('blog-post.reader', ['post' => $post]);
    }

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
        return $this->displayPost($this->getPostById($id));
    }

    /**
     * Display the specified resource by slug.
     */
    public function showBySlug(string $slug, string|null $year = null, string|null $month = null, string|null $day = null)
    {
        return $this->displayPost($this->getPostBySlug($slug, $year, $month, $day));
    }

    /**
     * Display the resource for oEmbed API
     * + Required: url
     * + Optional: format, maxheight, maxwidth
     */
    public function oEmbed(Request $request) {
        $url = $request->get('url');
        if (!filter_var($url, FILTER_VALIDATE_URL)) response()->json(['status' => 'KO', 'error' => 'OEMBED_INVALID_URL'], 400);

        $format = $request->get('format', $request->accepts('application/json') ? 'json' : 'xml');
        if ($format != 'json' || $format != 'xml') response()->json(['status' => 'KO', 'error' => 'OEMBED_INVALID_OUTPUT_FORMAT'], 400);

        $height = intval($request->get('maxheight', 512));
        $width = intval($request->get('maxwidth', 512));

        $paths = explode('/', parse_url($url, PHP_URL_PATH));
        array_shift($paths);
        $oembed_data = [];

        if ($paths[0] == 'blog' && isset($paths[1]) && isset($paths[2]) && isset($paths[3]) && isset($paths[4])) {
            $post = $this->getPostBySlug($paths[4], $paths[1], $paths[2], $paths[3]);
            if (!$post) abort(404);

            // Correct post URL if possible
            $created_at = new Carbon($post->created_at);
            $canonical = null;
            if ($post->post_type == 'post') {
                $canonical = env('APP_URL', 'http://127.0.0.1') . '/blog/' . $created_at->format('Y/m/d') . '/' . $post->post_name;
            } else {
                $canonical = $canonical = env('APP_URL', 'http://127.0.0.1') . '/' . $post->post_name;
            }

            // Get post thumbnail
            $thumbnail_url = null; $thumbnail_height = null; $thumbnail_width = null;
            if (isset($post->thumbnail)) {
                foreach ($post->thumbnail['attachment']['meta'] as $meta) {
                    if ($meta['meta_key'] != '_wp_attachment_metadata' || !isset($meta['value']) || !isset($meta['value']['sizes'])) continue;
                    preg_match('/([\s\S]+?)\/wp-content\/uploads\/(\d+)\/(\d+)\//', $post->thumbnail['attachment']['url'], $url_parts);
                    if (count($url_parts) == 0) continue;
                    foreach ($meta['value']['sizes'] as $type => $size) {
                        if ($type == 'post-thumbnail') {
                            $thumbnail_url = $url_parts[1] . '/wp-content/uploads/' . $url_parts[2] . '/' . $url_parts[3] . '/' . $size['file'];
                            $thumbnail_height = $size['height'];
                            $thumbnail_width = $size['width'];
                        };
                    }
                }
            }

            $oembed_data['version'] = '1.0';
            if ($height >= 512 && $width >= 512) {
                $oembed_data['type'] = 'rich';
                $oembed_data['html'] = '<iframe src="' . $canonical . '?embed" height="' . $height . '" width="' . $width . '" style="border:none;"></iframe>';
                $oembed_data['height'] = $height;
                $oembed_data['width'] = $width;
            } else {
                $oembed_data['type'] = 'link';
            }

            $oembed_data['provider_name'] = env('APP_NAME', 'Laravel');
            $oembed_data['provider_url'] = env('APP_URL', 'http://127.0.0.1');
            $oembed_data['title'] = $post->post_title;
            $oembed_data['url'] = $canonical;

            if ($thumbnail_url && $thumbnail_height && $thumbnail_width) {
                $oembed_data['thumbnail_url'] = $thumbnail_url;
                $oembed_data['thumbnail_height'] = $thumbnail_height;
                $oembed_data['thumbnail_width'] = $thumbnail_width;
            }
        }

        if (count($oembed_data) > 0) {
            switch ($format) {
                case 'json':
                    return response()->json($oembed_data);
                case 'xml':
                    return response()->xml($oembed_data, 200, [], 'oembed');
            }
        }

        return response()->json(['status' => 'KO', 'error' => 'OEMBED_NOT_IMPLEMENTED'], 501);
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
