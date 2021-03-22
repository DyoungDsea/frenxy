-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2021 at 03:47 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `frenzy`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `dname` varchar(200) NOT NULL,
  `userid` varchar(35) NOT NULL,
  `demail` varchar(30) NOT NULL,
  `dpass` varchar(60) NOT NULL,
  `dposition` varchar(30) NOT NULL DEFAULT 'subadmin',
  `dprivileges` varchar(100) CHARACTER SET latin1 NOT NULL,
  `dstatus` varchar(20) NOT NULL DEFAULT 'active',
  `lastlogin` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `dname`, `userid`, `demail`, `dpass`, `dposition`, `dprivileges`, `dstatus`, `lastlogin`) VALUES
(1, 'Admin', '2147400083647', 'admin@admin.com', '21232f297a57a5a743894a0e4a801fc3', 'administrator', '', 'active', '2020-02-27 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `dbanner`
--

CREATE TABLE `dbanner` (
  `id` int(11) NOT NULL,
  `bid` varchar(25) DEFAULT NULL,
  `dpost` varchar(50) DEFAULT NULL,
  `dimg` varchar(25) DEFAULT NULL,
  `durl` varchar(150) DEFAULT NULL,
  `ddate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dbanner`
--

INSERT INTO `dbanner` (`id`, `bid`, `dpost`, `dimg`, `durl`, `ddate`) VALUES
(1, '21030402455059337', 'Home', '210304042331-1', '#', '2021-03-04 13:45:50'),
(2, '21030402521476795', 'Home', '210305104554-1', '#', '2021-03-04 13:52:14'),
(3, '21030510350451753', 'other', '210305103646-1', '#', '2021-03-05 09:35:04');

-- --------------------------------------------------------

--
-- Table structure for table `dcategory`
--

CREATE TABLE `dcategory` (
  `id` int(11) NOT NULL,
  `cid` varchar(25) DEFAULT NULL,
  `dcategory` varchar(100) DEFAULT NULL,
  `rorder` varchar(5) NOT NULL DEFAULT 'g',
  `ddate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dcategory`
--

INSERT INTO `dcategory` (`id`, `cid`, `dcategory`, `rorder`, `ddate`) VALUES
(1, '210305095304458608', 'News', 'a', '2021-03-05 08:53:04'),
(2, '210305095321342837', 'Lifestyle', 'd', '2021-03-05 08:53:21'),
(3, '210305095331828683', 'Money', 'c', '2021-03-05 08:53:31'),
(4, '210305095403916076', 'Features', 'b', '2021-03-05 08:54:03'),
(6, '210312015124500893', 'Culture', 'e', '2021-03-12 12:51:24'),
(7, '210312015138310671', 'Extras', 'f', '2021-03-12 12:51:38');

-- --------------------------------------------------------

--
-- Table structure for table `dgallery`
--

CREATE TABLE `dgallery` (
  `id` int(11) NOT NULL,
  `gid` varchar(25) DEFAULT NULL,
  `dimg` varchar(25) DEFAULT NULL,
  `ddate` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dgallery`
--

INSERT INTO `dgallery` (`id`, `gid`, `dimg`, `ddate`) VALUES
(1, '21031911222927371', '210319112840-1', '2021-03-19 11:24:14'),
(2, '21031911241444168', '210319112414-1', '2021-03-19 11:24:14'),
(3, '21031912032769964', '210319120327-1', '2021-03-19 12:03:27');

-- --------------------------------------------------------

--
-- Table structure for table `dpost`
--

CREATE TABLE `dpost` (
  `id` int(11) NOT NULL,
  `pid` varchar(25) DEFAULT NULL,
  `dtitle` text DEFAULT NULL,
  `dname` varchar(100) DEFAULT NULL,
  `dcategory_id` varchar(25) DEFAULT NULL,
  `dcategory` varchar(255) DEFAULT NULL,
  `dsub_cat` varchar(100) DEFAULT NULL,
  `ddesc` text DEFAULT NULL,
  `dtype` varchar(50) DEFAULT NULL,
  `dimg` varchar(25) DEFAULT NULL,
  `vurl` varchar(255) DEFAULT NULL,
  `post_by` varchar(50) DEFAULT NULL,
  `dstatus` varchar(10) NOT NULL DEFAULT 'inactive',
  `ddate` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dpost`
--

INSERT INTO `dpost` (`id`, `pid`, `dtitle`, `dname`, `dcategory_id`, `dcategory`, `dsub_cat`, `ddesc`, `dtype`, `dimg`, `vurl`, `post_by`, `dstatus`, `ddate`) VALUES
(1, '21030501380858382', 'Helpful Tips for Working from Home as a Freelancer', 'Prof Demeji Bankole', '210305095304458608', 'Education', 'News', '<p>Gosh jaguar ostrich quail one excited dear hello and bound and the and bland moral misheard roadrunner flapped lynx far that and jeepers giggled far and far bald that roadrunner python inside held shrewdly the manatee.</p>\r\n\r\n<p>Fretful human far recklessly while caterpillar well a well blubbered added one a some far whispered rampantly whispered while irksome far clung irrespective wailed more rosily and where saluted while black dear so yikes as considering recast to some crass until.</p>\r\n\r\n<hr />\r\n<p>Thanks sniffed in hello after in foolhardy and some far purposefully much one at the much conjointly leapt skimpily that quail sheep some goodness&nbsp;<a href=\"http://127.0.0.1/frenzy/single-4.html#\">nightingale</a>&nbsp;the instead exited expedient up far ouch mellifluous altruistic and and lighted more instead much when ferret but the.</p>\r\n', 'feature', '210305052246-1', '', 'Admin', 'active', '2021-03-05'),
(2, '21030502041650655', 'Working from Home as a Freelancer', 'Prof Aanu James', '210312015124500893', 'Culture', 'Arts', '<p>Gosh jaguar ostrich quail one excited dear hello and bound and the and bland moral misheard roadrunner flapped lynx far that and jeepers giggled far and far bald that roadrunner python inside held shrewdly the manatee.</p>\r\n\r\n<p>Fretful human far recklessly while caterpillar well a well blubbered added one a some far whispered rampantly whispered while irksome far clung irrespective wailed more rosily and where saluted while black dear so yikes as considering recast to some crass until.</p>\r\n\r\n<hr />\r\n<p>Thanks sniffed in hello after in foolhardy and some far purposefully much one at the much conjointly leapt skimpily that quail sheep some goodness&nbsp;<a href=\"http://127.0.0.1/frenzy/single-4.html#\">nightingale</a>&nbsp;the instead exited expedient up far ouch mellifluous altruistic and and lighted more instead much when ferret but the.</p>\r\n', 'feature', '210312043219-1', '', 'Admin', 'active', '2021-03-05'),
(4, '21030503032948486', 'Quiz Instructions', 'Prof Demeji Bankole', '210312015138310671', 'Extras', 'Deals', '<p>Gosh jaguar ostrich quail one excited dear hello and bound and the and bland moral misheard roadrunner flapped lynx far that and jeepers giggled far and far bald that roadrunner python inside held shrewdly the manatee.</p>\r\n\r\n<p>Fretful human far recklessly while caterpillar well a well blubbered added one a some far whispered rampantly whispered while irksome far clung irrespective wailed more rosily and where saluted while black dear so yikes as considering recast to some crass until.</p>\r\n\r\n<hr />\r\n<p>Thanks sniffed in hello after in foolhardy and some far purposefully much one at the much conjointly leapt skimpily that quail sheep some goodness&nbsp;<a href=\"http://127.0.0.1/frenzy/single-4.html#\">nightingale</a>&nbsp;the instead exited expedient up far ouch mellifluous altruistic and and lighted more instead much when ferret but the.</p>\r\n', 'latest', '210312043159-1', '', 'Admin', 'active', '2021-03-05'),
(5, '21030503123236814', 'Nigeria President PMB resign from the office', 'Prof Aanu James', '210312015138310671', 'News', 'Politics', '<p>Gosh jaguar ostrich quail one excited dear hello and bound and the and bland moral misheard roadrunner flapped lynx far that and jeepers giggled far and far bald that roadrunner python inside held shrewdly the manatee.</p>\r\n\r\n<p>Fretful human far recklessly while caterpillar well a well blubbered added one a some far whispered rampantly whispered while irksome far clung irrespective wailed more rosily and where saluted while black dear so yikes as considering recast to some crass until.</p>\r\n\r\n<hr />\r\n<p>Thanks sniffed in hello after in foolhardy and some far purposefully much one at the much conjointly leapt skimpily that quail sheep some goodness&nbsp;<a href=\"http://127.0.0.1/frenzy/single-4.html#\">nightingale</a>&nbsp;the instead exited expedient up far ouch mellifluous altruistic and and lighted more instead much when ferret but the.</p>\r\n', 'latest', '210312043142-1', '', 'Admin', 'active', '2021-03-05'),
(6, '21030505143576846', 'The first and the last of PHP programming language', 'Dr Brown King', '210305095403916076', 'Programming', 'PHP', '<p>Gosh jaguar ostrich quail one excited dear hello and bound and the and bland moral misheard roadrunner flapped lynx far that and jeepers giggled far and far bald that roadrunner python inside held shrewdly the manatee.</p>\r\n\r\n<p>Fretful human far recklessly while caterpillar well a well blubbered added one a some far whispered rampantly whispered while irksome far clung irrespective wailed more rosily and where saluted while black dear so yikes as considering recast to some crass until.</p>\r\n\r\n<hr />\r\n<p>Thanks sniffed in hello after in foolhardy and some far purposefully much one at the much conjointly leapt skimpily that quail sheep some goodness&nbsp;<a href=\"http://127.0.0.1/frenzy/single-4.html#\">nightingale</a>&nbsp;the instead exited expedient up far ouch mellifluous altruistic and and lighted more instead much when ferret but the.</p>\r\n', 'feature', '210305051435-1', 'http://www.youtube.com', 'Admin', 'active', '2021-03-05'),
(7, '21031603173756663', 'This World Book Day, let’s keep pushing for progress on diversity within the publishing industry', 'Rabina Khan', '210305095321342837', 'Lifestyle', 'Beauty', '<p>Today, as we celebrate World Book Day, it has made me reflect on the difference between children&#39;s&nbsp;books when I was young and the books that are widely-available today.</p>\r\n\r\n<p>In the late 1970s, books by Black and Asian author were not provided to me at school, so I was unaware they existed. I never saw Black, Asian, or minority ethnic characters in books either.</p>\r\n\r\n<p>The nearest I came to seeing a character with whom I could identify with was when our class read about Pocahontas. It had a profound effect on my life, not least because I was the only child of colour in our class at the time.&nbsp;</p>\r\n', 'latest', '210316031737-1', '', 'Admin', 'active', '2021-03-16'),
(8, '21031603400371329', 'City watchdog launches criminal proceedings against NatWest over money laundering breaches', 'Ben Chapman', '210305095331828683', 'Money', 'Business', '<p>FCA announces first ever proceedings against a bank under 2007 laws designed to stem flow of criminals&rsquo; cash through financial system</p>\r\n\r\n<p>The City watchdog has launched criminal proceedings against NatWest over alleged failures to guard against money laundering.</p>\r\n\r\n<p>NatWest, formerly known as Royal Bank of Scotland, did not carry out proper checks on a money services business that deposited &pound;365m in its account, including &pound;264m in cash, the Financial Conduct Authority alleges.</p>\r\n\r\n<p>The regulator alleges that &quot;increasingly large cash deposits&quot; were made into the account and NatWest did not have systems and controls in place to properly scrutinise this.</p>\r\n\r\n<p>Large numbers of cash transactions are a red flag for potential laundering of money linked to crime. The suspicious activity happened between 2011 and 2016.</p>\r\n\r\n<p>NatWest is due to appear at Westminster Magistrates&#39; Court on 14 April. No individuals are being charged as part of the proceedings.</p>\r\n', 'latest', '210316034003-1', '', 'Admin', 'active', '2021-03-16');

-- --------------------------------------------------------

--
-- Table structure for table `dpost_views`
--

CREATE TABLE `dpost_views` (
  `id` int(11) NOT NULL,
  `pid` varchar(25) DEFAULT NULL,
  `dnum` varchar(11) DEFAULT NULL,
  `ddate` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dpost_views`
--

INSERT INTO `dpost_views` (`id`, `pid`, `dnum`, `ddate`) VALUES
(2, '21030503032948486', '4', '2021-03-16 02:04:22'),
(3, '21030501380858382', '9', '2021-03-19 02:11:29'),
(4, '21030503123236814', '4', '2021-03-22 12:06:20'),
(5, '21030502041650655', '1', '2021-03-12 02:52:09'),
(6, '21031603400371329', '6', '2021-03-19 01:37:15'),
(7, '21031603173756663', '23', '2021-03-19 02:27:43');

-- --------------------------------------------------------

--
-- Table structure for table `dsub_cat`
--

CREATE TABLE `dsub_cat` (
  `id` int(11) NOT NULL,
  `sid` varchar(25) DEFAULT NULL,
  `dcategory_id` varchar(25) DEFAULT NULL,
  `dcategory` varchar(100) DEFAULT NULL,
  `dsub_cat` varchar(100) DEFAULT NULL,
  `ddate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dsub_cat`
--

INSERT INTO `dsub_cat` (`id`, `sid`, `dcategory_id`, `dcategory`, `dsub_cat`, `ddate`) VALUES
(1, '210305101610432991', '210305095304458608', 'News', 'Economy', '2021-03-05 09:16:10'),
(2, '210305101719887354', '210305095304458608', 'News', 'Policy', '2021-03-05 09:17:19'),
(3, '210305101737326084', '210305095403916076', 'Features', 'Voices', '2021-03-05 09:17:37'),
(4, '210312015307220165', '210305095304458608', 'News', 'Governance', '2021-03-12 12:53:07'),
(5, '210312015326742051', '210305095304458608', 'News', 'Markets', '2021-03-12 12:53:26'),
(6, '210312015349880754', '210305095304458608', 'News', 'Politics', '2021-03-12 12:53:49'),
(7, '21031201541481619', '210305095403916076', 'Features', 'Interviews', '2021-03-12 12:54:14'),
(8, '210312015450606758', '210305095403916076', 'Features', 'Streetvibres', '2021-03-12 12:54:50'),
(9, '210312015509566337', '210305095403916076', 'Features', 'Inspiration', '2021-03-12 12:55:09'),
(10, '210312015521921451', '210305095403916076', 'Features', 'People', '2021-03-12 12:55:21'),
(11, '210312015631415481', '210305095331828683', 'Money', 'Fintech', '2021-03-12 12:56:31'),
(12, '210312015839514831', '210305095331828683', 'Money', 'Work', '2021-03-12 12:58:39'),
(13, '210312015856198092', '210305095331828683', 'Money', 'Business', '2021-03-12 12:58:56'),
(14, '210312015922501231', '210305095331828683', 'Money', 'Sidehustle', '2021-03-12 12:59:22'),
(15, '210312020104335268', '210305095331828683', 'Money', 'Budget', '2021-03-12 13:01:04'),
(16, '21031202011352882', '210305095331828683', 'Money', 'Save', '2021-03-12 13:01:13'),
(17, '210312020127197027', '210305095331828683', 'Money', 'Invest', '2021-03-12 13:01:27'),
(18, '210312020145451358', '210305095331828683', 'Money', 'Opportunities', '2021-03-12 13:01:45'),
(19, '210312020315687121', '210305095321342837', 'Lifestyle', 'Trends', '2021-03-12 13:03:15'),
(20, '210312020340576792', '210305095321342837', 'Lifestyle', 'Fashion', '2021-03-12 13:03:40'),
(21, '210312020353457845', '210305095321342837', 'Lifestyle', 'Beauty', '2021-03-12 13:03:53'),
(22, '210312020407839769', '210305095321342837', 'Lifestyle', 'Style', '2021-03-12 13:04:07'),
(23, '210312020434739586', '210305095321342837', 'Lifestyle', 'Wellness', '2021-03-12 13:04:34'),
(24, '210312020455242495', '210305095321342837', 'Lifestyle', 'Food &amp; Drink', '2021-03-12 13:04:55'),
(25, '210312020511461664', '210305095321342837', 'Lifestyle', 'Home &amp; Decor', '2021-03-12 13:05:11'),
(26, '210312020527116163', '210305095321342837', 'Lifestyle', 'Travel', '2021-03-12 13:05:27'),
(27, '210312020538522995', '210305095321342837', 'Lifestyle', 'Tech', '2021-03-12 13:05:38'),
(28, '210312021210981204', '210312015124500893', 'Culture', 'Celebrity', '2021-03-12 13:12:10'),
(29, '21031202122221900', '210312015124500893', 'Culture', 'Arts', '2021-03-12 13:12:22'),
(30, '210312021234105757', '210312015124500893', 'Culture', 'Books', '2021-03-12 13:12:34'),
(31, '21031202125314214', '210312015124500893', 'Culture', 'Movies &amp; TV', '2021-03-12 13:12:53'),
(32, '210312021306417887', '210312015124500893', 'Culture', 'Music', '2021-03-12 13:13:06'),
(33, '210312021317260830', '210312015124500893', 'Culture', 'Events', '2021-03-12 13:13:17'),
(34, '210312021405928836', '210312015138310671', 'Extras', 'Pictures', '2021-03-12 13:14:05'),
(35, '210312021418190820', '210312015138310671', 'Extras', 'Videos', '2021-03-12 13:14:18'),
(36, '210312021435311793', '210312015138310671', 'Extras', 'Podcast', '2021-03-12 13:14:35'),
(37, '210312021653948137', '210312015138310671', 'Extras', 'Promotions', '2021-03-12 13:16:53'),
(38, '210312021709603990', '210312015138310671', 'Extras', 'Deals', '2021-03-12 13:17:09'),
(39, '210312021725383585', '210312015138310671', 'Extras', 'Campaign', '2021-03-12 13:17:25'),
(40, '210312021738252527', '210312015138310671', 'Extras', 'Newsletter', '2021-03-12 13:17:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `demail` (`demail`);

--
-- Indexes for table `dbanner`
--
ALTER TABLE `dbanner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dcategory`
--
ALTER TABLE `dcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dgallery`
--
ALTER TABLE `dgallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dpost`
--
ALTER TABLE `dpost`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dpost_views`
--
ALTER TABLE `dpost_views`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dsub_cat`
--
ALTER TABLE `dsub_cat`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `dbanner`
--
ALTER TABLE `dbanner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `dcategory`
--
ALTER TABLE `dcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `dgallery`
--
ALTER TABLE `dgallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `dpost`
--
ALTER TABLE `dpost`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `dpost_views`
--
ALTER TABLE `dpost_views`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `dsub_cat`
--
ALTER TABLE `dsub_cat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
