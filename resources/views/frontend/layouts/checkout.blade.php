@extends('frontend.app')

@section('title', 'Checkout')

@section('content')
	@push('style')
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@23.0.10/build/css/intlTelInput.css"/>
		<style>
            .single--input .iti__selected-country-primary {
                padding-left: 20px;
            }

            input#country-code {
                width: 100%;
            }
		</style>
        <style>
            .country .nice-select {
                display: none;
            }

            .select2-selection.select2-selection--single {
                height: 52px;
                border: 1px solid #e2e2e2;
                border-radius: 10px;
                font-size: 16px;
                padding: 0 12px;
            }

            .select2-container--default .select2-selection--single .select2-selection__rendered {
                color: #444;
                line-height: 50px;
            }

            .select2-container--default .select2-selection--single .select2-selection__arrow {
                height: 26px;
                position: absolute;
                top: 13px;
                right: 13px;
                width: 20px
            }

            .select2-dropdown, .select2-container--default .select2-search--dropdown .select2-search__field {
                border: 1px solid #e2e2e2
            }

            .select2-container--default .select2-results__option--highlighted.select2-results__option--selectable .country-text {
                color: #ffffff;
            }

            .select2.select2-container.select2-container--default {
                width: 100% !important;
            }
        </style>
	@endpush
