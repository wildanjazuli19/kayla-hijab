<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Kayla Hijab Admin</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">

    <style>

        body{
            font-family: 'Inter', sans-serif;
            background: #F8F9FA;
        }

        .font-display{
            font-family: 'Playfair Display', serif;
        }

    </style>

</head>

<body class="min-h-screen">

<div class="flex">

    {{-- SIDEBAR --}}
    @include('admin.partials.sidebar')

    {{-- CONTENT --}}
    <div class="flex-1 min-h-screen ml-[280px]">

        {{-- HEADER --}}
        @include('admin.partials.header')

        <main class="p-10">

            @yield('content')

        </main>

    </div>

</div>

</body>
</html>