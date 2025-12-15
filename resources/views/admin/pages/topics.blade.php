@extends('admin.layout' , ['title' => __('Topics')])

@section('content')
    <div class="row justify-content-center">
        <div class="col-12 w-100">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        {{__('Topics')}}
                    </div>
                    <div class="card-toolbar">
                        <a href="{{route('admin.topics.form')}}" class="btn btn-primary">
                            {{__('Add Topic')}}
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
                            <th>{{__('Number of lessons')}}</th>
                            <th>{{__('Options')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($topics as $topic)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$topic->title}}</td>
                                <td>{{$topic->lessons_count}}</td>
                                <td>
                                    <div class="d-flex gap-5 align-items-center">

                                        {{-- Edit --}}
                                        <a href="{{route('admin.topics.form' , $topic)}}"
                                           class="btn btn-success btn-sm">
                                            {{__('Edit')}}
                                        </a>

                                        {{-- Delete --}}
                                        <a data-bs-toggle="modal" data-bs-target="#confirm-modal"
                                           data-url="{{route('admin.topics.delete' , $topic)}}"
                                           class="btn btn-danger btn-sm">
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
