@extends('layouts.main')

@section('content')
    <article class="admin active" data-page="admin">
        <header>
            <h2 class="h2 article-title">ADMIN</h2>
        </header>

        <table class="admin-table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                {{--                <th>Comment</th>--}}
                <th>User Type</th>
                <th>Action</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->USER_ID }}</td>
                    <td>{{ $user->FIRST_NAME }} {{ $user->LAST_NAME }}</td>
                    <td>{{ $user->EMAIL }}</td>
                    {{--                    <td>{{ $user->BIO ?? 'N/A' }}</td>--}}
                    <td>{{ $user->USER_TYPE === 0 ? 'Admin' : 'User' }}</td>

                    <td>
                        {{-- Promote to Admin --}}
                        @if($user->USER_TYPE !== 0)
                            <form method="POST" action="{{ route('admin.promote', $user->USER_ID) }}">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-success">Make Admin</button>
                            </form>
                        @else
                            {{-- Demote to User --}}

                            <form method="POST" action="{{ route('admin.demote', $user->USER_ID) }}">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-warning">Make User</button>
                            </form>
                        @endif
                    </td>



                    {{-- Delete --}}
                    <td>
                        @if($user->USER_ID !== auth()->id())
                            <form method="POST" action="{{ route('admin.delete', $user->USER_ID) }}" onsubmit="return confirm('Are you sure you want to delete this user?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </article>
@endsection
