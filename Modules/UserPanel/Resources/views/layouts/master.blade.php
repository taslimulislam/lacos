<!doctype html>
<html lang="en">

    @php
        $assetsurl = asset('public/frontend');
    @endphp
    <!--begin::Head-->
    <head>
        <meta charset="utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{@$websetup->title}}</title>
        <link rel="shortcut icon" href="{{ ($websetup->favicon) ? url('/public/storage/'.$websetup->favicon) : url('avatar.png') }}">
        
        <!--begin::Fonts-->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
        <!--end::Fonts-->
        <!--begin::Global Stylesheets Bundle(used by all pages)-->
        <link href="{{$assetsurl}}/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
        <link href="{{$assetsurl}}/assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
        <link href="{{$assetsurl}}/style.css" rel="stylesheet" type="text/css"/>
        <!--end::Global Stylesheets Bundle-->
        @stack('css')

        
        <script src="{{$assetsurl}}/assets/plugins/global/plugins.bundle.js"></script>
        <script src="{{$assetsurl}}/assets/js/scripts.bundle.js"></script>

    </head>
    <!--end::Head-->


    <!--begin::Body-->
    <body id="kt_body" style="background-image: url({{$assetsurl}}/assets/media/patterns/header-bg.png)"  data-bs-spy="scroll"
        data-bs-target="#kt_landing_menu" data-bs-offset="200" class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled">

        <!--begin::Main-->
        <div class="d-flex flex-column flex-root">
            @yield('content')
        </div>

        <!--end::Main-->
        @include('frontend.layouts.footer')
        <!--begin::Javascript-->

        @stack('js')
        
        
        <script>

            var i = 1;
            $(document).on("click", "#add_row", function() {
                var $new_row = $(`
                                    <tr>
                                        <td>
                                            <input type="text" class="form-control"  name="document_title[]" id="document_title_` + i + `" placeholder="" value="" required>
                                        </td>
                                        <td>
                                            <input type="file" class="form-control" onchange="validatedDoc(` + i + `)" name="document_upload[]" id="document_upload_` + i + `" placeholder="" value="" required>
                                        </td>
                                        <td>
                                            <button type="button" id="remove_row" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                        </td>
                                    </tr>
                                `);

                $("#document_table").append($new_row);
                i++;
            });
            $("#document_table").on('click', '#remove_row', function() {
                $(this).closest('tr').remove();
                i--;
            });


                // for date
                $("#kt_datepicker_10").flatpickr();

                // for time
                $("#kt_datepicker_8").flatpickr({
                    enableTime: true,
                    noCalendar: true,
                    dateFormat: "H:i",
                });

                // for date range
                $(".datePic").flatpickr({
                    altInput: true,
                    altFormat: "F j, Y",
                    dateFormat: "Y-m-d",
                    startDate: new Date()
                });

        </script>

        <script src="{{ asset('public/assets/ajax_form_submission.js') }}"></script>


    </body>

</html>
