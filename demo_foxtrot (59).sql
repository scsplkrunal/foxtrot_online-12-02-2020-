-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 28, 2019 at 01:01 PM
-- Server version: 5.6.21
-- PHP Version: 7.0.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `demo_foxtrot`
--

-- --------------------------------------------------------

--
-- Table structure for table `1099`
--

CREATE TABLE `1099` (
  `REP_NO` int(11) DEFAULT NULL,
  `NAME` varchar(40) DEFAULT NULL,
  `PAY_DATE` varchar(19) DEFAULT NULL,
  `DATE` varchar(19) DEFAULT NULL,
  `CHECK_NO` bigint(20) DEFAULT NULL,
  `BRANCH_NO` varchar(5) DEFAULT NULL,
  `BRANCH` varchar(35) DEFAULT NULL,
  `FREP_GROSS` decimal(12,2) DEFAULT NULL,
  `FREP_PAY` decimal(12,2) DEFAULT NULL,
  `OVER_PAY` decimal(12,2) DEFAULT NULL,
  `SPL_PAY` decimal(12,2) DEFAULT NULL,
  `BALANCE` decimal(12,2) DEFAULT NULL,
  `TAX_BAL` decimal(12,2) DEFAULT NULL,
  `NON_BAL` decimal(12,2) DEFAULT NULL,
  `ADV_BAL` decimal(12,2) DEFAULT NULL,
  `ADJ_BAL` decimal(12,2) DEFAULT NULL,
  `ADJUST` decimal(12,2) DEFAULT NULL,
  `NON_1099` decimal(12,2) DEFAULT NULL,
  `ADVANCE` decimal(12,2) DEFAULT NULL,
  `NASD_GROSS` decimal(14,2) DEFAULT NULL,
  `NASD` decimal(10,2) DEFAULT NULL,
  `SIPC` decimal(10,2) DEFAULT NULL,
  `CHECK_AMT` decimal(12,2) DEFAULT NULL,
  `PAY_GROSS` decimal(14,2) DEFAULT NULL,
  `PAY_TOTAL` decimal(14,2) DEFAULT NULL,
  `CONC_GOAL` decimal(14,2) DEFAULT NULL,
  `EARN_GOAL` decimal(14,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `1099`
--

INSERT INTO `1099` (`REP_NO`, `NAME`, `PAY_DATE`, `DATE`, `CHECK_NO`, `BRANCH_NO`, `BRANCH`, `FREP_GROSS`, `FREP_PAY`, `OVER_PAY`, `SPL_PAY`, `BALANCE`, `TAX_BAL`, `NON_BAL`, `ADV_BAL`, `ADJ_BAL`, `ADJUST`, `NON_1099`, `ADVANCE`, `NASD_GROSS`, `NASD`, `SIPC`, `CHECK_AMT`, `PAY_GROSS`, `PAY_TOTAL`, `CONC_GOAL`, `EARN_GOAL`) VALUES
(1, 'JONES, JIM', '2018-12-15', '2018-12-15', 100001, '01001', '', '4564.55', '4108.10', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4108.10', NULL, NULL),
(2, 'SPLIT, JONES/ROBERTS', '2018-12-15', '2018-12-15', NULL, '01001', '', '20000.00', '18000.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '18000.00', NULL, NULL),
(1, 'JONES, JIM', '2018-12-31', '2018-12-31', 100003, '01001', '', '5678.00', '5110.20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5110.20', NULL, NULL),
(2, 'SPLIT, JONES/ROBERTS', '2018-12-31', '2018-12-31', NULL, '01001', '', '20000.00', '45.60', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '45.60', NULL, NULL),
(1, 'JONES, JIM', '2019-01-01', '2019-01-01', 100006, '01001', '', '3598.00', '3238.20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3238.20', NULL, NULL),
(2, 'SPLIT, JONES/ROBERTS', '2019-01-01', '2019-01-01', NULL, '01001', '', '20000.00', '45.60', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '45.60', NULL, NULL),
(1, 'JONES, JIM', '2019-01-15', '2019-01-15', 100007, '01001', '', '3291.92', '1409.46', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1409.46', NULL, NULL),
(2, 'SPLIT, JONES/ROBERTS', '2019-01-15', '2019-01-15', NULL, '01001', '', '20000.00', '45.60', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '45.60', NULL, NULL),
(1, 'JONES, JIM', '2019-02-01', '2019-02-01', 100010, '01001', '', '12256.92', '7151.46', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7151.46', NULL, NULL),
(2, 'SPLIT, JONES/ROBERTS', '2019-02-01', '2019-02-01', NULL, '01001', '', '20000.00', '45.60', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '45.60', NULL, NULL),
(1, 'JONES, JIM', '2019-02-15', '2019-02-15', 100006, '01001', '', '3598.00', '3238.20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3238.20', NULL, NULL),
(2, 'SPLIT, JONES/ROBERTS', '2019-02-15', '2019-02-15', NULL, '01001', '', '20000.00', '45.60', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '45.60', NULL, NULL),
(1, 'JONES, JIM', '2019-03-01', '2019-03-01', 100007, '01001', '', '3291.92', '1409.46', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1409.46', NULL, NULL),
(2, 'SPLIT, JONES/ROBERTS', '2019-03-01', '2019-03-01', NULL, '01001', '', '20000.00', '45.60', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '45.60', NULL, NULL),
(1, 'JONES, JIM', '2019-03-15', '2019-03-15', 100010, '01001', '', '12256.92', '7151.46', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7151.46', NULL, NULL),
(2, 'SPLIT, JONES/ROBERTS', '2019-03-15', '2019-03-15', NULL, '01001', '', '20000.00', '45.60', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '45.60', NULL, NULL),
(1, 'JONES, JIM', '2019-04-01', '2019-04-01', 100006, '01001', '', '3598.00', '3238.20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3238.20', NULL, NULL),
(2, 'SPLIT, JONES/ROBERTS', '2019-04-01', '2019-04-01', NULL, '01001', '', '20000.00', '45.60', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '45.60', NULL, NULL),
(1, 'JONES, JIM', '2019-04-15', '2019-04-15', 100007, '01001', '', '3291.92', '1409.46', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1409.46', NULL, NULL),
(2, 'SPLIT, JONES/ROBERTS', '2019-04-15', '2019-04-15', NULL, '01001', '', '20000.00', '45.60', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '45.60', NULL, NULL),
(1, 'JONES, JIM', '2019-05-01', '2019-05-01', 100010, '01001', '', '12256.92', '7151.46', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7151.46', NULL, NULL),
(2, 'SPLIT, JONES/ROBERTS', '2019-05-01', '2019-05-01', NULL, '01001', '', '20000.00', '45.60', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '45.60', NULL, NULL),
(1, 'JONES, JIM', '2019-05-15', '2019-05-15', 100006, '01001', '', '3598.00', '3238.20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3238.20', NULL, NULL),
(2, 'SPLIT, JONES/ROBERTS', '2019-06-01', '2019-06-01', NULL, '01001', '', '20000.00', '45.60', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '45.60', NULL, NULL),
(1, 'JONES, JIM', '2019-06-01', '2019-06-01', 100007, '01001', '', '3291.92', '1409.46', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1409.46', NULL, NULL),
(2, 'SPLIT, JONES/ROBERTS', '2019-06-15', '2019-06-15', NULL, '01001', '', '20000.00', '45.60', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '45.60', NULL, NULL),
(1, 'JONES, JIM', '2019-07-01', '2019-07-01', 100010, '01001', '', '12256.92', '7151.46', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7151.46', NULL, NULL),
(2, 'SPLIT, JONES/ROBERTS', '2019-07-01', '2019-07-01', NULL, '01001', '', '20000.00', '45.60', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '45.60', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `acctbal`
--

CREATE TABLE `acctbal` (
  `acctBalID` int(11) NOT NULL,
  `cli_no` varchar(11) DEFAULT NULL,
  `cli_name` varchar(50) DEFAULT NULL,
  `rep_no` int(11) DEFAULT NULL,
  `source` varchar(3) DEFAULT NULL,
  `dst_amt` decimal(17,2) DEFAULT NULL,
  `net_amt` decimal(12,2) DEFAULT NULL,
  `bet_amt` decimal(12,2) DEFAULT NULL,
  `branch_no` varchar(5) DEFAULT NULL,
  `rep_name` varchar(30) DEFAULT NULL,
  `soc_sec` varchar(11) DEFAULT NULL,
  `customerID` int(11) NOT NULL,
  `lastModifiedDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `acctpos`
--

CREATE TABLE `acctpos` (
  `acctPosID` int(11) NOT NULL,
  `source` varchar(3) DEFAULT NULL,
  `rep_no` int(11) DEFAULT NULL,
  `invest` varchar(35) DEFAULT NULL,
  `co_no` smallint(6) DEFAULT NULL,
  `cusip_no` varchar(9) DEFAULT NULL,
  `company` varchar(35) DEFAULT NULL,
  `inv_type` tinyint(4) DEFAULT NULL,
  `inv_no` int(11) DEFAULT NULL,
  `date_placed` datetime DEFAULT NULL,
  `date_rec` datetime DEFAULT NULL,
  `activ_date` datetime DEFAULT NULL,
  `buy_sell` char(1) DEFAULT NULL,
  `units` decimal(17,4) DEFAULT NULL,
  `price` decimal(14,6) DEFAULT NULL,
  `net_amt` decimal(17,2) DEFAULT NULL,
  `d_amt` decimal(17,2) DEFAULT NULL,
  `f_amt` decimal(17,2) DEFAULT NULL,
  `cli_no` varchar(11) DEFAULT NULL,
  `soc_sec` varchar(11) DEFAULT NULL,
  `addr` varchar(30) DEFAULT NULL,
  `city` varchar(20) DEFAULT NULL,
  `state` varchar(2) DEFAULT NULL,
  `zip` varchar(10) DEFAULT NULL,
  `cli_name` varchar(40) DEFAULT NULL,
  `fname` varchar(20) DEFAULT NULL,
  `lname` varchar(20) DEFAULT NULL,
  `middle` char(1) DEFAULT NULL,
  `branch_no` varchar(5) DEFAULT NULL,
  `customerID` int(11) NOT NULL,
  `lastModifiedDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `adjust`
--

CREATE TABLE `adjust` (
  `REP_NO` int(11) DEFAULT NULL,
  `BRANCH_NO` varchar(5) DEFAULT NULL,
  `ADJUST` decimal(12,2) DEFAULT NULL,
  `NON_1099` decimal(12,2) DEFAULT NULL,
  `ADVANCE` decimal(12,2) DEFAULT NULL,
  `DESCRIPT` varchar(50) DEFAULT NULL,
  `ACCOUNT` varchar(10) DEFAULT NULL,
  `RECUR` bit(1) DEFAULT NULL,
  `DATE` varchar(19) DEFAULT NULL,
  `PAY_DATE` varchar(19) DEFAULT NULL,
  `CATEGORY` varchar(100) DEFAULT NULL,
  `FREQUENCY` varchar(30) DEFAULT NULL,
  `SOURCE` varchar(2) DEFAULT NULL,
  `PAY_ON` varchar(19) DEFAULT NULL,
  `PAID` bit(1) DEFAULT NULL,
  `PAY_UNTIL` varchar(19) DEFAULT NULL,
  `BANK_NO` varchar(2) DEFAULT NULL,
  `IN_DATE` varchar(19) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `adjust`
--

INSERT INTO `adjust` (`REP_NO`, `BRANCH_NO`, `ADJUST`, `NON_1099`, `ADVANCE`, `DESCRIPT`, `ACCOUNT`, `RECUR`, `DATE`, `PAY_DATE`, `CATEGORY`, `FREQUENCY`, `SOURCE`, `PAY_ON`, `PAID`, `PAY_UNTIL`, `BANK_NO`, `IN_DATE`) VALUES
(1, '', '-125.00', '0.00', '0.00', 'REPORTING & PORTAL', '', b'0', '2019-06-01', '2019-06-01', 'TECHNOLOGY', 'End-Of-Month', '', '2019-06-01', b'1', NULL, '01', NULL),
(1, '', '0.00', '-150.00', '0.00', 'E & O INSURANCE', '', b'1', '2019-06-01', '2019-06-01', 'E & O INSURANCE', 'End-Of-Month', '', '2019-06-01', b'1', NULL, '01', NULL),
(1, '', '0.00', '-150.00', '0.00', 'DBA email domain set up fee', '', b'0', '2019-06-01', '2019-06-01', 'TECHNOLOGY', 'End-Of-Month', '', '2019-06-01', b'1', NULL, '01', NULL),
(4, '', '0.00', '0.00', '-10.00', 'FORGOT TO WEAR TIE', '', b'0', '2019-06-01', '2019-06-01', 'FORGOT TO WEAR TIE', 'Both Payrolls', '', '2019-06-01', b'0', NULL, '', NULL),
(1, '01001', '100.00', '0.00', '0.00', 'Annual Fees', 'GL TEST', b'0', '2019-06-01', '2019-06-01', 'LICENSING', '', 'XL', '2019-06-01', b'0', NULL, '01', '2018-12-12'),
(2, '01001', '150.00', '0.00', '0.00', 'Annual Fees', '', b'0', '2019-06-01', '2019-06-01', 'CANCELLATIONS', '', 'XL', NULL, b'0', NULL, '01', '2018-12-12'),
(3, '01001', '200.00', '0.00', '0.00', 'Annual Fees', '', b'0', '2019-06-01', '2019-06-01', 'MISCELLANEOUS', '', 'XL', NULL, b'0', NULL, '01', '2018-12-12'),
(4, '01001', '250.00', '0.00', '0.00', 'Annual Fees', '', b'0', '2019-06-01', '2019-06-01', 'OTHER', '', 'XL', NULL, b'0', NULL, '02', '2018-12-12');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `REP_NO` int(11) DEFAULT NULL,
  `CLEAR_NO` varchar(10) DEFAULT NULL,
  `FNAME` varchar(20) DEFAULT NULL,
  `LNAME` varchar(20) DEFAULT NULL,
  `MIDDLE` varchar(1) DEFAULT NULL,
  `SUFFIX` varchar(3) DEFAULT NULL,
  `H_ADDR` varchar(30) DEFAULT NULL,
  `H_CITY` varchar(24) DEFAULT NULL,
  `H_STATE` varchar(2) DEFAULT NULL,
  `H_ZIP` varchar(10) DEFAULT NULL,
  `M_ADDR` varchar(30) DEFAULT NULL,
  `M_ADDR2` varchar(30) DEFAULT NULL,
  `M_CITY` varchar(24) DEFAULT NULL,
  `M_STATE` varchar(2) DEFAULT NULL,
  `M_ZIP` varchar(10) DEFAULT NULL,
  `W_PHONE` varchar(13) DEFAULT NULL,
  `H_PHONE` varchar(13) DEFAULT NULL,
  `FAX` varchar(13) DEFAULT NULL,
  `SOC_SEC` varchar(11) DEFAULT NULL,
  `TAXID` varchar(10) DEFAULT NULL,
  `EMP_DATE` varchar(19) DEFAULT NULL,
  `CRD_NO` varchar(7) DEFAULT NULL,
  `TERM_DATE` varchar(19) DEFAULT NULL,
  `LP_STATES` varchar(54) DEFAULT NULL,
  `MUT_STATES` varchar(54) DEFAULT NULL,
  `SEC_STATES` varchar(54) DEFAULT NULL,
  `VA_STATES` varchar(54) DEFAULT NULL,
  `FA_STATES` varchar(54) DEFAULT NULL,
  `L_STATES` varchar(54) DEFAULT NULL,
  `RIA_STATES` varchar(54) DEFAULT NULL,
  `BRANCH` varchar(10) DEFAULT NULL,
  `BRANCH_NO` varchar(5) DEFAULT NULL,
  `OVERRIDE` int(11) DEFAULT NULL,
  `OVER_RATE` decimal(8,3) DEFAULT NULL,
  `OVERRIDE2` int(11) DEFAULT NULL,
  `OVER2_RATE` decimal(8,3) DEFAULT NULL,
  `OVERRIDE3` int(11) DEFAULT NULL,
  `OVER3_RATE` decimal(8,3) DEFAULT NULL,
  `DOB` varchar(19) DEFAULT NULL,
  `PAYTYPE` int(11) DEFAULT NULL,
  `NOTES` varchar(100) DEFAULT NULL,
  `EQUI_ACCT` varchar(9) DEFAULT NULL,
  `COMMBASIS` tinyint(4) DEFAULT NULL,
  `FRN_DOM` bigint(20) DEFAULT NULL,
  `SECCALC` int(11) DEFAULT NULL,
  `BRANCH1` varchar(5) DEFAULT NULL,
  `BRANCH2` varchar(5) DEFAULT NULL,
  `BRANCH3` varchar(5) DEFAULT NULL,
  `PAY_TOT` decimal(12,2) DEFAULT NULL,
  `GROSS_TOT` decimal(12,2) DEFAULT NULL,
  `SEC_CALC` bigint(20) DEFAULT NULL,
  `DEFER_AMT` decimal(10,2) DEFAULT NULL,
  `SPL_REP` int(11) DEFAULT NULL,
  `SPL_RATE` decimal(8,3) DEFAULT NULL,
  `SPL_REP2` int(11) DEFAULT NULL,
  `SPL2_RATE` decimal(8,3) DEFAULT NULL,
  `EMAIL` varchar(25) DEFAULT NULL,
  `WEBPSWD` varchar(8) DEFAULT NULL,
  `INSUR` int(11) DEFAULT NULL,
  `CFP` tinyint(4) DEFAULT NULL,
  `CFA` tinyint(4) DEFAULT NULL,
  `CLU` tinyint(4) DEFAULT NULL,
  `CPA` tinyint(4) DEFAULT NULL,
  `CHFA` tinyint(4) DEFAULT NULL,
  `SAL_NO` varchar(20) DEFAULT NULL,
  `USERNAME` varchar(8) DEFAULT NULL,
  `ACCESSLEVE` int(11) DEFAULT NULL,
  `CUSTOMERID` bigint(20) DEFAULT NULL,
  `EDIT_DATE` varchar(19) DEFAULT NULL,
  `BND_STATES` varchar(54) DEFAULT NULL,
  `OPT_STATES` varchar(54) DEFAULT NULL,
  `REP_LINK` varchar(10) DEFAULT NULL,
  `OSJMGR` varchar(11) DEFAULT NULL,
  `OSJMGR2` varchar(11) DEFAULT NULL,
  `DEFER_RATE` decimal(8,3) DEFAULT NULL,
  `RIA` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`REP_NO`, `CLEAR_NO`, `FNAME`, `LNAME`, `MIDDLE`, `SUFFIX`, `H_ADDR`, `H_CITY`, `H_STATE`, `H_ZIP`, `M_ADDR`, `M_ADDR2`, `M_CITY`, `M_STATE`, `M_ZIP`, `W_PHONE`, `H_PHONE`, `FAX`, `SOC_SEC`, `TAXID`, `EMP_DATE`, `CRD_NO`, `TERM_DATE`, `LP_STATES`, `MUT_STATES`, `SEC_STATES`, `VA_STATES`, `FA_STATES`, `L_STATES`, `RIA_STATES`, `BRANCH`, `BRANCH_NO`, `OVERRIDE`, `OVER_RATE`, `OVERRIDE2`, `OVER2_RATE`, `OVERRIDE3`, `OVER3_RATE`, `DOB`, `PAYTYPE`, `NOTES`, `EQUI_ACCT`, `COMMBASIS`, `FRN_DOM`, `SECCALC`, `BRANCH1`, `BRANCH2`, `BRANCH3`, `PAY_TOT`, `GROSS_TOT`, `SEC_CALC`, `DEFER_AMT`, `SPL_REP`, `SPL_RATE`, `SPL_REP2`, `SPL2_RATE`, `EMAIL`, `WEBPSWD`, `INSUR`, `CFP`, `CFA`, `CLU`, `CPA`, `CHFA`, `SAL_NO`, `USERNAME`, `ACCESSLEVE`, `CUSTOMERID`, `EDIT_DATE`, `BND_STATES`, `OPT_STATES`, `REP_LINK`, `OSJMGR`, `OSJMGR2`, `DEFER_RATE`, `RIA`) VALUES
(1, NULL, 'Admin', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'scspl.aksha@gmail.com', 'admin6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `BRANCH_NO` varchar(5) DEFAULT NULL,
  `BRANCH` varchar(20) DEFAULT NULL,
  `REP_NO` int(11) DEFAULT NULL,
  `CUSTOMERID` bigint(20) DEFAULT NULL,
  `LASTMODIFI` varchar(19) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`BRANCH_NO`, `BRANCH`, `REP_NO`, `CUSTOMERID`, `LASTMODIFI`) VALUES
('01001', 'BOULDER CITY BRANCH', 2, NULL, '00:00:00'),
('01002', 'Test Branch', 3, NULL, '00:00:00'),
('02001', 'BRANCH#02001', 2, NULL, '00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `broker_profile`
--

CREATE TABLE `broker_profile` (
  `broker_id` int(12) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `clearing`
--

CREATE TABLE `clearing` (
  `CLI_NO` varchar(11) DEFAULT NULL,
  `CLEARING` varchar(20) DEFAULT NULL,
  `CO_NO` smallint(6) DEFAULT NULL,
  `COMPANY` varchar(35) DEFAULT NULL,
  `DATE` varchar(19) DEFAULT NULL,
  `CUSTOMERID` bigint(20) DEFAULT NULL,
  `LASTMODIFI` varchar(19) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `clearing`
--

INSERT INTO `clearing` (`CLI_NO`, `CLEARING`, `CO_NO`, `COMPANY`, `DATE`, `CUSTOMERID`, `LASTMODIFI`) VALUES
('387200304I', '00065341100', 5, 'RIVERSOURCE VA', '2006-12-07', NULL, '00:00:00'),
('387200304TR', '234324523', 1, 'DAIN', '2007-07-05', NULL, '00:00:00'),
('396346754IN', '00075720100', 5, 'RIVERSOURCE VA', '2006-12-07', NULL, '00:00:00'),
('391120384I', '10003003', 7, 'AIG SUNAMERICA (OVATION)', '2007-08-23', NULL, '00:00:00'),
('294626454IN', '000011116769230', 6, 'AIG LIFE INSURANCE', '2006-12-07', NULL, '00:00:00'),
('387200304TR', '00065341101', 5, 'RIVERSOURCE VA', '2006-12-07', NULL, '00:00:00'),
('391120384I', '1231231231', 16, 'AIM INVESTMENT SERVICES, INC.', '2008-10-08', NULL, '00:00:00'),
('462745222', '00000815327', 232, 'HARTFORD', '2008-10-08', NULL, '00:00:00'),
('391120384I', '00094501100', 9, 'AM INT LIFE INS. CO OF NY', '2006-12-07', NULL, '00:00:00'),
('508948068', '16001322', 1, 'DAIN', '2009-06-09', NULL, '00:00:00'),
('506397139', '39139289', 1, 'DAIN', '2009-06-09', NULL, '00:00:00'),
('508407527', '80249901', 1, 'DAIN', '2009-06-09', NULL, '00:00:00'),
('508948151', '00083808501', 76, 'AMERICAN FUNDS', '2010-05-18', NULL, '00:00:00'),
('508948151', '02000287069', 76, 'AMERICAN FUNDS', '2010-05-18', NULL, '00:00:00'),
('508948151', '16001332', 1, 'DAIN', '2009-06-09', NULL, '00:00:00'),
('123123123', '70603677', 1, 'DAIN', '2010-01-06', NULL, '00:00:00'),
('123123123', 'KNQ006890', 141, 'NATIONWIDE', '2009-12-30', NULL, '00:00:00'),
('123123123', 'P1L967718', 141, 'NATIONWIDE', '2009-12-30', NULL, '00:00:00'),
('508948068', '57578992', 1, 'DAIN', '2009-06-09', NULL, '00:00:00'),
('508948151', '42328514', 1, 'DAIN', '2009-06-09', NULL, '00:00:00'),
('508948151', '85105431', 1, 'DAIN', '2009-06-09', NULL, '00:00:00'),
('294626454TR', '123', 200, 'AIM', '2010-05-04', NULL, '00:00:00'),
('294626454TR', '00002101', 1, 'DAIN', '2010-05-11', NULL, '00:00:00'),
('294626454TR', '80169513', 1, 'DAIN', '2010-05-04', NULL, '00:00:00'),
('226562573I', '00068368497', 76, 'AMERICAN FUNDS', '2010-05-18', NULL, '00:00:00'),
('288501861I', '00073959515', 76, 'AMERICAN FUNDS', '2010-05-18', NULL, '00:00:00'),
('506390858', '00000000427', 3, 'AMERICAN CENTURY KANSAS 529 PL', '2010-05-18', NULL, '00:00:00'),
('506390858', '00063412117', 76, 'AMERICAN FUNDS', '2010-05-18', NULL, '00:00:00'),
('506390858', '00063451518', 76, 'AMERICAN FUNDS', '2010-05-18', NULL, '00:00:00'),
('506390858', '00074930370', 76, 'AMERICAN FUNDS', '2010-05-18', NULL, '00:00:00'),
('505685911', '02000661153', 76, 'AMERICAN FUNDS', '2010-05-18', NULL, '00:00:00'),
('505685911', '02000661154', 76, 'AMERICAN FUNDS', '2010-05-18', NULL, '00:00:00'),
('567889926', '6125626367677676', 202, 'ALLIANCE', '2010-05-18', NULL, '00:00:00'),
('999965657', '1234567', 145, 'OPPENHEIMERFUNDS', '2013-05-16', NULL, '00:00:00'),
('094667220', '3253453433', 282, 'ABN AMRO', '2014-04-07', NULL, '00:00:00'),
('999964191', '9720487', 95, 'JP', '2014-06-05', NULL, '00:00:00'),
('999964191', '9400031161', 130, 'MFS', '2014-06-05', NULL, '00:00:00'),
('546820524', 'VA99250700', 146, 'PACIFIC LIFE', '2015-02-03', NULL, '00:00:00'),
('480404642', 'VR00026053', 146, 'PACIFIC LIFE', '2015-02-03', NULL, '00:00:00'),
('568598493', 'VR01010753', 146, 'PACIFIC LIFE', '2015-02-03', NULL, '00:00:00'),
('357726257', 'VR03075716', 146, 'PACIFIC LIFE', '2015-02-03', NULL, '00:00:00'),
('236643791', 'VR08058844', 146, 'PACIFIC LIFE', '2015-02-03', NULL, '00:00:00'),
('130447278', '02001784426', 76, 'AMERICAN FUNDS', '2015-02-18', NULL, '00:00:00'),
('113624007', '02001784429', 76, 'AMERICAN FUNDS', '2015-02-18', NULL, '00:00:00'),
('068386750', '02001784430', 76, 'AMERICAN FUNDS', '2015-02-18', NULL, '00:00:00'),
('107445820', '02001784431', 76, 'AMERICAN FUNDS', '2015-02-18', NULL, '00:00:00'),
('134489729', '02001784433', 76, 'AMERICAN FUNDS', '2015-02-18', NULL, '00:00:00'),
('062567391', '02001784434', 76, 'AMERICAN FUNDS', '2015-02-18', NULL, '00:00:00'),
('128540598', '02001784437', 76, 'AMERICAN FUNDS', '2015-02-18', NULL, '00:00:00'),
('096709051', '02001784425', 76, 'AMERICAN FUNDS', '2015-02-18', NULL, '00:00:00'),
('999988123', '4546564', 6, 'AIG LIFE INSURANCE', '2015-03-09', NULL, '00:00:00'),
('999988123', '432324342', 282, 'ABN AMRO', '2015-03-09', NULL, '00:00:00'),
('094667220', '655445435', 51, 'ALGER FUNDS', '2015-08-25', NULL, '00:00:00'),
('000000001', 'TESTCLIENT', 6, 'AIG LIFE INSURANCE', '2015-12-10', NULL, '00:00:00'),
('123456789', 'AAA', 286, 'JACKSON', '2017-01-03', NULL, '00:00:00'),
('094667220', '860855DEF', 106, 'FIDELITY ADVISOR FUNDS', '2019-01-18', NULL, '00:00:00'),
('094667220', '1019648865', 286, 'JACKSON', '2017-01-03', NULL, '00:00:00'),
('999904233', '652-525501', 208, 'OPPENHEIMER', '2018-08-19', NULL, '00:00:00'),
('999904233', '00550154107', 156, 'PUTNAM', '2017-02-03', NULL, '00:00:00'),
('999904233', '00550402424', 156, 'PUTNAM', '2017-02-03', NULL, '00:00:00'),
('999944408', '001700023438', 156, 'PUTNAM', '2017-02-03', NULL, '00:00:00'),
('999941199', '01700023439', 156, 'PUTNAM', '2017-02-03', NULL, '00:00:00'),
('999944493', '01700023438', 156, 'PUTNAM', '2017-02-03', NULL, '00:00:00'),
('999983316', '00550402417', 156, 'PUTNAM', '2017-02-03', NULL, '00:00:00'),
('094667220', '00234506814', 156, 'PUTNAM', '2017-02-03', NULL, '00:00:00'),
('737874784J', '652-525499', 146, 'PACIFIC LIFE', '2018-08-19', NULL, '00:00:00'),
('999904233', '00551189284', 156, 'PUTNAM', '2017-02-03', NULL, '00:00:00'),
('567577526', '652-525500', 288, 'ORION ADVISOR SERVICES', '2018-08-19', NULL, '00:00:00'),
('567577524', '711630788', 29, 'MAINSTAY', '2018-10-25', NULL, '00:00:00'),
('094667220', '00412590212', 156, 'PUTNAM', '2017-02-03', NULL, '00:00:00'),
('094667220', '7200016561', 66, 'SCHOLARS EDGE 529 PLAN', '2017-11-28', NULL, '00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `CLI_NO` varchar(11) DEFAULT NULL,
  `DATE` varchar(19) DEFAULT NULL,
  `CLI_NAME` varchar(40) DEFAULT NULL,
  `ADDRESS` varchar(62) DEFAULT NULL,
  `PHONE` varchar(13) DEFAULT NULL,
  `REP_NO` int(11) DEFAULT NULL,
  `BRANCH_NO` varchar(11) DEFAULT NULL,
  `BIRTH_DATE` varchar(19) DEFAULT NULL,
  `LAST_TRADE` varchar(19) DEFAULT NULL,
  `ADDR` varchar(30) DEFAULT NULL,
  `CITY` varchar(20) DEFAULT NULL,
  `STATE` varchar(2) DEFAULT NULL,
  `ZIP` varchar(10) DEFAULT NULL,
  `LNAME` varchar(25) DEFAULT NULL,
  `FNAME` varchar(15) DEFAULT NULL,
  `MIDDLE` varchar(1) DEFAULT NULL,
  `SOC_SEC` varchar(11) DEFAULT NULL,
  `EMPLOYER` varchar(45) DEFAULT NULL,
  `EMP_ADDR` varchar(40) DEFAULT NULL,
  `NOCONTACT` bit(1) DEFAULT NULL,
  `CUSTOMERID` bigint(20) DEFAULT NULL,
  `LASTMODIFI` varchar(19) DEFAULT NULL,
  `ADDR2` varchar(30) DEFAULT NULL,
  `LONGNAME` longtext,
  `NAC_DATE` varchar(19) DEFAULT NULL,
  `INACT_DATE` varchar(19) DEFAULT NULL,
  `ACCT_TYPE` varchar(2) DEFAULT NULL,
  `JTSOC_SEC` varchar(11) DEFAULT NULL,
  `JTNAME` varchar(40) DEFAULT NULL,
  `JTDOB` varchar(19) DEFAULT NULL,
  `CLOSED` varchar(19) DEFAULT NULL,
  `RAP` varchar(19) DEFAULT NULL,
  `CRU_DATE` varchar(19) DEFAULT NULL,
  `M_ADDR` varchar(30) DEFAULT NULL,
  `M_ADDR2` varchar(30) DEFAULT NULL,
  `M_CITY` varchar(30) DEFAULT NULL,
  `M_STATE` varchar(30) DEFAULT NULL,
  `M_ZIP` varchar(10) DEFAULT NULL,
  `OPEN_DATE` varchar(19) DEFAULT NULL,
  `EMAIL` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`CLI_NO`, `DATE`, `CLI_NAME`, `ADDRESS`, `PHONE`, `REP_NO`, `BRANCH_NO`, `BIRTH_DATE`, `LAST_TRADE`, `ADDR`, `CITY`, `STATE`, `ZIP`, `LNAME`, `FNAME`, `MIDDLE`, `SOC_SEC`, `EMPLOYER`, `EMP_ADDR`, `NOCONTACT`, `CUSTOMERID`, `LASTMODIFI`, `ADDR2`, `LONGNAME`, `NAC_DATE`, `INACT_DATE`, `ACCT_TYPE`, `JTSOC_SEC`, `JTNAME`, `JTDOB`, `CLOSED`, `RAP`, `CRU_DATE`, `M_ADDR`, `M_ADDR2`, `M_CITY`, `M_STATE`, `M_ZIP`, `OPEN_DATE`, `EMAIL`) VALUES
('999904233', '2018-10-25', '', '', '(415)897-0091', 1, '', '1945-01-01', '2019-01-18', '123 BIRCH STREET', 'LOS ANGELES', 'CA', '92045', 'WILSON', 'JOHNATHON', '', '999-90-4233', '', '', b'0', NULL, '00:00:00', '', NULL, NULL, NULL, 'IN', '', '', NULL, '00:00:00', '00:00:00', '00:00:00', '', '', '', '', '', '2018-10-25', ''),
('567577524', '2018-10-25', '', '', '(760)647-3933', 1, '', '1952-09-21', '2018-12-15', '123 ANYSTREET', 'ENCINITAS', 'CA', '92024', 'SANDERS', 'JIM', '', '567-57-7524', '', '', b'0', NULL, '00:00:00', 'APT 103', NULL, NULL, NULL, 'IN', '', '', NULL, '00:00:00', '00:00:00', '00:00:00', '', '', '', '', '', '2018-10-25', ''),
('094667220', '2018-10-25', '', '', '(415)363-3932', 1, '', '1980-03-04', '2018-12-13', '123 WICKER STREET', 'LOS ANGELES', 'CA', '92045', 'GAINES', 'TERRI', '', '999-90-7220', '', '', b'0', NULL, '00:00:00', '', NULL, NULL, NULL, 'I', '', '', NULL, '00:00:00', '00:00:00', '00:00:00', '', '', '', '', '', '2018-10-25', ''),
('567577526', '2018-12-12', '', '', '(212)233-1234', 1, '', '1955-05-06', '2019-01-01', '400 4TH AVENUE', 'MANHATTAN', 'NY', '10010', 'JOHNS', 'JENNIFER', '', '567-57-7526', '', '', b'0', NULL, '00:00:00', 'APT 1082', NULL, NULL, NULL, 'IN', '', '', NULL, '00:00:00', '00:00:00', '00:00:00', '', '', '', '', '', NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `clipol`
--

CREATE TABLE `clipol` (
  `clipolID` int(11) NOT NULL,
  `cli_no` varchar(11) DEFAULT NULL,
  `policy` varchar(20) DEFAULT NULL,
  `co_no` int(11) DEFAULT NULL,
  `inv_no` int(11) DEFAULT NULL,
  `inv_type` int(11) DEFAULT NULL,
  `rep_no` int(11) DEFAULT NULL,
  `ins_type` int(11) DEFAULT NULL,
  `det_type` int(11) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `cash` decimal(12,2) DEFAULT NULL,
  `benefit` decimal(12,2) DEFAULT NULL,
  `premium` decimal(12,2) DEFAULT NULL,
  `cashtype` int(11) DEFAULT NULL,
  `notissued` int(11) DEFAULT NULL,
  `invest` varchar(50) DEFAULT NULL,
  `incep_date` datetime DEFAULT NULL,
  `company` varchar(50) DEFAULT NULL,
  `customerid` int(11) DEFAULT NULL,
  `lastModifiedDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `clisuit`
--

CREATE TABLE `clisuit` (
  `clisuitID` int(11) NOT NULL,
  `cli_no` varchar(11) DEFAULT NULL,
  `income` int(11) DEFAULT NULL,
  `net_worth` int(11) DEFAULT NULL,
  `taxbracket` int(11) DEFAULT NULL,
  `liquid_net` int(11) DEFAULT NULL,
  `risktol` int(11) DEFAULT NULL,
  `objectives` int(11) DEFAULT NULL,
  `marital` int(11) DEFAULT NULL,
  `obtained` int(11) DEFAULT NULL,
  `acctsour` int(11) DEFAULT NULL,
  `sourfund` int(11) DEFAULT NULL,
  `invknow` int(11) DEFAULT NULL,
  `know_stk` int(11) DEFAULT NULL,
  `know_mf` int(11) DEFAULT NULL,
  `know_bnd` int(11) DEFAULT NULL,
  `know_va` int(11) DEFAULT NULL,
  `know_opt` int(11) DEFAULT NULL,
  `know_lp` int(11) DEFAULT NULL,
  `user_s` varchar(3) DEFAULT NULL,
  `expyr_mut` int(11) DEFAULT NULL,
  `expyr_stk` int(11) DEFAULT NULL,
  `expyr_bnd` int(11) DEFAULT NULL,
  `expyr_opt` int(11) DEFAULT NULL,
  `expyr_spf` int(11) DEFAULT NULL,
  `expyr_ann` int(11) DEFAULT NULL,
  `expyr_alt` int(11) DEFAULT NULL,
  `expyr_mgn` int(11) DEFAULT NULL,
  `txpyr_mut` int(11) DEFAULT NULL,
  `txpyr_stk` int(11) DEFAULT NULL,
  `txpyr_bnd` int(11) DEFAULT NULL,
  `txpyr_opt` int(11) DEFAULT NULL,
  `txpyr_spf` int(11) DEFAULT NULL,
  `txpyr_ann` int(11) DEFAULT NULL,
  `txpyr_alt` int(11) DEFAULT NULL,
  `txpyr_mgn` int(11) DEFAULT NULL,
  `expann` int(11) DEFAULT NULL,
  `expspec` int(11) DEFAULT NULL,
  `expspectf` int(11) DEFAULT NULL,
  `liq_need` int(11) DEFAULT NULL,
  `decmaker` varchar(10) DEFAULT NULL,
  `port_part` int(11) DEFAULT NULL,
  `acct_use` int(11) DEFAULT NULL,
  `acct_useo` varchar(25) DEFAULT NULL,
  `timehor` int(11) DEFAULT NULL,
  `signdate` datetime DEFAULT NULL,
  `signer` varchar(40) DEFAULT NULL,
  `newfld` varchar(10) DEFAULT NULL,
  `clirecno` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `edited` datetime DEFAULT NULL,
  `creator` varchar(3) DEFAULT NULL,
  `editor` varchar(3) DEFAULT NULL,
  `assets` int(11) DEFAULT NULL,
  `ann_exp` int(11) DEFAULT NULL,
  `customerID` int(11) NOT NULL,
  `lastModifiedDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `COMPANY` varchar(40) DEFAULT NULL,
  `CO_NO` smallint(6) DEFAULT NULL,
  `NFS_NO` varchar(5) DEFAULT NULL,
  `ADDR1` varchar(40) DEFAULT NULL,
  `ADDR2` varchar(40) DEFAULT NULL,
  `ADDR3` varchar(40) DEFAULT NULL,
  `ADDR4` varchar(40) DEFAULT NULL,
  `ADDR5` varchar(40) DEFAULT NULL,
  `PHONE` varchar(13) DEFAULT NULL,
  `CONTACT` varchar(40) DEFAULT NULL,
  `FAX` varchar(13) DEFAULT NULL,
  `E_MAIL` varchar(35) DEFAULT NULL,
  `WEBSITE` varchar(35) DEFAULT NULL,
  `MRKT_PHONE` varchar(13) DEFAULT NULL,
  `MRKT_CONT` varchar(35) DEFAULT NULL,
  `OPER_PHONE` varchar(13) DEFAULT NULL,
  `OPER_CONT` varchar(35) DEFAULT NULL,
  `COMM_RATE` decimal(10,4) DEFAULT NULL,
  `MGTCODE` varchar(2) DEFAULT NULL,
  `SYSID` varchar(3) DEFAULT NULL,
  `OTHER_CONT` varchar(35) DEFAULT NULL,
  `OTHER_PHON` varchar(13) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`COMPANY`, `CO_NO`, `NFS_NO`, `ADDR1`, `ADDR2`, `ADDR3`, `ADDR4`, `ADDR5`, `PHONE`, `CONTACT`, `FAX`, `E_MAIL`, `WEBSITE`, `MRKT_PHONE`, `MRKT_CONT`, `OPER_PHONE`, `OPER_CONT`, `COMM_RATE`, `MGTCODE`, `SYSID`, `OTHER_CONT`, `OTHER_PHON`) VALUES
('AMERICAN CENTURY INVESTMENTS', 2, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'AC', 'ACM', '', ''),
('AMERICAN CENTURY KANSAS 529 PL', 3, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'LQ', 'ACM', '', ''),
('TRANSAMERICA (ENDEAVOR)', 4, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'ON', 'AEG', '', ''),
('RIVERSOURCE VA', 5, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'VA', 'AEX', '', ''),
('AIG LIFE INSURANCE', 6, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'PA', 'AGA', '', ''),
('AIG SUNAMERICA (OVATION)', 7, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'PA', 'AIG', '', ''),
('ALLMERICA - DELAWARE', 8, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'EL', 'ALD', '', ''),
('AM INT LIFE INS. CO OF NY', 9, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'PA', 'ALI', '', ''),
('ALLMERICA - SCUDDER', 10, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'EM', 'ALK', '', ''),
('ALLIANZ', 11, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.0000', 'NZ', 'ALL', '', ''),
('LINCOLN BENEFIT LIFE (VA)', 12, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.0000', 'BE', 'ALN', '', ''),
('ALLMERICA - PIONEER VISION', 13, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'IO', 'ALP', '', ''),
('ALLMERICA - SELECT', 14, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'SC', 'ALS', '', ''),
('AIM INVESTMENT SERVICES, INC.', 16, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'AM', 'AMV', '', ''),
('AMERICAN SKANDIA/PRUDENTIAL', 17, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'AA', 'ASL', '', ''),
('AMERICAN UNITED LIFE INSURANCE', 18, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'AM', 'AUL', '', ''),
('BEHRINGER HARVARD FUNDS', 19, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'AR', 'BEH', '', ''),
('DIVIDEND CAPITAL TRUST', 20, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'TR', 'CAP', '', ''),
('CENTENNIAL FUNDS', 21, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'TE', 'CEN', '', ''),
('UNION BANK AND TRUST', 22, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'NE', 'CGE', '', ''),
('CNL (REIT)', 23, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'RT', 'CNL', '', ''),
('COLE CAPITAL REIT', 24, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'AP', 'COC', '', ''),
('JEFFERSON NATIONAL LIFE INS.', 25, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'CO', 'CON', '', ''),
('GE PRIVATE ASSET MANAGEMENT', 26, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'US', 'CTC', '', ''),
('FIDELITY ADVISOR OFFSHORE FUND', 27, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'FA', 'DBF', '', ''),
('IXIS ADVISOR FUNDS', 28, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'LS', 'DBF', '', ''),
('MAINSTAY', 29, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'MC', 'DBF', '', ''),
('NEUBERGER BERMAN', 30, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'NU', 'DBF', '', ''),
('PHOENIX EQUITY PLANNING CORP', 31, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'PH', 'DBF', '', ''),
('COLUMBIA 529 PLAN', 32, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'CG', 'DFE', '', ''),
('COLUMBIA NY 529 ADVISOR PLAN', 33, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'CN', 'DFE', '', ''),
('DODGE & COX FUNDS', 34, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'DC', 'DFE', '', ''),
('FRANK RUSSELL', 35, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'RA', 'DFE', '', ''),
('SELECTED FUNDS', 36, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'SL', 'DFE', '', ''),
('HIGHMARK FUNDS', 37, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.5000', 'SN', 'DFE', '', ''),
('DAVIS FUNDS', 38, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'VE', 'DFE', '', ''),
('HARTFORD MUTUAL FUNDS', 39, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'FA', 'DFH', '', ''),
('TAMARACK MUTUAL FUNDS', 40, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'JB', 'DFH', '', ''),
('JOHN HANCOCK FREEDOM 529', 41, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'ML', 'DFI', '', ''),
('T. ROWE PRICE', 42, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'RP', 'DFI', '', ''),
('ALLEGIANT FUNDS', 43, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'AD', 'DFR', '', ''),
('AMERICAN BEACON FUNDS', 44, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'AI', 'DFR', '', ''),
('GAM FUNDS', 45, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'GA', 'DFR', '', ''),
('GOLDMAN SACHS B (DFR/GI)', 46, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'GI', 'DFR', '', ''),
('GOLDMAN SACHS A (DFR/GO)', 47, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'GO', 'DFR', '', ''),
('CREDIT SUISSE FUNDS', 48, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'WP', 'DFR', '', ''),
('FEDERATED SERVICES CORP', 49, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'CM', 'DFS', '', ''),
('MARSHALL FUNDS', 50, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'MR', 'DFS', '', ''),
('ALGER FUNDS', 51, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'AL', 'DFY', '', ''),
('FIDELITY DESTINY CONTRACTUALS', 52, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'FV', 'DFY', '', ''),
('NUVEEN MUTUAL FUNDS-DST', 53, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'NV', 'DFY', '', ''),
('WELLS FARGO', 54, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'WE', 'DFY', '', ''),
('EDVEST / TOMORROW SCHOLAR 529', 55, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'WI', 'DFY', '', ''),
('TIAA-CREF 529 PLAN - CALIFORNI', 56, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'CK', 'DFZ', '', ''),
('TIAA-CREF 529 PLAN - MICHIGAN', 57, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'EM', 'DFZ', '', ''),
('TIAA-CREF 529 PLAN - GEORGIA', 58, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'GH', 'DFZ', '', ''),
('TIAA-CREF 529 PLAN-CONNECTICUT', 59, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'HE', 'DFZ', '', ''),
('TIAA-CREF 529 PLAN - IDAHO', 60, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'ID', 'DFZ', '', ''),
('TIAA-CREF 529 PLAN - KENTUCKY', 61, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'KA', 'DFZ', '', ''),
('LAZARD FUNDS', 62, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'LF', 'DFZ', '', ''),
('TIAA-CREF 529 PLAN - MISSOURI', 63, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'MH', 'DFZ', '', ''),
('TIAA-CREF 529 PLAN-MISSISSIPPI', 64, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'MJ', 'DFZ', '', ''),
('TIAA-CREF 529 PLAN - MINNESOTA', 65, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'MN', 'DFZ', '', ''),
('SCHOLARS EDGE 529 PLAN', 66, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'OC', 'DFZ', '', ''),
('TIAA-CREF 529 PLAN - OKLAHOMA', 67, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'OE', 'DFZ', '', ''),
('TIAA-CREF', 68, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'TI', 'DFZ', '', ''),
('TIAA-CREF 529 PLAN-TENNESSEE', 69, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'TS', 'DFZ', '', ''),
('TIAA-CREF 529 PLAN - VERMONT', 70, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'VT', 'DFZ', '', ''),
('DELAWARE INVESTMENTS - DST', 71, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'DG', 'DLW', '', ''),
('ING FUNDS', 72, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'EA', 'DST', '', ''),
('LORD, ABBETT & CO', 73, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'LA', 'DST', '', ''),
('OLD MUTUAL ADVISOR FUNDS', 74, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'OC', 'DST', '', ''),
('VAN ECK', 75, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'VE', 'DST', '', ''),
('AMERICAN FUNDS', 76, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.0000', 'CR', 'DTC', '', ''),
('DWS SCUDDER', 77, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'SS', 'DTG', '', ''),
('CALVERT FUNDS', 78, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'CG', 'DTJ', '', ''),
('ENTERPRISE GROUP', 79, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'EN', 'DTJ', '', ''),
('GUARDIAN INVESTOR SERVICES LLC', 80, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'GI', 'DTJ', '', ''),
('ICON FUNDS', 81, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'IC', 'DTJ', '', ''),
('AIG SUNAMERICA ASSET MGMT', 82, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'IN', 'DTJ', '', ''),
('ROYCE FUNDS, THE', 83, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'QA', 'DTJ', '', ''),
('RS INVESTMENTS', 84, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'RS', 'DTJ', '', ''),
('THORNBURG', 85, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'TH', 'DTJ', '', ''),
('VALUE LINE', 86, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'VL', 'DTJ', '', ''),
('WM GROUP OF FUNDS', 87, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'WM', 'DTJ', '', ''),
('VAN KAMPEN', 88, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'AG', 'DTK', '', ''),
('ALLIANCEBERNSTEIN INVESTMENTS', 89, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'AT', 'DTN', '', ''),
('FOUNDERS', 90, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'FO', 'DTO', '', ''),
('TRANSAMERICA-IDEX', 91, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'IM', 'DTO', '', ''),
('SECURITY FUNDS', 92, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'SB', 'DTO', '', ''),
('SENTINEL FUNDS', 93, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'SF', 'DTO', '', ''),
('ARIEL MUTUAL FUNDS', 94, '', 'ARIEL MUTUAL FUNDS ADDR1', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.0000', 'AR', 'DTP', '', '(760)555-1522'),
('JP', 95, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.0000', 'CM', 'DTP', '', ''),
('COLLEGE CHOICE 529 INVEST PLAN', 96, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'IO', 'DTP', '', ''),
('PIMCO FUNDS', 97, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'PI', 'DTP', '', ''),
('FIRST EAGLE FUNDS', 98, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'SO', 'DTP', '', ''),
('DUNHAM & ASSOCIATES', 99, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'AS', 'DUN', '', ''),
('EATON VANCE', 100, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'ON', 'EAT', '', ''),
('EMERALD FUNDS', 101, '', 'EMERALD ADDRESS1', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.0000', 'LD', 'EMR', '', ''),
('AXA EQUITABLE', 102, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'IT', 'EQU', '', ''),
('ALLSTATE VARIABLE ANNUITY', 103, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'TS', 'ETA', '', ''),
('EVERBANK', 104, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'RB', 'EVE', '', ''),
('EVERGREEN FUNDS', 105, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'EV', 'EVG', '', ''),
('FIDELITY ADVISOR FUNDS', 106, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'FA', 'FID', '', ''),
('FLEX FUNDS', 107, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'FX', 'FLX', '', ''),
('UNION/TIME', 108, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'TI', 'FOR', '', ''),
('FIRST TRUST PORTFOLIOS 2', 109, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'OR', 'FPT', '', ''),
('FRANKLIN/TEMPLETON FUNDS', 110, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'FF', 'FTG', '', ''),
('FIRST TRUST PORTFOLIOS LP', 111, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'OR', 'FTP', '', ''),
('ING VARIABLE ANNUITIES', 112, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'GA', 'GAL', '', ''),
('GENWORTH FINANCIAL', 113, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'CA', 'GEE', '', ''),
('ANNUITY INVESTORS LIFE INS. CO', 114, '', 'ANNUITY INVESTORS UPD', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.0000', 'IC', 'GLA', '', ''),
('GUARDIAN LIFE INS. COMPANY', 115, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'CV', 'GLI', '', ''),
('HARTFORD LIFE', 116, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'TT', 'HAR', '', ''),
('HINES REIT', 117, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'ES', 'HIN', '', ''),
('HARBOR FUNDS', 118, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'OR', 'HRB', '', ''),
('INLAND REIT', 119, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'ND', 'INL', '', ''),
('INTEGRITY COMPANIES', 120, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'GR', 'INT', '', ''),
('JOHN HANCOCK FUNDS', 121, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'JH', 'JHK', '', ''),
('JACKSON NATIONAL LIFE 1', 122, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'IL', 'JNL', '', ''),
('JANUS ASPEN FUNDS', 123, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'AP', 'JSC', '', ''),
('JANUS ADVISOR SERIES CLASS I', 124, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'AV', 'JSC', '', ''),
('JANUS ADVISOR SERIES CLASS C', 125, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'CS', 'JSC', '', ''),
('JANUS SERVICE CORP', 126, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'JM', 'JSC', '', ''),
('LINCOLN BENEFIT LIFE (VUL)', 127, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'VU', 'LBN', '', ''),
('COLUMBIA FUNDS', 128, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'LF', 'LFS', '', ''),
('LINCOLN FINANCIAL GROUP', 129, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'NN', 'LNA', '', ''),
('MFS', 130, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'FM', 'MAS', '', ''),
('MFS INSTITUTIONAL FUNDS', 131, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'IC', 'MAS', '', ''),
('MFS VARIABLE INSURANCE TRUST', 132, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'UF', 'MAS', '', ''),
('MIDLAND NATIONAL LIFE VA', 133, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'VA', 'MDL', '', ''),
('METLIFE INVESTORS', 134, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'VA', 'MET', '', ''),
('TOUCHSTONE FUNDS', 135, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'MW', 'MID', '', ''),
('DREYFUS', 136, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'DY', 'MJR', '', ''),
('MMA PRAXIS', 137, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'PS', 'MMA', '', ''),
('MASS MUTUAL VARIABLE ANNUITY', 138, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'MT', 'MMS', '', ''),
('MONY GROUP', 139, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'GR', 'MON', '', ''),
('JOHN HANCOCK LIFE INS CO (USA)', 140, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'HH', 'NAS', '', ''),
('NATIONWIDE', 141, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'QR', 'NAW', '', ''),
('NEW YORK LIFE-MAINSTAY ANNUIT', 142, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'YL', 'NEW', '', ''),
('PUTNAM ALLSTATE ADVISOR OF NY', 143, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'AL', 'NYC', '', ''),
('OHIO NATIONAL EQUITY SALES/ON', 144, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'ON', 'OHI', '', ''),
('OPPENHEIMERFUNDS', 145, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'HE', 'OPP', '', ''),
('PACIFIC LIFE', 146, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.0000', 'PI', 'PCF', '', ''),
('PEOPLES/TRANSAMERICA (CR)', 147, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'CR', 'PCM', '', ''),
('PEOPLES BENEFIT LIFE', 148, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'LL', 'PCM', '', ''),
('PENN MUTUAL', 149, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'KK', 'PEN', '', ''),
('PENN STREET FUNDS', 150, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'IT', 'PES', '', ''),
('PIONEER FUNDS - DOMESTIC', 151, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'PM', 'PIM', '', ''),
('ALLIANZ LIFE OF NEW YORK', 152, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'NY', 'PLO', '', ''),
('PROVIDENT MUTUAL', 153, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'NT', 'POO', '', ''),
('PROFUNDS', 154, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'FN', 'PRO', '', ''),
('PROTECTIVE LIFE', 155, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'LE', 'PRT', '', ''),
('PUTNAM', 156, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'RS', 'PUT', '', ''),
('PHOENIX HOME LIFE', 157, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'VA', 'PXL', '', ''),
('QUAKER FUNDS', 158, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'KR', 'QUA', '', ''),
('REDWOOD MORTGAGE INVESTORS VII', 159, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'WD', 'RED', '', ''),
('SECURITY BENEFIT LIFE', 160, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'MM', 'SBL', '', ''),
('KEMPER INVESTORS - SCUDDER', 161, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'DS', 'SCU', '', ''),
('SEI', 162, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'GG', 'SEI', '', ''),
('SE2 - ALLMERICA DELAWARE', 163, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'EL', 'SEZ', '', ''),
('SE2 - ALLMERICA SCUDDER', 164, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'EM', 'SEZ', '', ''),
('SE2 - ALLMERICA PIONEER VISION', 165, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'IO', 'SEZ', '', ''),
('SE2 - ALLMERICA SELECT', 166, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'SC', 'SEZ', '', ''),
('SYMETRA FINANCIAL', 167, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'CO', 'SFE', '', ''),
('ACCESS ONE TRUST (PROFUNDS)', 168, '', 'CHANGES MADE', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.0000', 'AT', 'SGD', '', ''),
('GARTMORE FUNDS', 169, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'GT', 'SGD', '', ''),
('STRATEGIC PRTNS / JENNISON FND', 170, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'ND', 'SKA', '', ''),
('SUN LIFE FINANCIAL', 171, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'CA', 'SLF', '', ''),
('STEBEN & COMPANY, INC.', 172, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'EN', 'STB', '', ''),
('PUTNAM ALLSTATE ADVISOR', 173, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'AL', 'STE', '', ''),
('AIG SUNAMERICA LIFE ASSURANCE', 174, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'PA', 'SUN', '', ''),
('TIAA-CREF VARIABLE ANNUITY', 175, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'VA', 'TIA', '', ''),
('THE TIMOTHY PLAN', 176, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'PL', 'TIM', '', ''),
('TRAVELERS LIFE & ANNUITY', 177, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'VL', 'TRA', '', ''),
('TRIPLE NET PROPERTIES PUBLIC P', 178, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'PA', 'TRI', '', ''),
('TRIPLE NET PROPERTIES', 179, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'LE', 'TRP', '', ''),
('TOUCHSTONE VARIABLE ANNUITY', 180, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'LW', 'TSV', '', ''),
('ALPINE FUNDS', 181, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'AL', 'USB', '', ''),
('CALAMOS FUNDS', 182, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'CA', 'USB', '', ''),
('FIRST AMERICAN FUNDS', 183, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'FA', 'USB', '', ''),
('KENSINGTON MUTUAL FUNDS', 184, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'KN', 'USB', '', ''),
('MOSAIC FUNDS', 185, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'MS', 'USB', '', ''),
('OLSTEIN FUNDS', 186, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'OL', 'USB', '', ''),
('DIREXION FUNDS', 187, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'PO', 'USB', '', ''),
('TCW FUNDS', 188, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'TG', 'USB', '', ''),
('FUND*X UPGRADER FUNDS', 189, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'TI', 'USB', '', ''),
('WADDELL & REED', 190, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'WR', 'WDR', '', ''),
('WP CAREY', 191, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'AR', 'WPC', '', ''),
('WELLS REIT/LP PRODUCTS', 192, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'RE', 'WRE', '', ''),
('WELLS S&P REIT INDEX FUND', 193, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'WF', 'WRF', '', ''),
('WESTERN RESERVE LIFE', 194, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'AE', 'WRL', '', ''),
('WESTERN RESERVE LIFE (VA2)', 195, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'VA', 'WRL', '', ''),
('WESTERN RESERVE LIFE (VUL)', 196, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'VU', 'WST', '', ''),
('PERSHING', 197, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, '', 'PER', '', ''),
('WELLS REIT', 198, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.0000', 'NY', 'WRE', '', ''),
('SUNAMERICA', 199, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.0000', '', '', '', ''),
('AIM', 200, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.0000', '', '', '', ''),
('AXA', 201, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.0000', '', '', '', ''),
('ALLIANCE', 202, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.0000', '', '', '', ''),
('AMCAP', 203, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.0000', '', '', '', ''),
('U.S.GOVERNMENT', 204, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.0000', '', '', '', ''),
('AMERISTOCK', 205, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.0000', '', '', '', ''),
('BLACKROCK', 206, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.0000', '', '', '', ''),
('BOND', 207, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.0000', '', '', '', ''),
('OPPENHEIMER', 208, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.0000', '', '', '', ''),
('BRAZOS', 209, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.0000', '', '', '', ''),
('CALIFORNIA', 210, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.0000', '', '', '', ''),
('CAPITAL', 211, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.0000', '', '', '', ''),
('DELAWARE', 212, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.0000', '', '', '', ''),
('DIAMOND', 213, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.0000', '', '', '', ''),
('DRYDEN', 214, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.0000', '', '', '', ''),
('EATON', 215, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.0000', '', '', '', ''),
('FORWARD', 216, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.0000', '', '', '', ''),
('EUROPACIFIC', 217, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.0000', '', '', '', ''),
('FBA', 218, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.0000', '', '', '', ''),
('FPA', 219, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.0000', '', '', '', ''),
('U.S. GOVERNMENT', 220, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.0000', '', '', '', ''),
('ATEL', 221, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.0000', '', '', '', ''),
('FEDERATED', 222, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.0000', '', '', '', ''),
('FIDELITY', 223, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.0000', '', '', '', ''),
('U.S.', 224, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.0000', '', '', '', ''),
('FBR', 225, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.0000', '', '', '', ''),
('FIRST', 226, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.0000', '', '', '', ''),
('JP MORGAN MID CAP VALUE', 227, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.0000', '', '', '', ''),
('FRANKLIN', 228, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.0000', '', '', '', ''),
('GOLDMAN', 229, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.0000', '', '', '', ''),
('GROWTH', 230, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.0000', '', '', '', ''),
('JOHN', 231, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.0000', '', '', '', ''),
('HARTFORD', 232, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.0000', '', '', '', ''),
('FUNDAMENTAL', 233, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.0000', '', '', '', ''),
('OAKMARK', 234, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.0000', '', '', '', ''),
('HIGHLAND', 235, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.0000', '', '', '', ''),
('HOTCHKIS', 236, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.0000', '', '', '', ''),
('HUSSMAN', 237, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.0000', '', '', '', ''),
('INCOME', 238, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.0000', '', '', '', ''),
('INTERMEDIATE', 239, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.0000', '', '', '', ''),
('INVESTMENT', 240, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.0000', '', '', '', ''),
('IVY', 241, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.0000', '', '', '', ''),
('JANUS', 242, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.0000', '', '', '', ''),
('JENNISON', 243, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.0000', '', '', '', ''),
('LORD', 244, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.0000', '', '', '', ''),
('MUTUAL', 245, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.0000', '', '', '', ''),
('MUNDER', 246, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.0000', '', '', '', ''),
('IXIS', 247, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.0000', '', '', '', ''),
('LEGG', 248, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.0000', '', '', '', ''),
('MASSACHUSETTS', 249, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.0000', '', '', '', ''),
('*MERIDIANEDITEST2', 250, 'NFSNO', 'ADDR1UPDATE', 'ADDR2UPDATE2', 'XXXADDR3', 'ADDR4', 'ADDR5', 'PHONE', 'CONTACT', 'FAX', 'EMAIL', 'WEBSITE', 'MRKT_PHONE', 'MRKT_CONT', 'OPER_PHONE', 'OPER_CONT', '0.9911', 'MG', 'SYS', 'OTHER_CONT123', 'OTHER_PHONE'),
('NEW', 251, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.0000', '', '', '', ''),
('WHITE', 252, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.0000', '', '', '', ''),
('RED', 253, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.0000', '', '', '', ''),
('OLD', 254, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.0000', '', '', '', ''),
('PIONEER', 255, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.0000', '', '', '', ''),
('PRINCIPAL', 256, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.0000', '', '', '', ''),
('ROCHESTER', 257, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.0000', '', '', '', ''),
('T', 258, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.0000', '', '', '', ''),
('RYDEX', 259, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.0000', '', '', '', ''),
('SELIGMAN', 260, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.0000', '', '', '', ''),
('LOOMIS', 261, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.0000', '', '', '', ''),
('PRUDENT', 262, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.0000', '', '', '', ''),
('SMALLCAP', 263, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.0000', '', '', '', ''),
('TAX-EXEMPT', 264, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.0000', '', '', '', ''),
('TEMPLETON', 265, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.0000', '', '', '', ''),
('TOCQUEVILLE', 266, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.0000', '', '', '', ''),
('VAN', 267, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.0000', '', '', '', ''),
('VANGUARD', 268, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.0000', '', '', '', ''),
('WASATCH', 269, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.0000', '', '', '', ''),
('WASHINGTON', 270, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.0000', '', '', '', ''),
('*WEITZ', 271, 'TZ', 'DADFD', 'WEITZ ADD2', '', '', '', '', '', '', '', '', '', '', '', '', '0.0000', '*E', '*WE', '', ''),
('WELLS', 272, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.0000', '', '', '', ''),
('LIMITED', 273, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.0000', '', '', '', ''),
('DODGE', 274, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.0000', '', '', '', ''),
('CASH', 275, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.0000', '', '', '', ''),
('EXCELSIOR', 276, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.0000', '', '', '', ''),
('PL', 277, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.0000', '', '', '', ''),
('RS', 278, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.0000', '', '', '', ''),
('PHOENIX', 279, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.0000', '', '', '', ''),
('CREDIT PARTNERSHIPS', 280, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.0000', '', '', '', ''),
('EHV', 281, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.0000', '', '', '', ''),
('ABN AMRO', 282, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.0000', '', '', '', ''),
('TEST', 283, '', 'A', 'DDA', '', '', '', '', '', '', '', '', '', '', '', '', '0.0000', 'B', 'A', '', ''),
('TEST SPONS I', 284, '', '', '', '', '', '', '', '', '', '', '', '', '', '(012)320-09', '01/23/200901/23/200901/23/200901/23', '0.0000', '', '', '1', '(123)123-1321'),
('DAIN', 1, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, '', '', '', ''),
('NFS', 285, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, '', '', '', ''),
('JACKSON', 286, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, '', '', '', ''),
('TEST SPONSOR', 287, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.0000', '', '', '', ''),
('ORION ADVISOR SERVICES', 288, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.0000', '', '', '', ''),
('INVENTRUST', 289, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.0000', 'IA', 'DST', '', ''),
('ICON CAPITAL LLC', 290, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.0000', 'IO', 'DST', '', ''),
('PROVASI CAPITAL PARTNERS', 291, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.0000', 'BH', 'DST', '', ''),
('CNL DISTRIBUTED PRODUCTS', 292, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.0000', 'LC', 'DTJ', '', ''),
('KBS REAL ESTATE', 293, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.0000', 'KB', 'DST', '', ''),
('GRIFFIN CAPITAL COMPANIES', 294, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.0000', 'GF', 'DST', '', ''),
('PUTNAM INVESTMENTS', 295, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.0000', 'PI', 'PMF', '', ''),
('TD AMERITRADE', 296, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.0000', '', '', '', ''),
('SCHWAB', 297, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.0000', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `configuration`
--

CREATE TABLE `configuration` (
  `id` int(12) NOT NULL,
  `display_trail_commission` tinyint(1) NOT NULL DEFAULT '0',
  `display_licenses_report` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `configuration`
--

INSERT INTO `configuration` (`id`, `display_trail_commission`, `display_licenses_report`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customerID` int(11) NOT NULL,
  `customerName` varchar(200) NOT NULL,
  `webpath` varchar(50) NOT NULL,
  `lastImportDate` datetime DEFAULT NULL,
  `odbcdsn` varchar(50) DEFAULT NULL,
  `fieldList_acctPos` varchar(1000) DEFAULT NULL,
  `fieldList_clients` varchar(1000) DEFAULT NULL,
  `fieldList_permrep` varchar(1000) DEFAULT NULL,
  `fieldList_trades` varchar(1000) DEFAULT NULL,
  `fieldList_branches` varchar(1000) DEFAULT NULL,
  `fieldList_acctBal` varchar(1000) DEFAULT NULL,
  `fieldList_clearing` varchar(1000) DEFAULT NULL,
  `fileProcessed_acctPos` tinyint(1) DEFAULT NULL,
  `fileProcessed_clients` tinyint(1) DEFAULT NULL,
  `fileProcessed_permrep` tinyint(1) DEFAULT NULL,
  `fileProcessed_trades` tinyint(1) DEFAULT NULL,
  `fileProcessed_branches` tinyint(1) DEFAULT NULL,
  `fileProcessed_acctBal` tinyint(1) DEFAULT NULL,
  `fileProcessed_clearing` tinyint(1) DEFAULT NULL,
  `logoFile` varchar(100) DEFAULT NULL,
  `homeURL` varchar(200) DEFAULT NULL,
  `accessPhone` varchar(50) DEFAULT NULL,
  `testfield` tinyint(1) DEFAULT NULL,
  `fieldList_clipol` varchar(1000) DEFAULT NULL,
  `fieldList_clisuit` varchar(1000) DEFAULT NULL,
  `fileProcessed_clipol` tinyint(1) DEFAULT NULL,
  `fileProcessed_clisuit` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `importlog`
--

CREATE TABLE `importlog` (
  `importID` int(11) NOT NULL,
  `customerID` int(11) NOT NULL,
  `success` tinyint(1) NOT NULL,
  `message` varchar(500) DEFAULT NULL,
  `logDateTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `invest`
--

CREATE TABLE `invest` (
  `investID` int(11) NOT NULL,
  `invest` varchar(35) NOT NULL,
  `customerID` int(11) NOT NULL,
  `lastModifiedDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `permrep`
--

CREATE TABLE `permrep` (
  `REP_NO` int(11) DEFAULT NULL,
  `CLEAR_NO` varchar(10) DEFAULT NULL,
  `FNAME` varchar(20) DEFAULT NULL,
  `LNAME` varchar(20) DEFAULT NULL,
  `MIDDLE` varchar(1) DEFAULT NULL,
  `SUFFIX` varchar(3) DEFAULT NULL,
  `H_ADDR` varchar(30) DEFAULT NULL,
  `H_CITY` varchar(24) DEFAULT NULL,
  `H_STATE` varchar(2) DEFAULT NULL,
  `H_ZIP` varchar(10) DEFAULT NULL,
  `M_ADDR` varchar(30) DEFAULT NULL,
  `M_ADDR2` varchar(30) DEFAULT NULL,
  `M_CITY` varchar(24) DEFAULT NULL,
  `M_STATE` varchar(2) DEFAULT NULL,
  `M_ZIP` varchar(10) DEFAULT NULL,
  `W_PHONE` varchar(13) DEFAULT NULL,
  `H_PHONE` varchar(13) DEFAULT NULL,
  `FAX` varchar(13) DEFAULT NULL,
  `SOC_SEC` varchar(11) DEFAULT NULL,
  `TAXID` varchar(10) DEFAULT NULL,
  `EMP_DATE` varchar(19) DEFAULT NULL,
  `CRD_NO` varchar(7) DEFAULT NULL,
  `TERM_DATE` varchar(19) DEFAULT NULL,
  `LP_STATES` varchar(54) DEFAULT NULL,
  `MUT_STATES` varchar(54) DEFAULT NULL,
  `SEC_STATES` varchar(54) DEFAULT NULL,
  `VA_STATES` varchar(54) DEFAULT NULL,
  `FA_STATES` varchar(54) DEFAULT NULL,
  `L_STATES` varchar(54) DEFAULT NULL,
  `RIA_STATES` varchar(54) DEFAULT NULL,
  `BRANCH` varchar(10) DEFAULT NULL,
  `BRANCH_NO` varchar(5) DEFAULT NULL,
  `OVERRIDE` int(11) DEFAULT NULL,
  `OVER_RATE` decimal(8,3) DEFAULT NULL,
  `OVERRIDE2` int(11) DEFAULT NULL,
  `OVER2_RATE` decimal(8,3) DEFAULT NULL,
  `OVERRIDE3` int(11) DEFAULT NULL,
  `OVER3_RATE` decimal(8,3) DEFAULT NULL,
  `DOB` varchar(19) DEFAULT NULL,
  `PAYTYPE` int(11) DEFAULT NULL,
  `NOTES` varchar(100) DEFAULT NULL,
  `EQUI_ACCT` varchar(9) DEFAULT NULL,
  `COMMBASIS` tinyint(4) DEFAULT NULL,
  `FRN_DOM` bigint(20) DEFAULT NULL,
  `SECCALC` int(11) DEFAULT NULL,
  `BRANCH1` varchar(5) DEFAULT NULL,
  `BRANCH2` varchar(5) DEFAULT NULL,
  `BRANCH3` varchar(5) DEFAULT NULL,
  `PAY_TOT` decimal(12,2) DEFAULT NULL,
  `GROSS_TOT` decimal(12,2) DEFAULT NULL,
  `SEC_CALC` bigint(20) DEFAULT NULL,
  `DEFER_AMT` decimal(10,2) DEFAULT NULL,
  `SPL_REP` int(11) DEFAULT NULL,
  `SPL_RATE` decimal(8,3) DEFAULT NULL,
  `SPL_REP2` int(11) DEFAULT NULL,
  `SPL2_RATE` decimal(8,3) DEFAULT NULL,
  `EMAIL` varchar(25) DEFAULT NULL,
  `WEBPSWD` varchar(8) DEFAULT NULL,
  `INSUR` int(11) DEFAULT NULL,
  `CFP` tinyint(4) DEFAULT NULL,
  `CFA` tinyint(4) DEFAULT NULL,
  `CLU` tinyint(4) DEFAULT NULL,
  `CPA` tinyint(4) DEFAULT NULL,
  `CHFA` tinyint(4) DEFAULT NULL,
  `SAL_NO` varchar(20) DEFAULT NULL,
  `USERNAME` varchar(8) DEFAULT NULL,
  `ACCESSLEVE` int(11) DEFAULT NULL,
  `CUSTOMERID` bigint(20) DEFAULT NULL,
  `EDIT_DATE` varchar(19) DEFAULT NULL,
  `BND_STATES` varchar(54) DEFAULT NULL,
  `OPT_STATES` varchar(54) DEFAULT NULL,
  `REP_LINK` varchar(10) DEFAULT NULL,
  `OSJMGR` varchar(11) DEFAULT NULL,
  `OSJMGR2` varchar(11) DEFAULT NULL,
  `DEFER_RATE` decimal(8,3) DEFAULT NULL,
  `RIA` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `permrep`
--

INSERT INTO `permrep` (`REP_NO`, `CLEAR_NO`, `FNAME`, `LNAME`, `MIDDLE`, `SUFFIX`, `H_ADDR`, `H_CITY`, `H_STATE`, `H_ZIP`, `M_ADDR`, `M_ADDR2`, `M_CITY`, `M_STATE`, `M_ZIP`, `W_PHONE`, `H_PHONE`, `FAX`, `SOC_SEC`, `TAXID`, `EMP_DATE`, `CRD_NO`, `TERM_DATE`, `LP_STATES`, `MUT_STATES`, `SEC_STATES`, `VA_STATES`, `FA_STATES`, `L_STATES`, `RIA_STATES`, `BRANCH`, `BRANCH_NO`, `OVERRIDE`, `OVER_RATE`, `OVERRIDE2`, `OVER2_RATE`, `OVERRIDE3`, `OVER3_RATE`, `DOB`, `PAYTYPE`, `NOTES`, `EQUI_ACCT`, `COMMBASIS`, `FRN_DOM`, `SECCALC`, `BRANCH1`, `BRANCH2`, `BRANCH3`, `PAY_TOT`, `GROSS_TOT`, `SEC_CALC`, `DEFER_AMT`, `SPL_REP`, `SPL_RATE`, `SPL_REP2`, `SPL2_RATE`, `EMAIL`, `WEBPSWD`, `INSUR`, `CFP`, `CFA`, `CLU`, `CPA`, `CHFA`, `SAL_NO`, `USERNAME`, `ACCESSLEVE`, `CUSTOMERID`, `EDIT_DATE`, `BND_STATES`, `OPT_STATES`, `REP_LINK`, `OSJMGR`, `OSJMGR2`, `DEFER_RATE`, `RIA`) VALUES
(2, 'HS23', 'JONES/ROBERTS', 'SPLIT', '', '', '2221 E. LONG LAKE ROAD', 'Troy', 'MI', '48085-0001', '691 COPPERTREE COURT', 'SUITE 21', 'SIMI VALLEY', 'CA', '93065', '', '(248)740-9999', '', '270-49-9999', '', '2010-09-15', '812768', NULL, '00101000000000000000000000000000000000000000000000', '00101000000000000000000000000000000000000000000000', '00101000000000000000000000000000000000000000000000', '00101000000000000000000000000000000000000000000000', '00101000000000000000000000000000000000000000000000', '00101000000000000000000000000000000000000000000000', '00100000000000000000000000000000000000000000000000', 'BOULDER CI', '01001', 0, '0.000', 0, '0.000', 0, '0.000', NULL, 0, 'F', '', 1, 2, 1, '01001', '', '', '0.00', '0.00', 0, '0.00', 0, '0.000', 0, '0.000', '', 'rsample', 1, 1, 1, 1, 1, 1, '', 'rsample', 0, NULL, '00:00:00', '00101000000000000000000000000000000000000000000000', '00101000000000000000000000000000000000000000000000', '', '          0', '', '0.000', 1),
(1, 'B116', 'JIM', 'JONES', '', '', '8722 Almond Dr.', 'Troy', 'MI', '48098-', '1199 E. Long Lake Rd.', 'Suite 250', 'Troy', 'MI', '48085-', '', '', '', '374-46-9999', '', NULL, '1744292', NULL, '001011101111111110011111100101111011110100110111011', '001011101111111110011111100101111011110100110111011', '001011101111111110011111100101111011110100110111011', '001011101111111110011111100101111011110100110111011', '000000000000000000000000000000000000000000000000000000', '000000000000000000000000000000000000000000000000000000', '00001000000000000000000000000000000000000000000000', 'BOULDER CI', '01001', 0, '0.000', 0, '0.000', 0, '0.000', '1947-03-05', 1, 'F', '', 1, 2, 1, '01001', '', '', '0.00', '0.00', 0, '0.00', 0, '0.000', 0, '0.000', '', 'rsample', 0, 1, 0, 0, 0, 0, '', 'rsample', 0, NULL, '00:00:00', '001011101111111110011111100101111011110100110111011', '001011101111111110011111100101111011110100110111011', '', '          0', '', '0.000', 1),
(3, 'MK908', 'AL', 'ROBERTS', 'M', '', '46999 Oliver Dr.', 'Shelby Township', 'MI', '48315-', '1199 E. Long Lake Rd.', 'Suite 250', 'Troy', 'MI', '48085-', '', '', '', '364-76-9999', '', '2010-08-13', '1832751', NULL, '0000100000000000000000000000000000000000000000000000', '1011111111011111111111111000000000010000001000000000', '1011111111011111111111111000000000000000000000000000', '00011000010000000000000000000000000100000010000000', '000000000000000000000000000000000000000000000000000000', '000000000000000000000000000000000000000000000000000000', '000000000000000000000000000000000000000000000000000000', 'BOULDER CI', '01001', 0, '0.000', 0, '0.000', 0, '0.000', '1961-10-29', 1, 'F', '', 1, 2, 1, '01001', '', '', '0.00', '0.00', 0, '0.00', 1, '0.500', 0, '0.000', '', 'btest', 1, 0, 0, 0, 1, 0, '', 'btest', 0, NULL, '00:00:00', '1011111111011111111111111000000000000000000000000000', '101111111101111111111111100000000000000000000000000000', '', '          0', '', '0.000', 1),
(4, '476023', 'TIM', 'JOHNSON', 'Q', '', '1234 Anystreet', 'New York', 'NY', '00123-1324', '', '', '', '', '', '', '', '', '', '', NULL, '812768', NULL, '00101000000000000000000000000000000000000000000000', '00101000000000000000000000000000000000000000000000', '00101000000000000000000000000000000000000000000000', '00101000000000000000000000000000000000000000000000', '0010100000000000110000000000000100110100110000010110', '00101000000000000000000000000000000000000000000000', '00100000000000000000000000000000000000000000000000', 'BOULDER CI', '01001', 1, '0.010', 0, '0.000', 0, '0.000', NULL, 0, 'F', '', 1, 2, 1, '01001', '', '', '0.00', '0.00', 0, '0.00', 0, '0.000', 0, '0.000', '', '', 0, 0, 0, 0, 0, 0, '', '', 0, NULL, '00:00:00', '0011111000000000000000000000100110000000000000000000', '00101000000000000000000000000000000000000000000000', '', '          0', '', '0.000', 0);

-- --------------------------------------------------------

--
-- Table structure for table `prodtype`
--

CREATE TABLE `prodtype` (
  `PRODUCT` varchar(35) DEFAULT NULL,
  `ABBREV` varchar(3) DEFAULT NULL,
  `INV_TYPE` tinyint(4) DEFAULT NULL,
  `REQ_DOCS` varchar(100) DEFAULT NULL,
  `COMMDBF` varchar(10) DEFAULT NULL,
  `COMMIDX1` varchar(10) DEFAULT NULL,
  `COMMIDX2` varchar(10) DEFAULT NULL,
  `BATCHDBF` varchar(10) DEFAULT NULL,
  `BATCHIDX` varchar(10) DEFAULT NULL,
  `PRODDBF` varchar(10) DEFAULT NULL,
  `PRODIDX1` varchar(10) DEFAULT NULL,
  `PRODIDX2` varchar(10) DEFAULT NULL,
  `GROUPING` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `prodtype`
--

INSERT INTO `prodtype` (`PRODUCT`, `ABBREV`, `INV_TYPE`, `REQ_DOCS`, `COMMDBF`, `COMMIDX1`, `COMMIDX2`, `BATCHDBF`, `BATCHIDX`, `PRODDBF`, `PRODIDX1`, `PRODIDX2`, `GROUPING`) VALUES
('ALTERNATIVE INVESTMENTS', 'LP', 1, '', 'lpcomm', 'lp_no', 'lprepno', 'lpbatch', 'batchlp', 'partname', 'partname', 'partnum', 'LIMITED PARTNERSHIPS'),
('MUTUAL FUNDS', 'MF', 20, '012020', 'mutcomm', 'mut_no', 'mutrepno', 'mutbatch', 'batchmut', 'mutname', 'mutname', 'mutnum', 'MUTUAL FUNDS'),
('STOCKS', 'S', 21, '', 'stkcomm', 'sec_no', 'secrepno', 'secbatch', 'batchsec', 'stocks', 'stockname', 'stocknum', 'GENERAL SECURITIES'),
('BONDS', 'B', 22, '', 'stkcomm', 'sec_no', 'secrepno', 'secbatch', 'batchsec', 'bonds', 'bondname', 'bondnum', 'GENERAL SECURITIES'),
('OPTIONS', 'O', 23, '', 'stkcomm', 'sec_no', 'secrepno', 'secbatch', 'batchsec', 'stocks', 'stockname', 'stocknum', 'GENERAL SECURITIES'),
('UNIT INVESTMENT TRUSTS', 'UIT', 30, '', 'stkcomm', 'sec_no', 'secrepno', 'secbatch', 'batchsec', 'uit', 'uitname', 'uitnum', 'GENERAL SECURITIES'),
('CERTIFICATES OF DEPOSIT', 'CD', 28, '', 'stkcomm', 'sec_no', 'secrepno', 'secbatch', 'batchsec', 'uit', 'uitname', 'uitnum', 'GENERAL SECURITIES'),
('VARIABLE ANNUITIES', 'VA', 24, '', 'vacomm', 'va_no', 'varepno', 'vabatch', 'batchva', 'vannuity', 'vaname', 'vanum', 'VARIABLE ANNUITIES'),
('FIXED ANNUITIES', 'FA', 25, '', 'facomm', 'fa_no', 'farepno', 'fabatch', 'batchfa', 'fannuity', 'faname', 'fanum', 'FIXED ANNUTIES'),
('LIFE INSURANCE', 'L', 26, '', 'lifecomm', 'life_no', 'lirepno', 'lfbatch', 'batchlf', 'life', 'lifename', 'lifenum', 'INSURANCE'),
('MISCELLANEOUS', 'MI', 27, '', 'misccomm', 'misc_no', 'mirepno', 'msbatch', 'batchms', '', '', '', 'MISCELLANEOUS'),
('RIA', 'RIA', 29, '', 'riacomm', 'ria_no', 'riarepno', 'riabatch', 'batchria', 'ria', 'rianame', 'rianum', 'RIA'),
('VARIABLE UNIVERSAL LIFE', 'VUL', 31, '', 'lifecomm', 'life_no', 'lirepno', 'lfbatch', 'batchlf', 'life', 'lifename', 'lifenum', 'INSURANCE'),
('MUTUAL FUND 12B1 TRAILS', 'MFT', 40, '', 'mutcomm', 'mut_no', 'mutrepno', 'mutbatch', 'batchmut', 'mutname', 'mutname', 'mutnum', 'MUTUAL FUNDS'),
('VARIABLE ANNUITY 12B1 TRAILS', 'VAT', 41, '', 'vacomm', 'va_no', 'varepno', 'vabatch', 'batchva', 'vannuity', 'vaname', 'vanum', 'VARIABLE ANNUITIES'),
('529 PLANS', '529', 32, '', 'mutcomm', 'mut_no', 'mutrepno', 'mutbatch', 'batchmut', 'mutname', 'mutname', 'mutnum', 'MUTUAL FUNDS'),
('REITs', 'RT', 44, '', 'lpcomm', 'lp_no', 'lprepno', 'lpbatch', 'batchlp', 'partname', 'partname', 'partnum', 'LIMITED PARTNERSHIPS'),
('REIT 12B1 TRAILS', 'RTT', 43, '', 'lpcomm', 'lp_no', 'lprepno', 'lpbatch', 'batchlp', 'partname', 'partname', 'partnum', 'LIMITED PARTNERSHIPS');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `stateid` int(11) NOT NULL,
  `statename` varchar(30) NOT NULL,
  `stateabbrev` varchar(3) NOT NULL,
  `bitIndex` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`stateid`, `statename`, `stateabbrev`, `bitIndex`) VALUES
(1, 'Alabama', 'AL', NULL),
(2, 'Alaska', 'AK', NULL),
(3, 'Arizona', 'AZ', NULL),
(4, 'Arkansas', 'AR', NULL),
(5, 'California', 'CA', NULL),
(6, 'Colorado', 'CO', NULL),
(7, 'Connecticut', 'CT', NULL),
(8, 'Delaware', 'DE', NULL),
(9, 'Florida', 'FL', NULL),
(10, 'Georgia', 'GA', NULL),
(11, 'Hawaii', 'HI', NULL),
(12, 'Idaho', 'ID', NULL),
(13, 'Illinois', 'IL', NULL),
(14, 'Indiana', 'IN', NULL),
(15, 'Iowa', 'IA', NULL),
(16, 'Kansas', 'KS', NULL),
(17, 'Kentucky', 'KY', NULL),
(18, 'Louisiana', 'LA', NULL),
(19, 'Maine', 'ME', NULL),
(20, 'Maryland', 'MD', NULL),
(21, 'Massachusetts', 'MA', NULL),
(22, 'Michigan', 'MI', NULL),
(23, 'Minnesota', 'MN', NULL),
(24, 'Mississippi', 'MS', NULL),
(25, 'Missouri', 'MO', NULL),
(26, 'Montana', 'MT', NULL),
(27, 'Nebraska', 'NE', NULL),
(28, 'Nevada', 'NV', NULL),
(29, 'New Hampshire', 'NH', NULL),
(30, 'New Jersey', 'NJ', NULL),
(31, 'New Mexico', 'NM', NULL),
(32, 'New York', 'NY', NULL),
(33, 'North Carolina', 'NC', NULL),
(34, 'North Dakota', 'ND', NULL),
(35, 'Ohio', 'OH', NULL),
(36, 'Oklahoma', 'OK', NULL),
(37, 'Oregon', 'OR', NULL),
(38, 'Pennsylvania', 'PA', NULL),
(39, 'Rhode Island', 'RI', NULL),
(40, 'South Carolina', 'SC', NULL),
(41, 'South Dakota', 'SD', NULL),
(42, 'Tennessee', 'TN', NULL),
(43, 'Texas', 'TX', NULL),
(44, 'Utah', 'UT', NULL),
(45, 'Vermont', 'VT', NULL),
(46, 'Virginia', 'VA', NULL),
(47, 'Washington', 'WA', NULL),
(48, 'West Virginia', 'WV', NULL),
(49, 'Wisconsin', 'WI', NULL),
(50, 'Wyoming', 'WY', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `trades`
--

CREATE TABLE `trades` (
  `TRADE_NO` int(11) DEFAULT NULL,
  `DATE` varchar(19) DEFAULT NULL,
  `SET_DATE` varchar(19) DEFAULT NULL,
  `CLI_NO` varchar(11) DEFAULT NULL,
  `CLI_NAME` varchar(40) DEFAULT NULL,
  `INVEST` varchar(35) DEFAULT NULL,
  `INV_NO` int(11) DEFAULT NULL,
  `NET_AMT` decimal(12,2) DEFAULT NULL,
  `COMM_EXP` decimal(11,2) DEFAULT NULL,
  `COMM_REC` decimal(11,2) DEFAULT NULL,
  `FCOMM_REC2` decimal(11,2) DEFAULT NULL,
  `CHARGE` decimal(10,2) DEFAULT NULL,
  `DATE_REC` varchar(19) DEFAULT NULL,
  `PAY_DATE` varchar(19) DEFAULT NULL,
  `REP_COMM` decimal(12,2) DEFAULT NULL,
  `REP_NO` int(11) DEFAULT NULL,
  `SAL_NO` varchar(4) DEFAULT NULL,
  `BRANCH_MGR` varchar(10) DEFAULT NULL,
  `INV_TYPE` tinyint(4) DEFAULT NULL,
  `REP_NAME` varchar(50) DEFAULT NULL,
  `UP_DATE` varchar(19) DEFAULT NULL,
  `HOLD` bit(1) DEFAULT NULL,
  `OVERRIDE` int(11) DEFAULT NULL,
  `OVERRIDE2` int(11) DEFAULT NULL,
  `OVERRIDE3` int(11) DEFAULT NULL,
  `OVER_RATE` decimal(10,4) DEFAULT NULL,
  `OVER2_RATE` decimal(10,4) DEFAULT NULL,
  `OVER3_RATE` decimal(10,4) DEFAULT NULL,
  `OVER_COMM` decimal(12,2) DEFAULT NULL,
  `OVER2_COMM` decimal(12,2) DEFAULT NULL,
  `OVER3_COMM` decimal(12,2) DEFAULT NULL,
  `SPL_REP2` int(11) DEFAULT NULL,
  `SPL_REP3` int(11) DEFAULT NULL,
  `HOLDDATE` varchar(19) DEFAULT NULL,
  `HOLDREASON` varchar(10) DEFAULT NULL,
  `CUSTOMERID` varchar(30) DEFAULT NULL,
  `EDIT_DATE` varchar(19) DEFAULT NULL,
  `SPL_REP` int(11) DEFAULT NULL,
  `SPL_REP4` int(11) DEFAULT NULL,
  `SPL_REP5` int(11) DEFAULT NULL,
  `SPL_AMT` decimal(12,2) DEFAULT NULL,
  `SPL_AMT2` decimal(12,2) DEFAULT NULL,
  `SPL_AMT3` decimal(12,2) DEFAULT NULL,
  `SPL_AMT4` decimal(12,2) DEFAULT NULL,
  `SPL_AMT5` decimal(12,2) DEFAULT NULL,
  `SPL_CHG` decimal(12,2) DEFAULT NULL,
  `SPL_CHG2` decimal(12,2) DEFAULT NULL,
  `SPL_CHG3` decimal(12,2) DEFAULT NULL,
  `SPL_CHG4` decimal(12,2) DEFAULT NULL,
  `SPL_CHG5` decimal(12,2) DEFAULT NULL,
  `SPL_COMM` decimal(12,2) DEFAULT NULL,
  `SPL2_COMM` decimal(12,2) DEFAULT NULL,
  `SPL3_COMM` decimal(12,2) DEFAULT NULL,
  `SPL4_COMM` decimal(12,2) DEFAULT NULL,
  `SPL5_COMM` decimal(12,2) DEFAULT NULL,
  `CLEARING` varchar(20) DEFAULT NULL,
  `CUSIP_NO` varchar(10) DEFAULT NULL,
  `REP_RATE` decimal(14,4) DEFAULT NULL,
  `SOURCE` varchar(2) DEFAULT NULL,
  `BANK_NO` varchar(10) DEFAULT NULL,
  `CO_NO` bigint(20) DEFAULT NULL,
  `BUY_SELL` varchar(1) DEFAULT NULL,
  `UNITS` decimal(16,4) DEFAULT NULL,
  `PRICE` decimal(17,6) DEFAULT NULL,
  `IN_USER` varchar(10) DEFAULT NULL,
  `EDIT_USER` varchar(10) DEFAULT NULL,
  `POST_USER` varchar(10) DEFAULT NULL,
  `BATCH` smallint(6) DEFAULT NULL,
  `ERR_CODE` varchar(10) DEFAULT NULL,
  `CANCEL` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `trades`
--

INSERT INTO `trades` (`TRADE_NO`, `DATE`, `SET_DATE`, `CLI_NO`, `CLI_NAME`, `INVEST`, `INV_NO`, `NET_AMT`, `COMM_EXP`, `COMM_REC`, `FCOMM_REC2`, `CHARGE`, `DATE_REC`, `PAY_DATE`, `REP_COMM`, `REP_NO`, `SAL_NO`, `BRANCH_MGR`, `INV_TYPE`, `REP_NAME`, `UP_DATE`, `HOLD`, `OVERRIDE`, `OVERRIDE2`, `OVERRIDE3`, `OVER_RATE`, `OVER2_RATE`, `OVER3_RATE`, `OVER_COMM`, `OVER2_COMM`, `OVER3_COMM`, `SPL_REP2`, `SPL_REP3`, `HOLDDATE`, `HOLDREASON`, `CUSTOMERID`, `EDIT_DATE`, `SPL_REP`, `SPL_REP4`, `SPL_REP5`, `SPL_AMT`, `SPL_AMT2`, `SPL_AMT3`, `SPL_AMT4`, `SPL_AMT5`, `SPL_CHG`, `SPL_CHG2`, `SPL_CHG3`, `SPL_CHG4`, `SPL_CHG5`, `SPL_COMM`, `SPL2_COMM`, `SPL3_COMM`, `SPL4_COMM`, `SPL5_COMM`, `CLEARING`, `CUSIP_NO`, `REP_RATE`, `SOURCE`, `BANK_NO`, `CO_NO`, `BUY_SELL`, `UNITS`, `PRICE`, `IN_USER`, `EDIT_USER`, `POST_USER`, `BATCH`, `ERR_CODE`, `CANCEL`) VALUES
(23, '2018-05-15', '2018-10-08', '999904233', 'WILSON, JOHNATHON', 'OPPENHEIMER 001', 3386, '25000.00', '1017.12', '1017.12', NULL, '8.00', '2018-05-15', NULL, '813.70', 2, '', '', 20, 'SPLIT, JONES/ROBERTS', '2010-11-11', b'0', 0, 0, 0, '0.0000', '0.0000', '0.0000', '0.00', '0.00', '0.00', 1, 0, NULL, '', '', '2013-07-09', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '403.65', '0.00', NULL, NULL, 'AB12345', '', '0.8000', '', '01', 145, 'B', '0.0000', '0.000000', 'KR', 'MG', 'KR', 5, '', 'F'),
(14, '2018-04-28', '2018-09-28', '094667220', 'GAINES, TERRI', 'SUNAMERICA BALANCED ASSETS CLASS A', 743, '1000.00', '100.00', '100.00', NULL, '0.00', '2018-04-13', NULL, '80.00', 2, '', '', 20, 'SPLIT, JONES/ROBERTS', '2011-09-28', b'0', 0, 0, 0, '0.0000', '0.0000', '0.0000', '0.00', '0.00', '0.00', 3, 0, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '47.50', NULL, NULL, NULL, '(None)', '', '0.8000', '', '01', 82, 'B', '0.0000', '0.000000', 'MG', '', 'MG', 3, '', 'F'),
(10009, '2018-04-28', NULL, '567577524', 'SANDERS, JIM', '', 1924, '25.00', '10.00', '10.00', NULL, '0.00', '2018-04-13', '2012-08-31', '5.50', 2, '', '', 1, 'SPLIT, JONES/ROBERTS', NULL, b'0', 0, 0, 0, '0.0000', '0.0000', '0.0000', '0.00', '0.00', '0.00', 2, 0, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1.43', '0.00', NULL, NULL, '', '', '0.5500', '', '01', 250, 'B', '0.0000', '0.000000', '', 'LI', '', 0, '', 'F'),
(10010, '2018-04-28', NULL, '567577524', 'SANDERS, JIM', 'SUNAMERICA BALANCED ASSETS CLASS A', 743, '1000.00', '100.00', '100.00', NULL, '0.00', '2018-04-13', '2012-08-31', '80.00', 2, '', '', 20, 'SPLIT, JONES/ROBERTS', NULL, b'0', 0, 0, 0, '0.0000', '0.0000', '0.0000', '0.00', '0.00', '0.00', 3, 0, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00', NULL, NULL, '(None)', '', '0.8000', '', '01', 82, 'B', '0.0000', '0.000000', '', '', '', 3, '', 'F'),
(10014, '2018-04-28', NULL, '567577524', 'SANDERS, JIM', '', 1924, '25.00', '10.00', '10.00', NULL, '0.00', '2018-04-13', '2012-08-31', '5.00', 2, '', '', 26, 'SPLIT, JONES/ROBERTS', NULL, b'0', 0, 0, 0, '0.0000', '0.0000', '0.0000', '0.00', '0.00', '0.00', 2, 0, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1.43', '0.00', NULL, NULL, '', '', '0.5000', '', '01', 250, 'B', '0.0000', '0.000000', '', 'LI', '', 0, '', 'F'),
(19, '2018-04-28', '2018-05-20', '094667220', 'GAINES, TERRI', 'AIM 001413301', 2118, '20000.00', '875.00', '875.00', NULL, '0.00', '2018-04-13', NULL, '700.00', 1, '', '', 20, 'JONES, JIM', '2013-05-15', b'0', 0, 0, 0, '0.0000', '0.0000', '0.0000', '0.00', '0.00', '0.00', 0, 0, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '(None)', '', '0.8000', '', '01', 200, 'B', '0.0000', '0.000000', 'MG', '', 'MG', 4, '', 'F'),
(20, '2018-04-28', '2018-05-20', '094667220', 'GAINES, TERRI', 'AIM 001413301', 2118, '10000.00', '125.00', '125.00', NULL, '0.00', '2018-04-13', NULL, '62.50', 1, '', '', 20, 'JONES, JIM', '2013-05-15', b'0', 0, 0, 0, '0.0000', '0.0000', '0.0000', '0.00', '0.00', '0.00', 0, 0, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '(None)', '', '0.5000', '', '01', 200, 'B', '0.0000', '0.000000', 'MG', '', 'MG', 4, '', 'F'),
(21, '2018-04-28', '2018-05-20', '999904233', 'WILSON, JOHNATHON', 'ACTIVE ALLOCATION FUND A', 1524, '5000.00', '145.00', '145.00', NULL, '12.00', '2018-04-13', NULL, '72.50', 1, '', '', 20, 'JONES, JIM', '2013-05-15', b'0', 0, 0, 0, '0.0000', '0.0000', '0.0000', '0.00', '0.00', '0.00', 0, 0, NULL, '', '', '2013-07-09', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00', NULL, NULL, 'AB12345', '', '0.5000', '', '01', 145, 'B', '0.0000', '0.000000', 'MG', 'MG', 'MG', 5, '', 'F'),
(22, '2018-04-28', '2018-05-20', '567577524', 'SANDERS, JIM', 'OPPENHEIMER CORE BOND FUND A', 2082, '25000.00', '1350.00', '1350.00', NULL, '0.00', '2018-04-13', NULL, '1080.00', 2, '', '', 20, 'SPLIT, JONES/ROBERTS', '2013-05-15', b'0', 0, 0, 0, '0.0000', '0.0000', '0.0000', '0.00', '0.00', '0.00', 0, 0, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '(None)', '', '0.8000', '', '01', 145, 'B', '0.0000', '0.000000', 'MG', '', 'MG', 5, '', 'F'),
(24, '2018-04-28', '2018-05-17', '567577524', 'SANDERS, JIM', 'ABN AMRO 00078H216', 3899, '1000.00', '40.00', '0.00', NULL, '0.00', '2018-04-13', NULL, '0.00', 1, '', '', 20, 'JONES, JIM', NULL, b'1', 0, 0, 0, '0.0000', '0.0000', '0.0000', '0.00', '0.00', '0.00', 0, 0, NULL, 'DOCUMENTS', '', '2018-12-12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'P1N061603', '00078H216', '0.0000', '', '01', 282, 'B', '100.0000', '10.000000', 'MG', 'MG', '', 0, 'CBC', 'F'),
(25, '2018-04-28', '2018-05-17', '567577524', 'SANDERS, JIM', 'OPPENHEIMER ACTIVE ALLOCATION FUND', 1779, '1000.00', '30.00', '0.00', NULL, '10.00', '2018-04-13', NULL, '0.00', 2, '', '', 20, 'SPLIT, JONES/ROBERTS', NULL, b'0', 0, 0, 0, '0.0000', '0.0000', '0.0000', '0.00', '0.00', '0.00', 0, 0, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '0.8000', '', '01', 208, 'B', '500.0000', '2.000000', 'MG', '', '', 0, '', 'F'),
(27, '2018-04-28', '2018-05-17', '567577524', 'SANDERS, JIM', 'AASTROM BIOSCIENCES INC', 27, '2500.00', '22.00', '0.00', NULL, '13.00', '2018-04-13', NULL, '0.00', 2, '', '', 21, 'SPLIT, JONES/ROBERTS', NULL, b'0', 0, 0, 0, '0.0000', '0.0000', '0.0000', '0.00', '0.00', '0.00', 2, 3, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '29.25', '41.56', NULL, NULL, '(None)', '', '0.5500', '', '01', 0, 'B', '1000.0000', '2.500000', 'MG', '', '', 0, '', 'F'),
(31, '2018-04-28', '2018-05-21', '567577524', 'SANDERS, JIM', 'ACTIVE ALLOCATION FUND A', 1524, '5000.00', '150.00', '150.00', NULL, '0.00', '2018-04-13', NULL, '120.00', 2, '', '', 20, 'SPLIT, JONES/ROBERTS', '2013-05-16', b'0', 0, 0, 0, '0.0000', '0.0000', '0.0000', '0.00', '0.00', '0.00', 2, 3, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '110.50', '113.05', NULL, NULL, '1234567', '', '0.8000', '', '01', 145, 'B', '0.0000', '0.000000', 'MG', '', 'MG', 6, '', 'F'),
(32, '2018-04-28', '2018-04-07', '094667220', 'GAINES, TERRI', '*MERIDIAN VALUE FUND', 1924, '21341234.00', '242.00', '242.00', NULL, '0.00', '2018-04-13', NULL, '121.00', 1, '', '', 20, 'JONES, JIM', '2014-04-07', b'0', 0, 0, 0, '0.0000', '0.0000', '0.0000', '0.00', '0.00', '0.00', 2, 3, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00', NULL, NULL, '3253453433', '', '0.5000', '', '01', 71, 'B', '0.0000', '0.000000', 'MG', '', 'MG', 7, '', 'F'),
(42, '2018-11-04', '2018-05-06', '094667220', 'GAINES, TERRI', 'GLOBAL X FDS GLOBAL X SOCIAL MEDIA', 1924, '4000.00', '0.00', '100.00', NULL, '0.00', '2018-04-17', NULL, '95.00', 3, '', '', 21, 'ROBERTS, AL', '2014-05-01', b'0', 0, 0, 0, '0.0000', '0.0000', '0.0000', '0.00', '0.00', '0.00', 1, 0, NULL, '', '', '2018-12-12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '25.00', '0.00', NULL, NULL, '243897DS', '', '0.9500', '', '', 0, 'B', '0.0000', '0.000000', 'MG', 'MG', 'MG', 7, '', 'F'),
(51, '2018-04-28', '2018-01-06', '094667220', 'GAINES, TERRI', 'AIM 001413301', 2118, '100.00', '0.01', '0.01', NULL, '0.00', '2018-04-13', NULL, '0.01', 1, '', '', 20, 'JONES, JIM', '2014-06-11', b'0', 0, 0, 0, '0.0000', '0.0000', '0.0000', '0.00', '0.00', '0.00', 3, 0, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.01', NULL, NULL, NULL, '(None)', '', '0.5000', '', '01', 200, 'B', '0.0000', '0.000000', 'MG', '', 'MG', 7, '', 'F'),
(26, '2018-04-28', NULL, '999904233', 'WILSON, JOHNATHON', 'AIM 001413301', 2118, '20000.00', '875.00', '875.00', NULL, '25.00', '2018-04-13', '2014-11-11', '437.50', 1, '', '', 20, 'JONES, JIM', NULL, b'0', 0, 0, 0, '0.0000', '0.0000', '0.0000', '0.00', '0.00', '0.00', 2, 3, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '276.25', '290.94', NULL, NULL, 'AB12345', '', '0.5000', '', '01', 200, 'B', NULL, '0.000000', '', '', '', 4, '', 'F'),
(28, '2018-04-28', NULL, '999904233', 'WILSON, JOHNATHON', 'VANGUARD INFO TECH VIPERS', 4, '5000.00', '145.00', '145.00', NULL, '12.00', '2018-04-13', '2014-11-11', '72.50', 1, '', '', 21, 'JONES, JIM', NULL, b'0', 0, 0, 0, '0.0000', '0.0000', '0.0000', '0.00', '0.00', '0.00', 0, 0, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00', NULL, NULL, 'AB12345', '', '0.5000', '', '01', 0, 'B', '0.0000', '0.000000', '', 'MG', '', 5, '', 'F'),
(29, '2018-04-28', NULL, '999904233', 'WILSON, JOHNATHON', 'OPPENHEIMER CORE BOND FUND A', 2082, '25000.00', '1350.00', '1350.00', NULL, '10.00', '2018-04-13', '2014-11-11', '1080.00', 2, '', '', 20, 'SPLIT, JONES/ROBERTS', NULL, b'0', 0, 0, 0, '0.0000', '0.0000', '0.0000', '0.00', '0.00', '0.00', 0, 0, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'AB12345', '', '0.8000', '', '01', 145, 'B', NULL, '0.000000', '', '', '', 5, '', 'F'),
(31, '2018-04-28', NULL, '094667220', 'GAINES, TERRI', '*MERIDIAN VALUE FUND', 1924, '21341234.00', '242.00', '242.00', NULL, '0.00', '2018-04-13', '2014-11-11', '193.60', 1, '', '', 20, 'JONES, JIM', NULL, b'0', 3, 0, 0, '0.2500', '0.0000', '0.0000', '30.25', '0.00', '0.00', 3, 0, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '114.95', NULL, NULL, NULL, '3253453433', '', '0.8000', '', '01', 71, 'B', NULL, '0.000000', '', '', '', 7, '', 'F'),
(32, '2018-04-28', NULL, '094667220', 'GAINES, TERRI', '*MERIDIAN VALUE FUND', 1924, '4.00', '0.00', '0.00', NULL, '0.00', '2018-04-13', '2014-11-11', '0.00', 1, '', '', 20, 'JONES, JIM', NULL, b'0', 3, 0, 0, '0.2500', '0.0000', '0.0000', '0.00', '0.00', '0.00', 3, 0, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', NULL, NULL, NULL, '(None)', '', '0.8000', '', '01', 71, 'B', NULL, '0.000000', '', '', '', 7, '', 'F'),
(39, '2018-04-28', NULL, '094667220', 'GAINES, TERRI', 'AIM 001413301', 2118, '100.00', '0.01', '0.01', NULL, '0.00', '2018-04-13', '2014-11-11', '0.01', 1, '', '', 20, 'JONES, JIM', NULL, b'0', 0, 0, 0, '0.0000', '0.0000', '0.0000', '0.00', '0.00', '0.00', 2, 3, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9.75', '9.98', NULL, NULL, '(None)', '', '0.5000', '', '01', 200, 'B', NULL, '0.000000', '', '', '', 7, '', 'F'),
(41, '2018-11-02', NULL, '094667220', 'GAINES, TERRI', '*MERIDIAN VALUE FUND', 1924, '34000.00', '242.00', '242.00', NULL, '0.00', '2018-04-17', NULL, '121.00', 4, '', '', 20, 'JOHNSON, TIM', NULL, b'0', 1, 0, 0, '0.0100', '0.0000', '0.0000', '0.00', '0.00', '0.00', 1, 0, NULL, '', '', '2018-12-12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00', NULL, NULL, '3253453433', '', '0.5000', '', '', 71, 'B', '0.0000', '0.000000', '', 'MG', '', 7, '', 'F'),
(49, '2018-04-28', NULL, '094667220', 'GAINES, TERRI', 'AIM 001413301', 2118, '100.00', '0.01', '0.01', NULL, '0.00', '2018-04-13', '2014-11-11', '0.01', 1, '', '', 20, 'JONES, JIM', NULL, b'0', 0, 0, 0, '0.0000', '0.0000', '0.0000', '0.00', '0.00', '0.00', 2, 3, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3.25', '3.33', NULL, NULL, '(None)', '', '0.5000', '', '01', 200, 'B', NULL, '0.000000', '', '', '', 7, '', 'F'),
(55, '2018-04-28', '2018-12-17', '094667220', 'GAINES, TERRI', 'AF 02630T548', 4249, '10.00', '1.00', '1.00', NULL, '0.00', '2018-04-13', NULL, '0.00', 1, '', '', 20, 'JONES, JIM', '2014-12-12', b'1', 3, 0, 0, '0.2500', '0.0000', '0.0000', '0.00', '0.00', '0.00', 2, 0, NULL, 'LICENSING', '', '2018-12-12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'TR4053104', '02630T548', '0.0000', '', '01', 71, 'B', '0.0000', '0.000000', 'MG', 'MG', 'MG', 7, 'C', 'F'),
(56, '2018-04-28', '2018-12-17', '094667220', 'GAINES, TERRI', 'AF 02630T548', 4249, '10.00', '1.00', '1.00', NULL, '0.00', '2018-04-13', NULL, '0.50', 1, '', '', 20, 'JONES, JIM', '2014-12-12', b'0', 0, 0, 0, '0.0000', '0.0000', '0.0000', '0.00', '0.00', '0.00', 2, 3, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.33', '0.33', NULL, NULL, '(None)', '', '0.5000', '', '01', 76, 'B', '0.0000', '0.000000', 'MG', '', 'MG', 7, '', 'F'),
(58, '2018-04-28', '2018-02-05', '094667220', 'GAINES, TERRI', '*MERIDIAN VALUE FUND', 1924, '1.00', '1.00', '1.00', NULL, '0.00', '2018-04-13', NULL, '0.00', 1, '', '', 20, 'JONES, JIM', '2015-02-02', b'1', 3, 0, 0, '0.2500', '0.0000', '0.0000', '0.00', '0.00', '0.00', 2, 0, NULL, 'LICENSING', '', '2018-12-12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'TR4053104', '345334', '0.0000', '', '01', 71, 'B', '0.0000', '0.000000', 'MG', 'MG', 'MG', 7, '', 'F'),
(7160, '2018-04-17', '2018-09-03', '094667220', 'GAINES, TERRI', '1ST TENNESSEE NATL CORP', 267, '1.00', '1.00', '1.00', NULL, '0.00', '2018-04-27', NULL, '0.50', 1, '', '', 21, 'JONES, JIM', '2015-08-31', b'0', 0, 0, 0, '0.0000', '0.0000', '0.0000', '0.00', '0.00', '0.00', 2, 3, NULL, '', '', '2017-02-03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '(None)', '', '0.5000', '', '', 0, 'B', '0.0000', '0.000000', 'MG', 'MG', 'MG', 1, '', 'F'),
(7166, '2018-07-20', '2018-07-20', '094667220', 'GAINES, TERRI', 'OPPENHEIMER ACTIVE ALLOCATION FUND', 1779, '700.00', '10.00', '10.00', NULL, '0.00', '2018-07-20', NULL, '0.00', 1, '', '', 20, 'JONES, JIM', '2016-07-20', b'1', 0, 0, 0, '0.0000', '0.0000', '0.0000', '0.00', '0.00', '0.00', 2, 3, NULL, 'LICENSING', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'TR4053104', 'OPP12345', '0.0000', '', '', 208, 'B', '0.0000', '0.000000', 'MG', '', 'MG', 9, '', 'F'),
(7167, '2018-09-29', '2018-09-29', '094667220', 'GAINES, TERRI', 'OPPENHEIMER ACTIVE ALLOCATION FUND', 1779, '213.00', '1.00', '1.00', NULL, '0.00', '2018-09-29', NULL, '0.00', 1, '', '', 20, 'JONES, JIM', '2016-09-29', b'1', 0, 0, 0, '0.0000', '0.0000', '0.0000', '0.00', '0.00', '0.00', 2, 3, NULL, 'LICENSING', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'TR4053104', 'OPP12345', '0.0000', '', '', 208, 'B', '0.0000', '0.000000', 'MG', '', 'MG', 9, '', 'F'),
(7168, '2018-09-29', '2018-10-04', '094667220', 'GAINES, TERRI', 'OPPENHEIMER ACTIVE ALLOCATION FUND', 1779, '100.00', '1.00', '1.00', NULL, '0.00', '2018-07-20', NULL, '0.00', 1, '', '', 20, 'JONES, JIM', '2016-09-29', b'1', 0, 0, 0, '0.0000', '0.0000', '0.0000', '0.00', '0.00', '0.00', 2, 3, NULL, 'LICENSING', '', '2017-02-03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'TR4053104', 'OPP12345', '0.0000', '', '', 208, 'B', '0.0000', '0.000000', 'MG', 'MG', 'MG', 9, '', 'F'),
(7169, '2018-12-10', '2018-12-04', '094667220', 'GAINES, TERRI', 'FAR EAST NATL BK LOS', 11, '-40000.00', '-30.50', '-1000.00', NULL, '-25.00', NULL, NULL, '0.00', 1, '', '', 28, 'JONES, JIM', NULL, b'0', 0, 0, 0, '0.0000', '0.0000', '0.0000', '0.00', '0.00', '0.00', 2, 3, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '307327AQ9', '0.0000', 'SW', '', 0, 'B', '-40000.0000', '1.000000', 'MG', '', '', 0, '', 'F'),
(7170, '2018-12-10', '2018-12-04', '094667220', 'GAINES, TERRI', 'FAR EAST NATL BK LOS', 11, '40000.00', '30.50', '1000.00', NULL, '25.00', NULL, NULL, '0.00', 1, '', '', 28, 'JONES, JIM', NULL, b'0', 0, 0, 0, '0.0000', '0.0000', '0.0000', '0.00', '0.00', '0.00', 2, 3, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '307327AQ9', '0.0000', 'SW', '', 0, 'B', '40000.0000', '1.000000', 'MG', '', '', 0, '', 'F'),
(7171, '2018-12-10', '2018-12-04', '094667220', 'GAINES, TERRI', 'BEAL BK SSB PLANO TE', 12, '50000.00', '67.50', '1200.00', NULL, '25.00', NULL, NULL, '0.00', 1, '', '', 28, 'JONES, JIM', NULL, b'0', 0, 0, 0, '0.0000', '0.0000', '0.0000', '0.00', '0.00', '0.00', 2, 3, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '07368XXD5', '0.0000', 'SW', '', 0, 'B', '50000.0000', '1.000000', 'MG', '', '', 0, '', 'F'),
(7175, '2018-05-01', '2018-05-06', '094667220', 'GAINES, TERRI', '*WEITZ PARTNERS VALUE FUND', 1963, '4.00', '0.00', '0.00', NULL, '0.00', NULL, NULL, '0.00', 1, '', '', 20, 'JONES, JIM', NULL, b'0', 2, 0, 0, '0.0100', '0.0000', '0.0000', '0.00', '0.00', '0.00', 3, 0, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '0.0000', '', '01', 271, 'B', '2.0000', '2.000000', 'MG', '', '', 0, ' 1 5', 'F'),
(7176, '2018-05-01', '2018-05-01', '094667220', 'GAINES, TERRI', 'TEST REIT 2', 5, '1.00', '0.00', '0.00', NULL, '0.00', NULL, NULL, '0.00', 1, '', '', 44, 'JONES, JIM', NULL, b'0', 2, 0, 0, '0.0100', '0.0000', '0.0000', '0.00', '0.00', '0.00', 3, 0, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '(None)', '', '0.0000', '', '01', 250, 'B', '1.0000', '1.000000', 'MG', '', '', 0, '', 'F'),
(7179, '2018-12-23', NULL, '094667220', 'GAINES, TERRI', 'PERSPII', 11, '824230.05', '57696.10', '57696.10', NULL, '0.00', '2018-01-03', NULL, '31732.86', 2, '', '', 24, 'SPLIT, JONES/ROBERTS', '2017-01-04', b'0', 0, 0, 0, '0.0000', '0.0000', '0.0000', '0.00', '0.00', '0.00', 100, 0, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00', NULL, NULL, '1019648865', '', '0.5500', 'AP', '01', 286, 'B', '0.0000', '0.000000', 'MG', '', 'MG', 6, '', 'F'),
(7188, '2018-09-15', '2018-09-20', '094667220', 'GAINES, TERRI', 'TEST LIFE INSURANCE PRODUCT', 1, '0.00', '50.00', '50.00', NULL, '0.00', '2018-09-15', NULL, '0.00', 1, '', '', 26, 'JONES, JIM', '2017-09-15', b'0', 0, 0, 0, '0.0000', '0.0000', '0.0000', '0.00', '0.00', '0.00', 2, 3, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '(None)', '', '0.0000', '', '', 282, 'B', '1.0000', '0.000000', 'MG', '', 'MG', 1, '', 'F'),
(7189, '2018-11-06', NULL, '094667220', 'GAINES, TERRI', 'VA CUSIP 79588L107', 12, '31941.51', '13.31', '13.31', NULL, '0.00', '2018-11-15', NULL, '9.32', 4, '', '', 24, 'JOHNSON, TIM', '2017-11-28', b'0', 1, 0, 0, '0.0100', '0.0000', '0.0000', '0.13', '0.00', '0.00', 0, 0, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00', NULL, NULL, '7200016561', '79588L107', '0.7000', 'AP', '01', 66, 'B', '0.0000', '0.000000', 'MG', '', 'MG', 1, '', 'F'),
(7190, '2018-11-15', '2018-11-20', '567577524', 'SANDERS, JIM', 'AIM 001413301', 2118, '0.00', '50.00', '50.00', NULL, '0.00', '2018-12-18', NULL, '25.00', 1, '', '', 20, 'JONES, JIM', '2017-12-27', b'0', 0, 0, 0, '0.0000', '0.0000', '0.0000', '0.00', '0.00', '0.00', 2, 3, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '(None)', '', '0.5000', '', '', 271, 'B', '0.0000', '0.000000', 'MG', '', 'MG', 16, '', 'F'),
(7191, '2018-08-07', '2018-08-10', '567577524', 'SANDERS, JIM', '*MERIDIAN VALUE FUND', 1924, '10000.00', '400.00', '0.00', NULL, '0.00', NULL, NULL, '0.00', 1, '', '', 20, 'JONES, JIM', NULL, b'0', 0, 0, 0, '0.0000', '0.0000', '0.0000', '0.00', '0.00', '0.00', 2, 3, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '0.0000', '', '01', 250, 'B', '0.0000', '0.000000', 'MG', '', '', 0, '', 'F'),
(7211, '2018-08-06', '2018-08-11', '094667220', 'GAINES, TERRI', 'COACH INC EX-DIV DATE 10/02/03 RECO', 778, '2569.00', '71.85', '71.85', NULL, '14.00', '2018-12-03', NULL, '35.93', 1, '', '', 21, 'JONES, JIM', '2018-12-12', b'0', 0, 0, 0, '0.0000', '0.0000', '0.0000', '0.00', '0.00', '0.00', 0, 0, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'TR4053104', '189754104', '0.5000', 'NF', '', 0, 'S', '-50.0000', '51.380000', 'MG', '', 'MG', 0, '', 'F'),
(7212, '2018-08-06', '2018-08-11', '094667220', 'GAINES, TERRI', 'COACH INC EX-DIV DATE 10/02/03 RECO', 778, '2554.00', '33.15', '33.15', NULL, '14.00', '2018-12-01', NULL, '16.58', 1, '', '', 21, 'JONES, JIM', '2018-12-12', b'0', 0, 0, 0, '0.0000', '0.0000', '0.0000', '0.00', '0.00', '0.00', 0, 0, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'TR4053104', '189754104', '0.5000', 'NF', '', 0, 'S', '-50.0000', '51.080000', 'MG', '', 'MG', 0, '', 'F'),
(7213, '2018-11-30', '2018-12-04', '999904233', 'WILSON, JOHNATHON', 'EHV 277911822', 3871, '0.00', '1.23', '1.23', NULL, '0.00', '2018-12-04', NULL, '0.74', 1, '', '', 40, 'JONES, JIM', '2018-12-12', b'0', 0, 0, 0, '0.0000', '0.0000', '0.0000', '0.00', '0.00', '0.00', 0, 0, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00', NULL, NULL, 'P1L966690', '277911822', '0.6000', 'N1', '01', 281, 'B', '1.0000', '0.000000', 'MG', '', 'MG', 12, '', 'F'),
(7214, '2018-11-30', '2018-12-04', '999904233', 'WILSON, JOHNATHON', 'EHV 277911822', 3871, '0.00', '3.69', '3.69', NULL, '0.00', '2018-12-08', NULL, '2.21', 1, '', '', 40, 'JONES, JIM', '2018-12-12', b'0', 0, 0, 0, '0.0000', '0.0000', '0.0000', '0.00', '0.00', '0.00', 0, 0, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00', NULL, NULL, 'P1L966690', '277911822', '0.6000', 'N1', '01', 281, 'B', '1.0000', '0.000000', 'MG', '', 'MG', 12, '', 'F'),
(7215, '2018-04-05', '2018-08-17', '567577526', 'JOHNS, JENNIFER', 'VICUS RIA MANAGED FEES', 5, '0.00', '92.75', '92.75', NULL, '0.00', '2018-12-10', NULL, '55.65', 1, '', '', 29, 'JONES, JIM', '2018-12-12', b'0', 0, 0, 0, '0.0000', '0.0000', '0.0000', '0.00', '0.00', '0.00', 0, 0, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00', NULL, NULL, 'P1L967564', '', '0.6000', 'NF', '02', 285, 'B', '1.0000', '31000.000000', 'MG', '', 'MG', 13, '', 'F'),
(7216, '2018-12-13', '2018-12-18', '094667220', 'GAINES, TERRI', 'AIM BASIC VALUE FUND CLASS B', 1692, '0.00', '1000.00', '1000.00', NULL, '0.00', '2018-12-10', NULL, '500.00', 1, '', '', 20, 'JONES, JIM', '2018-12-13', b'0', 0, 0, 0, '0.0000', '0.0000', '0.0000', '0.00', '0.00', '0.00', 3, 0, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '(None)', '', '0.5000', '', '', 200, 'B', '0.0000', '0.000000', 'MG', '', 'MG', 17, '', 'F'),
(7175, '2019-01-01', '2018-05-06', '094667220', 'GAINES, TERRI', '*WEITZ PARTNERS VALUE FUND', 1963, '4.00', '0.00', '0.00', NULL, '0.00', '2019-01-02', '2019-01-03', '0.00', 1, '', '', 20, 'JONES, JIM', NULL, b'0', 2, 0, 0, '0.0100', '0.0000', '0.0000', '0.00', '0.00', '0.00', 3, 0, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '(None)', '435353', '0.0000', '', '01', 271, 'B', '2.0000', '2.000000', 'MG', '', '', 0, ' 1 5', 'F'),
(7176, '2019-01-01', '2018-05-01', '094667220', 'GAINES, TERRI', 'SAMPLE REIT 2', 5, '1.00', '0.00', '0.00', NULL, '0.00', '2019-01-02', '2019-01-03', '0.00', 1, '', '', 44, 'JONES, JIM', NULL, b'0', 2, 0, 0, '0.0100', '0.0000', '0.0000', '0.00', '0.00', '0.00', 3, 0, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '(None)', '3463464', '0.0000', '', '01', 250, 'B', '1.0000', '1.000000', 'MG', '', '', 0, '', 'F'),
(23, '2019-01-01', '2018-10-08', '999904233', 'WILSON, JOHNATHON', 'OPPENHEIMER 001', 3386, '25000.00', '1017.12', '1017.12', NULL, '8.00', '2019-01-02', '2019-01-03', '813.70', 2, '', '', 20, 'SPLIT, JONES/ROBERTS', '2010-11-11', b'0', 0, 0, 0, '0.0000', '0.0000', '0.0000', '0.00', '0.00', '0.00', 1, 0, NULL, '', '', '2013-07-09', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '403.65', '0.00', NULL, NULL, 'AB12345', 'OPP43453', '0.8000', '', '01', 145, 'B', '0.0000', '0.000000', 'KR', 'MG', 'KR', 5, '', 'F'),
(7166, '2019-01-01', '2018-07-20', '094667220', 'GAINES, TERRI', 'OPPENHEIMER ACTIVE ALLOCATION FUND', 1779, '500.00', '10.00', '10.00', NULL, '0.00', '2019-01-02', '2019-01-03', '0.00', 1, '', '', 20, 'JONES, JIM', '2016-07-20', b'1', 0, 0, 0, '0.0000', '0.0000', '0.0000', '0.00', '0.00', '0.00', 2, 3, NULL, 'LICENSING', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'TR4053104', 'OPP12345', '0.0000', '', '', 208, 'B', '0.0000', '0.000000', 'MG', '', 'MG', 9, '', 'F'),
(7211, '2019-01-01', '2018-08-11', '094667220', 'GAINES, TERRI', 'COACH INC EX-DIV DATE 10/02/03 RECO', 778, '2569.00', '71.85', '71.85', NULL, '14.00', '2019-01-02', '2019-01-03', '35.93', 1, '', '', 21, 'JONES, JIM', '2018-12-12', b'0', 0, 0, 0, '0.0000', '0.0000', '0.0000', '0.00', '0.00', '0.00', 0, 0, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'TR4053104', '189754104', '0.5000', 'NF', '', 0, 'S', '-50.0000', '51.380000', 'MG', '', 'MG', 0, '', 'F'),
(7212, '2019-01-01', '2018-08-11', '094667220', 'GAINES, TERRI', 'COACH INC EX-DIV DATE 10/02/03 RECO', 778, '2554.00', '33.15', '33.15', NULL, '14.00', '2019-01-02', '2019-01-03', '16.58', 1, '', '', 21, 'JONES, JIM', '2018-12-12', b'0', 0, 0, 0, '0.0000', '0.0000', '0.0000', '0.00', '0.00', '0.00', 0, 0, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'TR4053104', '189754104', '0.5000', 'NF', '', 0, 'S', '-50.0000', '51.080000', 'MG', '', 'MG', 0, '', 'F'),
(7191, '2019-01-01', '2018-08-10', '567577524', 'SANDERS, JIM', '*MERIDIAN VALUE FUND', 1924, '10000.00', '400.00', '500.00', NULL, '0.00', '2019-01-02', '2019-01-03', '450.00', 1, '', '', 20, 'JONES, JIM', NULL, b'0', 0, 0, 0, '0.0000', '0.0000', '0.0000', '0.00', '0.00', '0.00', 2, 3, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '(None)', '283978242', '0.9000', '', '01', 250, 'B', '0.0000', '0.000000', 'MG', '', '', 0, '', 'F'),
(7188, '2019-01-01', '2018-09-20', '094667220', 'GAINES, TERRI', 'TEST LIFE INSURANCE PRODUCT', 1, '0.00', '50.00', '50.00', NULL, '0.00', '2019-01-02', '2019-01-03', '45.00', 1, '', '', 26, 'JONES, JIM', '2017-09-15', b'0', 0, 0, 0, '0.0000', '0.0000', '0.0000', '0.00', '0.00', '0.00', 2, 3, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '(None)', '2892424', '0.9000', '', '', 282, 'B', '1.0000', '0.000000', 'MG', '', 'MG', 1, '', 'F'),
(7167, '2019-01-01', '2018-09-29', '567577526', 'JOHNS, JENNIFER', 'OPPENHEIMER ACTIVE ALLOCATION FUND', 1779, '213.00', '1.00', '1.00', NULL, '0.00', '2019-01-02', '2019-01-03', '0.50', 1, '', '', 20, 'JONES, JIM', '2016-09-29', b'1', 0, 0, 0, '0.0000', '0.0000', '0.0000', '0.00', '0.00', '0.00', 2, 3, NULL, 'LICENSING', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'P1L967564', 'OPP12345', '0.5000', '', '', 208, 'B', '0.0000', '0.000000', 'MG', '', 'MG', 9, '', 'F'),
(7168, '2019-01-01', '2018-10-04', '999904233', 'WILSON, JOHNATHON', 'OPPENHEIMER ACTIVE ALLOCATION FUND', 1779, '100.00', '1.00', '1.00', NULL, '0.00', '2019-01-02', '2019-01-03', '0.50', 1, '', '', 20, 'JONES, JIM', '2016-09-29', b'1', 0, 0, 0, '0.0000', '0.0000', '0.0000', '0.00', '0.00', '0.00', 2, 3, NULL, 'LICENSING', '', '2017-02-03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'P1L966690', 'OPP12345', '0.5000', '', '', 208, 'B', '0.0000', '0.000000', 'MG', 'MG', 'MG', 9, '', 'F'),
(41, '2019-01-01', NULL, '094667220', 'GAINES, TERRI', '*MERIDIAN VALUE FUND', 1924, '34000.00', '242.00', '242.00', NULL, '0.00', '2019-01-02', '2019-01-03', '121.00', 4, '', '', 20, 'JOHNSON, TIM', NULL, b'0', 1, 0, 0, '0.0100', '0.0000', '0.0000', '0.00', '0.00', '0.00', 1, 0, NULL, '', '', '2018-12-12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00', NULL, NULL, '3253453433', '35534H66', '0.5000', '', '', 71, 'B', '0.0000', '0.000000', '', 'MG', '', 7, '', 'F'),
(42, '2019-01-01', '2018-05-06', '094667220', 'GAINES, TERRI', 'GLOBAL X FDS GLOBAL X SOCIAL MEDIA', 1924, '4000.00', '0.00', '100.00', NULL, '0.00', '2019-01-02', '2019-01-03', '95.00', 3, '', '', 21, 'ROBERTS, AL', '2014-05-01', b'0', 0, 0, 0, '0.0000', '0.0000', '0.0000', '0.00', '0.00', '0.00', 1, 0, NULL, '', '', '2018-12-12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '25.00', '0.00', NULL, NULL, '243897DS', '35534H66', '0.9500', '', '', 0, 'B', '0.0000', '0.000000', 'MG', 'MG', 'MG', 7, '', 'F'),
(7189, '2019-01-01', NULL, '094667220', 'GAINES, TERRI', 'VA CUSIP 79588L107', 12, '31941.51', '13.31', '13.31', NULL, '0.00', '2019-01-02', '2019-01-03', '9.32', 4, '', '', 24, 'JOHNSON, TIM', '2017-11-28', b'0', 1, 0, 0, '0.0100', '0.0000', '0.0000', '0.13', '0.00', '0.00', 0, 0, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00', NULL, NULL, '7200016561', '79588L107', '0.7000', 'AP', '01', 66, 'B', '0.0000', '0.000000', 'MG', '', 'MG', 1, '', 'F'),
(7190, '2019-01-01', '2018-11-20', '567577524', 'SANDERS, JIM', 'AIM 001413301', 2118, '0.00', '50.00', '50.00', NULL, '0.00', '2019-01-02', '2019-01-03', '25.00', 1, '', '', 20, 'JONES, JIM', '2017-12-27', b'0', 0, 0, 0, '0.0000', '0.0000', '0.0000', '0.00', '0.00', '0.00', 2, 3, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '(None)', '001413301', '0.5000', '', '', 271, 'B', '0.0000', '0.000000', 'MG', '', 'MG', 16, '', 'F'),
(7213, '2019-01-01', '2018-12-04', '999904233', 'WILSON, JOHNATHON', 'EHV 277911822', 3871, '0.00', '1.23', '1.23', NULL, '0.00', '2019-01-02', '2019-01-03', '0.74', 1, '', '', 40, 'JONES, JIM', '2018-12-12', b'0', 0, 0, 0, '0.0000', '0.0000', '0.0000', '0.00', '0.00', '0.00', 0, 0, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00', NULL, NULL, 'P1L966690', '277911822', '0.6000', 'N1', '01', 281, 'B', '1.0000', '0.000000', 'MG', '', 'MG', 12, '', 'F'),
(7214, '2019-01-01', '2018-12-04', '999904233', 'WILSON, JOHNATHON', 'EHV 277911822', 3871, '0.00', '3.69', '3.69', NULL, '0.00', '2019-01-02', '2019-01-03', '2.21', 1, '', '', 40, 'JONES, JIM', '2018-12-12', b'0', 0, 0, 0, '0.0000', '0.0000', '0.0000', '0.00', '0.00', '0.00', 0, 0, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00', NULL, NULL, 'P1L966690', '277911822', '0.6000', 'N1', '01', 281, 'B', '1.0000', '0.000000', 'MG', '', 'MG', 12, '', 'F'),
(7169, '2019-01-01', '2018-12-04', '094667220', 'GAINES, TERRI', 'FAR EAST NATL BK LOS', 11, '-40000.00', '-30.50', '-1000.00', NULL, '-25.00', '2019-01-02', '2019-01-03', '0.00', 1, '', '', 28, 'JONES, JIM', NULL, b'0', 0, 0, 0, '0.0000', '0.0000', '0.0000', '0.00', '0.00', '0.00', 2, 3, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '(None)', '307327AQ9', '0.0000', 'SW', '', 0, 'B', '-40000.0000', '1.000000', 'MG', '', '', 0, '', 'F'),
(7170, '2019-01-01', '2018-12-04', '094667220', 'GAINES, TERRI', 'FAR EAST NATL BK LOS', 11, '40000.00', '30.50', '1000.00', NULL, '25.00', '2019-01-02', '2019-01-03', '0.00', 1, '', '', 28, 'JONES, JIM', NULL, b'0', 0, 0, 0, '0.0000', '0.0000', '0.0000', '0.00', '0.00', '0.00', 2, 3, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '(None)', '307327AQ9', '0.0000', 'SW', '', 0, 'B', '40000.0000', '1.000000', 'MG', '', '', 0, '', 'F'),
(7171, '2019-01-01', '2018-12-04', '094667220', 'GAINES, TERRI', 'BEAL BK SSB PLANO TE', 12, '50000.00', '67.50', '1200.00', NULL, '25.00', '2019-01-02', '2019-01-03', '0.00', 1, '', '', 28, 'JONES, JIM', NULL, b'0', 0, 0, 0, '0.0000', '0.0000', '0.0000', '0.00', '0.00', '0.00', 2, 3, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '(None)', '07368XXD5', '0.0000', 'SW', '', 0, 'B', '50000.0000', '1.000000', 'MG', '', '', 0, '', 'F'),
(7216, '2019-01-01', '2018-12-18', '094667220', 'GAINES, TERRI', 'AIM BASIC VALUE FUND CLASS B', 1692, '0.00', '1000.00', '1000.00', NULL, '0.00', '2019-01-02', '2019-01-03', '500.00', 1, '', '', 20, 'JONES, JIM', '2018-12-13', b'0', 0, 0, 0, '0.0000', '0.0000', '0.0000', '0.00', '0.00', '0.00', 3, 0, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '(None)', 'M1238989X', '0.5000', '', '', 200, 'B', '0.0000', '0.000000', 'MG', '', 'MG', 17, '', 'F'),
(7179, '2019-01-01', NULL, '094667220', 'GAINES, TERRI', 'PERSPII', 11, '824230.05', '57696.10', '57696.10', NULL, '0.00', '2019-01-02', '2019-01-03', '31732.86', 2, '', '', 24, 'SPLIT, JONES/ROBERTS', '2017-01-04', b'0', 0, 0, 0, '0.0000', '0.0000', '0.0000', '0.00', '0.00', '0.00', 100, 0, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00', NULL, NULL, '1019648865', '17823782B', '0.5500', 'AP', '01', 286, 'B', '0.0000', '0.000000', 'MG', '', 'MG', 6, '', 'F'),
(7217, '2019-01-09', NULL, '094667220', 'GAINES, TERRI', 'VICUS RIA MANAGED FEES', 5, '20240.12', '4.30', '4.30', NULL, '0.00', '2019-01-18', '2019-01-03', '3.87', 4, '', '', 29, 'JOHNSON, TIM', '2019-01-18', b'0', 1, 0, 0, '0.0100', '0.0000', '0.0000', '0.00', '0.00', '0.00', 0, 0, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00', NULL, NULL, '860855DEF', '79518', '0.9000', 'AP', '01', 285, 'B', '0.0000', '0.000000', 'MG', '', 'MG', 2, '', 'F'),
(7218, '2019-01-09', NULL, '094667220', 'GAINES, TERRI', 'VICUS RIA MANAGED FEES', 5, '20000.00', '1.51', '1.51', NULL, '0.00', '2019-01-18', '2019-01-03', '1.36', 4, '', '', 29, 'JOHNSON, TIM', '2019-01-18', b'0', 1, 0, 0, '0.0100', '0.0000', '0.0000', '0.00', '0.00', '0.00', 0, 0, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00', NULL, NULL, '860855DEF', '79518', '0.9000', 'AP', '01', 285, 'B', '0.0000', '0.000000', 'MG', '', 'MG', 2, '', 'F'),
(7219, '2019-01-09', NULL, '094667220', 'GAINES, TERRI', 'VICUS RIA MANAGED FEES', 5, '20240.12', '4.30', '4.30', NULL, '0.00', '2019-01-18', '2019-01-03', '3.87', 4, '', '', 29, 'JOHNSON, TIM', '2019-01-20', b'0', 1, 0, 0, '0.0100', '0.0000', '0.0000', '0.00', '0.00', '0.00', 0, 0, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00', NULL, NULL, '860855DEF', '79518', '0.9000', 'AP', '01', 285, 'B', '0.0000', '0.000000', 'MG', '', 'MG', 2, '', 'F'),
(7220, '2019-01-09', NULL, '094667220', 'GAINES, TERRI', 'VICUS RIA MANAGED FEES', 5, '20000.00', '1.51', '1.51', NULL, '0.00', '2019-01-18', '2019-01-03', '1.36', 4, '', '', 29, 'JOHNSON, TIM', '2019-01-20', b'0', 1, 0, 0, '0.0100', '0.0000', '0.0000', '0.00', '0.00', '0.00', 0, 0, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00', NULL, NULL, '860855DEF', '79518', '0.9000', 'AP', '01', 285, 'B', '0.0000', '0.000000', 'MG', '', 'MG', 2, '', 'F'),
(7221, '2019-01-22', NULL, '567577526', 'JOHNS, JENNIFER', 'FIDELITY FUND PRODUCT A', 6, '10000.00', '100.00', '100.00', NULL, '0.00', '2019-01-22', '2019-01-03', '90.00', 1, '', '', 29, 'JONES, JIM', '2019-01-22', b'0', 0, 0, 0, '0.0000', '0.0000', '0.0000', '0.00', '0.00', '0.00', 0, 0, NULL, '', '', '2019-01-22', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '(None)', '67234E434', '0.9000', '', '01', 106, 'B', '1.0000', '10000.000000', 'MG', 'MG', 'MG', 3, 'D', 'F'),
(7222, '2019-01-21', NULL, '094667220', 'GAINES, TERRI', 'FIDELITY FUND PRODUCT A', 6, '10000.00', '0.00', '90.00', NULL, '0.00', '2019-01-22', '2019-01-03', '81.00', 1, '', '', 29, 'JONES, JIM', '2019-01-22', b'0', 0, 0, 0, '0.0000', '0.0000', '0.0000', '0.00', '0.00', '0.00', 0, 0, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '860855DEF', '67234E434', '0.9000', '', '01', 106, 'B', '1.0000', '0.000000', 'MG', '', 'MG', 3, ' D', 'F'),
(7224, '2019-01-22', NULL, '094667220', 'GAINES, TERRI', 'FIDELITY FUND PRODUCT A', 6, '20000.00', '0.00', '180.00', NULL, '0.00', '2019-01-22', '2019-01-03', '162.00', 1, '', '', 29, 'JONES, JIM', '2019-01-22', b'0', 0, 0, 0, '0.0000', '0.0000', '0.0000', '0.00', '0.00', '0.00', 0, 0, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '860855DEF', '67234E434', '0.9000', '', '01', 106, 'B', '1.0000', '0.000000', 'MG', '', 'MG', 3, '', 'F'),
(7175, '2019-02-01', '2018-05-06', '094667220', 'GAINES, TERRI', '*WEITZ PARTNERS VALUE FUND', 1963, '40000.00', '0.00', '5000.00', NULL, '0.00', '2019-02-02', '2019-02-03', '2500.00', 1, '', '', 20, 'JONES, JIM', NULL, b'0', 2, 0, 0, '0.0100', '0.0000', '0.0000', '0.00', '0.00', '0.00', 3, 0, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '(None)', '435353', '0.5000', '', '01', 271, 'B', '2.0000', '2.000000', 'MG', '', '', 0, ' 1 5', 'F'),
(7176, '2019-02-01', '2018-05-01', '094667220', 'GAINES, TERRI', 'SAMPLE REIT 2', 5, '10000.00', '0.00', '3000.00', NULL, '0.00', '2019-02-02', '2019-02-03', '2280.00', 1, '', '', 44, 'JONES, JIM', NULL, b'0', 2, 0, 0, '0.0100', '0.0000', '0.0000', '0.00', '0.00', '0.00', 3, 0, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '(None)', '3463464', '0.7600', '', '01', 250, 'B', '1.0000', '1.000000', 'MG', '', '', 0, '', 'F'),
(23, '2019-02-01', '2018-10-08', '999904233', 'WILSON, JOHNATHON', 'OPPENHEIMER 001', 3386, '25000.00', '1017.12', '1017.12', NULL, '8.00', '2019-02-02', '2019-02-03', '508.56', 2, '', '', 20, 'SPLIT, JONES/ROBERTS', '2010-11-11', b'0', 0, 0, 0, '0.0000', '0.0000', '0.0000', '0.00', '0.00', '0.00', 1, 0, NULL, '', '', '2013-07-09', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '403.65', '0.00', NULL, NULL, 'AB12345', 'OPP43453', '0.5000', '', '01', 145, 'B', '0.0000', '0.000000', 'KR', 'MG', 'KR', 5, '', 'F'),
(7166, '2019-02-01', '2018-07-20', '094667220', 'GAINES, TERRI', 'OPPENHEIMER ACTIVE ALLOCATION FUND', 1779, '200.00', '10.00', '10.00', NULL, '0.00', '2019-02-02', '2019-02-03', '5.00', 1, '', '', 20, 'JONES, JIM', '2016-07-20', b'1', 0, 0, 0, '0.0000', '0.0000', '0.0000', '0.00', '0.00', '0.00', 2, 3, NULL, 'LICENSING', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'TR4053104', 'OPP12345', '0.5000', '', '', 208, 'B', '0.0000', '0.000000', 'MG', '', 'MG', 9, '', 'F'),
(7211, '2019-02-01', '2018-08-11', '094667220', 'GAINES, TERRI', 'COACH INC EX-DIV DATE 10/02/03 RECO', 778, '2569.00', '71.85', '71.85', NULL, '14.00', '2019-02-02', '2019-02-03', '35.93', 1, '', '', 21, 'JONES, JIM', '2018-12-12', b'0', 0, 0, 0, '0.0000', '0.0000', '0.0000', '0.00', '0.00', '0.00', 0, 0, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'TR4053104', '189754104', '0.5000', 'NF', '', 0, 'S', '-50.0000', '51.380000', 'MG', '', 'MG', 0, '', 'F'),
(7212, '2019-02-01', '2018-08-11', '094667220', 'GAINES, TERRI', 'COACH INC EX-DIV DATE 10/02/03 RECO', 778, '2554.00', '33.15', '33.15', NULL, '14.00', '2019-02-02', '2019-02-03', '16.58', 1, '', '', 21, 'JONES, JIM', '2018-12-12', b'0', 0, 0, 0, '0.0000', '0.0000', '0.0000', '0.00', '0.00', '0.00', 0, 0, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'TR4053104', '189754104', '0.5000', 'NF', '', 0, 'S', '-50.0000', '51.080000', 'MG', '', 'MG', 0, '', 'F'),
(7191, '2019-02-01', '2018-08-10', '567577524', 'SANDERS, JIM', '*MERIDIAN VALUE FUND', 1924, '10000.00', '400.00', '0.00', NULL, '0.00', '2019-02-02', '2019-02-03', '0.00', 1, '', '', 20, 'JONES, JIM', NULL, b'0', 0, 0, 0, '0.0000', '0.0000', '0.0000', '0.00', '0.00', '0.00', 2, 3, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '(None)', '283978242', '0.5000', '', '01', 250, 'B', '0.0000', '0.000000', 'MG', '', '', 0, '', 'F'),
(7188, '2019-02-01', '2018-09-20', '094667220', 'GAINES, TERRI', 'TEST LIFE INSURANCE PRODUCT', 1, '0.00', '50.00', '75.00', NULL, '0.00', '2019-02-02', '2019-02-03', '30.00', 1, '', '', 26, 'JONES, JIM', '2017-09-15', b'0', 0, 0, 0, '0.0000', '0.0000', '0.0000', '0.00', '0.00', '0.00', 2, 3, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '(None)', '2892424', '0.4000', '', '', 282, 'B', '1.0000', '0.000000', 'MG', '', 'MG', 1, '', 'F'),
(7167, '2019-02-01', '2018-09-29', '567577526', 'JOHNS, JENNIFER', 'OPPENHEIMER ACTIVE ALLOCATION FUND', 1779, '213.00', '1.00', '1.00', NULL, '0.00', '2019-02-02', '2019-02-03', '0.50', 1, '', '', 20, 'JONES, JIM', '2016-09-29', b'1', 0, 0, 0, '0.0000', '0.0000', '0.0000', '0.00', '0.00', '0.00', 2, 3, NULL, 'LICENSING', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'P1L967564', 'OPP12345', '0.5000', '', '', 208, 'B', '0.0000', '0.000000', 'MG', '', 'MG', 9, '', 'F'),
(7168, '2019-02-01', '2018-10-04', '999904233', 'WILSON, JOHNATHON', 'OPPENHEIMER ACTIVE ALLOCATION FUND', 1779, '100.00', '1.00', '1.00', NULL, '0.00', '2019-02-02', '2019-02-03', '0.50', 1, '', '', 20, 'JONES, JIM', '2016-09-29', b'1', 0, 0, 0, '0.0000', '0.0000', '0.0000', '0.00', '0.00', '0.00', 2, 3, NULL, 'LICENSING', '', '2017-02-03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'P1L966690', 'OPP12345', '0.5000', '', '', 208, 'B', '0.0000', '0.000000', 'MG', 'MG', 'MG', 9, '', 'F'),
(41, '2019-02-01', NULL, '094667220', 'GAINES, TERRI', '*MERIDIAN VALUE FUND', 1924, '34000.00', '242.00', '242.00', NULL, '0.00', '2019-02-02', '2019-02-03', '121.00', 4, '', '', 20, 'JOHNSON, TIM', NULL, b'0', 1, 0, 0, '0.0100', '0.0000', '0.0000', '0.00', '0.00', '0.00', 1, 0, NULL, '', '', '2018-12-12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00', NULL, NULL, '3253453433', '35534H66', '0.5000', '', '', 71, 'B', '0.0000', '0.000000', '', 'MG', '', 7, '', 'F'),
(42, '2019-02-01', '2018-05-06', '094667220', 'GAINES, TERRI', 'GLOBAL X FDS GLOBAL X SOCIAL MEDIA', 1924, '4000.00', '0.00', '100.00', NULL, '0.00', '2019-02-02', '2019-02-03', '95.00', 3, '', '', 21, 'ROBERTS, AL', '2014-05-01', b'0', 0, 0, 0, '0.0000', '0.0000', '0.0000', '0.00', '0.00', '0.00', 1, 0, NULL, '', '', '2018-12-12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '25.00', '0.00', NULL, NULL, '243897DS', '35534H66', '0.9500', '', '', 0, 'B', '0.0000', '0.000000', 'MG', 'MG', 'MG', 7, '', 'F'),
(7189, '2019-02-01', NULL, '094667220', 'GAINES, TERRI', 'VA CUSIP 79588L107', 12, '31941.51', '13.31', '13.31', NULL, '0.00', '2019-02-02', '2019-02-03', '9.32', 4, '', '', 24, 'JOHNSON, TIM', '2017-11-28', b'0', 1, 0, 0, '0.0100', '0.0000', '0.0000', '0.13', '0.00', '0.00', 0, 0, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00', NULL, NULL, '7200016561', '79588L107', '0.7000', 'AP', '01', 66, 'B', '0.0000', '0.000000', 'MG', '', 'MG', 1, '', 'F'),
(7190, '2019-02-01', '2018-11-20', '567577524', 'SANDERS, JIM', 'AIM 001413301', 2118, '0.00', '50.00', '60.00', NULL, '0.00', '2019-02-02', '2019-02-03', '30.00', 1, '', '', 20, 'JONES, JIM', '2017-12-27', b'0', 0, 0, 0, '0.0000', '0.0000', '0.0000', '0.00', '0.00', '0.00', 2, 3, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '(None)', '001413301', '0.5000', '', '', 271, 'B', '0.0000', '0.000000', 'MG', '', 'MG', 16, '', 'F'),
(7213, '2019-02-01', '2018-12-04', '999904233', 'WILSON, JOHNATHON', 'EHV 277911822', 3871, '0.00', '1.23', '1.23', NULL, '0.00', '2019-02-02', '2019-02-03', '0.74', 1, '', '', 40, 'JONES, JIM', '2018-12-12', b'0', 0, 0, 0, '0.0000', '0.0000', '0.0000', '0.00', '0.00', '0.00', 0, 0, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00', NULL, NULL, 'P1L966690', '277911822', '0.6000', 'N1', '01', 281, 'B', '1.0000', '0.000000', 'MG', '', 'MG', 12, '', 'F'),
(7214, '2019-02-01', '2018-12-04', '999904233', 'WILSON, JOHNATHON', 'EHV 277911822', 3871, '0.00', '3.69', '3.69', NULL, '0.00', '2019-02-02', '2019-02-03', '0.00', 1, '', '', 40, 'JONES, JIM', '2018-12-12', b'0', 0, 0, 0, '0.0000', '0.0000', '0.0000', '0.00', '0.00', '0.00', 0, 0, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00', NULL, NULL, 'P1L966690', '277911822', '0.6000', 'N1', '01', 281, 'B', '1.0000', '0.000000', 'MG', '', 'MG', 12, '', 'F'),
(7169, '2019-02-01', '2018-12-04', '094667220', 'GAINES, TERRI', 'FAR EAST NATL BK LOS', 11, '-40000.00', '-30.50', '-1500.00', NULL, '-25.00', '2019-02-02', '2019-02-03', '0.00', 1, '', '', 28, 'JONES, JIM', NULL, b'0', 0, 0, 0, '0.0000', '0.0000', '0.0000', '0.00', '0.00', '0.00', 2, 3, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '(None)', '307327AQ9', '0.6000', 'SW', '', 0, 'B', '-40000.0000', '1.000000', 'MG', '', '', 0, '', 'F'),
(7170, '2019-02-01', '2018-12-04', '094667220', 'GAINES, TERRI', 'FAR EAST NATL BK LOS', 11, '40000.00', '30.50', '2000.00', NULL, '25.00', '2019-02-02', '2019-02-03', '0.00', 1, '', '', 28, 'JONES, JIM', NULL, b'0', 0, 0, 0, '0.0000', '0.0000', '0.0000', '0.00', '0.00', '0.00', 2, 3, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '(None)', '307327AQ9', '0.6000', 'SW', '', 0, 'B', '40000.0000', '1.000000', 'MG', '', '', 0, '', 'F'),
(7171, '2019-02-01', '2018-12-04', '094667220', 'GAINES, TERRI', 'BEAL BK SSB PLANO TE', 12, '50000.00', '67.50', '2000.00', NULL, '25.00', '2019-02-02', '2019-02-03', '0.00', 1, '', '', 28, 'JONES, JIM', NULL, b'0', 0, 0, 0, '0.0000', '0.0000', '0.0000', '0.00', '0.00', '0.00', 2, 3, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '(None)', '07368XXD5', '0.6000', 'SW', '', 0, 'B', '50000.0000', '1.000000', 'MG', '', '', 0, '', 'F');
INSERT INTO `trades` (`TRADE_NO`, `DATE`, `SET_DATE`, `CLI_NO`, `CLI_NAME`, `INVEST`, `INV_NO`, `NET_AMT`, `COMM_EXP`, `COMM_REC`, `FCOMM_REC2`, `CHARGE`, `DATE_REC`, `PAY_DATE`, `REP_COMM`, `REP_NO`, `SAL_NO`, `BRANCH_MGR`, `INV_TYPE`, `REP_NAME`, `UP_DATE`, `HOLD`, `OVERRIDE`, `OVERRIDE2`, `OVERRIDE3`, `OVER_RATE`, `OVER2_RATE`, `OVER3_RATE`, `OVER_COMM`, `OVER2_COMM`, `OVER3_COMM`, `SPL_REP2`, `SPL_REP3`, `HOLDDATE`, `HOLDREASON`, `CUSTOMERID`, `EDIT_DATE`, `SPL_REP`, `SPL_REP4`, `SPL_REP5`, `SPL_AMT`, `SPL_AMT2`, `SPL_AMT3`, `SPL_AMT4`, `SPL_AMT5`, `SPL_CHG`, `SPL_CHG2`, `SPL_CHG3`, `SPL_CHG4`, `SPL_CHG5`, `SPL_COMM`, `SPL2_COMM`, `SPL3_COMM`, `SPL4_COMM`, `SPL5_COMM`, `CLEARING`, `CUSIP_NO`, `REP_RATE`, `SOURCE`, `BANK_NO`, `CO_NO`, `BUY_SELL`, `UNITS`, `PRICE`, `IN_USER`, `EDIT_USER`, `POST_USER`, `BATCH`, `ERR_CODE`, `CANCEL`) VALUES
(7216, '2019-02-01', '2018-12-18', '094667220', 'GAINES, TERRI', 'AIM BASIC VALUE FUND CLASS B', 1692, '0.00', '1000.00', '1500.00', NULL, '0.00', '2019-02-02', '2019-02-03', '0.00', 1, '', '', 20, 'JONES, JIM', '2018-12-13', b'0', 0, 0, 0, '0.0000', '0.0000', '0.0000', '0.00', '0.00', '0.00', 3, 0, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '(None)', 'M1238989X', '0.5000', '', '', 200, 'B', '0.0000', '0.000000', 'MG', '', 'MG', 17, '', 'F'),
(7179, '2019-02-01', NULL, '094667220', 'GAINES, TERRI', 'PERSPII', 11, '824230.05', '57696.10', '57696.10', NULL, '0.00', '2019-02-02', '2019-02-03', '0.00', 2, '', '', 24, 'SPLIT, JONES/ROBERTS', '2017-01-04', b'0', 0, 0, 0, '0.0000', '0.0000', '0.0000', '0.00', '0.00', '0.00', 100, 0, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00', NULL, NULL, '1019648865', '17823782B', '0.6000', 'AP', '01', 286, 'B', '0.0000', '0.000000', 'MG', '', 'MG', 6, '', 'F'),
(7217, '2019-02-09', NULL, '094667220', 'GAINES, TERRI', 'VICUS RIA MANAGED FEES', 5, '20240.12', '4.30', '0.00', NULL, '0.00', NULL, NULL, '0.00', 4, '', '', 29, 'JOHNSON, TIM', '2019-01-18', b'0', 1, 0, 0, '0.0100', '0.0000', '0.0000', '0.00', '0.00', '0.00', 0, 0, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00', NULL, NULL, '860855DEF', '79518', '0.7000', 'AP', '01', 285, 'B', '0.0000', '0.000000', 'MG', '', 'MG', 2, '', 'F'),
(7218, '2019-02-09', NULL, '094667220', 'GAINES, TERRI', 'VICUS RIA MANAGED FEES', 5, '20000.00', '1.51', '0.00', NULL, '0.00', NULL, NULL, '0.00', 4, '', '', 29, 'JOHNSON, TIM', '2019-01-18', b'0', 1, 0, 0, '0.0100', '0.0000', '0.0000', '0.00', '0.00', '0.00', 0, 0, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00', NULL, NULL, '860855DEF', '79518', '0.7000', 'AP', '01', 285, 'B', '0.0000', '0.000000', 'MG', '', 'MG', 2, '', 'F'),
(7219, '2019-02-09', NULL, '094667220', 'GAINES, TERRI', 'VICUS RIA MANAGED FEES', 5, '20240.12', '4.30', '0.00', NULL, '0.00', NULL, NULL, '0.00', 4, '', '', 29, 'JOHNSON, TIM', '2019-01-20', b'0', 1, 0, 0, '0.0100', '0.0000', '0.0000', '0.00', '0.00', '0.00', 0, 0, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00', NULL, NULL, '860855DEF', '79518', '0.7000', 'AP', '01', 285, 'B', '0.0000', '0.000000', 'MG', '', 'MG', 2, '', 'F'),
(7220, '2019-02-09', NULL, '094667220', 'GAINES, TERRI', 'VICUS RIA MANAGED FEES', 5, '20000.00', '1.51', '0.00', NULL, '0.00', NULL, NULL, '0.00', 4, '', '', 29, 'JOHNSON, TIM', '2019-01-20', b'0', 1, 0, 0, '0.0100', '0.0000', '0.0000', '0.00', '0.00', '0.00', 0, 0, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00', NULL, NULL, '860855DEF', '79518', '0.7000', 'AP', '01', 285, 'B', '0.0000', '0.000000', 'MG', '', 'MG', 2, '', 'F'),
(7221, '2019-02-22', NULL, '567577526', 'JOHNS, JENNIFER', 'FIDELITY FUND PRODUCT A', 6, '10000.00', '100.00', '0.00', NULL, '0.00', NULL, NULL, '0.00', 1, '', '', 29, 'JONES, JIM', '2019-01-22', b'0', 0, 0, 0, '0.0000', '0.0000', '0.0000', '0.00', '0.00', '0.00', 0, 0, NULL, '', '', '2019-01-22', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '(None)', '67234E434', '0.7000', '', '01', 106, 'B', '1.0000', '10000.000000', 'MG', 'MG', 'MG', 3, 'D', 'F'),
(7222, '2019-02-21', NULL, '094667220', 'GAINES, TERRI', 'FIDELITY FUND PRODUCT A', 6, '10000.00', '0.00', '0.00', NULL, '0.00', NULL, NULL, '0.00', 1, '', '', 29, 'JONES, JIM', '2019-01-22', b'0', 0, 0, 0, '0.0000', '0.0000', '0.0000', '0.00', '0.00', '0.00', 0, 0, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '860855DEF', '67234E434', '0.7000', '', '01', 106, 'B', '1.0000', '0.000000', 'MG', '', 'MG', 3, ' D', 'F'),
(7224, '2019-02-22', NULL, '094667220', 'GAINES, TERRI', 'FIDELITY FUND PRODUCT A', 6, '20000.00', '0.00', '0.00', NULL, '0.00', NULL, NULL, '0.00', 1, '', '', 29, 'JONES, JIM', '2019-01-22', b'0', 0, 0, 0, '0.0000', '0.0000', '0.0000', '0.00', '0.00', '0.00', 0, 0, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '860855DEF', '67234E434', '0.7000', '', '01', 106, 'B', '1.0000', '0.000000', 'MG', '', 'MG', 3, '', 'F'),
(7175, '2019-03-03', '2018-05-06', '094667220', 'GAINES, TERRI', '*WEITZ PARTNERS VALUE FUND', 1963, '40000.00', '0.00', '5000.00', NULL, '0.00', '2019-03-04', '2019-03-05', '2500.00', 1, '', '', 20, 'JONES, JIM', NULL, b'0', 2, 0, 0, '0.0100', '0.0000', '0.0000', '0.00', '0.00', '0.00', 3, 0, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '(None)', '435353', '0.5000', '', '01', 271, 'B', '2.0000', '2.000000', 'MG', '', '', 0, ' 1 5', 'F'),
(7176, '2019-03-03', '2018-05-01', '094667220', 'GAINES, TERRI', 'SAMPLE REIT 2', 5, '10000.00', '0.00', '3000.00', NULL, '0.00', '2019-03-04', '2019-03-05', '2280.00', 1, '', '', 44, 'JONES, JIM', NULL, b'0', 2, 0, 0, '0.0100', '0.0000', '0.0000', '0.00', '0.00', '0.00', 3, 0, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '(None)', '3463464', '0.7600', '', '01', 250, 'B', '1.0000', '1.000000', 'MG', '', '', 0, '', 'F'),
(23, '2019-03-03', '2018-10-08', '999904233', 'WILSON, JOHNATHON', 'OPPENHEIMER 001', 3386, '25000.00', '1017.12', '1017.12', NULL, '8.00', '2019-03-04', '2019-03-05', '508.56', 2, '', '', 20, 'SPLIT, JONES/ROBERTS', '2010-11-11', b'0', 0, 0, 0, '0.0000', '0.0000', '0.0000', '0.00', '0.00', '0.00', 1, 0, NULL, '', '', '2013-07-09', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '403.65', '0.00', NULL, NULL, 'AB12345', 'OPP43453', '0.5000', '', '01', 145, 'B', '0.0000', '0.000000', 'KR', 'MG', 'KR', 5, '', 'F'),
(7166, '2019-03-03', '2018-07-20', '094667220', 'GAINES, TERRI', 'OPPENHEIMER ACTIVE ALLOCATION FUND', 1779, '200.00', '10.00', '10.00', NULL, '0.00', '2019-03-04', '2019-03-05', '5.00', 1, '', '', 20, 'JONES, JIM', '2016-07-20', b'1', 0, 0, 0, '0.0000', '0.0000', '0.0000', '0.00', '0.00', '0.00', 2, 3, NULL, 'LICENSING', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'TR4053104', 'OPP12345', '0.5000', '', '', 208, 'B', '0.0000', '0.000000', 'MG', '', 'MG', 9, '', 'F'),
(7211, '2019-03-03', '2018-08-11', '094667220', 'GAINES, TERRI', 'COACH INC EX-DIV DATE 10/02/03 RECO', 778, '2569.00', '71.85', '71.85', NULL, '14.00', '2019-03-04', '2019-03-05', '35.93', 1, '', '', 21, 'JONES, JIM', '2018-12-12', b'0', 0, 0, 0, '0.0000', '0.0000', '0.0000', '0.00', '0.00', '0.00', 0, 0, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'TR4053104', '189754104', '0.5000', 'NF', '', 0, 'S', '-50.0000', '51.380000', 'MG', '', 'MG', 0, '', 'F'),
(7212, '2019-03-03', '2018-08-11', '094667220', 'GAINES, TERRI', 'COACH INC EX-DIV DATE 10/02/03 RECO', 778, '2554.00', '33.15', '33.15', NULL, '14.00', '2019-03-04', '2019-03-05', '16.58', 1, '', '', 21, 'JONES, JIM', '2018-12-12', b'0', 0, 0, 0, '0.0000', '0.0000', '0.0000', '0.00', '0.00', '0.00', 0, 0, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'TR4053104', '189754104', '0.5000', 'NF', '', 0, 'S', '-50.0000', '51.080000', 'MG', '', 'MG', 0, '', 'F'),
(7191, '2019-03-03', '2018-08-10', '567577524', 'SANDERS, JIM', '*MERIDIAN VALUE FUND', 1924, '10000.00', '400.00', '0.00', NULL, '0.00', '2019-03-04', '2019-03-05', '0.00', 1, '', '', 20, 'JONES, JIM', NULL, b'0', 0, 0, 0, '0.0000', '0.0000', '0.0000', '0.00', '0.00', '0.00', 2, 3, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '(None)', '283978242', '0.5000', '', '01', 250, 'B', '0.0000', '0.000000', 'MG', '', '', 0, '', 'F'),
(7188, '2019-03-03', '2018-09-20', '094667220', 'GAINES, TERRI', 'TEST LIFE INSURANCE PRODUCT', 1, '0.00', '50.00', '75.00', NULL, '0.00', '2019-03-04', '2019-03-05', '30.00', 1, '', '', 26, 'JONES, JIM', '2017-09-15', b'0', 0, 0, 0, '0.0000', '0.0000', '0.0000', '0.00', '0.00', '0.00', 2, 3, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '(None)', '2892424', '0.4000', '', '', 282, 'B', '1.0000', '0.000000', 'MG', '', 'MG', 1, '', 'F'),
(7167, '2019-03-03', '2018-09-29', '567577526', 'JOHNS, JENNIFER', 'OPPENHEIMER ACTIVE ALLOCATION FUND', 1779, '213.00', '1.00', '1.00', NULL, '0.00', '2019-03-04', '2019-03-05', '0.50', 1, '', '', 20, 'JONES, JIM', '2016-09-29', b'1', 0, 0, 0, '0.0000', '0.0000', '0.0000', '0.00', '0.00', '0.00', 2, 3, NULL, 'LICENSING', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'P1L967564', 'OPP12345', '0.5000', '', '', 208, 'B', '0.0000', '0.000000', 'MG', '', 'MG', 9, '', 'F'),
(7168, '2019-03-03', '2018-10-04', '999904233', 'WILSON, JOHNATHON', 'OPPENHEIMER ACTIVE ALLOCATION FUND', 1779, '100.00', '1.00', '1.00', NULL, '0.00', '2019-03-04', '2019-03-05', '0.50', 1, '', '', 20, 'JONES, JIM', '2016-09-29', b'1', 0, 0, 0, '0.0000', '0.0000', '0.0000', '0.00', '0.00', '0.00', 2, 3, NULL, 'LICENSING', '', '2017-02-03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'P1L966690', 'OPP12345', '0.5000', '', '', 208, 'B', '0.0000', '0.000000', 'MG', 'MG', 'MG', 9, '', 'F'),
(41, '2019-03-03', NULL, '094667220', 'GAINES, TERRI', '*MERIDIAN VALUE FUND', 1924, '34000.00', '242.00', '242.00', NULL, '0.00', '2019-03-04', '2019-03-05', '121.00', 4, '', '', 20, 'JOHNSON, TIM', NULL, b'0', 1, 0, 0, '0.0100', '0.0000', '0.0000', '0.00', '0.00', '0.00', 1, 0, NULL, '', '', '2018-12-12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00', NULL, NULL, '3253453433', '35534H66', '0.5000', '', '', 71, 'B', '0.0000', '0.000000', '', 'MG', '', 7, '', 'F'),
(42, '2019-03-03', '2018-05-06', '094667220', 'GAINES, TERRI', 'GLOBAL X FDS GLOBAL X SOCIAL MEDIA', 1924, '4000.00', '0.00', '100.00', NULL, '0.00', '2019-03-04', '2019-03-05', '95.00', 3, '', '', 21, 'ROBERTS, AL', '2014-05-01', b'0', 0, 0, 0, '0.0000', '0.0000', '0.0000', '0.00', '0.00', '0.00', 1, 0, NULL, '', '', '2018-12-12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '25.00', '0.00', NULL, NULL, '243897DS', '35534H66', '0.9500', '', '', 0, 'B', '0.0000', '0.000000', 'MG', 'MG', 'MG', 7, '', 'F'),
(7189, '2019-03-03', NULL, '094667220', 'GAINES, TERRI', 'VA CUSIP 79588L107', 12, '31941.51', '13.31', '13.31', NULL, '0.00', '2019-03-04', '2019-03-05', '9.32', 4, '', '', 24, 'JOHNSON, TIM', '2017-11-28', b'0', 1, 0, 0, '0.0100', '0.0000', '0.0000', '0.13', '0.00', '0.00', 0, 0, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00', NULL, NULL, '7200016561', '79588L107', '0.7000', 'AP', '01', 66, 'B', '0.0000', '0.000000', 'MG', '', 'MG', 1, '', 'F'),
(7190, '2019-03-03', '2018-11-20', '567577524', 'SANDERS, JIM', 'AIM 001413301', 2118, '0.00', '50.00', '60.00', NULL, '0.00', '2019-03-04', '2019-03-05', '30.00', 1, '', '', 20, 'JONES, JIM', '2017-12-27', b'0', 0, 0, 0, '0.0000', '0.0000', '0.0000', '0.00', '0.00', '0.00', 2, 3, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '(None)', '001413301', '0.5000', '', '', 271, 'B', '0.0000', '0.000000', 'MG', '', 'MG', 16, '', 'F'),
(7213, '2019-03-03', '2018-12-04', '999904233', 'WILSON, JOHNATHON', 'EHV 277911822', 3871, '0.00', '1.23', '1.23', NULL, '0.00', '2019-03-04', '2019-03-05', '0.74', 1, '', '', 40, 'JONES, JIM', '2018-12-12', b'0', 0, 0, 0, '0.0000', '0.0000', '0.0000', '0.00', '0.00', '0.00', 0, 0, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00', NULL, NULL, 'P1L966690', '277911822', '0.6000', 'N1', '01', 281, 'B', '1.0000', '0.000000', 'MG', '', 'MG', 12, '', 'F'),
(7214, '2019-03-03', '2018-12-04', '999904233', 'WILSON, JOHNATHON', 'EHV 277911822', 3871, '0.00', '3.69', '3.69', NULL, '0.00', '2019-03-04', '2019-03-05', '0.00', 1, '', '', 40, 'JONES, JIM', '2018-12-12', b'0', 0, 0, 0, '0.0000', '0.0000', '0.0000', '0.00', '0.00', '0.00', 0, 0, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00', NULL, NULL, 'P1L966690', '277911822', '0.6000', 'N1', '01', 281, 'B', '1.0000', '0.000000', 'MG', '', 'MG', 12, '', 'F'),
(7169, '2019-03-03', '2018-12-04', '094667220', 'GAINES, TERRI', 'FAR EAST NATL BK LOS', 11, '-40000.00', '-30.50', '-1500.00', NULL, '-25.00', '2019-03-04', '2019-03-05', '0.00', 1, '', '', 28, 'JONES, JIM', NULL, b'0', 0, 0, 0, '0.0000', '0.0000', '0.0000', '0.00', '0.00', '0.00', 2, 3, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '(None)', '307327AQ9', '0.6000', 'SW', '', 0, 'B', '-40000.0000', '1.000000', 'MG', '', '', 0, '', 'F'),
(7170, '2019-03-03', '2018-12-04', '094667220', 'GAINES, TERRI', 'FAR EAST NATL BK LOS', 11, '40000.00', '30.50', '2000.00', NULL, '25.00', '2019-03-04', '2019-03-05', '0.00', 1, '', '', 28, 'JONES, JIM', NULL, b'0', 0, 0, 0, '0.0000', '0.0000', '0.0000', '0.00', '0.00', '0.00', 2, 3, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '(None)', '307327AQ9', '0.6000', 'SW', '', 0, 'B', '40000.0000', '1.000000', 'MG', '', '', 0, '', 'F'),
(7171, '2019-03-03', '2018-12-04', '094667220', 'GAINES, TERRI', 'BEAL BK SSB PLANO TE', 12, '50000.00', '67.50', '2000.00', NULL, '25.00', '2019-03-04', '2019-03-05', '0.00', 1, '', '', 28, 'JONES, JIM', NULL, b'0', 0, 0, 0, '0.0000', '0.0000', '0.0000', '0.00', '0.00', '0.00', 2, 3, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '(None)', '07368XXD5', '0.6000', 'SW', '', 0, 'B', '50000.0000', '1.000000', 'MG', '', '', 0, '', 'F'),
(7216, '2019-03-03', '2018-12-18', '094667220', 'GAINES, TERRI', 'AIM BASIC VALUE FUND CLASS B', 1692, '0.00', '1000.00', '1500.00', NULL, '0.00', '2019-03-04', '2019-03-05', '0.00', 1, '', '', 20, 'JONES, JIM', '2018-12-13', b'0', 0, 0, 0, '0.0000', '0.0000', '0.0000', '0.00', '0.00', '0.00', 3, 0, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '(None)', 'M1238989X', '0.5000', '', '', 200, 'B', '0.0000', '0.000000', 'MG', '', 'MG', 17, '', 'F'),
(7179, '2019-03-03', NULL, '094667220', 'GAINES, TERRI', 'PERSPII', 11, '824230.05', '57696.10', '57696.10', NULL, '0.00', '2019-03-04', '2019-03-05', '0.00', 2, '', '', 24, 'SPLIT, JONES/ROBERTS', '2017-01-04', b'0', 0, 0, 0, '0.0000', '0.0000', '0.0000', '0.00', '0.00', '0.00', 100, 0, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00', NULL, NULL, '1019648865', '17823782B', '0.6000', 'AP', '01', 286, 'B', '0.0000', '0.000000', 'MG', '', 'MG', 6, '', 'F'),
(7217, '2019-03-11', NULL, '094667220', 'GAINES, TERRI', 'VICUS RIA MANAGED FEES', 5, '20240.12', '4.30', '0.00', NULL, '0.00', NULL, NULL, '0.00', 4, '', '', 29, 'JOHNSON, TIM', '2019-01-18', b'0', 1, 0, 0, '0.0100', '0.0000', '0.0000', '0.00', '0.00', '0.00', 0, 0, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00', NULL, NULL, '860855DEF', '79518', '0.7000', 'AP', '01', 285, 'B', '0.0000', '0.000000', 'MG', '', 'MG', 2, '', 'F'),
(7218, '2019-03-11', NULL, '094667220', 'GAINES, TERRI', 'VICUS RIA MANAGED FEES', 5, '20000.00', '1.51', '0.00', NULL, '0.00', NULL, NULL, '0.00', 4, '', '', 29, 'JOHNSON, TIM', '2019-01-18', b'0', 1, 0, 0, '0.0100', '0.0000', '0.0000', '0.00', '0.00', '0.00', 0, 0, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00', NULL, NULL, '860855DEF', '79518', '0.7000', 'AP', '01', 285, 'B', '0.0000', '0.000000', 'MG', '', 'MG', 2, '', 'F'),
(7219, '2019-03-11', NULL, '094667220', 'GAINES, TERRI', 'VICUS RIA MANAGED FEES', 5, '20240.12', '4.30', '0.00', NULL, '0.00', NULL, NULL, '0.00', 4, '', '', 29, 'JOHNSON, TIM', '2019-01-20', b'0', 1, 0, 0, '0.0100', '0.0000', '0.0000', '0.00', '0.00', '0.00', 0, 0, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00', NULL, NULL, '860855DEF', '79518', '0.7000', 'AP', '01', 285, 'B', '0.0000', '0.000000', 'MG', '', 'MG', 2, '', 'F'),
(7220, '2019-03-11', NULL, '094667220', 'GAINES, TERRI', 'VICUS RIA MANAGED FEES', 5, '20000.00', '1.51', '0.00', NULL, '0.00', NULL, NULL, '0.00', 4, '', '', 29, 'JOHNSON, TIM', '2019-01-20', b'0', 1, 0, 0, '0.0100', '0.0000', '0.0000', '0.00', '0.00', '0.00', 0, 0, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00', NULL, NULL, '860855DEF', '79518', '0.7000', 'AP', '01', 285, 'B', '0.0000', '0.000000', 'MG', '', 'MG', 2, '', 'F'),
(7221, '2019-03-24', NULL, '567577526', 'JOHNS, JENNIFER', 'FIDELITY FUND PRODUCT A', 6, '10000.00', '100.00', '0.00', NULL, '0.00', NULL, NULL, '0.00', 1, '', '', 29, 'JONES, JIM', '2019-01-22', b'0', 0, 0, 0, '0.0000', '0.0000', '0.0000', '0.00', '0.00', '0.00', 0, 0, NULL, '', '', '2019-01-22', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '(None)', '67234E434', '0.7000', '', '01', 106, 'B', '1.0000', '10000.000000', 'MG', 'MG', 'MG', 3, 'D', 'F'),
(7222, '2019-03-23', NULL, '094667220', 'GAINES, TERRI', 'FIDELITY FUND PRODUCT A', 6, '10000.00', '0.00', '0.00', NULL, '0.00', NULL, NULL, '0.00', 1, '', '', 29, 'JONES, JIM', '2019-01-22', b'0', 0, 0, 0, '0.0000', '0.0000', '0.0000', '0.00', '0.00', '0.00', 0, 0, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '860855DEF', '67234E434', '0.7000', '', '01', 106, 'B', '1.0000', '0.000000', 'MG', '', 'MG', 3, ' D', 'F'),
(7224, '2019-03-24', NULL, '094667220', 'GAINES, TERRI', 'FIDELITY FUND PRODUCT A', 6, '20000.00', '0.00', '0.00', NULL, '0.00', NULL, NULL, '0.00', 1, '', '', 29, 'JONES, JIM', '2019-01-22', b'0', 0, 0, 0, '0.0000', '0.0000', '0.0000', '0.00', '0.00', '0.00', 0, 0, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '860855DEF', '67234E434', '0.7000', '', '01', 106, 'B', '1.0000', '0.000000', 'MG', '', 'MG', 3, '', 'F'),
(7175, '2019-04-02', '2018-05-06', '094667220', 'GAINES, TERRI', '*WEITZ PARTNERS VALUE FUND', 1963, '40000.00', '0.00', '5000.00', NULL, '0.00', '2019-04-03', '2019-04-04', '2500.00', 1, '', '', 20, 'JONES, JIM', NULL, b'0', 2, 0, 0, '0.0100', '0.0000', '0.0000', '0.00', '0.00', '0.00', 3, 0, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '(None)', '435353', '0.5000', '', '01', 271, 'B', '2.0000', '2.000000', 'MG', '', '', 0, ' 1 5', 'F'),
(7176, '2019-04-02', '2018-05-01', '094667220', 'GAINES, TERRI', 'SAMPLE REIT 2', 5, '10000.00', '0.00', '3000.00', NULL, '0.00', '2019-04-03', '2019-04-04', '2280.00', 1, '', '', 44, 'JONES, JIM', NULL, b'0', 2, 0, 0, '0.0100', '0.0000', '0.0000', '0.00', '0.00', '0.00', 3, 0, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '(None)', '3463464', '0.7600', '', '01', 250, 'B', '1.0000', '1.000000', 'MG', '', '', 0, '', 'F'),
(23, '2019-04-02', '2018-10-08', '999904233', 'WILSON, JOHNATHON', 'OPPENHEIMER 001', 3386, '25000.00', '1017.12', '1017.12', NULL, '8.00', '2019-04-03', '2019-04-04', '508.56', 2, '', '', 20, 'SPLIT, JONES/ROBERTS', '2010-12-11', b'0', 0, 0, 0, '0.0000', '0.0000', '0.0000', '0.00', '0.00', '0.00', 1, 0, NULL, '', '', '2013-07-09', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '403.65', '0.00', NULL, NULL, 'AB12345', 'OPP43453', '0.5000', '', '01', 145, 'B', '0.0000', '0.000000', 'KR', 'MG', 'KR', 5, '', 'F'),
(7166, '2019-04-02', '2018-07-20', '094667220', 'GAINES, TERRI', 'OPPENHEIMER ACTIVE ALLOCATION FUND', 1779, '200.00', '10.00', '10.00', NULL, '0.00', '2019-04-03', '2019-04-04', '5.00', 1, '', '', 20, 'JONES, JIM', '2016-08-19', b'1', 0, 0, 0, '0.0000', '0.0000', '0.0000', '0.00', '0.00', '0.00', 2, 3, NULL, 'LICENSING', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'TR4053104', 'OPP12345', '0.5000', '', '', 208, 'B', '0.0000', '0.000000', 'MG', '', 'MG', 9, '', 'F'),
(7211, '2019-04-02', '2018-08-11', '094667220', 'GAINES, TERRI', 'COACH INC EX-DIV DATE 10/02/03 RECO', 778, '2569.00', '71.85', '71.85', NULL, '14.00', '2019-04-03', '2019-04-04', '35.93', 1, '', '', 21, 'JONES, JIM', '2019-01-11', b'0', 0, 0, 0, '0.0000', '0.0000', '0.0000', '0.00', '0.00', '0.00', 0, 0, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'TR4053104', '189754104', '0.5000', 'NF', '', 0, 'S', '-50.0000', '51.380000', 'MG', '', 'MG', 0, '', 'F'),
(7212, '2019-04-02', '2018-08-11', '094667220', 'GAINES, TERRI', 'COACH INC EX-DIV DATE 10/02/03 RECO', 778, '2554.00', '33.15', '33.15', NULL, '14.00', '2019-04-03', '2019-04-04', '16.58', 1, '', '', 21, 'JONES, JIM', '2019-01-11', b'0', 0, 0, 0, '0.0000', '0.0000', '0.0000', '0.00', '0.00', '0.00', 0, 0, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'TR4053104', '189754104', '0.5000', 'NF', '', 0, 'S', '-50.0000', '51.080000', 'MG', '', 'MG', 0, '', 'F'),
(7191, '2019-04-02', '2018-08-10', '567577524', 'SANDERS, JIM', '*MERIDIAN VALUE FUND', 1924, '10000.00', '400.00', '0.00', NULL, '0.00', '2019-04-03', '2019-04-04', '0.00', 1, '', '', 20, 'JONES, JIM', NULL, b'0', 0, 0, 0, '0.0000', '0.0000', '0.0000', '0.00', '0.00', '0.00', 2, 3, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '(None)', '283978242', '0.5000', '', '01', 250, 'B', '0.0000', '0.000000', 'MG', '', '', 0, '', 'F'),
(7188, '2019-04-02', '2018-09-20', '094667220', 'GAINES, TERRI', 'TEST LIFE INSURANCE PRODUCT', 1, '0.00', '50.00', '75.00', NULL, '0.00', '2019-04-03', '2019-04-04', '30.00', 1, '', '', 26, 'JONES, JIM', '2017-10-15', b'0', 0, 0, 0, '0.0000', '0.0000', '0.0000', '0.00', '0.00', '0.00', 2, 3, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '(None)', '2892424', '0.4000', '', '', 282, 'B', '1.0000', '0.000000', 'MG', '', 'MG', 1, '', 'F'),
(7167, '2019-04-02', '2018-09-29', '567577526', 'JOHNS, JENNIFER', 'OPPENHEIMER ACTIVE ALLOCATION FUND', 1779, '213.00', '1.00', '1.00', NULL, '0.00', '2019-04-03', '2019-04-04', '0.50', 1, '', '', 20, 'JONES, JIM', '2016-10-29', b'1', 0, 0, 0, '0.0000', '0.0000', '0.0000', '0.00', '0.00', '0.00', 2, 3, NULL, 'LICENSING', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'P1L967564', 'OPP12345', '0.5000', '', '', 208, 'B', '0.0000', '0.000000', 'MG', '', 'MG', 9, '', 'F'),
(7168, '2019-04-02', '2018-10-04', '999904233', 'WILSON, JOHNATHON', 'OPPENHEIMER ACTIVE ALLOCATION FUND', 1779, '100.00', '1.00', '1.00', NULL, '0.00', '2019-04-03', '2019-04-04', '0.50', 1, '', '', 20, 'JONES, JIM', '2016-10-29', b'1', 0, 0, 0, '0.0000', '0.0000', '0.0000', '0.00', '0.00', '0.00', 2, 3, NULL, 'LICENSING', '', '2017-02-03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'P1L966690', 'OPP12345', '0.5000', '', '', 208, 'B', '0.0000', '0.000000', 'MG', 'MG', 'MG', 9, '', 'F'),
(41, '2019-04-02', NULL, '094667220', 'GAINES, TERRI', '*MERIDIAN VALUE FUND', 1924, '34000.00', '242.00', '242.00', NULL, '0.00', '2019-04-03', '2019-04-04', '121.00', 4, '', '', 20, 'JOHNSON, TIM', NULL, b'0', 1, 0, 0, '0.0100', '0.0000', '0.0000', '0.00', '0.00', '0.00', 1, 0, NULL, '', '', '2018-12-12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00', NULL, NULL, '3253453433', '35534H66', '0.5000', '', '', 71, 'B', '0.0000', '0.000000', '', 'MG', '', 7, '', 'F'),
(42, '2019-04-02', '2018-05-06', '094667220', 'GAINES, TERRI', 'GLOBAL X FDS GLOBAL X SOCIAL MEDIA', 1924, '4000.00', '0.00', '100.00', NULL, '0.00', '2019-04-03', '2019-04-04', '95.00', 3, '', '', 21, 'ROBERTS, AL', '2014-05-31', b'0', 0, 0, 0, '0.0000', '0.0000', '0.0000', '0.00', '0.00', '0.00', 1, 0, NULL, '', '', '2018-12-12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '25.00', '0.00', NULL, NULL, '243897DS', '35534H66', '0.9500', '', '', 0, 'B', '0.0000', '0.000000', 'MG', 'MG', 'MG', 7, '', 'F'),
(7189, '2019-04-02', NULL, '094667220', 'GAINES, TERRI', 'VA CUSIP 79588L107', 12, '31941.51', '13.31', '13.31', NULL, '0.00', '2019-04-03', '2019-04-04', '9.32', 4, '', '', 24, 'JOHNSON, TIM', '2017-12-28', b'0', 1, 0, 0, '0.0100', '0.0000', '0.0000', '0.13', '0.00', '0.00', 0, 0, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00', NULL, NULL, '7200016561', '79588L107', '0.7000', 'AP', '01', 66, 'B', '0.0000', '0.000000', 'MG', '', 'MG', 1, '', 'F'),
(7190, '2019-04-02', '2018-11-20', '567577524', 'SANDERS, JIM', 'AIM 001413301', 2118, '0.00', '50.00', '60.00', NULL, '0.00', '2019-04-03', '2019-04-04', '30.00', 1, '', '', 20, 'JONES, JIM', '2018-01-26', b'0', 0, 0, 0, '0.0000', '0.0000', '0.0000', '0.00', '0.00', '0.00', 2, 3, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '(None)', '001413301', '0.5000', '', '', 271, 'B', '0.0000', '0.000000', 'MG', '', 'MG', 16, '', 'F'),
(7213, '2019-04-02', '2018-12-04', '999904233', 'WILSON, JOHNATHON', 'EHV 277911822', 3871, '0.00', '1.23', '1.23', NULL, '0.00', '2019-04-03', '2019-04-04', '0.74', 1, '', '', 40, 'JONES, JIM', '2019-01-11', b'0', 0, 0, 0, '0.0000', '0.0000', '0.0000', '0.00', '0.00', '0.00', 0, 0, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00', NULL, NULL, 'P1L966690', '277911822', '0.6000', 'N1', '01', 281, 'B', '1.0000', '0.000000', 'MG', '', 'MG', 12, '', 'F'),
(7214, '2019-04-02', '2018-12-04', '999904233', 'WILSON, JOHNATHON', 'EHV 277911822', 3871, '0.00', '3.69', '3.69', NULL, '0.00', '2019-04-03', '2019-04-04', '0.00', 1, '', '', 40, 'JONES, JIM', '2019-01-11', b'0', 0, 0, 0, '0.0000', '0.0000', '0.0000', '0.00', '0.00', '0.00', 0, 0, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00', NULL, NULL, 'P1L966690', '277911822', '0.6000', 'N1', '01', 281, 'B', '1.0000', '0.000000', 'MG', '', 'MG', 12, '', 'F'),
(7169, '2019-04-02', '2018-12-04', '094667220', 'GAINES, TERRI', 'FAR EAST NATL BK LOS', 11, '-40000.00', '-30.50', '-1500.00', NULL, '-25.00', '2019-04-03', '2019-04-04', '0.00', 1, '', '', 28, 'JONES, JIM', NULL, b'0', 0, 0, 0, '0.0000', '0.0000', '0.0000', '0.00', '0.00', '0.00', 2, 3, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '(None)', '307327AQ9', '0.6000', 'SW', '', 0, 'B', '-40000.0000', '1.000000', 'MG', '', '', 0, '', 'F'),
(7170, '2019-04-02', '2018-12-04', '094667220', 'GAINES, TERRI', 'FAR EAST NATL BK LOS', 11, '40000.00', '30.50', '2000.00', NULL, '25.00', '2019-04-03', '2019-04-04', '0.00', 1, '', '', 28, 'JONES, JIM', NULL, b'0', 0, 0, 0, '0.0000', '0.0000', '0.0000', '0.00', '0.00', '0.00', 2, 3, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '(None)', '307327AQ9', '0.6000', 'SW', '', 0, 'B', '40000.0000', '1.000000', 'MG', '', '', 0, '', 'F'),
(7171, '2019-04-02', '2018-12-04', '094667220', 'GAINES, TERRI', 'BEAL BK SSB PLANO TE', 12, '50000.00', '67.50', '2000.00', NULL, '25.00', '2019-04-03', '2019-04-04', '0.00', 1, '', '', 28, 'JONES, JIM', NULL, b'0', 0, 0, 0, '0.0000', '0.0000', '0.0000', '0.00', '0.00', '0.00', 2, 3, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '(None)', '07368XXD5', '0.6000', 'SW', '', 0, 'B', '50000.0000', '1.000000', 'MG', '', '', 0, '', 'F'),
(7216, '2019-04-02', '2018-12-18', '094667220', 'GAINES, TERRI', 'AIM BASIC VALUE FUND CLASS B', 1692, '0.00', '1000.00', '1500.00', NULL, '0.00', '2019-04-03', '2019-04-04', '0.00', 1, '', '', 20, 'JONES, JIM', '2019-01-12', b'0', 0, 0, 0, '0.0000', '0.0000', '0.0000', '0.00', '0.00', '0.00', 3, 0, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '(None)', 'M1238989X', '0.5000', '', '', 200, 'B', '0.0000', '0.000000', 'MG', '', 'MG', 17, '', 'F'),
(7179, '2019-04-02', NULL, '094667220', 'GAINES, TERRI', 'PERSPII', 11, '824230.05', '57696.10', '57696.10', NULL, '0.00', '2019-04-03', '2019-04-04', '0.00', 2, '', '', 24, 'SPLIT, JONES/ROBERTS', '2017-02-03', b'0', 0, 0, 0, '0.0000', '0.0000', '0.0000', '0.00', '0.00', '0.00', 100, 0, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00', NULL, NULL, '1019648865', '17823782B', '0.6000', 'AP', '01', 286, 'B', '0.0000', '0.000000', 'MG', '', 'MG', 6, '', 'F'),
(7217, '2019-04-10', NULL, '094667220', 'GAINES, TERRI', 'VICUS RIA MANAGED FEES', 5, '20240.12', '4.30', '0.00', NULL, '0.00', NULL, NULL, '0.00', 4, '', '', 29, 'JOHNSON, TIM', '2019-02-17', b'0', 1, 0, 0, '0.0100', '0.0000', '0.0000', '0.00', '0.00', '0.00', 0, 0, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00', NULL, NULL, '860855DEF', '79518', '0.7000', 'AP', '01', 285, 'B', '0.0000', '0.000000', 'MG', '', 'MG', 2, '', 'F'),
(7218, '2019-04-10', NULL, '094667220', 'GAINES, TERRI', 'VICUS RIA MANAGED FEES', 5, '20000.00', '1.51', '0.00', NULL, '0.00', NULL, NULL, '0.00', 4, '', '', 29, 'JOHNSON, TIM', '2019-02-17', b'0', 1, 0, 0, '0.0100', '0.0000', '0.0000', '0.00', '0.00', '0.00', 0, 0, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00', NULL, NULL, '860855DEF', '79518', '0.7000', 'AP', '01', 285, 'B', '0.0000', '0.000000', 'MG', '', 'MG', 2, '', 'F'),
(7219, '2019-04-10', NULL, '094667220', 'GAINES, TERRI', 'VICUS RIA MANAGED FEES', 5, '20240.12', '4.30', '0.00', NULL, '0.00', NULL, NULL, '0.00', 4, '', '', 29, 'JOHNSON, TIM', '2019-02-19', b'0', 1, 0, 0, '0.0100', '0.0000', '0.0000', '0.00', '0.00', '0.00', 0, 0, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00', NULL, NULL, '860855DEF', '79518', '0.7000', 'AP', '01', 285, 'B', '0.0000', '0.000000', 'MG', '', 'MG', 2, '', 'F'),
(7220, '2019-04-10', NULL, '094667220', 'GAINES, TERRI', 'VICUS RIA MANAGED FEES', 5, '20000.00', '1.51', '0.00', NULL, '0.00', NULL, NULL, '0.00', 4, '', '', 29, 'JOHNSON, TIM', '2019-02-19', b'0', 1, 0, 0, '0.0100', '0.0000', '0.0000', '0.00', '0.00', '0.00', 0, 0, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00', NULL, NULL, '860855DEF', '79518', '0.7000', 'AP', '01', 285, 'B', '0.0000', '0.000000', 'MG', '', 'MG', 2, '', 'F'),
(7221, '2019-06-23', NULL, '567577526', 'JOHNS, JENNIFER', 'FIDELITY FUND PRODUCT A', 6, '10000.00', '100.00', '0.00', NULL, '0.00', NULL, NULL, '0.00', 1, '', '', 29, 'JONES, JIM', '2019-06-23', b'0', 0, 0, 0, '0.0000', '0.0000', '0.0000', '0.00', '0.00', '0.00', 0, 0, NULL, '', '', '2019-01-22', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '(None)', '67234E434', '0.7000', '', '01', 106, 'B', '1.0000', '10000.000000', 'MG', 'MG', 'MG', 3, 'D', 'F'),
(7222, '2019-06-22', NULL, '094667220', 'GAINES, TERRI', 'FIDELITY FUND PRODUCT A', 6, '10000.00', '0.00', '0.00', NULL, '0.00', NULL, NULL, '0.00', 1, '', '', 29, 'JONES, JIM', '2019-06-23', b'0', 0, 0, 0, '0.0000', '0.0000', '0.0000', '0.00', '0.00', '0.00', 0, 0, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '860855DEF', '67234E434', '0.7000', '', '01', 106, 'B', '1.0000', '0.000000', 'MG', '', 'MG', 3, ' D', 'F'),
(7224, '2019-06-23', NULL, '094667220', 'GAINES, TERRI', 'FIDELITY FUND PRODUCT A', 6, '20000.00', '0.00', '0.00', NULL, '0.00', NULL, NULL, '0.00', 1, '', '', 29, 'JONES, JIM', '2019-06-23', b'0', 0, 0, 0, '0.0000', '0.0000', '0.0000', '0.00', '0.00', '0.00', 0, 0, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '860855DEF', '67234E434', '0.7000', '', '01', 106, 'B', '1.0000', '0.000000', 'MG', '', 'MG', 3, '', 'F'),
(7175, '2019-06-02', '2019-06-06', '094667220', 'GAINES, TERRI', '*WEITZ PARTNERS VALUE FUND', 1963, '40000.00', '0.00', '5000.00', NULL, '0.00', '2019-06-03', '2019-06-15', '2500.00', 1, '', '', 20, 'JONES, JIM', NULL, b'0', 2, 0, 0, '0.0100', '0.0000', '0.0000', '0.00', '0.00', '0.00', 3, 0, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '(None)', '435353', '0.5000', '', '01', 271, 'B', '2.0000', '2.000000', 'MG', '', '', 0, ' 1 5', 'F'),
(7176, '2019-06-02', '2019-06-06', '094667220', 'GAINES, TERRI', 'SAMPLE REIT 2', 5, '10000.00', '0.00', '3000.00', NULL, '0.00', '2019-06-03', '2019-06-15', '2280.00', 1, '', '', 44, 'JONES, JIM', NULL, b'0', 2, 0, 0, '0.0100', '0.0000', '0.0000', '0.00', '0.00', '0.00', 3, 0, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '(None)', '3463464', '0.7600', '', '01', 250, 'B', '1.0000', '1.000000', 'MG', '', '', 0, '', 'F'),
(23, '2019-06-02', '2019-06-06', '999904233', 'WILSON, JOHNATHON', 'OPPENHEIMER 001', 3386, '25000.00', '1017.12', '1017.12', NULL, '8.00', '2019-06-03', '2019-06-15', '508.56', 2, '', '', 20, 'SPLIT, JONES/ROBERTS', '2019-06-02', b'0', 0, 0, 0, '0.0000', '0.0000', '0.0000', '0.00', '0.00', '0.00', 1, 0, NULL, '', '', '2013-07-09', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '403.65', '0.00', NULL, NULL, 'AB12345', 'OPP43453', '0.5000', '', '01', 145, 'B', '0.0000', '0.000000', 'KR', 'MG', 'KR', 5, '', 'F'),
(7166, '2019-06-02', '2019-06-06', '094667220', 'GAINES, TERRI', 'OPPENHEIMER ACTIVE ALLOCATION FUND', 1779, '200.00', '10.00', '10.00', NULL, '0.00', '2019-06-03', '2019-06-15', '5.00', 1, '', '', 20, 'JONES, JIM', '2019-06-02', b'1', 0, 0, 0, '0.0000', '0.0000', '0.0000', '0.00', '0.00', '0.00', 2, 3, NULL, 'LICENSING', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'TR4053104', 'OPP12345', '0.5000', '', '', 208, 'B', '0.0000', '0.000000', 'MG', '', 'MG', 9, '', 'F'),
(7211, '2019-06-02', '2019-06-06', '094667220', 'GAINES, TERRI', 'COACH INC EX-DIV DATE 10/02/03 RECO', 778, '2569.00', '71.85', '71.85', NULL, '14.00', '2019-06-03', '2019-06-15', '35.93', 1, '', '', 21, 'JONES, JIM', '2019-06-02', b'0', 0, 0, 0, '0.0000', '0.0000', '0.0000', '0.00', '0.00', '0.00', 0, 0, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'TR4053104', '189754104', '0.5000', 'NF', '', 0, 'S', '-50.0000', '51.380000', 'MG', '', 'MG', 0, '', 'F'),
(7212, '2019-06-02', '2019-06-06', '094667220', 'GAINES, TERRI', 'COACH INC EX-DIV DATE 10/02/03 RECO', 778, '2554.00', '33.15', '33.15', NULL, '14.00', '2019-06-03', '2019-06-15', '16.58', 1, '', '', 21, 'JONES, JIM', '2019-06-02', b'0', 0, 0, 0, '0.0000', '0.0000', '0.0000', '0.00', '0.00', '0.00', 0, 0, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'TR4053104', '189754104', '0.5000', 'NF', '', 0, 'S', '-50.0000', '51.080000', 'MG', '', 'MG', 0, '', 'F'),
(7191, '2019-06-02', '2019-06-06', '567577524', 'SANDERS, JIM', '*MERIDIAN VALUE FUND', 1924, '10000.00', '400.00', '0.00', NULL, '0.00', '2019-06-03', '2019-06-15', '0.00', 1, '', '', 20, 'JONES, JIM', NULL, b'0', 0, 0, 0, '0.0000', '0.0000', '0.0000', '0.00', '0.00', '0.00', 2, 3, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '(None)', '283978242', '0.5000', '', '01', 250, 'B', '0.0000', '0.000000', 'MG', '', '', 0, '', 'F'),
(7188, '2019-06-02', '2019-06-06', '094667220', 'GAINES, TERRI', 'TEST LIFE INSURANCE PRODUCT', 1, '0.00', '50.00', '75.00', NULL, '0.00', '2019-06-03', '2019-06-15', '30.00', 1, '', '', 26, 'JONES, JIM', '2019-06-02', b'0', 0, 0, 0, '0.0000', '0.0000', '0.0000', '0.00', '0.00', '0.00', 2, 3, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '(None)', '2892424', '0.4000', '', '', 282, 'B', '1.0000', '0.000000', 'MG', '', 'MG', 1, '', 'F'),
(7167, '2019-06-02', '2019-06-06', '567577526', 'JOHNS, JENNIFER', 'OPPENHEIMER ACTIVE ALLOCATION FUND', 1779, '213.00', '1.00', '1.00', NULL, '0.00', '2019-06-03', '2019-06-15', '0.50', 1, '', '', 20, 'JONES, JIM', '2019-06-02', b'1', 0, 0, 0, '0.0000', '0.0000', '0.0000', '0.00', '0.00', '0.00', 2, 3, NULL, 'LICENSING', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'P1L967564', 'OPP12345', '0.5000', '', '', 208, 'B', '0.0000', '0.000000', 'MG', '', 'MG', 9, '', 'F'),
(7168, '2019-06-02', '2019-06-06', '999904233', 'WILSON, JOHNATHON', 'OPPENHEIMER ACTIVE ALLOCATION FUND', 1779, '100.00', '1.00', '1.00', NULL, '0.00', '2019-06-03', '2019-06-15', '0.50', 1, '', '', 20, 'JONES, JIM', '2019-06-02', b'1', 0, 0, 0, '0.0000', '0.0000', '0.0000', '0.00', '0.00', '0.00', 2, 3, NULL, 'LICENSING', '', '2017-02-03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'P1L966690', 'OPP12345', '0.5000', '', '', 208, 'B', '0.0000', '0.000000', 'MG', 'MG', 'MG', 9, '', 'F'),
(41, '2019-06-02', '2019-06-06', '094667220', 'GAINES, TERRI', '*MERIDIAN VALUE FUND', 1924, '34000.00', '242.00', '242.00', NULL, '0.00', '2019-06-03', '2019-06-15', '121.00', 4, '', '', 20, 'JOHNSON, TIM', NULL, b'0', 1, 0, 0, '0.0100', '0.0000', '0.0000', '0.00', '0.00', '0.00', 1, 0, NULL, '', '', '2018-12-12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00', NULL, NULL, '3253453433', '35534H66', '0.5000', '', '', 71, 'B', '0.0000', '0.000000', '', 'MG', '', 7, '', 'F'),
(42, '2019-06-02', '2019-06-06', '094667220', 'GAINES, TERRI', 'GLOBAL X FDS GLOBAL X SOCIAL MEDIA', 1924, '4000.00', '0.00', '100.00', NULL, '0.00', '2019-06-03', '2019-06-15', '95.00', 3, '', '', 21, 'ROBERTS, AL', '2019-06-02', b'0', 0, 0, 0, '0.0000', '0.0000', '0.0000', '0.00', '0.00', '0.00', 1, 0, NULL, '', '', '2018-12-12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '25.00', '0.00', NULL, NULL, '243897DS', '35534H66', '0.9500', '', '', 0, 'B', '0.0000', '0.000000', 'MG', 'MG', 'MG', 7, '', 'F'),
(7189, '2019-06-02', NULL, '094667220', 'GAINES, TERRI', 'VA CUSIP 79588L107', 12, '31941.51', '13.31', '13.31', NULL, '0.00', '2019-06-03', '2019-06-15', '9.32', 4, '', '', 24, 'JOHNSON, TIM', '2019-06-02', b'0', 1, 0, 0, '0.0100', '0.0000', '0.0000', '0.13', '0.00', '0.00', 0, 0, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00', NULL, NULL, '7200016561', '79588L107', '0.7000', 'AP', '01', 66, 'B', '0.0000', '0.000000', 'MG', '', 'MG', 1, '', 'F'),
(7190, '2019-06-02', '2019-06-06', '567577524', 'SANDERS, JIM', 'AIM 001413301', 2118, '0.00', '50.00', '60.00', NULL, '0.00', '2019-06-03', '2019-06-15', '30.00', 1, '', '', 20, 'JONES, JIM', '2019-06-02', b'0', 0, 0, 0, '0.0000', '0.0000', '0.0000', '0.00', '0.00', '0.00', 2, 3, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '(None)', '001413301', '0.5000', '', '', 271, 'B', '0.0000', '0.000000', 'MG', '', 'MG', 16, '', 'F'),
(7213, '2019-06-02', '2019-06-06', '999904233', 'WILSON, JOHNATHON', 'EHV 277911822', 3871, '0.00', '1.23', '1.23', NULL, '0.00', '2019-06-03', '2019-06-15', '0.74', 1, '', '', 40, 'JONES, JIM', '2019-06-02', b'0', 0, 0, 0, '0.0000', '0.0000', '0.0000', '0.00', '0.00', '0.00', 0, 0, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00', NULL, NULL, 'P1L966690', '277911822', '0.6000', 'N1', '01', 281, 'B', '1.0000', '0.000000', 'MG', '', 'MG', 12, '', 'F'),
(7214, '2019-06-02', '2019-06-06', '999904233', 'WILSON, JOHNATHON', 'EHV 277911822', 3871, '0.00', '3.69', '3.69', NULL, '0.00', '2019-06-03', '2019-06-15', '0.00', 1, '', '', 40, 'JONES, JIM', '2019-06-02', b'0', 0, 0, 0, '0.0000', '0.0000', '0.0000', '0.00', '0.00', '0.00', 0, 0, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00', NULL, NULL, 'P1L966690', '277911822', '0.6000', 'N1', '01', 281, 'B', '1.0000', '0.000000', 'MG', '', 'MG', 12, '', 'F'),
(7169, '2019-06-02', '2019-06-06', '094667220', 'GAINES, TERRI', 'FAR EAST NATL BK LOS', 11, '-40000.00', '-30.50', '-1500.00', NULL, '-25.00', '2019-06-03', '2019-06-15', '0.00', 1, '', '', 28, 'JONES, JIM', NULL, b'0', 0, 0, 0, '0.0000', '0.0000', '0.0000', '0.00', '0.00', '0.00', 2, 3, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '(None)', '307327AQ9', '0.6000', 'SW', '', 0, 'B', '-40000.0000', '1.000000', 'MG', '', '', 0, '', 'F'),
(7170, '2019-06-02', '2019-06-06', '094667220', 'GAINES, TERRI', 'FAR EAST NATL BK LOS', 11, '40000.00', '30.50', '2000.00', NULL, '25.00', '2019-06-03', '2019-06-15', '0.00', 1, '', '', 28, 'JONES, JIM', NULL, b'0', 0, 0, 0, '0.0000', '0.0000', '0.0000', '0.00', '0.00', '0.00', 2, 3, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '(None)', '307327AQ9', '0.6000', 'SW', '', 0, 'B', '40000.0000', '1.000000', 'MG', '', '', 0, '', 'F'),
(7171, '2019-06-02', '2019-06-06', '094667220', 'GAINES, TERRI', 'BEAL BK SSB PLANO TE', 12, '50000.00', '67.50', '2000.00', NULL, '25.00', '2019-06-03', '2019-06-15', '0.00', 1, '', '', 28, 'JONES, JIM', NULL, b'0', 0, 0, 0, '0.0000', '0.0000', '0.0000', '0.00', '0.00', '0.00', 2, 3, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '(None)', '07368XXD5', '0.6000', 'SW', '', 0, 'B', '50000.0000', '1.000000', 'MG', '', '', 0, '', 'F'),
(7216, '2019-06-02', '2019-06-06', '094667220', 'GAINES, TERRI', 'AIM BASIC VALUE FUND CLASS B', 1692, '0.00', '1000.00', '1500.00', NULL, '0.00', '2019-06-03', '2019-06-15', '0.00', 1, '', '', 20, 'JONES, JIM', '2019-06-02', b'0', 0, 0, 0, '0.0000', '0.0000', '0.0000', '0.00', '0.00', '0.00', 3, 0, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '(None)', 'M1238989X', '0.5000', '', '', 200, 'B', '0.0000', '0.000000', 'MG', '', 'MG', 17, '', 'F'),
(7179, '2019-06-02', NULL, '094667220', 'GAINES, TERRI', 'PERSPII', 11, '824230.05', '57696.10', '57696.10', NULL, '0.00', '2019-06-04', '2019-06-15', '0.00', 2, '', '', 24, 'SPLIT, JONES/ROBERTS', '2019-06-02', b'0', 0, 0, 0, '0.0000', '0.0000', '0.0000', '0.00', '0.00', '0.00', 100, 0, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00', NULL, NULL, '1019648865', '17823782B', '0.6000', 'AP', '01', 286, 'B', '0.0000', '0.000000', 'MG', '', 'MG', 6, '', 'F'),
(7217, '2019-06-10', '2019-06-12', '094667220', 'GAINES, TERRI', 'VICUS RIA MANAGED FEES', 5, '20240.12', '4.30', '0.00', NULL, '0.00', NULL, NULL, '0.00', 4, '', '', 29, 'JOHNSON, TIM', '2019-06-10', b'0', 1, 0, 0, '0.0100', '0.0000', '0.0000', '0.00', '0.00', '0.00', 0, 0, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00', NULL, NULL, '860855DEF', '79518', '0.7000', 'AP', '01', 285, 'B', '0.0000', '0.000000', 'MG', '', 'MG', 2, '', 'F'),
(7218, '2019-06-10', '2019-06-12', '094667220', 'GAINES, TERRI', 'VICUS RIA MANAGED FEES', 5, '20000.00', '1.51', '0.00', NULL, '0.00', NULL, NULL, '0.00', 4, '', '', 29, 'JOHNSON, TIM', '2019-06-10', b'0', 1, 0, 0, '0.0100', '0.0000', '0.0000', '0.00', '0.00', '0.00', 0, 0, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00', NULL, NULL, '860855DEF', '79518', '0.7000', 'AP', '01', 285, 'B', '0.0000', '0.000000', 'MG', '', 'MG', 2, '', 'F'),
(7219, '2019-06-10', '2019-06-12', '094667220', 'GAINES, TERRI', 'VICUS RIA MANAGED FEES', 5, '20240.12', '4.30', '0.00', NULL, '0.00', NULL, NULL, '0.00', 4, '', '', 29, 'JOHNSON, TIM', '2019-06-10', b'0', 1, 0, 0, '0.0100', '0.0000', '0.0000', '0.00', '0.00', '0.00', 0, 0, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00', NULL, NULL, '860855DEF', '79518', '0.7000', 'AP', '01', 285, 'B', '0.0000', '0.000000', 'MG', '', 'MG', 2, '', 'F'),
(7220, '2019-06-10', '2019-06-12', '094667220', 'GAINES, TERRI', 'VICUS RIA MANAGED FEES', 5, '20000.00', '1.51', '0.00', NULL, '0.00', NULL, NULL, '0.00', 4, '', '', 29, 'JOHNSON, TIM', '2019-06-10', b'0', 1, 0, 0, '0.0100', '0.0000', '0.0000', '0.00', '0.00', '0.00', 0, 0, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00', NULL, NULL, '860855DEF', '79518', '0.7000', 'AP', '01', 285, 'B', '0.0000', '0.000000', 'MG', '', 'MG', 2, '', 'F'),
(7221, '2019-06-23', NULL, '567577526', 'JOHNS, JENNIFER', 'FIDELITY FUND PRODUCT A', 6, '10000.00', '100.00', '0.00', NULL, '0.00', NULL, NULL, '0.00', 1, '', '', 29, 'JONES, JIM', '2019-06-23', b'0', 0, 0, 0, '0.0000', '0.0000', '0.0000', '0.00', '0.00', '0.00', 0, 0, NULL, '', '', '2019-01-22', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '(None)', '67234E434', '0.7000', '', '01', 106, 'B', '1.0000', '10000.000000', 'MG', 'MG', 'MG', 3, 'D', 'F'),
(7222, '2019-06-23', NULL, '094667220', 'GAINES, TERRI', 'FIDELITY FUND PRODUCT A', 6, '10000.00', '0.00', '0.00', NULL, '0.00', NULL, NULL, '0.00', 1, '', '', 29, 'JONES, JIM', '2019-06-23', b'0', 0, 0, 0, '0.0000', '0.0000', '0.0000', '0.00', '0.00', '0.00', 0, 0, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '860855DEF', '67234E434', '0.7000', '', '01', 106, 'B', '1.0000', '0.000000', 'MG', '', 'MG', 3, ' D', 'F'),
(7224, '2019-06-23', '2019-06-25', '094667220', 'GAINES, TERRI', 'FIDELITY FUND PRODUCT A', 6, '20000.00', '0.00', '0.00', NULL, '0.00', NULL, NULL, '0.00', 1, '', '', 29, 'JONES, JIM', '2019-06-23', b'0', 0, 0, 0, '0.0000', '0.0000', '0.0000', '0.00', '0.00', '0.00', 0, 0, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '860855DEF', '67234E434', '0.7000', '', '01', 106, 'B', '1.0000', '0.000000', 'MG', '', 'MG', 3, '', 'F'),
(7221, '2019-06-23', NULL, '567577526', 'JOHNS, JENNIFER', 'FIDELITY FUND PRODUCT A', 6, '10000.00', '100.00', '0.00', NULL, '0.00', NULL, NULL, '0.00', 1, '', '', 29, 'JONES, JIM', '2019-06-23', b'0', 0, 0, 0, '0.0000', '0.0000', '0.0000', '0.00', '0.00', '0.00', 0, 0, NULL, '', '', '2019-01-22', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '(None)', '67234E434', '0.7000', '', '01', 106, 'B', '1.0000', '10000.000000', 'MG', 'MG', 'MG', 3, 'D', 'F');
INSERT INTO `trades` (`TRADE_NO`, `DATE`, `SET_DATE`, `CLI_NO`, `CLI_NAME`, `INVEST`, `INV_NO`, `NET_AMT`, `COMM_EXP`, `COMM_REC`, `FCOMM_REC2`, `CHARGE`, `DATE_REC`, `PAY_DATE`, `REP_COMM`, `REP_NO`, `SAL_NO`, `BRANCH_MGR`, `INV_TYPE`, `REP_NAME`, `UP_DATE`, `HOLD`, `OVERRIDE`, `OVERRIDE2`, `OVERRIDE3`, `OVER_RATE`, `OVER2_RATE`, `OVER3_RATE`, `OVER_COMM`, `OVER2_COMM`, `OVER3_COMM`, `SPL_REP2`, `SPL_REP3`, `HOLDDATE`, `HOLDREASON`, `CUSTOMERID`, `EDIT_DATE`, `SPL_REP`, `SPL_REP4`, `SPL_REP5`, `SPL_AMT`, `SPL_AMT2`, `SPL_AMT3`, `SPL_AMT4`, `SPL_AMT5`, `SPL_CHG`, `SPL_CHG2`, `SPL_CHG3`, `SPL_CHG4`, `SPL_CHG5`, `SPL_COMM`, `SPL2_COMM`, `SPL3_COMM`, `SPL4_COMM`, `SPL5_COMM`, `CLEARING`, `CUSIP_NO`, `REP_RATE`, `SOURCE`, `BANK_NO`, `CO_NO`, `BUY_SELL`, `UNITS`, `PRICE`, `IN_USER`, `EDIT_USER`, `POST_USER`, `BATCH`, `ERR_CODE`, `CANCEL`) VALUES
(7222, '2019-06-23', NULL, '094667220', 'GAINES, TERRI', 'FIDELITY FUND PRODUCT A', 6, '10000.00', '0.00', '0.00', NULL, '0.00', NULL, NULL, '0.00', 1, '', '', 29, 'JONES, JIM', '2019-06-23', b'0', 0, 0, 0, '0.0000', '0.0000', '0.0000', '0.00', '0.00', '0.00', 0, 0, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '860855DEF', '67234E434', '0.7000', '', '01', 106, 'B', '1.0000', '0.000000', 'MG', '', 'MG', 3, ' D', 'F'),
(7224, '2019-06-23', NULL, '094667220', 'GAINES, TERRI', 'FIDELITY FUND PRODUCT A', 6, '20000.00', '0.00', '0.00', NULL, '0.00', NULL, NULL, '0.00', 1, '', '', 29, 'JONES, JIM', '2019-06-23', b'0', 0, 0, 0, '0.0000', '0.0000', '0.0000', '0.00', '0.00', '0.00', 0, 0, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '860855DEF', '67234E434', '0.7000', '', '01', 106, 'B', '1.0000', '0.000000', 'MG', '', 'MG', 3, '', 'F'),
(7175, '2019-07-02', '2019-07-06', '094667220', 'GAINES, TERRI', '*WEITZ PARTNERS VALUE FUND', 1963, '40000.00', '0.00', '5000.00', NULL, '0.00', '2019-07-03', '2019-07-15', '2500.00', 1, '', '', 20, 'JONES, JIM', NULL, b'0', 2, 0, 0, '0.0100', '0.0000', '0.0000', '0.00', '0.00', '0.00', 3, 0, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '(None)', '435353', '0.5000', '', '01', 271, 'B', '2.0000', '2.000000', 'MG', '', '', 0, ' 1 5', 'F'),
(7176, '2019-07-02', '2019-07-06', '094667220', 'GAINES, TERRI', 'SAMPLE REIT 2', 5, '10000.00', '0.00', '3000.00', NULL, '0.00', '2019-07-03', '2019-07-15', '2280.00', 1, '', '', 44, 'JONES, JIM', NULL, b'0', 2, 0, 0, '0.0100', '0.0000', '0.0000', '0.00', '0.00', '0.00', 3, 0, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '(None)', '3463464', '0.7600', '', '01', 250, 'B', '1.0000', '1.000000', 'MG', '', '', 0, '', 'F'),
(23, '2019-07-02', '2019-07-06', '999904233', 'WILSON, JOHNATHON', 'OPPENHEIMER 001', 3386, '25000.00', '1017.12', '1017.12', NULL, '8.00', '2019-07-03', '2019-07-15', '508.56', 2, '', '', 20, 'SPLIT, JONES/ROBERTS', '2019-07-02', b'0', 0, 0, 0, '0.0000', '0.0000', '0.0000', '0.00', '0.00', '0.00', 1, 0, NULL, '', '', '2013-07-09', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '403.65', '0.00', NULL, NULL, 'AB12345', 'OPP43453', '0.5000', '', '01', 145, 'B', '0.0000', '0.000000', 'KR', 'MG', 'KR', 5, '', 'F'),
(7166, '2019-07-02', '2019-07-06', '094667220', 'GAINES, TERRI', 'OPPENHEIMER ACTIVE ALLOCATION FUND', 1779, '200.00', '10.00', '10.00', NULL, '0.00', '2019-07-03', '2019-07-15', '5.00', 1, '', '', 20, 'JONES, JIM', '2019-07-02', b'1', 0, 0, 0, '0.0000', '0.0000', '0.0000', '0.00', '0.00', '0.00', 2, 3, NULL, 'LICENSING', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'TR4053104', 'OPP12345', '0.5000', '', '', 208, 'B', '0.0000', '0.000000', 'MG', '', 'MG', 9, '', 'F'),
(7211, '2019-07-02', '2019-07-06', '094667220', 'GAINES, TERRI', 'COACH INC EX-DIV DATE 10/02/03 RECO', 778, '2569.00', '71.85', '71.85', NULL, '14.00', '2019-07-03', '2019-07-15', '35.93', 1, '', '', 21, 'JONES, JIM', '2019-07-02', b'0', 0, 0, 0, '0.0000', '0.0000', '0.0000', '0.00', '0.00', '0.00', 0, 0, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'TR4053104', '189754104', '0.5000', 'NF', '', 0, 'S', '-50.0000', '51.380000', 'MG', '', 'MG', 0, '', 'F'),
(7212, '2019-07-02', '2019-07-06', '094667220', 'GAINES, TERRI', 'COACH INC EX-DIV DATE 10/02/03 RECO', 778, '2554.00', '33.15', '33.15', NULL, '14.00', '2019-07-03', '2019-07-15', '16.58', 1, '', '', 21, 'JONES, JIM', '2019-07-02', b'0', 0, 0, 0, '0.0000', '0.0000', '0.0000', '0.00', '0.00', '0.00', 0, 0, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'TR4053104', '189754104', '0.5000', 'NF', '', 0, 'S', '-50.0000', '51.080000', 'MG', '', 'MG', 0, '', 'F'),
(7191, '2019-07-02', '2019-07-06', '567577524', 'SANDERS, JIM', '*MERIDIAN VALUE FUND', 1924, '10000.00', '400.00', '0.00', NULL, '0.00', '2019-07-03', '2019-07-15', '0.00', 1, '', '', 20, 'JONES, JIM', NULL, b'0', 0, 0, 0, '0.0000', '0.0000', '0.0000', '0.00', '0.00', '0.00', 2, 3, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '(None)', '283978242', '0.5000', '', '01', 250, 'B', '0.0000', '0.000000', 'MG', '', '', 0, '', 'F'),
(7188, '2019-07-02', '2019-07-06', '094667220', 'GAINES, TERRI', 'TEST LIFE INSURANCE PRODUCT', 1, '0.00', '50.00', '75.00', NULL, '0.00', '2019-07-03', '2019-07-15', '30.00', 1, '', '', 26, 'JONES, JIM', '2019-07-02', b'0', 0, 0, 0, '0.0000', '0.0000', '0.0000', '0.00', '0.00', '0.00', 2, 3, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '(None)', '2892424', '0.4000', '', '', 282, 'B', '1.0000', '0.000000', 'MG', '', 'MG', 1, '', 'F'),
(7167, '2019-07-02', '2019-07-06', '567577526', 'JOHNS, JENNIFER', 'OPPENHEIMER ACTIVE ALLOCATION FUND', 1779, '213.00', '1.00', '1.00', NULL, '0.00', '2019-07-03', '2019-07-15', '0.50', 1, '', '', 20, 'JONES, JIM', '2019-07-02', b'1', 0, 0, 0, '0.0000', '0.0000', '0.0000', '0.00', '0.00', '0.00', 2, 3, NULL, 'LICENSING', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'P1L967564', 'OPP12345', '0.5000', '', '', 208, 'B', '0.0000', '0.000000', 'MG', '', 'MG', 9, '', 'F'),
(7168, '2019-07-02', '2019-07-06', '999904233', 'WILSON, JOHNATHON', 'OPPENHEIMER ACTIVE ALLOCATION FUND', 1779, '100.00', '1.00', '1.00', NULL, '0.00', '2019-07-03', '2019-07-15', '0.50', 1, '', '', 20, 'JONES, JIM', '2019-07-02', b'1', 0, 0, 0, '0.0000', '0.0000', '0.0000', '0.00', '0.00', '0.00', 2, 3, NULL, 'LICENSING', '', '2017-02-03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'P1L966690', 'OPP12345', '0.5000', '', '', 208, 'B', '0.0000', '0.000000', 'MG', 'MG', 'MG', 9, '', 'F'),
(41, '2019-07-02', '2019-07-06', '094667220', 'GAINES, TERRI', '*MERIDIAN VALUE FUND', 1924, '34000.00', '242.00', '242.00', NULL, '0.00', '2019-07-03', '2019-07-15', '121.00', 4, '', '', 20, 'JOHNSON, TIM', NULL, b'0', 1, 0, 0, '0.0100', '0.0000', '0.0000', '0.00', '0.00', '0.00', 1, 0, NULL, '', '', '2018-12-12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00', NULL, NULL, '3253453433', '35534H66', '0.5000', '', '', 71, 'B', '0.0000', '0.000000', '', 'MG', '', 7, '', 'F'),
(42, '2019-07-02', '2019-07-06', '094667220', 'GAINES, TERRI', 'GLOBAL X FDS GLOBAL X SOCIAL MEDIA', 1924, '4000.00', '0.00', '100.00', NULL, '0.00', '2019-07-03', '2019-07-15', '95.00', 3, '', '', 21, 'ROBERTS, AL', '2019-07-02', b'0', 0, 0, 0, '0.0000', '0.0000', '0.0000', '0.00', '0.00', '0.00', 1, 0, NULL, '', '', '2018-12-12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '25.00', '0.00', NULL, NULL, '243897DS', '35534H66', '0.9500', '', '', 0, 'B', '0.0000', '0.000000', 'MG', 'MG', 'MG', 7, '', 'F'),
(7189, '2019-07-02', NULL, '094667220', 'GAINES, TERRI', 'VA CUSIP 79588L107', 12, '31941.51', '13.31', '13.31', NULL, '0.00', '2019-07-03', '2019-07-15', '9.32', 4, '', '', 24, 'JOHNSON, TIM', '2019-07-02', b'0', 1, 0, 0, '0.0100', '0.0000', '0.0000', '0.13', '0.00', '0.00', 0, 0, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00', NULL, NULL, '7200016561', '79588L107', '0.7000', 'AP', '01', 66, 'B', '0.0000', '0.000000', 'MG', '', 'MG', 1, '', 'F'),
(7190, '2019-07-02', '2019-07-06', '567577524', 'SANDERS, JIM', 'AIM 001413301', 2118, '0.00', '50.00', '60.00', NULL, '0.00', '2019-07-03', '2019-07-15', '30.00', 1, '', '', 20, 'JONES, JIM', '2019-07-02', b'0', 0, 0, 0, '0.0000', '0.0000', '0.0000', '0.00', '0.00', '0.00', 2, 3, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '(None)', '001413301', '0.5000', '', '', 271, 'B', '0.0000', '0.000000', 'MG', '', 'MG', 16, '', 'F'),
(7213, '2019-07-02', '2019-07-06', '999904233', 'WILSON, JOHNATHON', 'EHV 277911822', 3871, '0.00', '1.23', '1.23', NULL, '0.00', '2019-07-03', '2019-07-15', '0.74', 1, '', '', 40, 'JONES, JIM', '2019-07-02', b'0', 0, 0, 0, '0.0000', '0.0000', '0.0000', '0.00', '0.00', '0.00', 0, 0, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00', NULL, NULL, 'P1L966690', '277911822', '0.6000', 'N1', '01', 281, 'B', '1.0000', '0.000000', 'MG', '', 'MG', 12, '', 'F'),
(7214, '2019-07-02', '2019-07-06', '999904233', 'WILSON, JOHNATHON', 'EHV 277911822', 3871, '0.00', '3.69', '3.69', NULL, '0.00', '2019-07-03', '2019-07-15', '0.00', 1, '', '', 40, 'JONES, JIM', '2019-07-02', b'0', 0, 0, 0, '0.0000', '0.0000', '0.0000', '0.00', '0.00', '0.00', 0, 0, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00', NULL, NULL, 'P1L966690', '277911822', '0.6000', 'N1', '01', 281, 'B', '1.0000', '0.000000', 'MG', '', 'MG', 12, '', 'F'),
(7169, '2019-07-02', '2019-07-06', '094667220', 'GAINES, TERRI', 'FAR EAST NATL BK LOS', 11, '-40000.00', '-30.50', '-1500.00', NULL, '-25.00', '2019-07-03', '2019-07-15', '0.00', 1, '', '', 28, 'JONES, JIM', NULL, b'0', 0, 0, 0, '0.0000', '0.0000', '0.0000', '0.00', '0.00', '0.00', 2, 3, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '(None)', '307327AQ9', '0.6000', 'SW', '', 0, 'B', '-40000.0000', '1.000000', 'MG', '', '', 0, '', 'F'),
(7170, '2019-07-02', '2019-07-06', '094667220', 'GAINES, TERRI', 'FAR EAST NATL BK LOS', 11, '40000.00', '30.50', '2000.00', NULL, '25.00', '2019-07-03', '2019-07-15', '0.00', 1, '', '', 28, 'JONES, JIM', NULL, b'0', 0, 0, 0, '0.0000', '0.0000', '0.0000', '0.00', '0.00', '0.00', 2, 3, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '(None)', '307327AQ9', '0.6000', 'SW', '', 0, 'B', '40000.0000', '1.000000', 'MG', '', '', 0, '', 'F'),
(7171, '2019-07-02', '2019-07-06', '094667220', 'GAINES, TERRI', 'BEAL BK SSB PLANO TE', 12, '50000.00', '67.50', '2000.00', NULL, '25.00', '2019-07-03', '2019-07-15', '0.00', 1, '', '', 28, 'JONES, JIM', NULL, b'0', 0, 0, 0, '0.0000', '0.0000', '0.0000', '0.00', '0.00', '0.00', 2, 3, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '(None)', '07368XXD5', '0.6000', 'SW', '', 0, 'B', '50000.0000', '1.000000', 'MG', '', '', 0, '', 'F'),
(7216, '2019-07-02', '2019-07-06', '094667220', 'GAINES, TERRI', 'AIM BASIC VALUE FUND CLASS B', 1692, '0.00', '1000.00', '1500.00', NULL, '0.00', '2019-07-04', '2019-07-15', '0.00', 1, '', '', 20, 'JONES, JIM', '2019-07-02', b'0', 0, 0, 0, '0.0000', '0.0000', '0.0000', '0.00', '0.00', '0.00', 3, 0, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '(None)', 'M1238989X', '0.5000', '', '', 200, 'B', '0.0000', '0.000000', 'MG', '', 'MG', 17, '', 'F'),
(7179, '2019-07-02', NULL, '094667220', 'GAINES, TERRI', 'PERSPII', 11, '824230.05', '57696.10', '57696.10', NULL, '0.00', '2019-07-04', '2019-07-15', '0.00', 2, '', '', 24, 'SPLIT, JONES/ROBERTS', '2019-07-02', b'0', 0, 0, 0, '0.0000', '0.0000', '0.0000', '0.00', '0.00', '0.00', 100, 0, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00', NULL, NULL, '1019648865', '17823782B', '0.6000', 'AP', '01', 286, 'B', '0.0000', '0.000000', 'MG', '', 'MG', 6, '', 'F'),
(7217, '2019-07-10', '2019-07-12', '094667220', 'GAINES, TERRI', 'VICUS RIA MANAGED FEES', 5, '20240.12', '4.30', '0.00', NULL, '0.00', NULL, NULL, '0.00', 4, '', '', 29, 'JOHNSON, TIM', '2019-07-10', b'0', 1, 0, 0, '0.0100', '0.0000', '0.0000', '0.00', '0.00', '0.00', 0, 0, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00', NULL, NULL, '860855DEF', '79518', '0.7000', 'AP', '01', 285, 'B', '0.0000', '0.000000', 'MG', '', 'MG', 2, '', 'F'),
(7218, '2019-07-10', '2019-07-12', '094667220', 'GAINES, TERRI', 'VICUS RIA MANAGED FEES', 5, '20000.00', '1.51', '0.00', NULL, '0.00', NULL, NULL, '0.00', 4, '', '', 29, 'JOHNSON, TIM', '2019-07-10', b'0', 1, 0, 0, '0.0100', '0.0000', '0.0000', '0.00', '0.00', '0.00', 0, 0, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00', NULL, NULL, '860855DEF', '79518', '0.7000', 'AP', '01', 285, 'B', '0.0000', '0.000000', 'MG', '', 'MG', 2, '', 'F'),
(7219, '2019-07-10', '2019-07-12', '094667220', 'GAINES, TERRI', 'VICUS RIA MANAGED FEES', 5, '20240.12', '4.30', '0.00', NULL, '0.00', NULL, NULL, '0.00', 4, '', '', 29, 'JOHNSON, TIM', '2019-07-10', b'0', 1, 0, 0, '0.0100', '0.0000', '0.0000', '0.00', '0.00', '0.00', 0, 0, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00', NULL, NULL, '860855DEF', '79518', '0.7000', 'AP', '01', 285, 'B', '0.0000', '0.000000', 'MG', '', 'MG', 2, '', 'F'),
(7220, '2019-07-10', '2019-07-12', '094667220', 'GAINES, TERRI', 'VICUS RIA MANAGED FEES', 5, '20000.00', '1.51', '0.00', NULL, '0.00', NULL, NULL, '0.00', 4, '', '', 29, 'JOHNSON, TIM', '2019-07-10', b'0', 1, 0, 0, '0.0100', '0.0000', '0.0000', '0.00', '0.00', '0.00', 0, 0, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00', NULL, NULL, '860855DEF', '79518', '0.7000', 'AP', '01', 285, 'B', '0.0000', '0.000000', 'MG', '', 'MG', 2, '', 'F'),
(7221, '2019-07-23', NULL, '567577526', 'JOHNS, JENNIFER', 'FIDELITY FUND PRODUCT A', 6, '10000.00', '100.00', '0.00', NULL, '0.00', NULL, NULL, '0.00', 1, '', '', 29, 'JONES, JIM', '2019-07-23', b'0', 0, 0, 0, '0.0000', '0.0000', '0.0000', '0.00', '0.00', '0.00', 0, 0, NULL, '', '', '2019-01-22', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '(None)', '67234E434', '0.7000', '', '01', 106, 'B', '1.0000', '10000.000000', 'MG', 'MG', 'MG', 3, 'D', 'F'),
(7222, '2019-07-23', NULL, '094667220', 'GAINES, TERRI', 'FIDELITY FUND PRODUCT A', 6, '10000.00', '0.00', '0.00', NULL, '0.00', NULL, NULL, '0.00', 1, '', '', 29, 'JONES, JIM', '2019-07-23', b'0', 0, 0, 0, '0.0000', '0.0000', '0.0000', '0.00', '0.00', '0.00', 0, 0, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '860855DEF', '67234E434', '0.7000', '', '01', 106, 'B', '1.0000', '0.000000', 'MG', '', 'MG', 3, ' D', 'F'),
(7224, '2019-07-23', '2019-07-25', '094667220', 'GAINES, TERRI', 'FIDELITY FUND PRODUCT A', 6, '20000.00', '0.00', '0.00', NULL, '0.00', NULL, NULL, '0.00', 1, '', '', 29, 'JONES, JIM', '2019-07-23', b'0', 0, 0, 0, '0.0000', '0.0000', '0.0000', '0.00', '0.00', '0.00', 0, 0, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '860855DEF', '67234E434', '0.7000', '', '01', 106, 'B', '1.0000', '0.000000', 'MG', '', 'MG', 3, '', 'F');

-- --------------------------------------------------------

--
-- Table structure for table `upclient`
--

CREATE TABLE `upclient` (
  `upclientID` int(11) NOT NULL,
  `list_no` int(11) DEFAULT NULL,
  `list_group` varchar(10) DEFAULT NULL,
  `descript` varchar(30) DEFAULT NULL,
  `customerID` int(11) NOT NULL,
  `lastModifiedDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `upclienta`
--

CREATE TABLE `upclienta` (
  `upclientaID` int(11) NOT NULL,
  `fieldname` varchar(10) DEFAULT NULL,
  `list_group` varchar(10) DEFAULT NULL,
  `descript` varchar(30) DEFAULT NULL,
  `customerID` int(11) NOT NULL,
  `lastModifiedDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acctbal`
--
ALTER TABLE `acctbal`
  ADD PRIMARY KEY (`acctBalID`);

--
-- Indexes for table `acctpos`
--
ALTER TABLE `acctpos`
  ADD PRIMARY KEY (`acctPosID`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD KEY `CLI_NO` (`CLI_NO`);

--
-- Indexes for table `clipol`
--
ALTER TABLE `clipol`
  ADD PRIMARY KEY (`clipolID`);

--
-- Indexes for table `clisuit`
--
ALTER TABLE `clisuit`
  ADD PRIMARY KEY (`clisuitID`);

--
-- Indexes for table `configuration`
--
ALTER TABLE `configuration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customerID`);

--
-- Indexes for table `importlog`
--
ALTER TABLE `importlog`
  ADD PRIMARY KEY (`importID`);

--
-- Indexes for table `invest`
--
ALTER TABLE `invest`
  ADD PRIMARY KEY (`investID`);

--
-- Indexes for table `permrep`
--
ALTER TABLE `permrep`
  ADD KEY `REP_NO` (`REP_NO`);

--
-- Indexes for table `prodtype`
--
ALTER TABLE `prodtype`
  ADD KEY `INV_TYPE` (`INV_TYPE`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`stateid`);

--
-- Indexes for table `trades`
--
ALTER TABLE `trades`
  ADD KEY `TRADE_NO` (`TRADE_NO`),
  ADD KEY `CLI_NO` (`CLI_NO`),
  ADD KEY `INV_TYPE` (`INV_TYPE`),
  ADD KEY `REP_NO` (`REP_NO`);

--
-- Indexes for table `upclient`
--
ALTER TABLE `upclient`
  ADD PRIMARY KEY (`upclientID`);

--
-- Indexes for table `upclienta`
--
ALTER TABLE `upclienta`
  ADD PRIMARY KEY (`upclientaID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acctbal`
--
ALTER TABLE `acctbal`
  MODIFY `acctBalID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `acctpos`
--
ALTER TABLE `acctpos`
  MODIFY `acctPosID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `clipol`
--
ALTER TABLE `clipol`
  MODIFY `clipolID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `clisuit`
--
ALTER TABLE `clisuit`
  MODIFY `clisuitID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `configuration`
--
ALTER TABLE `configuration`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customerID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `importlog`
--
ALTER TABLE `importlog`
  MODIFY `importID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invest`
--
ALTER TABLE `invest`
  MODIFY `investID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `stateid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `upclient`
--
ALTER TABLE `upclient`
  MODIFY `upclientID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `upclienta`
--
ALTER TABLE `upclienta`
  MODIFY `upclientaID` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
