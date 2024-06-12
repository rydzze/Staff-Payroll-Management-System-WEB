-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2024 at 05:16 PM
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
  `admin_ID` varchar(5) NOT NULL,
  `admin_pwd` varchar(255) NOT NULL,
  `admin_name` varchar(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_ID`, `admin_pwd`, `admin_name`) VALUES
('admin', '1234', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `payroll`
--

CREATE TABLE `payroll` (
  `payroll_ID` varchar(4) NOT NULL,
  `staff_ID` varchar(4) NOT NULL,
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
('P001', 'S001', '2023-05-25', 3000.00, 500.00, 200.00, 300.00, 150.00),
('P002', 'S002', '2023-05-25', 3200.00, 450.00, 250.00, 320.00, 160.00),
('P003', 'S003', '2023-05-25', 2800.00, 480.00, 180.00, 280.00, 140.00),
('P004', 'S004', '2023-05-25', 3500.00, 520.00, 220.00, 350.00, 175.00),
('P005', 'S005', '2023-05-25', 3100.00, 460.00, 240.00, 310.00, 155.00),
('P006', 'S006', '2023-05-25', 3300.00, 470.00, 230.00, 330.00, 165.00),
('P007', 'S007', '2023-05-25', 3400.00, 490.00, 210.00, 340.00, 170.00),
('P008', 'S008', '2023-05-25', 3600.00, 510.00, 260.00, 360.00, 180.00),
('P009', 'S009', '2023-05-25', 3700.00, 530.00, 270.00, 370.00, 185.00),
('P010', 'S010', '2023-05-25', 3800.00, 550.00, 290.00, 380.00, 190.00),
('P011', 'S011', '2023-05-25', 3900.00, 560.00, 300.00, 390.00, 195.00),
('P012', 'S012', '2023-05-25', 4000.00, 570.00, 310.00, 400.00, 200.00),
('P013', 'S013', '2023-05-25', 4100.00, 580.00, 320.00, 410.00, 205.00),
('P014', 'S014', '2023-05-25', 4200.00, 590.00, 330.00, 420.00, 210.00),
('P015', 'S015', '2023-05-25', 4300.00, 600.00, 340.00, 430.00, 215.00),
('P016', 'S016', '2023-05-25', 4400.00, 610.00, 350.00, 440.00, 220.00),
('P017', 'S017', '2023-05-25', 4500.00, 620.00, 360.00, 450.00, 225.00),
('P018', 'S018', '2023-05-25', 4600.00, 630.00, 370.00, 460.00, 230.00),
('P019', 'S019', '2023-05-25', 4700.00, 640.00, 380.00, 470.00, 235.00),
('P020', 'S020', '2023-05-25', 4800.00, 650.00, 390.00, 480.00, 240.00),
('P021', 'S021', '2023-05-25', 4900.00, 660.00, 400.00, 490.00, 245.00),
('P022', 'S022', '2023-05-25', 5000.00, 670.00, 410.00, 500.00, 250.00),
('P023', 'S023', '2023-05-25', 5100.00, 680.00, 420.00, 510.00, 255.00),
('P024', 'S024', '2023-05-25', 5200.00, 690.00, 430.00, 520.00, 260.00),
('P025', 'S025', '2023-05-25', 5300.00, 700.00, 440.00, 530.00, 265.00),
('P026', 'S026', '2023-05-25', 5400.00, 710.00, 450.00, 540.00, 270.00),
('P027', 'S027', '2023-05-25', 5500.00, 720.00, 460.00, 550.00, 275.00),
('P028', 'S028', '2023-05-25', 5600.00, 730.00, 470.00, 560.00, 280.00),
('P029', 'S029', '2023-05-25', 5700.00, 740.00, 480.00, 570.00, 285.00),
('P030', 'S030', '2023-05-25', 5800.00, 750.00, 490.00, 580.00, 290.00);

-- --------------------------------------------------------

--
-- Table structure for table `person`
--

CREATE TABLE `person` (
  `person_IC` varchar(12) NOT NULL,
  `staff_ID` varchar(4) NOT NULL,
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
('000909090123', 'S009', 'George', 'White', 24, '2000-09-09', 'george.white@example.com', '0778899001', '106 Redwood St, City, Country'),
('010101010234', 'S010', 'Hannah', 'Moore', 23, '2001-10-10', 'hannah.moore@example.com', '0889900112', '107 Redwood St, City, Country'),
('200202020202', 'S030', 'Bella', 'Murphy', 24, '2000-02-02', 'bella.murphy@example.com', '0876543212', '127 Oak St, City, Country'),
('800101010101', 'S011', 'Ivy', 'Adams', 43, '1980-01-01', 'ivy.adams@example.com', '0987654321', '108 Elm St, City, Country'),
('820202020202', 'S012', 'Jack', 'Roberts', 42, '1982-02-02', 'jack.roberts@example.com', '0876543210', '109 Oak St, City, Country'),
('830303030303', 'S013', 'Karen', 'Morris', 41, '1983-03-03', 'karen.morris@example.com', '0765432109', '110 Pine St, City, Country'),
('840404040404', 'S014', 'Leo', 'Clark', 40, '1984-04-04', 'leo.clark@example.com', '0654321098', '111 Maple St, City, Country'),
('850505050505', 'S015', 'Mona', 'Lopez', 39, '1985-05-05', 'mona.lopez@example.com', '0543210987', '112 Birch St, City, Country'),
('860606060606', 'S016', 'Nina', 'Hill', 38, '1986-06-06', 'nina.hill@example.com', '0432109876', '113 Cedar St, City, Country'),
('870707070707', 'S017', 'Oscar', 'Green', 37, '1987-07-07', 'oscar.green@example.com', '0321098765', '114 Spruce St, City, Country'),
('880808080808', 'S018', 'Paul', 'King', 36, '1988-08-08', 'paul.king@example.com', '0210987654', '115 Redwood St, City, Country'),
('890909090909', 'S019', 'Quinn', 'Scott', 35, '1989-09-09', 'quinn.scott@example.com', '0109876543', '116 Redwood St, City, Country'),
('900101010101', 'S020', 'Rachel', 'Baker', 34, '1990-01-01', 'rachel.baker@example.com', '0987654322', '117 Elm St, City, Country'),
('900101012345', 'S001', 'John', 'Doe', 34, '1990-01-01', 'john.doe@example.com', '0123456789', '123 Main St, City, Country'),
('910202020202', 'S021', 'Sam', 'Gonzalez', 33, '1991-02-02', 'sam.gonzalez@example.com', '0876543211', '118 Oak St, City, Country'),
('920202023456', 'S002', 'Jane', 'Smith', 32, '1992-02-02', 'jane.smith@example.com', '0987654321', '456 Elm St, City, Country'),
('920303030303', 'S022', 'Tina', 'Carter', 32, '1992-03-03', 'tina.carter@example.com', '0765432110', '119 Pine St, City, Country'),
('930404040404', 'S023', 'Uma', 'Mitchell', 31, '1993-04-04', 'uma.mitchell@example.com', '0654321109', '120 Maple St, City, Country'),
('940303034567', 'S003', 'Alice', 'Brown', 30, '1994-03-03', 'alice.brown@example.com', '0112233445', '789 Pine St, City, Country'),
('940505050505', 'S024', 'Vince', 'Perez', 30, '1994-05-05', 'vince.perez@example.com', '0543211098', '121 Birch St, City, Country'),
('950404045678', 'S004', 'Bob', 'Johnson', 29, '1995-04-04', 'bob.johnson@example.com', '0223344556', '101 Maple St, City, Country'),
('950606060606', 'S025', 'Wendy', 'Roberts', 29, '1995-06-06', 'wendy.roberts@example.com', '0432109987', '122 Cedar St, City, Country'),
('960505056789', 'S005', 'Charlie', 'Williams', 28, '1996-05-05', 'charlie.williams@example.com', '0334455667', '102 Oak St, City, Country'),
('960707070707', 'S026', 'Xander', 'Turner', 28, '1996-07-07', 'xander.turner@example.com', '0321099876', '123 Spruce St, City, Country'),
('970606067890', 'S006', 'David', 'Jones', 27, '1997-06-06', 'david.jones@example.com', '0445566778', '103 Birch St, City, Country'),
('970808080808', 'S027', 'Yara', 'Torres', 27, '1997-08-08', 'yara.torres@example.com', '0210988765', '124 Redwood St, City, Country'),
('980707078901', 'S007', 'Emma', 'Taylor', 26, '1998-07-07', 'emma.taylor@example.com', '0556677889', '104 Cedar St, City, Country'),
('980909090909', 'S028', 'Zack', 'Edwards', 26, '1998-09-09', 'zack.edwards@example.com', '0109877432', '125 Redwood St, City, Country'),
('990101010101', 'S029', 'Aaron', 'Collins', 25, '1999-01-01', 'aaron.collins@example.com', '0987654323', '126 Elm St, City, Country'),
('990808089012', 'S008', 'Fiona', 'Thomas', 25, '1999-08-08', 'fiona.thomas@example.com', '0667788990', '105 Spruce St, City, Country');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staff_ID` varchar(4) NOT NULL,
  `staff_department` varchar(50) NOT NULL,
  `staff_position` varchar(50) NOT NULL,
  `staff_hireddate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_ID`, `staff_department`, `staff_position`, `staff_hireddate`) VALUES
