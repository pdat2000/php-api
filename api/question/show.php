<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once('../../config/db.php');
include_once('../../model/question.php');

$db = new DatabaseDB();
$connect = $db->connect();

$question = new Question($connect);
$question->id_cauhoi = isset($_GET['id']) ? $_GET['id'] : die();

$question->show();

$question_item = array(
    'id_question' => $question->id_cauhoi,
    'cau_a' => $question->cau_a,
    'auc_b' => $question->cau_b,
    'cau_c' => $question->cau_c,
    'cau_d' => $question->cau_d,
    'cau_dung' => $question->cau_dung,
);

print_r($question_item);