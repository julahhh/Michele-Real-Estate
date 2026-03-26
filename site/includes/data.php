<?php
// -------------------------------------------------
//This file contains helper functions for reading and writing JSON data.
//It is used by the admin panel to manage property listings and admin credentials.
// -------------------------------------------------

function readJson($file){
    return json_decode(file_get_contents($file), true) ?? [];
}

function writeJson($file, $data){
    file_put_contents($file, json_encode($data, JSON_PRETTY_PRINT));
}