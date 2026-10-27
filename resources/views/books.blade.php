
<!DOCTYPE html>
<html>
<head>
    <title>Data Book</title>
</head>
<body>
    <h1>Data Book</h1>

    <table border="1" cellpadding="10">
        <tr>
            <th>ID</th>
            <th>Judul Buku</th>
            <th>Author</th>
        </tr>

        @foreach ($books as $book)
        <tr>
            <td>{{ $book->id }}</td>
            <td>{{ $book->title }}</td>
            <td>{{ $book->author }}</td>
        </tr>
        @endforeach
    </table>
</body>
</html>
