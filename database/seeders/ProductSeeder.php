<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductPublisher;
use App\Models\Publisher;
use App\Models\User;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void {
        $user = User::where('email', env('OWNER_EMAIL', 'user@example.com'))->first();
        $publisher = Publisher::where('slug', env('OWNER_SLUG', 'admin'))->first();
        if (!$publisher) {
            $publisher = Publisher::create([
                'slug' => env('OWNER_SLUG', 'admin'),
                'name' => env('OWNER_NAME', 'Administrator'),
                'status' => 'PUBLISHED',
                'url' => env('OWNER_URL', env('APP_URL', 'http://localhost')),
            ]);
        }
        $product_data = [
            [
                'slug' => 'aep-mobile',
                'name' => 'AEP Mobile',
                'type' => 'app platform:android,ipados,ios research retired with:dart,flutter,laravel,php',
                'status' => 'PUBLISHED',
                'description' => 'Official mobile app for ASEAN Entrepreneurship Profiling.',
                'keywords' => 'aep mobile, asean entrepreneurship profiling',
                'url' => 'https://beentpro-edutech.apps.binus.ac.id',
                'images_schema_version' => 1,
                'images' => json_encode([
                    'preferred_type' => 'cover',
                    'cover' => [
                        'src' => 'https://github.com/webcompat/web-bugs/assets/17312341/7a21c8ed-5dca-4881-a434-b28ceae84523',
                    ],
                ]),
            ],
            [
                'slug' => 'binustoday',
                'name' => 'BINUS Today',
                'type' => 'app website:dev,ui-ux,test webservice:dev,test platform:web with:illuminate with:php',
                'status' => 'PUBLISHED',
                'description' => 'Trending news and articles from over 100 departments, faculties, schools, and student organizations at BINUS University.',
                'keywords' => 'binustoday, binus today, bina nusantara, binus university, satu university',
                'url' => 'https://binustoday.reinhart1010.id',
                'images_schema_version' => 1,
                'images' => json_encode([
                    'preferred_type' => 'cover',
                    'cover' => [
                        'src' => 'https://binustoday.reinhart1010.id/assets/og-cover.jpg',
                    ],
                ]),
            ],
            [
                'slug' => 'binusmayadown',
                'name' => 'BINUSMAYA Down',
                'type' => 'website:dev,test webservice:exec,test platform:web',
                'status' => 'PUBLISHED',
                'description' => 'World Class University pun bisa down. Kamu?',
                'keywords' => 'binusmaya down, bina nusantara, binus university, satu university',
                'url' => 'https://binusmayadown.reinhart1010.id',
                'images_schema_version' => null,
                'images' => null,
            ],
            [
                'slug' => 'ham',
                'name' => 'HAM',
                'type' => 'framework:dev,docs,test platform:jekyll opensource license:mit license:cc-by-sa-4.0 with:halfmoon with:jekyll',
                'status' => 'PUBLISHED',
                'description' => 'Jekyll theme and framework for simple static wiki sites.',
                'keywords' => 'nix, tldr-pages',
                'url' => 'https://ham.reinhart1010.id',
                'images_schema_version' => 1,
                'images' => json_encode([
                    'preferred_type' => 'icon',
                    'icon' => [
                        'src' => 'https://raw.githubusercontent.com/googlefonts/noto-emoji/main/svg/emoji_u1f969.svg',
                    ],
                ]),
            ],
            [
                'slug' => 'himti-emailer',
                'name' => 'HIMTI BINUS Internal Mailing Scheduler',
                'type' => 'script:dev,exec,test retired platform:python with:python with:smtp',
                'status' => 'PUBLISHED',
                'description' => 'Internal tool to schedule HIMTI emails.',
                'keywords' => 'himti binus, socs, school of computer science, bina nusantara, binus university, ofog, one family one goal',
                'url' => 'https://reinhart1010.id/blog/2021/08/16/my-life-as-a-snake-i-mean-a-python3-emailer-robot/',
                'images_schema_version' => null,
                'images' => null,
            ],
            [
                'slug' => 'himti-ofog',
                'name' => 'HIMTI BINUS New Website (2021)',
                'type' => 'website:dev,ui-ux,test retired platform:web with:laravel with:php',
                'status' => 'PUBLISHED',
                'description' => 'Creating new website for HIMTI BINUS University.',
                'keywords' => 'himti binus, socs, school of computer science, bina nusantara, binus university, ofog, one family one goal',
                'url' => 'https://ofog.himti.or.id/',
                'images_schema_version' => 1,
                'images' => json_encode([
                    'preferred_type' => 'cover',
                    'cover' => [
                        'src' => 'https://blogarchive.reinhart1010.id/wp-content/uploads/2023/08/himti-ofog.jpg',
                    ],
                ]),
            ],
            [
                'slug' => 'himti-registration',
                'name' => 'HIMTI BINUS Event Registration',
                'type' => 'app:dev,test,ui-ux website website:dev,test,ui-ux webservice webservice:dev webservice:test retired platform:pwa platform:web with:laravel with:php',
                'status' => 'PUBLISHED',
                'description' => 'Official event registration page of HIMTI BINUS University.',
                'keywords' => 'himti binus, socs, school of computer science, bina nusantara, binus university, ofog, one family one goal',
                'url' => 'https://registration.himtibinus.or.id',
                'images_schema_version' => 1,
                'images' => json_encode([
                    'preferred_type' => 'cover',
                    'cover' => [
                        'src' => 'https://blogarchive.reinhart1010.id/wp-content/uploads/2023/08/himti-unified-registration.jpg',
                    ],
                ]),
            ],
            [
                'slug' => 'huawei-ont-api',
                'name' => 'huawei-ont-api',
                'type' => 'library platform:python opensource license:mit license:cc-by-sa-4.0 release:alpha',
                'status' => 'PUBLISHED',
                'description' => 'Huawei ONT (fiber optic) Python API, in the style of huawei-lte-api.',
                'keywords' => 'huawei-ont-api, huawei-lte-api, huawei ont',
                'url' => 'https://github.com/reinhart1010/huawei-ont-library',
                'images_schema_version' => null,
                'images' => null,
            ],
            [
                'slug' => 'kenangan',
                'name' => 'Kenangan',
                'type' => 'app:dev,test,ui-ux website:dev,test,ui-ux retired platform:android,ipados,ios platform:web with:python with:smtp',
                'status' => 'PUBLISHED',
                'description' => 'Indonesia\'s Social Commerce Platform.',
                'keywords' => 'kenangan',
                'url' => 'https://kenangan.com',
                'images_schema_version' => 1,
                'images' => json_encode([
                    'preferred_type' => 'icon',
                    'icon' => [
                        'src' => 'https://www.kenangan.com/favicon_.png',
                    ],
                ]),
            ],
            [
                'slug' => 'jurusan.js',
                'name' => 'jurusan.js',
                'type' => 'library platform:js opensource license:mit',
                'status' => 'PUBLISHED',
                'description' => 'JavaScript-based autocomplete library for university majors and study programs.',
                'keywords' => 'jurusan.js, himti binus',
                'url' => 'https://github.com/himtibinus/jurusan.js',
                'images_schema_version' => null,
                'images' => null,
            ],
            [
                'slug' => 'nix',
                'name' => 'Nix',
                'type' => 'website opensource license:mit license:cc-by-sa-4.0 with:github-actions with:jekyll',
                'status' => 'PUBLISHED',
                'description' => 'Another tldr-pages web client.',
                'keywords' => 'nix, tldr-pages',
                'url' => 'https://nix.reinhart1010.id',
                'images_schema_version' => 1,
                'images' => json_encode([
                    'preferred_type' => 'icon',
                    'icon' => [
                        'src' => 'https://blogarchive.reinhart1010.id/wp-content/uploads/2021/10/bust-nix.png',
                    ],
                ]),
            ],
            [
                'slug' => 'not-colors',
                'name' => 'not-colors',
                'type' => 'library platform:node opensource license:mit',
                'status' => 'PUBLISHED',
                'description' => 'A fork of the `colors` Node.js library without liberty surprises.',
                'keywords' => 'nix, tldr-pages',
                'url' => 'https://github.com/reinhart1010/not-colors',
                'images_schema_version' => null,
                'images' => null,
            ],
            [
                'slug' => 'polri-super-app',
                'name' => 'POLRI Super App',
                'type' => 'app app:testing app:ui-ux retired',
                'status' => 'PUBLISHED',
                'description' => 'Official mobile superapp for Indonesian Police Force (POLRI).',
                'keywords' => 'polri super app, polri superapp presisi polri, polri satukan aplikasi',
                'url' => 'https://github.com/reinhart1010/not-colors',
                'images_schema_version' => 1,
                'images' => json_encode([
                    'preferred_type' => 'cover',
                    'cover' => [
                        'src' => 'https://blogarchive.reinhart1010.id/wp-content/uploads/2023/08/polri-super-app.jpg',
                    ],
                ]),
            ],
            [
                'slug' => 'psedb',
                'name' => 'PSEDB',
                'type' => 'website opensource license:expat,mit,odbl-1.0 with:github-actions,github-pages,go',
                'status' => 'PUBLISHED',
                'description' => 'Open Database and API for Indonesian Electronic System Operator (ESO/PSE).',
                'keywords' => 'psedb, kominfo, kominfo pse, kominfo eso',
                'url' => 'https://psedb.reinhart1010.id',
                'images_schema_version' => null,
                'images' => null,
            ],
            [
                'slug' => 'reinhart-maps',
                'name' => 'Reinhart Maps',
                'type' => 'app platform:shortcuts,pwa,web with:cloudflare-pages,cloudflare-r2,remix',
                'status' => 'PUBLISHED',
                'description' => 'Share your favorite place with their favorite maps!',
                'keywords' => 'reinhart maps, convert map links, map converter',
                'url' => 'https://maps.reinhart1010.id',
                'images_schema_version' => 1,
                'images' => json_encode([
                    'preferred_type' => 'icon',
                    'icon' => [
                        'src' => 'https://maps.reinhart1010.id/android-chrome-192x192.png',
                    ],
                ]),
            ],
            [
                'slug' => 'tldr-pages',
                'name' => 'tldr-pages',
                'type' => 'content:docs,review opensource',
                'status' => 'PUBLISHED',
                'description' => '📚 Collaborative cheatsheets for console commands.',
                'keywords' => 'tldr pages, man pages',
                'url' => 'https://tldr.sh',
                'images_schema_version' => 1,
                'images' => json_encode([
                    'preferred_type' => 'cover',
                    'cover' => [
                        'src' => 'https://repository-images.githubusercontent.com/15019962/aa6a8d00-b4a3-11ea-92f4-5cca1da75be2',
                    ],
                ]),
            ],
        ];
        Product::upsert($product_data, ['slug']);
        foreach ($product_data as $product) {
            $product_id = Product::where('slug', $product['slug'])->first()->id;
            ProductPublisher::upsert([
                'product_id' => $product_id,
                'publisher_id' => $publisher->id,
            ], ['product_id', 'publisher_id']);
        }
    }
}
