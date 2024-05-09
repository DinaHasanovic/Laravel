<link rel="stylesheet" href="{{ asset('css/tables/manage.css') }}">
<x-layout>
    <h1 class="heading">User Management</h1>
    @unless ($users->isEmpty())
    <div class="manage_container">
        <table>
            <thead>
                <tr>
                    <th>Users</th>
                    <th>Role</th>
                    <th class="actions">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr class="users_rows">
                    <td class="user-name"><img style="width:30px; height:30px; border-radius:8px; margin-right:10px" src="{{ asset('storage/' . $user->picture) }}" alt="{{ $user->name }}">  {{ $user->name }}</td>
                    <td class="user-role">{{ $user->role }}</td>
                    <td class="actions">
                        @if ($user->role === 'student')
                            <form style="display: inline;" method="POST" action="/users/{{ $user->id }}/promote">
                                @csrf
                                <button class="edit-button" ><i class="fa-solid fa-arrow-up"></i> Promote to Moderator</button>
                            </form>
                        @elseif ($user->role === 'moderator')
                             <form  style="display: inline;" method="POST" action="/users/{{ $user->id }}/demote">
                                @csrf
                                <button class="edit-button" ><i class="fa-solid fa-arrow-down"></i> Demote to Student</button>
                            </form>
                        @endif
                        <form style="display: inline;" method="POST" action="/users/{{ $user->id }}" id="delete-form-{{ $user->id }}">
                            @csrf
                            @method('DELETE')
                            <button class="delete-button" onclick="confirmDelete({{ $user->id }})"><i class="fa-solid fa-trash"></i> Delete</button>
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


<script>
    function confirmDelete(userId) {
        if (confirm('Are you sure you want to delete this user?')) {
            // If user confirms, submit the form
            document.getElementById('delete-form-' + userId).submit();
        }
    }
</script>
