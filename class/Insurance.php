<?php

/**
 * Created by PhpStorm.
 * User: Rait
 * Date: 25.07.2018
 * Time: 21:58
 */

//require 'ConnectDB.php';
//require 'Interface/I_PatientRecord.php';

class Insurance implements I_PatientRecord
{
    public function findID()
    {
        $con = new ConnectDB();
        $allRecords = $con->allResults("allIns");
        $id = mysqli_fetch_array($allRecords);
        return $id["id"];
    }
    public function pnRecords($pn)
    {
        // TODO: Implement pnRecords() method.
    }
}