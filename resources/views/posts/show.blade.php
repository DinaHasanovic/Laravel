<x-layout>
<link rel="stylesheet" href="{{ asset('css/post.css') }}">
<div class="post_Body">
    <div class="post_Container">
        <div class="post_Image">
            <img src="{{ asset('storage/' . $post->image) }}" alt="Specijaliteti restorana" style="color: white; text-align:center; border-radius:8px">
        </div>
        <div class="post_Info">
            <h2 class="post_Title">{{$post['title']}}</h2>
            <h3 class="post_Description">{{$post['description']}}</h3>
            <div class="post_Details">
                <p><strong>By:</strong><span> {{$post->user->name}}</span></p>
                <p><strong>Time needed to prepare:</strong><span> {{$post['duration']}} hours</span></p>
            </div>
            <div class="post_ReplyButton">
                <a href="{{ route('reply.form', ['postId' => $post->id]) }}" class="reply_button">Odgovori</a>

                </div>
        </div>
    </div>


    <div class="comments">
        @foreach ($responses as $response)
            <div class="comment">
                <p><strong>{{$response->user->name}}:</strong> {{$response->content}}</p>
            </div>
        @endforeach
        </div>
    </div>
</x-layout>
