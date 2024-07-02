@extends('user.app')

@section('title', 'Dashboard')
@section('header_title')
Expose
@endsection;
@push('style')
    <style>
        .radius--20{
            border-radius: 20px;
        }
    </style>
@endpush
@section('content')

    <section class="app--content--main user--portal buy-ebook">
        <!-- expose--area  -->
        <div class="expose--area">
            <!-- expose--box  -->
            <x-expose></x-expose>
            <!-- helping hand box  -->
            <div class="helping--hand--box mt_35">
                <div class="img--area text-center">
                    <div class="row">
                        <div class="col col-md-6 col-lg-3">
                            <img class="img-fluid object-fit-cover radius--20" src="{{ asset('user/images/expose-image-2.jpeg') }}" alt="" />
                        </div>
                        <div class="col col-md-6 col-lg-3">
                            <img class="img-fluid object-fit-cover radius--20" src="{{ asset('user/images/expose-image-4.jpeg') }}" alt="" />
                        </div>
                        <div class="col col-md-6 col-lg-3">
                            <img class="img-fluid object-fit-cover radius--20" src="{{ asset('user/images/expose-image-3.jpeg') }}" alt="" />
                        </div><div class="col col-md-6 col-lg-3">
                            <img  class="img-fluid object-fit-cover radius--20" src="{{ asset('user/images/expose-image-5.jpeg') }}" alt="" />
                        </div>
                    </div>
                </div>
                <h3>Need A Helping Hand? We are Here.</h3>
                <ul>
                    <li>
                        <a href="{{route('frontend.faqs')}}" class="user--common--btn">FAQ</a>
                    </li>
                    <li>
                        <a href="#" class="user--common--btn">Live Chat</a>
                    </li>
                    <li>
                        <a href="mailto:info@gmail.com" class="user--common--btn">Email</a>
                    </li>
                </ul>
            </div>
        </div>
    </section>

@endsection
