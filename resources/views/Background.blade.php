<!-- resources/views/background.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Background</title>
    <style>
        body {
            @php
                $background = \App\Models\Setting::where('key', 'dashboard_background')->first();
            @endphp

            @if($background)
                background: url('{{ asset('storage/' . $background->value) }}') no-repeat center center fixed;
            @else
                background: url("https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEhNBdEQclaDpdc14GSFbviCnwIFwGODtRrOzlJgqJ-B8gS5QSaNvklHQzdGDdNzfRvt1zQ7DzhBWWIM3Q7NFdR3mp8b8La2k6GzogKU8mS7CUo0jV8Spzvmt_w8kHstTUOfu2x6xWC5JQgk/s1600/Slider-2-Menara_Pandang-BanjarmasinTourism.jpg") no-repeat center center fixed;
            @endif

            background-size: cover;
            box-shadow: inset 0 0 100px rgba(0, 0, 0, 0.7);
            width: 100%;
            height: 100%;
            position: absolute;
            top: 0;
            left: 0;
        }

        form {
            text-align: center;
        }
        input[type="text"] {
            padding: 10px;
            margin: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="submit"] {
            padding: 10px 20px;
            margin: 10px;
            border: none;
            border-radius: 4px;
            background-color: #28a745;
            color: white;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <form action="{{ route('background.change') }}" method="post">
        @csrf
        <label for="color">Enter Background Color (e.g., red, #ff0000):</label><br>
        <input type="text" id="color" name="color" required><br>
        <input type="submit" value="Change Background">
    </form>
</body>
</html>
