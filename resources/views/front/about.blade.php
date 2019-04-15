@extends('front.layout')

@section('content')
    <section class="contacts-top">





    </section> <!-- main-section -->

    <section  class="about-sec-1">

        <div  class="container">

            <div  class="row">

                <div class="col-md-12">
                    <h2 class="sec-h2">@lang('app.about')</h2>
                </div>



                <div class="col-md-7 aboutus-text">
                    <p>@lang('app.aboutPage.con')</p>
                    <p>@lang('app.aboutPage.con1')</p>
                    <p>@lang('app.aboutPage.con2')</p>
                    <p>@lang('app.aboutPage.con3')</p>

                </div>
                <div class="col-md-5">
                    <img src="vendor/front/images/aboutus-img.jpg" class="img-width" alt="">
                </div>

            </div> <!-- row -->
        </div> <!-- container -->

        <div class="container-fluid my-5 p-0">

            <div class="aboutusbg">

            </div>

        </div>

        <div class="container aboutus-text">
            <p>@lang('app.aboutPage.con4')</p>
            <iframe width="100%" class="my-4" height="315" src="https://www.youtube.com/embed/iwTqbEWnIhI" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            <p>@lang('app.aboutPage.con5')</p>
            <p>@lang('app.aboutPage.con6')</p>
            <p>@lang('app.aboutPage.con7')</p>
        </div>

        <div class="container-fluid mt-5 p-0">

            <div class="aboutusbg2 aboutus-text">
                <div class="container text-white">
                    <p>@lang('app.aboutPage.con8')</p>
                    <p>@lang('app.aboutPage.con9')</p>
                    <p>@lang('app.aboutPage.con10')</p>
                </div>

            </div>

        </div>

    </section>  <!-- about-sec-1 -->



@endsection