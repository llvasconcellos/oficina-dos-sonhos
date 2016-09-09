-- phpMyAdmin SQL Dump
-- version 3.0.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: Set 09, 2016 as 02:19 AM
-- Versão do Servidor: 5.0.51
-- Versão do PHP: 5.2.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `oficinadossonhos`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `jos_banner`
--

CREATE TABLE IF NOT EXISTS `jos_banner` (
  `bid` int(11) NOT NULL auto_increment,
  `cid` int(11) NOT NULL default '0',
  `type` varchar(30) NOT NULL default 'banner',
  `name` varchar(255) NOT NULL default '',
  `alias` varchar(255) NOT NULL default '',
  `imptotal` int(11) NOT NULL default '0',
  `impmade` int(11) NOT NULL default '0',
  `clicks` int(11) NOT NULL default '0',
  `imageurl` varchar(100) NOT NULL default '',
  `clickurl` varchar(200) NOT NULL default '',
  `date` datetime default NULL,
  `showBanner` tinyint(1) NOT NULL default '0',
  `checked_out` tinyint(1) NOT NULL default '0',
  `checked_out_time` datetime NOT NULL default '0000-00-00 00:00:00',
  `editor` varchar(50) default NULL,
  `custombannercode` text,
  `catid` int(10) unsigned NOT NULL default '0',
  `description` text NOT NULL,
  `sticky` tinyint(1) unsigned NOT NULL default '0',
  `ordering` int(11) NOT NULL default '0',
  `publish_up` datetime NOT NULL default '0000-00-00 00:00:00',
  `publish_down` datetime NOT NULL default '0000-00-00 00:00:00',
  `tags` text NOT NULL,
  `params` text NOT NULL,
  PRIMARY KEY  (`bid`),
  KEY `viewbanner` (`showBanner`),
  KEY `idx_banner_catid` (`catid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Extraindo dados da tabela `jos_banner`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `jos_bannerclient`
--

CREATE TABLE IF NOT EXISTS `jos_bannerclient` (
  `cid` int(11) NOT NULL auto_increment,
  `name` varchar(255) NOT NULL default '',
  `contact` varchar(255) NOT NULL default '',
  `email` varchar(255) NOT NULL default '',
  `extrainfo` text NOT NULL,
  `checked_out` tinyint(1) NOT NULL default '0',
  `checked_out_time` time default NULL,
  `editor` varchar(50) default NULL,
  PRIMARY KEY  (`cid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Extraindo dados da tabela `jos_bannerclient`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `jos_bannertrack`
--

CREATE TABLE IF NOT EXISTS `jos_bannertrack` (
  `track_date` date NOT NULL,
  `track_type` int(10) unsigned NOT NULL,
  `banner_id` int(10) unsigned NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `jos_bannertrack`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `jos_categories`
--

CREATE TABLE IF NOT EXISTS `jos_categories` (
  `id` int(11) NOT NULL auto_increment,
  `parent_id` int(11) NOT NULL default '0',
  `title` varchar(255) NOT NULL default '',
  `name` varchar(255) NOT NULL default '',
  `alias` varchar(255) NOT NULL default '',
  `image` varchar(255) NOT NULL default '',
  `section` varchar(50) NOT NULL default '',
  `image_position` varchar(30) NOT NULL default '',
  `description` text NOT NULL,
  `published` tinyint(1) NOT NULL default '0',
  `checked_out` int(11) unsigned NOT NULL default '0',
  `checked_out_time` datetime NOT NULL default '0000-00-00 00:00:00',
  `editor` varchar(50) default NULL,
  `ordering` int(11) NOT NULL default '0',
  `access` tinyint(3) unsigned NOT NULL default '0',
  `count` int(11) NOT NULL default '0',
  `params` text NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `cat_idx` (`section`,`published`,`access`),
  KEY `idx_access` (`access`),
  KEY `idx_checkout` (`checked_out`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=36 ;

--
-- Extraindo dados da tabela `jos_categories`
--

INSERT INTO `jos_categories` (`id`, `parent_id`, `title`, `name`, `alias`, `image`, `section`, `image_position`, `description`, `published`, `checked_out`, `checked_out_time`, `editor`, `ordering`, `access`, `count`, `params`) VALUES
(1, 0, 'Últimas Notícias', 'Últimas Notícias', 'ultimas-noticias', 'articles.jpg', '1', 'right', 'As últimas notícias de nossa escola', 1, 0, '0000-00-00 00:00:00', NULL, 1, 0, 1, ''),
(2, 0, 'Desenvolvimento web', 'Desenvolvimento web', '', 'web_links.jpg', 'com_weblinks', 'left', 'Uma seleção de links relacionados a projetos web.', 1, 0, '0000-00-00 00:00:00', NULL, 2, 0, 0, ''),
(35, 0, 'A Escola', '', 'a-escola', '', '16', 'left', '<p><img height="254" width="200" src="images/stories/garoto_livro.jpg" alt="garoto_livro" style="margin-right: 3px; float: left;" />Venha estudar na nossa escola!</p>\r\n<p>Veja abaixo alguns tópicos sobre a nossa escola:</p>', 1, 0, '0000-00-00 00:00:00', NULL, 1, 0, 0, ''),
(11, 0, 'Internet', 'Internet', '', '', 'com_newsfeeds', 'left', '', 1, 0, '0000-00-00 00:00:00', NULL, 7, 0, 0, ''),
(12, 0, 'Contatos', 'Contatos', 'contatos', '', 'com_contact_details', 'left', '<p><img src="images/stories/selo.jpg" width="100" height="65" alt="selo" hspace="3" align="left" />Detalhes de Contato Oficina dos Sonhos</p>\r\n<p> </p>', 1, 0, '0000-00-00 00:00:00', NULL, 6, 0, 0, ''),
(23, 0, 'Administrativo / Financeiro', 'Administrativo / Financeiro', '', '', 'com_contact_details', 'left', '', 1, 0, '0000-00-00 00:00:00', NULL, 3, 0, 0, ''),
(19, 0, 'Ensino Fundamental', 'Ensino Fundamental', 'ensino-fundamental', '', '9', 'left', '<img src="images/stories/children_globe.jpg" width="182" height="229" alt="children_globe" />\r\n<blockquote>\r\n<p class="quote">Que o meu ensino caia como chuva e as minhas palavras desçam como orvalho, como chuva branda sobre o pasto novo, como garoa sobre tenras plantas</p>\r\n</blockquote>', 1, 0, '0000-00-00 00:00:00', NULL, 1, 0, 0, ''),
(20, 0, 'Educação Infantil', 'Educação Infantil', 'educacao-infantil', '', '8', 'left', '<p><img alt="alphabeto" height="246" width="200" src="images/stories/alphabeto.jpg" /></p>\r\n<div class="quote-grey">\r\n<blockquote>Derrama o teu coração como água perante o senhor; Levanta a ele as tuas mãos, pela vida de teus filhinhos. (Lamentações 2:19)</blockquote>\r\n</div>', 1, 0, '0000-00-00 00:00:00', NULL, 2, 0, 0, 'imagefolders=*2*'),
(22, 0, 'Aulas Extra', 'Aulas Extra', '', '', '11', 'left', '', 1, 0, '0000-00-00 00:00:00', NULL, 1, 0, 0, ''),
(24, 0, 'Coordenação Pedagógica', 'Coordenação Pedagógica', '', '', '14', 'left', '', 1, 0, '0000-00-00 00:00:00', NULL, 1, 0, 0, ''),
(25, 0, 'Diretora/Supervisão Pedagógica', 'Direção / Supervisão Pedagógica', '', '', 'com_contact_details', 'left', '', 1, 0, '0000-00-00 00:00:00', NULL, 1, 0, 0, ''),
(26, 0, 'Coordenação Pedagógica', 'Coordenação Pedagógica', '', '', 'com_contact_details', 'left', '', 1, 0, '0000-00-00 00:00:00', NULL, 2, 0, 0, ''),
(27, 0, 'Educação Infantil', 'Educação Infantil', '', '', 'com_events', 'left', 'Datas e Eventos para o ano letivo de 2006.', 1, 0, '0000-00-00 00:00:00', NULL, 1, 0, 59, ''),
(28, 0, 'Ensino Fundamental', 'Ensino Fundamental', '', '', 'com_events', 'left', 'Datas e Eventos para o ano letivo de 2006.', 1, 0, '0000-00-00 00:00:00', NULL, 3, 0, 35, ''),
(29, 0, 'Serviços', 'Serviços', '', '', 'com_contact_details', 'left', '', 1, 0, '0000-00-00 00:00:00', NULL, 5, 0, 0, ''),
(30, 0, 'Projetos', 'Projetos', '', '', '8', 'left', '', 1, 0, '0000-00-00 00:00:00', NULL, 1, 0, 0, ''),
(31, 0, 'Curiosidades', 'Curiosidades', '', '', 'com_weblinks', 'left', '', 1, 0, '0000-00-00 00:00:00', NULL, 1, 0, 0, ''),
(32, 0, 'Eventos', 'Eventos', '', '', 'com_contact_details', 'left', '', 1, 0, '0000-00-00 00:00:00', NULL, 4, 0, 0, ''),
(33, 0, 'Oficina 100%', 'Oficina 100%', 'oficina-100', '', '15', 'left', '<img style="float: left; margin-right: 6px;" alt="oficina dos sonhos" src="images/logomarca.jpg" />A Oficina dos Sonhos é 100%!', 1, 0, '0000-00-00 00:00:00', NULL, 1, 0, 0, ''),
(34, 0, 'Geral', 'Geral', '', '', 'com_events', 'left', '', 1, 0, '0000-00-00 00:00:00', NULL, 2, 0, 103, '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `jos_components`
--

CREATE TABLE IF NOT EXISTS `jos_components` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(50) NOT NULL default '',
  `link` varchar(255) NOT NULL default '',
  `menuid` int(11) unsigned NOT NULL default '0',
  `parent` int(11) unsigned NOT NULL default '0',
  `admin_menu_link` varchar(255) NOT NULL default '',
  `admin_menu_alt` varchar(255) NOT NULL default '',
  `option` varchar(50) NOT NULL default '',
  `ordering` int(11) NOT NULL default '0',
  `admin_menu_img` varchar(255) NOT NULL default '',
  `iscore` tinyint(4) NOT NULL default '0',
  `params` text NOT NULL,
  `enabled` tinyint(4) NOT NULL default '1',
  PRIMARY KEY  (`id`),
  KEY `parent_option` (`parent`,`option`(32))
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=76 ;

--
-- Extraindo dados da tabela `jos_components`
--

INSERT INTO `jos_components` (`id`, `name`, `link`, `menuid`, `parent`, `admin_menu_link`, `admin_menu_alt`, `option`, `ordering`, `admin_menu_img`, `iscore`, `params`, `enabled`) VALUES
(1, 'Banners', '', 0, 0, '', 'Banner Management', 'com_banners', 0, 'js/ThemeOffice/component.png', 0, 'track_impressions=0\ntrack_clicks=0\ntag_prefix=\n\n', 1),
(2, 'Banners', '', 0, 1, 'option=com_banners', 'Active Banners', 'com_banners', 1, 'js/ThemeOffice/edit.png', 0, '', 1),
(3, 'Clients', '', 0, 1, 'option=com_banners&c=client', 'Manage Clients', 'com_banners', 2, 'js/ThemeOffice/categories.png', 0, '', 1),
(4, 'Web Links', 'option=com_weblinks', 0, 0, '', 'Manage Weblinks', 'com_weblinks', 0, 'js/ThemeOffice/component.png', 0, 'show_comp_description=1\ncomp_description=\nshow_link_hits=1\nshow_link_description=1\nshow_other_cats=1\nshow_headings=1\nshow_page_title=1\nlink_target=0\nlink_icons=\n\n', 1),
(5, 'Links', '', 0, 4, 'option=com_weblinks', 'View existing weblinks', 'com_weblinks', 1, 'js/ThemeOffice/edit.png', 0, '', 1),
(6, 'Categories', '', 0, 4, 'option=com_categories&section=com_weblinks', 'Manage weblink categories', '', 2, 'js/ThemeOffice/categories.png', 0, '', 1),
(7, 'Contacts', 'option=com_contact', 0, 0, '', 'Edit contact details', 'com_contact', 0, 'js/ThemeOffice/component.png', 1, 'contact_icons=0\nicon_address=\nicon_email=\nicon_telephone=\nicon_fax=\nicon_misc=\nshow_headings=1\nshow_position=1\nshow_email=0\nshow_telephone=1\nshow_mobile=1\nshow_fax=1\nbannedEmail=\nbannedSubject=\nbannedText=\nsession=1\ncustomReply=0\n\n', 1),
(8, 'Contacts', '', 0, 7, 'option=com_contact', 'Edit contact details', 'com_contact', 0, 'js/ThemeOffice/edit.png', 1, '', 1),
(9, 'Categories', '', 0, 7, 'option=com_categories&section=com_contact_details', 'Manage contact categories', '', 2, 'js/ThemeOffice/categories.png', 1, 'contact_icons=0\nicon_address=\nicon_email=\nicon_telephone=\nicon_fax=\nicon_misc=\nshow_headings=1\nshow_position=1\nshow_email=0\nshow_telephone=1\nshow_mobile=1\nshow_fax=1\nbannedEmail=\nbannedSubject=\nbannedText=\nsession=1\ncustomReply=0\n\n', 1),
(10, 'Polls', 'option=com_poll', 0, 0, 'option=com_poll', 'Manage Polls', 'com_poll', 0, 'js/ThemeOffice/component.png', 0, '', 1),
(11, 'News Feeds', 'option=com_newsfeeds', 0, 0, '', 'News Feeds Management', 'com_newsfeeds', 0, 'js/ThemeOffice/component.png', 0, '', 1),
(12, 'Feeds', '', 0, 11, 'option=com_newsfeeds', 'Manage News Feeds', 'com_newsfeeds', 1, 'js/ThemeOffice/edit.png', 0, 'show_headings=1\nshow_name=1\nshow_articles=1\nshow_link=1\nshow_cat_description=1\nshow_cat_items=1\nshow_feed_image=1\nshow_feed_description=1\nshow_item_description=1\nfeed_word_count=0\n\n', 1),
(13, 'Categories', '', 0, 11, 'option=com_categories&section=com_newsfeeds', 'Manage Categories', '', 2, 'js/ThemeOffice/categories.png', 0, '', 1),
(14, 'User', 'option=com_user', 0, 0, '', '', 'com_user', 0, '', 1, '', 1),
(15, 'Search', 'option=com_search', 0, 0, 'option=com_search', 'Search Statistics', 'com_search', 0, 'js/ThemeOffice/component.png', 1, 'enabled=0\n\n', 1),
(16, 'Categories', '', 0, 1, 'option=com_categories&section=com_banner', 'Categories', '', 3, '', 1, '', 1),
(17, 'Wrapper', 'option=com_wrapper', 0, 0, '', 'Wrapper', 'com_wrapper', 0, '', 1, '', 1),
(18, 'Mail To', '', 0, 0, '', '', 'com_mailto', 0, '', 1, '', 1),
(19, 'Media Manager', '', 0, 0, 'option=com_media', 'Media Manager', 'com_media', 0, '', 1, 'upload_extensions=bmp,csv,doc,epg,gif,ico,jpg,odg,odp,ods,odt,pdf,png,ppt,swf,txt,xcf,xls,BMP,CSV,DOC,EPG,GIF,ICO,JPG,ODG,ODP,ODS,ODT,PDF,PNG,PPT,SWF,TXT,XCF,XLS\nupload_maxsize=10000000\nfile_path=images\nimage_path=images/stories\nrestrict_uploads=1\nallowed_media_usergroup=3\ncheck_mime=1\nimage_extensions=bmp,gif,jpg,png\nignore_extensions=\nupload_mime=image/jpeg,image/gif,image/png,image/bmp,application/x-shockwave-flash,application/msword,application/excel,application/pdf,application/powerpoint,text/plain,application/x-zip\nupload_mime_illegal=text/html\nenable_flash=0\n\n', 1),
(20, 'Articles', 'option=com_content', 0, 0, '', '', 'com_content', 0, '', 1, 'show_noauth=0\nshow_title=1\nlink_titles=0\nshow_intro=1\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_author=0\nshow_create_date=0\nshow_modify_date=0\nshow_item_navigation=0\nshow_readmore=1\nshow_vote=0\nshow_icons=1\nshow_pdf_icon=1\nshow_print_icon=1\nshow_email_icon=1\nshow_hits=1\nfeed_summary=0\nfilter_tags=\nfilter_attritbutes=\n\n', 1),
(21, 'Configuration Manager', '', 0, 0, '', 'Configuration', 'com_config', 0, '', 1, '', 1),
(22, 'Installation Manager', '', 0, 0, '', 'Installer', 'com_installer', 0, '', 1, '', 1),
(23, 'Language Manager', '', 0, 0, '', 'Languages', 'com_languages', 0, '', 1, 'site=pt-BR\nadministrator=pt-BR\n\n', 1),
(24, 'Mass mail', '', 0, 0, '', 'Mass Mail', 'com_massmail', 0, '', 1, 'mailSubjectPrefix=\nmailBodySuffix=\n\n', 1),
(25, 'Menu Editor', '', 0, 0, '', 'Menu Editor', 'com_menus', 0, '', 1, '', 1),
(27, 'Messaging', '', 0, 0, '', 'Messages', 'com_messages', 0, '', 1, '', 1),
(28, 'Modules Manager', '', 0, 0, '', 'Modules', 'com_modules', 0, '', 1, '', 1),
(29, 'Plugin Manager', '', 0, 0, '', 'Plugins', 'com_plugins', 0, '', 1, '', 1),
(30, 'Template Manager', '', 0, 0, '', 'Templates', 'com_templates', 0, '', 1, '', 1),
(31, 'User Manager', '', 0, 0, '', 'Users', 'com_users', 0, '', 1, 'allowUserRegistration=0\nnew_usertype=Registered\nuseractivation=1\nfrontend_userparams=1\n\n', 1),
(32, 'Cache Manager', '', 0, 0, '', 'Cache', 'com_cache', 0, '', 1, '', 1),
(33, 'Control Panel', '', 0, 0, '', 'Control Panel', 'com_cpanel', 0, '', 1, '', 1),
(62, 'JCE Administration', 'option=com_jce', 0, 0, 'option=com_jce', 'JCE Administration', 'com_jce', 0, 'components/com_jce/img/logo.png', 0, '', 1),
(63, 'Control Panel', '', 0, 62, 'option=com_jce', 'Control Panel', 'com_jce', 0, 'templates/khepri/images/menu/icon-16-cpanel.png', 0, '', 1),
(64, 'Configuration', '', 0, 62, 'option=com_jce&type=config', 'Configuration', 'com_jce', 1, 'templates/khepri/images/menu/icon-16-config.png', 0, '', 1),
(65, 'Groups', '', 0, 62, 'option=com_jce&type=group', 'Groups', 'com_jce', 2, 'templates/khepri/images/menu/icon-16-user.png', 0, '', 1),
(66, 'Plugins', '', 0, 62, 'option=com_jce&type=plugin', 'Plugins', 'com_jce', 3, 'templates/khepri/images/menu/icon-16-plugin.png', 0, '', 1),
(67, 'Install', '', 0, 62, 'option=com_jce&type=install', 'Install', 'com_jce', 4, 'templates/khepri/images/menu/icon-16-install.png', 0, '', 1),
(40, 'EventList', 'option=com_eventlist', 0, 0, 'option=com_eventlist', 'EventList', 'com_eventlist', 0, '../administrator/components/com_eventlist/assets/images/eventlist.png', 0, 'display_num=50\ncat_num=4\nfilter=0\ndisplay=0\nicons=1\nshow_print_icon=1\nshow_email_icon=1\n\n', 1),
(41, 'Phoca Gallery', 'option=com_phocagallery', 0, 0, 'option=com_phocagallery', 'Phoca Gallery', 'com_phocagallery', 0, 'components/com_phocagallery/assets/images/icon-16-menu.png', 0, 'font_color=#558bcc\nbackground_color=#ffffff\nbackground_color_hover=#fafafa\nimage_background_color=#ffffff\nimage_background_shadow=shadow1\nborder_color=#e8e8e8\nborder_color_hover=#89b015\nmargin_box=5\npadding_box=5\ndisplay_name=1\ndisplay_icon_detail=0\ndisplay_icon_download=0\ndisplay_icon_folder=0\nfont_size_name=12\nchar_length_name=15\ncategory_box_space=0\ndisplay_categories_sub=0\ndisplay_subcat_page=2\ndisplay_icon_random_image=0\ndisplay_back_button=0\ndisplay_categories_back_button=0\ndisplay_categories_cv=1\ndisplay_subcat_page_cv=0\ndisplay_icon_random_image_cv=1\ndisplay_back_button_cv=0\ndisplay_categories_back_button_cv=1\ncategories_columns_cv=1\ndisplay_image_categories_cv=1\nimage_categories_size_cv=4\ncategories_columns=1\ndisplay_image_categories=1\nimage_categories_size=5\ndisplay_subcategories=1\ndisplay_empty_categories=0\nhide_categories=\ndisplay_access_category=0\ndetail_window=3\ndetail_window_background_color=#ffffff\nmodal_box_overlay_color=#000000\nmodal_box_overlay_opacity=0.3\nmodal_box_border_color=#6b6b6b\nmodal_box_border_width=2\nsb_slideshow_delay=5\nsb_lang=en\ndisplay_description_detail=2\ndisplay_title_description=0\nfont_size_desc=11\nfont_color_desc=#333333\ndescription_detail_height=16\ndescription_lightbox_font_size=12\ndescription_lightbox_font_color=#ffffff\ndescription_lightbox_bg_color=#000000\nslideshow_delay=3000\nslideshow_pause=0\nslideshow_random=0\ndetail_buttons=1\nphocagallery_width=\ndisplay_phoca_info=1\ndefault_pagination=20\npagination=5;10;15;20;50\ncategory_ordering=1\nimage_ordering=1\nenable_piclens=1\nstart_piclens=1\npiclens_image=0\nswitch_image=0\nswitch_width=640\nswitch_height=480\nenable_overlib=0\nol_bg_color=#666666\nol_fg_color=#f6f6f6\nol_tf_color=#000000\nol_cf_color=#ffffff\noverlib_overlay_opacity=0.7\ncreate_watermark=0\nwatermark_position_x=center\nwatermark_position_y=middle\ndisplay_icon_vm=0\nenable_user_cp=0\nmax_create_cat_char=1000\ndisplay_rating=1\ndisplay_comment=1\ncomment_width=400\nmax_comment_char=1000\ndisplay_category_statistics=1\ndisplay_main_cat_stat=1\ndisplay_lastadded_cat_stat=0\ncount_lastadded_cat_stat=3\ndisplay_mostviewed_cat_stat=1\ncount_mostviewed_cat_stat=3\ndisplay_camera_info=0\nexif_information=FILE.FileName;FILE.FileDateTime;FILE.FileSize;FILE.MimeType;COMPUTED.Height;COMPUTED.Width;COMPUTED.IsColor;COMPUTED.ApertureFNumber;IFD0.Make;IFD0.Model;IFD0.Orientation;IFD0.XResolution;IFD0.YResolution;IFD0.ResolutionUnit;IFD0.Software;IFD0.DateTime;IFD0.Exif_IFD_Pointer;IFD0.GPS_IFD_Pointer;EXIF.ExposureTime;EXIF.FNumber;EXIF.ExposureProgram;EXIF.ISOSpeedRatings;EXIF.ExifVersion;EXIF.DateTimeOriginal;EXIF.DateTimeDigitized;EXIF.ShutterSpeedValue;EXIF.ApertureValue;EXIF.ExposureBiasValue;EXIF.MaxApertureValue;EXIF.MeteringMode;EXIF.LightSource;EXIF.Flash;EXIF.FocalLength;EXIF.SubSecTimeOriginal;EXIF.SubSecTimeDigitized;EXIF.ColorSpace;EXIF.ExifImageWidth;EXIF.ExifImageLength;EXIF.SensingMethod;EXIF.CustomRendered;EXIF.ExposureMode;EXIF.WhiteBalance;EXIF.DigitalZoomRatio;EXIF.FocalLengthIn35mmFilm;EXIF.SceneCaptureType;EXIF.GainControl;EXIF.Contrast;EXIF.Saturation;EXIF.Sharpness;EXIF.SubjectDistanceRange;GPS.GPSLatitudeRef;GPS.GPSLatitude;GPS.GPSLongitudeRef;GPS.GPSLongitude;GPS.GPSAltitudeRef;GPS.GPSAltitude;GPS.GPSTimeStamp;GPS.GPSStatus;GPS.GPSMapDatum;GPS.GPSDateStamp\ngoogle_maps_api_key=\ndisplay_categories_geotagging=0\ncategories_lng=\ncategories_lat=\ncategories_zoom=2\ncategories_map_width=500\ncategories_map_height=500\ndisplay_icon_geotagging=0\ndisplay_category_geotagging=0\ncategory_map_width=500\ncategory_map_height=400\ndisplay_title_upload=0\ndisplay_description_upload=0\nmax_upload_char=1000\nupload_maxsize=3000000\ncat_folder_maxsize=20000000\nenable_java=0\njava_resize_width=-1\njava_resize_height=-1\njava_box_width=480\njava_box_height=480\npagination_thumbnail_creation=0\nclean_thumbnails=0\nenable_thumb_creation=1\ncrop_thumbnail=5\njpeg_quality=85\nicon_format=gif\nlarge_image_width=640\nlarge_image_height=480\nmedium_image_width=100\nmedium_image_height=100\nsmall_image_width=50\nsmall_image_height=50\nfront_modal_box_width=680\nfront_modal_box_height=560\nadmin_modal_box_width=680\nadmin_modal_box_height=520\n\n', 1),
(42, 'Control Panel', '', 0, 41, 'option=com_phocagallery', 'Control Panel', 'com_phocagallery', 0, 'components/com_phocagallery/assets/images/icon-16-control-panel.png', 0, '', 1),
(43, 'Images', '', 0, 41, 'option=com_phocagallery&view=phocagallerys', 'Images', 'com_phocagallery', 1, 'components/com_phocagallery/assets/images/icon-16-menu-gal.png', 0, '', 1),
(44, 'Categories', '', 0, 41, 'option=com_phocagallery&view=phocagallerycs', 'Categories', 'com_phocagallery', 2, 'components/com_phocagallery/assets/images/icon-16-menu-cat.png', 0, '', 1),
(45, 'Themes', '', 0, 41, 'option=com_phocagallery&view=phocagalleryt', 'Themes', 'com_phocagallery', 3, 'components/com_phocagallery/assets/images/icon-16-menu-theme.png', 0, '', 1),
(46, 'Rating', '', 0, 41, 'option=com_phocagallery&view=phocagalleryra', 'Rating', 'com_phocagallery', 4, 'components/com_phocagallery/assets/images/icon-16-menu-vote.png', 0, '', 1),
(47, 'Comments', '', 0, 41, 'option=com_phocagallery&view=phocagallerycos', 'Comments', 'com_phocagallery', 5, 'components/com_phocagallery/assets/images/icon-16-menu-comment.png', 0, '', 1),
(48, 'Info', '', 0, 41, 'option=com_phocagallery&view=phocagalleryin', 'Info', 'com_phocagallery', 6, 'components/com_phocagallery/assets/images/icon-16-menu-info.png', 0, '', 1),
(49, 'eXtplorer', 'option=com_extplorer', 0, 0, 'option=com_extplorer', 'eXtplorer', 'com_extplorer', 0, '../administrator/components/com_extplorer/images/joomla_x_icon.png', 0, '', 1),
(68, 'mtwMigrator', 'option=com_mtwmigrator', 0, 0, 'option=com_mtwmigrator', 'mtwMigrator', 'com_mtwmigrator', 0, 'js/ThemeOffice/component.png', 0, '', 1),
(75, 'ADMINISTER_BACKUP_FILES', '', 0, 69, 'option=com_joomlapack&view=buadmin', 'ADMINISTER_BACKUP_FILES', 'com_joomlapack', 2, 'components/com_joomlapack/assets/images/bufa-16.png', 0, '', 1),
(74, 'CONFIGURATION', '', 0, 69, 'option=com_joomlapack&view=config', 'CONFIGURATION', 'com_joomlapack', 1, 'components/com_joomlapack/assets/images/config-16.png', 0, '', 1),
(73, 'BACKUP_NOW', '', 0, 69, 'option=com_joomlapack&view=backup', 'BACKUP_NOW', 'com_joomlapack', 0, 'components/com_joomlapack/assets/images/backup-16.png', 0, '', 1),
(69, 'JoomlaPack', 'option=com_joomlapack', 0, 0, 'option=com_joomlapack', 'JoomlaPack', 'com_joomlapack', 0, 'components/com_joomlapack/assets/images/joomlapack-16.png', 0, '', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `jos_contact_details`
--

CREATE TABLE IF NOT EXISTS `jos_contact_details` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(255) NOT NULL default '',
  `alias` varchar(255) NOT NULL default '',
  `con_position` varchar(255) default NULL,
  `address` text,
  `suburb` varchar(100) default NULL,
  `state` varchar(100) default NULL,
  `country` varchar(100) default NULL,
  `postcode` varchar(100) default NULL,
  `telephone` varchar(255) default NULL,
  `fax` varchar(255) default NULL,
  `misc` mediumtext,
  `image` varchar(255) default NULL,
  `imagepos` varchar(20) default NULL,
  `email_to` varchar(255) default NULL,
  `default_con` tinyint(1) unsigned NOT NULL default '0',
  `published` tinyint(1) unsigned NOT NULL default '0',
  `checked_out` int(11) unsigned NOT NULL default '0',
  `checked_out_time` datetime NOT NULL default '0000-00-00 00:00:00',
  `ordering` int(11) NOT NULL default '0',
  `params` text NOT NULL,
  `user_id` int(11) NOT NULL default '0',
  `catid` int(11) NOT NULL default '0',
  `access` tinyint(3) unsigned NOT NULL default '0',
  `mobile` varchar(255) NOT NULL default '',
  `webpage` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`id`),
  KEY `catid` (`catid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Extraindo dados da tabela `jos_contact_details`
--

INSERT INTO `jos_contact_details` (`id`, `name`, `alias`, `con_position`, `address`, `suburb`, `state`, `country`, `postcode`, `telephone`, `fax`, `misc`, `image`, `imagepos`, `email_to`, `default_con`, `published`, `checked_out`, `checked_out_time`, `ordering`, `params`, `user_id`, `catid`, `access`, `mobile`, `webpage`) VALUES
(4, 'Marcia Poletti', 'marcia-poletti', 'Diretora / Supervisão Pedagógica', 'Rua Senador Nilo Coelho, 181', 'Costa e Silva - Joinville', 'Santa Catarina', 'Brasil', '89219-340', '(47) 3425-5063', '', '', '', NULL, 'marcia@oficinadossonhos.com.b', 0, 1, 0, '0000-00-00 00:00:00', 5, 'show_name=1\nshow_position=1\nshow_email=1\nshow_street_address=1\nshow_suburb=1\nshow_state=1\nshow_postcode=1\nshow_country=1\nshow_telephone=1\nshow_mobile=1\nshow_fax=1\nshow_webpage=1\nshow_misc=1\nshow_image=1\nallow_vcard=1\ncontact_icons=0\nicon_address=\nicon_email=\nicon_telephone=\nicon_mobile=\nicon_fax=\nicon_misc=\nshow_email_form=1\nemail_description=1\nshow_email_copy=1\nbanned_email=\nbanned_subject=\nbanned_text=', 0, 12, 0, '', 'http://www.oficinadossonhos.com.br'),
(6, 'Fábia Steuernagel Poffo', 'fabia-steuernagel-poffo', 'Coordenação Pedagógica Ensino  Fundamental', 'Rua Senador Nilo Coelho, 181', 'Joinville', 'Santa Catarina', 'Brasil', '89219-340', '(47) 3425-5063', '', '', '', NULL, 'fabia@oficinadossonhos.com.br', 0, 1, 0, '0000-00-00 00:00:00', 3, 'show_name=1\nshow_position=1\nshow_email=1\nshow_street_address=1\nshow_suburb=1\nshow_state=1\nshow_postcode=1\nshow_country=1\nshow_telephone=1\nshow_mobile=1\nshow_fax=1\nshow_webpage=1\nshow_misc=1\nshow_image=1\nallow_vcard=1\ncontact_icons=0\nicon_address=\nicon_email=\nicon_telephone=\nicon_mobile=\nicon_fax=\nicon_misc=\nshow_email_form=1\nemail_description=1\nshow_email_copy=1\nbanned_email=\nbanned_subject=\nbanned_text=', 0, 12, 0, '', 'http://www.oficinadossonhos.com.br'),
(12, 'Evelize da Cunha', 'evelize-da-cunha', 'Coordenação Pedagógica Educação Infantil', 'Rua Senador Nilo Coelho, 181', 'Costa e Silva - Joinville', 'Santa Catarina', 'Brasil', '89219-340', '(47) 3425-5063', '', '', '', NULL, 'evelize@oficinadossonhos.com.br', 0, 1, 0, '0000-00-00 00:00:00', 2, 'show_name=1\nshow_position=1\nshow_email=1\nshow_street_address=1\nshow_suburb=1\nshow_state=1\nshow_postcode=1\nshow_country=1\nshow_telephone=1\nshow_mobile=1\nshow_fax=1\nshow_webpage=1\nshow_misc=1\nshow_image=1\nallow_vcard=1\ncontact_icons=0\nicon_address=\nicon_email=\nicon_telephone=\nicon_mobile=\nicon_fax=\nicon_misc=\nshow_email_form=1\nemail_description=1\nshow_email_copy=1\nbanned_email=\nbanned_subject=\nbanned_text=', 0, 12, 0, '', 'http://www.oficinadossonhos.com.br'),
(1, 'Alessandra Machado', 'alessandra-machado', 'Financeiro', 'Rua Senador Nilo Coelho, 181', 'Costa e Silva - Joinville', 'Santa Catarina', 'Brasil', '89219-340', '(47) 3425-5063', '', '', '', NULL, 'financeiro@oficinadossonhos.com.br', 0, 1, 0, '0000-00-00 00:00:00', 1, 'show_name=1\nshow_position=1\nshow_email=1\nshow_street_address=1\nshow_suburb=1\nshow_state=1\nshow_postcode=1\nshow_country=1\nshow_telephone=1\nshow_mobile=1\nshow_fax=1\nshow_webpage=1\nshow_misc=1\nshow_image=1\nallow_vcard=1\ncontact_icons=0\nicon_address=\nicon_email=\nicon_telephone=\nicon_mobile=\nicon_fax=\nicon_misc=\nshow_email_form=1\nemail_description=1\nshow_email_copy=1\nbanned_email=\nbanned_subject=\nbanned_text=', 0, 12, 0, '', 'http://www.oficinadossonhos.com.br'),
(11, 'Pamela Gonçalves de Araújo', 'pamela-goncalves-de-araujo', 'Administrativo', 'Rua Senador Nilo Coelho, 181', 'Costa e Silva - Joinville', 'Santa Catarina', 'Brasil', '89219-340', '(47) 3026-5192', '', '', 'pamela.jpg', NULL, 'pamela@oficinadossonhos.com.br', 0, 1, 0, '0000-00-00 00:00:00', 6, 'show_name=1\nshow_position=1\nshow_email=1\nshow_street_address=1\nshow_suburb=1\nshow_state=1\nshow_postcode=1\nshow_country=1\nshow_telephone=1\nshow_mobile=1\nshow_fax=1\nshow_webpage=1\nshow_misc=1\nshow_image=1\nallow_vcard=1\ncontact_icons=0\nicon_address=\nicon_email=\nicon_telephone=\nicon_mobile=\nicon_fax=\nicon_misc=\nshow_email_form=1\nemail_description=1\nshow_email_copy=1\nbanned_email=\nbanned_subject=\nbanned_text=', 0, 12, 0, '', 'http://www.oficinadossonhos.com.br'),
(2, 'Jaqueline Schuster', 'jaqueline-schuster', 'Secretaria', 'Rua Senador Nilo Coelho, 181', 'Costa e Silva - Joinville', 'Santa Catarina', 'Brasil', '89219-340', '(47) 3425-5063', '', '', '', NULL, 'secretaria@oficinadossonhos.com.br', 0, 1, 0, '0000-00-00 00:00:00', 4, 'show_name=1\r\nshow_position=1\r\nshow_email=1\r\nshow_street_address=1\r\nshow_suburb=1\r\nshow_state=1\r\nshow_postcode=1\r\nshow_country=1\r\nshow_telephone=1\r\nshow_mobile=1\r\nshow_fax=1\r\nshow_webpage=1\r\nshow_misc=1\r\nshow_image=1\r\nallow_vcard=1\r\ncontact_icons=0\r\nicon_address=\r\nicon_email=\r\nicon_telephone=\r\nicon_mobile=\r\nicon_fax=\r\nicon_misc=\r\nshow_email_form=1\r\nemail_description=1\r\nshow_email_copy=1\r\nbanned_email=\r\nbanned_subject=\r\nbanned_text=', 0, 12, 0, '', 'http://www.oficinadossonhos.com.br');

-- --------------------------------------------------------

--
-- Estrutura da tabela `jos_content`
--

CREATE TABLE IF NOT EXISTS `jos_content` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `title` varchar(255) NOT NULL default '',
  `alias` varchar(255) NOT NULL default '',
  `title_alias` varchar(255) NOT NULL default '',
  `introtext` mediumtext NOT NULL,
  `fulltext` mediumtext NOT NULL,
  `state` tinyint(3) NOT NULL default '0',
  `sectionid` int(11) unsigned NOT NULL default '0',
  `mask` int(11) unsigned NOT NULL default '0',
  `catid` int(11) unsigned NOT NULL default '0',
  `created` datetime NOT NULL default '0000-00-00 00:00:00',
  `created_by` int(11) unsigned NOT NULL default '0',
  `created_by_alias` varchar(255) NOT NULL default '',
  `modified` datetime NOT NULL default '0000-00-00 00:00:00',
  `modified_by` int(11) unsigned NOT NULL default '0',
  `checked_out` int(11) unsigned NOT NULL default '0',
  `checked_out_time` datetime NOT NULL default '0000-00-00 00:00:00',
  `publish_up` datetime NOT NULL default '0000-00-00 00:00:00',
  `publish_down` datetime NOT NULL default '0000-00-00 00:00:00',
  `images` text NOT NULL,
  `urls` text NOT NULL,
  `attribs` text NOT NULL,
  `version` int(11) unsigned NOT NULL default '1',
  `parentid` int(11) unsigned NOT NULL default '0',
  `ordering` int(11) NOT NULL default '0',
  `metakey` text NOT NULL,
  `metadesc` text NOT NULL,
  `access` int(11) unsigned NOT NULL default '0',
  `hits` int(11) unsigned NOT NULL default '0',
  `metadata` text NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `idx_section` (`sectionid`),
  KEY `idx_access` (`access`),
  KEY `idx_checkout` (`checked_out`),
  KEY `idx_state` (`state`),
  KEY `idx_catid` (`catid`),
  KEY `idx_createdby` (`created_by`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=173 ;

--
-- Extraindo dados da tabela `jos_content`
--

INSERT INTO `jos_content` (`id`, `title`, `alias`, `title_alias`, `introtext`, `fulltext`, `state`, `sectionid`, `mask`, `catid`, `created`, `created_by`, `created_by_alias`, `modified`, `modified_by`, `checked_out`, `checked_out_time`, `publish_up`, `publish_down`, `images`, `urls`, `attribs`, `version`, `parentid`, `ordering`, `metakey`, `metadesc`, `access`, `hits`, `metadata`) VALUES
(163, 'Tipografia', 'tipografia', '', '<p>Listas:</p>\r\n<ul>\r\n<li>texto 1</li>\r\n<li>texto 2</li>\r\n<li>texto 3</li>\r\n<li>texto 4</li>\r\n</ul>\r\n<ul class="checklist">\r\n<li>texto 1</li>\r\n<li>texto 2</li>\r\n<li>texto 3</li>\r\n<li>texto 4</li>\r\n</ul>\r\n<br />\r\n<div class="bubble1">\r\n<div>\r\n<div>\r\n<div>\r\n<div><br />    Balão de Texto!<br /><br /><br /></div>\r\n</div>\r\n</div>\r\n</div>\r\n<strong>Balão 1</strong></div>\r\n<div class="bubble2">\r\n<div>\r\n<div>\r\n<div>\r\n<div><br />    Balão de Texto!<br /><br /><br /></div>\r\n</div>\r\n</div>\r\n</div>\r\n<strong>Balão 2<br /></strong></div>\r\n<div class="bubble3">\r\n<div>\r\n<div>\r\n<div>\r\n<div><br />    Balão de Texto!<br /><br /><br /><br /></div>\r\n</div>\r\n</div>\r\n</div>\r\n<strong>Balão 3</strong></div>\r\n<div class="bubble4">\r\n<div>\r\n<div>\r\n<div>\r\n<div><br />   Balão de Texto!<br /><br /><br /><br /></div>\r\n</div>\r\n</div>\r\n</div>\r\n<strong>Balão 4</strong></div>\r\n<div class="quote-grey"><blockquote>Digite suas citações aqui!</blockquote></div><br /><br />\r\n<p class="blocknumber"><span class="bignumber">01</span>Bloco de numeração!</p><br /><br />\r\n<p class="blocknumber"><span class="bignumber">02</span>Bloco de numeração!</p><br /><br />\r\n<p class="blocknumber"><span class="bignumber">03</span>Bloco de numeração!</p><br /><br />\r\n<p class="blocknumber"><span class="bignumber">04</span>Bloco de numeração!</p><br /><br />\r\n<p class="error">Mensagem de Alerta aqui!</p><br /><br />\r\n<p class="message">Mensagem de informação aqui!</p><br /><br />\r\n<p class="tips">Dicas aqui!</p><br /><br />\r\n<span class="highlight">Frase em destaque!</span><br /><br />', '', 1, 0, 0, 0, '2009-06-16 21:39:15', 62, '', '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', '2009-06-16 21:39:15', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 1, 0, 4, '', '', 0, 0, 'robots=\nauthor='),
(16, 'Para Refletir', 'para-refletir', '', '<p><img src="images/stories/biblia_sagrada.png" width="200" alt="biblia_sagrada" hspace="6" vspace="6" align="left" /><strong>Os Princípios bíblicos aplicados na vida do estudante:</strong></p>\r\n<p> </p>\r\n<p> </p>\r\n<p><strong>Individualidade:</strong> Cada um tem a sua forma de aprender e de expressar o que sabe. Você tem muito a aprender e muito a ensinar. Lembre-se, sua atitude também é uma maneira de ensinar as pessoas. Respeite e contribua!</p>\r\n<p> </p>\r\n<p><strong>Semear e colher:</strong> Tenha compromisso com seus estudos, seja responsável, enriqueça seu aprendizado pesquisando e estudando além do que é ensinado em sala de aula, assim seu sucesso será uma realidade.</p>\r\n<p> </p>\r\n<p><strong>Autogoverno:</strong> Procure se controlar diante de situações que queiram tirar sua atenção e concentração das atividades escolares. Isto serve para sala de aula e em casa, nas horas separadas para estudos.</p>\r\n<p> </p>\r\n<p><strong>União:</strong> Todas as pessoas que fazem parte do seu contexto escolar são importantes na sua formação: colegas, professores, funcionários, etc., portanto, procure ser amigo dessas pessoas, valorizando-as e respeitando-as.Caráter Seja sempre honesto, primeiramente consigo mesmo, cumprindo suas tarefas com a impedir seu crescimento e o de seus colegas. Faça diferença onde está plantado!</p>\r\n<p> </p>\r\n<p><strong>Mordomia:</strong> Cuide de aprender o que está sendo ensinado HOJE. Não perca a oportunidade de crescer com as pessoas que Deus colocou no seu caminho.</p>\r\n<p> </p>\r\n<p><strong>Soberania:</strong> Creia que você jamais estaria aqui, neste Colégio, se Deus assim não o quisesse, então confia Nele e agradeço-O, pois Ele pode abençoá-lo muito com todas as coisas que lhe são oferecidas neste momento: professores, funcionários, estrutura da escola, material pedagógico, metodologia...</p>\r\n<p> </p>', '', 1, 9, 0, 19, '2006-05-24 01:38:41', 62, '', '2009-06-18 13:53:30', 62, 0, '0000-00-00 00:00:00', '2006-05-24 01:36:22', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 7, 0, 1, '', '', 0, 380, 'robots=\nauthor='),
(18, 'Proposta Pedagógica', 'proposta-pedagogica', '', '<p><img src="images/stories/coruja.gif" width="200" height="185" alt="coruja" style="float: left; margin: 6px;" />O Centro de Educação Oficina dos Sonhos tem como proposta uma educação que contemple a formação do aluno através do desenvolvimento cognitivo, físico, afetivo e social. Contudo, educação não é apenas o processo de transferir conteúdos acadêmicos, mas todo conjunto de instruções, disciplinas e práticas que visam preparar esta geração para cumprir plenamente sua vocação e o seu papel na sociedade, fundamentada em uma Educação Cristã. Por isso, nos empenhamos tanto em construir conhecimentos, quanto em ensinar valores que são a base para que, no futuro, o aluno seja um adulto feliz, capacitado e consciente.</p>\r\n<p>O Ensino Fundamental é uma continuidade do trabalho realizado na Educação Infantil. A ação pedagógica continua se desenvolvendo através do equilíbrio entre os interesses do aluno e a intervenção do trabalho do professor, cujo objetivo é o desenvolvimento de uma postura crítica e participativa, incentivando o gosto pelas descobertas e a valorização das experiências individuais e coletivas. Todo o trabalho tem o objetivo de desenvolver o raciocínio criativo, construir o conhecimento através de pesquisa e fundamentar o aprendizado na aplicação de Princípios Bíblicos. Temos a certeza de que o exemplo é uma ferramenta fundamental no processo do ensino e aprendizagem. Não basta ensinar o caminho; é preciso ensinar no caminho.</p>\r\n<div><strong>Fábia S. Poffo</strong></div>\r\n<div>Coordenação Pedagógica</div>\r\n<br />\r\n<div class="quote-grey">\r\n<blockquote>Ensina a criança no caminho em que deve andar e ainda quando for velho não se desviará dele - Provérbios 22:6</blockquote>\r\n</div>', '', 1, 9, 0, 19, '2006-05-24 01:46:05', 62, '', '2009-06-18 14:01:23', 62, 0, '0000-00-00 00:00:00', '2006-05-24 01:44:41', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 6, 0, 3, '', '', 0, 626, 'robots=\nauthor='),
(164, 'Aulas Extras', 'aulas-extras', '', '<p><img style="border: 1px solid #b7b7b7; padding: 3px; margin-right: 4px; float: left;" alt="atividades" src="images/stories/atividades.png" width="136" height="81" />Além das aulas convencionais dispomos também de aulas extras que ajudam a desenvolver socialmente, culturalmente e atleticamente as crianças. As opções de aulas extras são Ballet, Jazz, Natação, Violão, Patinação, Judô e Técnica Vocal. Saiba mais sobre estas atividades.</p>\r\n', '\r\n<p>fdsafdsafdsafdsafdsa</p>', 1, 0, 0, 0, '2009-06-16 21:41:28', 62, '', '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', '2009-06-16 21:41:28', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 1, 0, 3, '', '', 0, 0, 'robots=\nauthor='),
(165, 'Para Refletir', 'para-refletir', '', '<img style="border: 1px solid #b7b7b7; padding: 3px; margin-right: 4px; float: left;" alt="biblia" src="images/stories/biblia.png" width="128" height="111" /><strong>Os Princípios bíblicos aplicados na vida do estudante:</strong><br /><br />Individualidade Cada um tem a sua forma de aprender e de expressar o que sabe. Você tem muito a aprender e muito a ensinar. Lembre-se, sua atitude também é uma maneira de ensinar as pessoas. Respeite e contribua!<br />\r\n', '\r\n<br />Semear e colher Tenha compromisso com seus estudos, seja responsável, enriqueça seu aprendizado pesquisando e estudando além do que é ensinado em sala de aula, assim seu sucesso será uma realidade.<br /> <br />Autogoverno Procure se controlar diante de situações que queiram tirar sua atenção e concentração das atividades escolares. Isto serve para sala de aula e em casa, nas horas separadas para estudos.<br /><br />União Todas as pessoas que fazem parte do seu contexto escolar são importantes na sua formação: colegas, professores, funcionários, etc., portanto, procure ser amigo dessas pessoas, valorizando-as e respeitando-as.Caráter Seja sempre honesto, primeiramente consigo mesmo, cumprindo suas tarefas com a impedir seu crescimento e o de seus colegas. Faça diferença onde está plantado!<br /><br />Mordomia Cuide de aprender o que está sendo ensinado HOJE. Não perca a oportunidade de crescer com as pessoas que Deus colocou no seu caminho.<br /><br />Soberania Creia que você jamais estaria aqui, neste Colégio, se Deus assim não o quisesse, então confia Nele e agradeço-O, pois Ele pode abençoá-lo muito com todas as coisas que lhe são oferecidas neste momento: professores, funcionários, estrutura da escola, material pedagógico, metodologia...', 1, 0, 0, 0, '2009-06-16 21:41:48', 62, '', '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', '2009-06-16 21:41:48', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 1, 0, 2, '', '', 0, 0, 'robots=\nauthor='),
(158, 'Palavra da Direção', 'palavra-da-direcao', '', '<p><img style="float: right;" height="123" alt="barra" src="images/stories/barra.jpg" width="420" /></p>\r\n<p>A Escola Oficina dos Sonhos, além de transmitir aos alunos, os conteúdos necessários ao crescimento intelectual, quer ensinar a amar a vida, superar conflitos e ser solidário. Amar é a necessidade universal mais sublime e mais difícil de ser atendida. O mestre dos mestres fornecia regras e ensinamentos, queria conduzir o homem a ser um caminhante na trajetória do seu próprio ser.</p>\r\n<p>O papel da Escola é ensinar a pensar, a enfrentar os desafios internos e externos, a fazer do ato de viver a grande oportunidade para a ampliação de subsídios na investigação da própria realidade. Só assim uma transformação terá êxito e permitirá que cada indivíduo contribua para o resgate e cultivo consciente dos valores morais e espirituais, esforçando-se para moldar um novo modelo de sociedade. Os valores morais e espirituais fazem aflorar o conhecimento interior, o despertar da alma e o aperfeiçoamento do caráter.</p>\r\n<p>Propomos um aprendizado integral, em que a proposta curricular á aplicada de maneira abrangente, rica e experimentada conjuntamente pela internalização dos valores.</p>\r\n<p>Precisamos estimular os jovens a pensar, ter sutileza, perspicácia, segurança e ousadia e acima de tudo formar pensadores que conheçam o alfabeto do amor.</p>\r\n<p><strong>"O coração do sábio adquire o conhecimento, e o ouvido dos sábios procura o saber"</strong> Pv18:15</p>\r\n<p>Marcia Poletti - Diretora</p>', '', 1, 16, 0, 35, '2009-06-16 21:32:26', 68, '', '2009-06-16 21:33:33', 62, 0, '0000-00-00 00:00:00', '2009-06-16 21:32:26', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 2, 0, 1, '', '', 0, 15, 'robots=\nauthor='),
(159, 'Princípios e Valores', 'principios-e-valores', '', '<p><img style="margin-right: 4px; float: left;" alt="menina" src="images/stories/menina.jpg" width="200" height="300" />Num tempo em que a aparência vale mais do que a essência e a competição imperam nos relacionamentos, é imprescindível falar com nossas crianças de companheirismo, amizade e amor. Num tempo em que a esperança parece cada vez mais escassa, é fundamental reavivar nossa confiança em dias melhores. Num tempo em que valores devem nortear a vida em sociedade e estão esquecidos.</p>\r\n<p>A Escola Oficina dos Sonhos optou por incluir em nosso currículo Educação por Princípios, em busca de resgatar a essência da VIDA.<br />O que é Educação por Princípios? É um método educacional cristão que desenvolve o raciocínio a partir dos fundamentos bíblicos, que está baseado em quatro passos: Pesquisar, Raciocinar, Relacionar e Registrar.<br />O Centro de Educação Oficina dos Sonhos agradece a Deus e recebe com alegria e gratidão cada criança e família no desejo de servi-los sempre com amor.</p>', '', 1, 16, 0, 35, '2009-06-16 21:33:38', 68, '', '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', '2009-06-16 21:33:38', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 1, 0, 2, '', '', 0, 9, 'robots=\nauthor='),
(160, 'Histórico', 'historico', '', '<p style="text-align: center;"><img style="margin-bottom: 4px;" alt="logomarca" src="images/stories/logomarca.jpg" width="300" height="79" /></p>\r\n<p><strong>CENTRO DE EDUCAÇÃO OFICINA DOS SONHOS</strong><br /><br />A Escola Oficina foi fundada em 12 de dezembro de 1996.<br />Situada na Rua Hermann, lange, 270 – Costa e Silva.<br />Iniciamos as atividades curriculares em dezembro de 1996 com apenas 12 crianças, 01 zeladora, 01 auxiliar e Márcia Poletti como professora.<br />Em menos de 01 ano tínhamos 50 alunos, contratamos mais profissionais, ampliamos o espaço no próprio terreno, sempre priorizando qualidade na Educação.<br />Mais tarde compramos um terreno na Rua Senador Nilo Coelho, 181, pois na escolinha onde tudo começou faltava espaço.<br />Em Fevereiro de 2001 mudamos para a nossa escola, tínhamos conseguido adquirir uma sede própria...Quanta Felicidade!!!!<br />Hoje com 270 alunos a Escola nova que em 2001 era o ideal, tornou-se pequena, o espaço ficou limitado aos nossos objetivos.<br />Em 2003 começamos a procurar um terreno para uma futura ampliação com uma construção moderna, para atender melhor os alunos.<br />O crescimento positivo desta instituição, apoiado pela confiança da comunidade e em Deus, baseado na sua Palavra, continua ano após ano.<br />Hoje estamos em obras onde, teremos 14.000 metros quadrados de área verde, com direito a trilhas, nascente, salas amplas, laboratórios, quadras polivalentes....<br />Podemos falar com o coração cheio de bons sentimentos, que toda esta trajetória valeu e que queremos mais do que ensinar os PCN''s, mas mudar os pilares centrais que estruturam a personalidade, aprender a pensar antes de reagir e amar o espetáculo da vida.<br />As sementes que plantamos, precisam ser regadas com muito Amor.<br />Precisamos seguir o caminho do Mestre dos Mestres...<br />Temos a certeza que podemos fazer de nossos alunos, verdadeiros governadores deste país.<br />O princípio de semeadura e colheita se aplica para implantarmos a Verdade de Deus nas nações. É num processo gradual, através da Educação Cristã, que as sementes são plantadas e cuidadas, para produzir frutos em todos os aspectos da vida: pessoal, social, política e econômica.<br /><br />Márcia Poletti<br />Diretora</p>', '', 1, 16, 0, 35, '2009-06-16 21:34:11', 68, '', '2009-06-16 21:40:21', 62, 0, '0000-00-00 00:00:00', '2009-06-16 21:34:11', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 2, 0, 3, '', '', 0, 3, 'robots=\nauthor='),
(1, 'Calendário Letivo', 'calendario-letivo', 'Escola Oficina dos Sonhos', '<p align="center">&nbsp;&nbsp;<img src="images/stories/calendario.jpg" hspace="6" alt="" title="" border="0" /></p><p align="justify">&Oacute; Deus, que te fizeste crian&ccedil;a para que, na tua fragilidade, melhor te am&aacute;ssemos e mais facilmente pud&eacute;ssemos adorar a tua onipot&ecirc;ncia.<br />Aben&ccedil;oa esta fam&iacute;lia reunida, em esp&iacute;rito de humildade e alegria, ao redor da mesa festiva desta ceia natal&iacute;cia, e faz descer sobre o mundo a luz da paz, aquela que, nesta noite santa, os anjos prometeram &agrave;s pessoas de boa vontade: gl&oacute;ria a Deus no mais alto dos c&eacute;us, e, na terra, paz aos que s&atilde;o do seu agrado! (Lc 2,14)</p><p align="center"><img src="images/stories/calendario.jpg" hspace="6" alt="" title="" border="0" /></p>', '', 1, 1, 0, 1, '2004-06-12 11:54:06', 62, 'Web Master', '2006-06-05 11:55:34', 62, 0, '0000-00-00 00:00:00', '2004-01-01 00:00:00', '0000-00-00 00:00:00', 'calendario.jpg|center||0||bottom|center|\r\nimg_escola/predio_oficina.jpg|center||0||bottom||', '', 'pageclass_sfx=\nback_button=\nitem_title=0\nlink_titles=0\nintrotext=1\nsection=0\nsection_link=0\ncategory=0\ncategory_link=0\nrating=\nauthor=\ncreatedate=\nmodifydate=\npdf=\nprint=\nemail=\nkeyref=\ndocbook_type=', 14, 0, 61, '', '', 0, 157, '');
INSERT INTO `jos_content` (`id`, `title`, `alias`, `title_alias`, `introtext`, `fulltext`, `state`, `sectionid`, `mask`, `catid`, `created`, `created_by`, `created_by_alias`, `modified`, `modified_by`, `checked_out`, `checked_out_time`, `publish_up`, `publish_down`, `images`, `urls`, `attribs`, `version`, `parentid`, `ordering`, `metakey`, `metadesc`, `access`, `hits`, `metadata`) VALUES
(19, 'Informativo', 'informativo', '', '<br /><img src="images/stories/info.png" width="100" height="100" alt="info" style="margin: 6px;" /><br /> \r\n<table style="border-collapse: collapse; width: 475px;" cellpadding="0" cellspacing="0" border="0">\r\n</table>\r\n<table style="border-collapse: collapse; width: 475px;" cellpadding="0" cellspacing="0" border="0">\r\n<tbody>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="width: 475px; height: 17px; background-color: #cad1f6; border: 0.5pt solid windowtext;" colspan="6" class="xl24">\r\n<p align="center"><span style="font-family: Arial; color: #0000ff; font-size: x-small;"><strong>CARGA HORARIA - 5ª série</strong></span></p>\r\n</td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="border-right: windowtext 0.5pt solid; border-top: windowtext; border-left: windowtext 0.5pt solid; border-bottom: windowtext 0.5pt solid; height: 12.75pt; background-color: transparent;" height="17" class="xl27">\r\n<p align="center"> </p>\r\n</td>\r\n<td style="border-right: windowtext 0.5pt solid; border-top: windowtext; border-left: windowtext; border-bottom: windowtext 0.5pt solid; background-color: transparent" class="xl27">\r\n<p align="center"><span style="font-family: Arial; color: #000000; font-size: x-small;"><strong>2ª</strong></span></p>\r\n</td>\r\n<td style="border-right: windowtext 0.5pt solid; border-top: windowtext; border-left: windowtext; border-bottom: windowtext 0.5pt solid; background-color: transparent" class="xl27">\r\n<p align="center"><span style="font-family: Arial; color: #000000; font-size: x-small;"><strong>3ª</strong></span></p>\r\n</td>\r\n<td style="border-right: windowtext 0.5pt solid; border-top: windowtext; border-left: windowtext; border-bottom: windowtext 0.5pt solid; background-color: transparent" class="xl27">\r\n<p align="center"><span style="font-family: Arial; color: #000000; font-size: x-small;"><strong>4ª</strong></span></p>\r\n</td>\r\n<td style="border-right: windowtext 0.5pt solid; border-top: windowtext; border-left: windowtext; border-bottom: windowtext 0.5pt solid; background-color: transparent" class="xl27">\r\n<p align="center"><span style="font-family: Arial; color: #000000; font-size: x-small;"><strong>5ª</strong></span></p>\r\n</td>\r\n<td style="border-right: windowtext 0.5pt solid; border-top: windowtext; border-left: windowtext; border-bottom: windowtext 0.5pt solid; background-color: transparent" class="xl27">\r\n<p align="center"><span style="font-family: Arial; color: #000000; font-size: x-small;"><strong>6ª</strong></span></p>\r\n</td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="border-right: windowtext 0.5pt solid; border-top: windowtext; border-left: windowtext 0.5pt solid; border-bottom: windowtext 0.5pt solid; height: 12.75pt; background-color: transparent;" height="17" class="xl27">\r\n<p align="center"><span style="font-family: Arial; color: #000000; font-size: x-small;"><strong>7:30 A 8:18</strong></span></p>\r\n</td>\r\n<td style="border-right: windowtext 0.5pt solid; border-top: windowtext; border-left: windowtext; border-bottom: windowtext 0.5pt solid; background-color: transparent" class="xl28">\r\n<p align="center"><span style="font-family: Arial; color: #ff0000; font-size: x-small;">ed. fisica</span></p>\r\n</td>\r\n<td style="border-right: windowtext 0.5pt solid; border-top: windowtext; border-left: windowtext; border-bottom: windowtext 0.5pt solid; background-color: transparent" class="xl27">\r\n<p align="center"><span style="font-family: Arial; color: #000000; font-size: x-small;">matematica</span></p>\r\n</td>\r\n<td style="border-right: windowtext 0.5pt solid; border-top: windowtext; border-left: windowtext; border-bottom: windowtext 0.5pt solid; background-color: transparent" class="xl27">\r\n<p align="center"><span style="font-family: Arial; color: #000000; font-size: x-small;">ciências</span></p>\r\n</td>\r\n<td style="border-right: windowtext 0.5pt solid; border-top: windowtext; border-left: windowtext; border-bottom: windowtext 0.5pt solid; background-color: transparent" class="xl27">\r\n<p align="center"><span style="font-family: Arial; color: #000000; font-size: x-small;">artes</span></p>\r\n</td>\r\n<td style="border-right: windowtext 0.5pt solid; border-top: windowtext; border-left: windowtext; border-bottom: windowtext 0.5pt solid; background-color: transparent" class="xl28">\r\n<p align="center"><span style="font-family: Arial; color: #ff0000; font-size: x-small;">ed.física</span></p>\r\n</td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="border-right: windowtext 0.5pt solid; border-top: windowtext; border-left: windowtext 0.5pt solid; border-bottom: windowtext 0.5pt solid; height: 12.75pt; background-color: transparent;" height="17" class="xl27">\r\n<p align="center"><span style="font-family: Arial; color: #000000; font-size: x-small;"><strong>8:18 A 9:06</strong></span></p>\r\n</td>\r\n<td style="border-right: windowtext 0.5pt solid; border-top: windowtext; border-left: windowtext; border-bottom: windowtext 0.5pt solid; background-color: transparent" class="xl27">\r\n<p align="center"><span style="font-family: Arial; color: #000000; font-size: x-small;">história</span></p>\r\n</td>\r\n<td style="border-right: windowtext 0.5pt solid; border-top: windowtext; border-left: windowtext; border-bottom: windowtext 0.5pt solid; background-color: transparent" class="xl27">\r\n<p align="center"><span style="font-family: Arial; color: #000000; font-size: x-small;">matematica</span></p>\r\n</td>\r\n<td style="border-right: windowtext 0.5pt solid; border-top: windowtext; border-left: windowtext; border-bottom: windowtext 0.5pt solid; background-color: transparent" class="xl27">\r\n<p align="center"><span style="font-family: Arial; color: #000000; font-size: x-small;">português</span></p>\r\n</td>\r\n<td style="border-right: windowtext 0.5pt solid; border-top: windowtext; border-left: windowtext; border-bottom: windowtext 0.5pt solid; background-color: transparent" class="xl27">\r\n<p align="center"><span style="font-family: Arial; color: #000000; font-size: x-small;">geografia</span></p>\r\n</td>\r\n<td style="border-right: windowtext 0.5pt solid; border-top: windowtext; border-left: windowtext; border-bottom: windowtext 0.5pt solid; background-color: transparent" class="xl28">\r\n<p align="center"><span style="font-family: Arial; color: #ff0000; font-size: x-small;">ed. física</span></p>\r\n</td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="border-right: windowtext 0.5pt solid; border-top: windowtext; border-left: windowtext 0.5pt solid; border-bottom: windowtext 0.5pt solid; height: 12.75pt; background-color: transparent;" height="17" class="xl27">\r\n<p align="center"><span style="font-family: Arial; color: #000000; font-size: x-small;"><strong>9:06 A 9:54</strong></span></p>\r\n</td>\r\n<td style="background-color: transparent; border: #ece9d8" class="xl29">\r\n<p align="center"><span style="font-family: Arial; color: #000000; font-size: x-small;">história</span></p>\r\n</td>\r\n<td style="border-right: windowtext 0.5pt solid; border-top: windowtext; border-left: windowtext 0.5pt solid; border-bottom: windowtext 0.5pt solid; background-color: transparent" class="xl27">\r\n<p align="center"><span style="font-family: Arial; color: #000000; font-size: x-small;">ciências</span></p>\r\n</td>\r\n<td style="border-right: windowtext 0.5pt solid; border-top: windowtext; border-left: windowtext; border-bottom: windowtext 0.5pt solid; background-color: transparent" class="xl27">\r\n<p align="center"><span style="font-family: Arial; color: #000000; font-size: x-small;">português</span></p>\r\n</td>\r\n<td style="border-right: windowtext 0.5pt solid; border-top: windowtext; border-left: windowtext; border-bottom: windowtext 0.5pt solid; background-color: transparent" class="xl27">\r\n<p align="center"><span style="font-family: Arial; color: #000000; font-size: x-small;">geografia</span></p>\r\n</td>\r\n<td style="border-right: windowtext 0.5pt solid; border-top: windowtext; border-left: windowtext; border-bottom: windowtext 0.5pt solid; background-color: transparent" class="xl28">\r\n<p align="center"><span style="font-family: Arial; color: #ff0000; font-size: x-small;">ed.cristã</span></p>\r\n</td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="border-right: windowtext 0.5pt solid; border-top: windowtext; border-left: windowtext 0.5pt solid; border-bottom: windowtext 0.5pt solid; height: 12.75pt; background-color: transparent;" height="17" class="xl27">\r\n<p align="center"><span style="font-family: Arial; color: #000000; font-size: x-small;"><strong>9:54 A 10:09</strong></span></p>\r\n</td>\r\n<td style="border-right: windowtext 0.5pt solid; border-top: windowtext 0.5pt solid; border-left: windowtext; border-bottom: windowtext 0.5pt solid; background-color: transparent" class="xl27">\r\n<p align="center"><span style="font-family: Arial; color: #000000; font-size: x-small;">recreio</span></p>\r\n</td>\r\n<td style="border-right: windowtext 0.5pt solid; border-top: windowtext; border-left: windowtext; border-bottom: windowtext 0.5pt solid; background-color: transparent" class="xl27">\r\n<p align="center"><span style="font-family: Arial; color: #000000; font-size: x-small;">recreio</span></p>\r\n</td>\r\n<td style="border-right: windowtext 0.5pt solid; border-top: windowtext; border-left: windowtext; border-bottom: windowtext 0.5pt solid; background-color: transparent" class="xl27">\r\n<p align="center"><span style="font-family: Arial; color: #000000; font-size: x-small;">recreio</span></p>\r\n</td>\r\n<td style="border-right: windowtext 0.5pt solid; border-top: windowtext; border-left: windowtext; border-bottom: windowtext 0.5pt solid; background-color: transparent" class="xl27">\r\n<p align="center"><span style="font-family: Arial; color: #000000; font-size: x-small;">recreio</span></p>\r\n</td>\r\n<td style="border-right: windowtext 0.5pt solid; border-top: windowtext; border-left: windowtext; border-bottom: windowtext 0.5pt solid; background-color: transparent" class="xl27">\r\n<p align="center"><span style="font-family: Arial; color: #000000; font-size: x-small;">recreio</span></p>\r\n</td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="border-right: windowtext 0.5pt solid; border-top: windowtext; border-left: windowtext 0.5pt solid; border-bottom: windowtext 0.5pt solid; height: 12.75pt; background-color: transparent;" height="17" class="xl27">\r\n<p align="center"><span style="font-family: Arial; color: #000000; font-size: x-small;"><strong>10:09 A 10:57</strong></span></p>\r\n</td>\r\n<td style="border-right: windowtext 0.5pt solid; border-top: windowtext; border-left: windowtext; border-bottom: windowtext 0.5pt solid; background-color: transparent" class="xl27">\r\n<p align="center"><span style="font-family: Arial; color: #000000; font-size: x-small;">português</span></p>\r\n</td>\r\n<td style="border-right: windowtext 0.5pt solid; border-top: windowtext; border-left: windowtext; border-bottom: windowtext 0.5pt solid; background-color: transparent" class="xl27">\r\n<p align="center"><span style="font-family: Arial; color: #000000; font-size: x-small;">ciências</span></p>\r\n</td>\r\n<td style="border-right: windowtext 0.5pt solid; border-top: windowtext; border-left: windowtext; border-bottom: windowtext 0.5pt solid; background-color: transparent" class="xl27">\r\n<p align="center"><span style="font-family: Arial; color: #000000; font-size: x-small;">inglês</span></p>\r\n</td>\r\n<td style="border-right: windowtext 0.5pt solid; border-top: windowtext; border-left: windowtext; border-bottom: windowtext 0.5pt solid; background-color: transparent" class="xl27">\r\n<p align="center"><span style="font-family: Arial; color: #000000; font-size: x-small;">matemat</span></p>\r\n</td>\r\n<td style="border-right: windowtext 0.5pt solid; border-top: windowtext; border-left: windowtext; border-bottom: windowtext 0.5pt solid; background-color: transparent" class="xl27">\r\n<p align="center"><span style="font-family: Arial; color: #000000; font-size: x-small;">artes</span></p>\r\n</td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="border-right: windowtext 0.5pt solid; border-top: windowtext; border-left: windowtext 0.5pt solid; border-bottom: windowtext 0.5pt solid; height: 12.75pt; background-color: transparent;" height="17" class="xl27">\r\n<p align="center"><span style="font-family: Arial; color: #000000; font-size: x-small;"><strong>10:57 A 11:45</strong></span></p>\r\n</td>\r\n<td style="border-right: windowtext 0.5pt solid; border-top: windowtext; border-left: windowtext; border-bottom: windowtext 0.5pt solid; background-color: transparent" class="xl27">\r\n<p align="center"><span style="font-family: Arial; color: #000000; font-size: x-small;">português</span></p>\r\n</td>\r\n<td style="border-right: windowtext 0.5pt solid; border-top: windowtext; border-left: windowtext; border-bottom: windowtext 0.5pt solid; background-color: transparent" class="xl27">\r\n<p align="center"><span style="font-family: Arial; color: #000000; font-size: x-small;">inglês</span></p>\r\n</td>\r\n<td style="border-right: windowtext 0.5pt solid; border-top: windowtext; border-left: windowtext; border-bottom: windowtext 0.5pt solid; background-color: transparent" class="xl27">\r\n<p align="center"><span style="font-family: Arial; color: #000000; font-size: x-small;">inglês</span></p>\r\n</td>\r\n<td style="border-right: windowtext 0.5pt solid; border-top: windowtext; border-left: windowtext; border-bottom: windowtext 0.5pt solid; background-color: transparent" class="xl27">\r\n<p align="center"><span style="font-family: Arial; color: #000000; font-size: x-small;">matemat</span></p>\r\n</td>\r\n<td style="border-right: windowtext 0.5pt solid; border-top: windowtext; border-left: windowtext; border-bottom: windowtext 0.5pt solid; background-color: transparent" class="xl27">\r\n<p align="center"><span style="font-family: Arial; color: #000000; font-size: x-small;">história</span></p>\r\n</td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: #ece9d8;" height="17" class="xl30">\r\n<p align="center"> </p>\r\n</td>\r\n<td style="background-color: transparent; border: #ece9d8" class="xl30">\r\n<p align="center"> </p>\r\n</td>\r\n<td style="background-color: transparent; border: #ece9d8" class="xl30">\r\n<p align="center"> </p>\r\n</td>\r\n<td style="background-color: transparent; border: #ece9d8" class="xl30">\r\n<p align="center"> </p>\r\n</td>\r\n<td style="background-color: transparent; border: #ece9d8" class="xl30">\r\n<p align="center"> </p>\r\n</td>\r\n<td style="background-color: transparent; border: #ece9d8" class="xl30">\r\n<p align="center"> </p>\r\n</td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: #ece9d8;" height="17" colspan="2" class="xl30">\r\n<p align="center"><span style="font-family: Arial; color: #000000; font-size: x-small;"> </span></p>\r\n</td>\r\n<td style="background-color: transparent; border: #ece9d8" class="xl30">\r\n<p align="center"> </p>\r\n</td>\r\n<td style="background-color: transparent; border: #ece9d8" class="xl30">\r\n<p align="center"> </p>\r\n</td>\r\n<td style="background-color: transparent; border: #ece9d8" class="xl30">\r\n<p align="center"> </p>\r\n</td>\r\n<td style="background-color: transparent; border: #ece9d8" class="xl30">\r\n<p align="center"> </p>\r\n</td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 17px; background-color: #cad1f6; border: 0.5pt solid windowtext;" colspan="6" class="xl24">\r\n<p align="center"><span style="font-family: Arial; color: #0000ff; font-size: x-small;"><strong>CARGA HORARIA - 6ª série</strong></span></p>\r\n</td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="border-right: windowtext 0.5pt solid; border-top: windowtext; border-left: windowtext 0.5pt solid; border-bottom: windowtext 0.5pt solid; height: 12.75pt; background-color: transparent;" height="17" class="xl27">\r\n<p align="center"> </p>\r\n</td>\r\n<td style="border-right: windowtext 0.5pt solid; border-top: windowtext; border-left: windowtext; border-bottom: windowtext 0.5pt solid; background-color: transparent" class="xl27">\r\n<p align="center"><span style="font-family: Arial; color: #000000; font-size: x-small;"><strong>2ª</strong></span></p>\r\n</td>\r\n<td style="border-right: windowtext 0.5pt solid; border-top: windowtext; border-left: windowtext; border-bottom: windowtext 0.5pt solid; background-color: transparent" class="xl27">\r\n<p align="center"><span style="font-family: Arial; color: #000000; font-size: x-small;"><strong>3ª</strong></span></p>\r\n</td>\r\n<td style="border-right: windowtext 0.5pt solid; border-top: windowtext; border-left: windowtext; border-bottom: windowtext 0.5pt solid; background-color: transparent" class="xl27">\r\n<p align="center"><span style="font-family: Arial; color: #000000; font-size: x-small;"><strong>4ª</strong></span></p>\r\n</td>\r\n<td style="border-right: windowtext 0.5pt solid; border-top: windowtext; border-left: windowtext; border-bottom: windowtext 0.5pt solid; background-color: transparent" class="xl27">\r\n<p align="center"><span style="font-family: Arial; color: #000000; font-size: x-small;"><strong>5ª</strong></span></p>\r\n</td>\r\n<td style="border-right: windowtext 0.5pt solid; border-top: windowtext; border-left: windowtext; border-bottom: windowtext 0.5pt solid; background-color: transparent" class="xl27">\r\n<p align="center"><span style="font-family: Arial; color: #000000; font-size: x-small;"><strong>6ª</strong></span></p>\r\n</td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="border-right: windowtext 0.5pt solid; border-top: windowtext; border-left: windowtext 0.5pt solid; border-bottom: windowtext 0.5pt solid; height: 12.75pt; background-color: transparent;" height="17" class="xl27">\r\n<p align="center"><span style="font-family: Arial; color: #000000; font-size: x-small;"><strong>7:30 A 8:18</strong></span></p>\r\n</td>\r\n<td style="border-right: windowtext 0.5pt solid; border-top: windowtext; border-left: windowtext; border-bottom: windowtext 0.5pt solid; background-color: transparent" class="xl28">\r\n<p align="center"><span style="font-family: Arial; color: #ff0000; font-size: x-small;">ed.física</span></p>\r\n</td>\r\n<td style="border-right: windowtext 0.5pt solid; border-top: windowtext; border-left: windowtext; border-bottom: windowtext 0.5pt solid; background-color: transparent" class="xl27">\r\n<p align="center"><span style="font-family: Arial; color: #000000; font-size: x-small;">inglês</span></p>\r\n</td>\r\n<td style="border-right: windowtext 0.5pt solid; border-top: windowtext; border-left: windowtext; border-bottom: windowtext 0.5pt solid; background-color: transparent" class="xl27">\r\n<p align="center"><span style="font-family: Arial; color: #000000; font-size: x-small;">inglês</span></p>\r\n</td>\r\n<td style="border-right: windowtext 0.5pt solid; border-top: windowtext; border-left: windowtext; border-bottom: windowtext 0.5pt solid; background-color: transparent" class="xl27">\r\n<p align="center"><span style="font-family: Arial; color: #000000; font-size: x-small;">matemat</span></p>\r\n</td>\r\n<td style="border-right: windowtext 0.5pt solid; border-top: windowtext; border-left: windowtext; border-bottom: windowtext 0.5pt solid; background-color: transparent" class="xl28">\r\n<p align="center"><span style="font-family: Arial; color: #ff0000; font-size: x-small;">ed.cristã</span></p>\r\n</td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="border-right: windowtext 0.5pt solid; border-top: windowtext; border-left: windowtext 0.5pt solid; border-bottom: windowtext 0.5pt solid; height: 12.75pt; background-color: transparent;" height="17" class="xl27">\r\n<p align="center"><span style="font-family: Arial; color: #000000; font-size: x-small;"><strong>8:18 A 9:06</strong></span></p>\r\n</td>\r\n<td style="border-right: windowtext 0.5pt solid; border-top: windowtext; border-left: windowtext; border-bottom: windowtext 0.5pt solid; background-color: transparent" class="xl27">\r\n<p align="center"><span style="font-family: Arial; color: #000000; font-size: x-small;">português</span></p>\r\n</td>\r\n<td style="border-right: windowtext 0.5pt solid; border-top: windowtext; border-left: windowtext; border-bottom: windowtext 0.5pt solid; background-color: transparent" class="xl27">\r\n<p align="center"><span style="font-family: Arial; color: #000000; font-size: x-small;">ciências</span></p>\r\n</td>\r\n<td style="border-right: windowtext 0.5pt solid; border-top: windowtext; border-left: windowtext; border-bottom: windowtext 0.5pt solid; background-color: transparent" class="xl27">\r\n<p align="center"><span style="font-family: Arial; color: #000000; font-size: x-small;">ciências</span></p>\r\n</td>\r\n<td style="border-right: windowtext 0.5pt solid; border-top: windowtext; border-left: windowtext; border-bottom: windowtext 0.5pt solid; background-color: transparent" class="xl27">\r\n<p align="center"><span style="font-family: Arial; color: #000000; font-size: x-small;">matemat.</span></p>\r\n</td>\r\n<td style="border-right: windowtext 0.5pt solid; border-top: windowtext; border-left: windowtext; border-bottom: windowtext 0.5pt solid; background-color: transparent" class="xl28">\r\n<p align="center"><span style="font-family: Arial; color: #ff0000; font-size: x-small;">ed.física</span></p>\r\n</td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="border-right: windowtext 0.5pt solid; border-top: windowtext; border-left: windowtext 0.5pt solid; border-bottom: windowtext 0.5pt solid; height: 12.75pt; background-color: transparent;" height="17" class="xl27">\r\n<p align="center"><span style="font-family: Arial; color: #000000; font-size: x-small;"><strong>9:06 A 9:54</strong></span></p>\r\n</td>\r\n<td style="background-color: transparent; border: #ece9d8" class="xl29">\r\n<p align="center"><span style="font-family: Arial; color: #000000; font-size: x-small;">português</span></p>\r\n</td>\r\n<td style="border-right: windowtext 0.5pt solid; border-top: windowtext; border-left: windowtext 0.5pt solid; border-bottom: windowtext 0.5pt solid; background-color: transparent" class="xl27">\r\n<p align="center"><span style="font-family: Arial; color: #000000; font-size: x-small;">ciências</span></p>\r\n</td>\r\n<td style="border-right: windowtext 0.5pt solid; border-top: windowtext; border-left: windowtext; border-bottom: windowtext 0.5pt solid; background-color: transparent" class="xl27">\r\n<p align="center"><span style="font-family: Arial; color: #000000; font-size: x-small;">inglês</span></p>\r\n</td>\r\n<td style="border-right: windowtext 0.5pt solid; border-top: windowtext; border-left: windowtext; border-bottom: windowtext 0.5pt solid; background-color: transparent" class="xl27">\r\n<p align="center"><span style="font-family: Arial; color: #000000; font-size: x-small;">artes</span></p>\r\n</td>\r\n<td style="border-right: windowtext 0.5pt solid; border-top: windowtext; border-left: windowtext; border-bottom: windowtext 0.5pt solid; background-color: transparent" class="xl28">\r\n<p align="center"><span style="font-family: Arial; color: #ff0000; font-size: x-small;">ed.física</span></p>\r\n</td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="border-right: windowtext 0.5pt solid; border-top: windowtext; border-left: windowtext 0.5pt solid; border-bottom: windowtext 0.5pt solid; height: 12.75pt; background-color: transparent;" height="17" class="xl27">\r\n<p align="center"><span style="font-family: Arial; color: #000000; font-size: x-small;"><strong>9:54 A 10:09</strong></span></p>\r\n</td>\r\n<td style="border-right: windowtext 0.5pt solid; border-top: windowtext 0.5pt solid; border-left: windowtext; border-bottom: windowtext 0.5pt solid; background-color: transparent" class="xl27">\r\n<p align="center"><span style="font-family: Arial; color: #000000; font-size: x-small;">recreio</span></p>\r\n</td>\r\n<td style="border-right: windowtext 0.5pt solid; border-top: windowtext; border-left: windowtext; border-bottom: windowtext 0.5pt solid; background-color: transparent" class="xl27">\r\n<p align="center"><span style="font-family: Arial; color: #000000; font-size: x-small;">recreio</span></p>\r\n</td>\r\n<td style="border-right: windowtext 0.5pt solid; border-top: windowtext; border-left: windowtext; border-bottom: windowtext 0.5pt solid; background-color: transparent" class="xl27">\r\n<p align="center"><span style="font-family: Arial; color: #000000; font-size: x-small;">recreio</span></p>\r\n</td>\r\n<td style="border-right: windowtext 0.5pt solid; border-top: windowtext; border-left: windowtext; border-bottom: windowtext 0.5pt solid; background-color: transparent" class="xl27">\r\n<p align="center"><span style="font-family: Arial; color: #000000; font-size: x-small;">recreio</span></p>\r\n</td>\r\n<td style="border-right: windowtext 0.5pt solid; border-top: windowtext; border-left: windowtext; border-bottom: windowtext 0.5pt solid; background-color: transparent" class="xl27">\r\n<p align="center"><span style="font-family: Arial; color: #000000; font-size: x-small;">recreio</span></p>\r\n</td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="border-right: windowtext 0.5pt solid; border-top: windowtext; border-left: windowtext 0.5pt solid; border-bottom: windowtext 0.5pt solid; height: 12.75pt; background-color: transparent;" height="17" class="xl27">\r\n<p align="center"><span style="font-family: Arial; color: #000000; font-size: x-small;"><strong>10:09 A 10:57</strong></span></p>\r\n</td>\r\n<td style="border-right: windowtext 0.5pt solid; border-top: windowtext; border-left: windowtext; border-bottom: windowtext 0.5pt solid; background-color: transparent" class="xl27">\r\n<p align="center"><span style="font-family: Arial; color: #000000; font-size: x-small;">história</span></p>\r\n</td>\r\n<td style="border-right: windowtext 0.5pt solid; border-top: windowtext; border-left: windowtext; border-bottom: windowtext 0.5pt solid; background-color: transparent" class="xl27">\r\n<p align="center"><span style="font-family: Arial; color: #000000; font-size: x-small;">matemática</span></p>\r\n</td>\r\n<td style="border-right: windowtext 0.5pt solid; border-top: windowtext; border-left: windowtext; border-bottom: windowtext 0.5pt solid; background-color: transparent" class="xl27">\r\n<p align="center"><span style="font-family: Arial; color: #000000; font-size: x-small;">português</span></p>\r\n</td>\r\n<td style="border-right: windowtext 0.5pt solid; border-top: windowtext; border-left: windowtext; border-bottom: windowtext 0.5pt solid; background-color: transparent" class="xl27">\r\n<p align="center"><span style="font-family: Arial; color: #000000; font-size: x-small;">geografia</span></p>\r\n</td>\r\n<td style="border-right: windowtext 0.5pt solid; border-top: windowtext; border-left: windowtext; border-bottom: windowtext 0.5pt solid; background-color: transparent" class="xl27">\r\n<p align="center"><span style="font-family: Arial; color: #000000; font-size: x-small;">história</span></p>\r\n</td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="border-right: windowtext 0.5pt solid; border-top: windowtext; border-left: windowtext 0.5pt solid; border-bottom: windowtext 0.5pt solid; height: 12.75pt; background-color: transparent;" height="17" class="xl27">\r\n<p align="center"><span style="font-family: Arial; color: #000000; font-size: x-small;"><strong>10:57 A 11:45</strong></span></p>\r\n</td>\r\n<td style="border-right: windowtext 0.5pt solid; border-top: windowtext; border-left: windowtext; border-bottom: windowtext 0.5pt solid; background-color: transparent" class="xl27">\r\n<p align="center"><span style="font-family: Arial; color: #000000; font-size: x-small;">história</span></p>\r\n</td>\r\n<td style="border-right: windowtext 0.5pt solid; border-top: windowtext; border-left: windowtext; border-bottom: windowtext 0.5pt solid; background-color: transparent" class="xl27">\r\n<p align="center"><span style="font-family: Arial; color: #000000; font-size: x-small;">matemática</span></p>\r\n</td>\r\n<td style="border-right: windowtext 0.5pt solid; border-top: windowtext; border-left: windowtext; border-bottom: windowtext 0.5pt solid; background-color: transparent" class="xl27">\r\n<p align="center"><span style="font-family: Arial; color: #000000; font-size: x-small;">português</span></p>\r\n</td>\r\n<td style="border-right: windowtext 0.5pt solid; border-top: windowtext; border-left: windowtext; border-bottom: windowtext 0.5pt solid; background-color: transparent" class="xl27">\r\n<p align="center"><span style="font-family: Arial; color: #000000; font-size: x-small;">geografia</span></p>\r\n</td>\r\n<td style="border-right: windowtext 0.5pt solid; border-top: windowtext; border-left: windowtext; border-bottom: windowtext 0.5pt solid; background-color: transparent" class="xl27">\r\n<p align="center"><span style="font-family: Arial; color: #000000; font-size: x-small;">artes</span></p>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p> </p>\r\n', '\r\n<table style="border-collapse: collapse; width: 475px;" cellpadding="0" cellspacing="0" border="0">\r\n<tbody>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="width: 475px; height: 17px; background-color: #cad1f6; border: 0.5pt solid windowtext;" colspan="6" class="xl24">\r\n<p align="center"><span style="font-family: Arial; color: #0000ff; font-size: x-small;"><strong>CARGA HORARIA - 7ª série</strong></span></p>\r\n</td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="border-right: windowtext 0.5pt solid; border-top: windowtext; border-left: windowtext 0.5pt solid; border-bottom: windowtext 0.5pt solid; height: 12.75pt; background-color: transparent;" height="17" class="xl27">\r\n<p align="center"> </p>\r\n</td>\r\n<td style="border-right: windowtext 0.5pt solid; border-top: windowtext; border-left: windowtext; border-bottom: windowtext 0.5pt solid; background-color: transparent" class="xl27">\r\n<p align="center"><span style="font-family: Arial; color: #000000; font-size: x-small;"><strong>2ª</strong></span></p>\r\n</td>\r\n<td style="border-right: windowtext 0.5pt solid; border-top: windowtext; border-left: windowtext; border-bottom: windowtext 0.5pt solid; background-color: transparent" class="xl27">\r\n<p align="center"><span style="font-family: Arial; color: #000000; font-size: x-small;"><strong>3ª</strong></span></p>\r\n</td>\r\n<td style="border-right: windowtext 0.5pt solid; border-top: windowtext; border-left: windowtext; border-bottom: windowtext 0.5pt solid; background-color: transparent" class="xl27">\r\n<p align="center"><span style="font-family: Arial; color: #000000; font-size: x-small;"><strong>4ª</strong></span></p>\r\n</td>\r\n<td style="border-right: windowtext 0.5pt solid; border-top: windowtext; border-left: windowtext; border-bottom: windowtext 0.5pt solid; background-color: transparent" class="xl27">\r\n<p align="center"><span style="font-family: Arial; color: #000000; font-size: x-small;"><strong>5ª</strong></span></p>\r\n</td>\r\n<td style="border-right: windowtext 0.5pt solid; border-top: windowtext; border-left: windowtext; border-bottom: windowtext 0.5pt solid; background-color: transparent" class="xl27">\r\n<p align="center"><span style="font-family: Arial; color: #000000; font-size: x-small;"><strong>6ª</strong></span></p>\r\n</td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="border-right: windowtext 0.5pt solid; border-top: windowtext; border-left: windowtext 0.5pt solid; border-bottom: windowtext 0.5pt solid; height: 12.75pt; background-color: transparent;" height="17" class="xl27">\r\n<p align="center"><span style="font-family: Arial; color: #000000; font-size: x-small;"><strong>7:30 A 8:18</strong></span></p>\r\n</td>\r\n<td style="border-right: windowtext 0.5pt solid; border-top: windowtext; border-left: windowtext; border-bottom: windowtext 0.5pt solid; background-color: transparent" class="xl28">\r\n<p align="center"><span style="font-family: Arial; color: #ff0000; font-size: x-small;">Inglês</span></p>\r\n</td>\r\n<td style="border-right: windowtext 0.5pt solid; border-top: windowtext; border-left: windowtext; border-bottom: windowtext 0.5pt solid; background-color: transparent" class="xl27">\r\n<p align="center"><span style="font-family: Arial; color: #000000; font-size: x-small;">matematica</span></p>\r\n</td>\r\n<td style="border-right: windowtext 0.5pt solid; border-top: windowtext; border-left: windowtext; border-bottom: windowtext 0.5pt solid; background-color: transparent" class="xl27">\r\n<p align="center"><span style="font-family: Arial; color: #000000; font-size: x-small;">ciências</span></p>\r\n</td>\r\n<td style="border-right: windowtext 0.5pt solid; border-top: windowtext; border-left: windowtext; border-bottom: windowtext 0.5pt solid; background-color: transparent" class="xl27">\r\n<p align="center"><span style="font-family: Arial; color: #000000; font-size: x-small;">Ed. Cristã</span></p>\r\n</td>\r\n<td style="border-right: windowtext 0.5pt solid; border-top: windowtext; border-left: windowtext; border-bottom: windowtext 0.5pt solid; background-color: transparent" class="xl28">\r\n<p align="center"><span style="font-family: Arial; color: #ff0000; font-size: x-small;">Ciências</span></p>\r\n</td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="border-right: windowtext 0.5pt solid; border-top: windowtext; border-left: windowtext 0.5pt solid; border-bottom: windowtext 0.5pt solid; height: 12.75pt; background-color: transparent;" height="17" class="xl27">\r\n<p align="center"><span style="font-family: Arial; color: #000000; font-size: x-small;"><strong>8:18 A 9:06</strong></span></p>\r\n</td>\r\n<td style="border-right: windowtext 0.5pt solid; border-top: windowtext; border-left: windowtext; border-bottom: windowtext 0.5pt solid; background-color: transparent" class="xl27">\r\n<p align="center"><span style="font-family: Arial; color: #000000; font-size: x-small;">Ed. Física</span></p>\r\n</td>\r\n<td style="border-right: windowtext 0.5pt solid; border-top: windowtext; border-left: windowtext; border-bottom: windowtext 0.5pt solid; background-color: transparent" class="xl27">\r\n<p align="center"><span style="font-family: Arial; color: #000000; font-size: x-small;">matematica</span></p>\r\n</td>\r\n<td style="border-right: windowtext 0.5pt solid; border-top: windowtext; border-left: windowtext; border-bottom: windowtext 0.5pt solid; background-color: transparent" class="xl27">\r\n<p align="center"><span style="font-family: Arial; color: #000000; font-size: x-small;">ciências</span></p>\r\n</td>\r\n<td style="border-right: windowtext 0.5pt solid; border-top: windowtext; border-left: windowtext; border-bottom: windowtext 0.5pt solid; background-color: transparent" class="xl27">\r\n<p align="center"><span style="font-family: Arial; color: #000000; font-size: x-small;">Português</span></p>\r\n</td>\r\n<td style="border-right: windowtext 0.5pt solid; border-top: windowtext; border-left: windowtext; border-bottom: windowtext 0.5pt solid; background-color: transparent" class="xl28">\r\n<p align="center"><span style="font-family: Arial; color: #ff0000; font-size: x-small;">Artes</span></p>\r\n</td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="border-right: windowtext 0.5pt solid; border-top: windowtext; border-left: windowtext 0.5pt solid; border-bottom: windowtext 0.5pt solid; height: 12.75pt; background-color: transparent;" height="17" class="xl27">\r\n<p align="center"><span style="font-family: Arial; color: #000000; font-size: x-small;"><strong>9:06 A 9:54</strong></span></p>\r\n</td>\r\n<td style="background-color: transparent; border: #ece9d8" class="xl29">\r\n<p align="center"><span style="font-family: Arial; color: #000000; font-size: x-small;">Ed. Física</span></p>\r\n</td>\r\n<td style="border-right: windowtext 0.5pt solid; border-top: windowtext; border-left: windowtext 0.5pt solid; border-bottom: windowtext 0.5pt solid; background-color: transparent" class="xl27">\r\n<p align="center"><span style="font-family: Arial; color: #000000; font-size: x-small;">Português</span></p>\r\n</td>\r\n<td style="border-right: windowtext 0.5pt solid; border-top: windowtext; border-left: windowtext; border-bottom: windowtext 0.5pt solid; background-color: transparent" class="xl27">\r\n<p align="center"><span style="font-family: Arial; color: #000000; font-size: x-small;">Matemática</span></p>\r\n</td>\r\n<td style="border-right: windowtext 0.5pt solid; border-top: windowtext; border-left: windowtext; border-bottom: windowtext 0.5pt solid; background-color: transparent" class="xl27">\r\n<p align="center"><span style="font-family: Arial; color: #000000; font-size: x-small;">Matemática</span></p>\r\n</td>\r\n<td style="border-right: windowtext 0.5pt solid; border-top: windowtext; border-left: windowtext; border-bottom: windowtext 0.5pt solid; background-color: transparent" class="xl28">\r\n<p align="center"><span style="font-size: 8pt;">História</span></p>\r\n</td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="border-right: windowtext 0.5pt solid; border-top: windowtext; border-left: windowtext 0.5pt solid; border-bottom: windowtext 0.5pt solid; height: 12.75pt; background-color: transparent;" height="17" class="xl27">\r\n<p align="center"><span style="font-family: Arial; color: #000000; font-size: x-small;"><strong>9:54 A 10:09</strong></span></p>\r\n</td>\r\n<td style="border-right: windowtext 0.5pt solid; border-top: windowtext 0.5pt solid; border-left: windowtext; border-bottom: windowtext 0.5pt solid; background-color: transparent" class="xl27">\r\n<p align="center"><span style="font-family: Arial; color: #000000; font-size: x-small;">recreio</span></p>\r\n</td>\r\n<td style="border-right: windowtext 0.5pt solid; border-top: windowtext; border-left: windowtext; border-bottom: windowtext 0.5pt solid; background-color: transparent" class="xl27">\r\n<p align="center"><span style="font-family: Arial; color: #000000; font-size: x-small;">recreio</span></p>\r\n</td>\r\n<td style="border-right: windowtext 0.5pt solid; border-top: windowtext; border-left: windowtext; border-bottom: windowtext 0.5pt solid; background-color: transparent" class="xl27">\r\n<p align="center"><span style="font-family: Arial; color: #000000; font-size: x-small;">recreio</span></p>\r\n</td>\r\n<td style="border-right: windowtext 0.5pt solid; border-top: windowtext; border-left: windowtext; border-bottom: windowtext 0.5pt solid; background-color: transparent" class="xl27">\r\n<p align="center"><span style="font-family: Arial; color: #000000; font-size: x-small;">recreio</span></p>\r\n</td>\r\n<td style="border-right: windowtext 0.5pt solid; border-top: windowtext; border-left: windowtext; border-bottom: windowtext 0.5pt solid; background-color: transparent" class="xl27">\r\n<p align="center"><span style="font-family: Arial; color: #000000; font-size: x-small;">recreio</span></p>\r\n</td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="border-right: windowtext 0.5pt solid; border-top: windowtext; border-left: windowtext 0.5pt solid; border-bottom: windowtext 0.5pt solid; height: 12.75pt; background-color: transparent;" height="17" class="xl27">\r\n<p align="center"><span style="font-family: Arial; color: #000000; font-size: x-small;"><strong>10:09 A 10:57</strong></span></p>\r\n</td>\r\n<td style="border-right: windowtext 0.5pt solid; border-top: windowtext; border-left: windowtext; border-bottom: windowtext 0.5pt solid; background-color: transparent" class="xl27">\r\n<p align="center"><span style="font-family: Arial; color: #000000; font-size: x-small;">Artes</span></p>\r\n</td>\r\n<td style="border-right: windowtext 0.5pt solid; border-top: windowtext; border-left: windowtext; border-bottom: windowtext 0.5pt solid; background-color: transparent" class="xl27">\r\n<p align="center"><span style="font-family: Arial; color: #000000; font-size: x-small;">Geografia</span></p>\r\n</td>\r\n<td style="border-right: windowtext 0.5pt solid; border-top: windowtext; border-left: windowtext; border-bottom: windowtext 0.5pt solid; background-color: transparent" class="xl27">\r\n<p align="center"><span style="font-family: Arial; color: #000000; font-size: x-small;">Português</span></p>\r\n</td>\r\n<td style="border-right: windowtext 0.5pt solid; border-top: windowtext; border-left: windowtext; border-bottom: windowtext 0.5pt solid; background-color: transparent" class="xl27">\r\n<p align="center"><span style="font-family: Arial; color: #000000; font-size: x-small;">Inglês</span></p>\r\n</td>\r\n<td style="border-right: windowtext 0.5pt solid; border-top: windowtext; border-left: windowtext; border-bottom: windowtext 0.5pt solid; background-color: transparent" class="xl27">\r\n<p align="center"><span style="font-size: 8pt;"><span style="font-family: arial, helvetica, sans-serif;">História</span></span></p>\r\n</td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="border-right: windowtext 0.5pt solid; border-top: windowtext; border-left: windowtext 0.5pt solid; border-bottom: windowtext 0.5pt solid; height: 12.75pt; background-color: transparent;" height="17" class="xl27">\r\n<p align="center"><span style="font-family: Arial; color: #000000; font-size: x-small;"><strong>10:57 A 11:45</strong></span></p>\r\n</td>\r\n<td style="border-right: windowtext 0.5pt solid; border-top: windowtext; border-left: windowtext; border-bottom: windowtext 0.5pt solid; background-color: transparent" class="xl27">\r\n<p align="center"><span style="font-family: Arial; color: #000000; font-size: x-small;">História</span></p>\r\n</td>\r\n<td style="border-right: windowtext 0.5pt solid; border-top: windowtext; border-left: windowtext; border-bottom: windowtext 0.5pt solid; background-color: transparent" class="xl27">\r\n<p align="center"><span style="font-family: Arial; color: #000000; font-size: x-small;">Geografia</span></p>\r\n</td>\r\n<td style="border-right: windowtext 0.5pt solid; border-top: windowtext; border-left: windowtext; border-bottom: windowtext 0.5pt solid; background-color: transparent" class="xl27">\r\n<p align="center"><span style="font-family: Arial; color: #000000; font-size: x-small;">Português</span></p>\r\n</td>\r\n<td style="border-right: windowtext 0.5pt solid; border-top: windowtext; border-left: windowtext; border-bottom: windowtext 0.5pt solid; background-color: transparent" class="xl27">\r\n<p align="center"><span style="font-family: Arial; color: #000000; font-size: x-small;">Inglês</span></p>\r\n</td>\r\n<td style="border-right: windowtext 0.5pt solid; border-top: windowtext; border-left: windowtext; border-bottom: windowtext 0.5pt solid; background-color: transparent" class="xl27">\r\n<p align="center"><span style="font-family: Arial; color: #000000; font-size: x-small;">Ed. Física</span></p>\r\n</td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: #ece9d8;" height="17" class="xl30">\r\n<p align="center"> </p>\r\n</td>\r\n<td style="background-color: transparent; border: #ece9d8" class="xl30">\r\n<p align="center"> </p>\r\n</td>\r\n<td style="background-color: transparent; border: #ece9d8" class="xl30">\r\n<p align="center"> </p>\r\n</td>\r\n<td style="background-color: transparent; border: #ece9d8" class="xl30">\r\n<p align="center"> </p>\r\n</td>\r\n<td style="background-color: transparent; border: #ece9d8" class="xl30">\r\n<p align="center"> </p>\r\n</td>\r\n<td style="background-color: transparent; border: #ece9d8" class="xl30">\r\n<p align="center"> </p>\r\n</td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: #ece9d8;" height="17" colspan="2" class="xl30">\r\n<p align="center"><span style="font-family: Arial; color: #000000; font-size: x-small;"> </span></p>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>', 1, 9, 0, 19, '2006-05-24 01:47:48', 62, '', '2009-06-18 14:11:44', 62, 0, '0000-00-00 00:00:00', '2006-05-24 01:47:36', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 9, 0, 4, '', '', 0, 543, 'robots=\nauthor='),
(21, 'Hora da Diversão', 'hora-da-diversao', '', '', '', 0, 8, 0, 20, '2006-05-24 01:58:27', 68, '', '2008-04-10 11:15:44', 68, 0, '0000-00-00 00:00:00', '2006-05-24 01:58:04', '0000-00-00 00:00:00', '', '', 'pageclass_sfx=\nback_button=\nitem_title=1\nlink_titles=\nintrotext=1\nsection=0\nsection_link=0\ncategory=0\ncategory_link=0\nrating=\nauthor=\ncreatedate=\nmodifydate=\npdf=\nprint=\nemail=\nkeyref=\ndocbook_type=', 3, 0, 4, '', '', 0, 699, ''),
(24, 'Ballet', 'ballet', '', '<p align="justify">O Ballet tem o objetivo de proporcionar atividades físicas alegres, partindo do lúdico, desenvolvendo a coordenação motora ampla, a musicalidade, o ritmo, o trabalho em grupo, e os movimentos básicos do ballet clássico.</p>\r\n<p align="center"><img border="0" hspace="6" src="images/stories/foto aulas extras.jpg" /></p>\r\n', '\r\n<div align="justify">\r\n<p class="texto"><br />Durante as aulas ocorrem alongamentos, aquecimento, trabalho de barra, coreografias e relaxamento. As aulas são realizadas em grupos de crianças divididos por faixa etária. A Professora Cristiane Atila Brenny ministra as aulas na Escola Oficina dos Sonhos, facilitando a locomoção das crianças. <a href="index.php?option=com_phocagallery&amp;view=category&amp;id=26:ballet-no-teatro-juarez-machado&amp;Itemid=20">Veja  as fotos!!</a></p>\r\n<p class="texto"> </p>\r\n<table style="width: 200px; height: 143px;" align="center" cellpadding="0" cellspacing="0" border="0">\r\n<tbody>\r\n<tr>\r\n<td scope="col" background="imagens/fundo_azul.jpg">\r\n<table style="width: 190px;" align="center" cellpadding="0" cellspacing="0" border="0">\r\n<tbody>\r\n<tr>\r\n<td align="center" colspan="2">\r\n<div align="center"><strong>Ballet</strong></div>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td align="center" width="150">\r\n<div align="center"><strong>Dia</strong></div>\r\n</td>\r\n<td align="center" width="150">\r\n<div align="center"><strong>Horário</strong></div>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td align="center">\r\n<div align="center">4a e 6a feira</div>\r\n</td>\r\n<td align="center">\r\n<div align="center">15h às 15h45min</div>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td align="center" colspan="2">\r\n<div align="center">\r\n<p> </p>\r\n</div>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p align="center" class="texto"> </p>\r\n</div>', 1, 11, 0, 22, '2006-05-24 10:28:35', 68, '', '2009-06-19 14:20:36', 62, 0, '0000-00-00 00:00:00', '2006-05-24 10:22:28', '0000-00-00 00:00:00', 'foto aulas extras.jpg', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 17, 0, 5, '', '', 0, 952, 'robots=\nauthor=');
INSERT INTO `jos_content` (`id`, `title`, `alias`, `title_alias`, `introtext`, `fulltext`, `state`, `sectionid`, `mask`, `catid`, `created`, `created_by`, `created_by_alias`, `modified`, `modified_by`, `checked_out`, `checked_out_time`, `publish_up`, `publish_down`, `images`, `urls`, `attribs`, `version`, `parentid`, `ordering`, `metakey`, `metadesc`, `access`, `hits`, `metadata`) VALUES
(25, 'Natação', 'natacao', '', '<div align="center"><img src="images/stories/natacao4.jpg" hspace="6" alt="" title="" border="0" /></div><div align="justify">A nata&ccedil;&atilde;o tem in&uacute;meros benef&iacute;cios, auxiliando no desenvolvimento integral do ser.<br />No aspecto f&iacute;sico, proporciona um fortalecimento de t&ocirc;nus muscular, melhora nos aparelhos respirat&oacute;rio e circulat&oacute;rio, melhora do apetite e sono mais regular. J&aacute; no aspecto ps&iacute;quico, a nata&ccedil;&atilde;o propicia maior rapidez de resposta da crian&ccedil;a a est&iacute;mulo externo.</div>', '<p align="justify">Outro benef&iacute;cio &eacute; a socializa&ccedil;&atilde;o, pois na piscina a crian&ccedil;a est&aacute; em contato com outras crian&ccedil;as e com o professor. Durante as aulas, elas t&ecirc;m a oportunidade de interagir em grupo com brincadeiras, contribuindo com a sociabiliza&ccedil;&atilde;o.<br />No aspecto sa&uacute;de, a nata&ccedil;&atilde;o favorece o desenvolvimento dos mecanismos fisiol&oacute;gicos, como a capacidade pulmonar e o sistema vascular. Com a pr&aacute;tica da nata&ccedil;&atilde;o, a crian&ccedil;a &eacute; submetida a mudan&ccedil;as de temperatura, aumentando sua capacidade de desenvolver anticorpos, favorecendo sua resist&ecirc;ncia e deixando o sistema imunol&oacute;gico mais fortalecido.<br />Por tudo isso a crian&ccedil;a s&oacute; tem a ganhar com a pr&aacute;tica, ajudando a crian&ccedil;a a ter um crescimento mais saud&aacute;vel e equilibrado. </p><p align="justify">&nbsp;</p><p><table border="0" cellspacing="0" cellpadding="0" width="294" align="center" style="width: 294px; height: 120px"><tbody><tr><td colspan="2" align="center"><div align="center"><strong>Nata&ccedil;&atilde;o</strong></div></td></tr><tr><td width="150" align="center"><div align="center"><strong>Dia</strong></div></td><td width="150" align="center"><div align="center"><strong>Hor&aacute;rio</strong></div></td></tr><tr><td align="center"><div align="center"><strong>3&ordf; e 5&ordf; feira</strong></div></td><td align="center"><div align="center"><strong>9h30 &agrave;s 10h30min&nbsp;</strong></div></td></tr><tr><td align="center"><div align="center"><strong>3&ordf; e 5&ordf; feira</strong></div></td><td align="center"><div align="center"><strong>14h &agrave;s 14h45min</strong></div></td></tr><tr><td colspan="2" align="center"><div align="center"><strong>Academia Civi<br />R Germano Wetzel, 200</strong></div></td></tr></tbody></table></p>', 1, 11, 0, 22, '2006-05-24 10:46:17', 68, '', '2008-04-10 09:37:02', 68, 0, '0000-00-00 00:00:00', '2006-05-24 10:42:09', '0000-00-00 00:00:00', 'natacao4.jpg', '', 'pageclass_sfx=\nback_button=\nitem_title=1\nlink_titles=\nintrotext=1\nsection=0\nsection_link=0\ncategory=0\ncategory_link=0\nrating=\nauthor=\ncreatedate=\nmodifydate=\npdf=\nprint=\nemail=\nkeyref=\ndocbook_type=', 11, 0, 4, '', '', 0, 821, ''),
(28, 'Jazz', 'jazz', '', '<div align="justify">A aula de Jazz representa mais uma opção, para os alunos do Ensino Fundamental, proporcionando uma harmonia com a música e corpo.</div>\r\n<div align="justify">Confira  Fotos <a href="index.php?option=com_phocagallery&amp;view=category&amp;id=36:grupo-jazz-2007&amp;Itemid=20">Grupo 2007</a></div>\r\n<div align="justify"><a href="index.php?option=com_phocagallery&amp;view=category&amp;id=40:grupo-jazz-2008&amp;Itemid=20">Grupo 2008</a></div>\r\n<div align="center">u<img border="0" hspace="6" src="images/stories/jazz.jpg" /></div>\r\n', '\r\n<table bordercolor="#000000" align="center" cellpadding="0" cellspacing="0" border="1">\r\n<tbody>\r\n<tr>\r\n<td align="center" width="150" class="textobr"><strong>Dia</strong></td>\r\n<td align="center" width="150" class="textobr"><strong>Horário</strong></td>\r\n</tr>\r\n<tr>\r\n<td align="center" class="textobr">3a e 5a feira</td>\r\n<td align="center" class="textobr">16h às 17h.</td>\r\n</tr>\r\n<tr>\r\n<td align="center" colspan="2" class="textobr">Profª Juliana Regina Crestani</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p align="center" class="texto"> </p>', 1, 11, 0, 22, '2006-05-24 11:17:11', 68, '', '2009-06-19 14:18:48', 62, 0, '0000-00-00 00:00:00', '2006-05-24 11:15:20', '0000-00-00 00:00:00', 'jazz.jpg', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 15, 0, 3, '', '', 0, 499, 'robots=\nauthor='),
(166, 'Calendário Letivo 2009', 'calendario-letivo-2009', '', '<p><img style="border: 1px solid #b7b7b7; padding: 3px; margin-right: 4px; float: left;" alt="calendrio" src="images/stories/calendrio.jpg" width="128" height="128" />Verifique as datas importantes deste ano letivo e programe-se para não ser pego desprevinido.</p>\r\n', '\r\nffdsafdsafdsa', 1, 0, 0, 0, '2009-06-16 21:42:11', 62, '', '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', '2009-06-16 21:42:11', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 1, 0, 1, '', '', 0, 0, 'robots=\nauthor='),
(31, 'Indicação de Leitura', 'indicacao-de-leitura', '', '<p> </p>\r\n<p><img style="float: left; margin: 6px;" alt="livros" height="216" width="170" src="images/stories/livros.jpg" /><strong>Livros:</strong></p>\r\n<div></div>\r\n<div>O Poder dos pais que oram  (Stormie Omartian)<br />Homem ao Máximo (Edwin e Nancy Cole/Universidade  da Família)<br />Mulher Única  (Edwin e Nancy Cole/Universidade da Família)<br />Como realmente amar seu filho -  Ross Campell<br />Educando Crianças Geniosas - Dr. James Dobson<br />Todo Filho Precisa De Uma Mãe Que Ora - Janet Kobobel<ol> </ol> \r\n<ul>\r\n</ul>\r\n<p> </p>\r\n</div>', '', 1, 8, 0, 20, '2006-06-12 18:20:04', 68, '', '2009-06-18 14:41:48', 62, 0, '0000-00-00 00:00:00', '2006-06-12 18:19:23', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 22, 0, 2, '', '', 0, 415, 'robots=\nauthor='),
(33, 'Indicação de Leitura', 'indicacao-de-leitura', '', '<img src="images/stories/livros.jpg" width="200" alt="livros" style="float: left; margin: 6px;" />\r\n<div><strong>Livros:</strong></div>\r\n<div></div>\r\n<div>Disciplina: Limite na medida certa (Içami Tiba)</div>\r\n<div></div>\r\n<div>Mensagens de Deus para garotos - Devocional</div>\r\n<div></div>\r\n<div>Mensagens de Deus para garotas</div>', '', 1, 9, 0, 19, '2006-06-12 18:28:42', 62, '', '2009-06-18 13:56:36', 62, 0, '0000-00-00 00:00:00', '2006-06-12 18:27:45', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 2, 0, 2, '', '', 0, 249, 'robots=\nauthor='),
(34, 'Coordenação Pedagógica', 'coordenacao-pedagogica', '', '<p><img style="float: left; margin: 6px;" alt="coruja" width="200" src="images/stories/coruja.gif" />A Coordenação Pedagógica tem por finalidade ajudar a elaborar e aplicar o projeto da escola, dar orientação em questões pedagógicas e principalmente dar assistência aos professores, alunos e pais, de forma individual ou em grupo, buscando por um melhor desenvolvimento e aprendizado. Objetiva também garantir a unidade e a continuidade da ação educativa, atuando antes, durante e após o processo de aprendizagem, em todos os níveis de sua competência.</p>\r\n<p>Desenvolve atividades que promovam atitudes positivas necessárias ao convívio social e a melhoria da vida escolar.</p>', '', 1, 14, 0, 24, '2006-06-12 18:39:06', 68, '', '2009-06-18 13:26:22', 62, 0, '0000-00-00 00:00:00', '2006-06-12 18:37:59', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 5, 0, 1, '', '', 0, 115, 'robots=\nauthor='),
(161, 'Localização', 'localizacao', '', '{mosmap width=''500''|height=''400''|lat=''''|lon=''''|zoom=''15''| zoomType=''Large''|zoomNew=''0''|mapType=''map''|showMaptype=''1''|overview=''0''|text=''<a href=''javascript:void();''  onclick=''javascript:MOOdalBox.open(\\"http://www.devhouse.com.br/images/stories/mapa.jpg\\", \\"Mapa\\", \\"440px 265px\\", null);return false;'' title=\\"Localização\\">Localização</a><br /><b>Oficina dos Sonhos</b><br />Rua Senador Nilo Coelho, 181<br />Costa e Silva - Joinville - Santa Catarina - Brasil''|lang=''pt-BR''|address=''Rua Senador Nilo Coelho, 181 - Joinville - Santa Catarina - Brasil''}', '', 1, 16, 0, 35, '2009-06-16 21:35:26', 68, '', '2009-06-16 21:40:28', 62, 0, '0000-00-00 00:00:00', '2009-06-16 21:35:26', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 2, 0, 4, '', '', 0, 11, 'robots=\nauthor='),
(37, 'Museu Sambaqui e Parque Caieiras', 'museu-sambaqui-e-parque-caieiras', '', '<html>\r\n<head>\r\n\r\n<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">\r\n<style type="text/css">\r\n<!--\r\n\r\n.style3 {font-family: "Trebuchet MS"}\r\n.style5 {color: #FF0000}\r\n-->\r\n</style>\r\n</head>\r\n<body>\r\n<p align="justify" class="style3">A 5&ordf; s&eacute;rie realizou no dia 26 de maio um passeio de estudo pelo Parque Ambiental da Caieira e Museu do Sambaqui. O Parque da Caieira que abriga preciosos ecossistemas de manguezais e restingas, tamb&eacute;m mant&eacute;m &aacute;reas de sambaquis preservadas e o Museu do Sambaqui re&uacute;ne mais de 10.000 pe&ccedil;as arqueol&oacute;gicas. </p>\r\n<p align="justify"><span class="style3">Foi uma manh&atilde; de muito aprendizado, que enriqueceu ainda mais as aulas de hist&oacute;ria ministradas pela professora Gizele de C. Barros</span>. </p>\r\n<p class="style3 style5">&nbsp;\r\n</p>\r\n<p align="center" class="style3">&nbsp; </p>\r\n<p align="center"><span class="style2"></span>\r\n</p>\r\n<p align="center" class="style1">&nbsp;</p>\r\n</body>\r\n</html>\r\n', '', 0, 1, 0, 1, '2006-06-12 18:59:33', 62, '', '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', '2006-06-12 18:58:45', '0000-00-00 00:00:00', '', '', 'pageclass_sfx=\nback_button=\nitem_title=1\nlink_titles=\nintrotext=1\nsection=0\nsection_link=0\ncategory=0\ncategory_link=0\nrating=\nauthor=\ncreatedate=\nmodifydate=\npdf=\nprint=\nemail=\nkeyref=\ndocbook_type=', 1, 0, 60, '', '', 0, 780, ''),
(38, 'Passeio para Estrada Bonita', 'passeio-para-estrada-bonita', '', '<html>\r\n<head>\r\n\r\n<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">\r\n<style type="text/css">\r\n<!--\r\n\r\n.style3 {font-family: "Trebuchet MS"}\r\n.style5 {color: #FF0000}\r\n.style6 {\r\n	color: #990000;\r\n	font-weight: bold;\r\n	font-family: "Trebuchet MS";\r\n}\r\n-->\r\n</style>\r\n</head>\r\n<body>\r\n<p class="style6">Passeando pelo Meio Rural... </p>\r\n<p class="style3">Foi na Estrada Bonita que as turmas de 3&ordf; s&eacute;rie, se deliciaram com a vida do homem do campo. </p>\r\n<p class="style3">Com alegria aproveitaram o S&iacute;tio do Sr. Ango, para observar tudo aquilo que a natureza tem a oferecer, al&eacute;m da linda paisagem, o cultivo da cana-de-a&ccedil;ucar, as partes do rio, os instrumentos de trabalho, o filtro alem&atilde;o, a cria&ccedil;&atilde;o de animais entre outros. </p>\r\n<p class="style3">Tiveram tamb&eacute;m a oportunidade de vivenciar o conte&uacute;do: sistema monet&aacute;rio, discutido em sala de aula, com as compras dos produtos artesanais. </p>\r\n<p class="style3">E para finalizar a aula de campo, uma paradinha para um delicioso pastel caseiro. </p>\r\n<p align="justify" class="style3">&nbsp;</p>\r\n<p class="style3 style5">&nbsp;\r\n</p>\r\n<p align="center" class="style3">&nbsp; </p>\r\n<p align="center"><span class="style2"></span>\r\n</p>\r\n<p align="center" class="style1">&nbsp;</p>\r\n</body>\r\n</html>\r\n', '', 0, 1, 0, 1, '2006-06-12 19:07:09', 62, '', '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', '2006-06-12 19:06:19', '0000-00-00 00:00:00', '', '', 'pageclass_sfx=\nback_button=\nitem_title=1\nlink_titles=\nintrotext=1\nsection=0\nsection_link=0\ncategory=0\ncategory_link=0\nrating=\nauthor=\ncreatedate=\nmodifydate=\npdf=\nprint=\nemail=\nkeyref=\ndocbook_type=', 1, 0, 59, '', '', 0, 559, ''),
(39, 'Passeio no Museu da Fundição', 'passeio-no-museu-da-fundicao', '', '<html>\r\n<head>\r\n\r\n<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">\r\n<style type="text/css">\r\n<!--\r\n\r\n.style3 {font-family: "Trebuchet MS"}\r\n.style5 {color: #FF0000}\r\n.style6 {\r\n	color: #990000;\r\n	font-weight: bold;\r\n	font-family: "Trebuchet MS";\r\n}\r\n-->\r\n</style>\r\n</head>\r\n<body>\r\n<p class="style3"> A turma da pr&eacute;-escola, dia 15 de maio, realizou um passeio ao Museu de Fundi&ccedil;&atilde;o Tupy com o intuito de permitir que as crian&ccedil;as observassem a possibilidade de reutilizar materiais utilizados no dia-a-dia, colaborando com o ambiente atrav&eacute;s da redu&ccedil;&atilde;o do lixo. </p>\r\n<p align="justify" class="style3">&nbsp;</p>\r\n<p class="style3 style5">&nbsp;\r\n</p>\r\n<p align="center" class="style3">&nbsp; </p>\r\n<p align="center"><span class="style2"></span>\r\n</p>\r\n<p align="center" class="style1">&nbsp;</p>\r\n</body>\r\n</html>\r\n', '', 0, 1, 0, 1, '2006-06-12 19:09:15', 62, '', '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', '2006-06-12 19:08:27', '0000-00-00 00:00:00', '', '', 'pageclass_sfx=\nback_button=\nitem_title=1\nlink_titles=\nintrotext=1\nsection=0\nsection_link=0\ncategory=0\ncategory_link=0\nrating=\nauthor=\ncreatedate=\nmodifydate=\npdf=\nprint=\nemail=\nkeyref=\ndocbook_type=', 1, 0, 58, '', '', 0, 484, ''),
(42, 'Visita Estrada Bonita', 'visita-estrada-bonita', '', '<hr /><p style="margin: 0cm 0cm 0pt" class="MsoNormal"><strong><font size="3"><font color="#000000"><font face="Times New Roman"><img src="images/stories/noticias/imagem-190p.jpg" hspace="6" alt="" title="" border="0" />Visita na Estrada Bonita</font></font></font></strong></p><strong><font size="3"><font color="#000000"></font></font></strong>&nbsp; <p style="margin: 0cm 0cm 0pt; text-align: justify" class="MsoNormal" align="justify"><font face="Times New Roman" size="3" color="#000000">Neste m&ecirc;s a turma do Jardim 3 foi visitar a zona rural para conhecer os h&aacute;bitos dos agricultores: alimenta&ccedil;&atilde;o, o trabalho, a rotina etc. Ficaram encantados com o espa&ccedil;o, a linda paisagem verde, o bezerro que tinha acabado de nascer, o trator, enfim tudo que a natureza tem a nos oferecer. Vale conferir!</font></p><p style="margin: 0cm 0cm 0pt; text-align: justify" class="MsoNormal">&nbsp;</p><font face="Times New Roman" size="3" color="#000000"><a href="index.php?option=com_zoom&amp;Itemid=99999999&amp;catid=18"></a><a href="index.php?option=com_zoom&amp;Itemid=99999999&amp;catid=18"><p align="center">Veja as Fotos do Passeio na Estrada Bonita</p></a><p>&nbsp;</p></font>', '', 0, 1, 0, 1, '2006-07-11 19:56:02', 63, '', '2006-07-11 19:57:00', 63, 0, '0000-00-00 00:00:00', '2006-07-11 19:53:56', '0000-00-00 00:00:00', 'noticias/imagem-190p.jpg|left||0||bottom||', '', 'pageclass_sfx=\nback_button=\nitem_title=1\nlink_titles=\nintrotext=1\nsection=0\nsection_link=0\ncategory=0\ncategory_link=0\nrating=\nauthor=\ncreatedate=\nmodifydate=\npdf=\nprint=\nemail=\nkeyref=\ndocbook_type=', 2, 0, 57, '', '', 0, 500, ''),
(43, 'Passeio no Zoológico!', 'passeio-no-zoologico', '', '<strong><font size="3"><font color="#000000"><font face="Times New Roman"><hr /><img src="images/stories/noticias/imagem-024p.jpg" hspace="6" alt="" title="" border="0" /><br />Passeio no&nbsp;Zool&oacute;gico </font></font></font></strong><p style="margin: 0cm 0cm 0pt; text-align: justify" class="MsoNormal" align="center"><font face="Times New Roman" size="3" color="#000000">As turmas da 4&ordf; e 6&ordf; s&eacute;rie, foram visitar o Zool&oacute;gico de Pomerode, al&eacute;m da confraterniza&ccedil;&atilde;o foram para apreciar as diferentes esp&eacute;cies de animais brasileiros, assuntos que dar&atilde;o continuidade em sala. Confira!<br /><br /><span class="button"><a href="index.php?option=com_zoom&amp;Itemid=99999999&amp;catid=19">Veja as Fotos do Passeio no Zoo</a>l&oacute;gico</span></font></p>', '', 0, 1, 0, 1, '2006-07-11 20:37:46', 63, '', '2006-07-11 20:47:50', 63, 0, '0000-00-00 00:00:00', '2006-07-11 20:33:44', '0000-00-00 00:00:00', 'noticias/imagem-024p.jpg|right||0||bottom|right|', '', 'pageclass_sfx=\nback_button=\nitem_title=1\nlink_titles=\nintrotext=1\nsection=0\nsection_link=0\ncategory=0\ncategory_link=0\nrating=\nauthor=\ncreatedate=\nmodifydate=\npdf=\nprint=\nemail=\nkeyref=\ndocbook_type=', 8, 0, 56, '', '', 0, 541, ''),
(46, 'Transporte Escolar', 'transporte-escolar', '', '<p><img src="images/stories/van_escolar.jpg" width="300" height="221" alt="van_escolar" style="float: left; margin: 6px;" /></p>\r\n<p class="blocknumber"><span class="bignumber">01</span>Adriano e Tere - (47) 3453 - 1280 / (47) 9129 - 4404</p>\r\n<p class="blocknumber"><span class="bignumber">02</span>Juliano  - (47) 3466 - 4994 / (47) 8812 - 2729</p>\r\n<p class="blocknumber"><span class="bignumber">03</span>Dinávio (47) 3473 - 7257 / (47) 8822 - 8855 / (47) 9994 - 2392</p>', '', 1, 15, 0, 33, '2006-07-30 12:26:20', 62, '', '2009-06-18 12:58:53', 62, 0, '0000-00-00 00:00:00', '2006-07-30 12:23:28', '0000-00-00 00:00:00', 'foto1.jpg|center||0||bottom||', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 10, 0, 2, '', '', 0, 400, 'robots=\nauthor='),
(47, 'Violão', 'violao', '', '<p>A aula de violão possibilita conhecer as notas musicais, ler e identificar partituras, tocar e cantar ao som do violão. As aulas são realizadas individualmente ou em pequenos grupos divido por faixa etária.</p>\r\n<p><a href="index.php?option=com_phocagallery&amp;view=category&amp;id=38:violao&amp;Itemid=20">CONFIRA AS FOTOS...</a></p>\r\n<p align="center"><img border="0" hspace="6" src="images/stories/violao ana.jpg" /></p>\r\n', '\r\n<p align="center"> </p>', 1, 11, 0, 22, '2006-08-09 01:30:27', 68, '', '2009-06-19 14:21:30', 62, 0, '0000-00-00 00:00:00', '2006-08-09 01:30:00', '0000-00-00 00:00:00', 'violao ana.jpg', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 26, 0, 6, '', '', 0, 623, 'robots=\nauthor='),
(48, 'Proposta Pedagógica', 'proposta-pedagogica', '', '<div><img style="float: left; margin: 6px;" alt="coruja" height="139" width="150" src="images/stories/coruja.gif" />O Centro de Educação Oficina dos Sonhos além de trabalhar todas as habilidades cognitiva, motora, emocional e social, está também baseado no seguinte valor:</div>\r\n<div class="quote-grey" style="float: right; width: 340px;">\r\n<blockquote>Ainda que eu falasse as línguas dos homens e dos anjos, e não tivesse amor, seria como o metal que soa ou como o sino que tine - (I Coríntios 13-1)</blockquote>\r\n</div>\r\n<br /><br />\r\n<p> </p>\r\n<p> </p>\r\n<p> </p>\r\n<p><strong>O amor é base de toda a essência HUMANA!!</strong></p>\r\n<div class="stickynote">\r\n<p>A palavra amor vem do latim amor, que quer dizer: “amizade, dedicação, afeição, ternura, desejo grande, paixão, objeto amado”.</p>\r\n</div>\r\n<div><br />É desta forma que recebemos todas as nossas crianças!</div>\r\n<div></div>\r\n<div>Poema de Luís de Camões, que, para muitos, foi o responsável por criar a linguagem do amor em língua portuguesa.</div>\r\n<div>É o que expressa o soneto abaixo:</div>\r\n<div></div>\r\n<div></div>\r\n<blockquote>\r\n<p class="quote">Amor é fogo que arde sem se ver<br /> É ferida que dói e não se sente<br /> É um contentamento descontente<br /> É dor que desatina sem doer<br /> É um não querer, mais que bem querer<br /> É solitário andar por entre a gente<br /> É nunca contentar-se de contente<br /> É cuidar que se ganha em se perder<br /> É querer estar preso sem vontade<br /> É servir a quem vence, o vencedor<br /> É ter com quem nos mata lealdade<br /> Mas como causar pode se favor<br /> Nos corações humanos amizade<br /> Se tão contrário a sim é o mesmo amor?</p>\r\n</blockquote>\r\n<div></div>\r\n<div></div>\r\n<div><strong>Evelize da Cunha</strong></div>\r\n<div>Coordenadora Pedagógica</div>', '', 1, 8, 0, 20, '2006-08-11 13:41:26', 68, '', '2009-06-18 14:35:10', 62, 0, '0000-00-00 00:00:00', '2006-08-11 13:38:34', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 11, 0, 1, '', '', 0, 866, 'robots=\nauthor='),
(51, 'Projeto Educação Cristã', 'projeto-educacao-crista', '', 'O Projeto Educação Cristã tem por princípios resgatar valores que estão sendo distintos de nossa sociedade como: amor ao próximo, respeito aos mais velhos, companheirismo, união... Com base em histórias, músicas, que estejam relacionados aos conceitos bíblicos.\r\n<p><a href="index.php?option=com_phocagallery&amp;view=category&amp;id=10:projeto-educacao-crista&amp;Itemid=58">Clique aqui para ver as fotos do projeto!</a></p>', '', 1, 8, 0, 30, '2006-08-11 15:31:36', 68, '', '2009-06-18 16:29:34', 62, 0, '0000-00-00 00:00:00', '2006-08-11 15:26:18', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 5, 0, 9, '', '', 0, 94, 'robots=\nauthor='),
(54, 'Projeto de Música', 'projeto-de-musica', 'Projeto de Música', '<br />\r\n<div class="quote-grey">\r\n<blockquote>Cantarei e salmodiarei ao Senhor - Salmos 27:6d</blockquote>\r\n</div>\r\n<p>Demonstrar o valor construtivo da música na Educação Infantil e restabelecer a relação da música com a construção do conhecimento. Estimular na criança a capacidade de percepção, sensibilidade, imaginação, criação, bem como age como uma recreação educativa, sociabilizando, disciplinando e desenvolvendo a sua atenção. Desenvolver diversas habilidades ligadas tanto às áreas motoras, cognitivas e afetivas, promovendo a formação integral das crianças.</p>\r\n', '\r\n<br />\r\n<p> </p>\r\n<p>As aulas são ministradas 1 vez por semana pelo professor Marcelo Pecher com muita música, instrumentos variados e a empolgação dos alunos...</p>\r\n<p><a href="index.php?option=com_phocagallery&amp;view=category&amp;id=9:projeto-musicalizacao&amp;Itemid=58">Clique aqui para ver as fotos do projeto!</a></p>', 1, 8, 0, 30, '2006-08-13 22:42:30', 68, '', '2009-06-18 16:28:13', 62, 0, '0000-00-00 00:00:00', '2006-08-13 22:41:38', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 6, 0, 8, '', '', 0, 72, 'robots=\nauthor='),
(61, 'Desfile Cívico', 'desfile-civico', '', '<p style="margin: 0cm 0cm 0pt; text-align: justify" class="MsoNormal"><font face="Times New Roman" size="3" color="#000000"><img src="images/stories/imagem 056.jpg" hspace="6" alt="" title="" border="0" /></font></p><p style="margin: 0cm 0cm 0pt; text-align: justify" class="MsoNormal"><font face="Times New Roman" size="3" color="#000000">Para marcar o dia da Independ&ecirc;ncia do Brasil nossos alunos representaram &agrave; escola desfilando com alegria e levando cartazes para contar um pouco de nossa hist&oacute;ria.</font></p><font size="3"><font color="#000000"><font face="Times New Roman"><a href="index.php?option=com_zoom&amp;Itemid=99999999&amp;catid=23">Confira!</a></font></font></font>', '', 1, 1, 0, 1, '2006-10-13 14:39:26', 84, '', '2006-10-16 19:21:56', 68, 0, '0000-00-00 00:00:00', '2006-10-13 14:15:56', '0000-00-00 00:00:00', 'imagem 056.jpg|||0||bottom||', '', 'pageclass_sfx=\nback_button=\nitem_title=1\nlink_titles=\nintrotext=1\nsection=0\nsection_link=0\ncategory=0\ncategory_link=0\nrating=\nauthor=\ncreatedate=\nmodifydate=\npdf=\nprint=\nemail=\nkeyref=\ndocbook_type=', 3, 0, 55, '', '', 0, 69, ''),
(63, 'Parabéns professor!!!', 'parabens-professor', '', '<hr /><p>&nbsp;<span style="font-size: 12pt; font-family: &#39;Bodoni MT&#39;; language: EN">Encheu-os de sabedoria do cora&ccedil;&atilde;o para fazer toda a obra de Mestre, o dom de ensinar os outros.<span>&nbsp; </span>Eles t&ecirc;m habilidade para </span><span style="font-size: 12pt; font-family: &#39;Bodoni MT&#39;; language: EN">todo tipo de trabalho.&rdquo;&nbsp;</span></p><p><span style="font-size: 12pt; language: EN"><span><font face="Bodoni MT">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </font>&nbsp;</span></span><span style="language: EN">&Ecirc;xodo 35-35.</span> </p><p><span style="font-weight: bold; font-size: 12pt; language: EN">Professor,</span><span style="font-weight: bold; font-size: 12pt; language: EN">&nbsp;</span><span style="font-weight: bold; font-size: 14pt; font-family: &#39;Bradley Hand ITC&#39;; language: EN"><span>&nbsp;</span>...</span><span style="font-weight: bold; font-size: 12pt; font-family: &#39;Bradley Hand ITC&#39;; language: EN">Fa&ccedil;a da sua vida uma escola,</span></p><p class="MsoNormal"><span style="font-weight: bold; font-size: 12pt; font-family: &#39;Bradley Hand ITC&#39;; language: EN"><span>&nbsp;</span>Para quem deseja aprender a<span> </span>viver&hellip;.&nbsp;</span></p><p class="MsoNormal"><span style="font-weight: bold; font-size: 12pt; font-family: &#39;Bradley Hand ITC&#39;; language: EN">&nbsp;&nbsp;&nbsp; </span><span style="font-weight: bold; font-size: 12pt; font-family: &#39;Arial Narrow&#39;; language: EN">Parab&eacute;ns pelo seu dia!!!</span><span style="language: PT-BR">&nbsp;</span><span style="language: PT-BR">&nbsp;<img src="images/stories/flor089.gif" hspace="6" alt="" title="" border="0" /></span></p><p class="MsoNormal">&nbsp;</p><hr />', '', 1, 1, 0, 1, '2006-10-13 18:16:58', 68, '', '2006-10-16 16:21:53', 68, 0, '0000-00-00 00:00:00', '2006-10-13 18:07:57', '2006-10-20 00:00:00', 'flor089.gif', '', 'pageclass_sfx=\nback_button=\nitem_title=1\nlink_titles=\nintrotext=1\nsection=0\nsection_link=0\ncategory=0\ncategory_link=0\nrating=\nauthor=\ncreatedate=\nmodifydate=\npdf=\nprint=\nemail=\nkeyref=\ndocbook_type=', 11, 0, 54, '', '', 0, 19, ''),
(64, 'matrículas abertas...', 'matriculas-abertas', '', '<font color="#000000"><font style="font-family: &#39;Bradley Hand ITC&#39;"><span style="font-size: 12pt"><font face="Times New Roman"><span style="font-size: 12pt; color: blue"><span style="font-size: 14pt; color: #99ccff; font-family: Verdana"><h2 style="margin: 0cm 0cm 0pt; text-align: center" align="center"><span style="font-size: 14pt; color: #3366ff; font-family: Verdana"></span></h2></span><br /></span></font></span></font></font><br />', '', 1, 1, 0, 1, '2006-10-16 14:51:38', 68, '', '2008-01-11 10:54:57', 68, 0, '0000-00-00 00:00:00', '2006-10-16 14:33:34', '0000-00-00 00:00:00', 'out03.gif\r\n\r\n', '', 'pageclass_sfx=\nback_button=\nitem_title=1\nlink_titles=\nintrotext=1\nsection=0\nsection_link=0\ncategory=0\ncategory_link=0\nrating=\nauthor=\ncreatedate=\nmodifydate=\npdf=\nprint=\nemail=\nkeyref=\ndocbook_type=', 35, 0, 53, '', '', 0, 86, ''),
(67, 'Matrículas Abertas ..', 'matriculas-abertas-', '', '<p align="center"><img src="images/stories/site 2008.jpg" hspace="6" alt="" title="" border="0" /></p>', '', 1, 1, 0, 1, '2006-10-19 18:41:18', 68, '', '2008-11-17 13:34:21', 68, 0, '0000-00-00 00:00:00', '2006-10-19 18:38:41', '0000-00-00 00:00:00', 'site 2008.jpg', '', 'pageclass_sfx=\nback_button=\nitem_title=1\nlink_titles=\nintrotext=1\nsection=0\nsection_link=0\ncategory=0\ncategory_link=0\nrating=\nauthor=\ncreatedate=\nmodifydate=\npdf=\nprint=\nemail=\nkeyref=\ndocbook_type=', 21, 0, 52, '', '', 0, 81, ''),
(68, '15º Festival Escolar de Dança', '15o-festival-escolar-de-danca', '', '<p><img src="images/stories/chamada jazz.jpg" hspace="6" alt="" title="" border="0" /></p><p>Nosso Grupo de Jazz participou dia&nbsp;24&nbsp;de outubro do 15&ordm; Festival Escolar de Dan&ccedil;a&nbsp;e arrassou.</p><p>Parab&eacute;ns meninas&nbsp;voc&ecirc;s estavam lindas!!! </p><p>A Oficina dos Sonhos agradece a&nbsp;todas pela empenho e dedica&ccedil;&atilde;o.</p><p><a href="index.php?option=com_zoom&amp;Itemid=99999999&amp;catid=32">Confira!!!</a></p>', '', 0, 1, 0, 1, '2006-10-20 16:51:57', 84, '', '2007-10-24 16:34:10', 68, 0, '0000-00-00 00:00:00', '2006-10-20 16:40:14', '0000-00-00 00:00:00', 'chamada jazz.jpg|||0||bottom||', '', 'pageclass_sfx=\nback_button=\nitem_title=1\nlink_titles=\nintrotext=1\nsection=0\nsection_link=0\ncategory=0\ncategory_link=0\nrating=\nauthor=\ncreatedate=\nmodifydate=\npdf=\nprint=\nemail=\nkeyref=\ndocbook_type=', 5, 0, 51, '', '', 0, 41, ''),
(70, 'Visita Caverna de Botuverá...', 'visita-caverna-de-botuvera', '', '<p><img align="left" src="images/stories/chamada caverna.jpg" hspace="6" border="0" />Visita nas Grutas de Botuverá e no Observatório de Brusque A turma da 5ª série foi a uma viagem de estudos, “uma aventura”; como relatou o grupo animado. As grutas possibilitaram a visualização de conteúdos trabalhados em sala  e que são pouco comuns no dia-a-dia. O Observatório situado em Brusque promoveu o enriquecimento dos conteúdos de Ciências como o Sistema Solar. Dicas de lugares sensacionais para vivenciar grandes experiências.</p>', '', 1, 1, 0, 1, '2006-10-20 18:48:55', 68, '', '2009-06-17 13:13:42', 62, 0, '0000-00-00 00:00:00', '2006-10-20 18:45:07', '0000-00-00 00:00:00', 'chamada caverna.jpg', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 3, 0, 50, '', '', 0, 113, 'robots=\nauthor='),
(167, 'Galeria de Fotos', 'galeria-de-fotos', '', '<script language="Javascript">\r\nself.location="index.php?option=com_phocagallery&view=category&id=42&Itemid=53";\r\n</script>', '', 1, 9, 0, 19, '2009-06-18 00:41:34', 62, '', '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', '2009-06-18 00:41:34', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 1, 0, 5, '', '', 0, 3, 'robots=\nauthor='),
(72, 'Olimpíada SOS', 'olimpiada-sos', '', '<p>Na Semana das Crianças, nossos alunos participaram da Olimpíada Solidários Oficina dos Sonhos.\r\nForam 30 dias de muita diversâo e alegria...além de aprender a importância de abençoar o próximo.</p>', '', 1, 1, 0, 1, '2006-10-26 17:52:25', 62, '', '2009-06-17 13:11:15', 62, 0, '0000-00-00 00:00:00', '2006-10-26 17:46:22', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 2, 0, 49, '', '', 0, 91, 'robots=\nauthor='),
(73, 'Encontro Marcado na Oficina', 'encontro-marcado-na-oficina', '', '<p><img align="left" src="images/stories/noticias/chamada.jpg" hspace="6" border="0" />No dia 27 de Outubro o Encontro Marcado foi muito divertido... Os alunos aproveitaram a programação especial que fizemos para seus amigos.</p>', '', 1, 1, 0, 1, '2006-10-27 18:54:03', 68, '', '2009-06-17 13:10:36', 62, 0, '0000-00-00 00:00:00', '2006-10-27 18:46:45', '0000-00-00 00:00:00', 'noticias/chamada.jpg', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 5, 0, 48, '', '', 0, 114, 'robots=\nauthor='),
(74, 'Ballet no Teatro Juarez Machado', 'ballet-no-teatro-juarez-machado', '', '<img align="left" src="images/stories/pb160022.jpg" hspace="6" border="0" /> Para encerrar as atividades nossas bailarinas fizeram sucesso com o espetáculo: Histórias Inesquecíveis, no dia 16 de novembro, no Teatro Juarez Machado. Agradecemos a presença de pais e familiares que prestigiaram o evento!!!<br /><a href="index.php?option=com_phocagallery&amp;view=category&amp;id=26:ballet-no-teatro-juarez-machado&amp;Itemid=20">Confira!!!</a>', '', 1, 1, 0, 1, '2006-11-22 17:31:18', 68, '', '2009-06-17 13:07:58', 62, 0, '0000-00-00 00:00:00', '2006-11-22 17:24:40', '0000-00-00 00:00:00', 'pb160022.jpg', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 5, 0, 47, '', '', 0, 172, 'robots=\nauthor='),
(76, 'Acampamento 2006', 'acampamento-2006', '', '<p><img align="left" src="images/stories/acampamento 101.jpg" hspace="6" border="0" />Lazer, diversão, aprendizagem, natureza...Tudo isso e muito mais aconteceuno acampamento realizado com as turmas de 5ª e 6ª séries. Com certeza , esses momentos juntos ficarão registrados em nossas memórias.</p>', '', 1, 1, 0, 1, '2006-11-23 11:00:03', 68, '', '2009-06-17 13:03:50', 62, 0, '0000-00-00 00:00:00', '2006-11-23 10:50:36', '0000-00-00 00:00:00', 'acampamento 101.jpg', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 5, 0, 46, '', '', 0, 83, 'robots=\nauthor='),
(77, 'Informativo', 'informativo', '', '<p><img vspace="6" hspace="6" align="left" alt="calendrio" height="128" width="128" src="images/stories/calendrio.jpg" /></p>\r\n<p><strong><br />Programação Dezembro 2008/Janeiro e Fevereiro 2009 Dezembro</strong></p>\r\n<p> </p>\r\n<p> </p>\r\n<p> </p>\r\n<p><strong>01</strong> - Passeio Hotel Fazenda Dona Francisca - 5ª e 6ª séries</p>\r\n<p>Entrega de Boletim para a 8ª série</p>\r\n<p><strong>03</strong> - Passeio Hotel Fazenda Dona Francisca - 7ª e 8ª séries</p>\r\n<p><strong>05</strong> - Último dia de aula para o Ensino Fundamental</p>\r\n<p><strong>08</strong> - Entrega de Boletim - 1ª a 7ª séries</p>\r\n<p><strong>08 a 15</strong> - Exames para o Ensino Fundamental</p>\r\n<p><strong>09</strong> - Entrega de Avaliação da Educação Infantil</p>\r\n<p>Passeio de trem em Morretes - 4ª séries</p>\r\n<p><strong>10</strong> - Formatura da Pré-escola e da 8ª série</p>\r\n<p><strong>11</strong> - Festa da Família - Recanto da Paz (neste dia,  não haverá aula  para os alunos do turno vespertino)</p>\r\n<p><strong>12</strong> - Último dia de aula para a Educação Infantil</p>\r\n<p><strong>15 a 19</strong> - Plantão somente para alunos integrais</p>\r\n<p><strong>16</strong> -  Conselho de Classe</p>\r\n<p><strong>17</strong> -  Resultado Final Exames</p>\r\n<p><strong>22/12/08 a 08/02/09</strong> - Recesso Escolar</p>\r\n<p><strong>Janeiro/Fevereiro 2009</strong></p>\r\n<p><strong>05/01 a 16/01 </strong>- Plantão Administrativo e Financeiro</p>\r\n<p><strong>19/01 a 06/02</strong> - Colônia de Férias somente para alunos integrais</p>\r\n<p><strong>09/02</strong> - Início das aulas curriculares</p>\r\n<p> </p>\r\n<div class="quote-grey">\r\n<blockquote>Mas em todas estas coisas somos mais que vencedores,  por aquele que nos amou - Rm 8:37</blockquote>\r\n</div>\r\n<p> </p>', '', 1, 15, 0, 33, '2006-11-23 15:40:32', 68, '', '2009-06-18 13:02:10', 62, 0, '0000-00-00 00:00:00', '2006-11-23 15:39:47', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 25, 0, 1, '', '', 0, 506, 'robots=\nauthor='),
(78, 'Indicação de Leitura', 'indicacao-de-leitura', '', '<p><img style="float: left; margin: 6px;" alt="livros" width="200" src="images/stories/livros.jpg" /><strong>Revista Crescer – Maio / 2007</strong> <br />acesse e leia: <a href="http://www.crescer.globo.com">www.crescer.globo.com</a></p>\r\n<ol>\r\n<li><span style="line-height: 24px;"><strong>Pg. 25</strong> – Tosse chata - tipos de tosse, medidas de alívio, xarope funciona? </span></li>\r\n<li><span style="line-height: 24px;"><strong>Pg. 50</strong> – Cocoricó em gibi – Agora em quadrinhos, nas bancas, o premiado programa infantil que nasceu na TV Cultura. </span></li>\r\n<li><span style="line-height: 24px;"><strong>Pg. 52</strong> – Inimigo Público?? Seu filho faz escândalos no meio do supermercado, na casa de amigo, no shopping, restaurante... Conheça dicas que poderão ajudar você a resolver o problema. </span></li>\r\n<li><span style="line-height: 24px;"><strong>Pg. 82</strong> – Seu filho é hipocondríaco? Criança também tem mania de doença </span></li>\r\n<li><span style="line-height: 24px;"><strong>Pg. 86</strong> – O que fazer quando a criança bate na mãe. </span></li>\r\n<li><span style="line-height: 24px;"><strong>Pg. 88</strong> – Quando tirar a criança do berço?</span></li>\r\n</ol><a href="http://www.crescer.globo.com"></a>', '', 1, 15, 0, 33, '2006-11-23 16:52:37', 68, '', '2009-06-18 13:20:38', 62, 0, '0000-00-00 00:00:00', '2006-11-23 16:47:30', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 13, 0, 5, '', '', 0, 242, 'robots=\nauthor='),
(79, 'Feira Culrural 2006', 'feira-culrural-2006', '', '<span style="font-size: 10pt; font-family: Arial"><span style="color: #000000;"><img style="float: left; margin-right: 6px; margin-left: 6px;" src="images/stories/chamada feira.jpg" />Dia 18 de novembro, o Centro de Educação Oficina dos Sonhos, promoveu a 4ª Feira Cultural: <strong><em>“Viver feliz com muita arte!”</em></strong>, foram apresentados trabalhos desenvolvidos em sala.</span></span><span style="font-size: 10pt; font-family: Arial"><span style="color: #000000;">Foram explorados artistas brasileiros como: Romero Brito, Tarsila do Amaral, Candido Portinari e Alfredo Volpi. </span></span><span style="font-size: 10pt; font-family: Arial"><span style="color: #000000;">Com muitas cores, formas... construíram releituras, instalações para representar a arte que estes pintores usavam, curiosidades sobre suas vidas... e muito mais foram apresentados com desenvoltura por nossos alunos.</span></span><span style="font-size: 10pt; font-family: Arial"><span style="color: #000000;">Era visível em seus olhares a alegria e satisfação em apresentar o que aprenderam com prazer.<br /></span></span><strong><em><span style="font-size: 10pt; font-family: Arial"><span style="color: #000000;">Parabéns a todos os envolvidos com a organização, alunos, </span></span></em></strong><strong><em><span style="font-size: 10pt; font-family: Arial"><span style="color: #000000;">pais e familiares </span></span></em></strong><strong><em><span style="font-size: 10pt; font-family: Arial"><span style="color: #000000;">que puderam compartilhar deste trabalho!!!</span></span></em></strong>', '', 1, 1, 0, 1, '2006-11-28 16:00:42', 68, '', '2009-06-17 13:02:27', 62, 0, '0000-00-00 00:00:00', '2006-11-28 15:41:16', '0000-00-00 00:00:00', 'chamada feira.jpg', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 6, 0, 45, '', '', 0, 113, 'robots=\nauthor='),
(81, 'Torneio de Futebol', 'torneio-de-futebol', '', '<p><img style="float: left; margin-right: 6px;" src="images/phocagallery/QHFIFL/thumbs/phoca_thumb_m_imagem_7.jpg" />Para finalizar as aulas de Futebol, preparamos o Torneio Pé na Bola...<br /><a href="index.php?option=com_phocagallery&amp;view=category&amp;id=31:torneio-de-futebol&amp;Itemid=20">Confira as fotos!!!</a></p>', '', 1, 1, 0, 1, '2006-12-14 14:26:43', 68, '', '2009-06-17 13:00:42', 62, 0, '0000-00-00 00:00:00', '2006-12-14 14:19:53', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 5, 0, 44, '', '', 0, 84, 'robots=\nauthor='),
(82, 'Ballet no Museu...', 'ballet-no-museu', '', '<p><img border="0" hspace="6" src="images/stories/chamadinha ballet museu.jpg" align="left" />Dia 09 de novembro, as bailarinas dançaram com classe na ponta dos pés, ao ar livre no jardim do Museu de Imigração e Colonização.\r\nFoi um belíssimo espetáculo!!!</p>', '', 1, 1, 0, 1, '2006-12-15 15:48:08', 62, '', '2009-06-17 12:57:51', 62, 0, '0000-00-00 00:00:00', '2006-12-15 15:43:13', '0000-00-00 00:00:00', 'chamadinha ballet museu.jpg', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 4, 0, 43, '', '', 0, 62, 'robots=\nauthor='),
(90, 'Visita na Fábrica Arroz Vila Nova', 'visita-na-fabrica-arroz-vila-nova', '', '<p><img align="left" border="0" hspace="6" src="images/stories/arroz vila nova chamada.jpg" />Conversando sobre o processo de fabricação dos alimentos industrializados, a turma da 2ª série, pode conferir de perto na Fábrica do Arroz Vila Nova.</p>', '', 1, 1, 0, 1, '2006-12-19 10:26:26', 62, '', '2009-06-17 12:55:35', 62, 0, '0000-00-00 00:00:00', '2006-12-19 10:24:30', '0000-00-00 00:00:00', 'arroz vila nova chamada.jpg', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 4, 0, 42, '', '', 0, 63, 'robots=\nauthor='),
(91, 'Conhecendo a Indústria Mabel', 'conhecendo-a-industria-mabel', '', '<p><img border="0" hspace="6" src="images/stories/mabel chamada.jpg" align="left" />Hummm, que delícia!!! Além das deliciosas bolachas... os alunos da 3ª e 4ª série, observaram os assuntos estudados em sala: as diferenças dos produtos naturais, industrializados e seus diferentes processos.</p>', '', 1, 1, 0, 1, '2006-12-19 10:52:12', 62, '', '2009-06-17 12:58:48', 62, 0, '0000-00-00 00:00:00', '2006-12-19 10:47:24', '0000-00-00 00:00:00', 'mabel chamada.jpg', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 8, 0, 41, '', '', 0, 58, 'robots=\nauthor='),
(92, 'Encerramento 2006', 'encerramento-2006', '', '<p><img align="left" src="images/stories/chamada encer.jpg" hspace="6" border="0" />Nossa que festa!!! O ano acabou... com chave de ouro. As apresentações estavam um espetáculo!</p>', '', 1, 1, 0, 1, '2006-12-22 12:55:46', 62, '', '2009-06-17 12:53:34', 62, 0, '0000-00-00 00:00:00', '2006-12-22 12:53:02', '0000-00-00 00:00:00', 'chamada encer.jpg', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 5, 0, 40, '', '', 0, 83, 'robots=\nauthor='),
(93, 'Formatura Pré-escola', 'formatura-pre-escola', '', '<p><img align="left" src="images/stories/formatura chamada.jpg" hspace="6" border="0" />Chegou o grande dia para os alunos da Pré-Escola... a Formatura. Nossos formandos arrasaram, parabéns!!!</p>', '', 1, 1, 0, 1, '2006-12-22 13:31:51', 62, '', '2009-06-17 12:52:27', 62, 0, '0000-00-00 00:00:00', '2006-12-22 13:30:33', '0000-00-00 00:00:00', 'formatura chamada.jpg', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 5, 0, 39, '', '', 0, 161, 'robots=\nauthor=');
INSERT INTO `jos_content` (`id`, `title`, `alias`, `title_alias`, `introtext`, `fulltext`, `state`, `sectionid`, `mask`, `catid`, `created`, `created_by`, `created_by_alias`, `modified`, `modified_by`, `checked_out`, `checked_out_time`, `publish_up`, `publish_down`, `images`, `urls`, `attribs`, `version`, `parentid`, `ordering`, `metakey`, `metadesc`, `access`, `hits`, `metadata`) VALUES
(104, 'Lista de Materiais Educação Infantil', 'lista-de-materiais-educacao-infantil', '', '<div><img style="margin: 6px;" alt="customize" height="53" width="53" src="images/stories/customize.png" /><br /></div>\r\n<div><strong>Lista de materiais Maternal I – 2009</strong></div>\r\n<div>01 brinquedo para estimulação (deve ser leve, resistente, sem pontas, antialérgico,  ter sons agradáveis e não soltar tinta nem pequenas partes)</div>\r\n<div>01 livro de plástico para bebê</div>\r\n<div>01 CD de música infantil adequado à faixa etária (7 meses a 1 ano e meio)</div>\r\n<div>01 DVD infantil adequado à faixa etária</div>\r\n<div>01 pasta de elástico amarela 20mm</div>\r\n<div>01 caixa de giz de cera</div>\r\n<div>01 livro infantil de plástico</div>\r\n<div>01 estojo com escova de dente e creme dental</div>\r\n<div>01 caixa de camisa</div>\r\n<div>01 camiseta tamanho adulto que a criança usará nas aulas de pintura<br /><br /></div>\r\n<div><strong>Lista de materiais Maternal  II – 2009</strong></div>\r\n<div></div>\r\n<div>01 pasta de elástico amarela 20mm</div>\r\n<div>01 caixa de giz de cera</div>\r\n<div>01 brinquedo educativo conforme a faixa etária (de madeira ou de plástico)</div>\r\n<div>01 CD de música infantil adequado à faixa etária</div>\r\n<div>01 livro infantil de plástico</div>\r\n<div>01 estojo com escova de dente e creme dental</div>\r\n<div>01 caixa de camisa</div>\r\n<div>01 camiseta tamanho adulto que a criança usará nas aulas de pintura</div>\r\n<div></div>\r\n<div><strong>Lista de Materiais Jardim I - 2009</strong></div>\r\n<div></div>\r\n<div>01 apontador</div>\r\n<div>01 pincel nº12</div>\r\n<div>01 pasta de elástico larga, na cor amarela 20mm</div>\r\n<div>01 caixa de camisa encapada</div>\r\n<div>01 caixa de lápis de cor “Jumbo”*</div>\r\n<div>01 caixa de giz de cera curto</div>\r\n<div>01 tesoura sem ponta (Mundial ou Tramontina*)</div>\r\n<div>01 tubo de cola pequeno</div>\r\n<div>01 jogo educativo conforme a faixa etária (de montar)</div>\r\n<div>01 estojo com escova de dente e creme dental</div>\r\n<div>01 camiseta tamanho adulto que a criança usará nas aulas de pintura</div>\r\n<div></div>\r\n<div class="tips">* Sugerimos algumas marcas para melhor aproveitamento do material</div>\r\n<div></div>\r\n<div><strong>Lista de Materiais Jardim II - 2009</strong></div>\r\n<div></div>\r\n<div>01 apontador (de ferro)</div>\r\n<div>01 pasta de elástico azul 20mm</div>\r\n<div>01 caixa de camisa</div>\r\n<div>01 caixa de lápis de cor</div>\r\n<div>01 caixa de giz de cera curto</div>\r\n<div>01 estojo de canetão</div>\r\n<div>01 pincel nº 12</div>\r\n<div>01 tesoura sem ponta (Mundial ou Tramontina*)</div>\r\n<div>01 tubo de cola pequeno</div>\r\n<div>01 jogo educativo conforme a faixa etária</div>\r\n<div>01 estojo com escova de dente e creme dental</div>\r\n<div>01 camiseta tamanho adulto que a criança usará nas aulas de pintura</div>\r\n<div></div>\r\n<div class="tips">* Sugerimos algumas marcas para melhor aproveitamento do material</div>\r\n<div></div>\r\n<div><strong>Lista de Materiais Jardim III - 2009</strong></div>\r\n<div></div>\r\n<div></div>\r\n<div>01 apontador (de ferro)</div>\r\n<div>01 pasta de elástico verde 20mm</div>\r\n<div>01 caixa de camisa</div>\r\n<div>01 caixa de lápis de cor (Faber-Castell ou Labra*)</div>\r\n<div>01 penal pequeno para guardar os lápis de cor</div>\r\n<div>01 caixa de giz de cera curto</div>\r\n<div>01 estojo de canetinha</div>\r\n<div>01 pincel nº12</div>\r\n<div>01 tesoura sem ponta (Mundial ou Tramontina*)</div>\r\n<div>01 tubo de cola pequeno</div>\r\n<div>01 jogo educativo conforme a faixa etária (Quebra-cabeça, Memória, Engenheiro)</div>\r\n<div>01 estojo com escova de dente e creme dental</div>\r\n<div>01 camiseta tamanho adulto que a criança usará nas aulas de pintura</div>\r\n<div></div>\r\n<div class="tips">* Sugerimos algumas marcas para melhor aproveitamento do material</div>\r\n<div></div>\r\n<div></div>\r\n<div></div>\r\n<div></div>', '', 1, 15, 0, 33, '2007-01-24 09:23:07', 62, '', '2009-06-18 13:08:47', 62, 0, '0000-00-00 00:00:00', '2007-01-24 09:22:37', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 28, 0, 4, '', '', 0, 846, 'robots=\nauthor='),
(109, 'Visita do Prefeito na Oficina...', 'visita-do-prefeito-na-oficina', '', '<p><img align="left" src="images/stories/dsc03858.jpg" hspace="6" border="0" />No dia 28 de Março recebemos a visita do Prefeito Marco Tebaldi em nossa Escola. Através do Projeto ambiental, os alunos solicitaram ao Prefeito placas para conscientizar a comunidade.<br /><a href="index.php?option=com_phocagallery&amp;view=category&amp;id=28:visita-do-prefeito&amp;Itemid=20">Confira!!! </a></p>', '', 1, 1, 0, 1, '2007-03-28 14:35:10', 62, '', '2009-06-17 12:49:45', 62, 0, '0000-00-00 00:00:00', '2007-03-28 14:29:17', '0000-00-00 00:00:00', 'dsc03858.jpg', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 4, 0, 38, '', '', 0, 99, 'robots=\nauthor='),
(110, 'Páscoa Sede de Campo', 'pascoa-sede-de-campo', '', '<p><img align="left" src="images/stories/chamadinha pascoa sede.jpg" hspace="6" border="0" /><strong>Páscoa Mágica!!!</strong></p>\r\n<p><strong></strong>Passeio Nova Sede, caça ao ninho na trilha, Gincana, brincadeiras  no Parque e um delicioso. Ufa... Quanta diversão!!  Além de muita brincadeira e diversão nesta semana,  os alunos conheceram a importância da Páscoa para nossas vidas.</p>', '', 1, 1, 0, 1, '2007-04-20 16:13:51', 68, '', '2009-06-17 12:46:36', 62, 0, '0000-00-00 00:00:00', '2007-04-20 16:04:00', '0000-00-00 00:00:00', 'chamadinha pascoa sede.jpg', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 4, 0, 37, '', '', 0, 71, 'robots=\nauthor='),
(111, 'Visita Coelho na Oficina', 'visita-coelho-na-oficina', '', '<p><img align="left" src="images/stories/chamadinha coelho na oficina.jpg" hspace="6" border="0" />O coelho nos visitou também nesta semana abençoada. A sua visita fez parte das aulas na sala de aula, tivemos teatro, gincana no Ginásio e ainda entrega das lembrancinhas.</p>', '', 1, 1, 0, 1, '2007-04-20 17:12:00', 68, '', '2009-06-17 12:44:14', 62, 0, '0000-00-00 00:00:00', '2007-04-20 17:02:43', '0000-00-00 00:00:00', 'chamadinha coelho na oficina.jpg', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 5, 0, 36, '', '', 0, 89, 'robots=\nauthor='),
(112, 'Visita no Lar Vicentina', 'visita-no-lar-vicentina', '', '<p><img src="images/stories/chamadinha lar vicentina.jpg" hspace="6" align="left" border="0" />A turma da Recreação entregou as doações de leite recebidas na semana da Páscoa e foram recebidos com muito carinho pelos idosos do Lar Vicentina.<br /><a href="index.php?option=com_phocagallery&amp;view=category&amp;id=32:visita-no-lar-vicentina&amp;Itemid=20">Confira as fotos!<br /></a></p>\r\n<p><em>Que Deus abençoe a todas as famílias que contribuíram com a Páscoa Solidária!!</em></p>', '', 1, 1, 0, 1, '2007-04-24 08:24:33', 62, '', '2009-06-17 12:41:45', 62, 0, '0000-00-00 00:00:00', '2007-04-24 08:15:36', '0000-00-00 00:00:00', 'chamadinha lar vicentina.jpg', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 6, 0, 35, '', '', 0, 88, 'robots=\nauthor='),
(113, 'Tarde do Poema na 2ª Série', 'tarde-do-poema-na-2o-serie', '', '<p><img align="left" src="images/stories/chamdinha tarde poema.jpg" hspace="6" border="0" /></p>\r\n<p>A Turma  de 2ª série da Professora Daiane preparou-se muito bem para este momento: Cada aluno recitou seu poema com muita criatividade.</p>', '', 1, 1, 0, 1, '2007-04-26 12:10:25', 68, '', '2009-06-17 12:31:33', 62, 0, '0000-00-00 00:00:00', '2007-04-26 12:03:40', '0000-00-00 00:00:00', 'chamdinha tarde poema.jpg', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 6, 0, 31, '', '', 0, 127, 'robots=\nauthor='),
(115, 'Visita  da 1ª série ao supermercado', 'visita-da-1o-serie-ao-supermercado', '', '<p><img align="left" src="images/stories/chamadinha supermercado.jpg" hspace="6" border="0" />A 1ª série  Matutino visitou o supermercado para  conferir na lista feita  em sala de aula os  preços de vários produtos.  Foi uma manhã de conhecimento e diversão!!</p>', '', 1, 1, 0, 1, '2007-04-26 13:05:26', 68, '', '2009-06-17 12:47:19', 62, 0, '0000-00-00 00:00:00', '2007-04-26 13:01:57', '0000-00-00 00:00:00', 'chamadinha supermercado.jpg', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 6, 0, 34, '', '', 0, 77, 'robots=\nauthor='),
(116, 'Conversando sobre os índios', 'conversando-sobre-os-indios', '', '<p><img align="left" src="images/stories/chamada dia do indio.jpg" hspace="6" border="0" />Para homenagear o Dia do Índio as crianças ouviram histórias, cantaram... conhecendo um pouquinho da cultura indígena.<br /><a href="index.php?option=com_phocagallery&amp;view=category&amp;id=6:conversando-sobre-os-indios&amp;Itemid=20">Confira!</a></p>', '', 1, 1, 0, 1, '2007-04-27 15:43:14', 62, '', '2009-06-17 12:35:18', 62, 0, '0000-00-00 00:00:00', '2007-04-27 15:42:16', '0000-00-00 00:00:00', 'chamada dia do indio.jpg', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 5, 0, 32, '', '', 0, 79, 'robots=\nauthor='),
(117, 'Passeio 3ª Série Estrada Bonita', 'passeio-3o-serie-estrada-bonita', '', '<p><img align="left" src="images/stories/chamadinha estrada bonita 3 serie.jpg" hspace="6" border="0" />Os alunos da 3ª série fizeram um belo passeio na Estrada Bonita. Conheceram os hábitos     dos agricultores: a rotina, alimentação, os produtos comercializados...E para finalizar andaram de trator, onde conheceram melhor a região.<br /><a href="index.php?option=com_phocagallery&amp;view=category&amp;id=51:estrada-bonita&amp;Itemid=20">Confira as fotos!!!</a></p>', '', 1, 1, 0, 1, '2007-05-03 11:53:37', 68, '', '2009-06-17 12:36:51', 62, 0, '0000-00-00 00:00:00', '2007-05-03 11:49:33', '0000-00-00 00:00:00', 'chamadinha estrada bonita 3 serie.jpg', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 9, 0, 33, '', '', 0, 93, 'robots=\nauthor='),
(118, 'Homenagem Dia das Mães na Oficina', 'homenagem-dia-das-maes-na-oficina', '', '<p><img src="images/stories/chamadinha dia maes 4 serie.jpg" hspace="6" alt="" title="" border="0" align="left" />Os alunos da 4&#1072; s&eacute;rie titularam suas m&atilde;es de rainhas, baseados em importantes mulheres da B&iacute;blia como Ester...Com teatro, m&uacute;sica e muita alegria, a emo&ccedil;&atilde;o contagiou as m&atilde;es.</p>', '', 1, 1, 0, 1, '2007-05-11 16:18:38', 68, '', '2009-06-17 12:30:32', 62, 0, '0000-00-00 00:00:00', '2007-05-11 16:10:15', '0000-00-00 00:00:00', 'chamadinha dia maes 4 serie.jpg', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 3, 0, 30, '', '', 0, 303, 'robots=\nauthor='),
(119, 'Semana do Meio Ambiente', 'semana-do-meio-ambiente', '', '<p><img src="images/stories/chamdinha.jpg" hspace="6" border="0" align="left" />Para comemorar esta semana, os alunos da Oficina  plantaram na Sede de Campo mudas de árvores...<br /><a href="index.php?option=com_phocagallery&amp;view=category&amp;id=24:semana-meio-ambiente-na-oficina&amp;Itemid=20">Confira!!!!</a></p>', '', 1, 1, 0, 1, '2007-06-15 14:48:45', 68, '', '2009-06-17 12:32:14', 62, 0, '0000-00-00 00:00:00', '2007-06-15 14:46:19', '0000-00-00 00:00:00', 'chamdinha.jpg', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 5, 0, 29, '', '', 0, 125, 'robots=\nauthor='),
(120, 'Soletrando na turma da Professora Vanessa', 'soletrando-na-turma-da-professora-vanessa', '', '<p><img src="images/stories/chamadinha soletrando.jpg" hspace="6" alt="" title="" border="0" align="left" />A turma de 2&#1072; s&eacute;rie matutino aprendeu com muita divers&atilde;o... No soletrando as crian&ccedil;as mostraram que realmente aprenderam. Foi um sucesso!!', '', 1, 1, 0, 1, '2007-06-15 15:29:39', 68, '', '2009-06-17 12:24:00', 62, 0, '0000-00-00 00:00:00', '2007-06-15 15:21:55', '0000-00-00 00:00:00', 'chamadinha soletrando.jpg', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 4, 0, 28, '', '', 0, 153, 'robots=\nauthor='),
(121, 'Vôlei das Mães na Sede de Campo', 'volei-das-maes-na-sede-de-campo', '', '<p><img border="0" hspace="6" src="images/stories/chamada volei.jpg" align="left" />O Jogo de Vôlei da Mães na Sede Campo mostrou que essa equipe tá com a bola toda.<br /></p>', '', 1, 1, 0, 1, '2007-06-15 15:46:20', 68, '', '2009-06-17 12:21:54', 62, 0, '0000-00-00 00:00:00', '2007-06-15 15:45:40', '0000-00-00 00:00:00', 'chamada volei.jpg', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 5, 0, 27, '', '', 0, 113, 'robots=\nauthor='),
(122, 'Treinamento  Professores Oficina no Unicemp', 'treinamento-professores-oficina-no-unicemp', '', '<p><img src="images/stories/chamadinha unicemp.jpg" hspace="6" alt="" title="" border="0" align="left" />Nossos Professores neste no dia 15 de Junho fizeram Treinamento no Centro Universit&aacute;rio Positivo em Curitiba. <a href="hindex.php?option=com_phocagallery&view=category&id=27:treinamento-professores-no-unicenp&Itemid=20">Veja as fotos!!!</a></p>', '', 1, 1, 0, 1, '2007-06-19 14:51:51', 68, '', '2009-06-17 12:19:32', 62, 0, '0000-00-00 00:00:00', '2007-06-19 14:40:23', '0000-00-00 00:00:00', 'chamadinha unicemp.jpg', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 4, 0, 26, '', '', 0, 243, 'robots=\nauthor='),
(123, 'Mini PAN na Oficina', 'mini-pan-na-oficina', '', '<img src="images/stories/chamadinha pan.jpg" hspace="6" alt="" title="" border="0" align="left" />No &uacute;ltimo dia 13 de Julho os alunos da oficina dos Sonhos tiveram uma manh&atilde; na Sede de Campo muito atrativa....Participaram do <strong>Mini PAN, </strong>onde puderam inscrever-se na modalidade preferida: carat&ecirc;, basquete, corrida, futebol, salto em dist&acirc;ncia e outros...', '', 1, 1, 0, 1, '2007-07-24 14:24:11', 68, '', '2009-06-17 12:18:14', 62, 0, '0000-00-00 00:00:00', '2007-07-24 14:17:25', '0000-00-00 00:00:00', 'chamadinha pan.jpg', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 6, 0, 25, '', '', 0, 151, 'robots=\nauthor='),
(124, 'Passeio  Ciclístico na Oficina', 'passeio-ciclistico-na-oficina', '', '<p><img src="images/stories/chamada dia pais.jpg" hspace="6" alt="" title="" border="0" align="left" />No dia 25 de Agosto a Oficina dos Sonhos realizou&nbsp; o II Passeio Cicl&iacute;stico. O Tema deste ano foi o Dia dos Pais, onde a familia toda participou. Enquanto pais e filhos pedalavam, as m&atilde;es preparavam um belo piquenique na Sede de Campo. Foi uma manh&atilde; muito aben&ccedil;oada!!!</p>', '', 1, 1, 0, 1, '2007-08-31 14:18:22', 68, '', '2009-06-17 12:17:09', 62, 0, '0000-00-00 00:00:00', '2007-08-31 14:14:47', '0000-00-00 00:00:00', 'chamada dia pais.jpg', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 7, 0, 24, '', '', 0, 226, 'robots=\nauthor='),
(125, 'Desfile Cívico 7 de Setembro', 'desfile-civico-7-de-setembro', '', '<p><img src="images/stories/chamdinha desfile civico.jpg" hspace="6" alt="" title="" border="0" align="left" />No dia 4 de Setembro&nbsp; os alunos do Ensino Fundamental&nbsp; participaram&nbsp; do desfile c&iacute;vico&nbsp;na Rua&nbsp; Otto, juntamente com a comunidade do Bairro Costa e Silva.</p>', '', 1, 1, 0, 1, '2007-09-17 13:51:06', 68, '', '2009-06-17 12:15:51', 62, 0, '0000-00-00 00:00:00', '2007-09-17 13:45:04', '0000-00-00 00:00:00', 'chamdinha desfile civico.jpg', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 5, 0, 23, '', '', 0, 197, 'robots=\nauthor='),
(162, 'Estrutura', 'estrutura', '', '<p align="center">\r\n<strong>1&ordm; Andar</strong> clique nas marca&ccedil;&otilde;es em amarelo para ver uma imagem do local!\r\n<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0" width="420" height="320">\r\n<param name="movie" value="images/stories/swfs/primeiro.swf" />\r\n<param name="quality" value="high" />\r\n<param name="menu" value="false" />\r\n<param name="wmode" value="transparent" />\r\n<embed src="images/stories/swfs/primeiro.swf" wmode="transparent" quality="high" menu="false" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="420" height="320"></embed>\r\n</object>\r\n</p>\r\n<p align="center">\r\n<strong>2&ordm; Andar</strong> clique nas marca&ccedil;&otilde;es em amarelo para ver uma imagem do local!\r\n<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0" width="420" height="320">\r\n<param name="movie" value="images/stories/swfs/segundo.swf" />\r\n<param name="quality" value="high" />\r\n<param name="menu" value="false" />\r\n<param name="wmode" value="transparent" />\r\n<embed src="images/stories/swfs/segundo.swf" wmode="transparent" quality="high" menu="false" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="420" height="320"></embed>\r\n</object>\r\n</p>\r\n<p align="center">\r\n<strong>3&ordm; Andar</strong> clique nas marca&ccedil;&otilde;es em amarelo para ver uma imagem do local!\r\n<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0" width="420" height="320">\r\n<param name="movie" value="images/stories/swfs/terceiro.swf" />\r\n<param name="quality" value="high" />\r\n<param name="menu" value="false" />\r\n<param name="wmode" value="transparent" />\r\n<embed src="images/stories/swfs/terceiro.swf" wmode="transparent" quality="high" menu="false" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="420" height="320"></embed>\r\n</object>\r\n</p>', '', 1, 16, 0, 35, '2009-06-16 21:38:40', 68, '', '2009-06-16 21:40:34', 62, 0, '0000-00-00 00:00:00', '2009-06-16 21:38:40', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 2, 0, 6, '', '', 0, 5, 'robots=\nauthor='),
(127, 'Noite do Soninho 2007', 'noite-do-soninho-2007', '', '<img src="images/stories/chamadinha noite sonnho.jpg" hspace="6" alt="" title="" border="0" align="left" />No Dia 11 de outubro os alunos da Educa&ccedil;&atilde;o Infantil participaram da Noite do Soninho....Ganharam ingressos para o espet&aacute;culo no circo...Houve muita divers&atilde;o. <a href="index.php?option=com_phocagallery&view=category&id=16:noite-do-soninho-2007&Itemid=20">Confira!!!</a>', '', 1, 1, 0, 1, '2007-10-24 16:43:55', 68, '', '2009-06-17 12:14:08', 62, 0, '0000-00-00 00:00:00', '2007-10-24 16:42:57', '0000-00-00 00:00:00', 'chamadinha noite sonnho.jpg', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 7, 0, 22, '', '', 0, 124, 'robots=\nauthor='),
(128, '16º Festival de Dança Interescolar', '16o-festival-de-danca-interescolar', '', '<p><img src="images/stories/chamadinha jazz.jpg" hspace="6" alt="" title="" border="0" align="left" />Neste &uacute;ltimo de 24 de Outubro o Grupo de Jazz da Oficina participou no&nbsp; Festival de Dan&ccedil;a Interescolar.</p><p>Parab&eacute;ns alunas!!! Voc&ecirc;s arrasaram e garatiram o 3&ordm; lugar. <a href="index.php?option=com_phocagallery&view=category&id=34:16o-festival-de-danca-interescolar&Itemid=202">Confira as fotos!!!</a></p>', '', 1, 1, 0, 1, '2007-10-25 10:19:35', 68, '', '2009-06-17 12:12:28', 62, 0, '0000-00-00 00:00:00', '2007-10-25 10:16:49', '0000-00-00 00:00:00', 'chamadinha jazz.jpg', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 7, 0, 21, '', '', 0, 178, 'robots=\nauthor='),
(129, '5ª Feira Cultural', '5o-feira-cultural', '', '<p><img border="0" title="feira cultural" alt="feira cultural" hspace="6" align="left" src="images/stories/chamadinha 5 feira.jpg" /><strong> Diversidade dos Povos.</strong> Pequenas salas de aula se transformaram em países como Holanda, África do Sul, Austrália, Kuwait, Grécia, Chile, Tailândia e o nosso Brasil. As famílias que visitaram ficaram muito encantadas com os detalhes da exposição. <a href="index.php?option=com_phocagallery&view=category&id=25:5a-feira-cultural&Itemid=20">Confira as fotos!!!</a></p>', '', 1, 1, 0, 1, '2007-11-14 18:42:57', 68, '', '2009-06-17 12:11:34', 62, 0, '0000-00-00 00:00:00', '2007-11-14 18:31:43', '0000-00-00 00:00:00', 'chamadinha 5 feira.jpg', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 6, 0, 20, '', '', 0, 187, 'robots=\nauthor='),
(130, 'Judô', 'judo', '', '<p style="text-align: center;"><img src="images/stories/judo.jpg" hspace="6" border="0" /></p>\r\n<p style="text-align: left;"> </p>\r\n<p style="text-align: left;">Um estilo de luta que hoje em dia denominamos como Judô foi idealizado no ano de 1882. Um jovem de 23 anos chamado Jigoro Kano fundava o Instituto Kodokan, que veio a se tornar a Meca dos ensinamentos sobre esta arte marcial.</p>\r\n<p style="text-align: left;"> </p>\r\n', '\r\n<br />\r\n<p> </p>\r\n<p style="text-align: left;">Com milhares de praticantes e federações espalhados pelo mundo, o Judô se tornou um dos esportes mais praticados, representando um nicho de mercado fiel e bem definido. Não restringindo seus adeptos a homens com vigor físico, e estendendo seus ensinamentos para mulheres, crianças e idosos, o judô teve um aumento significativo no número de amantes desta nobre arte.</p>\r\n<p style="text-align: left;"> </p>\r\n<p style="text-align: left;">O Judô tem como filosofia integrar corpo e mente. Sua técnica utiliza os músculos e a velocidade de raciocínio para dominar o oponente A vitória, ainda segundo seu mestre fundador, representa um fortalecimento espiritual. Nas academias, procura-se passar algo mais além da luta, do contato físico. Para tornar-se um bom lutador, antes de tudo, é preciso ser um grande ser humano. É reconhecido como um esporte saudável que não está relacionado à violência.</p>\r\n<p style="text-align: left;">Um esporte de princípios, também considerado uma arte, uma filosofia de vida, admirado, respeitado, vitorioso e de grande prestígio.</p>\r\n<p> </p>', 1, 11, 0, 22, '2007-11-14 22:47:56', 68, '', '2009-06-19 14:17:18', 62, 0, '0000-00-00 00:00:00', '2007-11-14 22:33:28', '0000-00-00 00:00:00', 'judo.jpg', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 6, 0, 2, '', '', 0, 610, 'robots=\nauthor='),
(171, 'Calendário Educação Infantil 2009', 'calendario-educacao-infantil-2009', '', '<img alt="calendario_2009_educacao_infantil" height="875" width="620" src="images/stories/calendario_2009_educacao_infantil.gif" />', '', 0, 8, 0, 20, '2009-06-18 04:01:11', 62, '', '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', '2009-06-18 04:01:11', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 0, 0, 5, '', '', 0, 0, 'robots=\nauthor='),
(131, 'Técnica Vocal', 'tecnica-vocal', '', 'Nas aulas de técnica vocal usamos a voz a serviço da música, utiliza o sopro e possibilita modular, enriquecer e sustentar as sonoridades vocais e torná-las mais expressivas. Entre o corpo e a voz existe uma íntima relação. É com eles que o cantor exterioriza sua afetividade e desempenha o papel intermediário entre o público e a obra musical. Mas, para isso é preciso que ele possua uma técnica precisa e impecável a fim de poder dominar as inúmeras dificuldades que vai encontrar.  Nas aulas de canto é  abordado todos os aspectos da arte de cantar. Você aprende todas as técnicas e a importância prática dos recursos de técnica vocal.', '', 1, 11, 0, 22, '2007-11-14 23:53:06', 68, '', '2009-06-19 14:15:17', 62, 0, '0000-00-00 00:00:00', '2007-11-14 23:47:10', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 4, 0, 1, '', '', 0, 302, 'robots=\nauthor='),
(172, 'Calendário Ensino Fundamental 2009', 'calendario-ensino-fundamental-2009', '', '<p><img src="images/stories/calendario_2009_ensino_fundamental.gif" width="619" height="883" alt="calendario_2009_ensino_fundamental" /></p>', '', 0, 9, 0, 19, '2009-06-18 03:43:22', 62, '', '2009-06-18 03:53:09', 62, 0, '0000-00-00 00:00:00', '2009-06-18 03:43:22', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 0, 0, 7, '', '', 0, 0, 'robots=\nauthor='),
(132, 'Ballet no Juarez Machado', 'ballet-no-juarez-machado', '', '<p><img src="images/stories/chamadinha ballet 2007.jpg" hspace="6" alt="" title="" border="0" align="left" />As alunas do Ballet da Oficina do Sonhos&nbsp;realizaram um bonito encerramento&nbsp;no dia 18 de Novembro,&nbsp;no Teatro&nbsp;Juarez Machado.</p><p><a href="index.php?option=com_phocagallery&view=category&id=22:encerramento-ballet-no-juarez-machado&Itemid=20">Vale confeiri!!!&nbsp;</a></p>', '', 1, 1, 0, 1, '2007-11-20 13:48:53', 68, '', '2009-06-17 12:04:23', 62, 0, '0000-00-00 00:00:00', '2007-11-20 13:37:37', '0000-00-00 00:00:00', 'chamadinha ballet 2007.jpg', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 3, 0, 19, '', '', 0, 168, 'robots=\nauthor='),
(133, 'Acampamento Campo Alegre', 'acampamento-campo-alegre', '', '<img src="images/stories/chamadinha acampamento 2007.jpg" hspace="6" alt="acampamento" title="acampamento" align="left" border="0" />As turmas 5&ordf;, 6&ordf; e 7&ordf;&nbsp; a s&eacute;ries do Fundamental passaram dois dias na Ch&aacute;cara da Professora Milena em Campo Alegre. Houve muita divers&atilde;o!! <a href="index.php?option=com_phocagallery&view=category&id=46:acampamento-campo-alegre&Itemid=20">Confira.</a>', '', 1, 1, 0, 1, '2007-11-30 14:40:34', 68, '', '2009-06-17 12:03:19', 62, 0, '0000-00-00 00:00:00', '2007-11-30 14:33:44', '0000-00-00 00:00:00', 'chamadinha acampamento 2007.jpg', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 5, 0, 18, '', '', 0, 161, 'robots=\nauthor=');
INSERT INTO `jos_content` (`id`, `title`, `alias`, `title_alias`, `introtext`, `fulltext`, `state`, `sectionid`, `mask`, `catid`, `created`, `created_by`, `created_by_alias`, `modified`, `modified_by`, `checked_out`, `checked_out_time`, `publish_up`, `publish_down`, `images`, `urls`, `attribs`, `version`, `parentid`, `ordering`, `metakey`, `metadesc`, `access`, `hits`, `metadata`) VALUES
(134, 'Lista Materiais  Educação Fundamental', 'lista-materiais-educacao-fundamental', '', '<img alt="customize" height="53" width="53" src="images/stories/customize.png" /><br /><br /> \r\n<table style="border-collapse: collapse; width: 420px; height: 339px;" cellpadding="0" cellspacing="0" border="0">\r\n<tbody>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="border: 0.5pt solid windowtext; width: 306pt; height: 12.75pt; background-color: transparent;" height="17" width="408" class="xl26"><span style="font-family: Arial; color: #000000; font-size: x-small;"><strong>LISTA DE MATERIAIS 2009 - 1º ANO / Pré-escola</strong></span></td>\r\n</tr>\r\n<tr style="height: 16.5pt;" height="22">\r\n<td style="height: 16.5pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="22" class="xl25"><strong><span style="font-family: Arial; color: #000000; font-size: x-small;"> </span></strong></td>\r\n</tr>\r\n<tr style="height: 14.25pt;" height="19">\r\n<td style="height: 14.25pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="19" class="xl27"><span style="font-family: Arial; color: #000000; font-size: x-small;">01 caderno 60 folhas - capa vermelha</span></td>\r\n</tr>\r\n<tr style="height: 14.25pt;" height="19">\r\n<td style="height: 14.25pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="19" class="xl27"><span style="font-family: Arial; color: #000000; font-size: x-small;">01 penal com 3 lápis grafite, 1 borracha,1 apontador</span></td>\r\n</tr>\r\n<tr style="height: 14.25pt;" height="19">\r\n<td style="height: 14.25pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="19" class="xl27"><span style="font-size: x-small;"><span style="color: #000000;"><span style="font-family: Arial;">02 pastas de elástico<span> (grossa)</span></span></span></span></td>\r\n</tr>\r\n<tr style="height: 14.25pt;" height="19">\r\n<td style="height: 14.25pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="19" class="xl27"><span style="font-family: Arial; color: #000000; font-size: x-small;">01 caixa de sapato encapada na cor vermelha</span></td>\r\n</tr>\r\n<tr style="height: 14.25pt;" height="19">\r\n<td style="height: 14.25pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="19" class="xl27"><span style="font-family: Arial; color: #000000; font-size: x-small;">01 caixa de lápis de cor com penal</span></td>\r\n</tr>\r\n<tr style="height: 14.25pt;" height="19">\r\n<td style="height: 14.25pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="19" class="xl27"><span style="font-family: Arial; color: #000000; font-size: x-small;">01 caixa de giz de cera curto</span></td>\r\n</tr>\r\n<tr style="height: 14.25pt;" height="19">\r\n<td style="height: 14.25pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="19" class="xl27"><span style="font-family: Arial; color: #000000; font-size: x-small;">01 estojo de canetinhas</span></td>\r\n</tr>\r\n<tr style="height: 14.25pt;" height="19">\r\n<td style="height: 14.25pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="19" class="xl27"><span style="font-family: Arial; color: #000000; font-size: x-small;">01 pincel nº 12</span></td>\r\n</tr>\r\n<tr style="height: 14.25pt;" height="19">\r\n<td style="height: 14.25pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="19" class="xl27"><span style="font-family: Arial; color: #000000; font-size: x-small;">01 tesoura sem ponta (sugestão: marca Mundial ou tramontina)</span></td>\r\n</tr>\r\n<tr style="height: 14.25pt;" height="19">\r\n<td style="height: 14.25pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="19" class="xl27"><span style="font-family: Arial; color: #000000; font-size: x-small;">01 tubo de cola pequeno, </span></td>\r\n</tr>\r\n<tr style="height: 14.25pt;" height="19">\r\n<td style="height: 14.25pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="19" class="xl27"><span style="font-family: Arial; color: #000000; font-size: x-small;">01 estojo com escova de dente e creme dental</span></td>\r\n</tr>\r\n<tr style="height: 14.25pt;" height="19">\r\n<td style="height: 14.25pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="19" class="xl27"><span style="font-family: Arial; color: #000000; font-size: x-small;">01 gibi</span></td>\r\n</tr>\r\n<tr style="height: 14.25pt;" height="19">\r\n<td style="height: 14.25pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="19" class="xl27"><span style="font-family: Arial; color: #000000; font-size: x-small;">01 livro  infantil  p/ 6 anos</span></td>\r\n</tr>\r\n<tr style="height: 14.25pt;" height="19">\r\n<td style="height: 14.25pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="19" class="xl27"><span style="font-family: Arial; color: #000000; font-size: x-small;">01 jogo educativo</span></td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p> </p>\r\n<table style="border-collapse: collapse; width: 445px;" cellpadding="0" cellspacing="0" border="0">\r\n<tbody>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="border: 0.5pt solid windowtext; width: 334pt; height: 12.75pt; background-color: transparent;" height="17" width="445" class="xl26"><span style="font-family: Arial; color: #000000; font-size: x-small;"><strong>LISTA DE MATERIAIS 2009 - 2o ANO / 1ª SÉRIE</strong></span></td>\r\n</tr>\r\n<tr style="height: 16.5pt;" height="22">\r\n<td style="height: 16.5pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="22" class="xl25"><strong><span style="font-family: Arial; color: #000000; font-size: x-small;"> </span></strong></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl24"><span style="font-size: x-small;"><span style="color: #000000;"><span style="font-family: Arial;">02 Cadernos Brochurão - 60 folhas<span> </span></span></span></span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl24"><span style="font-family: Arial; color: #000000; font-size: x-small;">01 Estojo escolar</span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl24"><span style="font-family: Arial; color: #000000; font-size: x-small;">02 Lápis</span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl24"><span style="font-family: Arial; color: #000000; font-size: x-small;">01 Apontador</span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl24"><span style="font-family: Arial; color: #000000; font-size: x-small;">01 Borracha branca</span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl24"><span style="font-family: Arial; color: #000000; font-size: x-small;">01 Régua plástica - 30cm</span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl24"><span style="font-family: Arial; color: #000000; font-size: x-small;">01 Tubo de cola pequeno</span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl24"><span style="font-size: x-small;"><span style="color: #000000;"><span style="font-family: Arial;">01 Pasta com elástico<span> </span></span></span></span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl24"><span style="font-family: Arial; color: #000000; font-size: x-small;">01 Tesoura escolar (Tramontina ou Mundial)</span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl24"><span style="font-family: Arial; color: #000000; font-size: x-small;">01 Dicionário pequeno</span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl27"><span style="font-family: Arial; color: #000000; font-size: x-small;">01 Caixa de material dourado individual 62pçs (Livrarias Curitiba)</span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl27"><span style="font-family: Arial; color: #000000; font-size: x-small;">01 Bíblia pequena ( Sugestão: linguagem de hoje)</span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl24"><span style="font-family: Arial; color: #000000; font-size: x-small;">01 livro infantil (ficará na biblioteca da sala de aula)</span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl24"><span style="font-family: Arial; color: #000000; font-size: x-small;">01 Gibi</span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl24"><span style="font-family: Arial; color: #000000; font-size: x-small;">01 Calculadora</span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl24"><span style="font-family: Arial; color: #000000; font-size: x-small;"> </span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl24"><span style="font-family: Arial; color: #000000; font-size: x-small;"> </span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl26"><strong><span style="font-family: Arial; color: #000000; font-size: x-small;">MATERIAL ARTE</span></strong></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl24"><span style="font-family: Arial; color: #000000; font-size: x-small;">01 Pincel nº 14 (Tigre)</span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl24"><span style="font-family: Arial; color: #000000; font-size: x-small;">01 Pincel nº 10 (Tigre)</span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl24"><span style="font-size: x-small;"><span style="color: #000000;"><span style="font-family: Arial;">01 caixa de giz de cera<span> </span></span></span></span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl24"><span style="font-size: x-small;"><span style="color: #000000;"><span style="font-family: Arial;">01 estojo de<span> </span>canetinhas<span> </span></span></span></span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl24"><span style="font-family: Arial; color: #000000; font-size: x-small;">01 caixa de lápis de cor -<span> </span>aquarelado - Faber Castell</span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl24"><span style="font-family: Arial; color: #000000; font-size: x-small;">01 Lápis HB</span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl24"><span style="font-family: Arial; color: #000000; font-size: x-small;">01 Caderno de desenho</span></td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p> </p>\r\n<p> </p>\r\n<table style="border-collapse: collapse; width: 474px;" cellpadding="0" cellspacing="0" border="0">\r\n<tbody>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="border: 0.5pt solid windowtext; width: 356pt; height: 12.75pt; background-color: transparent;" height="17" width="474" class="xl26"><span style="font-family: Arial; color: #000000; font-size: x-small;"><strong>LISTA DE MATERIAIS 2009 - 3o ANO / 2ª SÉRIE</strong></span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl25"><strong><span style="font-family: Arial; color: #000000; font-size: x-small;"> </span></strong></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl24"><span style="font-size: x-small;"><span style="color: #000000;"><span style="font-family: Arial;">02 Cadernos Brochurão - 60 folhas<span> </span></span></span></span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl24"><span style="font-family: Arial; color: #000000; font-size: x-small;">01 Estojo escolar</span></td>\r\n</tr>\r\n<tr style="height: 13.5pt;" height="18">\r\n<td style="height: 13.5pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="18" class="xl24"><span style="font-family: Arial; color: #000000; font-size: x-small;">02 Lápis</span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl24"><span style="font-family: Arial; color: #000000; font-size: x-small;">01 Apontador</span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl27"><span style="font-family: Arial; color: #000000; font-size: x-small;">01 Borracha branca</span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl24"><span style="font-family: Arial; color: #000000; font-size: x-small;">01 Régua plástica - 30cm</span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl24"><span style="font-family: Arial; color: #000000; font-size: x-small;">01 Tubo de cola pequeno</span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl24"><span style="font-family: Arial; color: #000000; font-size: x-small;">01 Tesoura pequena sem ponta ( Sugestão: Tramontina ou Mundial)</span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl24"><span style="font-family: Arial; color: #000000; font-size: x-small;">01 Pasta com elástico</span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl24"><span style="font-family: Arial; color: #000000; font-size: x-small;">01dicionário pequeno<span> </span>(Sugestão: Aurélio)</span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl24"><span style="font-family: Arial; color: #000000; font-size: x-small;">01 Dicionário<span> </span>inglês/português (pode ser ilustrado)</span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl27"><span style="font-family: Arial; color: #000000; font-size: x-small;">01 Atlas geográfico ilustrado - Ed. Moderna</span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl27"><span style="font-family: Arial; color: #000000; font-size: x-small;">01 Caixa de material dourado individual 62pçs (Livrarias Curitiba)</span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl27"><span style="font-family: Arial; color: #000000; font-size: x-small;">01 Bíblia pequena ( Sugestão: linguagem de hoje)</span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl24"><span style="font-family: Arial; color: #000000; font-size: x-small;">01 Gibi (ficará na biblioteca da sala de aula)</span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl24"><span style="font-family: Arial; color: #000000; font-size: x-small;">01 livro infantil (ficará na biblioteca da sala de aula)</span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl24"><span style="font-family: Arial; color: #000000; font-size: x-small;">01 Calculadora</span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl27"><span style="font-family: Arial; color: #000000; font-size: x-small;"> </span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl27"><span style="font-family: Arial; color: #000000; font-size: x-small;"> </span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl24"><span style="font-family: Arial; color: #000000; font-size: x-small;"> </span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl26"><strong><span style="font-family: Arial; color: #000000; font-size: x-small;">MATERIAL ARTE</span></strong></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl24"><span style="font-family: Arial; color: #000000; font-size: x-small;">01 Pincel nº 14 (Tigre)</span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl24"><span style="font-family: Arial; color: #000000; font-size: x-small;">01 Pincel nº 10 (Tigre)</span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl24"><span style="font-family: Arial; color: #000000; font-size: x-small;">01 estojo de canetinhas</span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl24"><span style="font-family: Arial; color: #000000; font-size: x-small;">01 caixa de giz de cera</span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl24"><span style="font-family: Arial; color: #000000; font-size: x-small;">01<span> </span>caixa de lápis de cor -<span> </span>aquarelado - Faber Castell</span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl24"><span style="font-family: Arial; color: #000000; font-size: x-small;">01 Lápis HB</span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl24"><span style="font-family: Arial; color: #000000; font-size: x-small;">01 Lápis 6B Regent 1250 - Faber Castell</span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl24"><span style="font-family: Arial; color: #000000; font-size: x-small;">01 Caderno de desenho</span></td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p> </p>\r\n<p> </p>\r\n<table style="border-collapse: collapse; width: 478px;" cellpadding="0" cellspacing="0" border="0">\r\n<tbody>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="border: 0.5pt solid windowtext; width: 359pt; height: 12.75pt; background-color: transparent;" height="17" width="478" class="xl25"><strong><span style="font-family: Arial; color: #000000; font-size: x-small;">LISTA DE MATERIAIS<span> </span>2009 - 4o ANO / 3ª SÉRIE</span></strong></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl26"><span style="font-family: Arial; color: #000000; font-size: x-small;"> </span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl26"><span style="font-size: x-small;"><span style="color: #000000;"><span style="font-family: Arial;">02 Cadernos Brochurão - 96 folhas<span> </span></span></span></span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl26"><span style="font-family: Arial; color: #000000; font-size: x-small;">01 Estojo escolar</span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl26"><span style="font-family: Arial; color: #000000; font-size: x-small;">02 Lápis</span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl26"><span style="font-family: Arial; color: #000000; font-size: x-small;">01 Apontador</span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl26"><span style="font-family: Arial; color: #000000; font-size: x-small;">01 Borracha branca</span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl26"><span style="font-family: Arial; color: #000000; font-size: x-small;">01 Régua plástica - 30cm</span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl26"><span style="font-family: Arial; color: #000000; font-size: x-small;">01 Caneta - esferográfica - azul</span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl26"><span style="font-family: Arial; color: #000000; font-size: x-small;">01 Tubo de cola pequeno</span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl26"><span style="font-family: Arial; color: #000000; font-size: x-small;">01 Tesoura escolar (Sugestão: Tramontina ou Mundial)</span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl26"><span style="font-family: Arial; color: #000000; font-size: x-small;">01 Caixa de material dourado individual 62pçs (Livrarias Curitiba)</span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl26"><span style="font-family: Arial; color: #000000; font-size: x-small;">01 Dicionário<span> </span>(Sugestão: Aurélio)</span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl26"><span style="font-family: Arial; color: #000000; font-size: x-small;">01 Dicionário<span> </span>inglês/português (pode ser ilustrado)</span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl26"><span style="font-family: Arial; color: #000000; font-size: x-small;">01 Atlas geográfico ilustrado - Ed. Moderna</span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl26"><span style="font-family: Arial; color: #000000; font-size: x-small;">01 Bíblia pequena ( Sugestão: linguagem de hoje)</span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl24"><span style="font-family: Arial; color: #000000; font-size: x-small;">01 livro infanto juvenil (ficará na biblioteca da sala de aula)</span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl26"><span style="font-family: Arial; color: #000000; font-size: x-small;"> </span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl26"><span style="font-family: Arial; color: #000000; font-size: x-small;"> </span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl25"><strong><span style="font-family: Arial; color: #000000; font-size: x-small;">MATERIAL ARTE</span></strong></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl24"><span style="font-family: Arial; color: #000000; font-size: x-small;">01 Pincel nº 14 (Tigre)</span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl24"><span style="font-family: Arial; color: #000000; font-size: x-small;">01 Pincel nº 10 (Tigre)</span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl24"><span style="font-size: x-small;"><span style="color: #000000;"><span style="font-family: Arial;">01 caixa de giz de cera<span> </span></span></span></span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl24"><span style="font-family: Arial; color: #000000; font-size: x-small;">01 caixa de lápis de cor - aquarelado - Faber Castell</span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl24"><span style="font-family: Arial; color: #000000; font-size: x-small;">01 Lápis HB</span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl24"><span style="font-family: Arial; color: #000000; font-size: x-small;">01 Lápis 6B Regent 1250 - Faber Castell</span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl24"><span style="font-family: Arial; color: #000000; font-size: x-small;">01 estojo de canetinhas</span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl24"><span style="font-family: Arial; color: #000000; font-size: x-small;">01 caderno pequeno</span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl24"><span style="font-family: Arial; color: #000000; font-size: x-small;">01 caderno de desenho</span></td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p> </p>\r\n<p> </p>\r\n<p> </p>\r\n<table style="border-collapse: collapse; width: 496px;" cellpadding="0" cellspacing="0" border="0">\r\n<tbody>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="border: 0.5pt solid windowtext; width: 372pt; height: 12.75pt; background-color: transparent;" height="17" width="496" class="xl25"><span style="font-family: Arial; color: #000000; font-size: x-small;"><strong>LISTA DE MATERIAIS<span> </span>2009 - 5o ANO / 4ª SÉRIE</strong></span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl25"><strong><span style="font-family: Arial; color: #000000; font-size: x-small;"> </span></strong></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl26"><span style="font-size: x-small;"><span style="color: #000000;"><span style="font-family: Arial;">02 Cadernos Brochurão - 96 folhas<span> </span></span></span></span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl26"><span style="font-size: x-small;"><span style="color: #000000;"><span style="font-family: Arial;">02 cadernos Brochurão - 48 folhas<span> </span></span></span></span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl26"><span style="font-family: Arial; color: #000000; font-size: x-small;">01 Estojo escolar</span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl26"><span style="font-family: Arial; color: #000000; font-size: x-small;">02 Lápis</span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl26"><span style="font-family: Arial; color: #000000; font-size: x-small;">01 Apontador</span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl26"><span style="font-family: Arial; color: #000000; font-size: x-small;">01 Borracha branca</span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl26"><span style="font-family: Arial; color: #000000; font-size: x-small;">01 Régua plástica - 30cm</span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl26"><span style="font-family: Arial; color: #000000; font-size: x-small;">01 Caneta - esferográfica - azul/vermelha</span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl26"><span style="font-family: Arial; color: #000000; font-size: x-small;">01 Tubo de cola pequeno</span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl26"><span style="font-family: Arial; color: #000000; font-size: x-small;">01 Pasta com elástico</span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl26"><span style="font-family: Arial; color: #000000; font-size: x-small;">01 Tesoura escolar (Tramontina ou Mundial)</span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl26"><span style="font-family: Arial; color: #000000; font-size: x-small;">01 Caixa de material dourado individual 62pçs (Livrarias Curitiba)</span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl26"><span style="font-family: Arial; color: #000000; font-size: x-small;">01 Dicionário<span> </span>(Sugestão:Aurélio)</span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl26"><span style="font-size: x-small;"><span style="color: #000000;"><span style="font-family: Arial;">01 Dicionário<span> </span>inglês/português<span> </span></span></span></span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl26"><span style="font-family: Arial; color: #000000; font-size: x-small;">01 Atlas geográfico ilustrado - Ed. Moderna</span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl26"><span style="font-family: Arial; color: #000000; font-size: x-small;">01 Bíblia pequena ( Sugestão: linguagem de hoje)</span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl24"><span style="font-family: Arial; color: #000000; font-size: x-small;">01 livro infanto juvenil (ficará na biblioteca da sala de aula)</span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl26"><span style="font-family: Arial; color: #000000; font-size: x-small;"> </span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl26"><span style="font-family: Arial; color: #000000; font-size: x-small;"> </span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl25"><strong><span style="font-family: Arial; color: #000000; font-size: x-small;">MATERIAL ARTE</span></strong></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl24"><span style="font-family: Arial; color: #000000; font-size: x-small;">01 Pincel nº 14 (Tigre)</span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl24"><span style="font-family: Arial; color: #000000; font-size: x-small;">01 Pincel nº 10 (Tigre)</span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl26"><span style="font-size: x-small;"><span style="color: #000000;"><span style="font-family: Arial;">01 caixa de giz de cera<span> </span></span></span></span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl26"><span style="font-family: Arial; color: #000000; font-size: x-small;">01 Lápis HB</span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl26"><span style="font-family: Arial; color: #000000; font-size: x-small;">01 Lápis 6B Regent 1250 - Faber Castell</span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl26"><span style="font-family: Arial; color: #000000; font-size: x-small;">01 estojo de canetinhas</span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl24"><span style="font-family: Arial; color: #000000; font-size: x-small;">01 caderno pequeno</span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl24"><span style="font-family: Arial; color: #000000; font-size: x-small;">01 Caderno de desenho</span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl26"><span style="font-family: Arial; color: #000000; font-size: x-small;"> </span></td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p> </p>\r\n<p> </p>\r\n<table style="border-collapse: collapse; width: 493px; height: 754px;" cellpadding="0" cellspacing="0" border="0">\r\n<tbody>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="border: 0.5pt solid windowtext; width: 429pt; height: 12.75pt; background-color: transparent;" height="17" width="572" class="xl25">\r\n<p><strong><span style="color: #000000; font-size: x-small;"> </span></strong></p>\r\n<strong><span style="color: #000000; font-size: x-small;"> \r\n<table style="border-collapse: collapse; width: 486px; height: 382px;" cellpadding="0" cellspacing="0" border="0">\r\n<tbody>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="border: 0.5pt solid windowtext; width: 429pt; height: 12.75pt; background-color: transparent;" height="17" width="572" class="xl25"><strong><span style="font-family: Arial; color: #000000; font-size: x-small;">LISTA DE MATERIAIS<span> </span>2009<span> </span>-<span> </span>6o ANO/ 5a SÉRIE</span></strong></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl27"><span style="font-family: Arial; color: #000000; font-size: x-small;"><span style="font-weight: normal;">06 cadernos de 60fls– Português/ Matemática/ Ciências/ Geografia/ História/ Inglês.</span></span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl27"><span style="font-family: Arial; color: #000000; font-size: x-small;"><span style="font-weight: normal;">03 cadernos de 40fls - Ed. Física/ Educação Cristã / Artes.</span></span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl28"><span style="font-size: x-small;"><span style="color: #000000;"><span style="font-family: Arial;"><span style="font-weight: normal;">01 Pasta com elástico</span><span> </span></span></span></span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl28"><span style="font-family: Arial; color: #000000; font-size: x-small;"><span style="font-weight: normal;">01 Tesoura escolar (Tramontina ou Mundial)</span></span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl28"><span style="font-family: Arial; color: #000000; font-size: x-small;"><span style="font-weight: normal;">01 Dicionário de Português - (Sugestão: Aurélio)</span></span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl28"><span style="font-size: x-small;"><span style="color: #000000;"><span style="font-family: Arial;"><span style="font-weight: normal;">01 Dicionário de Inglês</span><span> </span></span></span></span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl26"><span style="font-family: Arial; color: #000000; font-size: x-small;"><span style="font-weight: normal;">01 Atlas geográfico ilustrado - Ed. Moderna</span></span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl26"><span style="font-family: Arial; color: #000000; font-size: x-small;"><span style="font-weight: normal;">01 Bíblia pequena ( Sugestão: linguagem de hoje)</span></span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl26"><span style="font-family: Arial; color: #000000; font-size: x-small;"> </span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl28"><span style="font-family: Arial; color: #000000; font-size: x-small;"> </span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl29"><strong><span style="font-family: Arial; color: #000000; font-size: x-small;">MATERIAL MATEMÁTICA</span></strong></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl27"><span style="font-family: Arial; color: #000000; font-size: x-small;"><span style="font-weight: normal;">Calculadora simples</span></span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl27"><span style="font-family: Arial; color: #000000; font-size: x-small;"><span style="font-weight: normal;">01 Régua 30cm</span></span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl27"><span style="font-family: Arial; color: #000000; font-size: x-small;"> </span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl29"><strong><span style="font-family: Arial; color: #000000; font-size: x-small;">MATERIAL ARTE</span></strong></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl24"><span style="font-family: Arial; color: #000000; font-size: x-small;"><span style="font-weight: normal;">01 Pincel nº 14 (Tigre)</span></span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl24"><span style="font-family: Arial; color: #000000; font-size: x-small;"><span style="font-weight: normal;">01 Pincel nº 10 (Tigre)</span></span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl28"><span style="font-family: Arial; color: #000000; font-size: x-small;"><span style="font-weight: normal;">01 caixa de lápis de cor aquarelado - Faber Castell</span></span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl28"><span style="font-family: Arial; color: #000000; font-size: x-small;"><span style="font-weight: normal;">01 estojo de canetinha</span></span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl28"><span style="font-family: Arial; color: #000000; font-size: x-small;"><span style="font-weight: normal;">01 Lápis HB</span></span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl28"><span style="font-family: Arial; color: #000000; font-size: x-small;"><span style="font-weight: normal;">01 Lápis 6B Regent 1250 - Faber Castell</span></span></td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<span style="font-family: Arial;"> </span></span></strong>\r\n<p> </p>\r\n<p><strong><span style="font-family: Arial; color: #000000; font-size: x-small;">LISTA DE MATERIAIS - 7o ANO/ 6a SÉRIE</span></strong></p>\r\n</td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl27"><span style="font-family: Arial; color: #000000; font-size: x-small;">06 cadernos<span> </span>de 60fls– Português/ Matemática/ Ciências/ Geografia/ História/ Inglês.</span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl27"><span style="font-family: Arial; color: #000000; font-size: x-small;">03 cadernos<span> </span>de 40fls - Ed. Física/ Educação Cristã / Artes.</span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl28"><span style="font-family: Arial; color: #000000; font-size: x-small;">01 Pasta com elástico</span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl28"><span style="font-family: Arial; color: #000000; font-size: x-small;">01 Tesoura escolar (Tramontina ou Mundial)</span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl28"><span style="font-family: Arial; color: #000000; font-size: x-small;">01 Dicionário de Português -<span> </span>(Sugestão: Aurélio)</span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl28"><span style="font-size: x-small;"><span style="color: #000000;"><span style="font-family: Arial;">01 Dicionário de Inglês<span> </span></span></span></span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl26"><span style="font-family: Arial; color: #000000; font-size: x-small;">01 Atlas geográfico ilustrado - Ed. Moderna</span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl28"><span style="font-family: Arial; color: #000000; font-size: x-small;"> </span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl29"><strong><span style="font-family: Arial; color: #000000; font-size: x-small;">MATERIAL MATEMÁTICA</span></strong></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl27"><span style="font-family: Arial; color: #000000; font-size: x-small;">Calculadora simples</span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl27"><span style="font-family: Arial; color: #000000; font-size: x-small;">01 Régua 30cm</span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl27"><span style="font-family: Arial; color: #000000; font-size: x-small;"> </span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl29"><strong><span style="font-family: Arial; color: #000000; font-size: x-small;">MATERIAL ARTE</span></strong></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl24"><span style="font-family: Arial; color: #000000; font-size: x-small;">01 Pincel nº 14 (Tigre)</span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl24"><span style="font-family: Arial; color: #000000; font-size: x-small;">01 Pincel nº 10 (Tigre)</span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl28"><span style="font-family: Arial; color: #000000; font-size: x-small;">01 caixa de lápis de cor aquarelado - Faber Castell</span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl28"><span style="font-family: Arial; color: #000000; font-size: x-small;">01 estojo de canetinha</span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl28"><span style="font-family: Arial; color: #000000; font-size: x-small;">01 Lápis HB</span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl28"><span style="font-family: Arial; color: #000000; font-size: x-small;">01 Lápis 6B Regent 1250 - Faber Castell</span></td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p> </p>\r\n<p> </p>\r\n<table style="border-collapse: collapse; width: 443px; height: 376px;" cellpadding="0" cellspacing="0" border="0">\r\n<tbody>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="border: 0.5pt solid windowtext; width: 429pt; height: 12.75pt; background-color: transparent;" height="17" width="572" class="xl25"><strong><span style="font-family: Arial; color: #000000; font-size: x-small;">LISTA DE MATERIAIS - 8o ANO/ 7a SÉRIE</span></strong></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl27"><span style="font-family: Arial; color: #000000; font-size: x-small;">06 cadernos<span> </span>de 60fls– Português/ Matemática/ Ciências/ Geografia/ História/ Inglês.</span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl27"><span style="font-family: Arial; color: #000000; font-size: x-small;">03 cadernos<span> </span>de 40fls - Ed. Física/ Educação Cristã / Artes.</span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl28"><span style="font-family: Arial; color: #000000; font-size: x-small;">01 Pasta com elástico</span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl28"><span style="font-family: Arial; color: #000000; font-size: x-small;">01 Tesoura escolar (Tramontina ou Mundial)</span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl28"><span style="font-family: Arial; color: #000000; font-size: x-small;">01 Dicionário de Português -<span> </span>(Sugestão: Aurélio)</span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl28"><span style="font-size: x-small;"><span style="color: #000000;"><span style="font-family: Arial;">01 Dicionário de Inglês<span> </span></span></span></span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl26"><span style="font-family: Arial; color: #000000; font-size: x-small;">01 Atlas geográfico ilustrado - Ed. Moderna</span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl28"><span style="font-family: Arial; color: #000000; font-size: x-small;"> </span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl29"><strong><span style="font-family: Arial; color: #000000; font-size: x-small;">MATERIAL MATEMÁTICA</span></strong></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl27"><span style="font-family: Arial; color: #000000; font-size: x-small;">Calculadora simples</span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl27"><span style="font-family: Arial; color: #000000; font-size: x-small;">01 Compasso</span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl27"><span style="font-family: Arial; color: #000000; font-size: x-small;">01 Transferidor(180º)</span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl27"><span style="font-family: Arial; color: #000000; font-size: x-small;">01 Régua 30cm</span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl27"><span style="font-family: Arial; color: #000000; font-size: x-small;"> </span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl29"><strong><span style="font-family: Arial; color: #000000; font-size: x-small;">MATERIAL ARTE</span></strong></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl24"><span style="font-family: Arial; color: #000000; font-size: x-small;">01 Pincel nº 14 (Tigre)</span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl24"><span style="font-family: Arial; color: #000000; font-size: x-small;">01 Pincel nº 10 (Tigre)</span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl28"><span style="font-family: Arial; color: #000000; font-size: x-small;">01 caixa de lápis de cor aquarelado - Faber Castell</span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl28"><span style="font-family: Arial; color: #000000; font-size: x-small;">01 estojo de canetinha</span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl28"><span style="font-family: Arial; color: #000000; font-size: x-small;">01 Lápis HB</span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl28"><span style="font-family: Arial; color: #000000; font-size: x-small;">01 Lápis 6B Regent 1250 - Faber Castell</span></td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p> </p>\r\n<p> </p>\r\n<table style="border-collapse: collapse; width: 444px; height: 342px;" cellpadding="0" cellspacing="0" border="0">\r\n<tbody>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="border: 0.5pt solid windowtext; width: 429pt; height: 12.75pt; background-color: transparent;" height="17" width="572" class="xl25"><strong><span style="font-family: Arial; color: #000000; font-size: x-small;">LISTA DE MATERIAIS - 9o ANO/ 8a SÉRIE</span></strong></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl27"><span style="font-family: Arial; color: #000000; font-size: x-small;">06 cadernos<span> </span>de 60fls– Português/ Matemática/ Ciências/ Geografia/ História/ Inglês.</span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl27"><span style="font-family: Arial; color: #000000; font-size: x-small;">03 cadernos<span> </span>de 40fls - Ed. Física/ Educação Cristã / Artes.</span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl28"><span style="font-family: Arial; color: #000000; font-size: x-small;">01 Pasta com elástico</span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl28"><span style="font-family: Arial; color: #000000; font-size: x-small;">01 Tesoura escolar (Tramontina ou Mundial)</span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl28"><span style="font-family: Arial; color: #000000; font-size: x-small;">01 Dicionário de Português -<span> </span>(Sugestão: Aurélio)</span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl28"><span style="font-size: x-small;"><span style="color: #000000;"><span style="font-family: Arial;">01 Dicionário de Inglês<span> </span></span></span></span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl26"><span style="font-family: Arial; color: #000000; font-size: x-small;">01 Atlas geográfico ilustrado - Ed. Moderna</span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl28"><span style="font-family: Arial; color: #000000; font-size: x-small;"> </span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl29"><strong><span style="font-family: Arial; color: #000000; font-size: x-small;">MATERIAL MATEMÁTICA</span></strong></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl27"><span style="font-family: Arial; color: #000000; font-size: x-small;">Calculadora simples</span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl27"><span style="font-family: Arial; color: #000000; font-size: x-small;">01 Régua 30cm</span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl27"><span style="font-family: Arial; color: #000000; font-size: x-small;"> </span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl29"><strong><span style="font-family: Arial; color: #000000; font-size: x-small;">MATERIAL ARTE</span></strong></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl24"><span style="font-family: Arial; color: #000000; font-size: x-small;">01 Pincel nº 14 (Tigre)</span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl24"><span style="font-family: Arial; color: #000000; font-size: x-small;">01 Pincel nº 10 (Tigre)</span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl28"><span style="font-family: Arial; color: #000000; font-size: x-small;">01 caixa de lápis de cor aquarelado - Faber Castell</span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl28"><span style="font-family: Arial; color: #000000; font-size: x-small;">01 estojo de canetinha</span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl28"><span style="font-family: Arial; color: #000000; font-size: x-small;">01 Lápis HB</span></td>\r\n</tr>\r\n<tr style="height: 12.75pt;" height="17">\r\n<td style="height: 12.75pt; background-color: transparent; border: medium 0.5pt 0.5pt none solid solid windowtext;" height="17" class="xl28"><span style="font-family: Arial; color: #000000; font-size: x-small;">01 Lápis 6B Regent 1250 - Faber Castell</span></td>\r\n</tr>\r\n</tbody>\r\n</table>', '', 1, 15, 0, 33, '2007-12-17 14:17:43', 68, '', '2009-06-18 13:03:51', 62, 0, '0000-00-00 00:00:00', '2007-12-17 14:15:03', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 39, 0, 3, '', '', 0, 726, 'robots=\nauthor=');
INSERT INTO `jos_content` (`id`, `title`, `alias`, `title_alias`, `introtext`, `fulltext`, `state`, `sectionid`, `mask`, `catid`, `created`, `created_by`, `created_by_alias`, `modified`, `modified_by`, `checked_out`, `checked_out_time`, `publish_up`, `publish_down`, `images`, `urls`, `attribs`, `version`, `parentid`, `ordering`, `metakey`, `metadesc`, `access`, `hits`, `metadata`) VALUES
(135, 'Formatura Pré-escola 2007', 'formatura-pre-escola-2007', '', '<img border="0" hspace="6" src="images/stories/chamadinha form pre.jpg" align="left" />NO dia 12 de Dezembro  os alunos da Pré-escola ecerraram o ano com muita  alegria e várias homenagens.  <a href="index.php?option=com_phocagallery&view=category&id=44:formatura-pre-escola-2008&Itemid=20">Confira!!!</a>', '', 1, 1, 0, 1, '2007-12-21 11:27:46', 68, '', '2009-06-17 12:00:55', 62, 0, '0000-00-00 00:00:00', '2007-12-21 11:23:58', '0000-00-00 00:00:00', 'chamadinha form pre.jpg', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 7, 0, 17, '', '', 0, 259, 'robots=\nauthor='),
(136, 'Posse Vereador Mirim 2008', 'posse-vereador-mirim-2008', '', '<img align="left" src="images/stories/chamadinha vereador mirin.jpg" hspace="6" border="0" />Neste  dia 18 de fevereiro a aluna Anne Cristine  tomou posse do Cargo de Vereador Mirim 2008.  Parabéns Anne!!!   Você é muito importante para a nossa escola!<br /><a href="index.php?option=com_phocagallery&amp;view=category&amp;id=21:vereador-mirin-2008&amp;Itemid=20">Confira as fotos!</a>\r\n<p> </p>', '', 1, 1, 0, 1, '2008-02-27 17:33:18', 68, '', '2009-06-17 11:59:30', 62, 0, '0000-00-00 00:00:00', '2008-02-27 17:23:04', '0000-00-00 00:00:00', 'chamadinha vereador mirin.jpg', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 5, 0, 16, '', '', 0, 108, 'robots=\nauthor='),
(137, 'Projeto Éden Day', 'projeto-eden-day', '', '<div class="quote-grey">\r\n<blockquote>Do solo Deus fez brotar toda a sorte de árvores agradáveis à vista e boas para alimento; e também a árvore da vida nomeio do jardim, árvore do conhecimento do bem e do mal - Gênesis 2:9</blockquote>\r\n</div>\r\n<br />\r\n<div>Nossos alunos passarão uma vez por semana um período na Sede de Campo, onde irão desfrutar de momento agradáveis com atividades de Educação Física, Horta, Meio Ambiente, Lanche e Parque. O transporte será monitorado pela escola.</div>\r\n<div></div>\r\n<div>Por que Éden Day?</div>\r\n<div></div>\r\n<div>Porque Éden quer dizer “Lugar protegido e Refúgio agradável”, assim isto poderá ser desfrutado pelos alunos na Sede de Campo.O Éden é um local de refúgio agradável que tem tudo o que o homem precisa: ALIMENTO, BELEZA, ÁGUA, COMPANHIA DE DEUS E COMPANHERISMO HUMANO.</div>\r\n<div></div>\r\n<br />\r\n<div><a href="index.php?option=com_phocagallery&amp;view=category&amp;id=11:projeto-eden-day&amp;Itemid=58">Clique aqui para ver as fotos do Projeto!!</a></div>', '', 1, 8, 0, 30, '2008-03-27 11:41:19', 68, '', '2009-06-18 16:25:43', 62, 0, '0000-00-00 00:00:00', '2008-03-27 11:31:54', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 18, 0, 7, '', '', 0, 115, 'robots=\nauthor='),
(138, 'Projeto Orem Sempre', 'projeto-orem-sempre', '', '<br />\r\n<div class="quote-grey">\r\n<blockquote>... em todas as orações peçam a Deus e sempre orem com o coração agradecido - Filipenses 4:6</blockquote>\r\n</div>\r\n<p><br /><strong>Para refletir:<br /><br /> </strong> As crianças têm uma capacidade muito particular de unir-se a Deus. Porém, é necessário ensinar-lhes a rotina de reservar algum tempo para falar com Ele. Quanto tempo reservamos para atividades e brincadeiras durante o período de aula? Por que não reservar um momento para a oração do início das aulas, na hora do lanche e na hora da saída? Além do mais, podemos incentivar às crianças a fazer uma oração antes de dormir, com os familiares, no final de semana, por exemplo. Agora é a hora de ensinar as crianças a orar, começando por dar-lhes o bom exemplo! O compromisso é com Deus... Diariamente...</p>\r\n<p> </p>\r\n', '\r\n<div>Durante a roda de conversa no início da aula, haverá Oração inicial, pedindo a Deus uma manhã/tarde tranqüila, de descobertas e aprendizagens, com bom comportamento de todos, obediência, paciência... e conforme as necessidades que se percebe na sala...</div>\r\n<div>Oração antes das refeições, para agradecer a Deus o alimento de cada dia.</div>\r\n<div>Durante a roda de conversa no final da aula, haverá Oração final, agradecendo pela manhã/tarde que tiveram.</div>\r\n<div>Quinzanalmente...</div>\r\n<div>Duas vezes por mês, determinada turma será responsável por uma oração e uma apresentação de história que será contada através de um teatro, dramatização, dança... Sempre utilizando alguma ferramenta de apoio, que chame a atenção das crianças. Ficará a critério da turma, desde que seja bastante criativa e que toque, de fato, o coração de quem estiver assistindo.</div>\r\n<div></div>\r\n<br />\r\n<div class="quote-grey">\r\n<blockquote>Ponha sua vida nas mãos do Deus Eterno, confie nele, e ele o ajudará. - Salmo 37:5</blockquote>\r\n</div>\r\n<br /><br />\r\n<div><a href="index.php?option=com_phocagallery&amp;view=category&amp;id=12:projeto-orem-sempre&amp;Itemid=58">Clique  aqui para ver as fotos do Projeto!</a></div>', 1, 8, 0, 30, '2008-03-27 13:54:15', 68, '', '2009-06-18 16:25:08', 62, 0, '0000-00-00 00:00:00', '2008-03-27 13:53:54', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 11, 0, 6, '', '', 0, 83, 'robots=\nauthor='),
(139, 'Passeio São Francisco', 'passeio-sao-francisco', '', '<img align="left" border="0" hspace="6" src="images/stories/chmadinha fort.jpg" />No dia 04 de abril, os alunos de 5ª a 8ª série realizaram um passeio de estudo para São Francisco do Sul. A Professora Milena trabalhou conteúdos explorados em sala de aula nas disciplinas de Ciências, Geografia e História, além de um momento de integração com os alunos. <a href="index.php?option=com_phocagallery&amp;view=category&amp;id=50:passeio-sao-francisco&amp;Itemid=20">Confira as fotos!</a>', '', 1, 1, 0, 1, '2008-04-09 12:59:08', 68, '', '2009-06-17 11:56:41', 62, 0, '0000-00-00 00:00:00', '2008-04-09 12:56:59', '0000-00-00 00:00:00', 'chmadinha fort.jpg', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 5, 0, 15, '', '', 0, 47, 'robots=\nauthor='),
(140, 'Eu, Você, Nós...', 'eu-voce-nos', '', '<div><br /><strong>Período: 18/02 a 14/03</strong></div>\r\n<br />\r\n<div class="quote-grey">\r\n<blockquote>Porque foi Deus quem nos fez... - Efésios 2:10a</blockquote>\r\n</div>\r\n<br />\r\n<div>“Eu, você, nós..." partiu do tema da formação da identidade, buscando levar a criança a perceber-se como indivíduo, a situar-se, a aprender a diferenciar seus gostos e opiniões e, progressivamente, a compreender e respeitar a existência do outro, sempre dentro dos Princípios da Educação Cristã.</div>\r\n<div>\r\n', '\r\n</div>\r\n<div>A identidade se molda nos limites das outras referências que nos constituem. Ao mesmo tempo, somos nós, mas também nossos pais, nossos amigos, nossas experiências, ou seja, nos constituímos a partir de nossas relações.A participação de toda família nas atividades propostas foi muito importante, pois cada uma pôde se envolver ainda mais com as descobertas de seus filhos. <br /><br /><a href="index.php?option=com_phocagallery&amp;view=category&amp;id=13:projeto-eu-voce-nos...&amp;Itemid=58">Confira as fotos!!</a></div>\r\n<div></div>\r\n<div></div>', 1, 8, 0, 30, '2008-04-09 16:58:12', 68, '', '2009-06-18 15:52:43', 62, 0, '0000-00-00 00:00:00', '2008-04-09 16:55:15', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 17, 0, 5, '', '', 0, 179, 'robots=\nauthor='),
(141, 'Dia Do Disfarce...', 'dia-do-disfarce', '', '<img src="images/stories/chamadinha dia do disfarce.jpg" hspace="6" alt="" title="" border="0" align="left" />Os alunos do Jardim 2 da Professora Patr&iacute;cia fizeram muita festa no dia do disfarce....fantasiados passaram por toda a escola, tentando n&atilde;o serem reconhecidos...O objetivo maior desta atividade foi mostrar para as crian&ccedil;as que para Deus n&atilde;o adianta nem disfarce...ele nos conhece at&eacute; fantasiados...<a href="index.php?option=com_phocagallery&view=category&id=17:dia-do-disfarce&Itemid=20">Veja as fotos!!!</a>', '', 1, 1, 0, 1, '2008-04-09 17:40:21', 68, '', '2009-06-17 11:53:18', 62, 0, '0000-00-00 00:00:00', '2008-04-09 17:34:09', '0000-00-00 00:00:00', 'chamadinha dia do disfarce.jpg', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 4, 0, 14, '', '', 0, 132, 'robots=\nauthor='),
(142, 'Piquenique  da 1ª série na Sede  de Campo', 'piquenique-da-1o-serie-na-sede-de-campo', '', '<img border="0" hspace="6" src="images/stories/chamadinha piquenique.jpg" align="left" /> Com alegria a 1ªs  séries das Professoras Daiane e Vanessa  exploraram a sua lista de piquenique. Cada aluno teve a sua contribuição e o momento da partilha foi na sede de campo...<a href="index.php?option=com_phocagallery&view=category&id=43:piquenique-1as-series-na-sede-de-campo&Itemid=20">Confira as fotos!!!</a>', '', 1, 1, 0, 1, '2008-04-10 09:59:32', 68, '', '2009-06-17 11:51:55', 62, 0, '0000-00-00 00:00:00', '2008-04-10 09:55:46', '0000-00-00 00:00:00', 'chamadinha piquenique.jpg', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 7, 0, 13, '', '', 0, 187, 'robots=\nauthor='),
(143, 'A Família Que Deus Me Deu', 'a-familia-que-deus-me-deu', '', '<div><br /><strong>Período: 24/03 a 11/04 </strong></div>\r\n<br />\r\n<div class="quote-grey">\r\n<blockquote>Tenham muitos e muitos filhos; espalhem-se por toda a terra e a dominem. - Gênesis 1:28</blockquote>\r\n</div>\r\n<br />\r\n<div>Após criar Adão e Eva, Deus os uniu como marido e mulher, abençoou-os e então lhes disse: “Tenham muitos e muitos filhos; espalhem-se por toda a terra e a dominem.” Era propósito de Deus que a Terra fosse povoada com seres criados à Sua própria imagem, compondo famílias que trariam glória a Ele (Isaías 45:18).<br />\r\n', '\r\n</div>\r\n<div>A família é o princípio da sociedade. E a família cristã é aquela em que Deus é reconhecido como objeto supremo de adoração. Ele é a cabeça, protetor, guia e instrutor de famílias assim. A família também é escola e seus membros são professores e alunos que compartilham conhecimento e aprendem uns com os outros. A Palavra de Deus deve ser a principal fonte de instrução na escola da família (Deuteronômio 6:4-9; Salmo 128:1-6).<br />Este será o momento em que a criança relatará a posição de cada familiar, os acontecimentos marcantes em sua presença e também momentos de lazer, hábitos alimentares, preferências, costumes...</div>\r\n<div></div>\r\n<div><a href="index.php?option=com_phocagallery&amp;view=category&amp;id=14:a-familia-que-deus-me-deu&amp;Itemid=20">Confira as fotos!</a></div>', 1, 8, 0, 30, '2008-04-10 10:23:55', 68, '', '2009-06-18 15:43:36', 62, 0, '0000-00-00 00:00:00', '2008-04-10 10:22:09', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 11, 0, 4, '', '', 0, 166, 'robots=\nauthor='),
(144, 'Quem Faz O Que?', 'quem-faz-o-que', '', '<div></div>\r\n<div><br /><strong>Período: 14/04 a 02/05</strong></div>\r\n<br />\r\n<div class="quote-grey">\r\n<blockquote>E também que todo o homem coma e beba, e goze do bem de todo o seu trabalho; isto é um dom de Deus - Eclesiastes 3:13</blockquote>\r\n</div>\r\n<br />\r\n<div>O projeto visa ampliar o repertório das crianças sobre as profissões. Será o momento das crianças falar sobre as profissões que conhecem, principalmente a dos pais, e outras ocupações que gostam. Alguns tópicos a ser explorados:</div>\r\n', '\r\n<div class="quote-grey">\r\n<blockquote>Por acaso Ele não é o filho do carpinteiro? Mateus 13:55. O pai de Jesus era carpinteiro. E o seu?</blockquote>\r\n</div>\r\n<br />\r\n<ul>\r\n<li><span style="line-height: 24px;">Pesquisa com o pai e mãe sobre suas profissões.</span></li>\r\n<li><span style="line-height: 24px;">Mostrar à criança como as profissões se articulam e como TODAS são importantes para o bom funcionamento da sociedade.</span></li>\r\n<li><span style="line-height: 24px;">O que quero ser quando crescer?</span></li>\r\n</ul>\r\n<p>Tem gente que não gosta de nenhum tipo de trabalho...</p>\r\n<br />\r\n<div class="quote-grey">\r\n<blockquote>Preguiçoso, aprenda uma lição com as formigas! Elas não tem líder, nem chefe, nem governador, mas guardam comida no verão, preparando-se para o inverno. - Provérbios 6:6-8</blockquote>\r\n</div>', 1, 8, 0, 30, '2008-04-23 11:02:22', 68, '', '2009-06-18 15:11:34', 62, 0, '0000-00-00 00:00:00', '2008-04-23 11:00:56', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 5, 0, 3, '', '', 0, 279, 'robots=\nauthor='),
(145, 'Planeta Terra: Nossa Casa', 'planeta-terra-nossa-casa', '', '<div></div>\r\n<div></div>\r\n<div><strong>Período: 12/05 a 13/06</strong></div>\r\n<div><strong><br /></strong></div>\r\n<div></div>\r\n<div class="quote-grey">\r\n<blockquote>No começo Deus criou os céus e a terra - Gênesis 1:1</blockquote>\r\n</div>\r\n<br />\r\n<div>Esta semana iniciaremos o projeto “Planeta Terra: nossa casa” e contaremos a história da criação do mundo em partes, durante cinco semanas, explorando os temas a seguir:</div>\r\n<div>\r\n', '\r\n</div>\r\n<div></div>\r\n<div></div>\r\n<div>\r\n<ul class="checklist">\r\n<li>Dia e noite</li>\r\n<li>Céu  e terra</li>\r\n<li>Terra e mar</li>\r\n<li>Frutas/Árvores frutíferas/verduras/ervas...</li>\r\n<li>Dias, meses, anos (calendário, aniversários)</li>\r\n<li>Estações do ano: primavera, verão, outono e inverno</li>\r\n<li>Sol, Lua e estrelas</li>\r\n<li>Seres vivos do mar</li>\r\n<li>Aves</li>\r\n<li>Animais domésticos</li>\r\n<li>Animais selvagens</li>\r\n<li>Animais em extinção</li>\r\n<li>Meio ambiente: como já sabemos, Deus criou o mundo. Mas o que está acontecendo com ele? O que podemos fazer para não destruir o mundo perfeito que Deus criou?</li>\r\n<li>Poluição – ar, água</li>\r\n<li>Lixo – reciclagem</li>\r\n<li>Queimadas</li>\r\n<li>Tóxicos nos alimentos</li>\r\n<li>Aquecimento global</li>\r\n</ul>\r\n</div>\r\n<div></div>\r\n<div></div>\r\n<div>Dentro deste projeto trabalharemos um dos Sete Princípios Cristãos: a Mordomia, que é cuidar das coisas que Deus criou e nos deu. Ele nos confiou a responsabilidade de desfrutar e administrar os recursos naturais.</div>\r\n<div></div>\r\n<div></div>\r\n<div></div>\r\n<div class="quote-grey">\r\n<blockquote>E tomou o SENHOR Deus o homem, e o pôs no jardim do Éden para o lavrar e o guardar - Gênesis 2:15</blockquote>\r\n</div>\r\n<div></div>\r\n<div></div>\r\n<div></div>\r\n<div></div>\r\n<div><a href="index.php?option=com_phocagallery&amp;view=category&amp;id=15:planeta-terra-nossa-casa&amp;Itemid=58">Confira as fotos!</a></div>', 1, 8, 0, 30, '2008-05-29 10:42:43', 68, '', '2009-06-18 15:03:05', 62, 0, '0000-00-00 00:00:00', '2008-05-29 10:41:25', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 5, 0, 2, '', '', 0, 215, 'robots=\nauthor='),
(146, 'FESTA DA COLHEITA 2008', 'festa-da-colheita-2008', '', '<img style="float: left; margin-right: 6px;" alt="festa da colheita" src="images/phocagallery/CMOGBU/thumbs/phoca_thumb_m_maquina_1085.jpg" />Durante o mês de Junho foi trabalhado com os alunos Exodo 23:16 onde o povo celebrou a colheita dos frutos que haviam semeado...No dia 22 de Junho realizamos a nossa tradicional FESTA  n<span style="language: PT-BR">o Centro de Esportes Schulze. Houve </span><span style="language: PT-BR">muitas brincadeiras, pescaria,</span><span style="language: PT-BR"> fogueira,</span><span style="language: PT-BR"> comida,  música e apresentação de danças e quadrilhas.</span><span style="language: PT-BR"> <a href="index.php?option=com_phocagallery&amp;view=category&amp;id=23:festa-da-colheita-2008&amp;Itemid=20">Confira!!!</a></span><span style="language: PT"><a href="component/option,com_zoom/Itemid,99999999/catid,105/"> </a></span>', '', 1, 1, 0, 1, '2008-06-27 17:48:19', 68, '', '2009-06-17 11:48:23', 62, 0, '0000-00-00 00:00:00', '2008-06-27 17:27:14', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 3, 0, 12, '', '', 0, 242, 'robots=\nauthor='),
(147, 'Orem Sempre', 'orem-sempre', '', '<img style="float: left; margin-right: 6px;" alt="pray2" height="182" width="150" src="images/stories/pray2.jpg" />As crianças têm uma capacidade muito particular de unir-se a Deus. Porém, é necessário ensinar-lhes a rotina de reservar algum tempo para falar com Ele. Quanto tempo reservamos para atividades e brincadeiras durante o período de aula? Por que não reservar um momento para a oração do início das aulas, na hora do lanche e na hora da saída? Além do mais, podemos incentivar às crianças a fazer uma oração antes de dormir, com os familiares, no final de semana, por exemplo. Agora é a hora de ensinar as crianças a orar, começando por dar-lhes o bom exemplo! O compromisso é com Deus...<a href="index.php?option=com_phocagallery&amp;view=category&amp;id=12:projeto-orem-sempre&amp;Itemid=20">Confira as fotos deste Projeto!!!</a>', '', 1, 1, 0, 1, '2008-07-04 11:34:37', 68, '', '2009-06-17 05:06:17', 62, 0, '0000-00-00 00:00:00', '2008-07-04 11:33:22', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 4, 0, 11, '', '', 0, 155, 'robots=\nauthor='),
(148, 'Manhã de Autógrafos e Dia de professor na 4ª série', 'manha-de-autografos-e-dia-de-professor-na-4o-serie', '', '<img style="float: left; margin-right: 6px;" alt="draw" height="48" width="48" src="images/stories/draw.png" />Os alunos da 4 série eleitos por melhor texto tiveram  direito à Manhã de Autógrafos...outros atuaram no dia de Professor, onde puderam sentir a responsabilidade que a função exige. <a href="index.php?option=com_phocagallery&amp;view=category&amp;id=8:projetos&amp;Itemid=20">Confira as fotos dos Projetos!!</a>', '', 1, 1, 0, 1, '2008-07-04 15:50:16', 68, '', '2009-06-17 05:03:05', 62, 0, '0000-00-00 00:00:00', '2008-07-04 15:39:19', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 3, 0, 10, '', '', 0, 197, 'robots=\nauthor='),
(149, 'Minha casa é construída na rocha!', 'minha-casa-e-construida-na-rocha', '', '<div></div>\r\n<div><strong>Período: 23/06 a 11/07</strong></div>\r\n<br />\r\n<div></div>\r\n<div></div>\r\n<div class="quote-grey">\r\n<blockquote>Quem ouve meus ensinamentos e vive de acordo com eles é como um homem que constrói sua casa na rocha. - Samuel 25:6</blockquote>\r\n</div>\r\n<br />\r\n<div>A casa constitui o espaço de influência mais próxima e natural da criança. Cada casa é como um reino, onde a criança alicerça seu desenvolvimento, onde se sente segura, amada e protegida. Por isso, a escola parte desta realidade a fim de estabelecer relações educativas, no intuito de provocar às crianças a descobrir novas formas de olhar para aquilo que já conhecem.</div>', '', 1, 8, 0, 30, '2008-08-18 13:36:28', 68, '', '2009-06-18 15:01:52', 62, 0, '0000-00-00 00:00:00', '2008-08-18 13:34:30', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 4, 0, 1, '', '', 0, 155, 'robots=\nauthor='),
(150, 'Feira de Ciências 2008', 'feira-de-ciencias-2008', '', '<img border="0" hspace="6" src="images/stories/chamadinha.jpg" align="left" />Nossa Feira este ano foi muito explorada por todos os alunos. Com o Tema: "SUSTENTABILIDADE,  uma questão de sobrevivência", aprendemos e ensinamos muito!<a href="index.php?option=com_phocagallery&view=category&id=30:feira-de-ciencias-2008&Itemid=20"> Confira!!!</a>', '', 1, 1, 0, 1, '2008-11-05 16:22:35', 68, '', '2009-06-17 04:56:51', 62, 0, '0000-00-00 00:00:00', '2008-11-05 16:18:37', '0000-00-00 00:00:00', 'chamadinha.jpg', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 6, 0, 9, '', '', 0, 90, 'robots=\nauthor='),
(151, 'Encerramento  Juarez Machado 2008', 'encerramento-juarez-machado-2008', '', '<img src="images/phocagallery/BVHCDK/thumbs/phoca_thumb_m_dsc01601.jpg" alt="encerramento_ballet" style="float: left; margin-right: 6px;" />A Professora Cristiane Brenny no dia 15 de Novembro  realizou o musical A Fantástica Fábrica de Brinquedos. As modalidades Ballet, Jazz e Patinação fizeram parte do evento. <a href="index.php?option=com_phocagallery&amp;view=category&amp;id=20:encerramento-juarez-machado-2008&amp;Itemid=20">Confira!!!</a>', '', 1, 1, 0, 1, '2008-12-16 15:40:29', 68, '', '2009-06-17 04:55:49', 62, 0, '0000-00-00 00:00:00', '2008-12-16 15:27:32', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 9, 0, 8, '', '', 0, 27, 'robots=\nauthor='),
(152, 'Passeio 6º  e 7º Ano Hotel Fazenda Dona Francisca', 'passeio-6o-e-7o-ano-hotel-fazenda-dona-francisca', '', '<img src="images/stories/chamada passeio 6 seire.jpg" hspace="6" alt="" title="" border="0" align="left" />Os alunos do 6&ordm; e 7&ordm; anos do Fundamental divertiram-se muito neste dia de 01 de Dezembro...apesar das chuvas de todo o m&ecirc;s, os alunos aproveitaram muito o dia onde o sol voltou a brilhar. <a href="index.php?option=com_phocagallery&view=category&id=49:passeio-6a-e-7o-ano-hotel-fazenda&Itemid=20">Confira as fotos!!!</a>', '', 1, 1, 0, 1, '2008-12-16 17:46:27', 68, '', '2009-06-17 04:47:46', 62, 0, '0000-00-00 00:00:00', '2008-12-16 17:42:02', '0000-00-00 00:00:00', 'chamada passeio 6 seire.jpg', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 7, 0, 7, '', '', 0, 126, 'robots=\nauthor='),
(153, 'Formatura 8ª série', 'formatura-8o-serie', '', '<img src="images/stories/chamainha.jpg" hspace="6" alt="chamainha" title="chamainha" border="0" align="left" />No dia 10 de Dezembro aconteceu a Formatura da 8&ordf; s&eacute;rie. Professores, alunos, coordena&ccedil;&otilde;es e familiares compartilharam esta inicial conquista de muitas que ainda vir&atilde;o...A base foi bem edificada, agora basta seguir. Parab&eacute;ns amados alunos!!! <a href="index.php?option=com_phocagallery&view=category&id=47:formatura-8a-serie-2008&Itemid=20">Confira as fotos!!!</a>', '', 1, 1, 0, 1, '2008-12-17 09:27:10', 68, '', '2009-06-17 04:46:51', 62, 0, '0000-00-00 00:00:00', '2008-12-17 09:23:28', '0000-00-00 00:00:00', 'chamainha.jpg', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 5, 0, 6, '', '', 0, 105, 'robots=\nauthor='),
(154, 'Formatura Pré-escola 2008', 'formatura-pre-escola-2008', '', '<img border="0" hspace="6" src="images/stories/chamadinha pre2008.jpg" align="left" />No dia 10 de Dezembro alunos da Pré-escola comemoraram a conquista da fase tão fascinante que é a leitura e a escrita...Alunos, professores a familiares participaram da cerimônia. <a href="index.php?option=com_phocagallery&view=category&id=44:formatura-pre-escola-2008&Itemid=20">Confira as fotos!!!</a>', '', 1, 1, 0, 1, '2008-12-17 09:57:07', 68, '', '2009-06-17 04:45:09', 62, 0, '0000-00-00 00:00:00', '2008-12-17 09:54:22', '0000-00-00 00:00:00', 'chamadinha pre2008.jpg', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 5, 0, 5, '', '', 0, 126, 'robots=\nauthor='),
(155, 'Encerramento Geral 2008', 'encerramento-geral-2008', '', '<img alt="encerramento" style="float: left; margin-right: 6px; margin-left: 6px;" src="images/stories/chamada encerramento.jpg" />No dia 11 de Dezembro encerramos o ano com  a Festa  da Família no Recanto da Paz, onde foi servido um delicioso jantar, após as apresentações realizadas. Este  ano o grupo de Teatro da Oficina  arrasou com "Um Programa Especial de Natal". <a href="index.php?option=com_phocagallery&amp;view=category&amp;id=19:encerramento-geral-2008&amp;Itemid=20">Confira as fotos!!!</a>', '', 1, 1, 0, 1, '2008-12-18 00:52:26', 68, '', '2009-06-17 04:43:36', 62, 0, '0000-00-00 00:00:00', '2008-12-18 00:46:14', '0000-00-00 00:00:00', 'chamada encerramento.jpg', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 3, 0, 4, '', '', 0, 173, 'robots=\nauthor='),
(156, ' Confraternização Família Oficina dos Sonhos', '-confraternizacao-familia-oficina-dos-sonhos', '', '<p><img style="float: left; margin-right: 5px;" alt="dsc00511" height="90" width="120" src="images/stories/dsc00511.jpg" />Após um  ano de muito trabalho, fechamos o ano com um abençoado almoço no dia 13 Dezembro no Rancho Alegre, Águas do Piraí... Foi um dia de muito sol e harmonia entre as famílias do funcionários. A criançada curtiu pra valer!!! <a href="index.php?option=com_phocagallery&amp;view=category&amp;id=29:confraternizacao-familia-oficina-dos-sonhos&amp;Itemid=20">Confira as fotos!!!</a></p>', '', 1, 1, 0, 1, '2008-12-18 10:42:34', 68, '', '2009-06-17 04:39:50', 62, 0, '0000-00-00 00:00:00', '2008-12-18 10:37:18', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 7, 0, 3, '', '', 0, 244, 'robots=\nauthor='),
(157, 'Patati Patata levou alegria e diversão para  oficina', 'patati-patata-levou-alegria-e-diversao-para-oficina', '', '<img style="float: left; margin-right: 6px; margin-left: 6px;" alt="patati" src="images/stories/cham patati.jpg" />No dia 21 de Maio a dupla de palhaços Patati Patata divertiu todos na escola...alunos, professores, zeladoras... A alegria de ser criança contagiou o cenário na Oficina. <br /><a href="index.php?option=com_phocagallery&amp;view=category&amp;id=33:patati-patata-na-oficina&amp;Itemid=20">Confira!!!</a>', '', 1, 1, 0, 1, '2009-05-23 03:22:23', 68, '', '2009-06-17 04:31:33', 62, 0, '0000-00-00 00:00:00', '2009-05-23 03:18:08', '0000-00-00 00:00:00', 'cham patati.jpg', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 10, 0, 2, '', '', 0, 59, 'robots=\nauthor='),
(170, 'Calendário Educação Infantil 2009', 'calendario-educacao-infantil-2009', '', '<script>self.location="index.php?option=com_eventlist&view=categoryevents&id=1&Itemid=81";</script>', '', 1, 8, 0, 20, '2009-06-18 04:01:11', 62, '', '2009-07-14 15:04:31', 62, 0, '0000-00-00 00:00:00', '2009-06-18 04:01:11', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 3, 0, 3, '', '', 0, 16, 'robots=\nauthor='),
(169, 'Calendário Ensino Fundamental 2009', 'calendario-ensino-fundamental-2009', '', '<script>self.location="index.php?option=com_eventlist&view=categoryevents&id=2&Itemid=80";</script>', '', 1, 9, 0, 19, '2009-06-18 03:43:22', 62, '', '2009-07-14 15:07:07', 62, 0, '0000-00-00 00:00:00', '2009-06-18 03:43:22', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 4, 0, 6, '', '', 0, 10, 'robots=\nauthor=');

-- --------------------------------------------------------

--
-- Estrutura da tabela `jos_content_frontpage`
--

CREATE TABLE IF NOT EXISTS `jos_content_frontpage` (
  `content_id` int(11) NOT NULL default '0',
  `ordering` int(11) NOT NULL default '0',
  PRIMARY KEY  (`content_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `jos_content_frontpage`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `jos_content_rating`
--

CREATE TABLE IF NOT EXISTS `jos_content_rating` (
  `content_id` int(11) NOT NULL default '0',
  `rating_sum` int(11) unsigned NOT NULL default '0',
  `rating_count` int(11) unsigned NOT NULL default '0',
  `lastip` varchar(50) NOT NULL default '',
  PRIMARY KEY  (`content_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `jos_content_rating`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `jos_core_acl_aro`
--

CREATE TABLE IF NOT EXISTS `jos_core_acl_aro` (
  `id` int(11) NOT NULL auto_increment,
  `section_value` varchar(240) NOT NULL default '0',
  `value` varchar(240) NOT NULL default '',
  `order_value` int(11) NOT NULL default '0',
  `name` varchar(255) NOT NULL default '',
  `hidden` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `jos_section_value_value_aro` (`section_value`(100),`value`(100)),
  KEY `jos_gacl_hidden_aro` (`hidden`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=352 ;

--
-- Extraindo dados da tabela `jos_core_acl_aro`
--

INSERT INTO `jos_core_acl_aro` (`id`, `section_value`, `value`, `order_value`, `name`, `hidden`) VALUES
(10, 'users', '62', 0, 'Administrator', 0),
(351, 'users', '403', 0, 'Jaqueline schuster', 0),
(12, 'users', '64', 0, 'Dega Hosting', 0),
(13, 'users', '65', 0, 'Vanessa Caroline', 0),
(14, 'users', '66', 0, 'Rafael', 0),
(15, 'users', '67', 0, 'joa da silva', 0),
(16, 'users', '68', 0, 'Marcia Poletti', 0),
(17, 'users', '69', 0, 'Heitor Silva  F. da Rosa', 0),
(18, 'users', '70', 0, 'erica palma thomaz', 0),
(19, 'users', '71', 0, 'carolina jaroczinski', 0),
(20, 'users', '72', 0, 'Roebson', 0),
(21, 'users', '73', 0, 'Bianca Hreisemnou', 0),
(22, 'users', '74', 0, 'Mirian Regina Martins Pereira', 0),
(23, 'users', '75', 0, 'carolina miranda', 0),
(24, 'users', '76', 0, 'Iasmin Poffo', 0),
(25, 'users', '77', 0, 'Andreia Roman', 0),
(26, 'users', '78', 0, 'Paulo Rafael Kosak', 0),
(27, 'users', '79', 0, 'sd11111', 0),
(28, 'users', '80', 0, 'Ruler', 0),
(29, 'users', '81', 0, 'Rutinok', 0),
(30, 'users', '82', 0, 'Ruzinka', 0),
(31, 'users', '83', 0, 'man', 0),
(33, 'users', '85', 0, 'andressa', 0),
(34, 'users', '86', 0, 'Dumpster_space', 0),
(35, 'users', '87', 0, 'daniela', 0),
(36, 'users', '88', 0, 'Jandaia Ioná Lourenço Schatz', 0),
(37, 'users', '89', 0, 'mouse orgy', 0),
(38, 'users', '90', 0, 'Rebeca da  silva campos', 0),
(39, 'users', '91', 0, 'Mixomomp', 0),
(40, 'users', '92', 0, 'afriendf', 0),
(41, 'users', '93', 0, 'Caroline', 0),
(42, 'users', '94', 0, 'claudia de oliveira valerio', 0),
(43, 'users', '95', 0, 'adulffind', 0),
(44, 'users', '96', 0, 'lesbiansexpics007', 0),
(45, 'users', '97', 0, 'bigtitspics007', 0),
(46, 'users', '98', 0, 'viagrailasa', 0),
(47, 'users', '99', 0, 'bigboobspics007', 0),
(48, 'users', '100', 0, 'analsexpics007', 0),
(49, 'users', '101', 0, 'CheatMan', 0),
(50, 'users', '102', 0, 'hotgirlspics007', 0),
(51, 'users', '103', 0, 'uweeeman', 0),
(52, 'users', '104', 0, 'custommade53', 0),
(53, 'users', '105', 0, 'romromanov26', 0),
(54, 'users', '106', 0, 'ringguy53', 0),
(55, 'users', '107', 0, 'joshuaLA53', 0),
(56, 'users', '108', 0, 'blahblahblah53', 0),
(57, 'users', '109', 0, 'mynano884', 0),
(58, 'users', '110', 0, 'freexxxmovies12', 0),
(59, 'users', '111', 0, 'alabubupa', 0),
(60, 'users', '112', 0, 'Oxano4ka', 0),
(61, 'users', '113', 0, 'marcelo bepler junior', 0),
(62, 'users', '114', 0, 'andressa marchi', 0),
(63, 'users', '115', 0, 'Hentaiboy', 0),
(64, 'users', '116', 0, 'Lúcia Helena Ponick', 0),
(65, 'users', '117', 0, 'flashman553sa', 0),
(66, 'users', '118', 0, 'pornking', 0),
(67, 'users', '119', 0, 'economyman', 0),
(68, 'users', '120', 0, 'Gerusa Carvalho Moser', 0),
(69, 'users', '121', 0, 'unlimitcroso4', 0),
(71, 'users', '123', 0, 'ADRIANA UMLAUF STREY', 0),
(72, 'users', '124', 0, 'nilza', 0),
(73, 'users', '125', 0, 'Pamela Rejas', 0),
(346, 'users', '398', 0, 'Leonardo', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `jos_core_acl_aro_groups`
--

CREATE TABLE IF NOT EXISTS `jos_core_acl_aro_groups` (
  `id` int(11) NOT NULL auto_increment,
  `parent_id` int(11) NOT NULL default '0',
  `name` varchar(255) NOT NULL default '',
  `lft` int(11) NOT NULL default '0',
  `rgt` int(11) NOT NULL default '0',
  `value` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`id`),
  KEY `jos_gacl_parent_id_aro_groups` (`parent_id`),
  KEY `jos_gacl_lft_rgt_aro_groups` (`lft`,`rgt`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=31 ;

--
-- Extraindo dados da tabela `jos_core_acl_aro_groups`
--

INSERT INTO `jos_core_acl_aro_groups` (`id`, `parent_id`, `name`, `lft`, `rgt`, `value`) VALUES
(17, 0, 'ROOT', 1, 22, 'ROOT'),
(28, 17, 'USERS', 2, 21, 'USERS'),
(29, 28, 'Public Frontend', 3, 12, 'Public Frontend'),
(18, 29, 'Registered', 4, 11, 'Registered'),
(19, 18, 'Author', 5, 10, 'Author'),
(20, 19, 'Editor', 6, 9, 'Editor'),
(21, 20, 'Publisher', 7, 8, 'Publisher'),
(30, 28, 'Public Backend', 13, 20, 'Public Backend'),
(23, 30, 'Manager', 14, 19, 'Manager'),
(24, 23, 'Administrator', 15, 18, 'Administrator'),
(25, 24, 'Super Administrator', 16, 17, 'Super Administrator');

-- --------------------------------------------------------

--
-- Estrutura da tabela `jos_core_acl_aro_map`
--

CREATE TABLE IF NOT EXISTS `jos_core_acl_aro_map` (
  `acl_id` int(11) NOT NULL default '0',
  `section_value` varchar(230) NOT NULL default '0',
  `value` varchar(100) NOT NULL,
  PRIMARY KEY  (`acl_id`,`section_value`,`value`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `jos_core_acl_aro_map`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `jos_core_acl_aro_sections`
--

CREATE TABLE IF NOT EXISTS `jos_core_acl_aro_sections` (
  `id` int(11) NOT NULL auto_increment,
  `value` varchar(230) NOT NULL default '',
  `order_value` int(11) NOT NULL default '0',
  `name` varchar(230) NOT NULL default '',
  `hidden` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `jos_gacl_value_aro_sections` (`value`),
  KEY `jos_gacl_hidden_aro_sections` (`hidden`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Extraindo dados da tabela `jos_core_acl_aro_sections`
--

INSERT INTO `jos_core_acl_aro_sections` (`id`, `value`, `order_value`, `name`, `hidden`) VALUES
(10, 'users', 1, 'Users', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `jos_core_acl_groups_aro_map`
--

CREATE TABLE IF NOT EXISTS `jos_core_acl_groups_aro_map` (
  `group_id` int(11) NOT NULL default '0',
  `section_value` varchar(240) NOT NULL default '',
  `aro_id` int(11) NOT NULL default '0',
  UNIQUE KEY `group_id_aro_id_groups_aro_map` (`group_id`,`section_value`,`aro_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `jos_core_acl_groups_aro_map`
--

INSERT INTO `jos_core_acl_groups_aro_map` (`group_id`, `section_value`, `aro_id`) VALUES
(18, '', 17),
(18, '', 18),
(18, '', 19),
(18, '', 20),
(18, '', 21),
(18, '', 22),
(18, '', 23),
(18, '', 24),
(18, '', 25),
(18, '', 26),
(18, '', 27),
(18, '', 28),
(18, '', 29),
(18, '', 30),
(18, '', 31),
(18, '', 33),
(18, '', 34),
(18, '', 35),
(18, '', 36),
(18, '', 37),
(18, '', 38),
(18, '', 39),
(18, '', 40),
(18, '', 41),
(18, '', 42),
(18, '', 43),
(18, '', 44),
(18, '', 45),
(18, '', 46),
(18, '', 47),
(18, '', 48),
(18, '', 49),
(18, '', 50),
(18, '', 51),
(18, '', 52),
(18, '', 53),
(18, '', 54),
(18, '', 55),
(18, '', 56),
(18, '', 57),
(18, '', 58),
(18, '', 59),
(18, '', 60),
(18, '', 61),
(18, '', 62),
(18, '', 63),
(18, '', 64),
(18, '', 65),
(18, '', 66),
(18, '', 67),
(18, '', 68),
(18, '', 69),
(18, '', 71),
(18, '', 72),
(18, '', 346),
(23, '', 15),
(23, '', 73),
(24, '', 12),
(24, '', 13),
(24, '', 14),
(25, '', 10),
(25, '', 16),
(25, '', 351);

-- --------------------------------------------------------

--
-- Estrutura da tabela `jos_core_log_items`
--

CREATE TABLE IF NOT EXISTS `jos_core_log_items` (
  `time_stamp` date NOT NULL default '0000-00-00',
  `item_table` varchar(50) NOT NULL default '',
  `item_id` int(11) unsigned NOT NULL default '0',
  `hits` int(11) unsigned NOT NULL default '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `jos_core_log_items`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `jos_core_log_searches`
--

CREATE TABLE IF NOT EXISTS `jos_core_log_searches` (
  `search_term` varchar(128) NOT NULL default '',
  `hits` int(11) unsigned NOT NULL default '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `jos_core_log_searches`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `jos_eventlist_categories`
--

CREATE TABLE IF NOT EXISTS `jos_eventlist_categories` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `parent_id` int(11) unsigned NOT NULL default '0',
  `catname` varchar(100) NOT NULL default '',
  `alias` varchar(100) NOT NULL default '',
  `catdescription` mediumtext NOT NULL,
  `meta_keywords` text NOT NULL,
  `meta_description` text NOT NULL,
  `image` varchar(100) NOT NULL default '',
  `published` tinyint(1) NOT NULL default '0',
  `checked_out` int(11) NOT NULL default '0',
  `checked_out_time` datetime NOT NULL default '0000-00-00 00:00:00',
  `access` int(11) unsigned NOT NULL default '0',
  `groupid` int(11) NOT NULL default '0',
  `ordering` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `jos_eventlist_categories`
--

INSERT INTO `jos_eventlist_categories` (`id`, `parent_id`, `catname`, `alias`, `catdescription`, `meta_keywords`, `meta_description`, `image`, `published`, `checked_out`, `checked_out_time`, `access`, `groupid`, `ordering`) VALUES
(1, 0, 'Educação Infantil', 'educacao-infantil', 'Calendário de datas importantes da Educação Infantil', '', '', 'site.jpg', 1, 0, '0000-00-00 00:00:00', 0, 0, 1),
(2, 0, 'Ensino Fundamental', 'ensino-fundamental', 'Calendário de datas importantes do Ensino Fundamental<br />', '', '', 'site.jpg', 1, 0, '0000-00-00 00:00:00', 0, 0, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `jos_eventlist_events`
--

CREATE TABLE IF NOT EXISTS `jos_eventlist_events` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `locid` int(11) unsigned NOT NULL default '0',
  `catsid` int(11) unsigned NOT NULL default '0',
  `dates` date NOT NULL default '0000-00-00',
  `enddates` date default NULL,
  `times` time default NULL,
  `endtimes` time default NULL,
  `title` varchar(100) NOT NULL default '',
  `alias` varchar(100) NOT NULL default '',
  `created_by` int(11) unsigned NOT NULL default '0',
  `modified` datetime NOT NULL,
  `modified_by` int(11) unsigned NOT NULL default '0',
  `author_ip` varchar(15) NOT NULL default '',
  `created` datetime NOT NULL,
  `datdescription` mediumtext NOT NULL,
  `meta_keywords` varchar(200) NOT NULL default '',
  `meta_description` varchar(255) NOT NULL default '',
  `recurrence_number` int(2) NOT NULL default '0',
  `recurrence_type` int(2) NOT NULL default '0',
  `recurrence_counter` date NOT NULL default '0000-00-00',
  `datimage` varchar(100) NOT NULL default '',
  `checked_out` int(11) NOT NULL default '0',
  `checked_out_time` datetime NOT NULL default '0000-00-00 00:00:00',
  `registra` tinyint(1) NOT NULL default '0',
  `unregistra` tinyint(1) NOT NULL default '0',
  `published` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=27 ;

--
-- Extraindo dados da tabela `jos_eventlist_events`
--

INSERT INTO `jos_eventlist_events` (`id`, `locid`, `catsid`, `dates`, `enddates`, `times`, `endtimes`, `title`, `alias`, `created_by`, `modified`, `modified_by`, `author_ip`, `created`, `datdescription`, `meta_keywords`, `meta_description`, `recurrence_number`, `recurrence_type`, `recurrence_counter`, `datimage`, `checked_out`, `checked_out_time`, `registra`, `unregistra`, `published`) VALUES
(1, 0, 1, '2009-07-13', '2009-07-17', NULL, NULL, 'Entrega das Avaliações', 'entrega-das-avaliacoes', 62, '2009-07-14 13:37:57', 62, '201.47.56.20', '2009-07-14 13:34:50', '', '[title], [a_name], [catsid], [times]', 'The event titled [title] starts on [dates]!', 0, 0, '0000-00-00', '', 0, '0000-00-00 00:00:00', 0, 0, 1),
(2, 0, 1, '2009-07-13', '2009-07-24', NULL, NULL, 'Colonia de Férias/Recesso Escolar', 'colonia-de-feriasrecesso-escolar', 62, '2009-07-15 14:00:17', 62, '201.47.56.20', '2009-07-14 13:43:02', '', '[title], [a_name], [catsid], [times]', 'O Evento: [title] começa [dates]!', 0, 0, '0000-00-00', '', 0, '0000-00-00 00:00:00', 0, 0, 1),
(3, 0, 1, '2009-07-27', NULL, NULL, NULL, 'Início das Atividades Curriculares', 'inicio-das-atividades-curriculares', 62, '2009-07-15 13:59:01', 62, '201.47.56.20', '2009-07-14 13:44:05', '', '[title], [a_name], [catsid], [times]', 'O Evento: [title] começa [dates]!', 0, 0, '0000-00-00', '', 0, '0000-00-00 00:00:00', 0, 0, 1),
(4, 0, 1, '2009-08-08', NULL, NULL, NULL, 'Evento dia dos pais', 'evento-dia-dos-pais', 62, '0000-00-00 00:00:00', 0, '201.47.56.20', '2009-07-14 13:45:42', '', '[title], [a_name], [catsid], [times]', 'O Evento: [title] começa [dates]!', 0, 0, '0000-00-00', '', 0, '0000-00-00 00:00:00', 0, 0, 1),
(5, 0, 1, '2009-09-07', NULL, NULL, NULL, 'Feriado', 'feriado', 62, '0000-00-00 00:00:00', 0, '201.47.56.20', '2009-07-14 13:47:18', '', '[title], [a_name], [catsid], [times]', 'O Evento: [title] começa [dates]!', 0, 0, '0000-00-00', '', 0, '0000-00-00 00:00:00', 0, 0, 1),
(6, 0, 1, '2009-09-26', NULL, NULL, NULL, 'Feira Cultural', 'feira-cultural', 62, '0000-00-00 00:00:00', 0, '201.47.56.20', '2009-07-14 13:48:00', '', '[title], [a_name], [catsid], [times]', 'O Evento: [title] começa [dates]!', 0, 0, '0000-00-00', '', 0, '0000-00-00 00:00:00', 0, 0, 1),
(7, 0, 1, '2009-10-12', NULL, NULL, NULL, 'Feriado', 'feriado', 62, '0000-00-00 00:00:00', 0, '201.47.56.20', '2009-07-14 13:48:50', '', '[title], [a_name], [catsid], [times]', 'O Evento: [title] começa [dates]!', 0, 0, '0000-00-00', '', 0, '0000-00-00 00:00:00', 0, 0, 1),
(8, 0, 1, '2009-11-02', NULL, NULL, NULL, 'Feriado', 'feriado', 62, '0000-00-00 00:00:00', 0, '201.47.56.20', '2009-07-14 13:49:21', '', '[title], [a_name], [catsid], [times]', 'O Evento: [title] começa [dates]!', 0, 0, '0000-00-00', '', 0, '0000-00-00 00:00:00', 0, 0, 1),
(9, 0, 1, '2009-11-15', NULL, NULL, NULL, 'Feriado', 'feriado', 62, '0000-00-00 00:00:00', 0, '201.47.56.20', '2009-07-14 13:50:17', '', '[title], [a_name], [catsid], [times]', 'O Evento: [title] começa [dates]!', 0, 0, '0000-00-00', '', 0, '0000-00-00 00:00:00', 0, 0, 1),
(10, 0, 1, '2009-12-09', NULL, NULL, NULL, 'Entrega das Avaliações', 'entrega-das-avaliacoes', 62, '0000-00-00 00:00:00', 0, '201.47.56.20', '2009-07-14 13:50:52', '', '[title], [a_name], [catsid], [times]', 'O Evento: [title] começa [dates]!', 0, 0, '0000-00-00', '', 0, '0000-00-00 00:00:00', 0, 0, 1),
(11, 0, 1, '2009-12-11', NULL, NULL, NULL, 'Evento escola e família', 'evento-escola-e-familia', 62, '0000-00-00 00:00:00', 0, '201.47.56.20', '2009-07-14 13:51:46', '', '[title], [a_name], [catsid], [times]', 'O Evento: [title] começa [dates]!', 0, 0, '0000-00-00', '', 0, '0000-00-00 00:00:00', 0, 0, 1),
(12, 0, 1, '2009-12-25', NULL, NULL, NULL, 'Feriado', 'feriado', 62, '0000-00-00 00:00:00', 0, '201.47.56.20', '2009-07-14 13:52:15', '', '[title], [a_name], [catsid], [times]', 'O Evento: [title] começa [dates]!', 0, 0, '0000-00-00', '', 0, '0000-00-00 00:00:00', 0, 0, 1),
(13, 0, 2, '2009-09-07', NULL, NULL, NULL, 'Feriado', 'feriado', 62, '0000-00-00 00:00:00', 0, '201.47.56.20', '2009-07-14 13:54:51', '', '[title], [a_name], [catsid], [times]', 'O Evento: [title] começa [dates]!', 0, 0, '0000-00-00', '', 0, '0000-00-00 00:00:00', 0, 0, 1),
(14, 0, 2, '2009-10-12', NULL, NULL, NULL, 'Feriado', 'feriado', 62, '0000-00-00 00:00:00', 0, '201.47.56.20', '2009-07-14 13:55:11', '', '[title], [a_name], [catsid], [times]', 'O Evento: [title] começa [dates]!', 0, 0, '0000-00-00', '', 0, '0000-00-00 00:00:00', 0, 0, 1),
(15, 0, 2, '2009-11-02', NULL, NULL, NULL, 'Feriado', 'feriado', 62, '0000-00-00 00:00:00', 0, '201.47.56.20', '2009-07-14 13:55:29', '', '[title], [a_name], [catsid], [times]', 'O Evento: [title] começa [dates]!', 0, 0, '0000-00-00', '', 0, '0000-00-00 00:00:00', 0, 0, 1),
(16, 0, 2, '2009-11-15', NULL, NULL, NULL, 'Feriado', 'feriado', 62, '0000-00-00 00:00:00', 0, '201.47.56.20', '2009-07-14 13:55:45', '', '[title], [a_name], [catsid], [times]', 'O Evento: [title] começa [dates]!', 0, 0, '0000-00-00', '', 0, '0000-00-00 00:00:00', 0, 0, 1),
(17, 0, 2, '2009-12-25', NULL, NULL, NULL, 'Feriado', 'feriado', 62, '0000-00-00 00:00:00', 0, '201.47.56.20', '2009-07-14 13:56:04', '', '[title], [a_name], [catsid], [times]', 'O Evento: [title] começa [dates]!', 0, 0, '0000-00-00', '', 0, '0000-00-00 00:00:00', 0, 0, 1),
(18, 0, 2, '2009-07-13', '2009-07-24', NULL, NULL, 'Colonia de Férias/Recesso Escolar', 'colonia-de-feriasrecesso-escolar', 62, '0000-00-00 00:00:00', 0, '201.47.56.20', '2009-07-14 13:57:39', '', '[title], [a_name], [catsid], [times]', 'O Evento: [title] começa [dates]!', 0, 0, '0000-00-00', '', 0, '0000-00-00 00:00:00', 0, 0, 1),
(19, 0, 2, '2009-07-27', NULL, NULL, NULL, 'Início das Atividades Curriculares', 'inicio-das-atividades-curriculares', 62, '2009-07-15 13:59:26', 62, '201.47.56.20', '2009-07-14 13:58:20', '', '[title], [a_name], [catsid], [times]', 'O Evento: [title] começa [dates]!', 0, 0, '0000-00-00', '', 0, '0000-00-00 00:00:00', 0, 0, 1),
(20, 0, 2, '2009-08-08', NULL, NULL, NULL, 'Evento dia dos pais', 'evento-dia-dos-pais', 62, '0000-00-00 00:00:00', 0, '201.47.56.20', '2009-07-14 13:58:46', '', '[title], [a_name], [catsid], [times]', 'O Evento: [title] começa [dates]!', 0, 0, '0000-00-00', '', 0, '0000-00-00 00:00:00', 0, 0, 1),
(21, 0, 2, '2009-08-11', '2009-08-12', NULL, NULL, 'Entrega de Boletins', 'entrega-de-boletins', 62, '0000-00-00 00:00:00', 0, '201.47.56.20', '2009-07-14 13:59:33', '', '[title], [a_name], [catsid], [times]', 'O Evento: [title] começa [dates]!', 0, 0, '0000-00-00', '', 0, '0000-00-00 00:00:00', 0, 0, 1),
(22, 0, 2, '2009-09-26', NULL, NULL, NULL, 'Feira Cultural', 'feira-cultural', 62, '0000-00-00 00:00:00', 0, '201.47.56.20', '2009-07-14 14:00:35', '', '[title], [a_name], [catsid], [times]', 'O Evento: [title] começa [dates]!', 0, 0, '0000-00-00', '', 0, '0000-00-00 00:00:00', 0, 0, 1),
(23, 0, 2, '2009-10-13', '2009-10-14', NULL, NULL, 'Entrega de Boletins', 'entrega-de-boletins', 62, '0000-00-00 00:00:00', 0, '201.47.56.20', '2009-07-14 14:08:19', '', '[title], [a_name], [catsid], [times]', 'O Evento: [title] começa [dates]!', 0, 0, '0000-00-00', '', 0, '0000-00-00 00:00:00', 0, 0, 1),
(24, 0, 2, '2009-12-07', '2009-12-08', NULL, NULL, 'Entrega de Boletins', 'entrega-de-boletins', 62, '0000-00-00 00:00:00', 0, '201.47.56.20', '2009-07-14 14:09:33', '', '[title], [a_name], [catsid], [times]', 'O Evento: [title] começa [dates]!', 0, 0, '0000-00-00', '', 0, '0000-00-00 00:00:00', 0, 0, 1),
(25, 0, 2, '2009-12-09', '2009-12-18', NULL, NULL, 'Recuperação e Exames', 'recuperacao-e-exames', 62, '0000-00-00 00:00:00', 0, '201.47.56.20', '2009-07-14 14:11:45', '', '[title], [a_name], [catsid], [times]', 'O Evento: [title] começa [dates]!', 0, 0, '0000-00-00', '', 0, '0000-00-00 00:00:00', 0, 0, 1),
(26, 0, 2, '2009-12-11', NULL, NULL, NULL, 'Evento escola e família', 'evento-escola-e-familia', 62, '0000-00-00 00:00:00', 0, '201.47.56.20', '2009-07-14 14:12:25', '', '[title], [a_name], [catsid], [times]', 'O Evento: [title] começa [dates]!', 0, 0, '0000-00-00', '', 0, '0000-00-00 00:00:00', 0, 0, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `jos_eventlist_groupmembers`
--

CREATE TABLE IF NOT EXISTS `jos_eventlist_groupmembers` (
  `group_id` int(11) NOT NULL default '0',
  `member` int(11) NOT NULL default '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `jos_eventlist_groupmembers`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `jos_eventlist_groups`
--

CREATE TABLE IF NOT EXISTS `jos_eventlist_groups` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `name` varchar(150) NOT NULL default '',
  `description` mediumtext NOT NULL,
  `checked_out` int(11) NOT NULL default '0',
  `checked_out_time` datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Extraindo dados da tabela `jos_eventlist_groups`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `jos_eventlist_register`
--

CREATE TABLE IF NOT EXISTS `jos_eventlist_register` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `event` int(11) NOT NULL default '0',
  `uid` int(11) NOT NULL default '0',
  `uregdate` varchar(50) NOT NULL default '',
  `uip` varchar(15) NOT NULL default '',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Extraindo dados da tabela `jos_eventlist_register`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `jos_eventlist_settings`
--

CREATE TABLE IF NOT EXISTS `jos_eventlist_settings` (
  `id` int(11) NOT NULL,
  `oldevent` tinyint(4) NOT NULL,
  `minus` tinyint(4) NOT NULL,
  `showtime` tinyint(4) NOT NULL,
  `showtitle` tinyint(4) NOT NULL,
  `showlocate` tinyint(4) NOT NULL,
  `showcity` tinyint(4) NOT NULL,
  `showmapserv` tinyint(4) NOT NULL,
  `map24id` varchar(20) NOT NULL,
  `gmapkey` varchar(255) NOT NULL,
  `tablewidth` varchar(20) NOT NULL,
  `datewidth` varchar(20) NOT NULL,
  `titlewidth` varchar(20) NOT NULL,
  `locationwidth` varchar(20) NOT NULL,
  `citywidth` varchar(20) NOT NULL,
  `datename` varchar(100) NOT NULL,
  `titlename` varchar(100) NOT NULL,
  `locationname` varchar(100) NOT NULL,
  `cityname` varchar(100) NOT NULL,
  `formatdate` varchar(100) NOT NULL,
  `formattime` varchar(100) NOT NULL,
  `timename` varchar(50) NOT NULL,
  `showdetails` tinyint(4) NOT NULL,
  `showtimedetails` tinyint(4) NOT NULL,
  `showevdescription` tinyint(4) NOT NULL,
  `showdetailstitle` tinyint(4) NOT NULL,
  `showdetailsadress` tinyint(4) NOT NULL,
  `showlocdescription` tinyint(4) NOT NULL,
  `showlinkvenue` tinyint(4) NOT NULL,
  `showdetlinkvenue` tinyint(4) NOT NULL,
  `delivereventsyes` tinyint(4) NOT NULL,
  `mailinform` tinyint(4) NOT NULL,
  `mailinformrec` varchar(150) NOT NULL,
  `mailinformuser` tinyint(4) NOT NULL,
  `datdesclimit` varchar(15) NOT NULL,
  `autopubl` tinyint(4) NOT NULL,
  `deliverlocsyes` tinyint(4) NOT NULL,
  `autopublocate` tinyint(4) NOT NULL,
  `showcat` tinyint(4) NOT NULL,
  `catfrowidth` varchar(20) NOT NULL,
  `catfroname` varchar(100) NOT NULL,
  `evdelrec` tinyint(4) NOT NULL,
  `evpubrec` tinyint(4) NOT NULL,
  `locdelrec` tinyint(4) NOT NULL,
  `locpubrec` tinyint(4) NOT NULL,
  `sizelimit` varchar(20) NOT NULL,
  `imagehight` varchar(20) NOT NULL,
  `imagewidth` varchar(20) NOT NULL,
  `gddisabled` tinyint(4) NOT NULL,
  `imageenabled` tinyint(4) NOT NULL,
  `comunsolution` tinyint(4) NOT NULL,
  `comunoption` tinyint(4) NOT NULL,
  `catlinklist` tinyint(4) NOT NULL,
  `showfroregistra` tinyint(4) NOT NULL,
  `showfrounregistra` tinyint(4) NOT NULL,
  `eventedit` tinyint(4) NOT NULL,
  `eventeditrec` tinyint(4) NOT NULL,
  `eventowner` tinyint(4) NOT NULL,
  `venueedit` tinyint(4) NOT NULL,
  `venueeditrec` tinyint(4) NOT NULL,
  `venueowner` tinyint(4) NOT NULL,
  `lightbox` tinyint(4) NOT NULL,
  `meta_keywords` varchar(255) NOT NULL,
  `meta_description` varchar(255) NOT NULL,
  `showstate` tinyint(4) NOT NULL,
  `statename` varchar(100) NOT NULL,
  `statewidth` varchar(20) NOT NULL,
  `regname` tinyint(4) NOT NULL,
  `storeip` tinyint(4) NOT NULL,
  `commentsystem` tinyint(4) NOT NULL,
  `lastupdate` varchar(20) NOT NULL default '',
  `checked_out` int(11) NOT NULL default '0',
  `checked_out_time` datetime NOT NULL default '0000-00-00 00:00:00',
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `jos_eventlist_settings`
--

INSERT INTO `jos_eventlist_settings` (`id`, `oldevent`, `minus`, `showtime`, `showtitle`, `showlocate`, `showcity`, `showmapserv`, `map24id`, `gmapkey`, `tablewidth`, `datewidth`, `titlewidth`, `locationwidth`, `citywidth`, `datename`, `titlename`, `locationname`, `cityname`, `formatdate`, `formattime`, `timename`, `showdetails`, `showtimedetails`, `showevdescription`, `showdetailstitle`, `showdetailsadress`, `showlocdescription`, `showlinkvenue`, `showdetlinkvenue`, `delivereventsyes`, `mailinform`, `mailinformrec`, `mailinformuser`, `datdesclimit`, `autopubl`, `deliverlocsyes`, `autopublocate`, `showcat`, `catfrowidth`, `catfroname`, `evdelrec`, `evpubrec`, `locdelrec`, `locpubrec`, `sizelimit`, `imagehight`, `imagewidth`, `gddisabled`, `imageenabled`, `comunsolution`, `comunoption`, `catlinklist`, `showfroregistra`, `showfrounregistra`, `eventedit`, `eventeditrec`, `eventowner`, `venueedit`, `venueeditrec`, `venueowner`, `lightbox`, `meta_keywords`, `meta_description`, `showstate`, `statename`, `statewidth`, `regname`, `storeip`, `commentsystem`, `lastupdate`, `checked_out`, `checked_out_time`) VALUES
(1, 0, 1, 0, 1, 0, 0, 0, '', '', '100%', '15%', '25%', '', '', 'Date', 'Title', 'Venue', 'City', '%d/%m/%Y', '%H:%M', 'h', 1, 0, 0, 1, 1, 0, 1, 2, -2, 0, 'example@example.com', 0, '1000', -2, -2, -2, 1, '', 'Ensino', 1, 1, 1, 1, '100', '100', '100', 0, 1, 0, 0, 1, 2, 2, -2, 1, 0, -2, 1, 0, 0, '[title], [a_name], [catsid], [times]', 'O Evento: [title] começa [dates]!', 0, 'State', '0', 0, 1, 0, '1247656735', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `jos_eventlist_venues`
--

CREATE TABLE IF NOT EXISTS `jos_eventlist_venues` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `venue` varchar(50) NOT NULL default '',
  `alias` varchar(100) NOT NULL default '',
  `url` varchar(200) NOT NULL default '',
  `street` varchar(50) default NULL,
  `plz` varchar(20) default NULL,
  `city` varchar(50) default NULL,
  `state` varchar(50) default NULL,
  `country` varchar(2) default NULL,
  `locdescription` mediumtext NOT NULL,
  `meta_keywords` text NOT NULL,
  `meta_description` text NOT NULL,
  `locimage` varchar(100) NOT NULL default '',
  `map` tinyint(4) NOT NULL default '0',
  `created_by` int(11) unsigned NOT NULL default '0',
  `author_ip` varchar(15) NOT NULL default '',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `modified_by` int(11) unsigned NOT NULL default '0',
  `published` tinyint(1) NOT NULL default '0',
  `checked_out` int(11) NOT NULL default '0',
  `checked_out_time` datetime NOT NULL default '0000-00-00 00:00:00',
  `ordering` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `jos_eventlist_venues`
--

INSERT INTO `jos_eventlist_venues` (`id`, `venue`, `alias`, `url`, `street`, `plz`, `city`, `state`, `country`, `locdescription`, `meta_keywords`, `meta_description`, `locimage`, `map`, `created_by`, `author_ip`, `created`, `modified`, `modified_by`, `published`, `checked_out`, `checked_out_time`, `ordering`) VALUES
(1, 'Oficina Dos Sonhos', 'oficina-dos-sonhos', 'http://www.oficinadossonhos.com.br', 'Rua Senador Nilo Coelho, 181', '89219-340', 'Joinville', 'Santa Catarina', 'BR', '<strong>CENTRO DE EDUCAÇÃO OFICINA DOS SONHOS</strong><br /><br />A Escola Oficina foi fundada em 12 de dezembro de 1996.<br />Situada na Rua Hermann, lange, 270 – Costa e Silva.<br />Iniciamos as atividades curriculares em dezembro de 1996 com apenas 12 crianças, 01 zeladora, 01 auxiliar e Márcia Poletti como professora.<br />Em menos de 01 ano tínhamos 50 alunos, contratamos mais profissionais, ampliamos o espaço no próprio terreno, sempre priorizando qualidade na Educação.<br />Mais tarde compramos um terreno na Rua Senador Nilo Coelho, 181, pois na escolinha onde tudo começou faltava espaço.<br />Em Fevereiro de 2001 mudamos para a nossa escola, tínhamos conseguido adquirir uma sede própria...Quanta Felicidade!!!!<br />Hoje com 270 alunos a Escola nova que em 2001 era o ideal, tornou-se pequena, o espaço ficou limitado aos nossos objetivos.<br />Em 2003 começamos a procurar um terreno para uma futura ampliação com uma construção moderna, para atender melhor os alunos.<br />O crescimento positivo desta instituição, apoiado pela confiança da comunidade e em Deus, baseado na sua Palavra, continua ano após ano.<br />Hoje estamos em obras onde, teremos 14.000 metros quadrados de área verde, com direito a trilhas, nascente, salas amplas, laboratórios, quadras polivalentes....<br />Podemos falar com o coração cheio de bons sentimentos, que toda esta trajetória valeu e que queremos mais do que ensinar os PCN''s, mas mudar os pilares centrais que estruturam a personalidade, aprender a pensar antes de reagir e amar o espetáculo da vida.<br />As sementes que plantamos, precisam ser regadas com muito Amor.<br />Precisamos seguir o caminho do Mestre dos Mestres...<br />Temos a certeza que podemos fazer de nossos alunos, verdadeiros governadores deste país.<br />O princípio de semeadura e colheita se aplica para implantarmos a Verdade de Deus nas nações. É num processo gradual, através da Educação Cristã, que as sementes são plantadas e cuidadas, para produzir frutos em todos os aspectos da vida: pessoal, social, política e econômica.', '', '', '', 0, 62, '201.47.56.20', '2009-07-14 02:03:27', '0000-00-00 00:00:00', 0, 1, 0, '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `jos_groups`
--

CREATE TABLE IF NOT EXISTS `jos_groups` (
  `id` tinyint(3) unsigned NOT NULL default '0',
  `name` varchar(50) NOT NULL default '',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `jos_groups`
--

INSERT INTO `jos_groups` (`id`, `name`) VALUES
(0, 'Public'),
(1, 'Registered'),
(2, 'Special');

-- --------------------------------------------------------

--
-- Estrutura da tabela `jos_jce_extensions`
--

CREATE TABLE IF NOT EXISTS `jos_jce_extensions` (
  `id` int(11) NOT NULL auto_increment,
  `pid` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `extension` varchar(255) NOT NULL,
  `folder` varchar(255) NOT NULL,
  `published` tinyint(3) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `jos_jce_extensions`
--

INSERT INTO `jos_jce_extensions` (`id`, `pid`, `name`, `extension`, `folder`, `published`) VALUES
(1, 54, 'Joomla Links for Advanced Link', 'joomlalinks', 'links', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `jos_jce_groups`
--

CREATE TABLE IF NOT EXISTS `jos_jce_groups` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `users` text NOT NULL,
  `types` varchar(255) NOT NULL,
  `components` text NOT NULL,
  `rows` text NOT NULL,
  `plugins` varchar(255) NOT NULL,
  `published` tinyint(3) NOT NULL,
  `ordering` int(11) NOT NULL,
  `checked_out` tinyint(3) NOT NULL,
  `checked_out_time` datetime NOT NULL,
  `params` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `jos_jce_groups`
--

INSERT INTO `jos_jce_groups` (`id`, `name`, `description`, `users`, `types`, `components`, `rows`, `plugins`, `published`, `ordering`, `checked_out`, `checked_out_time`, `params`) VALUES
(1, 'Default', 'Default group for all users with edit access', '', '19,20,21,23,24,25', '', '6,7,8,9,10,11,12,13,14,15,16,17,18,19;20,21,22,23,24,25,26,27,28,30,31,32,33,36;37,38,39,40,41,42,43,44,45,46,47,48;49,50,51,52,53,54,55,57,58,59,61', '1,2,3,4,5,6,20,21,37,38,39,40,41,42,49,50,51,52,53,54,55,57,58,59,61', 1, 1, 0, '0000-00-00 00:00:00', 'editor_width=\neditor_height=\neditor_theme_advanced_toolbar_location=top\neditor_theme_advanced_toolbar_align=center\neditor_skin=default\neditor_skin_variant=default\neditor_inlinepopups_skin=clearlooks2\nadvcode_toggle=1\nadvcode_editor_state=0\nadvcode_toggle_text=[Mostrar/Esconder HTML]\neditor_relative_urls=1\neditor_invalid_elements=\neditor_extended_elements=\neditor_event_elements=a,img\ncode_allow_javascript=1\ncode_allow_css=0\ncode_allow_php=1\neditor_theme_advanced_blockformats=p,div,h1,h2,h3,h4,h5,h6,blockquote,dt,dd,code,samp,pre\neditor_theme_advanced_fonts_add=\neditor_theme_advanced_fonts_remove=\neditor_theme_advanced_font_sizes=8pt,10pt,12pt,14pt,18pt,24pt,36pt\neditor_dir=images/stories\neditor_max_size=2048\neditor_upload_conflict=\neditor_preview_height=550\neditor_preview_width=750\neditor_custom_colors=\nbrowser_dir=\nbrowser_max_size=\nbrowser_extensions=xml=xml;html=htm,html;word=doc,docx;powerpoint=ppt;excel=xls;text=txt,rtf;image=gif,jpeg,jpg,png;acrobat=pdf;archive=zip,tar,gz;flash=swf;winrar=rar;quicktime=mov,mp4,qt;windowsmedia=wmv,asx,asf,avi;audio=wav,mp3,aiff;openoffice=odt,odg,odp,ods,odf\nbrowser_extensions_viewable=html,htm,doc,docx,ppt,rtf,xls,txt,gif,jpeg,jpg,png,pdf,swf,mov,mpeg,mpg,avi,asf,asx,dcr,flv,wmv,wav,mp3\nbrowser_upload=1\nbrowser_upload_conflict=\nbrowser_folder_new=1\nbrowser_folder_delete=1\nbrowser_folder_rename=1\nbrowser_file_delete=1\nbrowser_file_rename=1\nbrowser_file_move=1\nmedia_use_script=0\nmedia_strict=1\nmedia_version_flash=9,0,124,0\nmedia_version_windowsmedia=5,1,52,701\nmedia_version_quicktime=6,0,2,0\nmedia_version_realmedia=7,0,0,0\nmedia_version_shockwave=11,0,0,458\npaste_keep_linebreaks=1\npaste_auto_cleanup_on_paste=0\npaste_strip_class_attributes=all\npaste_remove_spans=0\npaste_retain_style_properties=\npaste_remove_styles=0\nimgmanager_dir=\nimgmanager_max_size=\nimgmanager_extensions=image=jpeg,jpg,png,gif\nimgmanager_margin_top=default\nimgmanager_margin_right=default\nimgmanager_margin_bottom=default\nimgmanager_margin_left=default\nimgmanager_border=0\nimgmanager_border_width=default\nimgmanager_border_style=default\nimgmanager_border_color=#000000\nimgmanager_align=default\nimgmanager_upload=1\nimgmanager_upload_conflict=\nimgmanager_folder_new=1\nimgmanager_folder_delete=1\nimgmanager_folder_rename=1\nimgmanager_file_delete=1\nimgmanager_file_rename=1\nimgmanager_file_move=1\nadvlink_target=default\nadvlink_content=1\nadvlink_static=1\nadvlink_contacts=1\nadvlink_weblinks=1\nadvlink_menu=1\nspellchecker_engine=googlespell\nspellchecker_languages=Portuguese=pt\nspellchecker_pspell_mode=PSPELL_FAST\nspellchecker_pspell_spelling=\nspellchecker_pspell_jargon=\nspellchecker_pspell_encoding=\nspellchecker_pspellshell_aspell=/usr/bin/aspell\nspellchecker_pspellshell_tmp=/tmp\nmediamanager_dir=\nmediamanager_max_size=\nmediamanager_extensions=windowsmedia=avi,wmv,wm,asf,asx,wmx,wvx;quicktime=mov,qt,mpg,mp3,mp4,mpeg;flash=swf,flv,xml;shockwave=dcr;real=rm,ra,ram;divx=divx\nmediamanager_flvplayer=flvplayer.swf\nmediamanager_flvplayer_path=plugins/editors/jce/tiny_mce/plugins/mediamanager/swf\nmediamanager_margin_top=default\nmediamanager_margin_right=default\nmediamanager_margin_bottom=default\nmediamanager_margin_left=default\nmediamanager_border=0\nmediamanager_border_width=default\nmediamanager_border_style=default\nmediamanager_border_color=#000000\nmediamanager_align=default\nmediamanager_upload=1\nmediamanager_upload_conflict=\nmediamanager_folder_new=1\nmediamanager_folder_delete=1\nmediamanager_folder_rename=1\nmediamanager_file_delete=1\nmediamanager_file_rename=1\nmediamanager_file_move=1\nimgmanager_ext_dir=\nimgmanager_ext_max_size=\nimgmanager_ext_extensions=image=jpeg,jpg,png,gif\nimgmanager_ext_margin_top=default\nimgmanager_ext_margin_right=default\nimgmanager_ext_margin_bottom=default\nimgmanager_ext_margin_left=default\nimgmanager_ext_border=0\nimgmanager_ext_border_width=default\nimgmanager_ext_border_style=default\nimgmanager_ext_border_color=#000000\nimgmanager_ext_align=default\nimgmanager_upload_resize=0\nimgmanager_upload_rotate=0\nimgmanager_ext_upload_thumbnail=0\nimgmanager_ext_allow_resize=1\nimgmanager_ext_force_resize=0\nimgmanager_ext_allow_rotate=1\nimgmanager_ext_force_rotate=0\nimgmanager_ext_allow_thumbnail=1\nimgmanager_ext_force_thumbnail=0\nimgmanager_ext_upload=1\nimgmanager_ext_upload_conflict=\nimgmanager_ext_folder_new=1\nimgmanager_ext_folder_delete=1\nimgmanager_ext_folder_rename=1\nimgmanager_ext_file_delete=1\nimgmanager_ext_file_rename=1\nimgmanager_ext_file_move=1\nimgmanager_ext_mode=list\nimgmanager_ext_resize_width=640\nimgmanager_ext_resize_height=480\nimgmanager_ext_resize_quality=80\nimgmanager_ext_cache=tmp\nimgmanager_ext_cache_size=10\nimgmanager_ext_cache_age=30\nimgmanager_ext_cache_files=50\nimgmanager_ext_use_imagemagick=0\nimgmanager_ext_imagemagick_path=\nimgmanager_ext_thumbnail_size=150\nimgmanager_ext_thumbnail_quality=80\nimgmanager_ext_thumbnail_folder=thumbnails\nimgmanager_ext_thumbnail_prefix=thumb_\nimgmanager_ext_thumbnail_mode=\n\n'),
(2, 'Front End', 'Sample Group for Authors, Editors, Publishers', '', '19,20,21', '', '6,7,8,9,10,13,14,15,16,17,18,19,27,28;20,21,25,26,30,31,32,36,43,44,45,47,48,50,51;24,33,39,40,42,46,49,52,53,54,55,57,58', '6,20,21,50,51,1,3,5,39,40,42,49,52,53,54,55,57,58', 0, 2, 0, '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `jos_jce_plugins`
--

CREATE TABLE IF NOT EXISTS `jos_jce_plugins` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `layout` varchar(255) NOT NULL,
  `row` int(11) NOT NULL,
  `ordering` int(11) NOT NULL,
  `published` tinyint(3) NOT NULL,
  `editable` tinyint(3) NOT NULL,
  `iscore` tinyint(3) NOT NULL,
  `elements` varchar(255) NOT NULL,
  `checked_out` int(11) NOT NULL,
  `checked_out_time` datetime NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `plugin` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=62 ;

--
-- Extraindo dados da tabela `jos_jce_plugins`
--

INSERT INTO `jos_jce_plugins` (`id`, `title`, `name`, `type`, `icon`, `layout`, `row`, `ordering`, `published`, `editable`, `iscore`, `elements`, `checked_out`, `checked_out_time`) VALUES
(1, 'Context Menu', 'contextmenu', 'plugin', '', '', 0, 0, 1, 0, 1, '', 0, '0000-00-00 00:00:00'),
(2, 'File Browser', 'browser', 'plugin', '', '', 0, 0, 1, 1, 1, '', 0, '0000-00-00 00:00:00'),
(3, 'Inline Popups', 'inlinepopups', 'plugin', '', '', 0, 0, 1, 0, 1, '', 0, '0000-00-00 00:00:00'),
(4, 'Media Support', 'media', 'plugin', '', '', 0, 0, 1, 1, 1, '', 0, '0000-00-00 00:00:00'),
(5, 'Safari Browser Support', 'safari', 'plugin', '', '', 0, 0, 1, 0, 1, '', 0, '0000-00-00 00:00:00'),
(6, 'Help', 'help', 'plugin', 'help', 'help', 1, 1, 1, 0, 1, '', 0, '0000-00-00 00:00:00'),
(7, 'New Document', 'newdocument', 'command', 'newdocument', 'newdocument', 1, 2, 1, 0, 1, '', 0, '0000-00-00 00:00:00'),
(8, 'Bold', 'bold', 'command', 'bold', 'bold', 1, 3, 1, 0, 1, '', 0, '0000-00-00 00:00:00'),
(9, 'Italic', 'italic', 'command', 'italic', 'italic', 1, 4, 1, 0, 1, '', 0, '0000-00-00 00:00:00'),
(10, 'Underline', 'underline', 'command', 'underline', 'underline', 1, 5, 1, 0, 1, '', 0, '0000-00-00 00:00:00'),
(11, 'Font Select', 'fontselect', 'command', 'fontselect', 'fontselect', 1, 6, 1, 0, 1, '', 0, '0000-00-00 00:00:00'),
(12, 'Font Size Select', 'fontsizeselect', 'command', 'fontsizeselect', 'fontsizeselect', 1, 7, 1, 0, 1, '', 0, '0000-00-00 00:00:00'),
(13, 'Style Select', 'styleselect', 'command', 'styleselect', 'styleselect', 1, 8, 1, 0, 1, '', 0, '0000-00-00 00:00:00'),
(14, 'StrikeThrough', 'strikethrough', 'command', 'strikethrough', 'strikethrough', 1, 9, 1, 0, 1, '', 0, '0000-00-00 00:00:00'),
(15, 'Justify Full', 'full', 'command', 'justifyfull', 'justifyfull', 1, 10, 1, 0, 1, '', 0, '0000-00-00 00:00:00'),
(16, 'Justify Center', 'center', 'command', 'justifycenter', 'justifycenter', 1, 11, 1, 0, 1, '', 0, '0000-00-00 00:00:00'),
(17, 'Justify Left', 'left', 'command', 'justifyleft', 'justifyleft', 1, 12, 1, 0, 1, '', 0, '0000-00-00 00:00:00'),
(18, 'Justify Right', 'right', 'command', 'justifyright', 'justifyright', 1, 13, 1, 0, 1, '', 0, '0000-00-00 00:00:00'),
(19, 'Format Select', 'formatselect', 'command', 'formatselect', 'formatselect', 1, 14, 1, 0, 1, '', 0, '0000-00-00 00:00:00'),
(20, 'Paste', 'paste', 'plugin', 'pasteword,pastetext', 'paste', 2, 1, 1, 1, 1, '', 0, '0000-00-00 00:00:00'),
(21, 'Search Replace', 'searchreplace', 'plugin', 'search,replace', 'searchreplace', 2, 2, 1, 0, 1, '', 0, '0000-00-00 00:00:00'),
(22, 'Font ForeColour', 'forecolor', 'command', 'forecolor', 'forecolor', 2, 3, 1, 0, 1, '', 0, '0000-00-00 00:00:00'),
(23, 'Font BackColour', 'backcolor', 'command', 'backcolor', 'backcolor', 2, 4, 1, 0, 1, '', 0, '0000-00-00 00:00:00'),
(24, 'Unlink', 'unlink', 'command', 'unlink', 'unlink', 2, 5, 1, 0, 1, '', 0, '0000-00-00 00:00:00'),
(25, 'Indent', 'indent', 'command', 'indent', 'indent', 2, 6, 1, 0, 1, '', 0, '0000-00-00 00:00:00'),
(26, 'Outdent', 'outdent', 'command', 'outdent', 'outdent', 2, 7, 1, 0, 1, '', 0, '0000-00-00 00:00:00'),
(27, 'Undo', 'undo', 'command', 'undo', 'undo', 2, 8, 1, 0, 1, '', 0, '0000-00-00 00:00:00'),
(28, 'Redo', 'redo', 'command', 'redo', 'redo', 2, 9, 1, 0, 1, '', 0, '0000-00-00 00:00:00'),
(29, 'HTML', 'html', 'command', 'code', 'code', 2, 10, 1, 0, 1, '', 0, '0000-00-00 00:00:00'),
(30, 'Numbered List', 'numlist', 'command', 'numlist', 'numlist', 2, 11, 1, 0, 1, '', 0, '0000-00-00 00:00:00'),
(31, 'Bullet List', 'bullist', 'command', 'bullist', 'bullist', 2, 12, 1, 0, 1, '', 0, '0000-00-00 00:00:00'),
(32, 'Clipboard Actions', 'clipboard', 'command', 'cut,copy,paste', 'clipboard', 2, 13, 1, 0, 1, '', 0, '0000-00-00 00:00:00'),
(33, 'Anchor', 'anchor', 'command', 'anchor', 'anchor', 2, 14, 1, 0, 1, '', 0, '0000-00-00 00:00:00'),
(34, 'Image', 'image', 'command', 'image', 'image', 2, 15, 1, 0, 1, '', 0, '0000-00-00 00:00:00'),
(35, 'Link', 'link', 'command', 'link', 'link', 2, 16, 1, 0, 1, '', 0, '0000-00-00 00:00:00'),
(36, 'Code Cleanup', 'cleanup', 'command', 'cleanup', 'cleanup', 2, 17, 1, 0, 1, '', 0, '0000-00-00 00:00:00'),
(37, 'Directionality', 'directionality', 'plugin', 'ltr,rtl', 'directionality', 3, 1, 1, 0, 1, '', 0, '0000-00-00 00:00:00'),
(38, 'Emotions', 'emotions', 'plugin', 'emotions', 'emotions', 3, 2, 1, 0, 1, '', 0, '0000-00-00 00:00:00'),
(39, 'Fullscreen', 'fullscreen', 'plugin', 'fullscreen', 'fullscreen', 3, 3, 1, 0, 1, '', 0, '0000-00-00 00:00:00'),
(40, 'Preview', 'preview', 'plugin', 'preview', 'preview', 3, 4, 1, 0, 1, '', 0, '0000-00-00 00:00:00'),
(41, 'Tables', 'table', 'plugin', 'tablecontrols', 'buttons', 3, 5, 1, 0, 1, '', 0, '0000-00-00 00:00:00'),
(42, 'Print', 'print', 'plugin', 'print', 'print', 3, 6, 1, 0, 1, '', 0, '0000-00-00 00:00:00'),
(43, 'Horizontal Rule', 'hr', 'command', 'hr', 'hr', 3, 7, 1, 0, 1, '', 0, '0000-00-00 00:00:00'),
(44, 'Subscript', 'sub', 'command', 'sub', 'sub', 3, 8, 1, 0, 1, '', 0, '0000-00-00 00:00:00'),
(45, 'Superscript', 'sup', 'command', 'sup', 'sup', 3, 9, 1, 0, 1, '', 0, '0000-00-00 00:00:00'),
(46, 'Visual Aid', 'visualaid', 'command', 'visualaid', 'visualaid', 3, 10, 1, 0, 1, '', 0, '0000-00-00 00:00:00'),
(47, 'Character Map', 'charmap', 'command', 'charmap', 'charmap', 3, 11, 1, 0, 1, '', 0, '0000-00-00 00:00:00'),
(48, 'Remove Format', 'removeformat', 'command', 'removeformat', 'removeformat', 3, 12, 1, 0, 1, '', 0, '0000-00-00 00:00:00'),
(49, 'Styles', 'style', 'plugin', 'styleprops', 'style', 4, 1, 1, 0, 1, '', 0, '0000-00-00 00:00:00'),
(50, 'Non-Breaking', 'nonbreaking', 'plugin', 'nonbreaking', 'nonbreaking', 4, 2, 1, 0, 1, '', 0, '0000-00-00 00:00:00'),
(51, 'Visual Characters', 'visualchars', 'plugin', 'visualchars', 'visualchars', 4, 3, 1, 0, 1, '', 0, '0000-00-00 00:00:00'),
(52, 'XHTML Xtras', 'xhtmlxtras', 'plugin', 'cite,abbr,acronym,del,ins,attribs', 'xhtmlxtras', 4, 4, 1, 0, 1, '', 0, '0000-00-00 00:00:00'),
(53, 'Image Manager', 'imgmanager', 'plugin', 'imgmanager', 'imgmanager', 4, 5, 1, 1, 1, '', 0, '0000-00-00 00:00:00'),
(54, 'Advanced Link', 'advlink', 'plugin', 'advlink', 'advlink', 4, 6, 1, 1, 1, '', 0, '0000-00-00 00:00:00'),
(55, 'Spell Checker', 'spellchecker', 'plugin', 'spellchecker', 'spellchecker', 4, 7, 1, 1, 1, '', 0, '0000-00-00 00:00:00'),
(56, 'Layers', 'layer', 'plugin', 'insertlayer,moveforward,movebackward,absolute', 'layer', 4, 8, 1, 0, 1, '', 0, '0000-00-00 00:00:00'),
(57, 'Advanced Code Editor', 'advcode', 'plugin', 'advcode', 'advcode', 4, 9, 1, 0, 1, '', 0, '0000-00-00 00:00:00'),
(58, 'Article Breaks', 'article', 'plugin', 'readmore,pagebreak', 'article', 4, 10, 1, 0, 1, '', 0, '0000-00-00 00:00:00'),
(59, 'Media Manager', 'mediamanager', 'plugin', 'mediamanager', 'mediamanager', 4, 1, 1, 1, 0, '', 0, '0000-00-00 00:00:00'),
(61, 'Image Manager Extended', 'imgmanager_ext', 'plugin', 'imgmanager_ext', 'imgmanager_ext', 4, 1, 1, 1, 0, '', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `jos_jp_exclusion`
--

CREATE TABLE IF NOT EXISTS `jos_jp_exclusion` (
  `id` bigint(20) NOT NULL auto_increment,
  `profile` int(10) unsigned NOT NULL,
  `class` varchar(255) NOT NULL,
  `value` longtext NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Extraindo dados da tabela `jos_jp_exclusion`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `jos_jp_inclusion`
--

CREATE TABLE IF NOT EXISTS `jos_jp_inclusion` (
  `id` bigint(20) NOT NULL auto_increment,
  `profile` int(10) unsigned NOT NULL,
  `class` varchar(255) NOT NULL,
  `value` longtext NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Extraindo dados da tabela `jos_jp_inclusion`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `jos_jp_profiles`
--

CREATE TABLE IF NOT EXISTS `jos_jp_profiles` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `jos_jp_profiles`
--

INSERT INTO `jos_jp_profiles` (`id`, `description`) VALUES
(1, 'Default Backup Profile');

-- --------------------------------------------------------

--
-- Estrutura da tabela `jos_jp_registry`
--

CREATE TABLE IF NOT EXISTS `jos_jp_registry` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `profile` int(10) unsigned NOT NULL default '1',
  `key` varchar(255) NOT NULL,
  `value` longtext NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Extraindo dados da tabela `jos_jp_registry`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `jos_jp_stats`
--

CREATE TABLE IF NOT EXISTS `jos_jp_stats` (
  `id` bigint(20) unsigned NOT NULL auto_increment,
  `description` varchar(255) NOT NULL,
  `comment` longtext,
  `backupstart` timestamp NOT NULL default '0000-00-00 00:00:00',
  `backupend` timestamp NOT NULL default '0000-00-00 00:00:00',
  `status` enum('run','fail','complete') NOT NULL default 'run',
  `origin` enum('backend','frontend') NOT NULL default 'backend',
  `type` enum('full','dbonly','extradbonly') NOT NULL default 'full',
  `profile_id` bigint(20) NOT NULL default '1',
  `archivename` longtext,
  `absolute_path` longtext,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `jos_jp_stats`
--

INSERT INTO `jos_jp_stats` (`id`, `description`, `comment`, `backupstart`, `backupend`, `status`, `origin`, `type`, `profile_id`, `archivename`, `absolute_path`) VALUES
(1, 'Backup taken on Quarta, 15 Julho 2009 14:04', 'primeiro backup depois da instalacao do site.', '2009-07-15 14:04:59', '0000-00-00 00:00:00', 'complete', 'backend', 'full', 1, 'site-www.oficinadossonhos.com.br-20090715-140459.zip', '/home/oficinad/public_html/administrator/components/com_joomlapack/backup/site-www.oficinadossonhos.com.br-20090715-140459.zip');

-- --------------------------------------------------------

--
-- Estrutura da tabela `jos_jp_temp`
--

CREATE TABLE IF NOT EXISTS `jos_jp_temp` (
  `key` varchar(255) NOT NULL,
  `value` longtext NOT NULL,
  PRIMARY KEY  (`key`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `jos_jp_temp`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `jos_menu`
--

CREATE TABLE IF NOT EXISTS `jos_menu` (
  `id` int(11) NOT NULL auto_increment,
  `menutype` varchar(75) default NULL,
  `name` varchar(255) default NULL,
  `alias` varchar(255) NOT NULL default '',
  `link` text,
  `type` varchar(50) NOT NULL default '',
  `published` tinyint(1) NOT NULL default '0',
  `parent` int(11) unsigned NOT NULL default '0',
  `componentid` int(11) unsigned NOT NULL default '0',
  `sublevel` int(11) default '0',
  `ordering` int(11) default '0',
  `checked_out` int(11) unsigned NOT NULL default '0',
  `checked_out_time` datetime NOT NULL default '0000-00-00 00:00:00',
  `pollid` int(11) NOT NULL default '0',
  `browserNav` tinyint(4) default '0',
  `access` tinyint(3) unsigned NOT NULL default '0',
  `utaccess` tinyint(3) unsigned NOT NULL default '0',
  `params` text NOT NULL,
  `lft` int(11) unsigned NOT NULL default '0',
  `rgt` int(11) unsigned NOT NULL default '0',
  `home` int(1) unsigned NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `componentid` (`componentid`,`menutype`,`published`,`access`),
  KEY `menutype` (`menutype`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=102 ;

--
-- Extraindo dados da tabela `jos_menu`
--

INSERT INTO `jos_menu` (`id`, `menutype`, `name`, `alias`, `link`, `type`, `published`, `parent`, `componentid`, `sublevel`, `ordering`, `checked_out`, `checked_out_time`, `pollid`, `browserNav`, `access`, `utaccess`, `params`, `lft`, `rgt`, `home`) VALUES
(1, 'mainmenu', 'Home', 'home', 'index.php?option=com_content&view=category&layout=blog&id=1', 'component', 1, 0, 20, 0, 1, 0, '0000-00-00 00:00:00', 0, 0, 0, 3, 'show_description=0\nshow_description_image=0\nnum_leading_articles=0\nnum_intro_articles=5\nnum_columns=1\nnum_links=5\norderby_pri=\norderby_sec=\nmulti_column_order=0\nshow_pagination=2\nshow_pagination_results=1\nshow_feed_link=1\nshow_noauth=\nshow_title=\nlink_titles=1\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=1\nshow_modify_date=0\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=0\nshow_print_icon=0\nshow_email_icon=0\nshow_hits=\nfeed_summary=\npage_title=Escola Oficina Dos Sonhos\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 1),
(78, 'topmenu', 'Indicação de Leitura', 'indicacao-de-leitura', 'index.php?option=com_content&view=article&id=78', 'component', 1, 77, 20, 1, 5, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(3, 'mainmenu', 'Notícias', 'noticias', 'index.php?option=com_content&view=category&layout=blog&id=1', 'component', 1, 0, 20, 0, 3, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_description=1\nshow_description_image=0\nnum_leading_articles=0\nnum_intro_articles=6\nnum_columns=1\nnum_links=5\norderby_pri=\norderby_sec=\nmulti_column_order=0\nshow_pagination=2\nshow_pagination_results=1\nshow_feed_link=1\nshow_noauth=\nshow_title=\nlink_titles=1\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=1\nshow_modify_date=0\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=0\nshow_print_icon=0\nshow_email_icon=0\nshow_hits=\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(5, 'mainmenu', 'Coord. Pedagógica', 'coordenacao-pedagogica', 'index.php?option=com_content&view=article&id=34', 'component', 1, 0, 20, 0, 5, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(79, 'mainmenu', 'Calendário Letivo', 'calendario-letivo', 'index.php?option=com_eventlist&view=categoryevents&id=2', 'component', 1, 48, 40, 1, 6, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'display_num=\ncat_num=4\nfilter=\ndisplay=\nicons=\nshow_print_icon=\nshow_email_icon=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(80, 'topmenu', 'Calendário Letivo', 'calendario-letivo', 'index.php?option=com_eventlist&view=categoryevents&id=2', 'component', 1, 61, 40, 1, 6, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'display_num=\ncat_num=4\nfilter=\ndisplay=\nicons=\nshow_print_icon=\nshow_email_icon=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(92, 'mainmenu', 'Educação Infantil', 'educacao-infantil', 'index.php?option=com_phocagallery&view=category&id=3', 'component', 1, 88, 41, 1, 1, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_pagination=1\nshow_pagination_limit=1\nshow_feed_link=1\ndisplay_cat_name_title=1\ndisplay_cat_name_breadcrumbs=0\nfont_color=\nbackground_color=\nbackground_color_hover=\nimage_background_color=\nimage_background_shadow=\nborder_color=\nborder_color_hover=\nmargin_box=\npadding_box=\ndisplay_name=\ndisplay_icon_detail=\ndisplay_icon_download=\ndisplay_icon_folder=\nfont_size_name=\nchar_length_name=\ncategory_box_space=\ndisplay_categories_sub=\ndisplay_subcat_page=\ndisplay_icon_random_image=\ndisplay_back_button=\ndisplay_categories_back_button=\ndisplay_categories_cv=\ndisplay_subcat_page_cv=\ndisplay_icon_random_image_cv=\ndisplay_back_button_cv=\ndisplay_categories_back_button_cv=\ncategories_columns_cv=\ndisplay_image_categories_cv=\nimage_categories_size_cv=\ncategories_columns=\ndisplay_image_categories=\nimage_categories_size=\ndisplay_subcategories=\ndisplay_empty_categories=\nhide_categories=\ndisplay_access_category=\ndetail_window=\ndetail_window_background_color=\nmodal_box_overlay_color=\nmodal_box_overlay_opacity=\nmodal_box_border_color=\nmodal_box_border_width=\nsb_slideshow_delay=\nsb_lang=\ndisplay_description_detail=\ndisplay_title_description=\nfont_size_desc=\nfont_color_desc=\ndescription_detail_height=\ndescription_lightbox_font_size=\ndescription_lightbox_font_color=\ndescription_lightbox_bg_color=\nslideshow_delay=\nslideshow_pause=\nslideshow_random=\ndetail_buttons=\nphocagallery_width=\ndisplay_phoca_info=\ndefault_pagination=\npagination=\ncategory_ordering=\nimage_ordering=\nenable_piclens=\nstart_piclens=\npiclens_image=\nswitch_image=\nswitch_width=\nswitch_height=\nenable_overlib=\nol_bg_color=\nol_fg_color=\nol_tf_color=\nol_cf_color=\noverlib_overlay_opacity=\ncreate_watermark=\nwatermark_position_x=\nwatermark_position_y=\ndisplay_icon_vm=\nenable_user_cp=\nmax_create_cat_char=\ndisplay_rating=\ndisplay_comment=\ncomment_width=\nmax_comment_char=\ndisplay_category_statistics=\ndisplay_main_cat_stat=\ndisplay_lastadded_cat_stat=\ncount_lastadded_cat_stat=\ndisplay_mostviewed_cat_stat=\ncount_mostviewed_cat_stat=\ndisplay_camera_info=\nexif_information=\ngoogle_maps_api_key=\ndisplay_categories_geotagging=\ncategories_lng=\ncategories_lat=\ncategories_zoom=\ncategories_map_width=\ncategories_map_height=\ndisplay_icon_geotagging=\ndisplay_category_geotagging=\ncategory_map_width=\ncategory_map_height=\ndisplay_title_upload=\ndisplay_description_upload=\nmax_upload_char=\nupload_maxsize=\ncat_folder_maxsize=\nenable_java=\njava_resize_width=\njava_resize_height=\njava_box_width=\njava_box_height=\npagination_thumbnail_creation=\nclean_thumbnails=\nenable_thumb_creation=\ncrop_thumbnail=\njpeg_quality=\nicon_format=\nlarge_image_width=\nlarge_image_height=\nmedium_image_width=\nmedium_image_height=\nsmall_image_width=\nsmall_image_height=\nfront_modal_box_width=\nfront_modal_box_height=\nadmin_modal_box_width=\nadmin_modal_box_height=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(73, 'topmenu', 'Informativo', 'informativo', 'index.php?option=com_content&view=article&id=77', 'component', 1, 77, 20, 1, 1, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(17, 'othermenu', 'Home', 'home', 'index.php?option=com_content&view=category&layout=blog&id=1', 'component', 1, 0, 20, 0, 1, 0, '0000-00-00 00:00:00', 0, 0, 0, 3, 'show_description=0\nshow_description_image=0\nnum_leading_articles=0\nnum_intro_articles=5\nnum_columns=1\nnum_links=5\norderby_pri=\norderby_sec=\nmulti_column_order=0\nshow_pagination=2\nshow_pagination_results=1\nshow_feed_link=1\nshow_noauth=\nshow_title=\nlink_titles=1\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=1\nshow_modify_date=0\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=0\nshow_print_icon=0\nshow_email_icon=0\nshow_hits=\nfeed_summary=\npage_title=Escola Oficina Dos Sonhos\nshow_page_title=1\npageclass_sfx=\nmenu_image=home_64x64.png\nsecure=0\n\n', 0, 0, 0),
(18, 'othermenu', 'Links', 'links', 'index.php?option=com_weblinks&view=categories', 'component', 1, 0, 4, 0, 2, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'image=-1\nimage_align=right\nshow_feed_link=1\nshow_comp_description=\ncomp_description=<img src="http://localhost/oficina/images/stories/web.png" hspace="5" align="left" />Nós estamos regularmente na Internet. Quando achamos um site legal nós o listamos aqui para o seu divertimento. \\nDa lista abaixo selecione uma categoria e então um site para visitar.\nshow_link_hits=\nshow_link_description=\nshow_other_cats=\nshow_headings=\ntarget=\nlink_icons=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=product-big.png\nsecure=0\n\n', 0, 0, 0),
(19, 'othermenu', 'Contato', 'contato', 'index.php?option=com_contact&view=category&catid=12', 'component', 1, 0, 7, 0, 3, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'display_num=20\nimage=-1\nimage_align=right\nshow_limit=0\nshow_feed_link=1\ncontact_icons=\nicon_address=\nicon_email=\nicon_telephone=\nicon_mobile=\nicon_fax=\nicon_misc=\nshow_headings=0\nshow_position=\nshow_email=\nshow_telephone=0\nshow_mobile=0\nshow_fax=0\nallow_vcard=\nbanned_email=\nbanned_subject=\nbanned_text=\nvalidate_session=\ncustom_reply=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=email2.png\nsecure=0\n\n', 0, 0, 0),
(20, 'othermenu', 'Galeria de Fotos', 'galeria-de-fotos', 'index.php?option=com_phocagallery&view=categories', 'component', 1, 0, 41, 0, 4, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'image=-1\nimage_align=right\nshow_pagination=1\nshow_pagination_limit=1\nshow_feed_link=1\ndisplay_cat_name_title=1\nfont_color=\nbackground_color=\nbackground_color_hover=\nimage_background_color=\nimage_background_shadow=\nborder_color=\nborder_color_hover=\nmargin_box=\npadding_box=\ndisplay_name=\ndisplay_icon_detail=\ndisplay_icon_download=\ndisplay_icon_folder=\nfont_size_name=\nchar_length_name=\ncategory_box_space=\ndisplay_categories_sub=\ndisplay_subcat_page=\ndisplay_icon_random_image=\ndisplay_back_button=\ndisplay_categories_back_button=\ndisplay_categories_cv=\ndisplay_subcat_page_cv=\ndisplay_icon_random_image_cv=\ndisplay_back_button_cv=\ndisplay_categories_back_button_cv=\ncategories_columns_cv=\ndisplay_image_categories_cv=\nimage_categories_size_cv=\ncategories_columns=\ndisplay_image_categories=\nimage_categories_size=\ndisplay_subcategories=\ndisplay_empty_categories=\nhide_categories=\ndisplay_access_category=\ndetail_window=\ndetail_window_background_color=\nmodal_box_overlay_color=\nmodal_box_overlay_opacity=\nmodal_box_border_color=\nmodal_box_border_width=\nsb_slideshow_delay=\nsb_lang=\ndisplay_description_detail=\ndisplay_title_description=\nfont_size_desc=\nfont_color_desc=\ndescription_detail_height=\ndescription_lightbox_font_size=\ndescription_lightbox_font_color=\ndescription_lightbox_bg_color=\nslideshow_delay=\nslideshow_pause=\nslideshow_random=\ndetail_buttons=\nphocagallery_width=\ndisplay_phoca_info=\ndefault_pagination=\npagination=\ncategory_ordering=\nimage_ordering=\nenable_piclens=\nstart_piclens=\npiclens_image=\nswitch_image=\nswitch_width=\nswitch_height=\nenable_overlib=\nol_bg_color=\nol_fg_color=\nol_tf_color=\nol_cf_color=\noverlib_overlay_opacity=\ncreate_watermark=\nwatermark_position_x=\nwatermark_position_y=\ndisplay_icon_vm=\nenable_user_cp=\nmax_create_cat_char=\ndisplay_rating=\ndisplay_comment=\ncomment_width=\nmax_comment_char=\ndisplay_category_statistics=\ndisplay_main_cat_stat=\ndisplay_lastadded_cat_stat=\ncount_lastadded_cat_stat=\ndisplay_mostviewed_cat_stat=\ncount_mostviewed_cat_stat=\ndisplay_camera_info=\nexif_information=\ngoogle_maps_api_key=\ndisplay_categories_geotagging=\ncategories_lng=\ncategories_lat=\ncategories_zoom=\ncategories_map_width=\ncategories_map_height=\ndisplay_icon_geotagging=\ndisplay_category_geotagging=\ncategory_map_width=\ncategory_map_height=\ndisplay_title_upload=\ndisplay_description_upload=\nmax_upload_char=\nupload_maxsize=\ncat_folder_maxsize=\nenable_java=\njava_resize_width=\njava_resize_height=\njava_box_width=\njava_box_height=\npagination_thumbnail_creation=\nclean_thumbnails=\nenable_thumb_creation=\ncrop_thumbnail=\njpeg_quality=\nicon_format=\nlarge_image_width=\nlarge_image_height=\nmedium_image_width=\nmedium_image_height=\nsmall_image_width=\nsmall_image_height=\nfront_modal_box_width=\nfront_modal_box_height=\nadmin_modal_box_width=\nadmin_modal_box_height=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=photo.png\nsecure=0\n\n', 0, 0, 0),
(76, 'topmenu', 'Lista de Materiais Educação Infantil', 'lista-de-materiais-educacao-infantil', 'index.php?option=com_content&view=article&id=104', 'component', 1, 77, 20, 1, 4, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(77, 'topmenu', 'Oficina 100%', 'oficina-100', 'index.php?option=com_content&view=category&id=33', 'component', 1, 0, 20, 0, 3, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'display_num=0\nshow_headings=1\nshow_date=0\ndate_format=\nfilter=0\nfilter_type=title\norderby_sec=order\nshow_pagination=0\nshow_pagination_limit=0\nshow_feed_link=0\nshow_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=0\nshow_create_date=0\nshow_modify_date=0\nshow_item_navigation=0\nshow_readmore=\nshow_vote=0\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=0\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(75, 'topmenu', 'Lista Materiais Educação Fundamental', 'lista-materiais-educacao-fundamental', 'index.php?option=com_content&view=article&id=134', 'component', 1, 77, 20, 1, 3, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(74, 'topmenu', 'Transporte Escolar', 'transporte-escolar', 'index.php?option=com_content&view=article&id=46', 'component', 1, 77, 20, 1, 2, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(29, 'topmenu', 'A Escola', 'a-escola', 'index.php?option=com_content&view=category&id=35', 'component', 1, 0, 20, 0, 2, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'display_num=0\nshow_headings=1\nshow_date=0\ndate_format=\nfilter=0\nfilter_type=title\norderby_sec=order\nshow_pagination=0\nshow_pagination_limit=0\nshow_feed_link=0\nshow_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=0\nshow_create_date=0\nshow_modify_date=0\nshow_item_navigation=0\nshow_readmore=\nshow_vote=0\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=0\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(30, 'topmenu', 'Palavra da Direção', 'palavra-da-direcao', 'index.php?option=com_content&view=article&id=158', 'component', 1, 29, 20, 1, 1, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(31, 'topmenu', 'Princípios e Valores', 'principios-e-valores', 'index.php?option=com_content&view=article&id=159', 'component', 1, 29, 20, 1, 2, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(32, 'topmenu', 'Histórico', 'historico', 'index.php?option=com_content&view=article&id=160', 'component', 1, 29, 20, 1, 3, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(33, 'topmenu', 'Localização', 'localizacao', 'index.php?option=com_content&view=article&id=161', 'component', 1, 29, 20, 1, 4, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(34, 'topmenu', 'Estrutura', 'estrutura', 'index.php?option=com_content&view=article&id=162', 'component', 1, 29, 20, 1, 5, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(36, 'mainmenu', 'A Escola', 'a-escola', 'index.php?option=com_content&view=category&id=35', 'component', 1, 0, 20, 0, 2, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'display_num=0\nshow_headings=1\nshow_date=0\ndate_format=\nfilter=0\nfilter_type=title\norderby_sec=order\nshow_pagination=0\nshow_pagination_limit=0\nshow_feed_link=0\nshow_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=0\nshow_create_date=0\nshow_modify_date=0\nshow_item_navigation=0\nshow_readmore=\nshow_vote=0\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=0\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(37, 'mainmenu', 'Palavra da Direção', 'palavra-da-direcao', 'index.php?option=com_content&view=article&id=158', 'component', 1, 36, 20, 1, 1, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(38, 'mainmenu', 'Princípios e Valores', 'principios-e-valores', 'index.php?option=com_content&view=article&id=159', 'component', 1, 36, 20, 1, 2, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(39, 'mainmenu', 'Histórico', 'historico', 'index.php?option=com_content&view=article&id=160', 'component', 1, 36, 20, 1, 3, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(40, 'mainmenu', 'Localização', 'localizacao', 'index.php?option=com_content&view=article&id=161', 'component', 1, 36, 20, 1, 4, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(41, 'mainmenu', 'Estrutura', 'estrutura', 'index.php?option=com_content&view=article&id=162', 'component', 1, 36, 20, 1, 5, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(42, 'mainmenu', 'Informativo', 'informativo', 'index.php?option=com_content&view=article&id=77', 'component', 1, 46, 20, 1, 1, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(43, 'mainmenu', 'Transporte Escolar', 'transporte-escolar', 'index.php?option=com_content&view=article&id=46', 'component', 1, 46, 20, 1, 2, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(44, 'mainmenu', 'Lista Materiais Educação Fundamental', 'lista-materiais-educacao-fundamental', 'index.php?option=com_content&view=article&id=134', 'component', 1, 46, 20, 1, 3, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(45, 'mainmenu', 'Lista de Materiais Educação Infantil', 'lista-de-materiais-educacao-infantil', 'index.php?option=com_content&view=article&id=104', 'component', 1, 46, 20, 1, 4, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(46, 'mainmenu', 'Oficina 100%', 'oficina-100', 'index.php?option=com_content&view=category&id=33', 'component', 1, 0, 20, 0, 4, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'display_num=0\nshow_headings=1\nshow_date=0\ndate_format=\nfilter=0\nfilter_type=title\norderby_sec=order\nshow_pagination=0\nshow_pagination_limit=0\nshow_feed_link=0\nshow_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=0\nshow_create_date=0\nshow_modify_date=0\nshow_item_navigation=0\nshow_readmore=\nshow_vote=0\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=0\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(47, 'mainmenu', 'Indicação de Leitura', 'indicacao-de-leitura', 'index.php?option=com_content&view=article&id=78', 'component', 1, 46, 20, 1, 5, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(48, 'mainmenu', 'Ensino Fundamental', 'ensino-fundamental', 'index.php?option=com_content&view=category&id=19', 'component', 1, 0, 20, 0, 6, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'display_num=0\nshow_headings=1\nshow_date=0\ndate_format=\nfilter=0\nfilter_type=title\norderby_sec=order\nshow_pagination=0\nshow_pagination_limit=0\nshow_feed_link=0\nshow_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=0\nshow_create_date=0\nshow_modify_date=0\nshow_item_navigation=0\nshow_readmore=\nshow_vote=0\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=0\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(49, 'mainmenu', 'Para Refletir', 'para-refletir', 'index.php?option=com_content&view=article&id=16', 'component', 1, 48, 20, 1, 1, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(50, 'mainmenu', 'Indicação de Leitura', 'indicacao-de-leitura', 'index.php?option=com_content&view=article&id=33', 'component', 1, 48, 20, 1, 2, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(51, 'mainmenu', 'Proposta Pedagógica', 'proposta-pedagogica', 'index.php?option=com_content&view=article&id=18', 'component', 1, 48, 20, 1, 3, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(52, 'mainmenu', 'Informativo', 'informativo', 'index.php?option=com_content&view=article&id=19', 'component', 1, 48, 20, 1, 4, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(53, 'mainmenu', 'Galeria de Fotos', 'galeria-de-fotos', 'index.php?option=com_phocagallery&view=category&id=42', 'component', 1, 48, 41, 1, 5, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_pagination=1\nshow_pagination_limit=1\nshow_feed_link=1\ndisplay_cat_name_title=1\ndisplay_cat_name_breadcrumbs=0\nfont_color=\nbackground_color=\nbackground_color_hover=\nimage_background_color=\nimage_background_shadow=\nborder_color=\nborder_color_hover=\nmargin_box=\npadding_box=\ndisplay_name=\ndisplay_icon_detail=\ndisplay_icon_download=\ndisplay_icon_folder=\nfont_size_name=\nchar_length_name=\ncategory_box_space=\ndisplay_categories_sub=\ndisplay_subcat_page=\ndisplay_icon_random_image=\ndisplay_back_button=\ndisplay_categories_back_button=\ndisplay_categories_cv=\ndisplay_subcat_page_cv=\ndisplay_icon_random_image_cv=\ndisplay_back_button_cv=\ndisplay_categories_back_button_cv=\ncategories_columns_cv=\ndisplay_image_categories_cv=\nimage_categories_size_cv=\ncategories_columns=\ndisplay_image_categories=\nimage_categories_size=\ndisplay_subcategories=\ndisplay_empty_categories=\nhide_categories=\ndisplay_access_category=\ndetail_window=\ndetail_window_background_color=\nmodal_box_overlay_color=\nmodal_box_overlay_opacity=\nmodal_box_border_color=\nmodal_box_border_width=\nsb_slideshow_delay=\nsb_lang=\ndisplay_description_detail=\ndisplay_title_description=\nfont_size_desc=\nfont_color_desc=\ndescription_detail_height=\ndescription_lightbox_font_size=\ndescription_lightbox_font_color=\ndescription_lightbox_bg_color=\nslideshow_delay=\nslideshow_pause=\nslideshow_random=\ndetail_buttons=\nphocagallery_width=\ndisplay_phoca_info=\ndefault_pagination=\npagination=\ncategory_ordering=\nimage_ordering=\nenable_piclens=\nstart_piclens=\npiclens_image=\nswitch_image=\nswitch_width=\nswitch_height=\nenable_overlib=\nol_bg_color=\nol_fg_color=\nol_tf_color=\nol_cf_color=\noverlib_overlay_opacity=\ncreate_watermark=\nwatermark_position_x=\nwatermark_position_y=\ndisplay_icon_vm=\nenable_user_cp=\nmax_create_cat_char=\ndisplay_rating=\ndisplay_comment=\ncomment_width=\nmax_comment_char=\ndisplay_category_statistics=\ndisplay_main_cat_stat=\ndisplay_lastadded_cat_stat=\ncount_lastadded_cat_stat=\ndisplay_mostviewed_cat_stat=\ncount_mostviewed_cat_stat=\ndisplay_camera_info=\nexif_information=\ngoogle_maps_api_key=\ndisplay_categories_geotagging=\ncategories_lng=\ncategories_lat=\ncategories_zoom=\ncategories_map_width=\ncategories_map_height=\ndisplay_icon_geotagging=\ndisplay_category_geotagging=\ncategory_map_width=\ncategory_map_height=\ndisplay_title_upload=\ndisplay_description_upload=\nmax_upload_char=\nupload_maxsize=\ncat_folder_maxsize=\nenable_java=\njava_resize_width=\njava_resize_height=\njava_box_width=\njava_box_height=\npagination_thumbnail_creation=\nclean_thumbnails=\nenable_thumb_creation=\ncrop_thumbnail=\njpeg_quality=\nicon_format=\nlarge_image_width=\nlarge_image_height=\nmedium_image_width=\nmedium_image_height=\nsmall_image_width=\nsmall_image_height=\nfront_modal_box_width=\nfront_modal_box_height=\nadmin_modal_box_width=\nadmin_modal_box_height=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(54, 'mainmenu', 'Educação Infantil', 'educacao-infantil', 'index.php?option=com_content&view=category&id=20', 'component', 1, 0, 20, 0, 7, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'display_num=0\nshow_headings=1\nshow_date=0\ndate_format=\nfilter=0\nfilter_type=title\norderby_sec=order\nshow_pagination=0\nshow_pagination_limit=0\nshow_feed_link=0\nshow_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=0\nshow_create_date=0\nshow_modify_date=0\nshow_item_navigation=0\nshow_readmore=\nshow_vote=0\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=0\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(55, 'mainmenu', 'Proposta Pedagógica', 'proposta-pedagogica', 'index.php?option=com_content&view=article&id=48', 'component', 1, 54, 20, 1, 1, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(56, 'mainmenu', 'Indicação de Leitura', 'indicacao-de-leitura', 'index.php?option=com_content&view=article&id=31', 'component', 1, 54, 20, 1, 2, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(57, 'mainmenu', 'Hora da Diversão', 'hora-da-diversao', 'index.php?option=com_content&view=article&id=21', 'component', 0, 54, 20, 1, 3, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(58, 'mainmenu', 'Galeria de Fotos', 'galeria-de-fotos', 'index.php?option=com_phocagallery&view=category&id=3', 'component', 1, 54, 41, 1, 4, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_pagination=1\nshow_pagination_limit=1\nshow_feed_link=1\ndisplay_cat_name_title=1\ndisplay_cat_name_breadcrumbs=0\nfont_color=\nbackground_color=\nbackground_color_hover=\nimage_background_color=\nimage_background_shadow=\nborder_color=\nborder_color_hover=\nmargin_box=\npadding_box=\ndisplay_name=\ndisplay_icon_detail=\ndisplay_icon_download=\ndisplay_icon_folder=\nfont_size_name=\nchar_length_name=\ncategory_box_space=\ndisplay_categories_sub=\ndisplay_subcat_page=\ndisplay_icon_random_image=\ndisplay_back_button=\ndisplay_categories_back_button=\ndisplay_categories_cv=\ndisplay_subcat_page_cv=\ndisplay_icon_random_image_cv=\ndisplay_back_button_cv=\ndisplay_categories_back_button_cv=\ncategories_columns_cv=\ndisplay_image_categories_cv=\nimage_categories_size_cv=\ncategories_columns=\ndisplay_image_categories=\nimage_categories_size=\ndisplay_subcategories=\ndisplay_empty_categories=\nhide_categories=\ndisplay_access_category=\ndetail_window=\ndetail_window_background_color=\nmodal_box_overlay_color=\nmodal_box_overlay_opacity=\nmodal_box_border_color=\nmodal_box_border_width=\nsb_slideshow_delay=\nsb_lang=\ndisplay_description_detail=\ndisplay_title_description=\nfont_size_desc=\nfont_color_desc=\ndescription_detail_height=\ndescription_lightbox_font_size=\ndescription_lightbox_font_color=\ndescription_lightbox_bg_color=\nslideshow_delay=\nslideshow_pause=\nslideshow_random=\ndetail_buttons=\nphocagallery_width=\ndisplay_phoca_info=\ndefault_pagination=\npagination=\ncategory_ordering=\nimage_ordering=\nenable_piclens=\nstart_piclens=\npiclens_image=\nswitch_image=\nswitch_width=\nswitch_height=\nenable_overlib=\nol_bg_color=\nol_fg_color=\nol_tf_color=\nol_cf_color=\noverlib_overlay_opacity=\ncreate_watermark=\nwatermark_position_x=\nwatermark_position_y=\ndisplay_icon_vm=\nenable_user_cp=\nmax_create_cat_char=\ndisplay_rating=\ndisplay_comment=\ncomment_width=\nmax_comment_char=\ndisplay_category_statistics=\ndisplay_main_cat_stat=\ndisplay_lastadded_cat_stat=\ncount_lastadded_cat_stat=\ndisplay_mostviewed_cat_stat=\ncount_mostviewed_cat_stat=\ndisplay_camera_info=\nexif_information=\ngoogle_maps_api_key=\ndisplay_categories_geotagging=\ncategories_lng=\ncategories_lat=\ncategories_zoom=\ncategories_map_width=\ncategories_map_height=\ndisplay_icon_geotagging=\ndisplay_category_geotagging=\ncategory_map_width=\ncategory_map_height=\ndisplay_title_upload=\ndisplay_description_upload=\nmax_upload_char=\nupload_maxsize=\ncat_folder_maxsize=\nenable_java=\njava_resize_width=\njava_resize_height=\njava_box_width=\njava_box_height=\npagination_thumbnail_creation=\nclean_thumbnails=\nenable_thumb_creation=\ncrop_thumbnail=\njpeg_quality=\nicon_format=\nlarge_image_width=\nlarge_image_height=\nmedium_image_width=\nmedium_image_height=\nsmall_image_width=\nsmall_image_height=\nfront_modal_box_width=\nfront_modal_box_height=\nadmin_modal_box_width=\nadmin_modal_box_height=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(59, 'mainmenu', 'Projetos', 'projetos', 'index.php?option=com_content&view=category&layout=blog&id=30', 'component', 1, 54, 20, 1, 5, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_description=1\nshow_description_image=0\nnum_leading_articles=0\nnum_intro_articles=6\nnum_columns=1\nnum_links=5\norderby_pri=\norderby_sec=\nmulti_column_order=0\nshow_pagination=2\nshow_pagination_results=1\nshow_feed_link=1\nshow_noauth=\nshow_title=\nlink_titles=1\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=1\nshow_modify_date=0\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=0\nshow_print_icon=0\nshow_email_icon=0\nshow_hits=\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(60, 'mainmenu', 'Aulas Extra', 'aulas-extra', 'index.php?option=com_content&view=category&layout=blog&id=22', 'component', 1, 0, 20, 0, 8, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_description=1\nshow_description_image=0\nnum_leading_articles=0\nnum_intro_articles=6\nnum_columns=1\nnum_links=5\norderby_pri=\norderby_sec=\nmulti_column_order=0\nshow_pagination=2\nshow_pagination_results=1\nshow_feed_link=1\nshow_noauth=\nshow_title=\nlink_titles=1\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=1\nshow_modify_date=0\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=0\nshow_print_icon=0\nshow_email_icon=0\nshow_hits=\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(61, 'topmenu', 'Ensino Fundamental', 'ensino-fundamental', 'index.php?option=com_content&view=category&id=19', 'component', 1, 0, 20, 0, 4, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'display_num=0\nshow_headings=1\nshow_date=0\ndate_format=\nfilter=0\nfilter_type=title\norderby_sec=order\nshow_pagination=0\nshow_pagination_limit=0\nshow_feed_link=0\nshow_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=0\nshow_create_date=0\nshow_modify_date=0\nshow_item_navigation=0\nshow_readmore=\nshow_vote=0\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=0\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(62, 'topmenu', 'Para Refletir', 'para-refletir', 'index.php?option=com_content&view=article&id=16', 'component', 1, 61, 20, 1, 1, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(63, 'topmenu', 'Indicação de Leitura', 'indicacao-de-leitura', 'index.php?option=com_content&view=article&id=33', 'component', 1, 61, 20, 1, 2, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(64, 'topmenu', 'Proposta Pedagógica', 'proposta-pedagogica', 'index.php?option=com_content&view=article&id=18', 'component', 1, 61, 20, 1, 3, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(65, 'topmenu', 'Informativo', 'informativo', 'index.php?option=com_content&view=article&id=19', 'component', 1, 61, 20, 1, 4, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(66, 'topmenu', 'Galeria de Fotos', 'galeria-de-fotos', 'index.php?option=com_phocagallery&view=category&id=42', 'component', 1, 61, 41, 1, 5, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_pagination=1\nshow_pagination_limit=1\nshow_feed_link=1\ndisplay_cat_name_title=1\ndisplay_cat_name_breadcrumbs=0\nfont_color=\nbackground_color=\nbackground_color_hover=\nimage_background_color=\nimage_background_shadow=\nborder_color=\nborder_color_hover=\nmargin_box=\npadding_box=\ndisplay_name=\ndisplay_icon_detail=\ndisplay_icon_download=\ndisplay_icon_folder=\nfont_size_name=\nchar_length_name=\ncategory_box_space=\ndisplay_categories_sub=\ndisplay_subcat_page=\ndisplay_icon_random_image=\ndisplay_back_button=\ndisplay_categories_back_button=\ndisplay_categories_cv=\ndisplay_subcat_page_cv=\ndisplay_icon_random_image_cv=\ndisplay_back_button_cv=\ndisplay_categories_back_button_cv=\ncategories_columns_cv=\ndisplay_image_categories_cv=\nimage_categories_size_cv=\ncategories_columns=\ndisplay_image_categories=\nimage_categories_size=\ndisplay_subcategories=\ndisplay_empty_categories=\nhide_categories=\ndisplay_access_category=\ndetail_window=\ndetail_window_background_color=\nmodal_box_overlay_color=\nmodal_box_overlay_opacity=\nmodal_box_border_color=\nmodal_box_border_width=\nsb_slideshow_delay=\nsb_lang=\ndisplay_description_detail=\ndisplay_title_description=\nfont_size_desc=\nfont_color_desc=\ndescription_detail_height=\ndescription_lightbox_font_size=\ndescription_lightbox_font_color=\ndescription_lightbox_bg_color=\nslideshow_delay=\nslideshow_pause=\nslideshow_random=\ndetail_buttons=\nphocagallery_width=\ndisplay_phoca_info=\ndefault_pagination=\npagination=\ncategory_ordering=\nimage_ordering=\nenable_piclens=\nstart_piclens=\npiclens_image=\nswitch_image=\nswitch_width=\nswitch_height=\nenable_overlib=\nol_bg_color=\nol_fg_color=\nol_tf_color=\nol_cf_color=\noverlib_overlay_opacity=\ncreate_watermark=\nwatermark_position_x=\nwatermark_position_y=\ndisplay_icon_vm=\nenable_user_cp=\nmax_create_cat_char=\ndisplay_rating=\ndisplay_comment=\ncomment_width=\nmax_comment_char=\ndisplay_category_statistics=\ndisplay_main_cat_stat=\ndisplay_lastadded_cat_stat=\ncount_lastadded_cat_stat=\ndisplay_mostviewed_cat_stat=\ncount_mostviewed_cat_stat=\ndisplay_camera_info=\nexif_information=\ngoogle_maps_api_key=\ndisplay_categories_geotagging=\ncategories_lng=\ncategories_lat=\ncategories_zoom=\ncategories_map_width=\ncategories_map_height=\ndisplay_icon_geotagging=\ndisplay_category_geotagging=\ncategory_map_width=\ncategory_map_height=\ndisplay_title_upload=\ndisplay_description_upload=\nmax_upload_char=\nupload_maxsize=\ncat_folder_maxsize=\nenable_java=\njava_resize_width=\njava_resize_height=\njava_box_width=\njava_box_height=\npagination_thumbnail_creation=\nclean_thumbnails=\nenable_thumb_creation=\ncrop_thumbnail=\njpeg_quality=\nicon_format=\nlarge_image_width=\nlarge_image_height=\nmedium_image_width=\nmedium_image_height=\nsmall_image_width=\nsmall_image_height=\nfront_modal_box_width=\nfront_modal_box_height=\nadmin_modal_box_width=\nadmin_modal_box_height=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(67, 'topmenu', 'Educação Infantil', 'educacao-infantil', 'index.php?option=com_content&view=category&id=20', 'component', 1, 0, 20, 0, 5, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'display_num=0\nshow_headings=1\nshow_date=0\ndate_format=\nfilter=0\nfilter_type=title\norderby_sec=order\nshow_pagination=0\nshow_pagination_limit=0\nshow_feed_link=0\nshow_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=0\nshow_create_date=0\nshow_modify_date=0\nshow_item_navigation=0\nshow_readmore=\nshow_vote=0\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=0\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(68, 'topmenu', 'Proposta Pedagógica', 'proposta-pedagogica', 'index.php?option=com_content&view=article&id=48', 'component', 1, 67, 20, 1, 1, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(69, 'topmenu', 'Indicação de Leitura', 'indicacao-de-leitura', 'index.php?option=com_content&view=article&id=31', 'component', 1, 67, 20, 1, 2, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(70, 'topmenu', 'Hora da Diversão', 'hora-da-diversao', 'index.php?option=com_content&view=article&id=21', 'component', 0, 67, 20, 1, 3, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0);
INSERT INTO `jos_menu` (`id`, `menutype`, `name`, `alias`, `link`, `type`, `published`, `parent`, `componentid`, `sublevel`, `ordering`, `checked_out`, `checked_out_time`, `pollid`, `browserNav`, `access`, `utaccess`, `params`, `lft`, `rgt`, `home`) VALUES
(71, 'topmenu', 'Galeria de Fotos', 'galeria-de-fotos', 'index.php?option=com_phocagallery&view=category&id=3', 'component', 1, 67, 41, 1, 4, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_pagination=1\nshow_pagination_limit=1\nshow_feed_link=1\ndisplay_cat_name_title=1\ndisplay_cat_name_breadcrumbs=0\nfont_color=\nbackground_color=\nbackground_color_hover=\nimage_background_color=\nimage_background_shadow=\nborder_color=\nborder_color_hover=\nmargin_box=\npadding_box=\ndisplay_name=\ndisplay_icon_detail=\ndisplay_icon_download=\ndisplay_icon_folder=\nfont_size_name=\nchar_length_name=\ncategory_box_space=\ndisplay_categories_sub=\ndisplay_subcat_page=\ndisplay_icon_random_image=\ndisplay_back_button=\ndisplay_categories_back_button=\ndisplay_categories_cv=\ndisplay_subcat_page_cv=\ndisplay_icon_random_image_cv=\ndisplay_back_button_cv=\ndisplay_categories_back_button_cv=\ncategories_columns_cv=\ndisplay_image_categories_cv=\nimage_categories_size_cv=\ncategories_columns=\ndisplay_image_categories=\nimage_categories_size=\ndisplay_subcategories=\ndisplay_empty_categories=\nhide_categories=\ndisplay_access_category=\ndetail_window=\ndetail_window_background_color=\nmodal_box_overlay_color=\nmodal_box_overlay_opacity=\nmodal_box_border_color=\nmodal_box_border_width=\nsb_slideshow_delay=\nsb_lang=\ndisplay_description_detail=\ndisplay_title_description=\nfont_size_desc=\nfont_color_desc=\ndescription_detail_height=\ndescription_lightbox_font_size=\ndescription_lightbox_font_color=\ndescription_lightbox_bg_color=\nslideshow_delay=\nslideshow_pause=\nslideshow_random=\ndetail_buttons=\nphocagallery_width=\ndisplay_phoca_info=\ndefault_pagination=\npagination=\ncategory_ordering=\nimage_ordering=\nenable_piclens=\nstart_piclens=\npiclens_image=\nswitch_image=\nswitch_width=\nswitch_height=\nenable_overlib=\nol_bg_color=\nol_fg_color=\nol_tf_color=\nol_cf_color=\noverlib_overlay_opacity=\ncreate_watermark=\nwatermark_position_x=\nwatermark_position_y=\ndisplay_icon_vm=\nenable_user_cp=\nmax_create_cat_char=\ndisplay_rating=\ndisplay_comment=\ncomment_width=\nmax_comment_char=\ndisplay_category_statistics=\ndisplay_main_cat_stat=\ndisplay_lastadded_cat_stat=\ncount_lastadded_cat_stat=\ndisplay_mostviewed_cat_stat=\ncount_mostviewed_cat_stat=\ndisplay_camera_info=\nexif_information=\ngoogle_maps_api_key=\ndisplay_categories_geotagging=\ncategories_lng=\ncategories_lat=\ncategories_zoom=\ncategories_map_width=\ncategories_map_height=\ndisplay_icon_geotagging=\ndisplay_category_geotagging=\ncategory_map_width=\ncategory_map_height=\ndisplay_title_upload=\ndisplay_description_upload=\nmax_upload_char=\nupload_maxsize=\ncat_folder_maxsize=\nenable_java=\njava_resize_width=\njava_resize_height=\njava_box_width=\njava_box_height=\npagination_thumbnail_creation=\nclean_thumbnails=\nenable_thumb_creation=\ncrop_thumbnail=\njpeg_quality=\nicon_format=\nlarge_image_width=\nlarge_image_height=\nmedium_image_width=\nmedium_image_height=\nsmall_image_width=\nsmall_image_height=\nfront_modal_box_width=\nfront_modal_box_height=\nadmin_modal_box_width=\nadmin_modal_box_height=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(81, 'topmenu', 'Calendário Letivo', 'calendario-letivo', 'index.php?option=com_eventlist&view=categoryevents&id=1', 'component', 1, 67, 40, 1, 6, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'display_num=\ncat_num=4\nfilter=\ndisplay=\nicons=\nshow_print_icon=\nshow_email_icon=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(82, 'mainmenu', 'Calendário Letivo', 'calendario-letivo', 'index.php?option=com_eventlist&view=categoryevents&id=1', 'component', 1, 54, 40, 1, 6, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'display_num=\ncat_num=4\nfilter=\ndisplay=\nicons=\nshow_print_icon=\nshow_email_icon=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(84, 'topmenu', 'Projetos', 'projetos', 'index.php?option=com_content&view=category&layout=blog&id=30', 'component', 1, 67, 20, 1, 5, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_description=1\nshow_description_image=0\nnum_leading_articles=0\nnum_intro_articles=6\nnum_columns=1\nnum_links=5\norderby_pri=\norderby_sec=\nmulti_column_order=0\nshow_pagination=2\nshow_pagination_results=1\nshow_feed_link=1\nshow_noauth=\nshow_title=\nlink_titles=1\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=1\nshow_modify_date=0\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=0\nshow_print_icon=0\nshow_email_icon=0\nshow_hits=\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(83, 'topmenu', 'Home', 'home', 'index.php?option=com_content&view=category&layout=blog&id=1', 'component', 1, 0, 20, 0, 1, 0, '0000-00-00 00:00:00', 0, 0, 0, 3, 'show_description=0\nshow_description_image=0\nnum_leading_articles=0\nnum_intro_articles=5\nnum_columns=1\nnum_links=5\norderby_pri=\norderby_sec=\nmulti_column_order=0\nshow_pagination=2\nshow_pagination_results=1\nshow_feed_link=1\nshow_noauth=\nshow_title=\nlink_titles=1\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=1\nshow_modify_date=0\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=0\nshow_print_icon=0\nshow_email_icon=0\nshow_hits=\nfeed_summary=\npage_title=Escola Oficina Dos Sonhos\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(86, 'topmenu', 'Contato', 'contato', 'index.php?option=com_contact&view=category&catid=12', 'component', 1, 0, 7, 0, 8, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'display_num=20\nimage=-1\nimage_align=right\nshow_limit=0\nshow_feed_link=1\ncontact_icons=\nicon_address=\nicon_email=\nicon_telephone=\nicon_mobile=\nicon_fax=\nicon_misc=\nshow_headings=0\nshow_position=\nshow_email=\nshow_telephone=0\nshow_mobile=0\nshow_fax=0\nallow_vcard=\nbanned_email=\nbanned_subject=\nbanned_text=\nvalidate_session=\ncustom_reply=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=email2.png\nsecure=0\n\n', 0, 0, 0),
(87, 'mainmenu', 'Links', 'links', 'index.php?option=com_weblinks&view=categories', 'component', 1, 0, 4, 0, 10, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'image=-1\nimage_align=right\nshow_feed_link=1\nshow_comp_description=\ncomp_description=<img src="http://localhost/oficina/images/stories/web.png" hspace="5" align="left" />Nós estamos regularmente na Internet. Quando achamos um site legal nós o listamos aqui para o seu divertimento. \\nDa lista abaixo selecione uma categoria e então um site para visitar.\nshow_link_hits=\nshow_link_description=\nshow_other_cats=\nshow_headings=\ntarget=\nlink_icons=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=product-big.png\nsecure=0\n\n', 0, 0, 0),
(88, 'mainmenu', 'Galeria de Fotos', 'galeria-de-fotos', 'index.php?option=com_phocagallery&view=categories', 'component', 1, 0, 41, 0, 9, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'image=-1\nimage_align=right\nshow_pagination=1\nshow_pagination_limit=1\nshow_feed_link=1\ndisplay_cat_name_title=1\nfont_color=\nbackground_color=\nbackground_color_hover=\nimage_background_color=\nimage_background_shadow=\nborder_color=\nborder_color_hover=\nmargin_box=\npadding_box=\ndisplay_name=\ndisplay_icon_detail=\ndisplay_icon_download=\ndisplay_icon_folder=\nfont_size_name=\nchar_length_name=\ncategory_box_space=\ndisplay_categories_sub=\ndisplay_subcat_page=\ndisplay_icon_random_image=\ndisplay_back_button=\ndisplay_categories_back_button=\ndisplay_categories_cv=\ndisplay_subcat_page_cv=\ndisplay_icon_random_image_cv=\ndisplay_back_button_cv=\ndisplay_categories_back_button_cv=\ncategories_columns_cv=\ndisplay_image_categories_cv=\nimage_categories_size_cv=\ncategories_columns=\ndisplay_image_categories=\nimage_categories_size=\ndisplay_subcategories=\ndisplay_empty_categories=\nhide_categories=\ndisplay_access_category=\ndetail_window=\ndetail_window_background_color=\nmodal_box_overlay_color=\nmodal_box_overlay_opacity=\nmodal_box_border_color=\nmodal_box_border_width=\nsb_slideshow_delay=\nsb_lang=\ndisplay_description_detail=\ndisplay_title_description=\nfont_size_desc=\nfont_color_desc=\ndescription_detail_height=\ndescription_lightbox_font_size=\ndescription_lightbox_font_color=\ndescription_lightbox_bg_color=\nslideshow_delay=\nslideshow_pause=\nslideshow_random=\ndetail_buttons=\nphocagallery_width=\ndisplay_phoca_info=\ndefault_pagination=\npagination=\ncategory_ordering=\nimage_ordering=\nenable_piclens=\nstart_piclens=\npiclens_image=\nswitch_image=\nswitch_width=\nswitch_height=\nenable_overlib=\nol_bg_color=\nol_fg_color=\nol_tf_color=\nol_cf_color=\noverlib_overlay_opacity=\ncreate_watermark=\nwatermark_position_x=\nwatermark_position_y=\ndisplay_icon_vm=\nenable_user_cp=\nmax_create_cat_char=\ndisplay_rating=\ndisplay_comment=\ncomment_width=\nmax_comment_char=\ndisplay_category_statistics=\ndisplay_main_cat_stat=\ndisplay_lastadded_cat_stat=\ncount_lastadded_cat_stat=\ndisplay_mostviewed_cat_stat=\ncount_mostviewed_cat_stat=\ndisplay_camera_info=\nexif_information=\ngoogle_maps_api_key=\ndisplay_categories_geotagging=\ncategories_lng=\ncategories_lat=\ncategories_zoom=\ncategories_map_width=\ncategories_map_height=\ndisplay_icon_geotagging=\ndisplay_category_geotagging=\ncategory_map_width=\ncategory_map_height=\ndisplay_title_upload=\ndisplay_description_upload=\nmax_upload_char=\nupload_maxsize=\ncat_folder_maxsize=\nenable_java=\njava_resize_width=\njava_resize_height=\njava_box_width=\njava_box_height=\npagination_thumbnail_creation=\nclean_thumbnails=\nenable_thumb_creation=\ncrop_thumbnail=\njpeg_quality=\nicon_format=\nlarge_image_width=\nlarge_image_height=\nmedium_image_width=\nmedium_image_height=\nsmall_image_width=\nsmall_image_height=\nfront_modal_box_width=\nfront_modal_box_height=\nadmin_modal_box_width=\nadmin_modal_box_height=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=photo.png\nsecure=0\n\n', 0, 0, 0),
(89, 'topmenu', 'Links', 'links', 'index.php?option=com_weblinks&view=categories', 'component', 1, 0, 4, 0, 7, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'image=-1\nimage_align=right\nshow_feed_link=1\nshow_comp_description=\ncomp_description=<img src="http://localhost/oficina/images/stories/web.png" hspace="5" align="left" />Nós estamos regularmente na Internet. Quando achamos um site legal nós o listamos aqui para o seu divertimento. \\nDa lista abaixo selecione uma categoria e então um site para visitar.\nshow_link_hits=\nshow_link_description=\nshow_other_cats=\nshow_headings=\ntarget=\nlink_icons=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=product-big.png\nsecure=0\n\n', 0, 0, 0),
(90, 'topmenu', 'Galeria de Fotos', 'galeria-de-fotos', 'index.php?option=com_phocagallery&view=categories', 'component', 1, 0, 41, 0, 6, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'image=-1\nimage_align=right\nshow_pagination=1\nshow_pagination_limit=1\nshow_feed_link=1\ndisplay_cat_name_title=1\nfont_color=\nbackground_color=\nbackground_color_hover=\nimage_background_color=\nimage_background_shadow=\nborder_color=\nborder_color_hover=\nmargin_box=\npadding_box=\ndisplay_name=\ndisplay_icon_detail=\ndisplay_icon_download=\ndisplay_icon_folder=\nfont_size_name=\nchar_length_name=\ncategory_box_space=\ndisplay_categories_sub=\ndisplay_subcat_page=\ndisplay_icon_random_image=\ndisplay_back_button=\ndisplay_categories_back_button=\ndisplay_categories_cv=\ndisplay_subcat_page_cv=\ndisplay_icon_random_image_cv=\ndisplay_back_button_cv=\ndisplay_categories_back_button_cv=\ncategories_columns_cv=\ndisplay_image_categories_cv=\nimage_categories_size_cv=\ncategories_columns=\ndisplay_image_categories=\nimage_categories_size=\ndisplay_subcategories=\ndisplay_empty_categories=\nhide_categories=\ndisplay_access_category=\ndetail_window=\ndetail_window_background_color=\nmodal_box_overlay_color=\nmodal_box_overlay_opacity=\nmodal_box_border_color=\nmodal_box_border_width=\nsb_slideshow_delay=\nsb_lang=\ndisplay_description_detail=\ndisplay_title_description=\nfont_size_desc=\nfont_color_desc=\ndescription_detail_height=\ndescription_lightbox_font_size=\ndescription_lightbox_font_color=\ndescription_lightbox_bg_color=\nslideshow_delay=\nslideshow_pause=\nslideshow_random=\ndetail_buttons=\nphocagallery_width=\ndisplay_phoca_info=\ndefault_pagination=\npagination=\ncategory_ordering=\nimage_ordering=\nenable_piclens=\nstart_piclens=\npiclens_image=\nswitch_image=\nswitch_width=\nswitch_height=\nenable_overlib=\nol_bg_color=\nol_fg_color=\nol_tf_color=\nol_cf_color=\noverlib_overlay_opacity=\ncreate_watermark=\nwatermark_position_x=\nwatermark_position_y=\ndisplay_icon_vm=\nenable_user_cp=\nmax_create_cat_char=\ndisplay_rating=\ndisplay_comment=\ncomment_width=\nmax_comment_char=\ndisplay_category_statistics=\ndisplay_main_cat_stat=\ndisplay_lastadded_cat_stat=\ncount_lastadded_cat_stat=\ndisplay_mostviewed_cat_stat=\ncount_mostviewed_cat_stat=\ndisplay_camera_info=\nexif_information=\ngoogle_maps_api_key=\ndisplay_categories_geotagging=\ncategories_lng=\ncategories_lat=\ncategories_zoom=\ncategories_map_width=\ncategories_map_height=\ndisplay_icon_geotagging=\ndisplay_category_geotagging=\ncategory_map_width=\ncategory_map_height=\ndisplay_title_upload=\ndisplay_description_upload=\nmax_upload_char=\nupload_maxsize=\ncat_folder_maxsize=\nenable_java=\njava_resize_width=\njava_resize_height=\njava_box_width=\njava_box_height=\npagination_thumbnail_creation=\nclean_thumbnails=\nenable_thumb_creation=\ncrop_thumbnail=\njpeg_quality=\nicon_format=\nlarge_image_width=\nlarge_image_height=\nmedium_image_width=\nmedium_image_height=\nsmall_image_width=\nsmall_image_height=\nfront_modal_box_width=\nfront_modal_box_height=\nadmin_modal_box_width=\nadmin_modal_box_height=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=photo.png\nsecure=0\n\n', 0, 0, 0),
(93, 'topmenu', 'Educação Infantil', 'educacao-infantil', 'index.php?option=com_phocagallery&view=category&id=3', 'component', 1, 90, 41, 1, 1, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_pagination=1\nshow_pagination_limit=1\nshow_feed_link=1\ndisplay_cat_name_title=1\ndisplay_cat_name_breadcrumbs=0\nfont_color=\nbackground_color=\nbackground_color_hover=\nimage_background_color=\nimage_background_shadow=\nborder_color=\nborder_color_hover=\nmargin_box=\npadding_box=\ndisplay_name=\ndisplay_icon_detail=\ndisplay_icon_download=\ndisplay_icon_folder=\nfont_size_name=\nchar_length_name=\ncategory_box_space=\ndisplay_categories_sub=\ndisplay_subcat_page=\ndisplay_icon_random_image=\ndisplay_back_button=\ndisplay_categories_back_button=\ndisplay_categories_cv=\ndisplay_subcat_page_cv=\ndisplay_icon_random_image_cv=\ndisplay_back_button_cv=\ndisplay_categories_back_button_cv=\ncategories_columns_cv=\ndisplay_image_categories_cv=\nimage_categories_size_cv=\ncategories_columns=\ndisplay_image_categories=\nimage_categories_size=\ndisplay_subcategories=\ndisplay_empty_categories=\nhide_categories=\ndisplay_access_category=\ndetail_window=\ndetail_window_background_color=\nmodal_box_overlay_color=\nmodal_box_overlay_opacity=\nmodal_box_border_color=\nmodal_box_border_width=\nsb_slideshow_delay=\nsb_lang=\ndisplay_description_detail=\ndisplay_title_description=\nfont_size_desc=\nfont_color_desc=\ndescription_detail_height=\ndescription_lightbox_font_size=\ndescription_lightbox_font_color=\ndescription_lightbox_bg_color=\nslideshow_delay=\nslideshow_pause=\nslideshow_random=\ndetail_buttons=\nphocagallery_width=\ndisplay_phoca_info=\ndefault_pagination=\npagination=\ncategory_ordering=\nimage_ordering=\nenable_piclens=\nstart_piclens=\npiclens_image=\nswitch_image=\nswitch_width=\nswitch_height=\nenable_overlib=\nol_bg_color=\nol_fg_color=\nol_tf_color=\nol_cf_color=\noverlib_overlay_opacity=\ncreate_watermark=\nwatermark_position_x=\nwatermark_position_y=\ndisplay_icon_vm=\nenable_user_cp=\nmax_create_cat_char=\ndisplay_rating=\ndisplay_comment=\ncomment_width=\nmax_comment_char=\ndisplay_category_statistics=\ndisplay_main_cat_stat=\ndisplay_lastadded_cat_stat=\ncount_lastadded_cat_stat=\ndisplay_mostviewed_cat_stat=\ncount_mostviewed_cat_stat=\ndisplay_camera_info=\nexif_information=\ngoogle_maps_api_key=\ndisplay_categories_geotagging=\ncategories_lng=\ncategories_lat=\ncategories_zoom=\ncategories_map_width=\ncategories_map_height=\ndisplay_icon_geotagging=\ndisplay_category_geotagging=\ncategory_map_width=\ncategory_map_height=\ndisplay_title_upload=\ndisplay_description_upload=\nmax_upload_char=\nupload_maxsize=\ncat_folder_maxsize=\nenable_java=\njava_resize_width=\njava_resize_height=\njava_box_width=\njava_box_height=\npagination_thumbnail_creation=\nclean_thumbnails=\nenable_thumb_creation=\ncrop_thumbnail=\njpeg_quality=\nicon_format=\nlarge_image_width=\nlarge_image_height=\nmedium_image_width=\nmedium_image_height=\nsmall_image_width=\nsmall_image_height=\nfront_modal_box_width=\nfront_modal_box_height=\nadmin_modal_box_width=\nadmin_modal_box_height=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(94, 'topmenu', 'Ensino Fundamental', 'ensino-fundamental', 'index.php?option=com_phocagallery&view=category&id=42', 'component', 1, 90, 41, 1, 2, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_pagination=1\nshow_pagination_limit=1\nshow_feed_link=1\ndisplay_cat_name_title=1\ndisplay_cat_name_breadcrumbs=0\nfont_color=\nbackground_color=\nbackground_color_hover=\nimage_background_color=\nimage_background_shadow=\nborder_color=\nborder_color_hover=\nmargin_box=\npadding_box=\ndisplay_name=\ndisplay_icon_detail=\ndisplay_icon_download=\ndisplay_icon_folder=\nfont_size_name=\nchar_length_name=\ncategory_box_space=\ndisplay_categories_sub=\ndisplay_subcat_page=\ndisplay_icon_random_image=\ndisplay_back_button=\ndisplay_categories_back_button=\ndisplay_categories_cv=\ndisplay_subcat_page_cv=\ndisplay_icon_random_image_cv=\ndisplay_back_button_cv=\ndisplay_categories_back_button_cv=\ncategories_columns_cv=\ndisplay_image_categories_cv=\nimage_categories_size_cv=\ncategories_columns=\ndisplay_image_categories=\nimage_categories_size=\ndisplay_subcategories=\ndisplay_empty_categories=\nhide_categories=\ndisplay_access_category=\ndetail_window=\ndetail_window_background_color=\nmodal_box_overlay_color=\nmodal_box_overlay_opacity=\nmodal_box_border_color=\nmodal_box_border_width=\nsb_slideshow_delay=\nsb_lang=\ndisplay_description_detail=\ndisplay_title_description=\nfont_size_desc=\nfont_color_desc=\ndescription_detail_height=\ndescription_lightbox_font_size=\ndescription_lightbox_font_color=\ndescription_lightbox_bg_color=\nslideshow_delay=\nslideshow_pause=\nslideshow_random=\ndetail_buttons=\nphocagallery_width=\ndisplay_phoca_info=\ndefault_pagination=\npagination=\ncategory_ordering=\nimage_ordering=\nenable_piclens=\nstart_piclens=\npiclens_image=\nswitch_image=\nswitch_width=\nswitch_height=\nenable_overlib=\nol_bg_color=\nol_fg_color=\nol_tf_color=\nol_cf_color=\noverlib_overlay_opacity=\ncreate_watermark=\nwatermark_position_x=\nwatermark_position_y=\ndisplay_icon_vm=\nenable_user_cp=\nmax_create_cat_char=\ndisplay_rating=\ndisplay_comment=\ncomment_width=\nmax_comment_char=\ndisplay_category_statistics=\ndisplay_main_cat_stat=\ndisplay_lastadded_cat_stat=\ncount_lastadded_cat_stat=\ndisplay_mostviewed_cat_stat=\ncount_mostviewed_cat_stat=\ndisplay_camera_info=\nexif_information=\ngoogle_maps_api_key=\ndisplay_categories_geotagging=\ncategories_lng=\ncategories_lat=\ncategories_zoom=\ncategories_map_width=\ncategories_map_height=\ndisplay_icon_geotagging=\ndisplay_category_geotagging=\ncategory_map_width=\ncategory_map_height=\ndisplay_title_upload=\ndisplay_description_upload=\nmax_upload_char=\nupload_maxsize=\ncat_folder_maxsize=\nenable_java=\njava_resize_width=\njava_resize_height=\njava_box_width=\njava_box_height=\npagination_thumbnail_creation=\nclean_thumbnails=\nenable_thumb_creation=\ncrop_thumbnail=\njpeg_quality=\nicon_format=\nlarge_image_width=\nlarge_image_height=\nmedium_image_width=\nmedium_image_height=\nsmall_image_width=\nsmall_image_height=\nfront_modal_box_width=\nfront_modal_box_height=\nadmin_modal_box_width=\nadmin_modal_box_height=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(95, 'mainmenu', 'Ensino Fundamental', 'ensino-fundamental', 'index.php?option=com_phocagallery&view=category&id=42', 'component', 1, 88, 41, 1, 2, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_pagination=1\nshow_pagination_limit=1\nshow_feed_link=1\ndisplay_cat_name_title=1\ndisplay_cat_name_breadcrumbs=0\nfont_color=\nbackground_color=\nbackground_color_hover=\nimage_background_color=\nimage_background_shadow=\nborder_color=\nborder_color_hover=\nmargin_box=\npadding_box=\ndisplay_name=\ndisplay_icon_detail=\ndisplay_icon_download=\ndisplay_icon_folder=\nfont_size_name=\nchar_length_name=\ncategory_box_space=\ndisplay_categories_sub=\ndisplay_subcat_page=\ndisplay_icon_random_image=\ndisplay_back_button=\ndisplay_categories_back_button=\ndisplay_categories_cv=\ndisplay_subcat_page_cv=\ndisplay_icon_random_image_cv=\ndisplay_back_button_cv=\ndisplay_categories_back_button_cv=\ncategories_columns_cv=\ndisplay_image_categories_cv=\nimage_categories_size_cv=\ncategories_columns=\ndisplay_image_categories=\nimage_categories_size=\ndisplay_subcategories=\ndisplay_empty_categories=\nhide_categories=\ndisplay_access_category=\ndetail_window=\ndetail_window_background_color=\nmodal_box_overlay_color=\nmodal_box_overlay_opacity=\nmodal_box_border_color=\nmodal_box_border_width=\nsb_slideshow_delay=\nsb_lang=\ndisplay_description_detail=\ndisplay_title_description=\nfont_size_desc=\nfont_color_desc=\ndescription_detail_height=\ndescription_lightbox_font_size=\ndescription_lightbox_font_color=\ndescription_lightbox_bg_color=\nslideshow_delay=\nslideshow_pause=\nslideshow_random=\ndetail_buttons=\nphocagallery_width=\ndisplay_phoca_info=\ndefault_pagination=\npagination=\ncategory_ordering=\nimage_ordering=\nenable_piclens=\nstart_piclens=\npiclens_image=\nswitch_image=\nswitch_width=\nswitch_height=\nenable_overlib=\nol_bg_color=\nol_fg_color=\nol_tf_color=\nol_cf_color=\noverlib_overlay_opacity=\ncreate_watermark=\nwatermark_position_x=\nwatermark_position_y=\ndisplay_icon_vm=\nenable_user_cp=\nmax_create_cat_char=\ndisplay_rating=\ndisplay_comment=\ncomment_width=\nmax_comment_char=\ndisplay_category_statistics=\ndisplay_main_cat_stat=\ndisplay_lastadded_cat_stat=\ncount_lastadded_cat_stat=\ndisplay_mostviewed_cat_stat=\ncount_mostviewed_cat_stat=\ndisplay_camera_info=\nexif_information=\ngoogle_maps_api_key=\ndisplay_categories_geotagging=\ncategories_lng=\ncategories_lat=\ncategories_zoom=\ncategories_map_width=\ncategories_map_height=\ndisplay_icon_geotagging=\ndisplay_category_geotagging=\ncategory_map_width=\ncategory_map_height=\ndisplay_title_upload=\ndisplay_description_upload=\nmax_upload_char=\nupload_maxsize=\ncat_folder_maxsize=\nenable_java=\njava_resize_width=\njava_resize_height=\njava_box_width=\njava_box_height=\npagination_thumbnail_creation=\nclean_thumbnails=\nenable_thumb_creation=\ncrop_thumbnail=\njpeg_quality=\nicon_format=\nlarge_image_width=\nlarge_image_height=\nmedium_image_width=\nmedium_image_height=\nsmall_image_width=\nsmall_image_height=\nfront_modal_box_width=\nfront_modal_box_height=\nadmin_modal_box_width=\nadmin_modal_box_height=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(96, 'mainmenu', 'Aulas Estras Curriculares', 'aulas-estras-curriculares', 'index.php?option=com_phocagallery&view=category&id=35', 'component', 1, 88, 41, 1, 3, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_pagination=1\nshow_pagination_limit=1\nshow_feed_link=1\ndisplay_cat_name_title=1\ndisplay_cat_name_breadcrumbs=0\nfont_color=\nbackground_color=\nbackground_color_hover=\nimage_background_color=\nimage_background_shadow=\nborder_color=\nborder_color_hover=\nmargin_box=\npadding_box=\ndisplay_name=\ndisplay_icon_detail=\ndisplay_icon_download=\ndisplay_icon_folder=\nfont_size_name=\nchar_length_name=\ncategory_box_space=\ndisplay_categories_sub=\ndisplay_subcat_page=\ndisplay_icon_random_image=\ndisplay_back_button=\ndisplay_categories_back_button=\ndisplay_categories_cv=\ndisplay_subcat_page_cv=\ndisplay_icon_random_image_cv=\ndisplay_back_button_cv=\ndisplay_categories_back_button_cv=\ncategories_columns_cv=\ndisplay_image_categories_cv=\nimage_categories_size_cv=\ncategories_columns=\ndisplay_image_categories=\nimage_categories_size=\ndisplay_subcategories=\ndisplay_empty_categories=\nhide_categories=\ndisplay_access_category=\ndetail_window=\ndetail_window_background_color=\nmodal_box_overlay_color=\nmodal_box_overlay_opacity=\nmodal_box_border_color=\nmodal_box_border_width=\nsb_slideshow_delay=\nsb_lang=\ndisplay_description_detail=\ndisplay_title_description=\nfont_size_desc=\nfont_color_desc=\ndescription_detail_height=\ndescription_lightbox_font_size=\ndescription_lightbox_font_color=\ndescription_lightbox_bg_color=\nslideshow_delay=\nslideshow_pause=\nslideshow_random=\ndetail_buttons=\nphocagallery_width=\ndisplay_phoca_info=\ndefault_pagination=\npagination=\ncategory_ordering=\nimage_ordering=\nenable_piclens=\nstart_piclens=\npiclens_image=\nswitch_image=\nswitch_width=\nswitch_height=\nenable_overlib=\nol_bg_color=\nol_fg_color=\nol_tf_color=\nol_cf_color=\noverlib_overlay_opacity=\ncreate_watermark=\nwatermark_position_x=\nwatermark_position_y=\ndisplay_icon_vm=\nenable_user_cp=\nmax_create_cat_char=\ndisplay_rating=\ndisplay_comment=\ncomment_width=\nmax_comment_char=\ndisplay_category_statistics=\ndisplay_main_cat_stat=\ndisplay_lastadded_cat_stat=\ncount_lastadded_cat_stat=\ndisplay_mostviewed_cat_stat=\ncount_mostviewed_cat_stat=\ndisplay_camera_info=\nexif_information=\ngoogle_maps_api_key=\ndisplay_categories_geotagging=\ncategories_lng=\ncategories_lat=\ncategories_zoom=\ncategories_map_width=\ncategories_map_height=\ndisplay_icon_geotagging=\ndisplay_category_geotagging=\ncategory_map_width=\ncategory_map_height=\ndisplay_title_upload=\ndisplay_description_upload=\nmax_upload_char=\nupload_maxsize=\ncat_folder_maxsize=\nenable_java=\njava_resize_width=\njava_resize_height=\njava_box_width=\njava_box_height=\npagination_thumbnail_creation=\nclean_thumbnails=\nenable_thumb_creation=\ncrop_thumbnail=\njpeg_quality=\nicon_format=\nlarge_image_width=\nlarge_image_height=\nmedium_image_width=\nmedium_image_height=\nsmall_image_width=\nsmall_image_height=\nfront_modal_box_width=\nfront_modal_box_height=\nadmin_modal_box_width=\nadmin_modal_box_height=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(97, 'topmenu', 'Aulas Extras Curriculares', 'aulas-estras-curriculares', 'index.php?option=com_phocagallery&view=category&id=35', 'component', 1, 90, 41, 1, 3, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_pagination=1\nshow_pagination_limit=1\nshow_feed_link=1\ndisplay_cat_name_title=1\ndisplay_cat_name_breadcrumbs=0\nfont_color=\nbackground_color=\nbackground_color_hover=\nimage_background_color=\nimage_background_shadow=\nborder_color=\nborder_color_hover=\nmargin_box=\npadding_box=\ndisplay_name=\ndisplay_icon_detail=\ndisplay_icon_download=\ndisplay_icon_folder=\nfont_size_name=\nchar_length_name=\ncategory_box_space=\ndisplay_categories_sub=\ndisplay_subcat_page=\ndisplay_icon_random_image=\ndisplay_back_button=\ndisplay_categories_back_button=\ndisplay_categories_cv=\ndisplay_subcat_page_cv=\ndisplay_icon_random_image_cv=\ndisplay_back_button_cv=\ndisplay_categories_back_button_cv=\ncategories_columns_cv=\ndisplay_image_categories_cv=\nimage_categories_size_cv=\ncategories_columns=\ndisplay_image_categories=\nimage_categories_size=\ndisplay_subcategories=\ndisplay_empty_categories=\nhide_categories=\ndisplay_access_category=\ndetail_window=\ndetail_window_background_color=\nmodal_box_overlay_color=\nmodal_box_overlay_opacity=\nmodal_box_border_color=\nmodal_box_border_width=\nsb_slideshow_delay=\nsb_lang=\ndisplay_description_detail=\ndisplay_title_description=\nfont_size_desc=\nfont_color_desc=\ndescription_detail_height=\ndescription_lightbox_font_size=\ndescription_lightbox_font_color=\ndescription_lightbox_bg_color=\nslideshow_delay=\nslideshow_pause=\nslideshow_random=\ndetail_buttons=\nphocagallery_width=\ndisplay_phoca_info=\ndefault_pagination=\npagination=\ncategory_ordering=\nimage_ordering=\nenable_piclens=\nstart_piclens=\npiclens_image=\nswitch_image=\nswitch_width=\nswitch_height=\nenable_overlib=\nol_bg_color=\nol_fg_color=\nol_tf_color=\nol_cf_color=\noverlib_overlay_opacity=\ncreate_watermark=\nwatermark_position_x=\nwatermark_position_y=\ndisplay_icon_vm=\nenable_user_cp=\nmax_create_cat_char=\ndisplay_rating=\ndisplay_comment=\ncomment_width=\nmax_comment_char=\ndisplay_category_statistics=\ndisplay_main_cat_stat=\ndisplay_lastadded_cat_stat=\ncount_lastadded_cat_stat=\ndisplay_mostviewed_cat_stat=\ncount_mostviewed_cat_stat=\ndisplay_camera_info=\nexif_information=\ngoogle_maps_api_key=\ndisplay_categories_geotagging=\ncategories_lng=\ncategories_lat=\ncategories_zoom=\ncategories_map_width=\ncategories_map_height=\ndisplay_icon_geotagging=\ndisplay_category_geotagging=\ncategory_map_width=\ncategory_map_height=\ndisplay_title_upload=\ndisplay_description_upload=\nmax_upload_char=\nupload_maxsize=\ncat_folder_maxsize=\nenable_java=\njava_resize_width=\njava_resize_height=\njava_box_width=\njava_box_height=\npagination_thumbnail_creation=\nclean_thumbnails=\nenable_thumb_creation=\ncrop_thumbnail=\njpeg_quality=\nicon_format=\nlarge_image_width=\nlarge_image_height=\nmedium_image_width=\nmedium_image_height=\nsmall_image_width=\nsmall_image_height=\nfront_modal_box_width=\nfront_modal_box_height=\nadmin_modal_box_width=\nadmin_modal_box_height=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(98, 'topmenu', 'Notícias', 'noticias', 'index.php?option=com_phocagallery&view=category&id=18', 'component', 1, 90, 41, 1, 4, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_pagination=1\nshow_pagination_limit=1\nshow_feed_link=1\ndisplay_cat_name_title=1\ndisplay_cat_name_breadcrumbs=0\nfont_color=\nbackground_color=\nbackground_color_hover=\nimage_background_color=\nimage_background_shadow=\nborder_color=\nborder_color_hover=\nmargin_box=\npadding_box=\ndisplay_name=\ndisplay_icon_detail=\ndisplay_icon_download=\ndisplay_icon_folder=\nfont_size_name=\nchar_length_name=\ncategory_box_space=\ndisplay_categories_sub=\ndisplay_subcat_page=\ndisplay_icon_random_image=\ndisplay_back_button=\ndisplay_categories_back_button=\ndisplay_categories_cv=\ndisplay_subcat_page_cv=\ndisplay_icon_random_image_cv=\ndisplay_back_button_cv=\ndisplay_categories_back_button_cv=\ncategories_columns_cv=\ndisplay_image_categories_cv=\nimage_categories_size_cv=\ncategories_columns=\ndisplay_image_categories=\nimage_categories_size=\ndisplay_subcategories=\ndisplay_empty_categories=\nhide_categories=\ndisplay_access_category=\ndetail_window=\ndetail_window_background_color=\nmodal_box_overlay_color=\nmodal_box_overlay_opacity=\nmodal_box_border_color=\nmodal_box_border_width=\nsb_slideshow_delay=\nsb_lang=\ndisplay_description_detail=\ndisplay_title_description=\nfont_size_desc=\nfont_color_desc=\ndescription_detail_height=\ndescription_lightbox_font_size=\ndescription_lightbox_font_color=\ndescription_lightbox_bg_color=\nslideshow_delay=\nslideshow_pause=\nslideshow_random=\ndetail_buttons=\nphocagallery_width=\ndisplay_phoca_info=\ndefault_pagination=\npagination=\ncategory_ordering=\nimage_ordering=\nenable_piclens=\nstart_piclens=\npiclens_image=\nswitch_image=\nswitch_width=\nswitch_height=\nenable_overlib=\nol_bg_color=\nol_fg_color=\nol_tf_color=\nol_cf_color=\noverlib_overlay_opacity=\ncreate_watermark=\nwatermark_position_x=\nwatermark_position_y=\ndisplay_icon_vm=\nenable_user_cp=\nmax_create_cat_char=\ndisplay_rating=\ndisplay_comment=\ncomment_width=\nmax_comment_char=\ndisplay_category_statistics=\ndisplay_main_cat_stat=\ndisplay_lastadded_cat_stat=\ncount_lastadded_cat_stat=\ndisplay_mostviewed_cat_stat=\ncount_mostviewed_cat_stat=\ndisplay_camera_info=\nexif_information=\ngoogle_maps_api_key=\ndisplay_categories_geotagging=\ncategories_lng=\ncategories_lat=\ncategories_zoom=\ncategories_map_width=\ncategories_map_height=\ndisplay_icon_geotagging=\ndisplay_category_geotagging=\ncategory_map_width=\ncategory_map_height=\ndisplay_title_upload=\ndisplay_description_upload=\nmax_upload_char=\nupload_maxsize=\ncat_folder_maxsize=\nenable_java=\njava_resize_width=\njava_resize_height=\njava_box_width=\njava_box_height=\npagination_thumbnail_creation=\nclean_thumbnails=\nenable_thumb_creation=\ncrop_thumbnail=\njpeg_quality=\nicon_format=\nlarge_image_width=\nlarge_image_height=\nmedium_image_width=\nmedium_image_height=\nsmall_image_width=\nsmall_image_height=\nfront_modal_box_width=\nfront_modal_box_height=\nadmin_modal_box_width=\nadmin_modal_box_height=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(99, 'mainmenu', 'Notícias', 'noticias', 'index.php?option=com_phocagallery&view=category&id=18', 'component', 1, 88, 41, 1, 4, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_pagination=1\nshow_pagination_limit=1\nshow_feed_link=1\ndisplay_cat_name_title=1\ndisplay_cat_name_breadcrumbs=0\nfont_color=\nbackground_color=\nbackground_color_hover=\nimage_background_color=\nimage_background_shadow=\nborder_color=\nborder_color_hover=\nmargin_box=\npadding_box=\ndisplay_name=\ndisplay_icon_detail=\ndisplay_icon_download=\ndisplay_icon_folder=\nfont_size_name=\nchar_length_name=\ncategory_box_space=\ndisplay_categories_sub=\ndisplay_subcat_page=\ndisplay_icon_random_image=\ndisplay_back_button=\ndisplay_categories_back_button=\ndisplay_categories_cv=\ndisplay_subcat_page_cv=\ndisplay_icon_random_image_cv=\ndisplay_back_button_cv=\ndisplay_categories_back_button_cv=\ncategories_columns_cv=\ndisplay_image_categories_cv=\nimage_categories_size_cv=\ncategories_columns=\ndisplay_image_categories=\nimage_categories_size=\ndisplay_subcategories=\ndisplay_empty_categories=\nhide_categories=\ndisplay_access_category=\ndetail_window=\ndetail_window_background_color=\nmodal_box_overlay_color=\nmodal_box_overlay_opacity=\nmodal_box_border_color=\nmodal_box_border_width=\nsb_slideshow_delay=\nsb_lang=\ndisplay_description_detail=\ndisplay_title_description=\nfont_size_desc=\nfont_color_desc=\ndescription_detail_height=\ndescription_lightbox_font_size=\ndescription_lightbox_font_color=\ndescription_lightbox_bg_color=\nslideshow_delay=\nslideshow_pause=\nslideshow_random=\ndetail_buttons=\nphocagallery_width=\ndisplay_phoca_info=\ndefault_pagination=\npagination=\ncategory_ordering=\nimage_ordering=\nenable_piclens=\nstart_piclens=\npiclens_image=\nswitch_image=\nswitch_width=\nswitch_height=\nenable_overlib=\nol_bg_color=\nol_fg_color=\nol_tf_color=\nol_cf_color=\noverlib_overlay_opacity=\ncreate_watermark=\nwatermark_position_x=\nwatermark_position_y=\ndisplay_icon_vm=\nenable_user_cp=\nmax_create_cat_char=\ndisplay_rating=\ndisplay_comment=\ncomment_width=\nmax_comment_char=\ndisplay_category_statistics=\ndisplay_main_cat_stat=\ndisplay_lastadded_cat_stat=\ncount_lastadded_cat_stat=\ndisplay_mostviewed_cat_stat=\ncount_mostviewed_cat_stat=\ndisplay_camera_info=\nexif_information=\ngoogle_maps_api_key=\ndisplay_categories_geotagging=\ncategories_lng=\ncategories_lat=\ncategories_zoom=\ncategories_map_width=\ncategories_map_height=\ndisplay_icon_geotagging=\ndisplay_category_geotagging=\ncategory_map_width=\ncategory_map_height=\ndisplay_title_upload=\ndisplay_description_upload=\nmax_upload_char=\nupload_maxsize=\ncat_folder_maxsize=\nenable_java=\njava_resize_width=\njava_resize_height=\njava_box_width=\njava_box_height=\npagination_thumbnail_creation=\nclean_thumbnails=\nenable_thumb_creation=\ncrop_thumbnail=\njpeg_quality=\nicon_format=\nlarge_image_width=\nlarge_image_height=\nmedium_image_width=\nmedium_image_height=\nsmall_image_width=\nsmall_image_height=\nfront_modal_box_width=\nfront_modal_box_height=\nadmin_modal_box_width=\nadmin_modal_box_height=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(100, 'topmenu', 'Eventos', 'eventos', 'index.php?option=com_phocagallery&view=category&id=54', 'component', 1, 90, 41, 1, 5, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_pagination=1\nshow_pagination_limit=1\nshow_feed_link=1\ndisplay_cat_name_title=1\ndisplay_cat_name_breadcrumbs=0\nfont_color=\nbackground_color=\nbackground_color_hover=\nimage_background_color=\nimage_background_shadow=\nborder_color=\nborder_color_hover=\nmargin_box=\npadding_box=\ndisplay_name=\ndisplay_icon_detail=\ndisplay_icon_download=\ndisplay_icon_folder=\nfont_size_name=\nchar_length_name=\ncategory_box_space=\ndisplay_categories_sub=\ndisplay_subcat_page=\ndisplay_icon_random_image=\ndisplay_back_button=\ndisplay_categories_back_button=\ndisplay_categories_cv=\ndisplay_subcat_page_cv=\ndisplay_icon_random_image_cv=\ndisplay_back_button_cv=\ndisplay_categories_back_button_cv=\ncategories_columns_cv=\ndisplay_image_categories_cv=\nimage_categories_size_cv=\ncategories_columns=\ndisplay_image_categories=\nimage_categories_size=\ndisplay_subcategories=\ndisplay_empty_categories=\nhide_categories=\ndisplay_access_category=\ndetail_window=\ndetail_window_background_color=\nmodal_box_overlay_color=\nmodal_box_overlay_opacity=\nmodal_box_border_color=\nmodal_box_border_width=\nsb_slideshow_delay=\nsb_lang=\ndisplay_description_detail=\ndisplay_title_description=\nfont_size_desc=\nfont_color_desc=\ndescription_detail_height=\ndescription_lightbox_font_size=\ndescription_lightbox_font_color=\ndescription_lightbox_bg_color=\nslideshow_delay=\nslideshow_pause=\nslideshow_random=\ndetail_buttons=\nphocagallery_width=\ndisplay_phoca_info=\ndefault_pagination=\npagination=\ncategory_ordering=\nimage_ordering=\nenable_piclens=\nstart_piclens=\npiclens_image=\nswitch_image=\nswitch_width=\nswitch_height=\nenable_overlib=\nol_bg_color=\nol_fg_color=\nol_tf_color=\nol_cf_color=\noverlib_overlay_opacity=\ncreate_watermark=\nwatermark_position_x=\nwatermark_position_y=\ndisplay_icon_vm=\nenable_user_cp=\nmax_create_cat_char=\ndisplay_rating=\ndisplay_comment=\ncomment_width=\nmax_comment_char=\ndisplay_category_statistics=\ndisplay_main_cat_stat=\ndisplay_lastadded_cat_stat=\ncount_lastadded_cat_stat=\ndisplay_mostviewed_cat_stat=\ncount_mostviewed_cat_stat=\ndisplay_camera_info=\nexif_information=\ngoogle_maps_api_key=\ndisplay_categories_geotagging=\ncategories_lng=\ncategories_lat=\ncategories_zoom=\ncategories_map_width=\ncategories_map_height=\ndisplay_icon_geotagging=\ndisplay_category_geotagging=\ncategory_map_width=\ncategory_map_height=\ndisplay_title_upload=\ndisplay_description_upload=\nmax_upload_char=\nupload_maxsize=\ncat_folder_maxsize=\nenable_java=\njava_resize_width=\njava_resize_height=\njava_box_width=\njava_box_height=\npagination_thumbnail_creation=\nclean_thumbnails=\nenable_thumb_creation=\ncrop_thumbnail=\njpeg_quality=\nicon_format=\nlarge_image_width=\nlarge_image_height=\nmedium_image_width=\nmedium_image_height=\nsmall_image_width=\nsmall_image_height=\nfront_modal_box_width=\nfront_modal_box_height=\nadmin_modal_box_width=\nadmin_modal_box_height=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(101, 'mainmenu', 'Eventos', 'eventos', 'index.php?option=com_phocagallery&view=category&id=54', 'component', 1, 88, 41, 1, 5, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_pagination=1\nshow_pagination_limit=1\nshow_feed_link=1\ndisplay_cat_name_title=1\ndisplay_cat_name_breadcrumbs=0\nfont_color=\nbackground_color=\nbackground_color_hover=\nimage_background_color=\nimage_background_shadow=\nborder_color=\nborder_color_hover=\nmargin_box=\npadding_box=\ndisplay_name=\ndisplay_icon_detail=\ndisplay_icon_download=\ndisplay_icon_folder=\nfont_size_name=\nchar_length_name=\ncategory_box_space=\ndisplay_categories_sub=\ndisplay_subcat_page=\ndisplay_icon_random_image=\ndisplay_back_button=\ndisplay_categories_back_button=\ndisplay_categories_cv=\ndisplay_subcat_page_cv=\ndisplay_icon_random_image_cv=\ndisplay_back_button_cv=\ndisplay_categories_back_button_cv=\ncategories_columns_cv=\ndisplay_image_categories_cv=\nimage_categories_size_cv=\ncategories_columns=\ndisplay_image_categories=\nimage_categories_size=\ndisplay_subcategories=\ndisplay_empty_categories=\nhide_categories=\ndisplay_access_category=\ndetail_window=\ndetail_window_background_color=\nmodal_box_overlay_color=\nmodal_box_overlay_opacity=\nmodal_box_border_color=\nmodal_box_border_width=\nsb_slideshow_delay=\nsb_lang=\ndisplay_description_detail=\ndisplay_title_description=\nfont_size_desc=\nfont_color_desc=\ndescription_detail_height=\ndescription_lightbox_font_size=\ndescription_lightbox_font_color=\ndescription_lightbox_bg_color=\nslideshow_delay=\nslideshow_pause=\nslideshow_random=\ndetail_buttons=\nphocagallery_width=\ndisplay_phoca_info=\ndefault_pagination=\npagination=\ncategory_ordering=\nimage_ordering=\nenable_piclens=\nstart_piclens=\npiclens_image=\nswitch_image=\nswitch_width=\nswitch_height=\nenable_overlib=\nol_bg_color=\nol_fg_color=\nol_tf_color=\nol_cf_color=\noverlib_overlay_opacity=\ncreate_watermark=\nwatermark_position_x=\nwatermark_position_y=\ndisplay_icon_vm=\nenable_user_cp=\nmax_create_cat_char=\ndisplay_rating=\ndisplay_comment=\ncomment_width=\nmax_comment_char=\ndisplay_category_statistics=\ndisplay_main_cat_stat=\ndisplay_lastadded_cat_stat=\ncount_lastadded_cat_stat=\ndisplay_mostviewed_cat_stat=\ncount_mostviewed_cat_stat=\ndisplay_camera_info=\nexif_information=\ngoogle_maps_api_key=\ndisplay_categories_geotagging=\ncategories_lng=\ncategories_lat=\ncategories_zoom=\ncategories_map_width=\ncategories_map_height=\ndisplay_icon_geotagging=\ndisplay_category_geotagging=\ncategory_map_width=\ncategory_map_height=\ndisplay_title_upload=\ndisplay_description_upload=\nmax_upload_char=\nupload_maxsize=\ncat_folder_maxsize=\nenable_java=\njava_resize_width=\njava_resize_height=\njava_box_width=\njava_box_height=\npagination_thumbnail_creation=\nclean_thumbnails=\nenable_thumb_creation=\ncrop_thumbnail=\njpeg_quality=\nicon_format=\nlarge_image_width=\nlarge_image_height=\nmedium_image_width=\nmedium_image_height=\nsmall_image_width=\nsmall_image_height=\nfront_modal_box_width=\nfront_modal_box_height=\nadmin_modal_box_width=\nadmin_modal_box_height=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `jos_menu_types`
--

CREATE TABLE IF NOT EXISTS `jos_menu_types` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `menutype` varchar(75) NOT NULL default '',
  `title` varchar(255) NOT NULL default '',
  `description` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `menutype` (`menutype`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `jos_menu_types`
--

INSERT INTO `jos_menu_types` (`id`, `menutype`, `title`, `description`) VALUES
(1, 'mainmenu', 'Main Menu', 'The main menu for the site'),
(2, 'topmenu', 'TopMenu', ''),
(3, 'othermenu', 'Other Menu', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `jos_messages`
--

CREATE TABLE IF NOT EXISTS `jos_messages` (
  `message_id` int(10) unsigned NOT NULL auto_increment,
  `user_id_from` int(10) unsigned NOT NULL default '0',
  `user_id_to` int(10) unsigned NOT NULL default '0',
  `folder_id` int(10) unsigned NOT NULL default '0',
  `date_time` datetime NOT NULL default '0000-00-00 00:00:00',
  `state` int(11) NOT NULL default '0',
  `priority` int(1) unsigned NOT NULL default '0',
  `subject` text NOT NULL,
  `message` text NOT NULL,
  PRIMARY KEY  (`message_id`),
  KEY `useridto_state` (`user_id_to`,`state`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Extraindo dados da tabela `jos_messages`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `jos_messages_cfg`
--

CREATE TABLE IF NOT EXISTS `jos_messages_cfg` (
  `user_id` int(10) unsigned NOT NULL default '0',
  `cfg_name` varchar(100) NOT NULL default '',
  `cfg_value` varchar(255) NOT NULL default '',
  UNIQUE KEY `idx_user_var_name` (`user_id`,`cfg_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `jos_messages_cfg`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `jos_migration_backlinks`
--

CREATE TABLE IF NOT EXISTS `jos_migration_backlinks` (
  `itemid` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `url` text NOT NULL,
  `sefurl` text NOT NULL,
  `newurl` text NOT NULL,
  PRIMARY KEY  (`itemid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `jos_migration_backlinks`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `jos_modules`
--

CREATE TABLE IF NOT EXISTS `jos_modules` (
  `id` int(11) NOT NULL auto_increment,
  `title` text NOT NULL,
  `content` text NOT NULL,
  `ordering` int(11) NOT NULL default '0',
  `position` varchar(50) default NULL,
  `checked_out` int(11) unsigned NOT NULL default '0',
  `checked_out_time` datetime NOT NULL default '0000-00-00 00:00:00',
  `published` tinyint(1) NOT NULL default '0',
  `module` varchar(50) default NULL,
  `numnews` int(11) NOT NULL default '0',
  `access` tinyint(3) unsigned NOT NULL default '0',
  `showtitle` tinyint(3) unsigned NOT NULL default '1',
  `params` text NOT NULL,
  `iscore` tinyint(4) NOT NULL default '0',
  `client_id` tinyint(4) NOT NULL default '0',
  `control` text NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `published` (`published`,`access`),
  KEY `newsfeeds` (`module`,`published`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=40 ;

--
-- Extraindo dados da tabela `jos_modules`
--

INSERT INTO `jos_modules` (`id`, `title`, `content`, `ordering`, `position`, `checked_out`, `checked_out_time`, `published`, `module`, `numnews`, `access`, `showtitle`, `params`, `iscore`, `client_id`, `control`) VALUES
(1, 'Menu', '', 1, 'left', 0, '0000-00-00 00:00:00', 1, 'mod_mainmenu', 0, 0, 1, 'menutype=mainmenu\nmenu_style=vert_indent\nstartLevel=0\nendLevel=0\nshowAllChildren=0\nwindow_open=\nshow_whitespace=0\ncache=1\ntag_id=\nclass_sfx=\nmoduleclass_sfx=\nmaxdepth=10\nmenu_images=0\nmenu_images_align=0\nmenu_images_link=0\nexpand_menu=0\nactivate_parent=0\nfull_active_id=0\nindent_image=0\nindent_image1=\nindent_image2=\nindent_image3=\nindent_image4=\nindent_image5=\nindent_image6=\nspacer=\nend_spacer=\n\n', 1, 0, ''),
(2, 'Login', '', 1, 'login', 0, '0000-00-00 00:00:00', 1, 'mod_login', 0, 0, 1, '', 1, 1, ''),
(3, 'Popular', '', 3, 'cpanel', 0, '0000-00-00 00:00:00', 1, 'mod_popular', 0, 2, 1, '', 0, 1, ''),
(4, 'Recent added Articles', '', 4, 'cpanel', 0, '0000-00-00 00:00:00', 1, 'mod_latest', 0, 2, 1, 'ordering=c_dsc\nuser_id=0\ncache=0\n\n', 0, 1, ''),
(5, 'Menu Stats', '', 5, 'cpanel', 0, '0000-00-00 00:00:00', 1, 'mod_stats', 0, 2, 1, '', 0, 1, ''),
(6, 'Unread Messages', '', 1, 'header', 0, '0000-00-00 00:00:00', 1, 'mod_unread', 0, 2, 1, '', 1, 1, ''),
(7, 'Online Users', '', 2, 'header', 0, '0000-00-00 00:00:00', 1, 'mod_online', 0, 2, 1, '', 1, 1, ''),
(8, 'Toolbar', '', 1, 'toolbar', 0, '0000-00-00 00:00:00', 1, 'mod_toolbar', 0, 2, 1, '', 1, 1, ''),
(9, 'Quick Icons', '', 1, 'icon', 0, '0000-00-00 00:00:00', 1, 'mod_quickicon', 0, 2, 1, '', 1, 1, ''),
(10, 'Logged in Users', '', 2, 'cpanel', 0, '0000-00-00 00:00:00', 1, 'mod_logged', 0, 2, 1, '', 0, 1, ''),
(11, 'Footer', '', 0, 'footer', 0, '0000-00-00 00:00:00', 1, 'mod_footer', 0, 0, 1, '', 1, 1, ''),
(12, 'Admin Menu', '', 1, 'menu', 0, '0000-00-00 00:00:00', 1, 'mod_menu', 0, 2, 1, '', 0, 1, ''),
(13, 'Admin SubMenu', '', 1, 'submenu', 0, '0000-00-00 00:00:00', 1, 'mod_submenu', 0, 2, 1, '', 0, 1, ''),
(14, 'User Status', '', 1, 'status', 0, '0000-00-00 00:00:00', 1, 'mod_status', 0, 2, 1, '', 0, 1, ''),
(15, 'Title', '', 1, 'title', 0, '0000-00-00 00:00:00', 1, 'mod_title', 0, 2, 1, '', 0, 1, ''),
(20, 'Matrículas Abertas', '<img style="border-width: 0px; margin-right: 4px; float: left;" alt="draw" src="images/stories/draw.png" width="48" height="48" />As matrículas para o ano letivo de 2009 já estão abertas. Veja aqui todas as informações necessárias. <a href="index.php?option=com_content&amp;view=frontpage&amp;Itemid=1"><br />Leia Mais...</a><br />', 1, 'user2', 0, '0000-00-00 00:00:00', 0, 'mod_custom', 0, 0, 1, 'moduleclass_sfx=\n\n', 0, 0, ''),
(21, 'Lista de Materiais', '<img style="border-width: 0px; margin-right: 4px; float: left;" alt="customize" src="images/stories/customize.png" width="53" height="53" />Livros, cadernos, lapis e borracha.Veja aqui a lista de materiais para iniciar o ano letivo bem.<br /><a href="index.php?option=com_content&amp;view=frontpage&amp;Itemid=1">Leia Mais...</a><br />', 2, 'user2', 0, '0000-00-00 00:00:00', 0, 'mod_custom', 0, 0, 1, 'moduleclass_sfx=\n\n', 0, 0, ''),
(22, 'Aulas Extras', '<img height="40" width="68" src="images/stories/atividades.png" alt="atividades" style="border: 1px solid #b7b7b7; padding: 3px; margin-right: 4px; float: left;" />Além das aulas convencionais dispomos também de aulas extras que ajudam a desenvolver socialmente, culturalmente e atleticamente as crianças.<br /><a href="index.php?option=com_content&amp;view=category&amp;layout=blog&amp;id=22&amp;Itemid=60">Leia Mais...</a>', 2, 'right', 0, '0000-00-00 00:00:00', 1, 'mod_custom', 0, 0, 1, 'moduleclass_sfx=-orange\n\n', 0, 0, ''),
(23, 'Calendário 2009', '<img width="64" src="images/stories/calendrio.jpg" alt="calendrio" height="64" style="border: 1px solid #b7b7b7; padding: 3px; margin-right: 4px; float: left;" />Verifique as datas importantes deste ano letivo e programe-se para não ser pego desprevinido.<br /><a href="index.php?option=com_content&amp;view=article&amp;id=169&amp;Itemid=79">Ensino Fundamental</a><br /><a href="index.php?option=com_content&amp;view=article&amp;id=170&amp;Itemid=82">Educação Infantil</a>', 0, 'right', 0, '0000-00-00 00:00:00', 0, 'mod_custom', 0, 0, 1, 'moduleclass_sfx=-green\n\n', 0, 0, ''),
(24, 'Calendário', '', 0, 'right', 0, '0000-00-00 00:00:00', 1, 'mod_eventlistcal15q', 0, 0, 1, 'Show_Tooltips=1\nShow_Tooltips_Title=1\ncal15q_tooltips_title=Evento\ncal15q_tooltipspl_title=Eventos\nDisplayCat=0\nDisplayVenue=0\nUseJoomlaLanguage=1\nday_name_length=1\nfirst_day=1\nYear_length=1\nMonth_length=0\nMonth_offset=0\nTime_offset=0\nRemember=1\nArchivedEvents=0\nStraightToDetails=1\nmoduleclass_sfx=-green\nlocale_override=\ncatid=\nvenid=\n\n', 0, 0, ''),
(25, 'Alunos Online', '', 4, 'right', 0, '0000-00-00 00:00:00', 1, 'mod_whosonline', 0, 0, 1, 'cache=0\nshowmode=0\nmoduleclass_sfx=\n\n', 0, 0, ''),
(26, 'Enquete', '', 5, 'right', 0, '0000-00-00 00:00:00', 1, 'mod_poll', 0, 0, 1, 'id=1\nmoduleclass_sfx=-green\ncache=1\ncache_time=900\n\n', 0, 0, ''),
(27, 'Slide Show', '<object data="monoslideshow.swf" type="application/x-shockwave-flash" height="250" width="910">\r\n<param name="src" value="monoslideshow.swf" />\r\n<param name="wmode" value="transparent" />\r\n<param name="flashvars" value="showLogo=false&amp;dataFile=slideshow.xml.php" />\r\n</object>', 0, 'user1', 0, '0000-00-00 00:00:00', 1, 'mod_custom', 0, 0, 0, 'moduleclass_sfx=-slide\n\n', 0, 0, ''),
(30, 'Fotos', '', 6, 'right', 0, '0000-00-00 00:00:00', 1, 'mod_phocagallery_random_image', 0, 0, 1, 'moduleclass_sfx=\ncategory_id=29\nlimit_start=0\nlimit_count=1\nfont_color=#558bcc\nbackground_color=#fcfcfc\nbackground_color_hover=#fafafa\nimage_background_color=#ffffff\nborder_color=#e8e8e8\nborder_color_hover=#89b015\nimage_background_shadow=shadow1\ndisplay_name=1\ndisplay_icon_detail=0\ndisplay_icon_download=0\nfont_size_name=12\nchar_length_name=15\ncategory_box_space=0\ndetail_window=3\nmodal_box_overlay_color=#000000\nmodal_box_overlay_opacity=0.3\nmodal_box_border_color=#6b6b6b\nmodal_box_border_width=2\nsb_slideshow_delay=5\ndisplay_description_detail=0\ndescription_detail_height=16\ndetail_buttons=1\nphocagallery_module_width=\n\n', 0, 0, ''),
(31, 'Login', '', 2, 'left', 0, '0000-00-00 00:00:00', 1, 'mod_login', 0, 0, 1, 'cache=0\nmoduleclass_sfx=\npretext=\nposttext=\nlogin=\nlogout=\ngreeting=1\nname=0\nusesecure=0\n\n', 0, 0, ''),
(35, 'Opções', '<a href="index.php?option=com_content&view=category&layout=blog&id=1&Itemid=17">\r\n<img alt="Home" title="Home" src="images/stories/home_64x64.png" border="0" hspace="6" onmouseover="document.getElementById(''icoTXT'').innerHTML = this.title" onmouseout="document.getElementById(''icoTXT'').innerHTML = ''''" />\r\n</a>\r\n<a href="index.php?option=com_weblinks&view=categories&Itemid=18">\r\n<img alt="Links" title="Links" src="images/stories/product-big.png" border="0" hspace="6" onmouseover="document.getElementById(''icoTXT'').innerHTML = this.title" onmouseout="document.getElementById(''icoTXT'').innerHTML = ''''" />\r\n</a>\r\n<a href="index.php?option=com_contact&view=category&catid=12&Itemid=19">\r\n<img alt="Contato" title="Contato" src="images/stories/email2.png" border="0" hspace="6" onmouseover="document.getElementById(''icoTXT'').innerHTML = this.title" onmouseout="document.getElementById(''icoTXT'').innerHTML = ''''" />\r\n</a>\r\n<a href="index.php?option=com_phocagallery&view=categories&Itemid=20">\r\n<img alt="Fotos" title="Fotos" src="images/stories/photo.png" border="0" hspace="6" onmouseover="document.getElementById(''icoTXT'').innerHTML = this.title" onmouseout="document.getElementById(''icoTXT'').innerHTML = ''''" />\r\n</a>\r\n<br />\r\n<div id="icoTXT" style="text-align:center;background:none;font-weight:bold;"></div>', 0, 'user6', 0, '0000-00-00 00:00:00', 1, 'mod_custom', 0, 0, 1, 'moduleclass_sfx=\n\n', 0, 0, ''),
(36, 'Versículo do Dia', '', 0, 'newslight', 0, '0000-00-00 00:00:00', 1, 'mod_rss_scroller', 0, 0, 0, 'newsfeed=0\ncharset=utf-8\nchannelCounter=0\nitemCounter=0\nshowChannel=0\ndirection=left\nalign=right\nheight=150\ntarget=_blank\nscrollamount=1\nscrolldelay=15\n\n', 0, 0, ''),
(38, 'JoomlaPack Backup Notification Module', '', 4, 'icon', 0, '0000-00-00 00:00:00', 1, 'mod_jpadmin', 0, 2, 1, '', 0, 1, ''),
(39, 'Maná Diário', '<a target="_blank" href="http://manadiario.com/"><img style="border-color: #000000; border-width: 0px;" alt="mana_dirio" src="images/stories/mana_dirio.jpg" width="148" height="129" /></a>', 3, 'left', 0, '0000-00-00 00:00:00', 1, 'mod_custom', 0, 0, 1, 'moduleclass_sfx=\n\n', 0, 0, '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `jos_modules_menu`
--

CREATE TABLE IF NOT EXISTS `jos_modules_menu` (
  `moduleid` int(11) NOT NULL default '0',
  `menuid` int(11) NOT NULL default '0',
  PRIMARY KEY  (`moduleid`,`menuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `jos_modules_menu`
--

INSERT INTO `jos_modules_menu` (`moduleid`, `menuid`) VALUES
(1, 0),
(20, 0),
(21, 0),
(22, 1),
(22, 3),
(22, 5),
(22, 17),
(22, 18),
(22, 19),
(22, 20),
(22, 29),
(22, 30),
(22, 31),
(22, 32),
(22, 33),
(22, 34),
(22, 36),
(22, 37),
(22, 38),
(22, 39),
(22, 40),
(22, 41),
(22, 42),
(22, 43),
(22, 44),
(22, 45),
(22, 46),
(22, 47),
(22, 48),
(22, 49),
(22, 50),
(22, 51),
(22, 52),
(22, 53),
(22, 54),
(22, 55),
(22, 56),
(22, 58),
(22, 59),
(22, 60),
(22, 61),
(22, 62),
(22, 63),
(22, 64),
(22, 65),
(22, 66),
(22, 67),
(22, 68),
(22, 69),
(22, 71),
(22, 73),
(22, 74),
(22, 75),
(22, 76),
(22, 77),
(22, 78),
(22, 83),
(22, 84),
(23, 1),
(23, 3),
(23, 5),
(23, 17),
(23, 18),
(23, 19),
(23, 20),
(23, 29),
(23, 30),
(23, 31),
(23, 32),
(23, 33),
(23, 34),
(23, 36),
(23, 37),
(23, 38),
(23, 39),
(23, 40),
(23, 41),
(23, 42),
(23, 43),
(23, 44),
(23, 45),
(23, 46),
(23, 47),
(23, 48),
(23, 49),
(23, 50),
(23, 51),
(23, 52),
(23, 53),
(23, 54),
(23, 55),
(23, 56),
(23, 58),
(23, 59),
(23, 60),
(23, 61),
(23, 62),
(23, 63),
(23, 64),
(23, 65),
(23, 66),
(23, 67),
(23, 68),
(23, 69),
(23, 71),
(23, 73),
(23, 74),
(23, 75),
(23, 76),
(23, 77),
(23, 78),
(23, 83),
(23, 84),
(23, 86),
(23, 87),
(23, 88),
(24, 1),
(24, 3),
(24, 5),
(24, 17),
(24, 18),
(24, 19),
(24, 20),
(24, 29),
(24, 30),
(24, 31),
(24, 32),
(24, 33),
(24, 34),
(24, 36),
(24, 37),
(24, 38),
(24, 39),
(24, 40),
(24, 41),
(24, 42),
(24, 43),
(24, 44),
(24, 45),
(24, 46),
(24, 47),
(24, 48),
(24, 49),
(24, 50),
(24, 51),
(24, 52),
(24, 53),
(24, 54),
(24, 55),
(24, 56),
(24, 58),
(24, 59),
(24, 60),
(24, 61),
(24, 62),
(24, 63),
(24, 64),
(24, 65),
(24, 66),
(24, 67),
(24, 68),
(24, 69),
(24, 71),
(24, 73),
(24, 74),
(24, 75),
(24, 76),
(24, 77),
(24, 78),
(24, 83),
(24, 84),
(24, 86),
(24, 87),
(24, 88),
(24, 89),
(24, 90),
(24, 91),
(25, 1),
(25, 3),
(25, 5),
(25, 17),
(25, 18),
(25, 19),
(25, 20),
(25, 29),
(25, 30),
(25, 31),
(25, 32),
(25, 33),
(25, 34),
(25, 36),
(25, 37),
(25, 38),
(25, 39),
(25, 40),
(25, 41),
(25, 42),
(25, 43),
(25, 44),
(25, 45),
(25, 46),
(25, 47),
(25, 48),
(25, 49),
(25, 50),
(25, 51),
(25, 52),
(25, 53),
(25, 54),
(25, 55),
(25, 56),
(25, 58),
(25, 59),
(25, 60),
(25, 61),
(25, 62),
(25, 63),
(25, 64),
(25, 65),
(25, 66),
(25, 67),
(25, 68),
(25, 69),
(25, 71),
(25, 73),
(25, 74),
(25, 75),
(25, 76),
(25, 77),
(25, 78),
(25, 83),
(25, 84),
(26, 1),
(26, 3),
(26, 5),
(26, 17),
(26, 18),
(26, 19),
(26, 20),
(26, 29),
(26, 30),
(26, 31),
(26, 32),
(26, 33),
(26, 34),
(26, 36),
(26, 37),
(26, 38),
(26, 39),
(26, 40),
(26, 41),
(26, 42),
(26, 43),
(26, 44),
(26, 45),
(26, 46),
(26, 47),
(26, 48),
(26, 49),
(26, 50),
(26, 51),
(26, 52),
(26, 53),
(26, 54),
(26, 55),
(26, 56),
(26, 58),
(26, 59),
(26, 60),
(26, 61),
(26, 62),
(26, 63),
(26, 64),
(26, 65),
(26, 66),
(26, 67),
(26, 68),
(26, 69),
(26, 71),
(26, 73),
(26, 74),
(26, 75),
(26, 76),
(26, 77),
(26, 78),
(26, 83),
(26, 84),
(27, 1),
(27, 17),
(27, 83),
(30, 1),
(30, 3),
(30, 5),
(30, 17),
(30, 18),
(30, 19),
(30, 20),
(30, 29),
(30, 30),
(30, 31),
(30, 32),
(30, 33),
(30, 34),
(30, 36),
(30, 37),
(30, 38),
(30, 39),
(30, 40),
(30, 41),
(30, 42),
(30, 43),
(30, 44),
(30, 45),
(30, 46),
(30, 47),
(30, 48),
(30, 49),
(30, 50),
(30, 51),
(30, 52),
(30, 53),
(30, 54),
(30, 55),
(30, 56),
(30, 58),
(30, 59),
(30, 60),
(30, 61),
(30, 62),
(30, 63),
(30, 64),
(30, 65),
(30, 66),
(30, 67),
(30, 68),
(30, 69),
(30, 71),
(30, 73),
(30, 74),
(30, 75),
(30, 76),
(30, 77),
(30, 78),
(30, 83),
(30, 84),
(31, 0),
(35, 1),
(35, 17),
(35, 83),
(36, 0),
(38, 0),
(39, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `jos_newsfeeds`
--

CREATE TABLE IF NOT EXISTS `jos_newsfeeds` (
  `catid` int(11) NOT NULL default '0',
  `id` int(11) NOT NULL auto_increment,
  `name` text NOT NULL,
  `alias` varchar(255) NOT NULL default '',
  `link` text NOT NULL,
  `filename` varchar(200) default NULL,
  `published` tinyint(1) NOT NULL default '0',
  `numarticles` int(11) unsigned NOT NULL default '1',
  `cache_time` int(11) unsigned NOT NULL default '3600',
  `checked_out` tinyint(3) unsigned NOT NULL default '0',
  `checked_out_time` datetime NOT NULL default '0000-00-00 00:00:00',
  `ordering` int(11) NOT NULL default '0',
  `rtl` tinyint(4) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `published` (`published`),
  KEY `catid` (`catid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `jos_newsfeeds`
--

INSERT INTO `jos_newsfeeds` (`catid`, `id`, `name`, `alias`, `link`, `filename`, `published`, `numarticles`, `cache_time`, `checked_out`, `checked_out_time`, `ordering`, `rtl`) VALUES
(11, 1, 'Biblia Online', 'biblia-online', 'http://www.bibliaonline.com.br/acf/feeds/daily_verses.rss', NULL, 1, 2, 3600, 0, '0000-00-00 00:00:00', 1, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `jos_phocagallery`
--

CREATE TABLE IF NOT EXISTS `jos_phocagallery` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `catid` int(11) NOT NULL default '0',
  `sid` int(11) NOT NULL default '0',
  `title` varchar(250) NOT NULL default '',
  `alias` varchar(255) NOT NULL default '',
  `filename` varchar(250) NOT NULL default '',
  `description` text NOT NULL,
  `date` datetime NOT NULL default '0000-00-00 00:00:00',
  `hits` int(11) NOT NULL default '0',
  `published` tinyint(1) NOT NULL default '0',
  `checked_out` int(11) NOT NULL default '0',
  `checked_out_time` datetime NOT NULL default '0000-00-00 00:00:00',
  `ordering` int(11) NOT NULL default '0',
  `params` text NOT NULL,
  `extlink1` text NOT NULL,
  `extlink2` text NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `catid` (`catid`,`published`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1080 ;

--
-- Extraindo dados da tabela `jos_phocagallery`
--

INSERT INTO `jos_phocagallery` (`id`, `catid`, `sid`, `title`, `alias`, `filename`, `description`, `date`, `hits`, `published`, `checked_out`, `checked_out_time`, `ordering`, `params`, `extlink1`, `extlink2`) VALUES
(55, 7, 0, 'fotos_diversos_173', 'fotos_diversos_173', '/JGSXNG/fotos_diversos_173.jpg', '', '2009-06-15 14:16:29', 0, 1, 0, '0000-00-00 00:00:00', 4, '', '', ''),
(54, 7, 0, 'fotos_diversos_171', 'fotos_diversos_171', '/JGSXNG/fotos_diversos_171.jpg', '', '2009-06-15 14:16:29', 0, 1, 0, '0000-00-00 00:00:00', 3, '', '', ''),
(53, 7, 0, 'fotos_diversos_167', 'fotos_diversos_167', '/JGSXNG/fotos_diversos_167.jpg', '', '2009-06-15 14:16:29', 0, 1, 0, '0000-00-00 00:00:00', 2, '', '', ''),
(52, 7, 0, 'fotos_diversos_166', 'fotos_diversos_166', '/JGSXNG/fotos_diversos_166.jpg', '', '2009-06-15 14:16:29', 0, 1, 0, '0000-00-00 00:00:00', 1, '', '', ''),
(51, 6, 0, 'imagem_027', 'imagem_027', '/RSSPKQ/imagem_027.jpg', '', '2009-06-15 14:10:56', 0, 1, 0, '0000-00-00 00:00:00', 13, '', '', ''),
(50, 6, 0, 'imagem_025', 'imagem_025', '/RSSPKQ/imagem_025.jpg', '', '2009-06-15 14:10:56', 0, 1, 0, '0000-00-00 00:00:00', 12, '', '', ''),
(49, 6, 0, 'imagem_023', 'imagem_023', '/RSSPKQ/imagem_023.jpg', '', '2009-06-15 14:10:56', 0, 1, 0, '0000-00-00 00:00:00', 11, '', '', ''),
(48, 6, 0, 'imagem_020', 'imagem_020', '/RSSPKQ/imagem_020.jpg', '', '2009-06-15 14:10:56', 0, 1, 0, '0000-00-00 00:00:00', 10, '', '', ''),
(47, 6, 0, 'imagem_017', 'imagem_017', '/RSSPKQ/imagem_017.jpg', '', '2009-06-15 14:10:56', 0, 1, 0, '0000-00-00 00:00:00', 9, '', '', ''),
(46, 6, 0, 'imagem_016', 'imagem_016', '/RSSPKQ/imagem_016.jpg', '', '2009-06-15 14:10:56', 0, 1, 0, '0000-00-00 00:00:00', 8, '', '', ''),
(45, 6, 0, 'imagem_012', 'imagem_012', '/RSSPKQ/imagem_012.jpg', '', '2009-06-15 14:10:56', 0, 1, 0, '0000-00-00 00:00:00', 7, '', '', ''),
(44, 6, 0, 'imagem_011', 'imagem_011', '/RSSPKQ/imagem_011.jpg', '', '2009-06-15 14:10:56', 0, 1, 0, '0000-00-00 00:00:00', 6, '', '', ''),
(43, 6, 0, 'imagem_009', 'imagem_009', '/RSSPKQ/imagem_009.jpg', '', '2009-06-15 14:10:56', 0, 1, 0, '0000-00-00 00:00:00', 5, '', '', ''),
(42, 6, 0, 'imagem_007', 'imagem_007', '/RSSPKQ/imagem_007.jpg', '', '2009-06-15 14:10:56', 0, 1, 0, '0000-00-00 00:00:00', 4, '', '', ''),
(41, 6, 0, 'imagem_003', 'imagem_003', '/RSSPKQ/imagem_003.jpg', '', '2009-06-15 14:10:56', 0, 1, 0, '0000-00-00 00:00:00', 3, '', '', ''),
(40, 6, 0, 'imagem_002', 'imagem_002', '/RSSPKQ/imagem_002.jpg', '', '2009-06-15 14:10:56', 0, 1, 0, '0000-00-00 00:00:00', 2, '', '', ''),
(39, 6, 0, 'imagem_001', 'imagem_001', '/RSSPKQ/imagem_001.jpg', '', '2009-06-15 14:10:56', 0, 1, 0, '0000-00-00 00:00:00', 1, '', '', ''),
(38, 5, 0, 'imagem-010', 'imagem-010', '/QLYCDA/imagem-010.jpg', '', '2009-06-15 14:01:55', 0, 1, 0, '0000-00-00 00:00:00', 5, '', '', ''),
(37, 5, 0, 'imagem-008', 'imagem-008', '/QLYCDA/imagem-008.jpg', '', '2009-06-15 14:01:55', 0, 1, 0, '0000-00-00 00:00:00', 4, '', '', ''),
(36, 5, 0, 'imagem-003', 'imagem-003', '/QLYCDA/imagem-003.jpg', '', '2009-06-15 14:01:55', 0, 1, 0, '0000-00-00 00:00:00', 3, '', '', ''),
(35, 5, 0, 'imagem-002', 'imagem-002', '/QLYCDA/imagem-002.jpg', '', '2009-06-15 14:01:55', 0, 1, 0, '0000-00-00 00:00:00', 2, '', '', ''),
(34, 5, 0, 'imagem-001', 'imagem-001', '/QLYCDA/imagem-001.jpg', '', '2009-06-15 14:01:55', 0, 1, 0, '0000-00-00 00:00:00', 1, '', '', ''),
(33, 3, 0, 'dsc02431', 'dsc02431', 'MERQDJ/dsc02431.jpg', '', '2009-06-15 13:59:44', 5, 1, 0, '0000-00-00 00:00:00', 1, 'zoom=2;', '', ''),
(56, 8, 0, 'dsc01607', 'dsc01607', '/OHZCPV/dsc01607.jpg', '', '2009-06-15 14:18:08', 0, 1, 0, '0000-00-00 00:00:00', 1, '', '', ''),
(57, 9, 0, 'dsc08978', 'dsc08978', '/ZZPVTK/dsc08978.jpg', '', '2009-06-15 14:21:10', 0, 1, 0, '0000-00-00 00:00:00', 1, '', '', ''),
(58, 9, 0, 'dsc09332', 'dsc09332', '/ZZPVTK/dsc09332.jpg', '', '2009-06-15 14:21:10', 0, 1, 0, '0000-00-00 00:00:00', 2, '', '', ''),
(59, 9, 0, 'dsc09333', 'dsc09333', '/ZZPVTK/dsc09333.jpg', '', '2009-06-15 14:21:10', 0, 1, 0, '0000-00-00 00:00:00', 3, '', '', ''),
(60, 9, 0, 'dsc09334', 'dsc09334', '/ZZPVTK/dsc09334.jpg', '', '2009-06-15 14:21:10', 0, 1, 0, '0000-00-00 00:00:00', 4, '', '', ''),
(61, 9, 0, 'fotos_diversas_039', 'fotos_diversas_039', '/ZZPVTK/fotos_diversas_039.jpg', '', '2009-06-15 14:21:10', 0, 1, 0, '0000-00-00 00:00:00', 5, '', '', ''),
(62, 9, 0, 'fotos_diversas_050', 'fotos_diversas_050', '/ZZPVTK/fotos_diversas_050.jpg', '', '2009-06-15 14:21:10', 0, 1, 0, '0000-00-00 00:00:00', 6, '', '', ''),
(63, 9, 0, 'maria_luiza_03', 'maria_luiza_03', '/ZZPVTK/maria_luiza_03.jpg', '', '2009-06-15 14:21:10', 0, 1, 0, '0000-00-00 00:00:00', 7, '', '', ''),
(64, 10, 0, 'fotos-diversos-195', 'fotos-diversos-195', '/BBZTKI/fotos-diversos-195.jpg', '', '2009-06-15 14:23:15', 0, 1, 0, '0000-00-00 00:00:00', 1, '', '', ''),
(65, 10, 0, 'imagem-031', 'imagem-031', '/BBZTKI/imagem-031.jpg', '', '2009-06-15 14:23:15', 0, 1, 0, '0000-00-00 00:00:00', 2, '', '', ''),
(66, 11, 0, 'dsc02176', 'dsc02176', '/DCWKHZ/dsc02176.jpg', '', '2009-06-15 14:25:04', 3, 1, 0, '0000-00-00 00:00:00', 1, 'zoom=2;', '', ''),
(67, 11, 0, 'dsc02177', 'dsc02177', '/DCWKHZ/dsc02177.jpg', '', '2009-06-15 14:25:04', 3, 1, 0, '0000-00-00 00:00:00', 2, '', '', ''),
(68, 11, 0, 'dsc02178', 'dsc02178', '/DCWKHZ/dsc02178.jpg', '', '2009-06-15 14:25:04', 2, 1, 0, '0000-00-00 00:00:00', 3, '', '', ''),
(69, 11, 0, 'dsc02179', 'dsc02179', '/DCWKHZ/dsc02179.jpg', '', '2009-06-15 14:25:04', 0, 1, 0, '0000-00-00 00:00:00', 4, '', '', ''),
(70, 11, 0, 'dsc02180', 'dsc02180', '/DCWKHZ/dsc02180.jpg', '', '2009-06-15 14:25:04', 1, 1, 0, '0000-00-00 00:00:00', 5, '', '', ''),
(71, 11, 0, 'dsc02181', 'dsc02181', '/DCWKHZ/dsc02181.jpg', '', '2009-06-15 14:25:04', 0, 1, 0, '0000-00-00 00:00:00', 6, '', '', ''),
(72, 11, 0, 'dsc02182', 'dsc02182', '/DCWKHZ/dsc02182.jpg', '', '2009-06-15 14:25:04', 0, 1, 0, '0000-00-00 00:00:00', 7, '', '', ''),
(73, 11, 0, 'dsc02183', 'dsc02183', '/DCWKHZ/dsc02183.jpg', '', '2009-06-15 14:25:04', 0, 1, 0, '0000-00-00 00:00:00', 8, '', '', ''),
(74, 11, 0, 'dsc02184', 'dsc02184', '/DCWKHZ/dsc02184.jpg', '', '2009-06-15 14:25:04', 0, 1, 0, '0000-00-00 00:00:00', 9, '', '', ''),
(75, 11, 0, 'dsc02185', 'dsc02185', '/DCWKHZ/dsc02185.jpg', '', '2009-06-15 14:25:04', 0, 1, 0, '0000-00-00 00:00:00', 10, '', '', ''),
(76, 11, 0, 'dsc02186', 'dsc02186', '/DCWKHZ/dsc02186.jpg', '', '2009-06-15 14:25:04', 0, 1, 0, '0000-00-00 00:00:00', 11, '', '', ''),
(77, 11, 0, 'dsc02187', 'dsc02187', '/DCWKHZ/dsc02187.jpg', '', '2009-06-15 14:25:04', 0, 1, 0, '0000-00-00 00:00:00', 12, '', '', ''),
(78, 11, 0, 'dsc02188', 'dsc02188', '/DCWKHZ/dsc02188.jpg', '', '2009-06-15 14:25:04', 0, 1, 0, '0000-00-00 00:00:00', 13, '', '', ''),
(79, 11, 0, 'dsc02189', 'dsc02189', '/DCWKHZ/dsc02189.jpg', '', '2009-06-15 14:25:04', 0, 1, 0, '0000-00-00 00:00:00', 14, '', '', ''),
(80, 11, 0, 'dsc02191', 'dsc02191', '/DCWKHZ/dsc02191.jpg', '', '2009-06-15 14:25:04', 0, 1, 0, '0000-00-00 00:00:00', 15, '', '', ''),
(81, 11, 0, 'dsc02192', 'dsc02192', '/DCWKHZ/dsc02192.jpg', '', '2009-06-15 14:25:04', 0, 1, 0, '0000-00-00 00:00:00', 16, '', '', ''),
(82, 11, 0, 'dsc02193', 'dsc02193', '/DCWKHZ/dsc02193.jpg', '', '2009-06-15 14:25:04', 0, 1, 0, '0000-00-00 00:00:00', 17, '', '', ''),
(83, 11, 0, 'dsc02195', 'dsc02195', '/DCWKHZ/dsc02195.jpg', '', '2009-06-15 14:25:04', 0, 1, 0, '0000-00-00 00:00:00', 18, '', '', ''),
(84, 11, 0, 'dsc02196', 'dsc02196', '/DCWKHZ/dsc02196.jpg', '', '2009-06-15 14:25:04', 0, 1, 0, '0000-00-00 00:00:00', 19, '', '', ''),
(85, 11, 0, 'dsc02198', 'dsc02198', '/DCWKHZ/dsc02198.jpg', '', '2009-06-15 14:25:04', 0, 1, 0, '0000-00-00 00:00:00', 20, '', '', ''),
(86, 11, 0, 'dsc02200', 'dsc02200', '/DCWKHZ/dsc02200.jpg', '', '2009-06-15 14:25:04', 0, 1, 0, '0000-00-00 00:00:00', 21, '', '', ''),
(87, 11, 0, 'dsc02202', 'dsc02202', '/DCWKHZ/dsc02202.jpg', '', '2009-06-15 14:25:04', 0, 1, 0, '0000-00-00 00:00:00', 22, '', '', ''),
(88, 11, 0, 'dsc02203', 'dsc02203', '/DCWKHZ/dsc02203.jpg', '', '2009-06-15 14:25:04', 0, 1, 0, '0000-00-00 00:00:00', 23, '', '', ''),
(89, 11, 0, 'dsc02206', 'dsc02206', '/DCWKHZ/dsc02206.jpg', '', '2009-06-15 14:25:04', 0, 1, 0, '0000-00-00 00:00:00', 24, '', '', ''),
(90, 11, 0, 'dsc02207', 'dsc02207', '/DCWKHZ/dsc02207.jpg', '', '2009-06-15 14:25:04', 0, 1, 0, '0000-00-00 00:00:00', 25, '', '', ''),
(91, 11, 0, 'dsc02212', 'dsc02212', '/DCWKHZ/dsc02212.jpg', '', '2009-06-15 14:25:04', 0, 1, 0, '0000-00-00 00:00:00', 26, '', '', ''),
(92, 11, 0, 'dsc02215', 'dsc02215', '/DCWKHZ/dsc02215.jpg', '', '2009-06-15 14:25:04', 0, 1, 0, '0000-00-00 00:00:00', 27, '', '', ''),
(93, 11, 0, 'dsc02216', 'dsc02216', '/DCWKHZ/dsc02216.jpg', '', '2009-06-15 14:25:04', 0, 1, 0, '0000-00-00 00:00:00', 28, '', '', ''),
(94, 11, 0, 'dsc02218', 'dsc02218', '/DCWKHZ/dsc02218.jpg', '', '2009-06-15 14:25:04', 0, 1, 0, '0000-00-00 00:00:00', 29, '', '', ''),
(95, 11, 0, 'dsc02220', 'dsc02220', '/DCWKHZ/dsc02220.jpg', '', '2009-06-15 14:25:04', 0, 1, 0, '0000-00-00 00:00:00', 30, '', '', ''),
(96, 11, 0, 'dsc02221', 'dsc02221', '/DCWKHZ/dsc02221.jpg', '', '2009-06-15 14:25:04', 0, 1, 0, '0000-00-00 00:00:00', 31, '', '', ''),
(97, 11, 0, 'dsc02224', 'dsc02224', '/DCWKHZ/dsc02224.jpg', '', '2009-06-15 14:25:04', 0, 1, 0, '0000-00-00 00:00:00', 32, '', '', ''),
(98, 11, 0, 'dsc02225', 'dsc02225', '/DCWKHZ/dsc02225.jpg', '', '2009-06-15 14:25:04', 0, 1, 0, '0000-00-00 00:00:00', 33, '', '', ''),
(99, 11, 0, 'dsc02226', 'dsc02226', '/DCWKHZ/dsc02226.jpg', '', '2009-06-15 14:25:04', 0, 1, 0, '0000-00-00 00:00:00', 34, '', '', ''),
(100, 11, 0, 'dsc02228', 'dsc02228', '/DCWKHZ/dsc02228.jpg', '', '2009-06-15 14:25:04', 0, 1, 0, '0000-00-00 00:00:00', 35, '', '', ''),
(101, 11, 0, 'dsc02229', 'dsc02229', '/DCWKHZ/dsc02229.jpg', '', '2009-06-15 14:25:04', 0, 1, 0, '0000-00-00 00:00:00', 36, '', '', ''),
(102, 11, 0, 'dsc02230', 'dsc02230', '/DCWKHZ/dsc02230.jpg', '', '2009-06-15 14:25:04', 0, 1, 0, '0000-00-00 00:00:00', 37, '', '', ''),
(103, 11, 0, 'dsc02237', 'dsc02237', '/DCWKHZ/dsc02237.jpg', '', '2009-06-15 14:25:04', 0, 1, 0, '0000-00-00 00:00:00', 38, '', '', ''),
(104, 11, 0, 'dsc02238', 'dsc02238', '/DCWKHZ/dsc02238.jpg', '', '2009-06-15 14:25:04', 0, 1, 0, '0000-00-00 00:00:00', 39, '', '', ''),
(105, 11, 0, 'dsc08902', 'dsc08902', '/DCWKHZ/dsc08902.jpg', '', '2009-06-15 14:25:04', 0, 1, 0, '0000-00-00 00:00:00', 40, '', '', ''),
(106, 11, 0, 'dsc08903', 'dsc08903', '/DCWKHZ/dsc08903.jpg', '', '2009-06-15 14:25:04', 0, 1, 0, '0000-00-00 00:00:00', 41, '', '', ''),
(107, 11, 0, 'dsc08904', 'dsc08904', '/DCWKHZ/dsc08904.jpg', '', '2009-06-15 14:25:04', 0, 1, 0, '0000-00-00 00:00:00', 42, '', '', ''),
(108, 11, 0, 'dsc08905', 'dsc08905', '/DCWKHZ/dsc08905.jpg', '', '2009-06-15 14:25:04', 0, 1, 0, '0000-00-00 00:00:00', 43, '', '', ''),
(109, 11, 0, 'dsc08907', 'dsc08907', '/DCWKHZ/dsc08907.jpg', '', '2009-06-15 14:25:04', 0, 1, 0, '0000-00-00 00:00:00', 44, '', '', ''),
(110, 11, 0, 'dsc08908', 'dsc08908', '/DCWKHZ/dsc08908.jpg', '', '2009-06-15 14:25:04', 0, 1, 0, '0000-00-00 00:00:00', 45, '', '', ''),
(111, 11, 0, 'dsc08909', 'dsc08909', '/DCWKHZ/dsc08909.jpg', '', '2009-06-15 14:25:04', 0, 1, 0, '0000-00-00 00:00:00', 46, '', '', ''),
(112, 11, 0, 'dsc08911', 'dsc08911', '/DCWKHZ/dsc08911.jpg', '', '2009-06-15 14:25:04', 0, 1, 0, '0000-00-00 00:00:00', 47, '', '', ''),
(113, 11, 0, 'dsc08912', 'dsc08912', '/DCWKHZ/dsc08912.jpg', '', '2009-06-15 14:25:04', 0, 1, 0, '0000-00-00 00:00:00', 48, '', '', ''),
(114, 12, 0, '0_2', '0_2', '/VTJWIG/0_2.jpg', '', '2009-06-15 14:29:59', 0, 1, 0, '0000-00-00 00:00:00', 1, '', '', ''),
(115, 12, 0, '0_3', '0_3', '/VTJWIG/0_3.jpg', '', '2009-06-15 14:29:59', 0, 1, 0, '0000-00-00 00:00:00', 2, '', '', ''),
(116, 12, 0, '0_4', '0_4', '/VTJWIG/0_4.jpg', '', '2009-06-15 14:29:59', 0, 1, 0, '0000-00-00 00:00:00', 3, '', '', ''),
(117, 12, 0, '0_5', '0_5', '/VTJWIG/0_5.jpg', '', '2009-06-15 14:29:59', 0, 1, 0, '0000-00-00 00:00:00', 4, '', '', ''),
(118, 12, 0, '0_6', '0_6', '/VTJWIG/0_6.jpg', '', '2009-06-15 14:29:59', 0, 1, 0, '0000-00-00 00:00:00', 5, '', '', ''),
(119, 12, 0, '0_7', '0_7', '/VTJWIG/0_7.jpg', '', '2009-06-15 14:29:59', 0, 1, 0, '0000-00-00 00:00:00', 6, '', '', ''),
(120, 12, 0, '0_8', '0_8', '/VTJWIG/0_8.jpg', '', '2009-06-15 14:29:59', 0, 1, 0, '0000-00-00 00:00:00', 7, '', '', ''),
(121, 12, 0, '0_9', '0_9', '/VTJWIG/0_9.jpg', '', '2009-06-15 14:29:59', 0, 1, 0, '0000-00-00 00:00:00', 8, '', '', ''),
(122, 12, 0, '0_10', '0_10', '/VTJWIG/0_10.jpg', '', '2009-06-15 14:29:59', 0, 1, 0, '0000-00-00 00:00:00', 9, '', '', ''),
(123, 12, 0, '0_11', '0_11', '/VTJWIG/0_11.jpg', '', '2009-06-15 14:29:59', 0, 1, 0, '0000-00-00 00:00:00', 10, '', '', ''),
(124, 12, 0, '0_12', '0_12', '/VTJWIG/0_12.jpg', '', '2009-06-15 14:29:59', 0, 1, 0, '0000-00-00 00:00:00', 11, '', '', ''),
(125, 12, 0, '0_13', '0_13', '/VTJWIG/0_13.jpg', '', '2009-06-15 14:29:59', 0, 1, 0, '0000-00-00 00:00:00', 12, '', '', ''),
(126, 12, 0, '0_14', '0_14', '/VTJWIG/0_14.jpg', '', '2009-06-15 14:29:59', 0, 1, 0, '0000-00-00 00:00:00', 13, '', '', ''),
(127, 12, 0, '0_15', '0_15', '/VTJWIG/0_15.jpg', '', '2009-06-15 14:29:59', 0, 1, 0, '0000-00-00 00:00:00', 14, '', '', ''),
(128, 12, 0, '0_16', '0_16', '/VTJWIG/0_16.jpg', '', '2009-06-15 14:29:59', 0, 1, 0, '0000-00-00 00:00:00', 15, '', '', ''),
(129, 12, 0, '0_17', '0_17', '/VTJWIG/0_17.jpg', '', '2009-06-15 14:29:59', 0, 1, 0, '0000-00-00 00:00:00', 16, '', '', ''),
(130, 12, 0, '0_18', '0_18', '/VTJWIG/0_18.jpg', '', '2009-06-15 14:29:59', 0, 1, 0, '0000-00-00 00:00:00', 17, '', '', ''),
(131, 12, 0, '0_19', '0_19', '/VTJWIG/0_19.jpg', '', '2009-06-15 14:29:59', 0, 1, 0, '0000-00-00 00:00:00', 18, '', '', ''),
(132, 12, 0, '0_20', '0_20', '/VTJWIG/0_20.jpg', '', '2009-06-15 14:29:59', 0, 1, 0, '0000-00-00 00:00:00', 19, '', '', ''),
(133, 12, 0, '0_21', '0_21', '/VTJWIG/0_21.jpg', '', '2009-06-15 14:29:59', 0, 1, 0, '0000-00-00 00:00:00', 20, '', '', ''),
(134, 12, 0, '0_22', '0_22', '/VTJWIG/0_22.jpg', '', '2009-06-15 14:29:59', 0, 1, 0, '0000-00-00 00:00:00', 21, '', '', ''),
(135, 12, 0, '0_23', '0_23', '/VTJWIG/0_23.jpg', '', '2009-06-15 14:29:59', 0, 1, 0, '0000-00-00 00:00:00', 22, '', '', ''),
(136, 12, 0, '0_24', '0_24', '/VTJWIG/0_24.jpg', '', '2009-06-15 14:29:59', 0, 1, 0, '0000-00-00 00:00:00', 23, '', '', ''),
(137, 12, 0, '0_25', '0_25', '/VTJWIG/0_25.jpg', '', '2009-06-15 14:29:59', 0, 1, 0, '0000-00-00 00:00:00', 24, '', '', ''),
(138, 12, 0, '0_26', '0_26', '/VTJWIG/0_26.jpg', '', '2009-06-15 14:29:59', 0, 1, 0, '0000-00-00 00:00:00', 25, '', '', ''),
(139, 12, 0, '0_27', '0_27', '/VTJWIG/0_27.jpg', '', '2009-06-15 14:29:59', 0, 1, 0, '0000-00-00 00:00:00', 26, '', '', ''),
(140, 12, 0, '0_28', '0_28', '/VTJWIG/0_28.jpg', '', '2009-06-15 14:29:59', 0, 1, 0, '0000-00-00 00:00:00', 27, '', '', ''),
(141, 12, 0, '0_29', '0_29', '/VTJWIG/0_29.jpg', '', '2009-06-15 14:29:59', 0, 1, 0, '0000-00-00 00:00:00', 28, '', '', ''),
(142, 12, 0, '0_30', '0_30', '/VTJWIG/0_30.jpg', '', '2009-06-15 14:29:59', 0, 1, 0, '0000-00-00 00:00:00', 29, '', '', ''),
(143, 12, 0, '01', '01', '/VTJWIG/01.jpg', '', '2009-06-15 14:29:59', 0, 1, 0, '0000-00-00 00:00:00', 30, '', '', ''),
(144, 12, 0, '02', '02', '/VTJWIG/02.jpg', '', '2009-06-15 14:29:59', 0, 1, 0, '0000-00-00 00:00:00', 31, '', '', ''),
(145, 12, 0, '03', '03', '/VTJWIG/03.jpg', '', '2009-06-15 14:29:59', 0, 1, 0, '0000-00-00 00:00:00', 32, '', '', ''),
(146, 12, 0, '04', '04', '/VTJWIG/04.jpg', '', '2009-06-15 14:29:59', 0, 1, 0, '0000-00-00 00:00:00', 33, '', '', ''),
(147, 12, 0, '05', '05', '/VTJWIG/05.jpg', '', '2009-06-15 14:29:59', 0, 1, 0, '0000-00-00 00:00:00', 34, '', '', ''),
(148, 12, 0, '06', '06', '/VTJWIG/06.jpg', '', '2009-06-15 14:29:59', 0, 1, 0, '0000-00-00 00:00:00', 35, '', '', ''),
(149, 12, 0, '07', '07', '/VTJWIG/07.jpg', '', '2009-06-15 14:29:59', 0, 1, 0, '0000-00-00 00:00:00', 36, '', '', ''),
(150, 12, 0, '08', '08', '/VTJWIG/08.jpg', '', '2009-06-15 14:29:59', 0, 1, 0, '0000-00-00 00:00:00', 37, '', '', ''),
(151, 12, 0, '09', '09', '/VTJWIG/09.jpg', '', '2009-06-15 14:29:59', 0, 1, 0, '0000-00-00 00:00:00', 38, '', '', ''),
(152, 12, 0, '10', '10', '/VTJWIG/10.jpg', '', '2009-06-15 14:29:59', 0, 1, 0, '0000-00-00 00:00:00', 39, '', '', ''),
(153, 13, 0, 'construindo_o_corpo_humano_jardim_ii_mat.', 'construindo_o_corpo_humano_jardim_ii_mat.', '/XCGYXG/construindo_o_corpo_humano_jardim_ii_mat..jpg', '', '2009-06-15 14:32:11', 0, 1, 0, '0000-00-00 00:00:00', 1, '', '', ''),
(154, 13, 0, 'dia_do_disfarce_-_jardim_ii_vesp._001', 'dia_do_disfarce_-_jardim_ii_vesp._001', '/XCGYXG/dia_do_disfarce_-_jardim_ii_vesp._001.jpg', '', '2009-06-15 14:32:11', 0, 1, 0, '0000-00-00 00:00:00', 2, '', '', ''),
(155, 13, 0, 'dsc08784', 'dsc08784', '/XCGYXG/dsc08784.jpg', '', '2009-06-15 14:32:11', 0, 1, 0, '0000-00-00 00:00:00', 3, '', '', ''),
(156, 13, 0, 'dsc08828', 'dsc08828', '/XCGYXG/dsc08828.jpg', '', '2009-06-15 14:32:11', 0, 1, 0, '0000-00-00 00:00:00', 4, '', '', ''),
(157, 13, 0, 'dsc08862', 'dsc08862', '/XCGYXG/dsc08862.jpg', '', '2009-06-15 14:32:11', 0, 1, 0, '0000-00-00 00:00:00', 5, '', '', ''),
(158, 13, 0, 'dsc08863', 'dsc08863', '/XCGYXG/dsc08863.jpg', '', '2009-06-15 14:32:11', 0, 1, 0, '0000-00-00 00:00:00', 6, '', '', ''),
(159, 13, 0, 'dsc08864', 'dsc08864', '/XCGYXG/dsc08864.jpg', '', '2009-06-15 14:32:11', 0, 1, 0, '0000-00-00 00:00:00', 7, '', '', ''),
(160, 13, 0, 'dsc08898', 'dsc08898', '/XCGYXG/dsc08898.jpg', '', '2009-06-15 14:32:11', 0, 1, 0, '0000-00-00 00:00:00', 8, '', '', ''),
(161, 13, 0, 'dsc08940', 'dsc08940', '/XCGYXG/dsc08940.jpg', '', '2009-06-15 14:32:11', 0, 1, 0, '0000-00-00 00:00:00', 9, '', '', ''),
(162, 13, 0, 'dsc09009', 'dsc09009', '/XCGYXG/dsc09009.jpg', '', '2009-06-15 14:32:11', 0, 1, 0, '0000-00-00 00:00:00', 10, '', '', ''),
(163, 14, 0, 'dsc09481', 'dsc09481', '/EYLEGT/dsc09481.jpg', '', '2009-06-15 14:34:16', 0, 1, 0, '0000-00-00 00:00:00', 1, '', '', ''),
(164, 14, 0, 'dsc09482', 'dsc09482', '/EYLEGT/dsc09482.jpg', '', '2009-06-15 14:34:16', 0, 1, 0, '0000-00-00 00:00:00', 2, '', '', ''),
(165, 14, 0, 'dsc09483', 'dsc09483', '/EYLEGT/dsc09483.jpg', '', '2009-06-15 14:34:16', 0, 1, 0, '0000-00-00 00:00:00', 3, '', '', ''),
(166, 14, 0, 'dsc09485', 'dsc09485', '/EYLEGT/dsc09485.jpg', '', '2009-06-15 14:34:16', 0, 1, 0, '0000-00-00 00:00:00', 4, '', '', ''),
(167, 14, 0, 'dsc09488', 'dsc09488', '/EYLEGT/dsc09488.jpg', '', '2009-06-15 14:34:16', 0, 1, 0, '0000-00-00 00:00:00', 5, '', '', ''),
(168, 14, 0, 'dsc09490', 'dsc09490', '/EYLEGT/dsc09490.jpg', '', '2009-06-15 14:34:16', 0, 1, 0, '0000-00-00 00:00:00', 6, '', '', ''),
(169, 14, 0, 'dsc09491', 'dsc09491', '/EYLEGT/dsc09491.jpg', '', '2009-06-15 14:34:16', 0, 1, 0, '0000-00-00 00:00:00', 7, '', '', ''),
(170, 14, 0, 'dsc09492', 'dsc09492', '/EYLEGT/dsc09492.jpg', '', '2009-06-15 14:34:16', 0, 1, 0, '0000-00-00 00:00:00', 8, '', '', ''),
(171, 14, 0, 'dsc09493', 'dsc09493', '/EYLEGT/dsc09493.jpg', '', '2009-06-15 14:34:16', 0, 1, 0, '0000-00-00 00:00:00', 9, '', '', ''),
(172, 14, 0, 'dsc09495', 'dsc09495', '/EYLEGT/dsc09495.jpg', '', '2009-06-15 14:34:16', 0, 1, 0, '0000-00-00 00:00:00', 10, '', '', ''),
(173, 14, 0, 'dsc09497', 'dsc09497', '/EYLEGT/dsc09497.jpg', '', '2009-06-15 14:34:16', 0, 1, 0, '0000-00-00 00:00:00', 11, '', '', ''),
(174, 14, 0, 'dsc09499', 'dsc09499', '/EYLEGT/dsc09499.jpg', '', '2009-06-15 14:34:16', 0, 1, 0, '0000-00-00 00:00:00', 12, '', '', ''),
(175, 14, 0, 'dsc09501', 'dsc09501', '/EYLEGT/dsc09501.jpg', '', '2009-06-15 14:34:16', 0, 1, 0, '0000-00-00 00:00:00', 13, '', '', ''),
(176, 14, 0, 'dsc09504', 'dsc09504', '/EYLEGT/dsc09504.jpg', '', '2009-06-15 14:34:16', 0, 1, 0, '0000-00-00 00:00:00', 14, '', '', ''),
(177, 14, 0, 'dsc09508', 'dsc09508', '/EYLEGT/dsc09508.jpg', '', '2009-06-15 14:34:16', 0, 1, 0, '0000-00-00 00:00:00', 15, '', '', ''),
(178, 14, 0, 'dsc09512', 'dsc09512', '/EYLEGT/dsc09512.jpg', '', '2009-06-15 14:34:16', 0, 1, 0, '0000-00-00 00:00:00', 16, '', '', ''),
(179, 14, 0, 'dsc09513', 'dsc09513', '/EYLEGT/dsc09513.jpg', '', '2009-06-15 14:34:16', 0, 1, 0, '0000-00-00 00:00:00', 17, '', '', ''),
(180, 14, 0, 'dsc09518', 'dsc09518', '/EYLEGT/dsc09518.jpg', '', '2009-06-15 14:34:16', 0, 1, 0, '0000-00-00 00:00:00', 18, '', '', ''),
(181, 14, 0, 'dsc09562', 'dsc09562', '/EYLEGT/dsc09562.jpg', '', '2009-06-15 14:34:16', 0, 1, 0, '0000-00-00 00:00:00', 19, '', '', ''),
(182, 14, 0, 'dsc09565', 'dsc09565', '/EYLEGT/dsc09565.jpg', '', '2009-06-15 14:34:16', 0, 1, 0, '0000-00-00 00:00:00', 20, '', '', ''),
(183, 14, 0, 'dsc09568', 'dsc09568', '/EYLEGT/dsc09568.jpg', '', '2009-06-15 14:34:16', 0, 1, 0, '0000-00-00 00:00:00', 21, '', '', ''),
(184, 14, 0, 'dsc09573', 'dsc09573', '/EYLEGT/dsc09573.jpg', '', '2009-06-15 14:34:16', 0, 1, 0, '0000-00-00 00:00:00', 22, '', '', ''),
(185, 14, 0, 'dsc09575', 'dsc09575', '/EYLEGT/dsc09575.jpg', '', '2009-06-15 14:34:16', 0, 1, 0, '0000-00-00 00:00:00', 23, '', '', ''),
(186, 15, 0, '002222333', '002222333', '/LPDXHR/002222333.jpg', '', '2009-06-15 14:38:21', 0, 1, 0, '0000-00-00 00:00:00', 1, '', '', ''),
(187, 15, 0, 'dsc00909', 'dsc00909', '/LPDXHR/dsc00909.jpg', '', '2009-06-15 14:38:21', 0, 1, 0, '0000-00-00 00:00:00', 2, '', '', ''),
(188, 15, 0, 'dsc00910', 'dsc00910', '/LPDXHR/dsc00910.jpg', '', '2009-06-15 14:38:21', 0, 1, 0, '0000-00-00 00:00:00', 3, '', '', ''),
(189, 15, 0, 'dsc00912', 'dsc00912', '/LPDXHR/dsc00912.jpg', '', '2009-06-15 14:38:21', 0, 1, 0, '0000-00-00 00:00:00', 4, '', '', ''),
(190, 15, 0, 'dsc00917', 'dsc00917', '/LPDXHR/dsc00917.jpg', '', '2009-06-15 14:38:21', 0, 1, 0, '0000-00-00 00:00:00', 5, '', '', ''),
(191, 15, 0, 'dsc00929', 'dsc00929', '/LPDXHR/dsc00929.jpg', '', '2009-06-15 14:38:21', 0, 1, 0, '0000-00-00 00:00:00', 6, '', '', ''),
(192, 15, 0, 'dsc00945', 'dsc00945', '/LPDXHR/dsc00945.jpg', '', '2009-06-15 14:38:21', 0, 1, 0, '0000-00-00 00:00:00', 7, '', '', ''),
(193, 15, 0, 'dsc00959', 'dsc00959', '/LPDXHR/dsc00959.jpg', '', '2009-06-15 14:38:21', 0, 1, 0, '0000-00-00 00:00:00', 8, '', '', ''),
(194, 15, 0, 'dsc00975', 'dsc00975', '/LPDXHR/dsc00975.jpg', '', '2009-06-15 14:38:21', 0, 1, 0, '0000-00-00 00:00:00', 9, '', '', ''),
(195, 15, 0, 'dsc00980', 'dsc00980', '/LPDXHR/dsc00980.jpg', '', '2009-06-15 14:38:21', 0, 1, 0, '0000-00-00 00:00:00', 10, '', '', ''),
(196, 16, 0, 'chamadinha_noite_sonnho', 'chamadinha_noite_sonnho', '/BJSMMR/chamadinha_noite_sonnho.jpg', '', '2009-06-15 14:40:30', 0, 1, 0, '0000-00-00 00:00:00', 1, '', '', ''),
(197, 16, 0, 'figuras_298', 'figuras_298', '/BJSMMR/figuras_298.jpg', '', '2009-06-15 14:40:30', 0, 1, 0, '0000-00-00 00:00:00', 2, '', '', ''),
(198, 16, 0, 'figuras_299', 'figuras_299', '/BJSMMR/figuras_299.jpg', '', '2009-06-15 14:40:30', 0, 1, 0, '0000-00-00 00:00:00', 3, '', '', ''),
(199, 16, 0, 'figuras_302', 'figuras_302', '/BJSMMR/figuras_302.jpg', '', '2009-06-15 14:40:30', 0, 1, 0, '0000-00-00 00:00:00', 4, '', '', ''),
(200, 16, 0, 'figuras_308', 'figuras_308', '/BJSMMR/figuras_308.jpg', '', '2009-06-15 14:40:30', 0, 1, 0, '0000-00-00 00:00:00', 5, '', '', ''),
(201, 16, 0, 'figuras_310', 'figuras_310', '/BJSMMR/figuras_310.jpg', '', '2009-06-15 14:40:30', 0, 1, 0, '0000-00-00 00:00:00', 6, '', '', ''),
(202, 16, 0, 'figuras_312', 'figuras_312', '/BJSMMR/figuras_312.jpg', '', '2009-06-15 14:40:30', 0, 1, 0, '0000-00-00 00:00:00', 7, '', '', ''),
(203, 16, 0, 'figuras_314', 'figuras_314', '/BJSMMR/figuras_314.jpg', '', '2009-06-15 14:40:30', 0, 1, 0, '0000-00-00 00:00:00', 8, '', '', ''),
(204, 16, 0, 'figuras_315', 'figuras_315', '/BJSMMR/figuras_315.jpg', '', '2009-06-15 14:40:30', 0, 1, 0, '0000-00-00 00:00:00', 9, '', '', ''),
(205, 16, 0, 'figuras_316', 'figuras_316', '/BJSMMR/figuras_316.jpg', '', '2009-06-15 14:40:30', 0, 1, 0, '0000-00-00 00:00:00', 10, '', '', ''),
(206, 16, 0, 'figuras_323', 'figuras_323', '/BJSMMR/figuras_323.jpg', '', '2009-06-15 14:40:30', 0, 1, 0, '0000-00-00 00:00:00', 11, '', '', ''),
(207, 16, 0, 'figuras_324', 'figuras_324', '/BJSMMR/figuras_324.jpg', '', '2009-06-15 14:40:30', 0, 1, 0, '0000-00-00 00:00:00', 12, '', '', ''),
(208, 16, 0, 'figuras_326', 'figuras_326', '/BJSMMR/figuras_326.jpg', '', '2009-06-15 14:40:30', 0, 1, 0, '0000-00-00 00:00:00', 13, '', '', ''),
(209, 16, 0, 'figuras_327', 'figuras_327', '/BJSMMR/figuras_327.jpg', '', '2009-06-15 14:40:30', 0, 1, 0, '0000-00-00 00:00:00', 14, '', '', ''),
(210, 16, 0, 'figuras_328', 'figuras_328', '/BJSMMR/figuras_328.jpg', '', '2009-06-15 14:40:30', 0, 1, 0, '0000-00-00 00:00:00', 15, '', '', ''),
(211, 16, 0, 'figuras_332', 'figuras_332', '/BJSMMR/figuras_332.jpg', '', '2009-06-15 14:40:30', 0, 1, 0, '0000-00-00 00:00:00', 16, '', '', ''),
(212, 16, 0, 'figuras_334', 'figuras_334', '/BJSMMR/figuras_334.jpg', '', '2009-06-15 14:40:30', 0, 1, 0, '0000-00-00 00:00:00', 17, '', '', ''),
(213, 16, 0, 'figuras_336', 'figuras_336', '/BJSMMR/figuras_336.jpg', '', '2009-06-15 14:40:30', 0, 1, 0, '0000-00-00 00:00:00', 18, '', '', ''),
(214, 16, 0, 'figuras_338', 'figuras_338', '/BJSMMR/figuras_338.jpg', '', '2009-06-15 14:40:30', 0, 1, 0, '0000-00-00 00:00:00', 19, '', '', ''),
(215, 16, 0, 'figuras_339', 'figuras_339', '/BJSMMR/figuras_339.jpg', '', '2009-06-15 14:40:30', 0, 1, 0, '0000-00-00 00:00:00', 20, '', '', ''),
(216, 16, 0, 'figuras_340', 'figuras_340', '/BJSMMR/figuras_340.jpg', '', '2009-06-15 14:40:30', 0, 1, 0, '0000-00-00 00:00:00', 21, '', '', ''),
(217, 16, 0, 'figuras_341', 'figuras_341', '/BJSMMR/figuras_341.jpg', '', '2009-06-15 14:40:30', 0, 1, 0, '0000-00-00 00:00:00', 22, '', '', ''),
(218, 16, 0, 'figuras_348', 'figuras_348', '/BJSMMR/figuras_348.jpg', '', '2009-06-15 14:40:30', 0, 1, 0, '0000-00-00 00:00:00', 23, '', '', ''),
(219, 16, 0, 'figuras_349', 'figuras_349', '/BJSMMR/figuras_349.jpg', '', '2009-06-15 14:40:30', 0, 1, 0, '0000-00-00 00:00:00', 24, '', '', ''),
(220, 16, 0, 'figuras_350', 'figuras_350', '/BJSMMR/figuras_350.jpg', '', '2009-06-15 14:40:30', 0, 1, 0, '0000-00-00 00:00:00', 25, '', '', ''),
(221, 16, 0, 'figuras_352', 'figuras_352', '/BJSMMR/figuras_352.jpg', '', '2009-06-15 14:40:30', 0, 1, 0, '0000-00-00 00:00:00', 26, '', '', ''),
(222, 16, 0, 'figuras_353', 'figuras_353', '/BJSMMR/figuras_353.jpg', '', '2009-06-15 14:40:30', 0, 1, 0, '0000-00-00 00:00:00', 27, '', '', ''),
(223, 16, 0, 'figuras_354', 'figuras_354', '/BJSMMR/figuras_354.jpg', '', '2009-06-15 14:40:30', 0, 1, 0, '0000-00-00 00:00:00', 28, '', '', ''),
(224, 16, 0, 'figuras_355', 'figuras_355', '/BJSMMR/figuras_355.jpg', '', '2009-06-15 14:40:30', 0, 1, 0, '0000-00-00 00:00:00', 29, '', '', ''),
(225, 16, 0, 'figuras_356', 'figuras_356', '/BJSMMR/figuras_356.jpg', '', '2009-06-15 14:40:30', 0, 1, 0, '0000-00-00 00:00:00', 30, '', '', ''),
(226, 16, 0, 'figuras_357', 'figuras_357', '/BJSMMR/figuras_357.jpg', '', '2009-06-15 14:40:30', 0, 1, 0, '0000-00-00 00:00:00', 31, '', '', ''),
(227, 16, 0, 'figuras_358', 'figuras_358', '/BJSMMR/figuras_358.jpg', '', '2009-06-15 14:40:30', 0, 1, 0, '0000-00-00 00:00:00', 32, '', '', ''),
(228, 16, 0, 'figuras_359', 'figuras_359', '/BJSMMR/figuras_359.jpg', '', '2009-06-15 14:40:30', 0, 1, 0, '0000-00-00 00:00:00', 33, '', '', ''),
(229, 16, 0, 'figuras_360', 'figuras_360', '/BJSMMR/figuras_360.jpg', '', '2009-06-15 14:40:30', 0, 1, 0, '0000-00-00 00:00:00', 34, '', '', ''),
(230, 16, 0, 'figuras_361', 'figuras_361', '/BJSMMR/figuras_361.jpg', '', '2009-06-15 14:40:30', 0, 1, 0, '0000-00-00 00:00:00', 35, '', '', ''),
(231, 16, 0, 'figuras_363', 'figuras_363', '/BJSMMR/figuras_363.jpg', '', '2009-06-15 14:40:30', 0, 1, 0, '0000-00-00 00:00:00', 36, '', '', ''),
(232, 16, 0, 'figuras_364', 'figuras_364', '/BJSMMR/figuras_364.jpg', '', '2009-06-15 14:40:30', 0, 1, 0, '0000-00-00 00:00:00', 37, '', '', ''),
(233, 16, 0, 'figuras_365', 'figuras_365', '/BJSMMR/figuras_365.jpg', '', '2009-06-15 14:40:30', 0, 1, 0, '0000-00-00 00:00:00', 38, '', '', ''),
(234, 16, 0, 'figuras_366', 'figuras_366', '/BJSMMR/figuras_366.jpg', '', '2009-06-15 14:40:30', 0, 1, 0, '0000-00-00 00:00:00', 39, '', '', ''),
(235, 16, 0, 'figuras_367', 'figuras_367', '/BJSMMR/figuras_367.jpg', '', '2009-06-15 14:40:30', 0, 1, 0, '0000-00-00 00:00:00', 40, '', '', ''),
(236, 16, 0, 'figuras_368', 'figuras_368', '/BJSMMR/figuras_368.jpg', '', '2009-06-15 14:40:30', 0, 1, 0, '0000-00-00 00:00:00', 41, '', '', ''),
(237, 16, 0, 'figuras_369', 'figuras_369', '/BJSMMR/figuras_369.jpg', '', '2009-06-15 14:40:30', 0, 1, 0, '0000-00-00 00:00:00', 42, '', '', ''),
(238, 16, 0, 'figuras_372', 'figuras_372', '/BJSMMR/figuras_372.jpg', '', '2009-06-15 14:40:30', 0, 1, 0, '0000-00-00 00:00:00', 43, '', '', ''),
(239, 16, 0, 'figuras_373', 'figuras_373', '/BJSMMR/figuras_373.jpg', '', '2009-06-15 14:40:30', 0, 1, 0, '0000-00-00 00:00:00', 44, '', '', ''),
(240, 16, 0, 'figuras_374', 'figuras_374', '/BJSMMR/figuras_374.jpg', '', '2009-06-15 14:40:30', 0, 1, 0, '0000-00-00 00:00:00', 45, '', '', ''),
(241, 16, 0, 'figuras_375', 'figuras_375', '/BJSMMR/figuras_375.jpg', '', '2009-06-15 14:40:30', 0, 1, 0, '0000-00-00 00:00:00', 46, '', '', ''),
(242, 16, 0, 'figuras_377', 'figuras_377', '/BJSMMR/figuras_377.jpg', '', '2009-06-15 14:40:30', 0, 1, 0, '0000-00-00 00:00:00', 47, '', '', ''),
(243, 16, 0, 'figuras_379', 'figuras_379', '/BJSMMR/figuras_379.jpg', '', '2009-06-15 14:40:30', 0, 1, 0, '0000-00-00 00:00:00', 48, '', '', ''),
(244, 16, 0, 'figuras_380', 'figuras_380', '/BJSMMR/figuras_380.jpg', '', '2009-06-15 14:40:30', 0, 1, 0, '0000-00-00 00:00:00', 49, '', '', ''),
(245, 16, 0, 'figuras_382', 'figuras_382', '/BJSMMR/figuras_382.jpg', '', '2009-06-15 14:40:30', 0, 1, 0, '0000-00-00 00:00:00', 50, '', '', ''),
(246, 16, 0, 'figuras_383', 'figuras_383', '/BJSMMR/figuras_383.jpg', '', '2009-06-15 14:40:30', 0, 1, 0, '0000-00-00 00:00:00', 51, '', '', ''),
(247, 16, 0, 'figuras_384', 'figuras_384', '/BJSMMR/figuras_384.jpg', '', '2009-06-15 14:40:30', 0, 1, 0, '0000-00-00 00:00:00', 52, '', '', ''),
(248, 16, 0, 'figuras_386', 'figuras_386', '/BJSMMR/figuras_386.jpg', '', '2009-06-15 14:40:30', 0, 1, 0, '0000-00-00 00:00:00', 53, '', '', ''),
(249, 16, 0, 'figuras_387', 'figuras_387', '/BJSMMR/figuras_387.jpg', '', '2009-06-15 14:40:30', 0, 1, 0, '0000-00-00 00:00:00', 54, '', '', ''),
(250, 16, 0, 'figuras_388', 'figuras_388', '/BJSMMR/figuras_388.jpg', '', '2009-06-15 14:40:30', 0, 1, 0, '0000-00-00 00:00:00', 55, '', '', ''),
(251, 16, 0, 'figuras_390', 'figuras_390', '/BJSMMR/figuras_390.jpg', '', '2009-06-15 14:40:30', 0, 1, 0, '0000-00-00 00:00:00', 56, '', '', ''),
(252, 16, 0, 'figuras_392', 'figuras_392', '/BJSMMR/figuras_392.jpg', '', '2009-06-15 14:40:30', 0, 1, 0, '0000-00-00 00:00:00', 57, '', '', ''),
(253, 16, 0, 'figuras_393', 'figuras_393', '/BJSMMR/figuras_393.jpg', '', '2009-06-15 14:40:30', 0, 1, 0, '0000-00-00 00:00:00', 58, '', '', ''),
(254, 16, 0, 'figuras_394', 'figuras_394', '/BJSMMR/figuras_394.jpg', '', '2009-06-15 14:40:30', 0, 1, 0, '0000-00-00 00:00:00', 59, '', '', ''),
(255, 16, 0, 'figuras_395', 'figuras_395', '/BJSMMR/figuras_395.jpg', '', '2009-06-15 14:40:30', 0, 1, 0, '0000-00-00 00:00:00', 60, '', '', ''),
(256, 16, 0, 'figuras_397', 'figuras_397', '/BJSMMR/figuras_397.jpg', '', '2009-06-15 14:40:30', 0, 1, 0, '0000-00-00 00:00:00', 61, '', '', ''),
(257, 16, 0, 'figuras_398', 'figuras_398', '/BJSMMR/figuras_398.jpg', '', '2009-06-15 14:40:30', 0, 1, 0, '0000-00-00 00:00:00', 62, '', '', ''),
(258, 16, 0, 'patricia_oficina_dos_sonhos_004', 'patricia_oficina_dos_sonhos_004', '/BJSMMR/patricia_oficina_dos_sonhos_004.jpg', '', '2009-06-15 14:40:30', 0, 1, 0, '0000-00-00 00:00:00', 63, '', '', ''),
(259, 16, 0, 'patricia_oficina_dos_sonhos_006', 'patricia_oficina_dos_sonhos_006', '/BJSMMR/patricia_oficina_dos_sonhos_006.jpg', '', '2009-06-15 14:40:30', 0, 1, 0, '0000-00-00 00:00:00', 64, '', '', ''),
(260, 16, 0, 'patricia_oficina_dos_sonhos_009', 'patricia_oficina_dos_sonhos_009', '/BJSMMR/patricia_oficina_dos_sonhos_009.jpg', '', '2009-06-15 14:40:30', 0, 1, 0, '0000-00-00 00:00:00', 65, '', '', ''),
(261, 16, 0, 'patricia_oficina_dos_sonhos_011', 'patricia_oficina_dos_sonhos_011', '/BJSMMR/patricia_oficina_dos_sonhos_011.jpg', '', '2009-06-15 14:40:30', 0, 1, 0, '0000-00-00 00:00:00', 66, '', '', ''),
(262, 16, 0, 'patricia_oficina_dos_sonhos_017', 'patricia_oficina_dos_sonhos_017', '/BJSMMR/patricia_oficina_dos_sonhos_017.jpg', '', '2009-06-15 14:40:30', 0, 1, 0, '0000-00-00 00:00:00', 67, '', '', ''),
(263, 16, 0, 'patricia_oficina_dos_sonhos_020', 'patricia_oficina_dos_sonhos_020', '/BJSMMR/patricia_oficina_dos_sonhos_020.jpg', '', '2009-06-15 14:40:30', 0, 1, 0, '0000-00-00 00:00:00', 68, '', '', ''),
(264, 16, 0, 'patricia_oficina_dos_sonhos_024', 'patricia_oficina_dos_sonhos_024', '/BJSMMR/patricia_oficina_dos_sonhos_024.jpg', '', '2009-06-15 14:40:30', 0, 1, 0, '0000-00-00 00:00:00', 69, '', '', ''),
(265, 16, 0, 'patricia_oficina_dos_sonhos_025', 'patricia_oficina_dos_sonhos_025', '/BJSMMR/patricia_oficina_dos_sonhos_025.jpg', '', '2009-06-15 14:40:30', 0, 1, 0, '0000-00-00 00:00:00', 70, '', '', ''),
(266, 16, 0, 'patricia_oficina_dos_sonhos_033', 'patricia_oficina_dos_sonhos_033', '/BJSMMR/patricia_oficina_dos_sonhos_033.jpg', '', '2009-06-15 14:40:30', 0, 1, 0, '0000-00-00 00:00:00', 71, '', '', ''),
(267, 16, 0, 'patricia_oficina_dos_sonhos_041', 'patricia_oficina_dos_sonhos_041', '/BJSMMR/patricia_oficina_dos_sonhos_041.jpg', '', '2009-06-15 14:40:30', 0, 1, 0, '0000-00-00 00:00:00', 72, '', '', ''),
(268, 16, 0, 'patricia_oficina_dos_sonhos_042', 'patricia_oficina_dos_sonhos_042', '/BJSMMR/patricia_oficina_dos_sonhos_042.jpg', '', '2009-06-15 14:40:30', 0, 1, 0, '0000-00-00 00:00:00', 73, '', '', ''),
(269, 16, 0, 'patricia_oficina_dos_sonhos_046', 'patricia_oficina_dos_sonhos_046', '/BJSMMR/patricia_oficina_dos_sonhos_046.jpg', '', '2009-06-15 14:40:30', 0, 1, 0, '0000-00-00 00:00:00', 74, '', '', ''),
(270, 16, 0, 'patricia_oficina_dos_sonhos_051', 'patricia_oficina_dos_sonhos_051', '/BJSMMR/patricia_oficina_dos_sonhos_051.jpg', '', '2009-06-15 14:40:30', 0, 1, 0, '0000-00-00 00:00:00', 75, '', '', ''),
(271, 16, 0, 'patricia_oficina_dos_sonhos_054', 'patricia_oficina_dos_sonhos_054', '/BJSMMR/patricia_oficina_dos_sonhos_054.jpg', '', '2009-06-15 14:40:30', 0, 1, 0, '0000-00-00 00:00:00', 76, '', '', ''),
(272, 16, 0, 'patricia_oficina_dos_sonhos_055', 'patricia_oficina_dos_sonhos_055', '/BJSMMR/patricia_oficina_dos_sonhos_055.jpg', '', '2009-06-15 14:40:30', 0, 1, 0, '0000-00-00 00:00:00', 77, '', '', ''),
(273, 16, 0, 'patricia_oficina_dos_sonhos_057', 'patricia_oficina_dos_sonhos_057', '/BJSMMR/patricia_oficina_dos_sonhos_057.jpg', '', '2009-06-15 14:40:30', 0, 1, 0, '0000-00-00 00:00:00', 78, '', '', ''),
(274, 16, 0, 'patricia_oficina_dos_sonhos_059', 'patricia_oficina_dos_sonhos_059', '/BJSMMR/patricia_oficina_dos_sonhos_059.jpg', '', '2009-06-15 14:40:30', 0, 1, 0, '0000-00-00 00:00:00', 79, '', '', ''),
(275, 16, 0, 'patricia_oficina_dos_sonhos_061', 'patricia_oficina_dos_sonhos_061', '/BJSMMR/patricia_oficina_dos_sonhos_061.jpg', '', '2009-06-15 14:40:30', 0, 1, 0, '0000-00-00 00:00:00', 80, '', '', ''),
(276, 16, 0, 'patricia_oficina_dos_sonhos_064', 'patricia_oficina_dos_sonhos_064', '/BJSMMR/patricia_oficina_dos_sonhos_064.jpg', '', '2009-06-15 14:40:30', 0, 1, 0, '0000-00-00 00:00:00', 81, '', '', ''),
(277, 16, 0, 'patricia_oficina_dos_sonhos_066', 'patricia_oficina_dos_sonhos_066', '/BJSMMR/patricia_oficina_dos_sonhos_066.jpg', '', '2009-06-15 14:40:30', 0, 1, 0, '0000-00-00 00:00:00', 82, '', '', ''),
(278, 16, 0, 'patricia_oficina_dos_sonhos_068', 'patricia_oficina_dos_sonhos_068', '/BJSMMR/patricia_oficina_dos_sonhos_068.jpg', '', '2009-06-15 14:40:30', 0, 1, 0, '0000-00-00 00:00:00', 83, '', '', ''),
(279, 16, 0, 'patricia_oficina_dos_sonhos_082', 'patricia_oficina_dos_sonhos_082', '/BJSMMR/patricia_oficina_dos_sonhos_082.jpg', '', '2009-06-15 14:40:30', 0, 1, 0, '0000-00-00 00:00:00', 84, '', '', ''),
(280, 17, 0, 'dia_do_disfarce_-_jardim_ii_vesp._001', 'dia_do_disfarce_-_jardim_ii_vesp._001', '/NFITOT/dia_do_disfarce_-_jardim_ii_vesp._001.jpg', '', '2009-06-15 14:49:51', 0, 1, 0, '0000-00-00 00:00:00', 1, '', '', ''),
(281, 17, 0, 'dia_do_disfarce_002', 'dia_do_disfarce_002', '/NFITOT/dia_do_disfarce_002.jpg', '', '2009-06-15 14:49:51', 0, 1, 0, '0000-00-00 00:00:00', 2, '', '', ''),
(282, 17, 0, 'dia_do_disfarce_003', 'dia_do_disfarce_003', '/NFITOT/dia_do_disfarce_003.jpg', '', '2009-06-15 14:49:51', 0, 1, 0, '0000-00-00 00:00:00', 3, '', '', ''),
(283, 17, 0, 'dia_do_disfarce_004', 'dia_do_disfarce_004', '/NFITOT/dia_do_disfarce_004.jpg', '', '2009-06-15 14:49:51', 0, 1, 0, '0000-00-00 00:00:00', 4, '', '', ''),
(284, 17, 0, 'dsc08940', 'dsc08940', '/NFITOT/dsc08940.jpg', '', '2009-06-15 14:49:51', 0, 1, 0, '0000-00-00 00:00:00', 5, '', '', ''),
(285, 17, 0, 'dsc08941', 'dsc08941', '/NFITOT/dsc08941.jpg', '', '2009-06-15 14:49:51', 0, 1, 0, '0000-00-00 00:00:00', 6, '', '', ''),
(286, 17, 0, 'dsc08946', 'dsc08946', '/NFITOT/dsc08946.jpg', '', '2009-06-15 14:49:51', 0, 1, 0, '0000-00-00 00:00:00', 7, '', '', ''),
(287, 17, 0, 'dsc08951', 'dsc08951', '/NFITOT/dsc08951.jpg', '', '2009-06-15 14:49:51', 0, 1, 0, '0000-00-00 00:00:00', 8, '', '', ''),
(288, 17, 0, 'dsc08955', 'dsc08955', '/NFITOT/dsc08955.jpg', '', '2009-06-15 14:49:51', 0, 1, 0, '0000-00-00 00:00:00', 9, '', '', ''),
(289, 17, 0, 'dsc08956', 'dsc08956', '/NFITOT/dsc08956.jpg', '', '2009-06-15 14:49:51', 0, 1, 0, '0000-00-00 00:00:00', 10, '', '', ''),
(290, 17, 0, 'dsc08959', 'dsc08959', '/NFITOT/dsc08959.jpg', '', '2009-06-15 14:49:51', 0, 1, 0, '0000-00-00 00:00:00', 11, '', '', ''),
(291, 19, 0, 'dsc00377', 'dsc00377', '/BAMDSG/dsc00377.jpg', '', '2009-06-15 15:00:48', 0, 1, 0, '0000-00-00 00:00:00', 1, '', '', ''),
(292, 19, 0, 'dsc00379', 'dsc00379', '/BAMDSG/dsc00379.jpg', '', '2009-06-15 15:00:48', 0, 1, 0, '0000-00-00 00:00:00', 2, '', '', ''),
(293, 19, 0, 'dsc00386', 'dsc00386', '/BAMDSG/dsc00386.jpg', '', '2009-06-15 15:00:48', 0, 1, 0, '0000-00-00 00:00:00', 3, '', '', ''),
(294, 19, 0, 'dsc00390', 'dsc00390', '/BAMDSG/dsc00390.jpg', '', '2009-06-15 15:00:48', 0, 1, 0, '0000-00-00 00:00:00', 4, '', '', ''),
(295, 19, 0, 'dsc00392', 'dsc00392', '/BAMDSG/dsc00392.jpg', '', '2009-06-15 15:00:48', 0, 1, 0, '0000-00-00 00:00:00', 5, '', '', ''),
(296, 19, 0, 'dsc00398', 'dsc00398', '/BAMDSG/dsc00398.jpg', '', '2009-06-15 15:00:48', 0, 1, 0, '0000-00-00 00:00:00', 6, '', '', ''),
(297, 19, 0, 'dsc00401', 'dsc00401', '/BAMDSG/dsc00401.jpg', '', '2009-06-15 15:00:48', 0, 1, 0, '0000-00-00 00:00:00', 7, '', '', ''),
(298, 19, 0, 'dsc00402', 'dsc00402', '/BAMDSG/dsc00402.jpg', '', '2009-06-15 15:00:48', 0, 1, 0, '0000-00-00 00:00:00', 8, '', '', ''),
(299, 19, 0, 'dsc00404', 'dsc00404', '/BAMDSG/dsc00404.jpg', '', '2009-06-15 15:00:48', 0, 1, 0, '0000-00-00 00:00:00', 9, '', '', ''),
(300, 19, 0, 'dsc00409', 'dsc00409', '/BAMDSG/dsc00409.jpg', '', '2009-06-15 15:00:48', 0, 1, 0, '0000-00-00 00:00:00', 10, '', '', ''),
(301, 19, 0, 'dsc00411', 'dsc00411', '/BAMDSG/dsc00411.jpg', '', '2009-06-15 15:00:48', 0, 1, 0, '0000-00-00 00:00:00', 11, '', '', ''),
(302, 19, 0, 'dsc00412', 'dsc00412', '/BAMDSG/dsc00412.jpg', '', '2009-06-15 15:00:48', 0, 1, 0, '0000-00-00 00:00:00', 12, '', '', ''),
(303, 19, 0, 'dsc00413', 'dsc00413', '/BAMDSG/dsc00413.jpg', '', '2009-06-15 15:00:48', 0, 1, 0, '0000-00-00 00:00:00', 13, '', '', ''),
(304, 19, 0, 'dsc00417', 'dsc00417', '/BAMDSG/dsc00417.jpg', '', '2009-06-15 15:00:48', 0, 1, 0, '0000-00-00 00:00:00', 14, '', '', ''),
(305, 19, 0, 'dsc00421', 'dsc00421', '/BAMDSG/dsc00421.jpg', '', '2009-06-15 15:00:48', 0, 1, 0, '0000-00-00 00:00:00', 15, '', '', ''),
(306, 19, 0, 'dsc00423', 'dsc00423', '/BAMDSG/dsc00423.jpg', '', '2009-06-15 15:00:48', 0, 1, 0, '0000-00-00 00:00:00', 16, '', '', ''),
(307, 19, 0, 'dsc00424', 'dsc00424', '/BAMDSG/dsc00424.jpg', '', '2009-06-15 15:00:48', 0, 1, 0, '0000-00-00 00:00:00', 17, '', '', ''),
(308, 19, 0, 'dsc00429', 'dsc00429', '/BAMDSG/dsc00429.jpg', '', '2009-06-15 15:00:48', 0, 1, 0, '0000-00-00 00:00:00', 18, '', '', ''),
(309, 19, 0, 'dsc00434', 'dsc00434', '/BAMDSG/dsc00434.jpg', '', '2009-06-15 15:00:48', 0, 1, 0, '0000-00-00 00:00:00', 19, '', '', ''),
(310, 19, 0, 'dsc00444', 'dsc00444', '/BAMDSG/dsc00444.jpg', '', '2009-06-15 15:00:48', 0, 1, 0, '0000-00-00 00:00:00', 20, '', '', ''),
(311, 19, 0, 'dsc00446', 'dsc00446', '/BAMDSG/dsc00446.jpg', '', '2009-06-15 15:00:48', 0, 1, 0, '0000-00-00 00:00:00', 21, '', '', ''),
(312, 19, 0, 'dsc00455', 'dsc00455', '/BAMDSG/dsc00455.jpg', '', '2009-06-15 15:00:48', 0, 1, 0, '0000-00-00 00:00:00', 22, '', '', ''),
(313, 19, 0, 'dsc00460', 'dsc00460', '/BAMDSG/dsc00460.jpg', '', '2009-06-15 15:00:48', 0, 1, 0, '0000-00-00 00:00:00', 23, '', '', ''),
(314, 19, 0, 'dsc00468', 'dsc00468', '/BAMDSG/dsc00468.jpg', '', '2009-06-15 15:00:48', 0, 1, 0, '0000-00-00 00:00:00', 24, '', '', ''),
(315, 19, 0, 'dsc00477', 'dsc00477', '/BAMDSG/dsc00477.jpg', '', '2009-06-15 15:00:48', 0, 1, 0, '0000-00-00 00:00:00', 25, '', '', ''),
(316, 19, 0, 'dsc00482', 'dsc00482', '/BAMDSG/dsc00482.jpg', '', '2009-06-15 15:00:48', 0, 1, 0, '0000-00-00 00:00:00', 26, '', '', ''),
(317, 19, 0, 'dsc00489', 'dsc00489', '/BAMDSG/dsc00489.jpg', '', '2009-06-15 15:00:48', 0, 1, 0, '0000-00-00 00:00:00', 27, '', '', ''),
(318, 19, 0, 'dsc00493', 'dsc00493', '/BAMDSG/dsc00493.jpg', '', '2009-06-15 15:00:48', 0, 1, 0, '0000-00-00 00:00:00', 28, '', '', ''),
(319, 19, 0, 'dsc00494', 'dsc00494', '/BAMDSG/dsc00494.jpg', '', '2009-06-15 15:00:48', 0, 1, 0, '0000-00-00 00:00:00', 29, '', '', ''),
(320, 19, 0, 'dsc00495', 'dsc00495', '/BAMDSG/dsc00495.jpg', '', '2009-06-15 15:00:48', 0, 1, 0, '0000-00-00 00:00:00', 30, '', '', ''),
(321, 19, 0, 'dsc00503', 'dsc00503', '/BAMDSG/dsc00503.jpg', '', '2009-06-15 15:00:48', 0, 1, 0, '0000-00-00 00:00:00', 31, '', '', ''),
(322, 19, 0, 'dsc00505', 'dsc00505', '/BAMDSG/dsc00505.jpg', '', '2009-06-15 15:00:48', 0, 1, 0, '0000-00-00 00:00:00', 32, '', '', ''),
(323, 20, 0, 'dsc00488', 'dsc00488', '/FTIZIV/dsc00488.jpg', '', '2009-06-15 15:00:48', 0, 1, 0, '0000-00-00 00:00:00', 1, '', '', ''),
(324, 20, 0, 'dsc00491', 'dsc00491', '/FTIZIV/dsc00491.jpg', '', '2009-06-15 15:00:48', 0, 1, 0, '0000-00-00 00:00:00', 2, '', '', ''),
(325, 20, 0, 'dsc00499', 'dsc00499', '/FTIZIV/dsc00499.jpg', '', '2009-06-15 15:00:48', 0, 1, 0, '0000-00-00 00:00:00', 3, '', '', ''),
(326, 20, 0, 'dsc00501', 'dsc00501', '/FTIZIV/dsc00501.jpg', '', '2009-06-15 15:00:48', 0, 1, 0, '0000-00-00 00:00:00', 4, '', '', ''),
(327, 20, 0, 'dsc00503', 'dsc00503', '/FTIZIV/dsc00503.jpg', '', '2009-06-15 15:00:48', 0, 1, 0, '0000-00-00 00:00:00', 5, '', '', ''),
(328, 20, 0, 'dsc00514', 'dsc00514', '/FTIZIV/dsc00514.jpg', '', '2009-06-15 15:00:48', 0, 1, 0, '0000-00-00 00:00:00', 6, '', '', ''),
(329, 20, 0, 'dsc00525', 'dsc00525', '/FTIZIV/dsc00525.jpg', '', '2009-06-15 15:00:48', 0, 1, 0, '0000-00-00 00:00:00', 7, '', '', ''),
(330, 20, 0, 'dsc00533', 'dsc00533', '/FTIZIV/dsc00533.jpg', '', '2009-06-15 15:00:48', 0, 1, 0, '0000-00-00 00:00:00', 8, '', '', ''),
(331, 20, 0, 'dsc00534', 'dsc00534', '/FTIZIV/dsc00534.jpg', '', '2009-06-15 15:00:48', 0, 1, 0, '0000-00-00 00:00:00', 9, '', '', ''),
(332, 20, 0, 'dsc00540', 'dsc00540', '/FTIZIV/dsc00540.jpg', '', '2009-06-15 15:00:48', 0, 1, 0, '0000-00-00 00:00:00', 10, '', '', ''),
(333, 20, 0, 'dsc00549', 'dsc00549', '/FTIZIV/dsc00549.jpg', '', '2009-06-15 15:00:48', 0, 1, 0, '0000-00-00 00:00:00', 11, '', '', ''),
(334, 20, 0, 'dsc00553', 'dsc00553', '/FTIZIV/dsc00553.jpg', '', '2009-06-15 15:00:48', 0, 1, 0, '0000-00-00 00:00:00', 12, '', '', ''),
(335, 20, 0, 'dsc00554', 'dsc00554', '/FTIZIV/dsc00554.jpg', '', '2009-06-15 15:00:48', 0, 1, 0, '0000-00-00 00:00:00', 13, '', '', ''),
(336, 20, 0, 'dsc00564', 'dsc00564', '/FTIZIV/dsc00564.jpg', '', '2009-06-15 15:00:48', 0, 1, 0, '0000-00-00 00:00:00', 14, '', '', ''),
(337, 20, 0, 'dsc00569', 'dsc00569', '/FTIZIV/dsc00569.jpg', '', '2009-06-15 15:00:48', 0, 1, 0, '0000-00-00 00:00:00', 15, '', '', ''),
(338, 20, 0, 'dsc00576', 'dsc00576', '/FTIZIV/dsc00576.jpg', '', '2009-06-15 15:00:48', 0, 1, 0, '0000-00-00 00:00:00', 16, '', '', ''),
(339, 20, 0, 'dsc00585', 'dsc00585', '/FTIZIV/dsc00585.jpg', '', '2009-06-15 15:00:48', 0, 1, 0, '0000-00-00 00:00:00', 17, '', '', ''),
(340, 20, 0, 'dsc00589', 'dsc00589', '/FTIZIV/dsc00589.jpg', '', '2009-06-15 15:00:48', 0, 1, 0, '0000-00-00 00:00:00', 18, '', '', ''),
(341, 20, 0, 'dsc00593', 'dsc00593', '/FTIZIV/dsc00593.jpg', '', '2009-06-15 15:00:48', 0, 1, 0, '0000-00-00 00:00:00', 19, '', '', ''),
(342, 21, 0, 'dsc08745', 'dsc08745', '/UHKFTQ/dsc08745.jpg', '', '2009-06-15 15:00:48', 0, 1, 0, '0000-00-00 00:00:00', 1, '', '', ''),
(343, 21, 0, 'dsc08748', 'dsc08748', '/UHKFTQ/dsc08748.jpg', '', '2009-06-15 15:00:48', 0, 1, 0, '0000-00-00 00:00:00', 2, '', '', ''),
(344, 21, 0, 'dsc08755', 'dsc08755', '/UHKFTQ/dsc08755.jpg', '', '2009-06-15 15:00:48', 0, 1, 0, '0000-00-00 00:00:00', 3, '', '', ''),
(345, 21, 0, 'dsc08756', 'dsc08756', '/UHKFTQ/dsc08756.jpg', '', '2009-06-15 15:00:48', 0, 1, 0, '0000-00-00 00:00:00', 4, '', '', ''),
(346, 21, 0, 'dsc08760', 'dsc08760', '/UHKFTQ/dsc08760.jpg', '', '2009-06-15 15:00:48', 0, 1, 0, '0000-00-00 00:00:00', 5, '', '', ''),
(347, 21, 0, 'dsc08767', 'dsc08767', '/UHKFTQ/dsc08767.jpg', '', '2009-06-15 15:00:48', 0, 1, 0, '0000-00-00 00:00:00', 6, '', '', ''),
(348, 21, 0, 'dsc08771', 'dsc08771', '/UHKFTQ/dsc08771.jpg', '', '2009-06-15 15:00:48', 0, 1, 0, '0000-00-00 00:00:00', 7, '', '', ''),
(349, 21, 0, 'dsc08774', 'dsc08774', '/UHKFTQ/dsc08774.jpg', '', '2009-06-15 15:00:48', 0, 1, 0, '0000-00-00 00:00:00', 8, '', '', ''),
(350, 21, 0, 'dsc08778', 'dsc08778', '/UHKFTQ/dsc08778.jpg', '', '2009-06-15 15:00:48', 0, 1, 0, '0000-00-00 00:00:00', 9, '', '', ''),
(351, 22, 0, 'dsc01533', 'dsc01533', '/BVHCDK/dsc01533.jpg', '', '2009-06-15 15:43:59', 0, 1, 0, '0000-00-00 00:00:00', 1, '', '', ''),
(352, 22, 0, 'dsc01537', 'dsc01537', '/BVHCDK/dsc01537.jpg', '', '2009-06-15 15:43:59', 0, 1, 0, '0000-00-00 00:00:00', 2, '', '', ''),
(353, 22, 0, 'dsc01538', 'dsc01538', '/BVHCDK/dsc01538.jpg', '', '2009-06-15 15:43:59', 0, 1, 0, '0000-00-00 00:00:00', 3, '', '', ''),
(354, 22, 0, 'dsc01549', 'dsc01549', '/BVHCDK/dsc01549.jpg', '', '2009-06-15 15:43:59', 0, 1, 0, '0000-00-00 00:00:00', 4, '', '', ''),
(355, 22, 0, 'dsc01550', 'dsc01550', '/BVHCDK/dsc01550.jpg', '', '2009-06-15 15:43:59', 0, 1, 0, '0000-00-00 00:00:00', 5, '', '', ''),
(356, 22, 0, 'dsc01551', 'dsc01551', '/BVHCDK/dsc01551.jpg', '', '2009-06-15 15:43:59', 0, 1, 0, '0000-00-00 00:00:00', 6, '', '', ''),
(357, 22, 0, 'dsc01553', 'dsc01553', '/BVHCDK/dsc01553.jpg', '', '2009-06-15 15:43:59', 0, 1, 0, '0000-00-00 00:00:00', 7, '', '', ''),
(358, 22, 0, 'dsc01554', 'dsc01554', '/BVHCDK/dsc01554.jpg', '', '2009-06-15 15:43:59', 0, 1, 0, '0000-00-00 00:00:00', 8, '', '', ''),
(359, 22, 0, 'dsc01556', 'dsc01556', '/BVHCDK/dsc01556.jpg', '', '2009-06-15 15:43:59', 0, 1, 0, '0000-00-00 00:00:00', 9, '', '', ''),
(360, 22, 0, 'dsc01557', 'dsc01557', '/BVHCDK/dsc01557.jpg', '', '2009-06-15 15:43:59', 0, 1, 0, '0000-00-00 00:00:00', 10, '', '', ''),
(361, 22, 0, 'dsc01558', 'dsc01558', '/BVHCDK/dsc01558.jpg', '', '2009-06-15 15:43:59', 0, 1, 0, '0000-00-00 00:00:00', 11, '', '', ''),
(362, 22, 0, 'dsc01559', 'dsc01559', '/BVHCDK/dsc01559.jpg', '', '2009-06-15 15:43:59', 0, 1, 0, '0000-00-00 00:00:00', 12, '', '', ''),
(363, 22, 0, 'dsc01560', 'dsc01560', '/BVHCDK/dsc01560.jpg', '', '2009-06-15 15:43:59', 0, 1, 0, '0000-00-00 00:00:00', 13, '', '', ''),
(364, 22, 0, 'dsc01561', 'dsc01561', '/BVHCDK/dsc01561.jpg', '', '2009-06-15 15:43:59', 0, 1, 0, '0000-00-00 00:00:00', 14, '', '', ''),
(365, 22, 0, 'dsc01563', 'dsc01563', '/BVHCDK/dsc01563.jpg', '', '2009-06-15 15:43:59', 0, 1, 0, '0000-00-00 00:00:00', 15, '', '', ''),
(366, 22, 0, 'dsc01566', 'dsc01566', '/BVHCDK/dsc01566.jpg', '', '2009-06-15 15:43:59', 0, 1, 0, '0000-00-00 00:00:00', 16, '', '', ''),
(367, 22, 0, 'dsc01567', 'dsc01567', '/BVHCDK/dsc01567.jpg', '', '2009-06-15 15:43:59', 0, 1, 0, '0000-00-00 00:00:00', 17, '', '', ''),
(368, 22, 0, 'dsc01568', 'dsc01568', '/BVHCDK/dsc01568.jpg', '', '2009-06-15 15:43:59', 0, 1, 0, '0000-00-00 00:00:00', 18, '', '', ''),
(369, 22, 0, 'dsc01571', 'dsc01571', '/BVHCDK/dsc01571.jpg', '', '2009-06-15 15:43:59', 0, 1, 0, '0000-00-00 00:00:00', 19, '', '', ''),
(370, 22, 0, 'dsc01573', 'dsc01573', '/BVHCDK/dsc01573.jpg', '', '2009-06-15 15:43:59', 0, 1, 0, '0000-00-00 00:00:00', 20, '', '', ''),
(371, 22, 0, 'dsc01574', 'dsc01574', '/BVHCDK/dsc01574.jpg', '', '2009-06-15 15:43:59', 0, 1, 0, '0000-00-00 00:00:00', 21, '', '', ''),
(372, 22, 0, 'dsc01575', 'dsc01575', '/BVHCDK/dsc01575.jpg', '', '2009-06-15 15:43:59', 0, 1, 0, '0000-00-00 00:00:00', 22, '', '', ''),
(373, 22, 0, 'dsc01577', 'dsc01577', '/BVHCDK/dsc01577.jpg', '', '2009-06-15 15:43:59', 0, 1, 0, '0000-00-00 00:00:00', 23, '', '', ''),
(374, 22, 0, 'dsc01578', 'dsc01578', '/BVHCDK/dsc01578.jpg', '', '2009-06-15 15:43:59', 0, 1, 0, '0000-00-00 00:00:00', 24, '', '', ''),
(375, 22, 0, 'dsc01579', 'dsc01579', '/BVHCDK/dsc01579.jpg', '', '2009-06-15 15:43:59', 0, 1, 0, '0000-00-00 00:00:00', 25, '', '', ''),
(376, 22, 0, 'dsc01580', 'dsc01580', '/BVHCDK/dsc01580.jpg', '', '2009-06-15 15:43:59', 0, 1, 0, '0000-00-00 00:00:00', 26, '', '', ''),
(377, 22, 0, 'dsc01584', 'dsc01584', '/BVHCDK/dsc01584.jpg', '', '2009-06-15 15:43:59', 0, 1, 0, '0000-00-00 00:00:00', 27, '', '', ''),
(378, 22, 0, 'dsc01586', 'dsc01586', '/BVHCDK/dsc01586.jpg', '', '2009-06-15 15:43:59', 0, 1, 0, '0000-00-00 00:00:00', 28, '', '', ''),
(379, 22, 0, 'dsc01587', 'dsc01587', '/BVHCDK/dsc01587.jpg', '', '2009-06-15 15:43:59', 0, 1, 0, '0000-00-00 00:00:00', 29, '', '', ''),
(380, 22, 0, 'dsc01589', 'dsc01589', '/BVHCDK/dsc01589.jpg', '', '2009-06-15 15:43:59', 0, 1, 0, '0000-00-00 00:00:00', 30, '', '', ''),
(381, 22, 0, 'dsc01590', 'dsc01590', '/BVHCDK/dsc01590.jpg', '', '2009-06-15 15:43:59', 0, 1, 0, '0000-00-00 00:00:00', 31, '', '', ''),
(382, 22, 0, 'dsc01591', 'dsc01591', '/BVHCDK/dsc01591.jpg', '', '2009-06-15 15:43:59', 0, 1, 0, '0000-00-00 00:00:00', 32, '', '', ''),
(383, 22, 0, 'dsc01592', 'dsc01592', '/BVHCDK/dsc01592.jpg', '', '2009-06-15 15:43:59', 0, 1, 0, '0000-00-00 00:00:00', 33, '', '', ''),
(384, 22, 0, 'dsc01594', 'dsc01594', '/BVHCDK/dsc01594.jpg', '', '2009-06-15 15:43:59', 0, 1, 0, '0000-00-00 00:00:00', 34, '', '', ''),
(385, 22, 0, 'dsc01595', 'dsc01595', '/BVHCDK/dsc01595.jpg', '', '2009-06-15 15:43:59', 0, 1, 0, '0000-00-00 00:00:00', 35, '', '', '');
INSERT INTO `jos_phocagallery` (`id`, `catid`, `sid`, `title`, `alias`, `filename`, `description`, `date`, `hits`, `published`, `checked_out`, `checked_out_time`, `ordering`, `params`, `extlink1`, `extlink2`) VALUES
(386, 22, 0, 'dsc01597', 'dsc01597', '/BVHCDK/dsc01597.jpg', '', '2009-06-15 15:43:59', 0, 1, 0, '0000-00-00 00:00:00', 36, '', '', ''),
(387, 22, 0, 'dsc01598', 'dsc01598', '/BVHCDK/dsc01598.jpg', '', '2009-06-15 15:43:59', 0, 1, 0, '0000-00-00 00:00:00', 37, '', '', ''),
(388, 22, 0, 'dsc01599', 'dsc01599', '/BVHCDK/dsc01599.jpg', '', '2009-06-15 15:43:59', 0, 1, 0, '0000-00-00 00:00:00', 38, '', '', ''),
(389, 22, 0, 'dsc01601', 'dsc01601', '/BVHCDK/dsc01601.jpg', '', '2009-06-15 15:43:59', 0, 1, 0, '0000-00-00 00:00:00', 39, '', '', ''),
(390, 22, 0, 'dsc01602', 'dsc01602', '/BVHCDK/dsc01602.jpg', '', '2009-06-15 15:43:59', 0, 1, 0, '0000-00-00 00:00:00', 40, '', '', ''),
(391, 22, 0, 'dsc01603', 'dsc01603', '/BVHCDK/dsc01603.jpg', '', '2009-06-15 15:43:59', 0, 1, 0, '0000-00-00 00:00:00', 41, '', '', ''),
(392, 22, 0, 'dsc01605', 'dsc01605', '/BVHCDK/dsc01605.jpg', '', '2009-06-15 15:43:59', 0, 1, 0, '0000-00-00 00:00:00', 42, '', '', ''),
(393, 22, 0, 'dsc01606', 'dsc01606', '/BVHCDK/dsc01606.jpg', '', '2009-06-15 15:43:59', 0, 1, 0, '0000-00-00 00:00:00', 43, '', '', ''),
(394, 22, 0, 'dsc01607', 'dsc01607', '/BVHCDK/dsc01607.jpg', '', '2009-06-15 15:43:59', 0, 1, 0, '0000-00-00 00:00:00', 44, '', '', ''),
(395, 22, 0, 'dsc01608', 'dsc01608', '/BVHCDK/dsc01608.jpg', '', '2009-06-15 15:43:59', 0, 1, 0, '0000-00-00 00:00:00', 45, '', '', ''),
(396, 22, 0, 'dsc01609', 'dsc01609', '/BVHCDK/dsc01609.jpg', '', '2009-06-15 15:43:59', 0, 1, 0, '0000-00-00 00:00:00', 46, '', '', ''),
(397, 22, 0, 'dsc01610', 'dsc01610', '/BVHCDK/dsc01610.jpg', '', '2009-06-15 15:43:59', 0, 1, 0, '0000-00-00 00:00:00', 47, '', '', ''),
(398, 22, 0, 'dsc01611', 'dsc01611', '/BVHCDK/dsc01611.jpg', '', '2009-06-15 15:43:59', 0, 1, 0, '0000-00-00 00:00:00', 48, '', '', ''),
(399, 22, 0, 'dsc01612', 'dsc01612', '/BVHCDK/dsc01612.jpg', '', '2009-06-15 15:43:59', 0, 1, 0, '0000-00-00 00:00:00', 49, '', '', ''),
(400, 22, 0, 'dsc01615', 'dsc01615', '/BVHCDK/dsc01615.jpg', '', '2009-06-15 15:43:59', 0, 1, 0, '0000-00-00 00:00:00', 50, '', '', ''),
(401, 22, 0, 'dsc01619', 'dsc01619', '/BVHCDK/dsc01619.jpg', '', '2009-06-15 15:43:59', 0, 1, 0, '0000-00-00 00:00:00', 51, '', '', ''),
(402, 22, 0, 'dsc01622', 'dsc01622', '/BVHCDK/dsc01622.jpg', '', '2009-06-15 15:43:59', 0, 1, 0, '0000-00-00 00:00:00', 52, '', '', ''),
(403, 22, 0, 'dsc01625', 'dsc01625', '/BVHCDK/dsc01625.jpg', '', '2009-06-15 15:43:59', 0, 1, 0, '0000-00-00 00:00:00', 53, '', '', ''),
(404, 22, 0, 'dsc01626', 'dsc01626', '/BVHCDK/dsc01626.jpg', '', '2009-06-15 15:43:59', 0, 1, 0, '0000-00-00 00:00:00', 54, '', '', ''),
(405, 22, 0, 'dsc01628', 'dsc01628', '/BVHCDK/dsc01628.jpg', '', '2009-06-15 15:43:59', 0, 1, 0, '0000-00-00 00:00:00', 55, '', '', ''),
(406, 23, 0, '0_3', '0_3', '/CMOGBU/0_3.jpeg', '', '2009-06-15 15:43:59', 0, 1, 0, '0000-00-00 00:00:00', 1, '', '', ''),
(407, 23, 0, '0_6', '0_6', '/CMOGBU/0_6.jpeg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 2, '', '', ''),
(408, 23, 0, '02', '02', '/CMOGBU/02.jpeg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 3, '', '', ''),
(409, 23, 0, '04,jpeg', '04-jpeg', '/CMOGBU/04,jpeg.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 4, '', '', ''),
(410, 23, 0, '04,jpeg_1', '04-jpeg_1', '/CMOGBU/04,jpeg_1.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 5, '', '', ''),
(411, 23, 0, '05', '05', '/CMOGBU/05.jpeg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 6, '', '', ''),
(412, 23, 0, '6', '6', '/CMOGBU/6.jpeg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 7, '', '', ''),
(413, 23, 0, '8', '8', '/CMOGBU/8.jpeg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 8, '', '', ''),
(414, 23, 0, '9', '9', '/CMOGBU/9.jpeg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 9, '', '', ''),
(415, 23, 0, '10', '10', '/CMOGBU/10.jpeg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 10, '', '', ''),
(416, 23, 0, '11', '11', '/CMOGBU/11.jpeg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 11, '', '', ''),
(417, 23, 0, 'maquina_899', 'maquina_899', '/CMOGBU/maquina_899.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 12, '', '', ''),
(418, 23, 0, 'maquina_901', 'maquina_901', '/CMOGBU/maquina_901.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 13, '', '', ''),
(419, 23, 0, 'maquina_913', 'maquina_913', '/CMOGBU/maquina_913.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 14, '', '', ''),
(420, 23, 0, 'maquina_918', 'maquina_918', '/CMOGBU/maquina_918.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 15, '', '', ''),
(421, 23, 0, 'maquina_923', 'maquina_923', '/CMOGBU/maquina_923.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 16, '', '', ''),
(422, 23, 0, 'maquina_934', 'maquina_934', '/CMOGBU/maquina_934.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 17, '', '', ''),
(423, 23, 0, 'maquina_961', 'maquina_961', '/CMOGBU/maquina_961.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 18, '', '', ''),
(424, 23, 0, 'maquina_1003', 'maquina_1003', '/CMOGBU/maquina_1003.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 19, '', '', ''),
(425, 23, 0, 'maquina_1004', 'maquina_1004', '/CMOGBU/maquina_1004.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 20, '', '', ''),
(426, 23, 0, 'maquina_1006', 'maquina_1006', '/CMOGBU/maquina_1006.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 21, '', '', ''),
(427, 23, 0, 'maquina_1014', 'maquina_1014', '/CMOGBU/maquina_1014.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 22, '', '', ''),
(428, 23, 0, 'maquina_1015', 'maquina_1015', '/CMOGBU/maquina_1015.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 23, '', '', ''),
(429, 23, 0, 'maquina_1019', 'maquina_1019', '/CMOGBU/maquina_1019.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 24, '', '', ''),
(430, 23, 0, 'maquina_1024', 'maquina_1024', '/CMOGBU/maquina_1024.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 25, '', '', ''),
(431, 23, 0, 'maquina_1028', 'maquina_1028', '/CMOGBU/maquina_1028.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 26, '', '', ''),
(432, 23, 0, 'maquina_1032', 'maquina_1032', '/CMOGBU/maquina_1032.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 27, '', '', ''),
(433, 23, 0, 'maquina_1033', 'maquina_1033', '/CMOGBU/maquina_1033.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 28, '', '', ''),
(434, 23, 0, 'maquina_1034', 'maquina_1034', '/CMOGBU/maquina_1034.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 29, '', '', ''),
(435, 23, 0, 'maquina_1035', 'maquina_1035', '/CMOGBU/maquina_1035.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 30, '', '', ''),
(436, 23, 0, 'maquina_1036', 'maquina_1036', '/CMOGBU/maquina_1036.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 31, '', '', ''),
(437, 23, 0, 'maquina_1037', 'maquina_1037', '/CMOGBU/maquina_1037.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 32, '', '', ''),
(438, 23, 0, 'maquina_1038', 'maquina_1038', '/CMOGBU/maquina_1038.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 33, '', '', ''),
(439, 23, 0, 'maquina_1046', 'maquina_1046', '/CMOGBU/maquina_1046.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 34, '', '', ''),
(440, 23, 0, 'maquina_1047', 'maquina_1047', '/CMOGBU/maquina_1047.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 35, '', '', ''),
(441, 23, 0, 'maquina_1049', 'maquina_1049', '/CMOGBU/maquina_1049.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 36, '', '', ''),
(442, 23, 0, 'maquina_1060', 'maquina_1060', '/CMOGBU/maquina_1060.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 37, '', '', ''),
(443, 23, 0, 'maquina_1073', 'maquina_1073', '/CMOGBU/maquina_1073.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 38, '', '', ''),
(444, 23, 0, 'maquina_1082', 'maquina_1082', '/CMOGBU/maquina_1082.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 39, '', '', ''),
(445, 23, 0, 'maquina_1085', 'maquina_1085', '/CMOGBU/maquina_1085.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 40, '', '', ''),
(446, 24, 0, 'baixar_053', 'baixar_053', '/DUHNJT/baixar_053.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 1, '', '', ''),
(447, 24, 0, 'baixar_057', 'baixar_057', '/DUHNJT/baixar_057.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 2, '', '', ''),
(448, 24, 0, 'baixar_058', 'baixar_058', '/DUHNJT/baixar_058.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 3, '', '', ''),
(449, 24, 0, 'baixar_064', 'baixar_064', '/DUHNJT/baixar_064.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 4, '', '', ''),
(450, 24, 0, 'baixar_074', 'baixar_074', '/DUHNJT/baixar_074.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 5, '', '', ''),
(451, 24, 0, 'baixar_077', 'baixar_077', '/DUHNJT/baixar_077.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 6, '', '', ''),
(452, 24, 0, 'baixar_080', 'baixar_080', '/DUHNJT/baixar_080.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 7, '', '', ''),
(453, 24, 0, 'baixar_081', 'baixar_081', '/DUHNJT/baixar_081.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 8, '', '', ''),
(454, 24, 0, 'baixar_084', 'baixar_084', '/DUHNJT/baixar_084.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 9, '', '', ''),
(455, 24, 0, 'baixar_085', 'baixar_085', '/DUHNJT/baixar_085.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 10, '', '', ''),
(456, 24, 0, 'baixar_086', 'baixar_086', '/DUHNJT/baixar_086.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 11, '', '', ''),
(457, 24, 0, 'baixar_089', 'baixar_089', '/DUHNJT/baixar_089.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 12, '', '', ''),
(458, 24, 0, 'baixar_092', 'baixar_092', '/DUHNJT/baixar_092.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 13, '', '', ''),
(459, 24, 0, 'baixar_093', 'baixar_093', '/DUHNJT/baixar_093.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 14, '', '', ''),
(460, 24, 0, 'baixar_097', 'baixar_097', '/DUHNJT/baixar_097.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 15, '', '', ''),
(461, 24, 0, 'baixar_099', 'baixar_099', '/DUHNJT/baixar_099.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 16, '', '', ''),
(462, 24, 0, 'baixar_100', 'baixar_100', '/DUHNJT/baixar_100.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 17, '', '', ''),
(463, 24, 0, 'baixar_104', 'baixar_104', '/DUHNJT/baixar_104.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 18, '', '', ''),
(464, 24, 0, 'baixar_106', 'baixar_106', '/DUHNJT/baixar_106.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 19, '', '', ''),
(465, 24, 0, 'baixar_134', 'baixar_134', '/DUHNJT/baixar_134.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 20, '', '', ''),
(466, 24, 0, 'baixar_137', 'baixar_137', '/DUHNJT/baixar_137.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 21, '', '', ''),
(467, 24, 0, 'baixar_138', 'baixar_138', '/DUHNJT/baixar_138.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 22, '', '', ''),
(468, 24, 0, 'baixar_139', 'baixar_139', '/DUHNJT/baixar_139.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 23, '', '', ''),
(469, 24, 0, 'baixar_141', 'baixar_141', '/DUHNJT/baixar_141.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 24, '', '', ''),
(470, 24, 0, 'baixar_142', 'baixar_142', '/DUHNJT/baixar_142.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 25, '', '', ''),
(471, 24, 0, 'baixar_145', 'baixar_145', '/DUHNJT/baixar_145.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 26, '', '', ''),
(472, 24, 0, 'baixar_146', 'baixar_146', '/DUHNJT/baixar_146.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 27, '', '', ''),
(473, 24, 0, 'baixar_149', 'baixar_149', '/DUHNJT/baixar_149.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 28, '', '', ''),
(474, 24, 0, 'baixar_153', 'baixar_153', '/DUHNJT/baixar_153.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 29, '', '', ''),
(475, 25, 0, '04', '04', '/JFUVEH/04.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 1, '', '', ''),
(476, 25, 0, '08', '08', '/JFUVEH/08.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 2, '', '', ''),
(477, 25, 0, '10', '10', '/JFUVEH/10.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 3, '', '', ''),
(478, 25, 0, '14', '14', '/JFUVEH/14.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 4, '', '', ''),
(479, 25, 0, '15', '15', '/JFUVEH/15.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 5, '', '', ''),
(480, 25, 0, '16', '16', '/JFUVEH/16.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 6, '', '', ''),
(481, 25, 0, '18', '18', '/JFUVEH/18.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 7, '', '', ''),
(482, 25, 0, '19', '19', '/JFUVEH/19.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 8, '', '', ''),
(483, 25, 0, '26', '26', '/JFUVEH/26.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 9, '', '', ''),
(484, 25, 0, '28', '28', '/JFUVEH/28.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 10, '', '', ''),
(485, 25, 0, '29', '29', '/JFUVEH/29.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 11, '', '', ''),
(486, 25, 0, '30', '30', '/JFUVEH/30.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 12, '', '', ''),
(487, 25, 0, '32', '32', '/JFUVEH/32.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 13, '', '', ''),
(488, 25, 0, '34', '34', '/JFUVEH/34.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 14, '', '', ''),
(489, 25, 0, '35', '35', '/JFUVEH/35.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 15, '', '', ''),
(490, 25, 0, '36', '36', '/JFUVEH/36.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 16, '', '', ''),
(491, 25, 0, '37', '37', '/JFUVEH/37.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 17, '', '', ''),
(492, 25, 0, '38', '38', '/JFUVEH/38.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 18, '', '', ''),
(493, 25, 0, '39', '39', '/JFUVEH/39.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 19, '', '', ''),
(494, 25, 0, '41', '41', '/JFUVEH/41.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 20, '', '', ''),
(495, 25, 0, '42', '42', '/JFUVEH/42.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 21, '', '', ''),
(496, 25, 0, '43', '43', '/JFUVEH/43.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 22, '', '', ''),
(497, 25, 0, '44', '44', '/JFUVEH/44.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 23, '', '', ''),
(498, 25, 0, '45', '45', '/JFUVEH/45.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 24, '', '', ''),
(499, 25, 0, '47', '47', '/JFUVEH/47.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 25, '', '', ''),
(500, 25, 0, '48', '48', '/JFUVEH/48.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 26, '', '', ''),
(501, 25, 0, '49', '49', '/JFUVEH/49.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 27, '', '', ''),
(502, 25, 0, '50', '50', '/JFUVEH/50.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 28, '', '', ''),
(503, 25, 0, '51', '51', '/JFUVEH/51.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 29, '', '', ''),
(504, 25, 0, '52', '52', '/JFUVEH/52.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 30, '', '', ''),
(505, 25, 0, '53', '53', '/JFUVEH/53.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 31, '', '', ''),
(506, 25, 0, '55', '55', '/JFUVEH/55.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 32, '', '', ''),
(507, 25, 0, '56', '56', '/JFUVEH/56.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 33, '', '', ''),
(508, 25, 0, '58', '58', '/JFUVEH/58.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 34, '', '', ''),
(509, 25, 0, '59', '59', '/JFUVEH/59.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 35, '', '', ''),
(510, 25, 0, '60', '60', '/JFUVEH/60.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 36, '', '', ''),
(511, 25, 0, '63', '63', '/JFUVEH/63.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 37, '', '', ''),
(512, 25, 0, '64', '64', '/JFUVEH/64.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 38, '', '', ''),
(513, 25, 0, '65', '65', '/JFUVEH/65.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 39, '', '', ''),
(514, 25, 0, '66', '66', '/JFUVEH/66.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 40, '', '', ''),
(515, 25, 0, '70', '70', '/JFUVEH/70.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 41, '', '', ''),
(516, 25, 0, '73', '73', '/JFUVEH/73.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 42, '', '', ''),
(517, 25, 0, '75', '75', '/JFUVEH/75.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 43, '', '', ''),
(518, 25, 0, '77', '77', '/JFUVEH/77.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 44, '', '', ''),
(519, 25, 0, '80', '80', '/JFUVEH/80.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 45, '', '', ''),
(520, 25, 0, '81', '81', '/JFUVEH/81.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 46, '', '', ''),
(521, 25, 0, '85', '85', '/JFUVEH/85.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 47, '', '', ''),
(522, 25, 0, '88', '88', '/JFUVEH/88.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 48, '', '', ''),
(523, 25, 0, '89', '89', '/JFUVEH/89.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 49, '', '', ''),
(524, 25, 0, '90', '90', '/JFUVEH/90.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 50, '', '', ''),
(525, 25, 0, '92', '92', '/JFUVEH/92.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 51, '', '', ''),
(526, 25, 0, '94', '94', '/JFUVEH/94.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 52, '', '', ''),
(527, 25, 0, '95', '95', '/JFUVEH/95.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 53, '', '', ''),
(528, 25, 0, '96', '96', '/JFUVEH/96.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 54, '', '', ''),
(529, 25, 0, '97', '97', '/JFUVEH/97.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 55, '', '', ''),
(530, 25, 0, '99', '99', '/JFUVEH/99.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 56, '', '', ''),
(531, 25, 0, '101', '101', '/JFUVEH/101.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 57, '', '', ''),
(532, 25, 0, '102', '102', '/JFUVEH/102.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 58, '', '', ''),
(533, 25, 0, '103', '103', '/JFUVEH/103.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 59, '', '', ''),
(534, 25, 0, '104', '104', '/JFUVEH/104.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 60, '', '', ''),
(535, 25, 0, '107', '107', '/JFUVEH/107.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 61, '', '', ''),
(536, 25, 0, '108', '108', '/JFUVEH/108.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 62, '', '', ''),
(537, 25, 0, '109', '109', '/JFUVEH/109.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 63, '', '', ''),
(538, 25, 0, '110', '110', '/JFUVEH/110.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 64, '', '', ''),
(539, 25, 0, '111', '111', '/JFUVEH/111.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 65, '', '', ''),
(540, 25, 0, '114', '114', '/JFUVEH/114.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 66, '', '', ''),
(541, 25, 0, '115', '115', '/JFUVEH/115.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 67, '', '', ''),
(542, 25, 0, '116', '116', '/JFUVEH/116.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 68, '', '', ''),
(543, 26, 0, 'imagem_094', 'imagem_094', '/JMJOWW/imagem_094.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 1, '', '', ''),
(544, 26, 0, 'imagem_096', 'imagem_096', '/JMJOWW/imagem_096.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 2, '', '', ''),
(545, 26, 0, 'imagem_097', 'imagem_097', '/JMJOWW/imagem_097.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 3, '', '', ''),
(546, 26, 0, 'imagem_098', 'imagem_098', '/JMJOWW/imagem_098.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 4, '', '', ''),
(547, 26, 0, 'imagem_099', 'imagem_099', '/JMJOWW/imagem_099.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 5, '', '', ''),
(548, 26, 0, 'imagem_102', 'imagem_102', '/JMJOWW/imagem_102.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 6, '', '', ''),
(549, 26, 0, 'imagem_104', 'imagem_104', '/JMJOWW/imagem_104.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 7, '', '', ''),
(550, 26, 0, 'imagem_105', 'imagem_105', '/JMJOWW/imagem_105.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 8, '', '', ''),
(551, 26, 0, 'imagem_107', 'imagem_107', '/JMJOWW/imagem_107.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 9, '', '', ''),
(552, 26, 0, 'pb160004', 'pb160004', '/JMJOWW/pb160004.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 10, '', '', ''),
(553, 26, 0, 'pb160005', 'pb160005', '/JMJOWW/pb160005.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 11, '', '', ''),
(554, 26, 0, 'pb160008', 'pb160008', '/JMJOWW/pb160008.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 12, '', '', ''),
(555, 26, 0, 'pb160019', 'pb160019', '/JMJOWW/pb160019.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 13, '', '', ''),
(556, 26, 0, 'pb160020', 'pb160020', '/JMJOWW/pb160020.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 14, '', '', ''),
(557, 26, 0, 'pb160022', 'pb160022', '/JMJOWW/pb160022.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 15, '', '', ''),
(558, 26, 0, 'pb160028', 'pb160028', '/JMJOWW/pb160028.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 16, '', '', ''),
(559, 27, 0, 'baixar111_053', 'baixar111_053', '/KGCSKK/baixar111_053.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 1, '', '', ''),
(560, 27, 0, 'baixar111_054', 'baixar111_054', '/KGCSKK/baixar111_054.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 2, '', '', ''),
(561, 27, 0, 'baixar111_055', 'baixar111_055', '/KGCSKK/baixar111_055.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 3, '', '', ''),
(562, 27, 0, 'baixar111_056', 'baixar111_056', '/KGCSKK/baixar111_056.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 4, '', '', ''),
(563, 27, 0, 'baixar111_057', 'baixar111_057', '/KGCSKK/baixar111_057.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 5, '', '', ''),
(564, 27, 0, 'baixar111_061', 'baixar111_061', '/KGCSKK/baixar111_061.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 6, '', '', ''),
(565, 27, 0, 'baixar111_063', 'baixar111_063', '/KGCSKK/baixar111_063.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 7, '', '', ''),
(566, 27, 0, 'baixar111_065', 'baixar111_065', '/KGCSKK/baixar111_065.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 8, '', '', ''),
(567, 27, 0, 'baixar111_067', 'baixar111_067', '/KGCSKK/baixar111_067.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 9, '', '', ''),
(568, 27, 0, 'baixar111_068', 'baixar111_068', '/KGCSKK/baixar111_068.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 10, '', '', ''),
(569, 27, 0, 'baixar111_070', 'baixar111_070', '/KGCSKK/baixar111_070.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 11, '', '', ''),
(570, 27, 0, 'baixar111_071', 'baixar111_071', '/KGCSKK/baixar111_071.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 12, '', '', ''),
(571, 27, 0, 'baixar111_072', 'baixar111_072', '/KGCSKK/baixar111_072.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 13, '', '', ''),
(572, 27, 0, 'baixar111_074', 'baixar111_074', '/KGCSKK/baixar111_074.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 14, '', '', ''),
(573, 27, 0, 'baixar111_075', 'baixar111_075', '/KGCSKK/baixar111_075.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 15, '', '', ''),
(574, 27, 0, 'baixar111_078', 'baixar111_078', '/KGCSKK/baixar111_078.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 16, '', '', ''),
(575, 27, 0, 'baixar111_079', 'baixar111_079', '/KGCSKK/baixar111_079.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 17, '', '', ''),
(576, 27, 0, 'baixar111_080', 'baixar111_080', '/KGCSKK/baixar111_080.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 18, '', '', ''),
(577, 27, 0, 'baixar111_082', 'baixar111_082', '/KGCSKK/baixar111_082.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 19, '', '', ''),
(578, 27, 0, 'baixar111_084', 'baixar111_084', '/KGCSKK/baixar111_084.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 20, '', '', ''),
(579, 28, 0, 'dsc03842', 'dsc03842', '/NYZHHQ/dsc03842.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 1, '', '', ''),
(580, 28, 0, 'dsc03844', 'dsc03844', '/NYZHHQ/dsc03844.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 2, '', '', ''),
(581, 28, 0, 'dsc03845', 'dsc03845', '/NYZHHQ/dsc03845.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 3, '', '', ''),
(582, 28, 0, 'dsc03850', 'dsc03850', '/NYZHHQ/dsc03850.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 4, '', '', ''),
(583, 28, 0, 'dsc03851', 'dsc03851', '/NYZHHQ/dsc03851.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 5, '', '', ''),
(584, 28, 0, 'dsc03854', 'dsc03854', '/NYZHHQ/dsc03854.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 6, '', '', ''),
(585, 28, 0, 'dsc03856', 'dsc03856', '/NYZHHQ/dsc03856.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 7, '', '', ''),
(586, 28, 0, 'dsc03858', 'dsc03858', '/NYZHHQ/dsc03858.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 8, '', '', ''),
(587, 28, 0, 'dsc03859', 'dsc03859', '/NYZHHQ/dsc03859.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 9, '', '', ''),
(588, 28, 0, 'dsc03861', 'dsc03861', '/NYZHHQ/dsc03861.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 10, '', '', ''),
(589, 29, 0, 'dsc00511', 'dsc00511', '/PESYQJ/dsc00511.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 1, '', '', ''),
(590, 29, 0, 'dsc00512', 'dsc00512', '/PESYQJ/dsc00512.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 2, '', '', ''),
(591, 29, 0, 'dsc00513', 'dsc00513', '/PESYQJ/dsc00513.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 3, '', '', ''),
(592, 29, 0, 'dsc00514', 'dsc00514', '/PESYQJ/dsc00514.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 4, '', '', ''),
(593, 29, 0, 'dsc00522', 'dsc00522', '/PESYQJ/dsc00522.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 5, '', '', ''),
(594, 29, 0, 'dsc00525', 'dsc00525', '/PESYQJ/dsc00525.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 6, '', '', ''),
(595, 29, 0, 'dsc00526', 'dsc00526', '/PESYQJ/dsc00526.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 7, '', '', ''),
(596, 29, 0, 'dsc00531', 'dsc00531', '/PESYQJ/dsc00531.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 8, '', '', ''),
(597, 29, 0, 'dsc00532', 'dsc00532', '/PESYQJ/dsc00532.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 9, '', '', ''),
(598, 29, 0, 'dsc00535', 'dsc00535', '/PESYQJ/dsc00535.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 10, '', '', ''),
(599, 29, 0, 'dsc00536', 'dsc00536', '/PESYQJ/dsc00536.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 11, '', '', ''),
(600, 29, 0, 'dsc00540', 'dsc00540', '/PESYQJ/dsc00540.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 12, '', '', ''),
(601, 29, 0, 'dsc00544', 'dsc00544', '/PESYQJ/dsc00544.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 13, '', '', ''),
(602, 29, 0, 'dsc00546', 'dsc00546', '/PESYQJ/dsc00546.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 14, '', '', ''),
(603, 29, 0, 'dsc00547', 'dsc00547', '/PESYQJ/dsc00547.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 15, '', '', ''),
(604, 29, 0, 'dsc00551', 'dsc00551', '/PESYQJ/dsc00551.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 16, '', '', ''),
(605, 29, 0, 'dsc00552', 'dsc00552', '/PESYQJ/dsc00552.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 17, '', '', ''),
(606, 29, 0, 'dsc00558', 'dsc00558', '/PESYQJ/dsc00558.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 18, '', '', ''),
(607, 29, 0, 'dsc00560', 'dsc00560', '/PESYQJ/dsc00560.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 19, '', '', ''),
(608, 29, 0, 'dsc00561', 'dsc00561', '/PESYQJ/dsc00561.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 20, '', '', ''),
(609, 29, 0, 'dsc00562', 'dsc00562', '/PESYQJ/dsc00562.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 21, '', '', ''),
(610, 29, 0, 'dsc00565', 'dsc00565', '/PESYQJ/dsc00565.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 22, '', '', ''),
(611, 29, 0, 'dsc00566', 'dsc00566', '/PESYQJ/dsc00566.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 23, '', '', ''),
(612, 29, 0, 'dsc00569', 'dsc00569', '/PESYQJ/dsc00569.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 24, '', '', ''),
(613, 29, 0, 'dsc00572', 'dsc00572', '/PESYQJ/dsc00572.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 25, '', '', ''),
(614, 29, 0, 'dsc00573', 'dsc00573', '/PESYQJ/dsc00573.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 26, '', '', ''),
(615, 29, 0, 'dsc00577', 'dsc00577', '/PESYQJ/dsc00577.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 27, '', '', ''),
(616, 29, 0, 'dsc00586', 'dsc00586', '/PESYQJ/dsc00586.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 28, '', '', ''),
(617, 29, 0, 'dsc00593', 'dsc00593', '/PESYQJ/dsc00593.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 29, '', '', ''),
(618, 29, 0, 'dsc00596', 'dsc00596', '/PESYQJ/dsc00596.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 30, '', '', ''),
(619, 29, 0, 'dsc00599', 'dsc00599', '/PESYQJ/dsc00599.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 31, '', '', ''),
(620, 29, 0, 'dsc00601', 'dsc00601', '/PESYQJ/dsc00601.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 32, '', '', ''),
(621, 29, 0, 'dsc00602', 'dsc00602', '/PESYQJ/dsc00602.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 33, '', '', ''),
(622, 29, 0, 'dsc00603', 'dsc00603', '/PESYQJ/dsc00603.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 34, '', '', ''),
(623, 29, 0, 'dsc00606', 'dsc00606', '/PESYQJ/dsc00606.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 35, '', '', ''),
(624, 29, 0, 'dsc00607', 'dsc00607', '/PESYQJ/dsc00607.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 36, '', '', ''),
(625, 29, 0, 'dsc00614', 'dsc00614', '/PESYQJ/dsc00614.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 37, '', '', ''),
(626, 29, 0, 'dsc00620', 'dsc00620', '/PESYQJ/dsc00620.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 38, '', '', ''),
(627, 29, 0, 'dsc00626', 'dsc00626', '/PESYQJ/dsc00626.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 39, '', '', ''),
(628, 29, 0, 'dsc00628', 'dsc00628', '/PESYQJ/dsc00628.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 40, '', '', ''),
(629, 29, 0, 'dsc00630', 'dsc00630', '/PESYQJ/dsc00630.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 41, '', '', ''),
(630, 29, 0, 'dsc00637', 'dsc00637', '/PESYQJ/dsc00637.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 42, '', '', ''),
(631, 29, 0, 'dsc00641', 'dsc00641', '/PESYQJ/dsc00641.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 43, '', '', ''),
(632, 29, 0, 'dsc00642', 'dsc00642', '/PESYQJ/dsc00642.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 44, '', '', ''),
(633, 29, 0, 'dsc00645', 'dsc00645', '/PESYQJ/dsc00645.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 45, '', '', ''),
(634, 29, 0, 'dsc00654', 'dsc00654', '/PESYQJ/dsc00654.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 46, '', '', ''),
(635, 29, 0, 'dsc00660', 'dsc00660', '/PESYQJ/dsc00660.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 47, '', '', ''),
(636, 29, 0, 'dsc00661', 'dsc00661', '/PESYQJ/dsc00661.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 48, '', '', ''),
(637, 29, 0, 'dsc00663', 'dsc00663', '/PESYQJ/dsc00663.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 49, '', '', ''),
(638, 29, 0, 'dsc00665', 'dsc00665', '/PESYQJ/dsc00665.jpg', '', '2009-06-15 15:44:00', 0, 1, 0, '0000-00-00 00:00:00', 50, '', '', ''),
(639, 29, 0, 'dsc00667', 'dsc00667', '/PESYQJ/dsc00667.jpg', '', '2009-06-15 15:44:01', 0, 1, 0, '0000-00-00 00:00:00', 51, '', '', ''),
(640, 29, 0, 'dsc00677', 'dsc00677', '/PESYQJ/dsc00677.jpg', '', '2009-06-15 15:44:01', 0, 1, 0, '0000-00-00 00:00:00', 52, '', '', ''),
(641, 29, 0, 'dsc00681', 'dsc00681', '/PESYQJ/dsc00681.jpg', '', '2009-06-15 15:44:01', 0, 1, 0, '0000-00-00 00:00:00', 53, '', '', ''),
(642, 29, 0, 'dsc00691', 'dsc00691', '/PESYQJ/dsc00691.jpg', '', '2009-06-15 15:44:01', 0, 1, 0, '0000-00-00 00:00:00', 54, '', '', ''),
(643, 29, 0, 'dsc00695', 'dsc00695', '/PESYQJ/dsc00695.jpg', '', '2009-06-15 15:44:01', 0, 1, 0, '0000-00-00 00:00:00', 55, '', '', ''),
(644, 29, 0, 'dsc01185', 'dsc01185', '/PESYQJ/dsc01185.jpg', '', '2009-06-15 15:44:01', 0, 1, 0, '0000-00-00 00:00:00', 56, '', '', ''),
(645, 29, 0, 'dsc01206', 'dsc01206', '/PESYQJ/dsc01206.jpg', '', '2009-06-15 15:44:01', 0, 1, 0, '0000-00-00 00:00:00', 57, '', '', ''),
(646, 29, 0, 'dsc01208', 'dsc01208', '/PESYQJ/dsc01208.jpg', '', '2009-06-15 15:44:01', 0, 1, 0, '0000-00-00 00:00:00', 58, '', '', ''),
(647, 29, 0, 'dsc01210', 'dsc01210', '/PESYQJ/dsc01210.jpg', '', '2009-06-15 15:44:01', 0, 1, 0, '0000-00-00 00:00:00', 59, '', '', ''),
(648, 29, 0, 'dsc01217', 'dsc01217', '/PESYQJ/dsc01217.jpg', '', '2009-06-15 15:44:01', 0, 1, 0, '0000-00-00 00:00:00', 60, '', '', ''),
(649, 29, 0, 'dsc01223', 'dsc01223', '/PESYQJ/dsc01223.jpg', '', '2009-06-15 15:44:01', 0, 1, 0, '0000-00-00 00:00:00', 61, '', '', ''),
(650, 29, 0, 'dsc01224', 'dsc01224', '/PESYQJ/dsc01224.jpg', '', '2009-06-15 15:44:01', 0, 1, 0, '0000-00-00 00:00:00', 62, '', '', ''),
(651, 29, 0, 'dsc01227', 'dsc01227', '/PESYQJ/dsc01227.jpg', '', '2009-06-15 15:44:01', 0, 1, 0, '0000-00-00 00:00:00', 63, '', '', ''),
(652, 29, 0, 'dsc01241', 'dsc01241', '/PESYQJ/dsc01241.jpg', '', '2009-06-15 15:44:01', 0, 1, 0, '0000-00-00 00:00:00', 64, '', '', ''),
(653, 29, 0, 'dsc01242', 'dsc01242', '/PESYQJ/dsc01242.jpg', '', '2009-06-15 15:44:01', 0, 1, 0, '0000-00-00 00:00:00', 65, '', '', ''),
(654, 29, 0, 'dsc01247', 'dsc01247', '/PESYQJ/dsc01247.jpg', '', '2009-06-15 15:44:01', 0, 1, 0, '0000-00-00 00:00:00', 66, '', '', ''),
(655, 29, 0, 'dsc01248', 'dsc01248', '/PESYQJ/dsc01248.jpg', '', '2009-06-15 15:44:01', 0, 1, 0, '0000-00-00 00:00:00', 67, '', '', ''),
(656, 29, 0, 'dsc01249', 'dsc01249', '/PESYQJ/dsc01249.jpg', '', '2009-06-15 15:44:01', 0, 1, 0, '0000-00-00 00:00:00', 68, '', '', ''),
(657, 29, 0, 'dsc01252', 'dsc01252', '/PESYQJ/dsc01252.jpg', '', '2009-06-15 15:44:01', 1, 1, 0, '0000-00-00 00:00:00', 69, '', '', ''),
(658, 29, 0, 'dsc01255', 'dsc01255', '/PESYQJ/dsc01255.jpg', '', '2009-06-15 15:44:01', 1, 1, 0, '0000-00-00 00:00:00', 70, '', '', ''),
(659, 29, 0, 'dsc_7', 'dsc_7', '/PESYQJ/dsc_7.jpg', '', '2009-06-15 15:44:01', 1, 1, 0, '0000-00-00 00:00:00', 71, '', '', ''),
(660, 29, 0, 'dsc_380', 'dsc_380', '/PESYQJ/dsc_380.jpg', '', '2009-06-15 15:44:01', 0, 1, 0, '0000-00-00 00:00:00', 72, '', '', ''),
(661, 29, 0, 'dsc_384', 'dsc_384', '/PESYQJ/dsc_384.jpg', '', '2009-06-15 15:44:01', 0, 1, 0, '0000-00-00 00:00:00', 73, '', '', ''),
(662, 29, 0, 'dsc_388', 'dsc_388', '/PESYQJ/dsc_388.jpg', '', '2009-06-15 15:44:01', 0, 1, 0, '0000-00-00 00:00:00', 74, '', '', ''),
(663, 30, 0, 'dsc04329', 'dsc04329', '/PKMMMM/dsc04329.jpg', '', '2009-06-15 15:44:01', 0, 1, 0, '0000-00-00 00:00:00', 1, '', '', ''),
(664, 30, 0, 'dsc04350', 'dsc04350', '/PKMMMM/dsc04350.jpg', '', '2009-06-15 15:44:01', 0, 1, 0, '0000-00-00 00:00:00', 2, '', '', ''),
(665, 30, 0, 'dsc04403', 'dsc04403', '/PKMMMM/dsc04403.jpg', '', '2009-06-15 15:44:01', 0, 1, 0, '0000-00-00 00:00:00', 3, '', '', ''),
(666, 30, 0, 'dsc04407', 'dsc04407', '/PKMMMM/dsc04407.jpg', '', '2009-06-15 15:44:01', 0, 1, 0, '0000-00-00 00:00:00', 4, '', '', ''),
(667, 30, 0, 'dsc04414', 'dsc04414', '/PKMMMM/dsc04414.jpg', '', '2009-06-15 15:44:01', 0, 1, 0, '0000-00-00 00:00:00', 5, '', '', ''),
(668, 30, 0, 'dsc04415', 'dsc04415', '/PKMMMM/dsc04415.jpg', '', '2009-06-15 15:44:01', 0, 1, 0, '0000-00-00 00:00:00', 6, '', '', ''),
(669, 30, 0, 'dsc04443', 'dsc04443', '/PKMMMM/dsc04443.jpg', '', '2009-06-15 15:44:01', 0, 1, 0, '0000-00-00 00:00:00', 7, '', '', ''),
(670, 30, 0, 'dsc04449', 'dsc04449', '/PKMMMM/dsc04449.jpg', '', '2009-06-15 15:44:01', 0, 1, 0, '0000-00-00 00:00:00', 8, '', '', ''),
(671, 30, 0, 'dsc04453', 'dsc04453', '/PKMMMM/dsc04453.jpg', '', '2009-06-15 15:44:01', 0, 1, 0, '0000-00-00 00:00:00', 9, '', '', ''),
(672, 30, 0, 'dsc04463', 'dsc04463', '/PKMMMM/dsc04463.jpg', '', '2009-06-15 15:44:01', 0, 1, 0, '0000-00-00 00:00:00', 10, '', '', ''),
(673, 30, 0, 'dsc04475', 'dsc04475', '/PKMMMM/dsc04475.jpg', '', '2009-06-15 15:44:01', 0, 1, 0, '0000-00-00 00:00:00', 11, '', '', ''),
(674, 30, 0, 'dsc04477', 'dsc04477', '/PKMMMM/dsc04477.jpg', '', '2009-06-15 15:44:01', 0, 1, 0, '0000-00-00 00:00:00', 12, '', '', ''),
(675, 30, 0, 'dsc04480', 'dsc04480', '/PKMMMM/dsc04480.jpg', '', '2009-06-15 15:44:01', 0, 1, 0, '0000-00-00 00:00:00', 13, '', '', ''),
(676, 30, 0, 'dsc04484', 'dsc04484', '/PKMMMM/dsc04484.jpg', '', '2009-06-15 15:44:01', 0, 1, 0, '0000-00-00 00:00:00', 14, '', '', ''),
(677, 30, 0, 'dsc_293', 'dsc_293', '/PKMMMM/dsc_293.jpg', '', '2009-06-15 15:44:01', 0, 1, 0, '0000-00-00 00:00:00', 15, '', '', ''),
(678, 30, 0, 'dsc_2318', 'dsc_2318', '/PKMMMM/dsc_2318.jpg', '', '2009-06-15 15:44:01', 0, 1, 0, '0000-00-00 00:00:00', 16, '', '', ''),
(679, 30, 0, 'p9270097', 'p9270097', '/PKMMMM/p9270097.jpg', '', '2009-06-15 15:44:01', 0, 1, 0, '0000-00-00 00:00:00', 17, '', '', ''),
(680, 30, 0, 'p9270108', 'p9270108', '/PKMMMM/p9270108.jpg', '', '2009-06-15 15:44:01', 0, 1, 0, '0000-00-00 00:00:00', 18, '', '', ''),
(681, 30, 0, 'p_9270089', 'p_9270089', '/PKMMMM/p_9270089.jpg', '', '2009-06-15 15:44:01', 0, 1, 0, '0000-00-00 00:00:00', 19, '', '', ''),
(682, 31, 0, 'imagem_082', 'imagem_082', '/QHFIFL/imagem_082.jpg', '', '2009-06-15 15:44:01', 0, 1, 0, '0000-00-00 00:00:00', 1, '', '', ''),
(683, 31, 0, 'imagem_1', 'imagem_1', '/QHFIFL/imagem_1.jpg', '', '2009-06-15 15:44:01', 0, 1, 0, '0000-00-00 00:00:00', 2, '', '', ''),
(684, 31, 0, 'imagem_2', 'imagem_2', '/QHFIFL/imagem_2.jpg', '', '2009-06-15 15:44:01', 0, 1, 0, '0000-00-00 00:00:00', 3, '', '', ''),
(685, 31, 0, 'imagem_3', 'imagem_3', '/QHFIFL/imagem_3.jpg', '', '2009-06-15 15:44:01', 0, 1, 0, '0000-00-00 00:00:00', 4, '', '', ''),
(686, 31, 0, 'imagem_4', 'imagem_4', '/QHFIFL/imagem_4.jpg', '', '2009-06-15 15:44:01', 0, 1, 0, '0000-00-00 00:00:00', 5, '', '', ''),
(687, 31, 0, 'imagem_5', 'imagem_5', '/QHFIFL/imagem_5.jpg', '', '2009-06-15 15:44:01', 0, 1, 0, '0000-00-00 00:00:00', 6, '', '', ''),
(688, 31, 0, 'imagem_6', 'imagem_6', '/QHFIFL/imagem_6.jpg', '', '2009-06-15 15:44:01', 0, 1, 0, '0000-00-00 00:00:00', 7, '', '', ''),
(689, 31, 0, 'imagem_7', 'imagem_7', '/QHFIFL/imagem_7.jpg', '', '2009-06-15 15:44:01', 0, 1, 0, '0000-00-00 00:00:00', 8, '', '', ''),
(690, 31, 0, 'imagem_8', 'imagem_8', '/QHFIFL/imagem_8.jpg', '', '2009-06-15 15:44:01', 0, 1, 0, '0000-00-00 00:00:00', 9, '', '', ''),
(691, 31, 0, 'imagem_9', 'imagem_9', '/QHFIFL/imagem_9.jpg', '', '2009-06-15 15:44:01', 0, 1, 0, '0000-00-00 00:00:00', 10, '', '', ''),
(692, 32, 0, 'imagem_002', 'imagem_002', '/SQMMUW/imagem_002.jpg', '', '2009-06-15 15:44:01', 0, 1, 0, '0000-00-00 00:00:00', 1, '', '', ''),
(693, 32, 0, 'imagem_003', 'imagem_003', '/SQMMUW/imagem_003.jpg', '', '2009-06-15 15:44:01', 0, 1, 0, '0000-00-00 00:00:00', 2, '', '', ''),
(694, 32, 0, 'imagem_005', 'imagem_005', '/SQMMUW/imagem_005.jpg', '', '2009-06-15 15:44:01', 0, 1, 0, '0000-00-00 00:00:00', 3, '', '', ''),
(695, 32, 0, 'imagem_008', 'imagem_008', '/SQMMUW/imagem_008.jpg', '', '2009-06-15 15:44:01', 0, 1, 0, '0000-00-00 00:00:00', 4, '', '', ''),
(696, 33, 0, 'dsc00875', 'dsc00875', '/WBZBOO/dsc00875.jpg', '', '2009-06-15 15:44:01', 0, 1, 0, '0000-00-00 00:00:00', 1, '', '', ''),
(697, 33, 0, 'dsc00876', 'dsc00876', '/WBZBOO/dsc00876.jpg', '', '2009-06-15 15:44:01', 0, 1, 0, '0000-00-00 00:00:00', 2, '', '', ''),
(698, 33, 0, 'dsc00877', 'dsc00877', '/WBZBOO/dsc00877.jpg', '', '2009-06-15 15:44:01', 0, 1, 0, '0000-00-00 00:00:00', 3, '', '', ''),
(699, 33, 0, 'dsc00879', 'dsc00879', '/WBZBOO/dsc00879.jpg', '', '2009-06-15 15:44:01', 0, 1, 0, '0000-00-00 00:00:00', 4, '', '', ''),
(700, 33, 0, 'dsc00881', 'dsc00881', '/WBZBOO/dsc00881.jpg', '', '2009-06-15 15:44:01', 0, 1, 0, '0000-00-00 00:00:00', 5, '', '', ''),
(701, 33, 0, 'dsc00883', 'dsc00883', '/WBZBOO/dsc00883.jpg', '', '2009-06-15 15:44:01', 0, 1, 0, '0000-00-00 00:00:00', 6, '', '', ''),
(702, 33, 0, 'dsc00884', 'dsc00884', '/WBZBOO/dsc00884.jpg', '', '2009-06-15 15:44:01', 0, 1, 0, '0000-00-00 00:00:00', 7, '', '', ''),
(703, 33, 0, 'dsc00888', 'dsc00888', '/WBZBOO/dsc00888.jpg', '', '2009-06-15 15:44:01', 0, 1, 0, '0000-00-00 00:00:00', 8, '', '', ''),
(704, 33, 0, 'dsc00889', 'dsc00889', '/WBZBOO/dsc00889.jpg', '', '2009-06-15 15:44:01', 0, 1, 0, '0000-00-00 00:00:00', 9, '', '', ''),
(705, 33, 0, 'dsc00890', 'dsc00890', '/WBZBOO/dsc00890.jpg', '', '2009-06-15 15:44:01', 0, 1, 0, '0000-00-00 00:00:00', 10, '', '', ''),
(706, 33, 0, 'dsc00891', 'dsc00891', '/WBZBOO/dsc00891.jpg', '', '2009-06-15 15:44:01', 0, 1, 0, '0000-00-00 00:00:00', 11, '', '', ''),
(707, 33, 0, 'dsc00893', 'dsc00893', '/WBZBOO/dsc00893.jpg', '', '2009-06-15 15:44:01', 0, 1, 0, '0000-00-00 00:00:00', 12, '', '', ''),
(708, 33, 0, 'dsc00894', 'dsc00894', '/WBZBOO/dsc00894.jpg', '', '2009-06-15 15:44:01', 0, 1, 0, '0000-00-00 00:00:00', 13, '', '', ''),
(709, 33, 0, 'dsc00903', 'dsc00903', '/WBZBOO/dsc00903.jpg', '', '2009-06-15 15:44:01', 0, 1, 0, '0000-00-00 00:00:00', 14, '', '', ''),
(710, 33, 0, 'dsc00907', 'dsc00907', '/WBZBOO/dsc00907.jpg', '', '2009-06-15 15:44:01', 0, 1, 0, '0000-00-00 00:00:00', 15, '', '', ''),
(711, 33, 0, 'dsc00921', 'dsc00921', '/WBZBOO/dsc00921.jpg', '', '2009-06-15 15:44:01', 0, 1, 0, '0000-00-00 00:00:00', 16, '', '', ''),
(712, 33, 0, 'dsc00922', 'dsc00922', '/WBZBOO/dsc00922.jpg', '', '2009-06-15 15:44:01', 0, 1, 0, '0000-00-00 00:00:00', 17, '', '', ''),
(713, 33, 0, 'dsc00929', 'dsc00929', '/WBZBOO/dsc00929.jpg', '', '2009-06-15 15:44:01', 0, 1, 0, '0000-00-00 00:00:00', 18, '', '', ''),
(714, 33, 0, 'dsc00934', 'dsc00934', '/WBZBOO/dsc00934.jpg', '', '2009-06-15 15:44:01', 0, 1, 0, '0000-00-00 00:00:00', 19, '', '', ''),
(715, 33, 0, 'dsc00936', 'dsc00936', '/WBZBOO/dsc00936.jpg', '', '2009-06-15 15:44:01', 0, 1, 0, '0000-00-00 00:00:00', 20, '', '', ''),
(716, 33, 0, 'dsc00937', 'dsc00937', '/WBZBOO/dsc00937.jpg', '', '2009-06-15 15:44:01', 0, 1, 0, '0000-00-00 00:00:00', 21, '', '', ''),
(717, 33, 0, 'dsc00942', 'dsc00942', '/WBZBOO/dsc00942.jpg', '', '2009-06-15 15:44:01', 0, 1, 0, '0000-00-00 00:00:00', 22, '', '', ''),
(718, 33, 0, 'dsc00947', 'dsc00947', '/WBZBOO/dsc00947.jpg', '', '2009-06-15 15:44:01', 0, 1, 0, '0000-00-00 00:00:00', 23, '', '', ''),
(719, 33, 0, 'dsc00950', 'dsc00950', '/WBZBOO/dsc00950.jpg', '', '2009-06-15 15:44:01', 0, 1, 0, '0000-00-00 00:00:00', 24, '', '', ''),
(720, 33, 0, 'dsc00953', 'dsc00953', '/WBZBOO/dsc00953.jpg', '', '2009-06-15 15:44:01', 0, 1, 0, '0000-00-00 00:00:00', 25, '', '', ''),
(721, 33, 0, 'dsc00955', 'dsc00955', '/WBZBOO/dsc00955.jpg', '', '2009-06-15 15:44:01', 0, 1, 0, '0000-00-00 00:00:00', 26, '', '', ''),
(722, 33, 0, 'dsc00962', 'dsc00962', '/WBZBOO/dsc00962.jpg', '', '2009-06-15 15:44:01', 0, 1, 0, '0000-00-00 00:00:00', 27, '', '', ''),
(723, 33, 0, 'dsc00963', 'dsc00963', '/WBZBOO/dsc00963.jpg', '', '2009-06-15 15:44:01', 0, 1, 0, '0000-00-00 00:00:00', 28, '', '', ''),
(724, 33, 0, 'dsc00964', 'dsc00964', '/WBZBOO/dsc00964.jpg', '', '2009-06-15 15:44:01', 0, 1, 0, '0000-00-00 00:00:00', 29, '', '', ''),
(725, 33, 0, 'dsc_1', 'dsc_1', '/WBZBOO/dsc_1.jpg', '', '2009-06-15 15:44:01', 0, 1, 0, '0000-00-00 00:00:00', 30, '', '', ''),
(726, 34, 0, 'figuras_128', 'figuras_128', '/YZVABD/figuras_128.jpg', '', '2009-06-15 15:44:01', 0, 1, 0, '0000-00-00 00:00:00', 1, '', '', ''),
(727, 34, 0, 'figuras_129', 'figuras_129', '/YZVABD/figuras_129.jpg', '', '2009-06-15 15:44:01', 0, 1, 0, '0000-00-00 00:00:00', 2, '', '', ''),
(728, 34, 0, 'figuras_130', 'figuras_130', '/YZVABD/figuras_130.jpg', '', '2009-06-15 15:44:01', 0, 1, 0, '0000-00-00 00:00:00', 3, '', '', ''),
(729, 34, 0, 'figuras_131', 'figuras_131', '/YZVABD/figuras_131.jpg', '', '2009-06-15 15:44:01', 0, 1, 0, '0000-00-00 00:00:00', 4, '', '', ''),
(730, 34, 0, 'figuras_132', 'figuras_132', '/YZVABD/figuras_132.jpg', '', '2009-06-15 15:44:01', 0, 1, 0, '0000-00-00 00:00:00', 5, '', '', ''),
(731, 34, 0, 'figuras_134', 'figuras_134', '/YZVABD/figuras_134.jpg', '', '2009-06-15 15:44:01', 0, 1, 0, '0000-00-00 00:00:00', 6, '', '', ''),
(732, 34, 0, 'figuras_135', 'figuras_135', '/YZVABD/figuras_135.jpg', '', '2009-06-15 15:44:01', 0, 1, 0, '0000-00-00 00:00:00', 7, '', '', ''),
(733, 34, 0, 'figuras_136', 'figuras_136', '/YZVABD/figuras_136.jpg', '', '2009-06-15 15:44:01', 0, 1, 0, '0000-00-00 00:00:00', 8, '', '', ''),
(734, 34, 0, 'figuras_138', 'figuras_138', '/YZVABD/figuras_138.jpg', '', '2009-06-15 15:44:01', 0, 1, 0, '0000-00-00 00:00:00', 9, '', '', ''),
(735, 34, 0, 'figuras_139', 'figuras_139', '/YZVABD/figuras_139.jpg', '', '2009-06-15 15:44:01', 0, 1, 0, '0000-00-00 00:00:00', 10, '', '', ''),
(736, 34, 0, 'figuras_141', 'figuras_141', '/YZVABD/figuras_141.jpg', '', '2009-06-15 15:44:01', 0, 1, 0, '0000-00-00 00:00:00', 11, '', '', ''),
(737, 34, 0, 'figuras_143', 'figuras_143', '/YZVABD/figuras_143.jpg', '', '2009-06-15 15:44:01', 0, 1, 0, '0000-00-00 00:00:00', 12, '', '', ''),
(738, 34, 0, 'figuras_144', 'figuras_144', '/YZVABD/figuras_144.jpg', '', '2009-06-15 15:44:01', 0, 1, 0, '0000-00-00 00:00:00', 13, '', '', ''),
(739, 34, 0, 'figuras_145', 'figuras_145', '/YZVABD/figuras_145.jpg', '', '2009-06-15 15:44:01', 0, 1, 0, '0000-00-00 00:00:00', 14, '', '', ''),
(740, 34, 0, 'figuras_146', 'figuras_146', '/YZVABD/figuras_146.jpg', '', '2009-06-15 15:44:01', 0, 1, 0, '0000-00-00 00:00:00', 15, '', '', ''),
(741, 34, 0, 'figuras_147', 'figuras_147', '/YZVABD/figuras_147.jpg', '', '2009-06-15 15:44:01', 0, 1, 0, '0000-00-00 00:00:00', 16, '', '', ''),
(742, 34, 0, 'figuras_148', 'figuras_148', '/YZVABD/figuras_148.jpg', '', '2009-06-15 15:44:01', 0, 1, 0, '0000-00-00 00:00:00', 17, '', '', ''),
(743, 34, 0, 'figuras_149', 'figuras_149', '/YZVABD/figuras_149.jpg', '', '2009-06-15 15:44:01', 0, 1, 0, '0000-00-00 00:00:00', 18, '', '', ''),
(744, 34, 0, 'figuras_150', 'figuras_150', '/YZVABD/figuras_150.jpg', '', '2009-06-15 15:44:01', 0, 1, 0, '0000-00-00 00:00:00', 19, '', '', ''),
(745, 34, 0, 'figuras_151', 'figuras_151', '/YZVABD/figuras_151.jpg', '', '2009-06-15 15:44:01', 0, 1, 0, '0000-00-00 00:00:00', 20, '', '', ''),
(746, 34, 0, 'figuras_153', 'figuras_153', '/YZVABD/figuras_153.jpg', '', '2009-06-15 15:44:01', 0, 1, 0, '0000-00-00 00:00:00', 21, '', '', ''),
(747, 34, 0, 'figuras_155', 'figuras_155', '/YZVABD/figuras_155.jpg', '', '2009-06-15 15:44:01', 0, 1, 0, '0000-00-00 00:00:00', 22, '', '', ''),
(748, 34, 0, 'figuras_156', 'figuras_156', '/YZVABD/figuras_156.jpg', '', '2009-06-15 15:44:01', 0, 1, 0, '0000-00-00 00:00:00', 23, '', '', ''),
(749, 34, 0, 'figuras_157', 'figuras_157', '/YZVABD/figuras_157.jpg', '', '2009-06-15 15:44:01', 0, 1, 0, '0000-00-00 00:00:00', 24, '', '', ''),
(750, 34, 0, 'figuras_158', 'figuras_158', '/YZVABD/figuras_158.jpg', '', '2009-06-15 15:44:01', 0, 1, 0, '0000-00-00 00:00:00', 25, '', '', ''),
(751, 34, 0, 'figuras_161', 'figuras_161', '/YZVABD/figuras_161.jpg', '', '2009-06-15 15:44:01', 0, 1, 0, '0000-00-00 00:00:00', 26, '', '', ''),
(752, 34, 0, 'figuras_162', 'figuras_162', '/YZVABD/figuras_162.jpg', '', '2009-06-15 15:44:01', 0, 1, 0, '0000-00-00 00:00:00', 27, '', '', ''),
(753, 34, 0, 'figuras_164', 'figuras_164', '/YZVABD/figuras_164.jpg', '', '2009-06-15 15:44:01', 0, 1, 0, '0000-00-00 00:00:00', 28, '', '', ''),
(754, 34, 0, 'figuras_165', 'figuras_165', '/YZVABD/figuras_165.jpg', '', '2009-06-15 15:44:01', 0, 1, 0, '0000-00-00 00:00:00', 29, '', '', ''),
(755, 34, 0, 'figuras_166', 'figuras_166', '/YZVABD/figuras_166.jpg', '', '2009-06-15 15:44:01', 0, 1, 0, '0000-00-00 00:00:00', 30, '', '', ''),
(756, 34, 0, 'figuras_168', 'figuras_168', '/YZVABD/figuras_168.jpg', '', '2009-06-15 15:44:01', 0, 1, 0, '0000-00-00 00:00:00', 31, '', '', '');
INSERT INTO `jos_phocagallery` (`id`, `catid`, `sid`, `title`, `alias`, `filename`, `description`, `date`, `hits`, `published`, `checked_out`, `checked_out_time`, `ordering`, `params`, `extlink1`, `extlink2`) VALUES
(757, 34, 0, 'figuras_169', 'figuras_169', '/YZVABD/figuras_169.jpg', '', '2009-06-15 15:44:01', 0, 1, 0, '0000-00-00 00:00:00', 32, '', '', ''),
(758, 34, 0, 'figuras_170', 'figuras_170', '/YZVABD/figuras_170.jpg', '', '2009-06-15 15:44:01', 0, 1, 0, '0000-00-00 00:00:00', 33, '', '', ''),
(759, 34, 0, 'figuras_171', 'figuras_171', '/YZVABD/figuras_171.jpg', '', '2009-06-15 15:44:01', 0, 1, 0, '0000-00-00 00:00:00', 34, '', '', ''),
(760, 34, 0, 'figuras_174', 'figuras_174', '/YZVABD/figuras_174.jpg', '', '2009-06-15 15:44:01', 0, 1, 0, '0000-00-00 00:00:00', 35, '', '', ''),
(761, 34, 0, 'figuras_175', 'figuras_175', '/YZVABD/figuras_175.jpg', '', '2009-06-15 15:44:01', 0, 1, 0, '0000-00-00 00:00:00', 36, '', '', ''),
(762, 34, 0, 'figuras_176', 'figuras_176', '/YZVABD/figuras_176.jpg', '', '2009-06-15 15:44:01', 0, 1, 0, '0000-00-00 00:00:00', 37, '', '', ''),
(763, 34, 0, 'figuras_177', 'figuras_177', '/YZVABD/figuras_177.jpg', '', '2009-06-15 15:44:01', 0, 1, 0, '0000-00-00 00:00:00', 38, '', '', ''),
(764, 34, 0, 'figuras_178', 'figuras_178', '/YZVABD/figuras_178.jpg', '', '2009-06-15 15:44:01', 0, 1, 0, '0000-00-00 00:00:00', 39, '', '', ''),
(765, 35, 0, '01', '01', '/ZKQRPG/01.jpg', '', '2009-06-15 17:34:35', 0, 1, 0, '0000-00-00 00:00:00', 1, '', '', ''),
(766, 36, 0, 'figuras_128', 'figuras_128', '/CPQZYU/figuras_128.jpg', '', '2009-06-15 17:52:52', 0, 1, 0, '0000-00-00 00:00:00', 1, '', '', ''),
(767, 36, 0, 'figuras_129', 'figuras_129', '/CPQZYU/figuras_129.jpg', '', '2009-06-15 17:52:52', 0, 1, 0, '0000-00-00 00:00:00', 2, '', '', ''),
(768, 36, 0, 'figuras_130', 'figuras_130', '/CPQZYU/figuras_130.jpg', '', '2009-06-15 17:52:52', 0, 1, 0, '0000-00-00 00:00:00', 3, '', '', ''),
(769, 36, 0, 'figuras_131', 'figuras_131', '/CPQZYU/figuras_131.jpg', '', '2009-06-15 17:52:52', 0, 1, 0, '0000-00-00 00:00:00', 4, '', '', ''),
(770, 36, 0, 'figuras_132', 'figuras_132', '/CPQZYU/figuras_132.jpg', '', '2009-06-15 17:52:52', 0, 1, 0, '0000-00-00 00:00:00', 5, '', '', ''),
(771, 36, 0, 'figuras_134', 'figuras_134', '/CPQZYU/figuras_134.jpg', '', '2009-06-15 17:52:52', 0, 1, 0, '0000-00-00 00:00:00', 6, '', '', ''),
(772, 36, 0, 'figuras_135', 'figuras_135', '/CPQZYU/figuras_135.jpg', '', '2009-06-15 17:52:52', 0, 1, 0, '0000-00-00 00:00:00', 7, '', '', ''),
(773, 36, 0, 'figuras_136', 'figuras_136', '/CPQZYU/figuras_136.jpg', '', '2009-06-15 17:52:52', 0, 1, 0, '0000-00-00 00:00:00', 8, '', '', ''),
(774, 36, 0, 'figuras_138', 'figuras_138', '/CPQZYU/figuras_138.jpg', '', '2009-06-15 17:52:52', 0, 1, 0, '0000-00-00 00:00:00', 9, '', '', ''),
(775, 36, 0, 'figuras_139', 'figuras_139', '/CPQZYU/figuras_139.jpg', '', '2009-06-15 17:52:52', 0, 1, 0, '0000-00-00 00:00:00', 10, '', '', ''),
(776, 36, 0, 'figuras_141', 'figuras_141', '/CPQZYU/figuras_141.jpg', '', '2009-06-15 17:52:52', 0, 1, 0, '0000-00-00 00:00:00', 11, '', '', ''),
(777, 36, 0, 'figuras_143', 'figuras_143', '/CPQZYU/figuras_143.jpg', '', '2009-06-15 17:52:52', 0, 1, 0, '0000-00-00 00:00:00', 12, '', '', ''),
(778, 36, 0, 'figuras_144', 'figuras_144', '/CPQZYU/figuras_144.jpg', '', '2009-06-15 17:52:52', 0, 1, 0, '0000-00-00 00:00:00', 13, '', '', ''),
(779, 36, 0, 'figuras_145', 'figuras_145', '/CPQZYU/figuras_145.jpg', '', '2009-06-15 17:52:52', 0, 1, 0, '0000-00-00 00:00:00', 14, '', '', ''),
(780, 36, 0, 'figuras_146', 'figuras_146', '/CPQZYU/figuras_146.jpg', '', '2009-06-15 17:52:52', 0, 1, 0, '0000-00-00 00:00:00', 15, '', '', ''),
(781, 36, 0, 'figuras_147', 'figuras_147', '/CPQZYU/figuras_147.jpg', '', '2009-06-15 17:52:52', 0, 1, 0, '0000-00-00 00:00:00', 16, '', '', ''),
(782, 36, 0, 'figuras_148', 'figuras_148', '/CPQZYU/figuras_148.jpg', '', '2009-06-15 17:52:52', 0, 1, 0, '0000-00-00 00:00:00', 17, '', '', ''),
(783, 36, 0, 'figuras_149', 'figuras_149', '/CPQZYU/figuras_149.jpg', '', '2009-06-15 17:52:52', 0, 1, 0, '0000-00-00 00:00:00', 18, '', '', ''),
(784, 36, 0, 'figuras_150', 'figuras_150', '/CPQZYU/figuras_150.jpg', '', '2009-06-15 17:52:52', 0, 1, 0, '0000-00-00 00:00:00', 19, '', '', ''),
(785, 36, 0, 'figuras_151', 'figuras_151', '/CPQZYU/figuras_151.jpg', '', '2009-06-15 17:52:52', 0, 1, 0, '0000-00-00 00:00:00', 20, '', '', ''),
(786, 36, 0, 'figuras_153', 'figuras_153', '/CPQZYU/figuras_153.jpg', '', '2009-06-15 17:52:52', 0, 1, 0, '0000-00-00 00:00:00', 21, '', '', ''),
(787, 36, 0, 'figuras_155', 'figuras_155', '/CPQZYU/figuras_155.jpg', '', '2009-06-15 17:52:52', 0, 1, 0, '0000-00-00 00:00:00', 22, '', '', ''),
(788, 36, 0, 'figuras_156', 'figuras_156', '/CPQZYU/figuras_156.jpg', '', '2009-06-15 17:52:52', 0, 1, 0, '0000-00-00 00:00:00', 23, '', '', ''),
(789, 36, 0, 'figuras_157', 'figuras_157', '/CPQZYU/figuras_157.jpg', '', '2009-06-15 17:52:52', 0, 1, 0, '0000-00-00 00:00:00', 24, '', '', ''),
(790, 36, 0, 'figuras_158', 'figuras_158', '/CPQZYU/figuras_158.jpg', '', '2009-06-15 17:52:52', 0, 1, 0, '0000-00-00 00:00:00', 25, '', '', ''),
(791, 36, 0, 'figuras_161', 'figuras_161', '/CPQZYU/figuras_161.jpg', '', '2009-06-15 17:52:52', 0, 1, 0, '0000-00-00 00:00:00', 26, '', '', ''),
(792, 36, 0, 'figuras_162', 'figuras_162', '/CPQZYU/figuras_162.jpg', '', '2009-06-15 17:52:52', 0, 1, 0, '0000-00-00 00:00:00', 27, '', '', ''),
(793, 36, 0, 'figuras_164', 'figuras_164', '/CPQZYU/figuras_164.jpg', '', '2009-06-15 17:52:52', 0, 1, 0, '0000-00-00 00:00:00', 28, '', '', ''),
(794, 36, 0, 'figuras_165', 'figuras_165', '/CPQZYU/figuras_165.jpg', '', '2009-06-15 17:52:52', 0, 1, 0, '0000-00-00 00:00:00', 29, '', '', ''),
(795, 36, 0, 'figuras_166', 'figuras_166', '/CPQZYU/figuras_166.jpg', '', '2009-06-15 17:52:52', 0, 1, 0, '0000-00-00 00:00:00', 30, '', '', ''),
(796, 36, 0, 'figuras_168', 'figuras_168', '/CPQZYU/figuras_168.jpg', '', '2009-06-15 17:52:52', 0, 1, 0, '0000-00-00 00:00:00', 31, '', '', ''),
(797, 36, 0, 'figuras_169', 'figuras_169', '/CPQZYU/figuras_169.jpg', '', '2009-06-15 17:52:52', 0, 1, 0, '0000-00-00 00:00:00', 32, '', '', ''),
(798, 36, 0, 'figuras_170', 'figuras_170', '/CPQZYU/figuras_170.jpg', '', '2009-06-15 17:52:52', 0, 1, 0, '0000-00-00 00:00:00', 33, '', '', ''),
(799, 36, 0, 'figuras_171', 'figuras_171', '/CPQZYU/figuras_171.jpg', '', '2009-06-15 17:52:52', 0, 1, 0, '0000-00-00 00:00:00', 34, '', '', ''),
(800, 36, 0, 'figuras_174', 'figuras_174', '/CPQZYU/figuras_174.jpg', '', '2009-06-15 17:52:52', 0, 1, 0, '0000-00-00 00:00:00', 35, '', '', ''),
(801, 36, 0, 'figuras_175', 'figuras_175', '/CPQZYU/figuras_175.jpg', '', '2009-06-15 17:52:52', 0, 1, 0, '0000-00-00 00:00:00', 36, '', '', ''),
(802, 36, 0, 'figuras_176', 'figuras_176', '/CPQZYU/figuras_176.jpg', '', '2009-06-15 17:52:52', 0, 1, 0, '0000-00-00 00:00:00', 37, '', '', ''),
(803, 36, 0, 'figuras_177', 'figuras_177', '/CPQZYU/figuras_177.jpg', '', '2009-06-15 17:52:52', 0, 1, 0, '0000-00-00 00:00:00', 38, '', '', ''),
(804, 36, 0, 'figuras_178', 'figuras_178', '/CPQZYU/figuras_178.jpg', '', '2009-06-15 17:52:52', 0, 1, 0, '0000-00-00 00:00:00', 39, '', '', ''),
(805, 38, 0, '1', '1', '/RRUSCX/1.jpg', '', '2009-06-15 17:52:52', 0, 1, 0, '0000-00-00 00:00:00', 1, '', '', ''),
(806, 38, 0, '2', '2', '/RRUSCX/2.jpg', '', '2009-06-15 17:52:52', 0, 1, 0, '0000-00-00 00:00:00', 2, '', '', ''),
(807, 38, 0, '3', '3', '/RRUSCX/3.jpg', '', '2009-06-15 17:52:52', 0, 1, 0, '0000-00-00 00:00:00', 3, '', '', ''),
(808, 38, 0, '4', '4', '/RRUSCX/4.jpg', '', '2009-06-15 17:52:52', 0, 1, 0, '0000-00-00 00:00:00', 4, '', '', ''),
(809, 38, 0, '5', '5', '/RRUSCX/5.jpg', '', '2009-06-15 17:52:52', 0, 1, 0, '0000-00-00 00:00:00', 5, '', '', ''),
(810, 38, 0, '6', '6', '/RRUSCX/6.jpg', '', '2009-06-15 17:52:52', 0, 1, 0, '0000-00-00 00:00:00', 6, '', '', ''),
(811, 38, 0, '7', '7', '/RRUSCX/7.jpg', '', '2009-06-15 17:52:52', 0, 1, 0, '0000-00-00 00:00:00', 7, '', '', ''),
(812, 40, 0, 'dsc00421', 'dsc00421', '/TSUCCE/dsc00421.jpg', '', '2009-06-15 17:52:53', 0, 1, 0, '0000-00-00 00:00:00', 1, '', '', ''),
(813, 40, 0, 'dsc00424', 'dsc00424', '/TSUCCE/dsc00424.jpg', '', '2009-06-15 17:52:53', 0, 1, 0, '0000-00-00 00:00:00', 2, '', '', ''),
(814, 40, 0, 'dsc00437', 'dsc00437', '/TSUCCE/dsc00437.jpg', '', '2009-06-15 17:52:53', 0, 1, 0, '0000-00-00 00:00:00', 3, '', '', ''),
(815, 40, 0, 'dsc00438', 'dsc00438', '/TSUCCE/dsc00438.jpg', '', '2009-06-15 17:52:53', 0, 1, 0, '0000-00-00 00:00:00', 4, '', '', ''),
(816, 40, 0, 'dsc00447', 'dsc00447', '/TSUCCE/dsc00447.jpg', '', '2009-06-15 17:52:53', 0, 1, 0, '0000-00-00 00:00:00', 5, '', '', ''),
(817, 40, 0, 'dsc00448', 'dsc00448', '/TSUCCE/dsc00448.jpg', '', '2009-06-15 17:52:53', 0, 1, 0, '0000-00-00 00:00:00', 6, '', '', ''),
(818, 40, 0, 'dsc00449', 'dsc00449', '/TSUCCE/dsc00449.jpg', '', '2009-06-15 17:52:53', 0, 1, 0, '0000-00-00 00:00:00', 7, '', '', ''),
(819, 40, 0, 'dsc00451', 'dsc00451', '/TSUCCE/dsc00451.jpg', '', '2009-06-15 17:52:53', 0, 1, 0, '0000-00-00 00:00:00', 8, '', '', ''),
(820, 40, 0, 'dsc00576', 'dsc00576', '/TSUCCE/dsc00576.jpg', '', '2009-06-15 17:52:53', 0, 1, 0, '0000-00-00 00:00:00', 9, '', '', ''),
(821, 40, 0, 'dsc00577', 'dsc00577', '/TSUCCE/dsc00577.jpg', '', '2009-06-15 17:52:53', 0, 1, 0, '0000-00-00 00:00:00', 10, '', '', ''),
(822, 40, 0, 'dsc00579', 'dsc00579', '/TSUCCE/dsc00579.jpg', '', '2009-06-15 17:52:53', 0, 1, 0, '0000-00-00 00:00:00', 11, '', '', ''),
(823, 40, 0, 'dsc00582', 'dsc00582', '/TSUCCE/dsc00582.jpg', '', '2009-06-15 17:52:53', 0, 1, 0, '0000-00-00 00:00:00', 12, '', '', ''),
(824, 40, 0, 'dsc00584', 'dsc00584', '/TSUCCE/dsc00584.jpg', '', '2009-06-15 17:52:53', 0, 1, 0, '0000-00-00 00:00:00', 13, '', '', ''),
(825, 40, 0, 'dsc00585', 'dsc00585', '/TSUCCE/dsc00585.jpg', '', '2009-06-15 17:52:53', 0, 1, 0, '0000-00-00 00:00:00', 14, '', '', ''),
(826, 40, 0, 'dsc00593', 'dsc00593', '/TSUCCE/dsc00593.jpg', '', '2009-06-15 17:52:53', 0, 1, 0, '0000-00-00 00:00:00', 15, '', '', ''),
(827, 42, 0, 'o1', 'o1', '/VKWNWY/o1.jpg', '', '2009-06-15 18:06:50', 0, 1, 0, '0000-00-00 00:00:00', 1, '', '', ''),
(828, 43, 0, 'dsc09349', 'dsc09349', '/EIZNXS/dsc09349.jpg', '', '2009-06-15 18:14:03', 0, 1, 0, '0000-00-00 00:00:00', 1, '', '', ''),
(829, 43, 0, 'dsc09350', 'dsc09350', '/EIZNXS/dsc09350.jpg', '', '2009-06-15 18:14:03', 0, 1, 0, '0000-00-00 00:00:00', 2, '', '', ''),
(830, 43, 0, 'dsc09352', 'dsc09352', '/EIZNXS/dsc09352.jpg', '', '2009-06-15 18:14:03', 0, 1, 0, '0000-00-00 00:00:00', 3, '', '', ''),
(831, 43, 0, 'dsc09353', 'dsc09353', '/EIZNXS/dsc09353.jpg', '', '2009-06-15 18:14:03', 0, 1, 0, '0000-00-00 00:00:00', 4, '', '', ''),
(832, 43, 0, 'dsc09354', 'dsc09354', '/EIZNXS/dsc09354.jpg', '', '2009-06-15 18:14:03', 0, 1, 0, '0000-00-00 00:00:00', 5, '', '', ''),
(833, 43, 0, 'dsc09355', 'dsc09355', '/EIZNXS/dsc09355.jpg', '', '2009-06-15 18:14:03', 0, 1, 0, '0000-00-00 00:00:00', 6, '', '', ''),
(834, 43, 0, 'dsc09356', 'dsc09356', '/EIZNXS/dsc09356.jpg', '', '2009-06-15 18:14:03', 0, 1, 0, '0000-00-00 00:00:00', 7, '', '', ''),
(835, 43, 0, 'dsc09357', 'dsc09357', '/EIZNXS/dsc09357.jpg', '', '2009-06-15 18:14:03', 0, 1, 0, '0000-00-00 00:00:00', 8, '', '', ''),
(836, 43, 0, 'dsc09358', 'dsc09358', '/EIZNXS/dsc09358.jpg', '', '2009-06-15 18:14:03', 0, 1, 0, '0000-00-00 00:00:00', 9, '', '', ''),
(837, 43, 0, 'dsc09359', 'dsc09359', '/EIZNXS/dsc09359.jpg', '', '2009-06-15 18:14:03', 0, 1, 0, '0000-00-00 00:00:00', 10, '', '', ''),
(838, 44, 0, 'dsc00957', 'dsc00957', '/FGXCJT/dsc00957.jpg', '', '2009-06-15 18:14:03', 0, 1, 0, '0000-00-00 00:00:00', 1, '', '', ''),
(839, 44, 0, 'dsc00961', 'dsc00961', '/FGXCJT/dsc00961.jpg', '', '2009-06-15 18:14:03', 0, 1, 0, '0000-00-00 00:00:00', 2, '', '', ''),
(840, 44, 0, 'dsc00963', 'dsc00963', '/FGXCJT/dsc00963.jpg', '', '2009-06-15 18:14:03', 0, 1, 0, '0000-00-00 00:00:00', 3, '', '', ''),
(841, 44, 0, 'dsc00965', 'dsc00965', '/FGXCJT/dsc00965.jpg', '', '2009-06-15 18:14:03', 0, 1, 0, '0000-00-00 00:00:00', 4, '', '', ''),
(842, 44, 0, 'dsc00966', 'dsc00966', '/FGXCJT/dsc00966.jpg', '', '2009-06-15 18:14:03', 0, 1, 0, '0000-00-00 00:00:00', 5, '', '', ''),
(843, 44, 0, 'dsc00969', 'dsc00969', '/FGXCJT/dsc00969.jpg', '', '2009-06-15 18:14:03', 0, 1, 0, '0000-00-00 00:00:00', 6, '', '', ''),
(844, 44, 0, 'dsc00973', 'dsc00973', '/FGXCJT/dsc00973.jpg', '', '2009-06-15 18:14:03', 0, 1, 0, '0000-00-00 00:00:00', 7, '', '', ''),
(845, 44, 0, 'dsc00975', 'dsc00975', '/FGXCJT/dsc00975.jpg', '', '2009-06-15 18:14:03', 0, 1, 0, '0000-00-00 00:00:00', 8, '', '', ''),
(846, 44, 0, 'dsc00979', 'dsc00979', '/FGXCJT/dsc00979.jpg', '', '2009-06-15 18:14:03', 0, 1, 0, '0000-00-00 00:00:00', 9, '', '', ''),
(847, 44, 0, 'dsc00980', 'dsc00980', '/FGXCJT/dsc00980.jpg', '', '2009-06-15 18:14:03', 0, 1, 0, '0000-00-00 00:00:00', 10, '', '', ''),
(848, 44, 0, 'dsc00983', 'dsc00983', '/FGXCJT/dsc00983.jpg', '', '2009-06-15 18:14:03', 0, 1, 0, '0000-00-00 00:00:00', 11, '', '', ''),
(849, 44, 0, 'dsc00985', 'dsc00985', '/FGXCJT/dsc00985.jpg', '', '2009-06-15 18:14:03', 0, 1, 0, '0000-00-00 00:00:00', 12, '', '', ''),
(850, 44, 0, 'dsc00988', 'dsc00988', '/FGXCJT/dsc00988.jpg', '', '2009-06-15 18:14:03', 0, 1, 0, '0000-00-00 00:00:00', 13, '', '', ''),
(851, 44, 0, 'dsc00998', 'dsc00998', '/FGXCJT/dsc00998.jpg', '', '2009-06-15 18:14:03', 0, 1, 0, '0000-00-00 00:00:00', 14, '', '', ''),
(852, 44, 0, 'dsc01010', 'dsc01010', '/FGXCJT/dsc01010.jpg', '', '2009-06-15 18:14:03', 0, 1, 0, '0000-00-00 00:00:00', 15, '', '', ''),
(853, 44, 0, 'dsc01011', 'dsc01011', '/FGXCJT/dsc01011.jpg', '', '2009-06-15 18:14:03', 0, 1, 0, '0000-00-00 00:00:00', 16, '', '', ''),
(854, 44, 0, 'dsc01015', 'dsc01015', '/FGXCJT/dsc01015.jpg', '', '2009-06-15 18:14:03', 0, 1, 0, '0000-00-00 00:00:00', 17, '', '', ''),
(855, 44, 0, 'dsc01017', 'dsc01017', '/FGXCJT/dsc01017.jpg', '', '2009-06-15 18:14:03', 0, 1, 0, '0000-00-00 00:00:00', 18, '', '', ''),
(856, 44, 0, 'dsc01020', 'dsc01020', '/FGXCJT/dsc01020.jpg', '', '2009-06-15 18:14:03', 0, 1, 0, '0000-00-00 00:00:00', 19, '', '', ''),
(857, 44, 0, 'dsc01029', 'dsc01029', '/FGXCJT/dsc01029.jpg', '', '2009-06-15 18:14:03', 0, 1, 0, '0000-00-00 00:00:00', 20, '', '', ''),
(858, 44, 0, 'dsc01046', 'dsc01046', '/FGXCJT/dsc01046.jpg', '', '2009-06-15 18:14:03', 0, 1, 0, '0000-00-00 00:00:00', 21, '', '', ''),
(859, 44, 0, 'dsc01054', 'dsc01054', '/FGXCJT/dsc01054.jpg', '', '2009-06-15 18:14:03', 0, 1, 0, '0000-00-00 00:00:00', 22, '', '', ''),
(860, 44, 0, 'dsc01058', 'dsc01058', '/FGXCJT/dsc01058.jpg', '', '2009-06-15 18:14:03', 0, 1, 0, '0000-00-00 00:00:00', 23, '', '', ''),
(861, 44, 0, 'dsc01066', 'dsc01066', '/FGXCJT/dsc01066.jpg', '', '2009-06-15 18:14:03', 0, 1, 0, '0000-00-00 00:00:00', 24, '', '', ''),
(862, 44, 0, 'dsc01068', 'dsc01068', '/FGXCJT/dsc01068.jpg', '', '2009-06-15 18:14:03', 0, 1, 0, '0000-00-00 00:00:00', 25, '', '', ''),
(863, 44, 0, 'dsc01080', 'dsc01080', '/FGXCJT/dsc01080.jpg', '', '2009-06-15 18:14:03', 0, 1, 0, '0000-00-00 00:00:00', 26, '', '', ''),
(864, 44, 0, 'dsc01088', 'dsc01088', '/FGXCJT/dsc01088.jpg', '', '2009-06-15 18:14:03', 0, 1, 0, '0000-00-00 00:00:00', 27, '', '', ''),
(865, 45, 0, 'imagem-004', 'imagem-004', '/KDIIKY/imagem-004.jpg', '', '2009-06-15 18:14:03', 0, 1, 0, '0000-00-00 00:00:00', 1, '', '', ''),
(866, 45, 0, 'imagem-007', 'imagem-007', '/KDIIKY/imagem-007.jpg', '', '2009-06-15 18:14:03', 0, 1, 0, '0000-00-00 00:00:00', 2, '', '', ''),
(867, 45, 0, 'imagem-008', 'imagem-008', '/KDIIKY/imagem-008.jpg', '', '2009-06-15 18:14:03', 0, 1, 0, '0000-00-00 00:00:00', 3, '', '', ''),
(868, 45, 0, 'imagem-011', 'imagem-011', '/KDIIKY/imagem-011.jpg', '', '2009-06-15 18:14:03', 0, 1, 0, '0000-00-00 00:00:00', 4, '', '', ''),
(869, 45, 0, 'imagem-012', 'imagem-012', '/KDIIKY/imagem-012.jpg', '', '2009-06-15 18:14:03', 0, 1, 0, '0000-00-00 00:00:00', 5, '', '', ''),
(870, 45, 0, 'imagem-014', 'imagem-014', '/KDIIKY/imagem-014.jpg', '', '2009-06-15 18:14:03', 0, 1, 0, '0000-00-00 00:00:00', 6, '', '', ''),
(871, 45, 0, 'imagem-020', 'imagem-020', '/KDIIKY/imagem-020.jpg', '', '2009-06-15 18:14:03', 0, 1, 0, '0000-00-00 00:00:00', 7, '', '', ''),
(872, 45, 0, 'imagem-021', 'imagem-021', '/KDIIKY/imagem-021.jpg', '', '2009-06-15 18:14:03', 0, 1, 0, '0000-00-00 00:00:00', 8, '', '', ''),
(873, 46, 0, 'figuras_001', 'figuras_001', '/LHITGU/figuras_001.jpg', '', '2009-06-15 18:14:03', 0, 1, 0, '0000-00-00 00:00:00', 1, '', '', ''),
(874, 46, 0, 'figuras_002', 'figuras_002', '/LHITGU/figuras_002.jpg', '', '2009-06-15 18:14:03', 0, 1, 0, '0000-00-00 00:00:00', 2, '', '', ''),
(875, 46, 0, 'figuras_004', 'figuras_004', '/LHITGU/figuras_004.jpg', '', '2009-06-15 18:14:03', 0, 1, 0, '0000-00-00 00:00:00', 3, '', '', ''),
(876, 46, 0, 'figuras_005', 'figuras_005', '/LHITGU/figuras_005.jpg', '', '2009-06-15 18:14:03', 0, 1, 0, '0000-00-00 00:00:00', 4, '', '', ''),
(877, 46, 0, 'figuras_006', 'figuras_006', '/LHITGU/figuras_006.jpg', '', '2009-06-15 18:14:03', 0, 1, 0, '0000-00-00 00:00:00', 5, '', '', ''),
(878, 46, 0, 'figuras_007', 'figuras_007', '/LHITGU/figuras_007.jpg', '', '2009-06-15 18:14:03', 0, 1, 0, '0000-00-00 00:00:00', 6, '', '', ''),
(879, 46, 0, 'figuras_008', 'figuras_008', '/LHITGU/figuras_008.jpg', '', '2009-06-15 18:14:03', 0, 1, 0, '0000-00-00 00:00:00', 7, '', '', ''),
(880, 46, 0, 'figuras_009', 'figuras_009', '/LHITGU/figuras_009.jpg', '', '2009-06-15 18:14:03', 0, 1, 0, '0000-00-00 00:00:00', 8, '', '', ''),
(881, 46, 0, 'figuras_010', 'figuras_010', '/LHITGU/figuras_010.jpg', '', '2009-06-15 18:14:03', 0, 1, 0, '0000-00-00 00:00:00', 9, '', '', ''),
(882, 46, 0, 'figuras_011', 'figuras_011', '/LHITGU/figuras_011.jpg', '', '2009-06-15 18:14:03', 0, 1, 0, '0000-00-00 00:00:00', 10, '', '', ''),
(883, 46, 0, 'figuras_014', 'figuras_014', '/LHITGU/figuras_014.jpg', '', '2009-06-15 18:14:03', 0, 1, 0, '0000-00-00 00:00:00', 11, '', '', ''),
(884, 46, 0, 'figuras_015', 'figuras_015', '/LHITGU/figuras_015.jpg', '', '2009-06-15 18:14:03', 0, 1, 0, '0000-00-00 00:00:00', 12, '', '', ''),
(885, 46, 0, 'figuras_016', 'figuras_016', '/LHITGU/figuras_016.jpg', '', '2009-06-15 18:14:03', 0, 1, 0, '0000-00-00 00:00:00', 13, '', '', ''),
(886, 46, 0, 'figuras_017', 'figuras_017', '/LHITGU/figuras_017.jpg', '', '2009-06-15 18:14:03', 0, 1, 0, '0000-00-00 00:00:00', 14, '', '', ''),
(887, 46, 0, 'figuras_018', 'figuras_018', '/LHITGU/figuras_018.jpg', '', '2009-06-15 18:14:03', 0, 1, 0, '0000-00-00 00:00:00', 15, '', '', ''),
(888, 46, 0, 'figuras_019', 'figuras_019', '/LHITGU/figuras_019.jpg', '', '2009-06-15 18:14:03', 0, 1, 0, '0000-00-00 00:00:00', 16, '', '', ''),
(889, 46, 0, 'figuras_020', 'figuras_020', '/LHITGU/figuras_020.jpg', '', '2009-06-15 18:14:03', 0, 1, 0, '0000-00-00 00:00:00', 17, '', '', ''),
(890, 46, 0, 'figuras_022', 'figuras_022', '/LHITGU/figuras_022.jpg', '', '2009-06-15 18:14:03', 0, 1, 0, '0000-00-00 00:00:00', 18, '', '', ''),
(891, 46, 0, 'figuras_023', 'figuras_023', '/LHITGU/figuras_023.jpg', '', '2009-06-15 18:14:03', 0, 1, 0, '0000-00-00 00:00:00', 19, '', '', ''),
(892, 46, 0, 'figuras_025', 'figuras_025', '/LHITGU/figuras_025.jpg', '', '2009-06-15 18:14:03', 0, 1, 0, '0000-00-00 00:00:00', 20, '', '', ''),
(893, 46, 0, 'figuras_026', 'figuras_026', '/LHITGU/figuras_026.jpg', '', '2009-06-15 18:14:03', 0, 1, 0, '0000-00-00 00:00:00', 21, '', '', ''),
(894, 46, 0, 'figuras_028', 'figuras_028', '/LHITGU/figuras_028.jpg', '', '2009-06-15 18:14:03', 0, 1, 0, '0000-00-00 00:00:00', 22, '', '', ''),
(895, 46, 0, 'figuras_029', 'figuras_029', '/LHITGU/figuras_029.jpg', '', '2009-06-15 18:14:03', 0, 1, 0, '0000-00-00 00:00:00', 23, '', '', ''),
(896, 46, 0, 'figuras_030', 'figuras_030', '/LHITGU/figuras_030.jpg', '', '2009-06-15 18:14:03', 0, 1, 0, '0000-00-00 00:00:00', 24, '', '', ''),
(897, 46, 0, 'figuras_031', 'figuras_031', '/LHITGU/figuras_031.jpg', '', '2009-06-15 18:14:03', 0, 1, 0, '0000-00-00 00:00:00', 25, '', '', ''),
(898, 46, 0, 'figuras_032', 'figuras_032', '/LHITGU/figuras_032.jpg', '', '2009-06-15 18:14:03', 0, 1, 0, '0000-00-00 00:00:00', 26, '', '', ''),
(899, 46, 0, 'figuras_033', 'figuras_033', '/LHITGU/figuras_033.jpg', '', '2009-06-15 18:14:03', 0, 1, 0, '0000-00-00 00:00:00', 27, '', '', ''),
(900, 46, 0, 'figuras_034', 'figuras_034', '/LHITGU/figuras_034.jpg', '', '2009-06-15 18:14:03', 0, 1, 0, '0000-00-00 00:00:00', 28, '', '', ''),
(901, 46, 0, 'figuras_042', 'figuras_042', '/LHITGU/figuras_042.jpg', '', '2009-06-15 18:14:03', 0, 1, 0, '0000-00-00 00:00:00', 29, '', '', ''),
(902, 46, 0, 'figuras_043', 'figuras_043', '/LHITGU/figuras_043.jpg', '', '2009-06-15 18:14:03', 0, 1, 0, '0000-00-00 00:00:00', 30, '', '', ''),
(903, 46, 0, 'figuras_044', 'figuras_044', '/LHITGU/figuras_044.jpg', '', '2009-06-15 18:14:03', 0, 1, 0, '0000-00-00 00:00:00', 31, '', '', ''),
(904, 46, 0, 'figuras_045', 'figuras_045', '/LHITGU/figuras_045.jpg', '', '2009-06-15 18:14:03', 0, 1, 0, '0000-00-00 00:00:00', 32, '', '', ''),
(905, 46, 0, 'figuras_046', 'figuras_046', '/LHITGU/figuras_046.jpg', '', '2009-06-15 18:14:03', 0, 1, 0, '0000-00-00 00:00:00', 33, '', '', ''),
(906, 46, 0, 'figuras_048', 'figuras_048', '/LHITGU/figuras_048.jpg', '', '2009-06-15 18:14:03', 0, 1, 0, '0000-00-00 00:00:00', 34, '', '', ''),
(907, 46, 0, 'figuras_049', 'figuras_049', '/LHITGU/figuras_049.jpg', '', '2009-06-15 18:14:03', 0, 1, 0, '0000-00-00 00:00:00', 35, '', '', ''),
(908, 46, 0, 'figuras_052', 'figuras_052', '/LHITGU/figuras_052.jpg', '', '2009-06-15 18:14:03', 0, 1, 0, '0000-00-00 00:00:00', 36, '', '', ''),
(909, 46, 0, 'figuras_055', 'figuras_055', '/LHITGU/figuras_055.jpg', '', '2009-06-15 18:14:03', 0, 1, 0, '0000-00-00 00:00:00', 37, '', '', ''),
(910, 46, 0, 'figuras_056', 'figuras_056', '/LHITGU/figuras_056.jpg', '', '2009-06-15 18:14:03', 0, 1, 0, '0000-00-00 00:00:00', 38, '', '', ''),
(911, 46, 0, 'figuras_057', 'figuras_057', '/LHITGU/figuras_057.jpg', '', '2009-06-15 18:14:03', 0, 1, 0, '0000-00-00 00:00:00', 39, '', '', ''),
(912, 46, 0, 'figuras_058', 'figuras_058', '/LHITGU/figuras_058.jpg', '', '2009-06-15 18:14:03', 0, 1, 0, '0000-00-00 00:00:00', 40, '', '', ''),
(913, 46, 0, 'figuras_059', 'figuras_059', '/LHITGU/figuras_059.jpg', '', '2009-06-15 18:14:03', 0, 1, 0, '0000-00-00 00:00:00', 41, '', '', ''),
(914, 46, 0, 'figuras_060', 'figuras_060', '/LHITGU/figuras_060.jpg', '', '2009-06-15 18:14:03', 0, 1, 0, '0000-00-00 00:00:00', 42, '', '', ''),
(915, 46, 0, 'figuras_062', 'figuras_062', '/LHITGU/figuras_062.jpg', '', '2009-06-15 18:14:03', 0, 1, 0, '0000-00-00 00:00:00', 43, '', '', ''),
(916, 46, 0, 'figuras_063', 'figuras_063', '/LHITGU/figuras_063.jpg', '', '2009-06-15 18:14:03', 0, 1, 0, '0000-00-00 00:00:00', 44, '', '', ''),
(917, 46, 0, 'figuras_064', 'figuras_064', '/LHITGU/figuras_064.jpg', '', '2009-06-15 18:14:03', 0, 1, 0, '0000-00-00 00:00:00', 45, '', '', ''),
(918, 46, 0, 'figuras_067', 'figuras_067', '/LHITGU/figuras_067.jpg', '', '2009-06-15 18:14:03', 0, 1, 0, '0000-00-00 00:00:00', 46, '', '', ''),
(919, 46, 0, 'figuras_068', 'figuras_068', '/LHITGU/figuras_068.jpg', '', '2009-06-15 18:14:03', 0, 1, 0, '0000-00-00 00:00:00', 47, '', '', ''),
(920, 46, 0, 'figuras_069', 'figuras_069', '/LHITGU/figuras_069.jpg', '', '2009-06-15 18:14:03', 0, 1, 0, '0000-00-00 00:00:00', 48, '', '', ''),
(921, 46, 0, 'figuras_070', 'figuras_070', '/LHITGU/figuras_070.jpg', '', '2009-06-15 18:14:03', 0, 1, 0, '0000-00-00 00:00:00', 49, '', '', ''),
(922, 46, 0, 'figuras_071', 'figuras_071', '/LHITGU/figuras_071.jpg', '', '2009-06-15 18:14:03', 0, 1, 0, '0000-00-00 00:00:00', 50, '', '', ''),
(923, 46, 0, 'figuras_072', 'figuras_072', '/LHITGU/figuras_072.jpg', '', '2009-06-15 18:14:03', 0, 1, 0, '0000-00-00 00:00:00', 51, '', '', ''),
(924, 46, 0, 'figuras_074', 'figuras_074', '/LHITGU/figuras_074.jpg', '', '2009-06-15 18:14:03', 0, 1, 0, '0000-00-00 00:00:00', 52, '', '', ''),
(925, 47, 0, 'dsc00824', 'dsc00824', '/OGDGRH/dsc00824.jpg', '', '2009-06-15 18:14:03', 0, 1, 0, '0000-00-00 00:00:00', 1, '', '', ''),
(926, 47, 0, 'dsc00825', 'dsc00825', '/OGDGRH/dsc00825.jpg', '', '2009-06-15 18:14:03', 0, 1, 0, '0000-00-00 00:00:00', 2, '', '', ''),
(927, 47, 0, 'dsc00826', 'dsc00826', '/OGDGRH/dsc00826.jpg', '', '2009-06-15 18:14:03', 0, 1, 0, '0000-00-00 00:00:00', 3, '', '', ''),
(928, 47, 0, 'dsc00827', 'dsc00827', '/OGDGRH/dsc00827.jpg', '', '2009-06-15 18:14:03', 0, 1, 0, '0000-00-00 00:00:00', 4, '', '', ''),
(929, 47, 0, 'dsc00834', 'dsc00834', '/OGDGRH/dsc00834.jpg', '', '2009-06-15 18:14:03', 0, 1, 0, '0000-00-00 00:00:00', 5, '', '', ''),
(930, 47, 0, 'dsc00838', 'dsc00838', '/OGDGRH/dsc00838.jpg', '', '2009-06-15 18:14:03', 0, 1, 0, '0000-00-00 00:00:00', 6, '', '', ''),
(931, 47, 0, 'dsc00840', 'dsc00840', '/OGDGRH/dsc00840.jpg', '', '2009-06-15 18:14:03', 0, 1, 0, '0000-00-00 00:00:00', 7, '', '', ''),
(932, 47, 0, 'dsc00841', 'dsc00841', '/OGDGRH/dsc00841.jpg', '', '2009-06-15 18:14:03', 0, 1, 0, '0000-00-00 00:00:00', 8, '', '', ''),
(933, 47, 0, 'dsc00845', 'dsc00845', '/OGDGRH/dsc00845.jpg', '', '2009-06-15 18:14:03', 0, 1, 0, '0000-00-00 00:00:00', 9, '', '', ''),
(934, 47, 0, 'dsc00848', 'dsc00848', '/OGDGRH/dsc00848.jpg', '', '2009-06-15 18:14:03', 0, 1, 0, '0000-00-00 00:00:00', 10, '', '', ''),
(935, 47, 0, 'dsc00863', 'dsc00863', '/OGDGRH/dsc00863.jpg', '', '2009-06-15 18:14:03', 0, 1, 0, '0000-00-00 00:00:00', 11, '', '', ''),
(936, 47, 0, 'dsc00870', 'dsc00870', '/OGDGRH/dsc00870.jpg', '', '2009-06-15 18:14:03', 0, 1, 0, '0000-00-00 00:00:00', 12, '', '', ''),
(937, 47, 0, 'dsc00872', 'dsc00872', '/OGDGRH/dsc00872.jpg', '', '2009-06-15 18:14:03', 0, 1, 0, '0000-00-00 00:00:00', 13, '', '', ''),
(938, 47, 0, 'dsc00879', 'dsc00879', '/OGDGRH/dsc00879.jpg', '', '2009-06-15 18:14:03', 0, 1, 0, '0000-00-00 00:00:00', 14, '', '', ''),
(939, 47, 0, 'dsc00884', 'dsc00884', '/OGDGRH/dsc00884.jpg', '', '2009-06-15 18:14:03', 0, 1, 0, '0000-00-00 00:00:00', 15, '', '', ''),
(940, 47, 0, 'dsc00895', 'dsc00895', '/OGDGRH/dsc00895.jpg', '', '2009-06-15 18:14:03', 0, 1, 0, '0000-00-00 00:00:00', 16, '', '', ''),
(941, 47, 0, 'dsc00899', 'dsc00899', '/OGDGRH/dsc00899.jpg', '', '2009-06-15 18:14:03', 0, 1, 0, '0000-00-00 00:00:00', 17, '', '', ''),
(942, 47, 0, 'dsc00908', 'dsc00908', '/OGDGRH/dsc00908.jpg', '', '2009-06-15 18:14:03', 0, 1, 0, '0000-00-00 00:00:00', 18, '', '', ''),
(943, 47, 0, 'dsc00916', 'dsc00916', '/OGDGRH/dsc00916.jpg', '', '2009-06-15 18:14:03', 0, 1, 0, '0000-00-00 00:00:00', 19, '', '', ''),
(944, 47, 0, 'dsc00921', 'dsc00921', '/OGDGRH/dsc00921.jpg', '', '2009-06-15 18:14:03', 0, 1, 0, '0000-00-00 00:00:00', 20, '', '', ''),
(945, 47, 0, 'dsc00923', 'dsc00923', '/OGDGRH/dsc00923.jpg', '', '2009-06-15 18:14:03', 0, 1, 0, '0000-00-00 00:00:00', 21, '', '', ''),
(946, 47, 0, 'dsc00934', 'dsc00934', '/OGDGRH/dsc00934.jpg', '', '2009-06-15 18:14:03', 0, 1, 0, '0000-00-00 00:00:00', 22, '', '', ''),
(947, 47, 0, 'dsc00939', 'dsc00939', '/OGDGRH/dsc00939.jpg', '', '2009-06-15 18:14:03', 0, 1, 0, '0000-00-00 00:00:00', 23, '', '', ''),
(948, 47, 0, 'dsc00941', 'dsc00941', '/OGDGRH/dsc00941.jpg', '', '2009-06-15 18:14:03', 0, 1, 0, '0000-00-00 00:00:00', 24, '', '', ''),
(949, 47, 0, 'dsc00945', 'dsc00945', '/OGDGRH/dsc00945.jpg', '', '2009-06-15 18:14:03', 0, 1, 0, '0000-00-00 00:00:00', 25, '', '', ''),
(950, 47, 0, 'dsc00951', 'dsc00951', '/OGDGRH/dsc00951.jpg', '', '2009-06-15 18:14:03', 0, 1, 0, '0000-00-00 00:00:00', 26, '', '', ''),
(951, 48, 0, '09', '09', '/PMOUBI/09.jpg', '', '2009-06-15 18:14:04', 0, 1, 0, '0000-00-00 00:00:00', 1, '', '', ''),
(952, 48, 0, 'dsc00320', 'dsc00320', '/PMOUBI/dsc00320.jpg', '', '2009-06-15 18:14:04', 0, 1, 0, '0000-00-00 00:00:00', 2, '', '', ''),
(953, 48, 0, 'dsc00328', 'dsc00328', '/PMOUBI/dsc00328.jpg', '', '2009-06-15 18:14:04', 0, 1, 0, '0000-00-00 00:00:00', 3, '', '', ''),
(954, 48, 0, 'dsc00331', 'dsc00331', '/PMOUBI/dsc00331.jpg', '', '2009-06-15 18:14:04', 0, 1, 0, '0000-00-00 00:00:00', 4, '', '', ''),
(955, 48, 0, 'dsc00332', 'dsc00332', '/PMOUBI/dsc00332.jpg', '', '2009-06-15 18:14:04', 0, 1, 0, '0000-00-00 00:00:00', 5, '', '', ''),
(956, 48, 0, 'dsc00352', 'dsc00352', '/PMOUBI/dsc00352.jpg', '', '2009-06-15 18:14:04', 0, 1, 0, '0000-00-00 00:00:00', 6, '', '', ''),
(957, 48, 0, 'dsc00355', 'dsc00355', '/PMOUBI/dsc00355.jpg', '', '2009-06-15 18:14:04', 0, 1, 0, '0000-00-00 00:00:00', 7, '', '', ''),
(958, 48, 0, 'dsc00406', 'dsc00406', '/PMOUBI/dsc00406.jpg', '', '2009-06-15 18:14:04', 0, 1, 0, '0000-00-00 00:00:00', 8, '', '', ''),
(959, 48, 0, 'dsc00407', 'dsc00407', '/PMOUBI/dsc00407.jpg', '', '2009-06-15 18:14:04', 0, 1, 0, '0000-00-00 00:00:00', 9, '', '', ''),
(960, 48, 0, 'dsc00408', 'dsc00408', '/PMOUBI/dsc00408.jpg', '', '2009-06-15 18:14:04', 0, 1, 0, '0000-00-00 00:00:00', 10, '', '', ''),
(961, 48, 0, 'dsc00411', 'dsc00411', '/PMOUBI/dsc00411.jpg', '', '2009-06-15 18:14:04', 0, 1, 0, '0000-00-00 00:00:00', 11, '', '', ''),
(962, 48, 0, 'dsc00412', 'dsc00412', '/PMOUBI/dsc00412.jpg', '', '2009-06-15 18:14:04', 0, 1, 0, '0000-00-00 00:00:00', 12, '', '', ''),
(963, 48, 0, 'dsc00413', 'dsc00413', '/PMOUBI/dsc00413.jpg', '', '2009-06-15 18:14:04', 0, 1, 0, '0000-00-00 00:00:00', 13, '', '', ''),
(964, 48, 0, 'dsc00414', 'dsc00414', '/PMOUBI/dsc00414.jpg', '', '2009-06-15 18:14:04', 0, 1, 0, '0000-00-00 00:00:00', 14, '', '', ''),
(965, 48, 0, 'dsc00416', 'dsc00416', '/PMOUBI/dsc00416.jpg', '', '2009-06-15 18:14:04', 0, 1, 0, '0000-00-00 00:00:00', 15, '', '', ''),
(966, 48, 0, 'dsc00421', 'dsc00421', '/PMOUBI/dsc00421.jpg', '', '2009-06-15 18:14:04', 0, 1, 0, '0000-00-00 00:00:00', 16, '', '', ''),
(967, 48, 0, 'dsc00422', 'dsc00422', '/PMOUBI/dsc00422.jpg', '', '2009-06-15 18:14:04', 0, 1, 0, '0000-00-00 00:00:00', 17, '', '', ''),
(968, 48, 0, 'dsc00423', 'dsc00423', '/PMOUBI/dsc00423.jpg', '', '2009-06-15 18:14:04', 0, 1, 0, '0000-00-00 00:00:00', 18, '', '', ''),
(969, 48, 0, 'dsc00429', 'dsc00429', '/PMOUBI/dsc00429.jpg', '', '2009-06-15 18:14:04', 0, 1, 0, '0000-00-00 00:00:00', 19, '', '', ''),
(970, 48, 0, 'dsc00430', 'dsc00430', '/PMOUBI/dsc00430.jpg', '', '2009-06-15 18:14:04', 0, 1, 0, '0000-00-00 00:00:00', 20, '', '', ''),
(971, 48, 0, 'dsc00431', 'dsc00431', '/PMOUBI/dsc00431.jpg', '', '2009-06-15 18:14:04', 0, 1, 0, '0000-00-00 00:00:00', 21, '', '', ''),
(972, 48, 0, 'dsc00432', 'dsc00432', '/PMOUBI/dsc00432.jpg', '', '2009-06-15 18:14:04', 0, 1, 0, '0000-00-00 00:00:00', 22, '', '', ''),
(973, 48, 0, 'dsc00433', 'dsc00433', '/PMOUBI/dsc00433.jpg', '', '2009-06-15 18:14:04', 0, 1, 0, '0000-00-00 00:00:00', 23, '', '', ''),
(974, 48, 0, 'dsc00435', 'dsc00435', '/PMOUBI/dsc00435.jpg', '', '2009-06-15 18:14:04', 0, 1, 0, '0000-00-00 00:00:00', 24, '', '', ''),
(975, 48, 0, 'dsc00439', 'dsc00439', '/PMOUBI/dsc00439.jpg', '', '2009-06-15 18:14:04', 0, 1, 0, '0000-00-00 00:00:00', 25, '', '', ''),
(976, 48, 0, 'dsc00441', 'dsc00441', '/PMOUBI/dsc00441.jpg', '', '2009-06-15 18:14:04', 0, 1, 0, '0000-00-00 00:00:00', 26, '', '', ''),
(977, 48, 0, 'dsc00444', 'dsc00444', '/PMOUBI/dsc00444.jpg', '', '2009-06-15 18:14:04', 0, 1, 0, '0000-00-00 00:00:00', 27, '', '', ''),
(978, 48, 0, 'dsc00447', 'dsc00447', '/PMOUBI/dsc00447.jpg', '', '2009-06-15 18:14:04', 0, 1, 0, '0000-00-00 00:00:00', 28, '', '', ''),
(979, 48, 0, 'dsc00448', 'dsc00448', '/PMOUBI/dsc00448.jpg', '', '2009-06-15 18:14:04', 0, 1, 0, '0000-00-00 00:00:00', 29, '', '', ''),
(980, 48, 0, 'dsc00450', 'dsc00450', '/PMOUBI/dsc00450.jpg', '', '2009-06-15 18:14:04', 0, 1, 0, '0000-00-00 00:00:00', 30, '', '', ''),
(981, 48, 0, 'dsc00451', 'dsc00451', '/PMOUBI/dsc00451.jpg', '', '2009-06-15 18:14:04', 0, 1, 0, '0000-00-00 00:00:00', 31, '', '', ''),
(982, 48, 0, 'dsc00454', 'dsc00454', '/PMOUBI/dsc00454.jpg', '', '2009-06-15 18:14:04', 0, 1, 0, '0000-00-00 00:00:00', 32, '', '', ''),
(983, 48, 0, 'dsc00457', 'dsc00457', '/PMOUBI/dsc00457.jpg', '', '2009-06-15 18:14:04', 0, 1, 0, '0000-00-00 00:00:00', 33, '', '', ''),
(984, 48, 0, 'dsc00463', 'dsc00463', '/PMOUBI/dsc00463.jpg', '', '2009-06-15 18:14:04', 0, 1, 0, '0000-00-00 00:00:00', 34, '', '', ''),
(985, 48, 0, 'dsc00466', 'dsc00466', '/PMOUBI/dsc00466.jpg', '', '2009-06-15 18:14:04', 0, 1, 0, '0000-00-00 00:00:00', 35, '', '', ''),
(986, 48, 0, 'dsc00467', 'dsc00467', '/PMOUBI/dsc00467.jpg', '', '2009-06-15 18:14:04', 0, 1, 0, '0000-00-00 00:00:00', 36, '', '', ''),
(987, 48, 0, 'dsc00470', 'dsc00470', '/PMOUBI/dsc00470.jpg', '', '2009-06-15 18:14:04', 0, 1, 0, '0000-00-00 00:00:00', 37, '', '', ''),
(988, 48, 0, 'dsc00472', 'dsc00472', '/PMOUBI/dsc00472.jpg', '', '2009-06-15 18:14:04', 0, 1, 0, '0000-00-00 00:00:00', 38, '', '', ''),
(989, 48, 0, 'dsc00483', 'dsc00483', '/PMOUBI/dsc00483.jpg', '', '2009-06-15 18:14:04', 0, 1, 0, '0000-00-00 00:00:00', 39, '', '', ''),
(990, 49, 0, 'imagem_007', 'imagem_007', '/QSJYQL/imagem_007.jpg', '', '2009-06-15 18:14:04', 0, 1, 0, '0000-00-00 00:00:00', 1, '', '', ''),
(991, 49, 0, 'imagem_014', 'imagem_014', '/QSJYQL/imagem_014.jpg', '', '2009-06-15 18:14:04', 0, 1, 0, '0000-00-00 00:00:00', 2, '', '', ''),
(992, 49, 0, 'imagem_018', 'imagem_018', '/QSJYQL/imagem_018.jpg', '', '2009-06-15 18:14:04', 0, 1, 0, '0000-00-00 00:00:00', 3, '', '', ''),
(993, 49, 0, 'imagem_044', 'imagem_044', '/QSJYQL/imagem_044.jpg', '', '2009-06-15 18:14:04', 0, 1, 0, '0000-00-00 00:00:00', 4, '', '', ''),
(994, 49, 0, 'imagem_045', 'imagem_045', '/QSJYQL/imagem_045.jpg', '', '2009-06-15 18:14:04', 0, 1, 0, '0000-00-00 00:00:00', 5, '', '', ''),
(995, 49, 0, 'imagem_047', 'imagem_047', '/QSJYQL/imagem_047.jpg', '', '2009-06-15 18:14:04', 0, 1, 0, '0000-00-00 00:00:00', 6, '', '', ''),
(996, 49, 0, 'imagem_050', 'imagem_050', '/QSJYQL/imagem_050.jpg', '', '2009-06-15 18:14:04', 0, 1, 0, '0000-00-00 00:00:00', 7, '', '', ''),
(997, 49, 0, 'imagem_052', 'imagem_052', '/QSJYQL/imagem_052.jpg', '', '2009-06-15 18:14:04', 0, 1, 0, '0000-00-00 00:00:00', 8, '', '', ''),
(998, 49, 0, 'imagem_054', 'imagem_054', '/QSJYQL/imagem_054.jpg', '', '2009-06-15 18:14:04', 0, 1, 0, '0000-00-00 00:00:00', 9, '', '', ''),
(999, 49, 0, 'imagem_057', 'imagem_057', '/QSJYQL/imagem_057.jpg', '', '2009-06-15 18:14:04', 0, 1, 0, '0000-00-00 00:00:00', 10, '', '', ''),
(1000, 49, 0, 'imagem_059', 'imagem_059', '/QSJYQL/imagem_059.jpg', '', '2009-06-15 18:14:04', 0, 1, 0, '0000-00-00 00:00:00', 11, '', '', ''),
(1001, 49, 0, 'imagem_060', 'imagem_060', '/QSJYQL/imagem_060.jpg', '', '2009-06-15 18:14:04', 0, 1, 0, '0000-00-00 00:00:00', 12, '', '', ''),
(1002, 49, 0, 'imagem_065', 'imagem_065', '/QSJYQL/imagem_065.jpg', '', '2009-06-15 18:14:04', 0, 1, 0, '0000-00-00 00:00:00', 13, '', '', ''),
(1003, 49, 0, 'imagem_068', 'imagem_068', '/QSJYQL/imagem_068.jpg', '', '2009-06-15 18:14:04', 0, 1, 0, '0000-00-00 00:00:00', 14, '', '', ''),
(1004, 49, 0, 'imagem_071', 'imagem_071', '/QSJYQL/imagem_071.jpg', '', '2009-06-15 18:14:04', 0, 1, 0, '0000-00-00 00:00:00', 15, '', '', ''),
(1005, 49, 0, 'imagem_081', 'imagem_081', '/QSJYQL/imagem_081.jpg', '', '2009-06-15 18:14:04', 0, 1, 0, '0000-00-00 00:00:00', 16, '', '', ''),
(1006, 49, 0, 'imagem_082', 'imagem_082', '/QSJYQL/imagem_082.jpg', '', '2009-06-15 18:14:04', 0, 1, 0, '0000-00-00 00:00:00', 17, '', '', ''),
(1007, 49, 0, 'imagem_088', 'imagem_088', '/QSJYQL/imagem_088.jpg', '', '2009-06-15 18:14:04', 0, 1, 0, '0000-00-00 00:00:00', 18, '', '', ''),
(1008, 49, 0, 'imagem_089', 'imagem_089', '/QSJYQL/imagem_089.jpg', '', '2009-06-15 18:14:04', 0, 1, 0, '0000-00-00 00:00:00', 19, '', '', ''),
(1009, 50, 0, 'dsc09360', 'dsc09360', '/TCPSZW/dsc09360.jpg', '', '2009-06-15 18:14:04', 0, 1, 0, '0000-00-00 00:00:00', 1, '', '', ''),
(1010, 50, 0, 'dsc09361', 'dsc09361', '/TCPSZW/dsc09361.jpg', '', '2009-06-15 18:14:04', 0, 1, 0, '0000-00-00 00:00:00', 2, '', '', ''),
(1011, 50, 0, 'dsc09363', 'dsc09363', '/TCPSZW/dsc09363.jpg', '', '2009-06-15 18:14:04', 0, 1, 0, '0000-00-00 00:00:00', 3, '', '', ''),
(1012, 50, 0, 'dsc09364', 'dsc09364', '/TCPSZW/dsc09364.jpg', '', '2009-06-15 18:14:04', 0, 1, 0, '0000-00-00 00:00:00', 4, '', '', ''),
(1013, 50, 0, 'dsc09365', 'dsc09365', '/TCPSZW/dsc09365.jpg', '', '2009-06-15 18:14:04', 0, 1, 0, '0000-00-00 00:00:00', 5, '', '', ''),
(1014, 50, 0, 'dsc09367', 'dsc09367', '/TCPSZW/dsc09367.jpg', '', '2009-06-15 18:14:04', 0, 1, 0, '0000-00-00 00:00:00', 6, '', '', ''),
(1015, 50, 0, 'dsc09368', 'dsc09368', '/TCPSZW/dsc09368.jpg', '', '2009-06-15 18:14:04', 0, 1, 0, '0000-00-00 00:00:00', 7, '', '', ''),
(1016, 50, 0, 'dsc09369', 'dsc09369', '/TCPSZW/dsc09369.jpg', '', '2009-06-15 18:14:04', 0, 1, 0, '0000-00-00 00:00:00', 8, '', '', ''),
(1017, 50, 0, 'dsc09370', 'dsc09370', '/TCPSZW/dsc09370.jpg', '', '2009-06-15 18:14:04', 0, 1, 0, '0000-00-00 00:00:00', 9, '', '', ''),
(1018, 50, 0, 'dsc09371', 'dsc09371', '/TCPSZW/dsc09371.jpg', '', '2009-06-15 18:14:04', 0, 1, 0, '0000-00-00 00:00:00', 10, '', '', ''),
(1019, 50, 0, 'dsc09372', 'dsc09372', '/TCPSZW/dsc09372.jpg', '', '2009-06-15 18:14:04', 0, 1, 0, '0000-00-00 00:00:00', 11, '', '', ''),
(1020, 50, 0, 'dsc09373', 'dsc09373', '/TCPSZW/dsc09373.jpg', '', '2009-06-15 18:14:04', 0, 1, 0, '0000-00-00 00:00:00', 12, '', '', ''),
(1021, 50, 0, 'dsc09375', 'dsc09375', '/TCPSZW/dsc09375.jpg', '', '2009-06-15 18:14:04', 0, 1, 0, '0000-00-00 00:00:00', 13, '', '', ''),
(1022, 50, 0, 'dsc09376', 'dsc09376', '/TCPSZW/dsc09376.jpg', '', '2009-06-15 18:14:04', 0, 1, 0, '0000-00-00 00:00:00', 14, '', '', ''),
(1023, 50, 0, 'dsc09377', 'dsc09377', '/TCPSZW/dsc09377.jpg', '', '2009-06-15 18:14:04', 0, 1, 0, '0000-00-00 00:00:00', 15, '', '', ''),
(1024, 50, 0, 'dsc09380', 'dsc09380', '/TCPSZW/dsc09380.jpg', '', '2009-06-15 18:14:04', 0, 1, 0, '0000-00-00 00:00:00', 16, '', '', ''),
(1025, 50, 0, 'dsc09381', 'dsc09381', '/TCPSZW/dsc09381.jpg', '', '2009-06-15 18:14:04', 0, 1, 0, '0000-00-00 00:00:00', 17, '', '', ''),
(1026, 50, 0, 'dsc09382', 'dsc09382', '/TCPSZW/dsc09382.jpg', '', '2009-06-15 18:14:04', 0, 1, 0, '0000-00-00 00:00:00', 18, '', '', ''),
(1027, 50, 0, 'dsc09383', 'dsc09383', '/TCPSZW/dsc09383.jpg', '', '2009-06-15 18:14:04', 0, 1, 0, '0000-00-00 00:00:00', 19, '', '', ''),
(1028, 50, 0, 'dsc09384', 'dsc09384', '/TCPSZW/dsc09384.jpg', '', '2009-06-15 18:14:04', 0, 1, 0, '0000-00-00 00:00:00', 20, '', '', ''),
(1029, 50, 0, 'dsc09386', 'dsc09386', '/TCPSZW/dsc09386.jpg', '', '2009-06-15 18:14:04', 0, 1, 0, '0000-00-00 00:00:00', 21, '', '', ''),
(1030, 50, 0, 'dsc09387', 'dsc09387', '/TCPSZW/dsc09387.jpg', '', '2009-06-15 18:14:04', 0, 1, 0, '0000-00-00 00:00:00', 22, '', '', ''),
(1031, 50, 0, 'dsc09388', 'dsc09388', '/TCPSZW/dsc09388.jpg', '', '2009-06-15 18:14:04', 0, 1, 0, '0000-00-00 00:00:00', 23, '', '', ''),
(1032, 50, 0, 'dsc09389', 'dsc09389', '/TCPSZW/dsc09389.jpg', '', '2009-06-15 18:14:04', 0, 1, 0, '0000-00-00 00:00:00', 24, '', '', ''),
(1033, 50, 0, 'dsc09391', 'dsc09391', '/TCPSZW/dsc09391.jpg', '', '2009-06-15 18:14:04', 0, 1, 0, '0000-00-00 00:00:00', 25, '', '', ''),
(1034, 50, 0, 'dsc09393', 'dsc09393', '/TCPSZW/dsc09393.jpg', '', '2009-06-15 18:14:04', 0, 1, 0, '0000-00-00 00:00:00', 26, '', '', ''),
(1035, 50, 0, 'dsc09394', 'dsc09394', '/TCPSZW/dsc09394.jpg', '', '2009-06-15 18:14:04', 0, 1, 0, '0000-00-00 00:00:00', 27, '', '', ''),
(1036, 50, 0, 'dsc09396', 'dsc09396', '/TCPSZW/dsc09396.jpg', '', '2009-06-15 18:14:04', 0, 1, 0, '0000-00-00 00:00:00', 28, '', '', ''),
(1037, 50, 0, 'dsc09397', 'dsc09397', '/TCPSZW/dsc09397.jpg', '', '2009-06-15 18:14:04', 0, 1, 0, '0000-00-00 00:00:00', 29, '', '', ''),
(1038, 50, 0, 'dsc09400', 'dsc09400', '/TCPSZW/dsc09400.jpg', '', '2009-06-15 18:14:04', 0, 1, 0, '0000-00-00 00:00:00', 30, '', '', ''),
(1039, 50, 0, 'dsc09401', 'dsc09401', '/TCPSZW/dsc09401.jpg', '', '2009-06-15 18:14:04', 0, 1, 0, '0000-00-00 00:00:00', 31, '', '', ''),
(1040, 50, 0, 'dsc09404', 'dsc09404', '/TCPSZW/dsc09404.jpg', '', '2009-06-15 18:14:04', 0, 1, 0, '0000-00-00 00:00:00', 32, '', '', ''),
(1041, 50, 0, 'dsc09405', 'dsc09405', '/TCPSZW/dsc09405.jpg', '', '2009-06-15 18:14:04', 0, 1, 0, '0000-00-00 00:00:00', 33, '', '', ''),
(1042, 51, 0, 'imagem-170', 'imagem-170', '/TSJMEU/imagem-170.jpg', '', '2009-06-15 18:14:04', 0, 1, 0, '0000-00-00 00:00:00', 1, '', '', ''),
(1043, 51, 0, 'imagem-177', 'imagem-177', '/TSJMEU/imagem-177.jpg', '', '2009-06-15 18:14:04', 0, 1, 0, '0000-00-00 00:00:00', 2, '', '', ''),
(1044, 51, 0, 'imagem-190', 'imagem-190', '/TSJMEU/imagem-190.jpg', '', '2009-06-15 18:14:04', 0, 1, 0, '0000-00-00 00:00:00', 3, '', '', ''),
(1045, 51, 0, 'imagem-194', 'imagem-194', '/TSJMEU/imagem-194.jpg', '', '2009-06-15 18:14:04', 0, 1, 0, '0000-00-00 00:00:00', 4, '', '', ''),
(1046, 51, 0, 'imagem-202', 'imagem-202', '/TSJMEU/imagem-202.jpg', '', '2009-06-15 18:14:04', 0, 1, 0, '0000-00-00 00:00:00', 5, '', '', ''),
(1047, 51, 0, 'imagem-206', 'imagem-206', '/TSJMEU/imagem-206.jpg', '', '2009-06-15 18:14:04', 0, 1, 0, '0000-00-00 00:00:00', 6, '', '', ''),
(1048, 51, 0, 'imagem-217', 'imagem-217', '/TSJMEU/imagem-217.jpg', '', '2009-06-15 18:14:04', 0, 1, 0, '0000-00-00 00:00:00', 7, '', '', ''),
(1049, 52, 0, 'imagem-148', 'imagem-148', '/YBEXLM/imagem-148.jpg', '', '2009-06-15 18:14:04', 0, 1, 0, '0000-00-00 00:00:00', 1, '', '', ''),
(1050, 52, 0, 'imagem-162', 'imagem-162', '/YBEXLM/imagem-162.jpg', '', '2009-06-15 18:14:04', 0, 1, 0, '0000-00-00 00:00:00', 2, '', '', ''),
(1051, 52, 0, 'imagem-163', 'imagem-163', '/YBEXLM/imagem-163.jpg', '', '2009-06-15 18:14:04', 0, 1, 0, '0000-00-00 00:00:00', 3, '', '', ''),
(1052, 52, 0, 'imagem-166', 'imagem-166', '/YBEXLM/imagem-166.jpg', '', '2009-06-15 18:14:04', 0, 1, 0, '0000-00-00 00:00:00', 4, '', '', ''),
(1053, 52, 0, 'imagem-172', 'imagem-172', '/YBEXLM/imagem-172.jpg', '', '2009-06-15 18:14:04', 0, 1, 0, '0000-00-00 00:00:00', 5, '', '', ''),
(1054, 52, 0, 'imagem-175', 'imagem-175', '/YBEXLM/imagem-175.jpg', '', '2009-06-15 18:14:04', 0, 1, 0, '0000-00-00 00:00:00', 6, '', '', ''),
(1055, 52, 0, 'imagem-177', 'imagem-177', '/YBEXLM/imagem-177.jpg', '', '2009-06-15 18:14:04', 0, 1, 0, '0000-00-00 00:00:00', 7, '', '', ''),
(1056, 52, 0, 'imagem-180', 'imagem-180', '/YBEXLM/imagem-180.jpg', '', '2009-06-15 18:14:04', 0, 1, 0, '0000-00-00 00:00:00', 8, '', '', ''),
(1057, 52, 0, 'imagem-184', 'imagem-184', '/YBEXLM/imagem-184.jpg', '', '2009-06-15 18:14:04', 0, 1, 0, '0000-00-00 00:00:00', 9, '', '', ''),
(1058, 52, 0, 'imagem-186', 'imagem-186', '/YBEXLM/imagem-186.jpg', '', '2009-06-15 18:14:04', 0, 1, 0, '0000-00-00 00:00:00', 10, '', '', ''),
(1059, 52, 0, 'imagem-192', 'imagem-192', '/YBEXLM/imagem-192.jpg', '', '2009-06-15 18:14:04', 0, 1, 0, '0000-00-00 00:00:00', 11, '', '', ''),
(1060, 52, 0, 'imagem-204', 'imagem-204', '/YBEXLM/imagem-204.jpg', '', '2009-06-15 18:14:04', 0, 1, 0, '0000-00-00 00:00:00', 12, '', '', ''),
(1061, 52, 0, 'imagem-209', 'imagem-209', '/YBEXLM/imagem-209.jpg', '', '2009-06-15 18:14:04', 0, 1, 0, '0000-00-00 00:00:00', 13, '', '', ''),
(1062, 53, 0, 'imagem_010', 'imagem_010', '/YRBPBE/imagem_010.jpg', '', '2009-06-15 18:14:04', 0, 1, 0, '0000-00-00 00:00:00', 1, '', '', ''),
(1063, 53, 0, 'imagem_011', 'imagem_011', '/YRBPBE/imagem_011.jpg', '', '2009-06-15 18:14:04', 0, 1, 0, '0000-00-00 00:00:00', 2, '', '', ''),
(1064, 53, 0, 'imagem_012', 'imagem_012', '/YRBPBE/imagem_012.jpg', '', '2009-06-15 18:14:04', 0, 1, 0, '0000-00-00 00:00:00', 3, '', '', ''),
(1065, 53, 0, 'imagem_013', 'imagem_013', '/YRBPBE/imagem_013.jpg', '', '2009-06-15 18:14:04', 0, 1, 0, '0000-00-00 00:00:00', 4, '', '', ''),
(1066, 53, 0, 'imagem_014', 'imagem_014', '/YRBPBE/imagem_014.jpg', '', '2009-06-15 18:14:04', 0, 1, 0, '0000-00-00 00:00:00', 5, '', '', ''),
(1067, 53, 0, 'imagem_015', 'imagem_015', '/YRBPBE/imagem_015.jpg', '', '2009-06-15 18:14:04', 0, 1, 0, '0000-00-00 00:00:00', 6, '', '', ''),
(1068, 53, 0, 'imagem_017', 'imagem_017', '/YRBPBE/imagem_017.jpg', '', '2009-06-15 18:14:04', 0, 1, 0, '0000-00-00 00:00:00', 7, '', '', ''),
(1069, 53, 0, 'imagem_018', 'imagem_018', '/YRBPBE/imagem_018.jpg', '', '2009-06-15 18:14:04', 0, 1, 0, '0000-00-00 00:00:00', 8, '', '', ''),
(1070, 53, 0, 'imagem_019', 'imagem_019', '/YRBPBE/imagem_019.jpg', '', '2009-06-15 18:14:04', 0, 1, 0, '0000-00-00 00:00:00', 9, '', '', ''),
(1071, 53, 0, 'imagem_020', 'imagem_020', '/YRBPBE/imagem_020.jpg', '', '2009-06-15 18:14:04', 0, 1, 0, '0000-00-00 00:00:00', 10, '', '', ''),
(1072, 53, 0, 'imagem_021', 'imagem_021', '/YRBPBE/imagem_021.jpg', '', '2009-06-15 18:14:04', 0, 1, 0, '0000-00-00 00:00:00', 11, '', '', ''),
(1073, 53, 0, 'imagem_022', 'imagem_022', '/YRBPBE/imagem_022.jpg', '', '2009-06-15 18:14:04', 0, 1, 0, '0000-00-00 00:00:00', 12, '', '', ''),
(1074, 53, 0, 'imagem_023', 'imagem_023', '/YRBPBE/imagem_023.jpg', '', '2009-06-15 18:14:04', 0, 1, 0, '0000-00-00 00:00:00', 13, '', '', ''),
(1075, 53, 0, 'imagem_026', 'imagem_026', '/YRBPBE/imagem_026.jpg', '', '2009-06-15 18:14:04', 0, 1, 0, '0000-00-00 00:00:00', 14, '', '', ''),
(1076, 53, 0, 'imagem_028', 'imagem_028', '/YRBPBE/imagem_028.jpg', '', '2009-06-15 18:14:04', 0, 1, 0, '0000-00-00 00:00:00', 15, '', '', ''),
(1077, 53, 0, 'imagem_029', 'imagem_029', '/YRBPBE/imagem_029.jpg', '', '2009-06-15 18:14:04', 0, 1, 0, '0000-00-00 00:00:00', 16, '', '', ''),
(1078, 53, 0, 'imagem_033', 'imagem_033', '/YRBPBE/imagem_033.jpg', '', '2009-06-15 18:14:04', 0, 1, 0, '0000-00-00 00:00:00', 17, '', '', ''),
(1079, 53, 0, 'imagem_034', 'imagem_034', '/YRBPBE/imagem_034.jpg', '', '2009-06-15 18:14:04', 0, 1, 0, '0000-00-00 00:00:00', 18, '', '', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `jos_phocagallery_categories`
--

CREATE TABLE IF NOT EXISTS `jos_phocagallery_categories` (
  `id` int(11) NOT NULL auto_increment,
  `parent_id` int(11) NOT NULL default '0',
  `title` varchar(255) NOT NULL default '',
  `name` varchar(255) NOT NULL default '',
  `alias` varchar(255) NOT NULL default '',
  `image` varchar(255) NOT NULL default '',
  `section` varchar(50) NOT NULL default '',
  `image_position` varchar(30) NOT NULL default '',
  `description` text NOT NULL,
  `date` datetime NOT NULL default '0000-00-00 00:00:00',
  `published` tinyint(1) NOT NULL default '0',
  `checked_out` int(11) unsigned NOT NULL default '0',
  `checked_out_time` datetime NOT NULL default '0000-00-00 00:00:00',
  `editor` varchar(50) default NULL,
  `ordering` int(11) NOT NULL default '0',
  `access` tinyint(3) unsigned NOT NULL default '0',
  `count` int(11) NOT NULL default '0',
  `hits` int(11) NOT NULL default '0',
  `params` text NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `cat_idx` (`section`,`published`,`access`),
  KEY `idx_access` (`access`),
  KEY `idx_checkout` (`checked_out`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=56 ;

--
-- Extraindo dados da tabela `jos_phocagallery_categories`
--

INSERT INTO `jos_phocagallery_categories` (`id`, `parent_id`, `title`, `name`, `alias`, `image`, `section`, `image_position`, `description`, `date`, `published`, `checked_out`, `checked_out_time`, `editor`, `ordering`, `access`, `count`, `hits`, `params`) VALUES
(3, 0, 'Educação Infantil', '', 'educacao-infantil', '', '', 'left', '', '2009-06-15 13:55:24', 1, 0, '0000-00-00 00:00:00', NULL, 1, 0, 0, 18, 'accessuserid=-1,;uploaduserid=-2,;deleteuserid=-2,;userfolder=MERQDJ;zoom=2;'),
(6, 3, 'Conversando sobre os índios', '', 'conversando-sobre-os-indios', '', '', 'left', '', '2009-06-15 14:10:56', 1, 0, '0000-00-00 00:00:00', NULL, 2, 0, 0, 0, 'accessuserid=0,;uploaduserid=-2,;deleteuserid=-2,;zoom=2;'),
(5, 3, 'Humm, que delíciaaa!', '', 'humm-que-deliciaaa', '', '', 'left', '', '2009-06-15 14:01:55', 1, 0, '0000-00-00 00:00:00', NULL, 1, 0, 0, 12, 'accessuserid=0,;uploaduserid=-2,;deleteuserid=-2,;zoom=2;'),
(7, 3, 'Visita ao Museu das Bicicletas', '', 'visita-ao-museu-das-bicicletas', '', '', 'left', '', '2009-06-15 14:16:29', 1, 0, '0000-00-00 00:00:00', NULL, 3, 0, 0, 1, 'accessuserid=0,;uploaduserid=-2,;deleteuserid=-2,;zoom=2;'),
(8, 3, 'Projetos', '', 'projetos', '', '', 'left', '', '2009-06-15 14:18:08', 1, 0, '0000-00-00 00:00:00', NULL, 4, 0, 0, 7, 'accessuserid=0,;uploaduserid=-2,;deleteuserid=-2,;zoom=2;'),
(9, 8, 'PROJETO MUSICALIZAÇÃO', '', 'projeto-musicalizacao', '', '', 'left', '', '2009-06-15 14:21:10', 1, 0, '0000-00-00 00:00:00', NULL, 1, 0, 0, 0, 'accessuserid=0,;uploaduserid=-2,;deleteuserid=-2,;zoom=2;'),
(10, 8, 'Projeto Educação Cristã', '', 'projeto-educacao-crista', '', '', 'left', '', '2009-06-15 14:23:15', 1, 0, '0000-00-00 00:00:00', NULL, 2, 0, 0, 1, 'accessuserid=0,;uploaduserid=-2,;deleteuserid=-2,;zoom=2;'),
(11, 8, 'Projeto Éden Day', '', 'projeto-eden-day', '', '', 'left', '', '2009-06-15 14:25:04', 1, 0, '0000-00-00 00:00:00', NULL, 3, 0, 0, 69, 'accessuserid=0,;uploaduserid=-2,;deleteuserid=-2,;zoom=2;'),
(12, 8, 'Projeto Orem Sempre', '', 'projeto-orem-sempre', '', '', 'left', '', '2009-06-15 14:29:59', 1, 0, '0000-00-00 00:00:00', NULL, 4, 0, 0, 6, 'accessuserid=0,;uploaduserid=-2,;deleteuserid=-2,;zoom=2;'),
(13, 8, 'PROJETO: EU, VOCÊ, NÓS...', '', 'projeto-eu-voce-nos...', '', '', 'left', '', '2009-06-15 14:32:11', 1, 0, '0000-00-00 00:00:00', NULL, 5, 0, 0, 0, 'accessuserid=0,;uploaduserid=-2,;deleteuserid=-2,;zoom=2;'),
(14, 8, 'A Família que Deus me deu', '', 'a-familia-que-deus-me-deu', '', '', 'left', '', '2009-06-15 14:34:16', 1, 0, '0000-00-00 00:00:00', NULL, 6, 0, 0, 0, 'accessuserid=0,;uploaduserid=-2,;deleteuserid=-2,;zoom=2;'),
(15, 8, 'PLANETA TERRA: NOSSA CASA', '', 'planeta-terra-nossa-casa', '', '', 'left', '', '2009-06-15 14:38:21', 1, 0, '0000-00-00 00:00:00', NULL, 7, 0, 0, 1, 'accessuserid=0,;uploaduserid=-2,;deleteuserid=-2,;zoom=2;'),
(16, 3, 'Noite do Soninho 2007', '', 'noite-do-soninho-2007', '', '', 'left', '', '2009-06-15 14:40:30', 1, 0, '0000-00-00 00:00:00', NULL, 5, 0, 0, 5, 'accessuserid=0,;uploaduserid=-2,;deleteuserid=-2,;zoom=2;'),
(17, 3, 'Dia do Disfarce', '', 'dia-do-disfarce', '', '', 'left', '', '2009-06-15 14:49:51', 1, 0, '0000-00-00 00:00:00', NULL, 6, 0, 0, 0, 'accessuserid=0,;uploaduserid=-2,;deleteuserid=-2,;zoom=2;'),
(18, 0, 'Notícias', '', 'noticias', '', '', 'left', '', '2009-06-15 14:58:44', 1, 0, '0000-00-00 00:00:00', NULL, 2, 0, 0, 2, 'accessuserid=0,;uploaduserid=-2,;deleteuserid=-2,;zoom=2;'),
(19, 18, 'Encerramento Geral 2008', '', 'encerramento-geral-2008', '', '', 'left', '', '2009-06-15 15:00:48', 1, 0, '0000-00-00 00:00:00', NULL, 1, 0, 0, 3, 'accessuserid=0,;uploaduserid=-2,;deleteuserid=-2,;zoom=2;'),
(20, 18, 'Encerramento Juarez Machado 2008', '', 'encerramento-juarez-machado-2008', '', '', 'left', '', '2009-06-15 15:00:48', 1, 0, '0000-00-00 00:00:00', NULL, 2, 0, 0, 0, 'accessuserid=0,;uploaduserid=-2,;deleteuserid=-2,;zoom=2;'),
(21, 18, 'Vereador Mirin 2008', '', 'vereador-mirin-2008', '', '', 'left', '', '2009-06-15 15:00:48', 1, 0, '0000-00-00 00:00:00', NULL, 3, 0, 0, 0, 'accessuserid=0,;uploaduserid=-2,;deleteuserid=-2,;zoom=2;'),
(22, 18, 'Encerramento Ballet no Juarez Machado', '', 'encerramento-ballet-no-juarez-machado', '', '', 'left', '', '2009-06-15 15:43:59', 1, 0, '0000-00-00 00:00:00', NULL, 4, 0, 0, 5, 'accessuserid=0,;uploaduserid=-2,;deleteuserid=-2,;zoom=2;'),
(23, 18, 'Festa da Colheita 2008', '', 'festa-da-colheita-2008', '', '', 'left', '', '2009-06-15 15:43:59', 1, 0, '0000-00-00 00:00:00', NULL, 5, 0, 0, 0, 'accessuserid=0,;uploaduserid=-2,;deleteuserid=-2,;zoom=2;'),
(24, 18, 'Semana Meio Ambiente na Oficina', '', 'semana-meio-ambiente-na-oficina', '', '', 'left', '', '2009-06-15 15:44:00', 1, 0, '0000-00-00 00:00:00', NULL, 6, 0, 0, 0, 'accessuserid=0,;uploaduserid=-2,;deleteuserid=-2,;zoom=2;'),
(25, 18, '5ª Feira Cultural', '', '5a-feira-cultural', '', '', 'left', '', '2009-06-15 15:44:00', 1, 0, '0000-00-00 00:00:00', NULL, 7, 0, 0, 0, 'accessuserid=0,;uploaduserid=-2,;deleteuserid=-2,;zoom=2;'),
(26, 18, 'Ballet no Teatro Juarez Machado', '', 'ballet-no-teatro-juarez-machado', '', '', 'left', '', '2009-06-15 15:44:00', 1, 0, '0000-00-00 00:00:00', NULL, 8, 0, 0, 1, 'accessuserid=0,;uploaduserid=-2,;deleteuserid=-2,;zoom=2;'),
(27, 18, 'Treinamento Professores no UNICENP', '', 'treinamento-professores-no-unicenp', '', '', 'left', '', '2009-06-15 15:44:00', 1, 0, '0000-00-00 00:00:00', NULL, 9, 0, 0, 0, 'accessuserid=0,;uploaduserid=-2,;deleteuserid=-2,;zoom=2;'),
(28, 18, 'Visita do Prefeito', '', 'visita-do-prefeito', '', '', 'left', '', '2009-06-15 15:44:00', 1, 0, '0000-00-00 00:00:00', NULL, 10, 0, 0, 2, 'accessuserid=0,;uploaduserid=-2,;deleteuserid=-2,;zoom=2;'),
(29, 18, 'Confraternização Família Oficina dos Sonhos', '', 'confraternizacao-familia-oficina-dos-sonhos', '', '', 'left', '', '2009-06-15 15:44:00', 1, 0, '0000-00-00 00:00:00', NULL, 11, 0, 0, 9, 'accessuserid=0,;uploaduserid=-2,;deleteuserid=-2,;zoom=2;'),
(30, 18, 'Feira de Ciências 2008', '', 'feira-de-ciencias-2008', '', '', 'left', '', '2009-06-15 15:44:01', 1, 0, '0000-00-00 00:00:00', NULL, 12, 0, 0, 0, 'accessuserid=0,;uploaduserid=-2,;deleteuserid=-2,;zoom=2;'),
(31, 18, 'Torneio de Futebol', '', 'torneio-de-futebol', '', '', 'left', '', '2009-06-15 15:44:01', 1, 0, '0000-00-00 00:00:00', NULL, 13, 0, 0, 0, 'accessuserid=0,;uploaduserid=-2,;deleteuserid=-2,;zoom=2;'),
(32, 18, 'Visita no Lar Vicentina', '', 'visita-no-lar-vicentina', '', '', 'left', '', '2009-06-15 15:44:01', 1, 0, '0000-00-00 00:00:00', NULL, 14, 0, 0, 0, 'accessuserid=0,;uploaduserid=-2,;deleteuserid=-2,;zoom=2;'),
(33, 18, 'Patati Patata na Oficina', '', 'patati-patata-na-oficina', '', '', 'left', '', '2009-06-15 15:44:01', 1, 0, '0000-00-00 00:00:00', NULL, 15, 0, 0, 32, 'accessuserid=0,;uploaduserid=-2,;deleteuserid=-2,;zoom=2;'),
(34, 18, '16º Festival de Dança Interescolar', '', '16o-festival-de-danca-interescolar', '', '', 'left', '', '2009-06-15 15:44:01', 1, 0, '0000-00-00 00:00:00', NULL, 16, 0, 0, 0, 'accessuserid=0,;uploaduserid=-2,;deleteuserid=-2,;zoom=2;'),
(35, 0, 'Aulas Extras', '', 'aulas-extras', '', '', 'left', '', '2009-06-15 17:34:35', 1, 0, '0000-00-00 00:00:00', NULL, 3, 0, 0, 1, 'accessuserid=0,;uploaduserid=-2,;deleteuserid=-2,;zoom=2;'),
(36, 35, 'Grupo Jazz 2007', '', 'grupo-jazz-2007', '', '', 'left', '', '2009-06-15 17:52:52', 1, 0, '0000-00-00 00:00:00', NULL, 1, 0, 0, 0, 'accessuserid=0,;uploaduserid=-2,;deleteuserid=-2,;zoom=2;'),
(37, 35, 'Ballet', '', 'ballet', '', '', 'left', '', '2009-06-15 17:52:52', 1, 0, '0000-00-00 00:00:00', NULL, 2, 0, 0, 0, 'accessuserid=0,;uploaduserid=-2,;deleteuserid=-2,;zoom=2;'),
(38, 35, 'Violão', '', 'violao', '', '', 'left', '', '2009-06-15 17:52:52', 1, 0, '0000-00-00 00:00:00', NULL, 3, 0, 0, 0, 'accessuserid=0,;uploaduserid=-2,;deleteuserid=-2,;zoom=2;'),
(39, 35, 'Natação', '', 'natacao', '', '', 'left', '', '2009-06-15 17:52:53', 1, 0, '0000-00-00 00:00:00', NULL, 4, 0, 0, 0, 'accessuserid=0,;uploaduserid=-2,;deleteuserid=-2,;zoom=2;'),
(40, 35, 'Grupo Jazz 2008', '', 'grupo-jazz-2008', '', '', 'left', '', '2009-06-15 17:52:53', 1, 0, '0000-00-00 00:00:00', NULL, 5, 0, 0, 0, 'accessuserid=0,;uploaduserid=-2,;deleteuserid=-2,;zoom=2;'),
(41, 35, 'Futebol', '', 'futebol', '', '', 'left', '', '2009-06-15 17:52:53', 1, 0, '0000-00-00 00:00:00', NULL, 6, 0, 0, 0, 'accessuserid=0,;uploaduserid=-2,;deleteuserid=-2,;zoom=2;'),
(42, 0, 'Ensino Fundamental', '', 'ensino-fundamental', '', '', 'left', '', '2009-06-15 18:06:50', 1, 0, '0000-00-00 00:00:00', NULL, 4, 0, 0, 8, 'accessuserid=0,;uploaduserid=-2,;deleteuserid=-2,;zoom=2;'),
(43, 42, 'Piquenique 1ªs séries na Sede de Campo', '', 'piquenique-1as-series-na-sede-de-campo', '', '', 'left', '', '2009-06-15 18:14:03', 1, 0, '0000-00-00 00:00:00', NULL, 1, 0, 0, 5, 'accessuserid=0,;uploaduserid=-2,;deleteuserid=-2,;zoom=2;'),
(44, 42, 'Formatura Pré-escola 2008', '', 'formatura-pre-escola-2008', '', '', 'left', '', '2009-06-15 18:14:03', 1, 0, '0000-00-00 00:00:00', NULL, 2, 0, 0, 1, 'accessuserid=0,;uploaduserid=-2,;deleteuserid=-2,;zoom=2;'),
(45, 42, 'Visitando o Memorial do Descobrimento', '', 'visitando-o-memorial-do-descobrimento', '', '', 'left', '', '2009-06-15 18:14:03', 1, 0, '0000-00-00 00:00:00', NULL, 3, 0, 0, 0, 'accessuserid=0,;uploaduserid=-2,;deleteuserid=-2,;zoom=2;'),
(46, 42, 'Acampamento Campo Alegre', '', 'acampamento-campo-alegre', '', '', 'left', '', '2009-06-15 18:14:03', 1, 0, '0000-00-00 00:00:00', NULL, 4, 0, 0, 0, 'accessuserid=0,;uploaduserid=-2,;deleteuserid=-2,;zoom=2;'),
(47, 42, 'Formatura 8ª Série  2008', '', 'formatura-8a-serie-2008', '', '', 'left', '', '2009-06-15 18:14:03', 1, 0, '0000-00-00 00:00:00', NULL, 5, 0, 0, 2, 'accessuserid=0,;uploaduserid=-2,;deleteuserid=-2,;zoom=2;'),
(48, 42, 'Festa da Colheita', '', 'festa-da-colheita', '', '', 'left', '', '2009-06-15 18:14:03', 1, 0, '0000-00-00 00:00:00', NULL, 6, 0, 0, 0, 'accessuserid=0,;uploaduserid=-2,;deleteuserid=-2,;zoom=2;'),
(49, 42, 'Passeio 6ª e 7º ano Hotel Fazenda', '', 'passeio-6a-e-7o-ano-hotel-fazenda', '', '', 'left', '', '2009-06-15 18:14:04', 1, 0, '0000-00-00 00:00:00', NULL, 7, 0, 0, 0, 'accessuserid=0,;uploaduserid=-2,;deleteuserid=-2,;zoom=2;'),
(50, 42, 'Passeio São Francisco', '', 'passeio-sao-francisco', '', '', 'left', '', '2009-06-15 18:14:04', 1, 0, '0000-00-00 00:00:00', NULL, 8, 0, 0, 0, 'accessuserid=0,;uploaduserid=-2,;deleteuserid=-2,;zoom=2;'),
(51, 42, 'Estrada Bonita', '', 'estrada-bonita', '', '', 'left', '', '2009-06-15 18:14:04', 1, 0, '0000-00-00 00:00:00', NULL, 9, 0, 0, 1, 'accessuserid=0,;uploaduserid=-2,;deleteuserid=-2,;zoom=2;'),
(52, 42, 'Museu Sambaqui e Parque Caieras', '', 'museu-sambaqui-e-parque-caieras', '', '', 'left', '', '2009-06-15 18:14:04', 1, 0, '0000-00-00 00:00:00', NULL, 10, 0, 0, 0, 'accessuserid=0,;uploaduserid=-2,;deleteuserid=-2,;zoom=2;'),
(53, 42, 'Passeio 3ª Série Estrada Bonita', '', 'passeio-3a-serie-estrada-bonita', '', '', 'left', '', '2009-06-15 18:14:04', 1, 0, '0000-00-00 00:00:00', NULL, 11, 0, 0, 1, 'accessuserid=0,;uploaduserid=-2,;deleteuserid=-2,;zoom=2;'),
(54, 0, 'Eventos', '', 'eventos', '', '', 'left', '', '2009-07-15 13:09:51', 1, 0, '0000-00-00 00:00:00', NULL, 5, 0, 0, 1, 'accessuserid=0,;uploaduserid=-2,;deleteuserid=-2,;zoom=2;'),
(55, 54, 'Festa da Colheita 2009', '', 'festa-da-colheita', '', '', 'left', '', '2009-07-15 13:11:00', 1, 0, '0000-00-00 00:00:00', NULL, 1, 0, 0, 0, 'accessuserid=0,;uploaduserid=-2,;deleteuserid=-2,;zoom=2;');

-- --------------------------------------------------------

--
-- Estrutura da tabela `jos_phocagallery_comments`
--

CREATE TABLE IF NOT EXISTS `jos_phocagallery_comments` (
  `id` int(11) NOT NULL auto_increment,
  `catid` int(11) NOT NULL default '0',
  `userid` int(11) NOT NULL default '0',
  `date` datetime NOT NULL default '0000-00-00 00:00:00',
  `title` varchar(255) NOT NULL default '',
  `comment` text NOT NULL,
  `published` tinyint(1) NOT NULL default '0',
  `checked_out` int(11) unsigned NOT NULL default '0',
  `checked_out_time` datetime NOT NULL default '0000-00-00 00:00:00',
  `ordering` int(11) NOT NULL default '0',
  `params` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Extraindo dados da tabela `jos_phocagallery_comments`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `jos_phocagallery_user_category`
--

CREATE TABLE IF NOT EXISTS `jos_phocagallery_user_category` (
  `id` int(11) NOT NULL auto_increment,
  `catid` int(11) NOT NULL default '0',
  `userid` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `catid` (`catid`,`userid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `jos_phocagallery_user_category`
--

INSERT INTO `jos_phocagallery_user_category` (`id`, `catid`, `userid`) VALUES
(3, 3, 62);

-- --------------------------------------------------------

--
-- Estrutura da tabela `jos_phocagallery_votes`
--

CREATE TABLE IF NOT EXISTS `jos_phocagallery_votes` (
  `id` int(11) NOT NULL auto_increment,
  `catid` int(11) NOT NULL default '0',
  `userid` int(11) NOT NULL default '0',
  `date` datetime NOT NULL default '0000-00-00 00:00:00',
  `rating` tinyint(1) NOT NULL default '0',
  `published` tinyint(1) NOT NULL default '0',
  `checked_out` int(11) unsigned NOT NULL default '0',
  `checked_out_time` datetime NOT NULL default '0000-00-00 00:00:00',
  `ordering` int(11) NOT NULL default '0',
  `params` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Extraindo dados da tabela `jos_phocagallery_votes`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `jos_phocagallery_votes_statistics`
--

CREATE TABLE IF NOT EXISTS `jos_phocagallery_votes_statistics` (
  `id` int(11) NOT NULL auto_increment,
  `catid` int(11) NOT NULL default '0',
  `count` tinyint(11) NOT NULL default '0',
  `average` float(8,6) NOT NULL default '0.000000',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `jos_phocagallery_votes_statistics`
--

INSERT INTO `jos_phocagallery_votes_statistics` (`id`, `catid`, `count`, `average`) VALUES
(1, 11, 0, 0.000000);

-- --------------------------------------------------------

--
-- Estrutura da tabela `jos_plugins`
--

CREATE TABLE IF NOT EXISTS `jos_plugins` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(100) NOT NULL default '',
  `element` varchar(100) NOT NULL default '',
  `folder` varchar(100) NOT NULL default '',
  `access` tinyint(3) unsigned NOT NULL default '0',
  `ordering` int(11) NOT NULL default '0',
  `published` tinyint(3) NOT NULL default '0',
  `iscore` tinyint(3) NOT NULL default '0',
  `client_id` tinyint(3) NOT NULL default '0',
  `checked_out` int(11) unsigned NOT NULL default '0',
  `checked_out_time` datetime NOT NULL default '0000-00-00 00:00:00',
  `params` text NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `idx_folder` (`published`,`client_id`,`access`,`folder`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=39 ;

--
-- Extraindo dados da tabela `jos_plugins`
--

INSERT INTO `jos_plugins` (`id`, `name`, `element`, `folder`, `access`, `ordering`, `published`, `iscore`, `client_id`, `checked_out`, `checked_out_time`, `params`) VALUES
(1, 'Authentication - Joomla', 'joomla', 'authentication', 0, 1, 1, 1, 0, 0, '0000-00-00 00:00:00', ''),
(2, 'Authentication - LDAP', 'ldap', 'authentication', 0, 2, 0, 1, 0, 0, '0000-00-00 00:00:00', 'host=\nport=389\nuse_ldapV3=0\nnegotiate_tls=0\nno_referrals=0\nauth_method=bind\nbase_dn=\nsearch_string=\nusers_dn=\nusername=\npassword=\nldap_fullname=fullName\nldap_email=mail\nldap_uid=uid\n\n'),
(3, 'Authentication - GMail', 'gmail', 'authentication', 0, 4, 0, 0, 0, 0, '0000-00-00 00:00:00', ''),
(4, 'Authentication - OpenID', 'openid', 'authentication', 0, 3, 0, 0, 0, 0, '0000-00-00 00:00:00', ''),
(5, 'User - Joomla!', 'joomla', 'user', 0, 0, 1, 0, 0, 0, '0000-00-00 00:00:00', 'autoregister=1\n\n'),
(6, 'Search - Content', 'content', 'search', 0, 1, 1, 1, 0, 0, '0000-00-00 00:00:00', 'search_limit=50\nsearch_content=1\nsearch_uncategorised=1\nsearch_archived=1\n\n'),
(7, 'Search - Contacts', 'contacts', 'search', 0, 3, 1, 1, 0, 0, '0000-00-00 00:00:00', 'search_limit=50\n\n'),
(8, 'Search - Categories', 'categories', 'search', 0, 4, 1, 0, 0, 0, '0000-00-00 00:00:00', 'search_limit=50\n\n'),
(9, 'Search - Sections', 'sections', 'search', 0, 5, 1, 0, 0, 0, '0000-00-00 00:00:00', 'search_limit=50\n\n'),
(10, 'Search - Newsfeeds', 'newsfeeds', 'search', 0, 6, 1, 0, 0, 0, '0000-00-00 00:00:00', 'search_limit=50\n\n'),
(11, 'Search - Weblinks', 'weblinks', 'search', 0, 2, 1, 1, 0, 0, '0000-00-00 00:00:00', 'search_limit=50\n\n'),
(12, 'Content - Pagebreak', 'pagebreak', 'content', 0, 10000, 1, 1, 0, 0, '0000-00-00 00:00:00', 'enabled=1\ntitle=1\nmultipage_toc=1\nshowall=1\n\n'),
(13, 'Content - Rating', 'vote', 'content', 0, 4, 1, 1, 0, 0, '0000-00-00 00:00:00', ''),
(14, 'Content - Email Cloaking', 'emailcloak', 'content', 0, 5, 1, 0, 0, 0, '0000-00-00 00:00:00', 'mode=1\n\n'),
(15, 'Content - Code Hightlighter (GeSHi)', 'geshi', 'content', 0, 5, 0, 0, 0, 0, '0000-00-00 00:00:00', ''),
(16, 'Content - Load Module', 'loadmodule', 'content', 0, 6, 1, 0, 0, 0, '0000-00-00 00:00:00', 'enabled=1\nstyle=0\n\n'),
(17, 'Content - Page Navigation', 'pagenavigation', 'content', 0, 2, 1, 1, 0, 0, '0000-00-00 00:00:00', 'position=1\n\n'),
(18, 'Editor - No Editor', 'none', 'editors', 0, 1, 1, 1, 0, 0, '0000-00-00 00:00:00', ''),
(19, 'Editor - TinyMCE 2.0', 'tinymce', 'editors', 0, 2, 1, 1, 0, 0, '0000-00-00 00:00:00', 'theme=advanced\ncleanup=1\ncleanup_startup=0\nautosave=0\ncompressed=0\nrelative_urls=1\ntext_direction=ltr\nlang_mode=0\nlang_code=en\ninvalid_elements=applet\ncontent_css=1\ncontent_css_custom=\nnewlines=0\ntoolbar=top\nhr=1\nsmilies=1\ntable=1\nstyle=1\nlayer=1\nxhtmlxtras=0\ntemplate=0\ndirectionality=1\nfullscreen=1\nhtml_height=550\nhtml_width=750\npreview=1\ninsertdate=1\nformat_date=%Y-%m-%d\ninserttime=1\nformat_time=%H:%M:%S\n\n'),
(20, 'Editor - XStandard Lite 2.0', 'xstandard', 'editors', 0, 3, 0, 1, 0, 0, '0000-00-00 00:00:00', ''),
(21, 'Editor Button - Image', 'image', 'editors-xtd', 0, 0, 1, 0, 0, 0, '0000-00-00 00:00:00', ''),
(22, 'Editor Button - Pagebreak', 'pagebreak', 'editors-xtd', 0, 0, 1, 0, 0, 0, '0000-00-00 00:00:00', ''),
(23, 'Editor Button - Readmore', 'readmore', 'editors-xtd', 0, 0, 1, 0, 0, 0, '0000-00-00 00:00:00', ''),
(24, 'XML-RPC - Joomla', 'joomla', 'xmlrpc', 0, 7, 0, 1, 0, 0, '0000-00-00 00:00:00', ''),
(25, 'XML-RPC - Blogger API', 'blogger', 'xmlrpc', 0, 7, 0, 1, 0, 0, '0000-00-00 00:00:00', 'catid=1\nsectionid=0\n\n'),
(27, 'System - SEF', 'sef', 'system', 0, 1, 1, 0, 0, 0, '0000-00-00 00:00:00', ''),
(28, 'System - Debug', 'debug', 'system', 0, 2, 1, 0, 0, 0, '0000-00-00 00:00:00', 'queries=1\nmemory=1\nlangauge=1\n\n'),
(29, 'System - Legacy', 'legacy', 'system', 0, 3, 0, 1, 0, 0, '0000-00-00 00:00:00', 'route=0\n\n'),
(30, 'System - Cache', 'cache', 'system', 0, 4, 0, 1, 0, 0, '0000-00-00 00:00:00', 'browsercache=0\ncachetime=15\n\n'),
(31, 'System - Log', 'log', 'system', 0, 5, 0, 1, 0, 0, '0000-00-00 00:00:00', ''),
(32, 'System - Remember Me', 'remember', 'system', 0, 6, 1, 1, 0, 0, '0000-00-00 00:00:00', ''),
(33, 'System - Backlink', 'backlink', 'system', 0, 7, 0, 1, 0, 0, '0000-00-00 00:00:00', ''),
(35, 'Google Maps', 'plugin_googlemap2', 'content', 0, 0, 1, 0, 0, 0, '0000-00-00 00:00:00', 'publ=1\ndebug=0\nplugincode=mosmap\nGoogle_API_version=2.x\ntimeinterval=500\nGoogle_API_key=ABQIAAAAzT9OYEniEH3QVaXmY7GllRRMaQ-9nCDe9C0z4AIBDVlOnQhsohRN0_nneK66GG2VND5G7L7ttJWAew\nGoogle_Multi_API_key=\nurlsetting=http_host\nwidth=100%\nheight=400px\nlat=52.075581\nlon=4.541513\ncenterlat=\ncenterlon=\naddress=\nzoom=10\ncontrolType=user\nzoomNew=0\nzoomWheel=0\nkeyboard=0\nmapType=Normal\nshowMaptype=1\nshowScale=0\noverview=0\nnavlabel=0\ndragging=1\nmarker=1\nicon=\niconwidth=\niconheight=\niconshadow=\niconshadowwidth=\niconshadowheight=\niconshadowanchorx=\niconshadowanchory=\niconanchorx=\niconanchory=\niconinfoanchorx=\niconinfoanchory=\nicontransparent=\niconimagemap=\ndir=0\ndirtype=D\navoidhighways=0\ntraffic=0\npanoramio=0\nadsmanager=0\nmaxads=3\nlocalsearch=0\nadsense=\nchannel=\ngooglebar=0\nsearchlist=inline\nsearchtarget=_blank\nsearchzoompan=1\ntxtdir=Directions:\ntxtgetdir=Get Directions\ntxtfrom=From here\ntxtto=To here\ntxtdiraddr=Address:\ntxt_driving=\ntxt_avhighways=\ntxt_walking=\ndirdefault=0\ngotoaddr=0\ntxtaddr=Address: ##\nerraddr=Address ## not found!\nalign=center\nlangtype=site\nlang=\nlightbox=0\ntxtlightbox=Open lightbox\nlbxwidth=100%\nlbxheight=700px\neffect=none\nkmlrenderer=google\nkmlsidebar=none\nkmlsbwidth=200\nkmlsbsort=none\nkmlmessshow=0\nproxy=1\nsv=none\nsvwidth=100%\nsvheight=300\nsvyaw=0\nsvpitch=0\nsvzoom=\n\n'),
(38, 'Editor - JCE 1.5.3', 'jce', 'editors', 0, 0, 1, 0, 0, 0, '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `jos_polls`
--

CREATE TABLE IF NOT EXISTS `jos_polls` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `title` varchar(255) NOT NULL default '',
  `alias` varchar(255) NOT NULL default '',
  `voters` int(9) NOT NULL default '0',
  `checked_out` int(11) NOT NULL default '0',
  `checked_out_time` datetime NOT NULL default '0000-00-00 00:00:00',
  `published` tinyint(1) NOT NULL default '0',
  `access` int(11) NOT NULL default '0',
  `lag` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `jos_polls`
--

INSERT INTO `jos_polls` (`id`, `title`, `alias`, `voters`, `checked_out`, `checked_out_time`, `published`, `access`, `lag`) VALUES
(1, 'Qual a sua matéria preferida?', 'qual-a-sua-materia-preferida', 2, 0, '0000-00-00 00:00:00', 1, 0, 86400);

-- --------------------------------------------------------

--
-- Estrutura da tabela `jos_poll_data`
--

CREATE TABLE IF NOT EXISTS `jos_poll_data` (
  `id` int(11) NOT NULL auto_increment,
  `pollid` int(11) NOT NULL default '0',
  `text` text NOT NULL,
  `hits` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `pollid` (`pollid`,`text`(1))
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Extraindo dados da tabela `jos_poll_data`
--

INSERT INTO `jos_poll_data` (`id`, `pollid`, `text`, `hits`) VALUES
(1, 1, 'Matemática', 1),
(2, 1, 'Português', 1),
(3, 1, 'Estudos Sociais', 0),
(4, 1, 'Ciências', 0),
(5, 1, '', 0),
(6, 1, '', 0),
(7, 1, '', 0),
(8, 1, '', 0),
(9, 1, '', 0),
(10, 1, '', 0),
(11, 1, '', 0),
(12, 1, '', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `jos_poll_date`
--

CREATE TABLE IF NOT EXISTS `jos_poll_date` (
  `id` bigint(20) NOT NULL auto_increment,
  `date` datetime NOT NULL default '0000-00-00 00:00:00',
  `vote_id` int(11) NOT NULL default '0',
  `poll_id` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `poll_id` (`poll_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `jos_poll_date`
--

INSERT INTO `jos_poll_date` (`id`, `date`, `vote_id`, `poll_id`) VALUES
(1, '2009-06-14 21:32:42', 1, 1),
(2, '2009-07-15 13:56:05', 2, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `jos_poll_menu`
--

CREATE TABLE IF NOT EXISTS `jos_poll_menu` (
  `pollid` int(11) NOT NULL default '0',
  `menuid` int(11) NOT NULL default '0',
  PRIMARY KEY  (`pollid`,`menuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `jos_poll_menu`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `jos_sections`
--

CREATE TABLE IF NOT EXISTS `jos_sections` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(255) NOT NULL default '',
  `name` varchar(255) NOT NULL default '',
  `alias` varchar(255) NOT NULL default '',
  `image` text NOT NULL,
  `scope` varchar(50) NOT NULL default '',
  `image_position` varchar(30) NOT NULL default '',
  `description` text NOT NULL,
  `published` tinyint(1) NOT NULL default '0',
  `checked_out` int(11) unsigned NOT NULL default '0',
  `checked_out_time` datetime NOT NULL default '0000-00-00 00:00:00',
  `ordering` int(11) NOT NULL default '0',
  `access` tinyint(3) unsigned NOT NULL default '0',
  `count` int(11) NOT NULL default '0',
  `params` text NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `idx_scope` (`scope`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Extraindo dados da tabela `jos_sections`
--

INSERT INTO `jos_sections` (`id`, `title`, `name`, `alias`, `image`, `scope`, `image_position`, `description`, `published`, `checked_out`, `checked_out_time`, `ordering`, `access`, `count`, `params`) VALUES
(1, 'Notícias', 'As Notícias', '', 'articles.jpg', 'content', 'right', 'Selecione um t&oacute;pico de not&iacute;cia da lista abaixo e ent&atilde;o selecione um not&iacute;cia para ler.', 1, 0, '0000-00-00 00:00:00', 11, 0, 3, ''),
(16, 'Institucional', '', 'institucional', '', 'content', 'left', '', 1, 0, '0000-00-00 00:00:00', 12, 0, 1, ''),
(8, 'Ed. Infantil', 'Ed. Infantil', '', '', 'content', 'left', '', 1, 0, '0000-00-00 00:00:00', 5, 0, 6, ''),
(9, 'Ens. Fundamental', 'Ens. Fundamental', '', '', 'content', 'left', '', 1, 0, '0000-00-00 00:00:00', 6, 0, 7, ''),
(11, 'Aulas Extra', 'Aulas Extra', '', '', 'content', 'left', '', 1, 0, '0000-00-00 00:00:00', 8, 0, 3, ''),
(14, 'Coordenação Pedagógica', 'Coordenação Pedagógica', '', '', 'content', 'left', '', 1, 0, '0000-00-00 00:00:00', 4, 0, 1, ''),
(15, 'Oficina 100%', 'Oficina 100%', '', '', 'content', 'left', '', 1, 0, '0000-00-00 00:00:00', 1, 0, 2, 'imagefolders=*1*');

-- --------------------------------------------------------

--
-- Estrutura da tabela `jos_session`
--

CREATE TABLE IF NOT EXISTS `jos_session` (
  `username` varchar(150) default '',
  `time` varchar(14) default '',
  `session_id` varchar(200) NOT NULL default '0',
  `guest` tinyint(4) default '1',
  `userid` int(11) default '0',
  `usertype` varchar(50) default '',
  `gid` tinyint(3) unsigned NOT NULL default '0',
  `client_id` tinyint(3) unsigned NOT NULL default '0',
  `data` longtext,
  PRIMARY KEY  (`session_id`(64)),
  KEY `whosonline` (`guest`,`usertype`),
  KEY `userid` (`userid`),
  KEY `time` (`time`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `jos_session`
--

INSERT INTO `jos_session` (`username`, `time`, `session_id`, `guest`, `userid`, `usertype`, `gid`, `client_id`, `data`) VALUES
('', '1473398213', '090f931050b972076aaf2196b442417e', 1, 0, '', 0, 0, '__default|a:8:{s:15:"session.counter";i:86;s:19:"session.timer.start";i:1473398050;s:18:"session.timer.last";i:1473398211;s:17:"session.timer.now";i:1473398213;s:22:"session.client.browser";s:19:"Wget/1.18 (mingw32)";s:8:"registry";O:9:"JRegistry":3:{s:17:"_defaultNameSpace";s:7:"session";s:9:"_registry";a:1:{s:7:"session";a:1:{s:4:"data";O:8:"stdClass":2:{s:18:"eventlistcalqmonth";i:10;s:17:"eventlistcalqyear";i:2016;}}}s:7:"_errors";a:0:{}}s:4:"user";O:5:"JUser":19:{s:2:"id";i:0;s:4:"name";N;s:8:"username";N;s:5:"email";N;s:8:"password";N;s:14:"password_clear";s:0:"";s:8:"usertype";N;s:5:"block";N;s:9:"sendEmail";i:0;s:3:"gid";i:0;s:12:"registerDate";N;s:13:"lastvisitDate";N;s:10:"activation";N;s:6:"params";N;s:3:"aid";i:0;s:5:"guest";i:1;s:7:"_params";O:10:"JParameter":7:{s:4:"_raw";s:0:"";s:4:"_xml";N;s:9:"_elements";a:0:{}s:12:"_elementPath";a:1:{i:0;s:75:"C:\\ServidorWEB\\www\\oficinadossonhos\\libraries\\joomla\\html\\parameter\\element";}s:17:"_defaultNameSpace";s:8:"_default";s:9:"_registry";a:1:{s:8:"_default";a:1:{s:4:"data";O:8:"stdClass":0:{}}}s:7:"_errors";a:0:{}}s:9:"_errorMsg";N;s:7:"_errors";a:0:{}}s:13:"session.token";s:32:"b6f69def1f31b77b624dd0a19da8d6d3";}'),
('', '1473397369', 'd8e0afc268e839c5ec3fd4c2df8e31d9', 1, 0, '', 0, 0, '__default|a:8:{s:15:"session.counter";i:1;s:19:"session.timer.start";i:1473397369;s:18:"session.timer.last";i:1473397369;s:17:"session.timer.now";i:1473397369;s:22:"session.client.browser";s:73:"Mozilla/5.0 (Windows NT 10.0; WOW64; rv:45.0) Gecko/20100101 Firefox/45.0";s:8:"registry";O:9:"JRegistry":3:{s:17:"_defaultNameSpace";s:7:"session";s:9:"_registry";a:1:{s:7:"session";a:1:{s:4:"data";O:8:"stdClass":0:{}}}s:7:"_errors";a:0:{}}s:4:"user";O:5:"JUser":19:{s:2:"id";i:0;s:4:"name";N;s:8:"username";N;s:5:"email";N;s:8:"password";N;s:14:"password_clear";s:0:"";s:8:"usertype";N;s:5:"block";N;s:9:"sendEmail";i:0;s:3:"gid";i:0;s:12:"registerDate";N;s:13:"lastvisitDate";N;s:10:"activation";N;s:6:"params";N;s:3:"aid";i:0;s:5:"guest";i:1;s:7:"_params";O:10:"JParameter":7:{s:4:"_raw";s:0:"";s:4:"_xml";N;s:9:"_elements";a:0:{}s:12:"_elementPath";a:1:{i:0;s:75:"C:\\ServidorWEB\\www\\oficinadossonhos\\libraries\\joomla\\html\\parameter\\element";}s:17:"_defaultNameSpace";s:8:"_default";s:9:"_registry";a:1:{s:8:"_default";a:1:{s:4:"data";O:8:"stdClass":0:{}}}s:7:"_errors";a:0:{}}s:9:"_errorMsg";N;s:7:"_errors";a:0:{}}s:13:"session.token";s:32:"6f0473742af5749d9ecec40951088239";}'),
('admin', '1473397252', '2220af8b55829ae2fdc836da82220fd8', 0, 62, 'Super Administrator', 25, 1, '__default|a:8:{s:15:"session.counter";i:13;s:19:"session.timer.start";i:1473397169;s:18:"session.timer.last";i:1473397238;s:17:"session.timer.now";i:1473397252;s:22:"session.client.browser";s:110:"Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.116 Safari/537.36";s:8:"registry";O:9:"JRegistry":3:{s:17:"_defaultNameSpace";s:7:"session";s:9:"_registry";a:2:{s:7:"session";a:1:{s:4:"data";O:8:"stdClass":0:{}}s:11:"application";a:1:{s:4:"data";O:8:"stdClass":1:{s:4:"lang";s:0:"";}}}s:7:"_errors";a:0:{}}s:4:"user";O:5:"JUser":19:{s:2:"id";s:2:"62";s:4:"name";s:13:"Administrator";s:8:"username";s:5:"admin";s:5:"email";s:34:"secretaria@oficinadossonhos.com.br";s:8:"password";s:65:"4d691249b2c234a198349b2156b3bcf1:ugC3UkiLgjfrnZj7n4FIi5yCUEBwLQ6R";s:14:"password_clear";s:0:"";s:8:"usertype";s:19:"Super Administrator";s:5:"block";s:1:"0";s:9:"sendEmail";s:1:"1";s:3:"gid";s:2:"25";s:12:"registerDate";s:19:"2016-09-09 01:54:39";s:13:"lastvisitDate";s:19:"0000-00-00 00:00:00";s:10:"activation";s:0:"";s:6:"params";s:0:"";s:3:"aid";i:2;s:5:"guest";i:0;s:7:"_params";O:10:"JParameter":7:{s:4:"_raw";s:0:"";s:4:"_xml";N;s:9:"_elements";a:0:{}s:12:"_elementPath";a:1:{i:0;s:75:"C:\\ServidorWEB\\www\\oficinadossonhos\\libraries\\joomla\\html\\parameter\\element";}s:17:"_defaultNameSpace";s:8:"_default";s:9:"_registry";a:1:{s:8:"_default";a:1:{s:4:"data";O:8:"stdClass":0:{}}}s:7:"_errors";a:0:{}}s:9:"_errorMsg";N;s:7:"_errors";a:0:{}}s:13:"session.token";s:32:"2acd5a3f282f7c6bdd87fb4dc49724f8";}ext_filedir|s:0:"";ext_error|a:0:{}ext_message|a:0:{}'),
('', '1473398231', '70f9a27d293d534d2261f0408b5560c2', 1, 0, '', 0, 0, '__default|a:8:{s:15:"session.counter";i:43;s:19:"session.timer.start";i:1473396912;s:18:"session.timer.last";i:1473398162;s:17:"session.timer.now";i:1473398231;s:22:"session.client.browser";s:110:"Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.116 Safari/537.36";s:8:"registry";O:9:"JRegistry":3:{s:17:"_defaultNameSpace";s:7:"session";s:9:"_registry";a:1:{s:7:"session";a:1:{s:4:"data";O:8:"stdClass":0:{}}}s:7:"_errors";a:0:{}}s:4:"user";O:5:"JUser":19:{s:2:"id";i:0;s:4:"name";N;s:8:"username";N;s:5:"email";N;s:8:"password";N;s:14:"password_clear";s:0:"";s:8:"usertype";N;s:5:"block";N;s:9:"sendEmail";i:0;s:3:"gid";i:0;s:12:"registerDate";N;s:13:"lastvisitDate";N;s:10:"activation";N;s:6:"params";N;s:3:"aid";i:0;s:5:"guest";i:1;s:7:"_params";O:10:"JParameter":7:{s:4:"_raw";s:0:"";s:4:"_xml";N;s:9:"_elements";a:0:{}s:12:"_elementPath";a:1:{i:0;s:75:"C:\\ServidorWEB\\www\\oficinadossonhos\\libraries\\joomla\\html\\parameter\\element";}s:17:"_defaultNameSpace";s:8:"_default";s:9:"_registry";a:1:{s:8:"_default";a:1:{s:4:"data";O:8:"stdClass":0:{}}}s:7:"_errors";a:0:{}}s:9:"_errorMsg";N;s:7:"_errors";a:0:{}}s:13:"session.token";s:32:"9e32c136e5eedab488f99d221c1d3030";}');

-- --------------------------------------------------------

--
-- Estrutura da tabela `jos_stats_agents`
--

CREATE TABLE IF NOT EXISTS `jos_stats_agents` (
  `agent` varchar(255) NOT NULL default '',
  `type` tinyint(1) unsigned NOT NULL default '0',
  `hits` int(11) unsigned NOT NULL default '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `jos_stats_agents`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `jos_templates_menu`
--

CREATE TABLE IF NOT EXISTS `jos_templates_menu` (
  `template` varchar(255) NOT NULL default '',
  `menuid` int(11) NOT NULL default '0',
  `client_id` tinyint(4) NOT NULL default '0',
  PRIMARY KEY  (`menuid`,`client_id`,`template`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `jos_templates_menu`
--

INSERT INTO `jos_templates_menu` (`template`, `menuid`, `client_id`) VALUES
('jaolyra', 0, 0),
('khepri', 0, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `jos_users`
--

CREATE TABLE IF NOT EXISTS `jos_users` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(255) NOT NULL default '',
  `username` varchar(150) NOT NULL default '',
  `email` varchar(100) NOT NULL default '',
  `password` varchar(100) NOT NULL default '',
  `usertype` varchar(25) NOT NULL default '',
  `block` tinyint(4) NOT NULL default '0',
  `sendEmail` tinyint(4) default '0',
  `gid` tinyint(3) unsigned NOT NULL default '1',
  `registerDate` datetime NOT NULL default '0000-00-00 00:00:00',
  `lastvisitDate` datetime NOT NULL default '0000-00-00 00:00:00',
  `activation` varchar(100) NOT NULL default '',
  `params` text NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `usertype` (`usertype`),
  KEY `idx_name` (`name`),
  KEY `gid_block` (`gid`,`block`),
  KEY `username` (`username`),
  KEY `email` (`email`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=404 ;

--
-- Extraindo dados da tabela `jos_users`
--

INSERT INTO `jos_users` (`id`, `name`, `username`, `email`, `password`, `usertype`, `block`, `sendEmail`, `gid`, `registerDate`, `lastvisitDate`, `activation`, `params`) VALUES
(62, 'Administrator', 'admin', 'secretaria@oficinadossonhos.com.br', '4d691249b2c234a198349b2156b3bcf1:ugC3UkiLgjfrnZj7n4FIi5yCUEBwLQ6R', 'Super Administrator', 0, 1, 25, '2016-09-09 01:54:39', '2016-09-09 04:59:42', '', ''),
(68, 'Marcia Poletti', 'marcia', 'marcia@oficinadossonhos.com.br', '5dfe429a7ad9e781a1f1f39b9ec27be0:wwKXrHPG59kPywhE', 'Super Administrator', 0, 0, 25, '2006-05-30 15:52:23', '2009-05-26 10:53:46', '', 'editor=tinymce\nexpired=\nexpired_time='),
(125, 'Pamela Rejas', 'pam_rejas', 'pamela@oficinadossonhos.com.br', '4479014fbad231347f3a47fffa75b01c', 'Manager', 0, 0, 23, '2007-09-05 11:43:55', '0000-00-00 00:00:00', '', 'editor='),
(398, 'Leonardo', 'leonardo', 'leo_lima_jlle@yahoo.com.br', 'dffedc5e7edd3d80e46a2f24f52e68f9:RYiYGqcZ90oVu9RAFqPhTIoNu6pEqJqE', 'Registered', 0, 0, 18, '2009-06-17 03:49:51', '2009-06-17 04:21:44', '', 'admin_language=\nlanguage=\neditor=\nhelpsite=\ntimezone=0\n\n'),
(403, 'Jaqueline schuster', 'jaqueline', 'secretaria@oficinadossonhos.com.br', '82d470899927859c0de3986e4bf43394:J9UcwqD3Gm9sF8zxxAx94uXfERYNo2gv', 'Super Administrator', 0, 0, 25, '2009-07-15 13:05:04', '0000-00-00 00:00:00', '', 'admin_language=\nlanguage=\neditor=\nhelpsite=\ntimezone=-3\n\n');

-- --------------------------------------------------------

--
-- Estrutura da tabela `jos_weblinks`
--

CREATE TABLE IF NOT EXISTS `jos_weblinks` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `catid` int(11) NOT NULL default '0',
  `sid` int(11) NOT NULL default '0',
  `title` varchar(250) NOT NULL default '',
  `alias` varchar(255) NOT NULL default '',
  `url` varchar(250) NOT NULL default '',
  `description` text NOT NULL,
  `date` datetime NOT NULL default '0000-00-00 00:00:00',
  `hits` int(11) NOT NULL default '0',
  `published` tinyint(1) NOT NULL default '0',
  `checked_out` int(11) NOT NULL default '0',
  `checked_out_time` datetime NOT NULL default '0000-00-00 00:00:00',
  `ordering` int(11) NOT NULL default '0',
  `archived` tinyint(1) NOT NULL default '0',
  `approved` tinyint(1) NOT NULL default '1',
  `params` text NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `catid` (`catid`,`published`,`archived`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Extraindo dados da tabela `jos_weblinks`
--

INSERT INTO `jos_weblinks` (`id`, `catid`, `sid`, `title`, `alias`, `url`, `description`, `date`, `hits`, `published`, `checked_out`, `checked_out_time`, `ordering`, `archived`, `approved`, `params`) VALUES
(1, 2, 0, 'KDWEB', 'kdweb', 'http://www.kdweb.com.br', 'Site da empresa, Desenvolvimento de sites, hospedagem, registro de domínios, comércio eletrônico, newsletter, e geradores de conteúdo, etc.', '2006-05-24 12:30:02', 43, 1, 0, '0000-00-00 00:00:00', 1, 0, 1, 'target=0'),
(4, 2, 0, 'wmonline', 'wmonline', 'http://wmonline.com.br', 'Portal do WebMaster, utilitários para desenvolvimento, templates, Softwares livres dentre outros relacionado ao assunto.', '2006-05-24 12:31:15', 105, 1, 0, '0000-00-00 00:00:00', 2, 0, 1, 'target=0'),
(7, 31, 0, 'Nosso Amiguinho', 'nosso-amiguinho', 'http://www.nossoamiguinho.com.br', '', '2006-08-14 00:36:46', 115, 1, 0, '0000-00-00 00:00:00', 2, 0, 1, 'target=1'),
(8, 31, 0, 'Guia dos Curiosos', 'guia-dos-curiosos', 'http://www.guiadoscuriosos.com.br.com.br', '', '2006-08-14 00:37:18', 83, 1, 0, '0000-00-00 00:00:00', 1, 0, 1, 'target=1'),
(6, 31, 0, 'Nosso Pão Diário', 'nosso-pao-diario', 'http://www.nossopaodiario.com.br', '', '2006-08-14 00:35:04', 119, 1, 0, '0000-00-00 00:00:00', 3, 0, 1, 'target=1');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
