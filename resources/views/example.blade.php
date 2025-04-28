@extends('component.layout')

@section('title', 'Example Page')

@section('content')
    @include('component.nav')
    
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card mt-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Example Page</h5>
                        <button class="btn btn-primary">
                            <i class="fas fa-plus"></i> Add New
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Column 1</th>
                                        <th>Column 2</th>
                                        <th>Column 3</th>
                                        <th style="width: 200px;">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Data 1</td>
                                        <td>Data 2</td>
                                        <td>Data 3</td>
                                        <td>
                                            <div class="d-flex align-items-center justify-content-end" style="gap: 12px;">
                                                <a href="#" class="btn btn-sm btn-primary" style="width: 80px; height: 31px; display: inline-flex; align-items: center; justify-content: center;">
                                                    <i class="fas fa-edit"></i> Edit
                                                </a>
                                                <form action="#" method="POST" style="display: inline-block; margin: 0; padding: 0; line-height: 0;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger" style="width: 80px; height: 31px; display: inline-flex; align-items: center; justify-content: center; margin: 0; padding: 0;" onclick="return confirm('Are you sure you want to delete this item?')">
                                                        <i class="fas fa-trash"></i> Delete
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection 