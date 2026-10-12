@extends('layouts.head')
@section('title', 'My Orders')

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

        /* ===== ORDER HISTORY SECTION ===== */
        .orders-section {
            padding: 30px 0 60px;
            background: #f8f9fa;
        }

        .orders-content {
            background: #fff;
            border-radius: 16px;
            padding: 30px;
            border: 1px solid #f0f0f0;
            min-height: 500px;
        }

        .orders-content .content-title {
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

        .orders-content .content-title i {
            color: var(--primary-orange);
        }

        /* ===== SEARCH & FILTER BAR ===== */
        .filter-bar {
            background: #f8f9fa;
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 25px;
            border: 1px solid #f0f0f0;
        }

        .filter-bar .form-control,
        .filter-bar .form-select {
            border-radius: 10px;
            padding: 10px 15px;
            border: 2px solid #f0f0f0;
            font-size: 0.9rem;
            transition: all 0.3s ease;
        }

        .filter-bar .form-control:focus,
        .filter-bar .form-select:focus {
            border-color: var(--primary-orange);
            box-shadow: 0 0 0 4px rgba(252, 100, 2, 0.08);
        }

        /* ===== STATUS FILTER PILLS ===== */
        .status-filters {
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
            margin-bottom: 20px;
        }

        .status-filters .btn {
            border-radius: 50px;
            padding: 6px 18px;
            font-size: 0.85rem;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        /* ===== ORDER TABLE ===== */
        .order-table .table {
            border-radius: 12px;
            overflow: hidden;
            border: 1px solid #f0f0f0;
            margin-bottom: 0;
        }

        .order-table .table thead {
            background: #f8f9fa;
        }

        .order-table .table thead th {
            font-weight: 700;
            color: var(--text-dark);
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            padding: 12px 15px;
            border-bottom: 2px solid #f0f0f0;
            white-space: nowrap;
        }

        .order-table .table tbody td {
            padding: 15px;
            color: var(--text-gray);
            vertical-align: middle;
            font-size: 0.95rem;
        }

        .order-table .table tbody tr {
            transition: all 0.3s ease;
        }

        .order-table .table tbody tr:hover {
            background: #f8f9fa;
        }

        .order-table .badge-status {
            padding: 5px 14px;
            border-radius: 50px;
            font-weight: 600;
            font-size: 0.8rem;
            display: inline-block;
        }

        .badge-status.status-delivered {
            background: #00c851;
            color: #fff;
        }

        .badge-status.status-processing {
            background: #ffc107;
            color: #000;
        }

        .badge-status.status-shipped {
            background: #2196F3;
            color: #fff;
        }

        .badge-status.status-pending {
            background: #ff9800;
            color: #fff;
        }

        .badge-status.status-cancelled {
            background: #f44336;
            color: #fff;
        }

        .order-table .btn-view-order {
            padding: 5px 16px;
            border-radius: 50px;
            font-size: 0.8rem;
            border: 1px solid var(--primary-orange);
            color: var(--primary-orange);
            background: transparent;
            transition: all 0.3s ease;
            white-space: nowrap;
        }

        .order-table .btn-view-order:hover {
            background: var(--primary-orange);
            color: #fff;
        }

        /* ===== ORDER DETAILS MODAL ===== */
        .order-modal .modal-content {
            border-radius: 16px;
            border: none;
        }

        .order-modal .modal-header {
            background: var(--text-dark);
            color: #fff;
            border-radius: 16px 16px 0 0;
            padding: 18px 25px;
            border-bottom: 3px solid var(--primary-orange);
        }

        .order-modal .modal-header h5 {
            font-weight: 700;
            margin-bottom: 0;
        }

        .order-modal .modal-header .btn-close {
            filter: invert(1);
        }

        .order-modal .modal-body {
            padding: 25px;
        }

        .order-modal .order-info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
            gap: 15px;
            margin-bottom: 25px;
        }

        .order-modal .order-info-item {
            background: #f8f9fa;
            padding: 12px 15px;
            border-radius: 10px;
        }

        .order-modal .order-info-item label {
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: var(--text-gray);
            font-weight: 600;
            display: block;
            margin-bottom: 4px;
        }

        .order-modal .order-info-item span {
            font-weight: 700;
            color: var(--text-dark);
            font-size: 0.95rem;
        }

        .order-modal .order-items-table {
            width: 100%;
            border-radius: 10px;
            overflow: hidden;
            border: 1px solid #f0f0f0;
        }

        .order-modal .order-items-table th {
            background: #f8f9fa;
            padding: 10px 15px;
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: var(--text-dark);
            font-weight: 700;
        }

        .order-modal .order-items-table td {
            padding: 12px 15px;
            font-size: 0.9rem;
            color: var(--text-gray);
            border-bottom: 1px solid #f0f0f0;
        }

        .order-modal .order-items-table tr:last-child td {
            border-bottom: none;
        }

        .order-modal .order-total {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 0;
            font-size: 1.1rem;
            font-weight: 700;
            color: var(--text-dark);
            border-top: 2px solid #f0f0f0;
            margin-top: 15px;
        }

        .order-modal .order-total span:last-child {
            color: var(--primary-orange);
            font-size: 1.3rem;
        }

        /* ===== EMPTY STATE ===== */
        .empty-state {
            text-align: center;
            padding: 60px 20px;
        }

        .empty-state i {
            font-size: 5rem;
            color: #ddd;
            margin-bottom: 20px;
        }

        .empty-state h5 {
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 10px;
        }

        .empty-state p {
            color: var(--text-gray);
            margin-bottom: 20px;
        }

        /* ===== PAGINATION ===== */
        .pagination .page-link {
            border: 1px solid #f0f0f0;
            color: var(--text-gray);
            padding: 8px 16px;
            border-radius: 8px !important;
            margin: 0 3px;
            transition: all 0.3s ease;
        }

        .pagination .page-link:hover {
            background: rgba(252, 100, 2, 0.08);
            color: var(--primary-orange);
            border-color: var(--primary-orange);
        }

        .pagination .page-item.active .page-link {
            background: var(--primary-orange);
            border-color: var(--primary-orange);
            color: #fff;
        }

        .pagination .page-item.disabled .page-link {
            color: #ccc;
        }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 768px) {
            .page-header {
                padding: 20px 0 15px;
            }

            .orders-section {
                padding: 20px 0 40px;
            }

            .orders-content {
                padding: 15px;
            }

            .section-title {
                font-size: 1.5rem;
            }

            .order-table .table thead th,
            .order-table .table tbody td {
                padding: 8px 10px;
                font-size: 0.85rem;
            }

            .filter-bar {
                padding: 15px;
            }
        }
    </style>


    <!-- ============================================================ -->
    <!-- PAGE HEADER WITH BREADCRUMB -->
    <!-- ============================================================ -->
    <section class="page-header">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fa fa-home"></i> Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('user.dashboard') }}">My Account</a></li>
                    <li class="breadcrumb-item active" aria-current="page">My Orders</li>
                </ol>
            </nav>
            <h1 class="section-title">My Orders</h1>
            <p class="section-subtitle">View and track all your previous orders</p>
        </div>
    </section>

    <!-- ============================================================ -->
    <!-- ORDER HISTORY SECTION -->
    <!-- ============================================================ -->
    <section class="orders-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="orders-content">

                        <div class="content-title">
                            <i class="fa fa-shopping-bag"></i> Orders History
                            <span class="badge ms-auto"
                                style="background-color: var(--primary-orange); font-size: 0.85rem; padding: 6px 14px; border-radius: 50px;">
                                8 Orders
                            </span>
                        </div>

                        <!-- ===== SEARCH & FILTER BAR ===== -->
                        <div class="filter-bar">
                            <div class="row g-3">
                                <div class="col-md-5">
                                    <div class="input-group">
                                        <span class="input-group-text bg-white border-end-0"
                                            style="border-radius: 10px 0 0 10px;">
                                            <i class="fa fa-search text-orange"></i>
                                        </span>
                                        <input type="text" class="form-control border-start-0" id="searchOrder"
                                            placeholder="Search by order # or product name..."
                                            style="border-radius: 0 10px 10px 0;">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <select class="form-select" id="filterDate">
                                        <option value="">All Time</option>
                                        <option value="30">Last 30 Days</option>
                                        <option value="90">Last 3 Months</option>
                                        <option value="180">Last 6 Months</option>
                                        <option value="365">Last Year</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <select class="form-select" id="sortBy">
                                        <option value="newest">Newest First</option>
                                        <option value="oldest">Oldest First</option>
                                        <option value="highest">Highest Amount</option>
                                        <option value="lowest">Lowest Amount</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- ===== STATUS FILTER PILLS ===== -->
                        <div class="status-filters">
                            <button class="btn btn-orange filter-btn active" data-status="all">All Orders</button>
                            <button class="btn btn-outline-secondary filter-btn" data-status="pending">Pending</button>
                            <button class="btn btn-outline-secondary filter-btn"
                                data-status="processing">Processing</button>
                            <button class="btn btn-outline-secondary filter-btn" data-status="shipped">Shipped</button>
                            <button class="btn btn-outline-secondary filter-btn" data-status="delivered">Delivered</button>
                            <button class="btn btn-outline-secondary filter-btn" data-status="cancelled">Cancelled</button>
                        </div>

                        <!-- ===== ORDERS TABLE ===== -->
                        <div class="order-table">
                            <div class="table-responsive">
                                <table class="table" id="ordersTable">
                                    <thead>
                                        <tr>
                                            <th>Order #</th>
                                            <th>Date</th>
                                            <th>Items</th>
                                            <th>Status</th>
                                            <th>Total</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Order 1 -->
                                        <tr data-status="delivered">
                                            <td><strong>#TM-0042</strong></td>
                                            <td>Jan 18, 2026</td>
                                            <td>3 items</td>
                                            <td><span class="badge-status status-delivered">Delivered</span></td>
                                            <td>$1,172.88</td>
                                            <td>
                                                <button class="btn-view-order" data-bs-toggle="modal"
                                                    data-bs-target="#orderModal" data-order='{
                                                                                                                "number": "TM-0042",
                                                                                                                "date": "Jan 18, 2026",
                                                                                                                "status": "Delivered",
                                                                                                                "payment": "Credit Card",
                                                                                                                "shipping": "John Doe, 123 Main Street, New York, NY 10001, United States",
                                                                                                                "items": [
                                                                                                                    {"name": "Premium Laptop Pro", "qty": 1, "price": 899.00},
                                                                                                                    {"name": "Wireless Headphones", "qty": 1, "price": 79.00},
                                                                                                                    {"name": "USB-C Hub", "qty": 2, "price": 97.44}
                                                                                                                ],
                                                                                                                "total": 1172.88
                                                                                                            }'>
                                                    View Details
                                                </button>
                                            </td>
                                        </tr>

                                        <!-- Order 2 -->
                                        <tr data-status="shipped">
                                            <td><strong>#TM-0038</strong></td>
                                            <td>Jan 12, 2026</td>
                                            <td>2 items</td>
                                            <td><span class="badge-status status-shipped">Shipped</span></td>
                                            <td>$349.00</td>
                                            <td>
                                                <button class="btn-view-order" data-bs-toggle="modal"
                                                    data-bs-target="#orderModal" data-order='{
                                                                                                                "number": "TM-0038",
                                                                                                                "date": "Jan 12, 2026",
                                                                                                                "status": "Shipped",
                                                                                                                "payment": "PayPal",
                                                                                                                "shipping": "John Doe, 456 Oak Avenue, Los Angeles, CA 90001, United States",
                                                                                                                "items": [
                                                                                                                    {"name": "Smart Watch Pro", "qty": 1, "price": 149.00},
                                                                                                                    {"name": "Fitness Tracker Band", "qty": 2, "price": 100.00}
                                                                                                                ],
                                                                                                                "total": 349.00
                                                                                                            }'>
                                                    View Details
                                                </button>
                                            </td>
                                        </tr>

                                        <!-- Order 3 -->
                                        <tr data-status="processing">
                                            <td><strong>#TM-0029</strong></td>
                                            <td>Jan 5, 2026</td>
                                            <td>1 item</td>
                                            <td><span class="badge-status status-processing">Processing</span></td>
                                            <td>$89.00</td>
                                            <td>
                                                <button class="btn-view-order" data-bs-toggle="modal"
                                                    data-bs-target="#orderModal" data-order='{
                                                                                                                "number": "TM-0029",
                                                                                                                "date": "Jan 5, 2026",
                                                                                                                "status": "Processing",
                                                                                                                "payment": "Credit Card",
                                                                                                                "shipping": "John Doe, 789 Pine Road, Chicago, IL 60601, United States",
                                                                                                                "items": [
                                                                                                                    {"name": "Bluetooth Speaker", "qty": 1, "price": 89.00}
                                                                                                                ],
                                                                                                                "total": 89.00
                                                                                                            }'>
                                                    View Details
                                                </button>
                                            </td>
                                        </tr>

                                        <!-- Order 4 -->
                                        <tr data-status="delivered">
                                            <td><strong>#TM-0021</strong></td>
                                            <td>Dec 28, 2025</td>
                                            <td>2 items</td>
                                            <td><span class="badge-status status-delivered">Delivered</span></td>
                                            <td>$159.00</td>
                                            <td>
                                                <button class="btn-view-order" data-bs-toggle="modal"
                                                    data-bs-target="#orderModal" data-order='{
                                                                                                                "number": "TM-0021",
                                                                                                                "date": "Dec 28, 2025",
                                                                                                                "status": "Delivered",
                                                                                                                "payment": "Debit Card",
                                                                                                                "shipping": "John Doe, 321 Elm Street, Houston, TX 77001, United States",
                                                                                                                "items": [
                                                                                                                    {"name": "Mechanical Keyboard", "qty": 1, "price": 129.00},
                                                                                                                    {"name": "Mouse Pad", "qty": 1, "price": 30.00}
                                                                                                                ],
                                                                                                                "total": 159.00
                                                                                                            }'>
                                                    View Details
                                                </button>
                                            </td>
                                        </tr>

                                        <!-- Order 5 -->
                                        <tr data-status="cancelled">
                                            <td><strong>#TM-0015</strong></td>
                                            <td>Dec 20, 2025</td>
                                            <td>1 item</td>
                                            <td><span class="badge-status status-cancelled">Cancelled</span></td>
                                            <td>$29.00</td>
                                            <td>
                                                <button class="btn-view-order" data-bs-toggle="modal"
                                                    data-bs-target="#orderModal" data-order='{
                                                                                                                "number": "TM-0015",
                                                                                                                "date": "Dec 20, 2025",
                                                                                                                "status": "Cancelled",
                                                                                                                "payment": "Credit Card",
                                                                                                                "shipping": "John Doe, 654 Maple Drive, Miami, FL 33101, United States",
                                                                                                                "items": [
                                                                                                                    {"name": "Phone Case", "qty": 1, "price": 29.00}
                                                                                                                ],
                                                                                                                "total": 29.00
                                                                                                            }'>
                                                    View Details
                                                </button>
                                            </td>
                                        </tr>

                                        <!-- Order 6 -->
                                        <tr data-status="delivered">
                                            <td><strong>#TM-0012</strong></td>
                                            <td>Dec 15, 2025</td>
                                            <td>4 items</td>
                                            <td><span class="badge-status status-delivered">Delivered</span></td>
                                            <td>$549.00</td>
                                            <td>
                                                <button class="btn-view-order" data-bs-toggle="modal"
                                                    data-bs-target="#orderModal" data-order='{
                                                                                                                "number": "TM-0012",
                                                                                                                "date": "Dec 15, 2025",
                                                                                                                "status": "Delivered",
                                                                                                                "payment": "PayPal",
                                                                                                                "shipping": "John Doe, 987 Cedar Lane, Seattle, WA 98101, United States",
                                                                                                                "items": [
                                                                                                                    {"name": "Tablet Pro 11", "qty": 1, "price": 399.00},
                                                                                                                    {"name": "Tablet Case", "qty": 1, "price": 49.00},
                                                                                                                    {"name": "Screen Protector", "qty": 2, "price": 50.50}
                                                                                                                ],
                                                                                                                "total": 549.00
                                                                                                            }'>
                                                    View Details
                                                </button>
                                            </td>
                                        </tr>

                                        <!-- Order 7 -->
                                        <tr data-status="pending">
                                            <td><strong>#TM-0008</strong></td>
                                            <td>Dec 8, 2025</td>
                                            <td>1 item</td>
                                            <td><span class="badge-status status-pending">Pending</span></td>
                                            <td>$199.00</td>
                                            <td>
                                                <button class="btn-view-order" data-bs-toggle="modal"
                                                    data-bs-target="#orderModal" data-order='{
                                                                                                                "number": "TM-0008",
                                                                                                                "date": "Dec 8, 2025",
                                                                                                                "status": "Pending",
                                                                                                                "payment": "Bank Transfer",
                                                                                                                "shipping": "John Doe, 147 Birch Boulevard, Denver, CO 80201, United States",
                                                                                                                "items": [
                                                                                                                    {"name": "Gaming Mouse", "qty": 1, "price": 199.00}
                                                                                                                ],
                                                                                                                "total": 199.00
                                                                                                            }'>
                                                    View Details
                                                </button>
                                            </td>
                                        </tr>

                                        <!-- Order 8 -->
                                        <tr data-status="delivered">
                                            <td><strong>#TM-0003</strong></td>
                                            <td>Nov 28, 2025</td>
                                            <td>2 items</td>
                                            <td><span class="badge-status status-delivered">Delivered</span></td>
                                            <td>$249.00</td>
                                            <td>
                                                <button class="btn-view-order" data-bs-toggle="modal"
                                                    data-bs-target="#orderModal" data-order='{
                                                                                                                "number": "TM-0003",
                                                                                                                "date": "Nov 28, 2025",
                                                                                                                "status": "Delivered",
                                                                                                                "payment": "Credit Card",
                                                                                                                "shipping": "John Doe, 258 Walnut Way, Boston, MA 02101, United States",
                                                                                                                "items": [
                                                                                                                    {"name": "Noise Cancelling Earbuds", "qty": 1, "price": 199.00},
                                                                                                                    {"name": "Earbud Tips Pack", "qty": 1, "price": 50.00}
                                                                                                                ],
                                                                                                                "total": 249.00
                                                                                                            }'>
                                                    View Details
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <!-- ===== NO RESULTS MESSAGE ===== -->
                            <div class="empty-state" id="noResults" style="display: none;">
                                <i class="fa fa-search"></i>
                                <h5>No Orders Found</h5>
                                <p>Try changing your filters or search term.</p>
                                <button class="btn btn-orange rounded-pill px-4" onclick="resetFilters()">
                                    <i class="fa fa-refresh"></i> Reset Filters
                                </button>
                            </div>
                        </div>

                        <!-- ===== PAGINATION ===== -->
                        <nav aria-label="Page navigation" class="mt-4">
                            <ul class="pagination justify-content-center">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#"><i class="fa fa-chevron-left"></i></a>
                                </li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#"><i class="fa fa-chevron-right"></i></a>
                                </li>
                            </ul>
                        </nav>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ============================================================ -->
    <!-- ORDER DETAILS MODAL -->
    <!-- ============================================================ -->
    <div class="modal fade order-modal" id="orderModal" tabindex="-1" aria-labelledby="orderModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="orderModalLabel">
                        <i class="fa fa-file-text-o me-2"></i> Order Details
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <!-- Order Info Grid -->
                    <div class="order-info-grid">
                        <div class="order-info-item">
                            <label>Order Number</label>
                            <span id="modalOrderNumber">#TM-0000</span>
                        </div>
                        <div class="order-info-item">
                            <label>Order Date</label>
                            <span id="modalOrderDate">Jan 1, 2026</span>
                        </div>
                        <div class="order-info-item">
                            <label>Status</label>
                            <span id="modalOrderStatus">Delivered</span>
                        </div>
                        <div class="order-info-item">
                            <label>Payment Method</label>
                            <span id="modalOrderPayment">Credit Card</span>
                        </div>
                    </div>

                    <!-- Shipping Address -->
                    <div class="mb-4">
                        <h6 style="font-weight: 700; color: var(--text-dark); margin-bottom: 10px;">
                            <i class="fa fa-map-marker text-orange"></i> Shipping Address
                        </h6>
                        <p id="modalOrderShipping" style="color: var(--text-gray); font-size: 0.9rem; margin-bottom: 0;">
                            John Doe, 123 Main Street, New York, NY 10001, United States
                        </p>
                    </div>

                    <!-- Items Table -->
                    <div class="mb-3">
                        <h6 style="font-weight: 700; color: var(--text-dark); margin-bottom: 10px;">
                            <i class="fa fa-shopping-cart text-orange"></i> Order Items
                        </h6>
                        <table class="order-items-table">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th class="text-center">Qty</th>
                                    <th class="text-end">Price</th>
                                </tr>
                            </thead>
                            <tbody id="modalOrderItems">
                                <tr>
                                    <td>Premium Laptop Pro</td>
                                    <td class="text-center">1</td>
                                    <td class="text-end">$899.00</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- Order Total -->
                    <div class="order-total">
                        <span>Total Amount</span>
                        <span id="modalOrderTotal">$0.00</span>
                    </div>

                </div>
                <div class="modal-footer" style="border-top: 1px solid #f0f0f0; padding: 15px 25px;">
                    <button type="button" class="btn btn-outline-secondary rounded-pill px-4" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="button" class="btn btn-orange rounded-pill px-4">
                        <i class="fa fa-download"></i> Download Invoice
                    </button>
                </div>
            </div>
        </div>
    </div>


    <script>
        // ===== STATUS FILTER =====
        document.querySelectorAll('.filter-btn').forEach(function (btn) {
            btn.addEventListener('click', function () {
                document.querySelectorAll('.filter-btn').forEach(function (b) {
                    b.classList.remove('btn-orange');
                    b.classList.add('btn-outline-secondary');
                });
                this.classList.remove('btn-outline-secondary');
                this.classList.add('btn-orange');

                const status = this.dataset.status;
                filterOrders(status);
            });
        });

        function filterOrders(status) {
            const rows = document.querySelectorAll('#ordersTable tbody tr');
            let visibleCount = 0;

            rows.forEach(function (row) {
                if (status === 'all' || row.dataset.status === status) {
                    row.style.display = '';
                    visibleCount++;
                } else {
                    row.style.display = 'none';
                }
            });

            document.getElementById('noResults').style.display = visibleCount === 0 ? 'block' : 'none';
            document.getElementById('ordersTable').style.display = visibleCount === 0 ? 'none' : 'table';
        }

        // ===== SEARCH FUNCTION =====
        document.getElementById('searchOrder')?.addEventListener('input', function () {
            const query = this.value.toLowerCase();
            const rows = document.querySelectorAll('#ordersTable tbody tr');
            let visibleCount = 0;

            rows.forEach(function (row) {
                const text = row.textContent.toLowerCase();
                if (text.includes(query)) {
                    row.style.display = '';
                    visibleCount++;
                } else {
                    row.style.display = 'none';
                }
            });

            document.getElementById('noResults').style.display = visibleCount === 0 ? 'block' : 'none';
            document.getElementById('ordersTable').style.display = visibleCount === 0 ? 'none' : 'table';
        });

        // ===== RESET FILTERS =====
        function resetFilters() {
            document.getElementById('searchOrder').value = '';
            document.getElementById('filterDate').value = '';
            document.getElementById('sortBy').value = 'newest';

            document.querySelectorAll('.filter-btn').forEach(function (b) {
                b.classList.remove('btn-orange');
                b.classList.add('btn-outline-secondary');
            });
            document.querySelector('.filter-btn[data-status="all"]').classList.remove('btn-outline-secondary');
            document.querySelector('.filter-btn[data-status="all"]').classList.add('btn-orange');

            document.querySelectorAll('#ordersTable tbody tr').forEach(function (row) {
                row.style.display = '';
            });
            document.getElementById('noResults').style.display = 'none';
            document.getElementById('ordersTable').style.display = 'table';
        }

        // ===== ORDER DETAILS MODAL =====
        const orderModal = document.getElementById('orderModal');
        orderModal.addEventListener('show.bs.modal', function (event) {
            const button = event.relatedTarget;
            const orderData = JSON.parse(button.getAttribute('data-order'));

            // Fill modal fields
            document.getElementById('modalOrderNumber').textContent = '#' + orderData.number;
            document.getElementById('modalOrderDate').textContent = orderData.date;
            document.getElementById('modalOrderStatus').textContent = orderData.status;
            document.getElementById('modalOrderPayment').textContent = orderData.payment;
            document.getElementById('modalOrderShipping').textContent = orderData.shipping;
            document.getElementById('modalOrderTotal').textContent = '$' + orderData.total.toFixed(2);

            // Fill items table
            const itemsBody = document.getElementById('modalOrderItems');
            itemsBody.innerHTML = '';
            orderData.items.forEach(function (item) {
                const row = document.createElement('tr');
                row.innerHTML = `
                                                                            <td>${item.name}</td>
                                                                            <td class="text-center">${item.qty}</td>
                                                                            <td class="text-end">$${item.price.toFixed(2)}</td>
                                                                        `;
                itemsBody.appendChild(row);
            });
        });
    </script>

@endsection