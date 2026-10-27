<!DOCTYPE html>
<html>
<head>
    <title>Data Genre</title>
</head>
<body>

    <h1>Data Genre</h1>

    <table border="1" cellpadding="10">
        <tr>
            <th>ID</th>
            <th>Nama Genre</th>
        </tr>

        @foreach ($genres as $genre)
        <tr>
            <td>{{ $genre['id'] }}</td>
            <td>{{ $genre['name'] }}</td>
        </tr>
        @endforeach
    </table>

</body>
</html>