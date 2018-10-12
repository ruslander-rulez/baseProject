@extends("web.ru.root")

@section("meta-section")
    <title>Контакты</title>
@endsection

@section("pageContent")
    <div class="contacts_block">
    <div class="inner">
        <div class="title-block">
            <h1>Контакты</h1>
        </div>
        <div class="row-fluid contacts_row">
            <div class="span6">
                <form action="#" class="form_contact">
                    <div class="control-group">
                        <label for="name">Имя <span>*</span></label>
                        <input type="text" id="name" name="name" class="label_inverse input-block-level" required>
                    </div>
                    <div class="control-group">
                        <label for="phone">Моб. телефон</label>
                        <input type="text" id="phone" name="phone" class="label_inverse input-block-level">
                    </div>
                    <div class="control-group">
                        <label for="mail">Ваш E-mail <span>*</span></label>
                        <input type="text" id="mail" name="mail" class="label_inverse input-block-level" required>
                    </div>
                    <div class="control-group">
                        <label for="message">Сообщение <span>*</span></label>
                        <textarea name="message" id="message" required rows="7" class="label_inverse input-block-level"></textarea>
                    </div>
                    <div class="control-button text-center">
                        <button type="submit" class="btn-submit btn-blue">Отправить</button>
                    </div>
                </form>
            </div>
            <div class="span6">
                <div class="contact_right">
                    <a href="#" class="cont_item">
                        <img src="{{ url("web/img/kievstar.png") }}" alt="">
                        <span class="cont_desc">
								<span class="block">Киевстар:</span>
								<span class="href">(098) 005-50-06</span>
							</span>
                    </a>
                    <a href="#" class="cont_item">
                        <img src="{{ url("web/img/mts.png") }}" alt="">
                        <span class="cont_desc">
								<span class="block">МТС:</span>
								<span class="href">(066) 112-53-71</span>
							</span>
                    </a>
                    <a href="#" class="cont_item">
                        <img src="{{ url("web/img/cont_vk.png") }}" alt="">
                        <span class="cont_desc">
								<span class="inline_text">Сообщество ВКонтакте</span>
							</span>
                    </a>
                    <a href="#" class="cont_item">
                        <img src="{{ url("web/img/cont_mess.png") }}" alt="">
                        <span class="cont_desc">
								<span class="block">Администрация сайта: </span>
								<span class="href">proexua@gmail.com</span>
							</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection