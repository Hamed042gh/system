<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #777373;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #333;
            padding: 10px 20px;
            color: white;
            position: relative;
        }

        .title {
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            color: #FFD700;
            margin: 0;
        }

        .user-info {
            display: flex;
            align-items: center;
        }

        .user-type {
            font-weight: bold;
            color: #18ea01;
            margin-right: 20px;
        }

        .login-link {
            color: #007bff; /* Blue color for Log In */
            text-decoration: none;
            font-weight: bold;
            margin-right: 10px;
        }

        .register-link {
            color: #28a745; /* Green color for Register */
            text-decoration: none;
            font-weight: bold;
        }

        .logout-link {
            color: #ff2323;
            text-decoration: none;
            font-weight: bold;
        }

        .posts {
            padding: 20px;
        }

        .posts a {
            text-decoration: none;
            color: #333;
        }

        .posts a h2 {
            margin: 0;
            padding: 10px;
            background-color: #e3e3e3;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .posts a h2:hover {
            background-color: #ccc;
        }
    </style>
</head>

<body>
    <div class="header">
        <div class="user-info">
            <!-- Display User Type -->
            @if (Auth::check())
                <p class="user-type">User Type: {{ Auth::user()->role === 'admin' ? 'Admin' : 'Normal' }}</p>

                <!-- Log Out Link -->
                <a href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();"
                   class="logout-link">
                    Log Out
                </a>
            @else
                <!-- Log In and Register Links -->
                <a href="{{ route('login') }}" class="login-link">Log In</a>
                <a href="{{ route('register') }}" class="register-link">Register</a>
            @endif
        </div>

        <!-- Centered Title -->
        <h1 class="title">List of All Posts</h1>
    </div>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>

    <div class="posts">
        <a class="btn btn-info" href="{{ route('posts.create') }}">Create New Post</a>
        @if ($posts->isNotEmpty())
            @foreach ($posts as $post)
                <a href="{{ route('posts.show', $post->id) }}">
                    <h2>{{ $post->title }}</h2>
                </a>
                <hr>
            @endforeach
        @else
            <h3>No post exists...</h3>
        @endif
    </div>
</body>

</html>
