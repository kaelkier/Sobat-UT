<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('public.login.css
') }}">
</head>
<body>
    <div class="wrap">
        <div class="kanan">
            <h1 class="judul">Welcome</h1>
            <p>Please login with your personal info</p>
            <img src="logologin.png" alt="Logo">
        </div>
        <div class="kiri">
        <div class="login-container">
            <h2>Login</h2>
            @if($errors->any())
                <div class="error-message">
                    {{ $errors->first('login') }}
                </div>
            @endif
            <form action="{{ url('/login') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <button type="submit" class="login-button">Login</button>
            </form>
        </div>
    </div>
    </div>
</body>
</html>
