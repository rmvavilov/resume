<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <h2>{{ trans('app.register_email.greeting') }}{{ $first_name }} {{ $last_name }}!</h2>

        <div>
            {{ trans('app.register_email.msg') }}{{ URL::to('/') }}
        </div>

    </body>
</html>