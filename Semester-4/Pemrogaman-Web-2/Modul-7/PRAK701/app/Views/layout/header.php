<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud Auth Demo</title>
</head>

<body>
    <header>
        <h1>Crud</h1>
        <nav>
            <?php if (session()->get('isLogged')): ?>
                <a href="/dashboard">Dashboard</a>
                <a href="/logout">Logout</a>
            <?php else: ?>
                <a href="/login">Login</a>
            <?php endif; ?>
        </nav>
    </header>
    <hr>