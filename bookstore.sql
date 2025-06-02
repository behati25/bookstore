-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2025 at 06:41 AM
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
-- Database: `bookstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `book_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `genre` varchar(100) DEFAULT NULL,
  `price` decimal(6,2) NOT NULL,
  `stock` int(11) DEFAULT 0,
  `published_date` date DEFAULT NULL,
  `discount_price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`book_id`, `title`, `author`, `genre`, `price`, `stock`, `published_date`, `discount_price`) VALUES
(1, 'The Bad Boy\'s Girl', 'Blair Holden', 'Romance', 349.00, 70, '2014-02-01', 299.00),
(2, 'She\'s With Me', 'Jessica Cunsolo', 'Romance', 399.00, 72, '2019-01-01', 349.00),
(3, 'The Cell Phone Swap', 'Lindsey Summers', 'Young Adult', 375.00, 68, '2016-01-01', 320.00),
(4, 'Fourth Wing', 'Rebecca Yarros', 'Fantasy', 895.00, 66, '2023-05-02', 479.00),
(5, 'The Women', 'Kristin Hannah', 'Historical Fiction', 899.00, 65, '2024-02-06', NULL),
(6, 'The Heaven & Earth Grocery Store', 'James McBride', 'Literary Fiction', 799.00, 67, '2023-08-08', NULL),
(7, 'The Ballad of Songbirds and Snakes', 'Suzanne Collins', 'Dystopian', 549.00, 71, '2020-05-19', 429.00),
(8, 'Verity', 'Colleen Hoover', 'Thriller', 499.00, 74, '2018-10-26', 450.00),
(9, 'It Ends with Us', 'Colleen Hoover', 'Romance', 459.00, 80, '2016-02-09', 400.00),
(10, 'The Silent Patient', 'Alex Michaelides', 'Thriller', 525.00, 69, '2019-02-05', NULL),
(11, 'The Seven Husbands of Evelyn Hugo', 'Taylor Jenkins Reid', 'Historical Fiction', 489.00, 68, '2017-06-13', NULL),
(12, 'Where the Crawdads Sing', 'Delia Owens', 'Mystery', 479.00, 70, '2018-08-14', NULL),
(13, 'The Night Circus', 'Erin Morgenstern', 'Fantasy', 519.00, 66, '2011-09-13', NULL),
(14, 'The Midnight Library', 'Matt Haig', 'Fiction', 499.00, 72, '2020-08-13', NULL),
(15, 'Daisy Jones & The Six', 'Taylor Jenkins Reid', 'Fiction', 475.00, 67, '2019-03-05', NULL),
(16, 'A Court of Thorns and Roses', 'Sarah J. Maas', 'Fantasy', 699.00, 69, '2015-05-05', NULL),
(17, 'Throne of Glass', 'Sarah J. Maas', 'Fantasy', 655.00, 65, '2012-08-02', NULL),
(18, 'Crescent City', 'Sarah J. Maas', 'Fantasy', 850.00, 64, '2020-03-03', NULL),
(19, 'The Song of Achilles', 'Madeline Miller', 'Historical Fiction', 545.00, 66, '2011-09-20', NULL),
(20, 'Circe', 'Madeline Miller', 'Fantasy', 535.00, 66, '2018-04-10', NULL),
(21, 'Atomic Habits', 'James Clear', 'Self-Help', 499.00, 75, '2018-10-16', NULL),
(22, 'Outlive', 'Peter Attia', 'Health', 659.00, 68, '2023-03-28', NULL),
(23, 'The Creative Act: A Way of Being', 'Rick Rubin', 'Creativity', 749.00, 65, '2023-01-17', NULL),
(24, 'Can’t Hurt Me', 'David Goggins', 'Memoir', 599.00, 67, '2018-11-13', NULL),
(25, 'Greenlights', 'Matthew McConaughey', 'Memoir', 599.00, 66, '2020-10-20', NULL),
(26, 'The 5th Wave', 'Rick Yancey', 'Science Fiction', 465.00, 70, '2013-05-07', NULL),
(27, 'Anxious People', 'Fredrik Backman', 'Fiction', 489.00, 67, '2019-04-25', NULL),
(28, 'The Inheritance Games', 'Jennifer Lynn Barnes', 'Mystery', 479.00, 69, '2020-09-01', NULL),
(29, 'We Were Liars', 'E. Lockhart', 'Young Adult', 399.00, 73, '2014-05-13', NULL),
(30, 'The House in the Cerulean Sea', 'TJ Klune', 'Fantasy', 529.00, 68, '2020-03-17', NULL),
(31, 'Under the Whispering Door', 'TJ Klune', 'Fantasy', 549.00, 65, '2021-09-21', NULL),
(32, 'Remarkably Bright Creatures', 'Shelby Van Pelt', 'Fiction', 615.00, 66, '2022-05-03', NULL),
(33, 'Lessons in Chemistry', 'Bonnie Garmus', 'Fiction', 575.00, 69, '2022-04-05', NULL),
(34, 'Eleanor Oliphant Is Completely Fine', 'Gail Honeyman', 'Fiction', 489.00, 66, '2017-05-18', NULL),
(35, 'Before the Coffee Gets Cold', 'Toshikazu Kawaguchi', 'Fantasy', 465.00, 65, '2015-12-25', NULL),
(36, 'Tomorrow, and Tomorrow, and Tomorrow', 'Gabrielle Zevin', 'Fiction', 569.00, 67, '2022-07-05', NULL),
(37, 'The Paper Palace', 'Miranda Cowley Heller', 'Fiction', 549.00, 64, '2021-07-06', NULL),
(38, 'The Atlas Six', 'Olivie Blake', 'Fantasy', 645.00, 65, '2022-03-01', NULL),
(39, 'One Italian Summer', 'Rebecca Serle', 'Romance', 479.00, 67, '2022-03-01', NULL),
(40, 'Malibu Rising', 'Taylor Jenkins Reid', 'Fiction', 499.00, 66, '2021-06-01', NULL),
(41, 'The Love Hypothesis', 'Ali Hazelwood', 'Romance', 489.00, 72, '2021-09-14', NULL),
(42, 'Book Lovers', 'Emily Henry', 'Romance', 515.00, 71, '2022-05-03', NULL),
(43, 'People We Meet on Vacation', 'Emily Henry', 'Romance', 509.00, 70, '2021-05-11', NULL),
(44, 'Beach Read', 'Emily Henry', 'Romance', 495.00, 69, '2020-05-19', NULL),
(45, 'The Paris Library', 'Janet Skeslien Charles', 'Historical Fiction', 565.00, 66, '2021-02-09', NULL),
(46, 'The Last Thing He Told Me', 'Laura Dave', 'Thriller', 525.00, 65, '2021-05-04', NULL),
(47, 'The Giver of Stars', 'Jojo Moyes', 'Historical Fiction', 599.00, 68, '2019-10-08', NULL),
(48, 'The Nightingale', 'Kristin Hannah', 'Historical Fiction', 699.00, 67, '2015-02-03', NULL),
(49, 'Small Great Things', 'Jodi Picoult', 'Drama', 579.00, 66, '2016-10-11', NULL),
(50, 'Wish You Were Here', 'Jodi Picoult', 'Drama', 559.00, 65, '2021-11-30', NULL),
(51, 'Onyx Storm', 'Rebecca Yarros', 'Fantasy', 895.00, 70, '2024-01-15', NULL),
(52, 'Everything Is Tuberculosis', 'John Green', 'Fiction', 799.00, 68, '2024-02-10', NULL),
(53, 'Careless People', 'Sarah Wynn-Williams', 'Literary Fiction', 749.00, 72, '2024-03-05', NULL),
(54, 'The Housemaid', 'Freida McFadden', 'Thriller', 699.00, 75, '2024-04-20', NULL),
(55, 'The Let Them Theory', 'Mel Robbins', 'Self-Help', 599.00, 69, '2024-05-18', NULL),
(56, 'Wings of Starlight', 'Allison Saft', 'Fantasy', 799.00, 67, '2024-06-12', NULL),
(57, 'James', 'Percival Everett', 'Historical Fiction', 849.00, 66, '2024-07-08', NULL),
(58, 'The House of My Mother', 'Shari Franke', 'Memoir', 699.00, 70, '2024-08-22', NULL),
(59, 'Broken Country', 'Clare Leslie Hall', 'Fiction', 749.00, 68, '2024-09-14', NULL),
(60, 'All Fours', 'Miranda July', 'Fiction', 799.00, 65, '2024-10-01', NULL),
(61, 'Good Material', 'Dolly Alderton', 'Romance', 699.00, 69, '2024-11-05', NULL),
(62, 'Martyr!', 'Kaveh Akbar', 'Fiction', 749.00, 67, '2024-12-10', NULL),
(63, 'You Dreamed of Empires', 'Álvaro Enrigue', 'Historical Fiction', 799.00, 66, '2024-12-20', NULL),
(64, 'Cold Crematorium', 'József Debreczeni', 'Non-Fiction', 699.00, 68, '2024-12-25', NULL),
(65, 'Everyone Who Is Gone Is Here', 'Jonathan Blitzer', 'Non-Fiction', 749.00, 70, '2024-12-30', NULL),
(66, 'I Heard Her Call My Name', 'Lucy Sante', 'Memoir', 699.00, 67, '2024-12-31', NULL),
(67, 'Reagan: His Life and Legend', 'Max Boot', 'Biography', 799.00, 65, '2024-12-31', NULL),
(68, 'The Bright Sword', 'Lev Grossman', 'Fantasy', 849.00, 66, '2024-12-31', NULL),
(69, 'The Coin', 'Yasmin Zaher', 'Fiction', 699.00, 69, '2024-12-31', NULL),
(70, 'Colored Television', 'Danzy Senna', 'Fiction', 749.00, 68, '2024-12-31', NULL),
(71, 'The Ravels', 'JosevfTheGreat', 'Young Adult', 399.00, 72, '2024-01-10', NULL),
(72, 'Knock, Knock, Professor', 'Irshwndy', 'Romance', 349.00, 75, '2024-02-14', NULL),
(73, 'Tears of Love', 'MsKindGirl', 'Drama', 379.00, 70, '2024-03-20', NULL),
(74, 'Irrefutably Yours', 'Beeyotch', 'Romance', 359.00, 68, '2024-04-25', NULL),
(75, 'Harmless Like You', 'justcallmecai', 'Fiction', 399.00, 67, '2024-05-30', NULL),
(76, 'Bad For You', 'justcallmecai', 'Romance', 389.00, 69, '2024-06-15', NULL),
(77, 'Triple Point', 'laurendoubleu', 'Science Fiction', 429.00, 66, '2024-07-20', NULL),
(78, 'The Twin Paradox', 'Ink3dverse', 'Horror', 449.00, 65, '2024-08-25', NULL),
(79, 'Anachronistic', 'Scarlett_Fox', 'Fantasy', 469.00, 67, '2024-09-30', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `book_title` varchar(255) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `unit_price` decimal(10,2) DEFAULT NULL,
  `total_price` decimal(10,2) DEFAULT NULL,
  `sale_date` date DEFAULT NULL,
  `customer_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `payment_method` varchar(50) DEFAULT NULL,
  `notes` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `book_title`, `quantity`, `unit_price`, `total_price`, `sale_date`, `customer_name`, `email`, `payment_method`, `notes`) VALUES
