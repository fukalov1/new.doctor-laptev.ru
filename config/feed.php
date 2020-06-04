<?php

return [
    'feeds' => [
        'main' => [
            /*
             * Here you can specify which class and method will return
             * the items that should appear in the feed. For example:
             * 'App\Model@getAllFeedItems'
             *
             * You can also pass an argument to that method:
             * ['App\Model@getAllFeedItems', 'argument']
             */
            'items' => 'App\NewsItem@getFeedItems',

            /*
             * The feed will be available on this url.
             */
            'url' => '/feed',

            'title' => 'Новости сайта Доктор Лаптев www.doctor-laptev.ru',
            'description' => 'Канал об избавлении от пищевой зависимости',
            'language' => 'ru-RU',

            /*
             * The view that will render the feed.
             */
            'view' => 'feed::feed',

            /*
             * The type to be used in the <link> tag
             */
            'type' => 'application/atom+xml',
        ],
    ],
];
