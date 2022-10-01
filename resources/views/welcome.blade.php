<!DOCTYPE html>
<html lang="en" dir="rtl">
    {{-- <html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl"> --}}
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Misk</title>
        @vite(['resources/css/app.css' , 'public/assets/smooth-eocjs-news-ticker/eocjs-newsticker.css'])
    </head>

    <body class="antialiased">
        <div id="app">
            <app-component></app-component>
        </div>
        @vite(['resources/js/app.js' , 'public/assets/smooth-eocjs-news-ticker/eocjs-newsticker.js'])
    </body>
</html>
