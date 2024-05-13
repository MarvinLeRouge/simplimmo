<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students list</title>
</head>

<body>
    <h1><?php echo $title; ?></h1>

    <?php

    echo ('<ul>');

    foreach ($students as $student) {
        echo ('<li>' . $student->getName() . ' - ' . $student->getSurname() . '</li>');
    }

    echo ('</ul>');

    ?>

</body>

</html>