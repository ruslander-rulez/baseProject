<div class="header">
    <div class="top-header">
        <div class="inner">
            <div class="nav-section">
                <ul class="nav-hedtop list-no">
                    <li><a href="{{ route("web.page", ["page" => "question-answer"]) }}">Вопрос/Ответ</a><span>|</span></li>
                    <li><a href="{{ route("web.page", ["page" => "instruction"]) }}">Инструкция</a><span>|</span></li>
                    <li><a href="{{ route("web.page", ["page" => "payment-delivery"]) }}">Доставка и оплата</a></li>
                </ul>
            </div>
            <div class="social-header">
                <ul class="social-list list-no">
                    <li><a href="#" class="social vk"></a></li>
                    <li><a href="#" class="social fb"></a></li>
                    <li><a href="#" class="social tw"></a></li>
                    <li><a href="#" class="social gplus"></a></li>
                </ul>
            </div>
            <div class="text-ht">Оригинальная сертифицированная система увеличения полового члена.</div>
        </div>
    </div>
    <div class="bottom-header">
        <div class="inner">
            <a href="{{ route("web.index") }}" class="logo"></a>
            <div class="row-header row-fluid">
                <div class="rh_item span4">
                    <img class="step_money" src="{{ url("web/img/step-money.png") }}" alt="">
                    <div class="rh_text">
                        <div class="rh_title">Отправка</div>
                        <div class="rh-subt">наложенным платежом</div>
                    </div>
                </div>
                <div class="rh_item span4">
                    <img class="step_car" src="{{ url("web/img/step-car.png") }}" alt="">
                    <div class="rh_text rh_text_car">
                        <div class="rh_title">Отправка</div>
                        <div class="rh-subt">в Россию и Украину</div>
                    </div>
                </div>
                <div class="rh_item phone_item span4">
                    <img class="step_phone" src="{{ url("web/img/step-phone.png") }}" alt="">
                    <div class="rh_text rh_text_phone">
                        <div class="number"><span>(098)</span> 005-50-06</div>
                        <div class="number"><span>8 (800)</span> 112-53-71</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="menu-header">
        <div class="inner">
            <div class="menu_sect">
                <a href="#" class="btn-mob">
						<span class="icone-menu">
							<span></span>
							<span></span>
							<span></span>
						</span>
                    <span class="text-menu">Меню</span>
                </a>
                <ul class="nav-menu list-no">
                    <li><a href="{{ route("web.index") }}">Главная</a></li>
                    <li><a href="#">Экстендеры</a></li>
                    <li><a href="#">Вакуумный помпы</a></li>
                    <li><a href="#">Другие товары</a></li>
                    <li><a href="{{ route("web.advice.list") }}">Советы покупателям</a></li>
                    <li><a href="{{ route("web.page", ["page" => "how-it-works"]) }}">Как работает</a></li>
                    <li><a href="{{ route("web.page", ["page" => "contact"]) }}">Контакты</a></li>
                </ul>
            </div>
            <a href="{{ route("web.page", ["page" => "instruction"]) }}" class="btn-blue_norm">Инструкция</a>
        </div>
    </div>
</div>