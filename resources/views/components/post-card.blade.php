@props(['post'])

@php
    use Illuminate\Support\Str;
@endphp

<link rel="stylesheet" href="{{ asset('css/post-card.css') }}">
<div class="posts_Item">
    <div class="posts_Image">
        <img src="{{ asset('storage/' . $post->image) }}" alt="Image" style="color: white; text-align:center;  border-radius:20px">
    </div>
    <div class="posts_Content">
        <a href="posts/{{$post['id']}}" class="posts_Title">{{$post->title}}</a>
        
        <h3 class="posts_Text">{{ Str::limit($post->description, 150) }}</h3>

        <h3 class="post_createDate">Created: {{$post->created_at->format('Y-m-d')}}</h3>
    </div>
</div>
