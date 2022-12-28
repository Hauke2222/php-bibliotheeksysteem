<!DOCTYPE html>
<html lang="en">

<?php include 'views/partials/head.php'; ?>

<body>
    <?php include 'views/partials/header.php'; ?>
    <main>
        <h1>
            Boeken
        </h1>
        <table>
            <tr>
                <th>Titel</th>
                <th>Auteur</th>
                <th>ISBN</th>
                <th>Beschikbaarheid</th>
                <th>Beschikbaar op</th>
            </tr>
            <?php foreach ($books as $book) { ?>
                <tr>
                    <td><?php echo $book['title']; ?></td>
                    <td><?php echo $book['author']; ?></td>
                    <td><?php echo $book['isbn']; ?></td>
                    <td>
                        <?php if ($book->available) {
                            echo "Beschikbaar";
                        } else {
                            echo "Niet beschikbaar";
                        } ?>
                    </td>
                    <td><?php echo $book['available_on']; ?></td>
                </tr>
            <?php } ?>
        </table>
    </main>

</body>

</html>