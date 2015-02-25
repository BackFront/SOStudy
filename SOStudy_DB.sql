-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           5.6.20 - MySQL Community Server (GPL)
-- OS do Servidor:               Win32
-- HeidiSQL Versão:              8.3.0.4694
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Copiando estrutura do banco de dados para sostudy
CREATE DATABASE IF NOT EXISTS `sostudy` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `sostudy`;


-- Copiando estrutura para tabela sostudy._guide
CREATE TABLE IF NOT EXISTS `_guide` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) DEFAULT '0',
  `guide_name` varchar(50) DEFAULT NULL,
  `guide_description` varchar(255) DEFAULT NULL,
  `guide_midia` varchar(100) DEFAULT NULL,
  `guide_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `guide_tags` varchar(255) DEFAULT NULL,
  `guide_type` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user` (`user_id`),
  CONSTRAINT `user` FOREIGN KEY (`user_id`) REFERENCES `_user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela sostudy._guide: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `_guide` DISABLE KEYS */;
/*!40000 ALTER TABLE `_guide` ENABLE KEYS */;


-- Copiando estrutura para tabela sostudy._likes
CREATE TABLE IF NOT EXISTS `_likes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_post` int(11) DEFAULT '0',
  `id_user` int(11) DEFAULT '0',
  `like_unlike` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_post` (`id_post`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `id_post` FOREIGN KEY (`id_post`) REFERENCES `_post` (`id`),
  CONSTRAINT `id_user` FOREIGN KEY (`id_user`) REFERENCES `_user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela sostudy._likes: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `_likes` DISABLE KEYS */;
/*!40000 ALTER TABLE `_likes` ENABLE KEYS */;


-- Copiando estrutura para tabela sostudy._log
CREATE TABLE IF NOT EXISTS `_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ip` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `url` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `archive` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `method` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `navegador` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `user` varchar(255) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- Copiando dados para a tabela sostudy._log: ~25 rows (aproximadamente)
/*!40000 ALTER TABLE `_log` DISABLE KEYS */;
INSERT INTO `_log` (`id`, `date`, `ip`, `url`, `archive`, `method`, `navegador`, `user`) VALUES
	(1, '2014-09-02 19:16:32', '::1', '/SOStudy/', 'C:/xampp/htdocs/SOStudy/index.php', 'GET', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0', '[][][]'),
	(2, '2014-09-02 19:16:46', '::1', '/SOStudy/fnt/LogaUser.php', 'C:/xampp/htdocs/SOStudy/fnt/LogaUser.php', 'POST', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0', '[][][]'),
	(3, '2014-09-02 19:16:51', '::1', '/SOStudy/index.php', 'C:/xampp/htdocs/SOStudy/index.php', 'GET', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0', '[][][]'),
	(4, '2014-09-02 19:17:36', '::1', '/SOStudy/fnt/CadastraUser.php', 'C:/xampp/htdocs/SOStudy/fnt/CadastraUser.php', 'POST', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0', '[][][]'),
	(5, '2014-09-02 19:17:39', '::1', '/SOStudy/index.php', 'C:/xampp/htdocs/SOStudy/index.php', 'GET', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0', '[][][]'),
	(6, '2014-09-02 19:17:50', '::1', '/SOStudy/fnt/LogaUser.php', 'C:/xampp/htdocs/SOStudy/fnt/LogaUser.php', 'POST', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0', '[][][]'),
	(7, '2014-09-02 19:18:00', '::1', '/sostudy/user/', 'C:/xampp/htdocs/SOStudy/user/index.php', 'GET', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0', '[1][Administrador  ][admin@admin.com]'),
	(8, '2014-09-02 19:18:34', '::1', '/sostudy/user/new_content.php', 'C:/xampp/htdocs/SOStudy/user/new_content.php', 'GET', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0', '[1][Administrador  ][admin@admin.com]'),
	(9, '2014-09-02 19:18:40', '::1', '/sostudy/user/new_content.php', 'C:/xampp/htdocs/SOStudy/user/new_content.php', 'GET', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0', '[1][Administrador  ][admin@admin.com]'),
	(10, '2014-09-02 19:18:42', '::1', '/sostudy/user/', 'C:/xampp/htdocs/SOStudy/user/index.php', 'GET', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0', '[1][Administrador  ][admin@admin.com]'),
	(11, '2014-09-02 19:27:41', '::1', '/sostudy/user/', 'C:/xampp/htdocs/SOStudy/user/index.php', 'GET', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0', '[1][Administrador  ][admin@admin.com]'),
	(12, '2014-09-02 19:27:53', '::1', '/sostudy/user/new_content.php', 'C:/xampp/htdocs/SOStudy/user/new_content.php', 'GET', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0', '[1][Administrador  ][admin@admin.com]'),
	(13, '2014-09-02 19:28:11', '::1', '/sostudy/user/new_content.php', 'C:/xampp/htdocs/SOStudy/user/new_content.php', 'POST', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0', '[1][Administrador  ][admin@admin.com]'),
	(14, '2014-09-02 19:28:16', '::1', '/sostudy/user/', 'C:/xampp/htdocs/SOStudy/user/index.php', 'GET', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0', '[1][Administrador  ][admin@admin.com]'),
	(15, '2014-09-02 19:28:26', '::1', '/sostudy/user/guide.php', 'C:/xampp/htdocs/SOStudy/user/guide.php', 'GET', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0', '[1][Administrador  ][admin@admin.com]'),
	(16, '2014-09-02 19:29:28', '::1', '/sostudy/user/guide.php', 'C:/xampp/htdocs/SOStudy/user/guide.php', 'GET', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0', '[1][Administrador  ][admin@admin.com]'),
	(17, '2014-09-02 19:29:32', '::1', '/sostudy/user/', 'C:/xampp/htdocs/SOStudy/user/index.php', 'GET', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0', '[1][Administrador  ][admin@admin.com]'),
	(18, '2014-09-02 19:30:52', '::1', '/sostudy/user/', 'C:/xampp/htdocs/SOStudy/user/index.php', 'GET', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0', '[1][Administrador  ][admin@admin.com]'),
	(19, '2014-09-02 19:30:54', '::1', '/sostudy/user/new_content.php', 'C:/xampp/htdocs/SOStudy/user/new_content.php', 'GET', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0', '[1][Administrador  ][admin@admin.com]'),
	(20, '2014-09-02 19:30:57', '::1', '/sostudy/user/', 'C:/xampp/htdocs/SOStudy/user/index.php', 'GET', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0', '[1][Administrador  ][admin@admin.com]'),
	(21, '2014-09-02 19:30:59', '::1', '/sostudy/user/guide.php', 'C:/xampp/htdocs/SOStudy/user/guide.php', 'GET', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0', '[1][Administrador  ][admin@admin.com]'),
	(22, '2014-09-02 19:31:09', '::1', '/sostudy/user/', 'C:/xampp/htdocs/SOStudy/user/index.php', 'GET', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0', '[1][Administrador  ][admin@admin.com]'),
	(23, '2014-09-02 19:31:26', '::1', '/sostudy/user/guide.php', 'C:/xampp/htdocs/SOStudy/user/guide.php', 'GET', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0', '[1][Administrador  ][admin@admin.com]'),
	(24, '2014-09-02 19:31:42', '::1', '/sostudy/user/', 'C:/xampp/htdocs/SOStudy/user/index.php', 'GET', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0', '[1][Administrador  ][admin@admin.com]'),
	(25, '2014-09-02 19:31:44', '::1', '/sostudy/user/new_content.php', 'C:/xampp/htdocs/SOStudy/user/new_content.php', 'GET', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0', '[1][Administrador  ][admin@admin.com]');
/*!40000 ALTER TABLE `_log` ENABLE KEYS */;


-- Copiando estrutura para tabela sostudy._post
CREATE TABLE IF NOT EXISTS `_post` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `post_title` varchar(50) DEFAULT '0',
  `post_link` varchar(255) DEFAULT '0',
  `post_category` varchar(100) DEFAULT '0',
  `post_midia` varchar(50) DEFAULT '0',
  `post_type` varchar(50) DEFAULT '0',
  `post_description` varchar(255) DEFAULT '0',
  `post_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) DEFAULT '0',
  `post_idioma` varchar(50) DEFAULT '0',
  `post_situation` int(2) DEFAULT '0',
  `post_like` int(11) DEFAULT '0',
  `post_unlike` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `FK_autor` (`user_id`),
  CONSTRAINT `FK_autor` FOREIGN KEY (`user_id`) REFERENCES `_user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela sostudy._post: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `_post` DISABLE KEYS */;
INSERT INTO `_post` (`id`, `post_title`, `post_link`, `post_category`, `post_midia`, `post_type`, `post_description`, `post_date`, `user_id`, `post_idioma`, `post_situation`, `post_like`, `post_unlike`) VALUES
	(1, 'Teste', 'http://google,com', 'ASP', 'ConteÃºdo Online', 'public', 'descricao', '2014-09-02 19:28:11', 1, 'Portugues', 1, 0, 0);
/*!40000 ALTER TABLE `_post` ENABLE KEYS */;


-- Copiando estrutura para tabela sostudy._relation_guide
CREATE TABLE IF NOT EXISTS `_relation_guide` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_post` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT '0',
  `id_guide` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `FK_id_user` (`id_user`),
  KEY `FK_id_guide` (`id_guide`),
  KEY `FK_id_post` (`id_post`),
  CONSTRAINT `FK_id_guide` FOREIGN KEY (`id_guide`) REFERENCES `_guide` (`id`),
  CONSTRAINT `FK_id_post` FOREIGN KEY (`id_post`) REFERENCES `_post` (`id`),
  CONSTRAINT `FK_id_user` FOREIGN KEY (`id_user`) REFERENCES `_user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela sostudy._relation_guide: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `_relation_guide` DISABLE KEYS */;
/*!40000 ALTER TABLE `_relation_guide` ENABLE KEYS */;


-- Copiando estrutura para tabela sostudy._user
CREATE TABLE IF NOT EXISTS `_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `sexo` char(1) NOT NULL,
  `situation` int(1) NOT NULL,
  `date_create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `token` varchar(32) DEFAULT NULL,
  `thumb` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela sostudy._user: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `_user` DISABLE KEYS */;
INSERT INTO `_user` (`id`, `name`, `email`, `password`, `sexo`, `situation`, `date_create`, `token`, `thumb`) VALUES
	(1, 'Administrador  ', 'admin@admin.com', 'e9fd363bedc114628fe2cdce1493db15', 'M', 1, '2014-09-02 19:17:36', NULL, NULL);
/*!40000 ALTER TABLE `_user` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
