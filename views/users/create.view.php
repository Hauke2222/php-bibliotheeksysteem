<!DOCTYPE html>
<html lang="en">

<?php include 'views/partials/head.php'; ?>

<body>
    <?php include 'views/partials/header.php'; ?>
    <main>
        <h1>Nieuwe gebruiker</h1>
        <form action="/users/create" method="post">
            <label for="name">Name:</label><br>
            <input type="text" id="name" name="name"><br>
            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email"><br>
            <label for="password">Password:</label><br>
            <input type="password" id="password" name="password"><br>
            <label for="password2">Confirm password:</label><br>
            <input type="password" id="password2" name="password2"><br><br>
            <input type="submit" value="Submit">
        </form>

    </main>
</body>

</html>