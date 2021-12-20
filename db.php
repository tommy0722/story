<?php
// 連結sql的字串指令
$dsn = "mysql:host=localhost;charset=utf8;dbname=mypolling";
// 新建資料庫(連結路徑語言資料庫名稱,帳號,密碼)
$pdo = new PDO($dsn, 'root', '');
session_start();

//取得符合條件的一筆資料
function find($table, $id)
{
    // 全域變數呼叫$pdo
    global $pdo;
    // sql語法 搜尋 全部的資料 從 變數$table(看帶甚麼值進去) 條件 (ex：id=1...)
    $sql = "SELECT * FROM `$table` WHERE ";
    // 如果變數id是陣列則：
    if (is_array($id)) {
        // 列出所有陣列內容，並用key，value方式執行
        foreach ($id as $key => $value) {
            // 變數tmp為陣列，裡面存著$key=value
            $tmp[] = "`$key`='$value'";
        }
        // implode：在陣列中加入字串
        $sql = $sql . implode(" AND ", $tmp);
    } else {
        $sql = $sql . "`id`='$id'";
    }

    return $pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
}

//計算符合條件的資料筆數
function rows($table, $array)
{
    global $pdo;
    // count 計算次數
    $sql = "SELECT count(*) FROM `$table` WHERE ";
    foreach ($array as $key => $value) {
        $tmp[] = "`$key`='$value'";
    }

    $sql = $sql . implode(" AND ", $tmp);
    // 取得第一欄位資料
    return $pdo->query($sql)->fetchColumn();
}



//取出指定資料表的所有資料
// 語法，非固定數量的變數
function all($table, ...$arg)
{
    global $pdo;
    $sql = "SELECT * FROM `$table` ";
    // 如果$arg[0]存在
    if (isset($arg[0])) {
        // 如果$arg[0]是陣列
        if (is_array($arg[0])) {
            foreach ($arg[0] as $key => $value) {
                $tmp[] = "`$key`='$value'";
            }

            $sql = $sql . "where " . implode(" AND ", $tmp);
            // 因為不是陣列所以回傳字串
        } else {
            $sql = $sql . $arg[0];
        }
    }

    if (isset($arg[1])) {
        $sql = $sql . $arg[1];
    }

    //echo $sql;
    // query：查詢，fetchAll(PDO::FETCH_ASSOC)：返回以欄位名稱作為索引鍵(key)的陣列(array)
    $rows = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
    //return $pdo->query($sql)->fetchAll();
}

// 更新資料庫
function update($table, $column, $where)
{
    global $pdo;
    // 為一個空字串
    $sql_set = '';
    foreach ($column as $key => $value) {
        // 將陣列key,value轉成字串
        $sql_set = $sql_set . "`$key`='$value',";
    }
    // trim：刪除不必要的符號(這裡刪除,)
    $sql_set = trim($sql_set, ',');

    $sql_where = '';
    foreach ($where as $key => $value) {
        $sql_where = $sql_where . "`$key`='$value' AND ";
    }
    // 還在想怎麼註解
    $sql_where = mb_substr($sql_where, 0, mb_strlen($sql_where) - 5);;

    mb_substr($sql_where, 0, mb_strlen($sql_where) - 5);
    $sql = "UPDATE `$table` SET $sql_set WHERE $sql_where ";
    echo $sql . "<br>";
    $pdo->exec($sql);
}


function insert($table, $array)
{
    global $pdo;


    $sql = "INSERT into $table(`" . implode('`,`', array_keys($array)) . "`) 
                        value('" . implode("','", $array) . "')";

    echo $sql . "<br>";
    return $pdo->exec($sql);
}



function del($table, $id)
{
    global $pdo;
    $sql = "DELETE FROM `$table` WHERE ";
    if (is_array($id)) {
        foreach ($id as $key => $value) {
            $tmp[] = "`$key`='$value'";
        }

        $sql = $sql . implode(" AND ", $tmp);
    } else {
        $sql = $sql . "`id`='$id'";
    }
    return $pdo->exec($sql);
}
// 導向網站
function to($url)
{
    header("location:" . $url);
}

//任意查詢函式
function q($sql)
{
    global $pdo;
    return $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
}


function dd($array)
{
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}
