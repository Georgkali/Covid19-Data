<?php

require_once "vendor/autoload.php";

use App\CovidData;
use App\Search;

$search = new Search();
$covidData = new CovidData();
$header = $covidData->getHeader();
$records = $covidData->getRecords();

if (isset($_POST["selection"])) {
    $records = $search->filter($_POST["selection"]);
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <title>COVID DATA</title>
</head>
<body>
<div>
    <table class="table" style="display: flex">
        <tr>

            <?php foreach ($header as $cell) : ?>
                <td>
                    <form method="post">

                        <select style="width: 70px" name="selection">
                            <?php foreach ($search->selections($cell) as $selection) : ?>

                                <?php echo " <option>$selection</option> " ?>

                            <?php endforeach; ?>
                        </select><br>
                        <input type="submit">
                    </form>
                </td>
            <?php endforeach; ?>
        </tr>
        <tr>
            <?php foreach ($header as $cell) : ?>

                <?php echo "<td>  $cell </td>" ?>

            <?php endforeach; ?>
        </tr>
        <?php foreach ($records as $offset => $record) : ?>
            <tr>
                <?php foreach ($record as $key => $value) : ?>
                    <?php echo "<td>  $value </td>" ?>
                <?php endforeach; ?>
            </tr>
        <?php endforeach; ?>
    </table>
</div>

</body>
</html>






