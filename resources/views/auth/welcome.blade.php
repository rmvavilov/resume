<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <h2>Здравствуйте, {{ $first_name }} {{ $last_name }}!</h2>

        <div>
            Вы успешно зарегистрировались на сайте {{ URL::to('/') }}
        </div>

    </body>
</html>