@extends("web.ru.root")

@section("meta-section")
    <title>Как это работает</title>
@endsection

@section("pageContent")
    <div class="howork">
        <div class="inner">
            <div class="title-block">
                <h1>Как это работает?</h1>
            </div>
            <div class="how_sections">
                <div class="how_sect">
                    <img src="{{ url("web/upload/how1.jpg") }}" alt="" class="al_left">
                    <p>
                        Многих интересует вопрос, как работает увеличение члена, как работает экстендер? Все очень просто, Устройство увеличивает пенис благодаря долгому воздействию сил, прилагаемых к связкам и пещеристым тканям органа. Эта стимуляция способствует активному делению клеток, созданию новых, вследствие чего и получается общий сбалансированный рост.
                    </p>
                    <div class="title_p">Исторические предпосылки к разработке методики увеличения члена с помощью экстендера</div>
                    <p>
                        Методом вытягивания клеток пользовались различные племена аборигенов с древности. В частности, одна из народностей Востока Бирмы считает чрезвычайно длинную женскую шею признаком небывалой красоты, из-за чего девочки в этом племени с раннего возраста вынуждены носить на ней специальные кольца, периодическое добавление которых способствует растяжению шейных мышц, кожи, связок и позвонков. Аналогичные методики мы можем встретить в культуре самых различных народностей – где-то с их помощью непомерно оттягивают мочки ушей, где-то нижнюю губу и т.д. ходя из этого опыта, современными учеными и был разработан принцип увеличения члена с помощью его растягивания.
                    </p>
                </div>
                <div class="how_sect">
                    <div class="title_p">Методика применения экстендера</div>
                    <img src="{{ url("web/upload/how2.jpg") }}" alt="" class="al_right">
                    <p>
                        Прибор предназначен для ежедневного пяти-восьми часового ношения, причем для получения ощутимого результата вполне достаточно годичного курса. Эффективность применения устройства не зависит от начальных размеров. Использование экстендера вляется чрезвычайно простым, и освоить его может каждый, изучив инструкцию, прилагаемую в комплекте к прибору. Доступна удобная регулировка силы натяжения, благодаря чему экстендер всегда можно настроить таким образом, чтобы его ношение не являлось причиной дискомфорта.
                    </p>
                    <p>
                        В течение первой недели следует дать органу привыкнуть к прибору, надевая его не более чем на 30 минут – пару часов, лишь один раз на день. При распаковке экстендера его штанги выставлены на максимальную длину, которую следует откорректировать согласно существующей картине органа. Надевается прибор, когда его штанги вкручены, и в течение одного сеанса их следует постепенно удлинять. Это означает, что через двадцать минут следует их выкрутить на сантиметр, еще через такой же промежуток времени – еще на сантиметр и т.д. Очень важно нагрузку при тренировках увеличивать постепенно, ни в коем случае не допуская неприятных, и тем более болезненных ощущений. Если через несколько часов начал ощущаться дискомфорт, следует слегка убавить напряжение.
                    </p>
                </div>
                <a href="#" class="btn-blue down_doc">
                    <img src="{{url("web/img/pdf.png") }}" alt="">
                    <span class="text_btn">Скачать инструкцию (1.4Мб)</span>
                </a>
            </div>
        </div>
    </div>
    <div class="to_begin static">
        <div class="inner">
            <div class="questions item">
                <img src="{{url("web/img/qu_mark.png") }}" alt="">
                <div class="qu_text">
                    <b>Что делать?</b><b>C чего начать?</b>
                </div>
            </div>
            <div class="callback item">
                <img src="{{url("web/img/headset.png") }}" alt="">
                <div class="qu_text">
                    <div class="qu_small">свяжись со специалистом</div>
                    <b>100% Анонимно</b>
                </div>
            </div>
            <div class="btn-group item">
                <a href="" class="btn-red btn-simple">Закажи звонок</a>
                <a href="" class="btn-blue btn-simple">Спрашивай online</a>
            </div>
        </div>
    </div>
    @include("web.layout.reviews")
@endsection