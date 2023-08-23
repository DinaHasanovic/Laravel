<link rel="stylesheet" href="{{ asset('css/tables/manage.css') }}">
<x-layout>
    <h1 class="heading">User Management</h1>
    @unless ($users->isEmpty())
    <div class="manage_container">
        <table>
            <thead>
                <tr>
                    <th>Users</th>
                    <th class="actions">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr class="users_rows">
                    <td class="user-name">{{ $user->name }}</td>
                    <td class="actions">
                        <button class="edit-button"><a href="/users/{{ $user->id }}/edit"><i class="fa-solid fa-pencil"></i> Edit</a></button>
                        <form style="display: inline;" method="POST" action="/users/{{ $user->id }}">
                            @csrf
                            @method('DELETE')
                            <button class="delete-button"><i class="fa-solid fa-trash"></i> Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @else
    <div>
        <p>No Users Found</p>
    </div>
    @endunless
</x-layout>
