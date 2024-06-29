-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 29, 2024 at 04:30 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_ID` varchar(4) NOT NULL,
  `admin_pwd` varchar(255) NOT NULL,
  `admin_name` varchar(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_ID`, `admin_pwd`, `admin_name`) VALUES
('A001', '1337', 'r00t'),
('A002', '1234', '4dm1n');

-- --------------------------------------------------------

--
-- Table structure for table `payroll`
--

CREATE TABLE `payroll` (
  `payroll_ID` int(11) NOT NULL,
  `staff_ID` int(7) NOT NULL,
  `payroll_date` date NOT NULL,
  `payroll_basicsalary` float(7,2) NOT NULL,
  `payroll_allowancepay` float(7,2) NOT NULL,
  `payroll_overtimepay` float(7,2) NOT NULL,
  `payroll_EPF` float(7,2) NOT NULL,
  `payroll_SOCSO` float(7,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payroll`
--

INSERT INTO `payroll` (`payroll_ID`, `staff_ID`, `payroll_date`, `payroll_basicsalary`, `payroll_allowancepay`, `payroll_overtimepay`, `payroll_EPF`, `payroll_SOCSO`) VALUES
(1, 1, '2024-06-29', 3000.00, 500.00, 200.00, 300.00, 150.00),
(2, 2, '2024-06-29', 3200.00, 450.00, 250.00, 320.00, 160.00),
(3, 3, '2024-06-29', 2800.00, 480.00, 180.00, 280.00, 140.00),
(4, 4, '2024-06-29', 3500.00, 520.00, 220.00, 350.00, 175.00),
(5, 5, '2024-06-29', 3100.00, 460.00, 240.00, 310.00, 155.00),
(6, 6, '2024-06-29', 3300.00, 470.00, 230.00, 330.00, 165.00),
(7, 7, '2024-06-29', 3400.00, 490.00, 210.00, 340.00, 170.00),
(8, 8, '2024-06-29', 3600.00, 510.00, 260.00, 360.00, 180.00),
(9, 9, '2024-06-29', 3700.00, 530.00, 270.00, 370.00, 185.00),
(10, 10, '2024-06-29', 3800.00, 550.00, 290.00, 380.00, 190.00),
(11, 11, '2024-06-29', 3900.00, 560.00, 300.00, 390.00, 195.00),
(12, 12, '2024-06-29', 4000.00, 570.00, 310.00, 400.00, 200.00),
(13, 13, '2024-06-29', 4100.00, 580.00, 320.00, 410.00, 205.00),
(14, 14, '2024-06-29', 4200.00, 590.00, 330.00, 420.00, 210.00),
(15, 15, '2024-06-29', 4300.00, 600.00, 340.00, 430.00, 215.00),
(16, 16, '2024-06-29', 4400.00, 610.00, 350.00, 440.00, 220.00),
(17, 17, '2024-06-29', 4500.00, 620.00, 360.00, 450.00, 225.00),
(18, 18, '2024-06-29', 4600.00, 630.00, 370.00, 460.00, 230.00),
(19, 19, '2024-06-29', 4700.00, 640.00, 380.00, 470.00, 235.00),
(20, 20, '2024-06-29', 4800.00, 650.00, 390.00, 480.00, 240.00),
(21, 21, '2024-06-29', 4900.00, 660.00, 400.00, 490.00, 245.00),
(22, 22, '2024-06-29', 5000.00, 670.00, 410.00, 500.00, 250.00),
(23, 23, '2024-06-29', 5100.00, 680.00, 420.00, 510.00, 255.00),
(24, 24, '2024-06-29', 5200.00, 690.00, 430.00, 520.00, 260.00),
(25, 25, '2024-06-29', 5300.00, 700.00, 440.00, 530.00, 265.00),
(26, 26, '2024-06-29', 5400.00, 710.00, 450.00, 540.00, 270.00),
(27, 27, '2024-06-29', 5500.00, 720.00, 460.00, 550.00, 275.00),
(28, 28, '2024-06-29', 5600.00, 730.00, 470.00, 560.00, 280.00),
(29, 29, '2024-06-29', 5700.00, 740.00, 480.00, 570.00, 285.00),
(30, 30, '2024-06-29', 5800.00, 750.00, 490.00, 580.00, 290.00);

-- --------------------------------------------------------

--
-- Table structure for table `person`
--

CREATE TABLE `person` (
  `person_IC` varchar(12) NOT NULL,
  `staff_ID` int(7) NOT NULL,
  `person_fname` varchar(50) NOT NULL,
  `person_lname` varchar(50) NOT NULL,
  `person_age` int(11) NOT NULL,
  `person_birthdate` date NOT NULL,
  `person_email` varchar(75) NOT NULL,
  `person_phonenum` varchar(15) NOT NULL,
  `person_homeaddr` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `person`
--

INSERT INTO `person` (`person_IC`, `staff_ID`, `person_fname`, `person_lname`, `person_age`, `person_birthdate`, `person_email`, `person_phonenum`, `person_homeaddr`) VALUES
('000909090123', 1, 'George', 'White', 24, '2000-09-09', 'george.white@spms.com', '0778899001', '106 Redwood St, City, Country'),
('010101010234', 2, 'Hannah', 'Moore', 23, '2001-10-10', 'hannah.moore@spms.com', '0889900112', '107 Redwood St, City, Country'),
('200202020202', 3, 'Bella', 'Murphy', 24, '2000-02-02', 'bella.murphy@spms.com', '0876543212', '127 Oak St, City, Country'),
('800101010101', 4, 'Ivy', 'Adams', 43, '1980-01-01', 'ivy.adams@spms.com', '0987654321', '108 Elm St, City, Country'),
('820202020202', 5, 'Jack', 'Roberts', 42, '1982-02-02', 'jack.roberts@spms.com', '0876543210', '109 Oak St, City, Country'),
('830303030303', 6, 'Karen', 'Morris', 41, '1983-03-03', 'karen.morris@spms.com', '0765432109', '110 Pine St, City, Country'),
('840404040404', 7, 'Leo', 'Clark', 40, '1984-04-04', 'leo.clark@spms.com', '0654321098', '111 Maple St, City, Country'),
('850505050505', 8, 'Mona', 'Lopez', 39, '1985-05-05', 'mona.lopez@spms.com', '0543210987', '112 Birch St, City, Country'),
('860606060606', 9, 'Nina', 'Hill', 38, '1986-06-06', 'nina.hill@spms.com', '0432109876', '113 Cedar St, City, Country'),
('870707070707', 10, 'Oscar', 'Green', 37, '1987-07-07', 'oscar.green@spms.com', '0321098765', '114 Spruce St, City, Country'),
('880808080808', 11, 'Paul', 'King', 36, '1988-08-08', 'paul.king@spms.com', '0210987654', '115 Redwood St, City, Country'),
('890909090909', 12, 'Quinn', 'Scott', 35, '1989-09-09', 'quinn.scott@spms.com', '0109876543', '116 Redwood St, City, Country'),
('900101010101', 13, 'Rachel', 'Baker', 34, '1990-01-01', 'rachel.baker@spms.com', '0987654322', '117 Elm St, City, Country'),
('900101012345', 14, 'John', 'Doe', 34, '1990-01-01', 'john.doe@spms.com', '0123456789', '123 Main St, City, Country'),
('910202020202', 15, 'Sam', 'Gonzalez', 33, '1991-02-02', 'sam.gonzalez@spms.com', '0876543211', '118 Oak St, City, Country'),
('920202023456', 16, 'Jane', 'Smith', 32, '1992-02-02', 'jane.smith@spms.com', '0987654321', '456 Elm St, City, Country'),
('920303030303', 17, 'Tina', 'Carter', 32, '1992-03-03', 'tina.carter@spms.com', '0765432110', '119 Pine St, City, Country'),
('930404040404', 18, 'Uma', 'Mitchell', 31, '1993-04-04', 'uma.mitchell@spms.com', '0654321109', '120 Maple St, City, Country'),
('940303034567', 19, 'Alice', 'Brown', 30, '1994-03-03', 'alice.brown@spms.com', '0112233445', '789 Pine St, City, Country'),
('940505050505', 20, 'Vince', 'Perez', 30, '1994-05-05', 'vince.perez@spms.com', '0543211098', '121 Birch St, City, Country'),
('950404045678', 21, 'Bob', 'Johnson', 29, '1995-04-04', 'bob.johnson@spms.com', '0223344556', '101 Maple St, City, Country'),
('950606060606', 22, 'Wendy', 'Roberts', 29, '1995-06-06', 'wendy.roberts@spms.com', '0432109987', '122 Cedar St, City, Country'),
('960505056789', 23, 'Charlie', 'Williams', 28, '1996-05-05', 'charlie.williams@spms.com', '0334455667', '102 Oak St, City, Country'),
('960707070707', 24, 'Xander', 'Turner', 28, '1996-07-07', 'xander.turner@spms.com', '0321099876', '123 Spruce St, City, Country'),
('970606067890', 25, 'David', 'Jones', 27, '1997-06-06', 'david.jones@spms.com', '0445566778', '103 Birch St, City, Country'),
('970808080808', 26, 'Yara', 'Torres', 27, '1997-08-08', 'yara.torres@spms.com', '0210988765', '124 Redwood St, City, Country'),
('980707078901', 27, 'Emma', 'Taylor', 26, '1998-07-07', 'emma.taylor@spms.com', '0556677889', '104 Cedar St, City, Country'),
('980909090909', 28, 'Zack', 'Edwards', 26, '1998-09-09', 'zack.edwards@spms.com', '0109877432', '125 Redwood St, City, Country'),
('990101010101', 29, 'Aaron', 'Collins', 25, '1999-01-01', 'aaron.collins@spms.com', '0987654323', '126 Elm St, City, Country'),
('990808089012', 30, 'Fiona', 'Thomas', 25, '1999-08-08', 'fiona.thomas@spms.com', '0667788990', '105 Spruce St, City, Country');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staff_ID` int(11) NOT NULL,
  `staff_department` varchar(50) NOT NULL,
  `staff_position` varchar(50) NOT NULL,
  `staff_hireddate` date NOT NULL,
  `staff_status` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_ID`, `staff_department`, `staff_position`, `staff_hireddate`, `staff_status`) VALUES
(1, 'IT', 'Developer', '2020-01-15', b'1'),
(2, 'HR', 'Manager', '2019-03-10', b'1'),
(3, 'Finance', 'Accountant', '2018-07-25', b'1'),
(4, 'IT', 'Specialist', '2021-02-20', b'1'),
(5, 'Sales', 'Representative', '2020-05-30', b'1'),
(6, 'Support', 'Technician', '2019-08-15', b'1'),
(7, 'IT', 'Engineer', '2018-11-10', b'1'),
(8, 'HR', 'Designer', '2021-01-25', b'1'),
(9, 'Legal', 'Advisor', '2020-04-15', b'1'),
(10, 'Operations', 'Operator', '2019-06-10', b'1'),
(11, 'HR', 'Assistant', '2020-07-15', b'1'),
(12, 'IT', 'Analyst', '2019-09-10', b'1'),
(13, 'Finance', 'Clerk', '2018-12-25', b'1'),
(14, 'IT', 'Developer', '2021-04-20', b'1'),
(15, 'Sales', 'Coordinator', '2020-06-30', b'1'),
(16, 'Support', 'Consultant', '2019-10-15', b'1'),
(17, 'IT', 'Architect', '2018-01-10', b'1'),
(18, 'HR', 'Manager', '2021-02-25', b'1'),
(19, 'Legal', 'Paralegal', '2020-03-15', b'1'),
(20, 'Operations', 'Supervisor', '2019-05-10', b'1'),
(21, 'IT', 'Tester', '2020-01-10', b'1'),
(22, 'HR', 'Recruiter', '2019-02-15', b'1'),
(23, 'Finance', 'Auditor', '2018-11-05', b'1'),
(24, 'IT', 'Admin', '2021-08-20', b'1'),
(25, 'Sales', 'Manager', '2020-09-30', b'1'),
(26, 'Support', 'Operator', '2019-11-15', b'1'),
(27, 'IT', 'Support', '2018-02-10', b'1'),
(28, 'HR', 'Specialist', '2021-06-25', b'1'),
(29, 'Legal', 'Lawyer', '2020-12-15', b'1'),
(30, 'Operations', 'Manager', '2019-07-10', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `usr`
--

CREATE TABLE `usr` (
  `usr_ID` varchar(5) NOT NULL,
  `staff_ID` int(7) NOT NULL,
  `usr_pwd` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usr`
--

INSERT INTO `usr` (`usr_ID`, `staff_ID`, `usr_pwd`) VALUES
('U001', 1, '01pwd123'),
('U002', 2, '02pwd456'),
('U003', 3, '03pwd789'),
('U004', 4, '04pwd012'),
('U005', 5, '05pwd345'),
('U006', 6, '06pwd678'),
('U007', 7, '07pwd901'),
('U008', 8, '08pwd234'),
('U009', 9, '09pwd567'),
('U010', 10, '10pwd890'),
('U011', 11, '11pwd321'),
('U012', 12, '12pwd654'),
('U013', 13, '13pwd987'),
('U014', 14, '14pwd210'),
('U015', 15, '15pwd543'),
('U016', 16, '16pwd876'),
('U017', 17, '17pwd109'),
('U018', 18, '18pwd432'),
('U019', 19, '19pwd765'),
('U020', 20, '20pwd098'),
('U021', 21, '21pwd321'),
('U022', 22, '22pwd654'),
('U023', 23, '23pwd987'),
('U024', 24, '24pwd210'),
('U025', 25, '25pwd543'),
('U026', 26, '26pwd876'),
('U027', 27, '27pwd109'),
('U028', 28, '28pwd432'),
('U029', 29, '29pwd765'),
('U030', 30, '30pwd098');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_ID`);

--
-- Indexes for table `payroll`
--
ALTER TABLE `payroll`
  ADD PRIMARY KEY (`payroll_ID`),
  ADD KEY `staff_ID_payroll` (`staff_ID`);

--
-- Indexes for table `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`person_IC`),
  ADD KEY `staff_ID_person` (`staff_ID`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_ID`);

--
-- Indexes for table `usr`
--
ALTER TABLE `usr`
  ADD PRIMARY KEY (`usr_ID`),
  ADD KEY `staff_ID_usr` (`staff_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `payroll`
--
ALTER TABLE `payroll`
  MODIFY `payroll_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staff_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `payroll`
--
ALTER TABLE `payroll`
  ADD CONSTRAINT `staff_ID_payroll` FOREIGN KEY (`staff_ID`) REFERENCES `staff` (`staff_ID`);

--
-- Constraints for table `person`
--
ALTER TABLE `person`
  ADD CONSTRAINT `staff_ID_person` FOREIGN KEY (`staff_ID`) REFERENCES `staff` (`staff_ID`);

--
-- Constraints for table `usr`
--
ALTER TABLE `usr`
  ADD CONSTRAINT `staff_ID_usr` FOREIGN KEY (`staff_ID`) REFERENCES `staff` (`staff_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
