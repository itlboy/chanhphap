<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

const ARTICLE_TABLE = "articles";
const ARTICLE_CATALOGUES_TABLE = "articles_catalogues";
const CATALOGUES_RELATION_TABLE = "catalogues_relationship";

$servername = "localhost";
$username = "lucltmra_import";
$password = "toiyeuvietnam";
$db = "lucltmra_wp879";

// Create connection
global $mysqli;
$mysqli = new mysqli($servername, $username, $password);
$mysqli->set_charset("utf8");
// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$mysqli->select_db($db);

/* * ************************** Processs ********************************** */
$categories = getCategories($mysqli);
$posts = getPosts($mysqli);
insertToWordpress($mysqli, "lucltmra_wp879", $categories, $posts);

//insertToNewWebsites($mysqli, $categories, $posts);

/* * ************************** Functions ********************************** */

function insertToWordpress($mysqli, $dbName, $categories, $posts) {
    $mysqli->select_db($dbName);
    $mysqli->query("TRUNCATE TABLE wprg_posts");
    $mysqli->query("TRUNCATE TABLE wprg_term_taxonomy");
    $mysqli->query("TRUNCATE TABLE wprg_term_relationships");
    $mysqli->query("TRUNCATE TABLE wprg_terms");
    $mysqli->query("TRUNCATE TABLE wprg_post_views");

    $categoriesMap = [];

    insertToTable("wprg_terms", [
        "name" => "uncategorized",
        "slug" => "uncategorized",
    ]);

    foreach ($categories as $category) {
        insertToTable("wprg_terms", [
            "name" => html_entity_decode($category['title']),
            "slug" => $category['slug'],
        ]);
        insertToTable("wprg_term_taxonomy", [
            "term_id" => $mysqli->insert_id,
            "taxonomy" => "category",
            "parent" => 0,
            "count" => 0,
        ]);
        $categoriesMap[$category['id']] = $mysqli->insert_id;
    }

    foreach ($posts as $post) {
        insertToTable("wprg_posts", [
            "post_author" => 1,
            "post_date" => date("Y-m-d H:i:s", $post['create_time']),
            "post_date_gmt" => date("Y-m-d H:i:s", $post['create_time']),
            "post_content" => $post['content'],
            "post_title" => html_entity_decode($post['title']),
            "post_excerpt" => $post['description'],
            "post_status" => $post['isPublic'] ? "publish" : "draft",
            "comment_status" => "open",
            "ping_status" => "open",
            "post_password" => "",
            "post_name" => $post['slug'],
            "to_ping" => "",
            "pinged" => "",
            "post_modified" => date("Y-m-d H:i:s", $post['update_time']),
            "post_modified_gmt" => date("Y-m-d H:i:s", $post['update_time']),
            "post_content_filtered" => "",
            "post_parent" => 0,
            "guid" => 0,
            "menu_order" => 0,
            "post_type" => "post",
            "post_mime_type" => "",
            "comment_count" => 0
        ]);

        $postId = $mysqli->insert_id;

        $postViewSql = "INSERT INTO `wprg_post_views` (`id`, `type`, `period`, `count`) VALUES ($postId,4, 'total',{$post['views']})";
        $mysqli->query($postViewSql);

        foreach ($post['categoryList'] as $oldCategoryId) {
            $newCategoryId = $categoriesMap[$oldCategoryId];
            insertToTable("wprg_term_relationships", [
                "object_id" => $postId,
                "term_taxonomy_id" => $newCategoryId,
                "term_order" => 0,
            ]);

            $sql = "UPDATE `wprg_term_taxonomy` SET `count` = `count`+ 1 WHERE `term_id` = $newCategoryId AND `taxonomy` = 'category';";
            $mysqli->query($sql);
        }
    }
}

function getPosts($mysqli) {
    $sql = "SELECT A.id, alias, catid, listcatid, hitstotal, title, hometext, bodyHtml, publtime, edittime, status "
            . "FROM `tagroup_vi_news_rows` A "
            . "JOIN tagroup_vi_news_detail B ON  A.id = B.id";
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
            "slug" => $item['alias'] . "-" . $item['id'],
            "categoryList" => explode(",", $item['listcatid']),
            "isPublic" => $item['status'] == 1 ? true : false,
        ];
    }
    return $returnResult;
}

function getCategories($mysqli) {
    $sql = "SELECT descriptionhtml, description, add_time, edit_time,catid, title, alias FROM `tagroup_vi_news_cat`";
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