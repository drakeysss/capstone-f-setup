@extends('layouts.app')

@section('content')
<div class="container-fluid p-4">
    <div class="row">
        <div class="col-12 mb-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Menu</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <!-- Menu Categories -->
                        <div class="col-md-3 mb-4">
                            <div class="list-group">
                                <a href="#" class="list-group-item list-group-item-action active">
                                    All Items
                                </a>
                                <a href="#" class="list-group-item list-group-item-action">
                                    Main Course
                                </a>
                                <a href="#" class="list-group-item list-group-item-action">
                                    Side Dishes
                                </a>
                                <a href="#" class="list-group-item list-group-item-action">
                                    Beverages
                                </a>
                                <a href="#" class="list-group-item list-group-item-action">
                                    Desserts
                                </a>
                            </div>
                        </div>

                        <!-- Menu Items -->
                     

                                <div class="col-md-4 mb-4">
                                    <div class="card h-100">
                                        <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Food Image">
                                        <div class="card-body">
                                            <h5 class="card-title">Vegetable</h5>
                                            <p class="card-text text-muted">Mixed vegetables</p>
                                            <div class="d-flex justify-content-between align-items-center">
                                                
                    
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 mb-4">
                                    <div class="card h-100">
                                        <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Food Image">
                                        <div class="card-body">
                                            <h5 class="card-title">Fried Fish</h5>
                                            <p class="card-text text-muted">Fried fish</p>
                                            <div class="d-flex justify-content-between align-items-center">                                                
                                                
                                             
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection

@push('styles')
<style>
    .card-img-top {
        height: 200px;
        object-fit: cover;
    }
    .list-group-item.active {
        background-color: var(--primary-color);
        border-color: var(--primary-color);
    }
</style>
@endpush
