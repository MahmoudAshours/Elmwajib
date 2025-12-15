<div class="d-flex flex-column flex-center w-100 min-h-350px min-h-lg-500px px-9 landing-dark-bg faz-bg-image">

    <div class="text-center mb-5 mb-lg-10 py-10 py-lg-20 d-flex flex-column justify-content-center align-items-center width-responsive">
        <img src="{{asset('assets/book-title.svg?v=2')}}" class="w-lg-600px w-md-600px w-325px mb-10 mt-20" alt="">
        <h1 class="text-white mb-20">{{__('Beta')}}</h1>
        {{-- Search Input --}}

        <form id="search-form" action="{{route("search.lessons")}}" method="GET" class="d-flex flex-column flex-md-row">
            <div class="mb-5 w-100 w-md-25 width-select-responsive">
                <select class="form-select form-select-solid form-select-lg mb-3 custom-border" name="topic" aria-label=".form-select-lg example">
                    <option disabled selected>اختر موضوع ..</option>
                    @foreach($topics as $topic)
                        <option value="{{$topic->id}}">{{$topic->title}}</option>
                    @endforeach
                </select>
            </div>

            <div class="input-group has-validation mb-20 mb-5 width-input-responsive">
                <input type="text" name="input_search_query" class="form-control form-control-solid  input-search custom-border" id="search-form" placeholder="البحث في الدروس">
                <button class="input-group-text  btn-search d-flex justify-content-center align-items-center">
                    <i class="fa fa-search"></i>
                </button>
            </div>
        </form>


        <div class="d-flex gap-10 justify-content-center align-items-center mt-20 margin-sm-top p-5">
            <a href="{{route('subjects.index')}}" class="btn btn-primary">{{__('Start Learning')}}
                <i class="fas fa-graduation-cap fs-4 ms-2"></i>
            </a>
            <a href="{{route('download')}}" class="btn btn-danger">{{__('Download Book')}}
                <i class="fas fa-download fs-4 ms-2"></i>
            </a>
        </div>
    </div>
</div>

<div class="landing-curve landing-dark-color mb-10">
    <svg viewBox="15 12 1470 48" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M0 11C3.93573 11.3356 7.85984 11.6689 11.7725 12H1488.16C1492.1 11.6689 1496.04 11.3356 1500 11V12H1488.16C913.668 60.3476 586.282 60.6117 11.7725 12H0V11Z"
              fill="currentColor"></path>
    </svg>
</div>

@push("styles")
    <style>
        form {
            width: 100%;
            height: 60px;
        }

        select.form-select-lg {
            border-radius: 0 5px 5px 0 !important;
            border-left: 2px solid #1683c5;
        }

        input[name="input_search_query"] {
            border-radius: 0 !important;
        }

        .input-search {
            width: 90%;
            border-radius: 0 5px 5px 0;
        }

        .input-search, select {
            height: 50px !important;
        }

        .btn-search {
            width: 10%;
            border-radius: 5px 0 0 5px;
            background: #1683c5;
        }

        .btn-search i {
            color: #FFF;
            font-size: 1.5rem;
        }

        @media (min-width: 300px)  and (max-width: 767px) {
            .btn-search {
                width: 20%;
                cursor: pointer;
            }

            select.form-select-lg{
                border-radius: 5px !important;
            }

            input[name="input_search_query"] {
                border-radius: 0 5px 5px 0  !important;
            }

            .btn-search {
                border-radius: 5px 0 0 5px !important;
            }

            .width-responsive{
                width: 100%;
            }

            .margin-sm-top{
                margin-top: 7rem !important;
            }
        }

        @media (min-width: 768px) {
            .width-select-responsive {
                width: 100% !important;
            }

            .width-input-responsive {
                width: 100% !important;
            }

            .width-responsive{
                width: 85%;
            }

            .btn-search{
                width: 15%;
            }
        }

        @media (min-width: 992px) {
            .width-select-responsive {
                width: 25% !important;
            }

            .width-input-responsive {
                width: 75% !important;
            }

            .width-responsive{
                width: 60%;
            }

            .btn-search{
                width: 10%;
            }
        }

    </style>
@endpush

@push("scripts")
    <script>
        $(function () {

            $('.input-search').keyup(function () {
                let value_of_search = ($(this).val()).trim();
                if (value_of_search.length > 0) {
                    $('.btn-search').removeAttr("disabled");
                } else {
                    $('.btn-search').attr('disabled', 'disabled');
                }
            }).trigger('keyup');
        });
    </script>
@endpush
