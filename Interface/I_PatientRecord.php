<?php

//Patient record interface
interface I_PatientRecord
{
    public function findID();
    public function pnRecords($pn);
}

