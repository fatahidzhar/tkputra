-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 09 Jul 2023 pada 17.14
-- Versi server: 5.7.33
-- Versi PHP: 8.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tkputraix`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `absensis`
--

CREATE TABLE `absensis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uu_absen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uuid_g` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uuid_m` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `kehadiran` tinyint(1) NOT NULL,
  `tahun_ajaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `absensis`
--

INSERT INTO `absensis` (`id`, `uu_absen`, `uuid_g`, `uuid_m`, `tanggal`, `kehadiran`, `tahun_ajaran`, `status`, `created_at`, `updated_at`) VALUES
(1, '25d5b07c-641a-4c9c-a4a0-e727c351b0c8-0-2023-05-24', '854ba06d-c471-4236-921b-be82bb6514c2', '25d5b07c-641a-4c9c-a4a0-e727c351b0c8', '2023-05-24', 4, '2023', '0', '2023-05-24 03:14:47', '2023-05-24 03:14:47'),
(2, '6af3d5d4-4f3a-4409-83c0-c526b483f661-1-2023-05-24', '854ba06d-c471-4236-921b-be82bb6514c2', '6af3d5d4-4f3a-4409-83c0-c526b483f661', '2023-05-24', 1, '2023', '0', '2023-05-24 03:14:47', '2023-05-24 03:14:47'),
(3, '25d5b07c-641a-4c9c-a4a0-e727c351b0c8-0-2023-05-23', '854ba06d-c471-4236-921b-be82bb6514c2', '25d5b07c-641a-4c9c-a4a0-e727c351b0c8', '2023-05-23', 1, '2023', '0', '2023-05-25 04:05:54', '2023-05-25 04:05:54'),
(4, '6af3d5d4-4f3a-4409-83c0-c526b483f661-1-2023-05-23', '854ba06d-c471-4236-921b-be82bb6514c2', '6af3d5d4-4f3a-4409-83c0-c526b483f661', '2023-05-23', 1, '2023', '0', '2023-05-25 04:05:54', '2023-05-25 04:05:54'),
(5, '25d5b07c-641a-4c9c-a4a0-e727c351b0c8-0-2023-05-22', '854ba06d-c471-4236-921b-be82bb6514c2', '25d5b07c-641a-4c9c-a4a0-e727c351b0c8', '2023-05-22', 2, '2023', '0', '2023-05-25 04:06:29', '2023-05-25 04:06:29'),
(6, '6af3d5d4-4f3a-4409-83c0-c526b483f661-1-2023-05-22', '854ba06d-c471-4236-921b-be82bb6514c2', '6af3d5d4-4f3a-4409-83c0-c526b483f661', '2023-05-22', 1, '2023', '0', '2023-05-25 04:06:29', '2023-05-25 04:06:29'),
(7, '25d5b07c-641a-4c9c-a4a0-e727c351b0c8-0-2023-05-15', '854ba06d-c471-4236-921b-be82bb6514c2', '25d5b07c-641a-4c9c-a4a0-e727c351b0c8', '2023-05-15', 1, '2023', '0', '2023-05-25 04:06:56', '2023-05-25 04:06:56'),
(8, '6af3d5d4-4f3a-4409-83c0-c526b483f661-1-2023-05-15', '854ba06d-c471-4236-921b-be82bb6514c2', '6af3d5d4-4f3a-4409-83c0-c526b483f661', '2023-05-15', 1, '2023', '0', '2023-05-25 04:06:56', '2023-05-25 04:06:56'),
(9, '25d5b07c-641a-4c9c-a4a0-e727c351b0c8-0-2023-05-09', '854ba06d-c471-4236-921b-be82bb6514c2', '25d5b07c-641a-4c9c-a4a0-e727c351b0c8', '2023-05-09', 2, '2023', '0', '2023-05-28 08:52:26', '2023-05-28 08:52:26'),
(10, '6af3d5d4-4f3a-4409-83c0-c526b483f661-1-2023-05-09', '854ba06d-c471-4236-921b-be82bb6514c2', '6af3d5d4-4f3a-4409-83c0-c526b483f661', '2023-05-09', 3, '2023', '0', '2023-05-28 08:52:26', '2023-05-28 08:52:26'),
(11, '25d5b07c-641a-4c9c-a4a0-e727c351b0c8-0-2023-05-16', '854ba06d-c471-4236-921b-be82bb6514c2', '25d5b07c-641a-4c9c-a4a0-e727c351b0c8', '2023-05-16', 3, '2023', '0', '2023-05-28 08:52:37', '2023-05-28 08:52:37'),
(12, '6af3d5d4-4f3a-4409-83c0-c526b483f661-1-2023-05-16', '854ba06d-c471-4236-921b-be82bb6514c2', '6af3d5d4-4f3a-4409-83c0-c526b483f661', '2023-05-16', 2, '2023', '0', '2023-05-28 08:52:37', '2023-05-28 08:52:37'),
(13, '25d5b07c-641a-4c9c-a4a0-e727c351b0c8-0-2023-05-28', '854ba06d-c471-4236-921b-be82bb6514c2', '25d5b07c-641a-4c9c-a4a0-e727c351b0c8', '2023-05-28', 3, '2023', '0', '2023-05-28 15:53:08', '2023-05-29 08:08:36'),
(14, '6af3d5d4-4f3a-4409-83c0-c526b483f661-1-2023-05-28', '854ba06d-c471-4236-921b-be82bb6514c2', '6af3d5d4-4f3a-4409-83c0-c526b483f661', '2023-05-28', 3, '2023', '0', '2023-05-28 15:53:08', '2023-05-29 08:08:36'),
(15, '25d5b07c-641a-4c9c-a4a0-e727c351b0c8-0-2023-06-13', '854ba06d-c471-4236-921b-be82bb6514c2', '25d5b07c-641a-4c9c-a4a0-e727c351b0c8', '2023-06-13', 1, '2023', '0', '2023-06-22 08:22:11', '2023-06-22 08:22:11'),
(16, '6af3d5d4-4f3a-4409-83c0-c526b483f661-1-2023-06-13', '854ba06d-c471-4236-921b-be82bb6514c2', '6af3d5d4-4f3a-4409-83c0-c526b483f661', '2023-06-13', 1, '2023', '0', '2023-06-22 08:22:11', '2023-06-22 08:22:11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `aspek_k_d_s`
--

CREATE TABLE `aspek_k_d_s` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uu_kd` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uu_mapel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_kd` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kd` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `aspek_k_d_s`
--

