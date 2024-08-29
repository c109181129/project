@extends('layout.master')

@section('content')
<section id="content">

<section id="slider" class="slider-element swiper_wrapper min-vh-60 min-vh-md-100">
			<div class="slider-inner">

				<div class="swiper-container swiper-parent">
					<div class="swiper-wrapper">
						<div class="swiper-slide dark">
							<div class="container">
								<div class="slider-caption slider-caption-center">
								<h2 data-animate="fadeInUp" style="color: #000000;">綠盾塗料—無毒健康</h2>
									<p class="d-none d-sm-block" data-animate="fadeInUp" data-delay="200" style="color: #C8102E;">選擇綠盾塗料，您不僅獲得無毒的健康油漆，也是支持我們的 ESG 構想，讓我們共同推動環境保護和社會責任，為未來創造更美好的世界</p>
								</div>
							</div>
							<div class="swiper-slide-bg" style="background:  url('{{ asset('assets/greenforever/pic1.jpg')}}');"></div>
						</div>
						<div class="swiper-slide dark">
							<div class="container">
								<div class="slider-caption slider-caption-center">
								<h2 data-animate="fadeInUp" style="color: #004d00;">綠盾塗料-卓越品質，環保無憂</h2>
									<p class="d-none d-sm-block" data-animate="fadeInUp" data-delay="200" style="color: #ffffff;">選擇綠盾塗料，全面解決建築需求，從防水堵漏到節能隔熱，我們為您的每個角落提供完美保護</p>
								</div>
							</div>
							<div class="swiper-slide-bg" style="background:  url('{{ asset('assets/greenforever/pic2.jpg')}}');"></div>
						</div>
						<div class="swiper-slide">
							<div class="container">
								<div class="slider-caption">
									<h2 data-animate="fadeInUp" style="color: #ffffff;">綠盾塗料-全方位解決方案</h2>
									<p class="d-none d-sm-block" data-animate="fadeInUp" data-delay="200" style="color: #ffffff;">選擇綠盾塗料，高效能與低環境影響的結合，致力於為您創造更美好的居住和工作環境，每一寸塗料都經過精心設計，為您的空間提供無憂的保護和美觀</p>
								</div>
							</div>
							<div class="swiper-slide-bg" style="background:  url('{{ asset('assets/greenforever/pic3.jpg')}}');"></div>
						</div>
					</div>
					<div class="slider-arrow-left"><i class="uil uil-angle-left-b"></i></div>
					<div class="slider-arrow-right"><i class="uil uil-angle-right-b"></i></div>
					<div class="slide-number"><div class="slide-number-current"></div><span>/</span><div class="slide-number-total"></div></div>
				</div>

			</div>
		</section>

			<div class="content-wrap pt-0">
		
				<div class="section m-0" style="background-color: #eef2f5;">
					<div class="container">

						<div class="heading-block text-center border-bottom-0 mb-5 mt-4 mx-auto" style="max-width: 640px">
							<h1 class="text-transform-none font-secondary fw-normal" style="font-size: 50px;">公司宗旨:</h1>
							<span><p>我們公司的宗旨為:讓顧客使用 <strong>最安全</strong>, <strong>無毒</strong> &amp; <strong>無添加</strong> 的健康塗料。</p></span>
						</div>

						<!-- Features colomns
						============================================= -->
						<div class="row align-items-stretch g-4">
							@foreach ($MerchandisePaginate as $Merchandise)	
								<div class="col-lg-3 col-md-6">
									<div class="feature-box media-box fbox-bg h-100">
										<div class="fbox-media">
											<a href="{{ route('merchandise.thing', ['merchandise_id' => $Merchandise->id]) }}"><img src="{{ asset($Merchandise->photo) }}" alt="{{ $Merchandise->name }}"></a>
										</div>
										<div class="fbox-content border-0">
											<h3 class="text-transform-none ls-0 fw-semibold">{{$Merchandise->name}}<span class="subtitle fw-light ls-0">{{ $Merchandise->introduction }}</span></h3>
											<a href="{{ route('merchandise.thing', ['merchandise_id' => $Merchandise->id]) }}" class="button-link border-0 color">閱讀更多</a>
										</div>
									</div>
								</div>
							@endforeach
							{{ $MerchandisePaginate->links('vendor.pagination.custom-pagination') }}
						</div>
					</div>
				</div>

				<div class="section mb-0">
					<div class="heading-block text-center border-bottom-0 mb-0 mx-auto" style="max-width: 640px">
						<h3 class="text-transform-none font-secondary fw-normal" style="font-size: 36px;">我們的產品圖示</h3>
						<span>我們永遠致力於，建築物防水堵漏、節能隔熱、自潔抗污、硬化地坪等需求，提供最完整的解決方案。</span>
					</div>
				</div>

				<div class="masonry-thumbs row row-cols-6 grid-container" data-big="3" data-lightbox="gallery">
					@foreach ($MerchandisePaginate as $Merchandise)
						<a class="grid-item" href="{{ asset($Merchandise->photo) }}" data-lightbox="gallery-item">
							<div class="grid-inner">
								<img src="{{ asset($Merchandise->photo) }}" alt="Gallery Thumb 1">
								<div class="bg-overlay">
									<div class="bg-overlay-content dark">
										<i class="uil uil-plus h4 mb-0" data-hover-animate="fadeIn"></i>
									</div>
									<div class="bg-overlay-bg dark" data-hover-animate="fadeIn"></div>
								</div>
							</div>
						</a>
					@endforeach
				</div>

				<div class="section m-0 bg-transparent">
					<div class="container">
						<div class="heading-block text-center border-bottom-0 mx-auto" style="max-width: 640px">
							<h3 class="text-transform-none font-secondary fw-normal" style="font-size: 36px;">我們的產品價格</h3>
							<span>我們深知顧客的價值，並以最優惠的價格，為您提供卓越品質的產品，確保我們品牌的卓越價值始終如一</span>
						</div>
						<div class="row mt-5">
							<div class="col-lg-5 d-none d-lg-block">
								<img src="{{ asset('assets/greenforever/forever.png')}}" alt="plants">
							</div>
							<div class="col-lg-7 col-md-12">
								<div class="row">
									@foreach ($MerchandisePaginate->take(6) as $Merchandise)
										<div class="col-md-4 col-6">
											<div class="product">
												<div class="product-image shadow-none">
													<a href="{{ route('merchandise.thing', ['merchandise_id' => $Merchandise->id]) }}">
														<img src="{{ asset($Merchandise->photo) }}" alt="High-Heel Girl's Sandals">
													</a>
												</div>
												<div class="product-desc text-center">
													<div class="product-title">
														<h3><a href="{{ route('merchandise.thing', ['merchandise_id' => $Merchandise->id]) }}">{{$Merchandise->name}}</a></h3>
													</div>
													<div class="product-price">
														<ins>如需資訊，請電洽</ins>
													</div>
												</div>
											</div>
										</div>
									@endforeach
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="container mt-6">
					<div class="heading-block text-center border-bottom-0 mx-auto" style="max-width: 640px">
						<h3 class="text-transform-none font-secondary fw-normal" style="font-size: 36px;">我們的經銷商</h3>
						<span>下列為我們的經銷商地址</span>
					</div>
					<div class="row contact-properties">
						<div class="col-md-4">
						<a href="https://maps.app.goo.gl/g9vmJ1skviVbisau9" style="background: url('{{ asset('assets/shop/shop1.jpg')}}') no-repeat center center; background-size: cover;">
								<div class="vertical-middle dark text-center">
									<div class="heading-block m-0 border-0">
										<h3 class="text-capitalize fw-normal font-secondary">XX油漆防水工程行</h3>
										<span style="margin-top: 100px; font-size: 17px; font-weight: 500;">
											拜訪地址:<br>
											80755高雄市三民區同盟一路69號
										</span>
									</div>
								</div>
							</a>
						</div>
						<div class="col-md-4">
							<a href="https://maps.app.goo.gl/hntJxCSL7KLW9vNw5" style="background: url('{{ asset('assets/shop/shop2.jpg')}}') no-repeat center center; background-size: cover;">
								<div class="vertical-middle dark text-center">
									<div class="heading-block m-0 border-0">
										<h3 class="text-capitalize fw-normal font-secondary">高雄XX油漆行</h3>
										<span style="margin-top: 100px; font-size: 17px; font-weight: 500;">
											拜訪地址:<br>
											807高雄市三民區九如一路197號
										</span>
									</div>
								</div>
							</a>
						</div>
						<div class="col-md-4">
							<a href="https://maps.app.goo.gl/mQ9XUL8WFZREz8vVA" style="background: url('{{ asset('assets/shop/shop3.jpg')}}') no-repeat center center; background-size: cover;">
								<div class="vertical-middle dark text-center">
									<div class="heading-block m-0 border-0">
										<h3 class="text-capitalize fw-normal font-secondary">XX油漆行</h3>
										<span style="margin-top: 100px; font-size: 17px; font-weight: 500;">
											拜訪地址:<br>
											807高雄市三民區金鼎路299號
										</span>
									</div>
								</div>
							</a>
						</div>
					</div>
				</div>
			</div>
		</section><!-- #content end -->
 @endsection

		