@extends('component.layout')

@section('title', 'User Management')

@section('content')
    @include('component.nav')
    
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card mt-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">User Management</h5>
                        <a href="{{ route('users.create') }}" class="btn btn-success">
                            <i class="fas fa-plus"></i> Add New User
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Middle Name</th>
                                        <th>Role</th>
                                        <th style="width: 200px;">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->first_name }}</td>
                                        <td>{{ $user->last_name }}</td>
                                        <td>{{ $user->middle_name }}</td>
                                        <td>{{ $user->role }}</td>
                                        <td>
                                            <div class="d-flex align-items-center justify-content-end" style="gap: 12px;">
                                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-primary" style="width: 80px; height: 31px; display: inline-flex; align-items: center; justify-content: center;">
                                                    <i class="fas fa-edit"></i> Edit
                                                </a>
                                                <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display: inline-block; margin: 0; padding: 0; line-height: 0;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger" style="width: 80px; height: 31px; display: inline-flex; align-items: center; justify-content: center; margin: 0; padding: 0;" onclick="return confirm('Are you sure you want to delete this user?')">
                                                        <i class="fas fa-trash"></i> Delete
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
