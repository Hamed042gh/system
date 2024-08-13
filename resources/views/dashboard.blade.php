<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
            color: #FFD700;
            margin: 0;
        }

        .header-actions {
            display: flex;
            align-items: center;
            gap: 15px; /* Space between buttons */
        }

        .btn-create {
            margin-right: 10px;
        }

        .btn-profile {
            display: inline-block;
            padding: 5px 10px;
            color: #fff;
            background-color: #007bff;
            border-radius: 4px;
            text-decoration: none;
        }

        .btn-profile:hover {
            background-color: #0056b3;
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
        <h1 class="title">List of All Posts</h1>

        <div class="header-actions">
            @if (Auth::check())
                <a href="{{ route('profile.show', Auth::user()->id) }}" class="btn btn-profile">
                    View Profile
                </a>
                <a href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();"
                   class="logout-link">
                    Log Out
                </a>
            @endif

            <!-- دکمه ساخت پست جدید -->
            @if (Auth::check())
                <a href="{{ route('posts.create') }}" class="btn btn-info btn-create">Create New Post</a>
            @endif
        </div>
    </div>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>

    <div class="posts">
        @if ($posts->isNotEmpty())
            @foreach ($posts as $post)
                <div class="post-item">
                    <a href="{{ route('posts.show', $post->id) }}">
                        <h2>{{ $post->title }}</h2>
                    </a>
                    <a href="{{ route('profile.show', $post->user_id) }}" class="btn-profile">
                        View Profile
                    </a>
                    <hr>
                </div>
            @endforeach
        @else
            <h3>No post exists...</h3>
        @endif
    </div>
</body>

</html>
