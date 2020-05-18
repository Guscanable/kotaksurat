<?php

class Surat_model extends Databases
{

    public function getSurat()
    {
        $query = $this->dbh->prepare("SELECT * FROM surat");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getLaporan()
    {
        $chandra = $this->dbh->query("SELECT * FROM laporan");
        $chandra->execute();
        return $chandra->fetchAll();
    }

    public function getManual()
    {
        $chandra = $this->dbh->query("SELECT * FROM laporan");
        $chandra->execute();
        return $chandra->fetchAll();
    }
}
