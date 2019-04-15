@extends('front.layout')
@section('content')

<section class="cooperation-top">





</section> <!-- main-section -->


<section  class="cooperation-sec-1">

    <div  class="container">
        <div  class="row">
            <div class="col-md-12">
                <h2 class="sec-h2">@lang('app.cooperation')</h2>
            </div>
            <div class="col-md-12">
                <p class="text-center"><b>@lang('app.cooperationPage.con1')</b></p>
                <p>@lang('app.cooperationPage.con2')</p>
                <p class="text-center">@lang('app.cooperationPage.con3')</p>
                <p class="text-center">
                    <a href="https://dozaagro.ru/" target="about" class="text-danger"><img src="/vendor/front/images/logo dazaagro.png" class="img-width" alt=""></a>
                </p>

                </p>
                <p>@lang('app.cooperationPage.con4')<a href="https://dozaagro.ru/" target="about" class="text-danger">dozaagro.ru</a>
                </p>


            </div> <!-- col-md-12 -->

            <div class="col-md-3 text-center py-2 col-6">
                <img src="/vendor/front/images/image dozagro 1.jpg" class="img-width shadow" alt="">
            </div>

            <div class="col-md-3 text-center py-2 col-6">
                <img src="/vendor/front/images/image dozagro 2.jpg" class="img-width shadow" alt="">
            </div>

            <div class="col-md-3 text-center py-2 col-6">
                <img src="/vendor/front/images/image dozagro 3.jpg" class="img-width shadow" alt="">
            </div>

            <div class="col-md-3 text-center py-2 col-6">
                <img src="/vendor/front/images/image dozagro 4.jpg" class="img-width shadow" alt="">
            </div>



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





</section>  <!-- about-sec-1 -->


@endsection