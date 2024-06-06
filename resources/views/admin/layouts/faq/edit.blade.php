@extends('admin.app')
@section('title', 'Faq edit')
@section('header_title')
    Faq
@endsection;
@section('content')

    <div>
        <div class="row mt-5">
            <div class="col-md-6 mt_30 mx-auto">
                <form method="POST" action="{{ route('admin.faq.update', $faq->id) }}" enctype="multipart/form-data">@csrf
                    @method('PATCH')
                    <div class="personal--info profile--info--box">
                        <h3>Faq Update</h3>
                        <div class="input--group">
                            <label for="question">Question</label>
                            <input id="question" name="question" type="text" value="{{ $faq->question }}"
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
                                <textarea class="form-control" name="answer" placeholder="Leave your answer here" id="answer" style="height: 300px">{{ $faq->answer }}</textarea>
                                @error('answer')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <button type="submit" class="btn-info">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
