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




    <div id="app">
        @csrf

        <drop-zone />
    </div>
    <div class="container mt-5 text-center">
        <form action="{{ route('file-import') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group mb-4" style="max-width: 500px; margin: 0 auto;">
                <div class="custom-file text-left">
                    <input type="file" name="file" class="custom-file-input" accept=".xlsx" id="customFile">
                    <label class="custom-file-label" for="customFile">Choose file</label>
                </div>
            </div>
            <button class="btn btn-primary mybutton">Import data</button>
        </form>
    </div>
    <script src="{{mix('js/app.js') }} "></script>
<script type="text/javascript">
    //  var parent = document.getElementsByClassName('dropzone__message dropzone__message--style dropzone-clickable');
    // console.log(parent)
    //  parent.innerHTML = `@crsf
    // `;



    $('.mybutton').on('click', function(e) {
        e.preventDefault();



        $.ajax({
            url: 'file-import',
            type: 'POST',
            data: {},
            dataType: 'json',
            success: function(res) {
                if (res.code == 'ok') {
                    showCartCount(res.answer);

                } else {
                    alert(res.answer);
                }
            },
            error: function() {
                alert('Error');
            }
        });
    });
</script>

</body>

</html>
