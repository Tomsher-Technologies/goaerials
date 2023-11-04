@extends('layouts.admin.app', ['body_class' => 'nav-md', 'title' => 'About Us Page Contents'])
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1>About Us Page Contents</h1>
                <div class="separator mb-5"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-8 offset-2">

                <x-status />

                <div class="card mb-4">
                    <div class="card-body">
                        <form method="POST"
                            action="{{ route('admin.page.store-about', [
                                'page_name' => 'about',
                            ]) }}"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <h4>First Slide Section</h4>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Title</label>
                                <input type="text" name="first_title" class="form-control"
                                    value="{{ old('first_title', $data->getTranslation('title','en')) }}" >
                                <x-input-error name='first_title' />
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Arabic Title</label>
                                <input type="text" name="ar_first_title" dir="rtl" class="form-control"
                                    value="{{ old('ar_first_title', $data->getTranslation('title', 'ar')) }}" >
                                <x-input-error name='ar_first_title' />
                            </div>

                            <div class="form-group position-relative error-l-50">
                                <label>Description</label>
                                <textarea class="form-control" id="engDescription" name="first_description" rows="2">{{ old('first_description', $data->getTranslation('description','en')) }}</textarea>
                                <x-input-error name='first_description' />
                            </div>
                            <div class="form-group position-relative error-l-50">
                                <label>Arabic Description</label>
                                <textarea class="form-control" id="arDescription" dir="rtl" name="ar_first_description" rows="2">{{ old('ar_first_description', $data->getTranslation('description', 'ar')) }}</textarea>
                                <x-input-error name='ar_first_description' />
                            </div>

                            <div class="form-group">
                                <h4>Second Slide Section</h4>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Title</label>
                                <input type="text" name="second_title" class="form-control"
                                    value="{{ old('second_title', $data->getTranslation('heading1','en')) }}" >
                                <x-input-error name='second_title' />
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Arabic Title</label>
                                <input type="text" name="ar_second_title" dir="rtl" class="form-control"
                                    value="{{ old('ar_second_title', $data->getTranslation('heading1', 'ar')) }}" >
                                <x-input-error name='ar_second_title' />
                            </div>

                            <div class="form-group position-relative error-l-50">
                                <label>Description</label>
                                <textarea class="form-control" id="engSubDescription" name="second_description" rows="2">{{ old('second_description', $data->getTranslation('content1','en')) }}</textarea>
                                <x-input-error name='second_description' />
                            </div>
                            <div class="form-group position-relative error-l-50">
                                <label>Arabic Description</label>
                                <textarea class="form-control" id="arSubDescription" dir="rtl" name="ar_second_description" rows="2">{{ old('ar_second_description', $data->getTranslation('content1', 'ar')) }}</textarea>
                                <x-input-error name='ar_second_description' />
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Image</label>
                                <div class="input-group mb-3">
                                    <div class="custom-file">
                                        <input name="first_image" class="img" type="file" class="custom-file-input"
                                            id="image1" accept="image/*">
                                        <label class="custom-file-label" for="image1">Choose
                                            file</label>
                                    </div>
                                </div>
                                <x-input-error name='first_image' />
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Current Image</label>
                                <img class="img-custom form-control" src="{{ $data->getImage1('image1') }}" alt="">
                            </div>

                            <div class="form-group">
                                <h4>Third Slide Section (Why Choose Us)</h4>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Title</label>
                                <input type="text" name="choose_title" class="form-control"
                                    value="{{ old('choose_title', $data->getTranslation('heading2','en')) }}" >
                                <x-input-error name='choose_title' />
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Arabic Title</label>
                                <input type="text" name="ar_choose_title" dir="rtl" class="form-control"
                                    value="{{ old('ar_choose_title', $data->getTranslation('heading2', 'ar')) }}" >
                                <x-input-error name='ar_choose_title' />
                            </div>

                            <div class="form-group position-relative error-l-50">
                                <label>Description</label>
                                <textarea class="form-control" id="engContent" name="choose_description" rows="2">{{ old('choose_description', $data->getTranslation('content2','en')) }}</textarea>
                                <x-input-error name='choose_description' />
                            </div>
                            <div class="form-group position-relative error-l-50">
                                <label>Arabic Description</label>
                                <textarea class="form-control" id="arContent" dir="rtl" name="ar_choose_description" rows="2">{{ old('ar_choose_description', $data->getTranslation('content2', 'ar')) }}</textarea>
                                <x-input-error name='ar_choose_description' />
                            </div>

                            <div class="form-group">
                                <h4>Fourth Slide Section (Who We Are)</h4>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Title</label>
                                <input type="text" name="fourth_title" class="form-control"
                                    value="{{ old('fourth_title', $data->getTranslation('heading3','en')) }}" >
                                <x-input-error name='fourth_title' />
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Arabic Title</label>
                                <input type="text" name="ar_fourth_title" dir="rtl" class="form-control"
                                    value="{{ old('ar_fourth_title', $data->getTranslation('heading3', 'ar')) }}" >
                                <x-input-error name='ar_fourth_title' />
                            </div>

                            <div class="form-group position-relative error-l-50">
                                <label>Description</label>
                                <textarea class="form-control" id="engContent" name="fourth_description" rows="2">{{ old('fourth_description', $data->getTranslation('content3','en')) }}</textarea>
                                <x-input-error name='fourth_description' />
                            </div>
                            <div class="form-group position-relative error-l-50">
                                <label>Arabic Description</label>
                                <textarea class="form-control" id="arContent" dir="rtl" name="ar_fourth_description" rows="2">{{ old('ar_fourth_description', $data->getTranslation('content3', 'ar')) }}</textarea>
                                <x-input-error name='ar_fourth_description' />
                            </div>

                            <div class="form-group">
                                <h4>Fifth Slide Section (What We Do)</h4>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Title</label>
                                <input type="text" name="fifth_title" class="form-control"
                                    value="{{ old('fifth_title', $data->getTranslation('heading4','en')) }}" >
                                <x-input-error name='fifth_title' />
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Arabic Title</label>
                                <input type="text" name="ar_fifth_title" dir="rtl" class="form-control"
                                    value="{{  old('ar_fifth_title', $data->getTranslation('heading4', 'ar')) }}" >
                                <x-input-error name='ar_fifth_title' />
                            </div>

                            <div class="form-group position-relative error-l-50">
                                <label>Description</label>
                                <textarea class="form-control" id="engContent" name="fifth_description" rows="2">{{  old('fifth_description', $data->getTranslation('content4','en')) }}</textarea>
                                <x-input-error name='fifth_description' />
                            </div>
                            <div class="form-group position-relative error-l-50">
                                <label>Arabic Description</label>
                                <textarea class="form-control" id="arContent" dir="rtl" name="ar_fifth_description" rows="2">{{ old('ar_fifth_description', $data->getTranslation('content4', 'ar')) }}</textarea>
                                <x-input-error name='ar_fifth_description' />
                            </div>

                            <div class="form-group">
                                <h4>Vision & Mission</h4>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Vision Heading</label>
                                <input type="text" name="vision_heading" class="form-control"
                                    value="{{ old('vision_heading', $data->getTranslation('heading5','en')) }}" >
                                <x-input-error name='vision_heading' />
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Arabic Vision Heading</label>
                                <input type="text" name="ar_vision_heading" dir="rtl" class="form-control"
                                    value="{{ old('ar_vision_heading', $data->getTranslation('heading5', 'ar')) }}" >
                                <x-input-error name='ar_vision_heading' />
                            </div>

                            <div class="form-group position-relative error-l-50">
                                <label>Vision Content</label>
                                <textarea class="form-control" id="engContent" name="vision_content" rows="2">{{ old('vision_content', $data->getTranslation('content5','en')) }}</textarea>
                                <x-input-error name='vision_content' />
                            </div>
                            <div class="form-group position-relative error-l-50">
                                <label>Arabic Vision Content</label>
                                <textarea class="form-control" id="arContent" dir="rtl" name="ar_vision_content" rows="2">{{  old('ar_vision_content', $data->getTranslation('content5', 'ar')) }}</textarea>
                                <x-input-error name='ar_vision_content' />
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Vision Image</label>
                                <div class="input-group mb-3">
                                    <div class="custom-file">
                                        <input name="vision_image" class="img" type="file" class="custom-file-input"
                                            id="image5" accept="image/*">
                                        <label class="custom-file-label" for="image5">Choose
                                            file</label>
                                    </div>
                                </div>
                                <x-input-error name='vision_image' />
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Current Vision Image</label>
                                <img class="img-custom form-control" src="{{ $data->getImage2() }}" alt="">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Mission Heading</label>
                                <input type="text" name="mission_heading" class="form-control"
                                    value="{{ old('mission_heading', $data->getTranslation('heading6','en')) }}" >
                                <x-input-error name='mission_heading' />
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Arabic Mission Heading</label>
                                <input type="text" name="ar_mission_heading" dir="rtl" class="form-control"
                                    value="{{ old('ar_mission_heading', $data->getTranslation('heading6', 'ar')) }}" >
                                <x-input-error name='ar_mission_heading' />
                            </div>

                            <div class="form-group position-relative error-l-50">
                                <label>Mission Content</label>
                                <textarea class="form-control" id="engContent" name="mission_content" rows="2">{{ old('mission_content', $data->getTranslation('content6','en')) }}</textarea>
                                <x-input-error name='mission_content' />
                            </div>
                            <div class="form-group position-relative error-l-50">
                                <label>Arabic Mission Content</label>
                                <textarea class="form-control" id="arContent" dir="rtl" name="ar_mission_content" rows="2">{{ old('ar_mission_content', $data->getTranslation('content6', 'ar')) }}</textarea>
                                <x-input-error name='ar_mission_content' />
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Mission Image</label>
                                <div class="input-group mb-3">
                                    <div class="custom-file">
                                        <input name="mission_image" class="img" type="file" class="custom-file-input"
                                            id="image6" accept="image/*">
                                        <label class="custom-file-label" for="image6">Choose
                                            file</label>
                                    </div>
                                </div>
                                <x-input-error name='mission_image' />
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Current Mission Image</label>
                                <img class="img-custom form-control" src="{{ $data->getImage3() }}" alt="">
                            </div>

                            @include('admin.common.seo_form')

                            <button type="submit" class="btn btn-primary mb-0">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@push('header')
    <link rel="stylesheet" href="{{ adminAsset('css/vendor/select2.min.css') }}" />
    <link rel="stylesheet" href="{{ adminAsset('css/vendor/select2-bootstrap.min.css') }}" />
    <style>
        .img-custom{
            width: 350px !important;
            height: 200px !important;
        }
    </style>
@endpush
@push('footer')
    <script src="{{ adminAsset('js/vendor/select2.full.js') }}"></script>

    <script>
        $('.img').on('change', function() {
            var text = 'Choose file';

            if (this.files[0]) {
                text = this.files[0].name
            }
            console.log($(this));
            $(this).siblings('label').text(text)
        });

    </script>



    <script src="{{ adminAsset('js/tinymce/tinymce.min.js') }}"></script>
    <x-tiny-script :editors="[
        ['id' => '#engDescription', 'dir' => 'ltr'],
        ['id' => '#arDescription', 'dir' => 'rtl'],
        ['id' => '#engContent', 'dir' => 'ltr'],
        ['id' => '#arContent', 'dir' => 'rtl'],


        ['id' => '#engSubDescription', 'dir' => 'ltr'],
        ['id' => '#arSubDescription', 'dir' => 'rtl'],

    ]" />
@endpush
