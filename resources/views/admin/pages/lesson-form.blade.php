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
                    <form action="{{route('admin.lessons.store' , $lesson?:'')}}" method="post" enctype="multipart/form-data">
                        @csrf

                        {{-- Thubmnail --}}
                        <div class="mb-10">
                            <label for="thumbnail" class="form-label">{{__('Thumbnail')}}</label>
                            <x-upload-thumbnail :url="$lesson?->thumbnail_url"></x-upload-thumbnail>
                        </div>

                        {{-- Title --}}
                        <div class="mb-10">
                            <label for="title" class="form-label">{{__('Title')}}</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" value="{{$lesson?->title ?? old('title')}}">

                            @error('title')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        {{-- Summary --}}
                        <div class="mb-10">
                            <label for="summary" class="form-label">{{__('Lesson Summary')}}</label>
                            <x-editor id="summary">{!! $lesson?->summary ?? old('summary') !!}</x-editor>

                            @error('summary')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        {{-- Examples of Evidence --}}
                        <div class="mb-10">
                            <label for="examples_of_evidence" class="form-label">{{__('Lesson Examples of Evidence')}}</label>
                            <x-editor id="examples_of_evidence"> {!! $lesson?->examples_of_evidence ?? old('examples_of_evidence') !!} </x-editor>

                            @error('examples_of_evidence')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        {{-- Explanation --}}
                        <div class="mb-10">
                            <label for="explanation" class="form-label">{{__('Lesson Explanation')}}</label>
                            <x-editor id="explanation"> {!! $lesson?->explanation ?? old('explanation') !!} </x-editor>

                            @error('explanation')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        {{-- Activities --}}
                        <div class="mb-10">
                            <label for="activities" class="form-label">{{__('Lesson Activities')}}</label>
                            <x-editor id="activities"> {!! $lesson?->activities ?? old('activities') !!} </x-editor>

                            @error('activities')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        {{-- Topic --}}
                        <div class="mb-10">
                            <label for="topic_id" class="form-label">{{__('Topic')}}</label>
                            <select class="form-select @error('topic_id') is-invalid @enderror" name="topic_id" id="topic_id" data-control="select2" data-placeholder="{{__('Select an topic')}}">
                                <option></option>
                                @forelse($topics as $topic)
                                    <option value="{{$topic->id}}" {{$topic->id == $lesson?->topic_id ? 'selected' :''}}> {{$topic->title}}</option>
                                @empty
                                    <option value="" disabled>{{__('There is no topics')}}</option>
                                @endforelse
                            </select>

                            @error('topic_id')
                            <span class="text-danger d-block">{{$message}}</span>
                            @enderror
                        </div>

                        {{-- Parent --}}
                        <div class="mb-10">
                            <label for="parent_id" class="form-label">{{__('Lesson Parent')}}</label>
                            <select class="form-select @error('parent_id') is-invalid @enderror" name="parent_id" id="parent_id" data-control="select2">
                                <option value="" selected>{{__('Without Parent Lesson')}}</option>
                                @forelse($lessons as $l)
                                    <option value="{{$l->id}}" {{$l->id == $lesson?->parent_id ? 'selected' :''}}> {{$l->title}}</option>
                                @empty
                                    <option value="" disabled>{{__('There is no lessons')}}</option>
                                @endforelse
                            </select>

                            @error('parent_id')
                            <span class="text-danger d-block">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="mb-10">
                            <label for="learning_islam_url" class="form-label">{{__('learning_islam_url')}}</label>
                            <input type="text" placeholder="https://learningislam.com/lesson/50" class="form-control @error('learning_islam_url') is-invalid @enderror" name="learning_islam_url" id="learning_islam_url"
                                   value="{{$lesson?->learning_islam_url ?? old('learning_islam_url')}}">

                            @error('learning_islam_url')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="mb-10">
                            <label for="pdf" class="form-label">{{__('Pdf')}}</label>
                            <input accept="application/pdf" type="file" class="form-control @error('pdf') is-invalid @enderror" name="pdf" id="pdf">

                            @error('pdf')
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
