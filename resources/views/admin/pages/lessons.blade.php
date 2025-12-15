@extends('admin.layout' , ['title' => __('Lessons')])

@section('content')
    <div class="row justify-content-center">
        <div class="col-12 w-100">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        {{__('Lessons')}}
                    </div>
                    <div class="card-toolbar">
                        <a href="{{route('admin.lessons.form')}}" class="btn btn-primary">
                            {{__('Add Lesson')}}
                            <i class="fas fa-plus ms-2"></i>
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <x-datatable>
                        <thead>
                        <tr class="fw-bolder fs-6 text-gray-800 px-7">
                            <th>#</th>
                            <th>{{__('Title')}}</th>
                            <th>{{__('Number of Questions')}}</th>
                            <th>{{__('Options')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($lessons as $lesson)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$lesson->title}}</td>
                                <td>{{$lesson->questions_count}}</td>
                                <td>
                                    <div class="d-flex gap-5 align-items-center">

                                        {{-- Preview --}}
                                        <a href="{{route('lessons.show' , $lesson)}}"
                                           class="btn btn-primary btn-sm" target="_blank">
                                            <i class="fas fa-eye"></i>
                                            {{__('Show')}}
                                        </a>

                                        {{-- Edit --}}
                                        <a href="{{route('admin.lessons.form' , $lesson)}}"
                                           class="btn btn-success btn-sm">
                                            <i class="fas fa-edit"></i>
                                            {{__('Edit')}}
                                        </a>

                                        {{-- Delete --}}
                                        <a data-bs-toggle="modal" data-bs-target="#confirm-modal"
                                           data-url="{{route('admin.lessons.delete' , $lesson)}}"
                                           class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash"></i>
                                            {{__('Delete')}}
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </x-datatable>
                </div>
            </div>
        </div>
    </div>
@endsection

