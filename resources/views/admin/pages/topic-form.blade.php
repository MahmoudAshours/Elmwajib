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
                    <form action="{{route('admin.topics.store' , $topic?:'')}}" method="post"
                          enctype="multipart/form-data">
                        @csrf

                        {{-- Thubmnail --}}
                        <div class="mb-10">
                            <label for="thumbnail" class="form-label">{{__('Thumbnail')}}</label>
                            <x-upload-thumbnail :url="$topic?->thumbnail_url"></x-upload-thumbnail>
                        </div>

                        {{-- Title --}}
                        <div class="mb-5">
                            <label for="title" class="form-label">{{__('Title')}}</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                                   id="title"
                                   value="{{$topic?->title ?? old('title')}}">

                            @error('title')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        {{-- Subject --}}
                        <div class="mb-3">
                            <label for="subject_id" class="form-label">{{__('Subject')}}</label>
                            <select class="form-select @error('subject_id') is-invalid @enderror" name="subject_id"
                                    id="subject_id" data-control="select2"
                                    data-placeholder="{{__('Select an subject')}}">
                                <option></option>
                                @forelse($subjects as $subject)
                                    <option
                                        value="{{$subject->id}}" {{$subject->id == $topic?->subject_id ? 'selected' :''}}> {{$subject->title}}</option>
                                @empty
                                    <option value="" disabled>{{__('There is no subjects')}}</option>
                                @endforelse
                            </select>

                            @error('subject_id')
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
