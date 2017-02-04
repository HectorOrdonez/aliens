<!DOCTYPE html>
<html lang="en">
<head>
    @section('meta')
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    @show

    @section('criticalcss')
    @show

    @section('css')
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
        <style>
            input {
                /*background-color: transparent;*/
                /*color: white;*/
            }
            button {
                border: none;
                background-color: transparent !important;
                cursor: pointer;
            }
        </style>
    @show
</head>
<body>
<header>
    @section('header')
        @include ('includes/nav')
    @show
</header>
<main>
    @section('main')

    @show
</main>
<footer>
    @section('footer')

    @show

    @section('js')
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
                $('.menu button').click(function(){
                    $('nav').slideToggle();
                });
            });
        </script>
    @show
</footer>
</body>
</html>