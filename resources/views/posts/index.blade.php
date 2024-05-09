<x-layout>
    @include('partials._search')
<link rel="stylesheet" href="{{ asset('css/posts.css') }}">
<div class="posts_Body">
    <div class="newsFeed">
        <h2>News Feed</h2>
        @foreach ($newsFeed as $item)
        <x-newsFeed  :item="$item"/>
        @endforeach
        @auth
            @if (auth()->user()->role === 'admin')
                <div class="add-news-feed-form">
                    <form action="/add-news-feed" method="POST">
                        @csrf
                        <label for="content">News Feed Content:</label>
                        <textarea name="content" rows="4" cols="50"></textarea>
                        <button type="submit"><i class="fa-solid fa-circle-plus"></i> Add News Feed</button>
                    </form>
                </div>
            @endif
        @endauth
    </div>
    <div class="posts_Grid">
        @unless (count($posts) == 0)

            @foreach ($posts as $post)
                <x-post-card :post="$post" />
            @endforeach

            @else
                <div>
                    <p>No Posts Found</p>
                </div>
        @endunless
    </div>

</div>


<div class="p-6">
    {{$posts->links()}}
</div>

<div>
    @if (auth()->check())
        @if (auth()->user()->role === 'student')
            <form class="create_postButton" action="/apply-for-moderator" method="POST">
                @csrf
                <button> <i class="fas fa-user-graduate"></i> Apply for Moderator</button>
            </form>
        @elseif (auth()->user()->role === 'moderator')
            <div class="create_postButton">
                <a href="/posts/create"><i class="fa-solid fa-circle-plus"></i> Create Post</a>
            </div>
        @endif
    @endif
</div>
</x-layout>
