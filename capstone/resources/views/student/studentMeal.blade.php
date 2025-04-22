@extends('component.layout')
<link rel="stylesheet" href="{{ asset('css/layout.css') }}">

@section('title', 'Student Meal Consumption')

@section('content')

@include('component.nav')

<div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card mt-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Meal Consumption Tracker</h5>
                            <div class="dropdown">
                                <form action="{{ route('student.mealconsumption.filter') }}" method="post">
                                    <select class="form-select" style="width: 200px;">
                                        <option selected disabled>Choose a date</option>
                                            @for ($i = 0; $i < 7; $i++)
                                                <option value="{{ \Carbon\Carbon::now()->startOfWeek()->addDays($i)->toDateString() }}">
                                                    {{ \Carbon\Carbon::now()->startOfWeek()->addDays($i)->format('l, F j, Y') }}
                                        </option>
                                @endfor
                                    </select>  
                                    </form>              
                            </div>
                        
                            <form method="GET" action="{{ route('student.mealconsumption.filter') }}" class="d-inline">
                        <input type="text" name="search" class="form-control" placeholder="Search by name or ID" style="width: 250px;" value="{{ request('search') }}">
                    </form>
                    </div>  
                    
                    </div>
                    <div class="card-body">
                    <table class="table mt-3">
                    <thead>
                        <tr>
                            <th>Meal ID</th>
                            <th>Meal Name</th>
                            <th>Meal Type</th>
                            <th>Consumption Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($studentMeals as $meal)
                            <tr>
                                <td>{{ $meal->meal_id }}</td>
                                <td>{{ $meal->meal_name }}</td>
                                <td>{{ $meal->meal_type }}</td>
                                <td>{{ $meal->consumption_date }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">No records found</td>
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