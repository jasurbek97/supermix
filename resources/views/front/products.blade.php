@extends('front.layout')
@section('content')
    <section class="birds-top">



    </section> <!-- main-section -->

    <section class="cows-sec-1 pt-4">


        <div class="container">


            <div class="row py-4">
                <div class="col-md-12">

                    <h2 class="sec-h2">
                        @if(app()->getLocale() == 'ru')
                            {{$cat->name_ru}}
                        @else
                            {{$cat->name_uz}}
                        @endif
                    </h2>
                </div>
                @foreach($products as $product)
                    <div class="col-md-4 py-4">
                        <a href="{{route('product.more', [$product->id, $product->slug])}}" class="text-decoration-none mycard shadow text-center pb-3">
						<span class="photo">
							<img src="/{{$product->image}}" class="img-width" alt="">
						</span>

                            <span class="text-center text2 d-block text-black py-2">
							{!! $product->title !!}
						</span>
                            <span class="mybtn1 text-center d-block mt-2 w-150 mr-auto ml-auto">{{trans('app.more')}}</span>
                        </a>
                    </div> <!-- col-md-4 -->
                @endforeach

                {{ $products->links() }}
            </div> <!-- row -->
        </div> <!-- container -->

    </section>


@endsection