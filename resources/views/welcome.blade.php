<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PenguinShop</title>
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <style>
        body {
            font-family: 'Figtree', sans-serif;
            background-color: #f7fafc; /* Lighter background for a clean look */
            color: #333;
            margin: 0;
            padding: 0;
            line-height: 1.6;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 40px;
            text-align: center;
        }

        .header {
            margin-bottom: 40px;
        }

        .header h1 {
            font-size: 3rem;
            color: #0e4a7f; /* PenguinShop brand color */
            font-weight: bold;
        }

        .header p {
            font-size: 1.25rem;
            color: #4a5568;
            margin-top: 10px;
        }

        .button {
            padding: 12px 24px;
            background-color: #0e4a7f; /* PenguinShop brand color */
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-size: 1.1rem;
            display: inline-block;
            transition: background-color 0.3s ease;
            margin: 10px 0;
        }

        .button:hover {
            background-color: #0353a4; /* Darker shade on hover */
        }

        .button:active {
            background-color: #023b7f; /* Even darker shade when clicked */
        }

        .footer {
            margin-top: 60px;
            font-size: 1rem;
            color: #777;
        }

        .footer a {
            color: #0e4a7f;
            text-decoration: none;
        }

        .footer a:hover {
            text-decoration: underline;
        }

        @media (min-width: 768px) {
            .container {
                padding: 60px;
            }

            .header h1 {
                font-size: 3.5rem;
            }
        }
    </style>
</head>
<body>
<div class="container">
    <div class="header">
        <h1>Welcome to PenguinShop</h1>
        <p>Your one-stop shop for premium products at unbeatable prices.</p>
    </div>

    <div>
        @if (Route::has('login'))
            <div class="login-links">
                @auth
                    <a href="{{ url('/dashboard') }}" class="button">Go to Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="button">Log In</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="button">Register</a>
                    @endif
                @endauth
            </div>
        @endif
    </div>

    <div class="footer">
        <p>&copy; {{ date('Y') }} PenguinShop. All Rights Reserved. | <a href="{{ url('/privacy-policy') }}">Privacy Policy</a> | <a href="{{ url('/terms-of-service') }}">Terms of Service</a></p>
    </div>
</div>
</body>
</html>
