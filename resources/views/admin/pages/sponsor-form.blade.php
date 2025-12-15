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
                    <form action="{{route('admin.sponsors.store' , $sponsor?:'')}}" method="post"
                          enctype="multipart/form-data">
                        @csrf

                        {{-- Thubmnail --}}
                        <div class="mb-10">
                            <label for="thumbnail" class="form-label">{{__('Thumbnail')}}</label>
                            <x-upload-thumbnail :url="$sponsor?->thumbnail_url"></x-upload-thumbnail>
                        </div>

                        {{-- Name --}}
                        <div class="mb-10">
                            <label for="name" class="form-label">{{__('Name')}}</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                   id="name"
                                   value="{{$sponsor?->name ?? old('name')}}">

                            @error('name')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        {{-- Url --}}
                        <div class="mb-10">
                            <label for="url" class="form-label">{{__('Url')}}</label>
                            <input type="text" class="form-control @error('url') is-invalid @enderror" name="url"
                                   id="url"
                                   value="{{$sponsor?->url ?? old('url')}}">

                            @error('url')
                            <span class="text-danger">{{$message}}</span>
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
