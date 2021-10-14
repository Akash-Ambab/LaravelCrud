<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/authenticationPage.css">
    <title>Login</title>
</head>
<body>
    <form action="/login/add" method="post">
    @csrf
        <div class="container">
            <h2>Login Page</h2>

            <label for="email"><b>Email Address</b></label>
            <input type="email" placeholder="Enter Email Id" name="email" required>

            <label for="password"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="password" required>

            <button type="submit">Login</button><br>

            @if($errors->any())
                @foreach($errors->all() as $msg)
                    <p id="msg">{{$msg}}</p><br>
                @endforeach
            @endif
            <a href="/register">Create Account</a><br>
        </div>
    </form>
</body>
</html>