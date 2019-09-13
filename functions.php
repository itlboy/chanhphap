<?php
function getCategoryChoices() {
    $categories = get_categories(array(
        'orderby' => 'name',
        'order' => 'ASC'
    ));
    $categoryChoices = [];
    foreach ($categories as $category) {
        $categoryChoices[$category->term_id] = $category->name;
    }
    return $categoryChoices;
}

function starter_customize_register($wp_customize) {
    $wp_customize->add_section('starter_new_section_name', array(
        'title' => __('Visible Section Name', 'starter'),
        'priority' => 10
    ));

    $wp_customize->add_setting('home_page_number_rows_post', array(
        'default' => 2,
        'transport' => 'refresh',
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'home_page_number_rows_post', array(
        'label' => __('Số hàng bài viết trang chủ', 'starter'),
        'section' => 'static_front_page',
        'settings' => 'home_page_number_rows_post',
        'type' => 'select',
        'choices' => [1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 5, 6 => 6]
    )));

    $wp_customize->add_setting('home_page_category_setting', array(
        'default' => '#000000',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'home_page_category_1', array(
        'label' => __('Danh mục trang chủ thứ nhất', 'starter'),
        'section' => 'static_front_page',
        'settings' => 'home_page_category_setting',
        'type' => 'select',
        "choices" => getCategoryChoices(),
    )));

    /*     * ************* Default feature image ****************** */
    $wp_customize->add_section('general_settings', array(
        'title' => __('Cài đặt chung'),
        'priority' => 10
    ));

    $wp_customize->add_setting('default_feature_image', array(
        'transport' => 'refresh',
    ));
}

add_action('customize_register', 'starter_customize_register');

/* * ************* Register menu *************** */

function register_my_menu() {
    register_nav_menu('header-menu', __('Header Menu'));
}

add_action('init', 'register_my_menu');
add_theme_support('post-thumbnails');

function get_breadcrumb() {
    echo '<a href="' . home_url() . '" rel="nofollow">Home</a>';
    if (is_category() || is_single()) {
        echo "&nbsp;&nbsp;&#187;&nbsp;&nbsp;";
        the_category(' &bull; ');
        if (is_single()) {
            echo " &nbsp;&nbsp;&#187;&nbsp;&nbsp; ";
            the_title();
        }
    } elseif (is_page()) {
        echo "&nbsp;&nbsp;&#187;&nbsp;&nbsp;";
        echo the_title();
    } elseif (is_search()) {
        echo "&nbsp;&nbsp;&#187;&nbsp;&nbsp;Search Results for... ";
        echo '"<em>';
        echo the_search_query();
        echo '</em>"';
    }
}

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
