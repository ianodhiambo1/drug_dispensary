-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 15, 2023 at 04:51 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `matadrugs`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `AdminID` int(11) NOT NULL,
  `UserName` varchar(64) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`AdminID`, `UserName`, `Password`) VALUES
(0, 'admin1', '$2y$10$ZwJ8DyY9x9XFRN1UdOI15eFHVFPJZ5kOX0Y9ZwCM3oWHLIpBMujP6');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `AppointmentID` int(11) NOT NULL,
  `PatientID` int(11) DEFAULT NULL,
  `DoctorID` int(11) DEFAULT NULL,
  `Date` date DEFAULT NULL,
  `Status` varchar(255) DEFAULT NULL,
  `CreatedAt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `CartID` int(11) NOT NULL,
  `PatientID` int(11) DEFAULT NULL,
  `MedicineID` int(11) DEFAULT NULL,
  `Quantity` int(11) DEFAULT NULL,
  `CreatedAt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dispensedmedicine`
--

CREATE TABLE `dispensedmedicine` (
  `DispensedMedicineID` int(11) NOT NULL,
  `InvoiceID` int(11) DEFAULT NULL,
  `MedicineID` int(11) DEFAULT NULL,
  `Quantity` int(11) DEFAULT NULL,
  `CreatedAt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `DoctorID` int(11) NOT NULL,
  `UserName` varchar(64) DEFAULT NULL,
  `FirstName` varchar(64) DEFAULT NULL,
  `LastName` varchar(64) DEFAULT NULL,
  `Speciality` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `InvoiceID` int(11) NOT NULL,
  `PrescriptionID` int(11) DEFAULT NULL,
  `PharmacistID` int(11) DEFAULT NULL,
  `TotalAmount` decimal(10,2) DEFAULT NULL,
  `Status` enum('Paid','Pending','Not Paid') DEFAULT NULL,
  `CreatedAt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE `medicine` (
  `MedicineID` int(11) NOT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Price` decimal(10,2) DEFAULT NULL,
  `Company` varchar(128) DEFAULT NULL,
  `Category` varchar(64) DEFAULT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `ImageUrl` varchar(255) DEFAULT NULL,
  `CreatedAt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `medicine`
--

INSERT INTO `medicine` (`MedicineID`, `Name`, `Price`, `Company`, `Category`, `Description`, `ImageUrl`, `CreatedAt`) VALUES
(3831, 'agfsg', 4453.00, 'sggsfs', 'Vitamins', 'shhsfdshshd', '../uploads/264x264.jpg', '2023-10-15 14:33:34'),
(1046541, 'Fentanyl Citrate Injection 50mcg/mL SDV 5mL 25/Bx ', 555.00, 'Pfizer Injectables ', 'Analgesics', 'Fentanyl Citrate Injection 50mcg/mL SDV 5mL 25/Box ', 'https://www.henryschein.com/Products/1046541_US_front_01_600x600.jpg', '2023-10-15 13:16:58'),
(1048257, 'Nitroglycerin Injection 5mg/mL SDV 10mL 25X10ml ', 123.00, 'American Regent Inc', 'Cardiovasculars', 'Nitroglycerin Injection 5mg/mL SDV 10mL 25X10ml ', 'https://www.henryschein.com/Products/1048257_US_Product_01_600x600.jpg', '2023-10-15 13:16:58'),
(1049941, 'Folic Acid Injection 5mg/mL MDV 10ml/Vl ', 365.00, 'Fresenius Kabi, LLC', 'Vitamins', 'Folic Acid Injection 5mg/mL MDV 10ml/Vl ', 'https://www.henryschein.com/Products/1049941_US_Group_01_600x600.jpg', '2023-10-15 13:16:58'),
(1242699, 'Lisinopril/HCTZ 20mg/25mg 100/Bt ', 897.00, 'Lupin Pharmaceuticals', 'Cardiovasculars', 'Lisinopril/HCTZ Tablets 20mg/25mg Bottle 100/Bottle ', 'https://www.henryschein.com/Products/1242699_US_Front_01_600x600.jpg', '2023-10-15 13:16:58'),
(1253840, 'Meloxicam Tablets 15mg Bottle 100/Bt ', 346.00, 'Cipla USA, Inc', 'Analgesics', 'Meloxicam Tablets 15mg Bottle 100/Bottle ', 'https://www.henryschein.com/Products/1253840_US_Front_01_600x600.jpg', '2023-10-15 13:16:58'),
(1269491, 'Ibuprofen Tablets 400mg Bottle 100/Bt', 234.00, ' Ascend Laboratories LLC', 'Analgesics', 'Ibuprofen Tablets 400mg Bottle 100/Bottle ', 'https://www.henryschein.com/Products/1269491_US_Front_01_600x600.jpg', '2023-10-15 13:16:58'),
(1290556, 'Diclofenac Sodium Delayed-Release Tablets 75mg Bottle 100/Bt', 365.00, 'Carlsbad Technologies Inc', 'Analgesics', 'Diclofenac Sodium Delayed-Release Tablets 75mg Bottle 100/Bottle ', 'https://www.henryschein.com/Products/1290556_US_Front_01_600x600.jpg', '2023-10-15 13:16:58'),
(1293810, 'Cyanocobalamin B-12 Injection 1000mcg/mL MDV 30mL 5/Bx', 537.00, 'Mylan Institutional ', ' Vitamins', 'Cyanocobalamin B-12 Injection 1000mcg/mL MDV 30mL 5/Box ', 'https://www.henryschein.com/Products/1293810_US_front_01_600x600.jpg', '2023-10-15 13:16:58'),
(1387549, 'Prazosin HCl 2mg 100/Bt', 473.00, 'Novitium Pharm', 'Cardiovasculars', 'Prazosin HCl Capsules 2mg Bottle 100/Bottle ', 'https://www.henryschein.com/Products/1387549_US_Front_01_600x600.jpg', '2023-10-15 13:16:58'),
(1410168, 'Nitrostat 0.6mg 100/Bt', 365.00, 'Viatris Specialty LLC ', 'Cardiovasculars', 'Nitrostat Sublingual Tablets 0.6mg Bottle 100/Bottle ', 'https://www.henryschein.com/Products/1410168_US_Group_01_600x600.jpg', '2023-10-15 13:16:58'),
(1436293, 'Ketorolac Injection 30mg/mL SDV 2mL 25/Bx ', 474.00, 'Fosum Pharma USA Inc', ' Analgesics', 'Ketorolac Injection 30mg/mL SDV 2mL 25/Box ', 'https://www.henryschein.com/Products/1436293_US_Front_01_600x600.jpg', '2023-10-15 13:16:58'),
(2369745, 'Lobo', 344.00, 'Lbo', 'Cardiovasculars', 'lobo', '../uploads/', '2023-10-15 14:13:23'),
(2441902, 'Cyanocobalamin B-12 Injection 1000mcg/mL SDV 25x1ml ', 500.00, 'American Regent Inc', 'Vitamins', 'Cyanocobalamin B-12 Injection 1000mcg/mL SDV 25x1ml ', 'https://www.henryschein.com/Products/2441902_US_Product_01_600x600.jpg', '2023-10-15 13:16:58'),
(2770923, 'Indomethacin Capsules 25mg Bottle 100/Bt ', 677.00, 'Glenmark Pharmaceuticals Inc', 'Analgesics', 'Indomethacin Capsules 25mg Bottle 100/Bottle ', 'https://www.henryschein.com/Products/2770923_US_Front_01_600x600.jpg', '2023-10-15 13:16:58'),
(2770932, 'Amoxicillin', 234.00, 'Linos LLC', 'Vitamins', 'Bottle', '../uploads/adheretech_bottle_640.1419978907.jpeg', '2023-10-15 13:16:58');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `PatientID` int(11) NOT NULL,
  `UserName` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `WalletID` int(11) DEFAULT NULL,
  `CreatedAt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patientdetail`
--

CREATE TABLE `patientdetail` (
  `PatientDetailID` int(11) NOT NULL,
  `PatientID` int(11) DEFAULT NULL,
  `FirstName` varchar(255) DEFAULT NULL,
  `LastName` varchar(255) DEFAULT NULL,
  `City` varchar(255) DEFAULT NULL,
  `PostalCode` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pharmacist`
