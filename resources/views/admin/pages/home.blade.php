@extends('layouts.admin.app', ['body_class' => 'nav-md', 'title' => 'Home Page Contents'])
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1>Home Page Contents</h1>
                <div class="separator mb-5"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-8 offset-2">

                <x-status />

                <div class="card mb-4">
                    <div class="card-body">
                        <form method="POST"
                            action="{{ route('admin.page.store-home', [
                                'page_name' => 'home',
                            ]) }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Main Title</label>
                                <input type="text" name="main_title" class="form-control"
                                    value="{{ old('main_title', $data->getTranslation('title','en')) }}" >
                                <x-input-error name='main_title' />
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Arabic Main Title</label>
                                <input type="text" name="ar_main_title" dir="rtl" class="form-control"
                                    value="{{ old('ar_main_title', $data->getTranslation('title', 'ar')) }}" >
                                <x-input-error name='ar_main_title' />
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Video Link</label>
                                <input type="text" name="video_link" class="form-control"
                                    value="{{ old('video_link', $data->video_link) }}" >
                                <x-input-error name='video_link' />
                            </div>

                            <div class="form-group">
                                <h4>About Company Section</h4>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Title</label>
                                <input type="text" name="about_title" class="form-control"
                                    value="{{ old('about_title', $data->getTranslation('sub_title','en')) }}" >
                                <x-input-error name='about_title' />
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Arabic Title</label>
                                <input type="text" name="ar_about_title" dir="rtl" class="form-control"
                                    value="{{ old('ar_about_title', $data->getTranslation('sub_title', 'ar')) }}" >
                                <x-input-error name='ar_about_title' />
                            </div>

                            <div class="form-group position-relative error-l-50">
                                <label>Description</label>
                                <textarea class="form-control" id="engDescription" name="about_description" rows="2">{{ old('about_description', $data->getTranslation('description','en')) }}</textarea>
                                <x-input-error name='about_description' />
                            </div>
                            <div class="form-group position-relative error-l-50">
                                <label>Arabic Description</label>
                                <textarea class="form-control" id="arDescription" dir="rtl" name="ar_about_description" rows="2">{{ old('ar_about_description', $data->getTranslation('description', 'ar')) }}</textarea>
                                <x-input-error name='ar_about_description' />
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Background Text</label>
                                <input type="text" name="background_text" class="form-control"
                                    value="{{ old('background_text', $data->getTranslation('heading1','en')) }}" >
                                <x-input-error name='background_text' />
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Arabic Background Text</label>
                                <input type="text" name="ar_background_text" dir="rtl" class="form-control"
                                    value="{{  old('ar_background_text', $data->getTranslation('heading1', 'ar')) }}" >
                                <x-input-error name='ar_background_text' />
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Image <span class="text-info">(Please upload an image with size less than 500 KB and dimensions 450x400 pixels)</span></label>
                                <div class="input-group mb-3">
                                    <div class="custom-file">
                                        <input name="about_image" class="img" type="file" class="custom-file-input"
                                            id="image1" accept="image/*">
                                        <label class="custom-file-label" for="image1">Choose
                                            file</label>
                                    </div>
                                </div>
                                <x-input-error name='about_image' />
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Current Image</label>
                                <img class="img-custom form-control" src="{{ $data->getImage1('image1') }}" alt="">
                            </div>

                            <div class="form-group">
                                <h4>Why Choose Us Section</h4>
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
                                <textarea class="form-control" id="engContent" name="choose_content" rows="2">{{ old('choose_content', $data->getTranslation('content2','en')) }}</textarea>
                                <x-input-error name='choose_content' />
                            </div>
                            <div class="form-group position-relative error-l-50">
                                <label>Arabic Description</label>
                                <textarea class="form-control" id="arContent" dir="rtl" name="ar_choose_content" rows="2">{{ old('ar_choose_content', $data->getTranslation('content2', 'ar')) }}</textarea>
                                <x-input-error name='ar_choose_content' />
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Image <span class="text-info">(Please upload an image with size less than 500 KB and dimensions 450x400 pixels)</span></label>
                                <div class="input-group mb-3">
                                    <div class="custom-file">
                                        <input name="main_image" class="img" type="file" class="custom-file-input"
                                            id="image2" accept="image/*">
                                        <label class="custom-file-label" for="image2">Choose
                                            file</label>
                                    </div>
                                </div>
                                <x-input-error name='main_image' />
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Current Image</label>
                                <img class="img-custom form-control" src="{{ $data->getImage2('image2') }}" alt="">
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


        ['id' => '#engContent2', 'dir' => 'ltr'],
        ['id' => '#arContent2', 'dir' => 'rtl'],

        ['id' => '#engContent3', 'dir' => 'ltr'],
        ['id' => '#arContent3', 'dir' => 'rtl'],

        ['id' => '#engContent4', 'dir' => 'ltr'],
        ['id' => '#arContent4', 'dir' => 'rtl'],

    ]" />
@endpush
