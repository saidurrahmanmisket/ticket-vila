@extends('user.app')

@section('title', 'Dashboard')

@section('header_title')
    The House
@endsection;

@section('content')

    <!-- start app content area  -->
    <section class="app--content--main user--portal">
        <div class="the--house--area">
            <!-- top--contents  -->
            <div class="top--contents">
                <!-- house--tour  -->
                <div class="house--tour box--common">
                    <div class="top">
                        <h4 class="common--title">3D house tour</h4>
                        <div class="buttons">
                            <a href="#" class="button btn btn-primary text-light" id="btn3dInside">Inside</a>
                            <a href="#" class="button btn " id="btn3dOutside">Outside</a>
                        </div>
                    </div>
{{--                    toggle section--}}
                    <a href="#" class="position-relative inside d-block">
                        @if (!empty($houseTour) && !empty($houseTour->link))
                            <iframe class="house--img w-100" src="{{ $houseTour->link }}" width="600" height="450" style="border: 0"
                                    allowfullscreen="false" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        @elseif(empty($houseTour))
                            <iframe class="house--img w-100"
                                src="https://www.google.com/maps/embed?pb=!4v1716460175150!6m8!1m7!1sNY2kCM9GwhDdxMztNku49Q!2m2!1d47.03569798506084!2d16.01661381905965!3f16.892984!4f0!5f0.7820865974627469"
                                width="600" height="450" style="border: 0" allowfullscreen="false" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                        @else
                            <iframe class="house--img w-100" width="560" height="315" src="{{ $houseTour['link_' . locale()] ?? '' }}"
                                    title="YouTube video player" frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                    referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                        @endif

                    </a>
                    <a href="#" class="position-relative outSide d-none">
                        @if (!empty($propertyView) && !empty($propertyView->link))
                            <iframe class="house--img w-100" src="{{ $propertyView->link }}" width="600" height="450" style="border: 0"
                                    allowfullscreen="false" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        @elseif(empty($propertyView))
                            <iframe class="house--img w-100"
                                src="https://www.google.com/maps/embed?pb=!4v1716460175150!6m8!1m7!1sNY2kCM9GwhDdxMztNku49Q!2m2!1d47.03569798506084!2d16.01661381905965!3f16.892984!4f0!5f0.7820865974627469"
                                width="600" height="450" style="border: 0" allowfullscreen="false" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                        @else
                            <iframe class="house--img w-100" width="560" height="315" src="{{ $propertyView['link_' . locale()] ?? '' }}"
                                    title="YouTube video player" frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                    referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                        @endif

                    </a>
                </div>
                <!-- photo--and--gallery  -->
                <div class="photo--and--gallery box--common">
                    <!-- top  -->
                    <div class="top">
                        <h4 class="common--title">Photo & Gallery</h4>
                    </div>
                    <!-- photo--slider   -->
                    <div class="photo--slider--wrap position-relative">
                        <div class="owl-carousel photo--slider mt_20">
                            @if (isset($giftRandomImages) && $giftRandomImages)
                                @foreach ($giftRandomImages as $item)
                                    <div class="item">
                                        <img src="{{ $item->image ? asset($item->image) : asset('user/images/house1.png') }}"
                                            alt="" />
                                    </div>
                                @endforeach
                            @else
                                <div class="item">
                                    <img src="{{ asset('user/images/house1.png') }}" alt="" />
                                </div>
                            @endif
                        </div>
                        <!-- blur box  -->
                        <div class="blur--box">
                            <p>
                                You can't see this section, buy a eBook to get full data
                                access
                            </p>
                            <a href="buy-ticket.html" class="user--common--btn">Buy a E-Book</a>
                        </div>
                    </div>
                </div>
                <!-- download--box  -->
                <div class="download--box box--common">
                    <h4>Downloads</h4>
                    <ul>
                        <li>
                            <p>House Floor Plan</p>
                            <a href="#">
                                Download
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="15" viewBox="0 0 14 15"
                                    fill="none">
                                    <path
                                        d="M12.8359 3.99984V5.4115C12.8359 6.33317 12.2526 6.9165 11.3309 6.9165H9.33594V2.839C9.33594 2.1915 9.86678 1.6665 10.5143 1.6665C11.1501 1.67234 11.7334 1.929 12.1534 2.349C12.5734 2.77484 12.8359 3.35817 12.8359 3.99984Z"
                                        stroke="#868A9B" stroke-miterlimit="10" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path
                                        d="M1.16406 4.58317V12.7498C1.16406 13.234 1.71238 13.5082 2.09738 13.2165L3.09489 12.4698C3.32823 12.2948 3.6549 12.3182 3.8649 12.5282L4.83322 13.5023C5.06072 13.7298 5.43408 13.7298 5.66158 13.5023L6.64157 12.5223C6.84574 12.3182 7.1724 12.2948 7.3999 12.4698L8.39741 13.2165C8.78241 13.5023 9.33073 13.2282 9.33073 12.7498V2.83317C9.33073 2.1915 9.85573 1.6665 10.4974 1.6665H4.08073H3.4974C1.7474 1.6665 1.16406 2.71067 1.16406 3.99984V4.58317Z"
                                        stroke="#868A9B" stroke-miterlimit="10" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                            </a>
                        </li>
                        <li>
                            <p>House Expose</p>
                            <a href="#">
                                Download
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="15" viewBox="0 0 14 15"
                                    fill="none">
                                    <path
                                        d="M12.8359 3.99984V5.4115C12.8359 6.33317 12.2526 6.9165 11.3309 6.9165H9.33594V2.839C9.33594 2.1915 9.86678 1.6665 10.5143 1.6665C11.1501 1.67234 11.7334 1.929 12.1534 2.349C12.5734 2.77484 12.8359 3.35817 12.8359 3.99984Z"
                                        stroke="#868A9B" stroke-miterlimit="10" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path
                                        d="M1.16406 4.58317V12.7498C1.16406 13.234 1.71238 13.5082 2.09738 13.2165L3.09489 12.4698C3.32823 12.2948 3.6549 12.3182 3.8649 12.5282L4.83322 13.5023C5.06072 13.7298 5.43408 13.7298 5.66158 13.5023L6.64157 12.5223C6.84574 12.3182 7.1724 12.2948 7.3999 12.4698L8.39741 13.2165C8.78241 13.5023 9.33073 13.2282 9.33073 12.7498V2.83317C9.33073 2.1915 9.85573 1.6665 10.4974 1.6665H4.08073H3.4974C1.7474 1.6665 1.16406 2.71067 1.16406 3.99984V4.58317Z"
                                        stroke="#868A9B" stroke-miterlimit="10" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                            </a>
                        </li>
                        <li>
                            <p>4K Images</p>
                            <a href="#">
                                Download
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="15" viewBox="0 0 14 15"
                                    fill="none">
                                    <path
                                        d="M12.8359 3.99984V5.4115C12.8359 6.33317 12.2526 6.9165 11.3309 6.9165H9.33594V2.839C9.33594 2.1915 9.86678 1.6665 10.5143 1.6665C11.1501 1.67234 11.7334 1.929 12.1534 2.349C12.5734 2.77484 12.8359 3.35817 12.8359 3.99984Z"
                                        stroke="#868A9B" stroke-miterlimit="10" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path
                                        d="M1.16406 4.58317V12.7498C1.16406 13.234 1.71238 13.5082 2.09738 13.2165L3.09489 12.4698C3.32823 12.2948 3.6549 12.3182 3.8649 12.5282L4.83322 13.5023C5.06072 13.7298 5.43408 13.7298 5.66158 13.5023L6.64157 12.5223C6.84574 12.3182 7.1724 12.2948 7.3999 12.4698L8.39741 13.2165C8.78241 13.5023 9.33073 13.2282 9.33073 12.7498V2.83317C9.33073 2.1915 9.85573 1.6665 10.4974 1.6665H4.08073H3.4974C1.7474 1.6665 1.16406 2.71067 1.16406 3.99984V4.58317Z"
                                        stroke="#868A9B" stroke-miterlimit="10" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                            </a>
                        </li>
                        <li>
                            <p>Energy Certificate</p>
                            <a href="#">
                                Download
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="15" viewBox="0 0 14 15"
                                    fill="none">
                                    <path
                                        d="M12.8359 3.99984V5.4115C12.8359 6.33317 12.2526 6.9165 11.3309 6.9165H9.33594V2.839C9.33594 2.1915 9.86678 1.6665 10.5143 1.6665C11.1501 1.67234 11.7334 1.929 12.1534 2.349C12.5734 2.77484 12.8359 3.35817 12.8359 3.99984Z"
                                        stroke="#868A9B" stroke-miterlimit="10" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path
                                        d="M1.16406 4.58317V12.7498C1.16406 13.234 1.71238 13.5082 2.09738 13.2165L3.09489 12.4698C3.32823 12.2948 3.6549 12.3182 3.8649 12.5282L4.83322 13.5023C5.06072 13.7298 5.43408 13.7298 5.66158 13.5023L6.64157 12.5223C6.84574 12.3182 7.1724 12.2948 7.3999 12.4698L8.39741 13.2165C8.78241 13.5023 9.33073 13.2282 9.33073 12.7498V2.83317C9.33073 2.1915 9.85573 1.6665 10.4974 1.6665H4.08073H3.4974C1.7474 1.6665 1.16406 2.71067 1.16406 3.99984V4.58317Z"
                                        stroke="#868A9B" stroke-miterlimit="10" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                            </a>
                        </li>
                        <li>
                            <p>Land Register</p>
                            <a href="#">
                                Download
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="15" viewBox="0 0 14 15"
                                    fill="none">
                                    <path
                                        d="M12.8359 3.99984V5.4115C12.8359 6.33317 12.2526 6.9165 11.3309 6.9165H9.33594V2.839C9.33594 2.1915 9.86678 1.6665 10.5143 1.6665C11.1501 1.67234 11.7334 1.929 12.1534 2.349C12.5734 2.77484 12.8359 3.35817 12.8359 3.99984Z"
                                        stroke="#868A9B" stroke-miterlimit="10" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path
                                        d="M1.16406 4.58317V12.7498C1.16406 13.234 1.71238 13.5082 2.09738 13.2165L3.09489 12.4698C3.32823 12.2948 3.6549 12.3182 3.8649 12.5282L4.83322 13.5023C5.06072 13.7298 5.43408 13.7298 5.66158 13.5023L6.64157 12.5223C6.84574 12.3182 7.1724 12.2948 7.3999 12.4698L8.39741 13.2165C8.78241 13.5023 9.33073 13.2282 9.33073 12.7498V2.83317C9.33073 2.1915 9.85573 1.6665 10.4974 1.6665H4.08073H3.4974C1.7474 1.6665 1.16406 2.71067 1.16406 3.99984V4.58317Z"
                                        stroke="#868A9B" stroke-miterlimit="10" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                            </a>
                        </li>
                        <li>
                            <p>Smart Home</p>
                            <a href="#">
                                Download
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="15"
                                    viewBox="0 0 14 15" fill="none">
                                    <path
                                        d="M12.8359 3.99984V5.4115C12.8359 6.33317 12.2526 6.9165 11.3309 6.9165H9.33594V2.839C9.33594 2.1915 9.86678 1.6665 10.5143 1.6665C11.1501 1.67234 11.7334 1.929 12.1534 2.349C12.5734 2.77484 12.8359 3.35817 12.8359 3.99984Z"
                                        stroke="#868A9B" stroke-miterlimit="10" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path
                                        d="M1.16406 4.58317V12.7498C1.16406 13.234 1.71238 13.5082 2.09738 13.2165L3.09489 12.4698C3.32823 12.2948 3.6549 12.3182 3.8649 12.5282L4.83322 13.5023C5.06072 13.7298 5.43408 13.7298 5.66158 13.5023L6.64157 12.5223C6.84574 12.3182 7.1724 12.2948 7.3999 12.4698L8.39741 13.2165C8.78241 13.5023 9.33073 13.2282 9.33073 12.7498V2.83317C9.33073 2.1915 9.85573 1.6665 10.4974 1.6665H4.08073H3.4974C1.7474 1.6665 1.16406 2.71067 1.16406 3.99984V4.58317Z"
                                        stroke="#868A9B" stroke-miterlimit="10" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                            </a>
                        </li>
                        <li>
                            <p>Legal Information</p>
                            <a href="#">
                                Download
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="15"
                                    viewBox="0 0 14 15" fill="none">
                                    <path
                                        d="M12.8359 3.99984V5.4115C12.8359 6.33317 12.2526 6.9165 11.3309 6.9165H9.33594V2.839C9.33594 2.1915 9.86678 1.6665 10.5143 1.6665C11.1501 1.67234 11.7334 1.929 12.1534 2.349C12.5734 2.77484 12.8359 3.35817 12.8359 3.99984Z"
                                        stroke="#868A9B" stroke-miterlimit="10" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path
                                        d="M1.16406 4.58317V12.7498C1.16406 13.234 1.71238 13.5082 2.09738 13.2165L3.09489 12.4698C3.32823 12.2948 3.6549 12.3182 3.8649 12.5282L4.83322 13.5023C5.06072 13.7298 5.43408 13.7298 5.66158 13.5023L6.64157 12.5223C6.84574 12.3182 7.1724 12.2948 7.3999 12.4698L8.39741 13.2165C8.78241 13.5023 9.33073 13.2282 9.33073 12.7498V2.83317C9.33073 2.1915 9.85573 1.6665 10.4974 1.6665H4.08073H3.4974C1.7474 1.6665 1.16406 2.71067 1.16406 3.99984V4.58317Z"
                                        stroke="#868A9B" stroke-miterlimit="10" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-md-7 mt_35 pr_17">
                    <div class="faq--box h-100">
                        <h4 class="common--title">Frequently Asked Questions</h4>
                        {{-- this is daynamic faq component --}}
                        <x-faq></x-faq>
                    </div>
                </div>
                <div class="col-md-5 mt_35 pl_17">
                    <div class="key--feature--box h-100">
                        <h4 class="common--title">Key Features</h4>
                        <ul>
                            @if(isset($keyFeatures) && $keyFeatures)
                                @foreach($keyFeatures as $item)
                                    <li>
                                        <!-- icon  -->
                                        <p class="icon">
                                            <img class="w-100" src="{{$item->icon ? asset($item->icon) : ''}}" alt="">
                                        </p>
                                        <p>
                                            {{$item['title_'.locale()] }}
                                        </p>
                                    </li>
                                @endforeach
                            @endif

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end app content area  -->

@endsection

@push('script')
    <script>

        //toggle house tour inside and outside buttons
        $(document).ready(function() {
            $('#btn3dInside').click(function(event) {
                event.preventDefault();
                toggleClass($(this), $('#btn3dOutside'));
                toggleVisibility($('.inside'), $('.outside'));
            });

            $('#btn3dOutside').click(function(event) {
                event.preventDefault();
                toggleClass($(this), $('#btn3dInside'));
                toggleVisibility($('.outside'), $('.inside'));
            });

            function toggleClass(activeBtn, inactiveBtn) {
                activeBtn.addClass('btn-primary text-light');
                inactiveBtn.removeClass('btn-primary text-light');
            }

            function toggleVisibility(showElement, hideElement) {
                showElement.removeClass('d-none').addClass('d-block');
                hideElement.removeClass('d-block').addClass('d-none');
            }
        });
    </script>
@endpush
