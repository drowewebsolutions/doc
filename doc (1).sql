-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 02, 2021 at 04:38 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `doc`
--

-- --------------------------------------------------------

--
-- Table structure for table `bulk_medicen`
--

DROP TABLE IF EXISTS `bulk_medicen`;
CREATE TABLE IF NOT EXISTS `bulk_medicen` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bulk_medicen`
--

INSERT INTO `bulk_medicen` (`id`, `name`) VALUES
(4, 'Cough'),
(2, 'Test'),
(5, 'Proglutrol 2'),
(6, 'Proglotrol 3');

-- --------------------------------------------------------

--
-- Table structure for table `bulk_medicen_prescription`
--

DROP TABLE IF EXISTS `bulk_medicen_prescription`;
CREATE TABLE IF NOT EXISTS `bulk_medicen_prescription` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `bm_id` int(255) NOT NULL,
  `form` varchar(150) NOT NULL,
  `generic_name` varchar(255) NOT NULL,
  `trade_name` varchar(255) NOT NULL,
  `strength` varchar(150) NOT NULL,
  `unit` varchar(150) NOT NULL,
  `route` varchar(150) NOT NULL,
  `frequency` varchar(150) NOT NULL,
  `duration` varchar(150) NOT NULL,
  `indication` varchar(150) NOT NULL,
  `instructions` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bulk_medicen_prescription`
--

INSERT INTO `bulk_medicen_prescription` (`id`, `bm_id`, `form`, `generic_name`, `trade_name`, `strength`, `unit`, `route`, `frequency`, `duration`, `indication`, `instructions`) VALUES
(1, 1, 'Suppository,1', 'Paracetamol,7', 'Panadol,3', '100,1', 'g,1', 'Eye,1', 'Noon,1', '3 days,4', 'Infection,1', 'After going to bed,2'),
(2, 1, 'Metered dose inhaler,2', 'Paracetamol,7', 'Panadol,3', '100,1', 'g,1', 'Eye,1', 'Noon,1', '3 days,4', 'Infection,1', 'After going to bed,2'),
(3, 2, 'Suppository,1', 'Paracetamol,7', 'Panadol,3', '100,1', 'g,1', 'Eye,1', 'Noon,1', '3 days,4', 'Infection,1', 'After going to bed,2'),
(4, 3, 'Suppository,1', 'Paracetamol,7', 'Panadol,3', '100,1', 'g,1', 'Eye,1', 'Noon,1', '3 days,4', 'Infection,1', 'After going to bed,2'),
(5, 3, 'Suppository,1', 'Paracetamol,7', 'Furo,24', '100,1', 'g,1', 'Eye,1', 'Noon,1', '3 days,4', 'Infection,1', 'After going to bed,2'),
(6, 4, 'Suppository,1', 'Paracetamol,7', 'Panadol,3', '100,1', 'g,1', 'Eye,1', 'Noon,1', '3 days,4', 'Infection,1', 'After going to bed,2'),
(7, 4, 'Suppository,1', 'Paracetamol,7', 'Furo,24', '100,1', 'g,1', 'Eye,1', 'Noon,1', '3 days,4', 'Infection,1', 'After going to bed,2'),
(8, 4, 'Metered dose inhaler,2', 'A,28', 'Furo,24', '1,8', 'g,1', '--,2', 'Noon,1', 'test', '--,2', 'After going to bed,2'),
(9, 4, 'Tablet,9', 'Metformin,25', 'Proglutrol,23', '500,10', 'mg,2', 'Oral,7', '3 times a day,9', '3 months,13', 'Diabetes,7', 'Before meals'),
(10, 4, 'Tablet,9', 'Pantaprazole,40', 'Panum,29', '40', 'mg,2', 'Oral,7', 'Twice a day,8', '3 months,13', 'Gastritis', 'Before meals,11'),
(11, 5, 'Tablet,9', 'Metformin,25', 'Proglutrol,23', '500,10', 'mg,2', 'Oral,7', 'morning', '3 months,13', 'Diabetes,7', 'After meals,10'),
(12, 5, ',28', ',117', ',74', '1,8', 'g,1', ',9', 'Night,12', '3 months,13', ',15', ',14');

-- --------------------------------------------------------

--
-- Table structure for table `drug_allergies`
--

DROP TABLE IF EXISTS `drug_allergies`;
CREATE TABLE IF NOT EXISTS `drug_allergies` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `patients_id` int(255) NOT NULL,
  `allergies` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `histy_assign_a_doctor`
--

