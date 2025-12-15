@extends('auth.layout')

@section('auth_content')
    <form class="form w-100" action="{{route('registerUser')}}" method="post">
        @csrf
        <div class="text-center mb-10">
            <h1 class="text-dark mb-3">{{__('Register')}}</h1>
        </div>


        {{-- Name --}}
        <div class="fv-row mb-10">
            <label class="form-label fs-6 fw-bolder text-dark">{{__('Name')}}</label>
            <input class="form-control form-control-lg form-control-solid" type="text" name="name"
                   autocomplete="off" value="{{old('name')}}"/>
            @error('name')
            <span class="text-danger">
                {{$message}}
            </span>
            @enderror
        </div>

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


        {{-- Password --}}
        <div class="fv-row mb-10">
            <label class="form-label fw-bolder text-dark fs-6">{{__('Password')}}</label>
            <input class="form-control form-control-lg form-control-solid" type="password" name="password"
                   autocomplete="off"/>

            @error('password')
            <span class="text-danger">
                {{$message}}
            </span>
            @enderror
        </div>

        {{-- Password Confirmation --}}
        <div class="fv-row mb-10">
            <label class="form-label fw-bolder text-dark fs-6">{{__('Password Confirmation')}}</label>
            <input class="form-control form-control-lg form-control-solid" type="password" name="password_confirmation"
                   autocomplete="off"/>

            @error('password_confirmation')
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

        {{-- Login --}}
        <div class="mt-5">
            <span class="fs-6">{{__('You already have account ?')}}</span>
            <a href="{{route('login')}}" class="link-success fs-6 fw-bolder ms-1">{{__('Login')}}</a>
        </div>
    </form>
@endsection
