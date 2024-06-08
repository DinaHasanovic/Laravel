@props(['post', 'userSubscribedPosts'])

@php
    use Illuminate\Support\Str;
@endphp

<link rel="stylesheet" href="{{ asset('css/post-card.css') }}">
<div class="posts_Item">
    <div class="posts_Image">
        <img src="{{ asset('storage/' . $post->image) }}" alt="Image" style="color: white; text-align:center; border-radius:20px">
    </div>
    <div class="posts_Content">
        <a href="posts/{{$post['id']}}" class="posts_Title">{{$post->title}}</a>

        <h3 class="posts_Text">{{ Str::limit($post->description, 150) }}</h3>
        @php
            $user = Auth::user();
            $subscribedPostIds = $user->subscribed_posts ?? [];
            $isSubscribed = in_array($post->id, $subscribedPostIds);
        @endphp
        <button class="subscribe-button" data-post-id="{{ $post->id }}">
            {{ $isSubscribed ? 'Unsubscribe' : 'Subscribe' }}
        </button>
        @if ($user && $user->role == 'moderator')
            <button class="delete-button" data-post-id="{{ $post->id }}">Delete</button>
        @endif
        <h3 class="post_createDate">Created: {{$post->created_at->format('Y-m-d')}}</h3>
    </div>
</div>

<script>
    document.querySelectorAll('.subscribe-button').forEach(button => {
        button.addEventListener('click', function() {
            const postId = this.getAttribute('data-post-id');
            const subscribeUrl = this.innerText === 'Subscribe' ? "{{ route('subscribe.post') }}" : "{{ route('unsubscribe.post') }}";
            const csrfToken = "{{ csrf_token() }}";

            fetch(subscribeUrl, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                },
                body: JSON.stringify({ post_id: postId })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    this.innerText = this.innerText === 'Subscribe' ? 'Unsubscribe' : 'Subscribe';
                    alert(data.message);
                } else {
                    alert('Operation failed!');
                }
            })
            .catch(error => console.error('Error:', error));
        });
    });

    document.querySelectorAll('.delete-button').forEach(button => {
        button.addEventListener('click', function() {
            if (!confirm('Are you sure you want to delete this post?')) {
                return;
            }

            const postId = this.getAttribute('data-post-id');
            const deleteUrl = "{{ route('posts.destroy', ':id') }}".replace(':id', postId);
            const csrfToken = "{{ csrf_token() }}";

            fetch(deleteUrl, {
                method: 'DELETE',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    this.closest('.posts_Item').remove();
                    alert(data.message);
                } else {
                    alert('Deletion failed!');
                }
            })
            .catch(error => console.error('Error:', error));
        });
    });
</script>
