<div id="jssor_1" class="position-relative my-0 mx-auto top-0 end-0 w-100 h-250px overflow-hidden">
    <div data-u="slides" class="d-flex gap-20 w-100"
         style="cursor:default;position:relative;top:0px;left:0px;height:250px;overflow:hidden;">
        @foreach($sponsors as $sponsor)
            @if($sponsor->url)
                <a href="{{$sponsor->url}}" target="_blank">
                    <img data-u="image" class="object-contain" src="{{$sponsor->thumbnail_url}}"/>
                </a>
            @else
                <div>
                    <img data-u="image" class="object-contain" src="{{$sponsor->thumbnail_url}}"/>
                </div>
            @endif
        @endforeach
    </div>
</div>

@push('scripts')
    <script src="{{asset('template/assets/plugins/custom/logo-slider/js/jssor.slider-28.1.0.min.js')}}"
            type="text/javascript"></script>
    <script type="text/javascript">
        window.jssor_1_slider_init = function () {

            var jssor_1_options = {
                $AutoPlay: 1,
                $Idle: 0,
                $SlideDuration: 5000,
                $SlideEasing: $Jease$.$Linear,
                $PauseOnHover: 4,
                $SlideWidth: 250,
                $SlideHeight: 150,
                $SlideSpacing: 100,
                $Align: 0
            };

            var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

            /*#region responsive code begin*/

            var MAX_WIDTH = 2000;

            function ScaleSlider() {
                var containerElement = jssor_1_slider.$Elmt.parentNode;
                var containerWidth = containerElement.clientWidth;

                if (containerWidth) {

                    var expectedWidth = Math.min(MAX_WIDTH || containerWidth, containerWidth);

                    jssor_1_slider.$ScaleWidth(expectedWidth);
                } else {
                    window.setTimeout(ScaleSlider, 30);
                }
            }

            ScaleSlider();

            $Jssor$.$AddEvent(window, "load", ScaleSlider);
            $Jssor$.$AddEvent(window, "resize", ScaleSlider);
            $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
        };
    </script>
    <script type="text/javascript">
        jssor_1_slider_init();
    </script>
@endpush
