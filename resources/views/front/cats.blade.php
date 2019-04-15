@extends('front.layout')
@section('content')

    <section class="products-top">
    </section> <!-- main-section -->
    <div class="container">

        <div class="row py-4">
            <div class="col-md-12">
                <h2 class="sec-h2">@lang('app.product')</h2>
            </div>
            @foreach($cats as $cat)
                <div class="col-md-4">
                    <a href="{{route('product',[$cat->slug])}}" class="text-decoration-none mycard">
					<span class="photo">
						<img src="/{{$cat->image}}" class="img-width" alt="">
					</span>

                        <span class="text text-center d-block">
                            @if(app()->getLocale() == 'ru')
                                {{$cat->name_ru}}
                            @else
                                {{$cat->name_uz}}
                            @endif
					</span>
                    </a>
                </div> <!-- col-md-4 -->
            @endforeach
        </div> <!-- row -->
    </div>
@endsection