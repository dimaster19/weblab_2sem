<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>Import Export Excel & CSV to Database in Laravel 7</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

</head>

<body class="antialiased">




    <div id="app">
        <drop-zone />
    </div>


        <form action="{{ route('file-import') }}" method="post" name="form" enctype="multipart/form-data">
        @csrf

                <input type="file" name="file"  onchange='fileValidation()' accept=".xlsx" id="file">

                <input type="submit" value="Войти" />
        </form>


<!--
    <form action="{{ route('file-import') }}" id="loginForm" method="post">
        @csrf
            <input type="text" name='login' id="login" placeholder="Логин" /><br><br>
            <input type="text" name="password"  id="password" placeholder="Пароль" /><br><br>
            <input type="submit" value="Войти" />
        </form> -->

    <script src="{{mix('js/app.js') }} "></script>
    <!-- <script type="text/javascript">
        $('.mybutton').on('click', function(e) {
            e.preventDefault();
            console.log('nice2');
            $.ajax({
                url: "{{ route('file-import') }}",
                type: 'POST',
                success: function(res) {
                    console.log(res);

                },
                error: function() {
                    alert('Error3223');
                }
            });
        });
    </script> -->



    <script>
        function fileValidation() {
            var fileInput =
                document.getElementsById('file');

            var filePath = fileInput.value;
            console.log(filePath)
            // Allowing file type
            var allowedExtensions =
                /(\.xlsx)$/i;

            if (!allowedExtensions.exec(filePath)) {
                document.getElementsByClassName('modal')[0].style.display = "block"
                fileInput.value = '';
                return false;
            } else console.log('nice');

        }
    </script>
</body>

</html>
