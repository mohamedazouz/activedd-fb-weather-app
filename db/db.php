CREATE TABLE IF NOT EXISTS `post_timer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `page_id` varchar(100) NOT NULL,
  `page_name` varchar(200) NOT NULL,
  `page_access_token` varchar(200) NOT NULL,
  `city` varchar(150) NOT NULL,
  `text` varchar(200) NOT NULL,
  `min` int(11) NOT NULL DEFAULT '0',
  `hour` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=78 ;