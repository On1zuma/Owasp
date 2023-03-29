<?php

class DataController
{
    private $bdd;

    public function __construct()
    {
        $this->bdd = new PDO('mysql:host=localhost;dbname=owasp;charset=utf8;', 'root', '');
    }

    public function listOfRowNameWithId($tableUrl, $id)
    {
        $tableName = $tableUrl;
        $stmt = $this->bdd->prepare("SELECT * FROM $tableName WHERE id = ?");
        $stmt->execute(array($id));

        $rows = array();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $rows[] = $row;
        }
        return $rows;
    }
}
