-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 29, 2021 at 09:01 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `service_based`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `abo_id` int(11) UNSIGNED NOT NULL,
  `abo_name` text NOT NULL,
  `abo_text` text NOT NULL,
  `abo_img` text DEFAULT NULL,
  `abo_status` int(1) NOT NULL DEFAULT 1,
  `abo_create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `abo_update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `abo_delete_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`abo_id`, `abo_name`, `abo_text`, `abo_img`, `abo_status`, `abo_create_at`, `abo_update_at`, `abo_delete_at`) VALUES
(1, 'Professional Service', 'Eum purto epicurei cotidieque at, ius luptatum invidunt no, vim at sint pertinacia repudiandae. Ad cum dicant laboramus delicatissimi, ex has nonumes explicari prodesset, brute tincidunt conclusionemque no has. Sit ullum latine ei. Ius id adhuc iriure torquatos.', NULL, 1, '2021-08-27 12:10:57', '2021-08-27 12:16:08', NULL),
(2, 'Affordable Prices', 'Ad cum dicant laboramus delicatissimi, ex has nonumes explicari prodesset, brute tincidunt conclusionemque no has. Sit ullum latine ei. Ius id adhuc iriure torquatos. Justo prompta senserit eos cu, omnesque posidonium liberavisse pri in.', 'affordable_prices_1630067116655742143.png', 1, '2021-08-27 12:16:57', '2021-08-27 12:25:16', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `member_id` int(10) UNSIGNED NOT NULL,
  `member_type` int(2) NOT NULL COMMENT '1-admin/2-employee',
  `member_name` varchar(255) NOT NULL,
  `member_phone` varchar(50) NOT NULL,
  `member_email` varchar(255) DEFAULT NULL,
  `member_username` varchar(255) NOT NULL,
  `member_password` varchar(255) NOT NULL,
  `member_avtar` varchar(255) DEFAULT NULL,
  `member_gender` varchar(255) DEFAULT NULL,
  `member_join_date` date DEFAULT NULL,
  `member_status` int(2) NOT NULL DEFAULT 1 COMMENT '0-deactive/1-active/2-delete',
  `member_create_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `member_update_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `member_delete_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`member_id`, `member_type`, `member_name`, `member_phone`, `member_email`, `member_username`, `member_password`, `member_avtar`, `member_gender`, `member_join_date`, `member_status`, `member_create_at`, `member_update_at`, `member_delete_at`) VALUES
