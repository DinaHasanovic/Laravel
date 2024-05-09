<!-- resources/views/reply/form.blade.php -->

<link rel="stylesheet" href="{{ asset('css/reply.css') }}">
<x-layout>
    <div class="container">
        <div class="komentari">
                <div class="card">

                    <div class="card-body">
                    <form method="POST" action="{{ route('responses.store') }}">
                        @csrf

                        <div class="form-group">
                            <input type="hidden" name="post_id" value="{{ $post->id }}">
                            <!-- Dodajte skriveno polje sa vrednošću ID-a posta -->
                            <label for="content">Tekst komentara:</label><br>
                            <textarea class="form-control" id="content" name="content" rows="6" cols="70" required></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Dodaj komentar</button>
                    </form>

                    </div>
            </div>
        </div>
    </div>
</x-layout>
