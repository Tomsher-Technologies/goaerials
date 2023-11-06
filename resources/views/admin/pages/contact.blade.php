@extends('layouts.admin.app', ['body_class' => 'nav-md', 'title' => 'Contact Us Page Contents'])
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1>Contact Us Page Contents</h1>
                <div class="separator mb-5"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-8 offset-2">

                <x-status />

                <div class="card mb-4">
                    <div class="card-body">
                        <form method="POST"
                            action="{{ route('admin.page.store-contact', [
                                'page_name' => 'contact',
                            ]) }}"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <h4>Address Section</h4>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Address Title</label>
                                <input type="text" name="title" class="form-control"
                                    value="{{ old('title', $data->getTranslation('title','en') ?? '') }}" >
                                <x-input-error name='title' />
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Arabic Address Title</label>
                                <input type="text" name="ar_title" dir="rtl" class="form-control"
                                    value="{{ old('ar_title', $data->getTranslation('title', 'ar')) }}" >
                                <x-input-error name='ar_title' />
                            </div>

                            @if(isset($address[0]))
                                @foreach($address as $key => $add)
                                    @php $i = $key+1; @endphp
                                    <div class="form-group">
                                        <h6><u>Address {{$i}}</u></h6>
                                        <input type="hidden" name="address[{{$i}}][add_id]" class="form-control"
                                            value="{{ $add->id  }}" >
                                        <input type="hidden" name="address[{{$i}}][img]" class="form-control"
                                            value="{{ $add->image  }}" >
                                    </div>

                                    <div class="form-group">
                                        <label for="placeTitle1">Place Name</label>
                                        <input type="text" name="address[{{$i}}][place_name]" class="form-control"
                                            value="{{ old('place_name')[$key] ??  ($add->place_name ?? '') }}" >
                                       
                                    </div>
                                    <div class="form-group">
                                        <label for="placeTitle1">Arabic Place Name</label>
                                        <input type="text" name="address[{{$i}}][ar_place_name]" class="form-control" dir="rtl" 
                                            value="{{ old('ar_place_name')[$key] ??  ($add->ar_place_name ?? '') }}" >
                                       
                                    </div>

                                    <div class="form-group">
                                        <label for="companyTitle1">Company Name</label>
                                        <input type="text" name="address[{{$i}}][company_name]" class="form-control"
                                            value="{{ old('company_name')[$key] ??  ($add->company_name ?? '') }}" >
                                       
                                    </div>
                                    <div class="form-group">
                                        <label for="companyTitle1">Arabic Company Name</label>
                                        <input type="text" name="address[{{$i}}][ar_company_name]" class="form-control" dir="rtl" 
                                            value="{{ old('ar_company_name')[$key] ??  ( $add->ar_company_name ?? '') }}" >
                                       
                                    </div>

                                    <div class="form-group">
                                        <label for="AddressTitle1">Address</label>
                                        <textarea name="address[{{$i}}][address]" class="form-control" rows="3">{{ old('address')[$key] ??  ( $add->address ?? '') }}</textarea>
                                        
                                    </div>

                                    <div class="form-group">
                                        <label for="companyTitle1">Arabic Address</label>
                                        <textarea name="address[{{$i}}][ar_address]" class="form-control" rows="3" dir="rtl" > {{ old('ar_address')[$key] ??  ( $add->ar_address ?? '') }} </textarea>
                                      
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email Address</label>
                                        <input class="form-control" type="email" name="address[{{$i}}][email]" id="email_{{$i}}" value="{{ old('email')[$key] ??  ($add->email ?? '' )}}">
                                        
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Phone Number <span class="text-info">(To add multiple numbers, enter the number with '/' symbol)</span></label>
                                        <input class="form-control" type="text" name='address[{{$i}}][phone]' value="{{ old('phone')[$key] ??  ($add->phone ?? '') }}">
                                      
                                    </div>

                                    @if($key != 1)
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Image <span class="text-info">(Please upload an image with size less than 500 KB and dimensions 1920x1080 pixels)</span></label>
                                            <div class="input-group mb-3">
                                                <div class="custom-file">
                                                    <input  name='address[{{$i}}][image]' class="img" type="file" class="custom-file-input"
                                                        id="image{{$key}}" accept="image/*">
                                                    <label class="custom-file-label" for="image{{$key}}">Choose
                                                        file</label>
                                                </div>
                                            </div>
                                            <x-input-error name='image' />
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Current Image</label>
                                            <img class="img-custom form-control" src="{{ $add->getImage() }}" alt="">
                                        </div>
                                    @endif

                                @endforeach
                            @endif

                            <div class="form-group">
                                <h4>Contact Form Section</h4>
                            </div>
                          
                            <div class="form-group">
                                <label for="exampleInputEmail1"> Form Heading</label>
                                <input type="text" name="heading" class="form-control"
                                    value="{{ old('heading', $data->getTranslation('heading1','en')) }}" >
                                <x-input-error name='heading' />
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Arabic Form Heading</label>
                                <input type="text" name="ar_heading" dir="rtl" class="form-control"
                                    value="{{ old('ar_heading', $data->getTranslation('heading1', 'ar')) }}" >
                                <x-input-error name='ar_heading' />
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1"> Map Heading</label>
                                <input type="text" name="map_heading" class="form-control"
                                    value="{{ old('map_heading', $data->getTranslation('heading2','en')) }}" >
                                <x-input-error name='map_heading' />
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Arabic Map Heading</label>
                                <input type="text" name="ar_map_heading" dir="rtl" class="form-control"
                                    value="{{ old('ar_map_heading', $data->getTranslation('heading2', 'ar')) }}" >
                                <x-input-error name='ar_map_heading' />
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
        ['id' => '#engContent1', 'dir' => 'ltr'],
        ['id' => '#arContent1', 'dir' => 'rtl'],
        ['id' => '#engContent', 'dir' => 'ltr'],
        ['id' => '#arContent', 'dir' => 'rtl'],


    ]" />
@endpush
