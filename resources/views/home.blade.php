<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
</head>
<body>
    <h1>Welcome To Phone Book</h1>
    <a href="/contacts">Add Contact</a>
    <table>
        <tr>
            <th>id</th>
            <th>name</th>
            <th>phone</th>
        </tr>
        @foreach($contacts as $key => $contact)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $contact->name }}</td>
                <td>{{ $contact->phone }}</td>
            </tr>
        @endforeach
    </table>
</body>
</html>
