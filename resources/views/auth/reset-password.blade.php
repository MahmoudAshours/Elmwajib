@extends('auth.layout')

@section('auth_content')
    <form class="form w-100" action="{{route('password.update')}}" method="POST">
        @csrf
        <input type="hidden" value="{{$token}}" name="token" >
        <input class="form-control form-control-lg form-control-solid" type="hidden" placeholder="{{__('Email')}}" name="email"
               value="{{request()->query("email")}}"/>

        <div class="text-center mb-10">
            <h2>{{__("Password Reset")}}</h2>
        </div>


        @if($errors->any())
            <div class="alert alert-danger my-2">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Password --}}
        <div class="fv-row mb-10">
            <input class="form-control form-control-lg form-control-solid" placeholder="{{__('New Password')}}" type="password" name="password"/>
            @error('password')
            <span class="text-danger">
                {{$message}}
            </span>
            @enderror
        </div>

        {{-- Confirm Password --}}
        <div class="fv-row mb-10">
            <input class="form-control form-control-lg form-control-solid"  placeholder="{{__('Confirm New Password')}}" type="password" name="password_confirmation"/>

            @error('password')
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
