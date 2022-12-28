<!DOCTYPE html>
<html lang="en">

<?php include 'views/partials/head.php'; ?>

<body>
    <?php include 'views/partials/header.php'; ?>
    <main>
        <h1>Nieuw boek</h1>

        <form action="/books/create" method="post">
            <label for="title">Title:</label><br>
            <input type="text" id="title" name="title"><br>
            <label for="author">Author:</label><br>
            <input type="text" id="author" name="author"><br>
            <label for="isbn">ISBN:</label><br>
            <input type="text" id="isbn" name="isbn"><br>
            <label for="available">Available:</label><br>
            <input type="checkbox" id="available" name="available"><br>
            <label for="available_on">Available on:</label><br>
            <input type="date" id="available_on" name="available_on"><br><br>
            <input type="submit" value="Submit">
        </form>

    </main>

</body>

</html>