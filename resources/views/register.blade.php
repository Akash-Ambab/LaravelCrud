<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/authenticationPage.css">
    <title>Register</title>
</head>
<body>
    <form action="/register/add" method="post">
    @csrf
        <div class="container">
            <h2>Register Page</h2>
            <hr>
            <label for="name"><b>Your Name</b></label>
            <input type="text" placeholder="Enter Name" name="name" required>

            <label for="email"><b>Email Address</b></label>
            <input type="email" placeholder="Enter EmailID" name="email" required>

            <label for="username"><b>Username</b></label>
            <input type="text" placeholder="Enter Username" name="username" required>

            <label for="password"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="password" required>

            <button type="submit">Login</button>
            @if($errors->any())
                @foreach($errors->all() as $msg)
                    <p id="msg">{{$msg}}</p><br>
                @endforeach
            @endif
            <br>
        </div>
    </form>
    <div class="btn">
        <a href="/login">Already have an account ?</a>
    </div>
</body>
</html>