(1, 'The Bad Boy\'s Girl', 2, 349.00, 698.00, '2024-01-05', 'Juan Dela Cruz', 'juandelacruz@gmail.com', 'GCash', 'Rush order'),
(2, 'She\'s With Me', 1, 399.00, 399.00, '2024-06-06', 'Gwen Sarmiento', 'gwensarmiento@gmail.com', 'Maya', 'For delivery'),
(3, 'The Cell Phone Swap', 3, 375.00, 1125.00, '2024-02-10', 'Mark Reyes', 'markreyes@gmail.com', 'Cash', NULL),
(4, 'Fourth Wing', 1, 895.00, 895.00, '2024-03-15', 'Liza Santos', 'lizasantos@gmail.com', 'GCash', NULL),
(5, 'The Women', 2, 899.00, 1798.00, '2024-04-20', 'Anna Gonzales', 'annagonzales@gmail.com', 'Maya', 'Gift'),
(6, 'The Heaven & Earth Grocery Store', 1, 799.00, 799.00, '2024-01-23', 'Ricky Morales', 'rickymorales@gmail.com', 'Cash', NULL),
(7, 'The Ballad of Songbirds and Snakes', 2, 549.00, 1098.00, '2024-05-19', 'Cheska Pineda', 'cheskapineda@gmail.com', 'GCash', NULL),
(8, 'Verity', 1, 499.00, 499.00, '2024-02-25', 'Paolo Tan', 'paolotan@gmail.com', 'Maya', 'Bulk buyer'),
(9, 'It Ends with Us', 3, 459.00, 1377.00, '2024-03-30', 'Nina Ramos', 'ninaramos@gmail.com', 'Cash', NULL),
(10, 'The Silent Patient', 1, 525.00, 525.00, '2024-04-05', 'Ronnie Dela Peña', 'ronniedelapena@gmail.com', 'GCash', NULL),
(11, 'The Seven Husbands of Evelyn Hugo', 1, 489.00, 489.00, '2024-05-10', 'Tina Lopez', 'tinalopez@gmail.com', 'Maya', 'Repeat customer'),
(12, 'Where the Crawdads Sing', 1, 479.00, 479.00, '2024-06-12', 'Jerome Navarro', 'jeromenavarro@gmail.com', 'Cash', NULL),
(13, 'The Night Circus', 2, 519.00, 1038.00, '2024-07-01', 'Maricar Gutierrez', 'maricargutierrez@gmail.com', 'GCash', NULL),
(14, 'The Midnight Library', 1, 499.00, 499.00, '2024-08-03', 'Edward Cruz', 'edwardcruz@gmail.com', 'Maya', 'Pickup'),
(15, 'Daisy Jones & The Six', 1, 475.00, 475.00, '2024-09-14', 'Louie Mendoza', 'louiemendoza@gmail.com', 'Cash', NULL),
(16, 'A Court of Thorns and Roses', 1, 699.00, 699.00, '2024-10-11', 'Bianca Castro', 'biancacastro@gmail.com', 'GCash', NULL),
(17, 'Throne of Glass', 1, 655.00, 655.00, '2024-11-08', 'Jasper Agbayani', 'jasperagbayani@gmail.com', 'Maya', NULL),
(18, 'Crescent City', 2, 850.00, 1700.00, '2024-12-01', 'Mara Javier', 'marajavier@gmail.com', 'Cash', 'Hardbound'),
(19, 'The Song of Achilles', 1, 545.00, 545.00, '2024-02-06', 'Daniela Marquez', 'danielamarquez@gmail.com', 'GCash', NULL),
(20, 'Circe', 1, 535.00, 535.00, '2024-01-09', 'Kevin Lim', 'kevinlim@gmail.com', 'Maya', NULL),
(21, 'Atomic Habits', 2, 499.00, 998.00, '2024-03-15', 'Ella Domingo', 'elladomingo@gmail.com', 'Cash', 'Company bulk order'),
(22, 'Outlive', 1, 659.00, 659.00, '2024-04-20', 'Gemma Salazar', 'gemmasalazar@gmail.com', 'GCash', NULL),
(23, 'The Creative Act: A Way of Being', 1, 749.00, 749.00, '2024-05-25', 'Nikko Reyes', 'nikkoreyes@gmail.com', 'Maya', NULL),
(24, 'Can’t Hurt Me', 1, 599.00, 599.00, '2024-06-30', 'Angela Sy', 'angelasy@gmail.com', 'Cash', NULL),
(25, 'Greenlights', 1, 599.00, 599.00, '2024-07-04', 'Harold Ponce', 'haroldponce@gmail.com', 'GCash', NULL),
(26, 'The 5th Wave', 2, 465.00, 930.00, '2024-08-08', 'Janine Yulo', 'janineyulo@gmail.com', 'Maya', NULL),
(27, 'Anxious People', 1, 489.00, 489.00, '2024-09-12', 'Gregorio Abad', 'gregorioabad@gmail.com', 'Cash', NULL),
(28, 'The Inheritance Games', 1, 479.00, 479.00, '2024-10-16', 'Pam Galvez', 'pamgalvez@gmail.com', 'GCash', NULL),
(29, 'We Were Liars', 1, 399.00, 399.00, '2024-11-20', 'Chris Gamboa', 'chrisgamboa@gmail.com', 'Maya', NULL),
(30, 'The House in the Cerulean Sea', 2, 529.00, 1058.00, '2024-12-24', 'Faye Nicolas', 'fayenicolas@gmail.com', 'Cash', NULL),
(31, 'Under the Whispering Door', 1, 549.00, 549.00, '2024-01-28', 'Nathaniel Uy', 'nathanieluy@gmail.com', 'GCash', NULL),
(32, 'Remarkably Bright Creatures', 1, 615.00, 615.00, '2024-02-10', 'Sofia Beltran', 'sofiabeltran@gmail.com', 'Maya', NULL),
(33, 'Lessons in Chemistry', 2, 575.00, 1150.00, '2024-03-14', 'Mel Arce', 'melarce@gmail.com', 'Cash', NULL),
(34, 'Eleanor Oliphant Is Completely Fine', 1, 489.00, 489.00, '2024-04-18', 'RJ Trinidad', 'rjtrinidad@gmail.com', 'GCash', NULL),
(35, 'Before the Coffee Gets Cold', 1, 465.00, 465.00, '2024-05-22', 'Sheena de Vera', 'sheenadevera@gmail.com', 'Maya', NULL),
(36, 'Tomorrow, and Tomorrow, and Tomorrow', 1, 569.00, 569.00, '2024-06-26', 'Jeric Pangilinan', 'jericpangilinan@gmail.com', 'Cash', NULL),
(37, 'The Paper Palace', 1, 549.00, 549.00, '2024-07-30', 'Lianne Mateo', 'liannemateo@gmail.com', 'GCash', NULL),
(38, 'The Atlas Six', 1, 645.00, 645.00, '2024-08-03', 'Neil Burgos', 'neilburgos@gmail.com', 'Maya', NULL),
(39, 'One Italian Summer', 2, 479.00, 958.00, '2024-09-06', 'Ivy Sarte', 'ivysarte@gmail.com', 'Cash', NULL),
(40, 'Malibu Rising', 1, 499.00, 499.00, '2024-10-10', 'Jose Alvarez', 'josealvarez@gmail.com', 'GCash', NULL),
(41, 'The Love Hypothesis', 2, 489.00, 978.00, '2024-11-13', 'Lara Domingo', 'laradomingo@gmail.com', 'Maya', NULL),
(42, 'Book Lovers', 1, 515.00, 515.00, '2024-12-16', 'Marco Angeles', 'marcoangeles@gmail.com', 'Cash', NULL),
(43, 'People We Meet on Vacation', 1, 509.00, 509.00, '2024-01-19', 'Kristel Padua', 'kristelpadua@gmail.com', 'GCash', NULL),
(44, 'Beach Read', 1, 495.00, 495.00, '2024-02-22', 'Francine Escobar', 'francineescobar@gmail.com', 'Maya', NULL),
(45, 'The Paris Library', 1, 565.00, 565.00, '2024-03-25', 'Leo Zamora', 'leozamora@gmail.com', 'Cash', NULL),
(46, 'The Last Thing He Told Me', 1, 525.00, 525.00, '2024-04-28', 'Beth Custodio', 'bethcustodio@gmail.com', 'GCash', NULL),
(47, 'The Giver of Stars', 1, 599.00, 599.00, '2024-05-01', 'Jude Navarro', 'judenavarro@gmail.com', 'Maya', NULL),
(48, 'The Nightingale', 2, 699.00, 1398.00, '2024-06-04', 'Troy Ignacio', 'troyignacio@gmail.com', 'Cash', NULL),
(49, 'Small Great Things', 1, 579.00, 579.00, '2024-07-07', 'Claire Santiago', 'clairesantiago@gmail.com', 'GCash', NULL),
(50, 'Wish You Were Here', 1, 559.00, 559.00, '2024-08-10', 'Gelo Miranda', 'gelomiranda@gmail.com', 'Maya', NULL),
(51, 'Onyx Storm', 12, 895.00, 10740.00, '2025-05-01', 'Angela Ramos', 'angela.ramos@email.com', 'GCash', 'Paid in full'),
(52, 'The Housemaid', 14, 699.00, 9786.00, '2025-05-02', 'John Torres', 'john.torres@email.com', 'Cash', 'Walk-in purchase'),
(53, 'Careless People', 11, 749.00, 8239.00, '2025-05-03', 'Maria Gonzales', 'maria.g@email.com', 'Credit Card', 'Requested gift receipt'),
(54, 'The Bright Sword', 10, 849.00, 8490.00, '2025-05-04', 'Carlo Dela Cruz', 'carlo.dc@email.com', 'Maya', 'Promo code used'),
(55, 'Cold Crematorium', 13, 699.00, 9087.00, '2025-05-05', 'Hannah Lopez', 'hannah.lopez@email.com', 'GCash', 'Delivered via LBC'),
(56, 'Knock, Knock, Professor', 15, 349.00, 5235.00, '2025-05-06', 'Patrick Santos', 'patrick.s@email.com', 'Cash', 'School order'),
(57, 'You Dreamed of Empires', 10, 799.00, 7990.00, '2025-05-07', 'Eliza Mendoza', 'eliza.m@email.com', 'Credit Card', 'Regular customer'),
(58, 'The Coin', 12, 699.00, 8388.00, '2025-05-08', 'Tristan Rivera', 'tristan.r@email.com', 'GCash', 'Picked up in-store'),
(59, 'Bad For You', 14, 389.00, 5446.00, '2025-05-09', 'Isabel Navarro', 'isabel.n@email.com', 'Maya', 'Valentine promo'),
(60, 'Triple Point', 10, 429.00, 4290.00, '2025-05-10', 'Raymond Tan', 'raymond.t@email.com', 'Cash', 'Student club order'),
(61, 'Wings of Starlight', 11, 799.00, 8789.00, '2025-05-11', 'Melissa Cruz', 'melissa.cruz@email.com', 'GCash', 'Loyalty discount applied'),
(62, 'James', 13, 849.00, 11037.00, '2025-05-12', 'Joshua Manalo', 'joshua.manalo@email.com', 'Credit Card', 'Bulk order'),
(63, 'The House of My Mother', 10, 699.00, 6990.00, '2025-05-13', 'Faith Lim', 'faith.lim@email.com', 'Cash', 'Bought with voucher'),
(64, 'Broken Country', 14, 749.00, 10486.00, '2025-05-14', 'Ariel De Leon', 'ariel.dl@email.com', 'Maya', 'Office requisition'),
(65, 'Good Material', 12, 699.00, 8388.00, '2025-05-15', 'Samantha Uy', 'samantha.uy@email.com', 'GCash', 'Mother’s Day gift'),
(66, 'Martyr!', 10, 749.00, 7490.00, '2025-05-16', 'Nathan Cruz', 'nathan.cruz@email.com', 'Cash', 'Courier: J&T'),
(67, 'Colored Television', 15, 749.00, 11235.00, '2025-05-17', 'Julian Reyes', 'julian.reyes@email.com', 'Credit Card', 'Monthly order'),
(68, 'Harmless Like You', 13, 399.00, 5187.00, '2025-05-18', 'Nicole Garcia', 'nicole.g@email.com', 'Maya', 'School club buy'),
(69, 'Tears of Love', 10, 379.00, 3790.00, '2025-05-19', 'Michael Flores', 'michael.f@email.com', 'GCash', 'Urgent pickup'),
(70, 'Irrefutably Yours', 11, 359.00, 3949.00, '2025-05-20', 'Joana Ferrer', 'joana.f@email.com', 'Cash', 'Romance club order'),
(71, 'Anachronistic', 12, 469.00, 5628.00, '2025-05-21', 'Enzo Palma', 'enzo.p@email.com', 'GCash', 'Promo: Buy 1 Get 10%'),
(72, 'The Ravels', 14, 399.00, 5586.00, '2025-05-22', 'Andrea Santiago', 'andrea.s@email.com', 'Cash', 'Student org purchase'),
(73, 'The Let Them Theory', 13, 599.00, 7787.00, '2025-05-23', 'Rafael Go', 'rafael.go@email.com', 'Credit Card', 'Self-help promo'),
(74, 'Reagan: His Life and Legend', 10, 799.00, 7990.00, '2025-05-24', 'Bea Navarro', 'bea.n@email.com', 'Maya', 'History dept. order'),
(75, 'Everyone Who Is Gone Is Here', 12, 749.00, 8988.00, '2025-05-25', 'Liam Martinez', 'liam.m@email.com', 'GCash', 'NGO request'),
(76, 'Triple Point', 10, 429.00, 4290.00, '2025-05-26', 'Jasper Molina', 'jasper.m@email.com', 'Cash', 'Science club purchase'),
(77, 'Knock, Knock, Professor', 12, 349.00, 4188.00, '2025-05-27', 'Carla Reyes', 'carla.r@email.com', 'GCash', 'Wattpad reader event'),
(78, 'Onyx Storm', 11, 895.00, 9845.00, '2025-05-27', 'Zyra Cruz', 'zyra.cruz@email.com', 'Maya', 'Advance reservation'),
(79, 'Everything Is Tuberculosis', 14, 799.00, 11186.00, '2025-05-28', 'Janelle Dizon', 'janelle.d@email.com', 'Credit Card', 'Group therapy resource'),
(80, 'Careless People', 10, 749.00, 7490.00, '2025-05-29', 'Daniel Soriano', 'daniel.s@email.com', 'Cash', 'College syllabus'),
(81, 'The Bright Sword', 13, 849.00, 11037.00, '2025-05-30', 'Luis Mendoza', 'luis.m@email.com', 'Credit Card', 'Fantasy book set'),
(82, 'Cold Crematorium', 10, 699.00, 6990.00, '2025-05-31', 'Bianca Chua', 'bianca.ch@email.com', 'GCash', 'Book club bulk'),
(83, 'The Coin', 12, 699.00, 8388.00, '2025-06-01', 'Francis Ilagan', 'francis.ilagan@email.com', 'Maya', 'Fiction bundle'),
(84, 'The Twin Paradox', 11, 449.00, 4939.00, '2025-06-02', 'Karl Santos', 'karl.s@email.com', 'Cash', 'Sci-fi group buy'),
(85, 'I Heard Her Call My Name', 10, 699.00, 6990.00, '2025-06-03', 'Loraine Vega', 'loraine.v@email.com', 'Credit Card', 'Memoir lovers club'),
(86, 'The Housemaid', 12, 699.00, 8388.00, '2025-06-04', 'Marco Javier', 'marco.j@email.com', 'GCash', 'Thriller sale'),
(87, 'You Dreamed of Empires', 13, 799.00, 10387.00, '2025-06-05', 'Ella Ramos', 'ella.r@email.com', 'Maya', 'Library collection'),
(88, 'Good Material', 14, 699.00, 9786.00, '2025-06-06', 'Harvey Lim', 'harvey.l@email.com', 'Credit Card', 'Romance promo'),
(89, 'The Let Them Theory', 11, 599.00, 6589.00, '2025-06-07', 'Kate Tan', 'kate.t@email.com', 'GCash', 'Self-help seminar'),
(90, 'Broken Country', 10, 749.00, 7490.00, '2025-06-08', 'Nikki Estrada', 'nikki.e@email.com', 'Cash', 'Reading challenge reward');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `role` varchar(20) NOT NULL DEFAULT 'user',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `name`, `email`, `role`, `created_at`) VALUES
(1, 'joyjoy00', '$2y$10$NC472uc9dQDt4H48sX5XdeBvIi4lQc1xx8TR74ieheIplPTlvAOq.', 'joyjoy', 'joyjoy@gmail.com', 'user', '2025-05-21 07:35:57'),
(2, 'behati25', '$2y$10$C.PofpIilE5dKBzu5UDy9eByppUFc80uDE95QKuXPssBHSJAWFc6W', 'Behati Hihi Aw', 'behati25@gmail.com', 'user', '2025-05-21 07:39:11'),
(3, 'TJ', '$2y$10$AbMcRc2cRh/CeNvzTr170.ujLaR5VEzyjVxR6dfPaCjvzT95ouSe2', 'TJ Rotairo', 'rotairotrisha@gmail.com', 'user', '2025-05-25 06:22:07'),
(4, 'trisha', '$2y$10$x0gzkWcXj1fW6bXFA9AiGejIRN78cCxRRYX3rUDBekNWBRAFo7hKu', 'trisha fenol', 'trishafenol@gmail.com', 'user', '2025-05-26 04:18:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
