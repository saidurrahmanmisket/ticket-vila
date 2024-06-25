@extends('frontend.app')

@section('title', 'Ticket Villa')

@section('content')
    <div class="container section--bottom--gap banner--top--gap">

        {{-- <x-faq></x-faq> --}}
        @if ($faqs && $faqs->isNotEmpty())

            <div class="faq--area--content">
                <div class="accordion" id="accordionExample">
                    @if ($faqs)
                        @foreach ($faqs as $faq)
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseOne{{ $faq->id }}" aria-expanded="false"
                                        aria-controls="collapseOne">
                                        {{ $loop->iteration + $faqs->firstItem() - 1 . "." }}

                                        {{ $faq['question_' . locale()] ?? '' }}
                                    </button>
                                </h2>
                                <div id="collapseOne{{ $faq->id }}" class="accordion-collapse collapse "
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        {!! $faq['answer_' . locale()] ?? '' !!}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="mt-4 d-flex justify-content-center">

                            {{ $faqs->links() }}
                        </div>
                    @endif
                </div>
            </div>
        @endif

    </div>
@endsection