--

CREATE TABLE `pharmacist` (
  `PharmacistID` int(11) NOT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Location` varchar(255) DEFAULT NULL,
  `CreatedAt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `prescription`
--

CREATE TABLE `prescription` (
  `PrescriptionID` int(11) NOT NULL,
  `AppointmentID` int(11) DEFAULT NULL,
  `DoctorID` int(11) DEFAULT NULL,
  `Date` date DEFAULT NULL,
  `Status` enum('Dispensed','Not Dispensed') DEFAULT NULL,
  `CreatedAt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `prescriptionmedicine`
--

CREATE TABLE `prescriptionmedicine` (
  `PrescriptionMedicineID` int(11) NOT NULL,
  `PrescriptionID` int(11) DEFAULT NULL,
  `MedicineID` int(11) DEFAULT NULL,
  `Quantity` int(11) DEFAULT NULL,
  `CreatedAt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `TransactionID` int(11) NOT NULL,
  `WalletID` int(11) DEFAULT NULL,
  `Amount` decimal(10,2) DEFAULT NULL,
  `Date` date DEFAULT NULL,
  `Type` enum('Consultation','Purchase','Deposit') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wallet`
--

CREATE TABLE `wallet` (
  `WalletID` int(11) NOT NULL,
  `Balance` decimal(10,2) DEFAULT NULL,
  `CreatedAt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`AdminID`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`AppointmentID`),
  ADD KEY `PatientID` (`PatientID`),
  ADD KEY `DoctorID` (`DoctorID`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`CartID`),
  ADD KEY `PatientID` (`PatientID`),
  ADD KEY `MedicineID` (`MedicineID`);

--
-- Indexes for table `dispensedmedicine`
--
ALTER TABLE `dispensedmedicine`
  ADD PRIMARY KEY (`DispensedMedicineID`),
  ADD KEY `InvoiceID` (`InvoiceID`),
  ADD KEY `MedicineID` (`MedicineID`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`DoctorID`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`InvoiceID`),
  ADD KEY `PrescriptionID` (`PrescriptionID`),
  ADD KEY `PharmacistID` (`PharmacistID`);

--
-- Indexes for table `medicine`
--
ALTER TABLE `medicine`
  ADD PRIMARY KEY (`MedicineID`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`PatientID`),
  ADD KEY `WalletID` (`WalletID`);

--
-- Indexes for table `patientdetail`
--
ALTER TABLE `patientdetail`
  ADD PRIMARY KEY (`PatientDetailID`),
  ADD KEY `PatientID` (`PatientID`);

--
-- Indexes for table `pharmacist`
--
ALTER TABLE `pharmacist`
  ADD PRIMARY KEY (`PharmacistID`);

--
-- Indexes for table `prescription`
--
ALTER TABLE `prescription`
  ADD PRIMARY KEY (`PrescriptionID`),
  ADD KEY `AppointmentID` (`AppointmentID`),
  ADD KEY `DoctorID` (`DoctorID`);

--
-- Indexes for table `prescriptionmedicine`
--
ALTER TABLE `prescriptionmedicine`
  ADD PRIMARY KEY (`PrescriptionMedicineID`),
  ADD KEY `PrescriptionID` (`PrescriptionID`),
  ADD KEY `MedicineID` (`MedicineID`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`TransactionID`),
  ADD KEY `WalletID` (`WalletID`);

--
-- Indexes for table `wallet`
--
ALTER TABLE `wallet`
  ADD PRIMARY KEY (`WalletID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `appointment_ibfk_1` FOREIGN KEY (`PatientID`) REFERENCES `patient` (`PatientID`),
  ADD CONSTRAINT `appointment_ibfk_2` FOREIGN KEY (`DoctorID`) REFERENCES `doctor` (`DoctorID`);

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`PatientID`) REFERENCES `patient` (`PatientID`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`MedicineID`) REFERENCES `medicine` (`MedicineID`);

--
-- Constraints for table `dispensedmedicine`
--
ALTER TABLE `dispensedmedicine`
  ADD CONSTRAINT `dispensedmedicine_ibfk_1` FOREIGN KEY (`InvoiceID`) REFERENCES `invoice` (`InvoiceID`),
  ADD CONSTRAINT `dispensedmedicine_ibfk_2` FOREIGN KEY (`MedicineID`) REFERENCES `medicine` (`MedicineID`);

--
-- Constraints for table `invoice`
--
ALTER TABLE `invoice`
  ADD CONSTRAINT `invoice_ibfk_1` FOREIGN KEY (`PrescriptionID`) REFERENCES `prescription` (`PrescriptionID`),
  ADD CONSTRAINT `invoice_ibfk_2` FOREIGN KEY (`PharmacistID`) REFERENCES `pharmacist` (`PharmacistID`);

--
-- Constraints for table `patient`
--
ALTER TABLE `patient`
  ADD CONSTRAINT `patient_ibfk_1` FOREIGN KEY (`WalletID`) REFERENCES `wallet` (`WalletID`);

--
-- Constraints for table `patientdetail`
--
ALTER TABLE `patientdetail`
  ADD CONSTRAINT `patientdetail_ibfk_1` FOREIGN KEY (`PatientID`) REFERENCES `patient` (`PatientID`);

--
-- Constraints for table `prescription`
--
ALTER TABLE `prescription`
  ADD CONSTRAINT `prescription_ibfk_1` FOREIGN KEY (`AppointmentID`) REFERENCES `appointment` (`AppointmentID`),
  ADD CONSTRAINT `prescription_ibfk_2` FOREIGN KEY (`DoctorID`) REFERENCES `doctor` (`DoctorID`);

--
-- Constraints for table `prescriptionmedicine`
--
ALTER TABLE `prescriptionmedicine`
  ADD CONSTRAINT `prescriptionmedicine_ibfk_1` FOREIGN KEY (`PrescriptionID`) REFERENCES `prescription` (`PrescriptionID`),
  ADD CONSTRAINT `prescriptionmedicine_ibfk_2` FOREIGN KEY (`MedicineID`) REFERENCES `medicine` (`MedicineID`);

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`WalletID`) REFERENCES `wallet` (`WalletID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
