@extends("web." .  App::getLocale() . ".root")

@section("meta-section")
    <title>{{ $category->seo_title }}</title>
    <meta name="description" content="{{ $category->seo_description }}">
    <meta name="keywords" content="{{ $category->seo_keywords }}" />
@endsection

@section("pageContent")
    <div class="products_block">
        <div class="inner">
            <div class="title-block">
                <h1>{{ $category->title }}</h1>
            </div>
            <div class="text_section">
                <img src="{{ $category->thumbnail ? $category->thumbnail->path  : "" }}" alt="">
                <div class="desc_text">
                    {!! $category->description !!}
                </div>
            </div>
            <div class="products_section">
                @foreach($products->chunk(3) as $productChunk)
                <div class="cat_products">
                    @foreach($productChunk as $product)
                        <div class="cat_product">
                            <div class="img-wrap"><a href="{{ route("web.product.single", ["slug" => $product->slug]) }}"><img src="{{ $product->thumbnail ? $product->thumbnail->path : "" }}" alt=""></a></div>
                            <div class="product_name"><a href="{{ route("web.product.single", ["slug" => $product->slug]) }}">{{ $product->title }}</a></div>
                            <div class="product_text">
                                <p>
                                    {{ $product->short_description }}
                                </p>
                            </div>
                            <div class="pro_bottom">
                                <span class="product_price"><span class="red price">2350</span> грн.</span>
                                <a href="#" class="btn-simple product_buy">Купить</a>
                            </div>
                        </div>
                    @endforeach
                </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection