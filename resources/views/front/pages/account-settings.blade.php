@extends('front.pages.profile-layout')

@section('profile_content')
    <div class="card mb-5 mb-xl-10 shadow-sm">
        <div class="card-header border-0 cursor-pointer">
            <div class="card-title m-0">
                <h3 class="fw-bolder m-0">{{__('Reset Password')}}</h3>
            </div>
        </div>

        <div class="card-body border-top p-9">

            {{-- Reset Password --}}
            <div class="d-flex flex-wrap align-items-center mb-10">
                <form class="form" action="{{route('users.update_password')}}" method="post">
                    @csrf
                    <div class="row mb-1">

                        {{-- Current Password --}}
                        <div class="col-12 mb-8">
                            <label for="current_password"
                                   class="form-label fs-6 fw-bolder mb-3">
                                {{__('Current Password')}}
                            </label>
                            <input type="password"
                                   class="form-control form-control-lg form-control-solid"
                                   name="current_password" id="current_password"/>

                            @error('current_password')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        {{-- New Password --}}
                        <div class="col-12 mb-8">
                            <label for="password" class="form-label fs-6 fw-bolder mb-3">
                                {{__('New Password')}}
                            </label>
                            <input type="password"
                                   class="form-control form-control-lg form-control-solid"
                                   name="password" id="password"/>
                            @error('password')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        {{-- Confirm Password --}}
                        <div class="col-12 mb-8">
                            <label for="password_confirmation"
                                   class="form-label fs-6 fw-bolder mb-3">
                                {{__('Confirm New Password')}}
                            </label>
                            <input type="password"
                                   class="form-control form-control-lg form-control-solid"
                                   name="password_confirmation" id="password_confirmation"/>
                        </div>

                    </div>

                    <div class="d-flex">
                        <button type="submit" class="btn btn-primary me-2 px-6">
                            {{__('Update Password')}}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
