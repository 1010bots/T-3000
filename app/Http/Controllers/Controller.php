<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Corcel\Model\Post;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Response;
use stdClass;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function universalSearch(Request $request) {
        $query = $request->get('q', $request->get('query'));
        if (!$query || strlen($query) == 0) {
            return Response::json([
                'status' => 'KO', 'error' => 'BAD_REQUEST'
            ], 400);
        }

        $query = strtolower($query);
        $res = Cache::remember('search-results-all-'. $query, 5 * 60, function () use ($query, $request) {
            /* Legal Documentation */
            $legal_index = Cache::remember('search-index-legal', 6 * 60 * 60, function () {
                $json = Http::get('https://legal.reinhart1010.id/assets/search.json')->json();
                $index = [];
                // TODO: Rewrite jekyll-simple-search in PHP
                // https://github.com/christian-fei/Simple-Jekyll-Search/blob/master/dest/simple-jekyll-search.js#L172
                foreach ($json as $i => $entry) {
                    if (!isset($entry['title'])) continue;
                    foreach (explode(" ", str_replace(['/'], ' ', strtolower($entry['title']))) as $segment) {
                        if (!isset($index[$segment])) $index[$segment] = [];
                        array_push($index[$segment], $i);
                    }
                }
                $res = new stdClass();
                $res->entries = $json;
                $res->index = $index;
                return $res;
            });
            $legal_index_results = [];
            foreach (explode(" ", str_replace(['/'], ' ', $query)) as $segment) {
                if (isset($legal_index->index[$segment])) {
                    foreach ($legal_index->index[$segment] as $i) {
                        if (!isset($legal_index_results[$i])) $legal_index_results[$i] = 0;
                        $legal_index_results[$i]++;
                    }
                }
            }
            ksort($legal_index_results);
            $legal_results = [];
            foreach ($legal_index_results as $i => $relevance) {
                $entry = $legal_index->entries[$i];
                $entry['post_title'] = $entry['title'];
                $entry['post_date_gmt'] = $entry['date'];
                $entry['_fuzzy_relevance_'] = '' . $relevance;
                $entry['url'] = 'https://legal.reinhart1010.id' . $entry['url'];
                array_push($legal_results, $entry);
            }

            /* Nix */
            $nix_index = Cache::remember('search-index-nix', 6 * 60 * 60, function () {
                $json = Http::get('https://nix.reinhart1010.id/assets/search.json')->json();
                $index = [];
                // TODO: Rewrite jekyll-simple-search in PHP
                // https://github.com/christian-fei/Simple-Jekyll-Search/blob/master/dest/simple-jekyll-search.js#L172
                foreach ($json as $i => $entry) {
                    if (!isset($entry['title'])) continue;
                    foreach (explode(" ", str_replace(['/'], ' ', strtolower($entry['title']))) as $segment) {
                        if (!isset($index[$segment])) $index[$segment] = [];
                        array_push($index[$segment], $i);
                    }
                }
                $res = new stdClass();
                $res->entries = $json;
                $res->index = $index;
                return $res;
            });
            $nix_index_results = [];
            foreach (explode(" ", str_replace(['/'], ' ', $query)) as $segment) {
                if (isset($nix_index->index[$segment])) {
                    foreach ($nix_index->index[$segment] as $i) {
                        if (!isset($nix_index_results[$i])) $nix_index_results[$i] = 0;
                        $nix_index_results[$i]++;
                    }
                }
            }
            ksort($nix_index_results);
            $nix_results = [];
            foreach ($nix_index_results as $i => $relevance) {
                $entry = $nix_index->entries[$i];
                $entry['post_title'] = $entry['title'];
                $entry['post_date_gmt'] = $entry['date'];
                $entry['_fuzzy_relevance_'] = '' . $relevance;
                $entry['url'] = 'https://nix.reinhart1010.id' . $entry['url'];
                array_push($nix_results, $entry);
            }

            /* Shift's Digital Garden */
            $shift_index = Cache::remember('search-index-shift', 6 * 60 * 60, function () {
                $json = Http::get('https://shift.reinhart1010.id/assets/search.json')->json();
                $index = [];
                // TODO: Rewrite jekyll-simple-search in PHP
                // https://github.com/christian-fei/Simple-Jekyll-Search/blob/master/dest/simple-jekyll-search.js#L172
                foreach ($json as $i => $entry) {
                    if (!isset($entry['title'])) continue;
                    foreach (explode(" ", str_replace(['/'], ' ', strtolower($entry['title']))) as $segment) {
                        if (!isset($index[$segment])) $index[$segment] = [];
                        array_push($index[$segment], $i);
                    }
                }
                $res = new stdClass();
                $res->entries = $json;
                $res->index = $index;
                return $res;
            });
            $shift_index_results = [];
            foreach (explode(" ", str_replace(['/'], ' ', $query)) as $segment) {
                if (isset($shift_index->index[$segment])) {
                    foreach ($shift_index->index[$segment] as $i) {
                        if (!isset($shift_index_results[$i])) $shift_index_results[$i] = 0;
                        $shift_index_results[$i]++;
                    }
                }
            }
            ksort($shift_index_results);
            $shift_results = [];
            foreach ($shift_index_results as $i => $relevance) {
                $entry = $shift_index->entries[$i];
                $entry['post_title'] = $entry['title'];
                $entry['post_date_gmt'] = $entry['date'];
                $entry['_fuzzy_relevance_'] = '' . $relevance;
                $entry['url'] = 'https://shift.reinhart1010.id' . $entry['url'];
                array_push($shift_results, $entry);
            }

            /* WordPress Blog Posts */
            $wordpress_results = Cache::remember('search-results-wordpress-' . $query, 5 * 60, function () use ($query) {
                return Post::status('publish')->whereFuzzy('post_title', $query)->orWhereFuzzy('post_excerpt', $query)->get();
            });
            // Correct post URL if possible
            foreach ($wordpress_results as $post) {
                $created_at = new Carbon($post->created_at);
                $canonical = null;
                if ($post->post_type == 'post') {
                    $canonical = 'https://reinhart1010.id/blog/' . $created_at->format('Y/m/d') . '/' . $post->post_name;
                } else {
                    $canonical = $canonical = 'https://reinhart1010.id/' . $post->post_name;
                }
                $post->url = $canonical;
            }

            return [
                'legal' => $legal_results,
                'shift' => $shift_results,
                'nix' => $nix_results,
                'wordpress' => $wordpress_results,
            ];
        });

        return Response::json($res);
    }
}
