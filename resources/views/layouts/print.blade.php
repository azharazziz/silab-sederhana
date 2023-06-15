<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Print</title>
    <style>
        .header, .header-space,
        .footer, .footer-space {
        height: 100px;
        }
        .header {
        position: fixed;
        top: 0;
        }
        .footer {
        position: fixed;
        bottom: 0;
        }
    </style>
    @yield('style')

</head>
{{-- <body onload="window.print()"> --}}
<body>
    {{ $slot }}
</body>
</html>
