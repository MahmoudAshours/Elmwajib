@extends('front.layout')

@section('content')
    <div class="container mt-50 height-vh">
        <livewire:front.search/>
    </div>
@endsection


@push("styles")
    <style>
        form{
            width: 100%;
            height: 60px;
        }

        .input-search{
            width: 92%;
            border-radius: 0 10rem 10rem 0;
            font-size: 1.5rem;
            font-weight: bold;
        }

        .btn-search{
            width: 15%;
            border-radius: 10rem 0 0 10rem;
            cursor: pointer;
            background: #1683c5;

        }

        .btn-search i{
            color: #FFF;
            font-size: 1.3rem;
        }

        .mt-50{
            margin-top: 50px;
        }

        .height-vh{
            min-height: 60vh;
        }

        @media (max-width: 992px) {
            .btn-search{
                width: 20%;
                border-radius: 10rem 0 0 10rem;
                cursor: pointer;
            }
        }

    </style>
@endpush
