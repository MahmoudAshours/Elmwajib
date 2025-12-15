<script src="{{asset('template/assets/plugins/global/plugins.bundle.js')}}"></script>
<script src="{{asset('template/assets/js/scripts.bundle.js')}}"></script>
<script src="{{asset('template/assets/plugins/custom/fslightbox/fslightbox.bundle.js')}}"></script>
<script src="{{asset('template/assets/plugins/custom/typedjs/typedjs.bundle.js')}}"></script>
<script src="{{asset('template/assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
<script src="{{asset('template/assets/plugins/custom/sweetalert/sweetalert.min.js')}}"></script>
<script src="{{asset('template/assets/plugins/custom/tinymce/tinymce.bundle.js')}}"></script>
{{--<script src="{{asset('template/assets/plugins/custom/formrepeater/formrepeater.bundle.js')}}"></script>--}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.2/min/tiny-slider.js"></script>

<script src="{{mix('js/app.js')}}"></script>

<script>
    $('[data-bs-target="#confirm-modal"]').on('click', (e) => {
        let route = e.target.getAttribute('data-url');
        $('#confirm-model-route').attr('href', route);
    });
</script>
<script async src="https://www.googletagmanager.com/gtag/js?id=G-RZFL740N79"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-RZFL740N79');
</script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-239090699-1"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-239090699-1');
</script>
@livewireScripts
@include('sweetalert::alert')
@stack('scripts')

