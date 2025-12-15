<div class="mt-3">
    <textarea id="{{$id}}" name="{{$id}}" class="tox-target editor">
        {{$slot}}
    </textarea>
</div>

@once
    @push('scripts')
        <script>
            tinymce.init({
                selector: ".editor",
                menubar: false,
                plugins: [
                    'directionality',
                    'image',
                    'advlist autolink lists link charmap print preview anchor',
                    'searchreplace visualblocks code fullscreen',
                    'insertdatetime media table paste list {{-- imagetools --}} wordcount'
                ],

                directionality: "rtl",
                language: 'ar',
                language_url: '/template/assets/plugins/custom/tinymce/ar.js',
                resize: 'both',
                toolbar: "undo redo| image | styleselect | fontselect | bold italic | alignleft aligncenter alignright alignjustify | outdent indent | numlist bullist",
                font_formats: "JannaRegular=JannaRegular;Cairo=cairo, sans-serif;Lemonada=lemonada, cursive;Tajawal=tajawal, sans-serif;Noto Kufi Arabic='noto kufi arabic', sans-serif;",
                content_style:"body { font-family: JannaRegular; }",
                images_upload_url: '{{route('admin.lessons.images.upload', ['_token' => csrf_token()])}}',
                images_upload_base_path: '/storage/',
            });
        </script>
    @endpush
@endonce
