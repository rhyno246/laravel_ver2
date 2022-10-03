<div class="category-tab">
    <!--category-tab-->
    <div class="col-sm-12">
        <ul class="nav nav-tabs">
            @foreach ($category as $key => $item)
                <li class="{{ $key == 0 ? 'active' : '' }}"><a href="#{{ $item->id }}"
                        data-toggle="tab">{{ $item->name }}</a></li>
            @endforeach
        </ul>
    </div>
    <div class="tab-content">
        @foreach ($category as $key => $item)
            <div class="tab-pane fade {{ $key == 0 ? 'active in' : '' }}" id="{{ $item->id }}">
                @foreach ($item->getCategoryChild as $item)
                    <div class="col-sm-3">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="{{ $item->feature_image_path }}" alt="{{ $item->name }}" />
                                    <h2>{{ number_format($item->price) }} vnđ</h2>
                                    <p>{{ $item->name }}</p>
                                    <a href="#" class="btn btn-default add-to-cart"><i
                                            class="fa fa-shopping-cart"></i>Add
                                        to cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>
</div>
<!--/category-tab-->
