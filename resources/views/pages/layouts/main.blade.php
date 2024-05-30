<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PNS Management | {{ $title }}</title>
    @include('utils.tailwind.link')
</head>
<body class="overflow-x-hidden">
    @include('pages.dashboard.partials.notifications')
    @yield('content')
    @include('utils.notification.script')
    @yield('additional_scripts')
</body>
</html>