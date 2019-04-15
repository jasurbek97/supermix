@extends('front.layout')
@section('content')
    <section class="product-more-top">
</section> <!-- main-section -->

<section class="product-more-sec">
    <div class="container">
        <div class="row">

            <div class="col-md-12">
             {!! $product->body !!}
            </div> <!-- col-md-12 -->

            <a href="#" class="mybtn1 text-center d-block mt-3 w-200" data-toggle="modal" data-target="#exampleModal">
                {{ trans('app.order') }}
            </a>
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content border-none">
                        <div class="modal-header border-none">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>

                        </div>
                        <div class="modal-body mybody">
                            <form action="{{route('order')}}" method="POST" class="modal-form d-flex justify-content-center flex-column">
                                @csrf
                                <input type="text"  name="name" placeholder="@lang('app.name')" maxlength="50" minlength="3" required class="border">
                                <input type="text" name="number" placeholder="@lang('app.tel')" maxlength="13" minlength="7"required class="border" value="+998">
                                <button type="submit">{{ trans('app.order') }}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div> <!-- row -->
    </div> <!-- container -->


</section>



@endsection