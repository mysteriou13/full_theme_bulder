<?php

require_once(ABSPATH . 'wp-admin/includes/upgrade.php');

$sql_create_table_section = "
  CREATE TABLE `{$wpdb->prefix}section` (
    `id` int(11) NOT NULL,
    `name_section` text NOT NULL,
    PRIMARY KEY (ID)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
";

function insert_into_section($id, $name_section)
{
  global $wpdb;
  $wpdb->insert(
    $wpdb->prefix . "section",
    array(
      'id' => $id,
      'name_section' => $name_section
    )
  );
}

dbDelta($sql_create_table_section);
insert_into_section(3, 'Liens partenaires');
insert_into_section(4, 'Liens d\'artistes hikikomori');
insert_into_section(5, 'Porfolio de Shiyou (artiste)');

/*
--  ASIDE
*/

$sql_create_table_aside = "
  CREATE TABLE `{$wpdb->prefix}aside` (
    `id` int(11) NOT NULLAUTO_INCREMENT,
    `name_link` text NOT NULL,
    `link_page` text NOT NULL,
    `section` int(11) NOT NULL,
    `type_link` text NOT NULL,
    PRIMARY KEY (ID)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
";

function insert_into_aside($id, $name_link, $link_page, $section, $type_link)
{
  global $wpdb;
  $wpdb->insert(
    $wpdb->prefix . "aside",
    array(
      'id' => $id,
      'name_link' => $name_link,
      'link_page' => $link_page,
      'section' => $section,
      'type_link' => $type_link
    )
  );
}

dbDelta($sql_create_table_aside);
insert_into_aside(65, 'Hikipos.info (Média Japonais)', 'https://www.hikipos.info/', 3, '2');
insert_into_aside(66, 'Forumactif hikikomori', 'https://hikikomori.forumactif.org/forum', 3, '2');
insert_into_aside(65, 'Hikipos.info (Média Japonais)', 'https://www.hikipos.info/', 3, '2');
insert_into_aside(66, 'Forumactif hikikomori', 'https://hikikomori.forumactif.org/forum', 3, '2');
insert_into_aside(67, 'Site Rin (écrivaine)', 'http://bubble-writter.fr/', 4, '2');
insert_into_aside(83, 'Site de Sylvain (blog psychologie)', 'https://www.promethee-devperso.com/', 4, '2');
insert_into_aside(84, ' Site Catherine (artiste)', 'http://catherinelapeyre.free.fr/', 4, '2');
insert_into_aside(85, ' Site Catherine (artiste)', 'http://catherinelapeyre.free.fr/', 0, '2');
insert_into_aside(86, ' Site de Vincent (Artiste Photographe, Compositeur, Infographiste)', 'https://vincentlepeigneul.fr/', 5, '2');
insert_into_aside(89, 'Instagram de Sayttara (Artiste manga)', 'https://www.instagram.com/sayeuttara/', 5, '2');
insert_into_aside(90, 'Site de poèmes anglais d\\\'une hiki chez nous.', 'https://www.poemsfromthedesert.com/', 5, '2');
insert_into_aside(91, 'Site de Tabris, cosplay.', 'https://www.facebook.com/TabrisPropsAndCosplay/', 5, '2');

/*
--  POSTS
*/

$sql_create_table_posts = "
  CREATE TABLE `{$wpdb->prefix}posts` (
    `ID` bigint(20) UNSIGNED NOT NULL,
    `post_author` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
    `post_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
    `post_date_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
    `post_content` longtext COLLATE utf8mb4_unicode_520_ci NOT NULL,
    `post_title` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
    `post_excerpt` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
    `post_status` varchar(20) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT 'publish',
    `comment_status` varchar(20) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT 'open',
    `ping_status` varchar(20) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT 'open',
    `post_password` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
    `post_name` varchar(200) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
    `to_ping` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
    `pinged` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
    `post_modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
    `post_modified_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
    `post_content_filtered` longtext COLLATE utf8mb4_unicode_520_ci NOT NULL,
    `post_parent` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
    `guid` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
    `menu_order` int(11) NOT NULL DEFAULT 0,
    `post_type` varchar(20) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT 'post',
    `post_mime_type` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
    `comment_count` bigint(20) NOT NULL DEFAULT 0,
    PRIMARY KEY (ID)
    KEY `post_name` (`post_name`(191))
    KEY `type_status_date` (`post_type`,`post_status`,`post_date`,`ID`)
    KEY `post_parent` (`post_parent`)
    KEY `post_author` (`post_author`)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
";


function insert_into_posts($id, $post_author, $post_date, $post_date_gmt, $post_content, $post_title, $post_excerpt, $post_status, $comment_status, $ping_status, $post_password, $post_name, $to_ping, $pinged, $post_modified, $post_modified_gmt, $post_content_filtered, $post_parent, $guid, $menu_order, $post_type, $post_mime_type, $comment_count)
{
  global $wpdb;
  $wpdb->insert(
    $wpdb->prefix . "aside",
    array(
      'id' => $id,
      'post_author' => $post_author,
      'post_content' => $post_date_gmt,
      'post_title' => $post_title,
      'post_excerpt' => $post_excerpt,
      'post_status' => $post_status,
      'comment_status' => $comment_status,
      'ping_status' => $ping_status,
      'post_password' => $post_password,
      'post_name' => $post_name,
      'to_ping' => $to_ping,
      'pinged' => $pinged,
      'post_modified' => $post_modified,
      'post_modified_gmt' => $post_modified_gmt,
      'post_content_filtered' => $post_content_filtered,
      'post_parent' => $post_parent,
      'guid' => $guid,
      'menu_order' => $menu_order,
      'post_type' => $post_type,
      'post_mime_type' => $post_mime_type,
      'comment_count' => $comment_count
    )
  );
}

function read_posts_file($filepath)
{
  include $filepath;
  global $wpdb;
  // $file = fopen($filepath, "r") or die("Unable to open file!");
  // $data = fread($file, filesize($filepath));
  // dbDelta($data);
  // fclose($file);
}

read_posts_file(__DIR__ . "/wor1848_posts.sql");
// $path = __DIR__ . "/wor1848_posts.sql";
// exec("wp db import {$path}");

?>