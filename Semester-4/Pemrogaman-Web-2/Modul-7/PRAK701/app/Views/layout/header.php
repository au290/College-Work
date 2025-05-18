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
    <?php if (session()->getFlashdata('success')) : ?>
        <div style="background-color: #d4edda; color: #155724; padding: 10px; margin: 10px 0;">
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')) : ?>
        <div style="background-color: #f8d7da; color: #721c24; padding: 10px; margin: 10px 0;">
            <?= session()->getFlashdata('error') ?>
        </div>
    <?php endif; ?>
    <hr>