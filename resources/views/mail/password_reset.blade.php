<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset your Password</title>
</head>
<body>
    <h2>Hello Dear {{$user->name}}</h2>
    <p>You made a request to reset your password</p>
    <p>Follow this link <a href="{{$route}}">reset my password</a> </p>
    <p>If it's not your request, please ignore this mail</p>
</body>
</html>