<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once('../../config/db.php');
include_once('../../model/question.php');

$db = new DatabaseDB();
$connect = $db->connect();

$question = new Question($connect);
$read = $question->read();

$num = $read->rowCount();


if ($num > 0) {
    $question_array = [];
    $question_array['data'] = [];

    while ($row = $read->fetch(PDO::FETCH_ASSOC)) {
        extract($row);

        $question_item = array(
            'id_question' => $id_cauhoi,
            'cau_a' => $cau_a,
            'auc_b' => $cau_b,
            'cau_c' => $cau_c,
            'cau_d' => $cau_d,
            'cau_dung' => $cau_dung,
        );
        array_push($question_array['data'], $question_item);
    }
    echo json_encode($question_array);
}