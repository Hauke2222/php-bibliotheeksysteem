<!DOCTYPE html>
<html lang="en">

<?php include 'views/partials/head.php'; ?>

<body>
    <?php include 'views/partials/header.php'; ?>
    <main>
        <h1>
            Gebruikers
        </h1>
        <table>
            <table>
                <tr>
                    <th>Naam</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
                <?php foreach ($data as $user) { ?>
                    <tr>
                        <td><?php echo $user['first_name'] . ' ' . $user['last_name']; ?></td>
                        <td><?php echo $user['email']; ?></td>
                        <td>
                            <a href="/users/<?php echo $user['id']; ?>/edit">Edit</a>
                            <a href="/users/<?php echo $user['id']; ?>/delete">Delete</a>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </table>
    </main>

</body>

</html>