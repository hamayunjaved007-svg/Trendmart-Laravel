@extends('layouts.head')

@section('title', 'Welcome to TrendMart')

@section('content')
    <!-- ============================================================ -->
    <!-- HERO SECTION -->
    <!-- ============================================================ -->
    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <div class="hero-badge">
                        <i class="fa fa-rocket"></i> Smart Shopping, Better Prices
                    </div>
                    <h1 class="hero-title">
                        Discover <br>
                        <span class="highlight">Trendy Products</span> <br>
                        at Best Prices
                    </h1>
                    <p class="hero-subtitle">
                        Shop the latest trends in fashion, electronics, home goods, and more.
                        Quality products with fast delivery — all at unbeatable prices.
                    </p>

                    <!-- Search Box -->
                    <div class="search-box">
                        <input type="text" placeholder="What are you looking for?">
                        <button class="btn-search">
                            <i class="fa fa-search"></i> Search
                        </button>
                    </div>

                    <!-- Stats -->
                    <div class="hero-stats">
                        <div class="stat-item">
                            <span class="stat-number">10K+</span>
                            <span class="stat-label">Happy Customers</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-number">500+</span>
                            <span class="stat-label">Products</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-number">98%</span>
                            <span class="stat-label">Satisfaction Rate</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 d-none d-lg-block">
                    <div class="hero-image">
                        <img src="{{ asset('hero-shopping.png') }}" alt="Shopping" class="img-fluid"
                            style="max-height: 380px;">
                        <div class="floating-card card-1">
                            <i class="fa fa-truck"></i>
                            <span>Free Delivery</span>
                        </div>
                        <div class="floating-card card-2">
                            <i class="fa fa-shield"></i>
                            <span>Secure Payment</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ============================================================ -->
    <!-- CATEGORIES SECTION -->
    <!-- ============================================================ -->
    <section class="py-5" style="background: #fff;">
        <div class="container">
            <div class="text-center mb-5">
                <span class="section-badge"><i class="fa fa-th-large"></i> Shop by Category</span>
                <h2 class="section-title text-center">Browse Top Categories</h2>
                <p class="section-subtitle">Find exactly what you need from our wide range of categories</p>
            </div>
            <div class="row g-4">
                <!-- Category 1 -->
                <div class="col-lg-3 col-md-6">
                    <div class="category-card">
                        <div class="icon-wrapper">
                            <i class="fa fa-laptop"></i>
                        </div>
                        <h5>Electronics</h5>
                        <p>Gadgets & Accessories</p>
                    </div>
                </div>
                <!-- Category 2 -->
                <div class="col-lg-3 col-md-6">
                    <div class="category-card">
                        <div class="icon-wrapper">
                            <i class="fa fa-female"></i>
                        </div>
                        <h5>Fashion</h5>
                        <p>Clothing & Accessories</p>
                    </div>
                </div>
                <!-- Category 3 -->
                <div class="col-lg-3 col-md-6">
                    <div class="category-card">
                        <div class="icon-wrapper">
                            <i class="fa fa-cubes"></i>
                        </div>
                        <h5>Home & Living</h5>
                        <p>Furniture & Decor</p>
                    </div>
                </div>
                <!-- Category 4 -->
                <div class="col-lg-3 col-md-6">
                    <div class="category-card">
                        <div class="icon-wrapper">
                            <i class="fa fa-heartbeat"></i>
                        </div>
                        <h5>Health & Beauty</h5>
                        <p>Wellness & Care</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ============================================================ -->
    <!-- SHOP NOW BANNER -->
    <!-- ============================================================ -->
    <section class="shop-now-banner">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <h2 style="font-weight: 800; font-size: 2.5rem; color: var(--text-dark);">
                        Ready to Start <span class="text-orange">Shopping</span>?
                    </h2>
                    <p style="color: var(--text-gray); font-size: 1.1rem; max-width: 550px;">
                        Join thousands of satisfied customers. Get the best deals on quality products today!
                    </p>
                </div>
                <div class="col-lg-4 text-lg-end text-center mt-3 mt-lg-0">
                    <a href="#" class="btn btn-orange btn-lg rounded-pill px-5 py-3">
                        <i class="fa fa-shopping-bag"></i> Shop Now
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- ============================================================ -->
    <!-- PRODUCTS SECTION -->
    <!-- ============================================================ -->
    <section class="py-5" style="background: #fff;">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center mb-5">
                <div>
                    <span class="section-badge"><i class="fa fa-star"></i> Featured Products</span>
                    <h2 class="section-title mb-0">Trending Now</h2>
                </div>
                <a href="#" class="btn btn-outline-orange rounded-pill px-4">
                    View All <i class="fa fa-arrow-right ms-2"></i>
                </a>
            </div>
            <div class="row g-4">
                <!-- Product 1 -->
                <div class="col-lg-3 col-md-6">
                    <div class="product-card">
                        <div class="product-image">
                            <span class="badge-sale">SALE</span>
                            <i class="fa fa-laptop"></i>
                        </div>
                        <div class="product-body">
                            <div class="product-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-half-o"></i>
                                <span>(24)</span>
                            </div>
                            <h5>Premium Laptop</h5>
                            <div class="product-price">
                                $899 <span class="old-price">$1,199</span>
                            </div>
                            <button class="btn btn-orange btn-add-cart mt-3">
                                <i class="fa fa-shopping-cart"></i> Add to Cart
                            </button>
                        </div>
                    </div>
                </div>
                <!-- Product 2 -->
                <div class="col-lg-3 col-md-6">
                    <div class="product-card">
                        <div class="product-image">
                            <span class="badge-new">NEW</span>
                            <i class="fa fa-male"></i>
                        </div>
                        <div class="product-body">
                            <div class="product-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <span>(18)</span>
                            </div>
                            <h5>Casual T-Shirt</h5>
                            <div class="product-price">
                                $29 <span class="old-price">$45</span>
                            </div>
                            <button class="btn btn-orange btn-add-cart mt-3">
                                <i class="fa fa-shopping-cart"></i> Add to Cart
                            </button>
                        </div>
                    </div>
                </div>
                <!-- Product 3 -->
                <div class="col-lg-3 col-md-6">
                    <div class="product-card">
                        <div class="product-image">
                            <i class="fa fa-headphones"></i>
                        </div>
                        <div class="product-body">
                            <div class="product-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o"></i>
                                <span>(32)</span>
                            </div>
                            <h5>Wireless Headphones</h5>
                            <div class="product-price">
                                $79 <span class="old-price">$120</span>
                            </div>
                            <button class="btn btn-orange btn-add-cart mt-3">
                                <i class="fa fa-shopping-cart"></i> Add to Cart
                            </button>
                        </div>
                    </div>
                </div>
                <!-- Product 4 -->
                <div class="col-lg-3 col-md-6">
                    <div class="product-card">
                        <div class="product-image">
                            <span class="badge-sale">SALE</span>
                            <i class="fa fa-camera"></i>
                        </div>
                        <div class="product-body">
                            <div class="product-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-half-o"></i>
                                <span>(15)</span>
                            </div>
                            <h5>Digital Camera</h5>
                            <div class="product-price">
                                $499 <span class="old-price">$650</span>
                            </div>
                            <button class="btn btn-orange btn-add-cart mt-3">
                                <i class="fa fa-shopping-cart"></i> Add to Cart
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection