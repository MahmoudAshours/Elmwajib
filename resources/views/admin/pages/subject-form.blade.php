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
                    <form action="{{route('admin.subjects.store' , $subject?:'')}}" method="post"
                          enctype="multipart/form-data">
                        @csrf

                        {{-- Thubmnail --}}
                        <div class="mb-10">
                            <label for="thumbnail" class="form-label">{{__('Thumbnail')}}</label>
                            <x-upload-thumbnail :url="$subject?->thumbnail_url"></x-upload-thumbnail>
                        </div>

                        {{-- Title --}}
                        <div class="mb-10">
                            <label for="title" class="form-label">{{__('Title')}}</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                                   id="title"
                                   value="{{$subject?->title ?? old('title')}}">

                            @error('title')
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
