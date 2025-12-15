@extends('auth.layout')

@section('auth_content')
    <form class="form w-100" action="{{route('authenticate')}}" method="post">
        @csrf
        <div class="text-center mb-10">
            <h1 class="text-dark mb-3">{{__('Login')}}</h1>
        </div>

        @if(Session::has('success-rest-password'))
            <p class="alert alert-success fs-4">{{ Session::get('success-rest-password') }}</p>
        @endif

        {{-- Email --}}
        <div class="fv-row mb-10">
            <label class="form-label fs-6 fw-bolder text-dark">{{__('Email')}}</label>
            <input class="form-control form-control-lg form-control-solid" type="text" name="email"
                   value="{{old('email')}}"/>
            @error('email')
            <span class="text-danger">
                {{$message}}
            </span>
            @enderror
        </div>

        {{-- Password --}}
        <div class="fv-row mb-10">
            <div class="d-flex flex-stack mb-2">
                <label class="form-label fw-bolder text-dark fs-6 mb-0">{{__('Password')}}</label>
                <a href="{{route("password.request")}}" class="link-primary fs-6 fw-bolder">{{__('Forgot Password ?')}}</a>
            </div>
            <input class="form-control form-control-lg form-control-solid" type="password" name="password"/>

            @error('password')
            <span class="text-danger">
                {{$message}}
            </span>
            @enderror
        </div>

        {{-- Submit --}}
        <div class="text-center">
            <button type="submit" class="btn btn-lg btn-primary w-100 mb-5">
                <span class="indicator-label">{{__('Login')}}</span>
            </button>
        </div>

        {{-- Register --}}
        <div class="mt-5">
            <span class="fs-6">{{__('You don\'t have account ?')}}</span>
            <a href="{{route('register')}}" class="link-success fs-6 fw-bolder ms-1">{{__('Register Now')}}</a>
        </div>
    </form>
@endsection
