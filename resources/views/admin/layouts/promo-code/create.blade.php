@extends('admin.app')
@section('title', 'Promo Code create')
@section('header_title')
    Promo Code
@endsection;
@section('content')
    <section class="app--content--main">
        <!-- profile area  -->
        <div class="profile--area main-section-margin">
            <form method="POST" action="{{ route('admin.promo-code.store') }}">@csrf
                <!-- profile  -->
                <div class="row">
                    <div class="col-md-6 mb-5">
                        <div class="personal--info profile--info--box">
                            <h3>Promo Code Create</h3>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="row">
                            <!-- Input Item -->
                            <div class="col-4 mb-3">
                                <label class="form-label required">Code</label>
                                <input class="form-control" name="code" type="text" value="{{ old('code') }}"
                                       placeholder="code">
                                @error('code')
                                <span class="text-danger" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                @enderror
                            </div>
                            <div class="col-4 mb-3" id="promo_code_value">
                                <div id="percentage">
                                    <label class="form-label required">Discount Percentage</label>
                                    <input class="form-control" name="discount_percentage" type="number" min="0" max="100" value="{{ old('discount_percentage') }}"
                                           placeholder="percentage">
                                    @error('discount_percentage')
                                    <span class="text-danger" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-4 mb-3">
                                <label class="form-label required">Expire At</label>
                                <input class="form-control" name="expires_at" type="datetime-local" value="{{ old('expires_at') }}"
                                       placeholder="expire_at">
                                @error('expires_at')
                                <span class="text-danger" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                @enderror
                            </div>
                            <div class="col-4 mb-3">
                                <label class="form-label required">Usage Limit</label>
                                <input class="form-control" name="usage_limit" type="number" min="0" value="{{ old('usage_limit') }}"
                                       placeholder="00">
                                @error('usage_limit')
                                <span class="text-danger" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                @enderror
                            </div>
                            <div class="col-4 mb-3">
                                <label class="form-label required">Min Quantity</label>
                                <input class="form-control" name="min_quantity" type="number" min="0" max="9"
                                       value="{{ old('min_quantity') }}"
                                       placeholder="00">
                                @error('min_quantity')
                                <span class="text-danger" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                @enderror
                            </div>
                            <div class="col-4 mb-3">
                                <label class="form-label required">Max Quantity</label>
                                <input class="form-control" name="max_quantity" type="number" min="0" max="9"
                                       value="{{ old('max_quantity') }}"
                                       placeholder="00">
                                @error('max_quantity')
                                <span class="text-danger" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                @enderror
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection

