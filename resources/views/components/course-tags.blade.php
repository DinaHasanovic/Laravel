@props(['tags'])

@php
    $tagsArray = explode(',', $tags)
@endphp

<div class="courses_tags">
    @foreach ($tagsArray as $tag)
        <a href="/?tag={{$tag}}">{{$tag}}</a>
    @endforeach
</div>