<?php

    // Get data
    function getData($fields, $table, $where = NULL, $where_fields){

        global $db_conn;
        $data = mysqli_query($db_conn, "SELECT $fields from $table $where $where_fields");

        return $data;
    }

    function insertData($table, $fields, $values){
        global $db_conn;
        $data = mysqli_query($db_conn, "INSERT INTO $table($fields) VALUES($values)");

        return $data;
    }