@extends('front.layout')

@section('content')
    {{-- Contact Us --}}
    <div class="z-index-2 mt-10">
        <div class="container">
            <form class="form mt-10 w-sm-100 w-md-75 w-lg-50  mx-auto" method="POST"
                  action="{{route('contact.store')}}">
                @csrf
                <div class="text-center mb-10">
                    <h1 class="text-dark mb-3">{{__('Contact Us')}}</h1>
                </div>

                {{-- Title --}}
                <div class="fv-row mb-10">
                    <label class="form-label fs-6 fw-bolder text-dark">{{__('Title')}}</label>
                    <input class="form-control form-control-lg form-control-solid" type="text" name="title"
                           autocomplete="off" value="{{old('title')}}"/>
                    @error('title')
                    <span class="text-danger">
                        {{$message}}
                    </span>
                    @enderror
                </div>

                {{-- Message --}}
                <div class="fv-row mb-10">
                    <label for="message" class="form-label fs-6 fw-bolder text-dark">{{__('Message')}}</label>

                    <textarea name="message" id="message" class="form-control form-control-lg form-control-solid"
                              rows="5" autocomplete="off">{{old('message')}}</textarea>

                    @error('message')
                    <span class="text-danger">
                        {{$message}}
                    </span>
                    @enderror
                </div>

                @guest
                    {{-- Email --}}
                    <div class="fv-row mb-10">
                        <label class="form-label fs-6 fw-bolder text-dark">{{__('Email')}}</label>
                        <input class="form-control form-control-lg form-control-solid" type="text" name="email"
                               autocomplete="off" value="{{old('email')}}"/>
                        @error('email')
                        <span class="text-danger">
                            {{$message}}
                        </span>
                        @enderror
                    </div>
                @endguest

                <div class="fv-row mb-10">

                    <label class="form-label fs-6 text-dark">رمز التحقق</label>

                    <div class="d-flex gap-3">

                        <div class="d-flex gap-0">
                            <button type="button" class="btn btn-sm btn-primary" id="reload-captcha">
                                <i class="fas fa-arrows-rotate fs-5"></i>
                            </button>
                            <img src="{{captcha_src()}}" class="rounded-end" alt="code"/>
                        </div>

                        <input class="form-control form-control-lg form-control-solid" type="text" name="captcha"
                               autocomplete="off" placeholder="الرجاء ادخال رمز التحقق"/>
                    </div>

                    @error('captcha')
                    <span class="text-danger">
                        {{$message}}
                    </span>
                    @enderror

                </div>

                {{-- Submit --}}
                <div class="text-center">
                    <button type="submit" class="btn btn-lg btn-primary w-100 mb-5">
                        <span class="indicator-label fw-bolder fs-3">{{__('Send')}}</span>
                    </button>
                </div>
            </form>

        </div>
    </div>

    <x-not-logged-in></x-not-logged-in>

@endsection

@push("scripts")
    <script>
        $('#reload-captcha').click(function () {
            $.get('{{route('contact.reload-captcha')}}', function (data) {
                $("#reload-captcha+img").attr("src", data.captcha);
            });
        });
    </script>
@endpush
