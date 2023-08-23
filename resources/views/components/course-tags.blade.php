@props(['tags'])

@php
    $tagsArray = explode(',', $tags);
    $tagsCount = count($tagsArray);
@endphp

    @foreach ($tagsArray as $index =>$tag)
        <a class="course_tag" href="/?tag={{$tag}}">{{$tag}}</a>
        @if ($index < $tagsCount - 1)
        ,
    @endif
    @endforeach