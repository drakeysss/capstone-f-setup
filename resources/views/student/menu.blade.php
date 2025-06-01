@extends('layouts.app')

@section('content')
<ul class="nav nav-tabs" id="menuTab" role="tablist">
    <li class="nav-item" role="presentation">
        <button class="nav-link active" id="week1-tab" data-bs-toggle="tab" data-bs-target="#week1" type="button" role="tab">Week 1 & 3</button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="week2-tab" data-bs-toggle="tab" data-bs-target="#week2" type="button" role="tab">Week 2 & 4</button>
    </li>
</ul>
<div class="tab-content mt-3" id="menuTabContent">
    <div class="tab-pane fade show active" id="week1" role="tabpanel">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Day</th>
                        <th>Breakfast</th>
                        <th>Lunch</th>
                        <th>Dinner</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($week1And3Orders as $day => $orders)
                    <tr>
                        <td class="align-middle">{{ $day }}</td>
                        @foreach(['Breakfast', 'Lunch', 'Dinner'] as $mealType)
                        <td>
                            @php
                                $order = $orders->firstWhere('meal_type', $mealType);
                            @endphp
                            @if($order)
                                <div>
                                    <div style="font-weight: bold;">{{ $order->menu_item }}</div>
                                    <div style="font-size: 0.9em; color: #888;">
                                        <span>Ingredients:</span>
                                        <ul style="padding-left: 20px; margin-bottom: 0;">
                                            @foreach(explode(',', $order->ingredients) as $ingredient)
                                                <li><small>{{ trim($ingredient) }}</small></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            @else
                                <div><span style="font-weight: bold;">No menu set</span></div>
                            @endif
                        </td>
                        @endforeach
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="tab-pane fade" id="week2" role="tabpanel">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Day</th>
                        <th>Breakfast</th>
                        <th>Lunch</th>
                        <th>Dinner</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($week2And4Orders as $day => $orders)
                    <tr>
                        <td class="align-middle">{{ $day }}</td>
                        @foreach(['Breakfast', 'Lunch', 'Dinner'] as $mealType)
                        <td>
                            @php
                                $order = $orders->firstWhere('meal_type', $mealType);
                            @endphp
                            @if($order)
                                <div>
                                    <div style="font-weight: bold;">{{ $order->menu_item }}</div>
                                    <div style="font-size: 0.9em; color: #888;">
                                        <span>Ingredients:</span>
                                        <ul style="padding-left: 20px; margin-bottom: 0;">
                                            @foreach(explode(',', $order->ingredients) as $ingredient)
                                                <li><small>{{ trim($ingredient) }}</small></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            @else
                                <div><span style="font-weight: bold;">No menu set</span></div>
                            @endif
                        </td>
                        @endforeach
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
