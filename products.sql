-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Gostitelj: localhost
-- Čas nastanka: 06. jun 2016 ob 02.00
-- Različica strežnika: 10.1.9-MariaDB
-- Različica PHP: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Zbirka podatkov: `foodplus`
--

-- --------------------------------------------------------

--
-- Struktura tabele `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_description` text NOT NULL,
  `production_date` date NOT NULL,
  `expiry_date` date NOT NULL,
  `product_price` float NOT NULL,
  `price_currency` varchar(100) NOT NULL,
  `ean_code` varchar(100) NOT NULL,
  `product_weight` float NOT NULL,
  `weight_unit` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Odloži podatke za tabelo `products`
--

INSERT INTO `products` (`id`, `product_name`, `product_description`, `production_date`, `expiry_date`, `product_price`, `price_currency`, `ean_code`, `product_weight`, `weight_unit`) VALUES
(1, 'apple', 'This is a red apple.', '2016-06-01', '2016-06-30', 10, 'eur', '4783164823452', 0.12, 'kg'),
(11, 'Moka', 'Tip 400', '2015-01-02', '2018-02-03', 1.02, 'eur', '12365746782', 0.5, 'kg'),
(12, 'Cokolada', 'Opis cokolade.', '2016-01-03', '2017-03-03', 2.5, 'eur', '173jrh4624', 0.1, 'kg');

--
-- Indeksi zavrženih tabel
--

--
-- Indeksi tabele `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `id_2` (`id`);

--
-- AUTO_INCREMENT zavrženih tabel
--

--
-- AUTO_INCREMENT tabele `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
