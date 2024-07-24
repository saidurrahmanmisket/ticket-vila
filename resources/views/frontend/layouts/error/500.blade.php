@extends('frontend.app')

@section('title', '500 Internal Error')

@section('content')
    <!-- 404 page area starts -->
    <section class="about--us--banner--area--wrapper banner--top--gap section--bottom--gap">
        <div class="container w-50">

            <div class="row  justify-content-center  ">
                <div class="w-auto  row justify-content-center">
                    <div class="col col-lg-8 btn-fill ">
                        <img class="img-fluid" src="{{asset('frontend/images/500.png')}}" alt="">
                    </div>

                </div>
            </div>
            <div class=" d-flex justify-content-center btn--wrapper">
                <a href="{{route('frontend./')}}"
                   class="btn--normal btn-fill text-white bg-dark">{{ __("Back To Home") }}</a>
            </div>
        </div>
    </section>
    <!-- 404 page area ends -->
@endsection
