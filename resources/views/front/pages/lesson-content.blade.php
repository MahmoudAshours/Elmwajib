@extends('front.layout')

@section('content')
    @livewire("front.lesson-content",["lesson" => $lesson])
@endsection

@push("styles")
    <style>
        .thumbnail_img {
            height: 120px;
            width: 120px;
            border-radius: 50%;
        }
    </style>
@endpush


@push("scripts")
    <script>
        $(function () {
            let lesson_title = $(".lesson-title");
            let title_and_description_of_content = $(".header_title ,.description");

            setTimeout(() => {
                title_and_description_of_content.removeClass("fade-in");
                lesson_title.removeClass("fade-in");
            }, 1000);

            Livewire.hook('message.processed', (message, component) => {
                $(".next-btn,.prev-btn,.next-lesson-btn").click(function () {
                    title_and_description_of_content.addClass("fade-in");
                    title_and_description_of_content.removeClass("fade-in");

                    if($(this).hasClass("next-lesson-btn"))
                    {
                        lesson_title.addClass("fade-in");
                        lesson_title.removeClass("fade-in");
                    }
                });

            });
        });
    </script>
@endpush
