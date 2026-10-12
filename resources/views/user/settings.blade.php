@extends('layouts.head')
@section('title', 'Settings')

@section('content')
    <style>
        * {
            font-family: 'Inter', sans-serif;
        }

        :root {
            --primary-orange: #FC6402;
            --light-bg: #f8f9fa;
            --text-dark: #1a1a2e;
            --text-gray: #6c757d;
        }

        .text-orange {
            color: var(--primary-orange);
        }

        .btn-orange {
            background-color: var(--primary-orange);
            color: #fff;
            border: none;
            transition: all 0.3s ease;
        }

        .btn-orange:hover {
            background-color: #e05a00;
            color: #fff;
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(252, 100, 2, 0.3);
        }

        .btn-outline-orange {
            border: 2px solid var(--primary-orange);
            color: var(--primary-orange);
            background: transparent;
            transition: all 0.3s ease;
        }

        .btn-outline-orange:hover {
            background-color: var(--primary-orange);
            color: #fff;
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(252, 100, 2, 0.2);
        }

        .section-title {
            font-size: 2rem;
            font-weight: 800;
            color: var(--text-dark);
            margin-bottom: 5px;
        }

        .section-subtitle {
            color: var(--text-gray);
            font-size: 1rem;
            font-weight: 300;
        }

        /* ===== PAGE HEADER ===== */
        .page-header {
            background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);
            padding: 30px 0 25px;
            border-bottom: 1px solid #f0f0f0;
        }

        .breadcrumb {
            background: transparent;
            padding: 0;
            margin-bottom: 5px;
        }

        .breadcrumb-item a {
            color: var(--text-gray);
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .breadcrumb-item a:hover {
            color: var(--primary-orange);
        }

        .breadcrumb-item.active {
            color: var(--primary-orange);
        }

        /* ===== SETTINGS SECTION ===== */
        .settings-section {
            padding: 30px 0 60px;
            background: #f8f9fa;
        }

        .settings-content {
            background: #fff;
            border-radius: 16px;
            padding: 30px;
            border: 1px solid #f0f0f0;
        }

        .settings-content .content-title {
            font-weight: 700;
            color: var(--text-dark);
            font-size: 1.3rem;
            margin-bottom: 25px;
            padding-bottom: 15px;
            border-bottom: 2px solid var(--primary-orange);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .settings-content .content-title i {
            color: var(--primary-orange);
        }

        /* ===== AVATAR SECTION ===== */
        .avatar-section {
            display: flex;
            align-items: center;
            gap: 20px;
            padding: 20px;
            background: #f8f9fa;
            border-radius: 12px;
            margin-bottom: 25px;
            border: 1px solid #f0f0f0;
        }

        .avatar-section .avatar {
            width: 90px;
            height: 90px;
            border-radius: 50%;
            background: rgba(252, 100, 2, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.5rem;
            color: var(--primary-orange);
            border: 3px solid var(--primary-orange);
            flex-shrink: 0;
        }

        .avatar-section .avatar-info h6 {
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 5px;
            font-size: 1.1rem;
        }

        .avatar-section .avatar-info p {
            color: var(--text-gray);
            font-size: 0.85rem;
            margin-bottom: 10px;
        }

        .avatar-section .avatar-actions {
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
        }

        .avatar-section .avatar-actions .btn {
            font-size: 0.8rem;
            padding: 6px 14px;
            border-radius: 50px;
        }

        /* ===== FORM STYLING ===== */
        .settings-form .form-label {
            font-weight: 600;
            color: var(--text-dark);
            font-size: 0.9rem;
            margin-bottom: 6px;
        }

        .settings-form .form-control,
        .settings-form .form-select {
            border-radius: 10px;
            padding: 11px 16px;
            border: 2px solid #f0f0f0;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            background-color: #fff;
        }

        .settings-form .form-control:focus,
        .settings-form .form-select:focus {
            border-color: var(--primary-orange);
            box-shadow: 0 0 0 4px rgba(252, 100, 2, 0.08);
        }

        .settings-form .form-control::placeholder {
            color: #b0b0b0;
        }

        .settings-form .form-check-input {
            width: 18px;
            height: 18px;
            margin-top: 2px;
            cursor: pointer;
        }

        .settings-form .form-check-input:checked {
            background-color: var(--primary-orange);
            border-color: var(--primary-orange);
        }

        .settings-form .form-check-input:focus {
            border-color: var(--primary-orange);
            box-shadow: 0 0 0 4px rgba(252, 100, 2, 0.15);
        }

        .settings-form .form-check-label {
            font-size: 0.9rem;
            color: var(--text-gray);
            cursor: pointer;
        }

        /* ===== FORM SECTION DIVIDER ===== */
        .form-section-title {
            font-weight: 700;
            color: var(--text-dark);
            font-size: 1rem;
            margin: 30px 0 15px;
            padding-bottom: 10px;
            border-bottom: 1px solid #f0f0f0;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .form-section-title i {
            color: var(--primary-orange);
            font-size: 0.95rem;
        }

        .form-section-title:first-of-type {
            margin-top: 0;
        }

        /* ===== ACTION BUTTONS ===== */
        .form-actions {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
            padding-top: 25px;
            margin-top: 25px;
            border-top: 2px solid #f0f0f0;
        }

        .form-actions .btn {
            padding: 11px 30px;
            border-radius: 50px;
            font-weight: 600;
            font-size: 0.95rem;
        }

        /* ===== DANGER ZONE ===== */
        .danger-zone {
            background: #fff5f5;
            border: 1px solid #ffe0e0;
            border-radius: 12px;
            padding: 20px;
            margin-top: 30px;
        }

        .danger-zone h6 {
            color: #f44336;
            font-weight: 700;
            font-size: 1rem;
            margin-bottom: 8px;
        }

        .danger-zone p {
            color: var(--text-gray);
            font-size: 0.85rem;
            margin-bottom: 15px;
        }

        .btn-danger-outline {
            border: 2px solid #f44336;
            color: #f44336;
            background: transparent;
            border-radius: 50px;
            padding: 8px 22px;
            font-weight: 600;
            font-size: 0.85rem;
            transition: all 0.3s ease;
        }

        .btn-danger-outline:hover {
            background: #f44336;
            color: #fff;
        }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 768px) {
            .page-header {
                padding: 20px 0 15px;
            }

            .settings-section {
                padding: 20px 0 40px;
            }

            .settings-content {
                padding: 20px;
            }

            .section-title {
                font-size: 1.5rem;
            }

            .avatar-section {
                flex-direction: column;
                text-align: center;
            }

            .avatar-section .avatar-actions {
                justify-content: center;
            }

            .form-actions {
                flex-direction: column;
            }

            .form-actions .btn {
                width: 100%;
            }
        }
    </style>


    <!-- ============================================================ -->
    <!-- PAGE HEADER -->
    <!-- ============================================================ -->
    <section class="page-header">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fa fa-home"></i> Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('user.dashboard') }}">My Account</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Settings</li>
                </ol>
            </nav>
            <h1 class="section-title">Profile Settings</h1>
            <p class="section-subtitle">Manage your account information and preferences</p>
        </div>
    </section>

    <!-- ============================================================ -->
    <!-- SETTINGS SECTION -->
    <!-- ============================================================ -->
    <section class="settings-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="settings-content">

                        <div class="content-title">
                            <i class="fa fa-user-circle"></i> Account Information
                        </div>

                        <!-- ===== AVATAR SECTION ===== -->
                        <div class="avatar-section">
                            <div class="avatar">
                                <i class="fa fa-user"></i>
                            </div>
                            <div class="avatar-info">
                                <h6>Profile Photo</h6>
                                <p>JPG, PNG or GIF. Max size 2MB.</p>
                                <div class="avatar-actions">
                                    <button type="button" class="btn btn-orange">
                                        <i class="fa fa-upload"></i> Upload New
                                    </button>
                                    <button type="button" class="btn btn-outline-orange">
                                        <i class="fa fa-trash"></i> Remove
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- ===== SETTINGS FORM ===== -->
                        <form class="settings-form"
                            onsubmit="event.preventDefault(); alert('Settings saved successfully! (Static Demo)');">

                            <!-- Personal Information -->
                            <div class="form-section-title">
                                <i class="fa fa-user"></i> Personal Information
                            </div>

                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label">First Name</label>
                                    <input type="text" class="form-control" value="John" placeholder="Enter first name">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Last Name</label>
                                    <input type="text" class="form-control" value="Doe" placeholder="Enter last name">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Email Address</label>
                                    <input type="email" class="form-control" value="john.doe@example.com"
                                        placeholder="Enter email">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Phone Number</label>
                                    <input type="tel" class="form-control" value="+1 234 567 890"
                                        placeholder="Enter phone number">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Date of Birth</label>
                                    <input type="date" class="form-control" value="1990-05-15">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Gender</label>
                                    <select class="form-select">
                                        <option value="">Select gender</option>
                                        <option value="male" selected>Male</option>
                                        <option value="female">Female</option>
                                        <option value="other">Other</option>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Bio</label>
                                    <textarea class="form-control" rows="3"
                                        placeholder="Tell us a little about yourself...">Hello! I'm a tech enthusiast who loves shopping for gadgets and electronics.</textarea>
                                </div>
                            </div>

                            <!-- Change Password -->
                            <div class="form-section-title">
                                <i class="fa fa-lock"></i> Change Password
                            </div>

                            <div class="row g-3">
                                <div class="col-12">
                                    <label class="form-label">Current Password</label>
                                    <input type="password" class="form-control" placeholder="Enter current password">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">New Password</label>
                                    <input type="password" class="form-control" placeholder="Enter new password">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Confirm New Password</label>
                                    <input type="password" class="form-control" placeholder="Confirm new password">
                                </div>
                            </div>

                            <!-- Preferences -->
                            <div class="form-section-title">
                                <i class="fa fa-bell"></i> Preferences
                            </div>

                            <div class="row g-3">
                                <div class="col-12">
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="checkbox" id="newsletter" checked>
                                        <label class="form-check-label" for="newsletter">
                                            Subscribe to newsletter and exclusive offers
                                        </label>
                                    </div>
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="checkbox" id="orderUpdates" checked>
                                        <label class="form-check-label" for="orderUpdates">
                                            Receive email updates about my orders
                                        </label>
                                    </div>
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="checkbox" id="smsAlerts">
                                        <label class="form-check-label" for="smsAlerts">
                                            Receive SMS alerts for order status
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="twoFactor">
                                        <label class="form-check-label" for="twoFactor">
                                            Enable two-factor authentication
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <!-- Action Buttons -->
                            <div class="form-actions">
                                <button type="submit" class="btn btn-orange">
                                    <i class="fa fa-save"></i> Save Changes
                                </button>
                                <button type="reset" class="btn btn-outline-orange">
                                    <i class="fa fa-undo"></i> Reset
                                </button>
                            </div>

                        </form>

                        <!-- ===== DANGER ZONE ===== -->
                        <div class="danger-zone">
                            <h6><i class="fa fa-exclamation-triangle"></i> Danger Zone</h6>
                            <p>Once you delete your account, there is no going back. Please be certain.</p>
                            <button type="button" class="btn-danger-outline"
                                onclick="if(confirm('Are you sure you want to delete your account? This action cannot be undone.')) alert('Account deletion is disabled in this demo.');">
                                <i class="fa fa-trash"></i> Delete Account
                            </button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection