@props(['item'])
        <div class="news-feed-item">
            <p>{{ $item->content }}</p>
            <p>{{ $item->created_at}}</p>
            @if (auth()->user()->role === 'admin') <!-- Show delete button for admin -->
                <form action="/delete-news-feed/{{$item->id}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
                <div class="add-news-feed-form">
                    <form action="/add-news-feed" method="POST">
                        @csrf
                        <label for="content">News Feed Content:</label>
                        <textarea name="content" rows="4" cols="50"></textarea>
                        <button type="submit">Add News Feed</button>
                    </form>
                </div>
            @endif
        </div>