<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @include('utils.tailwind.link')
</head>
    <body class="flex justify-center items-center h-screen w-screen bg-red-500">
        <p class="tracking-[7px] font-light text-white text-4xl uppercase">403 | Anda tidak memiliki izin untuk mengakses</p>
    </body>
</html>