('S001', 'IT', 'Developer', '2020-01-15'),
('S002', 'HR', 'Manager', '2019-03-10'),
('S003', 'Finance', 'Accountant', '2018-07-25'),
('S004', 'IT', 'Specialist', '2021-02-20'),
('S005', 'Sales', 'Representative', '2020-05-30'),
('S006', 'Support', 'Technician', '2019-08-15'),
('S007', 'IT', 'Engineer', '2018-11-10'),
('S008', 'HR', 'Designer', '2021-01-25'),
('S009', 'Legal', 'Advisor', '2020-04-15'),
('S010', 'Operations', 'Operator', '2019-06-10'),
('S011', 'HR', 'Assistant', '2020-07-15'),
('S012', 'IT', 'Analyst', '2019-09-10'),
('S013', 'Finance', 'Clerk', '2018-12-25'),
('S014', 'IT', 'Developer', '2021-04-20'),
('S015', 'Sales', 'Coordinator', '2020-06-30'),
('S016', 'Support', 'Consultant', '2019-10-15'),
('S017', 'IT', 'Architect', '2018-01-10'),
('S018', 'HR', 'Manager', '2021-02-25'),
('S019', 'Legal', 'Paralegal', '2020-03-15'),
('S020', 'Operations', 'Supervisor', '2019-05-10'),
('S021', 'IT', 'Tester', '2020-01-10'),
('S022', 'HR', 'Recruiter', '2019-02-15'),
('S023', 'Finance', 'Auditor', '2018-11-05'),
('S024', 'IT', 'Admin', '2021-08-20'),
('S025', 'Sales', 'Manager', '2020-09-30'),
('S026', 'Support', 'Operator', '2019-11-15'),
('S027', 'IT', 'Support', '2018-02-10'),
('S028', 'HR', 'Specialist', '2021-06-25'),
('S029', 'Legal', 'Lawyer', '2020-12-15'),
('S030', 'Operations', 'Manager', '2019-07-10');

