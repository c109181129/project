<!-- 指定繼承 layout.master 母模板 --> 
@extends('layout.master') 
@section('title',$title)
<!-- 傳送資料到母模板，並指定變數為 title --> 
<!-- 傳送資料到母模板，並指定變數為 content -->
@section('content') 


<style>
	#slider {
    width: 100%;
    height: 100vh; /* 高度為視口高度 */
    overflow: hidden;
}

/* 確保 swiper-container 充滿其父容器 */
.swiper-container {
    width: 100%;
    height: 100%;
}

/* 確保 swiper-slide 充滿容器並定位為相對 */
.swiper-slide {
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100%;
    position: relative;
}

/* 背景視頻的樣式 */
.swiper-slide-bg {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    overflow: hidden;
    z-index: -1; /* 確保視頻在內容之下 */
}

#slide-video {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: cover; /* 確保視頻保持比例填滿容器 */
}
</style>

		<!-- Content
		============================================= -->
    <section id="slider" class="slider-element swiper_wrapper min-vh-60 min-vh-md-100">
        <div class="slider-inner">
            <div class="swiper-container swiper-parent">
                <div class="swiper-wrapper">
                    <div class="swiper-slide dark">
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
													登入MyGreenShiled帳號
												</div>
											</div>
											<div>
												<form class="row" action="/user/auth/login" method="post">
													@csrf
													<div class="col-12 form-group">
														<label for="login-form-email">使用者信箱:</label>
														<input type="text" id="email" name="email" value="" class="form-control">
													</div>

													<div class="col-12 form-group">
														<label for="login-form-password">密碼:</label>
														<input type="password" id="password" name="password" value="" class="form-control">
													</div>

													<div class="col-12 form-group">
														<div class="d-flex justify-content-between">
															<button class="button button-3d button-black m-0" id="login-form-submit" name="login-form-submit" value="login">登入</button>
														</div>
													</div>
												</form>
											</div>
										</div>
									</div>
								</div>
                            </div>
                        </div>
                        <div class="swiper-slide-bg">
                            <video autoplay muted loop id="slide-video">
                                <source src="{{ asset('assets/greenforever/4k.mp4') }}" type="video/mp4">
                            </video>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
	@include('components.errorMessage')
@endsection
