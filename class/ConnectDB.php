<?php

/**
 * Created by PhpStorm.
 * User: Rait
 * Date: 25.07.2018
 * Time: 0:50
 */
class ConnectDB
{
    public function allResults($q)
    {
        require_once 'setup.php';
        $su = new Setup();

        // Create connection
        $conn = new mysqli($su->servername, $su->username, $su->password, $su->dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        };

        if ($q === "allIns") {
            $sql = "SELECT * FROM insurance";
        } else if ($q === "all") {
            $sql = "SELECT pa._id, epa.pn, pa.last, pa.first, ins.iname, ins.from_date, ins.to_date FROM patient pa RIGHT JOIN insurance ins ON pa._id = ins.patient_id ORDER BY ins.from_date, pa.last ASC";
        } else if (count($q) > 1) {
            $sql = "SELECT pa.pn, pa.last, pa.first, ins.iname, ins.from_date, ins.to_date FROM patient pa";
        } else {
            $sql = "SELECT pa.pn, pa.last, pa.first, ins.iname, ins.from_date, ins.to_date FROM patient pa WHERE pa.pn = $q";
        }

        $result = $conn->query($sql);

        $conn->close();

        return $result;
    }

}