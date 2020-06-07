{!! '<?xml version="1.0" encoding="UTF-8"?>' !!}
<feed xmlns="http://www.w3.org/2005/Atom">
    <id>{{ asset('feeds') }}</id>
    <link href="{{ asset('feeds') }}"/>
    <title>
        <![CDATA[ Новости сайта Доктор Лаптев www.doctor-laptev.ru ]]>
    </title>
    <description>Канал об избавлении от пищевой зависимости</description>
    <language>ru-RU</language>
    <updated> {{ $updated }}</updated>
    @foreach($items as $item)
        <entry>
            <title>
                <![CDATA[ {{ $item->title }} ]]>
            </title>
            <link rel="alternate" href="{{ asset( $item->link ) }}"/>
            <id>{{ $item->id }}</id>
            <author>
                <name>
                    <![CDATA[ Лаптев А.В. ]]>
                </name>
            </author>
            <summary type="html">
                <![CDATA[{{ $item->summary }} ]]>
            </summary>
            <category type="html">
                <![CDATA[ ]]>
            </category>
            <updated>{{ $item->created_at }}</updated>
        </entry>
    @endforeach
</feed>
