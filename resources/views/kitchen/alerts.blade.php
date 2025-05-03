@extends('layouts.app')

@section('content')


    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">All Alerts</h6>
                    <div class="dropdown">
                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" id="filterDropdown" data-bs-toggle="dropdown">
                            Filter
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">All</a></li>
                            <li><a class="dropdown-item" href="#">Inventory</a></li>
                            <li><a class="dropdown-item" href="#">Equipment</a></li>
                            <li><a class="dropdown-item" href="#">Menu</a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    <div class="list-group">
                        <!-- High Priority Alert -->
                        <div class="list-group-item list-group-item-danger">
                            <div class="d-flex w-100 justify-content-between">
                                <h6 class="mb-1">Critical Low Stock Alert</h6>
                                <small>5 mins ago</small>
                            </div>
                            <p class="mb-1">Rice stock has reached critical level (below 10%)</p>
                            <div class="d-flex justify-content-between align-items-center mt-2">
                                <small class="text-danger">High Priority</small>
                                <button class="btn btn-sm btn-outline-danger">Take Action</button>
                            </div>
                        </div>

                        <!-- Medium Priority Alert -->
                        <div class="list-group-item list-group-item-warning">
                            <div class="d-flex w-100 justify-content-between">
                                <h6 class="mb-1">Equipment Maintenance Required</h6>
                                <small>1 hour ago</small>
                            </div>
                            <p class="mb-1">Oven #2 requires scheduled maintenance</p>
                            <div class="d-flex justify-content-between align-items-center mt-2">
                                <small class="text-warning">Medium Priority</small>
                                <button class="btn btn-sm btn-outline-warning">Schedule</button>
                            </div>
                        </div>

                        <!-- Low Priority Alert -->
                        <div class="list-group-item">
                            <div class="d-flex w-100 justify-content-between">
                                <h6 class="mb-1">Menu Update Notification</h6>
                                <small>2 hours ago</small>
                            </div>
                            <p class="mb-1">New menu items have been added for next week</p>
                            <div class="d-flex justify-content-between align-items-center mt-2">
                                <small class="text-info">Low Priority</small>
                                <button class="btn btn-sm btn-outline-info">View Details</button>
                            </div>
                        </div>

                        <!-- System Alert -->
                        <div class="list-group-item">
                            <div class="d-flex w-100 justify-content-between">
                                <h6 class="mb-1">System Maintenance</h6>
                                <small>1 day ago</small>
                            </div>
                            <p class="mb-1">Scheduled system maintenance on Sunday at 2 AM</p>
                            <div class="d-flex justify-content-between align-items-center mt-2">
                                <small class="text-secondary">System</small>
                                <button class="btn btn-sm btn-outline-secondary">Acknowledge</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Settings Card -->
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Notification Settings</h6>
                </div>
                <div class="card-body">
                    <form>
                        <div class="mb-3">
                            <label class="form-label">Alert Preferences</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" checked>
                                <label class="form-check-label">
                                    Email Notifications
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" checked>
                                <label class="form-check-label">
                                    System Notifications
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" checked>
                                <label class="form-check-label">
                                    Mobile Push Notifications
                                </label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Save Settings</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