<!-- main area starts -->
<main>
    <section class="banner--top--gap home--check--out--wrapper">
        <div class="container">
	        <form action="{{route('frontend.web-shop.stripe.payment')}}" id="payment--form"
	              class="home--checkout--content"
	              method="POST"> @csrf
                <div class="single--area personal--info">
                    <h3 class="section--title">{{ __("Personal Information's") }}</h3>
                    <div class="input--area--wrapper">
                        <div class="single--input">
                            <label class="required" for="first_name">{{ __("First Name") }}</label>
	                        <input value="{{old('first_name')}}"
	                               class="{{!empty($errors->first('first_name')) ? 'is_invalid' : ''}}" type="text"
	                               name="first_name" id="first_name" placeholder="first name"/>
	                        @error('first_name')
	                        <span class="invalid-feedback d-block">{{$message}}</span>
	                        @enderror
                        </div>
                        <div class="single--input">
                            <label class="required" for="last_name">{{ __("Last Name") }}</label>
	                        <input value="{{old('last_name')}}"
	                               class="{{!empty($errors->first('last_name')) ? 'is_invalid' : ''}}" type="text"
	                               id="last_name"
	                               name="last_name" placeholder="last name"/>
	                        @error('last_name')
	                        <span class="invalid-feedback d-block">{{$message}}</span>
	                        @enderror
                        </div>
                        {{--                        <div class="single--input">--}}
                        {{--                            <label class="required" for="birth_date">{{ __("Birthday") }}</label>--}}
                        {{--	                        <input value="{{old('birth_date')}}"--}}
                        {{--	                               class="{{!empty($errors->first('birth_date'))? 'is_invalid' : ''}}" type="date"--}}
                        {{--	                               name="birth_date"--}}
                        {{--	                               id="birth_date"/>--}}
                        {{--	                        @error('birth_date')--}}
                        {{--	                        <span class="invalid-feedback d-block">{{$message}}</span>--}}
                        {{--	                        @enderror--}}
                        {{--                        </div>--}}
                        <div class="single--input">
                            <label class="required" for="city">{{ __("City") }}</label>
	                        <input value="{{old('city')}}" class="{{!empty($errors->first('city'))? 'is_invalid' : ''}}"
	                               type="text"
	                               placeholder="city"
	                               name="city" id="city"/>
	                        @error('city')
	                        <span class="invalid-feedback d-block">{{$message}}</span>
	                        @enderror
                        </div>
                        {{--                        <div class="single--input">--}}
                        {{--                            <label class="required" for="state">{{ __("State") }}</label>--}}
                        {{--                            <input value="{{old('state')}}"--}}
                        {{--                                   class="{{!empty($errors->first('state'))? 'is_invalid' : ''}}"--}}
                        {{--                                   type="text"--}}
                        {{--                                   placeholder="state"--}}
                        {{--                                   name="state" id="state"/>--}}
                        {{--                            @error('state')--}}
                        {{--                            <span class="invalid-feedback d-block">{{$message}}</span>--}}
                        {{--                            @enderror--}}
                        {{--                        </div>--}}
                        {{--                        <div class="single--input">--}}
                        {{--                            <label class="required" for="birth_state">{{ __("City of the Birth") }}</label>--}}
                        {{--	                        <input value="{{old('birth_state')}}"--}}
                        {{--	                               class="{{ !empty($errors->first('birth_state')) ? 'is_invalid' : ''}}" type="text"--}}
                        {{--	                               id="birth_state"--}}
                        {{--                                   name="birth_state" placeholder="city of the birth"/>--}}
                        {{--	                        @error('birth_state')--}}
                        {{--	                        <span class="invalid-feedback d-block">{{$message}}</span>--}}
                        {{--	                        @enderror--}}
                        {{--                        </div>--}}
                        <div class="input--group">
                            <div class="single--input country">
                                <label for="country_id" class="required">{{ __('Country') }}</label>
                                <select
                                    class=" @error('country_id') is-invalid @enderror"
                                    id="country_id" name="country_id">
                                    <option code="count" value="">Select Country</option>
                                    @foreach($countries as $country)
                                        <option
                                            value="{{$country->id}}"
                                            code="{{$country->code}}" {{ old('country_id') == $country->id ? 'selected' : '' }}>{{ $country->name }}</option>
                                    @endforeach
                                </select>
                                @error('country_id')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            {{--                            <div class="single--input country">--}}
                            {{--                                <label for="country_of_birthday"--}}
                            {{--                                       class="required">{{ __('Birth Country') }}</label>--}}
                            {{--                                <select--}}
                            {{--                                    class=" @error('country_of_birthday') is-invalid @enderror"--}}
                            {{--                                    id="country_of_birthday" name="country_of_birthday">--}}
                            {{--                                    <option code="count" value="">Select Country</option>--}}
                            {{--                                    @foreach($countries as $country)--}}
                            {{--                                        <option--}}
                            {{--                                            value="{{$country->name}}"--}}
                            {{--                                            code="{{$country->code}}" {{ old('country_of_birthday') == $country->name ? 'selected' : '' }}>{{ $country->name }}</option>--}}
                            {{--                                    @endforeach--}}
                            {{--                                </select>--}}
                            {{--                                @error('country_of_birthday')--}}
                            {{--                                <span class="text-danger">{{ $message }}</span>--}}
                            {{--                                @enderror--}}
                            {{--                            </div>--}}
                        </div>
                        {{--                        <div class="single--input">--}}
                        {{--                            <label class="required" for="country-code">{{ __("Telephone") }}</label>--}}
                        {{--	                        <input value="{{old('phone')}}"--}}
                        {{--	                               class="{{ !empty($errors->first('phone')) ? 'is_invalid' : ''}}" type="tel"--}}
                        {{--	                               id="country-code"--}}
                        {{--	                               name="phone" placeholder="telephone"/>--}}
                        {{--	                        <input type="hidden" name="phone_code" id="phone_code">--}}
                        {{--	                        <input type="hidden" value="{{old('iso')}}" name="iso" id="iso">--}}
                        {{--	                        @error('phone')--}}
                        {{--	                        <span class="invalid-feedback d-block">{{$message}}</span>--}}
                        {{--	                        @enderror--}}
                        {{--                        </div>--}}
                        <div class="single--input">
                            <label class="required" for="email">{{ __("Email Address") }}</label>
	                        <input value="{{old('email')}}"
	                               class="{{ !empty($errors->first('email')) ? 'is_invalid' : ''}}" type="email"
	                               id="email"
	                               name="email"
	                               placeholder="example@gmail.com"/>
	                        @error('email')
	                        <span class="invalid-feedback d-block">{{$message}}</span>
	                        @enderror
                        </div>
                        <div class="single--input">
                            <label class="required" for="address">{{ __("Address") }}</label>
	                        <input value="{{old('address')}}"
	                               class="{{!empty($errors->first('address')) ? 'is_invalid' : ''}}" type="text"
	                               id="address"
	                               name="address" placeholder="address"/>
	                        @error('address')
	                        <span class="invalid-feedback d-block">{{$message}}</span>
	                        @enderror
                        </div>
                        <div class="input--group">
                            <div class="single--input">
                                <label class="required" for="zip">{{ __("Zip") }}</label>
	                            <input value="{{old('zip')}}"
	                                   class="{{ !empty($errors->first('zip')) ? 'is_invalid' : ''}}" type="number"
	                                   name="zip"
	                                   placeholder="344497"/>
	                            @error('zip')
	                            <span class="invalid-feedback d-block">{{$message}}</span>
	                            @enderror
                            </div>
                            {{--                            <div class="single--input">--}}
                            {{--                                <label class="required" for="gender">{{ __("Gender") }}</label>--}}
                            {{--	                            <select class="{{ !empty($errors->first('gender')) ? 'is_invalid' : ''}}" name="gender"--}}
                            {{--	                                    id="gender-select">--}}
                            {{--                                    <option @if(old('gender') == 'male') selected--}}
                            {{--                                            @endif value="male">{{ __("Male") }}</option>--}}
                            {{--                                    <option @if(old('gender') == 'female') selected--}}
                            {{--                                            @endif value="female">{{ __("Female") }}</option>--}}
                            {{--                                    <option @if(old('gender') == 'others') selected--}}
                            {{--                                            @endif value="others">{{ __("Others") }}</option>--}}
                            {{--                                </select>--}}
                            {{--	                            @error('gender')--}}
                            {{--                                <span class="invalid-feedback d-block">{{$message}}</span>--}}
                            {{--	                            @enderror--}}
                            {{--                            </div>--}}
                        </div>
                        {{--                        <div class="single--input">--}}
                        {{--                            <label class="required" for="password">{{ __("Password") }}</label>--}}
                        {{--	                        <input class="{{ !empty($errors->first('password')) ? 'is_invalid' : ''}}" type="password"--}}
                        {{--	                               id="password"--}}
                        {{--	                               name="password" placeholder="*******"/>--}}
                        {{--	                        @error('password')--}}
                        {{--	                        <span class="invalid-feedback d-block">{{$message}}</span>--}}
                        {{--	                        @enderror--}}
                        {{--                        </div>--}}
                        {{--                        <div class="single--input">--}}
                        {{--                            <label class="required" for="password_confirmation">{{ __("Confirm Password") }}</label>--}}
                        {{--	                        <input class="{{ !empty($errors->first('password_confirmation')) ? 'is_invalid' : ''}}"--}}
                        {{--	                               type="password"--}}
                        {{--	                               id="password_confirmation" name="password_confirmation"--}}
                        {{--	                               placeholder="Retype password"/>--}}
                        {{--	                        @error('password_confirmation')--}}
                        {{--	                        <span class="invalid-feedback d-block">{{$message}}</span>--}}
                        {{--	                        @enderror--}}
                        {{--                        </div>--}}
                        <div class="checkbox--wrapper">
                            <input id="rules" name="rules" @if(old('rules')) checked
                                   @endif type="checkbox"/>
                            <label for="rules"
                            >
                                {{ __("I agree to receive newsletters and promotional offers related to the campaign at my email address.") }}
                            </label>
                            @error('rules')
                            <span class="invalid-feedback d-block">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="single--area billing--info">
                    <h3 class="section--title">{{ __("Billing Information") }}</h3>

                    <div
                        class="checkout--popup default--scrollbar"
                        id="checkout--popup"
                    >
                        <form action="#" id="checkout-form">
                            <!-- step  -->
                            <div class="step">
                                <div class="billing--info">
                                    <!-- billing information  -->
                                    <ul>
                                        <li>
                                            <div class="options">
	                                            <p>{{ $campaign['name_' . locale()] ?? '' }}</p>
	                                            <p>{{ number_format($campaign->price,2) ?? '' }} €</p>
                                            </div>
                                        </li>
	                                    <li>
		                                    <div class="options">
                                                <p>{{ __("Quantity") }}</p>
			                                    <p>{{$quantity ?? 1}}</p>
			                                    <input type="hidden" name="quantity" value="{{$quantity ?? 1}}">
		                                    </div>
	                                    </li>
	                                    <li>
		                                    <div class="options">
                                                <p>{{ __("Subtotal") }}</p>
			                                    <p>{{ number_format($totalPrice,2) }} €</p>
		                                    </div>
	                                    </li>
	                                    @if(!empty($campaign->how_many_buy) && !empty($campaign->how_many_free))
		                                    <li>
			                                    <div class="options">
                                                    <p style="color: red;font-weight: bold;font-size: 18px">{{ __("Free Tickets") }}</p>
                                                    <p style="color: red;font-weight: bold;font-size: 18px">{{ calculateFreeTicket($quantity,$campaign->how_many_buy,$campaign->how_many_free) }}</p>
			                                    </div>
		                                    </li>
	                                    @endif
	                                    @if($campaign->discount_percent && Carbon\Carbon::parse($campaign->discount_expire_date)->greaterThan(now()))
		                                    <li>
			                                    <div class="options">
                                                    <p>{{__("Discount")}}({{$campaign->discount_percent}}%)</p>
				                                    <p>
					                                    -{{ number_format($totalPrice - calculateDiscount($totalPrice,$campaign->discount_percent),2) }}
					                                    €</p>
			                                    </div>
		                                    </li>
	                                    @endif
                                        <li style="display: none" id="promo-discount" class="position-relative">
                                            <div class="options">
                                                <p>{{ __("Promo Discount") }}<span id="discount-percent"></span></p>
                                                <p id="discount-value"></p>
                                                <input type="hidden" id="promo_code" name="promo_code" value="">
                                                <span class="position-absolute" id="removeAppycode"
                                                      style="cursor:pointer;top: -6px;right: 1px">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                         viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                         width="24" height="24" style="color: red">
                                                              <path stroke-linecap="round" stroke-linejoin="round"
                                                                    d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                                            </svg>
                                                </span>
                                            </div>
                                        </li>
	                                    <li>
		                                    <div class="options total">
                                                <p>{{ __("Total") }}</p>
                                                @php($totalAmount = $campaign->discount_percent && $campaign->discount_expire_date->greaterThan(now()) ? calculateDiscount($totalPrice,$campaign->discount_percent) : $totalPrice)
                                                <p class="text-green"
                                                   id="total-amount">{{ number_format($totalAmount,2) }}
				                                    €</p>
		                                    </div>
	                                    </li>
                                    </ul>
                                    <div id="apply-promo-code" class="mt-3">
                                        <label class="form-label"
                                               style="font-weight: bold">{{ __("Promotional code (Optional)") }}</label>
                                        <div class="d-flex gap-3">
                                            <div class="single--input">
                                                <input
                                                    type="text"
                                                    placeholder="ABC10"
                                                    name="code" id="code"/>
                                            </div>
                                            <button type="button" id="apply-button" class="btn btn-info text-white">
                                                Apply
                                            </button>
                                        </div>
                                        <span id="discount-error" style="display: none"
                                              class="invalid-feedback"></span>
                                    </div>

                                    <!-- payment method  -->
                                    <div class="payment--method mt_45">
                                        <h4>{{ __("Payment Method") }}</h4>
                                        <div class="methods">
                                            <!-- radio group  -->
                                            <div class="radio--group">
                                                <input
                                                    id="stripe"
                                                    type="radio"
                                                    value="stripe"
                                                    checked
                                                    name="radio--group"
                                                />
	                                            <label for="stripe">
                                                    <svg
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        width="43"
                                                        height="18"
                                                        viewBox="0 0 43 18"
                                                        fill="none"
                                                    >
                                                        <path
                                                            fill-rule="evenodd"
                                                            clip-rule="evenodd"
                                                            d="M42.3872 9.11323C42.3872 6.09905 40.9272 3.72066 38.1367 3.72066C35.3345 3.72066 33.639 6.09905 33.639 9.08972C33.639 12.6338 35.6406 14.4234 38.5135 14.4234C39.9146 14.4234 40.9743 14.1055 41.7749 13.6581V11.3032C40.9743 11.7035 40.0559 11.9508 38.8902 11.9508C37.7482 11.9508 36.7355 11.5505 36.6061 10.1611H42.3636C42.3637 10.008 42.3872 9.39577 42.3872 9.11323ZM36.5708 7.99465C36.5708 6.66414 37.3832 6.11072 38.125 6.11072C38.8432 6.11072 39.6086 6.66414 39.6086 7.99465H36.5708ZM29.0941 3.72066C27.9403 3.72066 27.1985 4.26223 26.7864 4.63907L26.6333 3.90908H24.043V17.6379L26.9865 17.0138L26.9983 13.6818C27.4221 13.9879 28.0462 14.4235 29.0823 14.4235C31.1899 14.4235 33.1091 12.728 33.1091 8.99559C33.0974 5.58099 31.1546 3.72066 29.0941 3.72066ZM28.3876 11.8331C27.6929 11.8331 27.2809 11.5858 26.9983 11.2797L26.9865 6.91141C27.2927 6.56993 27.7165 6.33449 28.3876 6.33449C29.4591 6.33449 30.2009 7.53544 30.2009 9.07788C30.201 10.6557 29.4709 11.8331 28.3876 11.8331ZM19.9927 3.02593L22.948 2.39015V0L19.9927 0.624029V3.02593ZM19.9927 3.92075H22.948V14.2232H19.9927V3.92075ZM16.8254 4.79205L16.637 3.92075H14.0938V14.2232H17.0373V7.24106C17.732 6.33441 18.9094 6.49931 19.2744 6.62879V3.92075C18.8977 3.77952 17.5201 3.52049 16.8254 4.79205ZM10.9383 1.36578L8.06534 1.97805L8.05359 11.4092C8.05359 13.1518 9.3605 14.4352 11.1031 14.4352C12.0686 14.4352 12.775 14.2585 13.1636 14.0466V11.6564C12.7869 11.8095 10.9265 12.3511 10.9265 10.6086V6.4287H13.1636V3.92083H10.9265L10.9383 1.36578ZM2.97891 6.91141C2.97891 6.45221 3.35566 6.27563 3.97969 6.27563C4.87451 6.27563 6.00484 6.54642 6.89974 7.02922V4.26223C5.92247 3.87373 4.95696 3.72066 3.97969 3.72066C1.58954 3.72066 0 4.96871 0 7.05273C0 10.3024 4.47424 9.78436 4.47424 11.1855C4.47424 11.7271 4.00328 11.9037 3.34391 11.9037C2.36664 11.9037 1.11858 11.5034 0.129557 10.9618V13.7641C1.22455 14.235 2.33137 14.4352 3.34391 14.4352C5.79291 14.4352 7.47666 13.2224 7.47666 11.1149C7.46491 7.60614 2.97891 8.23017 2.97891 6.91141Z"
                                                            fill="#635BFF"
                                                        ></path>
                                                    </svg>
                                                </label>
                                            </div>
	                                        <!-- radio group  -->
	                                        <div class="radio--group">
		                                        <input
				                                        id="paypal"
				                                        type="radio"
				                                        value="paypal"
				                                        name="radio--group"
		                                        />
		                                        <label for="paypal">
			                                        <svg
					                                        xmlns="http://www.w3.org/2000/svg"
					                                        width="22"
					                                        height="26"
					                                        viewBox="0 0 22 26"
					                                        fill="none"
			                                        >
				                                        <path
						                                        fill-rule="evenodd"
						                                        clip-rule="evenodd"
						                                        d="M6.59653 24.5714L7.03496 21.7752L6.0583 21.7524H1.39453L4.63568 1.11822C4.64578 1.05574 4.67842 0.997738 4.72609 0.956475C4.774 0.915213 4.83506 0.892578 4.89893 0.892578H12.7628C15.3736 0.892578 17.1752 1.43795 18.1158 2.51453C18.5568 3.01958 18.8376 3.5475 18.9736 4.12824C19.1161 4.73774 19.1185 5.46584 18.9795 6.35403L18.9694 6.41864V6.98782L19.4104 7.23869C19.7816 7.43652 20.0768 7.66287 20.3032 7.92199C20.6804 8.35395 20.9243 8.90285 21.0274 9.55338C21.134 10.2225 21.0988 11.019 20.9243 11.9206C20.7231 12.9576 20.3978 13.8609 19.9585 14.5999C19.5546 15.2808 19.0398 15.8457 18.4285 16.2834C17.845 16.6993 17.1518 17.015 16.3679 17.2171C15.6082 17.4156 14.7422 17.5158 13.7923 17.5158H13.1803C12.7428 17.5158 12.3177 17.674 11.984 17.9577C11.6494 18.2472 11.4282 18.6428 11.3603 19.0755L11.3141 19.3273L10.5394 24.2559L10.5044 24.4367C10.495 24.494 10.479 24.5226 10.4555 24.5419C10.4346 24.5596 10.4046 24.5714 10.3752 24.5714H6.59653Z"
						                                        fill="#28356A"
				                                        ></path>
				                                        <path
						                                        fill-rule="evenodd"
						                                        clip-rule="evenodd"
						                                        d="M19.8259 6.4834C19.8027 6.63406 19.7757 6.78803 19.7456 6.94624C18.7086 12.2924 15.1605 14.1393 10.6292 14.1393H8.32197C7.76777 14.1393 7.30069 14.5432 7.2145 15.0921L5.69866 24.7462C5.64254 25.1068 5.91917 25.4314 6.28128 25.4314H10.3735C10.8579 25.4314 11.2696 25.078 11.3459 24.5982L11.3861 24.3895L12.1565 19.4803L12.2061 19.211C12.2815 18.7295 12.6941 18.3758 13.1785 18.3758H13.7905C17.7552 18.3758 20.859 16.7598 21.7661 12.0828C22.1449 10.1291 21.9488 8.4977 20.9461 7.35037C20.6427 7.00448 20.2662 6.7173 19.8259 6.4834Z"
						                                        fill="#298FC2"
				                                        ></path>
				                                        <path
						                                        fill-rule="evenodd"
						                                        clip-rule="evenodd"
						                                        d="M18.7416 6.0495C18.5831 6.00305 18.4196 5.96108 18.252 5.92312C18.0833 5.8861 17.9107 5.85333 17.733 5.82456C17.1109 5.72365 16.4292 5.67578 15.6991 5.67578H9.53545C9.38352 5.67578 9.23933 5.71021 9.11041 5.77245C8.82603 5.90968 8.61491 6.17989 8.56372 6.51069L7.25242 14.8494L7.21484 15.0925C7.30103 14.5436 7.76811 14.1397 8.32231 14.1397H10.6295C15.1609 14.1397 18.7089 12.2919 19.746 6.94665C19.777 6.78844 19.803 6.63448 19.8263 6.48381C19.564 6.34399 19.2798 6.22445 18.9738 6.12259C18.8982 6.09736 18.8202 6.07308 18.7416 6.0495Z"
						                                        fill="#22284F"
				                                        ></path>
				                                        <path
						                                        fill-rule="evenodd"
						                                        clip-rule="evenodd"
						                                        d="M8.56398 6.51102C8.61517 6.18021 8.82628 5.91001 9.11067 5.77372C9.24053 5.71124 9.38378 5.67682 9.53571 5.67682H15.6993C16.4294 5.67682 17.1112 5.72492 17.7332 5.82583C17.911 5.85436 18.0836 5.88737 18.2522 5.92439C18.4199 5.96212 18.5833 6.00432 18.7418 6.05053C18.8205 6.07411 18.8985 6.09863 18.9748 6.12292C19.2808 6.22478 19.5652 6.34526 19.8275 6.48414C20.136 4.50851 19.8249 3.16336 18.7611 1.94531C17.5881 0.604171 15.4713 0.0302734 12.7625 0.0302734H4.89848C4.34522 0.0302734 3.87321 0.434171 3.78773 0.984018L0.512289 21.8303C0.44771 22.2427 0.764499 22.6148 1.17874 22.6148H6.03366L8.56398 6.51102Z"
						                                        fill="#28356A"
				                                        ></path>
			                                        </svg>
		                                        </label>
	                                        </div>
                                        </div>
                                    </div>
                                    <div class="checkbox--wrapper mt_35">
	                                    <input id="terms" name="terms" @if(old('terms')) checked
	                                           @endif type="checkbox"/>
	                                    <label for="terms"
                                        >{{ __("By checking this box, I agree to the") }}
                                            <a href="/page/terms-and-conditions">{{ __("Terms of Service") }}</a> {{ __("and") }}
                                            <a href="/page/privacy-policy">{{ __("Privacy Policy") }}</a>
                                            {{ __("confirm I am of legal age, and consent to the use of my personal Information as described. I understand my participation is voluntary and accept all related risks and rewards. I irrevocably accept the Rules of Registration and the 'Raffle Rules', which I have read and have no objection to.") }}
                                            {{ __('For every eBook purchased, you will receive a second eBook with a second free ticket, which will also be entered into the advertised house prize draw among our eBook buyers.') }}
                                        </label>
	                                    @error('terms')
	                                    <span class="invalid-feedback d-block">{{$message}}</span>
	                                    @enderror
                                    </div>
                                </div>
                            </div>

	                        {{--Hidden Input--}}
	                        <input type="hidden" name="cart" value="{{$cart}}">

                            <!-- Proceed to Payment button -->
                            <button class="proceed">
                                <span>{{ __("Proceed to payment") }}</span>
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="18"
                                    height="15"
                                    viewBox="0 0 18 15"
                                    fill="none"
                                >
                                    <path
                                        d="M16.75 7.72559L1.75 7.72559"
                                        stroke="white"
                                        stroke-width="2"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    />
                                    <path
                                        d="M10.7031 1.701L16.7531 7.725L10.7031 13.75"
                                        stroke="white"
                                        stroke-width="2"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    />
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>
	        </form>
        </div>
    </section>
