<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('title', 'Conference EMS')</title>
        <!-- ===== CSS ===== -->
        <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
        
        <!-- ===== BOX ICONS ===== -->
        <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>

        <title>Responsive Login Form Sign In Sign Up</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
        
    <body>
        
        <x-header />
        
        <main>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
            {{ $slot }}
        </main>
        
        <x-footer />

    </body>
</html>
