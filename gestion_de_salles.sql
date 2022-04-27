-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mer. 11 août 2021 à 09:45
-- Version du serveur :  10.4.8-MariaDB
-- Version de PHP :  7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `gestion_de_salles`
--

-- --------------------------------------------------------

--
-- Structure de la table `jours`
--

CREATE TABLE `jours` (
  `id_jour` int(11) NOT NULL,
  `heur_jour` varchar(50) NOT NULL,
  `lundi` varchar(255) DEFAULT NULL,
  `mardi` varchar(255) DEFAULT NULL,
  `mercredi` varchar(255) DEFAULT NULL,
  `jeudi` varchar(255) DEFAULT NULL,
  `vendredi` varchar(255) DEFAULT NULL,
  `unique_id` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `jours`
--

INSERT INTO `jours` (`id_jour`, `heur_jour`, `lundi`, `mardi`, `mercredi`, `jeudi`, `vendredi`, `unique_id`) VALUES
(28, '8h-9h', 'math', NULL, NULL, NULL, NULL, 729361210);

-- --------------------------------------------------------

--
-- Structure de la table `loginprofesseur`
--

CREATE TABLE `loginprofesseur` (
  `id_login` int(11) NOT NULL,
  `unique_id` int(200) NOT NULL,
  `prof_name` varchar(255) DEFAULT NULL,
  `subject_prof` varchar(100) NOT NULL,
  `prof_filiere` varchar(255) DEFAULT NULL,
  `login_password` varchar(255) NOT NULL,
  `plusieurs` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `loginprofesseur`
--

INSERT INTO `loginprofesseur` (`id_login`, `unique_id`, `prof_name`, `subject_prof`, `prof_filiere`, `login_password`, `plusieurs`) VALUES
(9, 212639435, 'broke', 'math', 'informatique', '$2y$10$k1Iv1kM7Ispi4qRwNHmhWORWZeB3hWI7bpOOBkQR90CULnDtXbDI6', 'off'),
(10, 729361210, 'rola', 'anglais', 'gestion', '$2y$10$VnmG0PC4AbpO6iqhnChwkuVQAqNHPEn/qmltuHzoNOvk0UXKh5CDG', 'off'),
(11, 568859629, 'wala', 'Mathematique', 'Genie Civile', '$2y$10$fafSMSOigj0CR4A2fKduxOC9MRSxsYmXxGZfduRwZkvT01eZcj62m', 'off'),
(12, 165740648, 'rolio', 'python', 'informatique', '$2y$10$BCHb5w/MzD2afITtdWJLTOH2nbTyqf4o42P936814rXVMt/hdE2G2', 'off');

-- --------------------------------------------------------

--
-- Structure de la table `professeur`
--

CREATE TABLE `professeur` (
  `id_prof` int(11) NOT NULL,
  `unique_id` int(200) NOT NULL,
  `nom_prof` varchar(255) DEFAULT NULL,
  `gestion` varchar(255) DEFAULT NULL,
  `communication` varchar(255) DEFAULT NULL,
  `informatique` varchar(255) DEFAULT NULL,
  `genieCivile` varchar(255) DEFAULT NULL,
  `plusieur` varchar(30) NOT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `professeur`
--

INSERT INTO `professeur` (`id_prof`, `unique_id`, `nom_prof`, `gestion`, `communication`, `informatique`, `genieCivile`, `plusieur`, `password`) VALUES
(23, 212639435, 'broke', '', '', 'math', '', 'off', '$2y$10$k1Iv1kM7Ispi4qRwNHmhWORWZeB3hWI7bpOOBkQR90CULnDtXbDI6'),
(24, 729361210, 'rola', 'anglais', '', '', '', 'off', '$2y$10$VnmG0PC4AbpO6iqhnChwkuVQAqNHPEn/qmltuHzoNOvk0UXKh5CDG'),
(25, 568859629, 'wala', '', '', '', 'Mathematique', 'off', '$2y$10$fafSMSOigj0CR4A2fKduxOC9MRSxsYmXxGZfduRwZkvT01eZcj62m'),
(26, 165740648, 'rolio', '', '', 'python', '', 'off', '$2y$10$BCHb5w/MzD2afITtdWJLTOH2nbTyqf4o42P936814rXVMt/hdE2G2');

-- --------------------------------------------------------

--
-- Structure de la table `salles`
--

CREATE TABLE `salles` (
  `id_salles` int(11) NOT NULL,
  `heur` varchar(100) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `salles` varchar(100) NOT NULL,
  `jours` varchar(50) NOT NULL,
  `semestres` varchar(30) NOT NULL,
  `vagues` varchar(30) NOT NULL,
  `nb_eleves` int(200) NOT NULL,
  `filiere` varchar(200) NOT NULL,
  `id_unique` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `salles`
--

INSERT INTO `salles` (`id_salles`, `heur`, `subject`, `salles`, `jours`, `semestres`, `vagues`, `nb_eleves`, `filiere`, `id_unique`) VALUES
(34, '8h-9h', 'math', 'salle3', 'lundi', 's1', 'v1', 12, 'informatique', 212639435),
(35, '12h-14h', 'math', 'salle9', 'lundi', 's1', 'v1', 12, 'informatique', 212639435),
(36, '10h-11h', 'anglais', 'salle1', 'mercredi', 's6', 'v1', 14, 'gestion', 729361210),
(37, '8h-9h', 'math', 'grand_salle', 'lundi', 's1', 'v1', 34, 'informatique', 212639435);

-- --------------------------------------------------------

--
-- Structure de la table `salleschar`
--

CREATE TABLE `salleschar` (
  `id_charSalle` int(11) NOT NULL,
  `salles` varchar(255) NOT NULL,
  `nb_table` int(11) NOT NULL,
  `nb_eleves` int(11) NOT NULL,
  `salle_content` varchar(255) NOT NULL,
  `salles_value` varchar(255) NOT NULL,
  `status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `salleschar`
--

INSERT INTO `salleschar` (`id_charSalle`, `salles`, `nb_table`, `nb_eleves`, `salle_content`, `salles_value`, `status`) VALUES
(1, 'grand_salle', 200, 400, 'tableau', 'sal1', 'free'),
(2, 'salle1', 100, 200, 'tableau', 'sal2', 'free'),
(3, 'salle2', 30, 60, 'tableau', 'sal3', 'free'),
(4, 'salle3', 40, 80, 'tableau', 'sal4', 'free'),
(5, 'salle4', 50, 100, 'tableau', 'sal5', 'free'),
(6, 'salle5', 50, 100, 'tableau', 'sal6', 'free'),
(7, 'salle6', 50, 100, 'tableau', 'sal7', 'free'),
(8, 'salle7', 30, 60, 'tableau', 'sal9', 'free'),
(9, 'salle8', 50, 100, 'prise', 'sal9', 'free'),
(10, 'salle9', 40, 80, 'prise', 'sal10', 'free'),
(11, 'parc_informatique', 50, 100, 'ordinateur', 'sal11', 'free'),
(12, 'Bibliotheque_informatique', 30, 60, 'ordinateur', 'sal12', 'free');

-- --------------------------------------------------------

--
-- Structure de la table `salles_occupe`
--

CREATE TABLE `salles_occupe` (
  `salle_id` int(11) NOT NULL,
  `prof_name` varchar(255) NOT NULL,
  `name_salle` varchar(255) NOT NULL,
  `matier` varchar(255) NOT NULL,
  `nombre_aleve` int(11) NOT NULL,
  `heur` varchar(255) NOT NULL,
  `semestre` varchar(100) NOT NULL,
  `vageus` varchar(100) NOT NULL,
  `jours` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `jours`
--
ALTER TABLE `jours`
  ADD PRIMARY KEY (`id_jour`);

--
-- Index pour la table `loginprofesseur`
--
ALTER TABLE `loginprofesseur`
  ADD PRIMARY KEY (`id_login`);

--
-- Index pour la table `professeur`
--
ALTER TABLE `professeur`
  ADD PRIMARY KEY (`id_prof`);

--
-- Index pour la table `salles`
--
ALTER TABLE `salles`
  ADD PRIMARY KEY (`id_salles`);

--
-- Index pour la table `salleschar`
--
ALTER TABLE `salleschar`
  ADD PRIMARY KEY (`id_charSalle`);

--
-- Index pour la table `salles_occupe`
--
ALTER TABLE `salles_occupe`
  ADD PRIMARY KEY (`salle_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `jours`
--
ALTER TABLE `jours`
  MODIFY `id_jour` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT pour la table `loginprofesseur`
--
ALTER TABLE `loginprofesseur`
  MODIFY `id_login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `professeur`
--
ALTER TABLE `professeur`
  MODIFY `id_prof` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT pour la table `salles`
--
ALTER TABLE `salles`
  MODIFY `id_salles` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT pour la table `salleschar`
--
ALTER TABLE `salleschar`
  MODIFY `id_charSalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `salles_occupe`
--
ALTER TABLE `salles_occupe`
  MODIFY `salle_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
