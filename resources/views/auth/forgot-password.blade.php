@extends('auth.layout')

@section('auth_content')
    <form class="form w-100" action="{{route('password.email')}}" method="POST">
        @csrf
        <div class="text-center mb-10">
            <h4 class="text-dark mb-5">{{__('did you forget your password ?')}}</h4>
            <h2>{{__("Enter your email registered on the platform")}}</h2>
        </div>
        {{-- Email --}}
        <div class="fv-row mb-10">
            <input class="form-control form-control-lg form-control-solid" placeholder="user@example.com" type="email" name="email" value="{{old('email')}}"/>
            @error('email')
                <span class="text-danger">
                    {{$message}}
                </span>
            @enderror
        </div>

        {{-- Submit --}}
        <div class="text-center">
            <button type="submit" class="btn btn-lg btn-primary w-100 mb-5">
                <span class="indicator-label">{{__('Password Reset')}}</span>
            </button>
        </div>

    </form>
@endsection
