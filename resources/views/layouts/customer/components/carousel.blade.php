<div class="carousel">
    <div class="container">
        {{-- Best seller --}}
        <a href="" class="carousel-title">BEST SELLER</a>
        <div class="row">
            <div class="col col-1 carousel-btn-wrapper justify-content-start">
                <div class="carousel-btn" id="bestseller-carousel-prev-btn">
                    <i class="fa-solid fa-chevron-left"></i>
                </div>
            </div>
            <div class="col col-10">
                <div id="bestseller-carousel" class="owl-carousel">
                    @foreach ($bestseller as $product)
                        <a href="" class="product-item">
                            <div class="product-img">
                                <img src="{{ asset('images/products/' . $product->image_path) }}" alt="Product">
                            </div>
                            <div class="product-name">
                                {{ $product->tenSanPham }}
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
            <div class="col col-1 carousel-btn-wrapper justify-content-end">
                <div class="carousel-btn" id="bestseller-carousel-next-btn">
                    <i class="fa-solid fa-chevron-right"></i>
                </div>
            </div>
        </div>

        {{-- Top rated --}}
        <a href="" class="carousel-title">TOP RATED</a>
        <div class="row">
            <div class="col col-1 carousel-btn-wrapper justify-content-start">
                <div class="carousel-btn" id="toprated-carousel-prev-btn">
                    <i class="fa-solid fa-chevron-left"></i>
                </div>
            </div>
            <div class="col col-10">
                <div id="toprated-carousel" class="owl-carousel">
                    {{-- @foreach ($toprated as $product)
                        <a href="" class="product-item">
                            <div class="product-img">
                                <img src="{{ asset('images/products/' . $product->image_path) }}" alt="Product">
                            </div>
                            <div class="product-name">
                                {{ $product->tenSanPham }}
                            </div>
                        </a>
                    @endforeach --}}
                </div>
            </div>
            <div class="col col-1 carousel-btn-wrapper justify-content-end">
                <div class="carousel-btn" id="toprated-carousel-next-btn">
                    <i class="fa-solid fa-chevron-right"></i>
                </div>
            </div>
        </div>
    </div>
</div>