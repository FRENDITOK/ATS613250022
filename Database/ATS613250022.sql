-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versi server:                 8.4.3 - MySQL Community Server - GPL
-- OS Server:                    Win64
-- HeidiSQL Versi:               12.8.0.6908
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Membuang struktur basisdata untuk ats613250022
CREATE DATABASE IF NOT EXISTS `ats613250022` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `ats613250022`;

-- membuang struktur untuk table ats613250022.member_022
CREATE TABLE IF NOT EXISTS `member_022` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(34) NOT NULL DEFAULT '0',
  `password` varchar(32) NOT NULL DEFAULT '0',
  `nama` varchar(50) NOT NULL DEFAULT '0',
  `aktive` enum('1','0') NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Membuang data untuk tabel ats613250022.member_022: ~1 rows (lebih kurang)
INSERT INTO `member_022` (`id`, `email`, `password`, `nama`, `aktive`) VALUES
	(1, 'fauzi@ulbi.ac.id', 'password123', 'Fauzi Ahmad Dani', '1');

-- membuang struktur untuk table ats613250022.mobil_022
CREATE TABLE IF NOT EXISTS `mobil_022` (
  `no_id` int NOT NULL AUTO_INCREMENT,
  `nomor_kendaraan` varchar(12) NOT NULL DEFAULT '0',
  `jenis_kendaraan` enum('Sedan','Pickup','Truck','Bemo') NOT NULL,
  `pemilik` varchar(50) NOT NULL DEFAULT '0',
  `tahun_pembuatan` char(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`no_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Membuang data untuk tabel ats613250022.mobil_022: ~3 rows (lebih kurang)
INSERT INTO `mobil_022` (`no_id`, `nomor_kendaraan`, `jenis_kendaraan`, `pemilik`, `tahun_pembuatan`) VALUES
	(1, 'D 1234 ABC', 'Sedan', 'Fauzi Ahmad Dani', '2022'),
	(2, 'B 5678 DEF', 'Pickup', 'Faiz Fadhil', '2020'),
	(3, 'T 9876 ABZ', 'Truck', 'MUHAMMAD ABIDZAR SYARIFUDIN', '2019');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
