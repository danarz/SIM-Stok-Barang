-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.5.27 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for db_sim_stokbarang
CREATE DATABASE IF NOT EXISTS `db_sim_stokbarang` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `db_sim_stokbarang`;


-- Dumping structure for table db_sim_stokbarang.barang
CREATE TABLE IF NOT EXISTS `barang` (
  `id_barang` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(150) NOT NULL,
  `jumlah` int(50) NOT NULL,
  PRIMARY KEY (`id_barang`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Dumping data for table db_sim_stokbarang.barang: ~5 rows (approximately)
DELETE FROM `barang`;
/*!40000 ALTER TABLE `barang` DISABLE KEYS */;
INSERT INTO `barang` (`id_barang`, `nama`, `jumlah`) VALUES
	(2, 'sus', 0),
	(3, 'jeruk', 0),
	(4, 'biskuit', 3166),
	(5, 'salak', 400),
	(6, 'Ultramilk 250ml', 10);
/*!40000 ALTER TABLE `barang` ENABLE KEYS */;


-- Dumping structure for table db_sim_stokbarang.role
CREATE TABLE IF NOT EXISTS `role` (
  `id_role` int(11) NOT NULL,
  `role_name` varchar(50) NOT NULL,
  PRIMARY KEY (`id_role`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_sim_stokbarang.role: ~4 rows (approximately)
DELETE FROM `role`;
/*!40000 ALTER TABLE `role` DISABLE KEYS */;
INSERT INTO `role` (`id_role`, `role_name`) VALUES
	(0, 'User'),
	(1, 'Super Admin'),
	(2, 'Admin'),
	(3, 'Staff');
/*!40000 ALTER TABLE `role` ENABLE KEYS */;


-- Dumping structure for table db_sim_stokbarang.tkeluar
CREATE TABLE IF NOT EXISTS `tkeluar` (
  `id_keluar` int(11) NOT NULL AUTO_INCREMENT,
  `id_barang` int(11) NOT NULL,
  `stok_out` int(11) NOT NULL DEFAULT '0',
  `tgl` date NOT NULL,
  `penerima` varchar(50) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_keluar`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Dumping data for table db_sim_stokbarang.tkeluar: ~3 rows (approximately)
DELETE FROM `tkeluar`;
/*!40000 ALTER TABLE `tkeluar` DISABLE KEYS */;
INSERT INTO `tkeluar` (`id_keluar`, `id_barang`, `stok_out`, `tgl`, `penerima`, `timestamp`) VALUES
	(1, 2, 10, '2022-02-04', 'Jhonan', '2022-02-04 14:34:24'),
	(2, 3, 50, '2021-11-17', 'Raraa', '2022-02-04 20:38:44'),
	(5, 3, 70, '2022-02-04', 'Ridho', '2022-02-04 17:55:56');
/*!40000 ALTER TABLE `tkeluar` ENABLE KEYS */;


-- Dumping structure for table db_sim_stokbarang.tmasuk
CREATE TABLE IF NOT EXISTS `tmasuk` (
  `id_masuk` int(11) NOT NULL AUTO_INCREMENT,
  `id_barang` int(11) NOT NULL,
  `stok_in` int(11) NOT NULL DEFAULT '0',
  `tgl` date NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_masuk`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

-- Dumping data for table db_sim_stokbarang.tmasuk: ~6 rows (approximately)
DELETE FROM `tmasuk`;
/*!40000 ALTER TABLE `tmasuk` DISABLE KEYS */;
INSERT INTO `tmasuk` (`id_masuk`, `id_barang`, `stok_in`, `tgl`, `timestamp`) VALUES
	(13, 3, 60, '2021-06-16', '2022-02-04 14:15:30'),
	(16, 4, 500, '2022-01-31', '2022-02-04 14:12:45'),
	(17, 2, 70, '2022-02-04', '2022-02-04 14:08:38'),
	(18, 3, 60, '2022-02-01', '2022-02-04 14:32:09'),
	(19, 3, 10, '2022-02-04', '2022-02-04 18:01:00'),
	(20, 3, 200, '2022-02-05', '2022-02-05 15:19:06');
/*!40000 ALTER TABLE `tmasuk` ENABLE KEYS */;


-- Dumping structure for table db_sim_stokbarang.user
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL DEFAULT '0',
  `pass` varchar(50) NOT NULL DEFAULT '0',
  `nama` varchar(50) DEFAULT NULL,
  `id_role` int(2) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table db_sim_stokbarang.user: ~3 rows (approximately)
DELETE FROM `user`;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id_user`, `email`, `pass`, `nama`, `id_role`) VALUES
	(1, 'admin@admin.com', 'admin', 'mimin', 1),
	(2, 'styopatuhdanar@gmail.com', 'admin', 'Styo Patuh', 0),
	(3, 'joko@gmail.com', 'admin', 'danar', 0);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
