-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 05, 2021 lúc 03:40 PM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `qlkh`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dotkekhai`
--

CREATE TABLE `dotkekhai` (
  `MaDot` bigint(20) UNSIGNED NOT NULL,
  `ThoiGianBatDau` datetime NOT NULL,
  `ThoiGianKetThuc` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `dotkekhai`
--

INSERT INTO `dotkekhai` (`MaDot`, `ThoiGianBatDau`, `ThoiGianKetThuc`, `created_at`, `updated_at`) VALUES
(1, '2020-01-01 00:00:00', '2020-12-31 23:59:59', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hocham`
--

CREATE TABLE `hocham` (
  `MaHocHam` bigint(20) UNSIGNED NOT NULL,
  `TenHocHam` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DiemDMHH` int(11) NOT NULL,
  `MaDot` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hocham`
--

INSERT INTO `hocham` (`MaHocHam`, `TenHocHam`, `DiemDMHH`, `MaDot`, `created_at`, `updated_at`) VALUES
(1, 'Giáo sư', 700, 1, NULL, NULL),
(2, 'Phó giáo sư', 660, 1, NULL, NULL),
(3, 'Giảng viên cao cấp', 660, 1, NULL, NULL),
(4, 'Tiến sĩ', 630, 1, NULL, NULL),
(5, 'Giảng viên chính', 630, 1, NULL, NULL),
(6, 'Thạc sĩ', 590, 1, NULL, NULL),
(7, 'Giảng viên', 590, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hochamtam`
--

CREATE TABLE `hochamtam` (
  `MaHocHam` int(11) NOT NULL,
  `TenHocHam` varchar(250) NOT NULL,
  `DiemDMHH` int(11) NOT NULL,
  `MaDot` int(11) NOT NULL,
  `Active` int(11) NOT NULL,
  `updated_at` time DEFAULT NULL,
  `created_at` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `hochamtam`
--

INSERT INTO `hochamtam` (`MaHocHam`, `TenHocHam`, `DiemDMHH`, `MaDot`, `Active`, `updated_at`, `created_at`) VALUES
(1, 'Giáo sư', 710, 2, 1, '12:07:32', '12:07:32'),
(2, 'Giáo sư', 710, 2, 1, '12:08:05', '12:08:05'),
(3, 'Giáo sư', 710, 2, 1, '12:29:58', '12:29:58'),
(4, 'Giáo sư', 1, 2, 1, '12:31:54', '12:31:54');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaimiengiam`
--

CREATE TABLE `loaimiengiam` (
  `MaMienGiam` bigint(20) UNSIGNED NOT NULL,
  `TenMienGiam` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DiemMienGiam` int(11) NOT NULL,
  `TyLeMienGiam` double(3,2) NOT NULL,
  `MaDot` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(15, '2014_10_12_000000_create_users_table', 1),
(16, '2014_10_12_100000_create_password_resets_table', 1),
(17, '2019_08_19_000000_create_failed_jobs_table', 1),
(18, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(19, '2021_09_29_143842_dot_ke_khai', 1),
(20, '2021_09_29_144738_loai_mien_giam', 1),
(21, '2021_09_30_155556_hoc_ham', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `dotkekhai`
--
ALTER TABLE `dotkekhai`
  ADD PRIMARY KEY (`MaDot`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `hocham`
--
ALTER TABLE `hocham`
  ADD PRIMARY KEY (`MaHocHam`),
  ADD KEY `hocham_madot_foreign` (`MaDot`);

--
-- Chỉ mục cho bảng `hochamtam`
--
ALTER TABLE `hochamtam`
  ADD PRIMARY KEY (`MaHocHam`);

--
-- Chỉ mục cho bảng `loaimiengiam`
--
ALTER TABLE `loaimiengiam`
  ADD PRIMARY KEY (`MaMienGiam`),
  ADD KEY `loaimiengiam_madot_foreign` (`MaDot`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `dotkekhai`
--
ALTER TABLE `dotkekhai`
  MODIFY `MaDot` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `hocham`
--
ALTER TABLE `hocham`
  MODIFY `MaHocHam` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `hochamtam`
--
ALTER TABLE `hochamtam`
  MODIFY `MaHocHam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `loaimiengiam`
--
ALTER TABLE `loaimiengiam`
  MODIFY `MaMienGiam` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `hocham`
--
ALTER TABLE `hocham`
  ADD CONSTRAINT `hocham_madot_foreign` FOREIGN KEY (`MaDot`) REFERENCES `dotkekhai` (`MaDot`);

--
-- Các ràng buộc cho bảng `loaimiengiam`
--
ALTER TABLE `loaimiengiam`
  ADD CONSTRAINT `loaimiengiam_madot_foreign` FOREIGN KEY (`MaDot`) REFERENCES `dotkekhai` (`MaDot`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
