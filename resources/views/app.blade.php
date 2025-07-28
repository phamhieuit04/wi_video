<!DOCTYPE html>
<html lang="en" class="dark">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>{{ env('APP_NAME') }}</title>
        <link
            rel="stylesheet"
            href="{{ asset('assets/fontawesome/css/all.css') }}"
        />
        <script src="https://cdn.jsdelivr.net/npm/iconify-icon@3.0.0/dist/iconify-icon.min.js"></script>
        @vite(['resources/js/app.js', 'resources/css/app.css'])
    </head>
    <body>
        <div id="app"></div>
    </body>
</html>
