<?php

namespace App\Http\Controllers;

use Corcel\Model\Post;
use Corcel\Model\User;
use Corcel\Model\Taxonomy;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Request as RequestFacade;
use Mpdf\HTMLParserMode;
use Mpdf\Mpdf;

class BlogPostController extends Controller
{
    /**
     * Utility method to replace blogarchive links
     * @param   Post    $post The post object
     * @return  Post    the modified post object
     */
    public static function replaceLinks(Post $post) {
        $post->content = str_replace('http://blogarchive.reinhart1010.id/blog/', env('APP_URL', 'http://127.0.0.1') . '/blog/', $post->content);
        $post->content = str_replace('https://blogarchive.reinhart1010.id/blog/', env('APP_URL', 'http://127.0.0.1') . '/blog/', $post->content);
        $post->content = str_replace('blogarchive.reinhart1010.id/blog/', env('APP_URL', 'http://127.0.0.1') . '/blog/', $post->content);
        $post->post_content = str_replace('http://blogarchive.reinhart1010.id/blog/', env('APP_URL', 'http://127.0.0.1') . '/blog/', $post->post_content);
        $post->post_content = str_replace('https://blogarchive.reinhart1010.id/blog/', env('APP_URL', 'http://127.0.0.1') . '/blog/', $post->post_content);
        $post->post_content = str_replace('blogarchive.reinhart1010.id/blog/', env('APP_URL', 'http://127.0.0.1') . '/blog/', $post->post_content);
        $post->excerpt = str_replace('http://blogarchive.reinhart1010.id/blog/', env('APP_URL', 'http://127.0.0.1') . '/blog/', $post->excerpt);
        $post->excerpt = str_replace('https://blogarchive.reinhart1010.id/blog/', env('APP_URL', 'http://127.0.0.1') . '/blog/', $post->excerpt);
        $post->excerpt = str_replace('blogarchive.reinhart1010.id/blog/', env('APP_URL', 'http://127.0.0.1') . '/blog/', $post->excerpt);
        $post->post_excerpt = str_replace('http://blogarchive.reinhart1010.id/blog/', env('APP_URL', 'http://127.0.0.1') . '/blog/', $post->post_excerpt);
        $post->post_excerpt = str_replace('https://blogarchive.reinhart1010.id/blog/', env('APP_URL', 'http://127.0.0.1') . '/blog/', $post->post_excerpt);
        $post->post_excerpt = str_replace('blogarchive.reinhart1010.id/blog/', env('APP_URL', 'http://127.0.0.1') . '/blog/', $post->post_excerpt);
        return $post;
    }

    /**
     * Utility method to find post by WordPress post ID
     * @param   string      $id   The post ID
     * @return  mixed               The blog post content, if available
     */
    public static function getPostById(string $id) {
        return Cache::remember('post-id-$id', 15 * 60, function () use ($id) {
            $post = Post::status('publish')->find($id);
            if ($post) {
                $post = BlogPostController::replaceLinks($post);
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
                $post = BlogPostController::replaceLinks($post);
            }
            return $post;
        });
    }

    /**
     * Utility method to display post content
     */
    public function displayPost(mixed $post) {
        if (!$post) abort(404);
        $author = User::find($post->post_author);

        $taxonomies = BlogPostController::parseTaxonomies($post);

        if (RequestFacade::has('embed')) return view('blog-post.embed', ['post' => $post]);
        else if (RequestFacade::has('pdf')) {
            $created_at = new Carbon($post->post_date);
            $pdf = Cache::remember($post->post_type == 'post' ? ('post-' . $created_at->format('Y-m-d') . '-' . $post->post_name . '-pdf') : ('post-nd-' . $post->post_name . '-pdf'), 15 * 60, function () use ($post) {
                // Workaround for mpdf
                $post->content = str_replace("https://reinhart1010.id/wp-content/uploads/", "https://blogarchive.reinhart1010.id/wp-content/uploads/", $post->content);
                $post->post_content = str_replace("https://reinhart1010.id/wp-content/uploads/", "https://blogarchive.reinhart1010.id/wp-content/uploads/", $post->post_content);

                $defaultConfig = (new \Mpdf\Config\ConfigVariables())->getDefaults();
                $fontDirs = $defaultConfig['fontDir'];
                $defaultFontConfig = (new \Mpdf\Config\FontVariables())->getDefaults();
                $fontData = $defaultFontConfig['fontdata'];

                $mpdf = new Mpdf([
                    'fontDir' => array_merge($fontDirs, [
                        public_path() . '/fonts/static',
                    ]),
                    'fontdata' => $fontData + [ // lowercase letters only in font key
                        'bumilarasselatan' => [
                            'R' => 'BLS-Regular.ttf',
                            'I' => 'BLS-Italic.ttf',
                            'B' => 'BLS-Bold.ttf',
                            'BI' => 'BLS-BoldItalic.ttf',
                        ]
                    ],
                    'default_font' => 'bumilarasselatan'
                ]);
                $mpdf->showImageErrors = true;
                $mpdf->WriteHTML(view('blog-post.print', ['post' => $post, 'pdf' => true])->render(), HTMLParserMode::HTML_BODY);
                return $mpdf->Output();
            });
            return response($pdf)->header('Content-Type', 'application/pdf');
        }
        else if (RequestFacade::has('print')) return view('blog-post.print', ['post' => $post]);
        else if (RequestFacade::query('debug') == "true") return response()->json([
            'post' => $post,
            'taxonomies' => $taxonomies,
            // 'author' => $author,
        ]);
        return view('blog-post.reader', ['post' => $post, 'author' => $author, 'taxonomies' => $taxonomies]);
    }

