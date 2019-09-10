<?php

const ARTICLE_TABLE = "new_articles";
const ARTICLE_CATALOGUES_TABLE = "new_articles_catalogues";
const CATALOGUES_RELATION_TABLE = "new_catalogues_relationship";

$servername = "localhost";
$username = "phatphap_data";
$password = "d0ncLzYn";
$db = "phatphap_data";

// Create connection
global $mysqli;
$mysqli = new mysqli($servername, $username, $password);
$mysqli->set_charset("utf8");
// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$mysqli->select_db($db);

/**************************** Processs ***********************************/

$categories = getCategories($mysqli);
$posts = getPosts($mysqli);

$mysqli->query("TRUNCATE TABLE " . ARTICLE_TABLE);
$mysqli->query("TRUNCATE TABLE " . ARTICLE_CATALOGUES_TABLE);
$mysqli->query("TRUNCATE TABLE " . CATALOGUES_RELATION_TABLE);

/** category * */
$categoriesId = [];
foreach ($categories as $index => $category) {
    insertCategory($mysqli, ARTICLE_CATALOGUES_TABLE, $category, $index + 1);
    $categoriesId[$category['id']] = $mysqli->insert_id;
}

/**************************** Posts ***********************************/

foreach ($posts as $post) {
    $categoryId = (string) $categoriesId[$post['category_id']];
    $categoryList = convertToNewCategories($categoriesId, $post["categoryList"]);
    insertPost($mysqli, ARTICLE_TABLE, $post, $categoryId, convertToNewCategories($categoriesId, $post["categoryList"]));
    $postId = $mysqli->insert_id;
    insertCategoryRelations($postId, $categoryList, $post['create_time']);
}

/**************************** Functions ***********************************/

function getCategories($mysqli) {
    $sql = "SELECT descriptionhtml, description, add_time, edit_time,catid, title, alias FROM `old_tagroup_vi_news_cat`";
    $result = $mysqli->query($sql);
    $returnResult = [];

    while ($item = $result->fetch_assoc()) {
        $returnResult[] = [
            "id" => $item['catid'],
            "title" => $item['title'],
            "slug" => $item['alias'],
            "create_time" => $item['add_time'],
            "update_time" => $item['edit_time'],
            "description" => $item['description'],
            "description_html" => $item['descriptionhtml']
        ];
    }

    return $returnResult;
}

function getPosts($mysqli) {
    $sql = "SELECT A.id, alias, catid, listcatid, hitstotal, title, hometext, bodyHtml, publtime, edittime "
            . "FROM `old_tagroup_vi_news_rows` A "
            . "JOIN old_tagroup_vi_news_detail B ON  A.id = B.id";
    $result = $mysqli->query($sql);
    $returnResult = [];

    while ($item = $result->fetch_assoc()) {
        $returnResult[] = [
            "id" => $item['id'],
            "category_id" => $item['catid'],
            "title" => $item['title'],
            "description" => $item['hometext'],
            "content" => $item['bodyHtml'],
            "views" => $item['hitstotal'],
            "create_time" => $item['publtime'],
            "update_time" => $item['edittime'],
            "slug" => $item['alias'],
            "categoryList" => explode(",", $item['listcatid'])
        ];
    }

    return $returnResult;
}

function convertToNewCategories($newCategories, $categories) {
    $result = [];
    foreach ($categories as $categoryId) {
        $result[] = (string) $newCategories[$categoryId];
    }
    return $result;
}

function insertPost($mysqli, $table, $data, $categoryId, $catagories) {
    $values = [
        "title" => html_entity_decode($data['title']),
        "slug" => $data['slug'],
        "canonical" => "",
        "cataloguesid" => $categoryId,
        "catalogues" => json_encode($catagories),
        "images" => "",
        "description" => $data['description'],
        "content" => $data['content'],
        "order" => 0,
        "viewed" => $data['views'],
        "publish" => 1,
        "ishome" => 0,
        "highlight" => -1,
        "isaside" => 0,
        "isfooter" => -1,
        "trash" => 0,
        "meta_title" => "",
        "meta_keyword" => "",
        "meta_description" => "",
        "userid_created" => 3,
        "userid_updated" => 0,
        "created" => date("Y-m-d H:i:s", $data['create_time']),
        "updated" => $data['update_time'] ? date("Y-m-d H:i:s", $data['update_time']) : "0000-00-00 00:00:00",
    ];
    insertToTable($table, $values);
}

function insertCategoryRelations($postId, $categoriesId, $createTime) {
    foreach ($categoriesId as $categoryId) {
        $columns = [
            "modules" => "articles",
            "cataloguesid" => $categoryId,
            "modulesid" => $postId,
            "created" => date("Y-m-d H:i:s", $createTime)
        ];

        insertToTable(CATALOGUES_RELATION_TABLE, $columns);
    }
}

function insertCategory($mysqli, $table, $data, $itemNo) {
    $values = [
        "title" => html_entity_decode($data['title']),
        "slug" => $data['slug'],
        "canonical" => $data['slug'],
        "created" => date("Y-m-d H:i:s", $data['create_time']),
        "updated" => $data['update_time'] ? date("Y-m-d H:i:s", $data['update_time']) : "0000-00-00 00:00:00",
        "description" => $data['description'] ? $data['description'] : stripHtml(html_entity_decode($data['description_html'])),
        "parentid" => 0,
        "lft" => $itemNo * 2,
        "rgt" => $itemNo * 2 + 1,
        "level" => 1,
        "order" => 0,
        "images" => "",
        "icon" => "",
        "viewed" => 0,
        "publish" => 1,
        "ishome" => 0,
        "highlight" => 0,
        "isaside" => 0,
        "isfooter" => -1,
        "trash" => 0,
        "meta_title" => "",
        "meta_keyword" => "",
        "meta_description" => "",
        "userid_created" => 3,
        "userid_updated" => 0,
    ];
    insertToTable($table, $values);
}

function insertToTable($tableName, $data, $debug = false) {
    global $mysqli;
    $columnString = "";
    $valueString = "";
    foreach ($data as $column => $value) {
        if ($columnString) {
            $columnString .= ", ";
        }
        if ($valueString) {
            $valueString .= ", ";
        }
        $columnString .= "`$column`";
        $valueString .= "'" . $mysqli->escape_string($value) . "'";
    }
    $sql = "INSERT INTO $tableName ($columnString) VALUES ($valueString)";
    if ($debug) {
        echo $sql;
        die();
    }
    $mysqli->query($sql);
}

function stripHtml($des) {
    $clear = strip_tags($des);
// Clean up things like &amp;
    $clear = html_entity_decode($clear);
// Strip out any url-encoded stuff
    $clear = urldecode($clear);
// Replace non-AlNum characters with space
//    $clear = preg_replace('/[^A-Za-z0-9]/', ' ', $clear);
//// Replace Multiple spaces with single space
//    $clear = preg_replace('/ +/', ' ', $clear);
// Trim the string of leading/trailing space
    $clear = trim($clear);
    return $clear;
}

?>