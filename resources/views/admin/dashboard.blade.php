<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trend Mart — Admin Panel</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">

    <style>
        :root {
            --primary-orange: #FC6402;
            --primary-orange-dark: #e05a00;
            --sidebar-bg: #1a1a2e;
            --sidebar-hover: #252540;
            --sidebar-active: #FC6402;
            --text-dark: #1a1a2e;
            --text-gray: #6c757d;
            --light-bg: #f5f6fa;
            --border-color: #e8e8e8;
            --success: #00c851;
            --warning: #ffc107;
            --danger: #f44336;
            --info: #2196F3;
        }

        * {
            font-family: 'Inter', sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: var(--light-bg);
            color: var(--text-dark);
            overflow-x: hidden;
        }

        /* ============================================================ */
        /* SIDEBAR */
        /* ============================================================ */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: 260px;
            height: 100vh;
            background: var(--sidebar-bg);
            color: #fff;
            overflow-y: auto;
            transition: all 0.3s ease;
            z-index: 1000;
            scrollbar-width: thin;
            scrollbar-color: #444 transparent;
        }

        .sidebar::-webkit-scrollbar {
            width: 6px;
        }

        .sidebar::-webkit-scrollbar-thumb {
            background: #444;
            border-radius: 3px;
        }

        .sidebar .brand {
            padding: 22px 25px;
            display: flex;
            align-items: center;
            gap: 12px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
            text-decoration: none;
            color: #fff;
        }

        .sidebar .brand .brand-icon {
            width: 42px;
            height: 42px;
            border-radius: 10px;
            background: var(--primary-orange);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.3rem;
            font-weight: 800;
            color: #fff;
            flex-shrink: 0;
        }

        .sidebar .brand .brand-text h5 {
            font-weight: 800;
            font-size: 1.05rem;
            margin-bottom: 0;
            letter-spacing: 0.5px;
        }

        .sidebar .brand .brand-text small {
            font-size: 0.7rem;
            color: #999;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .sidebar .nav-section-title {
            padding: 18px 25px 8px;
            font-size: 0.7rem;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            color: #666;
            font-weight: 600;
        }

        .sidebar .nav-link {
            color: #b8b8c8;
            padding: 12px 25px;
            font-size: 0.92rem;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 12px;
            border-left: 3px solid transparent;
            transition: all 0.25s ease;
            text-decoration: none;
            cursor: pointer;
        }

        .sidebar .nav-link i.nav-icon {
            width: 20px;
            font-size: 1rem;
            text-align: center;
        }

        .sidebar .nav-link .arrow {
            margin-left: auto;
            font-size: 0.7rem;
            transition: transform 0.25s ease;
        }

        .sidebar .nav-link:hover {
            background: var(--sidebar-hover);
            color: #fff;
        }

        .sidebar .nav-link.active {
            background: rgba(252, 100, 2, 0.12);
            color: var(--primary-orange);
            border-left-color: var(--primary-orange);
        }

        .sidebar .nav-link[aria-expanded="true"] {
            color: #fff;
            background: var(--sidebar-hover);
        }

        .sidebar .nav-link[aria-expanded="true"] .arrow {
            transform: rotate(90deg);
        }

        .sidebar .submenu {
            background: rgba(0, 0, 0, 0.15);
            padding: 5px 0;
        }

        .sidebar .submenu .nav-link {
            padding: 10px 25px 10px 60px;
            font-size: 0.87rem;
            color: #999;
        }

        .sidebar .submenu .nav-link:hover {
            color: #fff;
            background: transparent;
        }

        .sidebar .submenu .nav-link.active {
            color: var(--primary-orange);
            background: transparent;
            border-left-color: transparent;
            font-weight: 600;
        }

        /* ============================================================ */
        /* MAIN CONTENT */
        /* ============================================================ */
        .main-content {
            margin-left: 260px;
            min-height: 100vh;
            transition: all 0.3s ease;
        }

        /* ============================================================ */
        /* TOPBAR */
        /* ============================================================ */
        .topbar {
            background: #fff;
            border-bottom: 1px solid var(--border-color);
            padding: 14px 30px;
            display: flex;
            align-items: center;
            gap: 20px;
            position: sticky;
            top: 0;
            z-index: 999;
        }

        .topbar .toggle-sidebar {
            background: none;
            border: none;
            font-size: 1.3rem;
            color: var(--text-dark);
            cursor: pointer;
            padding: 5px;
        }

        .topbar .search-box {
            position: relative;
            flex: 1;
            max-width: 400px;
        }

        .topbar .search-box input {
            width: 100%;
            padding: 9px 15px 9px 40px;
            border: 1px solid var(--border-color);
            border-radius: 50px;
            font-size: 0.9rem;
            background: var(--light-bg);
            transition: all 0.25s ease;
        }

        .topbar .search-box input:focus {
            outline: none;
            border-color: var(--primary-orange);
            background: #fff;
            box-shadow: 0 0 0 4px rgba(252, 100, 2, 0.08);
        }

        .topbar .search-box i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-gray);
            font-size: 0.9rem;
        }

        .topbar .top-actions {
            margin-left: auto;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .topbar .action-btn {
            position: relative;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: var(--light-bg);
            border: none;
            color: var(--text-dark);
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.25s ease;
            font-size: 0.95rem;
        }

        .topbar .action-btn:hover {
            background: rgba(252, 100, 2, 0.1);
            color: var(--primary-orange);
        }

        .topbar .action-btn .dot {
            position: absolute;
            top: 8px;
            right: 9px;
            width: 8px;
            height: 8px;
            background: var(--primary-orange);
            border-radius: 50%;
            border: 2px solid #fff;
        }

        .topbar .admin-profile {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 5px 12px 5px 5px;
            border-radius: 50px;
            background: var(--light-bg);
            cursor: pointer;
            transition: all 0.25s ease;
        }

        .topbar .admin-profile:hover {
            background: rgba(252, 100, 2, 0.08);
        }

        .topbar .admin-profile .avatar {
            width: 34px;
            height: 34px;
            border-radius: 50%;
            background: var(--primary-orange);
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 0.85rem;
        }

        .topbar .admin-profile .name {
            font-size: 0.87rem;
            font-weight: 600;
        }

        .topbar .admin-profile .role {
            font-size: 0.72rem;
            color: var(--text-gray);
        }

        /* ============================================================ */
        /* PAGE CONTENT */
        /* ============================================================ */
        .page-content {
            padding: 28px 30px 60px;
        }

        .page-title {
            font-size: 1.55rem;
            font-weight: 800;
            color: var(--text-dark);
            margin-bottom: 4px;
        }

        .page-subtitle {
            color: var(--text-gray);
            font-size: 0.9rem;
            margin-bottom: 25px;
        }

        .breadcrumb {
            background: transparent;
            padding: 0;
            margin-bottom: 8px;
            font-size: 0.85rem;
        }

        .breadcrumb-item a {
            color: var(--text-gray);
            text-decoration: none;
        }

        .breadcrumb-item a:hover {
            color: var(--primary-orange);
        }

        .breadcrumb-item.active {
            color: var(--primary-orange);
        }

        /* ============================================================ */
        /* BUTTONS */
        /* ============================================================ */
        .btn-orange {
            background: var(--primary-orange);
            color: #fff;
            border: none;
            font-weight: 600;
            padding: 9px 20px;
            border-radius: 8px;
            transition: all 0.25s ease;
            font-size: 0.9rem;
        }

        .btn-orange:hover {
            background: var(--primary-orange-dark);
            color: #fff;
            transform: translateY(-1px);
            box-shadow: 0 6px 18px rgba(252, 100, 2, 0.3);
        }

        .btn-outline-orange {
            border: 2px solid var(--primary-orange);
            color: var(--primary-orange);
            background: transparent;
            font-weight: 600;
            padding: 8px 20px;
            border-radius: 8px;
            transition: all 0.25s ease;
            font-size: 0.9rem;
        }

        .btn-outline-orange:hover {
            background: var(--primary-orange);
            color: #fff;
        }

        /* ============================================================ */
        /* STAT CARDS */
        /* ============================================================ */
        .stat-card {
            background: #fff;
            border-radius: 14px;
            padding: 22px;
            border: 1px solid var(--border-color);
            transition: all 0.3s ease;
            height: 100%;
        }

        .stat-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.06);
            border-color: var(--primary-orange);
        }

        .stat-card .stat-top {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 15px;
        }

        .stat-card .stat-icon {
            width: 50px;
            height: 50px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.3rem;
        }

        .stat-card .stat-icon.icon-orange {
            background: rgba(252, 100, 2, 0.1);
            color: var(--primary-orange);
        }

        .stat-card .stat-icon.icon-blue {
            background: rgba(33, 150, 243, 0.1);
            color: var(--info);
        }

        .stat-card .stat-icon.icon-green {
            background: rgba(0, 200, 81, 0.1);
            color: var(--success);
        }

        .stat-card .stat-icon.icon-yellow {
            background: rgba(255, 193, 7, 0.15);
            color: #c79100;
        }

        .stat-card .stat-value {
            font-size: 1.8rem;
            font-weight: 800;
            color: var(--text-dark);
            margin-bottom: 3px;
            line-height: 1.1;
        }

        .stat-card .stat-label {
            color: var(--text-gray);
            font-size: 0.85rem;
            margin-bottom: 8px;
        }

        .stat-card .stat-change {
            font-size: 0.8rem;
            font-weight: 600;
        }

        .stat-card .stat-change.up {
            color: var(--success);
        }

        .stat-card .stat-change.down {
            color: var(--danger);
        }

        /* ============================================================ */
        /* CARD / PANEL */
        /* ============================================================ */
        .panel {
            background: #fff;
            border-radius: 14px;
            border: 1px solid var(--border-color);
            overflow: hidden;
        }

        .panel .panel-header {
            padding: 18px 22px;
            border-bottom: 1px solid var(--border-color);
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 10px;
        }

        .panel .panel-header h6 {
            font-weight: 700;
            margin-bottom: 0;
            color: var(--text-dark);
            font-size: 1rem;
        }

        .panel .panel-body {
            padding: 22px;
        }

        /* ============================================================ */
        /* TABLES */
        /* ============================================================ */
        .table {
            margin-bottom: 0;
            vertical-align: middle;
        }

        .table thead th {
            background: var(--light-bg);
            color: var(--text-dark);
            font-size: 0.78rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-weight: 700;
            padding: 13px 15px;
            border-bottom: 2px solid var(--border-color);
            white-space: nowrap;
        }

        .table tbody td {
            padding: 14px 15px;
            color: var(--text-gray);
            font-size: 0.9rem;
            vertical-align: middle;
            border-color: var(--border-color);
        }

        .table tbody tr:hover {
            background: #fafafa;
        }

        .badge-status {
            padding: 5px 13px;
            border-radius: 50px;
            font-size: 0.75rem;
            font-weight: 600;
            display: inline-block;
        }

        .badge-status.bg-delivered {
            background: var(--success);
            color: #fff;
        }

        .badge-status.bg-processing {
            background: var(--warning);
            color: #000;
        }

        .badge-status.bg-shipped {
            background: var(--info);
            color: #fff;
        }

        .badge-status.bg-pending {
            background: #ff9800;
            color: #fff;
        }

        .badge-status.bg-cancelled {
            background: var(--danger);
            color: #fff;
        }

        .badge-status.bg-active {
            background: var(--success);
            color: #fff;
        }

        .badge-status.bg-inactive {
            background: #999;
            color: #fff;
        }

        .badge-status.bg-admin {
            background: var(--primary-orange);
            color: #fff;
        }

        .badge-status.bg-customer {
            background: var(--info);
            color: #fff;
        }

        .action-icons .btn-icon {
            width: 32px;
            height: 32px;
            border-radius: 8px;
            border: 1px solid var(--border-color);
            background: #fff;
            color: var(--text-gray);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 0.8rem;
            cursor: pointer;
            transition: all 0.2s ease;
            margin-right: 4px;
        }

        .action-icons .btn-icon:hover {
            background: var(--primary-orange);
            color: #fff;
            border-color: var(--primary-orange);
        }

        .action-icons .btn-icon.danger:hover {
            background: var(--danger);
            border-color: var(--danger);
        }

        /* ============================================================ */
        /* FORM */
        /* ============================================================ */
        .form-control,
        .form-select {
            border: 1.5px solid var(--border-color);
            border-radius: 9px;
            padding: 10px 15px;
            font-size: 0.9rem;
            transition: all 0.25s ease;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: var(--primary-orange);
            box-shadow: 0 0 0 4px rgba(252, 100, 2, 0.08);
        }

        .form-label {
            font-weight: 600;
            font-size: 0.87rem;
            color: var(--text-dark);
            margin-bottom: 6px;
        }

        .form-label .required {
            color: var(--danger);
            margin-left: 2px;
        }

        .form-text {
            font-size: 0.78rem;
            color: var(--text-gray);
        }

        /* ============================================================ */
        /* CHART PLACEHOLDER */
        /* ============================================================ */
        .chart-placeholder {
            height: 280px;
            background: linear-gradient(180deg, #fff 0%, var(--light-bg) 100%);
            border: 2px dashed var(--border-color);
            border-radius: 12px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            color: var(--text-gray);
            gap: 10px;
        }

        .chart-placeholder i {
            font-size: 2.5rem;
            color: var(--primary-orange);
            opacity: 0.5;
        }

        /* Bar chart (pure CSS) */
        .bar-chart {
            display: flex;
            align-items: flex-end;
            justify-content: space-between;
            gap: 12px;
            height: 220px;
            padding: 15px 5px;
        }

        .bar-chart .bar-wrap {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 8px;
            height: 100%;
            justify-content: flex-end;
        }

        .bar-chart .bar {
            width: 100%;
            max-width: 45px;
            background: linear-gradient(180deg, var(--primary-orange) 0%, #ff8a3d 100%);
            border-radius: 8px 8px 4px 4px;
            transition: all 0.3s ease;
            position: relative;
        }

        .bar-chart .bar:hover {
            opacity: 0.85;
        }

        .bar-chart .bar-label {
            font-size: 0.75rem;
            color: var(--text-gray);
            font-weight: 600;
        }

        /* Progress bars */
        .progress-item {
            margin-bottom: 18px;
        }

        .progress-item:last-child {
            margin-bottom: 0;
        }

        .progress-item .progress-info {
            display: flex;
            justify-content: space-between;
            margin-bottom: 7px;
            font-size: 0.87rem;
        }

        .progress-item .progress-info strong {
            font-weight: 700;
            color: var(--text-dark);
        }

        .progress-item .progress {
            height: 8px;
            border-radius: 50px;
            background: var(--light-bg);
        }

        .progress-item .progress-bar {
            border-radius: 50px;
        }

        /* ============================================================ */
        /* LOGOUT MODAL STYLE */
        /* ============================================================ */
        .logout-icon {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background: rgba(244, 67, 54, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
        }

        .logout-icon i {
            font-size: 2.2rem;
            color: var(--danger);
        }

        /* ============================================================ */
        /* PAGE SWITCHING */
        /* ============================================================ */
        .page-section {
            display: none;
        }

        .page-section.active {
            display: block;
            animation: fadeIn 0.3s ease;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(8px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* ============================================================ */
        /* SIDEBAR TOGGLE (COLLAPSED) */
        /* ============================================================ */
        body.sidebar-collapsed .sidebar {
            width: 78px;
        }

        body.sidebar-collapsed .main-content {
            margin-left: 78px;
        }

        body.sidebar-collapsed .sidebar .brand-text,
        body.sidebar-collapsed .sidebar .nav-section-title,
        body.sidebar-collapsed .sidebar .nav-link span:not(.arrow),
        body.sidebar-collapsed .sidebar .nav-link .arrow {
            display: none;
        }

        body.sidebar-collapsed .sidebar .nav-link {
            justify-content: center;
            padding: 14px 0;
        }

        body.sidebar-collapsed .sidebar .brand {
            justify-content: center;
            padding: 22px 0;
        }

        body.sidebar-collapsed .sidebar .submenu {
            display: none !important;
        }

        /* ============================================================ */
        /* RESPONSIVE */
        /* ============================================================ */
        @media (max-width: 992px) {
            .sidebar {
                transform: translateX(-100%);
            }

            .main-content {
                margin-left: 0;
            }

            body.sidebar-open .sidebar {
                transform: translateX(0);
            }

            body.sidebar-open .main-content::after {
                content: '';
                position: fixed;
                inset: 0;
                background: rgba(0, 0, 0, 0.5);
                z-index: 999;
            }
        }

        @media (max-width: 768px) {
            .page-content {
                padding: 20px 15px 60px;
            }

            .topbar {
                padding: 12px 15px;
            }

            .topbar .search-box {
                max-width: 100%;
            }

            .topbar .admin-profile .name,
            .topbar .admin-profile .role {
                display: none;
            }

            .page-title {
                font-size: 1.3rem;
            }
        }
    </style>
</head>

<body>

    <!-- ============================================================ -->
    <!-- SIDEBAR -->
    <!-- ============================================================ -->
    <aside class="sidebar" id="sidebar">
        <!-- Brand -->
        <a href="#" class="brand" onclick="showPage('dashboard'); return false;">
            <div class="brand-icon">T</div>
            <div class="brand-text">
                <h5>TREND MART</h5>
                <small>Admin Panel</small>
            </div>
        </a>

        <!-- Main Menu -->
        <div class="nav-section-title">Main Menu</div>

        <!-- Dashboard -->
        <a href="#" class="nav-link active" data-page="dashboard"
            onclick="showPage('dashboard'); setActive(this); return false;">
            <i class="fas fa-th-large nav-icon"></i>
            <span>Dashboard</span>
        </a>

        <!-- Products Dropdown -->
        <a class="nav-link" data-bs-toggle="collapse" href="#productsMenu" role="button" aria-expanded="false">
            <i class="fas fa-box nav-icon"></i>
            <span>Products</span>
            <i class="fas fa-chevron-right arrow"></i>
        </a>
        <div class="collapse" id="productsMenu">
            <div class="submenu">
                <a href="#" class="nav-link" data-page="add-product"
                    onclick="showPage('add-product'); setActive(this); return false;">
                    <span>Add Product</span>
                </a>
                <a href="#" class="nav-link" data-page="all-products"
                    onclick="showPage('all-products'); setActive(this); return false;">
                    <span>All Products</span>
                </a>
                <a href="#" class="nav-link" data-page="categories"
                    onclick="showPage('categories'); setActive(this); return false;">
                    <span>Categories</span>
                </a>
            </div>
        </div>

        <!-- Orders Dropdown -->
        <a class="nav-link" data-bs-toggle="collapse" href="#ordersMenu" role="button" aria-expanded="false">
            <i class="fas fa-shopping-bag nav-icon"></i>
            <span>Orders</span>
            <i class="fas fa-chevron-right arrow"></i>
        </a>
        <div class="collapse" id="ordersMenu">
            <div class="submenu">
                <a href="#" class="nav-link" data-page="new-orders"
                    onclick="showPage('new-orders'); setActive(this); return false;">
                    <span>New Orders</span>
                </a>
                <a href="#" class="nav-link" data-page="active-orders"
                    onclick="showPage('active-orders'); setActive(this); return false;">
                    <span>Active Orders</span>
                </a>
                <a href="#" class="nav-link" data-page="order-history"
                    onclick="showPage('order-history'); setActive(this); return false;">
                    <span>History</span>
                </a>
            </div>
        </div>

        <!-- Analytics -->
        <a href="#" class="nav-link" data-page="analytics"
            onclick="showPage('analytics'); setActive(this); return false;">
            <i class="fas fa-chart-line nav-icon"></i>
            <span>Analytics</span>
        </a>

        <!-- User Management Dropdown -->
        <a class="nav-link" data-bs-toggle="collapse" href="#usersMenu" role="button" aria-expanded="false">
            <i class="fas fa-users nav-icon"></i>
            <span>User Management</span>
            <i class="fas fa-chevron-right arrow"></i>
        </a>
        <div class="collapse" id="usersMenu">
            <div class="submenu">
                <a href="#" class="nav-link" data-page="add-user"
                    onclick="showPage('add-user'); setActive(this); return false;">
                    <span>Add User</span>
                </a>
                <a href="#" class="nav-link" data-page="all-users"
                    onclick="showPage('all-users'); setActive(this); return false;">
                    <span>All Users</span>
                </a>
            </div>
        </div>

        <!-- Divider -->
        <div class="nav-section-title">Account</div>

        <!-- Logout -->
        <a href="#" class="nav-link" data-bs-toggle="modal" data-bs-target="#logoutModal" onclick="return false;">
            <i class="fas fa-sign-out-alt nav-icon"></i>
            <span>Logout</span>
        </a>
    </aside>

    <!-- ============================================================ -->
    <!-- MAIN CONTENT -->
    <!-- ============================================================ -->
    <div class="main-content">

        <!-- ============================================================ -->
        <!-- TOPBAR -->
        <!-- ============================================================ -->
        <div class="topbar">
            <button class="toggle-sidebar" onclick="toggleSidebar()">
                <i class="fas fa-bars"></i>
            </button>

            <div class="search-box">
                <i class="fas fa-search"></i>
                <input type="text" placeholder="Search products, orders, users...">
            </div>

            <div class="top-actions">
                <button class="action-btn" title="Notifications">
                    <i class="fas fa-bell"></i>
                    <span class="dot"></span>
                </button>
                <button class="action-btn" title="Messages">
                    <i class="fas fa-envelope"></i>
                    <span class="dot"></span>
                </button>
                <div class="admin-profile">
                    <div class="avatar">AD</div>
                    <div>
                        <div class="name">Admin User</div>
                        <div class="role">Super Admin</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ============================================================ -->
        <!-- PAGE CONTENT -->
        <!-- ============================================================ -->
        <div class="page-content">

            <!-- ======================================================== -->
            <!-- 1. DASHBOARD -->
            <!-- ======================================================== -->
            <div class="page-section active" id="page-dashboard">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </nav>
                <h1 class="page-title">Dashboard</h1>
                <p class="page-subtitle">Welcome back! Here's what's happening in your store today.</p>

                <!-- Stat Cards -->
                <div class="row g-3 mb-4">
                    <div class="col-lg-3 col-md-6">
                        <div class="stat-card">
                            <div class="stat-top">
                                <div class="stat-icon icon-orange"><i class="fas fa-shopping-bag"></i></div>
                            </div>
                            <div class="stat-value">1,284</div>
                            <div class="stat-label">Total Orders</div>
                            <div class="stat-change up"><i class="fas fa-arrow-up"></i> 12.5% vs last month</div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="stat-card">
                            <div class="stat-top">
                                <div class="stat-icon icon-green"><i class="fas fa-dollar-sign"></i></div>
                            </div>
                            <div class="stat-value">$48,920</div>
                            <div class="stat-label">Total Revenue</div>
                            <div class="stat-change up"><i class="fas fa-arrow-up"></i> 8.3% vs last month</div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="stat-card">
                            <div class="stat-top">
                                <div class="stat-icon icon-blue"><i class="fas fa-users"></i></div>
                            </div>
                            <div class="stat-value">3,472</div>
                            <div class="stat-label">Total Customers</div>
                            <div class="stat-change up"><i class="fas fa-arrow-up"></i> 5.2% vs last month</div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="stat-card">
                            <div class="stat-top">
                                <div class="stat-icon icon-yellow"><i class="fas fa-box"></i></div>
                            </div>
                            <div class="stat-value">642</div>
                            <div class="stat-label">Total Products</div>
                            <div class="stat-change down"><i class="fas fa-arrow-down"></i> 2.1% vs last month</div>
                        </div>
                    </div>
                </div>

                <!-- Charts + Recent Orders -->
                <div class="row g-3 mb-4">
                    <div class="col-lg-8">
                        <div class="panel">
                            <div class="panel-header">
                                <h6><i class="fas fa-chart-bar text-warning me-2"></i>Sales Overview</h6>
                                <select class="form-select form-select-sm" style="width: auto;">
                                    <option>Last 7 Days</option>
                                    <option>Last 30 Days</option>
                                    <option>Last Year</option>
                                </select>
                            </div>
                            <div class="panel-body">
                                <div class="bar-chart">
                                    <div class="bar-wrap">
                                        <div class="bar" style="height: 45%;"></div><span class="bar-label">Mon</span>
                                    </div>
                                    <div class="bar-wrap">
                                        <div class="bar" style="height: 65%;"></div><span class="bar-label">Tue</span>
                                    </div>
                                    <div class="bar-wrap">
                                        <div class="bar" style="height: 40%;"></div><span class="bar-label">Wed</span>
                                    </div>
                                    <div class="bar-wrap">
                                        <div class="bar" style="height: 85%;"></div><span class="bar-label">Thu</span>
                                    </div>
                                    <div class="bar-wrap">
                                        <div class="bar" style="height: 55%;"></div><span class="bar-label">Fri</span>
                                    </div>
                                    <div class="bar-wrap">
                                        <div class="bar" style="height: 95%;"></div><span class="bar-label">Sat</span>
                                    </div>
                                    <div class="bar-wrap">
                                        <div class="bar" style="height: 70%;"></div><span class="bar-label">Sun</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="panel h-100">
                            <div class="panel-header">
                                <h6><i class="fas fa-fire text-danger me-2"></i>Top Categories</h6>
                            </div>
                            <div class="panel-body">
                                <div class="progress-item">
                                    <div class="progress-info"><span>Electronics</span><strong>45%</strong></div>
                                    <div class="progress">
                                        <div class="progress-bar bg-warning" style="width: 45%;"></div>
                                    </div>
                                </div>
                                <div class="progress-item">
                                    <div class="progress-info"><span>Fashion</span><strong>30%</strong></div>
                                    <div class="progress">
                                        <div class="progress-bar bg-success" style="width: 30%;"></div>
                                    </div>
                                </div>
                                <div class="progress-item">
                                    <div class="progress-info"><span>Home & Living</span><strong>15%</strong></div>
                                    <div class="progress">
                                        <div class="progress-bar bg-info" style="width: 15%;"></div>
                                    </div>
                                </div>
                                <div class="progress-item">
                                    <div class="progress-info"><span>Sports</span><strong>10%</strong></div>
                                    <div class="progress">
                                        <div class="progress-bar bg-secondary" style="width: 10%;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recent Orders Table -->
                <div class="panel">
                    <div class="panel-header">
                        <h6><i class="fas fa-clock text-warning me-2"></i>Recent Orders</h6>
                        <a href="#" class="btn btn-sm btn-outline-orange"
                            onclick="showPage('order-history'); return false;">View All</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Order #</th>
                                    <th>Customer</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th>Total</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><strong>#TM-0042</strong></td>
                                    <td>John Doe</td>
                                    <td>Jan 18, 2026</td>
                                    <td><span class="badge-status bg-delivered">Delivered</span></td>
                                    <td>$1,172.88</td>
                                    <td><button class="btn-icon"><i class="fas fa-eye"></i></button></td>
                                </tr>
                                <tr>
                                    <td><strong>#TM-0038</strong></td>
                                    <td>Sarah Smith</td>
                                    <td>Jan 12, 2026</td>
                                    <td><span class="badge-status bg-shipped">Shipped</span></td>
                                    <td>$349.00</td>
                                    <td><button class="btn-icon"><i class="fas fa-eye"></i></button></td>
                                </tr>
                                <tr>
                                    <td><strong>#TM-0029</strong></td>
                                    <td>Mike Johnson</td>
                                    <td>Jan 5, 2026</td>
                                    <td><span class="badge-status bg-processing">Processing</span></td>
                                    <td>$89.00</td>
                                    <td><button class="btn-icon"><i class="fas fa-eye"></i></button></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- ======================================================== -->
            <!-- 2. ADD PRODUCT -->
            <!-- ======================================================== -->
            <div class="page-section" id="page-add-product">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Products</a></li>
                        <li class="breadcrumb-item active">Add Product</li>
                    </ol>
                </nav>
                <h1 class="page-title">Add New Product</h1>
                <p class="page-subtitle">Fill in the details below to add a new product to your store.</p>

                <div class="panel">
                    <div class="panel-header">
                        <h6><i class="fas fa-plus-circle text-warning me-2"></i>Product Details</h6>
                    </div>
                    <div class="panel-body">
                        <form>
                            <div class="row g-3">
                                <div class="col-md-8">
                                    <label class="form-label">Product Name <span class="required">*</span></label>
                                    <input type="text" class="form-control" placeholder="e.g., Wireless Headphones Pro">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">SKU <span class="required">*</span></label>
                                    <input type="text" class="form-control" placeholder="e.g., WHP-001">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Category <span class="required">*</span></label>
                                    <select class="form-select">
                                        <option>Select category</option>
                                        <option>Electronics</option>
                                        <option>Fashion</option>
                                        <option>Home & Living</option>
                                        <option>Sports</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Price <span class="required">*</span></label>
                                    <input type="number" class="form-control" placeholder="0.00">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Stock Quantity <span class="required">*</span></label>
                                    <input type="number" class="form-control" placeholder="0">
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Description</label>
                                    <textarea class="form-control" rows="4"
                                        placeholder="Write product description..."></textarea>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Product Image</label>
                                    <input type="file" class="form-control">
                                    <div class="form-text">Recommended size: 800x800px, JPG/PNG</div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Status</label>
                                    <select class="form-select">
                                        <option>Active</option>
                                        <option>Draft</option>
                                        <option>Out of Stock</option>
                                    </select>
                                </div>
                                <div class="col-12 d-flex gap-2 mt-2">
                                    <button type="submit" class="btn btn-orange"><i class="fas fa-save me-2"></i>Save
                                        Product</button>
                                    <button type="reset" class="btn btn-outline-orange">Reset</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- ======================================================== -->
            <!-- 3. ALL PRODUCTS -->
            <!-- ======================================================== -->
            <div class="page-section" id="page-all-products">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Products</a></li>
                        <li class="breadcrumb-item active">All Products</li>
                    </ol>
                </nav>
                <h1 class="page-title">All Products</h1>
                <p class="page-subtitle">Manage all products in your store.</p>

                <div class="panel">
                    <div class="panel-header">
                        <h6><i class="fas fa-box text-warning me-2"></i>Products List</h6>
                        <a href="#" class="btn btn-orange btn-sm" onclick="showPage('add-product'); return false;">
                            <i class="fas fa-plus me-1"></i>Add Product
                        </a>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Product Name</th>
                                    <th>SKU</th>
                                    <th>Category</th>
                                    <th>Price</th>
                                    <th>Stock</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div
                                            style="width:40px;height:40px;background:#eee;border-radius:8px;display:flex;align-items:center;justify-content:center;">
                                            <i class="fas fa-headphones"></i></div>
                                    </td>
                                    <td><strong>Wireless Headphones Pro</strong></td>
                                    <td>WHP-001</td>
                                    <td>Electronics</td>
                                    <td>$79.00</td>
                                    <td>45</td>
                                    <td><span class="badge-status bg-active">Active</span></td>
                                    <td class="action-icons">
                                        <button class="btn-icon"><i class="fas fa-eye"></i></button>
                                        <button class="btn-icon"><i class="fas fa-edit"></i></button>
                                        <button class="btn-icon danger"><i class="fas fa-trash"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div
                                            style="width:40px;height:40px;background:#eee;border-radius:8px;display:flex;align-items:center;justify-content:center;">
                                            <i class="fas fa-laptop"></i></div>
                                    </td>
                                    <td><strong>Premium Laptop Pro</strong></td>
                                    <td>PLP-002</td>
                                    <td>Electronics</td>
                                    <td>$899.00</td>
                                    <td>12</td>
                                    <td><span class="badge-status bg-active">Active</span></td>
                                    <td class="action-icons">
                                        <button class="btn-icon"><i class="fas fa-eye"></i></button>
                                        <button class="btn-icon"><i class="fas fa-edit"></i></button>
                                        <button class="btn-icon danger"><i class="fas fa-trash"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div
                                            style="width:40px;height:40px;background:#eee;border-radius:8px;display:flex;align-items:center;justify-content:center;">
                                            <i class="fas fa-clock"></i></div>
                                    </td>
                                    <td><strong>Smart Watch Pro</strong></td>
                                    <td>SWP-003</td>
                                    <td>Electronics</td>
                                    <td>$149.00</td>
                                    <td>0</td>
                                    <td><span class="badge-status bg-cancelled">Out of Stock</span></td>
                                    <td class="action-icons">
                                        <button class="btn-icon"><i class="fas fa-eye"></i></button>
                                        <button class="btn-icon"><i class="fas fa-edit"></i></button>
                                        <button class="btn-icon danger"><i class="fas fa-trash"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div
                                            style="width:40px;height:40px;background:#eee;border-radius:8px;display:flex;align-items:center;justify-content:center;">
                                            <i class="fas fa-camera"></i></div>
                                    </td>
                                    <td><strong>Digital Camera X</strong></td>
                                    <td>DCX-004</td>
                                    <td>Electronics</td>
                                    <td>$499.00</td>
                                    <td>28</td>
                                    <td><span class="badge-status bg-active">Active</span></td>
                                    <td class="action-icons">
                                        <button class="btn-icon"><i class="fas fa-eye"></i></button>
                                        <button class="btn-icon"><i class="fas fa-edit"></i></button>
                                        <button class="btn-icon danger"><i class="fas fa-trash"></i></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- ======================================================== -->
            <!-- 4. CATEGORIES -->
            <!-- ======================================================== -->
            <div class="page-section" id="page-categories">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Products</a></li>
                        <li class="breadcrumb-item active">Categories</li>
                    </ol>
                </nav>
                <h1 class="page-title">Product Categories</h1>
                <p class="page-subtitle">Manage your product categories.</p>

                <div class="row g-3 mb-4">
                    <div class="col-lg-4">
                        <div class="panel">
                            <div class="panel-header">
                                <h6><i class="fas fa-plus-circle text-warning me-2"></i>Add Category</h6>
                            </div>
                            <div class="panel-body">
                                <form>
                                    <div class="mb-3">
                                        <label class="form-label">Category Name <span class="required">*</span></label>
                                        <input type="text" class="form-control" placeholder="e.g., Electronics">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Parent Category</label>
                                        <select class="form-select">
                                            <option>None (Top Level)</option>
                                            <option>Electronics</option>
                                            <option>Fashion</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Description</label>
                                        <textarea class="form-control" rows="3"
                                            placeholder="Short description..."></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-orange w-100"><i
                                            class="fas fa-save me-2"></i>Add Category</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="panel">
                            <div class="panel-header">
                                <h6><i class="fas fa-list text-warning me-2"></i>All Categories</h6>
                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Category Name</th>
                                            <th>Products</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td><strong>Electronics</strong></td>
                                            <td>245</td>
                                            <td><span class="badge-status bg-active">Active</span></td>
                                            <td class="action-icons">
                                                <button class="btn-icon"><i class="fas fa-edit"></i></button>
                                                <button class="btn-icon danger"><i class="fas fa-trash"></i></button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td><strong>Fashion</strong></td>
                                            <td>189</td>
                                            <td><span class="badge-status bg-active">Active</span></td>
                                            <td class="action-icons">
                                                <button class="btn-icon"><i class="fas fa-edit"></i></button>
                                                <button class="btn-icon danger"><i class="fas fa-trash"></i></button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td><strong>Home & Living</strong></td>
                                            <td>124</td>
                                            <td><span class="badge-status bg-active">Active</span></td>
                                            <td class="action-icons">
                                                <button class="btn-icon"><i class="fas fa-edit"></i></button>
                                                <button class="btn-icon danger"><i class="fas fa-trash"></i></button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td><strong>Sports</strong></td>
                                            <td>84</td>
                                            <td><span class="badge-status bg-inactive">Inactive</span></td>
                                            <td class="action-icons">
                                                <button class="btn-icon"><i class="fas fa-edit"></i></button>
                                                <button class="btn-icon danger"><i class="fas fa-trash"></i></button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ======================================================== -->
            <!-- 5. NEW ORDERS -->
            <!-- ======================================================== -->
            <div class="page-section" id="page-new-orders">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Orders</a></li>
                        <li class="breadcrumb-item active">New Orders</li>
                    </ol>
                </nav>
                <h1 class="page-title">New Orders</h1>
                <p class="page-subtitle">Orders waiting to be processed.</p>

                <div class="panel">
                    <div class="panel-header">
                        <h6><i class="fas fa-bell text-warning me-2"></i>Pending Orders (3)</h6>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Order #</th>
                                    <th>Customer</th>
                                    <th>Items</th>
                                    <th>Date</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><strong>#TM-0045</strong></td>
                                    <td>Alice Brown</td>
                                    <td>2 items</td>
                                    <td>Jan 20, 2026</td>
                                    <td>$249.00</td>
                                    <td><span class="badge-status bg-pending">Pending</span></td>
                                    <td class="action-icons">
                                        <button class="btn-icon" title="Approve"><i class="fas fa-check"></i></button>
                                        <button class="btn-icon danger" title="Cancel"><i
                                                class="fas fa-times"></i></button>
                                        <button class="btn-icon" title="View"><i class="fas fa-eye"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>#TM-0044</strong></td>
                                    <td>David Lee</td>
                                    <td>1 item</td>
                                    <td>Jan 20, 2026</td>
                                    <td>$79.00</td>
                                    <td><span class="badge-status bg-pending">Pending</span></td>
                                    <td class="action-icons">
                                        <button class="btn-icon" title="Approve"><i class="fas fa-check"></i></button>
                                        <button class="btn-icon danger" title="Cancel"><i
                                                class="fas fa-times"></i></button>
                                        <button class="btn-icon" title="View"><i class="fas fa-eye"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>#TM-0043</strong></td>
                                    <td>Emma Wilson</td>
                                    <td>3 items</td>
                                    <td>Jan 19, 2026</td>
                                    <td>$529.00</td>
                                    <td><span class="badge-status bg-pending">Pending</span></td>
                                    <td class="action-icons">
                                        <button class="btn-icon" title="Approve"><i class="fas fa-check"></i></button>
                                        <button class="btn-icon danger" title="Cancel"><i
                                                class="fas fa-times"></i></button>
                                        <button class="btn-icon" title="View"><i class="fas fa-eye"></i></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- ======================================================== -->
            <!-- 6. ACTIVE ORDERS -->
            <!-- ======================================================== -->
            <div class="page-section" id="page-active-orders">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Orders</a></li>
                        <li class="breadcrumb-item active">Active Orders</li>
                    </ol>
                </nav>
                <h1 class="page-title">Active Orders</h1>
                <p class="page-subtitle">Orders currently being processed or shipped.</p>

                <div class="panel">
                    <div class="panel-header">
                        <h6><i class="fas fa-truck text-warning me-2"></i>In Progress (4)</h6>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Order #</th>
                                    <th>Customer</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th>Total</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><strong>#TM-0042</strong></td>
                                    <td>John Doe</td>
                                    <td>Jan 18, 2026</td>
                                    <td><span class="badge-status bg-shipped">Shipped</span></td>
                                    <td>$1,172.88</td>
                                    <td class="action-icons">
                                        <button class="btn-icon" title="Track"><i
                                                class="fas fa-map-marker-alt"></i></button>
                                        <button class="btn-icon" title="View"><i class="fas fa-eye"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>#TM-0040</strong></td>
                                    <td>Robert Taylor</td>
                                    <td>Jan 16, 2026</td>
                                    <td><span class="badge-status bg-processing">Processing</span></td>
                                    <td>$199.00</td>
                                    <td class="action-icons">
                                        <button class="btn-icon" title="Track"><i
                                                class="fas fa-map-marker-alt"></i></button>
                                        <button class="btn-icon" title="View"><i class="fas fa-eye"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>#TM-0039</strong></td>
                                    <td>Sophia Martinez</td>
                                    <td>Jan 14, 2026</td>
                                    <td><span class="badge-status bg-shipped">Shipped</span></td>
                                    <td>$649.00</td>
                                    <td class="action-icons">
                                        <button class="btn-icon" title="Track"><i
                                                class="fas fa-map-marker-alt"></i></button>
                                        <button class="btn-icon" title="View"><i class="fas fa-eye"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>#TM-0037</strong></td>
                                    <td>James Anderson</td>
                                    <td>Jan 11, 2026</td>
                                    <td><span class="badge-status bg-processing">Processing</span></td>
                                    <td>$129.00</td>
                                    <td class="action-icons">
                                        <button class="btn-icon" title="Track"><i
                                                class="fas fa-map-marker-alt"></i></button>
                                        <button class="btn-icon" title="View"><i class="fas fa-eye"></i></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- ======================================================== -->
            <!-- 7. ORDER HISTORY -->
            <!-- ======================================================== -->
            <div class="page-section" id="page-order-history">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Orders</a></li>
                        <li class="breadcrumb-item active">History</li>
                    </ol>
                </nav>
                <h1 class="page-title">Order History</h1>
                <p class="page-subtitle">All completed, cancelled and delivered orders.</p>

                <div class="panel">
                    <div class="panel-header">
                        <h6><i class="fas fa-history text-warning me-2"></i>All Past Orders</h6>
                        <div class="d-flex gap-2">
                            <select class="form-select form-select-sm" style="width:auto;">
                                <option>All Status</option>
                                <option>Delivered</option>
                                <option>Cancelled</option>
                            </select>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Order #</th>
                                    <th>Customer</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th>Total</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><strong>#TM-0036</strong></td>
                                    <td>Michael Brown</td>
                                    <td>Jan 8, 2026</td>
                                    <td><span class="badge-status bg-delivered">Delivered</span></td>
                                    <td>$459.00</td>
                                    <td class="action-icons">
                                        <button class="btn-icon" title="View"><i class="fas fa-eye"></i></button>
                                        <button class="btn-icon" title="Invoice"><i
                                                class="fas fa-file-invoice"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>#TM-0035</strong></td>
                                    <td>Linda Garcia</td>
                                    <td>Jan 6, 2026</td>
                                    <td><span class="badge-status bg-cancelled">Cancelled</span></td>
                                    <td>$29.00</td>
                                    <td class="action-icons">
                                        <button class="btn-icon" title="View"><i class="fas fa-eye"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>#TM-0034</strong></td>
                                    <td>William Davis</td>
                                    <td>Jan 4, 2026</td>
                                    <td><span class="badge-status bg-delivered">Delivered</span></td>
                                    <td>$899.00</td>
                                    <td class="action-icons">
                                        <button class="btn-icon" title="View"><i class="fas fa-eye"></i></button>
                                        <button class="btn-icon" title="Invoice"><i
                                                class="fas fa-file-invoice"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>#TM-0033</strong></td>
                                    <td>Jennifer Wilson</td>
                                    <td>Dec 30, 2025</td>
                                    <td><span class="badge-status bg-delivered">Delivered</span></td>
                                    <td>$249.00</td>
                                    <td class="action-icons">
                                        <button class="btn-icon" title="View"><i class="fas fa-eye"></i></button>
                                        <button class="btn-icon" title="Invoice"><i
                                                class="fas fa-file-invoice"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>#TM-0032</strong></td>
                                    <td>Richard Moore</td>
                                    <td>Dec 28, 2025</td>
                                    <td><span class="badge-status bg-cancelled">Cancelled</span></td>
                                    <td>$79.00</td>
                                    <td class="action-icons">
                                        <button class="btn-icon" title="View"><i class="fas fa-eye"></i></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- ======================================================== -->
            <!-- 8. ANALYTICS -->
            <!-- ======================================================== -->
            <div class="page-section" id="page-analytics">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Analytics</li>
                    </ol>
                </nav>
                <h1 class="page-title">Analytics</h1>
                <p class="page-subtitle">Detailed insights about your store performance.</p>

                <!-- Stat Cards -->
                <div class="row g-3 mb-4">
                    <div class="col-lg-3 col-md-6">
                        <div class="stat-card">
                            <div class="stat-top">
                                <div class="stat-icon icon-orange"><i class="fas fa-eye"></i></div>
                            </div>
                            <div class="stat-value">52.4K</div>
                            <div class="stat-label">Page Views</div>
                            <div class="stat-change up"><i class="fas fa-arrow-up"></i> 18.2% vs last week</div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="stat-card">
                            <div class="stat-top">
                                <div class="stat-icon icon-blue"><i class="fas fa-user-plus"></i></div>
                            </div>
                            <div class="stat-value">1,248</div>
                            <div class="stat-label">New Visitors</div>
                            <div class="stat-change up"><i class="fas fa-arrow-up"></i> 9.7% vs last week</div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="stat-card">
                            <div class="stat-top">
                                <div class="stat-icon icon-green"><i class="fas fa-percentage"></i></div>
                            </div>
                            <div class="stat-value">3.42%</div>
                            <div class="stat-label">Conversion Rate</div>
                            <div class="stat-change up"><i class="fas fa-arrow-up"></i> 0.8% vs last week</div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="stat-card">
                            <div class="stat-top">
                                <div class="stat-icon icon-yellow"><i class="fas fa-shopping-cart"></i></div>
                            </div>
                            <div class="stat-value">182</div>
                            <div class="stat-label">Cart Abandonment</div>
                            <div class="stat-change down"><i class="fas fa-arrow-down"></i> 4.2% vs last week</div>
                        </div>
                    </div>
                </div>

                <!-- Chart Row -->
                <div class="row g-3 mb-4">
                    <div class="col-lg-8">
                        <div class="panel">
                            <div class="panel-header">
                                <h6><i class="fas fa-chart-area text-warning me-2"></i>Revenue Analytics</h6>
                                <select class="form-select form-select-sm" style="width:auto;">
                                    <option>Last 7 Days</option>
                                    <option>Last 30 Days</option>
                                </select>
                            </div>
                            <div class="panel-body">
                                <div class="bar-chart">
                                    <div class="bar-wrap">
                                        <div class="bar" style="height: 55%;"></div><span class="bar-label">Mon</span>
                                    </div>
                                    <div class="bar-wrap">
                                        <div class="bar" style="height: 72%;"></div><span class="bar-label">Tue</span>
                                    </div>
                                    <div class="bar-wrap">
                                        <div class="bar" style="height: 45%;"></div><span class="bar-label">Wed</span>
                                    </div>
                                    <div class="bar-wrap">
                                        <div class="bar" style="height: 90%;"></div><span class="bar-label">Thu</span>
                                    </div>
                                    <div class="bar-wrap">
                                        <div class="bar" style="height: 65%;"></div><span class="bar-label">Fri</span>
                                    </div>
                                    <div class="bar-wrap">
                                        <div class="bar" style="height: 100%;"></div><span class="bar-label">Sat</span>
                                    </div>
                                    <div class="bar-wrap">
                                        <div class="bar" style="height: 78%;"></div><span class="bar-label">Sun</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="panel h-100">
                            <div class="panel-header">
                                <h6><i class="fas fa-globe text-warning me-2"></i>Traffic Sources</h6>
                            </div>
                            <div class="panel-body">
                                <div class="progress-item">
                                    <div class="progress-info"><span>Organic Search</span><strong>42%</strong></div>
                                    <div class="progress">
                                        <div class="progress-bar bg-warning" style="width: 42%;"></div>
                                    </div>
                                </div>
                                <div class="progress-item">
                                    <div class="progress-info"><span>Direct</span><strong>28%</strong></div>
                                    <div class="progress">
                                        <div class="progress-bar bg-success" style="width: 28%;"></div>
                                    </div>
                                </div>
                                <div class="progress-item">
                                    <div class="progress-info"><span>Social Media</span><strong>18%</strong></div>
                                    <div class="progress">
                                        <div class="progress-bar bg-info" style="width: 18%;"></div>
                                    </div>
                                </div>
                                <div class="progress-item">
                                    <div class="progress-info"><span>Referral</span><strong>12%</strong></div>
                                    <div class="progress">
                                        <div class="progress-bar bg-secondary" style="width: 12%;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Top Pages Table -->
                <div class="panel">
                    <div class="panel-header">
                        <h6><i class="fas fa-fire text-danger me-2"></i>Top Performing Products</h6>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Rank</th>
                                    <th>Product</th>
                                    <th>Views</th>
                                    <th>Sales</th>
                                    <th>Revenue</th>
                                    <th>Conversion</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><strong>#1</strong></td>
                                    <td>Wireless Headphones Pro</td>
                                    <td>8,420</td>
                                    <td>324</td>
                                    <td>$25,596</td>
                                    <td><span class="badge-status bg-active">3.85%</span></td>
                                </tr>
                                <tr>
                                    <td><strong>#2</strong></td>
                                    <td>Premium Laptop Pro</td>
                                    <td>6,180</td>
                                    <td>142</td>
                                    <td>$127,658</td>
                                    <td><span class="badge-status bg-active">2.30%</span></td>
                                </tr>
                                <tr>
                                    <td><strong>#3</strong></td>
                                    <td>Smart Watch Pro</td>
                                    <td>5,890</td>
                                    <td>218</td>
                                    <td>$32,482</td>
                                    <td><span class="badge-status bg-processing">3.70%</span></td>
                                </tr>
                                <tr>
                                    <td><strong>#4</strong></td>
                                    <td>Digital Camera X</td>
                                    <td>4,270</td>
                                    <td>96</td>
                                    <td>$47,904</td>
                                    <td><span class="badge-status bg-active">2.25%</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- ======================================================== -->
            <!-- 9. ADD USER -->
            <!-- ======================================================== -->
            <div class="page-section" id="page-add-user">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">User Management</a></li>
                        <li class="breadcrumb-item active">Add User</li>
                    </ol>
                </nav>
                <h1 class="page-title">Add New User</h1>
                <p class="page-subtitle">Create a new user account for your admin panel.</p>

                <div class="panel">
                    <div class="panel-header">
                        <h6><i class="fas fa-user-plus text-warning me-2"></i>User Details</h6>
                    </div>
                    <div class="panel-body">
                        <form>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label">Full Name <span class="required">*</span></label>
                                    <input type="text" class="form-control" placeholder="e.g., John Doe">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Email Address <span class="required">*</span></label>
                                    <input type="email" class="form-control" placeholder="user@example.com">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Phone Number</label>
                                    <input type="tel" class="form-control" placeholder="+1 234 567 890">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Role <span class="required">*</span></label>
                                    <select class="form-select">
                                        <option>Select role</option>
                                        <option>Admin</option>
                                        <option>Manager</option>
                                        <option>Editor</option>
                                        <option>Customer</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Password <span class="required">*</span></label>
                                    <input type="password" class="form-control" placeholder="Enter password">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Confirm Password <span class="required">*</span></label>
                                    <input type="password" class="form-control" placeholder="Confirm password">
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Profile Picture</label>
                                    <input type="file" class="form-control">
                                </div>
                                <div class="col-12">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="sendEmail" checked>
                                        <label class="form-check-label" for="sendEmail">
                                            Send welcome email to user
                                        </label>
                                    </div>
                                </div>
                                <div class="col-12 d-flex gap-2 mt-2">
                                    <button type="submit" class="btn btn-orange"><i class="fas fa-save me-2"></i>Create
                                        User</button>
                                    <button type="reset" class="btn btn-outline-orange">Reset</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- ======================================================== -->
            <!-- 10. ALL USERS -->
            <!-- ======================================================== -->
            <div class="page-section" id="page-all-users">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">User Management</a></li>
                        <li class="breadcrumb-item active">All Users</li>
                    </ol>
                </nav>
                <h1 class="page-title">All Users</h1>
                <p class="page-subtitle">Manage all users in your system.</p>

                <div class="panel">
                    <div class="panel-header">
                        <h6><i class="fas fa-users text-warning me-2"></i>Users List</h6>
                        <a href="#" class="btn btn-orange btn-sm" onclick="showPage('add-user'); return false;">
                            <i class="fas fa-plus me-1"></i>Add User
                        </a>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>User</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Status</th>
                                    <th>Joined</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center gap-2">
                                            <div
                                                style="width:38px;height:38px;border-radius:50%;background:var(--primary-orange);color:#fff;display:flex;align-items:center;justify-content:center;font-weight:700;font-size:.8rem;">
                                                AD</div>
                                            <strong>Admin User</strong>
                                        </div>
                                    </td>
                                    <td>admin@trendmart.com</td>
                                    <td><span class="badge-status bg-admin">Admin</span></td>
                                    <td><span class="badge-status bg-active">Active</span></td>
                                    <td>Jan 1, 2025</td>
                                    <td class="action-icons">
                                        <button class="btn-icon"><i class="fas fa-eye"></i></button>
                                        <button class="btn-icon"><i class="fas fa-edit"></i></button>
                                        <button class="btn-icon danger"><i class="fas fa-trash"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center gap-2">
                                            <div
                                                style="width:38px;height:38px;border-radius:50%;background:#2196F3;color:#fff;display:flex;align-items:center;justify-content:center;font-weight:700;font-size:.8rem;">
                                                SM</div>
                                            <strong>Sarah Manager</strong>
                                        </div>
                                    </td>
                                    <td>sarah@trendmart.com</td>
                                    <td><span class="badge-status bg-customer">Manager</span></td>
                                    <td><span class="badge-status bg-active">Active</span></td>
                                    <td>Mar 15, 2025</td>
                                    <td class="action-icons">
                                        <button class="btn-icon"><i class="fas fa-eye"></i></button>
                                        <button class="btn-icon"><i class="fas fa-edit"></i></button>
                                        <button class="btn-icon danger"><i class="fas fa-trash"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center gap-2">
                                            <div
                                                style="width:38px;height:38px;border-radius:50%;background:#00c851;color:#fff;display:flex;align-items:center;justify-content:center;font-weight:700;font-size:.8rem;">
                                                JD</div>
                                            <strong>John Doe</strong>
                                        </div>
                                    </td>
                                    <td>john@example.com</td>
                                    <td><span class="badge-status bg-customer">Customer</span></td>
                                    <td><span class="badge-status bg-active">Active</span></td>
                                    <td>Jun 10, 2025</td>
                                    <td class="action-icons">
                                        <button class="btn-icon"><i class="fas fa-eye"></i></button>
                                        <button class="btn-icon"><i class="fas fa-edit"></i></button>
                                        <button class="btn-icon danger"><i class="fas fa-trash"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center gap-2">
                                            <div
                                                style="width:38px;height:38px;border-radius:50%;background:#999;color:#fff;display:flex;align-items:center;justify-content:center;font-weight:700;font-size:.8rem;">
                                                EW</div>
                                            <strong>Emma Wilson</strong>
                                        </div>
                                    </td>
                                    <td>emma@example.com</td>
                                    <td><span class="badge-status bg-customer">Customer</span></td>
                                    <td><span class="badge-status bg-inactive">Inactive</span></td>
                                    <td>Sep 22, 2025</td>
                                    <td class="action-icons">
                                        <button class="btn-icon"><i class="fas fa-eye"></i></button>
                                        <button class="btn-icon"><i class="fas fa-edit"></i></button>
                                        <button class="btn-icon danger"><i class="fas fa-trash"></i></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div><!-- /page-content -->

    </div><!-- /main-content -->

    <!-- ============================================================ -->
    <!-- LOGOUT MODAL -->
    <!-- ============================================================ -->
    <div class="modal fade" id="logoutModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="border-radius: 14px; border: none;">
                <div class="modal-body text-center p-4">
                    <div class="logout-icon">
                        <i class="fas fa-sign-out-alt"></i>
                    </div>
                    <h5 style="font-weight: 700;">Logout Confirmation</h5>
                    <p style="color: var(--text-gray); margin-bottom: 25px;">
                        Are you sure you want to logout from your admin account?
                    </p>
                    <div class="d-flex gap-2 justify-content-center">
                        <button type="button" class="btn btn-outline-secondary px-4" data-bs-dismiss="modal"
                            style="border-radius:50px;">Cancel</button>
                        <button type="button" class="btn btn-danger px-4" style="border-radius:50px;"
                            onclick="alert('Logging out... (Demo)');">
                            <i class="fas fa-sign-out-alt me-1"></i>Yes, Logout
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // ============================================================
        // PAGE SWITCHING
        // ============================================================
        function showPage(pageId) {
            // Hide all pages
            document.querySelectorAll('.page-section').forEach(function (page) {
                page.classList.remove('active');
            });

            // Show target page
            const target = document.getElementById('page-' + pageId);
            if (target) {
                target.classList.add('active');
            }

            // Scroll to top
            window.scrollTo({ top: 0, behavior: 'smooth' });

            // Close mobile sidebar
            document.body.classList.remove('sidebar-open');
        }

        // ============================================================
        // SET ACTIVE LINK
        // ============================================================
        function setActive(link) {
            document.querySelectorAll('.sidebar .nav-link').forEach(function (l) {
                l.classList.remove('active');
            });
            link.classList.add('active');

            // If submenu link, highlight parent too
            const submenu = link.closest('.submenu');
            if (submenu) {
                const parentCollapse = submenu.closest('.collapse');
                if (parentCollapse) {
                    const parentLink = document.querySelector('[href="#' + parentCollapse.id + '"]');
                    if (parentLink) {
                        parentLink.style.color = '#fff';
                    }
                }
            }
        }

        // ============================================================
        // SIDEBAR TOGGLE
        // ============================================================
        function toggleSidebar() {
            if (window.innerWidth <= 992) {
                document.body.classList.toggle('sidebar-open');
            } else {
                document.body.classList.toggle('sidebar-collapsed');
            }
        }

        // ============================================================
        // AUTO-OPEN SUBMENU ON PAGE LOAD (optional)
        // ============================================================
        document.addEventListener('DOMContentLoaded', function () {
            // Dashboard is active by default
        });
    </script>

</body>

</html>