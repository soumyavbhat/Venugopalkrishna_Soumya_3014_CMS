-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 09, 2018 at 01:01 AM
-- Server version: 5.7.19
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_moviereview`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_genre`
--

DROP TABLE IF EXISTS `tbl_genre`;
CREATE TABLE IF NOT EXISTS `tbl_genre` (
  `genre_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `genre_name` varchar(50) NOT NULL,
  PRIMARY KEY (`genre_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_genre`
--

INSERT INTO `tbl_genre` (`genre_id`, `genre_name`) VALUES
(1, 'Adventure'),
(2, 'Family'),
(3, 'Fantasy'),
(4, 'Action'),
(5, 'Sci-Fi'),
(6, 'Comedy'),
(7, 'Drama'),
(8, 'Horror'),
(9, 'Crime'),
(10, 'Mystery'),
(11, 'Thriller');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_movies`
--

DROP TABLE IF EXISTS `tbl_movies`;
CREATE TABLE IF NOT EXISTS `tbl_movies` (
  `movies_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `movies_name` varchar(100) NOT NULL,
  `movies_img` varchar(100) NOT NULL,
  `movies_desc` varchar(2000) NOT NULL,
  `movies_stars` varchar(1000) NOT NULL,
  `movies_rating` varchar(5) NOT NULL,
  `movies_year` int(11) NOT NULL,
  `movies_director` varchar(50) NOT NULL,
  PRIMARY KEY (`movies_id`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_movies`
--

INSERT INTO `tbl_movies` (`movies_id`, `movies_name`, `movies_img`, `movies_desc`, `movies_stars`, `movies_rating`, `movies_year`, `movies_director`) VALUES
(1, 'A Wrinkle in Time', 'awrinkleintime.jpg', 'After the disappearance of her scientist father, three peculiar beings send Meg, her brother, and her friend to space in order to find him.', 'Storm Reid, Oprah Winfrey, Reese Witherspoon, Mindy Kailing', '4', 2018, ''),
(2, 'Black Panther', 'blackpanther.jpg', 'T\'Challa, the King of Wakanda, rises to the throne in the isolated, technologically advanced African nation, but his claim is challenged by a vengeful outsider who was a childhood victim of T\'Challa\'s father\'s mistake.', ' Chadwick Boseman, Michael B. Jordan, Lupita Nyong\'o', '7.8', 2018, 'Ryan Coogler'),
(3, 'Bird Man', 'birdman.jpg', 'A washed-up actor, who once played an iconic superhero, attempts to revive his career by writing and starring in his very own Broadway play.', ' Michael Keaton, Zach Galifianakis, Edward Norton', '7.7', 2014, 'Alejandro G. Inarritu'),
(4, 'Rough Night', 'roughnight.jpg', 'Things go terribly wrong for a group of girlfriends who hire a male stripper for a bachelorette party in Miami.', 'Scarlett Johansson, Kate McKinnon, Zoe Kravitz ', '5.2', 2017, 'Lucia Aniello'),
(5, 'Veronica', 'veronica.jpg', 'Madrid, 1991. A teen girl finds herself besieged by an evil supernatural force after she played Ouija with two classmates.', 'Sandra Escacena, Bruna Gonzalez, Claudia Placer ', '6.3', 2017, 'Paco Plaza'),
(6, 'Baby Driver', 'babydriver.jpg', 'After being coerced into working for a crime boss, a young getaway driver finds himself taking part in a heist doomed to fail.', 'Ansel Elgort, Jon Bernthal, Jon Hamm', '7.7', 2017, 'Edgar Wright'),
(7, 'Atomic Blonde', 'atomicblonde.jpg', 'An undercover MI6 agent is sent to Berlin during the Cold War to investigate the murder of a fellow agent and recover a missing list of double agents.', 'Charlize Theron, James McAvoy, John Goodman ', '6.7', 2017, 'Director: David Leitch'),
(8, 'Wonder Woman', 'wonderwoman.jpg', 'When a pilot crashes and tells of conflict in the outside world, Diana, an Amazonian warrior in training, leaves home to fight a war, discovering her full powers and true destiny.\r\n', 'Gal Gadot, Chris Pine, Robin Wright', '7.5', 2017, 'Patty Jenkins'),
(9, 'Game Night', 'gamenight.jpg', 'A group of friends who meet regularly for game nights find themselves entangled in a real-life mystery.\r\n', 'Jason Bateman, Rachel McAdams, Kyle Chandler ', '7.4', 2018, 'John Francis Daley, Jonathan Goldstein'),
(10, 'Gringo', 'gringo.jpg', 'GRINGO, a dark comedy mixed with white-knuckle action and dramatic intrigue, explores the battle of survival for businessman Harold Soyinka (David Oyelowo) when he finds himself crossing the line from law-abiding citizen to wanted criminal.', 'Joel Edgerton, Charlize Theron, David Oyelowo', '6', 2018, 'Nash Edgerton'),
(11, 'Kingsman', 'kingsman.jpg', 'A spy organization recruits an unrefined, but promising street kid into the agency\'s ultra-competitive training program, just as a global threat emerges from a twisted tech genius.\r\n', 'Colin Firth, Taron Egerton, Samuel L. Jackson', '7.7', 2017, 'Matthew Vaughn'),
(12, 'La La Land', 'lalaland', 'While navigating their careers in Los Angeles, a pianist and an actress fall in love while attempting to reconcile their aspirations for the future.\r\n', 'Ryan Gosling, Emma Stone, Rosemarie DeWitt ', '8.1', 2015, 'Damien Chazelle'),
(13, 'Storks', 'storks.jpg', '', '', '0', 0, ''),
(14, 'Pride and Prejudice and Zombies', 'prideandprejudiceandzombies.jpg\r\n', '', '', '0', 0, ''),
(15, 'The Shining', 'theshining', '', '', '0', 0, ''),
(16, 'Lorax', 'lorax.jpg', '', '', '0', 0, ''),
(17, 'Annabelle', 'annabelle.jpg', '', '', '0', 0, ''),
(18, 'Rio', 'rio.jpg', '', '', '0', 0, ''),
(19, 'Jigsaw', 'jigsaw.jpg', '', '', '0', 0, ''),
(20, 'Now You See Me', 'nowyouseeme.jpg', '', '', '0', 0, ''),
(21, 'Mystic River', 'mysticriver.jpg', '', '', '0', 0, ''),
(22, 'Taken', 'taken.jpg', '', '', '0', 0, ''),
(23, 'Hannibal', 'hannibal.jpg', '', '', '0', 0, ''),
(24, 'Zodiac', 'zodiac.jpg', '', '', '0', 0, ''),
(25, 'Now You See Me 2', 'nowyouseeme2.jpg', '', '', '0', 0, ''),
(28, 'The Sixth Sense', 'sixthsense.jpg', 'okay', 'Bruce Willis, Haley Joel Osment, Toni Collette', '8.6', 1999, 'M. Night Shyamalan'),
(29, 'The sixth sense', 'sixthsense.jpg', 'abc', 'abc', 'abc', 0, 'abc');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_movies_genre`
--

DROP TABLE IF EXISTS `tbl_movies_genre`;
CREATE TABLE IF NOT EXISTS `tbl_movies_genre` (
  `movies_genre_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `movies_id` int(11) NOT NULL,
  `genre_id` int(11) NOT NULL,
  PRIMARY KEY (`movies_genre_id`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_movies_genre`
--

INSERT INTO `tbl_movies_genre` (`movies_genre_id`, `movies_id`, `genre_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 2, 4),
(5, 2, 5),
(6, 2, 1),
(7, 3, 6),
(8, 3, 7),
(9, 4, 6),
(10, 5, 7),
(11, 5, 8),
(12, 6, 4),
(13, 6, 9),
(14, 7, 4),
(15, 7, 10),
(16, 7, 11),
(17, 8, 1),
(18, 8, 4),
(19, 9, 6),
(20, 9, 9),
(21, 9, 10),
(22, 10, 4),
(23, 10, 6),
(24, 10, 9),
(25, 11, 4),
(26, 11, 1),
(27, 11, 6),
(28, 12, 6),
(29, 12, 7);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

DROP TABLE IF EXISTS `tbl_user`;
CREATE TABLE IF NOT EXISTS `tbl_user` (
  `user_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_fname` varchar(250) NOT NULL,
  `user_name` varchar(250) NOT NULL,
  `user_email` varchar(250) NOT NULL,
  `user_pass` varchar(250) NOT NULL,
  `user_date` varchar(50) DEFAULT NULL,
  `user_level` int(11) NOT NULL,
  `user_ip` varchar(50) NOT NULL DEFAULT 'no',
  `user_attempts` int(10) NOT NULL,
  `user_edit` varchar(50) DEFAULT NULL,
  `user_created` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_fname`, `user_name`, `user_email`, `user_pass`, `user_date`, `user_level`, `user_ip`, `user_attempts`, `user_edit`, `user_created`) VALUES
(21, 'soumya', 'soumya', 'soumya.bhat91@gmail.com', 'cp7NDxQw::d9e9f1ee1113bb410742c7aab3d7774d', '2018-04-08 20:53:44', 2, '::1', 0, '2018-02-24 23:09:22', '2018-02-24 23:08:31'),
(22, 'soumyabhat', 'soumyabhat', 'soumya.bhat91@gmail.com', 'T4W2UJZ7::ba6533185cb72931fa1d70c63d954a24', NULL, 2, 'no', 0, '2018-02-24 23:16:39', '2018-02-24 23:15:31');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
