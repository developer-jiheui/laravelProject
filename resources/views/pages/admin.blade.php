@extends('layouts.main')

@section('content')
    <article class="admin active" data-page="admin">
        <header>
            <h2 class="h2 article-title">ADMIN</h2>
        </header>

        <h2 class="h2">User Management</h2>

        <table class="table" style="width: 100%; border-collapse: collapse;">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Comment</th>
                <th>User Type</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr style="border-bottom: 1px solid #ccc;">
                    <td>{{ $user->USER_ID }}</td>
                    <td>{{ $user->FIRST_NAME }} {{ $user->LAST_NAME }}</td>
                    <td>{{ $user->EMAIL }}</td>
                    <td>{{ $user->BIO ?? 'N/A' }}</td>
                    <td>{{ $user->USER_TYPE === 0 ? 'Admin' : 'User' }}</td>
                    <td>
                        @if($user->USER_TYPE !== 0)
                            <form method="POST" action="{{ route('admin.promote', $user->USER_ID) }}" style="display: inline;">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-success">Make Admin</button>
                            </form>
                        @endif

                        <form method="POST" action="{{ route('admin.delete', $user->USER_ID) }}" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete this user?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </article>
@endsection
