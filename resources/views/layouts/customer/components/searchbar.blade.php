<div class="search-bar">
    <div class="container">
        <form action="{{ route('product.index') }}" method="GET" id="submit-form">
            @csrf
            <div class="row">
                <div class="search-bar__header">
                    <div class="row">
                        <div class="col col-4">
                            <div class="search-bar__label">
                                @if (old('type'))
                                    {{ old('type') . 's' }}
                                @else
                                    ALL PRODUCTS
                                @endif
                            </div>
                        </div>
                        <div class="col col-8">
                            <div class="search-bar__input-wrapper">
                                <input type="text" class="search-bar__input" placeholder="Search..." spellcheck="false" name="search" value="{{ old('search') }}">
                                <button class="search-bar__btn"><i class="fa-solid fa-magnifying-glass" type="submit"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col col-10">
                        <div class="search-bar__filter">
                            <div class="search-bar__filter-label">Filter By:</div>
                            <div class="row search-bar__filter-list">
                                <div class="col col-4">
                                    <div class="dropdown h-100">
                                        <div class="dropdown-toggle search-bar__option" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                            Product Type
                                        </div>
                                        <input type="hidden" name="type" id="search-type-input" value="{{ old('type') }}">
                                        <ul class="dropdown-menu search-bar__menu" aria-labelledby="dropdownMenuButton1">
                                            <li><div data-type='3 wick candle' class="dropdown-item search-bar__menu-item search-type">3 Wick Candle</div></li>
                                            <li><div data-type='single wick candle' class="dropdown-item search-bar__menu-item search-type">Single Wick Candle</div></li>
                                            <li><div data-type='candle' class="dropdown-item search-bar__menu-item search-type">All Candle</div></li>
                                            <li><div data-type='scented wax' class="dropdown-item search-bar__menu-item search-type">Scented Wax</div></li>
                                            <li><div data-type='essential oil' class="dropdown-item search-bar__menu-item search-type">Essential Oil</div></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col col-4">
                                    <div class="dropdown h-100">
                                        <div class="dropdown-toggle search-bar__option" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                            Manufacturer
                                        </div>
                                        <input type="hidden" name="manufacturer" id="search-manufacturer-input" value="{{ old('manufacturer') }}">
                                        <ul class="dropdown-menu search-bar__menu" aria-labelledby="dropdownMenuButton1">
                                            @foreach ($manufacturers as $manufacturer)
                                                <li>
                                                    <div data-type='{{ $manufacturer->id }}' class="dropdown-item search-bar__menu-item search-manufacturer">
                                                        {{ $manufacturer->ten }}
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                <div class="col col-4">
                                    <div class="dropdown h-100">
                                        <div class="dropdown-toggle search-bar__option" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                            Fragrance Category
                                        </div>
                                        <input type="hidden" name="fragrance" id="search-fragrance-input" value="{{ old('fragrance') }}">
                                        <ul class="dropdown-menu search-bar__menu" aria-labelledby="dropdownMenuButton1">
                                            @foreach ($fragrances as $fragrance)
                                                <li>
                                                    <div data-type='{{ $fragrance->id }}' class="dropdown-item search-bar__menu-item search-fragrance">
                                                        {{ $fragrance->theLoai }}
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col col-2">
                        <div class="search-bar__sort">
                            <div class="dropdown flex-grow-1">
                                <div class="dropdown-toggle search-bar__sort-btn" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    Sort By
                                </div>
                                <input type="hidden" name="order-name" id="order-name" value="{{ old('order-name') }}">
                                <input type="hidden" name="order-type" id="order-type" value="{{ old('order-type') }}">
                                <input type="hidden" name="order-fullname" id="order-fullname" value="{{ old('order-fullname') }}">
                                <ul class="dropdown-menu search-bar__menu" aria-labelledby="dropdownMenuButton1">
                                    <li><div class="dropdown-item search-bar__menu-item sort-item" data-order-name="daBan" data-order-type="desc">Best Seller</div></li>
                                    {{-- <li><div class="dropdown-item search-bar__menu-item sort-item" data-order-name="danhGia" data-order-type="desc">Top Rated</div></li> --}}
                                    <li><div class="dropdown-item search-bar__menu-item sort-item" data-order-name="updated_at" data-order-type="desc">New Arrial</div></li>
                                    <li><div class="dropdown-item search-bar__menu-item sort-item" data-order-name="giaBan" data-order-type="asc">Giá tăng dần</div></li>
                                    <li><div class="dropdown-item search-bar__menu-item sort-item" data-order-name="giaBan" data-order-type="desc">Giá giảm dần</div></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col col-10">
                        <div class="has-filtered">
                            @if(old('search'))
                            <div class="has-filtered-item">
                                <div class="has-filtered-name">{{ 'Search: ' . old('search') }}</div>
                                <div class="clear-filtered-item"  id="clear-search" ><i class="fa-solid fa-xmark"></i></div>
                            </div>
                            @endif
                            @if (old('type'))
                                <div class="has-filtered-item">
                                    <div class="has-filtered-name">{{ 'Mặt hàng: ' . old('type') }}</div>
                                    <div class="clear-filtered-item" id="clear-type" ><i class="fa-solid fa-xmark"></i></div>
                                </div>
                            @endif
                            @if (old('manufacturer'))
                                <div class="has-filtered-item">
                                    <div class="has-filtered-name">{{ 'Nhà cung cấp: ' . $nhaCungCap }}</div>
                                    <div class="clear-filtered-item" id="clear-manufacturer"><i class="fa-solid fa-xmark"></i></div>
                                </div>
                            @endif
                            @if (old('fragrance'))
                                <div class="has-filtered-item">
                                    <div class="has-filtered-name">{{ 'Loại mùi hương: ' . $muiHuong }}</div>
                                    <div class="clear-filtered-item"  id="clear-fragrance" ><i class="fa-solid fa-xmark"></i></div>
                                </div>
                            @endif

                            @if (old('order-fullname'))
                                <div class="has-filtered-item has-filtered-item-sort">
                                    <div class="has-filtered-name">{{ 'Sắp xếp: ' . old('order-fullname') }}</div>
                                    <div class="clear-filtered-item"  id="clear-sort" ><i class="fa-solid fa-xmark"></i></div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    // Search
    $('.search-type').click(function()
    {
        $('#search-type-input').val($(this).attr('data-type'));
        $('#submit-form').submit();
    })
    $('.search-manufacturer').click(function()
    {
        $('#search-manufacturer-input').val($(this).attr('data-type'));
        $('#submit-form').submit();
    })
    $('.search-fragrance').click(function()
    {
        $('#search-fragrance-input').val($(this).attr('data-type'));
        $('#submit-form').submit();
    })
    // Clear search
    $('#clear-type').click(function()
    {
        $('#search-type-input').val("");
        $('#submit-form').submit();
    })
    $('#clear-search').click(function()
    {
        $('input[name="search"]').val("");
        $('#submit-form').submit();
    })
    $('#clear-manufacturer').click(function()
    {
        $('#search-manufacturer-input').val("");
        $('#submit-form').submit();
    })
    $('#clear-fragrance').click(function()
    {
        $('#search-fragrance-input').val("");
        $('#submit-form').submit();
    })
    // Sort 
    $('.sort-item').click(function()
    {
        $('#order-name').val($(this).attr('data-order-name'));
        $('#order-type').val($(this).attr('data-order-type'));
        $('#order-fullname').val($(this).text());
        $('#submit-form').submit();
    })
    $('#clear-sort').click(function()
    {
        $('#order-name').val("");
        $('#order-type').val("");
        $('#order-fullname').val("");
        $('#submit-form').submit();
    })
</script>
