@extends('layout.master')

@section('content')
<section class="page-title bg-transparent">
    <div class="container">
        <div class="page-title-row">
            <div class="page-title-content">
                <h1>搜尋結果</h1>
            </div>
        </div>
    </div>
</section>

<div class="container">
    @if($searchQuery)
        <p>搜尋關鍵字: <strong>{{ $searchQuery }}</strong></p>
    @endif
    
    @if($merchandises->isEmpty())
        <p>沒有找到符合的商品。</p>
    @else
        <div class="product-list">
            @foreach($merchandises as $merchandise)
                <div class="container">
                    <div class="single-product">
                        <div class="product">
                            <div class="row gutter-40">
                                <div class="col-md-5">
                                    <!-- 商品图片 -->
                                    <div class="product-image">
                                        <a href="{{ asset($merchandise->photo) }}" title="{{ $merchandise->name }}" data-lightbox="gallery-item">
                                            <img src="{{ asset($merchandise->photo) }}" alt="{{ $merchandise->name }}">
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-5 product-desc">
                                    <!-- 商品价格 -->
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="product-price" style = "font-size: 30px;"><ins>{{ $merchandise->name }}</ins></div>
                                    </div>
                                    <div class="line"></div>
                                    <!-- 商品介绍 -->
                                    <p style="font-size: 20px;">{{ $merchandise->introduction }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
