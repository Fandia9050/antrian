<?php

function map($arr, $key, $val){
    $d = [];
    foreach ($arr as $data ) {
        $d[$data[$key]] = $data[$val];
    }

    return $d;
}

?>