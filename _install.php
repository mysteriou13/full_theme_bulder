<?php

require_once(ABSPATH . 'wp-admin/includes/upgrade.php');

// $sql_create_table_wor1848_section = "
//   CREATE TABLE `wor1848_section` (
//     `id` int(11) NOT NULL,
//     `name_section` text NOT NULL
//   ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
// ";

// $r = dbDelta($sql_create_table_wor1848_section);

/*
--  ASIDE
*/

$sql_create_table_aside = "
  CREATE TABLE `wor1848_aside` (
    `id` int(11) NOT NULLAUTO_INCREMENT,
    `name_link` text NOT NULL,
    `link_page` text NOT NULL,
    `section` int(11) NOT NULL,
    `type_link` text NOT NULL,
    PRIMARY KEY (ID)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
";

dbDelta($sql_create_table_aside);

function insert_into_aside($id, $name_link, $link_page, $section, $type_link)
{
  global $wpdb;
  $sql = $wpdb->prepare("INSERT INTO `{$wpdb->prefix}aside` (`id`,`name_link`,`link_page`,`section`,`type_link`) values ($id, $name_link, $link_page, $section, $type_link)");
  return $wpdb->query($sql);
}

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

// $sql_create_table_wor1848_posts = "
//   CREATE TABLE `wor1848_posts` (
//     `ID` bigint(20) UNSIGNED NOT NULL,
//     `post_author` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
//     `post_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
//     `post_date_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
//     `post_content` longtext COLLATE utf8mb4_unicode_520_ci NOT NULL,
//     `post_title` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
//     `post_excerpt` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
//     `post_status` varchar(20) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT 'publish',
//     `comment_status` varchar(20) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT 'open',
//     `ping_status` varchar(20) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT 'open',
//     `post_password` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
//     `post_name` varchar(200) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
//     `to_ping` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
//     `pinged` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
//     `post_modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
//     `post_modified_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
//     `post_content_filtered` longtext COLLATE utf8mb4_unicode_520_ci NOT NULL,
//     `post_parent` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
//     `guid` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
//     `menu_order` int(11) NOT NULL DEFAULT 0,
//     `post_type` varchar(20) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT 'post',
//     `post_mime_type` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
//     `comment_count` bigint(20) NOT NULL DEFAULT 0
//   ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
// ";

// dbDelta($sql_create_table_wor1848_posts);

// function insert_into_posts($id, $name_link, $link_page, $section, $type_link)
// {
//   global $wpdb;
//   $sql = $wpdb->prepare(
//     "INSERT INTO `{$wpdb->prefix}aside` (`id`,`name_link`,`link_page`,`section`,`type_link`) 
//       values ($id, $name_link, $link_page, $section, $type_link)"
//   );
//   return $wpdb->query($sql);
// }


// ...

?>