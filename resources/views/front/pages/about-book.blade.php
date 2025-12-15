@extends('front.layout')

@section('content')
    {{-- About Book --}}
    <div class="mb-n10 mb-lg-n20 mt-10">
        <div class="container">
            <div class="text-center mb-17 w-100 d-flex justify-content-center align-items-center flex-column">

                <h3 class="fs-2hx text-dark mb-5" data-kt-scroll-offset="{default: 100, lg: 150}">
                    {{__('About Book')}}
                </h3>
                <div class="fs-1 fw-bold w-50 mt-3 justify-text w-100 lh-lg">
                    <p>الحمد لله رب العالمين، وصلى الله وسلم على نبينا محمد ، وبعد.</p>
                    <p>فالله تعالى هو رب العالمين، وهو خالق كل شيء؛ له ملك السموات والأرض وما بينهما، وله الأسماء
                        الحسنى، هو العلي العظيم، سبحانه.</p>
                    <p>والله تعالى خلقنا لعبادته، قال تعالى: { وَمَا خَلَقْتُ الْجِنَّ وَالْإِنسَ إِلَّا لِيَعْبُدُونِ}
                        [سورة الذاريات&nbsp; (56)]، وأمرنا بطاعته وطاعة رسوله -صلى الله عليه وسلم-، قال تعالى:
                        {وَأَطِيعُوا اللَّهَ وَأَطِيعُوا الرَّسُولَ} [التغابن 12].</p>
                    <p>وقد أرسل الله تعالى ملائكته بكتبه على رسله، وفيها شرعه وأوامره، وأخبر بالحساب عليها في اليوم
                        الآخر الذي لا يوم أعظم منه، فإما جنة لمن أطاع أمره، وإما نار لمن عصاه، وقدر في ذلك المقادير
                        العظيمة: ولهذا كان من أهم الأعمال على الإطلاق: العلم بما يأمر به الله سبحانه، لنعبده بما
                        أمر.</p>
                    <p>ولما كانت هذه الشريعة تشمل مصالح الدين والدنيا : كانت واسعة لا يستطيع أن يتعلمها الإنسان مرة
                        واحدة، ولما كان فيها المهم والأهم، وفيها الواجب والمستحب، كان من الواجب تقديم الواجب، لأن في
                        العلم به والعمل به نجاة الدنيا والآخرة.</p>
                    <p>وقد قال الرسول صلى الله عليه وسلم: (مَن يُرِدِ اللهُ به خيراً يُفَقِّهْهُ في الدِّينِ) [رواه
                        البخاري : 71]، قال العلماء: "فقه هذا الحديث أن من لم يرد الله به خيرا لم يفقه في الدين".</p>
                    <p>وبين يديك كتاب علم يجمع أهم العلم الواجب بأدلته، يقدمه بطريقة ميسرة، تصلح للتعلم والتعليم، وبالله
                        تعالى التوفيق.</p>
                </div>
            </div>
            <div class="row w-100 gy-10 mb-20 mt-10">
                <div class="text-center mb-17">
                    <h3 class="fs-2hx text-dark mb-5" data-kt-scroll-offset="{default: 100, lg: 150}">
                        {{__('Best way to learn this book')}}
                    </h3>
                </div>

                <div class="col-md-4 px-5">
                    <div class="text-center mb-10 mb-md-0">
                        <img src="{{asset('template/assets/media/illustrations/process-2.png')}}" class="mh-125px mb-9"
                             alt=""/>
                        <div class="d-flex flex-center mb-5">
                            <span class="badge badge-circle badge-light-success fw-bolder p-5 ms-3 fs-3">1</span>
                            <div class="fs-5 fs-lg-3 fw-bolder text-dark ms-2">
                                الإخلاص لله تعالى
                            </div>
                        </div>

                        <div class="fw-bold fs-6 fs-lg-4 text-muted">
                            وحسن النية بأنه يريد تعلّم دينه ، وليس القصد منها مجرد التمتع العلمي أو الظهور بمظهر العالم
                            ، أو نيل المكاسب الدنيوية .
                        </div>
                    </div>
                </div>


                <div class="col-md-4 px-5">
                    <div class="text-center mb-10 mb-md-0">
                        <img src="{{asset('template/assets/media/illustrations/process-3.png')}}" class="mh-125px mb-9"
                             alt=""/>
                        <div class="d-flex flex-center mb-5">
                            <span class="badge badge-circle badge-light-success fw-bolder p-5 ms-3 fs-3">2</span>
                            <div class="fs-5 fs-lg-3 fw-bolder text-dark ms-2">
                                الاستعانة بالله تعالى
                            </div>
                        </div>

                        <div class="fw-bold fs-6 fs-lg-4 text-muted">
                            بأن يعينه على التعلّم والعمل ، دون الفخر بقدرات النفس .
                        </div>
                    </div>
                </div>

                <div class="col-md-4 px-5">
                    <div class="text-center mb-10 mb-md-0">
                        <img src="template/assets/media/illustrations/process-4.png" class="mh-125px mb-9" alt=""/>
                        <div class="d-flex flex-center mb-5">
                            <span class="badge badge-circle badge-light-success fw-bolder p-5 ms-3 fs-3">3</span>
                            <div class="fs-5 fs-lg-3 fw-bolder text-dark ms-2">
                                التواضع لله تعالى
                            </div>
                        </div>
                        <div class="fw-bold fs-6 fs-lg-4 text-muted">
                            قبول الحق ممن جاء به وممن علّمه ، دون النظر إلى كونه أقل منه منصبًا أو عمرًا أو ذكاءً أو غير
                            ذلك .
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

   <x-not-logged-in></x-not-logged-in>

@endsection
