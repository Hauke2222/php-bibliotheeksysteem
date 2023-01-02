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
                <th>Beschikbaar op</th>
                <th>Lenen</th>
            </tr>
            <?php foreach ($data as $book) { ?>
                <tr>
                    <td><?php echo $book['title']; ?></td>
                    <td><?php echo $book['author']; ?></td>
                    <td><?php echo $book['isbn']; ?></td>
                    <td><?php echo $book['available_on']; ?></td>
                    <td>
                        <?php if ($book['available']) { ?>
                            <a href="/books/<?php echo $book['id']; ?>/borrow">Leen</a>
                        <?php } else {
                            echo "Nog niet beschikbaar";
                        } ?>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </main>

</body>

</html>