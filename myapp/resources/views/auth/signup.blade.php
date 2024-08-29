@extends('layout.master') 
@section('title', $title)

@section('content')

<style>
    #slider {
        width: 100%;
        height: 100vh; /* 高度為視窗高度 */
        overflow: hidden;
    }

    .swiper-container {
        width: 100%;
        height: 100%;
    }

    .swiper-slide {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100%;
        position: relative;
    }

    .swiper-slide-bg {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        overflow: hidden;
        z-index: -1;
    }

    #slide-video {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    /* 標題和圖標靠左對齊，並設置為黑色加粗 */
    .accordion-header, 
    .accordion-title,
    .form-group label,
    .form-check-label {
        text-align: left; /* 左對齊文本 */
        display: block; /* 確保標題在獨立的一行 */
        color: black; /* 設置文字顏色為白色 */
        font-weight: bold; /* 加粗文字 */
    }

    .accordion-icon {
        margin-right: 0.5rem; /* 圖標與標題之間的間距 */
        display: inline-block; /* 使圖標和標題在同一行 */
        vertical-align: middle; /* 圖標垂直居中對齊 */
    }

    /* 輸入框的樣式 */
    .form-control {
        background-color: white; /* 設置輸入框背景為黑色 */
        color: black; /* 設置輸入框內文字顏色為白色 */
        border: 1px solid #ddd; /* 添加邊框顏色 */
    }
</style>

<!-- Content -->
<section id="slider" class="slider-element swiper_wrapper min-vh-60 min-vh-md-100">
    <div class="slider-inner">
        <div class="swiper-container swiper-parent">
            <div class="swiper-wrapper">
                <div class="swiper-slide dark">
                    <div class="swiper-slide-bg">
                        <video autoplay muted loop id="slide-video">
                            <source src="{{ asset('assets/greenforever/Night.mp4') }}" type="video/mp4">
                        </video>
                    </div>
                    <div class="container">
                        <div class="slider-caption slider-caption-center">
                            <div class="content-wrap">
                                <div class="container">
                                    <div class="accordion accordion-lg mx-auto mb-0" style="max-width: 550px;">
                                        <div class="accordion-header">
                                            <div class="accordion-icon">
                                                <i class="accordion-closed bi-person"></i>
                                                <i class="accordion-open bi-check-circle-fill"></i>
                                            </div>
                                            <div class="accordion-title">
                                                新用戶: 去註冊一個吧
                                            </div>
                                        </div>
                                        <div>
                                            <form class="row" action="/user/auth/signup" method="post">
                                                @csrf
                                                <div class="col-12 form-group">
                                                    <label for="register-form-name">暱稱:</label>
                                                    <input type="text" id="nickname" name="nickname" value="" class="form-control">
                                                </div>

                                                <div class="col-12 form-group">
                                                    <label for="register-form-email">email:</label>
                                                    <input type="text" id="email" name="email" value="" class="form-control">
                                                </div>

                                                <div class="col-12 form-group">
                                                    <label for="register-form-username">密碼:</label>
                                                    <input type="text" id="password" name="password" value="" class="form-control">
                                                </div>

                                                <div class="col-12 form-group">
                                                    <label>帳號類型:</label><br>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="type" id="type" value="G" {{ old('type') == 'G' ? 'checked' : '' }}>
                                                        <label class="form-check-label text-transform-none" for="type">一般會員</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="type" id="type" value="A" {{ old('type') == 'A' ? 'checked' : '' }}>
                                                        <label class="form-check-label text-transform-none" for="type">管理者</label>
                                                    </div>
                                                </div>

                                                <div class="col-12 form-group">
                                                    <button class="button button-3d button-black m-0" id="register-form-submit" name="register-form-submit" value="register">開始註冊</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@include('components.errorMessage')

@endsection
