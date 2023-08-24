@props(['item'])
        <div class="news-feed-item">
            <p>{{ $item->content }}</p>
            <p style="display: none">{{ $item->created_at}}</p>
            <p class="time-passed"></p>
            @auth
            @if (auth()->user()->role === 'admin') <!-- Show delete button for admin -->
                <form action="/delete-news-feed/{{$item->id}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="delete_newsFeed" type="submit"><i class="fa-solid fa-trash"></i> Delete</button>
                </form>
            @endif
        @endauth
        </div>
        
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                const timePassedElements = document.querySelectorAll('.time-passed');
        
                function updateTimePassed() {
                timePassedElements.forEach(element => {
                const timestampText = element.previousElementSibling.textContent.trim();
                const parsedTimestamp = new Date(timestampText);
                const currentTime = new Date();
                const timeDifference = currentTime - parsedTimestamp;
                const minutesPassed = Math.floor(timeDifference / 60000);
                
                let timePassed;
                if (minutesPassed < 1) {
                    timePassed = 'Just now';
                } else if (minutesPassed < 60) {
                    timePassed = `${minutesPassed} minute${minutesPassed !== 1 ? 's' : ''} ago`;
                } else if (minutesPassed < 1440) { // 60 minutes * 24 hours = 1440 minutes
                    const hoursPassed = Math.floor(minutesPassed / 60);
                    timePassed = `${hoursPassed} hour${hoursPassed !== 1 ? 's' : ''} ago`;
                } else {
                    const daysPassed = Math.floor(minutesPassed / 1440);
                    timePassed = `${daysPassed} day${daysPassed !== 1 ? 's' : ''} ago`;
                }
                
                element.textContent = timePassed;
            });
        }
        
                // Initial update
                updateTimePassed();
        
                // Update time every minute (adjust interval as needed)
                setInterval(updateTimePassed, 60000); // 60000 ms = 1 minute
            });
        </script>