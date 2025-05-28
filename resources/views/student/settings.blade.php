@extends('layouts.app')

@section('content')
<div class="settings-container">
    <div class="settings-header">
        <h2>Account Settings</h2>
    </div>

    <div class="settings-grid">
        <div class="settings-card">
            <h3>Profile Information</h3>
            <form class="settings-form">
                <div class="form-group">
                    <label for="name">Full Name</label>
                    <input type="text" id="name" value="John Doe" class="form-input">
                </div>
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" value="john@example.com" class="form-input">
                </div>
                <div class="form-group">
                    <label for="phone">Phone Number</label>
                    <input type="tel" id="phone" value="+1 234 567 890" class="form-input">
                </div>
                <button type="submit" class="btn primary">Save Changes</button>
            </form>
        </div>

        <div class="settings-card">
            <h3>Preferences</h3>
            <div class="preferences-list">
                <div class="preference-item">
                    <div class="preference-info">
                        <h4>Email Notifications</h4>
                        <p>Receive updates about your meal schedule</p>
                    </div>
                    <label class="toggle">
                        <input type="checkbox" checked>
                        <span class="toggle-label"></span>
                    </label>
                </div>

                <div class="preference-item">
                    <div class="preference-info">
                        <h4>Dietary Restrictions</h4>
                        <p>Manage your food preferences and allergies</p>
                    </div>
                    <button class="btn secondary">Manage</button>
                </div>

                <div class="preference-item">
                    <div class="preference-info">
                        <h4>Language</h4>
                        <p>Choose your preferred language</p>
                    </div>
                    <select class="select">
                        <option value="en">English</option>
                        <option value="es">Spanish</option>
                        <option value="fr">French</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="settings-card">
            <h3>Security</h3>
            <div class="security-list">
                <div class="security-item">
                    <div class="security-info">
                        <h4>Change Password</h4>
                        <p>Update your account password</p>
                    </div>
                    <button class="btn secondary">Change</button>
                </div>

                <div class="security-item">
                    <div class="security-info">
                        <h4>Two-Factor Authentication</h4>
                        <p>Add an extra layer of security</p>
                    </div>
                    <label class="toggle">
                        <input type="checkbox">
                        <span class="toggle-label"></span>
                    </label>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
.settings-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
}

.settings-header {
    margin-bottom: 30px;
}

.settings-header h2 {
    margin: 0;
    color: #2c3e50;
}

.settings-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 20px;
}

.settings-card {
    background: white;
    border-radius: 8px;
    padding: 20px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

.settings-card h3 {
    margin: 0 0 20px 0;
    color: #2c3e50;
    font-size: 18px;
}

.settings-form {
    display: flex;
    flex-direction: column;
    gap: 15px;
}

.form-group {
    display: flex;
    flex-direction: column;
    gap: 5px;
}

.form-group label {
    color: #666;
    font-size: 14px;
}

.form-input {
    padding: 8px 12px;
    border: 1px solid #ddd;
    border-radius: 4px;
    font-size: 14px;
}

.form-input:focus {
    outline: none;
    border-color: #3498db;
}

.preferences-list,
.security-list {
    display: flex;
    flex-direction: column;
    gap: 20px;
}

.preference-item,
.security-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding-bottom: 20px;
    border-bottom: 1px solid #eee;
}

.preference-item:last-child,
.security-item:last-child {
    border-bottom: none;
    padding-bottom: 0;
}

.preference-info,
.security-info {
    flex: 1;
}

.preference-info h4,
.security-info h4 {
    margin: 0 0 5px 0;
    color: #2c3e50;
    font-size: 16px;
}

.preference-info p,
.security-info p {
    margin: 0;
    color: #666;
    font-size: 14px;
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

.select {
    padding: 8px 12px;
    border: 1px solid #ddd;
    border-radius: 4px;
    background: white;
    font-size: 14px;
    cursor: pointer;
    min-width: 120px;
}

.btn {
    padding: 8px 16px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-weight: 500;
    transition: background-color 0.2s;
}

.btn.primary {
    background: #3498db;
    color: white;
}

.btn.primary:hover {
    background: #2980b9;
}

.btn.secondary {
    background: #f0f0f0;
    color: #333;
}

.btn.secondary:hover {
    background: #e0e0e0;
}
</style>
@endpush
