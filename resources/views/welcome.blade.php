<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #4facfe, #00f2fe);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .welcome-container {
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            text-align: center;
        }

        .btn-custom {
            width: 150px;
            font-size: 18px;
        }
    </style>
</head>

<body>

    <div class="welcome-container">
        <h1 class="mb-4 text-primary">Selamat Datang!</h1>
        <p class="text-muted">Silakan pilih menu di bawah ini:</p>

        <div class="mt-4">
            <a href="{{ route('admins.index') }}" class="btn btn-success btn-custom m-2">List Admin</a>
            <a href="{{ route('login') }}" class="btn btn-primary btn-custom m-2">Login</a>
        </div>
    </div>

</body>

</html>