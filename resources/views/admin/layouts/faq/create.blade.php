@extends('admin.app')
@section('title', 'Faq create')
@section('header_title')
    Faq
@endsection;
@section('content')
    <!-- profile area  -->
    <div class="app--content--main">
        <div class="row mt-5">
            <div class="col-md-6 mt_30 mx-auto">
                <form method="POST" action="{{ route('admin.faq.store') }}" enctype="multipart/form-data">@csrf
                    <div class="personal--info profile--info--box">
                        <h3>Faq Create</h3>
                        <div class="input--group">
                            <label for="question_en">Question (EN)</label>
                            <input id="question_en" name="question_en" type="text" value="{{ old('question_en') }}"
                                placeholder="Faq question_en...">
                            @error('question_en')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="input--group">
                            <label for="question_de">Question (DE)</label>
                            <input id="question_de" name="question_de" type="text" value="{{ old('question_de') }}"
                                placeholder="Faq question_de...">
                            @error('question_de')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="input--group">
                            <label for="question_hu">Question (HU)</label>
                            <input id="question_hu" name="question_hu" type="text" value="{{ old('question_hu') }}"
                                placeholder="Faq question_hu...">
                            @error('question_hu')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mt-3">
                            <div class="input--group">
                                <label for="answer_en">Answer (EN)</label>
                                <textarea class="form-control" name="answer_en" placeholder="Leave your answer_en here" id="answer_en"
                                    style="height: 300px">{{ old('answer_en') }}</textarea>
                                @error('answer_en')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="mt-3">
                            <div class="input--group">
                                <label for="answer_de">Answer (DE)</label>
                                <textarea class="form-control" name="answer_de" placeholder="Leave your answer_de here" id="answer_de"
                                    style="height: 300px">{{ old('answer_de') }}</textarea>
                                @error('answer_de')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="mt-3">
                            <div class="input--group">
                                <label for="answer_hu">Answer (HU)</label>
                                <textarea class="form-control" name="answer_hu" placeholder="Leave your answer_hu here" id="answer_hu"
                                    style="height: 300px">{{ old('answer_hu') }}</textarea>
                                @error('answer_hu')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <button type="submit">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @push('script')
    {{-- ckeditor cdn  --}}
    <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>

        <script>
            CKEDITOR.replace('answer_en');
            CKEDITOR.replace('answer_de');
            CKEDITOR.replace('answer_hu');
        </script>
    @endpush
@endsection
