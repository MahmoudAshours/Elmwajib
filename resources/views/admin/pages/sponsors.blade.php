@extends('admin.layout' , ['title' => __('Sponsors')])

@section('content')
    <div class="row justify-content-center">
        <div class="col-12 w-100">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        {{__('Sponsors')}}
                    </div>
                    <div class="card-toolbar">
                        <a href="{{route('admin.sponsors.form')}}" class="btn btn-primary">
                            {{__('Add Sponsor')}}
                            <i class="fas fa-plus ms-2"></i>
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <x-datatable>
                        <thead>
                        <tr class="fw-bolder fs-6 text-gray-800 px-7">
                            <th>#</th>
                            <th>{{__('Thumbnail')}}</th>
                            <th>{{__('Name')}}</th>
                            <th>{{__('Options')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($sponsors as $sponsor)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>
                                    <div class="symbol symbol-50px">
                                        <img src="{{$sponsor->thumbnail_url}}" alt="">
                                    </div>
                                </td>
                                <td>{{$sponsor->name}}</td>
                                <td>
                                    <div class="d-flex gap-5 align-items-center">

                                        {{-- Edit --}}
                                        <a href="{{route('admin.sponsors.form' , $sponsor)}}"
                                           class="btn btn-success btn-sm">
                                            {{__('Edit')}}
                                        </a>

                                        {{-- Delete --}}
                                        <a data-bs-toggle="modal" data-bs-target="#confirm-modal"
                                           data-url="{{route('admin.sponsors.delete' , $sponsor)}}"
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
