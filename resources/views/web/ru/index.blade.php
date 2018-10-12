@extends("web.ru.root")

@section("meta-section")
    <title>Андросайз главная</title>

@endsection

@section("pageContent")
    <div class="carousel-block">
        <div id="carousel-banner" class="carousel slide">
            <div class="carousel-inner">
                <div class="item active">
                    <div class="img-wrap"><img src="{{ url("web/upload/carousel1.jpg") }}" height="470" alt=""></div>
                    <div class="slider_desc inner">
                        <div class="title_h3">НАДОЕЛО СЛЫШАТЬ СЛОВА УТЕШЕНИЯ</div>
                        <div class="title_h3_bold">ЧТО РАЗМЕР НЕ ИМЕЕТ ЗНАЧЕНИЯ?</div>
                        <div class="title_h3_bold_small">Увеличить половой член <span class="regular">теперь очень просто!</span></div>
                        <div class="buttons-group">
                            <a href="#" class="btn-simple gosubmit">Начать увеличение</a>
                            <a href="#" class="btn-simple more">Узнать подробнее</a>
                        </div>
                        <div class="title_pro">Увеличение до <span class="blue_pro">40%</span>!</div>
                    </div>
                </div>
                <div class="item">
                    <div class="img-wrap"><img src="{{ url("web/upload/carousel2.jpg") }}" height="470" alt=""></div>
                    <div class="slider_desc inner">
                        <div class="title_h3">НАДОЕЛО СЛЫШАТЬ СЛОВА УТЕШЕНИЯ</div>
                        <div class="title_h3_bold">ЧТО РАЗМЕР НЕ ИМЕЕТ ЗНАЧЕНИЯ?</div>
                        <div class="title_h3_bold_small">Увеличить половой член <span class="regular">теперь очень просто!</span></div>
                        <div class="buttons-group">
                            <a href="#" class="btn-simple gosubmit">Начать увеличение</a>
                            <a href="#" class="btn-simple more">Узнать подробнее</a>
                        </div>
                        <div class="title_pro">Увеличение до <span class="blue_pro">40%</span>!</div>
                    </div>
                </div>
                <div class="item">
                    <div class="img-wrap"><img src="{{ url("web/upload/carousel3.jpg") }}" height="470" alt=""></div>
                    <div class="slider_desc inner">
                        <div class="title_h3">НАДОЕЛО СЛЫШАТЬ СЛОВА УТЕШЕНИЯ</div>
                        <div class="title_h3_bold">ЧТО РАЗМЕР НЕ ИМЕЕТ ЗНАЧЕНИЯ?</div>
                        <div class="title_h3_bold_small">Увеличить половой член <span class="regular">теперь очень просто!</span></div>
                        <div class="buttons-group">
                            <a href="#" class="btn-simple gosubmit">Начать увеличение</a>
                            <a href="#" class="btn-simple more">Узнать подробнее</a>
                        </div>
                        <div class="title_pro">Увеличение до <span class="blue_pro">40%</span>!</div>
                    </div>
                </div>
            </div>
            <div class="inner carousel-controls">
                <a class="carousel-control left" href="#carousel-banner" data-slide="prev"></a>
                <a class="carousel-control right" href="#carousel-banner" data-slide="next"></a>
            </div>
        </div>
        <div class="to_begin">
            <div class="inner">
                <div class="questions item">
                    <img src="{{ url("web/img/qu_mark.png") }}" alt="">
                    <div class="qu_text">
                        <b>Что делать?</b><b>C чего начать?</b>
                    </div>
                </div>
                <div class="callback item">
                    <img src="{{ url("web/img/headset.png") }}" alt="">
                    <div class="qu_text">
                        <div class="qu_small">свяжись со специалистом</div>
                        <b>100% Анонимно</b>
                    </div>
                </div>
                <div class="btn-group item">
                    <a href="" class="btn-red btn-simple">Закажи звонок</a>
                </div>
            </div>
        </div>
    </div>
    <div class="cat_section_top">
        <div class="inner">
            <div class="cat_sections owl-carousel">
                @foreach($categories as $category)
                <div class="cat_sect">
                    <div class="img-wrap"><img src="{{ $category->thumbnail ? $category->thumbnail->path : ""}}" alt=""></div>
                    <div class="name"><a href="{{ route("web.category.single", ["slug" => $category->slug]) }}">{{ $category->title }}</a></div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="ready_to_order">
        <div class="inner">
            <div class="ready_title">Еще не готов сделать заказ?</div>
            <div class="ready_subelow">смотри ниже</div>
            <ul class="order-list list-no">
                <li>
                    <div class="img-wrap"><img src="{{ url("web/img/icon-order_sun.png") }}" alt=""></div>
                    <div class="order_desc">
                        <div class="order_title">Достигнутые результаты сохраняются на всю жизнь</div>
                        <div class="order_text">
                            Данный прибор был изготовлен с целью помочь каждому мужчине, который недоволен размерами или формой своего полового органа. Экстендер состоит из металлических частей.
                        </div>
                    </div>
                </li>
                <li>
                    <div class="img-wrap"><img src="{{ url("web/img/icon-order_med.png") }}" alt=""></div>
                    <div class="order_desc">
                        <div class="order_title">Использованние экстендера в домашних условиях не требует консультации с врачом</div>
                        <div class="order_text">
                            Данный прибор был изготовлен с целью помочь каждому мужчине, который недоволен размерами или формой своего полового органа.
                        </div>
                    </div>
                </li>
                <li>
                    <div class="img-wrap"><img src="{{ url("web/img/icon-order_castle.png") }}" alt=""></div>
                    <div class="order_desc">
                        <div class="order_title">Безболезненно, безоперационно и безопасно</div>
                        <div class="order_text">
                            Данный прибор был изготовлен с целью помочь каждому мужчине, который недоволен размерами или формой своего полового органа. Экстендер состоит из металлических частей.
                        </div>
                    </div>
                </li>
                <li>
                    <div class="img-wrap"><img src="{{ url("web/img/icon-order_ok.png") }}" alt=""></div>
                    <div class="order_desc">
                        <div class="order_title">Коррекция искривления члена</div>
                        <div class="order_text">
                            Данный прибор был изготовлен с целью помочь каждому мужчине, который недоволен размерами или формой своего полового органа. Экстендер состоит из металлических частей.
                        </div>
                    </div>
                </li>
                <li>
                    <div class="img-wrap"><img src="{{ url("web/img/icon-order_ringle.png") }} " alt=""></div>
                    <div class="order_desc">
                        <div class="order_title">Увеличение члена в длину на 4-5 см, на 1,5 см в ширину</div>
                        <div class="order_text">
                            Данный прибор был изготовлен с целью помочь каждому мужчине, который недоволен размерами или формой своего полового органа. Экстендер состоит из металлических частей.
                        </div>
                    </div>
                </li>
                <li>
                    <div class="img-wrap"><img src="{{ url("web/img/icon-order_medro.png") }}" alt=""></div>
                    <div class="order_desc">
                        <div class="order_title">Клинически протестирован и рекомендован врачами</div>
                        <div class="order_text">
                            Данный прибор был изготовлен с целью помочь каждому мужчине, который недоволен размерами или формой своего полового органа. Экстендер состоит из металлических частей.
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <div class="best_ters">
        <div class="inner">
            @if (count($products))
                <div class="besters_title">Лучшие тренажеры для увеличения пениса</div>
                <div class="cat_products">
                @foreach($products as $product)
                    <div class="cat_product">
                    <div class="img-wrap"><a href="{{ route("web.product.single", ["slug" => $product->slug]) }}"><img src="{{ $product->thumbnail ? $product->thumbnail->path : "" }}" alt=""></a></div>
                    <div class="product_name"><a href="{{ route("web.product.single", ["slug" => $product->slug]) }}">{{ $product->title }}</a></div>
                    <div class="product_text">
                        <p>
                            {{ $product->short_title }}
                        </p>
                    </div>
                    <div class="pro_bottom">
                        <span class="product_price"><span class="red price">2350</span> грн.</span>
                        <a href="#" class="btn-simple product_buy">Купить</a>
                    </div>
                </div>
                @endforeach
            </div>
            @endif
            <div class="row-fluid ce_best">
                <div class="span2 ce_item"><img src="{{ url("web/upload/ce_best1.png") }}" alt=""></div>
                <div class="span2 ce_item"><img src="{{ url("web/upload/ce_best2.png") }}" alt=""></div>
                <div class="span2 ce_item"><img src="{{ url("web/upload/ce_best3.png") }}" alt=""></div>
                <div class="span2 ce_item"><img src="{{ url("web/upload/ce_best4.png") }}" alt=""></div>
                <div class="span2 ce_item"><img src="{{ url("web/upload/ce_best5.png") }}" alt=""></div>
                <div class="span2 ce_item"><img src="{{ url("web/upload/ce_best6.png") }}" alt=""></div>
            </div>
        </div>
    </div>
    @include("web.layout.reviews")
    <div class="advices_block">
        <div class="inner">
            <div class="adv_title">Советы покупателям</div>
            <div class="adv_list adv_carousel">
                @foreach($advices as $advice)
                    <div class="adv_item">
                    <div class="img-wrap">
                        @if ($advice->attachment)
                            <img src="{{ url($advice->attachment->path) }}" alt="">
                        @endif
                    </div>
                    <div class="adv_iname"><a href="{{ route("web.advice.single", ["slug" => $advice->slug]) }}">{{ $advice->title }}</a></div>
                    <div class="adv_itext">
                        <p>
                         {{ $advice->short_text }}
                         </p>
                    </div>
                    <a href="{{ route("web.advice.single", ["slug" => $advice->slug]) }}" class="btn-simple btn-blue">Подробнее</a>
                </div>
                @endforeach

            </div>
        </div>
    </div>
@endsection