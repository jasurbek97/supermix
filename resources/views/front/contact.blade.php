@extends('front.layout')
@section('content')
<section class="contacts-top">





</section> <!-- main-section -->

<section class="contacts-sec">


    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="sec-h2">@lang('app.contact')</h2>
            </div>
            <div class="col-md-6">
                <p>@lang('app.address')</p>
                <p>@lang('app.addressPro')</p>
                <p>@lang('app.tel'):  @lang('app.number')</p>
                <p>
                    @lang('app.email'): @lang('app.mail')</p>
            </div> <!-- col-md-6 -->

            <div class="col-md-6">

                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d4397.431764965287!2d65.7953133312293!3d38.799153617431706!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMzjCsDQ3JzU4LjMiTiA2NcKwNDcnNDcuMiJF!5e0!3m2!1sru!2s!4v1555334414579!5m2!1sru!2s" width="100%" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>

            </div> <!-- col-md-6 -->

        </div> <!-- row -->
        <div class="row justify-content-center">

            <div class="col-md-4">

                <form action="{{route('order')}}" method="POST" class="pb-0 pt-5 front-form d-flex justify-content-center flex-column">
                    @csrf
                    <input type="text"  name="name" placeholder="@lang('app.name')" maxlength="50" minlength="3" required class="border">
                    <input type="text" name="number" placeholder="@lang('app.tel')" maxlength="13" minlength="7"required class="border" value="+998">
                    <button type="submit">{{ trans('app.order') }}</button>
                </form>
            </div>

        </div> <!-- row -->
    </div> <!-- container -->


</section>


@endsection