-- --------------------------------------------------------

--
-- Table structure for table `usr`
--

CREATE TABLE `usr` (
  `usr_ID` varchar(5) NOT NULL,
  `staff_ID` varchar(4) NOT NULL,
  `usr_pwd` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usr`
--

INSERT INTO `usr` (`usr_ID`, `staff_ID`, `usr_pwd`) VALUES
('U001', 'S001', 'S001pwd123'),
('U002', 'S002', 'S002pwd456'),
('U003', 'S003', 'S003pwd789'),
('U004', 'S004', 'S004pwd012'),
('U005', 'S005', 'S005pwd345'),
('U006', 'S006', 'S006pwd678'),
('U007', 'S007', 'S007pwd901'),
('U008', 'S008', 'S008pwd234'),
('U009', 'S009', 'S009pwd567'),
('U010', 'S010', 'S010pwd890'),
('U011', 'S011', 'S011pwd321'),
('U012', 'S012', 'S012pwd654'),
('U013', 'S013', 'S013pwd987'),
('U014', 'S014', 'S014pwd210'),
('U015', 'S015', 'S015pwd543'),
('U016', 'S016', 'S016pwd876'),
('U017', 'S017', 'S017pwd109'),
('U018', 'S018', 'S018pwd432'),
('U019', 'S019', 'S019pwd765'),
('U020', 'S020', 'S020pwd098'),
('U021', 'S021', 'S021pwd321'),
('U022', 'S022', 'S022pwd654'),
('U023', 'S023', 'S023pwd987'),
('U024', 'S024', 'S024pwd210'),
('U025', 'S025', 'S025pwd543'),
('U026', 'S026', 'S026pwd876'),
('U027', 'S027', 'S027pwd109'),
('U028', 'S028', 'S028pwd432'),
('U029', 'S029', 'S029pwd765'),
('U030', 'S030', 'S030pwd098');

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
