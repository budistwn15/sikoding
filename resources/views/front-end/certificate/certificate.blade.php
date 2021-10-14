<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <title>Certificate</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
        *{
            margin:0;
            padding: 0;
        }
        body{
            background-image: url('img/logo/bg-serti.png');
            background-size: cover;
            background-repeat: no-repeat;
            font-family: 'Montserrat', sans-serif;
        }
    </style>
  </head>
  <body>

    <div class="container">
        <div class="row text-center">
            <h1 style="margin: 215px 0 30px 0;font-weight:300;line-height:1.2;font-size: 50px;">{{ $certificate->name_certificate }}</h1>
        </div>
        <div class="row text-center">
            <p>Telah menyelesaikan dengan sangat baik kelas
                <br>
                <span class="font-weight-bold-bold mt-5">{{ $certificate->course_certificate }}</span>
                <br>
                <small class="text-secondary">{{ $certificate->created_at }} - {{ $certificate->certificate_code }}</small>
            </p>
        </div>
        <div class="row">
            <div class="col-md-4 py-2">
                <img src="{{ public_path('img/logo/ttd.png') }}" alt="">
                <p class="font-weight-bold">Budi Setiawan</p>
                <p class="text-muted">CEO SiKoding</p>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
  </body>
</html>
