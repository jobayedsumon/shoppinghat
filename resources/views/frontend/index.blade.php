@extends('frontend.layouts.app')

@section('content')
    {{-- Categories , Sliders . Today's deal --}}
    <div class="home-banner-area">


        <div class="container-fluid">

            <div class="row">

                <div class="d-none d-md-block col-1 p-0" style="width: 14%; flex: 0 0 14%;max-width: 14%;">

                    <div class="aiz-carousel" data-autoplay="true">

                            <div class="carousel-box">
                                <div class="color_box" style="background-color: #1977F3"></div>
                            </div>
                            <div class="carousel-box">
                                <div class="color_box" style="background-color: #EE284C"></div>
                            </div>
                            <div class="carousel-box">
                                <div class="color_box" style="background-color: #EE284C"></div>
                            </div>
                            <div class="carousel-box">
                                <div class="color_box" style="background-color: #FF83F3"></div>
                            </div>

                        </div>

                </div>

                <div class="d-none d-md-block col-xl-1 col-lg-1 col-md-1 p-0">
                    @include('frontend.partials.category_menu')
                </div>


                @php
                    $num_todays_deal = count($todays_deal_products);
                @endphp


                <div class="@if($num_todays_deal > 0) col-xl-6 col-lg-6 col-md-6 col-xs-12 col-sm-12 @else col-xl-8 col-lg-8 col-md-8 col-xs-12 col-sm-12 @endif p-0">

                    @if (get_setting('home_slider_images') != null)
                        <div class="aiz-carousel dots-inside-bottom mobile-img-auto-height" data-arrows="true" data-dots="true" data-autoplay="true">
                            @php $slider_images = json_decode(get_setting('home_slider_images'), true);  @endphp
                            @foreach ($slider_images as $key => $value)
                                <div class="carousel-box">
                                    <a href="{{ json_decode(get_setting('home_slider_links'), true)[$key] }}">
                                        <img

                                            class="d-block mw-100 img-fit shadow-sm overflow-hidden"

                                            src="{{ uploaded_asset($slider_images[$key]) }}"
                                            alt="{{ env('APP_NAME')}} promo"
                                            @if(count($featured_categories) == 0)
                                            height="327"
                                            @else
                                            height="315"
                                            @endif
                                            onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder-rect.jpg') }}';"
                                        >
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    @endif
                    @if (count($featured_categories) > 0)
                        <ul class="list-unstyled mb-0 row gutters-5">
                            @foreach ($featured_categories as $key => $category)
                                <li class="minw-0 col-4 col-md mt-3">

                             <a href="{{ route('products.category', $category->slug) }}" class="d-block bg-white p-2 text-reset shadow-sm">

                                        <img
                                            src="{{ static_asset('assets/img/placeholder.jpg') }}"
                                            data-src="{{ uploaded_asset($category->banner) }}"
                                            alt="{{ $category->getTranslation('name') }}"
                                            class="lazyload img-fit"
                                            height="78"
                                            onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder-rect.jpg') }}';"
                                        >
                                        <div class="text-truncate fs-12 fw-600 mt-2 opacity-70">{{ $category->getTranslation('name') }}</div>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>


                @if($num_todays_deal > 0)
                <div class="col-xl-1 col-lg-1 col-md-1 col-xs-12 col-sm-12 todays_deal p-0">
                    <div class="bg-white shadow-sm">
                        <div class="bg-primary p-3 d-flex align-items-center justify-content-center">

                            <span class="fw-600 fs-16 mr-2 text-truncate">
                                {{ translate('Todays Deal') }}
                            </span>
                            <span class="badge badge-primary badge-inline">{{ translate('Hot') }}</span>
                        </div>

                        <div class="c-scrollbar-light overflow-auto h-lg-270px p-2 bg-primary">

                            <div class="gutters-5 lg-no-gutters row row-cols-2 row-cols-lg-1">
                            @foreach ($todays_deal_products as $key => $product)
                                @if ($product != null)
                                <div class="col mb-2">

                                    <a href="{{ route('product', $product->slug) }}" class="d-block p-2 text-reset bg-white h-100">

                                        <div class="row gutters-5 align-items-center">
                                            <div class="col-xxl">
                                                <div class="img">
                                                    <img
                                                        class="lazyload img-fit h-140px h-lg-70px"
                                                        src="{{ static_asset('assets/img/placeholder.jpg') }}"
                                                        data-src="{{ uploaded_asset($product->thumbnail_img) }}"
                                                        alt="{{ $product->getTranslation('name') }}"
                                                        onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder.jpg') }}';"
                                                    >
                                                </div>
                                            </div>
                                            <div class="col-xxl">
                                                <div class="fs-16">
                                                    <span class="d-block text-primary fw-600">{{ home_discounted_base_price($product) }}</span>
                                                    @if(home_base_price($product) != home_discounted_base_price($product))
                                                        <del class="d-block opacity-70">{{ home_base_price($product) }}</del>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                @endif
                            @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                @endif


                <div class="d-none d-md-block col-1 p-0" style="width: 14%;flex: 0 0 14%;max-width: 14%;">
                        <div class="aiz-carousel " data-autoplay="true">

                            <div class="carousel-box">
                                <div class="color_box" style="background-color: #1977F3"></div>
                            </div>
                            <div class="carousel-box">
                                <div class="color_box" style="background-color: #EE284C"></div>
                            </div>
                            <div class="carousel-box">
                                <div class="color_box" style="background-color: #EE284C"></div>
                            </div>
                            <div class="carousel-box">
                                <div class="color_box" style="background-color: #FF83F3"></div>
                            </div>

                        </div>

                </div>




            </div>
        </div>
    </div>


    {{-- Banner section 1 --}}
    @if (get_setting('home_banner1_images') != null)
    <div>
        <div class="container">
            <div class="row gutters-10">
                @php $banner_1_imags = json_decode(get_setting('home_banner1_images')); @endphp
                @foreach ($banner_1_imags as $key => $value)
                    <div class="col-xl col-md-6">
                        <div class="mb-3 mb-lg-0">
                            <a href="{{ json_decode(get_setting('home_banner1_links'), true)[$key] }}" class="d-block text-reset">
                                <img src="{{ static_asset('assets/img/placeholder-rect.jpg') }}" data-src="{{ uploaded_asset($banner_1_imags[$key]) }}" alt="{{ env('APP_NAME') }} promo" class="img-fluid lazyload w-100">
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    @endif




    {{-- Featured Section --}}
    <div id="section_featured">

    </div>

    {{-- Best Selling  --}}
    <div id="section_best_selling">

    </div>

    <!-- Auction Product -->
    @if(addon_is_activated('auction'))
        <div id="auction_products">

        </div>
    @endif



    {{-- Banner Section 2 --}}
    @if (get_setting('home_banner2_images') != null)
    <div>
        <div class="container">
            <div class="row gutters-10">
                @php $banner_2_imags = json_decode(get_setting('home_banner2_images')); @endphp
                @foreach ($banner_2_imags as $key => $value)
                    <div class="col-xl col-md-6">
                        <div class="mb-3 mb-lg-0">
                            <a href="{{ json_decode(get_setting('home_banner2_links'), true)[$key] }}" class="d-block text-reset">
                                <img src="{{ static_asset('assets/img/placeholder-rect.jpg') }}" data-src="{{ uploaded_asset($banner_2_imags[$key]) }}" alt="{{ env('APP_NAME') }} promo" class="img-fluid lazyload w-100">
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    @endif

    {{-- Category wise Products --}}
    <div id="section_home_categories">

    </div>

    {{-- Classified Product --}}
    @if(get_setting('classified_product') == 1)
        @php
            $classified_products = \App\Models\CustomerProduct::where('status', '1')->where('published', '1')->take(10)->get();
        @endphp
           @if (count($classified_products) > 0)
               <section class="mb-4">
                   <div class="container">

                       <div class="px-2 py-4 px-md-4 py-md-3 bg-white shadow-sm">

                            <div class="d-flex mb-3 align-items-baseline border-bottom">
                                <h3 class="h5 fw-700 mb-0">
                                    <span class="border-bottom border-primary border-width-2 pb-3 d-inline-block">{{ translate('Classified Ads') }}</span>
                                </h3>
                                <a href="{{ route('customer.products') }}" class="ml-auto mr-0 btn btn-primary btn-sm shadow-md">{{ translate('View More') }}</a>
                            </div>
                           <div class="aiz-carousel gutters-10 half-outside-arrow" data-items="6" data-xl-items="5" data-lg-items="4"  data-md-items="3" data-sm-items="2" data-xs-items="2" data-arrows='true'>
                               @foreach ($classified_products as $key => $classified_product)
                                   <div class="carousel-box">
                                        <div class="aiz-card-box border border-light hov-shadow-md my-2 has-transition">

                                            <div class="position-relative">
                                                <a href="{{ route('customer.product', $classified_product->slug) }}" class="d-block">
                                                    <img
                                                        class="img-fit lazyload mx-auto h-140px h-md-210px"
                                                        src="{{ static_asset('assets/img/placeholder.jpg') }}"
                                                        data-src="{{ uploaded_asset($classified_product->thumbnail_img) }}"
                                                        alt="{{ $classified_product->getTranslation('name') }}"
                                                        onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder.jpg') }}';"
                                                    >
                                                </a>
                                                <div class="absolute-top-left pt-2 pl-2">
                                                    @if($classified_product->conditon == 'new')
                                                       <span class="badge badge-inline badge-success">{{translate('new')}}</span>
                                                    @elseif($classified_product->conditon == 'used')
                                                       <span class="badge badge-inline badge-danger">{{translate('Used')}}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="p-md-3 p-2 text-left">
                                                <div class="fs-15 mb-1">
                                                    <span class="fw-700 text-primary">{{ single_price($classified_product->unit_price) }}</span>
                                                </div>
                                                <h3 class="fw-600 fs-13 text-truncate-2 lh-1-4 mb-0 h-35px">
                                                    <a href="{{ route('customer.product', $classified_product->slug) }}" class="d-block text-reset">{{ $classified_product->getTranslation('name') }}</a>
                                                </h3>
                                            </div>
                                       </div>
                                   </div>
                               @endforeach
                           </div>
                       </div>
                   </div>
               </section>
           @endif
       @endif

    {{-- Banner Section 2 --}}
    @if (get_setting('home_banner3_images') != null)
    <div class="mb-4">
        <div class="container">
            <div class="row gutters-10">
                @php $banner_3_imags = json_decode(get_setting('home_banner3_images')); @endphp
                @foreach ($banner_3_imags as $key => $value)
                    <div class="col-xl col-md-6">
                        <div class="mb-3 mb-lg-0">
                            <a href="{{ json_decode(get_setting('home_banner3_links'), true)[$key] }}" class="d-block text-reset">
                                <img src="{{ static_asset('assets/img/placeholder-rect.jpg') }}" data-src="{{ uploaded_asset($banner_3_imags[$key]) }}" alt="{{ env('APP_NAME') }} promo" class="img-fluid lazyload w-100">
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    @endif

    {{-- Best Seller --}}
    <div id="section_best_sellers">

    </div>

    {{-- Top 10 categories and Brands --}}
    @if (get_setting('top10_categories') != null && get_setting('top10_brands') != null)
    <section class="mb-4">
        <div class="container">
            <div class="row gutters-10">
                @if (get_setting('top10_categories') != null)
                    <div class="col-lg-6">
                        <div class="d-flex mb-3 align-items-baseline border-bottom">
                            <h3 class="h5 fw-700 mb-0">
                                <span class="border-bottom border-primary border-width-2 pb-3 d-inline-block">{{ translate('Top 10 Categories') }}</span>
                            </h3>
                            <a href="{{ route('categories.all') }}" class="ml-auto mr-0 btn btn-primary btn-sm shadow-md">{{ translate('View All Categories') }}</a>
                        </div>
                        <div class="row gutters-5">
                            @php $top10_categories = json_decode(get_setting('top10_categories')); @endphp
                            @foreach ($top10_categories as $key => $value)
                                @php $category = \App\Models\Category::find($value); @endphp
                                @if ($category != null)
                                    <div class="col-sm-6">
                                        <a href="{{ route('products.category', $category->slug) }}" class="bg-white border d-block text-reset p-2 hov-shadow-md mb-2">

                                            <div class="row align-items-center no-gutters">
                                                <div class="col-3 text-center">
                                                    <img
                                                        src="{{ static_asset('assets/img/placeholder.jpg') }}"
                                                        data-src="{{ uploaded_asset($category->banner) }}"
                                                        alt="{{ $category->getTranslation('name') }}"
                                                        class="img-fluid img lazyload h-60px"
                                                        onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder.jpg') }}';"
                                                    >
                                                </div>
                                                <div class="col-7">
                                                    <div class="text-truncat-2 pl-3 fs-14 fw-600 text-left">{{ $category->getTranslation('name') }}</div>
                                                </div>
                                                <div class="col-2 text-center">
                                                    <i class="la la-angle-right text-primary"></i>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                @endif
                @if (get_setting('top10_brands') != null)
                    <div class="col-lg-6">
                        <div class="d-flex mb-3 align-items-baseline border-bottom">
                            <h3 class="h5 fw-700 mb-0">
                                <span class="border-bottom border-primary border-width-2 pb-3 d-inline-block">{{ translate('Top 10 Brands') }}</span>
                            </h3>
                            <a href="{{ route('brands.all') }}" class="ml-auto mr-0 btn btn-primary btn-sm shadow-md">{{ translate('View All Brands') }}</a>
                        </div>
                        <div class="row gutters-5">
                            @php $top10_brands = json_decode(get_setting('top10_brands')); @endphp
                            @foreach ($top10_brands as $key => $value)
                                @php $brand = \App\Models\Brand::find($value); @endphp
                                @if ($brand != null)
                                    <div class="col-sm-6">

                                        <a href="{{ route('products.brand', $brand->slug) }}" class="bg-white border d-block text-reset p-2 hov-shadow-md mb-2">

                                            <div class="row align-items-center no-gutters">
                                                <div class="col-4 text-center">
                                                    <img
                                                        src="{{ static_asset('assets/img/placeholder.jpg') }}"
                                                        data-src="{{ uploaded_asset($brand->logo) }}"
                                                        alt="{{ $brand->getTranslation('name') }}"
                                                        class="img-fluid img lazyload h-60px"
                                                        onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder.jpg') }}';"
                                                    >
                                                </div>
                                                <div class="col-6">
                                                    <div class="text-truncate-2 pl-3 fs-14 fw-600 text-left">{{ $brand->getTranslation('name') }}</div>
                                                </div>
                                                <div class="col-2 text-center">
                                                    <i class="la la-angle-right text-primary"></i>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>
    @endif

@endsection

@section('script')
    <script>
        $(document).ready(function(){
            $.post('{{ route('home.section.featured') }}', {_token:'{{ csrf_token() }}'}, function(data){
                $('#section_featured').html(data);
                AIZ.plugins.slickCarousel();
            });
            $.post('{{ route('home.section.best_selling') }}', {_token:'{{ csrf_token() }}'}, function(data){
                $('#section_best_selling').html(data);
                AIZ.plugins.slickCarousel();
            });
            $.post('{{ route('home.section.auction_products') }}', {_token:'{{ csrf_token() }}'}, function(data){
                $('#auction_products').html(data);
                AIZ.plugins.slickCarousel();
            });
            $.post('{{ route('home.section.home_categories') }}', {_token:'{{ csrf_token() }}'}, function(data){
                $('#section_home_categories').html(data);
                AIZ.plugins.slickCarousel();
            });
            $.post('{{ route('home.section.best_sellers') }}', {_token:'{{ csrf_token() }}'}, function(data){
                $('#section_best_sellers').html(data);
                AIZ.plugins.slickCarousel();
            });
        });
    </script>
@endsection
