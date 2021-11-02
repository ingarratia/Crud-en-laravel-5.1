<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ url('/css/semantic.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ url('/css/semantic.min.js') }}">

    <style type="text/css">
        body>.ui.container {
            margin-top: 3em;
        }

        .ui.container>h1 {
            font-size: 3em;
            text-align: center;
            font-weight: normal;
        }

        .ui.container>h2.dividing.header {
            font-size: 2em;
            font-weight: normal;
            margin: 4em 0em 3em;
        }


        .ui.table {
            table-layout: fixed;
        }
    </style>
    <title>@yield('title')</title>
</head>

<body>

    @yield('contenido')

    <script>
        function back() {
            window.location = '/empleado';
        }
    </script>

</body>

</html>