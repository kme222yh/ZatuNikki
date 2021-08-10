<?php
/**
 * @see https://github.com/artesaos/seotools
 */

return [
    'meta' => [
        /*
         * The default configurations to be used by the meta generator.
         */
        'defaults'       => [
            'title'        => env('APP_NAME', 'ざつにっき'), // set false to total remove
            'titleBefore'  => false, // Put defaults.title before page title, like 'It's Over 9000! - Dashboard'
            'description'  => env('APP_DESCRIPTION', 'ここは日記帳です'), // set false to total remove
            'separator'    => ' | ',
            'keywords'     => ['diary'],
            'canonical'    => false, // Set null for using Url::current(), set false to total remove
            'robots'       => false, // Set to 'all', 'none' or any combination of index/noindex and follow/nofollow
        ],
        /*
         * Webmaster tags are always added.
         */
        'webmaster_tags' => [
            'google'    => null,
            'bing'      => null,
            'alexa'     => null,
            'pinterest' => null,
            'yandex'    => null,
            'norton'    => null,
        ],

        'add_notranslate_class' => false,
    ],
    'opengraph' => [
        /*
         * The default configurations to be used by the opengraph generator.
         */
        'defaults' => [
            'title'       => env('APP_NAME', 'ざつにっき'), // set false to total remove
            'description' => env('APP_DESCRIPTION', 'ここは日記帳です'), // set false to total remove
            'url'         => false, // Set null for using Url::current(), set false to total remove
            'type'        => 'website',
            'site_name'   => 'ざつにっき',
            'images'      => [env('APP_URL', '').'/app_image.png'],
        ],
    ],
    'twitter' => [
        /*
         * The default values to be used by the twitter cards generator.
         */
        'defaults' => [
            'card'        => 'summary_large_image',
            'site'        => '@zatunikki',
        ],
    ],
    'json-ld' => [
        /*
         * The default configurations to be used by the json-ld generator.
         */
        'defaults' => [
            'title'       => env('APP_NAME', 'ざつにっき'), // set false to total remove
            'description' => env('APP_DESCRIPTION', 'ここは日記帳です'), // set false to total remove
            'url'         => false, // Set null for using Url::current(), set false to total remove
            'type'        => 'WebPage',
            'images'      => [env('APP_URL', '').'/app_image.png'],
        ],
    ],
];
