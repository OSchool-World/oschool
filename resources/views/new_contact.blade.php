<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PhoneBook - New Contact</title>
</head>
<body>
    <form method="post" action="/contacts">
        @csrf

        <label>name:</label>
        <input type="text" name="name">
        <br>
        <label>phone:</label>
        <input type="text" name="phone">
        <br>
        <input type="submit" value="save">
    </form>
</body>
</html>