    /**
     * Utility function to filter out WordPress taxonomies
     */
    public static function parseTaxonomies(Post $post) {
        // Quickly filter out post categories, kinds, and tags
        $taxonomies = (object) [
            'categories' => [],
            'feeds' => [],
            'kind' => null,
            'language' => null,
            'tags' => [],
        ];
        
        if (isset($post->taxonomies)) {
            foreach ($post->taxonomies as $item) {
                if (!isset($item->taxonomy)) continue;
                switch ($item->taxonomy) {
                    case 'category':
                        array_push($taxonomies->categories, $item);
                        break;
                    case 'kind':
                        // There can only be one kind
                        $taxonomies->kind = $item;
                        break;
                    case 'post_tag':
                        if (str_starts_with($item->term->slug, 'feed-')) {
                            $splits = explode('-', $item->term->slug, 1);
                            if (count($splits) == 2) {
                                array_push($taxonomies->feeds, $item);
                            }
                        } else switch ($item->term->slug) {
                            case 'english':
                                $taxonomies->language = (object) [
                                    'code' => 'en',
                                    'name' => 'English',
                                ];
                                break;
                            case 'indonesian':
                                $taxonomies->language = (object) [
                                    'code' => 'id',
                                    'name' => 'Indonesian',
                                ];
                                break;
                            default:
                                array_push($taxonomies->tags, $item);
                        }
                        break;
                }
            }
        }
        return $taxonomies;
    }

    /**
     * Display a listing of the resource.
     */
    public function index($taxonomy = null, $taxonomy_slug = null, $start_date = null, $end_date = null)
    {
        $current_page = request()->get('page', 1);
        $index_title = 'Blog Posts';

        // Channels are just special tags
        $is_channel = $taxonomy == 'channel';
        if ($is_channel) {
            $taxonomy = 'post_tag';
            $taxonomy_slug = "feed-$taxonomy_slug";
        }

        if (isset($taxonomy) && strlen($taxonomy) > 0 && isset($taxonomy_slug) && strlen($taxonomy_slug) > 0) {
            $taxonomy_detail = Taxonomy::where('taxonomy', $taxonomy)->slug($taxonomy_slug)->first();
            if (!$taxonomy_detail) abort(404);
            switch ($taxonomy) {
                case 'category':
                    $index_title = "Blog posts from $taxonomy_detail->name ($taxonomy_slug)";
                    break;
                case 'kind':
                    $index_title = "Blog posts categorized as $taxonomy_detail->name";
                    break;
                case 'post_tag':
                    if ($is_channel) {
                        $index_title = "Blog posts from the $taxonomy_detail->name channel (@$taxonomy_slug)";
                    } else {
                        $index_title = "Blog posts from $taxonomy_detail->name (#$taxonomy_slug)";
                    }
                    break;
            }
        }
        $posts = Cache::remember('posts-' . ((strlen($taxonomy) > 0 && strlen($taxonomy_slug) > 0) ? ("$taxonomy-$taxonomy_slug") : '') . '-' . (strlen($start_date) > 0 ? $start_date : '_') . '_' . (strlen($end_date) > 0 ? $end_date : '_') . '-' . $current_page, 60, function () use ($taxonomy, $taxonomy_slug) {
            $query = Post::type('post')->status('publish')->where('post_title', '!=', '')->where('post_type', 'post');
            if (isset($taxonomy) && strlen($taxonomy) > 0 && isset($taxonomy_slug) && strlen($taxonomy_slug) > 0) {
                $query = $query->taxonomy($taxonomy, strtolower($taxonomy_slug));
            }
            return $query->orderBy('post_date_gmt', 'desc')->paginate(12);
        });
        if (count($posts) == 0) abort(404);
        return view('blog-index', ['posts' => $posts, 'index_title' => $index_title]);
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
