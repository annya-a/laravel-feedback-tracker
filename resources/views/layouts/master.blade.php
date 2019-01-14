<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Laravel Feedback</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
</head>

<body>

<!-- Navigation -->
@include('layouts.partials.navigation')

<!-- Main Content -->
<div class="container">
    @yield('layouts.master.content')
</div>

<hr>

<!-- Footer -->
@include('layouts.partials.footer')

<!-- Bootstrap core JavaScript -->
<script src="{{ mix('/js/app.js') }}"></script>

</body>

</html>
