<div class="table-responsive">
    <table class="table table-borderless table-striped gy-5 gs-7 border rounded datatable">
        {{$slot}}
    </table>
</div>

@push('scripts')
    <script>
        $(document).ready(function () {
            $(".datatable").DataTable({
                "language": {
                    "url": "{{asset('template/assets/plugins/custom/datatables/ar.json')}}"
                },
                "dom":
                    "<'row'" +
                    "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
                    "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
                    ">" +

                    "<'table-responsive'tr>" +

                    "<'row'" +
                    "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
                    "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
                    ">"
            });
        });
    </script>
@endpush
