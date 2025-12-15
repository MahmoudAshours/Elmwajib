@extends('front.layout')

@section('content')
    {{-- About Book --}}
    <div class="mb-n10 mb-lg-n20 mt-10 p-20">
        <div class="container">
            <div class="text-center mb-17 w-100 d-flex justify-content-center align-items-center flex-column">

                <h3 class="fs-2hx text-dark mb-5" data-kt-scroll-offset="{default: 100, lg: 150}">
                    {{__('About Faz')}}
                </h3>
                <div class="fs-1 fw-bold w-50 mt-3 justify-text w-100 lh-lg">
                    <p>مشروع علميٌّ تعليميٌّ في «العلم الواجب» مما لا يسع المسلمَ جهلُه.
                        يسعى إلى بيان مفهومه، وأهميته، ويقدم الدراسات حوله، ويقرب تعليمه عبر متون، وأسئلة، وأنشطة، ومقررات تعليمية تجمع ما بين أسلوب المتن العلمي، والأساليب التعليمية الحديثة، كما يساعد المعتنين به بأهم استراتيجياته، والإرشاد لمبادراته.
                    </p>
                    <p>يشرف على المشروع حالياً مركز فاز للاستشارات، ويتشارك فيه مع ذوي الاهتمام.</p>
                </div>
            </div>


        </div>
    </div>

    <x-not-logged-in></x-not-logged-in>

@endsection
