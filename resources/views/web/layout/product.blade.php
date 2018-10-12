@extends("web." .  App::getLocale() . ".root")

@section("meta-section")
    <title>{{ $product->seo_title }}</title>
    <meta name="description" content="{{ $product->seo_description }}">
    <meta name="keywords" content="{{ $product->seo_keywords }}" />
@endsection

@section("pageContent")
    <div class="card_product">
        <div class="inner">
            <div class="title-block">
                <h1>{{ $product->title }}</h1>
            </div>
            <div class="product">
                <div class="cat_left_sidebar">
                    <div class="cat_sections">
                        @foreach($categories as $category)
                            <div class="cat_sect">
                                <div class="img-wrap"><img src="{{ $category->thumbnail ? $category->thumbnail->path : ""}}" alt=""></div>
                                <div class="name"><a href="{{ route("web.category.single", ["slug" => $category->slug]) }}">{{ $category->title }}</a></div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="section_product">
                    <div class="top_product">
                        <!-- Image of product -->
                        <div class="preview_image"><img src="{{ $product->thumbnail ?  $product->thumbnail->path : "" }}" alt=""></div>
                        <!-- Right section buy and gallery -->
                        <div class="right_sect_product">
                            <div class="buy_sections">
                                <div class="buy_coutry">
                                    <img src="{{ $product->made_in_ico ? $product->made_in_ico->path : "" }}" alt="">
                                    <div class="name_country">{{ $product->made_in }}</div>
                                </div>
                                <div class="buy_stock">
                                    <span class="in">В наличии</span>
                                </div>
                                <div class="buy_price">
                                    <span class="price">2550</span> грн.
                                </div>
                                <a href="#" class="btn-buy btn-blue">Купить</a>
                            </div>
                            @if ($product->gallery->count())
                                <div class="product-gallery">
                                <div class="image-gallery">
                                    @foreach($product->gallery as $item)
                                        <div class="gal_item">
                                            <a href="{{ $item->path }}"><img src="{{ $item->path }}" alt=""></a>
                                        </div>
                                    @endforeach

                                </div>
                                <a href="#" class="more_image"><span class="border">Галерея</span> <span class="count">({{ $product->gallery->count() }})</span></a>
                            </div>
                            @endif
                        </div>
                        <!-- Product text -->
                        <div class="pro_card_text">
                            {!! $product->description !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="review_block">
        <div class="inner">
            <div class="rew_title_block">
                <div class="rew_title">Увеличение члена отзывы</div>
                <a href="#" class="btn-simple btn-blue">Оставить комментарий</a>
            </div>
            <div id="carousel_rew" class="carousel slide">
                <div class="carousel-inner">
                    <div class="item active">
                        <div class="row-fluid rew_section">
                            <div class="span6 rew_item">
                                <div class="img-wrap"><img src="upload/athor_rew1.jpg" alt=""></div>
                                <div class="rew_itext">
                                    <p>
                                        По совету знакомого уролога, решил купить аппарат для увеличения члена. Очень прост в эксплуатации, не вызывает неприятных ощущений. Спасибо магазину за отличный сервис.
                                    </p>
                                    <div class="rew_iname">Алексей, Харьков</div>
                                </div>
                            </div>
                            <div class="span6 rew_item">
                                <div class="img-wrap"><img src="upload/athor_rew2.jpg" alt=""></div>
                                <div class="rew_itext">
                                    <p>
                                        Сегодня заказал девайс для увеличения полового члена. Цена и комплектация устроили. Первое время буду заниматься по инструкции, а дальше по результатам.
                                    </p>
                                    <div class="rew_iname">Ростислав, Одесса</div>
                                </div>
                            </div>
                        </div>
                        <div class="row-fluid rew_section">
                            <div class="span6 rew_item">
                                <div class="img-wrap"><img src="upload/athor_rew3.jpg" alt=""></div>
                                <div class="rew_itext">
                                    <p>
                                        По совету знакомого уролога, решил купить аппарат для увеличения члена. Очень прост в эксплуатации, не вызывает неприятных ощущений. Спасибо магазину за отличный сервис.
                                    </p>
                                    <div class="rew_iname">Алексей, Харьков</div>
                                </div>
                            </div>
                            <div class="span6 rew_item">
                                <div class="img-wrap"><img src="upload/athor_rew4.jpg" alt=""></div>
                                <div class="rew_itext">
                                    <p>
                                        Сегодня заказал девайс для увеличения полового члена. Цена и комплектация устроили. Первое время буду заниматься по инструкции, а дальше по результатам.
                                    </p>
                                    <div class="rew_iname">Ростислав, Одесса</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="row-fluid rew_section">
                            <div class="span6 rew_item">
                                <div class="img-wrap"><img src="upload/athor_rew2.jpg" alt=""></div>
                                <div class="rew_itext">
                                    <p>
                                        Сегодня заказал девайс для увеличения полового члена. Цена и комплектация устроили. Первое время буду заниматься по инструкции, а дальше по результатам.
                                    </p>
                                    <div class="rew_iname">Ростислав, Одесса</div>
                                </div>
                            </div>
                            <div class="span6 rew_item">
                                <div class="img-wrap"><img src="upload/athor_rew1.jpg" alt=""></div>
                                <div class="rew_itext">
                                    <p>
                                        По совету знакомого уролога, решил купить аппарат для увеличения члена. Очень прост в эксплуатации, не вызывает неприятных ощущений. Спасибо магазину за отличный сервис.
                                    </p>
                                    <div class="rew_iname">Алексей, Харьков</div>
                                </div>
                            </div>
                        </div>
                        <div class="row-fluid rew_section">
                            <div class="span6 rew_item">
                                <div class="img-wrap"><img src="upload/athor_rew4.jpg" alt=""></div>
                                <div class="rew_itext">
                                    <p>
                                        Сегодня заказал девайс для увеличения полового члена. Цена и комплектация устроили. Первое время буду заниматься по инструкции, а дальше по результатам.
                                    </p>
                                    <div class="rew_iname">Ростислав, Одесса</div>
                                </div>
                            </div>
                            <div class="span6 rew_item">
                                <div class="img-wrap"><img src="upload/athor_rew3.jpg" alt=""></div>
                                <div class="rew_itext">
                                    <p>
                                        По совету знакомого уролога, решил купить аппарат для увеличения члена. Очень прост в эксплуатации, не вызывает неприятных ощущений. Спасибо магазину за отличный сервис.
                                    </p>
                                    <div class="rew_iname">Алексей, Харьков</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <ol class="carousel-indicators rew_inditicators">
                    <li data-target="#carousel_rew" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel_rew" data-slide-to="1"></li>
                </ol>
            </div>
        </div>
    </div>
    <div class="form_order">
        <div class="inner">
            <div class="row-fluid">
                <div class="span6">
                    <div class="title_order">10 причин заказать у нас</div>
                    <ul class="list_reason list-no">
                        <li>
                            <span class="number">1</span>
                            <div class="reson_text">Оригинальный экстендер из США</div>
                        </li>
                        <li>
                            <span class="number">2</span>
                            <div class="reson_text">Нами гарантируется полная анонимность и конфиденциальность</div>
                        </li>
                        <li>
                            <span class="number">3</span>
                            <div class="reson_text">Лучшая цена среди конкурентов</div>
                        </li>
                        <li>
                            <span class="number">4</span>
                            <div class="reson_text">Оплата при получении</div>
                        </li>
                        <li>
                            <span class="number">5</span>
                            <div class="reson_text">Профессиональные консультации по использованию</div>
                        </li>
                        <li>
                            <span class="number">6</span>
                            <div class="reson_text">Никаких скрытых платежей</div>
                        </li>
                        <li>
                            <span class="number">7</span>
                            <div class="reson_text">Только Вы будете знать, что в посылке</div>
                        </li>
                        <li>
                            <span class="number">8</span>
                            <div class="reson_text">Быстрая и дешевая доставка по Украине</div>
                        </li>
                        <li>
                            <span class="number">9</span>
                            <div class="reson_text">Уникальная разработка вакуумного крепления</div>
                        </li>
                        <li>
                            <span class="number">10</span>
                            <div class="reson_text">Уникальные аксессуары</div>
                        </li>
                    </ul>
                    <div class="info_add">
                        <span>*</span> Результаты могут зависеть от Ваших индивидуальных особенностей и генетического предрасположения.
                    </div>
                </div>
                <div class="span6">
                    <div class="title_order">Закажи сейчас</div>
                    <form action="#" method="post" class="order_form">
                        <div class="control-group">
                            <label for="product">Продукт <span>*</span></label>
                            <select name="product" class="input-block-level" id="product" required>
                                <option value="1">Выбор комплектации</option>
                                <option value="2">10 причин</option>
                            </select>
                        </div>
                        <div class="control-group">
                            <label>Имя и фамилия <span>*</span></label>
                            <input type="text" class="input-block-level" required placeholder="Мы не передаем ваши данные третьим лицам!">
                        </div>
                        <div class="control-group">
                            <label>Ваш E-mail</label>
                            <input type="text" class="input-block-level" placeholder="Анонимность гарантируем!">
                        </div>
                        <div class="control-group">
                            <label>Моб. телефон <span>*</span></label>
                            <input type="text" class="input-block-level" required placeholder="Ваш номер мобильного телефона">
                        </div>
                        <div class="control-group">
                            <label>Город, № склада Новой почты</label>
                            <input type="text" class="input-block-level" placeholder="Например: Киев, №5">
                        </div>
                        <div class="control-button text-center">
                            <button type="submit" class="btn-blue btn-submit">Заказать товар</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
	
	