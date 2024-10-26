-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 13, 2024 at 07:56 PM
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
(1, '[\"Bài 1. Định nghĩa các thiết bị và thuật ngữ chuyên ngành\",\"Bài 2. Viết lại câu không làm thay đổi ý nghĩa\",\"Bài 3. Dịch một đoạn văn ngắn từ tiếng Anh sang tiếng Việt và ngược lại\",\"Bài 4. Trình bày ý kiến về các chủ đề trong lĩnh vực Công nghệ Thông tin\"]', '[\"2\",\"1\",\"3\",\"4\"]', '[\"4\",\"12\",\"8\",\"6\"]', '[\"4\",\"12\",\"8\",\"6\"]', '[\"20\",\"20\",\"20\",\"30\"]', '[\"\",\"\",\"\",\"\"]', '2024-10-13 10:42:15', '2024-10-13 10:42:15'),
(2, '[\"Chương 1. Tổng quan về điện toán đám mây\",\"Chương 1. Tổng quan về điện toán đám mây\",\"Chương 3. Tự động hóa và điều phối\",\"Chương 4. Lập trình đám mây\",\"2, 8, 10Chương 5. Bảo mật và quyền riêng tư trên đám mây\"]', '[\"1, 8\",\"3, 8, 5\",\"2, 8, 5\",\"4, 6, 8, 10\",\"2, 8, 10\"]', '[\"5\",\"8\",\"5\",\"7\",\"8\"]', '[\"5\",\"10\",\"0\",\"10\",\"8\"]', '[\"10\",\"10\",\"0\",\"10\",\"0\"]', '[\"\",\"\",\"\",\"\",\"\"]', '2024-10-13 10:50:05', '2024-10-13 10:50:05'),
(3, '[\"Chương\\/Bài 1. Tổng quan về lập trình trên máy tính\",\"Chương\\/Bài 2. Ngôn ngữ lập trình C\",\"Chương\\/Bài 3. Phân tích thiết kế hàm\",\"Chương\\/Bài 4. Ứng dụng mảng trong ngôn ngữ lập trình C\",\"Chương\\/Bài 5. Kỹ thuật lập trình đệ quy\",\"Chương\\/Bài 6. Chuỗi ký tự, kiểu dữ liệu có cấu trúc\",\"Chương\\/Bài 7. Tổ chức, lưu trữ dữ liệu trên tập tin\"]', '[\"1, 3, 6\",\"2, 4, 5, 6, 7, 8\",\"2, 4, 5, 6, 7, 8\",\"2, 4, 5, 6, 7, 8\",\"2, 4, 5, 6, 7, 8\",\"2, 4, 5, 6, 7, 8\",\"2, 4, 5, 6, 7, 8\"]', '[\"4\",\"5\",\"2\",\"8\",\"4\",\"4\",\"3\"]', '[\"5\",\"10\",\"5\",\"20\",\"5\",\"10\",\"5\"]', '[\"15\",\"25\",\"10\",\"20\",\"10\",\"20\",\"10\"]', '[\"\",\"\",\"\",\"\",\"\",\"\",\"\"]', '2024-10-13 10:55:26', '2024-10-13 10:55:26');

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
(1, 'ANH VĂN CHUYÊN NGÀNH CÔNG NGHỆ THÔNG TIN', 220123, 1, 1, 2, 1, 1, 1, 'Học phần giúp trang bị cho sinh viên các kiến thức chuyên sâu về tiếng Anh trong chuyên ngành Công nghệ thông tin. Đồng thời học phần cũng nhằm rèn luyện cho sinh viên các kỹ năng dịch và trình bày. Học phần cũng giúp hình thành cho sinh viên thái độ và nhận thức đúng đắn về vai trò của tiếng Anh trong chuyên ngành Công nghệ thông tin và kỹ năng làm việc nhóm, viết và trình bày báo cáo.', 1, 1, '-	Diễn giảng\r\n-	Vấn đáp (Questions – Answers)\r\n-	Hoạt động nhóm (Group-based Learning)', 1, 1, '- Nguyễn Hoàng Duy Thiện\r\n- Nguyễn Nhứt Lam', '2024-10-13 10:42:15', '2024-10-13 10:42:15', 0, NULL, NULL, 1),
(2, 'ĐIỆN TOÁN ĐÁM MÂY', 220267, 2, 2, 2, 1, 2, 2, 'Học phần cung cấp cho sinh viên các khái niệm, nguyên tắc để hiểu về điện toán đám mây. Học phần cũng nhằm mục đích mang lại cho sinh viên những lợi thế và sự phát triển của điện toán đám mây trong việc triển khai cơ sở hạ tầng đám mây, ảo hóa, tự động hóa nguồn tài nguyên và triển khai phần mềm đám mây. Ngoài ra, học phần phát triển nhận thức phù hợp của sinh viên về cơ sở hạ tầng mạng cũng như các kỹ năng mềm cần thiết liên quan đến nội dung học phần. Học phần cũng giúp hình thành cho sinh viên thái độ và nhận thức đúng đắn về vai trò và trách nhiệm của người kỹ sư công nghệ thông tin, vận dụng các kỹ năng làm việc nhóm và giao tiếp.', 2, 2, '- Diễn giảng và Thao tác mẫu (Demo)\r\n- Vấn đáp (Questions – Answers)\r\n- Hoạt động nhóm (Group-based Learning', 2, 2, 'Nguyễn Bá Nhiệm\r\nDương Ngọc Vân Khanh\r\nHuỳnh Văn Thanh', '2024-10-13 10:50:05', '2024-10-13 10:50:05', 0, NULL, NULL, 1),
(3, 'KỸ THUẬT LẬP TRÌNH', 220228, 3, 3, 1, 1, 3, 3, 'Học phần giúp trang bị cho sinh viên các kiến thức cơ bản về kỹ thuật lập trình giải quyết bài toán trên máy tính. Đồng thời học phần cũng nhằm rèn luyện cho sinh viên các kỹ năng phân tích bài toán, lập trình giải các bài toán trên máy tính bằng ngôn ngữ lập trình C với giải thuật hiệu quả. Học phần cũng giúp hình thành cho sinh viên rèn luyện thái độ và nhận thức đúng đắn về tầm quan trọng của học phần và phương pháp lập trình trên máy tính. Nội dung của học phần được vận dụng vào học phần Cấu trúc dữ liệu và Giải thuật ở học kỳ II năm thứ nhất', 3, 3, '−	Diễn giảng: Hướng dẫn nội dung lý thuyết môn học, sinh viên có thể ghi nhớ các kiến thức cơ bản và vận dụng giải quyết vấn đề trên máy tính thông qua thời lượng thực hành.\r\n−	Thao tác mẫu (Demo): Hướng dẫn sinh viên thực hành, giúp sinh viên có thể hình dung được cách vận dụng lý thuyết vào giải quyết vấn đề. Dựa vào thao tác mẫu sinh viên sẽ biết cách giải quyết vấn đề trên máy tính. \r\n−	Học dựa trên vấn đề (Problem-based Learning): Giáo viên đưa ra vấn đề cần giải quyết, sinh viên suy nghĩ để lựa chọn giải pháp giải quyết vấn đề.', 3, 3, 'Võ Phước Hưng, Võ Thành C, Nguyễn Thừa Phát Tài, Nguyễn Ngọc Đan Thanh', '2024-10-13 10:55:26', '2024-10-13 10:55:26', 0, NULL, NULL, 1);

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
(1, '\"Kiểm tra lý thuyết – 60’\"; \"Kiểm tra thực hành – 60’\"; \"Kiểm tra lý thuyết – 90’\"', '\"Bài 1, 2\"; \"Bài 1, 2\"; \"Bài 1, 2, 3, 4\"', '\"Theo đáp án\"; \"Theo đáp án\"; \"1, 2, 3, 8, 9\"', '\"Theo đáp án\"; \"Theo đáp án\"; \"Theo đáp án\"', '\"25%\"; \"25%\"; \"50%\"', '2024-10-13 10:42:15', '2024-10-13 10:42:15'),
(2, '\"Thực hành\"; \"Thực hành\"; \"Đồ án học phần\"', '\"Từ chương 1 đến chương 3\"; \"Từ chương 4 đến chương 5\"; \"Từ chương 1 đến chương 5\"', '\"Từ 1 đến 3, 8\"; \"Từ 2, 4, 8, 5, 10, 7,9\"; \"Từ 1 đến 8\"', '\"Theo đáp án\"; \"Theo đáp án\"; \"Theo đáp án\"', '\"25%\"; \"25%\"; \"50%\"', '2024-10-13 10:50:05', '2024-10-13 10:50:05'),
(3, '\"Làm bài kiểm tra thực hành, bài tập trên lớp, bài tập về nhà\"; \"Làm bài kiểm tra thực hành, bài tập trên lớp, bài tập về nhà\"; \"Thi trắc nghiệm\"', '\"Chương 1, 2, 3, 4\"; \"Chương 5, 6, 7\"; \"Chương 1, 2, 3, 4, 5, 6, 7\"', '\"1, 2, 3, 4, 5\"; \"1, 2, 3, 4, 5\"; \"1, 2, 3, 4, 5\"', '\"Thi trắc nghiệm\"; \"Thi trắc nghiệm\"; \"Thi trắc nghiệm\"', '\"25%\"; \"25%\"; \"50%\"', '2024-10-13 10:55:26', '2024-10-13 10:55:26');

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
(1, ', on', '02, 01', '30, 30', 90, '2024-10-13 10:42:15', '2024-10-13 10:42:15'),
(2, ', on', '02, 01', '30, 30', 30, '2024-10-13 10:50:05', '2024-10-13 10:50:05'),
(3, 'on,', '02, 02', '30, 60', 110, '2024-10-13 10:55:26', '2024-10-13 10:55:26');

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
(1, '\"1\\/ 2\\/ 3\\/ 4 |5\\/ 6\\/ 7\\/ 8 |9\"', '\"Định nghĩa các thiết bị và thuật ngữ chuyên ngành\\/ Viết lại câu không làm thay đổi ý nghĩa\\/ Dịch một đoạn văn ngắn từ tiếng Anh sang tiếng Việt và ngược lại\\/ Trình bày ý kiến về các chủ đề trong lĩnh vực Công nghệ Thông tin |Vận dụng kỹ thuật làm việc nhóm\\/ Vận dụng kỹ năng trình bày các tài liệu chuyên ngành bằng tiếng Anh\\/ Vận dụng kỹ năng nghe, nói, đọc, viết tiếng Anh\\/ Sử dụng các thuật ngữ chuyên ngành |Học tập chủ động\"', '\"PLO6\\/ PLO6\\/ PLO6\\/ PLO6 |PLO8\\/ PLO6\\/ PLO6\\/ PLO6 |PLO10\"', '\"3\\/ 3\\/ 3\\/ 3 |3\\/ 3\\/ 3\\/ 3 |5\"', '\"TUA\\/ TUA\\/ TUA\\/ TUA |U\\/ U\\/ U\\/ U |U\"', '2024-10-13 10:42:15', '2024-10-13 10:42:15'),
(2, '\"1\\/ 2\\/ 3\\/ 4 |5\\/ 6\\/ 7\\/ 8 |9\\/ 10\"', '\"Mô tả tổng quan về điện toán đám mây\\/ Giải thích các khái niệm, nguyên lý của điện toán đám mây\\/ Xác định các thành phần của điện toán đám mây\\/ Triển khai ứng dụng |Khả năng thích ứng nhanh với các vấn đề mới\\/ Hoạt động nhóm\\/ Thuyết trình bằng miệng và giao tiếp giữa các cá nhân\\/ Khả năng đọc và hiểu tài liệu tiếng Anh |Thể hiện sự tôn trọng ý kiến của người khác\\/ Khả năng tự học\"', '\"PLO2\\/ PLO2\\/ PLO2\\/ PLO4 |PLO5\\/ PLO8\\/ PLO7\\/ PLO6 |PLO9\\/ PLO10\"', '\"1,2\\/ 2\\/ 3\\/ 4 |3\\/ 4\\/ 3\\/ 4 |5\\/ 5\"', '\"TUA\\/ TUA\\/ TUA\\/ TA |A\\/ A\\/ A\\/ A |U\\/ U\"', '2024-10-13 10:50:05', '2024-10-13 10:50:05'),
(3, '\"1\\/ 2 |3\\/ 4\\/ 5\\/ 6 |7\\/ 8\"', '\"Vận dụng các cách mô tả thuật toán để diễn đạt ý tưởng giải quyết cho từng bài toán cụ thể\\/ Tổng hợp các kiến thức về ngôn ngữ lập trình để giải bài toán trên máy tính |Kỹ năng mô hình hóa vấn đề\\/ Cài đặt thuật toán và trình bày mã nguồn hợp lý\\/ Phát hiện và chỉnh sửa lỗi chính xác (bao gồm lỗi cú pháp và lỗi logic)\\/ Thể hiện kỹ năng giao tiếp, làm việc nhóm |Thể hiện tác phong chuyên nghiệp\\/ Thể hiện tính linh hoạt, sáng tạo và khả năng học tập suốt đời\"', '\"PLO1, PLO2\\/ PLO1, PLO2 |PLO3, PLO4\\/ PLO3, PLO4, PLO7\\/ PLO3, PLO4\\/ PLO6, PLO7, PLO8 |PLO9\\/ PLO10\"', '\"3\\/ 3 |2\\/ 2\\/ 2\\/ 3 |2\\/ 2\"', '\"TUA\\/ TUA |TUA\\/ TUA\\/ TUA\\/ U |U\\/ U\"', '2024-10-13 10:55:26', '2024-10-13 10:55:26');

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
(1, '[1] Eric H. Glendinning and John McEwan (2011). Oxford English for Information Technology, 2nd Edition. Oxford University Press.', '[1] Keith Boechker and P. Charles Brown (2001). Oxford English for Computing. Oxford University Press.\r\n[2] Marion Grussendorf (2007). English for Presentations. Oxford University Press.\r\n[3] Nguyễn Hoàng Thanh Ly, Đặng Ái Vy (2012). Check your English Vocabulary for Computers and Information Technology. Nhà xuất bản Hồng Đức.', 'https://www.oxfordlearnersdictionaries.com/browse/english/', '2024-10-13 10:42:15', '2024-10-13 10:42:15'),
(2, '[1] Douglas Comer (2021). The Cloud Computing Book: The Future of Computing Explained. Chapman and Hall/CRC.', '[2]  Nick Antonopoulos, Lee Gillam (2018). Cloud Computing: Principles, Systems and Applications (Computer Communications and Networks). Springer', 'Microsoft Azure, AWS, Heroku, Google Cloud', '2024-10-13 10:50:05', '2024-10-13 10:50:05'),
(3, '[1] Phạm Văn Ất (2018). Giáo trình Kỹ thuật lập trình C Căn bản và Nâng cao. NXB Bách Khoa Hà Nội.\r\n[2] Subrata Saha and Subhodip Mukherjee (2017). Basic Computation and Programming with C. Cambridge University Press.', '[1] Nguyễn Ngọc Đan Thanh (2015). Tài liệu giảng dạy môn Kỹ thuật lập trình, Trường Đại học Trà Vinh (lưu hành nội bộ) \r\n[2] Jeff Szuhay (2020). Learn C Programming: A beginner\'s guide to learning C programming the easy and disciplined way. Packt Publishing.\r\n[3] Mike McGrath (2018). C Programming in easy steps. In Easy Steps Limited.\r\n[4] Subrata Saha and Subhodip Mukherjee (2016). Basic Computation and Programming with C 1st Edition.  Cambridge University Press.\r\n[5] Trần Đan Thư, Nguyễn Thanh Phương, Đinh Bá\r\nTiến, Trần Minh Triết, Đăng Bình Phương (2013).\r\nKỹ thuật lập trình. NXB Khoa học và Kỹ thuật.', '[1] Phần mềm biên dịch chương trình C: Turbo C ++, Dev C++, C Free, Visual C++, …\r\n[2] Websites: \r\nhttps://www.tutorialspoint.com/cprogramming\r\nhttps://www.learn-c.org\r\nhttps://github.com', '2024-10-13 10:55:26', '2024-10-13 10:55:26');

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
(1, '●	Sinh viên có trách nhiệm tham dự đầy đủ các buổi học. Trong trường hợp phải nghỉ học vì lý do bất khả kháng thì phải có giấy tờ chứng minh đầy đủ và hợp lý.\r\n●	Sinh viên vắng quá 20% số giờ dự giảng của học phần bị xem như không hoàn thành học phần và phải đăng ký học lại vào học kỳ sau. Những trường hợp khác phải do Ban Giám hiệu hoặc Trưởng khoa quyết định.', '●	Học phần được thực hiện trên nguyên tắc tôn trọng người học và người dạy. Mọi hành vi làm ảnh hưởng đến quá trình dạy và học đều bị nghiêm cấm.\r\n●	Sinh viên phải đi học đúng giờ qui định. \r\n●	Tuyệt đối không làm ồn, gây ảnh hưởng đến người khác trong quá trình học.\r\n●	Tuyệt đối không được ăn, nhai kẹo cao su, sử dụng các thiết bị như điện thoại để nghe nhạc trong giờ học.\r\n●	Máy tính xách tay, máy tính bảng chỉ được sử dụng trên lớp với mục đích ghi chép bài giảng, tính toán phục vụ bài giảng, bài tập. Tuyệt đối không dùng vào việc khác.\r\n●	Sinh viên vi phạm các nguyên tắc trên sẽ bị mời ra khỏi lớp và bị coi là vắng buổi học đó.', 'Các vấn đề liên quan đến xin bảo lưu điểm, khiếu nại điểm, chấm phúc tra, kỷ luật thi cử được thực hiện theo quy chế học vụ của Trường Đại học Trà Vinh.', '2024-10-13 10:42:15', '2024-10-13 10:42:15'),
(2, '●	Sinh viên có trách nhiệm tham dự đầy đủ các buổi học. Trong trường hợp phải nghỉ học vì lý do bất khả kháng thì phải có giấy tờ chứng minh đầy đủ và hợp lý.\r\n●	Sinh viên vắng quá 20% số giờ dự giảng của học phần bị xem như không hoàn thành học phần và phải đăng ký học lại vào học kỳ sau. Những trường hợp khác phải do Ban Giám hiệu hoặc Trưởng khoa quyết định.', '●	Học phần được thực hiện trên nguyên tắc tôn trọng người học và người dạy. Mọi hành vi làm ảnh hưởng đến quá trình dạy và học đều bị nghiêm cấm.\r\n●	Sinh viên phải đi học đúng giờ qui định. \r\n●	Tuyệt đối không làm ồn, gây ảnh hưởng đến người khác trong quá trình học.\r\n●	Tuyệt đối không được ăn, nhai kẹo cao su, sử dụng các thiết bị như điện thoại để nghe nhạc trong giờ học.\r\n●	Máy tính xách tay, máy tính bảng chỉ được sử dụng trên lớp với mục đích ghi chép bài giảng, tính toán phục vụ bài giảng, bài tập. Tuyệt đối không dùng vào việc khác.\r\n●	Sinh viên vi phạm các nguyên tắc trên sẽ bị mời ra khỏi lớp và bị coi là vắng buổi học đó.', 'Các vấn đề liên quan đến xin bảo lưu điểm, khiếu nại điểm, chấm phúc tra, kỷ luật thi cử được thực hiện theo quy chế học vụ của Trường Đại học Trà Vinh.', '2024-10-13 10:50:05', '2024-10-13 10:50:05'),
(3, '●	Sinh viên có trách nhiệm tham dự đầy đủ các buổi học. Trong trường hợp phải nghỉ học vì lý do bất khả kháng thì phải có giấy tờ chứng minh đầy đủ và hợp lý.\r\n●	Sinh viên vắng quá 20% số giờ dự giảng của học phần bị xem như không hoàn thành học phần và phải đăng ký học lại vào học kỳ sau. Những trường hợp khác phải do Ban Giám hiệu hoặc Trưởng khoa quyết định.', '●	Học phần được thực hiện trên nguyên tắc tôn trọng người học và người dạy. Mọi hành vi làm ảnh hưởng đến quá trình dạy và học đều bị nghiêm cấm.\r\n●	Sinh viên phải đi học đúng giờ qui định. \r\n●	Tuyệt đối không làm ồn, gây ảnh hưởng đến người khác trong quá trình học.\r\n●	Tuyệt đối không được ăn, nhai kẹo cao su, sử dụng các thiết bị như điện thoại để nghe nhạc trong giờ học.\r\n●	Máy tính xách tay, máy tính bảng chỉ được sử dụng trên lớp với mục đích ghi chép bài giảng, tính toán phục vụ bài giảng, bài tập. Tuyệt đối không dùng vào việc khác.\r\n●	Sinh viên vi phạm các nguyên tắc trên sẽ bị mời ra khỏi lớp và bị coi là vắng buổi học đó.', 'Các vấn đề liên quan đến xin bảo lưu điểm, khiếu nại điểm, chấm phúc tra, kỷ luật thi cử được thực hiện theo quy chế học vụ của Trường Đại học Trà Vinh.', '2024-10-13 10:55:26', '2024-10-13 10:55:26');

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
(1, 'Anh văn không chuyên 1, 2, 3                          MSHP:', '(tên học phần)                                             MSHP: ……..', 'Kiến thức: Không\r\nKỹ năng: Đọc hiểu tài liệu tiếng Anh\r\nThái độ: Nghiêm túc', '2024-10-13 10:42:15', '2024-10-13 10:42:15'),
(2, 'Mạng máy tính                                            MSHP: ……..', '(tên học phần)                                             MSHP: ……..', 'Kiến thức: Mạng máy tính\r\nKỹ năng: Đọc hiểu tài liệu tiếng Anh\r\nThái độ: Tự học', '2024-10-13 10:50:05', '2024-10-13 10:50:05'),
(3, 'KHÔNG', 'KHÔNG', 'Sinh viên cần có kiến thức toán phổ thông, các học phần khoa học cơ bản, có kỹ năng suy luận giải quyết vấn đề, kỹ năng sử dụng máy tính điện tử, có kỹ năng tìm kiếm thông tin và có ý thức học tập tích cực.\r\nSinh viên cần tham gia đầy đủ các buổi học kể cả lý thuyết và thực hành.', '2024-10-13 10:55:26', '2024-10-13 10:55:26');

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
(1, 'Đại học', 'Công nghệ thông tin', NULL, '2024-10-13 10:42:15', '2024-10-13 10:42:15'),
(2, 'Đại học', 'Công nghệ thông tin', NULL, '2024-10-13 10:50:05', '2024-10-13 10:50:05'),
(3, 'Đại học', 'Công nghệ thông tin', NULL, '2024-10-13 10:55:26', '2024-10-13 10:55:26');

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
(1, 'Guest', 'guest@guest.com', '$2y$10$lQmigbBN5NBbseJcmf3xkuzd5dTt71sA6aocV/rN7kqN9v/Ove7ZS', 0, '', NULL, 3, 0, '2024-09-18 00:25:37', '2024-09-18 00:26:31'),
(2, 'Duck', 'duck@admin.com', '$2y$10$lQmigbBN5NBbseJcmf3xkuzd5dTt71sA6aocV/rN7kqN9v/Ove7ZS', 0, '', '28DqnbPZoKYu0gfomcvWQHRPoRiXtLWwmHByyMYjhAkoh9OWgLVH2gjJh8hi', 1, 0, '2024-06-25 09:45:52', '2024-09-18 00:32:06'),
(3, 'Nguyễn Nhứt Lam', 'lamnn@tvu.edu.vn', '$2y$10$JqnZNGkqCY6VJc7DbYhHBuG.HFfsXridbNXiPaf7/s1Q2n96TCr2e', 919556441, 'CNTT', NULL, 2, 0, '2024-10-13 10:28:54', '2024-10-13 10:28:54'),
(4, 'Nguyễn Ngọc Đan Thanh', 'ngocdanthanhdt@tvu.edu.vn', '$2y$10$lC8t6WhvbjyJQJJRsr6t4.//XTJDoJrDKisuRrF9k9EHmt2VOPOyu', 916741252, 'CNTT', NULL, 2, 0, '2024-10-13 10:29:27', '2024-10-13 10:29:27'),
(5, 'Lê Quốc Điền', 'dien72@hotmail.com', '$2y$10$I9ltEkrU9TC0QFBY65rD.ecYZNwbO8ZVYlPdletYbLHJcTmfaY5.2', 2943855246132, 'Nông nghiệp - Thủy sản', NULL, 2, 0, '2024-10-13 10:31:53', '2024-10-13 10:31:53');

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
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `evaluations`
--
ALTER TABLE `evaluations`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `information`
--
ALTER TABLE `information`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `outputs`
--
ALTER TABLE `outputs`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `references`
--
ALTER TABLE `references`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `regulations`
--
ALTER TABLE `regulations`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `requirements`
--
ALTER TABLE `requirements`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
