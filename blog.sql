-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2011 年 10 月 03 日 14:45
-- 服务器版本: 5.1.54
-- PHP 版本: 5.3.5-1ubuntu7.2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `Category`
--

CREATE TABLE IF NOT EXISTS `Category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `Comment`
--

CREATE TABLE IF NOT EXISTS `Comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `contentDisplay` text COLLATE utf8_unicode_ci,
  `status` int(11) NOT NULL,
  `createTime` int(11) DEFAULT NULL,
  `authorName` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `postId` int(11) NOT NULL,
  `authorId` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_comment_post` (`postId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `File`
--

CREATE TABLE IF NOT EXISTS `File` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `createTime` int(11) DEFAULT NULL,
  `alt` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `Page`
--

CREATE TABLE IF NOT EXISTS `Page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `createTime` int(11) DEFAULT NULL,
  `updateTime` int(11) DEFAULT NULL,
  `authorId` int(11) NOT NULL,
  `authorName` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_page_author` (`authorId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `Post`
--

CREATE TABLE IF NOT EXISTS `Post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `titleLink` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `contentshort` text COLLATE utf8_unicode_ci NOT NULL,
  `contentbig` text COLLATE utf8_unicode_ci,
  `tags` text COLLATE utf8_unicode_ci,
  `status` int(11) NOT NULL,
  `createTime` int(11) DEFAULT NULL,
  `updateTime` int(11) DEFAULT NULL,
  `commentCount` int(11) DEFAULT '0',
  `categoryId` int(11) DEFAULT NULL,
  `authorId` int(11) NOT NULL,
  `authorName` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `title2` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `content2` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_post_author` (`authorId`),
  KEY `FK_post_category` (`categoryId`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `Post`
--

INSERT INTO `Post` (`id`, `title`, `titleLink`, `slug`, `contentshort`, `contentbig`, `tags`, `status`, `createTime`, `updateTime`, `commentCount`, `categoryId`, `authorId`, `authorName`, `title2`, `content2`) VALUES
(5, 'test', '', 'test', '<p>\r\n	content</p>\r\n', NULL, 'tags', 1, 1317622557, 1317622557, 0, NULL, 1, 'casa', '中文', '中文内容');

-- --------------------------------------------------------

--
-- 表的结构 `PostTag`
--

CREATE TABLE IF NOT EXISTS `PostTag` (
  `postId` int(11) NOT NULL,
  `tagId` int(11) NOT NULL,
  PRIMARY KEY (`postId`,`tagId`),
  KEY `FK_tag` (`tagId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `PostTag`
--

INSERT INTO `PostTag` (`postId`, `tagId`) VALUES
(5, 6);

-- --------------------------------------------------------

--
-- 表的结构 `Tag`
--

CREATE TABLE IF NOT EXISTS `Tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- 转存表中的数据 `Tag`
--

INSERT INTO `Tag` (`id`, `name`) VALUES
(1, ''),
(2, ''),
(3, ''),
(4, ''),
(5, ''),
(6, '');

-- --------------------------------------------------------

--
-- 表的结构 `User`
--

CREATE TABLE IF NOT EXISTS `User` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL,
  `banned` int(11) NOT NULL,
  `avatar` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `passwordLost` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `confirmRegistration` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `about` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `User`
--

INSERT INTO `User` (`id`, `username`, `password`, `email`, `url`, `status`, `banned`, `avatar`, `passwordLost`, `confirmRegistration`, `about`) VALUES
(1, 'casa', '6752324b14fe3c3c8df0d973e5ae32ed', 'casatwy@msn.com', NULL, 0, 0, NULL, NULL, NULL, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
