<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HRIS App</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-light">
    <div class="container d-flex align-items-center justify-content-center vh-100">
        <div class="text-center">
            <h1>Selamat Datang di HRIS App</h1>
            <p class="lead">Solusi manajemen kepegawaian modern Anda.</p>
            <a href="{{ route('login') }}" class="btn btn-danger btn-lg mt-3">Login</a>
        </div>
    </div>
</body>
</html>