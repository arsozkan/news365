-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2016 at 06:35 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_news365`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(5) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(25) CHARACTER SET utf8 NOT NULL,
  `user_email` varchar(45) CHARACTER SET utf8 NOT NULL,
  `user_pass` varchar(255) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_email` (`user_email`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_pass`) VALUES
(1, 'admin', 'admin@admin.com', '81dc9bdb52d04dc20036dbd8313ed055');


-- --------------------------------------------------------

--
-- Table structure for table `categories`
--


CREATE TABLE IF NOT EXISTS `categories` (
  `category_id` int(5) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(45) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`) VALUES
(1, 'Politics'),
(2, 'Economy'),
(3, 'Cinema'),
(4, 'Sport');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--


CREATE TABLE IF NOT EXISTS `news` (
  `news_id` int(5) NOT NULL AUTO_INCREMENT,
  `news_title` varchar(80) CHARACTER SET utf8 NOT NULL,
  `news_img_url` varchar(200) CHARACTER SET utf8 NOT NULL,
  `news_category` int(5) NOT NULL,
  `news_description` text CHARACTER SET utf8 NOT NULL,
  `news_date` date NOT NULL,
  PRIMARY KEY (`news_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`news_id`, `news_title`, `news_img_url`, `news_category`, `news_description`, `news_date`) VALUES
(1, 'News Title About Politics', 'http://www.sekizkenar.com/news365/images/news1.png', 1, 'The FBI and the US National Highway Traffic Safety Administration have added their voices to growing concerns about the risk of cars being hacked.In an advisory note it warns the public to be aware of "cybersecurity threats" related to connected vehicles.Last year Fiat Chrysler recalled 1.4 million US vehicles after security researchers remotely controlled a Jeep.People who suspect their car has been hacked were told to get in contact with the FBI.The public service announcement laid out the issues and dangers of car hacking.', '2016-03-18'),
(2, 'News Title About Economy', 'http://www.sekizkenar.com/news365/images/news1.png', 2, 'The FBI also warned that criminals may latch on to online vehicle software updates by sending out fake messages that trick users into " opening attachments containing malicious software". Both General Motors and BMW have recently issued security updates to mitigate the risk of remote attacks that would have allowed hackers to open doors and, in the case of GM, start the engine. Fiat Chrysler was forced to recall millions of vehicles after Wired magazine demonstrated how hackers could remotely take control of car functions, including steering and brakes.', '2016-03-19'),
(3, 'News Title About Cinema', 'http://www.sekizkenar.com/news365/images/news1.png', 3, 'Finally, after all the hype and excitement, consumers are about to get their hands on virtual reality headsets - and we will find out whether there really is a market for this technology. Oculus Rift and the HTC Vive are both released in the next few weeks, and at the Games Developer Conference in San Francisco Sony unveiled its launch date and price. While Playstation owners will have to wait until October to get their hands on the Sony VR headset, they will pay far less for it than for a Vive or Oculus setup. With nearly 40 million PS4 owners around the world, theres a ready-made market for Sonys offering', '2016-03-20'),
(4, 'News Title About Sport', 'http://www.sekizkenar.com/news365/images/news1.png', 4, 'Back to gaming and we look at the boom in a phenomenon which is familiar to anyone under 25 but a mystery to the older generation - watching video games online. The big player in the live streaming of video games is Twitch, which was bought by Amazon 18 months ago. But we hear from a rival, Ian Sharpe, who says his Azubu streaming service has a different approach. While Twitch lets anyone become a broadcaster, playing anything from Call of Duty to Minecraft, Azubu is more focused on professional eSports.', '2016-03-21'),
(5, 'News Title About Other', 'http://www.sekizkenar.com/news365/images/news1.png', 1, 'Theres little sign that this quiet backwater once gave its name to the company that revolutionised the mobile phone industry in the late 1990s and helped turn Finlands economy into one of the most prosperous in the world. At its peak in the early 2000s Nokia supplied 40% of the worlds mobile phones, creating Finlands first globally recognised consumer brand.', '2016-03-22'),
(6, 'News Title About ', 'http://www.sekizkenar.com/news365/images/news1.png', 2, 'Nokia played catch-up in the smartphone market until 2014, when its mobile phone business was sold to Microsoft and the Nokia name was removed from its devices altogether. But despite its effective demise, many Finns say there is a positive legacy to appreciate.', '2016-03-22');
