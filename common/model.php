<?php

// Insert
function createInsert($arrayData)
{
    $col = "";
    $val = "";
    if (!empty($arrayData)) {

        foreach ($arrayData as $key => $value) {
            $col .= "`$key`,";
            $val .= "'$value',";
        }
        $newQuery['col'] = rtrim($col, ", ");
        $newQuery['val'] = rtrim($val, ", ");
    }
    return $newQuery;
}

function insert($arrayData, $table)
{
    $newQuery   = createInsert($arrayData);

    $query = "INSERT INTO $table(" . $newQuery['col'] . ") VALUES(" . $newQuery['val'] . ")";

    pdo_execute($query);
}



// $arrayData = ['cate_name' => 'Tam', 'id'=>2];
// UPDATE SET TABLE(`id`='2',`name`='Áo Phong') WHERE id='id';
function createUpdate($arrayData)
{
    $newQuery = "";
    if (!empty($arrayData)) {
        foreach ($arrayData as $key => $value) {
            $newQuery .= "`$key` = '$value', ";
        }
        $newQuery = rtrim($newQuery, ", ");
    }
    return $newQuery;
}

function update($arrayData, $table, $id)
{
    if (!empty($arrayData)) {
        $newQuery   = createUpdate($arrayData);
        $sql        = " UPDATE $table SET $newQuery WHERE `id`=$id";
        pdo_execute($sql);
    }
}

// 
function delete($table, $id)
{
    $sql = "DELETE FROM $table WHERE `id` = '$id'";
    pdo_execute($sql);
}


function createWhereDeleteSql($data)
{
    $newWhere = "";
    if (!empty($data)) {
        foreach ($data as $id) {
            $newWhere .= "'" . $id . "', ";
        }
        $newWhere = rtrim($newWhere, ", ");
    }
    return $newWhere;
}


// DELETE 
function deleteMulti($where, $table)
{
    $newWhere  = createWhereDeleteSql($where);
    $query = "DELETE FROM `$table` WHERE id IN ($newWhere)";
    pdo_execute($query);
}

// CREATE WHERE DELETE SQL



function listRecord($sql)
{
    $result = "";
    if (!empty($sql)) {
        $result = pdo_query($sql);
    }

    return $result;
}

function singleRecord($sql)
{
    $result = "";
    if (!empty($sql)) {
        $result = pdo_query_one($sql);
    }

    return $result;
}






// ===============================
function insert_lastID($arrayData, $table)
{
    $newQuery   = createInsert($arrayData);

    echo $query = "INSERT INTO `$table`(" . $newQuery['col'] . ") VALUES(" . $newQuery['val'] . ")";

    $conn = pdo_get_connection();
    $stmt = $conn->prepare($query);
    $stmt->execute();

    return $conn->lastInsertId();
}
