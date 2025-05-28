@extends('layouts.app')

@section('content')
<div class="notifications-container">
    <div class="notifications-card">
        <div class="notifications-header">
            <h2>Alerts & Notifications</h2>
            <label class="toggle">
                <input type="checkbox" id="notifToggle" checked>
                <span class="toggle-label">Meal Plan Updates</span>
            </label>
        </div>

        <div class="notifications-list">
            <div class="notification-item alert">
                <div class="notification-content">
                    <div class="notification-title">
                        <span class="icon">⚠️</span>
                        Ingredient Alert
                    </div>
                    <div class="notification-text">
                        Today's meal contains [ingredient]. Make sure it's safe for you.
                    </div>
                </div>
                <div class="notification-time">2 mins ago</div>
            </div>

            <div class="notification-item update">
                <div class="notification-content">
                    <div class="notification-title">
                        <span class="icon">📅</span>
                        Schedule Update
                    </div>
                    <div class="notification-text">
                        Meal schedule updated! Check the new weekly plan.
                    </div>
                </div>
                <div class="notification-time">1 hour ago</div>
            </div>

            <div class="notification-item feedback">
                <div class="notification-content">
                    <div class="notification-title">
                        <span class="icon">💬</span>
                        Feedback
                    </div>
                    <div class="notification-text">
                        How was your meal today? Share your thoughts!
                    </div>
                </div>
                <div class="notification-time">Yesterday</div>
            </div>
        </div>

        <div class="notifications-actions">
            <button class="btn secondary">Mark all as read</button>
            <button class="btn danger">Clear all</button>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
.notifications-container {
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
}

.notifications-card {
    background: white;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    overflow: hidden;
}

.notifications-header {
    background: #2c3e50;
    color: white;
    padding: 15px 20px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.notifications-header h2 {
    margin: 0;
    font-size: 20px;
}

.toggle {
    display: flex;
    align-items: center;
    gap: 10px;
    cursor: pointer;
}

.toggle input {
    display: none;
}

.toggle-label {
    position: relative;
    display: inline-block;
    width: 50px;
    height: 24px;
    background: #ccc;
    border-radius: 12px;
    transition: background 0.3s;
}

.toggle-label:after {
    content: '';
    position: absolute;
    width: 20px;
    height: 20px;
    border-radius: 50%;
    background: white;
    top: 2px;
    left: 2px;
    transition: transform 0.3s;
}

.toggle input:checked + .toggle-label {
    background: #27ae60;
}

.toggle input:checked + .toggle-label:after {
    transform: translateX(26px);
}

.notifications-list {
    padding: 20px;
}

.notification-item {
    padding: 15px;
    border-bottom: 1px solid #eee;
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    transition: background-color 0.2s;
}

.notification-item:hover {
    background: #f8f9fa;
}

.notification-content {
    flex: 1;
}

.notification-title {
    font-weight: 600;
    margin-bottom: 5px;
    display: flex;
    align-items: center;
    gap: 8px;
}

.notification-text {
    color: #666;
}

.notification-time {
    color: #999;
    font-size: 0.9em;
}

.notifications-actions {
    padding: 15px 20px;
    border-top: 1px solid #eee;
    display: flex;
    justify-content: flex-end;
    gap: 10px;
}

.btn {
    padding: 8px 16px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-weight: 500;
    transition: background-color 0.2s;
}

.btn.secondary {
    background: #f0f0f0;
    color: #333;
}

.btn.secondary:hover {
    background: #e0e0e0;
}

.btn.danger {
    background: #e74c3c;
    color: white;
}

.btn.danger:hover {
    background: #c0392b;
}

.alert .notification-title { color: #e74c3c; }
.update .notification-title { color: #3498db; }
.feedback .notification-title { color: #2ecc71; }
</style>
@endpush
