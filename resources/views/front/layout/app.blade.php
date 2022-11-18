<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		
        <meta name="description" content="">
        <title>Hotel Website</title>        
		
        <link rel="icon" type="image/png" href="{{asset('uploads/favicon.png')}}">

        @include('front.layout.styles')
        @include('front.layout.scripts')

        <link href="https://fonts.googleapis.com/css2?family=Karla:wght@400;500&display=swap" rel="stylesheet">
        
        <!-- Google Analytics -->
        <!-- <script async src="https://www.googletagmanager.com/gtag/js?id=UA-84213520-6"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
            gtag('config', 'UA-84213520-6');
        </script> -->

    </head>
    <body>
        
    @include('front.layout.top')
    @include('front.layout.nav')

    @yield('main_content')

    @include('front.layout.footer')
    @include('front.layout.scripts_footer')

    @if(session()->get('error'))
    <script>
        iziToast.error({
        title: '',
        position: 'topRight',
        message: '{{ session()->get('error')}}',
        });
    </script>
    @endif

    @if(session()->get('success'))
    <script>
        iziToast.success({
        title: '',
        position: 'topRight',
        message: '{{ session()->get('success')}}',
        });
    </script>
    @endif
		
   </body>
</html>