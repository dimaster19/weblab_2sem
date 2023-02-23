<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Import Export Excel & CSV to Database in Laravel 7</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

</head>

<body class="antialiased">




    <div id="app" style="display: flex; margin: 20px auto; width: 80%">

        <signup  />
    </div>


    <!-- <form method="post" action="/signup">
        @csrf
        <div class="form-group">
            <input type="text" class="form-control" name="name" placeholder="Имя, Фамилия" required maxlength="255" value="">
        </div>
        <div class="form-group">
            <input type="email" class="form-control" name="email" placeholder="Адрес почты" required maxlength="255" value="">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="password" placeholder="Придумайте пароль" required maxlength="255" minlength="8" value="">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="password_confirmation" placeholder="Пароль еще раз" minlength="8" required maxlength="255" value="">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-info text-white">Регистрация</button>
        </div>
    </form> -->
    <script src="{{mix('js/app.js') }} "></script>

</body>

</html>
