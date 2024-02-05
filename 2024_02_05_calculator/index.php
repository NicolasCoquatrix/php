<?php

if(isset($_GET['first_number']))
{
    $first_number = $_GET['first_number'];
}

if(isset($_GET['last_number']))
{
    $last_number = $_GET['last_number'];
}

if(isset($_GET['calculation']))
{
    $calculation = $_GET['calculation'];
}

if (isset($first_number) && isset($calculation) && isset($last_number)) {
    if(!empty($calculation) && ($calculation == 'addition' || $calculation == 'substraction' || $calculation == 'multiplication' || $calculation == 'division')){
        if (isset($first_number) && is_numeric($first_number)){
            if (isset($last_number) && is_numeric($last_number)){
                if($calculation != 'division' || $last_number != '0'){
                    if($calculation == 'addition'){
                        $result = $first_number + $last_number;
                    } elseif ($calculation == 'substraction') {
                        $result = $first_number - $last_number;
                    } elseif($calculation == 'multiplication') {
                        $result = $first_number * $last_number;
                    } elseif($calculation == 'division') {
                        $result = $first_number / $last_number;
                    }
                } else {
                    $result = 'Erreur *';
                    $error = "* Erreur : Division par 0 impossible";
                }
            } else {
                $result = 'Erreur *';
                $error = '* Erreur : Le deuxième nombre est incorrect ou vide. Il a peut être été modifié dans l\'URL';
            }
        } else {
            $result = 'Erreur *';
            $error = '* Erreur : Le premier nombre est incorrect ou vide. Il a peut être été modifié dans l\'URL';
        }
    } else {
        $result = 'Erreur *';
        $error = '* Erreur : L\'opérateur est incorrect ou vide. Il a peut être été modifié dans l\'URL';
    }
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculatrice - Nicolas Coquatrix</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="calculator">
        <h1>NICOLATRICE</h1>
        <div class="calculation_box">
            <form method="GET">
                <input type="number" name="first_number" id="first_number" class="box first_number" <?php if(isset($first_number)) : ?>placeholder=<?= $first_number ?> <?php endif; ?> required >
                <select name="calculation" class="calculation">
                    <option value="addition" <?php if(isset($calculation) && $calculation == 'addition'): ?>selected<?php endif; ?>>+</option>
                    <option value="substraction" <?php if(isset($calculation) && $calculation == 'substraction'): ?>selected<?php endif; ?>>-</option>
                    <option value="multiplication" <?php if(isset($calculation) && $calculation == 'multiplication'): ?>selected<?php endif; ?>>X</option>
                    <option value="division" <?php if(isset($calculation) && $calculation == 'division'): ?>selected<?php endif; ?>>/</option>
                </select>
                <input type="number" name="last_number" id="last_number" class="box last_number" <?php if(isset($last_number)) : ?>placeholder=<?= $last_number ?> <?php endif; ?> required >
                <input type="submit" class="calculation calculate" value="=">
            </form>
            <div class="box result"><p><?php if(isset($result)) : ?><?= $result ?? '' ?><?php endif; ?></p></div>
        </div>
    </div>
    <p class="error"><?php if(isset($error)) : ?><?= $error ?? '' ?><?php endif; ?></p>
</body>
</html>