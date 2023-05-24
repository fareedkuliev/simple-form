<?php

function createConnect(){
    $connect = mysqli_connect('localhost', 'root', '', 'niistrom-test');
    return $connect;
}

function getProtocols(){
    $protocols = mysqli_query(createConnect(), 'SELECT * FROM protocol_table;' );

    $foundProtocol = [];
    foreach($protocols as $protocol){
        $foundProtocol[] = $protocol;
    }

    return $foundProtocol;
}

function addProtocol() {

}