DROP TABLE IF EXISTS `histy_assign_a_doctor`;
CREATE TABLE IF NOT EXISTS `histy_assign_a_doctor` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `user_id` int(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `note` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `histy_diagnoses`
--

DROP TABLE IF EXISTS `histy_diagnoses`;
CREATE TABLE IF NOT EXISTS `histy_diagnoses` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `user_id` int(255) NOT NULL,
  `diagnoses` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `histy_drug_allergies`
--

DROP TABLE IF EXISTS `histy_drug_allergies`;
CREATE TABLE IF NOT EXISTS `histy_drug_allergies` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `user_id` int(255) NOT NULL,
  `drug_allergies` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `histy_drug_allergies`
--

INSERT INTO `histy_drug_allergies` (`id`, `user_id`, `drug_allergies`) VALUES
(27, 10, 'Amoxicillin'),
(28, 10, 'Metformin'),
(30, 10, 'Amoxicillin'),
(31, 10, 'Metformin'),
(32, 10, 'Gliclazide'),
(33, 10, 'Amoxicillin'),
(34, 10, 'Metformin'),
(35, 10, 'Gliclazide');

-- --------------------------------------------------------

--
-- Table structure for table `histy_investigations_days`
--

DROP TABLE IF EXISTS `histy_investigations_days`;
CREATE TABLE IF NOT EXISTS `histy_investigations_days` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `user_id` int(255) NOT NULL,
  `days` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=178 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `histy_investigations_group`
--

DROP TABLE IF EXISTS `histy_investigations_group`;
CREATE TABLE IF NOT EXISTS `histy_investigations_group` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `day_id` int(255) NOT NULL,
  `test_catagory` varchar(150) NOT NULL,
  `test_id` varchar(150) NOT NULL,
  `user_id` int(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `histy_next_visits`
--

DROP TABLE IF EXISTS `histy_next_visits`;
CREATE TABLE IF NOT EXISTS `histy_next_visits` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `user_id` int(255) NOT NULL,
  `days` varchar(100) NOT NULL,
  `pay` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `histy_patients_other_details`
--

DROP TABLE IF EXISTS `histy_patients_other_details`;
CREATE TABLE IF NOT EXISTS `histy_patients_other_details` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `patients_id` int(255) NOT NULL,
  `smoking` varchar(3) DEFAULT NULL,
  `alcohol` varchar(3) DEFAULT NULL,
  `allergies` varchar(100) DEFAULT NULL,
  `pregnancy` varchar(100) DEFAULT NULL,
  `lactating` varchar(150) DEFAULT NULL,
  `kidney` varchar(20) DEFAULT NULL,
  `lrmp` varchar(10) DEFAULT NULL,
  `height` varchar(100) DEFAULT NULL,
  `body_Weight` varchar(100) DEFAULT NULL,
  `blood_pressure` varchar(100) DEFAULT NULL,
  `systolic_blood_pressure` varchar(100) DEFAULT NULL,
  `diastolic_blood_pressure` varchar(100) DEFAULT NULL,
  `pulse_rate` varchar(100) DEFAULT NULL,
  `respiratory_rate` varchar(100) DEFAULT NULL,
  `oxygen_saturation` varchar(100) DEFAULT NULL,
  `histyerature` varchar(100) DEFAULT NULL,
  `random_blood_suga` varchar(100) DEFAULT NULL,
  `mid` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `histy_prescription_drugs`
--

DROP TABLE IF EXISTS `histy_prescription_drugs`;
CREATE TABLE IF NOT EXISTS `histy_prescription_drugs` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `order_no` int(100) DEFAULT NULL,
  `user_id` int(255) NOT NULL,
  `form` varchar(150) DEFAULT NULL,
  `generic_name` varchar(255) DEFAULT NULL,
  `trade_name` varchar(255) DEFAULT NULL,
  `strength` varchar(150) DEFAULT NULL,
  `unit` varchar(150) DEFAULT NULL,
  `route` varchar(150) DEFAULT NULL,
  `frequency` varchar(150) DEFAULT NULL,
  `duration` varchar(150) DEFAULT NULL,
  `indication` varchar(150) DEFAULT NULL,
  `instructions` varchar(150) DEFAULT NULL,
  `category` varchar(100) NOT NULL DEFAULT 'short_term,long_term',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=220 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `histy_prescription_drugs`
--

INSERT INTO `histy_prescription_drugs` (`id`, `order_no`, `user_id`, `form`, `generic_name`, `trade_name`, `strength`, `unit`, `route`, `frequency`, `duration`, `indication`, `instructions`, `category`) VALUES
(210, 21, 4, 'Suppository,1', 'Paracetamol,7', 'Panadol,3', '100,1', 'g,1', 'Eye,1', 'Noon,1', '3 days,4', 'Cough', 'After going to bed,2', '1step'),
(211, 22, 4, 'Metered dose inhaler,2', 'Paracetamol,7', 'Panadol,3', '100,1', 'g,1', 'Eye,1', 'Noon,1', '3 days,4', 'Cough', 'After going to bed,2', '1step'),
(212, 23, 4, 'Suppository,1', 'Paracetamol,7', 'Panadol,3', '100,1', 'g,1', 'Eye,1', 'Noon,1', '3 days,4', 'Test', 'After going to bed,2', '2step'),
(213, 24, 4, 'Metered dose inhaler,2', 'A,28', 'Furo,24', '1,8', 'g,1', '--,2', 'Noon,1', 'test', '--,2', 'After going to bed,2', 'short_term'),
(214, 25, 4, 'Suppository,1', 'Paracetamol,7', 'Furo,24', '100,1', 'g,1', 'Eye,1', 'Noon,1', 'test2', 'Infection,1', 'After going to bed,2', 'short_term'),
(215, 21, 4, 'Suppository,1', 'Paracetamol,7', 'Panadol,3', '100,1', 'g,1', 'Eye,1', 'Noon,1', '3 days,4', 'Cough', 'After going to bed,2', '1step'),
(216, 22, 4, 'Metered dose inhaler,2', 'Paracetamol,7', 'Panadol,3', '100,1', 'g,1', 'Eye,1', 'Noon,1', '3 days,4', 'Cough', 'After going to bed,2', '1step'),
(217, 23, 4, 'Suppository,1', 'Paracetamol,7', 'Panadol,3', '100,1', 'g,1', 'Eye,1', 'Noon,1', '3 days,4', 'Test', 'After going to bed,2', '2step'),
(218, 24, 4, 'Metered dose inhaler,2', 'A,28', 'Furo,24', '1,8', 'g,1', '--,2', 'Noon,1', 'test', '--,2', 'After going to bed,2', 'short_term'),
(219, 25, 4, 'Suppository,1', 'Paracetamol,7', 'Furo,24', '100,1', 'g,1', 'Eye,1', 'Noon,1', 'test2', 'Infection,1', 'After going to bed,2', 'short_term');

-- --------------------------------------------------------

--
-- Table structure for table `histy_test`
--

DROP TABLE IF EXISTS `histy_test`;
CREATE TABLE IF NOT EXISTS `histy_test` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `user_id` int(255) NOT NULL,
  `test` varchar(255) NOT NULL,
  `investigations` varchar(150) NOT NULL,
  `investigations_id` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `medical_center`
--

DROP TABLE IF EXISTS `medical_center`;
CREATE TABLE IF NOT EXISTS `medical_center` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `time` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medical_center`
--

INSERT INTO `medical_center` (`id`, `name`, `time`) VALUES
(8, 'Nawaloka', '2021-06-14');

-- --------------------------------------------------------

--
-- Table structure for table `patients_details`
--

DROP TABLE IF EXISTS `patients_details`;
CREATE TABLE IF NOT EXISTS `patients_details` (
  `patients_id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) DEFAULT NULL,
  `birthday` varchar(50) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `phone` varchar(13) DEFAULT NULL,
  `residence` varchar(50) NOT NULL,
  `occupation` varchar(50) NOT NULL,
  PRIMARY KEY (`patients_id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patients_details`
--

INSERT INTO `patients_details` (`patients_id`, `name`, `birthday`, `gender`, `phone`, `residence`, `occupation`) VALUES
(3, 'Ruby', '1992-11-06', 'Male', '760883939', 'Daluwakotuva,5', 'Engineering,3'),
(4, 'Sheran perera', '', 'Male', '760883939', 'Negombo,1', 'Doctor,1'),
(5, 'Sheran perera', '', 'Male', '760883939', 'Negombo,1', 'Doctor,1'),
(6, 'Sheran perera', '', 'Male', '', '---', '---'),
(8, 'Unknown', '', 'Male', '', '---', '---'),
(12, 'Manel Fonseka', '1949-04-11', 'Female', '0312277277', 'Kochchikade', 'Teacher'),
(10, 'Damintha Dissanayake', '1977-05-01', 'Male', '0773908394', 'Negombo,1', 'Doctor,1'),
(11, 'Shenuka Fernando', '1978-03-22', 'Female', '0773908382', 'Negombo,1', 'Doctor,1'),
(13, 'Lalith Dissanayake', '1948-08-24', 'Male', '0771300071', 'Kochchikade,29', 'Engineer');

-- --------------------------------------------------------

--
-- Table structure for table `patients_prescription_number`
--

DROP TABLE IF EXISTS `patients_prescription_number`;
CREATE TABLE IF NOT EXISTS `patients_prescription_number` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `date` varchar(20) NOT NULL,
  `patients_id` int(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patients_prescription_number`
--

INSERT INTO `patients_prescription_number` (`id`, `date`, `patients_id`) VALUES
(4, '2021-06-13 18:03', 4),
(2, '2021-05-22 11:21', 2),
(5, '2021-06-19 21:00', 10);

-- --------------------------------------------------------

--
-- Table structure for table `pp_import`
--

DROP TABLE IF EXISTS `pp_import`;
CREATE TABLE IF NOT EXISTS `pp_import` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `pr_id` int(255) NOT NULL,
  `status` int(1) DEFAULT NULL,
  `user_id` int(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `prescription`
--

DROP TABLE IF EXISTS `prescription`;
CREATE TABLE IF NOT EXISTS `prescription` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `patients_id` int(255) NOT NULL,
  `diagnoses` varchar(255) NOT NULL,
  `next_visits` varchar(255) NOT NULL,
  `investigations` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `prescription_bluk_drugs`
--

DROP TABLE IF EXISTS `prescription_bluk_drugs`;
CREATE TABLE IF NOT EXISTS `prescription_bluk_drugs` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `form` varchar(150) NOT NULL,
  `generic_name` varchar(255) NOT NULL,
  `trade_name` varchar(255) NOT NULL,
  `strength` varchar(150) NOT NULL,
  `unit` varchar(150) NOT NULL,
  `route` varchar(150) NOT NULL,
  `frequency` varchar(150) NOT NULL,
  `duration` varchar(150) NOT NULL,
  `indication` varchar(150) NOT NULL,
  `instructions` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prescription_bluk_drugs`
--

INSERT INTO `prescription_bluk_drugs` (`id`, `form`, `generic_name`, `trade_name`, `strength`, `unit`, `route`, `frequency`, `duration`, `indication`, `instructions`) VALUES
(1, 'Suppository,1', 'Paracetamol,7', 'Panadol,3', '100,1', 'g,1', 'Eye,1', 'Noon,1', '3 days,4', 'Infection,1', 'After going to bed,2'),
(2, 'Suppository,1', 'Paracetamol,7', 'Furo,24', '100,1', 'g,1', 'Eye,1', 'Noon,1', '3 days,4', 'Infection,1', 'After going to bed,2'),
(3, 'Metered dose inhaler,2', 'A,28', 'Furo,24', '1,8', 'g,1', '--,2', 'Noon,1', 'test', '--,2', 'After going to bed,2'),
(4, 'Tablet,9', 'Metformin,25', 'Proglutrol,23', '500,10', 'mg,2', 'Oral,7', '3 times a day,9', '3 months,13', 'Diabetes,7', 'Before meals'),
(5, 'Tablet,9', 'Pantaprazole,40', 'Panum,29', '40', 'mg,2', 'Oral,7', 'Twice a day,8', '3 months,13', 'Gastritis', 'Before meals,11'),
(6, 'Tablet,9', 'Methotrexate', 'MTX', '7.5', 'mg,2', 'Oral,7', 'Sunday morning', '3 months,13', 'Rheumatoid arthritis', 'After meals,10'),
(7, 'Tablet,9', 'Bisacodyl', 'Dulcolax', '2-4', 'Tablets', 'Oral,7', 'When needed', '3 months,13', 'Constipation', 'Adjust number of tablets'),
(8, 'Aerosol,26', 'Salbutamol,49', 'Asthalin,37', '1-2', 'puffs', 'Oral inhalation', 'When needed,11', '3 months,13', 'Wheezing', 'Maximum repeat 4 hourly'),
(9, 'Tablet,9', 'Asprin,85', 'Ecosprin,59', '75', 'mg,2', 'Oral,7', 'Night', '3 months,13', 'Heart disease', 'After meals,10'),
(10, ',29', ',118', ',75', '1,8', 'g,1', 'Oral,7', 'Noon,1', '3 months,13', ',15', ',14'),
(11, 'Cream,18', ',122', ',79', '1,8', 'Drops,13', ',9', '3 times a day,9', '1 day,5', ',15', ',14');

-- --------------------------------------------------------

--
-- Table structure for table `save_assign_a_doctor`
--

DROP TABLE IF EXISTS `save_assign_a_doctor`;
CREATE TABLE IF NOT EXISTS `save_assign_a_doctor` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `prescription_number` varchar(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `note` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `save_assign_a_doctor`
--

INSERT INTO `save_assign_a_doctor` (`id`, `prescription_number`, `name`, `note`) VALUES
(3, '5', 'Sampath,12', 'Ches pain,4');

-- --------------------------------------------------------

--
-- Table structure for table `save_diagnoses`
--

DROP TABLE IF EXISTS `save_diagnoses`;
CREATE TABLE IF NOT EXISTS `save_diagnoses` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `prescription_number` varchar(255) NOT NULL,
  `diagnoses` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `save_diagnoses`
--

INSERT INTO `save_diagnoses` (`id`, `prescription_number`, `diagnoses`) VALUES
(3, '5', 'Hypertension'),
(4, '5', 'Dyslipidemia'),
(5, '5', 'Diabetes Mellitus');

-- --------------------------------------------------------

--
-- Table structure for table `save_drug_allergies`
--

DROP TABLE IF EXISTS `save_drug_allergies`;
CREATE TABLE IF NOT EXISTS `save_drug_allergies` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `prescription_number` int(255) NOT NULL,
  `drug_allergies` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `save_drug_allergies`
--

INSERT INTO `save_drug_allergies` (`id`, `prescription_number`, `drug_allergies`) VALUES
(3, 5, 'Amoxicillin'),
(4, 5, 'Metformin'),
(5, 5, 'Gliclazide');

-- --------------------------------------------------------

--
-- Table structure for table `save_investigations_days`
--

DROP TABLE IF EXISTS `save_investigations_days`;
CREATE TABLE IF NOT EXISTS `save_investigations_days` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `prescription_number` int(255) NOT NULL,
  `days` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `save_investigations_days`
--

INSERT INTO `save_investigations_days` (`id`, `prescription_number`, `days`) VALUES
(3, 5, '7-Days');

-- --------------------------------------------------------

--
-- Table structure for table `save_investigations_group`
--

DROP TABLE IF EXISTS `save_investigations_group`;
CREATE TABLE IF NOT EXISTS `save_investigations_group` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `day_id` int(255) NOT NULL,
  `test_catagory` varchar(150) NOT NULL,
  `test_id` varchar(150) NOT NULL,
  `prescription_number` int(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `save_investigations_group`
--

INSERT INTO `save_investigations_group` (`id`, `day_id`, `test_catagory`, `test_id`, `prescription_number`) VALUES
(2, 2, 'CT Scan', '31', 3),
(3, 3, 'CT Scan', '31', 5),
(4, 3, 'X-ray', '33', 5);

-- --------------------------------------------------------

--
-- Table structure for table `save_next_visits`
--

DROP TABLE IF EXISTS `save_next_visits`;
CREATE TABLE IF NOT EXISTS `save_next_visits` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `prescription_number` int(255) NOT NULL,
  `day` varchar(20) NOT NULL,
  `pay` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `save_next_visits`
--

INSERT INTO `save_next_visits` (`id`, `prescription_number`, `day`, `pay`) VALUES
(3, 5, '2 Days', 'Paid');

-- --------------------------------------------------------

--
-- Table structure for table `save_patients_other_details`
--

DROP TABLE IF EXISTS `save_patients_other_details`;
CREATE TABLE IF NOT EXISTS `save_patients_other_details` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `prescription_number` int(255) NOT NULL,
  `smoking` varchar(3) DEFAULT NULL,
  `alcohol` varchar(3) DEFAULT NULL,
  `allergies` varchar(100) DEFAULT NULL,
  `pregnancy` varchar(100) DEFAULT NULL,
  `lactating` varchar(150) DEFAULT NULL,
  `kidney` varchar(20) DEFAULT NULL,
  `lrmp` varchar(10) DEFAULT NULL,
  `height` varchar(100) DEFAULT NULL,
  `body_Weight` varchar(100) DEFAULT NULL,
  `blood_pressure` varchar(100) DEFAULT NULL,
  `systolic_blood_pressure` varchar(100) DEFAULT NULL,
  `diastolic_blood_pressure` varchar(100) DEFAULT NULL,
  `pulse_rate` varchar(100) DEFAULT NULL,
  `respiratory_rate` varchar(100) DEFAULT NULL,
  `oxygen_saturation` varchar(100) DEFAULT NULL,
  `temperature` varchar(100) DEFAULT NULL,
  `random_blood_suga` varchar(100) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL,
  `mid` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `save_patients_other_details`
--

INSERT INTO `save_patients_other_details` (`id`, `prescription_number`, `smoking`, `alcohol`, `allergies`, `pregnancy`, `lactating`, `kidney`, `lrmp`, `height`, `body_Weight`, `blood_pressure`, `systolic_blood_pressure`, `diastolic_blood_pressure`, `pulse_rate`, `respiratory_rate`, `oxygen_saturation`, `temperature`, `random_blood_suga`, `date`, `mid`) VALUES
(4, 4, 'No', 'No', 'Not Present', 'No', 'No', 'No', '', '01', '1', NULL, '10', '10', '', '', '', '', '', NULL, ''),
(5, 5, 'No', 'No', 'Present', 'No', 'No', 'No', '', '1.65', '75', NULL, '123', '88', '88', '21', '99', '97', '123', NULL, '36');

-- --------------------------------------------------------

--
-- Table structure for table `save_prescription_drugs`
--

DROP TABLE IF EXISTS `save_prescription_drugs`;
CREATE TABLE IF NOT EXISTS `save_prescription_drugs` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `prescription_number` varchar(255) NOT NULL,
  `order_no` int(100) DEFAULT NULL,
  `form` varchar(150) NOT NULL,
  `generic_name` varchar(255) NOT NULL,
  `trade_name` varchar(255) NOT NULL,
  `strength` varchar(150) NOT NULL,
  `unit` varchar(150) NOT NULL,
  `route` varchar(150) NOT NULL,
  `frequency` varchar(150) NOT NULL,
  `duration` varchar(150) NOT NULL,
  `indication` varchar(150) NOT NULL,
  `instructions` varchar(150) NOT NULL,
  `category` varchar(100) NOT NULL DEFAULT 'short_term,long_term',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `save_prescription_drugs`
--

INSERT INTO `save_prescription_drugs` (`id`, `prescription_number`, `order_no`, `form`, `generic_name`, `trade_name`, `strength`, `unit`, `route`, `frequency`, `duration`, `indication`, `instructions`, `category`) VALUES
(4, '4', 21, 'Suppository,1', 'Paracetamol,7', 'Panadol,3', '100,1', 'g,1', 'Eye,1', 'Noon,1', '3 days,4', 'Cough', 'After going to bed,2', '1step'),
(5, '4', 22, 'Metered dose inhaler,2', 'Paracetamol,7', 'Panadol,3', '100,1', 'g,1', 'Eye,1', 'Noon,1', '3 days,4', 'Cough', 'After going to bed,2', '1step'),
(6, '4', 23, 'Suppository,1', 'Paracetamol,7', 'Panadol,3', '100,1', 'g,1', 'Eye,1', 'Noon,1', '3 days,4', 'Test', 'After going to bed,2', '2step'),
(7, '4', 24, 'Metered dose inhaler,2', 'A,28', 'Furo,24', '1,8', 'g,1', '--,2', 'Noon,1', 'test', '--,2', 'After going to bed,2', 'short_term'),
(8, '4', 25, 'Suppository,1', 'Paracetamol,7', 'Furo,24', '100,1', 'g,1', 'Eye,1', 'Noon,1', 'test2', 'Infection,1', 'After going to bed,2', 'short_term'),
(9, '5', 52, 'Suppository,1', 'Paracetamol,7', 'Panadol,3', '100,1', 'g,1', 'Eye,1', 'Noon,1', '3 days,4', 'Infection,1', 'After going to bed,2', 'short_term'),
(10, '5', 53, 'Suppository,1', 'Paracetamol,7', 'Panadol,3', '100,1', 'g,1', 'Eye,1', 'Noon,1', '3 days,4', 'Infection,1', 'After going to bed,2', 'short_term'),
(11, '5', 54, 'Suppository,1', 'Paracetamol,7', 'Furo,24', '100,1', 'g,1', 'Eye,1', 'Noon,1', '3 days,4', 'Infection,1', 'After going to bed,2', 'short_term'),
(12, '5', 55, 'Metered dose inhaler,2', 'A,28', 'Furo,24', '1,8', 'g,1', '--,2', 'Noon,1', 'test', '--,2', 'After going to bed,2', 'short_term'),
(13, '5', 56, 'Suppository,1', 'Paracetamol,7', 'Panadol,3', '100,1', 'g,1', 'Eye,1', 'Noon,1', '3 days,4', 'Infection,1', 'After going to bed,2', 'long_term'),
(14, '5', 57, 'Suppository,1', 'Paracetamol,7', 'Furo,24', '100,1', 'g,1', 'Eye,1', 'Noon,1', '3 days,4', 'Infection,1', 'After going to bed,2', 'long_term'),
(15, '5', 58, 'Suppository,1', 'Paracetamol,7', 'Panadol,3', '100,1', 'g,1', 'Eye,1', 'Noon,1', '3 days,4', 'Infection,1', 'After going to bed,2', 'when_needed'),
(16, '5', 59, 'Suppository,1', 'Paracetamol,7', 'Furo,24', '100,1', 'g,1', 'Eye,1', 'Noon,1', '3 days,4', 'Infection,1', 'After going to bed,2', 'when_needed'),
(17, '5', 60, 'Suppository,1', 'Paracetamol,7', 'Panadol,3', '100,1', 'g,1', 'Eye,1', 'Noon,1', '3 days,4', 'Cough', 'After going to bed,2', '1step'),
(18, '5', 61, 'Suppository,1', 'Paracetamol,7', 'Furo,24', '100,1', 'g,1', 'Eye,1', 'Noon,1', '3 days,4', 'Cough', 'After going to bed,2', '1step'),
(19, '5', 62, 'Metered dose inhaler,2', 'A,28', 'Furo,24', '1,8', 'g,1', '--,2', 'Noon,1', 'test', 'Cough', 'After going to bed,2', '1step'),
(20, '5', 63, 'Tablet,9', 'Metformin,25', 'Proglutrol,23', '500,10', 'mg,2', 'Oral,7', '3 times a day,9', '3 months,13', 'Cough', 'Before meals', '1step'),
(21, '5', 64, 'Tablet,9', 'Pantaprazole,40', 'Panum,29', '40', 'mg,2', 'Oral,7', 'Twice a day,8', '3 months,13', 'Cough', 'Before meals,11', '1step'),
(22, '5', 65, 'Tablet,9', 'Pantaprazole,40', 'Panum,29', '40', 'mg,2', 'Oral,7', 'Twice a day,8', '3 months,13', 'Gastritis', 'Before meals,11', '2step');

-- --------------------------------------------------------

--
-- Table structure for table `save_test`
--

DROP TABLE IF EXISTS `save_test`;
CREATE TABLE IF NOT EXISTS `save_test` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `group_id` int(255) NOT NULL,
  `indications` varchar(255) NOT NULL,
  `indications_id` varchar(255) NOT NULL,
  `test` varchar(255) NOT NULL,
  `test_id` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `save_test`
--

INSERT INTO `save_test` (`id`, `group_id`, `indications`, `indications_id`, `test`, `test_id`) VALUES
(4, 3, 'Indications', '100', 'TSH', '128'),
(5, 4, 'Vomiting', '8', 'Chest', '131');

-- --------------------------------------------------------

--
-- Table structure for table `temp_assign_a_doctor`
--

DROP TABLE IF EXISTS `temp_assign_a_doctor`;
CREATE TABLE IF NOT EXISTS `temp_assign_a_doctor` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `user_id` int(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `note` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `temp_center_patients_details`
--

DROP TABLE IF EXISTS `temp_center_patients_details`;
CREATE TABLE IF NOT EXISTS `temp_center_patients_details` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `patients_id` int(255) DEFAULT NULL,
  `order` varchar(1) DEFAULT NULL,
  `center` varchar(50) DEFAULT NULL,
  `nd` varchar(1) DEFAULT NULL,
  `active` varchar(1) DEFAULT '0',
  `data_arrey` mediumtext,
  `import` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `temp_center_patients_details`
--

INSERT INTO `temp_center_patients_details` (`id`, `patients_id`, `order`, `center`, `nd`, `active`, `data_arrey`, `import`) VALUES
(10, NULL, '5', 'Nawaloka', 'c', '1', NULL, NULL),
(32, NULL, '1', 'Nawaloka', 'n', '1', NULL, NULL),
(33, NULL, '2', 'Nawaloka', 'n', '1', NULL, NULL),
(37, 10, '3', 'Nawaloka', 'n', '1', 'YToyODp7czoyOiJpZCI7czoxOiIzIjtzOjQ6Im5hbWUiO3M6MjA6IkRhbWludGhhIERpc3NhbmF5YWtlIjtzOjY6ImdlbmRlciI7czo0OiJNYWxlIjtzOjg6ImJpcnRoZGF5IjtzOjEwOiIxOTc3LTA1LTAxIjtzOjk6InJlc2lkZW5jZSI7czo3OiJOZWdvbWJvIjtzOjIyOiJyZXBvcnRfb3JfY29uc3VsdGF0aW9uIjtOO3M6NToicGhvbmUiO3M6MTA6IjA3NzM5MDgzOTQiO3M6NDoidGltZSI7TjtzOjg6ImFwbnVtYmVyIjtOO3M6MTA6Im9jY3VwYXRpb24iO3M6NjoiRG9jdG9yIjtzOjc6InNtb2tpbmciO3M6MjoiTm8iO3M6NzoiYWxjb2hvbCI7czoyOiJObyI7czo2OiJraWRuZXkiO047czo5OiJhbGxlcmdpZXMiO047czo5OiJwcmVnbmFuY3kiO047czo5OiJsYWN0YXRpbmciO047czoyMzoic3lzdG9saWNfYmxvb2RfcHJlc3N1cmUiO047czoyNDoiZGlhc3RvbGljX2Jsb29kX3ByZXNzdXJlIjtOO3M6MTQ6ImJsb29kX3ByZXNzdXJlIjtOO3M6MTc6InJhbmRvbV9ibG9vZF9zdWdhIjtOO3M6MTE6ImJvZHlfV2VpZ2h0IjtOO3M6NjoiaGVpZ2h0IjtzOjQ6IjEuNjUiO3M6MzoiYm1pIjtOO3M6MzoibWlkIjtOO3M6MTA6InB1bHNlX3JhdGUiO047czoxNjoicmVzcGlyYXRvcnlfcmF0ZSI7TjtzOjE3OiJveHlnZW5fc2F0dXJhdGlvbiI7TjtzOjExOiJ0ZW1wZXJhdHVyZSI7Tjt9', 1);

-- --------------------------------------------------------

--
-- Table structure for table `temp_diagnoses`
--

DROP TABLE IF EXISTS `temp_diagnoses`;
CREATE TABLE IF NOT EXISTS `temp_diagnoses` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `user_id` int(255) NOT NULL,
  `diagnoses` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=66 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `temp_drug_allergies`
--

DROP TABLE IF EXISTS `temp_drug_allergies`;
CREATE TABLE IF NOT EXISTS `temp_drug_allergies` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `user_id` int(255) NOT NULL,
  `drug_allergies` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `temp_drug_allergies`
--

INSERT INTO `temp_drug_allergies` (`id`, `user_id`, `drug_allergies`) VALUES
(3, 11, 'Amoxicillin'),
(4, 11, 'Metformin');

-- --------------------------------------------------------

--
-- Table structure for table `temp_investigations_days`
--

DROP TABLE IF EXISTS `temp_investigations_days`;
CREATE TABLE IF NOT EXISTS `temp_investigations_days` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `user_id` int(255) NOT NULL,
  `days` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=85 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `temp_investigations_group`
--

DROP TABLE IF EXISTS `temp_investigations_group`;
CREATE TABLE IF NOT EXISTS `temp_investigations_group` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `day_id` int(255) NOT NULL,
  `test_catagory` varchar(150) NOT NULL,
  `test_id` varchar(150) NOT NULL,
  `user_id` int(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=212 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `temp_next_visits`
--

DROP TABLE IF EXISTS `temp_next_visits`;
CREATE TABLE IF NOT EXISTS `temp_next_visits` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `user_id` int(255) NOT NULL,
  `days` varchar(100) NOT NULL,
  `pay` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `temp_patients_other_details`
--

DROP TABLE IF EXISTS `temp_patients_other_details`;
CREATE TABLE IF NOT EXISTS `temp_patients_other_details` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `patients_id` int(255) NOT NULL,
  `smoking` varchar(3) DEFAULT NULL,
  `alcohol` varchar(3) DEFAULT NULL,
  `allergies` varchar(100) DEFAULT NULL,
  `pregnancy` varchar(100) DEFAULT NULL,
  `lactating` varchar(150) DEFAULT NULL,
  `kidney` varchar(20) DEFAULT NULL,
  `lrmp` varchar(10) DEFAULT NULL,
  `height` varchar(100) DEFAULT NULL,
  `body_Weight` varchar(100) DEFAULT NULL,
  `blood_pressure` varchar(100) DEFAULT NULL,
  `systolic_blood_pressure` varchar(100) DEFAULT NULL,
  `diastolic_blood_pressure` varchar(100) DEFAULT NULL,
  `pulse_rate` varchar(100) DEFAULT NULL,
  `respiratory_rate` varchar(100) DEFAULT NULL,
  `oxygen_saturation` varchar(100) DEFAULT NULL,
  `temperature` varchar(100) DEFAULT NULL,
  `random_blood_suga` varchar(100) DEFAULT NULL,
  `mid` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `temp_prescription_drugs`
--

DROP TABLE IF EXISTS `temp_prescription_drugs`;
CREATE TABLE IF NOT EXISTS `temp_prescription_drugs` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `order_no` int(100) DEFAULT NULL,
  `user_id` int(255) NOT NULL,
  `form` varchar(150) DEFAULT NULL,
  `generic_name` varchar(255) DEFAULT NULL,
  `trade_name` varchar(255) DEFAULT NULL,
  `strength` varchar(150) DEFAULT NULL,
  `unit` varchar(150) DEFAULT NULL,
  `route` varchar(150) DEFAULT NULL,
  `frequency` varchar(150) DEFAULT NULL,
  `duration` varchar(150) DEFAULT NULL,
  `indication` varchar(150) DEFAULT NULL,
  `instructions` varchar(150) DEFAULT NULL,
  `category` varchar(100) NOT NULL DEFAULT 'short_term,long_term',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=291 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `temp_test`
--

DROP TABLE IF EXISTS `temp_test`;
CREATE TABLE IF NOT EXISTS `temp_test` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `group_id` int(255) NOT NULL,
  `indications` varchar(255) NOT NULL,
  `indications_id` varchar(255) NOT NULL,
  `test` varchar(255) NOT NULL,
  `test_id` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=261 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `today_patients`
--

DROP TABLE IF EXISTS `today_patients`;
CREATE TABLE IF NOT EXISTS `today_patients` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `order_set` int(255) DEFAULT NULL,
  `patients_id` int(255) NOT NULL,
  `user_id` int(255) DEFAULT NULL,
  `apnumber` varchar(2) NOT NULL,
  `time` varchar(8) DEFAULT NULL,
  `report_or_consultation` varchar(30) NOT NULL,
  `center` varchar(50) DEFAULT NULL,
  `status` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `today_patients`
--

INSERT INTO `today_patients` (`id`, `order_set`, `patients_id`, `user_id`, `apnumber`, `time`, `report_or_consultation`, `center`, `status`) VALUES
(15, 3, 12, NULL, '10', '3:00 PM', 'Consultation', 'Nawaloka', '2'),
(14, 1, 10, NULL, '03', '3:00 PM', 'Consultation', 'Nawaloka', '2'),
(16, 2, 13, NULL, '07', '3:00 PM', 'Consultation', 'Nawaloka', '2');

-- --------------------------------------------------------

--
-- Table structure for table `variables_diagnoses`
--

DROP TABLE IF EXISTS `variables_diagnoses`;
CREATE TABLE IF NOT EXISTS `variables_diagnoses` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `sinhala` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `variables_diagnoses`
--

INSERT INTO `variables_diagnoses` (`id`, `name`, `sinhala`) VALUES
(1, 'Hypertension', ''),
(4, 'Dyslipidemia', ''),
(5, 'Diabetes Mellitus', ''),
(7, 'Dengue', ''),
(8, 'Backache', ''),
(9, 'Diarrhoea', ''),
(12, 'Wheezing', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `variables_doctor`
--

DROP TABLE IF EXISTS `variables_doctor`;
CREATE TABLE IF NOT EXISTS `variables_doctor` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `sinhala` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `variables_doctor`
--

INSERT INTO `variables_doctor` (`id`, `name`, `sinhala`) VALUES
(12, 'Sampath', 'sami'),
(13, 'Sampath,12', NULL),
(14, 'Sampath,12,13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `variables_doctor_indication`
--

DROP TABLE IF EXISTS `variables_doctor_indication`;
CREATE TABLE IF NOT EXISTS `variables_doctor_indication` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `sinhala` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `variables_doctor_indication`
--

INSERT INTO `variables_doctor_indication` (`id`, `name`, `sinhala`) VALUES
(4, 'Ches pain', ''),
(5, 'Ches pain,4', NULL),
(6, 'Ches pain,4,5', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `variables_duration`
--

DROP TABLE IF EXISTS `variables_duration`;
CREATE TABLE IF NOT EXISTS `variables_duration` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `sinhala` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `variables_duration`
--

INSERT INTO `variables_duration` (`id`, `name`, `sinhala`) VALUES
(6, '1 Year', ''),
(5, '1 day', ''),
(4, '3 days', ''),
(7, '5 days', ''),
(13, '3 months', NULL),
(14, 'test', NULL),
(15, 'test2', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `variables_form`
--

DROP TABLE IF EXISTS `variables_form`;
CREATE TABLE IF NOT EXISTS `variables_form` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `sinhala` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `variables_form`
--

INSERT INTO `variables_form` (`id`, `name`, `sinhala`) VALUES
(10, 'Suppository', ''),
(9, 'Tablet', NULL),
(11, 'Syrup', ''),
(12, 'Suspension', ''),
(13, 'Capsule', ''),
(17, 'Injection', ''),
(16, 'Satchet', ''),
(18, 'Cream', ''),
(19, 'Ointment', ''),
(20, 'Gel', ''),
(22, 'Solution', ''),
(23, 'Powder', ''),
(24, 'Paste', ''),
(25, 'Drops', ''),
(26, 'Aerosol', ''),
(27, 'Inhalant', ''),
(28, '', ''),
(29, '', NULL),
(30, '', NULL),
(31, '', NULL),
(32, '', NULL),
(33, '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `variables_frequency`
--

DROP TABLE IF EXISTS `variables_frequency`;
CREATE TABLE IF NOT EXISTS `variables_frequency` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `sinhala` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `variables_frequency`
--

INSERT INTO `variables_frequency` (`id`, `name`, `sinhala`) VALUES
(1, 'Noon', ''),
(7, 'Three times a day', NULL),
(8, 'Twice a day', NULL),
(9, '3 times a day', NULL),
(10, 'Sunday morning', NULL),
(11, 'When needed', NULL),
(12, 'Night', NULL),
(13, 'morning', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `variables_generic_name`
--

DROP TABLE IF EXISTS `variables_generic_name`;
CREATE TABLE IF NOT EXISTS `variables_generic_name` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `sinhala` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=126 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `variables_generic_name`
--

INSERT INTO `variables_generic_name` (`id`, `name`, `sinhala`) VALUES
(31, 'Paracetamol', NULL),
(49, 'Salbutamol', ''),
(10, 'Amoxicillin', 'à¶‡à¶¸à·œà¶šà·Šà·ƒà¶½à·’à¶±à·Š'),
(25, 'Metformin', NULL),
(48, 'Bisacodyl', NULL),
(32, 'Metformin', ''),
(33, 'Gliclazide', ''),
(34, 'Pioglitazone', ''),
(35, 'Empagliflozin', ''),
(36, 'Sitagliptin', ''),
(37, 'Losartan', ''),
(38, 'Rosuvastatin', ''),
(39, 'Atorvastatin', ''),
(40, 'Pantaprazole', ''),
(41, 'Domperidone', ''),
(42, 'Rupatadine', ''),
(44, 'Methylprednisolone', ''),
(45, 'Cefuroxime', ''),
(46, 'Methotrexate', NULL),
(50, 'Glimepiride', ''),
(51, 'Paracetamol', ''),
(52, 'Atorvastatin', ''),
(53, 'Irbesartan', ''),
(54, 'Clinidipine', ''),
(55, 'Hydrochlorothiazide', ''),
(56, 'Diltiazem', ''),
(57, 'Prazocin', ''),
(58, 'Prednisolone', ''),
(59, 'Mosapride', ''),
(62, 'Leflunamide', ''),
(63, 'Celecoxib', ''),
(64, 'Etorocoxib', ''),
(65, 'Omeprazole ', ''),
(66, 'Rabeprazole', ''),
(67, 'Cefixime', ''),
(68, 'Moxifloxacin', ''),
(69, 'Nitrofurantoin', ''),
(70, 'Penicilline', ''),
(71, 'Ornidazole', ''),
(72, 'Ondansetron', ''),
(73, 'Diclofenac K', ''),
(74, 'Thyroxine', ''),
(75, 'Vitamin E', ''),
(76, 'Multivitamin', ''),
(79, 'Calcium tablet', ''),
(78, 'Iron tablet', ''),
(80, 'Fish oil', ''),
(81, 'Bisacodyl', ''),
(82, 'Hyoscine', ''),
(83, 'Bisoprolol', ''),
(84, 'GTN', ''),
(85, 'Asprin', ''),
(86, 'Clopidogrel', ''),
(87, 'Ivabradine', ''),
(88, 'Furosemide', ''),
(89, 'Spironolactone', ''),
(90, 'Tamsulosin', ''),
(91, 'Finasteride', ''),
(92, 'Dutasteride', ''),
(93, 'Pizotifen', ''),
(94, 'Betahistine', ''),
(95, 'Cinnarazine', ''),
(96, 'Flunarazine', ''),
(97, 'Prochlorperazine', ''),
(98, 'Chlorpromazine', ''),
(99, 'Venlafaxine', ''),
(100, 'Escitalopram', ''),
(101, 'Carbimazole', ''),
(102, 'Alprazolam', ''),
(103, 'Melatonin', ''),
(104, 'Amitriptylline', ''),
(105, 'Carbamazapine', ''),
(106, 'Gabapentin', ''),
(107, 'Pregabalin', ''),
(108, 'Midazolam', ''),
(109, 'Montelukast', ''),
(110, 'Ranitidine', ''),
(111, 'Loratidine', ''),
(112, 'Cetirizine', ''),
(113, 'Famotidine', ''),
(114, 'Lactulose', ''),
(115, 'Magnesium hydroxide', ''),
(116, 'Vitamin D', ''),
(124, '', NULL),
(123, '', NULL),
(122, '', NULL),
(125, '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `variables_indication`
--

DROP TABLE IF EXISTS `variables_indication`;
CREATE TABLE IF NOT EXISTS `variables_indication` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `sinhala` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `variables_indication`
--

INSERT INTO `variables_indication` (`id`, `name`, `sinhala`) VALUES
(1, 'Infection', ''),
(2, '--', NULL),
(7, 'Diabetes', NULL),
(8, 'Headche', NULL),
(9, 'Pains', NULL),
(10, 'Gastritis', NULL),
(11, 'Rheumatoid arthritis', NULL),
(12, 'Constipation', NULL),
(13, 'Wheezing', NULL),
(14, 'Heart disease', NULL),
(15, '', ''),
(16, '', NULL),
(17, '', NULL),
(18, '', NULL),
(19, '', NULL),
(20, '', NULL),
(21, '', NULL),
(22, '', NULL),
(23, '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `variables_instructions`
--

DROP TABLE IF EXISTS `variables_instructions`;
CREATE TABLE IF NOT EXISTS `variables_instructions` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `sinhala` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `variables_instructions`
--

INSERT INTO `variables_instructions` (`id`, `name`, `sinhala`) VALUES
(2, 'After going to bed', ''),
(10, 'After meals', NULL),
(11, 'Before meals', NULL),
(12, 'Adjust number of tablets', NULL),
(13, 'Maximum repeat 4 hourly', NULL),
(14, '', ''),
(15, '', NULL),
(16, '', NULL),
(17, '', NULL),
(18, '', NULL),
(19, '', NULL),
(20, '', NULL),
(21, '', NULL),
(22, '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `variables_occupation`
--

DROP TABLE IF EXISTS `variables_occupation`;
CREATE TABLE IF NOT EXISTS `variables_occupation` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `sinhala` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `variables_occupation`
--

INSERT INTO `variables_occupation` (`id`, `name`, `sinhala`) VALUES
(1, 'Doctor', 'à¶©à·œà¶šà·Šà¶§à¶»à·Š'),
(2, 'Carpenter', 'à·€à¶©à·” à¶šà·à¶»à·Šà¶¸à·’à¶šà¶ºà·'),
(3, 'Engineering', ' à¶‰à¶‚à¶¢à·“à¶±à·šà¶»à·”'),
(4, 'Announcer', ' à¶±à·’à·€à·šà¶¯à¶š'),
(24, '---', ''),
(25, '', ''),
(26, '', ''),
(27, '', ''),
(28, '', ''),
(29, '', ''),
(30, 'Teacher', ''),
(31, 'Engineer', ''),
(32, '', ''),
(33, '', ''),
(34, '', ''),
(35, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `variables_residence`
--

DROP TABLE IF EXISTS `variables_residence`;
CREATE TABLE IF NOT EXISTS `variables_residence` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `sinhala` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `variables_residence`
--

INSERT INTO `variables_residence` (`id`, `name`, `sinhala`) VALUES
(1, 'Negombo', 'à¶¸à·’à¶œà¶¸à·”à·€'),
(2, 'Colomobo', 'à¶šà·œà·…à¶¹'),
(4, 'Gampaha', 'à¶œà¶¸à·Šà¶´à·„'),
(5, 'Daluwakotuva', 'à¶¯à¶½à·”à·€à¶šà·œà¶§à·”à·€'),
(6, 'Ragama', 'à¶»à·à¶œà¶¸'),
(23, '---', ''),
(8, 'Daluwakotuwa', ''),
(24, '', ''),
(25, '', ''),
(26, '', ''),
(27, '', ''),
(28, '', ''),
(29, 'Kochchikade', ''),
(30, '', ''),
(31, '', ''),
(32, '', ''),
(33, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `variables_route`
--

DROP TABLE IF EXISTS `variables_route`;
CREATE TABLE IF NOT EXISTS `variables_route` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `sinhala` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `variables_route`
--

INSERT INTO `variables_route` (`id`, `name`, `sinhala`) VALUES
(1, 'Eye', ''),
(2, '--', NULL),
(7, 'Oral', NULL),
(8, 'Oral inhalation', NULL),
(9, '', ''),
(10, '', NULL),
(11, '', NULL),
(12, '', NULL),
(13, '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `variables_strength`
--

DROP TABLE IF EXISTS `variables_strength`;
CREATE TABLE IF NOT EXISTS `variables_strength` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `sinhala` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `variables_strength`
--

INSERT INTO `variables_strength` (`id`, `name`, `sinhala`) VALUES
(1, '100', ''),
(2, '250', ''),
(8, '1', NULL),
(9, '80', NULL),
(10, '500', NULL),
(11, '40', NULL),
(12, '7.5', NULL),
(13, '2-4', NULL),
(16, '75', NULL),
(15, '1-2', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `variables_test`
--

DROP TABLE IF EXISTS `variables_test`;
CREATE TABLE IF NOT EXISTS `variables_test` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `sinhala` varchar(255) DEFAULT NULL,
  `special_instruction` text NOT NULL,
  `special_instruction_sinhala` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `variables_test`
--

INSERT INTO `variables_test` (`id`, `name`, `sinhala`, `special_instruction`, `special_instruction_sinhala`) VALUES
(31, 'CT Scan [ with contrast ]', '', 'Please get appointment and preparation instructions from CT room. Blood test [Serum creatinine] to be done before the CT. No allergies to be present.', ''),
(33, 'X-ray', '', 'Please go to X ray room. Contraindicated if suspicious or positive of pregnancy.', ''),
(35, 'CT scan [ without contrast]', '', '', ''),
(34, 'Blood tests ', '', '12 hour fasting necessary.', ''),
(36, 'Ultrasound scan', '', 'Please get appointment and preparation instructions from scanning room.', ''),
(37, 'Blood tests ', '', 'Fasting is not necessary', '');

-- --------------------------------------------------------

--
-- Table structure for table `variables_test_indications`
--

DROP TABLE IF EXISTS `variables_test_indications`;
CREATE TABLE IF NOT EXISTS `variables_test_indications` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `test_id` int(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=322 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `variables_test_indications`
--

INSERT INTO `variables_test_indications` (`id`, `name`, `test_id`) VALUES
(2, 'test', 22),
(3, 'test', 22),
(134, 'Abdominal pains [right upper]', 36),
(8, 'Vomiting', 33),
(13, '', 83),
(14, '', 84),
(87, 'Direia', 128),
(19, 'Vomiting', 127),
(20, 'N', 130),
(21, 'Vomiting', 127),
(22, 'N', 130),
(23, 'Direia', 127),
(24, 'N', 131),
(25, 'Vomiting', 127),
(26, 'Vomiting', 127),
(27, 'Vomiting', 127),
(28, 'N', 130),
(29, 'Vomiting', 127),
(30, 'N', 130),
(31, 'Vomiting', 127),
(32, 'N', 130),
(33, 'Vomiting', 127),
(34, 'N', 130),
(35, 'Vomiting', 127),
(36, 'N', 130),
(37, 'Vomiting', 127),
(38, 'N', 130),
(39, 'Vomiting', 127),
(40, 'N', 130),
(41, 'Vomiting', 127),
(42, 'N', 130),
(43, 'Vomiting', 127),
(44, 'N', 130),
(45, 'Vomiting', 127),
(46, 'N', 130),
(47, 'Vomiting', 127),
(48, 'N', 130),
(49, 'Vomiting', 127),
(50, 'N', 130),
(51, 'Vomiting', 127),
(52, 'N', 130),
(53, 'Direia', 127),
(54, 'N', 130),
(55, 'Direia', 127),
(56, 'N', 130),
(57, 'Direia', 127),
(58, 'N', 130),
(59, 'Direia', 127),
(60, 'N', 130),
(61, '', 127),
(62, '', 130),
(63, 'Direia', 127),
(64, 'N', 130),
(65, 'Vomiting', 127),
(66, 'N', 130),
(67, 'Vomiting', 127),
(68, 'N', 131),
(69, 'Vomiting', 127),
(70, 'N', 131),
(71, 'Vomiting', 127),
(72, 'N', 131),
(73, 'Vomiting', 127),
(74, 'Vomiting', 131),
(75, 'Vomiting', 127),
(76, 'Direia', 130),
(89, 'Vomiting', 130),
(78, 'Direia', 127),
(79, 'Direia', 130),
(80, 'Direia', 130),
(81, '', 131),
(88, '', 129),
(86, 'Vomiting', 127),
(84, 'Vomiting', 5),
(85, 'Direia', 9),
(91, 'Vomiting', 127),
(92, 'Cough', 128),
(93, '', 129),
(94, '', 132),
(95, '', 129),
(96, 'Vomiting', 127),
(97, '', 128),
(99, 'test', 128),
(101, 'Vomiting', 127),
(102, 'Vomiting', 128),
(103, 'Vomiting', 128),
(104, 'Direia', 127),
(105, 'Direia', 128),
(106, 'Vomiting', 127),
(107, 'Vomiting', 127),
(108, 'Vomiting', 127),
(109, 'Direia', 128),
(110, 'Vomiting', 127),
(111, 'Vomiting', 127),
(112, 'Vomiting', 127),
(113, 'Vomiting', 127),
(114, 'Direia', 128),
(115, 'Vomiting', 130),
(116, 'Vomiting', 131),
(117, 'Indications', 128),
(118, 'Vomiting', 131),
(133, 'Acute left sided weakness. ?Stroke', 31),
(121, '', 131),
(122, '', 202),
(123, '', 203),
(124, '', 131),
(125, '', 202),
(126, '', 203),
(127, '', 131),
(128, '', 202),
(129, '', 203),
(130, '', 131),
(131, '', 202),
(132, '', 203),
(135, 'Abdominal pains [right lower]', 36),
(136, 'Abdominal pains [left upper]', 36),
(137, 'Abdominal pains [left lower]', 36),
(138, 'Abdominal pains [diffuse]', 36),
(139, 'Abdominal pains [epigastric]', 36),
(140, 'Abdominal pains [central]', 36),
(141, 'Abdominal pains [lower]', 36),
(142, 'Abdominal pains [left]', 36),
(143, 'Abdominal pains [right]', 36),
(144, 'Goitre. Any suspicious nodules?', 36),
(145, 'Acute right sided weakness. ? Stroke', 35),
(146, 'Acute left sided weakness. ? Stroke', 35),
(147, 'Acute right sided weakness. ? Stroke', 31),
(148, 'Rightsided colic. ? GU stones.', 198),
(149, '', 131),
(150, '', 202),
(151, '', 203),
(152, '', 216),
(153, '', 217),
(154, '', 218),
(155, '', 219),
(156, '', 131),
(157, '', 202),
(158, '', 203),
(159, '', 216),
(160, '', 217),
(161, '', 218),
(162, '', 219),
(163, '', 131),
(164, '', 202),
(165, '', 203),
(166, '', 216),
(167, '', 217),
(168, '', 218),
(169, '', 219),
(170, '', 202),
(171, '', 203),
(172, '', 216),
(173, '', 217),
(174, '', 219),
(175, '', 131),
(176, '', 202),
(177, '', 203),
(178, '', 217),
(179, '', 219),
(180, '', 131),
(181, '', 202),
(182, '', 203),
(183, '', 217),
(184, '', 219),
(185, 'Vomiting', 130),
(186, '', 131),
(187, '', 202),
(188, 'Acute right sided weakness. ? Stroke', 221),
(189, 'Vomiting', 130),
(190, '', 131),
(191, 'Vomiting', 130),
(192, '', 131),
(193, '', 202),
(194, '', 221),
(195, 'Abdominal pains [right upper]', 223),
(196, '', 224),
(197, '', 225),
(198, '', 226),
(199, 'Vomiting', 130),
(200, '', 131),
(201, '', 203),
(202, 'Vomiting', 130),
(203, '', 131),
(204, '', 203),
(205, 'Acute left sided weakness. ?Stroke', 199),
(206, 'Vomiting', 130),
(207, '', 131),
(208, '', 203),
(209, 'Vomiting', 130),
(210, '', 131),
(211, '', 203),
(212, 'Vomiting', 130),
(213, '', 131),
(214, '', 203),
(215, '', 203),
(216, '', 203),
(217, 'Vomiting', 130),
(218, 'Vomiting', 130),
(219, 'Vomiting', 130),
(220, 'Vomiting', 130),
(221, 'Vomiting', 130),
(222, 'Vomiting', 130),
(223, 'Vomiting', 130),
(224, 'Vomiting', 130),
(225, 'Vomiting', 130),
(226, 'Acute left sided weakness. ?Stroke', 31),
(227, 'Acute left sided weakness. ?Stroke', 31),
(228, 'Acute left sided weakness. ?Stroke', 31),
(229, 'Acute left sided weakness. ?Stroke', 31),
(230, 'Acute left sided weakness. ?Stroke', 31),
(231, 'Acute left sided weakness. ?Stroke', 31),
(232, 'Acute left sided weakness. ?Stroke', 31),
(233, 'Acute left sided weakness. ?Stroke', 31),
(234, 'Acute left sided weakness. ?Stroke', 31),
(235, 'Acute left sided weakness. ?Stroke', 31),
(236, 'Acute left sided weakness. ?Stroke', 31),
(237, 'Acute left sided weakness. ?Stroke', 31),
(238, 'Acute left sided weakness. ?Stroke', 31),
(239, 'Acute left sided weakness. ?Stroke', 31),
(240, 'Acute left sided weakness. ?Stroke', 31),
(241, 'Acute left sided weakness. ?Stroke', 31),
(242, 'Acute left sided weakness. ?Stroke', 31),
(243, 'Acute left sided weakness. ?Stroke', 31),
(244, 'Acute left sided weakness. ?Stroke', 31),
(245, 'Acute left sided weakness. ?Stroke', 31),
(246, 'Acute left sided weakness. ?Stroke', 31),
(247, 'Acute left sided weakness. ?Stroke', 31),
(248, 'Acute left sided weakness. ?Stroke', 31),
(249, 'Acute left sided weakness. ?Stroke', 31),
(250, 'Acute left sided weakness. ?Stroke', 31),
(251, 'Acute left sided weakness. ?Stroke', 31),
(252, 'Acute left sided weakness. ?Stroke', 31),
(253, 'Acute left sided weakness. ?Stroke', 31),
(254, 'Acute left sided weakness. ?Stroke', 31),
(255, 'Acute left sided weakness. ?Stroke', 31),
(256, 'Acute left sided weakness. ?Stroke', 31),
(257, 'Acute left sided weakness. ?Stroke', 31),
(258, 'Acute left sided weakness. ?Stroke', 31),
(259, 'Acute left sided weakness. ?Stroke', 31),
(260, 'Acute left sided weakness. ?Stroke', 31),
(261, 'Acute left sided weakness. ?Stroke', 31),
(262, 'Acute left sided weakness. ?Stroke', 31),
(263, 'Acute left sided weakness. ?Stroke', 31),
(264, 'Acute left sided weakness. ?Stroke', 31),
(265, 'Acute left sided weakness. ?Stroke', 31),
(266, 'Acute left sided weakness. ?Stroke', 31),
(267, 'Acute left sided weakness. ?Stroke', 31),
(268, 'Acute left sided weakness. ?Stroke', 31),
(269, 'Acute left sided weakness. ?Stroke', 31),
(270, 'Acute left sided weakness. ?Stroke', 31),
(271, 'Acute left sided weakness. ?Stroke', 31),
(272, 'Acute left sided weakness. ?Stroke', 31),
(273, 'Acute left sided weakness. ?Stroke', 31),
(274, 'Acute left sided weakness. ?Stroke', 31),
(275, 'Acute left sided weakness. ?Stroke', 31),
(276, 'Acute left sided weakness. ?Stroke', 31),
(277, 'Acute left sided weakness. ?Stroke', 31),
(278, 'Acute left sided weakness. ?Stroke', 31),
(279, 'Acute left sided weakness. ?Stroke', 31),
(280, 'Acute left sided weakness. ?Stroke', 31),
(281, 'Acute left sided weakness. ?Stroke', 31),
(282, 'Acute left sided weakness. ?Stroke', 31),
(283, '', 34),
(284, 'Acute left sided weakness. ?Stroke', 31),
(285, 'Acute left sided weakness. ?Stroke', 31),
(286, 'Acute left sided weakness. ?Stroke', 31),
(287, 'Acute left sided weakness. ?Stroke', 31),
(288, 'Acute left sided weakness. ?Stroke', 31),
(289, 'Acute left sided weakness. ?Stroke', 31),
(290, '', 34),
(291, 'Acute left sided weakness. ?Stroke', 31),
(292, 'Acute left sided weakness. ?Stroke', 31),
(293, 'Acute left sided weakness. ?Stroke', 31),
(294, '', 34),
(295, 'Acute left sided weakness. ?Stroke', 31),
(296, 'Acute left sided weakness. ?Stroke', 31),
(297, 'Acute left sided weakness. ?Stroke', 31),
(298, '', 34),
(299, 'Acute left sided weakness. ?Stroke', 31),
(300, 'Abdominal pains [right upper]', 36),
(301, 'Abdominal pains [right upper]', 36),
(302, 'Abdominal pains [right upper]', 36),
(303, 'Acute left sided weakness. ?Stroke', 31),
(304, 'Acute left sided weakness. ?Stroke', 31),
(305, '', 34),
(306, '', 34),
(307, '', 34),
(308, '', 34),
(309, '', 34),
(310, '', 34),
(311, '', 34),
(312, 'Acute left sided weakness. ?Stroke', 31),
(313, 'Acute left sided weakness. ?Stroke', 31),
(314, 'Acute left sided weakness. ?Stroke', 31),
(315, 'Acute left sided weakness. ?Stroke', 31),
(316, '', 34),
(317, 'Acute left sided weakness. ?Stroke', 31),
(318, 'Acute left sided weakness. ?Stroke', 31),
(319, 'Acute left sided weakness. ?Stroke', 31),
(320, '', 34),
(321, 'Acute right sided weakness. ? Stroke', 35);

-- --------------------------------------------------------

--
-- Table structure for table `variables_test_units`
--

DROP TABLE IF EXISTS `variables_test_units`;
CREATE TABLE IF NOT EXISTS `variables_test_units` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `test_id` int(255) NOT NULL,
  `name` varchar(150) NOT NULL,
  `sinhala` varchar(150) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=294 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `variables_test_units`
--

INSERT INTO `variables_test_units` (`id`, `test_id`, `name`, `sinhala`) VALUES
(119, 16, 'FBC', 'à·ƒà¶¸à·Šà¶´à·–à¶»à·Šà¶« à¶»à·”à¶°à·’à¶» à¶´à¶»à·“à¶šà·Šà·‚à¶«à¶º'),
(120, 15, 'Leg', 'à¶šà¶šà·”à¶½'),
(121, 15, 'Neck', 'à¶¶à·™à¶½à·Šà¶½'),
(117, 16, 'PCR', 'à¶´à·œà¶½à·’à¶¸à¶»à·šà·ƒà·Š à¶¯à·à¶¸ à¶´à·Šâ€à¶»à¶­à·’à¶šà·Šâ€à¶»à·’à¶ºà·à·€'),
(118, 19, 'test', 'dfg'),
(123, 20, 'FBC', ''),
(124, 20, 'CRP', ''),
(125, 22, 'test', ''),
(130, 33, 'Head', ''),
(199, 31, 'Pelvis', ''),
(198, 31, 'Abdomen', ''),
(131, 33, 'Chest', ''),
(197, 31, 'Head', ''),
(135, 72, 'Vomiting', NULL),
(136, 74, 'Direia', NULL),
(137, 83, '', NULL),
(138, 84, '', NULL),
(144, 130, 'Head', NULL),
(145, 130, 'Head', NULL),
(146, 131, 'Chest', NULL),
(147, 130, 'Head', NULL),
(148, 130, 'Head', NULL),
(149, 130, 'Head', NULL),
(150, 130, 'Head', NULL),
(151, 130, 'Head', NULL),
(152, 130, 'Head', NULL),
(153, 130, 'Head', NULL),
(154, 130, 'Head', NULL),
(155, 130, 'Head', NULL),
(156, 130, 'Head', NULL),
(157, 130, 'Head', NULL),
(158, 130, 'Head', NULL),
(159, 130, 'Head', NULL),
(160, 130, 'Head', NULL),
(161, 130, 'Head', NULL),
(162, 130, 'Head', NULL),
(163, 130, 'Head', NULL),
(164, 127, 'CRP', NULL),
(165, 130, 'Head', NULL),
(166, 130, 'Head', NULL),
(167, 130, 'Head', NULL),
(168, 131, 'Chest', NULL),
(169, 131, 'Chest', NULL),
(170, 131, 'Chest', NULL),
(185, 129, 'UFR', NULL),
(172, 166, 'Vomiting', NULL),
(173, 131, 'Chest', NULL),
(174, 127, 'CRP', NULL),
(175, 128, 'TSH', NULL),
(176, 129, 'UFR', NULL),
(177, 130, 'Head', NULL),
(178, 131, 'Chest', NULL),
(179, 127, 'CRP', NULL),
(180, 128, 'TSH', NULL),
(181, 129, 'UFR', NULL),
(182, 130, 'Head', NULL),
(183, 131, 'Chest', NULL),
(188, 128, 'TSH', NULL),
(189, 129, 'UFR', NULL),
(190, 132, 'CRP', NULL),
(191, 129, 'UFR', NULL),
(192, 128, 'TSH', NULL),
(195, 128, 'TSH', NULL),
(201, 31, 'Chest', ''),
(202, 34, 'FBS', ''),
(203, 34, 'Lipid profile', ''),
(204, 131, 'Chest', NULL),
(205, 202, 'FBS', NULL),
(206, 203, 'Lipid profile', NULL),
(207, 131, 'Chest', NULL),
(208, 202, 'FBS', NULL),
(209, 203, 'Lipid profile', NULL),
(210, 131, 'Chest', NULL),
(211, 202, 'FBS', NULL),
(212, 203, 'Lipid profile', NULL),
(213, 131, 'Chest', NULL),
(214, 202, 'FBS', NULL),
(215, 203, 'Lipid profile', NULL),
(216, 34, 'FBC', ''),
(217, 34, 'TSH', ''),
(218, 34, 'SGPT/OT', ''),
(219, 34, 'HbA1C', ''),
(220, 34, 'CRP', ''),
(221, 35, 'Head', ''),
(222, 31, 'Neck', ''),
(223, 36, 'Abdomen', ''),
(224, 36, 'Thyroid', ''),
(225, 36, 'Scrotum', ''),
(226, 36, 'Bilateral breasts', ''),
(227, 36, 'Venous system both lower limbs', ''),
(228, 36, 'Arterial System both lower limbs', ''),
(229, 36, 'Parotid area [Left]', ''),
(230, 36, 'Parotid area [right]', ''),
(231, 131, 'Chest', NULL),
(232, 202, 'FBS', NULL),
(233, 203, 'Lipid profile', NULL),
(234, 216, 'FBC', NULL),
(235, 217, 'TSH', NULL),
(236, 218, 'SGPT/OT', NULL),
(237, 219, 'HbA1C', NULL),
(238, 131, 'Chest', NULL),
(239, 202, 'FBS', NULL),
(240, 203, 'Lipid profile', NULL),
(241, 216, 'FBC', NULL),
(242, 217, 'TSH', NULL),
(243, 218, 'SGPT/OT', NULL),
(244, 219, 'HbA1C', NULL),
(245, 131, 'Chest', NULL),
(246, 202, 'FBS', NULL),
(247, 203, 'Lipid profile', NULL),
(248, 216, 'FBC', NULL),
(249, 217, 'TSH', NULL),
(250, 218, 'SGPT/OT', NULL),
(251, 219, 'HbA1C', NULL),
(252, 202, 'FBS', NULL),
(253, 203, 'Lipid profile', NULL),
(254, 216, 'FBC', NULL),
(255, 217, 'TSH', NULL),
(256, 219, 'HbA1C', NULL),
(257, 131, 'Chest', NULL),
(258, 202, 'FBS', NULL),
(259, 203, 'Lipid profile', NULL),
(260, 217, 'TSH', NULL),
(261, 219, 'HbA1C', NULL),
(262, 131, 'Chest', NULL),
(263, 202, 'FBS', NULL),
(264, 203, 'Lipid profile', NULL),
(265, 217, 'TSH', NULL),
(266, 219, 'HbA1C', NULL),
(267, 131, 'Chest', NULL),
(268, 202, 'FBS', NULL),
(269, 221, 'Head', NULL),
(270, 131, 'Chest', NULL),
(271, 131, 'Chest', NULL),
(272, 202, 'FBS', NULL),
(273, 221, 'Head', NULL),
(274, 223, 'Abdomen', NULL),
(275, 224, 'Thyroid', NULL),
(276, 225, 'Scrotum', NULL),
(277, 226, 'Bilateral breasts', NULL),
(278, 131, 'Chest', NULL),
(279, 203, 'Lipid profile', NULL),
(280, 131, 'Chest', NULL),
(281, 203, 'Lipid profile', NULL),
(282, 199, 'Pelvis', NULL),
(283, 131, 'Chest', NULL),
(284, 203, 'Lipid profile', NULL),
(285, 131, 'Chest', NULL),
(286, 203, 'Lipid profile', NULL),
(287, 131, 'Chest', NULL),
(288, 203, 'Lipid profile', NULL),
(289, 203, 'Lipid profile', NULL),
(290, 203, 'Lipid profile', NULL),
(291, 31, '', NULL),
(292, 31, '', NULL),
(293, 31, '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `variables_trade_name`
--

DROP TABLE IF EXISTS `variables_trade_name`;
CREATE TABLE IF NOT EXISTS `variables_trade_name` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `sinhala` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=83 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `variables_trade_name`
--

INSERT INTO `variables_trade_name` (`id`, `name`, `sinhala`) VALUES
(25, 'Panadol', NULL),
(12, 'Paracetamol', NULL),
(23, 'Proglutrol', NULL),
(24, 'Furo', NULL),
(26, 'Proglutrol', ''),
(27, 'Diatica', ''),
(28, 'Vilda', ''),
(29, 'Panum', ''),
(30, 'Repace', ''),
(31, 'Pulmocef', ''),
(32, 'Rupa', ''),
(33, 'Prednivex', ''),
(34, 'MTX', NULL),
(35, 'Vexgid', ''),
(36, 'Dulcolax', NULL),
(37, 'Asthalin', ''),
(38, 'Cremaffin', ''),
(39, 'Aciloc', ''),
(40, 'Dormicum', ''),
(41, 'Gabanin', ''),
(42, 'Melot', ''),
(45, 'Veniz', ''),
(44, 'Nexito', ''),
(46, 'Largactil', ''),
(47, 'Stemetil', ''),
(48, 'Fludan ', ''),
(49, 'Stugeron', ''),
(50, 'Theohist', ''),
(51, 'Sandomigran', ''),
(52, 'Duprost', ''),
(53, 'Finast', ''),
(54, 'Tamvic ', ''),
(55, 'Aldactone', ''),
(56, 'Lasix', ''),
(57, 'Ivab', ''),
(58, 'Troken', ''),
(59, 'Ecosprin', ''),
(60, 'GTN', ''),
(61, 'Concor', ''),
(62, 'Buscopan', ''),
(63, 'Dulcolax', ''),
(64, 'Maxepa', ''),
(65, 'Calsof D', ''),
(66, 'Calvit K2', ''),
(67, 'Bonate', ''),
(68, 'Kalzana', ''),
(69, 'Kalzana 500', ''),
(70, 'Softcal', ''),
(71, 'De pluss 1000', ''),
(72, 'De pluss 2000', ''),
(73, 'De pluss 5000', ''),
(81, '', NULL),
(80, '', NULL),
(79, '', NULL),
(82, '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `variables_unit`
--

DROP TABLE IF EXISTS `variables_unit`;
CREATE TABLE IF NOT EXISTS `variables_unit` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `sinhala` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `variables_unit`
--

INSERT INTO `variables_unit` (`id`, `name`, `sinhala`) VALUES
(1, 'g', ''),
(2, 'mg', ''),
(8, 'micg', ''),
(9, 'ml', ''),
(10, 'tablet', ''),
(11, 'Satchet', ''),
(12, 'Teaspoon', ''),
(13, 'Drops', ''),
(14, 'Tablets', NULL),
(15, 'puffs', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
