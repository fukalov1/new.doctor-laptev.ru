<?=
/* Using an echo tag here so the `<? ... ?>` won't get parsed as short tags */
'<?xml version="1.0" encoding="UTF-8"?>'.PHP_EOL
?>
<rss version="2.0">
    <channel>
        <title><![CDATA[ Новости сайта Доктор Лаптев www.doctor-laptev.ru ]]></title>
        <link><![CDATA[{{ asset('feeds') }}]]></link>
        <description><![CDATA[ Канал об избавлении от пищевой зависимости ]]></description>
        <language>ru</language>
        <pubDate>{{ $updated }}</pubDate>

        @foreach($items as $item)
            <item turbo="true">
                <title><![CDATA[{{ $item->title }}]]></title>
                <link>{{ url($item->link) }}</link>
                <description><![CDATA[{!! $item->summary !!}]]></description>
                <turbo:content><![CDATA[ {!! $item->anons !!}]]></turbo:content>
                <author><![CDATA[ Лаптев А.В. ]]></author>
                <guid>{{ url($item->id) }}</guid>
                <pubDate>{{ $item->created_at }}</pubDate>
            </item>
        @endforeach
    </channel>
</rss>
