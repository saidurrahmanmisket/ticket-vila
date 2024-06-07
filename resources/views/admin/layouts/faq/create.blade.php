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
                                <label for="question">Question</label>
                                <input id="question" name="question" type="text" value="{{ old('question') }}"
                                    placeholder="Faq question...">
                                @error('question')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mt-3">
                                <div class="input--group">
                                    <label for="answer">Answer</label>
                                    <textarea class="form-control" name="answer" placeholder="Leave your answer here" id="answer" style="height: 300px">{{ old('answer') }}</textarea>
                                    @error('answer')
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
@endsection
