<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Recovery</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Password Recovery</h2>

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{route('checkemail')}}">
            @csrf

            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" name="email" class="form-control" required>
                
            </div>

            <button type="submit" class="btn btn-primary">Send Password Reset Link</button>
        </form>
    </div>
</body>
</html>
