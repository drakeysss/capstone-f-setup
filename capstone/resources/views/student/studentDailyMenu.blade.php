@extends('component.layout')
<link rel="stylesheet" href="{{ asset('css/layout.css') }}">

@section('title', 'Student Daily Menu')

@section('content')

@include('component.nav')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card mt-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Student Daily Menu</h5>
                    <button class="btn btn-primary" data-toggle="modal" data-target="#editMenuModal">
                        <i class="fas fa-utensils"></i> Edit Menu
                    </button>
                </div>
                <div class="card-body">
                    <table class="table mt-3">
                        <thead>
                            <tr>
                                <th>Meal ID</th>
                                <th>Meal Name</th>
                                <th>Meal Type</th>
                    
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($dailyMenu as $meal)
                                <tr>
                                    <td>{{ $meal->meal_id }}</td>
                                    <td>{{ $meal->meal_name }}</td>
                                    <td>{{ $meal->meal_type }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center">No menu available for today</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>   

                </div>
            </div>
        </div>
    </div>
</div>
@endsection