INSERT INTO `aspek_k_d_s` (`id`, `uu_kd`, `uu_mapel`, `no_kd`, `kd`, `created_at`, `updated_at`) VALUES
(1, 'fc774fbd-6db6-47b8-a949-c1688c7a786a', '1c3a5b94-33a3-4ac7-af64-8108715dcfc3', '1.1', 'Mempercayai Adanya Tuhan melalui ciptaanNya.', '2023-05-19 15:47:54', '2023-05-19 15:47:54'),
(2, '3e8efe41-0011-46f9-be67-bec78d4008e4', '1c3a5b94-33a3-4ac7-af64-8108715dcfc3', '1.2', 'Menghargai diri sendiri, orang lain, dan lingkungan sekitar sebagai rasa syukur kepada Tuhan.', '2023-05-19 15:48:04', '2023-05-19 15:48:04'),
(3, 'c9ddbbaa-4120-45de-bef3-345b42a9103f', '1c3a5b94-33a3-4ac7-af64-8108715dcfc3', '2.13', 'Memiliki perilaku yang mencerminkan sikap jujur.', '2023-05-19 15:48:59', '2023-05-19 15:48:59'),
(4, 'a1641e93-cdac-4f50-a77c-af155edbbe5e', '1c3a5b94-33a3-4ac7-af64-8108715dcfc3', '3.1', 'Mengenal kegiatan beribadah sehari - hari.', '2023-05-19 15:49:12', '2023-05-19 15:49:12'),
(5, 'c3538b35-b30f-465b-af36-7ad556063287', '1c3a5b94-33a3-4ac7-af64-8108715dcfc3', '4.1', 'Melakukan kegiatan beribadah sehari - hari dengan tuntunan orang dewasa.', '2023-05-19 15:49:22', '2023-05-19 15:49:22'),
(6, '30412e2d-6b63-4a41-9cca-1c78a7814dbc', '1c3a5b94-33a3-4ac7-af64-8108715dcfc3', '3.2', 'Mengenal perilaku baik sebagai cerminan akhlak mulia.', '2023-05-19 15:49:34', '2023-05-19 15:49:34'),
(7, 'f95d4dd5-e299-41e7-b496-ed085f3735e2', '1c3a5b94-33a3-4ac7-af64-8108715dcfc3', '4.2', 'Menunjukkan perilaku santun sebagai cerminan akhlak mulia.', '2023-05-19 15:49:46', '2023-05-19 15:49:46'),
(8, '2615b688-80ad-48df-bf13-2d7db5ecac5f', 'cfa1d354-4504-4e9f-a7e2-33f197b807be', '2.1', 'Memiliki perilaku yang mencerminkan hidup sehat.', '2023-05-19 15:50:10', '2023-05-19 15:50:10'),
(9, '1729234f-6711-4500-8a8d-d9675cddbe1b', 'cfa1d354-4504-4e9f-a7e2-33f197b807be', '3.3', 'Mengenal anggota tubuh, fungsi dan gerakannya untuk perkembangan motorik kasar dan motorik halus.', '2023-05-19 15:50:20', '2023-05-19 15:50:20'),
(10, 'e16f4617-7b73-4fe7-9818-eaf0fb7052bc', 'cfa1d354-4504-4e9f-a7e2-33f197b807be', '4.3', 'Menggunakan anggota tubuh untuk pengembangan motorik kasar dan halus.', '2023-05-19 15:50:46', '2023-05-19 15:50:46'),
(11, 'e6b2fdac-71a4-4379-886e-cb7f2ef9d12d', 'cfa1d354-4504-4e9f-a7e2-33f197b807be', '3.4', 'Mengetahui cara hidup sehat.', '2023-05-19 15:50:57', '2023-05-19 15:50:57'),
(12, '857f0a4d-042f-4e87-8fd5-13b297134ae3', 'cfa1d354-4504-4e9f-a7e2-33f197b807be', '4.4', 'Mampu menolong diri sendiri untuk hidup sehat.', '2023-05-19 15:51:08', '2023-05-19 15:51:08'),
(13, 'bd69cd65-cf52-4e5d-a755-2fe8561a68f9', 'cfa1d354-4504-4e9f-a7e2-33f197b807be', '2.4', 'Memiliki perilaku yang mencerminkan sikap estetis.', '2023-05-19 15:51:23', '2023-05-19 15:51:23'),
(14, '0f8e6155-d725-4877-9805-0a9a69fa97a7', 'cfa1d354-4504-4e9f-a7e2-33f197b807be', '3.15', 'Mengenal berbagai karya dan aktivitas seni.', '2023-05-19 15:51:37', '2023-05-19 15:51:37'),
(15, '234478eb-ec38-4b53-9593-b3fbf604b0fb', 'cfa1d354-4504-4e9f-a7e2-33f197b807be', '4.15', 'Menunjukkan karya dan aktivitas seni dengan menggunakan berbagai media.', '2023-05-19 15:51:50', '2023-05-19 15:51:50'),
(16, '4c96542d-cacc-44c6-aed7-1992a557b973', '52479a18-96fe-4f42-8d39-f8ae885c3e50', '2.2', 'Memiliki perilaku yang mencerminkan sikap ingin tahu.', '2023-05-19 15:52:34', '2023-05-19 15:52:34'),
(17, 'ea4b6fa8-1a79-4d77-aa28-83f9d7a134ab', '52479a18-96fe-4f42-8d39-f8ae885c3e50', '2.3', 'Memilki perilaku yang mencerminkan sikap kreatif.', '2023-05-19 15:52:45', '2023-05-19 15:52:45'),
(18, 'b23329b3-70f4-4461-b8d1-9f0a7935d6f9', '52479a18-96fe-4f42-8d39-f8ae885c3e50', '3.5', 'Mengetahui cara memecahkan masalah sehari - hari dan berperilaku kreatif.', '2023-05-19 15:53:04', '2023-05-19 15:53:04'),
(19, '3a239153-070c-48a6-91f7-cd703c8fd43e', '52479a18-96fe-4f42-8d39-f8ae885c3e50', '3.6', 'Mengenal benda - benda disekitarnya (nama, warna, bentuk, ukuran, pola, sifat, suara, tekstur, fungsi dan ciri - ciri lainnya).', '2023-05-19 15:53:14', '2023-05-19 15:53:14'),
(20, 'adf25cc4-8835-4a99-8c9b-e7aba8bb7b4d', '52479a18-96fe-4f42-8d39-f8ae885c3e50', '4.6', 'Menyampaikan tentang apa dan bagaimana benda - benda disekitar yang dikenalnya (nama, warna, bentuk, ukuran, pola, sifat, suara, tekstur, fungsi dan ciri - ciri lainnya) melalui berbagai hasil karya.', '2023-05-19 15:53:27', '2023-05-19 15:53:27'),
(21, '20fec495-2d77-4042-bc03-55b184a4b195', '52479a18-96fe-4f42-8d39-f8ae885c3e50', '3.7', 'Mengenal lingkungan sosial (keluarga, teman, tempat tinggal, tempat ibadah, budaya, transportasi).', '2023-05-19 15:53:48', '2023-05-19 15:53:48'),
(22, 'df9be09f-8e34-44e6-9759-14282174291e', '52479a18-96fe-4f42-8d39-f8ae885c3e50', '4.7', 'Menyajikan berbabagai karya yang berhubungan dengan lingkungan sosial (keluarga, teman, tempat tinggal, tempat ibadah, budaya, transportasi) dalam bentuk gambar, bercerita, bernyanyi,dan gerak tubuh.', '2023-05-19 15:54:02', '2023-05-19 15:54:02'),
(23, '30b676ed-1187-4e99-950e-ba9b8eeaa421', '52479a18-96fe-4f42-8d39-f8ae885c3e50', '3.8', 'Mengenal lingkungan alam (hewan, tanaman, cuaca, tanah, air, batu-batuan Dll).', '2023-05-19 15:54:19', '2023-05-19 15:54:19'),
(24, '7d72a904-72b9-4b8b-a6ab-eabd2e604025', '52479a18-96fe-4f42-8d39-f8ae885c3e50', '4.8', 'Menyajikan berbagai karya yang berhubungan dengan lingkungan alam (hewan, tanaman, cuaca, tanah, air, batu-batuan dll) dalam bentuk gambar, bercerita, bernyanyi dan gerak tubuh.', '2023-05-19 15:54:35', '2023-05-19 15:54:35'),
(25, '179ab835-0250-47a1-a4cc-e36c1013afec', '52479a18-96fe-4f42-8d39-f8ae885c3e50', '3.9', 'Mengenal teknologi sederhana (peralatan rumah tangga, peralatan bermain, peralatan pertukangan Dll).', '2023-05-19 15:54:52', '2023-05-19 15:54:52'),
(26, 'ae3c09e3-9eae-4f7c-9a1f-2fa321cb0e5e', '52479a18-96fe-4f42-8d39-f8ae885c3e50', '4.9', 'Menggunakan teknologi sederhana untuk menyelesaikan tugas dan kegiatannya (peralatan rumah tangga, peralatan bermain, peralatan pertukangan dll).', '2023-05-19 15:55:06', '2023-05-19 15:55:06'),
(27, '2df92a1b-9c87-4e62-b123-24c562c6b706', 'b788bf05-430d-4346-8909-5beeab316fc8', '2.5', 'Memiliki perilaku yang mencerminkan sikap percaya diri.', '2023-05-19 15:55:29', '2023-05-19 15:55:29'),
(28, 'dfdb56f5-219c-4ab4-b6e6-2a4325c4e2fe', 'b788bf05-430d-4346-8909-5beeab316fc8', '2.6', 'Memiliki perilaku yang mencerminkan sikap taat terhadap aturan sehari - hari untuk melatih kedisiplinan.', '2023-05-19 15:55:43', '2023-05-19 15:55:43'),
(29, 'a7b22a84-a1de-41f7-80ce-40ca3f809ec7', 'b788bf05-430d-4346-8909-5beeab316fc8', '2.7', 'Memiliki perilaku yang mencerminkan sikap sabar.', '2023-05-19 15:55:56', '2023-05-19 15:55:56'),
(30, '29d23123-c3f0-482d-92f2-ef9e994f8be1', 'b788bf05-430d-4346-8909-5beeab316fc8', '2.8', 'Memilki perilaku yang mencerminkan kemandirian.', '2023-05-19 15:56:07', '2023-05-19 15:56:07'),
(31, '42e6024a-0919-4d70-8b0e-ae5e16f4c7be', 'b788bf05-430d-4346-8909-5beeab316fc8', '2.9', 'Memiliki perilaku yang mencerminkan sikap peduli dan mau membantu jika diminta bantuannya', '2023-05-19 15:56:20', '2023-05-19 15:56:20'),
(32, 'b5df937c-aaf3-45a5-9335-155c8baedd59', 'b788bf05-430d-4346-8909-5beeab316fc8', '2.10', 'Memiliki perilaku yang mencerminkan sikap menghargai dan toleran kepada orang lain.', '2023-05-19 15:56:33', '2023-05-19 15:56:33'),
(33, '8c48ecae-21b8-4a7d-b5cf-8935c11ad5db', 'b788bf05-430d-4346-8909-5beeab316fc8', '2.11', 'Memilki perilaku yang dapat menyesuaikan diri.', '2023-05-19 15:56:47', '2023-05-19 15:56:47'),
(34, '35fd98cd-6645-4bcf-a746-ea723d37269c', 'b788bf05-430d-4346-8909-5beeab316fc8', '2.12', 'Memiliki perilaku yang mencerminkan sikap tanggung jawab.', '2023-05-19 15:57:01', '2023-05-19 15:57:01'),
(35, 'c5d832de-d203-453a-9666-7701b86e3fd3', 'b788bf05-430d-4346-8909-5beeab316fc8', '3.13', 'Mengenal emosi diri dan orang lain.', '2023-05-19 15:57:17', '2023-05-19 15:57:17'),
(36, 'f10b8b10-afdb-42ef-9717-bcc036da04a4', 'b788bf05-430d-4346-8909-5beeab316fc8', '4.13', 'Menunjukkan reaksi emosi diri secara wajar.', '2023-05-19 15:57:28', '2023-05-19 15:57:28'),
(37, '27f8d33a-f63a-4b93-9680-73e807153119', 'b788bf05-430d-4346-8909-5beeab316fc8', '3.14', 'Mengenali kebutuhan, keinginan, dan minat diri.', '2023-05-19 15:57:41', '2023-05-19 15:57:41'),
(38, '401d157f-174f-4868-86b7-5a1b153d271a', 'b788bf05-430d-4346-8909-5beeab316fc8', '4.14', 'Mengungkapkan kebutuhan, keinginan, dan minat diri dengan cara yang tepat dan orang lain.', '2023-05-19 15:58:03', '2023-05-19 15:58:03'),
(39, '64df37e9-b47a-4f04-832d-0fedc1bc9b07', '83a89628-28f8-4b56-90b2-8b886fdcc3e3', '2.14', 'Memilki perilaku yang mencerminkan sikap rendah hati dan santun kepada orang tua, pendidik, dan teman.', '2023-05-19 15:59:04', '2023-05-19 15:59:04'),
(40, 'bca8845d-34db-4cb9-a67c-aef68b67969d', '83a89628-28f8-4b56-90b2-8b886fdcc3e3', '3.10', 'Memahami bahasa reseptif (menyimak dan membaca).', '2023-05-19 15:59:18', '2023-05-19 15:59:18'),
(41, '8613d486-d3e5-47c1-8b47-9446666eaf45', '83a89628-28f8-4b56-90b2-8b886fdcc3e3', '4.10', 'Menunjukkan kemampuan bahasa reseptif (menyimak dan membaca).', '2023-05-19 15:59:33', '2023-05-19 15:59:33'),
(42, 'ba3f16c8-2a5b-4a42-a8e3-85e479f5b6e7', '83a89628-28f8-4b56-90b2-8b886fdcc3e3', '3.11', 'Memahami bahasa ekspresif (mengungkapkan bahasa secara verbal dan non verbal).', '2023-05-19 15:59:44', '2023-05-19 15:59:44'),
(43, '262ffb9d-16e2-4d58-9962-7707a7f0cc1a', '83a89628-28f8-4b56-90b2-8b886fdcc3e3', '4.11', 'Menunjukkan kemampuan bahasa ekspresif (mengungkapkan bahasa secara verbal dan non verbal).', '2023-05-19 15:59:58', '2023-05-19 15:59:58'),
(44, '495b9bec-019c-436b-a178-9a9952748d68', '83a89628-28f8-4b56-90b2-8b886fdcc3e3', '3.12', 'Mengenal keaksaraan awal melalui bermain.', '2023-05-19 16:00:09', '2023-05-19 16:00:09'),
(45, '8a2356dd-ef6f-467c-bbf6-73e59fb32e9f', '83a89628-28f8-4b56-90b2-8b886fdcc3e3', '4.12', 'Menunjukkan kemampuan keaksaraan awal dalam berbagai bentuk karya.', '2023-05-19 16:00:20', '2023-05-19 16:00:20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uu_categori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uu_categori_attrs` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `categories`
--

INSERT INTO `categories` (`id`, `uu_categori`, `uu_categori_attrs`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'CG-0001', 'AG', 'Islam', '0', '2023-02-14 04:22:49', '2023-02-14 04:22:49'),
(2, 'CG-0002', 'AG', 'Kristen Protestan', '0', '2023-02-14 04:23:17', '2023-02-14 04:23:17'),
(3, 'CG-0003', 'AG', 'Kristen Katolik', '0', '2023-02-14 04:23:45', '2023-02-14 04:23:45'),
(4, 'CG-0004', 'AG', 'Hindu', '0', '2023-02-14 04:23:57', '2023-02-14 04:23:57'),
(5, 'CG-0005', 'AG', 'Buddha', '0', '2023-02-14 04:24:08', '2023-02-14 04:24:08'),
(6, 'CG-0006', 'AG', 'Konghucu', '0', '2023-02-14 04:24:18', '2023-02-14 04:24:18'),
(7, 'CG-0007', 'PW', 'Ibu Rumah Tangga', '0', '2023-02-14 04:24:52', '2023-02-14 04:24:52'),
(8, 'CG-0008', 'PW', 'PNS', '0', '2023-02-14 04:27:49', '2023-02-14 04:27:49'),
(9, 'CG-0009', 'PW', 'Polisi', '0', '2023-02-14 04:29:09', '2023-02-14 04:29:09'),
(10, 'CG-0010', 'PW', 'Pegawai Bank', '0', '2023-02-14 04:29:16', '2023-02-14 04:29:16'),
(11, 'CG-0011', 'PW', 'Pegawai Pajak', '0', '2023-02-14 04:29:29', '2023-02-14 04:29:29'),
(12, 'CG-0012', 'PW', 'Sofware Engineer', '0', '2023-02-14 04:29:42', '2023-02-14 04:29:42'),
(13, 'CG-0013', 'PW', 'Backend Developer', '0', '2023-02-14 04:29:52', '2023-02-14 04:29:52'),
(14, 'CG-0014', 'PW', 'Frontend Developerr', '0', '2023-02-14 04:30:01', '2023-02-14 04:30:01'),
(15, 'CG-0015', 'PW', 'Pelatih', '0', '2023-02-14 04:30:20', '2023-02-14 04:30:20'),
(16, 'CG-0016', 'GE', 'Laki - Laki', '0', '2023-02-14 04:30:32', '2023-02-14 04:30:32'),
(17, 'CG-0017', 'GE', 'Perempuan', '0', '2023-02-14 04:31:12', '2023-02-14 04:31:12'),
(18, 'CG-0018', 'KS', 'Tempat Tunggu', '0', '2023-02-14 04:32:01', '2023-02-14 04:32:01'),
(19, 'CG-0019', 'KS', 'Tempat Bermain', '0', '2023-02-14 04:32:17', '2023-02-14 04:32:17'),
(20, 'CG-0020', 'KS', 'Ruangan Belajar', '0', '2023-02-14 04:32:38', '2023-02-14 04:32:38'),
(21, 'CG-0021', 'KS', 'Tata Kerama', '0', '2023-02-14 04:33:31', '2023-02-14 04:33:31'),
(22, 'CG-0022', 'KS', 'Sopan Santun', '0', '2023-02-14 04:33:44', '2023-02-14 04:33:44'),
(23, 'CG-0023', 'PT', 'D3', '0', '2023-02-27 08:20:26', '2023-02-27 08:20:26'),
(24, 'CG-0024', 'PT', 'S1', '0', '2023-02-27 08:20:42', '2023-02-27 08:20:42'),
(25, 'CG-0025', 'PT', 'S2', '0', '2023-02-27 08:20:50', '2023-02-27 08:20:50'),
(26, 'CG-0026', 'PT', 'S3', '0', '2023-02-27 08:20:56', '2023-02-27 08:20:56'),
(27, 'CG-0027', 'PT', 'SMP / Sederajat', '0', '2023-02-27 08:21:13', '2023-02-27 08:21:13'),
(28, 'CG-0028', 'PT', 'SMA / Sederajat', '0', '2023-02-27 08:21:23', '2023-02-27 08:21:23'),
(29, 'CG-0029', 'PT', 'SMK / Sederajat', '0', '2023-02-27 08:22:15', '2023-02-27 08:22:15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `categories_attrs`
--

CREATE TABLE `categories_attrs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uu_categori` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `categories_attrs`
--

INSERT INTO `categories_attrs` (`id`, `uu_categori`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'AA', 'Agama', '0', NULL, NULL),
(2, 'PW', 'Pekerjaan', '0', NULL, NULL),
(3, 'GE', 'Gender', '0', NULL, NULL),
(4, 'KS', 'Kritik Saran', '0', NULL, NULL),
(5, 'PT', 'Pendidikan Terakhir', '0', NULL, NULL),
(6, 'JP', 'Jentang Pendidikan', '0', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `classes`
--

CREATE TABLE `classes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uu_class` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_class` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `classes`
--

INSERT INTO `classes` (`id`, `uu_class`, `name_class`, `status`, `created_at`, `updated_at`) VALUES
(1, 'c91767f0-c10f-4c67-a3f6-d5bb101d3fa5', 'AA', '0', '2023-05-19 16:09:26', '2023-05-19 16:09:26'),
(2, '23ce0af1-32c2-4deb-903c-054fee8ec665', 'AB', '0', '2023-05-23 11:27:24', '2023-05-23 11:27:24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uu_categori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uuid_m` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text_tanggapan` longtext COLLATE utf8mb4_unicode_ci,
  `tgl_tanggapan` date DEFAULT NULL,
  `status` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `status1` varchar(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `faqs`
--

INSERT INTO `faqs` (`id`, `uu_categori`, `uuid_m`, `text`, `text_tanggapan`, `tgl_tanggapan`, `status`, `status1`, `created_at`, `updated_at`) VALUES
(1, 'CG-0018', '25d5b07c-641a-4c9c-a4a0-e727c351b0c8', 'Tempat tunggu ada yang retak retak tidak enak untuk di lihat', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '2023-07-09', '1', '1', '2023-05-30 02:14:18', '2023-07-09 10:04:40'),
(2, 'CG-0021', '25d5b07c-641a-4c9c-a4a0-e727c351b0c8', 'Guru kurang tata kerama', 'Terimakasih', '2023-07-09', '1', '2', '2023-05-30 13:52:32', '2023-07-09 09:56:45'),
(3, 'CG-0019', '25d5b07c-641a-4c9c-a4a0-e727c351b0c8', 'testt', NULL, NULL, '1', NULL, '2023-07-09 13:59:40', '2023-07-09 13:59:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gurus`
--

CREATE TABLE `gurus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid_g` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nuptk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` longtext COLLATE utf8mb4_unicode_ci,
  `rt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rw` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kelurahan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kecamatan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tempat_lahir` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tahun_lahir` date DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jabatan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tmt_kerja` date DEFAULT NULL,
  `pend_terakhir` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ket` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tahun` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uu_class` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `gurus`
--

INSERT INTO `gurus` (`id`, `uuid_g`, `nip`, `nuptk`, `address`, `rt`, `rw`, `kelurahan`, `kecamatan`, `agama`, `tempat_lahir`, `tahun_lahir`, `gender`, `image`, `telp`, `jabatan`, `tmt_kerja`, `pend_terakhir`, `ket`, `tahun`, `uu_class`, `status`, `created_at`, `updated_at`) VALUES
(1, '6e3bb829-c4a8-4bbe-9d4f-3c7daafdd50c', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '/images/1685109047.jpg', NULL, 'Guru', NULL, NULL, NULL, '2023', NULL, '0', '2023-05-16 13:22:46', '2023-05-16 13:22:46'),
(2, '854ba06d-c471-4236-921b-be82bb6514c2', '193543361613837980', '1477804506036415', '34 Milton Parkway', '9', '10', 'Expedita aut eiusmod', 'Necessitatibus in of', 'Pilih Agama', 'Dolore tempore est', '1990-07-17', 'Laki - Laki', '/images/1685109047.jpg', '628376571943', 'Kepala Sekolah', '1996-07-15', NULL, 'Et vel quo nostrum n', '2023', 'c91767f0-c10f-4c67-a3f6-d5bb101d3fa5', '0', '2023-05-20 03:19:51', '2023-05-20 03:19:51'),
(3, 'b9e02d14-cd91-4d06-b1a2-d492d5fe4036', '195668572740586880', '8989651578512465', '67 South White Fabien Street', '4', '7', 'Laudantium voluptat', 'Cupiditate voluptatu', 'Islam', 'Earum dolor iusto ut', '2010-04-15', 'Laki - Laki', '/images/default.jpg', '628447592981', 'Guru', '1997-06-26', NULL, 'Architecto incidunt', '2023', NULL, '0', '2023-07-09 10:45:31', '2023-07-09 10:45:31');

-- --------------------------------------------------------

--
-- Struktur dari tabel `information`
--

CREATE TABLE `information` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid_g` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `uu_class` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `information`
--

INSERT INTO `information` (`id`, `uuid_g`, `title`, `text`, `status`, `uu_class`, `created_at`, `updated_at`) VALUES
(1, '6e3bb829-c4a8-4bbe-9d4f-3c7daafdd50c', 'The standard Lorem Ipsum passage, used since the 1500s', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,', '3', NULL, '2023-05-24 06:06:24', '2023-05-24 06:06:24'),
(2, '6e3bb829-c4a8-4bbe-9d4f-3c7daafdd50c', 'Where can I get some?', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable', '3', NULL, '2023-05-24 08:19:05', '2023-05-24 08:19:05'),
(3, '6e3bb829-c4a8-4bbe-9d4f-3c7daafdd50c', 'test', '<p><img src=\"data:image/jpeg;base64,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\" style=\"width: 184px;\" data-filename=\"images (1).jpg\"><br></p>', '3', NULL, '2023-05-24 09:06:21', '2023-05-24 09:06:21'),
(4, '6e3bb829-c4a8-4bbe-9d4f-3c7daafdd50c', 'Where can I get some?', '<p><strong style=\"margin: 0px; padding: 0px; font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify; background-color: rgb(255, 255, 255);\">Lorem Ipsum</strong><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify; background-color: rgb(255, 255, 255);\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</span></p><p><img src=\"data:image/png;base64,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\" style=\"width: 938.667px;\" data-filename=\"Lorem-Ipsum-alternatives.png\"><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify; background-color: rgb(255, 255, 255);\"><br></span></p><p><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify; background-color: rgb(255, 255, 255);\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</span><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify; background-color: rgb(255, 255, 255);\"><br></span><br></p>', '3', NULL, '2023-05-24 09:16:05', '2023-05-24 09:16:05'),
(5, '6e3bb829-c4a8-4bbe-9d4f-3c7daafdd50c', 'Where does it come from?', '<p><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify; background-color: rgb(255, 255, 255);\">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</span></p><p><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify; background-color: rgb(255, 255, 255);\"><br></span></p><p><div style=\"text-align: center;\"><br></div><div style=\"text-align: left;\"><img src=\"https://i.pinimg.com/originals/c1/74/b2/c174b20284895cbd1fdccc7207153377.png\" style=\"width: 700px;\"></div><div style=\"text-align: left;\"><br></div><div style=\"text-align: left;\"><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify; background-color: rgb(255, 255, 255);\">The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</span><br></div></p>', '0', NULL, '2023-05-24 09:18:08', '2023-05-24 09:18:08'),
(7, '854ba06d-c471-4236-921b-be82bb6514c2', 'TESTTT123', '<p>ASDAWD</p>', '0', 'c91767f0-c10f-4c67-a3f6-d5bb101d3fa5', '2023-07-09 16:18:17', '2023-07-09 16:18:17'),
(8, '854ba06d-c471-4236-921b-be82bb6514c2', 'What is Lorem Ipsum', '<p><strong style=\"margin: 0px; padding: 0px; font-family: \"Open Sans\", Arial, sans-serif; font-size: 14px; text-align: justify; background-color: rgb(255, 255, 255);\">Lorem Ipsum</strong><span style=\"font-family: \"Open Sans\", Arial, sans-serif; font-size: 14px; text-align: justify; background-color: rgb(255, 255, 255);\"> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</span><br></p>', '0', 'c91767f0-c10f-4c67-a3f6-d5bb101d3fa5', '2023-07-09 16:19:50', '2023-07-09 16:22:21'),
(9, '6e3bb829-c4a8-4bbe-9d4f-3c7daafdd50c', 'testt1233aa', '<p>asdxxx</p>', '3', NULL, '2023-07-09 17:10:40', '2023-07-09 17:10:40'),
(10, '854ba06d-c471-4236-921b-be82bb6514c2', 'awdasd', '<p>asdwwads</p>', '0', 'c91767f0-c10f-4c67-a3f6-d5bb101d3fa5', '2023-07-09 17:11:36', '2023-07-09 17:11:36');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mapels`
--

CREATE TABLE `mapels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uu_mapel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mapel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `mapels`
--

INSERT INTO `mapels` (`id`, `uu_mapel`, `mapel`, `status`, `created_at`, `updated_at`) VALUES
(1, '1c3a5b94-33a3-4ac7-af64-8108715dcfc3', 'PENGEMBANGAN NILAI AGAMA DAN MORAL', '0', '2023-05-20 05:09:12', '2023-05-20 05:09:12'),
(2, 'cfa1d354-4504-4e9f-a7e2-33f197b807be', 'PERKEMBANGAN FISIK DAN MOTORIK', '0', '2023-05-20 05:09:22', '2023-05-20 05:09:22'),
(3, '52479a18-96fe-4f42-8d39-f8ae885c3e50', 'PERKEMBANGAN KOGNITIF', '0', '2023-05-20 05:09:28', '2023-05-20 05:09:28'),
(4, 'b788bf05-430d-4346-8909-5beeab316fc8', 'SOSIAL EMOSIONAL ', '0', '2023-05-20 05:09:36', '2023-05-20 05:09:36'),
(5, '83a89628-28f8-4b56-90b2-8b886fdcc3e3', 'PERKEMBANGAN BAHASA', '0', '2023-05-20 05:09:43', '2023-05-20 05:09:43');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_02_11_111018_create_gurus_table', 1),
(6, '2023_02_11_111715_create_siswas_table', 1),
(7, '2023_02_11_112120_create_classes_table', 1),
(8, '2023_02_11_113257_create_nilais_table', 1),
(9, '2023_02_11_114638_create_faqs_table', 1),
(10, '2023_02_11_114937_create_information_table', 1),
(11, '2023_02_11_115314_create_categories_table', 1),
(12, '2023_02_13_211303_create_categories_attrs_table', 1),
(13, '2023_02_19_103006_create_pengaduans_table', 1),
(14, '2023_02_20_210408_create_notes_table', 1),
(15, '2023_02_20_211307_create_absensis_table', 1),
(16, '2023_03_11_213327_create_nilais_attrs_table', 1),
(17, '2023_03_27_121332_create_mapels_table', 1),
(18, '2023_05_16_182318_create_raports_table', 1),
(19, '2023_05_16_182632_create_aspek_k_d_s_table', 1),
(20, '2023_05_28_165350_create_raports_attrs_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilais`
--

CREATE TABLE `nilais` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uu_nilai` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uu_attrs` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uu_mapel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uuid_g` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uuid_m` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cl` tinyint(1) DEFAULT NULL,
  `hk` tinyint(1) DEFAULT NULL,
  `ca` tinyint(1) DEFAULT NULL,
  `tanggal` date NOT NULL,
  `tahun_ajaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `nilais`
--

INSERT INTO `nilais` (`id`, `uu_nilai`, `uu_attrs`, `uu_mapel`, `uuid_g`, `uuid_m`, `cl`, `hk`, `ca`, `tanggal`, `tahun_ajaran`, `status`, `created_at`, `updated_at`) VALUES
(1, '25d5b07c-641a-4c9c-a4a0-e727c351b0c8-1c3a5b94-33a3-4ac7-af64-8108715dcfc3-0-2023-03-01', '1c3a5b94-33a3-4ac7-af64-8108715dcfc3-2023-03-01', '1c3a5b94-33a3-4ac7-af64-8108715dcfc3', '854ba06d-c471-4236-921b-be82bb6514c2', '25d5b07c-641a-4c9c-a4a0-e727c351b0c8', 2, 2, 2, '2023-03-01', '2023', '0', '2023-05-28 07:12:58', '2023-05-28 07:12:58'),
(2, '6af3d5d4-4f3a-4409-83c0-c526b483f661-1c3a5b94-33a3-4ac7-af64-8108715dcfc3-1-2023-03-01', '1c3a5b94-33a3-4ac7-af64-8108715dcfc3-2023-03-01', '1c3a5b94-33a3-4ac7-af64-8108715dcfc3', '854ba06d-c471-4236-921b-be82bb6514c2', '6af3d5d4-4f3a-4409-83c0-c526b483f661', 2, 1, 0, '2023-03-01', '2023', '0', '2023-05-28 07:12:58', '2023-05-28 07:12:58'),
(3, '25d5b07c-641a-4c9c-a4a0-e727c351b0c8-cfa1d354-4504-4e9f-a7e2-33f197b807be-0-2023-03-01', 'cfa1d354-4504-4e9f-a7e2-33f197b807be-2023-03-01', 'cfa1d354-4504-4e9f-a7e2-33f197b807be', '854ba06d-c471-4236-921b-be82bb6514c2', '25d5b07c-641a-4c9c-a4a0-e727c351b0c8', 3, 3, 2, '2023-03-01', '2023', '0', '2023-05-28 07:13:31', '2023-05-28 07:13:31'),
(4, '6af3d5d4-4f3a-4409-83c0-c526b483f661-cfa1d354-4504-4e9f-a7e2-33f197b807be-1-2023-03-01', 'cfa1d354-4504-4e9f-a7e2-33f197b807be-2023-03-01', 'cfa1d354-4504-4e9f-a7e2-33f197b807be', '854ba06d-c471-4236-921b-be82bb6514c2', '6af3d5d4-4f3a-4409-83c0-c526b483f661', 0, 1, 1, '2023-03-01', '2023', '0', '2023-05-28 07:13:31', '2023-05-28 07:13:31'),
(5, '25d5b07c-641a-4c9c-a4a0-e727c351b0c8-52479a18-96fe-4f42-8d39-f8ae885c3e50-0-2023-03-01', '52479a18-96fe-4f42-8d39-f8ae885c3e50-2023-03-01', '52479a18-96fe-4f42-8d39-f8ae885c3e50', '854ba06d-c471-4236-921b-be82bb6514c2', '25d5b07c-641a-4c9c-a4a0-e727c351b0c8', 2, 2, 0, '2023-03-01', '2023', '0', '2023-05-28 07:14:05', '2023-05-28 07:14:05'),
(6, '6af3d5d4-4f3a-4409-83c0-c526b483f661-52479a18-96fe-4f42-8d39-f8ae885c3e50-1-2023-03-01', '52479a18-96fe-4f42-8d39-f8ae885c3e50-2023-03-01', '52479a18-96fe-4f42-8d39-f8ae885c3e50', '854ba06d-c471-4236-921b-be82bb6514c2', '6af3d5d4-4f3a-4409-83c0-c526b483f661', 3, 0, 2, '2023-03-01', '2023', '0', '2023-05-28 07:14:05', '2023-05-28 07:14:05'),
(7, '25d5b07c-641a-4c9c-a4a0-e727c351b0c8-b788bf05-430d-4346-8909-5beeab316fc8-0-2023-03-01', 'b788bf05-430d-4346-8909-5beeab316fc8-2023-03-01', 'b788bf05-430d-4346-8909-5beeab316fc8', '854ba06d-c471-4236-921b-be82bb6514c2', '25d5b07c-641a-4c9c-a4a0-e727c351b0c8', 1, 0, 3, '2023-03-01', '2023', '0', '2023-05-28 07:14:24', '2023-05-28 07:14:24'),
(8, '6af3d5d4-4f3a-4409-83c0-c526b483f661-b788bf05-430d-4346-8909-5beeab316fc8-1-2023-03-01', 'b788bf05-430d-4346-8909-5beeab316fc8-2023-03-01', 'b788bf05-430d-4346-8909-5beeab316fc8', '854ba06d-c471-4236-921b-be82bb6514c2', '6af3d5d4-4f3a-4409-83c0-c526b483f661', 2, 1, 0, '2023-03-01', '2023', '0', '2023-05-28 07:14:24', '2023-05-28 07:14:24'),
(9, '25d5b07c-641a-4c9c-a4a0-e727c351b0c8-83a89628-28f8-4b56-90b2-8b886fdcc3e3-0-2023-03-01', '83a89628-28f8-4b56-90b2-8b886fdcc3e3-2023-03-01', '83a89628-28f8-4b56-90b2-8b886fdcc3e3', '854ba06d-c471-4236-921b-be82bb6514c2', '25d5b07c-641a-4c9c-a4a0-e727c351b0c8', 2, 2, 2, '2023-03-01', '2023', '0', '2023-05-28 07:14:42', '2023-05-28 07:14:42'),
(10, '6af3d5d4-4f3a-4409-83c0-c526b483f661-83a89628-28f8-4b56-90b2-8b886fdcc3e3-1-2023-03-01', '83a89628-28f8-4b56-90b2-8b886fdcc3e3-2023-03-01', '83a89628-28f8-4b56-90b2-8b886fdcc3e3', '854ba06d-c471-4236-921b-be82bb6514c2', '6af3d5d4-4f3a-4409-83c0-c526b483f661', 1, 2, 0, '2023-03-01', '2023', '0', '2023-05-28 07:14:42', '2023-05-28 07:14:42'),
(11, '25d5b07c-641a-4c9c-a4a0-e727c351b0c8-1c3a5b94-33a3-4ac7-af64-8108715dcfc3-0-2023-03-06', '1c3a5b94-33a3-4ac7-af64-8108715dcfc3-2023-03-06', '1c3a5b94-33a3-4ac7-af64-8108715dcfc3', '854ba06d-c471-4236-921b-be82bb6514c2', '25d5b07c-641a-4c9c-a4a0-e727c351b0c8', 2, 2, 2, '2023-03-06', '2023', '0', '2023-05-28 07:15:25', '2023-05-28 07:15:25'),
(12, '6af3d5d4-4f3a-4409-83c0-c526b483f661-1c3a5b94-33a3-4ac7-af64-8108715dcfc3-1-2023-03-06', '1c3a5b94-33a3-4ac7-af64-8108715dcfc3-2023-03-06', '1c3a5b94-33a3-4ac7-af64-8108715dcfc3', '854ba06d-c471-4236-921b-be82bb6514c2', '6af3d5d4-4f3a-4409-83c0-c526b483f661', 3, 1, 0, '2023-03-06', '2023', '0', '2023-05-28 07:15:25', '2023-05-28 07:15:25'),
(13, '25d5b07c-641a-4c9c-a4a0-e727c351b0c8-cfa1d354-4504-4e9f-a7e2-33f197b807be-0-2023-03-06', 'cfa1d354-4504-4e9f-a7e2-33f197b807be-2023-03-06', 'cfa1d354-4504-4e9f-a7e2-33f197b807be', '854ba06d-c471-4236-921b-be82bb6514c2', '25d5b07c-641a-4c9c-a4a0-e727c351b0c8', 2, 2, 0, '2023-03-06', '2023', '0', '2023-05-28 07:16:25', '2023-05-28 07:16:25'),
(14, '6af3d5d4-4f3a-4409-83c0-c526b483f661-cfa1d354-4504-4e9f-a7e2-33f197b807be-1-2023-03-06', 'cfa1d354-4504-4e9f-a7e2-33f197b807be-2023-03-06', 'cfa1d354-4504-4e9f-a7e2-33f197b807be', '854ba06d-c471-4236-921b-be82bb6514c2', '6af3d5d4-4f3a-4409-83c0-c526b483f661', 1, 0, 2, '2023-03-06', '2023', '0', '2023-05-28 07:16:25', '2023-05-28 07:16:25'),
(15, '25d5b07c-641a-4c9c-a4a0-e727c351b0c8-52479a18-96fe-4f42-8d39-f8ae885c3e50-0-2023-03-06', '52479a18-96fe-4f42-8d39-f8ae885c3e50-2023-03-06', '52479a18-96fe-4f42-8d39-f8ae885c3e50', '854ba06d-c471-4236-921b-be82bb6514c2', '25d5b07c-641a-4c9c-a4a0-e727c351b0c8', 1, 2, 0, '2023-03-06', '2023', '0', '2023-05-28 07:16:44', '2023-05-28 07:16:44'),
(16, '6af3d5d4-4f3a-4409-83c0-c526b483f661-52479a18-96fe-4f42-8d39-f8ae885c3e50-1-2023-03-06', '52479a18-96fe-4f42-8d39-f8ae885c3e50-2023-03-06', '52479a18-96fe-4f42-8d39-f8ae885c3e50', '854ba06d-c471-4236-921b-be82bb6514c2', '6af3d5d4-4f3a-4409-83c0-c526b483f661', 0, 1, 0, '2023-03-06', '2023', '0', '2023-05-28 07:16:44', '2023-05-28 07:16:44'),
(17, '25d5b07c-641a-4c9c-a4a0-e727c351b0c8-b788bf05-430d-4346-8909-5beeab316fc8-0-2023-03-06', 'b788bf05-430d-4346-8909-5beeab316fc8-2023-03-06', 'b788bf05-430d-4346-8909-5beeab316fc8', '854ba06d-c471-4236-921b-be82bb6514c2', '25d5b07c-641a-4c9c-a4a0-e727c351b0c8', 2, 2, 0, '2023-03-06', '2023', '0', '2023-05-28 07:17:03', '2023-05-28 07:17:03'),
(18, '6af3d5d4-4f3a-4409-83c0-c526b483f661-b788bf05-430d-4346-8909-5beeab316fc8-1-2023-03-06', 'b788bf05-430d-4346-8909-5beeab316fc8-2023-03-06', 'b788bf05-430d-4346-8909-5beeab316fc8', '854ba06d-c471-4236-921b-be82bb6514c2', '6af3d5d4-4f3a-4409-83c0-c526b483f661', 1, 0, 1, '2023-03-06', '2023', '0', '2023-05-28 07:17:03', '2023-05-28 07:17:03'),
(19, '25d5b07c-641a-4c9c-a4a0-e727c351b0c8-83a89628-28f8-4b56-90b2-8b886fdcc3e3-0-2023-03-06', '83a89628-28f8-4b56-90b2-8b886fdcc3e3-2023-03-06', '83a89628-28f8-4b56-90b2-8b886fdcc3e3', '854ba06d-c471-4236-921b-be82bb6514c2', '25d5b07c-641a-4c9c-a4a0-e727c351b0c8', 2, 2, 0, '2023-03-06', '2023', '0', '2023-05-28 07:17:55', '2023-05-28 07:17:55'),
(20, '6af3d5d4-4f3a-4409-83c0-c526b483f661-83a89628-28f8-4b56-90b2-8b886fdcc3e3-1-2023-03-06', '83a89628-28f8-4b56-90b2-8b886fdcc3e3-2023-03-06', '83a89628-28f8-4b56-90b2-8b886fdcc3e3', '854ba06d-c471-4236-921b-be82bb6514c2', '6af3d5d4-4f3a-4409-83c0-c526b483f661', 0, 2, 2, '2023-03-06', '2023', '0', '2023-05-28 07:17:55', '2023-05-28 07:17:55'),
(21, '25d5b07c-641a-4c9c-a4a0-e727c351b0c8-1c3a5b94-33a3-4ac7-af64-8108715dcfc3-0-2023-03-10', '1c3a5b94-33a3-4ac7-af64-8108715dcfc3-2023-03-10', '1c3a5b94-33a3-4ac7-af64-8108715dcfc3', '854ba06d-c471-4236-921b-be82bb6514c2', '25d5b07c-641a-4c9c-a4a0-e727c351b0c8', 2, 3, 0, '2023-03-10', '2023', '0', '2023-05-28 07:18:17', '2023-05-28 07:18:17'),
(22, '6af3d5d4-4f3a-4409-83c0-c526b483f661-1c3a5b94-33a3-4ac7-af64-8108715dcfc3-1-2023-03-10', '1c3a5b94-33a3-4ac7-af64-8108715dcfc3-2023-03-10', '1c3a5b94-33a3-4ac7-af64-8108715dcfc3', '854ba06d-c471-4236-921b-be82bb6514c2', '6af3d5d4-4f3a-4409-83c0-c526b483f661', 0, 2, 2, '2023-03-10', '2023', '0', '2023-05-28 07:18:17', '2023-05-28 07:18:17'),
(23, '25d5b07c-641a-4c9c-a4a0-e727c351b0c8-cfa1d354-4504-4e9f-a7e2-33f197b807be-0-2023-03-10', 'cfa1d354-4504-4e9f-a7e2-33f197b807be-2023-03-10', 'cfa1d354-4504-4e9f-a7e2-33f197b807be', '854ba06d-c471-4236-921b-be82bb6514c2', '25d5b07c-641a-4c9c-a4a0-e727c351b0c8', 2, 0, 3, '2023-03-10', '2023', '0', '2023-05-28 07:18:37', '2023-05-28 07:18:37'),
(24, '6af3d5d4-4f3a-4409-83c0-c526b483f661-cfa1d354-4504-4e9f-a7e2-33f197b807be-1-2023-03-10', 'cfa1d354-4504-4e9f-a7e2-33f197b807be-2023-03-10', 'cfa1d354-4504-4e9f-a7e2-33f197b807be', '854ba06d-c471-4236-921b-be82bb6514c2', '6af3d5d4-4f3a-4409-83c0-c526b483f661', 0, 2, 3, '2023-03-10', '2023', '0', '2023-05-28 07:18:37', '2023-05-28 07:18:37'),
(25, '25d5b07c-641a-4c9c-a4a0-e727c351b0c8-83a89628-28f8-4b56-90b2-8b886fdcc3e3-0-2023-03-10', '83a89628-28f8-4b56-90b2-8b886fdcc3e3-2023-03-10', '83a89628-28f8-4b56-90b2-8b886fdcc3e3', '854ba06d-c471-4236-921b-be82bb6514c2', '25d5b07c-641a-4c9c-a4a0-e727c351b0c8', 2, 0, 3, '2023-03-10', '2023', '0', '2023-05-28 07:18:58', '2023-05-28 07:18:58'),
(26, '6af3d5d4-4f3a-4409-83c0-c526b483f661-83a89628-28f8-4b56-90b2-8b886fdcc3e3-1-2023-03-10', '83a89628-28f8-4b56-90b2-8b886fdcc3e3-2023-03-10', '83a89628-28f8-4b56-90b2-8b886fdcc3e3', '854ba06d-c471-4236-921b-be82bb6514c2', '6af3d5d4-4f3a-4409-83c0-c526b483f661', 1, 1, 0, '2023-03-10', '2023', '0', '2023-05-28 07:18:58', '2023-05-28 07:18:58'),
(27, '25d5b07c-641a-4c9c-a4a0-e727c351b0c8-1c3a5b94-33a3-4ac7-af64-8108715dcfc3-0-2023-03-14', '1c3a5b94-33a3-4ac7-af64-8108715dcfc3-2023-03-14', '1c3a5b94-33a3-4ac7-af64-8108715dcfc3', '854ba06d-c471-4236-921b-be82bb6514c2', '25d5b07c-641a-4c9c-a4a0-e727c351b0c8', 2, 2, 3, '2023-03-14', '2023', '0', '2023-05-28 07:25:31', '2023-05-28 07:25:31'),
(28, '6af3d5d4-4f3a-4409-83c0-c526b483f661-1c3a5b94-33a3-4ac7-af64-8108715dcfc3-1-2023-03-14', '1c3a5b94-33a3-4ac7-af64-8108715dcfc3-2023-03-14', '1c3a5b94-33a3-4ac7-af64-8108715dcfc3', '854ba06d-c471-4236-921b-be82bb6514c2', '6af3d5d4-4f3a-4409-83c0-c526b483f661', 2, 2, 0, '2023-03-14', '2023', '0', '2023-05-28 07:25:31', '2023-05-28 07:25:31'),
(29, '25d5b07c-641a-4c9c-a4a0-e727c351b0c8-cfa1d354-4504-4e9f-a7e2-33f197b807be-0-2023-03-14', 'cfa1d354-4504-4e9f-a7e2-33f197b807be-2023-03-14', 'cfa1d354-4504-4e9f-a7e2-33f197b807be', '854ba06d-c471-4236-921b-be82bb6514c2', '25d5b07c-641a-4c9c-a4a0-e727c351b0c8', 2, 3, 0, '2023-03-14', '2023', '0', '2023-05-28 07:26:02', '2023-05-28 07:26:02'),
(30, '6af3d5d4-4f3a-4409-83c0-c526b483f661-cfa1d354-4504-4e9f-a7e2-33f197b807be-1-2023-03-14', 'cfa1d354-4504-4e9f-a7e2-33f197b807be-2023-03-14', 'cfa1d354-4504-4e9f-a7e2-33f197b807be', '854ba06d-c471-4236-921b-be82bb6514c2', '6af3d5d4-4f3a-4409-83c0-c526b483f661', 0, 2, 3, '2023-03-14', '2023', '0', '2023-05-28 07:26:02', '2023-05-28 07:26:02'),
(31, '25d5b07c-641a-4c9c-a4a0-e727c351b0c8-52479a18-96fe-4f42-8d39-f8ae885c3e50-0-2023-03-14', '52479a18-96fe-4f42-8d39-f8ae885c3e50-2023-03-14', '52479a18-96fe-4f42-8d39-f8ae885c3e50', '854ba06d-c471-4236-921b-be82bb6514c2', '25d5b07c-641a-4c9c-a4a0-e727c351b0c8', 3, 2, 0, '2023-03-14', '2023', '0', '2023-05-28 07:26:47', '2023-05-28 07:26:47'),
(32, '6af3d5d4-4f3a-4409-83c0-c526b483f661-52479a18-96fe-4f42-8d39-f8ae885c3e50-1-2023-03-14', '52479a18-96fe-4f42-8d39-f8ae885c3e50-2023-03-14', '52479a18-96fe-4f42-8d39-f8ae885c3e50', '854ba06d-c471-4236-921b-be82bb6514c2', '6af3d5d4-4f3a-4409-83c0-c526b483f661', 0, 3, 1, '2023-03-14', '2023', '0', '2023-05-28 07:26:47', '2023-05-28 07:26:47'),
(33, '25d5b07c-641a-4c9c-a4a0-e727c351b0c8-b788bf05-430d-4346-8909-5beeab316fc8-0-2023-03-14', 'b788bf05-430d-4346-8909-5beeab316fc8-2023-03-14', 'b788bf05-430d-4346-8909-5beeab316fc8', '854ba06d-c471-4236-921b-be82bb6514c2', '25d5b07c-641a-4c9c-a4a0-e727c351b0c8', 2, 0, 2, '2023-03-14', '2023', '0', '2023-05-28 07:27:06', '2023-05-28 07:27:06'),
(34, '6af3d5d4-4f3a-4409-83c0-c526b483f661-b788bf05-430d-4346-8909-5beeab316fc8-1-2023-03-14', 'b788bf05-430d-4346-8909-5beeab316fc8-2023-03-14', 'b788bf05-430d-4346-8909-5beeab316fc8', '854ba06d-c471-4236-921b-be82bb6514c2', '6af3d5d4-4f3a-4409-83c0-c526b483f661', 0, 2, 2, '2023-03-14', '2023', '0', '2023-05-28 07:27:06', '2023-05-28 07:27:06'),
(35, '25d5b07c-641a-4c9c-a4a0-e727c351b0c8-1c3a5b94-33a3-4ac7-af64-8108715dcfc3-0-2023-03-22', '1c3a5b94-33a3-4ac7-af64-8108715dcfc3-2023-03-22', '1c3a5b94-33a3-4ac7-af64-8108715dcfc3', '854ba06d-c471-4236-921b-be82bb6514c2', '25d5b07c-641a-4c9c-a4a0-e727c351b0c8', 2, 3, 0, '2023-03-22', '2023', '0', '2023-05-28 07:27:44', '2023-05-28 07:27:44'),
(36, '6af3d5d4-4f3a-4409-83c0-c526b483f661-1c3a5b94-33a3-4ac7-af64-8108715dcfc3-1-2023-03-22', '1c3a5b94-33a3-4ac7-af64-8108715dcfc3-2023-03-22', '1c3a5b94-33a3-4ac7-af64-8108715dcfc3', '854ba06d-c471-4236-921b-be82bb6514c2', '6af3d5d4-4f3a-4409-83c0-c526b483f661', 0, 4, 2, '2023-03-22', '2023', '0', '2023-05-28 07:27:44', '2023-05-28 07:27:44'),
(37, '25d5b07c-641a-4c9c-a4a0-e727c351b0c8-52479a18-96fe-4f42-8d39-f8ae885c3e50-0-2023-03-21', '52479a18-96fe-4f42-8d39-f8ae885c3e50-2023-03-21', '52479a18-96fe-4f42-8d39-f8ae885c3e50', '854ba06d-c471-4236-921b-be82bb6514c2', '25d5b07c-641a-4c9c-a4a0-e727c351b0c8', 2, 2, 3, '2023-03-21', '2023', '0', '2023-05-28 07:28:13', '2023-05-28 07:28:13'),
(38, '6af3d5d4-4f3a-4409-83c0-c526b483f661-52479a18-96fe-4f42-8d39-f8ae885c3e50-1-2023-03-21', '52479a18-96fe-4f42-8d39-f8ae885c3e50-2023-03-21', '52479a18-96fe-4f42-8d39-f8ae885c3e50', '854ba06d-c471-4236-921b-be82bb6514c2', '6af3d5d4-4f3a-4409-83c0-c526b483f661', 2, 0, 3, '2023-03-21', '2023', '0', '2023-05-28 07:28:13', '2023-05-28 07:28:13'),
(39, '25d5b07c-641a-4c9c-a4a0-e727c351b0c8-cfa1d354-4504-4e9f-a7e2-33f197b807be-0-2023-03-21', 'cfa1d354-4504-4e9f-a7e2-33f197b807be-2023-03-21', 'cfa1d354-4504-4e9f-a7e2-33f197b807be', '854ba06d-c471-4236-921b-be82bb6514c2', '25d5b07c-641a-4c9c-a4a0-e727c351b0c8', 1, 0, 2, '2023-03-21', '2023', '0', '2023-05-28 07:28:33', '2023-05-28 07:28:33'),
(40, '6af3d5d4-4f3a-4409-83c0-c526b483f661-cfa1d354-4504-4e9f-a7e2-33f197b807be-1-2023-03-21', 'cfa1d354-4504-4e9f-a7e2-33f197b807be-2023-03-21', 'cfa1d354-4504-4e9f-a7e2-33f197b807be', '854ba06d-c471-4236-921b-be82bb6514c2', '6af3d5d4-4f3a-4409-83c0-c526b483f661', 0, 2, 2, '2023-03-21', '2023', '0', '2023-05-28 07:28:33', '2023-05-28 07:28:33'),
(41, '25d5b07c-641a-4c9c-a4a0-e727c351b0c8-83a89628-28f8-4b56-90b2-8b886fdcc3e3-0-2023-03-21', '83a89628-28f8-4b56-90b2-8b886fdcc3e3-2023-03-21', '83a89628-28f8-4b56-90b2-8b886fdcc3e3', '854ba06d-c471-4236-921b-be82bb6514c2', '25d5b07c-641a-4c9c-a4a0-e727c351b0c8', 2, 0, 3, '2023-03-21', '2023', '0', '2023-05-28 07:28:55', '2023-05-28 07:28:55'),
(42, '6af3d5d4-4f3a-4409-83c0-c526b483f661-83a89628-28f8-4b56-90b2-8b886fdcc3e3-1-2023-03-21', '83a89628-28f8-4b56-90b2-8b886fdcc3e3-2023-03-21', '83a89628-28f8-4b56-90b2-8b886fdcc3e3', '854ba06d-c471-4236-921b-be82bb6514c2', '6af3d5d4-4f3a-4409-83c0-c526b483f661', 2, 2, 0, '2023-03-21', '2023', '0', '2023-05-28 07:28:55', '2023-05-28 07:28:55'),
(43, '25d5b07c-641a-4c9c-a4a0-e727c351b0c8-1c3a5b94-33a3-4ac7-af64-8108715dcfc3-0-2023-04-04', '1c3a5b94-33a3-4ac7-af64-8108715dcfc3-2023-04-04', '1c3a5b94-33a3-4ac7-af64-8108715dcfc3', '854ba06d-c471-4236-921b-be82bb6514c2', '25d5b07c-641a-4c9c-a4a0-e727c351b0c8', 3, 0, 3, '2023-04-04', '2023', '0', '2023-05-28 07:29:18', '2023-05-28 07:29:18'),
(44, '6af3d5d4-4f3a-4409-83c0-c526b483f661-1c3a5b94-33a3-4ac7-af64-8108715dcfc3-1-2023-04-04', '1c3a5b94-33a3-4ac7-af64-8108715dcfc3-2023-04-04', '1c3a5b94-33a3-4ac7-af64-8108715dcfc3', '854ba06d-c471-4236-921b-be82bb6514c2', '6af3d5d4-4f3a-4409-83c0-c526b483f661', 0, 2, 0, '2023-04-04', '2023', '0', '2023-05-28 07:29:18', '2023-05-28 07:29:18'),
(45, '25d5b07c-641a-4c9c-a4a0-e727c351b0c8-cfa1d354-4504-4e9f-a7e2-33f197b807be-0-2023-04-04', 'cfa1d354-4504-4e9f-a7e2-33f197b807be-2023-04-04', 'cfa1d354-4504-4e9f-a7e2-33f197b807be', '854ba06d-c471-4236-921b-be82bb6514c2', '25d5b07c-641a-4c9c-a4a0-e727c351b0c8', 2, 0, 3, '2023-04-04', '2023', '0', '2023-05-28 07:33:09', '2023-05-28 07:33:09'),
(46, '6af3d5d4-4f3a-4409-83c0-c526b483f661-cfa1d354-4504-4e9f-a7e2-33f197b807be-1-2023-04-04', 'cfa1d354-4504-4e9f-a7e2-33f197b807be-2023-04-04', 'cfa1d354-4504-4e9f-a7e2-33f197b807be', '854ba06d-c471-4236-921b-be82bb6514c2', '6af3d5d4-4f3a-4409-83c0-c526b483f661', 3, 2, 0, '2023-04-04', '2023', '0', '2023-05-28 07:33:09', '2023-05-28 07:33:09'),
(47, '25d5b07c-641a-4c9c-a4a0-e727c351b0c8-b788bf05-430d-4346-8909-5beeab316fc8-0-2023-03-04', 'b788bf05-430d-4346-8909-5beeab316fc8-2023-03-04', 'b788bf05-430d-4346-8909-5beeab316fc8', '854ba06d-c471-4236-921b-be82bb6514c2', '25d5b07c-641a-4c9c-a4a0-e727c351b0c8', 2, 2, 0, '2023-03-04', '2023', '0', '2023-05-28 07:33:34', '2023-05-28 07:33:34'),
(48, '6af3d5d4-4f3a-4409-83c0-c526b483f661-b788bf05-430d-4346-8909-5beeab316fc8-1-2023-03-04', 'b788bf05-430d-4346-8909-5beeab316fc8-2023-03-04', 'b788bf05-430d-4346-8909-5beeab316fc8', '854ba06d-c471-4236-921b-be82bb6514c2', '6af3d5d4-4f3a-4409-83c0-c526b483f661', 0, 2, 1, '2023-03-04', '2023', '0', '2023-05-28 07:33:34', '2023-05-28 07:33:34'),
(49, '25d5b07c-641a-4c9c-a4a0-e727c351b0c8-83a89628-28f8-4b56-90b2-8b886fdcc3e3-0-2023-04-04', '83a89628-28f8-4b56-90b2-8b886fdcc3e3-2023-04-04', '83a89628-28f8-4b56-90b2-8b886fdcc3e3', '854ba06d-c471-4236-921b-be82bb6514c2', '25d5b07c-641a-4c9c-a4a0-e727c351b0c8', 2, 0, 3, '2023-04-04', '2023', '0', '2023-05-28 07:34:06', '2023-05-28 07:34:06'),
(50, '6af3d5d4-4f3a-4409-83c0-c526b483f661-83a89628-28f8-4b56-90b2-8b886fdcc3e3-1-2023-04-04', '83a89628-28f8-4b56-90b2-8b886fdcc3e3-2023-04-04', '83a89628-28f8-4b56-90b2-8b886fdcc3e3', '854ba06d-c471-4236-921b-be82bb6514c2', '6af3d5d4-4f3a-4409-83c0-c526b483f661', 0, 2, 2, '2023-04-04', '2023', '0', '2023-05-28 07:34:06', '2023-05-28 07:34:06'),
(51, '25d5b07c-641a-4c9c-a4a0-e727c351b0c8-b788bf05-430d-4346-8909-5beeab316fc8-0-2023-04-12', 'b788bf05-430d-4346-8909-5beeab316fc8-2023-04-12', 'b788bf05-430d-4346-8909-5beeab316fc8', '854ba06d-c471-4236-921b-be82bb6514c2', '25d5b07c-641a-4c9c-a4a0-e727c351b0c8', 2, 3, 0, '2023-04-12', '2023', '0', '2023-05-28 08:14:29', '2023-05-28 08:14:29'),
(52, '6af3d5d4-4f3a-4409-83c0-c526b483f661-b788bf05-430d-4346-8909-5beeab316fc8-1-2023-04-12', 'b788bf05-430d-4346-8909-5beeab316fc8-2023-04-12', 'b788bf05-430d-4346-8909-5beeab316fc8', '854ba06d-c471-4236-921b-be82bb6514c2', '6af3d5d4-4f3a-4409-83c0-c526b483f661', 1, 1, 1, '2023-04-12', '2023', '0', '2023-05-28 08:14:29', '2023-05-28 08:14:29'),
(53, '25d5b07c-641a-4c9c-a4a0-e727c351b0c8-1c3a5b94-33a3-4ac7-af64-8108715dcfc3-0-2023-04-25', '1c3a5b94-33a3-4ac7-af64-8108715dcfc3-2023-04-25', '1c3a5b94-33a3-4ac7-af64-8108715dcfc3', '854ba06d-c471-4236-921b-be82bb6514c2', '25d5b07c-641a-4c9c-a4a0-e727c351b0c8', 2, 2, 0, '2023-04-25', '2023', '0', '2023-05-28 08:14:58', '2023-05-28 08:14:58'),
(54, '6af3d5d4-4f3a-4409-83c0-c526b483f661-1c3a5b94-33a3-4ac7-af64-8108715dcfc3-1-2023-04-25', '1c3a5b94-33a3-4ac7-af64-8108715dcfc3-2023-04-25', '1c3a5b94-33a3-4ac7-af64-8108715dcfc3', '854ba06d-c471-4236-921b-be82bb6514c2', '6af3d5d4-4f3a-4409-83c0-c526b483f661', 2, 0, 2, '2023-04-25', '2023', '0', '2023-05-28 08:14:58', '2023-05-28 08:14:58'),
(55, '25d5b07c-641a-4c9c-a4a0-e727c351b0c8-b788bf05-430d-4346-8909-5beeab316fc8-0-2023-04-26', 'b788bf05-430d-4346-8909-5beeab316fc8-2023-04-26', 'b788bf05-430d-4346-8909-5beeab316fc8', '854ba06d-c471-4236-921b-be82bb6514c2', '25d5b07c-641a-4c9c-a4a0-e727c351b0c8', 4, 3, 0, '2023-04-26', '2023', '0', '2023-05-28 08:15:32', '2023-05-28 08:15:32'),
(56, '6af3d5d4-4f3a-4409-83c0-c526b483f661-b788bf05-430d-4346-8909-5beeab316fc8-1-2023-04-26', 'b788bf05-430d-4346-8909-5beeab316fc8-2023-04-26', 'b788bf05-430d-4346-8909-5beeab316fc8', '854ba06d-c471-4236-921b-be82bb6514c2', '6af3d5d4-4f3a-4409-83c0-c526b483f661', 2, 2, 2, '2023-04-26', '2023', '0', '2023-05-28 08:15:32', '2023-05-28 08:15:32'),
(57, '25d5b07c-641a-4c9c-a4a0-e727c351b0c8-1c3a5b94-33a3-4ac7-af64-8108715dcfc3-0-2023-04-27', '1c3a5b94-33a3-4ac7-af64-8108715dcfc3-2023-04-27', '1c3a5b94-33a3-4ac7-af64-8108715dcfc3', '854ba06d-c471-4236-921b-be82bb6514c2', '25d5b07c-641a-4c9c-a4a0-e727c351b0c8', 3, 2, 0, '2023-04-27', '2023', '0', '2023-05-28 08:20:28', '2023-05-28 08:20:28'),
(58, '6af3d5d4-4f3a-4409-83c0-c526b483f661-1c3a5b94-33a3-4ac7-af64-8108715dcfc3-1-2023-04-27', '1c3a5b94-33a3-4ac7-af64-8108715dcfc3-2023-04-27', '1c3a5b94-33a3-4ac7-af64-8108715dcfc3', '854ba06d-c471-4236-921b-be82bb6514c2', '6af3d5d4-4f3a-4409-83c0-c526b483f661', 1, 0, 1, '2023-04-27', '2023', '0', '2023-05-28 08:20:28', '2023-05-28 08:20:28'),
(59, '25d5b07c-641a-4c9c-a4a0-e727c351b0c8-83a89628-28f8-4b56-90b2-8b886fdcc3e3-0-2023-04-25', '83a89628-28f8-4b56-90b2-8b886fdcc3e3-2023-04-25', '83a89628-28f8-4b56-90b2-8b886fdcc3e3', '854ba06d-c471-4236-921b-be82bb6514c2', '25d5b07c-641a-4c9c-a4a0-e727c351b0c8', 2, 4, 0, '2023-04-25', '2023', '0', '2023-05-28 08:21:35', '2023-05-28 08:21:35'),
(60, '6af3d5d4-4f3a-4409-83c0-c526b483f661-83a89628-28f8-4b56-90b2-8b886fdcc3e3-1-2023-04-25', '83a89628-28f8-4b56-90b2-8b886fdcc3e3-2023-04-25', '83a89628-28f8-4b56-90b2-8b886fdcc3e3', '854ba06d-c471-4236-921b-be82bb6514c2', '6af3d5d4-4f3a-4409-83c0-c526b483f661', 2, 0, 2, '2023-04-25', '2023', '0', '2023-05-28 08:21:35', '2023-05-28 08:21:35'),
(61, '25d5b07c-641a-4c9c-a4a0-e727c351b0c8-52479a18-96fe-4f42-8d39-f8ae885c3e50-0-2023-05-08', '52479a18-96fe-4f42-8d39-f8ae885c3e50-2023-05-08', '52479a18-96fe-4f42-8d39-f8ae885c3e50', '854ba06d-c471-4236-921b-be82bb6514c2', '25d5b07c-641a-4c9c-a4a0-e727c351b0c8', 2, 3, 0, '2023-05-08', '2023', '0', '2023-05-28 08:21:55', '2023-05-28 08:21:55'),
(62, '6af3d5d4-4f3a-4409-83c0-c526b483f661-52479a18-96fe-4f42-8d39-f8ae885c3e50-1-2023-05-08', '52479a18-96fe-4f42-8d39-f8ae885c3e50-2023-05-08', '52479a18-96fe-4f42-8d39-f8ae885c3e50', '854ba06d-c471-4236-921b-be82bb6514c2', '6af3d5d4-4f3a-4409-83c0-c526b483f661', 0, 2, 1, '2023-05-08', '2023', '0', '2023-05-28 08:21:55', '2023-05-28 08:21:55'),
(63, '25d5b07c-641a-4c9c-a4a0-e727c351b0c8-b788bf05-430d-4346-8909-5beeab316fc8-0-2023-05-09', 'b788bf05-430d-4346-8909-5beeab316fc8-2023-05-09', 'b788bf05-430d-4346-8909-5beeab316fc8', '854ba06d-c471-4236-921b-be82bb6514c2', '25d5b07c-641a-4c9c-a4a0-e727c351b0c8', 3, 3, 0, '2023-05-09', '2023', '0', '2023-05-28 08:22:16', '2023-05-28 08:22:16'),
(64, '6af3d5d4-4f3a-4409-83c0-c526b483f661-b788bf05-430d-4346-8909-5beeab316fc8-1-2023-05-09', 'b788bf05-430d-4346-8909-5beeab316fc8-2023-05-09', 'b788bf05-430d-4346-8909-5beeab316fc8', '854ba06d-c471-4236-921b-be82bb6514c2', '6af3d5d4-4f3a-4409-83c0-c526b483f661', 2, 0, 2, '2023-05-09', '2023', '0', '2023-05-28 08:22:16', '2023-05-28 08:22:16'),
(65, '25d5b07c-641a-4c9c-a4a0-e727c351b0c8-83a89628-28f8-4b56-90b2-8b886fdcc3e3-0-2023-05-17', '83a89628-28f8-4b56-90b2-8b886fdcc3e3-2023-05-17', '83a89628-28f8-4b56-90b2-8b886fdcc3e3', '854ba06d-c471-4236-921b-be82bb6514c2', '25d5b07c-641a-4c9c-a4a0-e727c351b0c8', 3, 2, 0, '2023-05-17', '2023', '0', '2023-05-28 08:22:35', '2023-05-28 08:22:35'),
(66, '6af3d5d4-4f3a-4409-83c0-c526b483f661-83a89628-28f8-4b56-90b2-8b886fdcc3e3-1-2023-05-17', '83a89628-28f8-4b56-90b2-8b886fdcc3e3-2023-05-17', '83a89628-28f8-4b56-90b2-8b886fdcc3e3', '854ba06d-c471-4236-921b-be82bb6514c2', '6af3d5d4-4f3a-4409-83c0-c526b483f661', 3, 0, 2, '2023-05-17', '2023', '0', '2023-05-28 08:22:35', '2023-05-28 08:22:35'),
(67, '25d5b07c-641a-4c9c-a4a0-e727c351b0c8-1c3a5b94-33a3-4ac7-af64-8108715dcfc3-0-2023-05-28', '1c3a5b94-33a3-4ac7-af64-8108715dcfc3-2023-05-28', '1c3a5b94-33a3-4ac7-af64-8108715dcfc3', '854ba06d-c471-4236-921b-be82bb6514c2', '25d5b07c-641a-4c9c-a4a0-e727c351b0c8', 3, 0, 0, '2023-05-28', '2023', '0', '2023-05-28 08:22:53', '2023-05-28 08:22:53'),
(68, '6af3d5d4-4f3a-4409-83c0-c526b483f661-1c3a5b94-33a3-4ac7-af64-8108715dcfc3-1-2023-05-28', '1c3a5b94-33a3-4ac7-af64-8108715dcfc3-2023-05-28', '1c3a5b94-33a3-4ac7-af64-8108715dcfc3', '854ba06d-c471-4236-921b-be82bb6514c2', '6af3d5d4-4f3a-4409-83c0-c526b483f661', 3, 2, 2, '2023-05-28', '2023', '0', '2023-05-28 08:22:53', '2023-05-28 08:22:53'),
(69, '25d5b07c-641a-4c9c-a4a0-e727c351b0c8-cfa1d354-4504-4e9f-a7e2-33f197b807be-0-2023-05-28', 'cfa1d354-4504-4e9f-a7e2-33f197b807be-2023-05-28', 'cfa1d354-4504-4e9f-a7e2-33f197b807be', '854ba06d-c471-4236-921b-be82bb6514c2', '25d5b07c-641a-4c9c-a4a0-e727c351b0c8', 3, 2, 0, '2023-05-28', '2023', '0', '2023-05-28 08:23:12', '2023-05-28 08:23:12'),
(70, '6af3d5d4-4f3a-4409-83c0-c526b483f661-cfa1d354-4504-4e9f-a7e2-33f197b807be-1-2023-05-28', 'cfa1d354-4504-4e9f-a7e2-33f197b807be-2023-05-28', 'cfa1d354-4504-4e9f-a7e2-33f197b807be', '854ba06d-c471-4236-921b-be82bb6514c2', '6af3d5d4-4f3a-4409-83c0-c526b483f661', 2, 0, 4, '2023-05-28', '2023', '0', '2023-05-28 08:23:12', '2023-05-28 08:23:12'),
(71, '25d5b07c-641a-4c9c-a4a0-e727c351b0c8-52479a18-96fe-4f42-8d39-f8ae885c3e50-0-2023-05-28', '52479a18-96fe-4f42-8d39-f8ae885c3e50-2023-05-28', '52479a18-96fe-4f42-8d39-f8ae885c3e50', '854ba06d-c471-4236-921b-be82bb6514c2', '25d5b07c-641a-4c9c-a4a0-e727c351b0c8', 3, 3, 2, '2023-05-28', '2023', '0', '2023-05-28 08:23:36', '2023-05-28 08:23:36'),
(72, '6af3d5d4-4f3a-4409-83c0-c526b483f661-52479a18-96fe-4f42-8d39-f8ae885c3e50-1-2023-05-28', '52479a18-96fe-4f42-8d39-f8ae885c3e50-2023-05-28', '52479a18-96fe-4f42-8d39-f8ae885c3e50', '854ba06d-c471-4236-921b-be82bb6514c2', '6af3d5d4-4f3a-4409-83c0-c526b483f661', 3, 2, 0, '2023-05-28', '2023', '0', '2023-05-28 08:23:36', '2023-05-28 08:23:36'),
(73, '25d5b07c-641a-4c9c-a4a0-e727c351b0c8-b788bf05-430d-4346-8909-5beeab316fc8-0-2023-05-28', 'b788bf05-430d-4346-8909-5beeab316fc8-2023-05-28', 'b788bf05-430d-4346-8909-5beeab316fc8', '854ba06d-c471-4236-921b-be82bb6514c2', '25d5b07c-641a-4c9c-a4a0-e727c351b0c8', 3, 3, 0, '2023-05-28', '2023', '0', '2023-05-28 08:23:51', '2023-05-28 08:23:51'),
(74, '6af3d5d4-4f3a-4409-83c0-c526b483f661-b788bf05-430d-4346-8909-5beeab316fc8-1-2023-05-28', 'b788bf05-430d-4346-8909-5beeab316fc8-2023-05-28', 'b788bf05-430d-4346-8909-5beeab316fc8', '854ba06d-c471-4236-921b-be82bb6514c2', '6af3d5d4-4f3a-4409-83c0-c526b483f661', 2, 0, 3, '2023-05-28', '2023', '0', '2023-05-28 08:23:51', '2023-05-28 08:23:51'),
(75, '25d5b07c-641a-4c9c-a4a0-e727c351b0c8-83a89628-28f8-4b56-90b2-8b886fdcc3e3-0-2023-05-28', '83a89628-28f8-4b56-90b2-8b886fdcc3e3-2023-05-28', '83a89628-28f8-4b56-90b2-8b886fdcc3e3', '854ba06d-c471-4236-921b-be82bb6514c2', '25d5b07c-641a-4c9c-a4a0-e727c351b0c8', 3, 2, 0, '2023-05-28', '2023', '0', '2023-05-28 08:24:08', '2023-05-28 08:24:08'),
(76, '6af3d5d4-4f3a-4409-83c0-c526b483f661-83a89628-28f8-4b56-90b2-8b886fdcc3e3-1-2023-05-28', '83a89628-28f8-4b56-90b2-8b886fdcc3e3-2023-05-28', '83a89628-28f8-4b56-90b2-8b886fdcc3e3', '854ba06d-c471-4236-921b-be82bb6514c2', '6af3d5d4-4f3a-4409-83c0-c526b483f661', 2, 0, 1, '2023-05-28', '2023', '0', '2023-05-28 08:24:08', '2023-05-28 08:24:08'),
(77, '25d5b07c-641a-4c9c-a4a0-e727c351b0c8-1c3a5b94-33a3-4ac7-af64-8108715dcfc3-0-2023-05-01', '1c3a5b94-33a3-4ac7-af64-8108715dcfc3-2023-05-01', '1c3a5b94-33a3-4ac7-af64-8108715dcfc3', '854ba06d-c471-4236-921b-be82bb6514c2', '25d5b07c-641a-4c9c-a4a0-e727c351b0c8', 2, 2, 0, '2023-05-01', '2023', '0', '2023-05-28 08:25:52', '2023-05-28 08:25:52'),
(78, '6af3d5d4-4f3a-4409-83c0-c526b483f661-1c3a5b94-33a3-4ac7-af64-8108715dcfc3-1-2023-05-01', '1c3a5b94-33a3-4ac7-af64-8108715dcfc3-2023-05-01', '1c3a5b94-33a3-4ac7-af64-8108715dcfc3', '854ba06d-c471-4236-921b-be82bb6514c2', '6af3d5d4-4f3a-4409-83c0-c526b483f661', 2, 0, 2, '2023-05-01', '2023', '0', '2023-05-28 08:25:52', '2023-05-28 08:25:52'),
(79, '25d5b07c-641a-4c9c-a4a0-e727c351b0c8-cfa1d354-4504-4e9f-a7e2-33f197b807be-0-2023-05-01', 'cfa1d354-4504-4e9f-a7e2-33f197b807be-2023-05-01', 'cfa1d354-4504-4e9f-a7e2-33f197b807be', '854ba06d-c471-4236-921b-be82bb6514c2', '25d5b07c-641a-4c9c-a4a0-e727c351b0c8', 3, 2, 0, '2023-05-01', '2023', '0', '2023-05-28 08:26:05', '2023-05-28 08:26:05'),
(80, '6af3d5d4-4f3a-4409-83c0-c526b483f661-cfa1d354-4504-4e9f-a7e2-33f197b807be-1-2023-05-01', 'cfa1d354-4504-4e9f-a7e2-33f197b807be-2023-05-01', 'cfa1d354-4504-4e9f-a7e2-33f197b807be', '854ba06d-c471-4236-921b-be82bb6514c2', '6af3d5d4-4f3a-4409-83c0-c526b483f661', 0, 3, 2, '2023-05-01', '2023', '0', '2023-05-28 08:26:05', '2023-05-28 08:26:05'),
(81, '25d5b07c-641a-4c9c-a4a0-e727c351b0c8-52479a18-96fe-4f42-8d39-f8ae885c3e50-0-2023-05-01', '52479a18-96fe-4f42-8d39-f8ae885c3e50-2023-05-01', '52479a18-96fe-4f42-8d39-f8ae885c3e50', '854ba06d-c471-4236-921b-be82bb6514c2', '25d5b07c-641a-4c9c-a4a0-e727c351b0c8', 2, 3, 0, '2023-05-01', '2023', '0', '2023-05-28 08:26:22', '2023-05-28 08:26:22'),
(82, '6af3d5d4-4f3a-4409-83c0-c526b483f661-52479a18-96fe-4f42-8d39-f8ae885c3e50-1-2023-05-01', '52479a18-96fe-4f42-8d39-f8ae885c3e50-2023-05-01', '52479a18-96fe-4f42-8d39-f8ae885c3e50', '854ba06d-c471-4236-921b-be82bb6514c2', '6af3d5d4-4f3a-4409-83c0-c526b483f661', 0, 3, 2, '2023-05-01', '2023', '0', '2023-05-28 08:26:22', '2023-05-28 08:26:22'),
(83, '25d5b07c-641a-4c9c-a4a0-e727c351b0c8-b788bf05-430d-4346-8909-5beeab316fc8-0-2023-05-01', 'b788bf05-430d-4346-8909-5beeab316fc8-2023-05-01', 'b788bf05-430d-4346-8909-5beeab316fc8', '854ba06d-c471-4236-921b-be82bb6514c2', '25d5b07c-641a-4c9c-a4a0-e727c351b0c8', 4, 3, 0, '2023-05-01', '2023', '0', '2023-05-28 08:26:46', '2023-05-28 08:26:46'),
(84, '6af3d5d4-4f3a-4409-83c0-c526b483f661-b788bf05-430d-4346-8909-5beeab316fc8-1-2023-05-01', 'b788bf05-430d-4346-8909-5beeab316fc8-2023-05-01', 'b788bf05-430d-4346-8909-5beeab316fc8', '854ba06d-c471-4236-921b-be82bb6514c2', '6af3d5d4-4f3a-4409-83c0-c526b483f661', 2, 2, 2, '2023-05-01', '2023', '0', '2023-05-28 08:26:46', '2023-05-28 08:26:46'),
(85, '25d5b07c-641a-4c9c-a4a0-e727c351b0c8-83a89628-28f8-4b56-90b2-8b886fdcc3e3-0-2023-05-01', '83a89628-28f8-4b56-90b2-8b886fdcc3e3-2023-05-01', '83a89628-28f8-4b56-90b2-8b886fdcc3e3', '854ba06d-c471-4236-921b-be82bb6514c2', '25d5b07c-641a-4c9c-a4a0-e727c351b0c8', 2, 3, 0, '2023-05-01', '2023', '0', '2023-05-28 08:27:07', '2023-05-28 08:27:07'),
(86, '6af3d5d4-4f3a-4409-83c0-c526b483f661-83a89628-28f8-4b56-90b2-8b886fdcc3e3-1-2023-05-01', '83a89628-28f8-4b56-90b2-8b886fdcc3e3-2023-05-01', '83a89628-28f8-4b56-90b2-8b886fdcc3e3', '854ba06d-c471-4236-921b-be82bb6514c2', '6af3d5d4-4f3a-4409-83c0-c526b483f661', 2, 0, 2, '2023-05-01', '2023', '0', '2023-05-28 08:27:07', '2023-05-28 08:27:07'),
(87, '25d5b07c-641a-4c9c-a4a0-e727c351b0c8-1c3a5b94-33a3-4ac7-af64-8108715dcfc3-0-2023-05-02', '1c3a5b94-33a3-4ac7-af64-8108715dcfc3-2023-05-02', '1c3a5b94-33a3-4ac7-af64-8108715dcfc3', '854ba06d-c471-4236-921b-be82bb6514c2', '25d5b07c-641a-4c9c-a4a0-e727c351b0c8', 2, 3, 3, '2023-05-02', '2023', '0', '2023-05-28 08:32:53', '2023-05-28 08:32:53'),
(88, '6af3d5d4-4f3a-4409-83c0-c526b483f661-1c3a5b94-33a3-4ac7-af64-8108715dcfc3-1-2023-05-02', '1c3a5b94-33a3-4ac7-af64-8108715dcfc3-2023-05-02', '1c3a5b94-33a3-4ac7-af64-8108715dcfc3', '854ba06d-c471-4236-921b-be82bb6514c2', '6af3d5d4-4f3a-4409-83c0-c526b483f661', 2, 3, 0, '2023-05-02', '2023', '0', '2023-05-28 08:32:53', '2023-05-28 08:32:53'),
(89, '25d5b07c-641a-4c9c-a4a0-e727c351b0c8-cfa1d354-4504-4e9f-a7e2-33f197b807be-0-2023-05-02', 'cfa1d354-4504-4e9f-a7e2-33f197b807be-2023-05-02', 'cfa1d354-4504-4e9f-a7e2-33f197b807be', '854ba06d-c471-4236-921b-be82bb6514c2', '25d5b07c-641a-4c9c-a4a0-e727c351b0c8', 3, 3, 3, '2023-05-02', '2023', '0', '2023-05-28 08:33:09', '2023-05-28 08:33:09'),
(90, '6af3d5d4-4f3a-4409-83c0-c526b483f661-cfa1d354-4504-4e9f-a7e2-33f197b807be-1-2023-05-02', 'cfa1d354-4504-4e9f-a7e2-33f197b807be-2023-05-02', 'cfa1d354-4504-4e9f-a7e2-33f197b807be', '854ba06d-c471-4236-921b-be82bb6514c2', '6af3d5d4-4f3a-4409-83c0-c526b483f661', 3, 2, 0, '2023-05-02', '2023', '0', '2023-05-28 08:33:09', '2023-05-28 08:33:09'),
(91, '25d5b07c-641a-4c9c-a4a0-e727c351b0c8-52479a18-96fe-4f42-8d39-f8ae885c3e50-0-2023-05-02', '52479a18-96fe-4f42-8d39-f8ae885c3e50-2023-05-02', '52479a18-96fe-4f42-8d39-f8ae885c3e50', '854ba06d-c471-4236-921b-be82bb6514c2', '25d5b07c-641a-4c9c-a4a0-e727c351b0c8', 3, 3, 4, '2023-05-02', '2023', '0', '2023-05-28 08:33:31', '2023-05-28 08:33:31'),
(92, '6af3d5d4-4f3a-4409-83c0-c526b483f661-52479a18-96fe-4f42-8d39-f8ae885c3e50-1-2023-05-02', '52479a18-96fe-4f42-8d39-f8ae885c3e50-2023-05-02', '52479a18-96fe-4f42-8d39-f8ae885c3e50', '854ba06d-c471-4236-921b-be82bb6514c2', '6af3d5d4-4f3a-4409-83c0-c526b483f661', 1, 2, 0, '2023-05-02', '2023', '0', '2023-05-28 08:33:31', '2023-05-28 08:33:31'),
(93, '25d5b07c-641a-4c9c-a4a0-e727c351b0c8-b788bf05-430d-4346-8909-5beeab316fc8-0-2023-05-02', 'b788bf05-430d-4346-8909-5beeab316fc8-2023-05-02', 'b788bf05-430d-4346-8909-5beeab316fc8', '854ba06d-c471-4236-921b-be82bb6514c2', '25d5b07c-641a-4c9c-a4a0-e727c351b0c8', 2, 4, 0, '2023-05-02', '2023', '0', '2023-05-28 08:33:49', '2023-05-28 08:33:49'),
(94, '6af3d5d4-4f3a-4409-83c0-c526b483f661-b788bf05-430d-4346-8909-5beeab316fc8-1-2023-05-02', 'b788bf05-430d-4346-8909-5beeab316fc8-2023-05-02', 'b788bf05-430d-4346-8909-5beeab316fc8', '854ba06d-c471-4236-921b-be82bb6514c2', '6af3d5d4-4f3a-4409-83c0-c526b483f661', 2, 0, 1, '2023-05-02', '2023', '0', '2023-05-28 08:33:49', '2023-05-28 08:33:49'),
(95, '25d5b07c-641a-4c9c-a4a0-e727c351b0c8-83a89628-28f8-4b56-90b2-8b886fdcc3e3-0-2023-05-02', '83a89628-28f8-4b56-90b2-8b886fdcc3e3-2023-05-02', '83a89628-28f8-4b56-90b2-8b886fdcc3e3', '854ba06d-c471-4236-921b-be82bb6514c2', '25d5b07c-641a-4c9c-a4a0-e727c351b0c8', 3, 3, 3, '2023-05-02', '2023', '0', '2023-05-28 08:34:08', '2023-05-28 08:34:08'),
(96, '6af3d5d4-4f3a-4409-83c0-c526b483f661-83a89628-28f8-4b56-90b2-8b886fdcc3e3-1-2023-05-02', '83a89628-28f8-4b56-90b2-8b886fdcc3e3-2023-05-02', '83a89628-28f8-4b56-90b2-8b886fdcc3e3', '854ba06d-c471-4236-921b-be82bb6514c2', '6af3d5d4-4f3a-4409-83c0-c526b483f661', 2, 1, 2, '2023-05-02', '2023', '0', '2023-05-28 08:34:08', '2023-05-28 08:34:08'),
(97, '25d5b07c-641a-4c9c-a4a0-e727c351b0c8-1c3a5b94-33a3-4ac7-af64-8108715dcfc3-0-2023-05-03', '1c3a5b94-33a3-4ac7-af64-8108715dcfc3-2023-05-03', '1c3a5b94-33a3-4ac7-af64-8108715dcfc3', '854ba06d-c471-4236-921b-be82bb6514c2', '25d5b07c-641a-4c9c-a4a0-e727c351b0c8', 3, 4, 3, '2023-05-03', '2023', '0', '2023-05-28 08:35:09', '2023-05-28 08:35:09'),
(98, '6af3d5d4-4f3a-4409-83c0-c526b483f661-1c3a5b94-33a3-4ac7-af64-8108715dcfc3-1-2023-05-03', '1c3a5b94-33a3-4ac7-af64-8108715dcfc3-2023-05-03', '1c3a5b94-33a3-4ac7-af64-8108715dcfc3', '854ba06d-c471-4236-921b-be82bb6514c2', '6af3d5d4-4f3a-4409-83c0-c526b483f661', 3, 2, 0, '2023-05-03', '2023', '0', '2023-05-28 08:35:09', '2023-05-28 08:35:09'),
(99, '25d5b07c-641a-4c9c-a4a0-e727c351b0c8-cfa1d354-4504-4e9f-a7e2-33f197b807be-0-2023-05-03', 'cfa1d354-4504-4e9f-a7e2-33f197b807be-2023-05-03', 'cfa1d354-4504-4e9f-a7e2-33f197b807be', '854ba06d-c471-4236-921b-be82bb6514c2', '25d5b07c-641a-4c9c-a4a0-e727c351b0c8', 3, 4, 0, '2023-05-03', '2023', '0', '2023-05-28 08:35:27', '2023-05-28 08:35:27'),
(100, '6af3d5d4-4f3a-4409-83c0-c526b483f661-cfa1d354-4504-4e9f-a7e2-33f197b807be-1-2023-05-03', 'cfa1d354-4504-4e9f-a7e2-33f197b807be-2023-05-03', 'cfa1d354-4504-4e9f-a7e2-33f197b807be', '854ba06d-c471-4236-921b-be82bb6514c2', '6af3d5d4-4f3a-4409-83c0-c526b483f661', 2, 0, 2, '2023-05-03', '2023', '0', '2023-05-28 08:35:27', '2023-05-28 08:35:27'),
(101, '25d5b07c-641a-4c9c-a4a0-e727c351b0c8-52479a18-96fe-4f42-8d39-f8ae885c3e50-0-2023-05-03', '52479a18-96fe-4f42-8d39-f8ae885c3e50-2023-05-03', '52479a18-96fe-4f42-8d39-f8ae885c3e50', '854ba06d-c471-4236-921b-be82bb6514c2', '25d5b07c-641a-4c9c-a4a0-e727c351b0c8', 2, 0, 3, '2023-05-03', '2023', '0', '2023-05-28 08:35:47', '2023-05-28 08:35:47'),
(102, '6af3d5d4-4f3a-4409-83c0-c526b483f661-52479a18-96fe-4f42-8d39-f8ae885c3e50-1-2023-05-03', '52479a18-96fe-4f42-8d39-f8ae885c3e50-2023-05-03', '52479a18-96fe-4f42-8d39-f8ae885c3e50', '854ba06d-c471-4236-921b-be82bb6514c2', '6af3d5d4-4f3a-4409-83c0-c526b483f661', 2, 3, 0, '2023-05-03', '2023', '0', '2023-05-28 08:35:47', '2023-05-28 08:35:47'),
(103, '25d5b07c-641a-4c9c-a4a0-e727c351b0c8-b788bf05-430d-4346-8909-5beeab316fc8-0-2023-05-03', 'b788bf05-430d-4346-8909-5beeab316fc8-2023-05-03', 'b788bf05-430d-4346-8909-5beeab316fc8', '854ba06d-c471-4236-921b-be82bb6514c2', '25d5b07c-641a-4c9c-a4a0-e727c351b0c8', 2, 0, 3, '2023-05-03', '2023', '0', '2023-05-28 08:36:04', '2023-05-28 08:36:04'),
(104, '6af3d5d4-4f3a-4409-83c0-c526b483f661-b788bf05-430d-4346-8909-5beeab316fc8-1-2023-05-03', 'b788bf05-430d-4346-8909-5beeab316fc8-2023-05-03', 'b788bf05-430d-4346-8909-5beeab316fc8', '854ba06d-c471-4236-921b-be82bb6514c2', '6af3d5d4-4f3a-4409-83c0-c526b483f661', 1, 3, 0, '2023-05-03', '2023', '0', '2023-05-28 08:36:04', '2023-05-28 08:36:04'),
(105, '25d5b07c-641a-4c9c-a4a0-e727c351b0c8-83a89628-28f8-4b56-90b2-8b886fdcc3e3-0-2023-05-03', '83a89628-28f8-4b56-90b2-8b886fdcc3e3-2023-05-03', '83a89628-28f8-4b56-90b2-8b886fdcc3e3', '854ba06d-c471-4236-921b-be82bb6514c2', '25d5b07c-641a-4c9c-a4a0-e727c351b0c8', 4, 0, 2, '2023-05-03', '2023', '0', '2023-05-28 08:36:21', '2023-05-28 08:36:21'),
(106, '6af3d5d4-4f3a-4409-83c0-c526b483f661-83a89628-28f8-4b56-90b2-8b886fdcc3e3-1-2023-05-03', '83a89628-28f8-4b56-90b2-8b886fdcc3e3-2023-05-03', '83a89628-28f8-4b56-90b2-8b886fdcc3e3', '854ba06d-c471-4236-921b-be82bb6514c2', '6af3d5d4-4f3a-4409-83c0-c526b483f661', 2, 1, 0, '2023-05-03', '2023', '0', '2023-05-28 08:36:21', '2023-05-28 08:36:21'),
(107, '25d5b07c-641a-4c9c-a4a0-e727c351b0c8-1c3a5b94-33a3-4ac7-af64-8108715dcfc3-0-2023-05-04', '1c3a5b94-33a3-4ac7-af64-8108715dcfc3-2023-05-04', '1c3a5b94-33a3-4ac7-af64-8108715dcfc3', '854ba06d-c471-4236-921b-be82bb6514c2', '25d5b07c-641a-4c9c-a4a0-e727c351b0c8', 2, 3, 2, '2023-05-04', '2023', '0', '2023-05-28 08:38:14', '2023-05-28 08:38:14'),
(108, '6af3d5d4-4f3a-4409-83c0-c526b483f661-1c3a5b94-33a3-4ac7-af64-8108715dcfc3-1-2023-05-04', '1c3a5b94-33a3-4ac7-af64-8108715dcfc3-2023-05-04', '1c3a5b94-33a3-4ac7-af64-8108715dcfc3', '854ba06d-c471-4236-921b-be82bb6514c2', '6af3d5d4-4f3a-4409-83c0-c526b483f661', 3, 0, 2, '2023-05-04', '2023', '0', '2023-05-28 08:38:14', '2023-05-28 08:38:14'),
(109, '25d5b07c-641a-4c9c-a4a0-e727c351b0c8-cfa1d354-4504-4e9f-a7e2-33f197b807be-0-2023-05-04', 'cfa1d354-4504-4e9f-a7e2-33f197b807be-2023-05-04', 'cfa1d354-4504-4e9f-a7e2-33f197b807be', '854ba06d-c471-4236-921b-be82bb6514c2', '25d5b07c-641a-4c9c-a4a0-e727c351b0c8', 4, 0, 4, '2023-05-04', '2023', '0', '2023-05-28 08:39:55', '2023-05-28 08:39:55'),
(110, '6af3d5d4-4f3a-4409-83c0-c526b483f661-cfa1d354-4504-4e9f-a7e2-33f197b807be-1-2023-05-04', 'cfa1d354-4504-4e9f-a7e2-33f197b807be-2023-05-04', 'cfa1d354-4504-4e9f-a7e2-33f197b807be', '854ba06d-c471-4236-921b-be82bb6514c2', '6af3d5d4-4f3a-4409-83c0-c526b483f661', 1, 3, 0, '2023-05-04', '2023', '0', '2023-05-28 08:39:55', '2023-05-28 08:39:55'),
(111, '25d5b07c-641a-4c9c-a4a0-e727c351b0c8-52479a18-96fe-4f42-8d39-f8ae885c3e50-0-2023-05-04', '52479a18-96fe-4f42-8d39-f8ae885c3e50-2023-05-04', '52479a18-96fe-4f42-8d39-f8ae885c3e50', '854ba06d-c471-4236-921b-be82bb6514c2', '25d5b07c-641a-4c9c-a4a0-e727c351b0c8', 2, 3, 0, '2023-05-04', '2023', '0', '2023-05-28 08:40:13', '2023-05-28 08:40:13'),
(112, '6af3d5d4-4f3a-4409-83c0-c526b483f661-52479a18-96fe-4f42-8d39-f8ae885c3e50-1-2023-05-04', '52479a18-96fe-4f42-8d39-f8ae885c3e50-2023-05-04', '52479a18-96fe-4f42-8d39-f8ae885c3e50', '854ba06d-c471-4236-921b-be82bb6514c2', '6af3d5d4-4f3a-4409-83c0-c526b483f661', 1, 0, 2, '2023-05-04', '2023', '0', '2023-05-28 08:40:13', '2023-05-28 08:40:13'),
(113, '25d5b07c-641a-4c9c-a4a0-e727c351b0c8-1c3a5b94-33a3-4ac7-af64-8108715dcfc3-0-2023-05-05', '1c3a5b94-33a3-4ac7-af64-8108715dcfc3-2023-05-05', '1c3a5b94-33a3-4ac7-af64-8108715dcfc3', '854ba06d-c471-4236-921b-be82bb6514c2', '25d5b07c-641a-4c9c-a4a0-e727c351b0c8', 3, 0, 3, '2023-05-05', '2023', '0', '2023-05-28 08:45:21', '2023-05-28 08:45:21'),
(114, '6af3d5d4-4f3a-4409-83c0-c526b483f661-1c3a5b94-33a3-4ac7-af64-8108715dcfc3-1-2023-05-05', '1c3a5b94-33a3-4ac7-af64-8108715dcfc3-2023-05-05', '1c3a5b94-33a3-4ac7-af64-8108715dcfc3', '854ba06d-c471-4236-921b-be82bb6514c2', '6af3d5d4-4f3a-4409-83c0-c526b483f661', 0, 3, 0, '2023-05-05', '2023', '0', '2023-05-28 08:45:21', '2023-05-28 08:45:21'),
(115, '25d5b07c-641a-4c9c-a4a0-e727c351b0c8-cfa1d354-4504-4e9f-a7e2-33f197b807be-0-2023-05-05', 'cfa1d354-4504-4e9f-a7e2-33f197b807be-2023-05-05', 'cfa1d354-4504-4e9f-a7e2-33f197b807be', '854ba06d-c471-4236-921b-be82bb6514c2', '25d5b07c-641a-4c9c-a4a0-e727c351b0c8', 2, 2, 3, '2023-05-05', '2023', '0', '2023-05-28 08:45:43', '2023-05-28 08:45:43'),
(116, '6af3d5d4-4f3a-4409-83c0-c526b483f661-cfa1d354-4504-4e9f-a7e2-33f197b807be-1-2023-05-05', 'cfa1d354-4504-4e9f-a7e2-33f197b807be-2023-05-05', 'cfa1d354-4504-4e9f-a7e2-33f197b807be', '854ba06d-c471-4236-921b-be82bb6514c2', '6af3d5d4-4f3a-4409-83c0-c526b483f661', 0, 2, 3, '2023-05-05', '2023', '0', '2023-05-28 08:45:43', '2023-05-28 08:45:43'),
(117, '25d5b07c-641a-4c9c-a4a0-e727c351b0c8-52479a18-96fe-4f42-8d39-f8ae885c3e50-0-2023-05-05', '52479a18-96fe-4f42-8d39-f8ae885c3e50-2023-05-05', '52479a18-96fe-4f42-8d39-f8ae885c3e50', '854ba06d-c471-4236-921b-be82bb6514c2', '25d5b07c-641a-4c9c-a4a0-e727c351b0c8', 2, 2, 0, '2023-05-05', '2023', '0', '2023-05-28 08:46:09', '2023-05-28 08:46:09'),
(118, '6af3d5d4-4f3a-4409-83c0-c526b483f661-52479a18-96fe-4f42-8d39-f8ae885c3e50-1-2023-05-05', '52479a18-96fe-4f42-8d39-f8ae885c3e50-2023-05-05', '52479a18-96fe-4f42-8d39-f8ae885c3e50', '854ba06d-c471-4236-921b-be82bb6514c2', '6af3d5d4-4f3a-4409-83c0-c526b483f661', 2, 0, 3, '2023-05-05', '2023', '0', '2023-05-28 08:46:09', '2023-05-28 08:46:09'),
(119, '25d5b07c-641a-4c9c-a4a0-e727c351b0c8-b788bf05-430d-4346-8909-5beeab316fc8-0-2023-05-05', 'b788bf05-430d-4346-8909-5beeab316fc8-2023-05-05', 'b788bf05-430d-4346-8909-5beeab316fc8', '854ba06d-c471-4236-921b-be82bb6514c2', '25d5b07c-641a-4c9c-a4a0-e727c351b0c8', 2, 4, 0, '2023-05-05', '2023', '0', '2023-05-28 08:46:53', '2023-05-28 08:46:53'),
(120, '6af3d5d4-4f3a-4409-83c0-c526b483f661-b788bf05-430d-4346-8909-5beeab316fc8-1-2023-05-05', 'b788bf05-430d-4346-8909-5beeab316fc8-2023-05-05', 'b788bf05-430d-4346-8909-5beeab316fc8', '854ba06d-c471-4236-921b-be82bb6514c2', '6af3d5d4-4f3a-4409-83c0-c526b483f661', 0, 2, 2, '2023-05-05', '2023', '0', '2023-05-28 08:46:53', '2023-05-28 08:46:53'),
(121, '25d5b07c-641a-4c9c-a4a0-e727c351b0c8-83a89628-28f8-4b56-90b2-8b886fdcc3e3-0-2023-05-05', '83a89628-28f8-4b56-90b2-8b886fdcc3e3-2023-05-05', '83a89628-28f8-4b56-90b2-8b886fdcc3e3', '854ba06d-c471-4236-921b-be82bb6514c2', '25d5b07c-641a-4c9c-a4a0-e727c351b0c8', 3, 3, 0, '2023-05-05', '2023', '0', '2023-05-28 08:47:17', '2023-05-28 08:47:17'),
(122, '6af3d5d4-4f3a-4409-83c0-c526b483f661-83a89628-28f8-4b56-90b2-8b886fdcc3e3-1-2023-05-05', '83a89628-28f8-4b56-90b2-8b886fdcc3e3-2023-05-05', '83a89628-28f8-4b56-90b2-8b886fdcc3e3', '854ba06d-c471-4236-921b-be82bb6514c2', '6af3d5d4-4f3a-4409-83c0-c526b483f661', 0, 3, 2, '2023-05-05', '2023', '0', '2023-05-28 08:47:17', '2023-05-28 08:47:17'),
(123, '25d5b07c-641a-4c9c-a4a0-e727c351b0c8-1c3a5b94-33a3-4ac7-af64-8108715dcfc3-0-2023-05-30', '1c3a5b94-33a3-4ac7-af64-8108715dcfc3-2023-05-30', '1c3a5b94-33a3-4ac7-af64-8108715dcfc3', '854ba06d-c471-4236-921b-be82bb6514c2', '25d5b07c-641a-4c9c-a4a0-e727c351b0c8', 2, 3, 0, '2023-05-30', '2023', '0', '2023-05-30 03:05:17', '2023-05-30 03:05:17'),
(124, '6af3d5d4-4f3a-4409-83c0-c526b483f661-1c3a5b94-33a3-4ac7-af64-8108715dcfc3-1-2023-05-30', '1c3a5b94-33a3-4ac7-af64-8108715dcfc3-2023-05-30', '1c3a5b94-33a3-4ac7-af64-8108715dcfc3', '854ba06d-c471-4236-921b-be82bb6514c2', '6af3d5d4-4f3a-4409-83c0-c526b483f661', 0, 4, 0, '2023-05-30', '2023', '0', '2023-05-30 03:05:17', '2023-05-30 03:05:17'),
(125, '25d5b07c-641a-4c9c-a4a0-e727c351b0c8-cfa1d354-4504-4e9f-a7e2-33f197b807be-0-2023-05-30', 'cfa1d354-4504-4e9f-a7e2-33f197b807be-2023-05-30', 'cfa1d354-4504-4e9f-a7e2-33f197b807be', '854ba06d-c471-4236-921b-be82bb6514c2', '25d5b07c-641a-4c9c-a4a0-e727c351b0c8', 2, 0, 4, '2023-05-30', '2023', '0', '2023-05-30 03:05:32', '2023-05-30 03:05:32'),
(126, '6af3d5d4-4f3a-4409-83c0-c526b483f661-cfa1d354-4504-4e9f-a7e2-33f197b807be-1-2023-05-30', 'cfa1d354-4504-4e9f-a7e2-33f197b807be-2023-05-30', 'cfa1d354-4504-4e9f-a7e2-33f197b807be', '854ba06d-c471-4236-921b-be82bb6514c2', '6af3d5d4-4f3a-4409-83c0-c526b483f661', 0, 3, 0, '2023-05-30', '2023', '0', '2023-05-30 03:05:32', '2023-05-30 03:05:32'),
(127, '25d5b07c-641a-4c9c-a4a0-e727c351b0c8-52479a18-96fe-4f42-8d39-f8ae885c3e50-0-2023-05-30', '52479a18-96fe-4f42-8d39-f8ae885c3e50-2023-05-30', '52479a18-96fe-4f42-8d39-f8ae885c3e50', '854ba06d-c471-4236-921b-be82bb6514c2', '25d5b07c-641a-4c9c-a4a0-e727c351b0c8', 2, 3, 0, '2023-05-30', '2023', '0', '2023-05-30 03:05:50', '2023-05-30 03:05:50'),
(128, '6af3d5d4-4f3a-4409-83c0-c526b483f661-52479a18-96fe-4f42-8d39-f8ae885c3e50-1-2023-05-30', '52479a18-96fe-4f42-8d39-f8ae885c3e50-2023-05-30', '52479a18-96fe-4f42-8d39-f8ae885c3e50', '854ba06d-c471-4236-921b-be82bb6514c2', '6af3d5d4-4f3a-4409-83c0-c526b483f661', 0, 2, 2, '2023-05-30', '2023', '0', '2023-05-30 03:05:50', '2023-05-30 03:05:50'),
(129, '25d5b07c-641a-4c9c-a4a0-e727c351b0c8-b788bf05-430d-4346-8909-5beeab316fc8-0-2023-05-30', 'b788bf05-430d-4346-8909-5beeab316fc8-2023-05-30', 'b788bf05-430d-4346-8909-5beeab316fc8', '854ba06d-c471-4236-921b-be82bb6514c2', '25d5b07c-641a-4c9c-a4a0-e727c351b0c8', 2, 3, 0, '2023-05-30', '2023', '0', '2023-05-30 03:06:09', '2023-05-30 03:06:09'),
(130, '6af3d5d4-4f3a-4409-83c0-c526b483f661-b788bf05-430d-4346-8909-5beeab316fc8-1-2023-05-30', 'b788bf05-430d-4346-8909-5beeab316fc8-2023-05-30', 'b788bf05-430d-4346-8909-5beeab316fc8', '854ba06d-c471-4236-921b-be82bb6514c2', '6af3d5d4-4f3a-4409-83c0-c526b483f661', 2, 0, 3, '2023-05-30', '2023', '0', '2023-05-30 03:06:09', '2023-05-30 03:06:09'),
(131, '25d5b07c-641a-4c9c-a4a0-e727c351b0c8-83a89628-28f8-4b56-90b2-8b886fdcc3e3-0-2023-05-30', '83a89628-28f8-4b56-90b2-8b886fdcc3e3-2023-05-30', '83a89628-28f8-4b56-90b2-8b886fdcc3e3', '854ba06d-c471-4236-921b-be82bb6514c2', '25d5b07c-641a-4c9c-a4a0-e727c351b0c8', 3, 0, 3, '2023-05-30', '2023', '0', '2023-05-30 03:06:25', '2023-05-30 03:06:25'),
(132, '6af3d5d4-4f3a-4409-83c0-c526b483f661-83a89628-28f8-4b56-90b2-8b886fdcc3e3-1-2023-05-30', '83a89628-28f8-4b56-90b2-8b886fdcc3e3-2023-05-30', '83a89628-28f8-4b56-90b2-8b886fdcc3e3', '854ba06d-c471-4236-921b-be82bb6514c2', '6af3d5d4-4f3a-4409-83c0-c526b483f661', 3, 4, 0, '2023-05-30', '2023', '0', '2023-05-30 03:06:25', '2023-05-30 03:06:25'),
(133, '25d5b07c-641a-4c9c-a4a0-e727c351b0c8-1c3a5b94-33a3-4ac7-af64-8108715dcfc3-0-2023-06-22', '1c3a5b94-33a3-4ac7-af64-8108715dcfc3-2023-06-22', '1c3a5b94-33a3-4ac7-af64-8108715dcfc3', '854ba06d-c471-4236-921b-be82bb6514c2', '25d5b07c-641a-4c9c-a4a0-e727c351b0c8', 3, 2, 3, '2023-06-22', '2023', '0', '2023-06-22 08:23:04', '2023-06-22 08:23:04'),
(134, '6af3d5d4-4f3a-4409-83c0-c526b483f661-1c3a5b94-33a3-4ac7-af64-8108715dcfc3-1-2023-06-22', '1c3a5b94-33a3-4ac7-af64-8108715dcfc3-2023-06-22', '1c3a5b94-33a3-4ac7-af64-8108715dcfc3', '854ba06d-c471-4236-921b-be82bb6514c2', '6af3d5d4-4f3a-4409-83c0-c526b483f661', 2, 0, 1, '2023-06-22', '2023', '0', '2023-06-22 08:23:04', '2023-06-22 08:23:04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilais_attrs`
--

CREATE TABLE `nilais_attrs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uu_attrs` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uu_mapel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uu_class` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uu_kd` longtext COLLATE utf8mb4_unicode_ci,
  `kegiatan` longtext COLLATE utf8mb4_unicode_ci,
  `tanggal` date NOT NULL,
  `status` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `nilais_attrs`
--

INSERT INTO `nilais_attrs` (`id`, `uu_attrs`, `uu_mapel`, `uu_class`, `uu_kd`, `kegiatan`, `tanggal`, `status`, `created_at`, `updated_at`) VALUES
(1, '1c3a5b94-33a3-4ac7-af64-8108715dcfc3-2023-03-01', '1c3a5b94-33a3-4ac7-af64-8108715dcfc3', 'c91767f0-c10f-4c67-a3f6-d5bb101d3fa5', '3e8efe41-0011-46f9-be67-bec78d4008e4', 'pengembanga nilai agama', '2023-03-01', '0', '2023-05-28 07:12:58', '2023-05-28 07:12:58'),
(2, 'cfa1d354-4504-4e9f-a7e2-33f197b807be-2023-03-01', 'cfa1d354-4504-4e9f-a7e2-33f197b807be', 'c91767f0-c10f-4c67-a3f6-d5bb101d3fa5', '2615b688-80ad-48df-bf13-2d7db5ecac5f', 'Perkembangan fisik dan motorik', '2023-03-01', '0', '2023-05-28 07:13:31', '2023-05-28 07:13:31'),
(3, '52479a18-96fe-4f42-8d39-f8ae885c3e50-2023-03-01', '52479a18-96fe-4f42-8d39-f8ae885c3e50', 'c91767f0-c10f-4c67-a3f6-d5bb101d3fa5', '20fec495-2d77-4042-bc03-55b184a4b195', 'Perkembangan Konitif untuk meningkatkan', '2023-03-01', '0', '2023-05-28 07:14:05', '2023-05-28 07:14:05'),
(4, 'b788bf05-430d-4346-8909-5beeab316fc8-2023-03-01', 'b788bf05-430d-4346-8909-5beeab316fc8', 'c91767f0-c10f-4c67-a3f6-d5bb101d3fa5', 'c5d832de-d203-453a-9666-7701b86e3fd3', 'Perkembangan social emosi', '2023-03-01', '0', '2023-05-28 07:14:24', '2023-05-28 07:14:24'),
(5, '83a89628-28f8-4b56-90b2-8b886fdcc3e3-2023-03-01', '83a89628-28f8-4b56-90b2-8b886fdcc3e3', 'c91767f0-c10f-4c67-a3f6-d5bb101d3fa5', '64df37e9-b47a-4f04-832d-0fedc1bc9b07', 'Perkembangan dalam berbahasa', '2023-03-01', '0', '2023-05-28 07:14:42', '2023-05-28 07:14:42'),
(6, '1c3a5b94-33a3-4ac7-af64-8108715dcfc3-2023-03-06', '1c3a5b94-33a3-4ac7-af64-8108715dcfc3', 'c91767f0-c10f-4c67-a3f6-d5bb101d3fa5', '3e8efe41-0011-46f9-be67-bec78d4008e4', 'Perkembangan agama moral', '2023-03-06', '0', '2023-05-28 07:15:25', '2023-05-28 07:15:25'),
(7, 'cfa1d354-4504-4e9f-a7e2-33f197b807be-2023-03-06', 'cfa1d354-4504-4e9f-a7e2-33f197b807be', 'c91767f0-c10f-4c67-a3f6-d5bb101d3fa5', '234478eb-ec38-4b53-9593-b3fbf604b0fb', 'Perkembangan fisik motorik', '2023-03-06', '0', '2023-05-28 07:16:25', '2023-05-28 07:16:25'),
(8, '52479a18-96fe-4f42-8d39-f8ae885c3e50-2023-03-06', '52479a18-96fe-4f42-8d39-f8ae885c3e50', 'c91767f0-c10f-4c67-a3f6-d5bb101d3fa5', 'df9be09f-8e34-44e6-9759-14282174291e', 'kognitif', '2023-03-06', '0', '2023-05-28 07:16:44', '2023-05-28 07:16:44'),
(9, 'b788bf05-430d-4346-8909-5beeab316fc8-2023-03-06', 'b788bf05-430d-4346-8909-5beeab316fc8', 'c91767f0-c10f-4c67-a3f6-d5bb101d3fa5', '8c48ecae-21b8-4a7d-b5cf-8935c11ad5db', 'Memahami social emosi', '2023-03-06', '0', '2023-05-28 07:17:03', '2023-05-28 07:17:03'),
(10, '83a89628-28f8-4b56-90b2-8b886fdcc3e3-2023-03-06', '83a89628-28f8-4b56-90b2-8b886fdcc3e3', 'c91767f0-c10f-4c67-a3f6-d5bb101d3fa5', '495b9bec-019c-436b-a178-9a9952748d68', 'Belajar berbahasa yang baik', '2023-03-06', '0', '2023-05-28 07:17:55', '2023-05-28 07:17:55'),
(11, '1c3a5b94-33a3-4ac7-af64-8108715dcfc3-2023-03-10', '1c3a5b94-33a3-4ac7-af64-8108715dcfc3', 'c91767f0-c10f-4c67-a3f6-d5bb101d3fa5', 'f95d4dd5-e299-41e7-b496-ed085f3735e2', 'Belajar moral', '2023-03-10', '0', '2023-05-28 07:18:17', '2023-05-28 07:18:17'),
(12, 'cfa1d354-4504-4e9f-a7e2-33f197b807be-2023-03-10', 'cfa1d354-4504-4e9f-a7e2-33f197b807be', 'c91767f0-c10f-4c67-a3f6-d5bb101d3fa5', '857f0a4d-042f-4e87-8fd5-13b297134ae3', 'perkembangan motorik', '2023-03-10', '0', '2023-05-28 07:18:37', '2023-05-28 07:18:37'),
(13, '83a89628-28f8-4b56-90b2-8b886fdcc3e3-2023-03-10', '83a89628-28f8-4b56-90b2-8b886fdcc3e3', 'c91767f0-c10f-4c67-a3f6-d5bb101d3fa5', '8613d486-d3e5-47c1-8b47-9446666eaf45', 'perkembangan berbahsa yang baik dan benar', '2023-03-10', '0', '2023-05-28 07:18:58', '2023-05-28 07:18:58'),
(14, '1c3a5b94-33a3-4ac7-af64-8108715dcfc3-2023-03-14', '1c3a5b94-33a3-4ac7-af64-8108715dcfc3', 'c91767f0-c10f-4c67-a3f6-d5bb101d3fa5', 'c9ddbbaa-4120-45de-bef3-345b42a9103f', 'Perkembangan nilai agama', '2023-03-14', '0', '2023-05-28 07:25:31', '2023-05-28 07:25:31'),
(15, 'cfa1d354-4504-4e9f-a7e2-33f197b807be-2023-03-14', 'cfa1d354-4504-4e9f-a7e2-33f197b807be', 'c91767f0-c10f-4c67-a3f6-d5bb101d3fa5', '857f0a4d-042f-4e87-8fd5-13b297134ae3', 'Perkembangan motorik', '2023-03-14', '0', '2023-05-28 07:26:02', '2023-05-28 07:26:02'),
(16, '52479a18-96fe-4f42-8d39-f8ae885c3e50-2023-03-14', '52479a18-96fe-4f42-8d39-f8ae885c3e50', 'c91767f0-c10f-4c67-a3f6-d5bb101d3fa5', 'ae3c09e3-9eae-4f7c-9a1f-2fa321cb0e5e', 'Perkembangan pembelajaran kognitif', '2023-03-14', '0', '2023-05-28 07:26:47', '2023-05-28 07:26:47'),
(17, 'b788bf05-430d-4346-8909-5beeab316fc8-2023-03-14', 'b788bf05-430d-4346-8909-5beeab316fc8', 'c91767f0-c10f-4c67-a3f6-d5bb101d3fa5', '35fd98cd-6645-4bcf-a746-ea723d37269c', 'Belajar social emosi', '2023-03-14', '0', '2023-05-28 07:27:06', '2023-05-28 07:27:06'),
(18, '1c3a5b94-33a3-4ac7-af64-8108715dcfc3-2023-03-22', '1c3a5b94-33a3-4ac7-af64-8108715dcfc3', 'c91767f0-c10f-4c67-a3f6-d5bb101d3fa5', 'c9ddbbaa-4120-45de-bef3-345b42a9103f', 'kegiatan agama dan moral', '2023-03-22', '0', '2023-05-28 07:27:44', '2023-05-28 07:27:44'),
(19, '52479a18-96fe-4f42-8d39-f8ae885c3e50-2023-03-21', '52479a18-96fe-4f42-8d39-f8ae885c3e50', 'c91767f0-c10f-4c67-a3f6-d5bb101d3fa5', '179ab835-0250-47a1-a4cc-e36c1013afec', 'belajar perkembangan', '2023-03-21', '0', '2023-05-28 07:28:13', '2023-05-28 07:28:13'),
(20, 'cfa1d354-4504-4e9f-a7e2-33f197b807be-2023-03-21', 'cfa1d354-4504-4e9f-a7e2-33f197b807be', 'c91767f0-c10f-4c67-a3f6-d5bb101d3fa5', '0f8e6155-d725-4877-9805-0a9a69fa97a7', 'belajar fisik dan motorik', '2023-03-21', '0', '2023-05-28 07:28:33', '2023-05-28 07:28:33'),
(21, '83a89628-28f8-4b56-90b2-8b886fdcc3e3-2023-03-21', '83a89628-28f8-4b56-90b2-8b886fdcc3e3', 'c91767f0-c10f-4c67-a3f6-d5bb101d3fa5', '64df37e9-b47a-4f04-832d-0fedc1bc9b07', 'belajar perkembangan bahasa', '2023-03-21', '0', '2023-05-28 07:28:55', '2023-05-28 07:28:55'),
(22, '1c3a5b94-33a3-4ac7-af64-8108715dcfc3-2023-04-04', '1c3a5b94-33a3-4ac7-af64-8108715dcfc3', 'c91767f0-c10f-4c67-a3f6-d5bb101d3fa5', '3e8efe41-0011-46f9-be67-bec78d4008e4', 'belajar nilai agama', '2023-04-04', '0', '2023-05-28 07:29:18', '2023-05-28 07:29:18'),
(23, 'cfa1d354-4504-4e9f-a7e2-33f197b807be-2023-04-04', 'cfa1d354-4504-4e9f-a7e2-33f197b807be', 'c91767f0-c10f-4c67-a3f6-d5bb101d3fa5', '1729234f-6711-4500-8a8d-d9675cddbe1b', 'belajar fisik', '2023-04-04', '0', '2023-05-28 07:33:09', '2023-05-28 07:33:09'),
(24, 'b788bf05-430d-4346-8909-5beeab316fc8-2023-03-04', 'b788bf05-430d-4346-8909-5beeab316fc8', 'c91767f0-c10f-4c67-a3f6-d5bb101d3fa5', 'f10b8b10-afdb-42ef-9717-bcc036da04a4', 'belajar social emosi', '2023-03-04', '0', '2023-05-28 07:33:34', '2023-05-28 07:33:34'),
(25, '83a89628-28f8-4b56-90b2-8b886fdcc3e3-2023-04-04', '83a89628-28f8-4b56-90b2-8b886fdcc3e3', 'c91767f0-c10f-4c67-a3f6-d5bb101d3fa5', '262ffb9d-16e2-4d58-9962-7707a7f0cc1a', 'belajar perkembangan bahasa', '2023-04-04', '0', '2023-05-28 07:34:06', '2023-05-28 07:34:06'),
(26, 'b788bf05-430d-4346-8909-5beeab316fc8-2023-04-12', 'b788bf05-430d-4346-8909-5beeab316fc8', 'c91767f0-c10f-4c67-a3f6-d5bb101d3fa5', 'c5d832de-d203-453a-9666-7701b86e3fd3', 'Belajar Social emosi', '2023-04-12', '0', '2023-05-28 08:14:29', '2023-05-28 08:14:29'),
(27, '1c3a5b94-33a3-4ac7-af64-8108715dcfc3-2023-04-25', '1c3a5b94-33a3-4ac7-af64-8108715dcfc3', 'c91767f0-c10f-4c67-a3f6-d5bb101d3fa5', 'a1641e93-cdac-4f50-a77c-af155edbbe5e', 'Belajar Perkembangan moral', '2023-04-25', '0', '2023-05-28 08:14:58', '2023-05-28 08:14:58'),
(28, 'b788bf05-430d-4346-8909-5beeab316fc8-2023-04-26', 'b788bf05-430d-4346-8909-5beeab316fc8', 'c91767f0-c10f-4c67-a3f6-d5bb101d3fa5', '2df92a1b-9c87-4e62-b123-24c562c6b706', 'Belajar Emosi', '2023-04-26', '0', '2023-05-28 08:15:32', '2023-05-28 08:15:32'),
(29, '1c3a5b94-33a3-4ac7-af64-8108715dcfc3-2023-04-27', '1c3a5b94-33a3-4ac7-af64-8108715dcfc3', 'c91767f0-c10f-4c67-a3f6-d5bb101d3fa5', '30412e2d-6b63-4a41-9cca-1c78a7814dbc', 'perkembanagn nilai moral', '2023-04-27', '0', '2023-05-28 08:20:28', '2023-05-28 08:20:28'),
(30, '83a89628-28f8-4b56-90b2-8b886fdcc3e3-2023-04-25', '83a89628-28f8-4b56-90b2-8b886fdcc3e3', 'c91767f0-c10f-4c67-a3f6-d5bb101d3fa5', '495b9bec-019c-436b-a178-9a9952748d68', 'Belajar Perkembangan bahasa', '2023-04-25', '0', '2023-05-28 08:21:35', '2023-05-28 08:21:35'),
(31, '52479a18-96fe-4f42-8d39-f8ae885c3e50-2023-05-08', '52479a18-96fe-4f42-8d39-f8ae885c3e50', 'c91767f0-c10f-4c67-a3f6-d5bb101d3fa5', 'adf25cc4-8835-4a99-8c9b-e7aba8bb7b4d', 'Belajar Perkembangan', '2023-05-08', '0', '2023-05-28 08:21:55', '2023-05-28 08:21:55'),
(32, 'b788bf05-430d-4346-8909-5beeab316fc8-2023-05-09', 'b788bf05-430d-4346-8909-5beeab316fc8', 'c91767f0-c10f-4c67-a3f6-d5bb101d3fa5', '401d157f-174f-4868-86b7-5a1b153d271a', 'Belajar social emosi', '2023-05-09', '0', '2023-05-28 08:22:16', '2023-05-28 08:22:16'),
(33, '83a89628-28f8-4b56-90b2-8b886fdcc3e3-2023-05-17', '83a89628-28f8-4b56-90b2-8b886fdcc3e3', 'c91767f0-c10f-4c67-a3f6-d5bb101d3fa5', 'ba3f16c8-2a5b-4a42-a8e3-85e479f5b6e7', 'belajar perkembangan bahasa', '2023-05-17', '0', '2023-05-28 08:22:35', '2023-05-28 08:22:35'),
(34, '1c3a5b94-33a3-4ac7-af64-8108715dcfc3-2023-05-28', '1c3a5b94-33a3-4ac7-af64-8108715dcfc3', 'c91767f0-c10f-4c67-a3f6-d5bb101d3fa5', 'a1641e93-cdac-4f50-a77c-af155edbbe5e', 'belajar perkembangan moral', '2023-05-28', '0', '2023-05-28 08:22:53', '2023-05-28 08:22:53'),
(35, 'cfa1d354-4504-4e9f-a7e2-33f197b807be-2023-05-28', 'cfa1d354-4504-4e9f-a7e2-33f197b807be', 'c91767f0-c10f-4c67-a3f6-d5bb101d3fa5', '0f8e6155-d725-4877-9805-0a9a69fa97a7', 'belajar perkembangan fisik motorik', '2023-05-28', '0', '2023-05-28 08:23:12', '2023-05-28 08:23:12'),
(36, '52479a18-96fe-4f42-8d39-f8ae885c3e50-2023-05-28', '52479a18-96fe-4f42-8d39-f8ae885c3e50', 'c91767f0-c10f-4c67-a3f6-d5bb101d3fa5', '20fec495-2d77-4042-bc03-55b184a4b195', 'Belajar kognitif', '2023-05-28', '0', '2023-05-28 08:23:36', '2023-05-28 08:23:36'),
(37, 'b788bf05-430d-4346-8909-5beeab316fc8-2023-05-28', 'b788bf05-430d-4346-8909-5beeab316fc8', 'c91767f0-c10f-4c67-a3f6-d5bb101d3fa5', '8c48ecae-21b8-4a7d-b5cf-8935c11ad5db', 'Belajar social emosi', '2023-05-28', '0', '2023-05-28 08:23:51', '2023-05-28 08:23:51'),
(38, '83a89628-28f8-4b56-90b2-8b886fdcc3e3-2023-05-28', '83a89628-28f8-4b56-90b2-8b886fdcc3e3', 'c91767f0-c10f-4c67-a3f6-d5bb101d3fa5', '495b9bec-019c-436b-a178-9a9952748d68', 'belajar perkembangan bahasa', '2023-05-28', '0', '2023-05-28 08:24:08', '2023-05-28 08:24:08'),
(39, '1c3a5b94-33a3-4ac7-af64-8108715dcfc3-2023-05-01', '1c3a5b94-33a3-4ac7-af64-8108715dcfc3', 'c91767f0-c10f-4c67-a3f6-d5bb101d3fa5', 'c3538b35-b30f-465b-af36-7ad556063287', 'Belajar agama', '2023-05-01', '0', '2023-05-28 08:25:52', '2023-05-28 08:25:52'),
(40, 'cfa1d354-4504-4e9f-a7e2-33f197b807be-2023-05-01', 'cfa1d354-4504-4e9f-a7e2-33f197b807be', 'c91767f0-c10f-4c67-a3f6-d5bb101d3fa5', 'bd69cd65-cf52-4e5d-a755-2fe8561a68f9', 'Belajar motorik', '2023-05-01', '0', '2023-05-28 08:26:05', '2023-05-28 08:26:05'),
(41, '52479a18-96fe-4f42-8d39-f8ae885c3e50-2023-05-01', '52479a18-96fe-4f42-8d39-f8ae885c3e50', 'c91767f0-c10f-4c67-a3f6-d5bb101d3fa5', 'ae3c09e3-9eae-4f7c-9a1f-2fa321cb0e5e', 'Belajar kognitif', '2023-05-01', '0', '2023-05-28 08:26:22', '2023-05-28 08:26:22'),
(42, 'b788bf05-430d-4346-8909-5beeab316fc8-2023-05-01', 'b788bf05-430d-4346-8909-5beeab316fc8', 'c91767f0-c10f-4c67-a3f6-d5bb101d3fa5', 'c5d832de-d203-453a-9666-7701b86e3fd3', 'belajar social emosi', '2023-05-01', '0', '2023-05-28 08:26:46', '2023-05-28 08:26:46'),
(43, '83a89628-28f8-4b56-90b2-8b886fdcc3e3-2023-05-01', '83a89628-28f8-4b56-90b2-8b886fdcc3e3', 'c91767f0-c10f-4c67-a3f6-d5bb101d3fa5', '8a2356dd-ef6f-467c-bbf6-73e59fb32e9f', 'belajar perkebangan bahasa', '2023-05-01', '0', '2023-05-28 08:27:07', '2023-05-28 08:27:07'),
(44, '1c3a5b94-33a3-4ac7-af64-8108715dcfc3-2023-05-02', '1c3a5b94-33a3-4ac7-af64-8108715dcfc3', 'c91767f0-c10f-4c67-a3f6-d5bb101d3fa5', 'c3538b35-b30f-465b-af36-7ad556063287', 'Belajar beragama dan moral', '2023-05-02', '0', '2023-05-28 08:32:53', '2023-05-28 08:32:53'),
(45, 'cfa1d354-4504-4e9f-a7e2-33f197b807be-2023-05-02', 'cfa1d354-4504-4e9f-a7e2-33f197b807be', 'c91767f0-c10f-4c67-a3f6-d5bb101d3fa5', 'bd69cd65-cf52-4e5d-a755-2fe8561a68f9', 'Belajar fisik', '2023-05-02', '0', '2023-05-28 08:33:09', '2023-05-28 08:33:09'),
(46, '52479a18-96fe-4f42-8d39-f8ae885c3e50-2023-05-02', '52479a18-96fe-4f42-8d39-f8ae885c3e50', 'c91767f0-c10f-4c67-a3f6-d5bb101d3fa5', '4c96542d-cacc-44c6-aed7-1992a557b973', 'Belajar kognitif', '2023-05-02', '0', '2023-05-28 08:33:31', '2023-05-28 08:33:31'),
(47, 'b788bf05-430d-4346-8909-5beeab316fc8-2023-05-02', 'b788bf05-430d-4346-8909-5beeab316fc8', 'c91767f0-c10f-4c67-a3f6-d5bb101d3fa5', '42e6024a-0919-4d70-8b0e-ae5e16f4c7be', 'Belajar emosi', '2023-05-02', '0', '2023-05-28 08:33:49', '2023-05-28 08:33:49'),
(48, '83a89628-28f8-4b56-90b2-8b886fdcc3e3-2023-05-02', '83a89628-28f8-4b56-90b2-8b886fdcc3e3', 'c91767f0-c10f-4c67-a3f6-d5bb101d3fa5', '495b9bec-019c-436b-a178-9a9952748d68', 'Belajar bahasa', '2023-05-02', '0', '2023-05-28 08:34:08', '2023-05-28 08:34:08'),
(49, '1c3a5b94-33a3-4ac7-af64-8108715dcfc3-2023-05-03', '1c3a5b94-33a3-4ac7-af64-8108715dcfc3', 'c91767f0-c10f-4c67-a3f6-d5bb101d3fa5', 'a1641e93-cdac-4f50-a77c-af155edbbe5e', 'Belajar Nilai agama', '2023-05-03', '0', '2023-05-28 08:35:09', '2023-05-28 08:35:09'),
(50, 'cfa1d354-4504-4e9f-a7e2-33f197b807be-2023-05-03', 'cfa1d354-4504-4e9f-a7e2-33f197b807be', 'c91767f0-c10f-4c67-a3f6-d5bb101d3fa5', 'bd69cd65-cf52-4e5d-a755-2fe8561a68f9', 'Perkembangan motorik', '2023-05-03', '0', '2023-05-28 08:35:27', '2023-05-28 08:35:27'),
(51, '52479a18-96fe-4f42-8d39-f8ae885c3e50-2023-05-03', '52479a18-96fe-4f42-8d39-f8ae885c3e50', 'c91767f0-c10f-4c67-a3f6-d5bb101d3fa5', 'df9be09f-8e34-44e6-9759-14282174291e', 'Belajar Konginitif', '2023-05-03', '0', '2023-05-28 08:35:47', '2023-05-28 08:35:47'),
(52, 'b788bf05-430d-4346-8909-5beeab316fc8-2023-05-03', 'b788bf05-430d-4346-8909-5beeab316fc8', 'c91767f0-c10f-4c67-a3f6-d5bb101d3fa5', '35fd98cd-6645-4bcf-a746-ea723d37269c', 'Belajar social emosi', '2023-05-03', '0', '2023-05-28 08:36:04', '2023-05-28 08:36:04'),
(53, '83a89628-28f8-4b56-90b2-8b886fdcc3e3-2023-05-03', '83a89628-28f8-4b56-90b2-8b886fdcc3e3', 'c91767f0-c10f-4c67-a3f6-d5bb101d3fa5', '262ffb9d-16e2-4d58-9962-7707a7f0cc1a', 'Belajar berhahasa', '2023-05-03', '0', '2023-05-28 08:36:21', '2023-05-28 08:36:21'),
(54, '1c3a5b94-33a3-4ac7-af64-8108715dcfc3-2023-05-04', '1c3a5b94-33a3-4ac7-af64-8108715dcfc3', 'c91767f0-c10f-4c67-a3f6-d5bb101d3fa5', 'f95d4dd5-e299-41e7-b496-ed085f3735e2', 'Belajar Moral dan agama', '2023-05-04', '0', '2023-05-28 08:38:14', '2023-05-28 08:38:14'),
(55, 'cfa1d354-4504-4e9f-a7e2-33f197b807be-2023-05-04', 'cfa1d354-4504-4e9f-a7e2-33f197b807be', 'c91767f0-c10f-4c67-a3f6-d5bb101d3fa5', '0f8e6155-d725-4877-9805-0a9a69fa97a7', 'Belajar Motorik', '2023-05-04', '0', '2023-05-28 08:39:55', '2023-05-28 08:39:55'),
(56, '52479a18-96fe-4f42-8d39-f8ae885c3e50-2023-05-04', '52479a18-96fe-4f42-8d39-f8ae885c3e50', 'c91767f0-c10f-4c67-a3f6-d5bb101d3fa5', 'df9be09f-8e34-44e6-9759-14282174291e', 'Belajar kognitif', '2023-05-04', '0', '2023-05-28 08:40:13', '2023-05-28 08:40:13'),
(57, '1c3a5b94-33a3-4ac7-af64-8108715dcfc3-2023-05-05', '1c3a5b94-33a3-4ac7-af64-8108715dcfc3', 'c91767f0-c10f-4c67-a3f6-d5bb101d3fa5', 'c9ddbbaa-4120-45de-bef3-345b42a9103f', 'Belajar agama', '2023-05-05', '0', '2023-05-28 08:45:21', '2023-05-28 08:45:21'),
(58, 'cfa1d354-4504-4e9f-a7e2-33f197b807be-2023-05-05', 'cfa1d354-4504-4e9f-a7e2-33f197b807be', 'c91767f0-c10f-4c67-a3f6-d5bb101d3fa5', '857f0a4d-042f-4e87-8fd5-13b297134ae3', 'Belajar motorik', '2023-05-05', '0', '2023-05-28 08:45:43', '2023-05-28 08:45:43'),
(59, '52479a18-96fe-4f42-8d39-f8ae885c3e50-2023-05-05', '52479a18-96fe-4f42-8d39-f8ae885c3e50', 'c91767f0-c10f-4c67-a3f6-d5bb101d3fa5', '7d72a904-72b9-4b8b-a6ab-eabd2e604025', 'Belajar perkembangan kognitif', '2023-05-05', '0', '2023-05-28 08:46:09', '2023-05-28 08:46:09'),
(60, 'b788bf05-430d-4346-8909-5beeab316fc8-2023-05-05', 'b788bf05-430d-4346-8909-5beeab316fc8', 'c91767f0-c10f-4c67-a3f6-d5bb101d3fa5', 'c5d832de-d203-453a-9666-7701b86e3fd3', 'Belajar social emosi', '2023-05-05', '0', '2023-05-28 08:46:53', '2023-05-28 08:46:53'),
(61, '83a89628-28f8-4b56-90b2-8b886fdcc3e3-2023-05-05', '83a89628-28f8-4b56-90b2-8b886fdcc3e3', 'c91767f0-c10f-4c67-a3f6-d5bb101d3fa5', '495b9bec-019c-436b-a178-9a9952748d68', 'Belajar perkembanga  bahasa', '2023-05-05', '0', '2023-05-28 08:47:17', '2023-05-28 08:47:17'),
(62, '1c3a5b94-33a3-4ac7-af64-8108715dcfc3-2023-05-30', '1c3a5b94-33a3-4ac7-af64-8108715dcfc3', 'c91767f0-c10f-4c67-a3f6-d5bb101d3fa5', 'c9ddbbaa-4120-45de-bef3-345b42a9103f', 'Belajar Beragama', '2023-05-30', '0', '2023-05-30 03:05:17', '2023-05-30 03:05:17'),
(63, 'cfa1d354-4504-4e9f-a7e2-33f197b807be-2023-05-30', 'cfa1d354-4504-4e9f-a7e2-33f197b807be', 'c91767f0-c10f-4c67-a3f6-d5bb101d3fa5', '857f0a4d-042f-4e87-8fd5-13b297134ae3', 'Belajar Perkembangan fisik', '2023-05-30', '0', '2023-05-30 03:05:32', '2023-05-30 03:05:32'),
(64, '52479a18-96fe-4f42-8d39-f8ae885c3e50-2023-05-30', '52479a18-96fe-4f42-8d39-f8ae885c3e50', 'c91767f0-c10f-4c67-a3f6-d5bb101d3fa5', 'df9be09f-8e34-44e6-9759-14282174291e', 'Belajar berkembang kognitif', '2023-05-30', '0', '2023-05-30 03:05:50', '2023-05-30 03:05:50'),
(65, 'b788bf05-430d-4346-8909-5beeab316fc8-2023-05-30', 'b788bf05-430d-4346-8909-5beeab316fc8', 'c91767f0-c10f-4c67-a3f6-d5bb101d3fa5', 'dfdb56f5-219c-4ab4-b6e6-2a4325c4e2fe', 'Belajar tentang social emosi', '2023-05-30', '0', '2023-05-30 03:06:09', '2023-05-30 03:06:09'),
(66, '83a89628-28f8-4b56-90b2-8b886fdcc3e3-2023-05-30', '83a89628-28f8-4b56-90b2-8b886fdcc3e3', 'c91767f0-c10f-4c67-a3f6-d5bb101d3fa5', '64df37e9-b47a-4f04-832d-0fedc1bc9b07', 'Belajar Berbahasa', '2023-05-30', '0', '2023-05-30 03:06:25', '2023-05-30 03:06:25'),
(67, '1c3a5b94-33a3-4ac7-af64-8108715dcfc3-2023-06-22', '1c3a5b94-33a3-4ac7-af64-8108715dcfc3', 'c91767f0-c10f-4c67-a3f6-d5bb101d3fa5', 'c3538b35-b30f-465b-af36-7ad556063287', 'Sholat Berjamah', '2023-06-22', '0', '2023-06-22 08:23:04', '2023-06-22 08:23:04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `notes`
--

CREATE TABLE `notes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uu_note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uuid_g` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text` longtext COLLATE utf8mb4_unicode_ci,
  `text2` longtext COLLATE utf8mb4_unicode_ci,
  `status` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengaduans`
--

CREATE TABLE `pengaduans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid_m` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text_tanggapan` longtext COLLATE utf8mb4_unicode_ci,
  `tgl_tanggapan` date DEFAULT NULL,
  `status` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `status1` varchar(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pengaduans`
--

INSERT INTO `pengaduans` (`id`, `uuid_m`, `text`, `text_tanggapan`, `tgl_tanggapan`, `status`, `status1`, `created_at`, `updated_at`) VALUES
(1, '25d5b07c-641a-4c9c-a4a0-e727c351b0c8', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '2023-07-09', '1', '2', '2023-05-30 13:58:30', '2023-07-09 09:53:16'),
(2, '25d5b07c-641a-4c9c-a4a0-e727c351b0c8', 'Ada yang salah di sekolah ini', 'baik akan saya proses', '2023-07-09', '1', '1', '2023-05-30 14:51:48', '2023-07-09 09:53:32'),
(3, '25d5b07c-641a-4c9c-a4a0-e727c351b0c8', 'testt11', NULL, NULL, '0', NULL, '2023-07-09 14:28:15', '2023-07-09 14:28:15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `raports`
--

CREATE TABLE `raports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uu_raport` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uuid_m` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `izin` varchar(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sakit` varchar(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alpha` varchar(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tahun_ajaran` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `raports`
--

INSERT INTO `raports` (`id`, `uu_raport`, `uuid_m`, `izin`, `sakit`, `alpha`, `tahun_ajaran`, `tanggal`, `created_at`, `updated_at`) VALUES
(1, '373c2454-0559-45fa-8717-6d0aa0ee5baf', '25d5b07c-641a-4c9c-a4a0-e727c351b0c8', '2', '1', '1', '2023', '2023-05-28', '2023-05-28 13:01:45', '2023-05-28 13:01:45'),
(2, '373c2454-0559-45fa-8717-6d0aa0ee5baf', '6af3d5d4-4f3a-4409-83c0-c526b483f661', '1', '1', '0', '2023', '2023-05-28', '2023-05-28 13:01:45', '2023-05-28 13:01:45');

-- --------------------------------------------------------

--
-- Struktur dari tabel `raports_attrs`
--

CREATE TABLE `raports_attrs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uu_raport` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uuid_g` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uuid_m` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uu_mapel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nilai` tinyint(1) DEFAULT NULL,
  `status` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `raports_attrs`
--

INSERT INTO `raports_attrs` (`id`, `uu_raport`, `uuid_g`, `uuid_m`, `uu_mapel`, `nilai`, `status`, `created_at`, `updated_at`) VALUES
(1, '373c2454-0559-45fa-8717-6d0aa0ee5baf', '854ba06d-c471-4236-921b-be82bb6514c2', '25d5b07c-641a-4c9c-a4a0-e727c351b0c8', '1c3a5b94-33a3-4ac7-af64-8108715dcfc3', 4, '0', '2023-05-28 13:01:45', '2023-05-28 13:01:45'),
(2, '373c2454-0559-45fa-8717-6d0aa0ee5baf', '854ba06d-c471-4236-921b-be82bb6514c2', '25d5b07c-641a-4c9c-a4a0-e727c351b0c8', 'cfa1d354-4504-4e9f-a7e2-33f197b807be', 4, '0', '2023-05-28 13:01:45', '2023-05-28 13:01:45'),
(3, '373c2454-0559-45fa-8717-6d0aa0ee5baf', '854ba06d-c471-4236-921b-be82bb6514c2', '25d5b07c-641a-4c9c-a4a0-e727c351b0c8', '52479a18-96fe-4f42-8d39-f8ae885c3e50', 4, '0', '2023-05-28 13:01:45', '2023-05-28 13:01:45'),
(4, '373c2454-0559-45fa-8717-6d0aa0ee5baf', '854ba06d-c471-4236-921b-be82bb6514c2', '25d5b07c-641a-4c9c-a4a0-e727c351b0c8', 'b788bf05-430d-4346-8909-5beeab316fc8', 4, '0', '2023-05-28 13:01:45', '2023-05-28 13:01:45'),
(5, '373c2454-0559-45fa-8717-6d0aa0ee5baf', '854ba06d-c471-4236-921b-be82bb6514c2', '25d5b07c-641a-4c9c-a4a0-e727c351b0c8', '83a89628-28f8-4b56-90b2-8b886fdcc3e3', 4, '0', '2023-05-28 13:01:45', '2023-05-28 13:01:45'),
(6, '373c2454-0559-45fa-8717-6d0aa0ee5baf', '854ba06d-c471-4236-921b-be82bb6514c2', '6af3d5d4-4f3a-4409-83c0-c526b483f661', '1c3a5b94-33a3-4ac7-af64-8108715dcfc3', 4, '0', '2023-05-28 13:01:45', '2023-05-28 13:01:45'),
(7, '373c2454-0559-45fa-8717-6d0aa0ee5baf', '854ba06d-c471-4236-921b-be82bb6514c2', '6af3d5d4-4f3a-4409-83c0-c526b483f661', 'cfa1d354-4504-4e9f-a7e2-33f197b807be', 4, '0', '2023-05-28 13:01:45', '2023-05-28 13:01:45'),
(8, '373c2454-0559-45fa-8717-6d0aa0ee5baf', '854ba06d-c471-4236-921b-be82bb6514c2', '6af3d5d4-4f3a-4409-83c0-c526b483f661', '52479a18-96fe-4f42-8d39-f8ae885c3e50', 3, '0', '2023-05-28 13:01:45', '2023-05-28 13:01:45'),
(9, '373c2454-0559-45fa-8717-6d0aa0ee5baf', '854ba06d-c471-4236-921b-be82bb6514c2', '6af3d5d4-4f3a-4409-83c0-c526b483f661', 'b788bf05-430d-4346-8909-5beeab316fc8', 3, '0', '2023-05-28 13:01:45', '2023-05-28 13:01:45'),
(10, '373c2454-0559-45fa-8717-6d0aa0ee5baf', '854ba06d-c471-4236-921b-be82bb6514c2', '6af3d5d4-4f3a-4409-83c0-c526b483f661', '83a89628-28f8-4b56-90b2-8b886fdcc3e3', 3, '0', '2023-05-28 13:01:45', '2023-05-28 13:01:45');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswas`
--

CREATE TABLE `siswas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `no_induk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nisn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uuid_m` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_panggilan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kewarganegaraan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_kk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `register_akta_lahir` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `berkebutuhan_khusus` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tempat_lahir` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tahun_lahir` date DEFAULT NULL,
  `agama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `domisili` longtext COLLATE utf8mb4_unicode_ci,
  `nama_dusun` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kecamatan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kelurahan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kota` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provinsi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rt` int(11) DEFAULT NULL,
  `rw` int(11) DEFAULT NULL,
  `kodepos` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tempat_tinggal` longtext COLLATE utf8mb4_unicode_ci,
  `transportasi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tahun_ajaran` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `anak_ke` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `j_saudara_k` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `penyakit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tb` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bb` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jarak` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `waktu_tempuh` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hobby` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cita_cita` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uu_class` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `f_parent_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `f_parent_nik` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `f_parent_tempat_lahir` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `f_parent_birth` date DEFAULT NULL,
  `f_parent_edu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `f_parent_work` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `f_parent_penghasilan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `f_parent_berkebutuhan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `f_parent_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `f_parent_kelurahan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `f_parent_kodepos` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `m_parent_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `m_parent_nik` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `m_parent_tempat_lahir` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `m_parent_birth` date DEFAULT NULL,
  `m_parent_edu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `m_parent_work` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `m_parent_penghasilan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `m_parent_berkebutuhan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `m_parent_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `m_parent_kelurahan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `m_parent_kodepos` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telp_rumah` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telp_ayah` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telp_ibu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rombel` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `file_kk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_akta_lahir` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_ktp1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_ktp2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `siswas`
--

INSERT INTO `siswas` (`id`, `no_induk`, `nisn`, `uuid_m`, `nama_panggilan`, `gender`, `kewarganegaraan`, `nik`, `no_kk`, `register_akta_lahir`, `berkebutuhan_khusus`, `tempat_lahir`, `tahun_lahir`, `agama`, `domisili`, `nama_dusun`, `kecamatan`, `kelurahan`, `kota`, `provinsi`, `rt`, `rw`, `kodepos`, `tempat_tinggal`, `transportasi`, `tahun_ajaran`, `anak_ke`, `j_saudara_k`, `penyakit`, `tb`, `bb`, `lk`, `jarak`, `waktu_tempuh`, `hobby`, `cita_cita`, `uu_class`, `f_parent_name`, `f_parent_nik`, `f_parent_tempat_lahir`, `f_parent_birth`, `f_parent_edu`, `f_parent_work`, `f_parent_penghasilan`, `f_parent_berkebutuhan`, `f_parent_address`, `f_parent_kelurahan`, `f_parent_kodepos`, `m_parent_name`, `m_parent_nik`, `m_parent_tempat_lahir`, `m_parent_birth`, `m_parent_edu`, `m_parent_work`, `m_parent_penghasilan`, `m_parent_berkebutuhan`, `m_parent_address`, `m_parent_kelurahan`, `m_parent_kodepos`, `telp_rumah`, `telp_ayah`, `telp_ibu`, `image`, `rombel`, `status`, `file_kk`, `file_akta_lahir`, `file_ktp1`, `file_ktp2`, `created_at`, `updated_at`) VALUES
(1, NULL, '', 'a6344811-dcef-446b-a65e-5c0329846e2a', 'Ut enim voluptatem s', 'Perempuan', 'In laudantium hic v', '1926154585778829', '1952514807679398', 'Voluptatem eligendi', 'Tidak', 'Consectetur dolorum', '2017-10-06', 'Belum Pilih Agama', '85 East First Avenue', '9', 'Tidak ada', '13', 'KOTA TANGERANG', 'BANTEN', 4, 3, '82822', '61 Clarendon Extension', 'Motor', '2023', '695', '210', NULL, '182', '418', '528', 'Lebih dari 1KM', '46', '', '', '23ce0af1-32c2-4deb-903c-054fee8ec665', '1354197619006690', '1977929637212754', '1669931654894856', '2017-11-13', 'S1', 'Pegawai Pajak', '2Jt - 5Jt', 'Iya', '93 Oak Boulevard', '16-Dec-1993', '61372', '1581423323200215', '1739547186493901', '1172902375643565', '2018-01-10', 'SMK / Sederajat', 'Pelatih', '5Jt - 10JT', 'Iya', '76 Green Hague Avenue', '31-Aug-1993', '17194', '628764142416', '628262435099', '628392088195', '/images/default.jpg', NULL, '1', '/upload_berkas/x8r3HRD0Z6j33Y6CaJjX6DCwYGEQm8JRfNOUlask.pdf', '/upload_berkas/G7myyRxIwMbYLTB4uoWRnLH42QOXpCRlFcNQQXBq.pdf', '/upload_berkas/j3i1wEnEIMoWBPt7EZg5DTWS7aA3UGLIgPOUKGLN.pdf', '/upload_berkas/htDrfGMKlRHrLHtPAzXpsco12UT3CvBD0hp3tht1.pdf', '2023-05-19 08:35:46', '2023-05-19 09:18:38'),
(2, NULL, '', '25d5b07c-641a-4c9c-a4a0-e727c351b0c8', 'Consequatur Commodo', 'Laki-laki', 'Cillum recusandae M', '1626797002044535', '1318871416379251', 'Omnis doloremque cor', 'Iya', 'Ut minus ratione eli', '2017-05-16', 'Belum Pilih Agama', '337 Rocky Clarendon Street', '13', 'Tidak ada', '3', 'KOTA JAKARTA SELATAN', 'DKI JAKARTA', 1, 2, '93881', '80 New Lane', 'Motor', '2023', '239', '681', NULL, '70', '346', '948', 'Lebih dari 1KM', '81', 'Tidur', 'Programer', 'c91767f0-c10f-4c67-a3f6-d5bb101d3fa5', '1265815724782627', '1262181818523873', '1193097392120514', '2017-07-11', 'D3', 'Pelatih', '5Jt - 10JT', 'Tidak', '49 West Nobel Parkway', '18-Jul-1987', '75017', '1344146982266411', '1178598316333060', '1741385618954326', '2018-03-09', 'SMP / Sederajat', 'PNS', '5Jt - 10JT', 'Iya', '37 Fabien Extension', '08-Nov-1997', '33986', '628374856572', '628216876318', '628955284181', '/images/default.jpg', NULL, '1', '/upload_berkas/lkjQNtMx1FgSzgSQ4sFJX1GfNZ2EnT0QIZas3rTy.pdf', '/upload_berkas/BvxRi3Sy7i3ylit8nXtfPnDAYMZvgHDKjNvN8crG.pdf', '/upload_berkas/4gvn1MZiT1t9RBWPTfNloZy0TnGOpX6yODncvNuy.pdf', '/upload_berkas/t8syiyzvpY9blavtau3BtvYceRt0UhGbE1epgGtL.pdf', '2023-05-19 09:31:51', '2023-05-19 09:48:04'),
(3, NULL, '', '6af3d5d4-4f3a-4409-83c0-c526b483f661', 'Fuga Quis eum non b', 'Tidak ada', 'Omnis fugiat adipis', '1822927862182647', '1193243885631966', 'Dolorem voluptate pa', 'Tidak', 'Accusamus sunt facil', '2017-12-04', 'Belum Pilih Agama', '387 South First Parkway', '4', '3', '10', 'KABUPATEN BANTUL', 'DI YOGYAKARTA', 3, 3, '74067', '49 New Avenue', 'Motor', '2023', '993', '150', NULL, '231', '806', '253', 'Lebih dari 1KM', '53', 'Tidak ada', 'Tidak ada', 'c91767f0-c10f-4c67-a3f6-d5bb101d3fa5', '1999451819897381', '1990236570240224', '1458843229485267', '2017-06-05', '-Pilih Jenjang Pendidikan-', '-Pilih Pekerjaan-', '>=10Jt', 'Iya', '755 West Green First Road', '24-Oct-1995', '86730', '1315995014247991', '1481460607024957', '1721444038125095', '2017-04-11', '-Pilih Jenjang Pendidikan-', '-Pilih Pekerjaan-', '5Jt - 10JT', 'Iya', '81 Fabien Road', '01-Dec-1997', '70401', '628117917793', '628992586665', '628349039731', '/images/1685289059.jpg', NULL, '1', '/upload_berkas/5xZQpOK9McuZ794gz1s94QBDQnfFpK302N35N95Y.pdf', '/upload_berkas/SSPqV35qmtFYdcaUdHguFe9PwMNPLWjtNxIu67nR.pdf', '/upload_berkas/GDrHFTudcXz16OeqGvnHCE4UgCV3foKl9REVU0rH.pdf', '/upload_berkas/kCfMfxXgoBxFogAOsNlBzQi2ErwHSQeUe3ZJrxm0.pdf', '2023-05-23 11:22:06', '2023-05-23 11:23:17'),
(4, NULL, '', '1ad68901-8488-4f78-8fa0-98c55c0cea1c', 'Id doloremque dolore', 'Laki-laki', 'Labore ut ex officia', '1781058578013660', '1473510246285830', 'Quis iusto consequat', 'Tidak', 'Non sequi ratione te', '2017-09-02', 'Islam', '70 Clarendon Avenue', '9', 'Tidak ada', 'asdsad', 'KABUPATEN LANDAK', 'KALIMANTAN BARAT', 5, 4, '10292', '15 Fabien Road', 'Motor', '2023', '59', '480', NULL, '365', '414', '668', 'Kurang dari 1KM', '63', 'Tidak ada', 'Tidak ada', '23ce0af1-32c2-4deb-903c-054fee8ec665', 'nama ayah', '1490819406586318', '1410111883312891', '2017-03-21', 'SMK / Sederajat', 'Polisi', '-Penghasilan Ayah-', 'Tidak', '890 Old Street', '24-May-1992', '60662', 'nama ibu', '1314305707049959', '1639768930739971', '2018-05-14', 'SMA / Sederajat', '-Pilih Pekerjaan-', '>=10Jt', 'Iya', '926 West Old Street', '04-Jul-1993', '53100', '628775467552', '628051637914', '628384988162', '/images/default.jpg', NULL, '1', '/upload_berkas/66A86I9XGKoXfQSEtfs9OHrhuPeRZOEEosrzIbAD.pdf', '/upload_berkas/xgrv0bKgrkyGT26GRUz4Yrzy5pZa8sjreINPZlVA.pdf', '/upload_berkas/4eMIwfJR5eOFWMEWV9s2Jt1QOP84xGAsQieSeSBs.pdf', '/upload_berkas/9xY6HCLxZ2TzT7iaeD868bHHsC7SQTUgOaUZyMxa.pdf', '2023-05-24 04:44:41', '2023-05-24 04:46:20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('admin','operator','kepsek','guru','wali') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'wali',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `uuid`, `full_name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '6e3bb829-c4a8-4bbe-9d4f-3c7daafdd50c', 'Fatah Idzhar Hamdi', 'fatahidzhar.h@gmail.com', NULL, '$2y$10$eSoLyXT5CgFM54Vmihk4GO/KDVHfw6nN2GuOangmbBQZu45wzIF6a', 'admin', NULL, '2023-05-16 13:22:46', '2023-05-16 13:22:46'),
(2, 'a6344811-dcef-446b-a65e-5c0329846e2a', 'Ashton Mosley', 'xavamyhym@mailinator.com', NULL, '$2y$10$DcfvQlqkgCXFbSmW11A8yeA3q3kJ9pfFwpgyW2t0wglSAZnWWF6HC', 'wali', NULL, '2023-05-19 08:35:46', '2023-05-19 08:35:46'),
(3, '25d5b07c-641a-4c9c-a4a0-e727c351b0c8', 'Alfreda Burke', 'wadic@mailinator.com', NULL, '$2y$10$Ckgb2CeFZP8ZIZ4OoT3uCOWU1F.fXIH7Cp1w6a85HAVZFqC6X4Muy', 'wali', NULL, '2023-05-19 09:31:51', '2023-05-19 09:31:51'),
(4, '854ba06d-c471-4236-921b-be82bb6514c2', 'Tamara Beach', 'arum54620@gmail.com', NULL, '$2y$10$c6LCFWpD.aX3/h/7WoSSPup9qDhe7gFm9X4.th48otsX54W3krSZm', 'guru', NULL, '2023-05-20 03:19:51', '2023-05-20 03:19:51'),
(5, '6af3d5d4-4f3a-4409-83c0-c526b483f661', 'Kasimir Blackburn', 'neratolo@mailinator.com', NULL, '$2y$10$HhWZryEkaEBkoyYTO2VDw.6Kf1bl3iXvYf0eabsVYjjP3NB8vLBs6', 'wali', NULL, '2023-05-23 11:22:06', '2023-05-23 11:22:06'),
(6, '1ad68901-8488-4f78-8fa0-98c55c0cea1c', 'Hillary Underwood', 'canyju@mailinator.com', NULL, '$2y$10$0h5..QkFXWPwdZs.sbVuDeFuzWs/VLZEZ7kBqq94hZvwKVB/KDM.S', 'wali', NULL, '2023-05-24 04:44:41', '2023-05-24 04:44:41'),
(7, 'b9e02d14-cd91-4d06-b1a2-d492d5fe4036', 'Nash Bray', 'byvonis@mailinator.com', NULL, '$2y$10$Y0LITn1MiJK8BAqYYu7uKu3eJWEZQMgqoCnQUvh8AHANlwN0JZHEe', 'guru', NULL, '2023-07-09 10:45:31', '2023-07-09 10:45:31');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `absensis`
--
ALTER TABLE `absensis`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `absensis_uu_absen_unique` (`uu_absen`);

--
-- Indeks untuk tabel `aspek_k_d_s`
--
ALTER TABLE `aspek_k_d_s`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `aspek_k_d_s_uu_kd_unique` (`uu_kd`);

--
-- Indeks untuk tabel `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`);

--
-- Indeks untuk tabel `categories_attrs`
--
ALTER TABLE `categories_attrs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `classes_name_class_unique` (`name_class`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `gurus`
--
ALTER TABLE `gurus`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `gurus_uuid_g_unique` (`uuid_g`),
  ADD UNIQUE KEY `gurus_nip_unique` (`nip`),
  ADD UNIQUE KEY `gurus_nuptk_unique` (`nuptk`);

--
-- Indeks untuk tabel `information`
--
ALTER TABLE `information`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mapels`
--
ALTER TABLE `mapels`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mapels_uu_mapel_unique` (`uu_mapel`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `nilais`
--
ALTER TABLE `nilais`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nilais_uu_nilai_unique` (`uu_nilai`);

--
-- Indeks untuk tabel `nilais_attrs`
--
ALTER TABLE `nilais_attrs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `pengaduans`
--
ALTER TABLE `pengaduans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `raports`
--
ALTER TABLE `raports`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `raports_attrs`
--
ALTER TABLE `raports_attrs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `siswas`
--
ALTER TABLE `siswas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `siswas_uuid_m_unique` (`uuid_m`),
  ADD UNIQUE KEY `siswas_kewarganegaraan_unique` (`kewarganegaraan`),
  ADD UNIQUE KEY `siswas_nik_unique` (`nik`),
  ADD UNIQUE KEY `siswas_no_kk_unique` (`no_kk`),
  ADD UNIQUE KEY `siswas_no_induk_unique` (`no_induk`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_uuid_unique` (`uuid`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `absensis`
--
ALTER TABLE `absensis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `aspek_k_d_s`
--
ALTER TABLE `aspek_k_d_s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT untuk tabel `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `categories_attrs`
--
ALTER TABLE `categories_attrs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `classes`
--
ALTER TABLE `classes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `gurus`
--
ALTER TABLE `gurus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `information`
--
ALTER TABLE `information`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `mapels`
--
ALTER TABLE `mapels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `nilais`
--
ALTER TABLE `nilais`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- AUTO_INCREMENT untuk tabel `nilais_attrs`
--
ALTER TABLE `nilais_attrs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT untuk tabel `notes`
--
ALTER TABLE `notes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pengaduans`
--
ALTER TABLE `pengaduans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `raports`
--
ALTER TABLE `raports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `raports_attrs`
--
ALTER TABLE `raports_attrs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `siswas`
--
ALTER TABLE `siswas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
