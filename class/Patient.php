<?php

require 'ConnectDB.php';
require 'Interface/I_PatientRecord.php';

class Patient implements I_PatientRecord
{
    public function allRecords(){
        $con = new ConnectDB();
        $allRecords = $con->allResults("all");
        return $allRecords;
    }

    public function allInsRecords(){
        $con = new ConnectDB();
        $allRecords = $con->allResults("allIns");
        return $allRecords;
    }

    function __constructBypn($pn){
        $con = new ConnectDB();
        $allRecords = $con->allResults($pn);
        return $allRecords;
    }

    public function findID(){
        $pa = new Patient();
        $id = $pa->allRecords("all");
        return $id;
    }

    public function findPN(){
        $pa = new Patient();
        $pn = $pa->allRecords("all");
        return $pn;
    }

    public function findBydate(){
        $pa = new Patient();
        $id = $pa->allRecords("all");
        return $id;
    }

    public function pnRecords($pn){
        // TODO: Implement pnRecords() method.
    }


}

