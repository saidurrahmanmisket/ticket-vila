@extends('user.app')

@section('title', 'Dashboard')
@section('header_title')
Expose
@endsection;
@section('content')

    <section class="app--content--main user--portal buy-ebook">
        <!-- expose--area  -->
        <div class="expose--area">
            <!-- expose--box  -->
            <x-expose></x-expose>
            <!-- helping hand box  -->
            <div class="helping--hand--box mt_35">
                <div class="img--area text-center">
                    <img src="{{ asset('user/images/grow.svg') }}" alt="" />
                </div>
                <h3>Need A Helping Hand? We are Here.</h3>
                <ul>
                    <li>
                        <a href="user--helpcenter.html" class="user--common--btn">FAQ</a>
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
