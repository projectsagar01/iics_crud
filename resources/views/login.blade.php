<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Login</h1>

@if(session('error'))
    <p>{{ session('error') }}</p>
@endif

<form action="/login" method="POST">

    @csrf

    <input type="email" name="email" placeholder="Email">

    <input type="password" name="password" placeholder="Password">

    <button type="submit">Login</button>

</form>

</body>
</html>