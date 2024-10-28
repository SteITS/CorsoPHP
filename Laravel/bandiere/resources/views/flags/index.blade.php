<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bandiere degli Stati</title>
</head>
<body>
    <h1>Bandiere degli Stati</h1>
    <ul>
        @foreach($flags as $flag)
            <li>
                <img src="{{ $flag->image }}" alt="{{ $flag->name }}" style="width:100px;height:auto;">
                {{ $flag->name }}
            </li>
        @endforeach
    </ul>
</body>
</html>