@props(['tags'])

@php
    $tagsArray = explode(',', $tags)
@endphp

<ul>
    @foreach ($tagsArray as $tag)
        <li>
            <a href="/?tag={{$tag}}">{{$tag}}</a>
        </li>
    @endforeach
</ul>