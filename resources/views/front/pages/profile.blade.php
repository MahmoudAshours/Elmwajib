@extends('front.pages.profile-layout')

@section('profile_content')
    <div class="card mb-5 mb-xl-10 shadow-sm">

        <div class="card-header border-0 cursor-pointer">
            <div class="card-title m-0">
                <h3 class="fw-bolder m-0">{{__('Profile')}}</h3>
            </div>

        </div>
        <form class="form" action="{{route('users.update_profile')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card-body border-top p-9">

                {{-- Thumbnail --}}
                <div class="row mb-6">
                    <label class="col-lg-2 col-form-label fw-bold fs-6">{{__('Profile Photo')}}</label>
                    <div class="col-lg-10">
                        <x-upload-thumbnail :url="$user?->thumbnail_url"></x-upload-thumbnail>
                    </div>
                </div>

                {{-- Name --}}
                <div class="row mb-6">
                    <label class="col-lg-2 col-form-label required fw-bold fs-6">{{__('Name')}}</label>
                    <div class="col-lg-10">
                        <input type="text" name="name" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" value="{{$user->name}}" />
                        @error('name')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>

                {{-- Email --}}
                <div class="row mb-6">
                    <label class="col-lg-2 col-form-label required fw-bold fs-6">{{__('Email')}}</label>
                    <div class="col-lg-10">
                        <input type="email" name="email" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0 text-start" value="{{$user->email}}" />
                        @error('email')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>

                {{-- Gender --}}
                <div class="row mb-6">
                    <label class="col-lg-2 col-form-label required fw-bold fs-6">{{__('Gender')}}</label>
                    <div class="col-lg-10">
                        <select name="gender" data-control="select2" data-placeholder="{{__('Select gender')}}" class="form-select form-select-solid form-select-lg fw-bold">
                            <option></option>

                            @foreach($genders as $gender)
                                <option value="{{$gender}}" {{$user->gender === $gender ? 'selected' : ''}}>{{__(ucfirst($gender))}}</option>
                            @endforeach
                        </select>
                        @error('gender')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>

                {{-- Country --}}
                <div class="row mb-6">
                    <label class="col-lg-2 col-form-label fw-bold fs-6">
                        {{__('Country')}}
                    </label>

                    <div class="col-lg-10 fv-row">
                        <select id="country"
                                name="country"
                                aria-label="{{__('Select a country')}}"
                                data-control="select2"
                                data-placeholder="{{__('Select a country')}}"
                                class="form-select form-select-solid form-select-lg fw-bold">
                            <option></option>
                            @foreach($countries as $country)
                                <option value="{{$country->code}}" {{$user->country == $country->code ? 'selected' : ''}}>{{$country->name}}</option>
                            @endforeach
                        </select>

                        @error('country')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="card-footer d-flex justify-content-end py-6 px-9">
                <button type="submit" class="btn btn-primary">
                    {{__('Save Changes')}}
                </button>
            </div>
        </form>
    </div>
@endsection
