CREATE TABLE IF NOT EXISTS `#__pricetable_pricetable` (
 `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `plan_title` varchar(255) NOT NULL,
  `plan_cat` int(11) NOT NULL,
  `header_top_color` varchar(255) NOT NULL,
  `header_bottom_color` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `plan_subtext` varchar(255) NOT NULL,
  `details` varchar(255) NOT NULL,
  `features` text NOT NULL,
  `button_text` varchar(255) NOT NULL,
  `button_url` varchar(255) NOT NULL,
  `button_color` varchar(255) NOT NULL,
  `ordering` int(11) NOT NULL,
  `state` tinyint(1) NOT NULL,
  `checked_out` int(11) NOT NULL,
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) DEFAULT COLLATE=utf8_general_ci;

