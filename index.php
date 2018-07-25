<?php
/**
 * Created by PhpStorm.
 * User: Rait
 * Date: 20.07.2018
 * Time: 14:26
 */


require_once 'class/setup.php';
require_once 'class/Patient.php';
require_once 'class/Insurance.php';
require_once 'class/ConnectDB.php';
require_once 'class/StaticVar.php';
require_once 'Interface/I_PatientRecord.php';

$con = new ConnectDB();
$static = new StaticVar();
$output = new Output();
$pat = new Patient();
$ins = new Insurance();


$con->allResults("all");

// make list of names
$allnames = [];

echo $static->allHeadline;

if ($con->allResults("all")->num_rows > 0) {
    // output data of each row
    $result = $con->allResults("all");
    while ($row = $result->fetch_assoc()) {
        $from = date('m-d-y', strtotime($row["from_date"]));
        $to = date('m-d-y', strtotime($row["to_date"]));
        echo $row["pn"] . ",\t" . $row["last"] . ",\t" . $row["first"] . ",\t" . $row["iname"] . ",\t" . $from . ",\t" . $to . PHP_EOL;

        // push name to $allnames array
        array_push($allnames, $row["last"] . $row["first"]);

    }

    // array to strings and count all char.'s
    $allnamesStr = strtoupper(implode($allnames));
    $allnamesCount = count_chars($allnamesStr, 1);


    echo $static->statHeadline;

    // char.'s statistics
    foreach ($allnamesCount as $key => $value) {
        $percentage = round(($value * 100) / strlen($allnamesStr), 2);
        echo chr($key) . "\t$value\t$percentage\t%" . PHP_EOL;
    }

    $result = $pat->findID();

    echo $static->validHeadline;

    while ($row = $result->fetch_assoc()) {

        $m = 01;
        $d = 01;
        $y = 15;
        $DateString = $m . "-" . $d . "-" . $y;

        $to = date('m-d-y', strtotime($row["to_date"]));
        $Date = date("m-d-y", strtotime($DateString));

        if ($to >= $Date) {
            $valid = "yes";
        } else {
            $valid = "no";
        }
        echo $row["pn"] . ",\t" . $row["last"] . ",\t" . $row["first"] . ",\t" . $row["iname"] . ",\t"  . $valid . PHP_EOL;
    }


    $result = $ins->findID();

    echo $static->insIdHeadline;

    while ($row = $result->fetch_assoc()) {
        echo $ins->findID() . PHP_EOL;
    }
} else {
    echo "sorry, no results from database";
}

?>