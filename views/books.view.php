<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/static/css/base.css">
    <title>Document</title>
</head>

<body>
    <header>
        <h1>Boeken</h1>
    </header>
    <main>
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
                    <td><?php echo $book->title; ?></td>
                    <td><?php echo $book->author; ?></td>
                    <td><?php echo $book->isbn; ?></td>
                    <td>
                        <?php if ($book->available) {
                            echo "Beschikbaar";
                        } else {
                            echo "Niet beschikbaar";
                        } ?>
                    </td>
                    <td><?php echo $book->available_on; ?></td>
                </tr>
            <?php } ?>
        </table>
    </main>

</body>

</html>