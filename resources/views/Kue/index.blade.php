<!DOCTYPE html>
<html>
<head>
    <title>Daftar Kue</title>
</head>
<body>
    <h1>Daftar Kue</h1>
    <ul>
        @foreach ($kues as $kue)
            <li>
                <strong>{{ $kue['title'] }}</strong><br>
                <a href="{{ url('/kues/' . $kue['id']) }}">Lihat Detail</a>
            </li>
            <hr>
        @endforeach
    </ul>
</body>
</html>
