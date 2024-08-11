<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!-- Include Bootstrap CSS if not already included -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f4f4f4;
        }

        .form-container {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }

        .form-container h2 {
            margin-top: 0;
            margin-bottom: 20px;
            font-size: 24px;
            color: #333;
        }

        .form-container .form-group {
            margin-bottom: 20px;
        }

        .form-container .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .form-container .form-group input {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 6px;
            box-sizing: border-box;
        }

        .form-container .form-group button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 12px;
            border-radius: 6px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        .form-container .form-group button:hover {
            background-color: #0056b3;
        }

        .form-container .form-group .form-check {
            text-align: left;
            margin-bottom: 20px;
        }

        .form-container .form-group .form-check label {
            margin: 0;
            font-weight: normal;
        }

        .social-buttons {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-top: 20px;
        }

        .social-button {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 10px;
            border-radius: 6px;
            cursor: pointer;
            width: 50px;
            height: 50px;
            background-color: white;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s ease;
        }

        .social-button:hover {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
        }

        .social-button img {
            width: 28px;
            height: 28px;
        }

        /* Custom styles for alerts */
        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border-color: #c3e6cb;
        }

        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
            border-color: #f5c6cb;
        }

        .alert {
            padding: 15px;
            border-radius: 6px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Login</h2>
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>

            <div class="form-group form-check">
                <input type="checkbox" id="remember_me" name="remember" class="form-check-input">
                <label for="remember_me" class="form-check-label">Remember Me</label>
            </div>

            <div class="form-group">
                <button type="submit">Login</button>
            </div>
        </form>

        <div class="social-buttons">
            <a href="{{route('social.redirect', ['provider' => 'google'])}}" class="social-button">
                <img src="https://www.gstatic.com/images/branding/googlelogo/1x/googlelogo_color_272x92dp.png" alt="Google Logo">
            </a>
            <a href="{{route('social.redirect', ['provider' =>'github'])}}" class="social-button">
                <img src="https://github.githubassets.com/images/modules/logos_page/GitHub-Mark.png" alt="GitHub Logo">
            </a>
        </div>
    </div>
</body>
</html>
