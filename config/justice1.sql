-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mer. 18 mai 2022 à 18:18
-- Version du serveur : 5.5.65-MariaDB
-- Version de PHP : 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `justice1`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `user` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `user`, `pass`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(50) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `numero` varchar(50) NOT NULL,
  `sexe` varchar(20) DEFAULT NULL,
  `type` varchar(20) DEFAULT NULL,
  `motif` varchar(255) NOT NULL,
  `date_added` date NOT NULL,
  `date_out` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `full_name`, `numero`, `sexe`, `type`, `motif`, `date_added`, `date_out`) VALUES
(57, 'محمد جباري', '35/2022 ', 'ذكر', 'رشداء', 'المشاركة في تزييف طابع إحدى السلطات و استعماله و المشاركة في تزييف مطبوع ذي صفة رسيمة و المشاركة  في تزوير محرر رسمي ... ', '2022-02-20', '2022-06-20'),
(87, 'اتشوران عبد العزيز', '23-2022', 'ذكر', 'رشداء', 'محاولة القتل و السرقة الموصوفة ', '2022-01-28', '2022-05-28'),
(88, 'المنضوح نجيب', '23-2022 ', 'ذكر', 'رشداء', 'عصابة إجرامية - السرقة الموصوفة  ', '2022-01-28', '2022-05-28'),
(89, 'ادريس بن عبيد ', '23-2022', 'ذكر', 'رشداء', 'عصابة إجرامية و السرقة الموصوفة', '2022-01-28', '2022-05-28'),
(100, 'محمد بربوشة', '69/2022', 'ذكر', 'رشداء', 'القتل العمد مع سبق الإصرار و الترصد', '2022-04-05', '2022-06-05'),
(101, 'كمال سعلي', '70/2022', 'ذكر', 'رشداء', 'القتل العمد مع سبق الإصرار و الضرب و الجرح ', '2022-04-06', '2022-06-06'),
(103, 'بدر الدين مهداد', '75-22', 'ذكر', 'رشداء', 'السرقات الموصوفة', '2022-04-21', '2022-06-21'),
(104, 'سوري محمد', '76/2022 ', 'ذكر', 'رشداء', 'القتل العمد مع سبق الاصرار و الترصد و محاولة القتل العمد في حق الاصول  ', '2022-04-22', '2022-06-22'),
(106, 'عبد الله غرماوي', '78/2022', 'ذكر', 'رشداء', 'تعدد السرقات', '2022-04-28', '2022-06-28'),
(107, 'منير هداجي', '78-22', 'ذكر', 'رشداء', 'السرقة الموصوفة', '2022-04-30', '2022-06-30'),
(108, 'محمد البويحياوي', '79-2022', 'ذكر', 'رشداء', 'السرقة الموصوفة', '2022-05-01', '2022-07-01'),
(109, 'أيوب عطياوي', '80-2022', 'ذكر', 'رشداء', 'تكوين عصابة إجرامية و السرقات الموصوفة', '2022-05-01', '2022-07-01'),
(110, 'محمد ارباح', '81-2022', 'ذكر', 'رشداء', 'التغرير لقاصرة و هتك عرضها مع الإفتضاض', '2022-05-06', '2022-07-06'),
(112, 'الحسين عيادي', '82/2022', 'ذكر', 'رشداء', 'القتل العمد مع سبق الاصرار', '2022-05-06', '2022-07-06'),
(115, 'محمد أمين بوزعيط ', '18-2022', 'ذكر', 'أحداث', 'السرقة الموصوفة ', '2022-05-06', '2022-07-06'),
(116, 'قيشو ربيع', '85-2022', 'ذكر', 'رشداء', 'تكوين عصابة إجرامية و محاولة القتل العمد و المشاركة في ذلك  الضرب و الجرح الضرب و الجرح بوزاسطة سلاح ناري', '2022-05-07', '2022-07-07'),
(117, 'المصطفى المختاري', '88/2022', 'ذكر', 'رشداء', 'اختطاف قاصر باستعمال العنف و محاولة القتل العمد مع سبق اللصرار و محاولة الهجوم على مسكن الغير باستعمال العنف و التهديد بارتكاب جاية ', '2022-05-09', '2022-07-09'),
(120, 'عبد الحق حطاب', '90-2022', 'ذكر', 'رشداء', 'محاولة الإغتصاب و الرسقة.', '2022-05-11', '2022-07-11'),
(121, 'شفيق بالمصطفى', '91-2022', 'ذكر', 'رشداء', 'السرقة الموصوفة', '2022-05-13', '2022-07-13'),
(122, 'هروي صلاح', '92-2022', 'ذكر', 'رشداء', 'السرقة الموصوفة', '2022-05-13', '2022-07-13'),
(126, 'وليد معراض ', '94-2022', 'ذكر', 'رشداء', 'السرقة الموصوفة', '2022-05-16', '2022-07-16'),
(127, 'لشعل سمير ', '94-2022', 'ذكر', 'رشداء', 'السرقة الموصوفة', '2022-05-16', '2022-07-16'),
(128, 'مومن محمد أمين ', '94-2022', 'ذكر', 'رشداء', 'السرقة الموصوفة ', '2022-05-16', '2022-07-16'),
(129, 'خالد بوعاصم ', '95-2022', 'ذكر', 'رشداء', 'السرقات الموصوفة و المشاركة في ذلك و السكر العلني و استهلاك مواد مخدرة و حيازة السلاح بدون مبرر مشروع و الضرب و الجرح و المشاركة في ذلك.', '2022-05-16', '2022-07-16');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
