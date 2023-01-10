<?php
class Question
{
    private $conn;

    public $id_cauhoi;
    public $title;
    public $cau_a;
    public $cau_b;
    public $cau_c;
    public $cau_d;
    public $cau_dung;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function read()
    {
        $question = 'SELECT * FROM cauhoi ORDER BY id_cauhoi DESC';
        $stmt = $this->conn->prepare($question);
        $stmt->execute();
        return $stmt;
    }

    public function show()
    {
        $query = 'SELECT * FROM cauhoi WHERE $id_cauhoi LIMIT 1';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id_cauhoi);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->title = $row['title'];
        $this->cau_a = $row['cau_a'];
        $this->cau_b = $row['cau_b'];
        $this->cau_c = $row['cau_c'];
        $this->cau_d = $row['cau_d'];
        $this->cau_dung = $row['cau_dung'];
    }
}