@extends('component.layout') <!-- Main layout -->
@section('title', 'Student Home')

@section('content')
    @include('component.nav') <!-- Include navigation bar -->

    <link rel="stylesheet" href="{{ asset('css/layout.css') }}">

    <div class="content-wrapper">
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <h4>Home</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="savedOrdersTable">
                            <thead>
                                <tr>
                                    <th>Description</th>
                                    <th>Quantity</th>
                                    <th>Unit</th>
                                    <th>Unit Price</th>
                                    <th>Cost</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

   
    
    <script src="{{ asset('js/studentHome.js') }}" defer></script>

    @endsection