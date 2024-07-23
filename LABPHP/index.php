<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php include "funzioni.php"; ?>
    
    <?= createTitle("Titolo principale"); ?>

    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi, ipsa. Quas deserunt nulla enim modi quos delectus accusantium, dolorum excepturi aperiam aliquam rerum, maiores tempore hic, quibusdam quisquam natus error.</p>

    <?= createTitle("Titolo secondario",2); ?>

    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Repellat non facilis fuga aspernatur reiciendis repudiandae, voluptas, repellendus tempora officiis adipisci assumenda ex? Quaerat incidunt quidem molestiae amet eaque. Architecto, quos.</p>

    <?= createPar("Mio paraGrafo "); ?>

    <?= createList(["pane","burro","marmellata"]); ?>

</body>
</html>