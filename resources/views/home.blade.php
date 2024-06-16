<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <header>
            <nav class="navbar">
                <div class="navbar-brand">
                    <a href="#">Brand</a>
                </div>
                <button class="navbar-toggle" id="navbar-toggle">
                    <span class="bar"></span>
                    <span class="bar"></span>
                    <span class="bar"></span>
                </button>
                <div class="navbar-links" id="navbar-links">
                    <ul>
                        <li><a href="#home">Home</a></li>
                        <li><a href="#about">About</a></li>
                        <li><a href="#services">Services</a></li>
                        <li><a href="#contact">Contact</a></li>
                    </ul>
                </div>
            </nav>
        </header>
        @auth
            <h2>You are successfully logged in.</h2>
            <form action='/logout' method="POST">
            @csrf 
            <button> Log Out</button>
            </form>
        @else
        <h2>Registration Form</h2>
        <form action="/register" method="post">
            @csrf
            <div class="form-group">
                <label for="name"> Name:</label>
                <input type="text" id="name" name="name"    >
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email"     >
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password"    >
            </div>
           
            <div class="form-group">
                <button type="submit">Register</button>
            </div>
        </form>
        <h2>Login </h2>
        <form action="/login" method="post">
            @csrf
            <div class="form-group">
                <label for="loginemail">Email:</label>
                <input type="email" id="loginemail" name="loginemail"     >
            </div>
            <div class="form-group">
                <label for="loginpassword">Password:</label>
                <input type="password" id="loginpassword" name="loginpassword"    >
            </div>
           
            <div class="form-group">
                <button type="submit">Login</button>
            </div>
        </form>
        @endauth
    </div>
</body>
</html>
