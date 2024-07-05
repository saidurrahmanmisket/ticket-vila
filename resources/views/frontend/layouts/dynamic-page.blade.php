@extends('frontend.app')

@section('title',  isset($pageData) ? $pageData['title_'.locale()] : "Ticket Villa" )

@section('content')
      <!-- banner area starts -->
      <section
        class="imprint--banner--area--wrapper section--bottom--gap banner--top--gap"
      >
        <div class="container">
          <div class="imprint--banner--area--content">
            <div class="left">
              <h3
                data-aos="fade-down"
                data-aos-duration="600"
                class="banner--main--text"
              >
                {{ isset($pageData) ? $pageData['title_'.locale()] : '' }}
              </h3>
              <p data-aos="fade-up" data-aos-duration="800" class="banner--para">
                  {!!  !empty($pageData) && !empty($pageData['sub_title_' . locale()]) ? substr($pageData['sub_title_' . locale()], 0, 300) . '...' : '' !!}
              </p>
                @if (
                        !empty($pageData) &&
                            !empty($pageData['sub_title_' . locale()]) &&
                            strlen($pageData['sub_title_' . locale()]) > 300)
                    <a href="#" class="btn--normal border blank mt-4" data-bs-toggle="modal"
                       data-bs-target="#exampleModal">Read More</a>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                         aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    {!! $pageData['sub_title_' . locale()] !!}
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

            </div>
            <div data-aos="fade-left" data-aos-duration="600" class="right">
              <img src="{{ isset($pageData) && $pageData->image ? asset($pageData->image) : asset('frontend/images/imprint-banner-bg.png')  }}" alt="" />
            </div>
          </div>
        </div>
      </section>
      <!-- banner area ends -->

      <!-- main content area starts -->
      <section
        class="imprint--main--content--area--wrapper section--bottom--gap"
      >
        <div class="container">
          <div class="imprint--main--content">
            {!! isset($pageData) ? $pageData['description_'.locale()] : '' !!}
          </div>
        </div>
      </section>
      <!-- main content area ends -->
  @endsection
