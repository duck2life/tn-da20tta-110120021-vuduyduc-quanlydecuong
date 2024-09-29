-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 29, 2024 at 06:28 PM
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
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `contents`
--

CREATE TABLE `contents` (
  `id` bigint(20) NOT NULL,
  `content` mediumtext NOT NULL,
  `cdr` mediumtext NOT NULL,
  `lt` varchar(255) NOT NULL,
  `th` varchar(255) NOT NULL,
  `self_study_hour` varchar(255) NOT NULL,
  `note` mediumtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contents`
--

INSERT INTO `contents` (`id`, `content`, `cdr`, `lt`, `th`, `self_study_hour`, `note`, `created_at`, `updated_at`) VALUES
(2, '[\"Chương 1: Test 1\",\"Chương 2: Test 2\",\"Chương 3: Test 3\"]', '[\"1, 2, 3, 4, 5\",\"1, 2, 3, 4, 5\",\"1, 2, 3, 4, 5\"]', '[\"1\",\"2\",\"0\"]', '[\"1\",\"0\",\"2\"]', '[\"25\",\"25\",\"50\"]', '[null,null,null]', '2024-09-25 01:46:47', '2024-09-25 01:50:59'),
(6, '[\"Chương 1: Test thử nghiệm 1\",\"Chương 2: Test thử nghiệm 2\",\"Chương 3: Test thử nghiệm 3\"]', '[\"1, 2, 3, 4, 5\",\"1, 2, 3, 4, 5\",\"1, 2, 3, 4, 5\"]', '[\"1\",\"0\",\"0\"]', '[\"0\",\"2\",\"2\"]', '[\"50\",\"25\",\"25\"]', '[null,null,null]', '2024-09-25 02:12:40', '2024-09-25 02:13:58'),
(7, '[\"Chương 1: Test thử nghiệm 1\",\"Chương 2: Test thử nghiệm 2\",\"Chương 3: Test thử nghiệm 3\"]', '[\"1, 2, 3, 4, 5\",\"1, 2, 3, 4, 5\",\"1, 2, 3, 4, 5\"]', '[\"1\",\"0\",\"0\"]', '[\"0\",\"2\",\"2\"]', '[\"50\",\"25\",\"25\"]', '[\"\",\"\",\"\"]', '2024-09-25 02:13:03', '2024-09-25 02:13:03');

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `doc_name` varchar(255) NOT NULL,
  `mhp` int(100) NOT NULL,
  `information_id` bigint(20) NOT NULL,
  `subject_id` bigint(20) NOT NULL,
  `year` int(10) NOT NULL,
  `semester` int(10) NOT NULL,
  `requirement_id` bigint(20) NOT NULL,
  `reference_id` bigint(20) NOT NULL,
  `description` longtext NOT NULL,
  `output_id` bigint(20) NOT NULL,
  `content_id` bigint(20) NOT NULL,
  `method` longtext NOT NULL,
  `evaluation_id` bigint(20) NOT NULL,
  `regulation_id` bigint(20) NOT NULL,
  `participant` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_delete` tinyint(4) NOT NULL DEFAULT 0,
  `doc_id` bigint(20) DEFAULT NULL,
  `changes` bigint(20) DEFAULT NULL,
  `version` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1: main version, 2: outdated version'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`id`, `doc_name`, `mhp`, `information_id`, `subject_id`, `year`, `semester`, `requirement_id`, `reference_id`, `description`, `output_id`, `content_id`, `method`, `evaluation_id`, `regulation_id`, `participant`, `created_at`, `updated_at`, `is_delete`, `doc_id`, `changes`, `version`) VALUES
(2, 'Thử nghiệm mẫu 1', 111222, 5, 5, 3, 1, 5, 5, 'Học phần trang bị cho sinh viên các kiến thức cơ bản về môn học. Đồng thời cũng giúp dỡ cho các sinh viên rèn luyện các kỹ năng chuyên môn', 2, 2, 'Phương pháp dạy học cụ thể:\r\nPhương pháp dạy học được hiểu là những hành động, cách thức của học sinh và giáo viên ở trong điều kiện dạy học nhất định để đạt được mục đích của việc dạy học. Một số phương pháp dạy học có thể kể đến như: thảo luận, nghiên cứu, học nhóm,...\r\n\r\nKỹ thuật dạy học:\r\nKỹ thuật dạy học là các phương pháp, cách thức hành động của giảng viên ở từng trường hợp cụ thể để điều khiển toàn bộ quá trình dạy học. Giảng viên có thể thực hiện một số kỹ thuật dạy học như: chia nhóm, đặt câu hỏi, phòng tranh,...\r\n\r\nMột số chú ý:\r\nMỗi quan điểm dạy học sẽ có phương pháp dạy học phù hợp. Mỗi phương pháp dạy học cụ thể cũng có kỹ thuật dạy học phù hợp, tuy nhiên cũng có nhiều trường hợp ngoại lệ.\r\nViệc phân biệt phương pháp dạy học với kỹ thuật dạy học đôi khi chỉ mang tính chất tương đối. Ví dụ như động não, ở một số trường hợp được xem là phương pháp dạy học, đôi khi lại được xem là kỹ thuật dạy học.', 2, 2, 'Võ Thành C, Nguyễn Văn A, tôi k biết lần 2\r\n3\r\nNgày phê duyệt .....................................................', '2024-09-25 01:46:47', '2024-09-29 02:29:02', 0, NULL, 2, 1),
(6, 'Thử nghiệm mẫu 2', 333444, 9, 9, 1, 1, 9, 9, 'Học phần trang bị cho sinh viên các kiến thức cơ bản về môn học. Đồng thời cũng giúp dỡ cho các sinh viên rèn luyện các kỹ năng chuyên môn', 6, 6, 'Phương pháp dạy học cụ thể:\r\nPhương pháp dạy học được hiểu là những hành động, cách thức của học sinh và giáo viên ở trong điều kiện dạy học nhất định để đạt được mục đích của việc dạy học. Một số phương pháp dạy học có thể kể đến như: thảo luận, nghiên cứu, học nhóm,...\r\n\r\nKỹ thuật dạy học:\r\nKỹ thuật dạy học là các phương pháp, cách thức hành động của giảng viên ở từng trường hợp cụ thể để điều khiển toàn bộ quá trình dạy học. Giảng viên có thể thực hiện một số kỹ thuật dạy học như: chia nhóm, đặt câu hỏi, phòng tranh,...\r\n\r\nMột số chú ý:\r\nMỗi quan điểm dạy học sẽ có phương pháp dạy học phù hợp. Mỗi phương pháp dạy học cụ thể cũng có kỹ thuật dạy học phù hợp, tuy nhiên cũng có nhiều trường hợp ngoại lệ.\r\nViệc phân biệt phương pháp dạy học với kỹ thuật dạy học đôi khi chỉ mang tính chất tương đối. Ví dụ như động não, ở một số trường hợp được xem là phương pháp dạy học, đôi khi lại được xem là kỹ thuật dạy học.', 6, 6, 'Võ Thành T, Nguyễn Văn B\r\n33455\r\nNgày phê duyệt .....................................................', '2024-09-25 02:12:40', '2024-09-29 02:54:43', 0, NULL, 7, 1),
(7, 'Thử nghiệm mẫu 3', 555666, 10, 10, 4, 1, 10, 10, 'Học phần trang bị cho sinh viên các kiến thức cơ bản về môn học. Đồng thời cũng giúp dỡ cho các sinh viên rèn luyện các kỹ năng chuyên mônHọc phần trang bị cho sinh viên các kiến thức cơ bản về môn học. Đồng thời cũng giúp dỡ cho các sinh viên rèn luyện các kỹ năng chuyên môn', 7, 7, 'Phương pháp dạy học cụ thể:\r\nPhương pháp dạy học được hiểu là những hành động, cách thức của học sinh và giáo viên ở trong điều kiện dạy học nhất định để đạt được mục đích của việc dạy học. Một số phương pháp dạy học có thể kể đến như: thảo luận, nghiên cứu, học nhóm,...\r\n\r\nKỹ thuật dạy học:\r\nKỹ thuật dạy học là các phương pháp, cách thức hành động của giảng viên ở từng trường hợp cụ thể để điều khiển toàn bộ quá trình dạy học. Giảng viên có thể thực hiện một số kỹ thuật dạy học như: chia nhóm, đặt câu hỏi, phòng tranh,...\r\n\r\nMột số chú ý:\r\nMỗi quan điểm dạy học sẽ có phương pháp dạy học phù hợp. Mỗi phương pháp dạy học cụ thể cũng có kỹ thuật dạy học phù hợp, tuy nhiên cũng có nhiều trường hợp ngoại lệ.\r\nViệc phân biệt phương pháp dạy học với kỹ thuật dạy học đôi khi chỉ mang tính chất tương đối. Ví dụ như động não, ở một số trường hợp được xem là phương pháp dạy học, đôi khi lại được xem là kỹ thuật dạy học.', 7, 7, 'Võ Thành T, Nguyễn Văn A\n\nNgày phê duyệt .....................................................', '2024-09-25 02:13:03', '2024-09-25 02:13:03', 0, NULL, NULL, 1),
(17, 'Thử nghiệm mẫu 2', 333444, 9, 9, 1, 1, 9, 9, 'Học phần trang bị cho sinh viên các kiến thức cơ bản về môn học. Đồng thời cũng giúp dỡ cho các sinh viên rèn luyện các kỹ năng chuyên môn', 6, 6, 'Phương pháp dạy học cụ thể:\r\nPhương pháp dạy học được hiểu là những hành động, cách thức của học sinh và giáo viên ở trong điều kiện dạy học nhất định để đạt được mục đích của việc dạy học. Một số phương pháp dạy học có thể kể đến như: thảo luận, nghiên cứu, học nhóm,...\r\n\r\nKỹ thuật dạy học:\r\nKỹ thuật dạy học là các phương pháp, cách thức hành động của giảng viên ở từng trường hợp cụ thể để điều khiển toàn bộ quá trình dạy học. Giảng viên có thể thực hiện một số kỹ thuật dạy học như: chia nhóm, đặt câu hỏi, phòng tranh,...\r\n\r\nMột số chú ý:\r\nMỗi quan điểm dạy học sẽ có phương pháp dạy học phù hợp. Mỗi phương pháp dạy học cụ thể cũng có kỹ thuật dạy học phù hợp, tuy nhiên cũng có nhiều trường hợp ngoại lệ.\r\nViệc phân biệt phương pháp dạy học với kỹ thuật dạy học đôi khi chỉ mang tính chất tương đối. Ví dụ như động não, ở một số trường hợp được xem là phương pháp dạy học, đôi khi lại được xem là kỹ thuật dạy học.', 6, 6, 'Võ Thành T, Nguyễn Văn B\r\n1\r\nNgày phê duyệt .....................................................', '2024-09-29 02:42:39', '2024-09-29 02:42:39', 0, NULL, 5, 2),
(18, 'Thử nghiệm mẫu 2', 333444, 9, 9, 1, 1, 9, 9, 'Học phần trang bị cho sinh viên các kiến thức cơ bản về môn học. Đồng thời cũng giúp dỡ cho các sinh viên rèn luyện các kỹ năng chuyên môn', 6, 6, 'Phương pháp dạy học cụ thể:\r\nPhương pháp dạy học được hiểu là những hành động, cách thức của học sinh và giáo viên ở trong điều kiện dạy học nhất định để đạt được mục đích của việc dạy học. Một số phương pháp dạy học có thể kể đến như: thảo luận, nghiên cứu, học nhóm,...\r\n\r\nKỹ thuật dạy học:\r\nKỹ thuật dạy học là các phương pháp, cách thức hành động của giảng viên ở từng trường hợp cụ thể để điều khiển toàn bộ quá trình dạy học. Giảng viên có thể thực hiện một số kỹ thuật dạy học như: chia nhóm, đặt câu hỏi, phòng tranh,...\r\n\r\nMột số chú ý:\r\nMỗi quan điểm dạy học sẽ có phương pháp dạy học phù hợp. Mỗi phương pháp dạy học cụ thể cũng có kỹ thuật dạy học phù hợp, tuy nhiên cũng có nhiều trường hợp ngoại lệ.\r\nViệc phân biệt phương pháp dạy học với kỹ thuật dạy học đôi khi chỉ mang tính chất tương đối. Ví dụ như động não, ở một số trường hợp được xem là phương pháp dạy học, đôi khi lại được xem là kỹ thuật dạy học.', 6, 6, 'Võ Thành T, Nguyễn Văn B\r\n256\r\nNgày phê duyệt .....................................................', '2024-09-29 02:54:23', '2024-09-29 02:54:23', 0, 6, 6, 2),
(19, 'Thử nghiệm mẫu 2', 333444, 9, 9, 1, 1, 9, 9, 'Học phần trang bị cho sinh viên các kiến thức cơ bản về môn học. Đồng thời cũng giúp dỡ cho các sinh viên rèn luyện các kỹ năng chuyên môn', 6, 6, 'Phương pháp dạy học cụ thể:\r\nPhương pháp dạy học được hiểu là những hành động, cách thức của học sinh và giáo viên ở trong điều kiện dạy học nhất định để đạt được mục đích của việc dạy học. Một số phương pháp dạy học có thể kể đến như: thảo luận, nghiên cứu, học nhóm,...\r\n\r\nKỹ thuật dạy học:\r\nKỹ thuật dạy học là các phương pháp, cách thức hành động của giảng viên ở từng trường hợp cụ thể để điều khiển toàn bộ quá trình dạy học. Giảng viên có thể thực hiện một số kỹ thuật dạy học như: chia nhóm, đặt câu hỏi, phòng tranh,...\r\n\r\nMột số chú ý:\r\nMỗi quan điểm dạy học sẽ có phương pháp dạy học phù hợp. Mỗi phương pháp dạy học cụ thể cũng có kỹ thuật dạy học phù hợp, tuy nhiên cũng có nhiều trường hợp ngoại lệ.\r\nViệc phân biệt phương pháp dạy học với kỹ thuật dạy học đôi khi chỉ mang tính chất tương đối. Ví dụ như động não, ở một số trường hợp được xem là phương pháp dạy học, đôi khi lại được xem là kỹ thuật dạy học.', 6, 6, 'Võ Thành T, Nguyễn Văn B\r\n256\r\nNgày phê duyệt .....................................................', '2024-09-29 02:54:43', '2024-09-29 02:54:43', 0, 6, 7, 2);

-- --------------------------------------------------------

--
-- Table structure for table `evaluations`
--

CREATE TABLE `evaluations` (
  `id` bigint(20) NOT NULL,
  `type_duration` mediumtext NOT NULL,
  `content_review` mediumtext NOT NULL,
  `cdr_review` mediumtext NOT NULL,
  `criteria` mediumtext NOT NULL,
  `percentage` mediumtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `evaluations`
--

INSERT INTO `evaluations` (`id`, `type_duration`, `content_review`, `cdr_review`, `criteria`, `percentage`, `created_at`, `updated_at`) VALUES
(2, 'KT quá trình 1;KT quá trình 2;Thi kết thúc môn', 'Chương 1, 2;Chương 2, 3;Chương 1, 2, 3', '1, 2, 3, 4, 5;1, 2, 3, 4, 5;1, 2, 3, 4, 5', 'Theo đáp án;Theo đáp án;Theo đáp án', '25%;25%;50%', '2024-09-25 01:46:47', '2024-09-25 01:50:59'),
(6, 'KT quá trình 1;KT quá trình 2;Thi kết thúc môn', 'Chương 1, 2;Chương 2, 3;Chương 1, 2, 3', '1, 2, 3, 4, 5;1, 2, 3, 4, 5;1, 2, 3, 4, 5', 'Theo đáp án;Theo đáp án;Theo đáp án', '25%;25%;50%', '2024-09-25 02:12:40', '2024-09-25 02:13:58'),
(7, '\"KT quá trình 1\"; \"KT quá trình 2\"; \"Thi kết thúc môn\"', '\"Chương 1, 2\"; \"Chương 2, 3\"; \"Chương 1, 2, 3\"', '\"1, 2, 3, 4, 5\"; \"1, 2, 3, 4, 5\"; \"1, 2, 3, 4, 5\"', '\"Theo đáp án\"; \"Theo đáp án\"; \"Theo đáp án\"', '\"25%\"; \"25%\"; \"50%\"', '2024-09-25 02:13:03', '2024-09-25 02:13:03');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `information`
--

CREATE TABLE `information` (
  `id` bigint(20) NOT NULL,
  `course_type` varchar(255) DEFAULT NULL,
  `credit` varchar(255) DEFAULT NULL,
  `teaching_hours` varchar(255) DEFAULT NULL,
  `self_study` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `information`
--

INSERT INTO `information` (`id`, `course_type`, `credit`, `teaching_hours`, `self_study`, `created_at`, `updated_at`) VALUES
(5, 'on,', '3,3', '50,100', 100, '2024-09-25 01:46:47', '2024-09-25 01:50:59'),
(9, ', on', '1,4', '100,50', 100, '2024-09-25 02:12:40', '2024-09-29 02:01:51'),
(10, ', on', '1, 4', '100, 50', 100, '2024-09-25 02:13:03', '2024-09-25 02:13:03');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_08_26_114544_create_documentsvd_table', 2),
(6, '2024_08_27_094928_add_foreign_keys_to_documents_table', 3),
(7, '2024_08_27_095321_add_subject_id_to_documents_table', 3),
(8, '2024_08_27_100833_make_description_nullable_in_documents_table', 3),
(9, '2024_08_27_110431_create_information_table', 4),
(10, '2024_08_28_073803_create_subject_table', 5),
(11, '2024_08_28_074423_create_subject_table', 6),
(12, '2024_08_28_090744_create_subject_table', 7),
(13, '2024_08_28_091718_create_requirement_table', 8),
(15, '2024_08_28_092811_create_reference_table', 9),
(17, '2024_08_28_093852_create_regulation_table', 10),
(19, '2024_08_29_090409_create_output_standard_table', 11),
(20, '2024_08_30_093824_create_content_table', 12),
(21, '2024_09_01_093046_create_evaluation_table', 13),
(22, '2024_09_02_102516_add_is_delete_to_documents_table', 14),
(23, '2024_09_02_104028_add_is_delete_to_documents_table', 15),
(24, '2024_09_16_092414_create_output_standard_table', 16);

-- --------------------------------------------------------

--
-- Table structure for table `outputs`
--

CREATE TABLE `outputs` (
  `id` bigint(20) NOT NULL,
  `stt` varchar(255) NOT NULL,
  `learning_outcomes` mediumtext NOT NULL,
  `outcomes` mediumtext NOT NULL,
  `competency_level` mediumtext NOT NULL,
  `tua` mediumtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `outputs`
--

INSERT INTO `outputs` (`id`, `stt`, `learning_outcomes`, `outcomes`, `competency_level`, `tua`, `created_at`, `updated_at`) VALUES
(2, '\"1\\/ 2 |3\\/ 4\\/ 5 |6\"', '\"Thử nghiệm 1\\/ Thử nghiệm 2 |Thử nghiệm 3\\/ Thử nghiệm 4\\/ Thử nghiệm 5 |Thử nghiệm 6\"', '\"PL01, PL02\\/ PL01, PL02 |PL03, PL04\\/ PL03, PL04\\/ PL03, PL04 |PL05\"', '\"3\\/ 3 |3\\/ 3\\/ 3 |2\"', '\"TUA\\/ TUA |TUA\\/ TUA\\/ TUA |U\"', '2024-09-25 01:46:47', '2024-09-25 01:50:59'),
(6, '\"1 |2\\/ 3 |4\"', '\"Thử nghiệm 1 |Thử nghiệm 2\\/ Thử nghiệm 3 |Thử nghiệm 4\"', '\"PL01 |PL02\\/ PL03 |PL04\"', '\"3 |3\\/ 3 |2\"', '\"TUA |TUA\\/ TUA |TUA\"', '2024-09-25 02:12:40', '2024-09-25 02:12:40'),
(7, '\"1 |2\\/ 3 |4\"', '\"Thử nghiệm 1 |Thử nghiệm 2\\/ Thử nghiệm 3 |Thử nghiệm 4\"', '\"PL01 |PL02\\/ PL03 |PL04\"', '\"3 |3\\/ 3 |2\"', '\"TUA |TUA\\/ TUA |TUA\"', '2024-09-25 02:13:03', '2024-09-25 02:13:03');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `references`
--

CREATE TABLE `references` (
  `id` bigint(20) NOT NULL,
  `primary_reference` longtext NOT NULL,
  `additional_reference` longtext NOT NULL,
  `other_reference` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `references`
--

INSERT INTO `references` (`id`, `primary_reference`, `additional_reference`, `other_reference`, `created_at`, `updated_at`) VALUES
(5, '[1] Mike McGrath (2018). C Programming in easy steps. In Easy Steps Limited.\r\n[2] Tạ Đan Thư, Nguyễn Thanh Phương, Đinh Bá Triết (2013). Tài liệu học tập môn Lập trình C.', '[1] Jeff Szuhay (2020). Learn C Programming: A beginner\'s guide to learning C programming the easy and disciplined way. Packt Publishing.\r\n[2] Suhrata Saha and Subhodip Mukherjee (2016). C Programming with C. Cambridge University Press.', '[1] Mike McGrath (2018). C Programming in easy steps. In Easy Steps Limited.\r\n[2] Trần Văn J (2022). Trí tuệ nhân tạo, Nhà xuất bản Khoa học và Kỹ thuật.	\r\n[3] Stuart Russell & Peter Norvig (2020). Artificial Intelligence: A Modern Approach. Pearson.', '2024-09-25 01:46:47', '2024-09-29 01:50:00'),
(9, '[1] Mike McGrath (2018). C Programming in easy steps. In Easy Steps Limited.\r\n[2] Tạ Đan Thư, Nguyễn Thanh Phương, Đinh Bá Triết (2013). Tài liệu học tập môn Lập trình C.', '[1] Jeff Szuhay (2020). Learn C Programming: A beginner\'s guide to learning C programming the easy and disciplined way. Packt Publishing.\r\n[2] Suhrata Saha and Subhodip Mukherjee (2016). C Programming with C. Cambridge University Press.', '[1] Mike McGrath (2018). C Programming in easy steps. In Easy Steps Limited.\r\n[2] Trần Văn J (2022). Trí tuệ nhân tạo, Nhà xuất bản Khoa học và Kỹ thuật.	\r\n[3] Stuart Russell & Peter Norvig (2020). Artificial Intelligence: A Modern Approach. Pearson.', '2024-09-25 02:12:40', '2024-09-25 02:12:40'),
(10, '[1] Mike McGrath (2018). C Programming in easy steps. In Easy Steps Limited.\r\n[2] Tạ Đan Thư, Nguyễn Thanh Phương, Đinh Bá Triết (2013). Tài liệu học tập môn Lập trình C.', '[1] Jeff Szuhay (2020). Learn C Programming: A beginner\'s guide to learning C programming the easy and disciplined way. Packt Publishing.\r\n[2] Suhrata Saha and Subhodip Mukherjee (2016). C Programming with C. Cambridge University Press.', '[1] Mike McGrath (2018). C Programming in easy steps. In Easy Steps Limited.\r\n[2] Trần Văn J (2022). Trí tuệ nhân tạo, Nhà xuất bản Khoa học và Kỹ thuật.	\r\n[3] Stuart Russell & Peter Norvig (2020). Artificial Intelligence: A Modern Approach. Pearson.', '2024-09-25 02:13:03', '2024-09-25 02:13:03');

-- --------------------------------------------------------

--
-- Table structure for table `regulations`
--

CREATE TABLE `regulations` (
  `id` bigint(20) NOT NULL,
  `attendance` longtext NOT NULL,
  `behavior` longtext NOT NULL,
  `academic` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `regulations`
--

INSERT INTO `regulations` (`id`, `attendance`, `behavior`, `academic`, `created_at`, `updated_at`) VALUES
(2, 'Sinh viên có trách nhiệm tham dự đầy đủ các buổi học do Ban Giám hiệu hoặc Trưởng khoa quyết định.\r\nSinh viên vắng 20% số giờ dự giảng của học phần sẽ xem như là không hoàn thành', 'Học phần được thực hiện trên nguyên tắc tôn trọng người học và người dạy. Mọi hành vi làm ảnh hưởng đến quá trình dạy và học đều bị nghiêm cấm.', 'Máy tính xách tay, máy tính bảng chỉ được sử dụng trên lớp với mục đích ghi chép bài giảng, tình toán phục vụ bài giảng, bài tập. Tuyệt đối không làm ồn, gây ảnh hưởng đến người khác trong quá trình học.', '2024-09-25 01:46:47', '2024-09-29 01:50:00'),
(6, 'Sinh viên có trách nhiệm tham dự đầy đủ các buổi học do Ban Giám hiệu hoặc Trưởng khoa quyết định.\r\nSinh viên vắng 20% số giờ dự giảng của học phần sẽ xem như là không hoàn thành', 'Học phần được thực hiện trên nguyên tắc tôn trọng người học và người dạy. Mọi hành vi làm ảnh hưởng đến quá trình dạy và học đều bị nghiêm cấm.', 'Máy tính xách tay, máy tính bảng chỉ được sử dụng trên lớp với mục đích ghi chép bài giảng, tình toán phục vụ bài giảng, bài tập. Tuyệt đối không làm ồn, gây ảnh hưởng đến người khác trong quá trình học.', '2024-09-25 02:12:40', '2024-09-25 02:12:40'),
(7, 'Sinh viên có trách nhiệm tham dự đầy đủ các buổi học do Ban Giám hiệu hoặc Trưởng khoa quyết định.\r\nSinh viên vắng 20% số giờ dự giảng của học phần sẽ xem như là không hoàn thành', 'Học phần được thực hiện trên nguyên tắc tôn trọng người học và người dạy. Mọi hành vi làm ảnh hưởng đến quá trình dạy và học đều bị nghiêm cấm.', 'Máy tính xách tay, máy tính bảng chỉ được sử dụng trên lớp với mục đích ghi chép bài giảng, tình toán phục vụ bài giảng, bài tập. Tuyệt đối không làm ồn, gây ảnh hưởng đến người khác trong quá trình học.', '2024-09-25 02:13:03', '2024-09-25 02:13:03');

-- --------------------------------------------------------

--
-- Table structure for table `requirements`
--

CREATE TABLE `requirements` (
  `id` bigint(20) NOT NULL,
  `prerequisite` mediumtext NOT NULL,
  `corequisite` mediumtext NOT NULL,
  `other_requirements` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `requirements`
--

INSERT INTO `requirements` (`id`, `prerequisite`, `corequisite`, `other_requirements`, `created_at`, `updated_at`) VALUES
(5, 'KHÔNG', 'KHÔNG', 'Điều kiện tham gia học phần cho sinh viên thường bao gồm việc đạt yêu cầu tín chỉ của các môn học trước đó, duy trì điểm trung bình học tập tối thiểu theo quy định của trường, cùng với việc hoàn thành các bài kiểm tra hoặc bài tập được giao. Sinh viên cũng cần tham gia đầy đủ các buổi học và hoạt động liên quan, nhằm đảm bảo sự chuẩn bị và tích lũy kiến thức cần thiết cho học phần. Thông tin chi tiết về điều kiện cụ thể có thể được tham khảo từ hội đồng khoa hoặc bộ phận đào tạo của trường.', '2024-09-25 01:46:47', '2024-09-25 01:50:59'),
(9, 'KHÔNG', 'KHÔNG', 'Điều kiện tham gia học phần cho sinh viên thường bao gồm việc đạt yêu cầu tín chỉ của các môn học trước đó, duy trì điểm trung bình học tập tối thiểu theo quy định của trường, cùng với việc hoàn thành các bài kiểm tra hoặc bài tập được giao. Sinh viên cũng cần tham gia đầy đủ các buổi học và hoạt động liên quan, nhằm đảm bảo sự chuẩn bị và tích lũy kiến thức cần thiết cho học phần. Thông tin chi tiết về điều kiện cụ thể có thể được tham khảo từ hội đồng khoa hoặc bộ phận đào tạo của trường.', '2024-09-25 02:12:40', '2024-09-25 02:12:40'),
(10, 'KHÔNG', 'KHÔNG', 'Điều kiện tham gia học phần cho sinh viên thường bao gồm việc đạt yêu cầu tín chỉ của các môn học trước đó, duy trì điểm trung bình học tập tối thiểu theo quy định của trường, cùng với việc hoàn thành các bài kiểm tra hoặc bài tập được giao. Sinh viên cũng cần tham gia đầy đủ các buổi học và hoạt động liên quan, nhằm đảm bảo sự chuẩn bị và tích lũy kiến thức cần thiết cho học phần. Thông tin chi tiết về điều kiện cụ thể có thể được tham khảo từ hội đồng khoa hoặc bộ phận đào tạo của trường.', '2024-09-25 02:13:03', '2024-09-25 02:13:03');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` bigint(20) NOT NULL,
  `degree` varchar(255) NOT NULL,
  `branch` varchar(255) NOT NULL,
  `major` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `degree`, `branch`, `major`, `created_at`, `updated_at`) VALUES
(5, 'THPT', 'CNTT', '', '2024-09-25 01:46:47', '2024-09-25 01:50:59'),
(9, 'THPT', 'Y', '', '2024-09-25 02:12:40', '2024-09-25 02:13:58'),
(10, 'THPT', 'Ngôn ngữ Anh', NULL, '2024-09-25 02:13:03', '2024-09-25 02:13:03');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` bigint(99) NOT NULL,
  `division` varchar(100) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `user_type` tinyint(4) NOT NULL DEFAULT 2 COMMENT '1:admin, 2:teacher, 3:guest',
  `is_delete` tinyint(11) NOT NULL DEFAULT 0 COMMENT '0:not deleted, 1:deleted',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone`, `division`, `remember_token`, `user_type`, `is_delete`, `created_at`, `updated_at`) VALUES
(0, 'Guest', 'guest@guest.com', '$2y$10$lQmigbBN5NBbseJcmf3xkuzd5dTt71sA6aocV/rN7kqN9v/Ove7ZS', 0, '', NULL, 3, 0, '2024-09-18 00:25:37', '2024-09-18 00:26:31'),
(1, 'Duck', 'duck@admin.com', '$2y$10$lQmigbBN5NBbseJcmf3xkuzd5dTt71sA6aocV/rN7kqN9v/Ove7ZS', 0, '', 'dmHWP1svjvvDrIC0RilmxCHJCVgix9TR67vA6Zm2aRs84Pi1TyBftieWVD4g', 1, 0, '2024-06-25 09:45:52', '2024-09-18 00:32:06'),
(3, 'Nguyễn Thành T', 'teacher@teacher.com', '$2y$10$9hwG7iFk7Z9io3TOBqtEZ.83Fw7JcSj8I7F/OIui1hL0Lo5a9gpDm', 9856245, 'CNTT', NULL, 2, 0, '2024-06-26 12:26:21', '2024-09-25 01:03:42'),
(4, 'Nguyễn Ngọc B', 'nnb@teacher.com', '$2y$10$Koq8V6qSBrXU3IS/xi/pA.vuzDdG8mweY54V0vULfVBIImN32GWM.', 1456789, 'CNTT', NULL, 2, 0, '2024-08-03 01:54:41', '2024-09-25 01:03:21'),
(5, 'Lê Văn T', 'tea@teacher.com', '$2y$10$S2XTB/JEe3WlncCYIOf.EOOQDKFsZ/9MFAAHTY6SPcbY/SLj4p5yO', 999999999999, 'CNTT', NULL, 2, 0, '2024-08-18 02:11:20', '2024-08-18 02:12:41'),
(6, 'Trần Văn A', 'test@teacher.com', '$2y$10$eDDtn6l5lIz5OtYBq1PfAex3bp1KFVwofiDAcdo0Qn.5hRsJv0Sgy', 9999999999, 'CNTT', NULL, 2, 0, '2024-09-24 03:47:00', '2024-09-25 01:02:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contents`
--
ALTER TABLE `contents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `information_id` (`information_id`),
  ADD KEY `subject_id` (`subject_id`),
  ADD KEY `requirement_id` (`requirement_id`),
  ADD KEY `reference_id` (`reference_id`),
  ADD KEY `regulation_id` (`regulation_id`),
  ADD KEY `content_id` (`content_id`),
  ADD KEY `evaluation_id` (`evaluation_id`),
  ADD KEY `output_id` (`output_id`);

--
-- Indexes for table `evaluations`
--
ALTER TABLE `evaluations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `information`
--
ALTER TABLE `information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `outputs`
--
ALTER TABLE `outputs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `references`
--
ALTER TABLE `references`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `regulations`
--
ALTER TABLE `regulations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requirements`
--
ALTER TABLE `requirements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contents`
--
ALTER TABLE `contents`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `evaluations`
--
ALTER TABLE `evaluations`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `information`
--
ALTER TABLE `information`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `outputs`
--
ALTER TABLE `outputs`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `references`
--
ALTER TABLE `references`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `regulations`
--
ALTER TABLE `regulations`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `requirements`
--
ALTER TABLE `requirements`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `documents`
--
ALTER TABLE `documents`
  ADD CONSTRAINT `content_id` FOREIGN KEY (`content_id`) REFERENCES `contents` (`id`),
  ADD CONSTRAINT `evaluation_id` FOREIGN KEY (`evaluation_id`) REFERENCES `evaluations` (`id`),
  ADD CONSTRAINT `information_id` FOREIGN KEY (`information_id`) REFERENCES `information` (`id`),
  ADD CONSTRAINT `output_id` FOREIGN KEY (`output_id`) REFERENCES `outputs` (`id`),
  ADD CONSTRAINT `reference_id` FOREIGN KEY (`reference_id`) REFERENCES `references` (`id`),
  ADD CONSTRAINT `regulation_id` FOREIGN KEY (`regulation_id`) REFERENCES `regulations` (`id`),
  ADD CONSTRAINT `requirement_id` FOREIGN KEY (`requirement_id`) REFERENCES `requirements` (`id`),
  ADD CONSTRAINT `subject_id` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
