-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2016 at 08:16 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `transport`
--

-- --------------------------------------------------------

--
-- Table structure for table `cms_category`
--

CREATE TABLE `cms_category` (
  `category_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `category_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `category_slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `category_desc` text COLLATE utf8_unicode_ci NOT NULL,
  `category_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `category_status` enum('Active','Inactive') COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cms_category`
--

INSERT INTO `cms_category` (`category_id`, `section_id`, `category_name`, `category_slug`, `category_desc`, `category_image`, `category_status`) VALUES
(1, 1, 'content', 'content', '<p>\r\n	content</p>\r\n', '', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `cms_content`
--

CREATE TABLE `cms_content` (
  `content_id` int(255) NOT NULL,
  `section_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `content_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title_alias` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `content_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `meta_keyword` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `meta_desc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `publish_date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `unpublish_date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content_status` enum('Active','Inactive') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Active'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cms_content`
--

INSERT INTO `cms_content` (`content_id`, `section_id`, `category_id`, `content_title`, `title_alias`, `content`, `content_image`, `meta_keyword`, `meta_desc`, `publish_date`, `unpublish_date`, `created`, `updated`, `content_status`) VALUES
(1, 1, 1, 'Home', 'home', '<div class="col-sm-6">\r\n 	\r\n{SLIDER-HOME-PAGE-SLIDER}\r\n</div>\r\n<div class="col-sm-6">\r\n	<div class="section-content">\r\n		<h2>\r\n			Why Choose Us</h2>\r\n		<hr class="fade-right" />\r\n		<p>\r\n			Lid est laborum dolo rumes fugats untras. Etha rums ser quidem rerum facilis dolores nemis onis fugats vitaes nemo minima rerums unsers sadips amets.</p>\r\n		<p>\r\n			Ut enim ad minim veniam, quis nostrud Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci amets uns.</p>\r\n		<p>\r\n			Etharums ser quidem rerum facilis dolores nemis omnis fugats vitaes nemo minima rerums unsers sadips ameet quasi architecto beatae vitae dicta sunt explicabo</p>\r\n		<ul>\r\n			<li>\r\n				Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim.</li>\r\n			<li>\r\n				Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu.</li>\r\n			<li>\r\n				Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy.</li>\r\n			<li>\r\n				Ut enim ad minim veniam, quis nostrud Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci amets uns.</li>\r\n			<li>\r\n				Etharums ser quidem rerum facilis dolores nemis omnis fugats vitaes nemo minima rerums unsers sadips ameet quasi architecto beatae vitae dicta sunt explicabo.</li>\r\n		</ul>\r\n		<hr class="fade-right" />\r\n		<a class="btn btn-default" href="#">Learn more...</a></div>\r\n</div>\r\n', '', '', '', '', '', '2016-05-21 09:55:23', '', 'Active'),
(2, 1, 1, 'About Us', 'about-us', '<p>\r\n	This is the about us page.</p>\r\n<p>\r\n	&nbsp;</p>\r\n', '', '', '', '', '', '2016-05-24 07:01:56', '', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `cms_menus`
--

CREATE TABLE `cms_menus` (
  `menu_id` int(11) NOT NULL,
  `menu_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `menu_desc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `menu_status` enum('Active','Inactive') COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cms_menus`
--

INSERT INTO `cms_menus` (`menu_id`, `menu_title`, `menu_desc`, `menu_status`) VALUES
(1, 'Main menu', 'main menu', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `cms_menu_item`
--

CREATE TABLE `cms_menu_item` (
  `mi_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `mi_parant_menu` int(11) NOT NULL DEFAULT '0',
  `mi_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mi_alias` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mi_item_type` int(11) NOT NULL,
  `content_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `mi_link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `visible_to` int(11) NOT NULL,
  `mi_target` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `mi_template` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mi_order` int(11) NOT NULL,
  `mi_status` enum('Active','Inactive') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Active'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cms_menu_item`
--

INSERT INTO `cms_menu_item` (`mi_id`, `menu_id`, `mi_parant_menu`, `mi_title`, `mi_alias`, `mi_item_type`, `content_id`, `section_id`, `mi_link`, `visible_to`, `mi_target`, `mi_template`, `mi_order`, `mi_status`) VALUES
(1, 1, 0, 'home', 'home', 1, 1, 0, 'content', 1, '_parent', 'home', 0, 'Active'),
(2, 1, 0, 'Join', 'join', 2, 0, 0, 'register', 1, '_parent', 'content', 0, 'Active'),
(3, 1, 0, 'Login', 'login', 2, 0, 0, 'login', 1, '_parent', 'content', 0, 'Active'),
(4, 1, 0, 'Dashboard', 'dashboard', 2, 0, 0, 'dashboard', 2, '_blank', 'content', 0, 'Active'),
(5, 1, 0, 'about', 'about', 1, 2, 0, 'about-us', 3, '_parent', 'content', 0, 'Active'),
(6, 1, 0, 'logout', 'logout', 2, 0, 0, 'login/logout', 2, '_parent', 'content', 0, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `cms_section`
--

CREATE TABLE `cms_section` (
  `section_id` int(11) NOT NULL,
  `section_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `section_slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `section_desc` text COLLATE utf8_unicode_ci NOT NULL,
  `section_status` enum('Active','Inactive') COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cms_section`
--

INSERT INTO `cms_section` (`section_id`, `section_name`, `section_slug`, `section_desc`, `section_status`) VALUES
(1, 'content', 'content', '<p>\r\n	content</p>\r\n', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `cms_slider`
--

CREATE TABLE `cms_slider` (
  `id` int(11) NOT NULL,
  `slider_name` varchar(255) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `image_title` varchar(255) NOT NULL,
  `shortcode` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cms_slider`
--

INSERT INTO `cms_slider` (`id`, `slider_name`, `image_name`, `image_title`, `shortcode`) VALUES
(2, 'home-page-slider', '146398417275718.jpg', 'transport 2', '{SLIDER-HOME-PAGE-SLIDER}'),
(3, 'home-page-slider', '146398417310450.jpg', 'transport 3', '{SLIDER-HOME-PAGE-SLIDER}'),
(4, 'home-page-slider', '146398417390770.jpg', 'transport 4', '{SLIDER-HOME-PAGE-SLIDER}'),
(5, 'home-page-slider', '146398417457817.jpg', 'transport 5', '{SLIDER-HOME-PAGE-SLIDER}'),
(6, 'home-page-slider', '146398420584117.jpg', 'transport 1', '{SLIDER-HOME-PAGE-SLIDER}'),
(7, 'home-page-slider', '146398420641134.jpg', 'transport 2', '{SLIDER-HOME-PAGE-SLIDER}'),
(8, 'home-page-slider', '146398420650732.jpg', 'transport 3', '{SLIDER-HOME-PAGE-SLIDER}'),
(9, 'home-page-slider', '14639842066420.jpg', 'transport 4', '{SLIDER-HOME-PAGE-SLIDER}'),
(10, 'home-page-slider', '146398420756744.jpg', 'transport 5', '{SLIDER-HOME-PAGE-SLIDER}');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cms_category`
--
ALTER TABLE `cms_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `cms_content`
--
ALTER TABLE `cms_content`
  ADD PRIMARY KEY (`content_id`);

--
-- Indexes for table `cms_menus`
--
ALTER TABLE `cms_menus`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `cms_menu_item`
--
ALTER TABLE `cms_menu_item`
  ADD PRIMARY KEY (`mi_id`);

--
-- Indexes for table `cms_section`
--
ALTER TABLE `cms_section`
  ADD PRIMARY KEY (`section_id`);

--
-- Indexes for table `cms_slider`
--
ALTER TABLE `cms_slider`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cms_category`
--
ALTER TABLE `cms_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `cms_content`
--
ALTER TABLE `cms_content`
  MODIFY `content_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `cms_menus`
--
ALTER TABLE `cms_menus`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `cms_menu_item`
--
ALTER TABLE `cms_menu_item`
  MODIFY `mi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `cms_section`
--
ALTER TABLE `cms_section`
  MODIFY `section_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `cms_slider`
--
ALTER TABLE `cms_slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
