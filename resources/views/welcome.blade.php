<!-- resources/views/welcome.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>URL Kısaltıcı</title>
    <style>
        body { 
            display: flex; 
            justify-content: center; 
            align-items: center; 
            height: 100vh; 
            flex-direction: column; 
        }
        input { 
            padding: 10px; 
            width: 300px; 
            margin-bottom: 12px; 
            border: 1px solid;

        }
        button { 
            padding: 8px 15px; 
            border: none;
            border-radius: 25px;
            margin-left: 10px;
            font-size: 15px;
        }
    </style>
</head>
<body>
    <h1>URL Kısaltıcı</h1>
    <form action="{{ route('shorten') }}" method="POST">
        @csrf
        <input type="text" name="url" placeholder="URL giriniz" required>
        <button type="submit">Kısalt!</button>
    </form>
    @if (session('short_url'))
        <p>Kısa URL: <a href="{{ config('app.url') . '/' . session('short_url') }}" target="_blank">{{ config('app.url') . '/' . session('short_url') }}</a></p>
    @endif
</body>
</html>