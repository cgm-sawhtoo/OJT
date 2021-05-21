@extends('layouts.app')
@section('title', 'userlist')
@section('user_sidebar')
    @parent
@endsection
@section('news_sidebar')
@endsection
@section('contents')
    <div class="container">
        <div class="own_card">
            <a href="{{route('add#user')}}" class="btn text-light bg-info float-left btn-sm">
                <span class="fa fa-user-plus"></span> Add User
            </a>
            <h4 class="float-right">All Users</h4>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Gender</th>
                        <th>Type</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($allusers as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            @if ($user->gender)
                                <td>Male</td>
                            @else
                                <td>Female</td>
                            @endif
                            @if ($user->is_admin)
                                <td>Admin</td>
                            @else
                                <td>User</td>
                            @endif
                            <td>
                                <a href="{{ route('user#edit', $user->id) }}" class="btn btn-info btn-sm">
                                    <span class="fa fa-edit"></span>
                                </a>
                                <a href="{{ route('user#details', $user->id) }}" class="btn btn-secondary btn-sm">
                                    <span class="fa fa-info-circle"></span>
                                </a>
                                <a href="{{ route('user#delete', $user->id) }}" class="btn btn-danger btn-sm ">
                                    <span class="fa fa-trash"></span>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $allusers->links() }}
        </div>
    </div>
@endsection
