@extends('user.app')

@section('title', 'Dashboard')

@section('header_title')
Help Center
@endsection;

@section('content')

<!-- start app content area  -->
<section class="app--content--main user--portal statistics">
    <div class="help--area">
      <div class="row">
        <div class="col-md-8">
          <div class="faq--box h-100">
            <h4 class="common--title">Frequently Asked Questions</h4>

            {{-- this is daynamic faq component --}}
            <x-faq></x-faq>
          
          
          </div>
        </div>
        <div class="col-md-4">
          <!-- chat--box  -->
          <div class="chat--box">
            <h3>
              We are here to help, please do not hesitate to contact us!
            </h3>
            <p>24/7 Chat support with the help of all.</p>
            <a href="#" class="user--common--btn">Start Chat</a>
          </div>
          <!-- affiliate--box  -->
          <div class="affiliate--box text-center mt_35">
            <h3>Join Affiliate Program</h3>
            <p>Become an affiliates partner and earn extra money.</p>
            <a href="#" class="user--common--btn">Join Now</a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end app content area  -->

@endsection