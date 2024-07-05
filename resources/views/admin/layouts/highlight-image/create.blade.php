@extends('admin.app')
@section('title', 'House file create')
@section('header_title')
     Create Highlight Image
@endsection;
@push('style')
    <style>
        .input-container {
            position: relative;
            display: inline-block;
            margin-bottom: 20px;
        }
        input[type="text"] {
            width: 100%;
            box-sizing: border-box;
        }
        .dropdown {
            position: absolute;
            width: 100%;
            max-height: 800px;
            overflow-y: auto;
            border: 1px solid #ccc;
            box-shadow: 0 2px 5px rgba(0,0,0,0.2);
            display: none;
            background-color: #fff;
            z-index: 1000;
        }
        .dropdown-item {
            padding: 8px;
            cursor: pointer;
        }
        .dropdown-item:hover {
            background-color: #f0f0f0;
        }
    </style>
@endpush
@section('content')
    <!-- profile area  -->
                <form method="POST" action="{{ route('admin.highlight-image.store') }}" enctype="multipart/form-data">@csrf
    <div class="app--content--main ">
        <div class="row card">
            <div class="col mx-auto">

                    <div class="personal--info profile--info--box">

                        {{-- gift feature section  --}}
                            <div class="row justify-content-center" id="feature-content">
                                <div class="col col-md-6 col-lg-8">
                                    <div class="card border border-primary my-5 p-5">

                                        <div class="card-body">
                                            <div class=" ">
                                                <div class="">

                                                    <div class="row">
                                                            <label for="gift_id" class="form-label required h5">Select Gift</label>
                                                        <div class="">
                                                            <select class="form-select w-100 mb-5 px-5" id="gift_id" name="gift_id">
                                                                <option selected>Select gift</option>
                                                                @foreach($gifts as $gift)
                                                                    <option @if(old('gift_id') == $gift->id) selected @endif value="{{ $gift->id }}">{{ $gift->name_en }}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('gift_id')
                                                            <span class="invalid-feedback d-block" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-group row mt-4" id="imageUploadContainerPlan">
                                                        <div class="col">
                                                             <label for="image"> Image: <span
                                                                     class="text-danger">*</span></label>
                                                            <input type="file"
                                                                   class="form-control form-control-lg mt-2 border-left-0 dropify @error('image') is-invalid @enderror"
                                                                   name="image" data-show-remove="true" accept="*"
                                                                   value="{{ old('image', '') }}" data-default-file="{{ asset('admin/images/placeholder.png') }}">
                                                            @error('image')
                                                            <span class="text-danger" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-center mb-2">
                                                <button type="submit ">Create</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
            </div>
        </div>
    </div>
                </form>
@endsection
@push('script')
    <script>
        $('.dropify').dropify({
            messages: {
                'default': 'Drag and drop a file here or click.',
                'replace': 'Drag and drop or click to replace',
                'remove': 'Remove',
                'error': 'Ooops, something wrong happended.'
            }
        });

        //delete   item
        $('#feature-content').on('click', '.remove-feature', function() {
            $(this).parent().parent().parent().parent().parent().parent().parent().remove();
        });
    </script>

    //for input field suggestions
    <script>
        $(document).ready(function() {
            $('.input-container input').on('focus', function() {
                $(this).next('.dropdown').show();
            });

            $('.input-container input').on('blur', function() {
                var dropdown = $(this).next('.dropdown');
                setTimeout(function() {
                    dropdown.hide();
                }, 200);
            });

            $('.dropdown .dropdown-item').on('click', function() {
                var input = $(this).closest('.input-container').find('input');
                input.val($(this).text());
                $(this).closest('.dropdown').hide();
            });
        });
    </script>
@endpush
