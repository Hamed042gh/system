<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $post->title }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .post-container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .post-title {
            background-color: #007BFF;
            color: #ffffff;
            padding: 15px;
            border-radius: 8px;
            font-size: 2em;
            margin: -20px -20px 20px -20px;
            text-align: center;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .post-body {
            font-size: 1.2em;
            line-height: 1.6;
            color: #333333;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 8px;
            box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .post-body h2,
        .post-body p {
            margin: 0 0 15px 0;
        }

        .post-actions {
            margin-top: 20px;
            display: flex;
            justify-content: flex-end;
            gap: 10px;
        }

        .post-actions a,
        .post-actions button {
            text-decoration: none;
            padding: 10px 15px;
            border-radius: 5px;
            color: #ffffff;
            font-weight: bold;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            border: none;
            cursor: pointer;
            display: inline-block;
            min-width: 100px;
            text-align: center;
        }

        .post-actions .edit {
            background-color: #28a745;
        }

        .post-actions .delete {
            background-color: #dc3545;
        }

        .post-actions .delete:hover,
        .post-actions .edit:hover {
            opacity: 0.9;
        }
    </style>
</head>

<body>
    <div class="post-container">
        <div class="post-title">{{ $post->title }}</div>
        <div class="post-body">{!! $post->body !!}</div>
        <div class="post-actions">
            @can('update', $post)
            <a href="{{ route('posts.edit', $post->id) }}" class="edit">Edit</a>
            @endcan

            @can('delete', $post)
            <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="delete" onclick="return confirm('Are you sure you want to delete this post?')">Delete</button>
            </form>
            @endcan
        </div>
    </div>
</body>

</html>
