<!DOCTYPE html>
<html lang="en">

<?php include 'views/partials/head.php'; ?>

<body>
    <main>
        <h1>
            Inloggen
        </h1>
        <form class="normform" action="/login" method="post">
            <label for="email">E-mail:</label><br>
            <input type="email" id="email" name="email"><br>
            <label for="password">Wachtwood:</label><br>
            <input type="password" id="password" name="password"><br><br>
            <input type="submit" value="Submit">
        </form>
    </main>
</body>

</html>