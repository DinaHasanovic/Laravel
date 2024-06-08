<link rel="stylesheet" href="{{ asset('css/tables/manage.css') }}">
<x-layout>
    <h1 class="heading">Post Management</h1>
    @unless ($posts->isEmpty())
    <div class="manage_container">
        <table>
            <thead>
                <tr>
                    <th>Posts</th>
                    <th class="actions">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                <tr class="posts_rows">
                    <td class="post-name"><a href="/posts/{{$post->id}}">{{$post->title}}</a></td>

                    <td class="actions">
                        <button class="edit-button"><a href="/posts/{{$post->id}}/edit"><i class="fa-solid fa-pencil"></i>  Edit</a></button>
                        <form style="display: inline;" method="POST" action="/posts/{{$post->id}}">
                            @csrf
                            @method('DELETE')
                            <button class="delete-button"><i class="fa-solid fa-trash"></i>Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @else
    <div>
        <p>No Posts Found</p>
    </div>
    @endunless

</x-layout>
