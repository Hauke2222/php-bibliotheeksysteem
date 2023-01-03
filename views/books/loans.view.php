<!DOCTYPE html>
<html lang="en">

<?php include 'views/partials/head.php'; ?>

<body>
    <?php include 'views/partials/header.php'; ?>
    <main>
        <h1>
            Geleende boeken
        </h1>
        <table>
            <tr>
                <th>Boek</th>
                <th>Gebruiker</th>
                <th>Verlengd</th>
                <th>Terug te brengen op</th>
            </tr>
            <?php foreach ($data as $loan) { ?>
                <tr>
                    <td>
                        <?php
                        $bookController = new BookController($pdo);
                        $book = $bookController->get($loan['book_id']);
                        echo $book['title'];
                        ?>
                    </td>
                    <td>
                        <?php
                        $userController = new UserController($pdo);
                        $user = $userController->get($loan['user_id']);
                        echo $user['name'];
                        ?>
                    </td>
                    <td><?php echo $loan['extended']; ?></td>
                    <td><?php echo $loan['return_date']; ?></td>
                </tr>
            <?php } ?>
        </table>
    </main>

</body>

</html>