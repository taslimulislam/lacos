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

        @if (@$post->meta_title!='')
        <meta name="description" content="{{@$post->meta_description}}">
        <meta name="keywords" content="{{@$post->meta_title}}">
        @else
        <meta name="description" content="{{$websetup->metadescription}}">
        <meta name="keywords" content="{{$websetup->metatag}}">
        @endif
    
        <meta name="author" content="{{$websetup->title}}">
        <title>{{$websetup->title}}</title>

        <link rel="shortcut icon" href="{{ ($websetup->favicon) ? url('/public/storage/'.$websetup->favicon) : url('avatar.png') }}">
        <!--begin::Fonts-->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
        <!--end::Fonts-->
        <!--begin::Global Stylesheets Bundle(used by all pages)-->
        <link href="{{$assetsurl}}/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
        <link href="{{$assetsurl}}/assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
        <link href="{{$assetsurl}}/assets/css/semantic.min.css" rel="stylesheet" type="text/css"/>
        <link href="{{$assetsurl}}/style.css" rel="stylesheet" type="text/css"/>
        <!--end::Global Stylesheets Bundle-->

        @stack('css')
        <!-- Google Tag Manager -->
        
        <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
            new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
            })(window,document,'script','dataLayer','GTM-MBBFL46');</script>
            <!-- End Google Tag Manager -->

        <style>
            #chartdiv1 {
                width: 100%;
                height: 500px;
            }
        </style>
        
    </head>
    <!--end::Head-->


    
    <body id="kt_body" style="background-image: url({{$assetsurl}}/assets/media/patterns/header-bg.jpg)" data-bs-spy="scroll" data-bs-target="#kt_landing_menu" data-bs-offset="200" class="bg-white position-relative">


        <!--begin::Main-->
        <div class="d-flex flex-column flex-root">
            @yield('content')
        </div>
        <!--end::Main-->

        @include('frontend.layouts.footer')

        <!--begin::Javascript-->
        <!--begin::Global Javascript Bundle(used by all pages)-->
        <script src="{{$assetsurl}}/assets/plugins/global/plugins.bundle.js"></script>
        <script src="{{$assetsurl}}/assets/js/scripts.bundle.js"></script>
        <!--end::Global Javascript Bundle-->
        <script src="{{$assetsurl}}/assets/js/semantic.min.js"></script>
        
        <script src="{{ asset('public/assets/ajax_form_submission.js') }}"></script>

        @stack('js')

        <script>

    

            $(document).ready(function() { 
            
                $('#kt_user_follow_button').on('click','#followUp', function(e) {
                    e.preventDefault();
                    var submit_url = $(this).attr('data-follow-route');

                    $.ajax({
                        type: 'GET',
                        url: submit_url,
                        data: {"_token": "{{ csrf_token() }}"},
                        dataType: 'json',
                        success: function(response) {
                            if(response.success==true) {
                                toastr.success(response.message, response.title);
                            }else if(response.success=='exist'){
                                toastr.warning(response.message, response.title);
                            }else{
                                toastr.error(response.message, response.title);
                            }
                            location.reload();
                        },
                        error: function() {
                        }
                    });
                    
                });


                $('#addToFavorite').on('click', function(e) {
                    e.preventDefault();
                    var submit_url = $(this).attr('data-favorite-route');

                        $.ajax({
                            type: 'GET',
                            url: submit_url,
                            data: {"_token": "{{ csrf_token() }}"},
                            dataType: 'json',
                            success: function(response) {
                                if(response.success==true) {
                                    toastr.success(response.message, response.title);
                                }else if(response.success=='exist'){
                                    toastr.warning(response.message, response.title);
                                }else{
                                    toastr.error(response.message, response.title);
                                }
                                location.reload();
                            },
                            error: function() {
                            }
                        });
                    
                });



            });
            
        </script>

        
        <script>
            $('.ui.dropdown')
                .dropdown({
                    allowAdditions: true
                });
        </script>


        <!-- Google Tag Manager (noscript) -->
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MBBFL46"
            height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
            <!-- End Google Tag Manager (noscript) -->

        <!-- Google tag (gtag.js) -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-B4GX13RSG7"></script>

        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
            gtag('config', 'G-B4GX13RSG7');
        </script>

<script>
    $('.reset').click(function(e) {
        e.preventDefault();
        $('.filterarea').find('select').val('').trigger('change') ;
    });
</script>

    </body>
    <!--end::Body-->

</html>