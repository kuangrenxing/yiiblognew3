<?php

class m110929_104104_init extends CDbMigration
{
	public function up()
	{
	    $sql = "--
-- 数据库: `blog`
--

-- --------------------------------------------------------

--
-- 表的结构 `Bookmark`
--

CREATE TABLE IF NOT EXISTS `Bookmark` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `postId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_bookmark_post` (`postId`),
  KEY `FK_bookmark_user` (`userId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `Category`
--

CREATE TABLE IF NOT EXISTS `Category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `Category`
--

INSERT INTO `Category` (`id`, `name`, `slug`) VALUES
(1, 'test', 'test');

-- --------------------------------------------------------

--
-- 表的结构 `Comment`
--

CREATE TABLE IF NOT EXISTS `Comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `contentDisplay` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `status` int(11) NOT NULL,
  `createTime` int(11) DEFAULT NULL,
  `authorName` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `postId` int(11) NOT NULL,
  `authorId` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_comment_post` (`postId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `Comment`
--

INSERT INTO `Comment` (`id`, `content`, `contentDisplay`, `status`, `createTime`, `authorName`, `email`, `postId`, `authorId`) VALUES
(3, 'comment', '<p>comment</p>\n', 1, 1317292047, 'casa', 'casatwy@msn.com', 2, 1),
(4, 'comment', '<p>comment</p>\n', 1, 1317292072, 'test', 'casatwy@msn.com', 2, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `File`
--

CREATE TABLE IF NOT EXISTS `File` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `createTime` int(11) DEFAULT NULL,
  `alt` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `Page`
--

CREATE TABLE IF NOT EXISTS `Page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(128) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `createTime` int(11) DEFAULT NULL,
  `updateTime` int(11) DEFAULT NULL,
  `authorId` int(11) NOT NULL,
  `authorName` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_page_author` (`authorId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `Page`
--

INSERT INTO `Page` (`id`, `title`, `slug`, `content`, `status`, `createTime`, `updateTime`, `authorId`, `authorName`) VALUES
(1, 'testPage', 'testpage', '<p>\r\n	testContent</p>\r\n', 1, 1317291817, 1317291817, 1, 'casa');

-- --------------------------------------------------------

--
-- 表的结构 `Post`
--

CREATE TABLE IF NOT EXISTS `Post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(128) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `titleLink` varchar(128) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `contentshort` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `contentbig` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `tags` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `status` int(11) NOT NULL,
  `createTime` int(11) DEFAULT NULL,
  `updateTime` int(11) DEFAULT NULL,
  `commentCount` int(11) DEFAULT '0',
  `categoryId` int(11) DEFAULT NULL,
  `authorId` int(11) NOT NULL,
  `authorName` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `title2` varchar(128) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `content2` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_post_author` (`authorId`),
  KEY `FK_post_category` (`categoryId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `Post`
--

INSERT INTO `Post` (`id`, `title`, `titleLink`, `slug`, `contentshort`, `contentbig`, `tags`, `status`, `createTime`, `updateTime`, `commentCount`, `categoryId`, `authorId`, `authorName`, `title2`, `content2`) VALUES
(2, 'title', '', 'title', '<p>\r\n	content</p>\r\n', NULL, 'tag', 1, 1317291728, 1317291728, 2, NULL, 1, 'casa', '', '');

-- --------------------------------------------------------

--
-- 表的结构 `PostTag`
--

CREATE TABLE IF NOT EXISTS `PostTag` (
  `postId` int(11) NOT NULL,
  `tagId` int(11) NOT NULL,
  PRIMARY KEY (`postId`,`tagId`),
  KEY `FK_tag` (`tagId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `PostTag`
--

INSERT INTO `PostTag` (`postId`, `tagId`) VALUES
(2, 4);

-- --------------------------------------------------------

--
-- 表的结构 `Tag`
--

CREATE TABLE IF NOT EXISTS `Tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `Tag`
--

INSERT INTO `Tag` (`id`, `name`) VALUES
(1, ''),
(2, ''),
(3, ''),
(4, '');

-- --------------------------------------------------------

--
-- 表的结构 `User`
--

CREATE TABLE IF NOT EXISTS `User` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL,
  `banned` int(11) NOT NULL,
  `avatar` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `passwordLost` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `confirmRegistration` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `about` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `User`
--

INSERT INTO `User` (`id`, `username`, `password`, `email`, `url`, `status`, `banned`, `avatar`, `passwordLost`, `confirmRegistration`, `about`) VALUES
(1, 'casa', '6752324b14fe3c3c8df0d973e5ae32ed', 'casatwy@msn.com', '', 0, 0, 'n1gdeyn4wt.jpg', NULL, NULL, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;";
	    return Yii::app()->db->createCommand($sql)->execute();
	}

	public function down()
	{
		return true;
	}

	/*
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
	}

	public function safeDown()
	{
	}
	*/
}