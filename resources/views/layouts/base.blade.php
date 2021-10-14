<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title','SiKoding')</title>
    <link rel="icon" href="{{ asset('img/logo/logo.png') }}">
    {{-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <link href="https://vjs.zencdn.net/7.11.4/video-js.css" rel="stylesheet">

    <style>
        .text-blue{
            color:#4674B5;
        }
    </style>


</head>
<body class="bg-white">
            @yield('body')

            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
            {{-- <script src="{{ asset('js/app.js') }}"></script> --}}
            <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
            <script type="text/javascript">
                $(document).ready(function () {
                    $('#summernote').summernote({
                        height: 450,
                    });
                });

            </script>
            <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
            <script src="https://vjs.zencdn.net/7.11.4/video.min.js"></script>
</body>
</html>
