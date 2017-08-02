<?php

$data = $_POST;
$data['success'] = 1;

echo json_encode($data);