(1, 1, 'Dexter Groups', '9073309932', 'dexter@admin', 'admin', '123456', NULL, 'Male', '2021-07-01', 1, '2021-08-26 16:29:29', '2019-04-10 09:47:30', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `com_gallery`
--

CREATE TABLE `com_gallery` (
  `cg_id` int(11) UNSIGNED NOT NULL,
  `cg_com_id_ref` int(11) UNSIGNED NOT NULL,
  `cg_img_lg` text NOT NULL,
  `cg_img_md` text DEFAULT NULL,
  `cg_img_name` text DEFAULT NULL,
  `cg_img_alt` text DEFAULT NULL,
  `cg_img_order` int(11) DEFAULT NULL,
  `cg_img_status` int(1) NOT NULL DEFAULT 1,
  `cg_create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `cg_update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `cg_delete_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `com_gallery`
--

INSERT INTO `com_gallery` (`cg_id`, `cg_com_id_ref`, `cg_img_lg`, `cg_img_md`, `cg_img_name`, `cg_img_alt`, `cg_img_order`, `cg_img_status`, `cg_create_at`, `cg_update_at`, `cg_delete_at`) VALUES
(1, 1, '1_16297431774331649_lg.jpg', '1_16297431777719419_md.jpg', NULL, NULL, NULL, 1, '2021-08-16 10:21:05', '2021-08-23 18:31:53', NULL),
(2, 1, '1_16297431629094377_lg.jpg', '1_16297431628837605_md.jpg', NULL, NULL, NULL, 1, '2021-08-23 18:20:45', '2021-08-23 18:31:57', NULL),
(3, 1, '1_16297431549062475_lg.jpg', '1_162974315472449_md.jpg', NULL, NULL, NULL, 1, '2021-08-23 18:24:00', '2021-08-23 18:32:01', NULL),
(4, 1, '1_16297431915787304_lg.jpg', '1_16297431919742088_md.jpg', NULL, NULL, NULL, 1, '2021-08-23 18:26:31', '2021-08-23 18:32:10', NULL),
(5, 1, '1_16297432022690770_lg.jpg', '1_16297432027614981_md.jpg', NULL, NULL, NULL, 1, '2021-08-23 18:26:42', '2021-08-23 18:32:05', NULL),
(6, 1, '1_16297432109349505_lg.jpg', '1_16297432109943704_md.jpg', NULL, NULL, NULL, 1, '2021-08-23 18:26:50', '2021-08-23 18:32:14', NULL),
(7, 1, '1_16297432198133814_lg.jpg', '1_1629743219549317_md.jpg', '1', NULL, NULL, 2, '2021-08-23 18:26:59', '2021-08-23 18:29:38', '0000-00-00 00:00:00'),
(8, 1, '1_16297432268191160_lg.jpg', '1_16297432267165311_md.jpg', NULL, NULL, NULL, 1, '2021-08-23 18:27:07', '2021-08-23 18:32:17', NULL),
(9, 1, '1_16297432511386205_lg.jpg', '1_16297432517560787_md.jpg', NULL, NULL, NULL, 1, '2021-08-23 18:27:31', '2021-08-23 18:32:20', NULL),
(10, 1, '1_1629743260505211_lg.jpg', '1_16297432606849993_md.jpg', NULL, NULL, NULL, 1, '2021-08-23 18:27:40', '2021-08-23 18:32:23', NULL),
(11, 1, '1_1629743268471618_lg.jpg', '1_16297432688127869_md.jpg', NULL, NULL, NULL, 1, '2021-08-23 18:27:48', '2021-08-23 18:32:26', NULL),
(12, 1, '1_16297432768353966_lg.jpg', '1_1629743276678288_md.jpg', NULL, NULL, NULL, 1, '2021-08-23 18:27:56', '2021-08-23 18:32:31', NULL),
(13, 1, '1_16297432997260201_lg.jpg', '1_16297432995859169_md.jpg', NULL, NULL, NULL, 1, '2021-08-23 18:28:19', '2021-08-23 18:32:35', NULL),
(14, 1, '1_16297433076869383_lg.jpg', '1_16297433072013990_md.jpg', NULL, NULL, NULL, 1, '2021-08-23 18:28:27', '2021-08-23 18:32:38', NULL),
(15, 1, '1_16297433152135156_lg.jpg', '1_16297433154001202_md.jpg', NULL, NULL, NULL, 1, '2021-08-23 18:28:35', '2021-08-23 18:32:40', NULL),
(16, 1, '1_1629743347291825_lg.jpg', '1_16297433477177788_md.jpg', NULL, NULL, NULL, 1, '2021-08-23 18:29:07', '2021-08-23 18:32:43', NULL),
(17, 1, '_16299083909238486_lg.jpg', '_16299083903614151_md.jpg', NULL, NULL, NULL, 2, '2021-08-25 16:19:50', '2021-08-25 16:26:05', '0000-00-00 00:00:00'),
(18, 1, '_16299084168664744_lg.jpg', '_16299084163253731_md.jpg', NULL, NULL, NULL, 2, '2021-08-25 16:20:16', '2021-08-25 16:26:07', '0000-00-00 00:00:00'),
(19, 1, '_16299084338678788_lg.jpg', '_16299084341041692_md.jpg', NULL, '122', NULL, 2, '2021-08-25 16:20:34', '2021-08-25 16:22:52', '0000-00-00 00:00:00'),
(20, 1, '122_16299085606996592_lg.jpg', '122_16299085606817761_md.jpg', NULL, '122', NULL, 2, '2021-08-25 16:22:40', '2021-08-25 16:24:46', '0000-00-00 00:00:00'),
(21, 1, 'dgsdgsdg_16299090749533510_lg.jpg', 'dgsdgsdg_16299090747723640_md.jpg', NULL, 'dgsdgsdg', NULL, 2, '2021-08-25 16:30:03', '2021-08-25 16:31:29', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `com_service`
--

CREATE TABLE `com_service` (
  `com_id` int(11) UNSIGNED NOT NULL,
  `com_name` varchar(255) NOT NULL,
  `com_slug` varchar(255) NOT NULL,
  `com_img` text DEFAULT NULL,
  `com_banner` text DEFAULT NULL,
  `com_small_desc` text DEFAULT NULL,
  `com_full_desc` text DEFAULT NULL,
  `com_status` int(1) NOT NULL DEFAULT 1,
  `com_create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `com_update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `com_delete_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `com_service`
--

INSERT INTO `com_service` (`com_id`, `com_name`, `com_slug`, `com_img`, `com_banner`, `com_small_desc`, `com_full_desc`, `com_status`, `com_create_at`, `com_update_at`, `com_delete_at`) VALUES
(1, 'Fire Safety Training', 'cfire-safety-training', NULL, NULL, 'Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print.', NULL, 1, '2021-07-28 09:35:10', '2021-08-28 23:43:49', NULL),
(2, 'Audit', 'caudit', NULL, NULL, NULL, NULL, 1, '2021-07-28 09:35:16', '2021-08-20 16:27:44', NULL),
(3, 'Consultation', 'cconsultation', NULL, NULL, NULL, NULL, 1, '2021-07-28 09:35:26', '2021-08-20 16:27:51', NULL),
(4, 'Survey', 'csurvey', NULL, NULL, NULL, NULL, 1, '2021-07-28 09:35:29', '2021-08-20 16:27:54', NULL),
(5, 'NOC Consultation', 'cnoc-consultation', NULL, NULL, NULL, NULL, 1, '2021-07-28 09:35:38', '2021-08-20 16:27:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `pro_id` int(11) UNSIGNED NOT NULL,
  `pro_name` varchar(255) NOT NULL,
  `pro_slug` text NOT NULL,
  `pro_img` text DEFAULT NULL,
  `pro_banner` text DEFAULT NULL,
  `pro_small_desc` text DEFAULT NULL,
  `pro_full_desc` text DEFAULT NULL,
  `pro_status` int(1) NOT NULL DEFAULT 1,
  `pro_create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `pro_update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `pro_delete_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pro_id`, `pro_name`, `pro_slug`, `pro_img`, `pro_banner`, `pro_small_desc`, `pro_full_desc`, `pro_status`, `pro_create_at`, `pro_update_at`, `pro_delete_at`) VALUES
(1, 'Extinguishers and Refil', 'pextinguishers-and-refil', NULL, NULL, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 1, '2021-07-27 20:19:46', '2021-08-23 18:57:46', NULL),
(2, 'Industrial Safety', 'pindustrial-safety', NULL, NULL, NULL, NULL, 1, '2021-07-28 07:10:54', '2021-08-23 17:51:47', NULL),
(3, 'System Jobs', 'psystem-jobs', NULL, NULL, NULL, NULL, 1, '2021-07-28 07:11:16', '2021-08-26 07:20:50', NULL),
(4, 'System Accessories', 'psystem-accessories', NULL, NULL, NULL, NULL, 1, '2021-07-28 07:11:30', '2021-08-20 16:27:23', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_gallery`
--

CREATE TABLE `product_gallery` (
  `pg_id` int(11) UNSIGNED NOT NULL,
  `pg_pro_id_ref` int(11) UNSIGNED NOT NULL,
  `pg_img_lg` text NOT NULL,
  `pg_img_md` text DEFAULT NULL,
  `pg_img_name` text DEFAULT NULL,
  `pg_img_alt` text DEFAULT NULL,
  `pg_img_order` int(11) DEFAULT NULL,
  `pg_img_status` int(1) NOT NULL DEFAULT 1,
  `pg_create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `pg_update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `pg_delete_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_gallery`
--

INSERT INTO `product_gallery` (`pg_id`, `pg_pro_id_ref`, `pg_img_lg`, `pg_img_md`, `pg_img_name`, `pg_img_alt`, `pg_img_order`, `pg_img_status`, `pg_create_at`, `pg_update_at`, `pg_delete_at`) VALUES
(1, 1, 'extinguishers_201_16299095784245349_lg.jpeg', 'extinguishers_201_16299095788077146_md.jpeg', 'Extinguishers 201', NULL, NULL, 1, '2021-08-02 17:55:51', '2021-08-25 16:40:01', NULL),
(2, 1, 'demo_name_product_16299095971914510_lg.jpg', 'demo_name_product_16299095975143807_md.jpg', 'Demo name product', NULL, NULL, 1, '2021-08-02 17:58:55', '2021-08-25 16:40:09', NULL),
(3, 2, 'industrial_product_201_16280084613873668_lg.jpg', 'industrial_product_201_16280084622382563_md.jpg', 'Industrial Product 201', 'Industrial Product 201', NULL, 1, '2021-08-03 16:34:22', '2021-08-03 16:34:22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `proj_id` int(11) UNSIGNED NOT NULL,
  `proj_name` text NOT NULL,
  `proj_text` text DEFAULT NULL,
  `proj_img` text NOT NULL,
  `proj_status` int(1) NOT NULL DEFAULT 1,
  `proj_create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `proj_update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `proj_delete_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`proj_id`, `proj_name`, `proj_text`, `proj_img`, `proj_status`, `proj_create_at`, `proj_update_at`, `proj_delete_at`) VALUES
(1, 'New Project Name', 's nkfnkfskjd bjb jf sdjbf bsfbsbfsbfbsfdhf jbf jbfjbjfsdbf', 'new_project_name_1629101932740807926.jpg', 2, '2021-08-16 08:17:59', '2021-08-20 17:06:05', '2021-08-20 17:06:05'),
(2, 'New Project 2', 'lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum', 'new_project_2_1629478143191042329.jpg', 2, '2021-08-20 16:49:03', '2021-08-20 17:06:02', '2021-08-20 17:06:02'),
(3, 'SPPL Hotels Pvt. Ltd.', 'Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type', 'sppl_hotels_pvt_ltd_1629564079812077042.jpg', 1, '2021-08-20 17:13:43', '2021-08-21 16:49:12', NULL),
(4, 'Dream Gateway Hotels Pvt. Ltd.', 'Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type', 'dream_gateway_hotels_private_ltd_1629564894180874913.jpg', 1, '2021-08-20 17:14:23', '2021-08-21 16:55:37', NULL),
(5, 'GGL Hotel & Resort Co. Limited', 'Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type', 'ggl_hotel__resort_co_limited_1629564177403953703.jpeg', 1, '2021-08-20 17:24:21', '2021-08-21 16:49:07', NULL),
(6, 'Base Group & Hotel', 'Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type', 'base_group__hotel_162956420468494217.jpg', 1, '2021-08-20 17:44:24', '2021-08-21 16:49:02', NULL),
(7, 'Chocolate Hotel', 'Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type', 'chocolate_hotel_1629564223225282912.jpg', 1, '2021-08-21 16:43:43', '2021-08-21 16:48:56', NULL),
(8, 'Hotel Holiday Inn', 'Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type', 'hotel_holiday_inn_1629564761127318498.jpeg', 1, '2021-08-21 16:44:07', '2021-08-21 16:52:41', NULL),
(9, 'Holiday Inn Express', 'Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type', 'holiday_inn_express_1629564263520885934.jpg', 1, '2021-08-21 16:44:23', '2021-08-21 16:48:44', NULL),
(10, 'New Kenilworth Hotel Pvt. Ltd.', 'Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type', 'new_kenilworth_hotel_pvt_ltd_1629564277467583700.jpg', 1, '2021-08-21 16:44:37', '2021-08-21 16:48:39', NULL),
(11, 'Hotel Lindsay', 'Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type', 'hotel_lindsay_1629564290705019992.jpg', 1, '2021-08-21 16:44:51', '2021-08-21 16:48:30', NULL),
(12, 'Paulson Hotel & Resorts Pvt. Ltd.', 'Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type', 'paulson_hotel__resorts_pvt_ltd_1629564307586871915.jpg', 1, '2021-08-21 16:45:07', '2021-08-21 16:48:25', NULL),
(13, 'The Peerless Inn', 'Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type', 'the_peerless_inn_1629564322766229145.jpg', 1, '2021-08-21 16:45:22', '2021-08-21 16:48:19', NULL),
(14, 'Sea Hawk India Private Limited', 'Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type', 'sea_hawk_india_private_limited_1629564340515681810.jpg', 1, '2021-08-21 16:45:41', '2021-08-21 16:48:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `quick_contact`
--

CREATE TABLE `quick_contact` (
  `qid` int(11) NOT NULL,
  `qname` varchar(255) NOT NULL,
  `qemail` varchar(255) NOT NULL,
  `qmobile` varchar(50) DEFAULT NULL,
  `qsubject` text NOT NULL,
  `qmsg` varchar(1000) DEFAULT NULL,
  `qsource` varchar(255) NOT NULL,
  `qdate` timestamp NOT NULL DEFAULT current_timestamp(),
  `qip` varchar(15) NOT NULL,
  `qstatus` int(11) NOT NULL DEFAULT 1,
  `qdeleteat` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quick_contact`
--

INSERT INTO `quick_contact` (`qid`, `qname`, `qemail`, `qmobile`, `qsubject`, `qmsg`, `qsource`, `qdate`, `qip`, `qstatus`, `qdeleteat`) VALUES
(1, 'Demo Name', 'demomail@mail.com', '7894561230', 'dddgfdg', 'sdfsd', 'HW', '2019-07-24 07:59:33', '::1', 1, '2021-07-09 14:20:00'),
(2, 'Suprotive Sarkar', 'harro.sarkar.1998@gmail.com', '9064389417', 'dvd', 'dvxdvxfbxcvbcvbcvbcvn', '', '2021-08-03 16:56:11', '::1', 1, '2021-08-03 16:56:11'),
(3, 'Suprotive Sarkar', 'harro.sarkar.1998@gmail.com', '9064389417', 'sds', 'dgfbcvbcvnvb hd hdj d', '', '2021-08-03 16:57:46', '::1', 1, '2021-08-03 16:57:46'),
(4, 'Ritika Sur', 'xyz@gmail.com', '9876543210', 'kjcnscd', 'jbfjb d fbds bsdsb skjbf jdbs fs', '', '2021-08-26 13:09:17', '::1', 1, '2021-08-26 13:09:17');

-- --------------------------------------------------------

--
-- Table structure for table `quick_quote`
--

CREATE TABLE `quick_quote` (
  `quote_id` int(11) UNSIGNED NOT NULL,
  `quote_name` text NOT NULL,
  `quote_email` text DEFAULT NULL,
  `quote_phone` varchar(20) NOT NULL,
  `quote_company_name` text NOT NULL,
  `quote_company_address` text DEFAULT NULL,
  `quote_req` text DEFAULT NULL,
  `quote_doc` text DEFAULT NULL,
  `quote_ip` varchar(255) DEFAULT NULL,
  `quote_date` datetime DEFAULT NULL,
  `quote_status` int(1) NOT NULL DEFAULT 1,
  `quote_create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `quote_update_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `quote_delete_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quick_quote`
--

INSERT INTO `quick_quote` (`quote_id`, `quote_name`, `quote_email`, `quote_phone`, `quote_company_name`, `quote_company_address`, `quote_req`, `quote_doc`, `quote_ip`, `quote_date`, `quote_status`, `quote_create_at`, `quote_update_at`, `quote_delete_at`) VALUES
(1, 'Suprotive', 'sd@gmail.com', '987654310', 'dsdfddsg gsdg ds gs', 'afgdnhfgh dfhdfh dfh dfhdf nfgndh dh dfhfdfd hdfhfh dfh dfh dfhdfh dfhdfhfg. , dfgfdgfdg -123233', 'xvcxv,  fsadf sd ,d f,df sdf, ,s fd ,sf s,sd f,sf ,sdf,sd ,s f,sd f,s ', NULL, NULL, NULL, 2, '2021-07-27 17:45:05', '2021-07-27 17:45:05', '2021-08-03 17:55:07'),
(2, 'Suprotive Sarkar', 'harro.sarkar.1998@gmail.com', '9064389417', 'xdxfcghcfhch', 'SILIGURI', NULL, NULL, '::1', '2021-08-03 23:06:08', 1, '2021-08-03 17:36:08', '2021-08-03 17:36:08', NULL),
(3, 'Suprotive Sarkar', 'harro.sarkar.1998@gmail.com', '9064389417', 'xdxfcghcfhch', 'SILIGURI', 'ghcgchcfhhchghgh', NULL, '::1', '2021-08-03 23:08:14', 1, '2021-08-03 17:38:14', '2021-08-03 17:38:14', NULL),
(4, 'S A R', 'vbcvcbcvb@gmail.com', '7064378417', 'xdxfcghcfhch', 'fvcvcbv dgfgdhdf', 'ghcg chcfh  hchghgh sfdgfbcnc dfh hhj gfh  ghcg chcfh  hchghgh sfdgfbcnc dfh hhj gfh  ghcg chcfh  hchghgh sfdgfbcnc dfh hhj gfh  ghcg chcfh  hchghgh sfdgfbcnc dfh hhj gfh  ghcg chcfh  hchghgh sfdgfbcnc dfh hhj gfh  ghcg chcfh  hchghgh sfdgfbcnc dfh hhj gfh  ghcg chcfh  hchghgh sfdgfbcnc dfh hhj gfh', 's_a_r_1628012403392144219.pdf', '::1', '2021-08-03 23:10:03', 1, '2021-08-03 17:40:03', '2021-08-03 17:40:03', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `socials`
--

CREATE TABLE `socials` (
  `social_id` int(10) UNSIGNED NOT NULL,
  `whatsapp` text DEFAULT NULL,
  `facebook` text DEFAULT NULL,
  `twitter` text DEFAULT NULL,
  `youtube` text DEFAULT NULL,
  `instagram` text DEFAULT NULL,
  `fb_og_id` text DEFAULT NULL,
  `fb_site_img` text DEFAULT NULL,
  `tw_card_id` text DEFAULT NULL,
  `tw_site_img` text DEFAULT NULL,
  `sitemap` text DEFAULT NULL,
  `google_file` text DEFAULT NULL,
  `bing_file` text DEFAULT NULL,
  `social_update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `social_create_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `socials`
--

INSERT INTO `socials` (`social_id`, `whatsapp`, `facebook`, `twitter`, `youtube`, `instagram`, `fb_og_id`, `fb_site_img`, `tw_card_id`, `tw_site_img`, `sitemap`, `google_file`, `bing_file`, `social_update_at`, `social_create_at`) VALUES
(1, NULL, '9073309930', '+91 62919 84265', '+91 90733 09932', 'dextergroup1965@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-08-29 00:17:30', '2021-08-26 16:23:14');

-- --------------------------------------------------------

--
-- Table structure for table `tech_gallery`
--

CREATE TABLE `tech_gallery` (
  `tg_id` int(10) UNSIGNED NOT NULL,
  `tg_tech_id_ref` int(10) UNSIGNED NOT NULL,
  `tg_img_lg` text NOT NULL,
  `tg_img_md` text DEFAULT NULL,
  `tg_img_name` text DEFAULT NULL,
  `tg_img_alt` text DEFAULT NULL,
  `tg_img_order` int(11) DEFAULT NULL,
  `tg_img_status` int(1) NOT NULL DEFAULT 1,
  `tg_create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `tg_update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `tg_delete_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tech_gallery`
--

INSERT INTO `tech_gallery` (`tg_id`, `tg_tech_id_ref`, `tg_img_lg`, `tg_img_md`, `tg_img_name`, `tg_img_alt`, `tg_img_order`, `tg_img_status`, `tg_create_at`, `tg_update_at`, `tg_delete_at`) VALUES
(1, 1, 'hello_1629909396717376_lg.jpg', 'hello_16299093964718665_md.jpg', NULL, 'hello', NULL, 2, '2021-08-16 10:32:16', '2021-08-25 16:37:51', '0000-00-00 00:00:00'),
(2, 1, 'gg_16299094123870273_lg.jpg', 'gg_16299094124742443_md.jpg', 'Demo Service 1', 'gg', NULL, 1, '2021-08-25 16:36:52', '2021-08-25 16:38:11', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tech_service`
--

CREATE TABLE `tech_service` (
  `tech_id` int(11) UNSIGNED NOT NULL,
  `tech_name` varchar(255) NOT NULL,
  `tech_slug` varchar(255) NOT NULL,
  `tech_img` text DEFAULT NULL,
  `tech_banner` text DEFAULT NULL,
  `tech_small_desc` text DEFAULT NULL,
  `tech_full_desc` text DEFAULT NULL,
  `tech_status` int(1) NOT NULL DEFAULT 1,
  `tech_create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `tech_update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `tech_delete_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tech_service`
--

INSERT INTO `tech_service` (`tech_id`, `tech_name`, `tech_slug`, `tech_img`, `tech_banner`, `tech_small_desc`, `tech_full_desc`, `tech_status`, `tech_create_at`, `tech_update_at`, `tech_delete_at`) VALUES
(1, 'Maintainance', 'tmaintainance', NULL, NULL, 'Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print.', NULL, 1, '2021-07-28 09:18:58', '2021-08-28 23:44:04', NULL),
(2, 'Installation', 'tinstallation', NULL, NULL, NULL, NULL, 1, '2021-07-28 09:19:04', '2021-08-20 16:35:35', NULL),
(3, 'Commitioning', 'tcommitioning', NULL, NULL, NULL, NULL, 1, '2021-08-03 09:50:19', '2021-08-20 16:35:38', NULL),
(4, 'Rectification', 'trectification', NULL, NULL, NULL, NULL, 1, '2021-08-03 09:50:27', '2021-08-20 16:35:52', NULL),
(5, 'Fire Extinguisher - Supply& Refil', 'tfire-extinguisher-supply-refil', NULL, NULL, NULL, NULL, 1, '2021-08-03 09:50:42', '2021-08-28 23:45:34', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `testi_id` int(11) UNSIGNED NOT NULL,
  `testi_name` text NOT NULL,
  `testi_text` text NOT NULL,
  `testi_img` text DEFAULT NULL,
  `testi_status` int(1) NOT NULL DEFAULT 1,
  `testi_create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `testi_update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `testi_delete_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`testi_id`, `testi_name`, `testi_text`, `testi_img`, `testi_status`, `testi_create_at`, `testi_update_at`, `testi_delete_at`) VALUES
(1, 'Supro Sarkar', 'demo text  demo text  demo text  demo text  demo text  demo text  demo text  demo text  demo text  demo text  demo text', 'demo_name_162532052917032362.jpg', 1, '2021-07-03 13:24:47', '2021-08-25 16:42:48', '2021-07-03 13:32:01'),
(2, 'cxvx', 'cvcxcxvxcvxcv xv cxvxcvxc', 'cxvx_1625320489923961326.jpg', 1, '2021-07-03 13:54:42', '2021-08-25 16:43:10', NULL),
(3, 'Demo Name 1', 'xzcxzcxzczxvzxvzx sdv dsgsb', 'demo_name_1_1629100893749273420.jpg', 2, '2021-07-09 14:21:31', '2021-08-25 16:43:08', '2021-08-25 16:43:08'),
(4, 'Suprotive Sarkar', 'sdbsfb snfsndbg bsjb gjbg ib gisjkbgsdjkgbdjbg gesib silebg ildfg ilbdij bgs', 'suprotive_sarkar_162910093074715377.jpg', 1, '2021-08-16 08:02:10', '2021-08-27 11:53:22', NULL),
(5, 'Hello Name Demo', 'vxvcf dfgdgnjsdb gdsbg sdbg sdb abfbsd fbdsjfb sdbf sdb ksdbbsdfbsdbksdbfksdfbsd b', NULL, 2, '2021-08-23 18:04:58', '2021-08-23 20:04:56', '2021-08-23 20:04:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`abo_id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `com_gallery`
--
ALTER TABLE `com_gallery`
  ADD PRIMARY KEY (`cg_id`),
  ADD KEY `com_gallery_ibfk_1` (`cg_com_id_ref`);

--
-- Indexes for table `com_service`
--
ALTER TABLE `com_service`
  ADD PRIMARY KEY (`com_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`pro_id`);

--
-- Indexes for table `product_gallery`
--
ALTER TABLE `product_gallery`
  ADD PRIMARY KEY (`pg_id`),
  ADD KEY `pg_pro_id_ref` (`pg_pro_id_ref`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`proj_id`);

--
-- Indexes for table `quick_contact`
--
ALTER TABLE `quick_contact`
  ADD PRIMARY KEY (`qid`);

--
-- Indexes for table `quick_quote`
--
ALTER TABLE `quick_quote`
  ADD PRIMARY KEY (`quote_id`);

--
-- Indexes for table `socials`
--
ALTER TABLE `socials`
  ADD PRIMARY KEY (`social_id`);

--
-- Indexes for table `tech_gallery`
--
ALTER TABLE `tech_gallery`
  ADD PRIMARY KEY (`tg_id`),
  ADD KEY `tg_tech_id_ref` (`tg_tech_id_ref`);

--
-- Indexes for table `tech_service`
--
ALTER TABLE `tech_service`
  ADD PRIMARY KEY (`tech_id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`testi_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `abo_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `member_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `com_gallery`
--
ALTER TABLE `com_gallery`
  MODIFY `cg_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `com_service`
--
ALTER TABLE `com_service`
  MODIFY `com_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `pro_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product_gallery`
--
ALTER TABLE `product_gallery`
  MODIFY `pg_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `proj_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `quick_contact`
--
ALTER TABLE `quick_contact`
  MODIFY `qid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `quick_quote`
--
ALTER TABLE `quick_quote`
  MODIFY `quote_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `socials`
--
ALTER TABLE `socials`
  MODIFY `social_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tech_gallery`
--
ALTER TABLE `tech_gallery`
  MODIFY `tg_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tech_service`
--
ALTER TABLE `tech_service`
  MODIFY `tech_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `testi_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `com_gallery`
--
ALTER TABLE `com_gallery`
  ADD CONSTRAINT `com_gallery_ibfk_1` FOREIGN KEY (`cg_com_id_ref`) REFERENCES `com_service` (`com_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_gallery`
--
ALTER TABLE `product_gallery`
  ADD CONSTRAINT `product_gallery_ibfk_1` FOREIGN KEY (`pg_pro_id_ref`) REFERENCES `product` (`pro_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tech_gallery`
--
ALTER TABLE `tech_gallery`
  ADD CONSTRAINT `tech_gallery_ibfk_1` FOREIGN KEY (`tg_tech_id_ref`) REFERENCES `tech_service` (`tech_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
