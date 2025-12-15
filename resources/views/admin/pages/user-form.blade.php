@extends('admin.layout')

@section('content')
    <div class="row justify-content-center">
        <div class="col-12 w-100">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        {{$title}}
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('admin.users.store' , $user??'')}}" method="post">
                        @csrf

                        {{-- Name --}}
                        <div class="mb-10">
                            <label for="name" class="form-label">{{__('Name')}}</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                   id="name"
                                   value="{{$user?->name ?? old('name')}}">

                            @error('name')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        {{-- Email --}}
                        <div class="mb-10">
                            <label for="email" class="form-label">{{__('Email')}}</label>
                            <input type="email" class="form-control text-start @error('email') is-invalid @enderror"
                                   name="email"
                                   id="email"
                                   value="{{$user?->email ?? old('email')}}">

                            @error('email')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        {{-- Password --}}
                        <div class="mb-10">
                            <label for="password" class="form-label">{{__('Password')}}</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                   name="password"
                                   id="password">

                            @error('password')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        {{-- Role --}}
                        <div class="mb-10">
                            <label for="role" class="form-label">{{__('Role')}}</label>
                            <select class="form-select @error('role') is-invalid @enderror" name="role"
                                    id="role" data-control="select2"
                                    data-placeholder="{{__('Select an role')}}">
                                <option></option>
                                @foreach($roles as $role)
                                    <option
                                        value="{{$role->name}}" {{ $user?->hasRole($role->name) ? 'selected' :''}}> {{__($role->name)}}</option>
                                @endforeach
                            </select>

                            @error('role')
                            <span class="text-danger d-block">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="text-center mt-10">
                            <button type="submit" class="btn btn-primary">
                                {{__('Save')}}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