</main>
<!-- main area ends -->
@endsection
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/intl-tel-input@23.0.10/build/js/intlTelInput.min.js"></script>
	<script>
        $(document).ready(function () {
            const input = document.querySelector("#country-code");
            const iso = "{{old('iso')}}"
            if (input) {
                let iti = window.intlTelInput(input, {
                    separateDialCode: true,
                    initialCountry: iso ? iso : "{{$isoCode}}",
                    // utilsScript: "/intl-tel-input/js/utils.js?1716383386062",
                });
                input.addEventListener("countrychange", function (item) {
                    document.querySelector("#phone_code").value = iti.getSelectedCountryData().dialCode;
                    document.querySelector("#iso").value = iti.getSelectedCountryData().iso2;
                });
                // Set the initial value
                document.querySelector("#phone_code").value = iti.getSelectedCountryData().dialCode;
            }

        })
	</script>
	<script>
        let form = $('#payment--form')
        $("input[name='radio--group']").each(function (el) {
            $(this).on('change', function () {
                if ($(this).is(':checked') && $(this).val() === 'stripe') {
                    form.attr('action', "{{route('frontend.web-shop.stripe.payment')}}")
                } else {
                    form.attr('action', "{{route('frontend.web-shop.paypal.payment')}}")
                }
            })
        })
	</script>
    <script>
        $(document).ready(function () {
            function formatState(state) {
                if (!state.id) {
                    return state.text;
                }
                if (state.element.getAttribute('code') === 'count') {
                    return state.text;
                }
                return $('<span class="country-text"><img width="20" style="margin-right: 10px" src="https://flagcdn.com/48x36/' + state.element.getAttribute('code').toLowerCase() + '.png" class="img-flag"  alt=""/>' + state.text + '</span>')
            }

            $('#country_id').select2({
                templateResult: formatState
            });
            $('#country_of_birthday').select2({
                templateResult: formatState
            });
        });
    </script>

    <script>
        $(document).ready(function () {
            var discountVal = 0;
            var totalAmount = Number.parseInt("{{$totalAmount}}")
            $('#apply-button').click(function () {
                $("#discount-error").hide()
                $("#discount-error").text('')
                var code = $('#code').val();
                var quantity = Number.parseInt("{{$quantity}}")
                $.ajax({
                    url: '{{ route('apply-promo-code') }}',
                    type: 'POST',
                    data: {
                        _token: "{{csrf_token()}}",
                        code: code,
                        quantity: quantity
                    },
                    success: function (response) {
                        if (response.success === 'true') {
                            discountVal = response.data.value * quantity;
                            $("#promo-discount").show()
                            $("#discount-percent").text('(' + response.data.percent + '%)')
                            $("#discount-value").text('-' + discountVal.toFixed(2) + ' €')
                            $("#promo_code").val(response.data.code)
                            $("#total-amount").text((totalAmount - discountVal).toFixed(2) + ' €')
                            flasher.success('Promo Code Applied Successfully.')
                            $("#apply-promo-code").hide()
                            $("#code").val('')
                        } else {
                            flasher.error('Something was wrong.')
                        }
                    },
                    error: function (res) {
                        $("#discount-error").show()
                        $("#discount-error").text(res.responseJSON?.message)
                    }
                });
            });

            $("#removeAppycode").click(function () {
                $("#promo-discount").hide()
                $("#discount-percent").text('')
                $("#discount-value").text('')
                $("#promo_code").val('')
                $("#total-amount").text((totalAmount).toFixed(2) + ' €')
                $("#apply-promo-code").show()
            })
        });
    </script>
@endpush

