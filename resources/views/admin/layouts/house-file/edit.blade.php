@extends('admin.app')
@section('title', 'House File Update')
@section('header_title')
    Update House File
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
    <form method="POST" action="{{ route('admin.house-files.update', $houseFile) }}" enctype="multipart/form-data">
        @method('put')
        @csrf

        <div class="app--content--main card">
            <div class="row ">
                <div class="col mx-auto">

                    <div class="personal--info profile--info--box">

                        {{-- gift feature section  --}}
                        <div class="row justify-content-center" id="feature-content">
                            <div class="col col-md-6 col-lg-8">
                                <div class="card border border-primary mt-5 p-5">

                                    <div class="card-body">
                                        <div class=" ">
                                            <div class="">

                                                <div class="row">
                                                    <label for="gift_id" class="form-label required h5">Select Gift</label>
                                                    <div class="">
                                                        <select class="form-select w-100 mb-5 px-5" id="gift_id" name="gift_id">
                                                            <option selected>Select gift</option>
                                                            @foreach($gifts as $gift)
                                                                <option @if($houseFile->gift_id ?? '' == $gift->id) selected @endif value="{{ $gift->id }}">{{ $gift->name_en }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('gift_id')
                                                        <span class="invalid-feedback d-block" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <h5 class="mt-3">Name</h5>
                                                    <div class="col-lg-4">
                                                        <div class="input--group input-container">
                                                            <label for="file_name_en">EN<span
                                                                    class="text-danger">*</span></label>
                                                            <input class="form-control @error('file_name_en') is-invalid @enderror" id="file_name_en" name="file_name_en" type="text"
                                                                   value="{{$houseFile->file_name_en ?? ' ' }}"
                                                                   placeholder="Title..">
                                                            <div class="dropdown" id="dropdown_en">
                                                                <div class="dropdown-item">House Floor Plan</div>
                                                                <div class="dropdown-item">House Expose</div>
                                                                <div class="dropdown-item">4K Images</div>
                                                                <div class="dropdown-item">Energy Certificate</div>
                                                                <div class="dropdown-item">Land Register</div>
                                                                <div class="dropdown-item">Smart Home</div>
                                                                <div class="dropdown-item">Legal Information</div>
                                                            </div>
                                                            @error('file_name_en' )
                                                            <span class="invalid-feedback d-block" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                            @enderror
                                                        </div>


                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="input--group input-container">
                                                            <label for="file_name_de">DE<span
                                                                    class="text-danger">*</span></label>
                                                            <input class="form-control @error('file_name_de') is-invalid @enderror" id="file_name_de" name="file_name_de" type="text"
                                                                   value="{{$houseFile->file_name_de ?? ' ' }}"
                                                                   placeholder="Titel..">
                                                            <div class="dropdown" id="dropdown_de">
                                                                <div class="dropdown-item">Haus Grundriss</div>
                                                                <div class="dropdown-item">Haus Exposé</div>
                                                                <div class="dropdown-item">4K Bilder</div>
                                                                <div class="dropdown-item">Energiezertifikat</div>
                                                                <div class="dropdown-item">Grundbuch</div>
                                                                <div class="dropdown-item">Smart Home</div>
                                                                <div class="dropdown-item">Rechtliche Informationen</div>
                                                            </div>
                                                            @error('file_name_de')
                                                            <span class="invalid-feedback d-block" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="input--group input-container ">
                                                            <label for="file_name_hu">HU <span
                                                                    class="text-danger">*</span></label>
                                                            <input class="form-control @error('file_name_hu') is-invalid @enderror" id="file_name_hu" name="file_name_hu" type="text"
                                                                   value="{{$houseFile->file_name_hu ?? ' ' }}"
                                                                   placeholder="Cím..">
                                                            <div class="dropdown" id="dropdown_hu">
                                                                <div class="dropdown-item">Ház Alaprajz</div>
                                                                <div class="dropdown-item">Ház Exposé</div>
                                                                <div class="dropdown-item">4K Képek</div>
                                                                <div class="dropdown-item">Energiatanúsítvány</div>
                                                                <div class="dropdown-item">Földnyilvántartás</div>
                                                                <div class="dropdown-item">Okos Otthon</div>
                                                                <div class="dropdown-item">Jogi Információk</div>
                                                            </div>
                                                            @error('file_name_hu')
                                                            <span class="invalid-feedback d-block" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row mt-4" id="imageUploadContainerPlan">
                                                    <div class="col">
                                                        <label for="image"> File: <span
                                                                class="text-danger">*</span></label>
                                                        <input type="file"
                                                               class="form-control form-control-lg mt-2 border-left-0 dropify @error('file_name_hu') is-invalid @enderror"
                                                               name="file" data-show-remove="true" accept="*"
                                                               data-default-file="{{asset($houseFile->file_path ?? '')}}">
                                                        @error('file')
                                                        <span class="text-danger" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-center mb-2">
                                            <button type="submit ">Update</button>
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
