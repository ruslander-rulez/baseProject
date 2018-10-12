@extends("web." . App::getLocale() . ".root")

@section("meta-section")
    <title>Советы</title>
@endsection
@section("pageContent")
    <div class="articles">
        <div class="inner">
            <div class="title-block">
                <h1>Советы покупателям</h1>
            </div>
            <div class="art_section">
                @foreach($advices as $advice)
                    <div class="art_item">
                    <div class="img-wrap">
                        @if ($advice->attachment)
                            <img src="{{ url($advice->attachment->path) }}" alt="">
                        @endif
                    </div>
                    <div class="art_desc">
                        <a href="#" class="art_name">{{ $advice->title }}</a>
                        <p>
                            {!! $advice->short_text !!}
                        </p>
                        <a href="{{ route("web.advice.single", ["slug" => $advice->slug]) }}" class="art_more">Смотреть подробнее</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection