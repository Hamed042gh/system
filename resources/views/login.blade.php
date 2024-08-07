<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
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
                padding: 20px;
                border-radius: 8px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                width: 100%;
                max-width: 400px;
                text-align: center;
            }

            .form-container h2 {
                margin-top: 0;
            }

            .form-container .form-group {
                margin-bottom: 15px;
            }

            .form-container .form-group label {
                display: block;
                margin-bottom: 5px;
            }

            .form-container .form-group input {
                width: 100%;
                padding: 10px;
                border: 1px solid #ddd;
                border-radius: 4px;
            }

            .form-container .form-group button {
                background-color: #054606;
                color: white;
                border: none;
                padding: 10px;
                border-radius: 4px;
                cursor: pointer;
                width: 100%;
            }

            .form-container .form-group button:hover {
                background-color: #0056b3;
            }

            .social-buttons {
                display: flex;
                justify-content: center;
                gap: 10px;
                margin-top: 10px;
            }

            .social-button {
                display: flex;
                align-items: center;
                justify-content: center;
                padding: 10px;
                border-radius: 4px;
                cursor: pointer;
                width: 50px;
                height: 50px;
                background-color: white;
            }

            .social-button img {
                width: 24px;
                height: 24px;
            }
        </style>
    </head>

    <body>
        <div class="form-container">
            <h2>Login</h2>
            <form method="POST" action="">
                @csrf

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                </div>

                <div class="form-group">
                    <button type="submit">Login</button>
                </div>
            </form>

            <div class="social-buttons">
                <a href="" class="social-button">
                    <img src="https://www.gstatic.com/images/branding/googlelogo/1x/googlelogo_color_272x92dp.png"
                        alt="Google Logo">
                </a>
                <a href="" class="social-button">
                    <img src="https://github.githubassets.com/images/modules/logos_page/GitHub-Mark.png"
                        alt="GitHub Logo">
                </a>
            </div>
        </div>
    </body>

</html>
