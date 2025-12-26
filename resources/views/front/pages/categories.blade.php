@extends('front.layouts.app')

@section('title', $data->meta_title)
@section('description', $data->meta_description)
@section('keywords', $data->meta_keywords)
@section('content')

    <!-- breadcrumb area start here  -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="breadcrumb-wrap text-center">
                <h2 class="page-title">{{$data->title ?? ""}}</h2>
                <ul class="breadcrumb-pages">
                    <li class="page-item"><a class="page-item-link" href="http://127.0.0.1:8000">Home</a></li>
                    <li class="page-item">{{$data->title ?? ""}}</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- breadcrumb area end here  -->

    <div class="popular-categories-area section-bg section-top pb-100">
        <div class="container">
            <div class="section-header-area">
                <div class="row">
                    <div class="col-md-6">
                        <h3 class="sub-title">
                            Popular Collections
                        </h3>
                        <h2 class="section-title">
                            Popular Categories
                        </h2>
                    </div>
                    <div class="col-md-6 align-self-end text-md-end">
                        <a href="{{ route('products.index') }}" class="primary-btn">View All Products</a>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($categories as $category)
                <div class="col-lg-4 col-md-6">
                    <a class="single-categorie" href="{{ route('products.bycategory', $category->slug) }}">
                        <div class="categorie-wrap">
                            <div class="categorie-icon">
                                {{-- <i class="icon flaticon-blazer"></i> --}}
                                <img src="{{ asset('front/assets/images/' . $category->icon) }}" />
                            </div>
                            <div class="categorie-info">
                                <h3 class="categorie-name">
                                    {{ $category->en_category_name ?? "" }}</h3>
                                <h4 class="categorie-subtitle">
                                    {{ $category->en_short_info ?? "" }}</h4>
                            </div>
                        </div>
                        <i class="arrow flaticon-right-arrow"></i>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection