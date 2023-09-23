-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost:3306
-- Üretim Zamanı: 23 Eyl 2023, 10:43:10
-- Sunucu sürümü: 8.0.30
-- PHP Sürümü: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `news`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `banners`
--

CREATE TABLE `banners` (
  `id` bigint UNSIGNED NOT NULL,
  `home_one` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home_two` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home_three` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home_four` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `news_category_one` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `news_details_one` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `banners`
--

INSERT INTO `banners` (`id`, `home_one`, `home_two`, `home_three`, `home_four`, `news_category_one`, `news_details_one`, `created_at`, `updated_at`) VALUES
(1, 'upload/banner/1775930862617976.jpg', 'upload/banner/1775931841417040.jpg', 'upload/banner/1775931788448994.jpg', 'upload/banner/1775931807838045.jpg', 'upload/banner/1775931816288675.jpg', 'upload/banner/1775931821279990.jpg', NULL, '2023-09-02 10:16:24');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `category_slug`, `created_at`, `updated_at`) VALUES
(2, 'INTERNATIONAL', 'international', NULL, '2023-08-02 12:57:44'),
(3, 'SPORTS', 'sports', NULL, NULL),
(4, 'BUSINESS', 'business', NULL, NULL),
(7, 'POLITICS', 'politics', NULL, NULL),
(8, 'BIZ-ECON', 'biz-econ', NULL, NULL),
(9, 'ENTERTAINMENT', 'entertainment', NULL, NULL),
(10, 'EDUCATION', 'education', NULL, NULL),
(11, 'SCI-TECH', 'sci-tech', NULL, NULL),
(12, 'WORKLIFE', 'worklife', NULL, NULL),
(13, 'TRAVEL', 'travel', NULL, '2023-08-07 06:19:57'),
(14, 'FUTURE', 'future', NULL, NULL),
(15, 'CULTURE', 'culture', NULL, NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `live_tvs`
--

CREATE TABLE `live_tvs` (
  `id` bigint UNSIGNED NOT NULL,
  `live_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `live_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `post_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `live_tvs`
--

INSERT INTO `live_tvs` (`id`, `live_image`, `live_url`, `post_date`, `created_at`, `updated_at`) VALUES
(1, 'upload/livetv/1776481300427160.webp', 'https://www.youtube.com/embed/-Lrxv1_i3qc?si=sv4F29hsGwFWNSqR', '08 September 2023', NULL, '2023-09-08 11:50:23');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_08_02_071754_create_categories_table', 2),
(6, '2023_08_02_163052_create_subcategories_table', 3),
(7, '2023_08_05_083157_create_news_posts_table', 4),
(8, '2023_08_26_120101_create_banners_table', 5),
(9, '2023_09_04_092025_create_photo_galleries_table', 6),
(10, '2023_09_08_072359_create_video_galleries_table', 7),
(11, '2023_09_08_133746_create_live_tvs_table', 8),
(12, '2023_09_09_074009_create_reviews_table', 9),
(13, '2023_09_10_153858_create_seos_table', 10),
(14, '2023_09_16_104622_create_permission_tables', 11),
(15, '2023_09_22_062843_create_notifications_table', 12);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(2, 'App\\Models\\User', 5),
(1, 'App\\Models\\User', 8),
(3, 'App\\Models\\User', 9),
(4, 'App\\Models\\User', 10);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `news_posts`
--

CREATE TABLE `news_posts` (
  `id` bigint UNSIGNED NOT NULL,
  `category_id` int NOT NULL,
  `subcategory_id` int DEFAULT NULL,
  `user_id` int NOT NULL,
  `news_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `news_title_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `news_details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tags` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `breaking_news` int DEFAULT NULL,
  `top_slider` int DEFAULT NULL,
  `first_section_three` int DEFAULT NULL,
  `first_section_nine` int DEFAULT NULL,
  `post_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `post_month` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int NOT NULL DEFAULT '1',
  `view_count` int DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `news_posts`
--

INSERT INTO `news_posts` (`id`, `category_id`, `subcategory_id`, `user_id`, `news_title`, `news_title_slug`, `image`, `news_details`, `tags`, `breaking_news`, `top_slider`, `first_section_three`, `first_section_nine`, `post_date`, `post_month`, `status`, `view_count`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 8, 'Türkiye PM for taking all out preparation to face cyclone', 'pm-for-taking-all-out-preparation-to-face-cyclone', 'upload/news/1773647667935332.jpg', '<p>Prime Minister Sheikh Hasina on Monday joined the funeral of Queen Elizabeth II along with other world leaders at Westminster Abbey in London.<br><br>Hundreds of dignitaries are there including the Queen\'s former prime ministers as well as US President Joe Biden and French President Emmanuel Macron, reports BSS.<br><br>Sheikh Rehana, younger sister of Prime Minister Sheikh Hasina, also joined the funeral.<br><br>Queen\'s funeral service is taking place at Westminster Abbey - the building in which she was married and crowned.<br><br>Her coffin, draped in flags and topped by the Imperial State Crown, was drawn to the church on a gun carriage by Royal Navy sailors.<br><br>On September 15, Sheikh Hasina arrived in London on an official visit to the United Kingdom (UK) to attend the funeral of Queen Elizabeth II.<br><br>A sombre mood on the streets around Buckingham Palace where people are gathering to watch a procession after the service.<br><br>It will take the Queen\'s coffin on a final journey through London and on to Windsor Castle for a second service.<br><br>Earlier, on Sunday morning, Prime Minister Sheikh Hasina along with her younger sister Sheikh Rehana went to the Palace of Westminster to pay their last respect to the late Queen where the body of Elizabeth II was kept in the Lying-in-State.<br><br>She paid respect to the Queen at her lying-in-state in Westminster Hall and sign a book of condolence at Lancaster House. Sheikh Rehana also signed condolence book.</p>', 'awesome,top news,london', 1, 1, 1, 1, '09-08-2023', 'August', 1, 4, '2023-08-07 07:43:54', '2023-09-16 05:58:16'),
(2, 7, NULL, 8, 'Türkiye KBÜ Rektörlüğü’ne Atanan Prof. Dr. Fatih Kırışık Görevi Devraldı', 'kbÜ-rektörlüğü’ne-atanan-prof.-dr.-fatih-kırışık-görevi-devraldı', 'upload/news/1773676828085377.jpg', '<p>Cumhurbaşkanı Recep Tayyip Erdoğan tarafından 2547 sayılı Y&uuml;ksek&ouml;ğretim Kanununun 13&rsquo;&uuml;nc&uuml; maddesi ile 3 sayılı Cumhurbaşkanlığı Kararnamesinin 2&rsquo;nci, 3&rsquo;&uuml;nc&uuml; ve 7&rsquo;nci maddeleri gereğince Karab&uuml;k &Uuml;niversitesi Rekt&ouml;rl&uuml;ğ&uuml;ne atanan Prof. Dr. Fatih Kırışık, g&ouml;revi Prof. Dr. Refik Polat&rsquo;tan devraldı.</p>\r\n<p>Karab&uuml;k &Uuml;niversitesi Rekt&ouml;rl&uuml;ğ&uuml;ne atanan Prof. Dr. Fatih Kırışık, g&ouml;revi Prof. Dr. Refik Polat&rsquo;tan devraldı. Karab&uuml;k &Uuml;niversitesi Rekt&ouml;rl&uuml;k Senato Odasında ger&ccedil;ekleştirilen devir teslim t&ouml;renine senato &uuml;yeleri ve daire başkanları katıldı.</p>\r\n<p>D&uuml;zenlenen t&ouml;rende konuşan Prof. Dr. Refik Polat, &ldquo; Y&Ouml;K Başkanımıza, Y&Ouml;K Y&ouml;netim Kurulu &uuml;yelerimize teşekk&uuml;r ederim. Bize her zaman destek oldular, sağ olsunlar. G&ouml;rev s&uuml;remde FET&Ouml; darbe girişimi oldu, &uuml;&ccedil; yıla yakın pandemi s&uuml;reci oldu ve son yıl deprem felaketi oldu. Bu s&uuml;re&ccedil;te &Uuml;niversitenin başında olmayı Allah bana nasip etti. Devletin zor olduğu anlarda devletin &ouml;nde gelen bir g&ouml;revinde bulunmak herkese nasip olacak bir iş değildir&rdquo; dedi.</p>\r\n<p>Prof. Dr. Refik Polat, Rekt&ouml;r Prof. Dr. Fatih Kırışık&rsquo;ın, bir yıl &ouml;nce Karab&uuml;k &Uuml;niversitesine K&uuml;tahya&rsquo;dan geldiğini aktararak, &ldquo;Onunla birlikte bu &Uuml;niversite daha ileri bir yere gelecektir. Rahmetli Burhanettin hocam, bizi buraya o almıştı. Bir&ccedil;oğumuzu buraya o aldı. Belediyecilik y&ouml;n&uuml; &ccedil;ok iyiydi ve &Uuml;niversitede &ccedil;ok iyi işler yaptı.. &rdquo; ifadelerini kullandı.</p>\r\n<p>Cumhurbaşkanı Recep Tayyip Erdoğan tarafından 2547 sayılı Y&uuml;ksek&ouml;ğretim Kanununun 13&rsquo;&uuml;nc&uuml; maddesi ile 3 sayılı Cumhurbaşkanlığı Kararnamesinin 2&rsquo;nci, 3&rsquo;&uuml;nc&uuml; ve 7&rsquo;nci maddeleri gereğince Karab&uuml;k &Uuml;niversitesi Rekt&ouml;rl&uuml;ğ&uuml;ne atanan Rekt&ouml;r Prof. Dr. Fatih Kırışık, devir teslim t&ouml;reninde yaptığı konuşmada, &ldquo;Cumhurbaşkanımız Sayın Recep Tayyip Erdoğan&rsquo;ın takdirleriyle Karab&uuml;k &Uuml;niversitesi Rekt&ouml;r&uuml; olarak atanmış bulunuyorum. Cumhuriyetimizin 100. yılında, T&uuml;rkiye y&uuml;zyılında bu g&ouml;revi bize layık g&ouml;ren Cumhurbaşkanımız Sayın Recep Tayyip Erdoğan beyefendiye, Y&Ouml;K Başkanımız Prof. Dr. Erol &Ouml;zvar beyefendiye ve Y&Ouml;K Y&ouml;netim Kurulu &uuml;yelerine sonsuz teşekk&uuml;r ediyorum. İnsan eğitimle doğmaz ama eğitimle yaşar. Akademi, insan &ouml;mr&uuml;n&uuml; de aşan uzun bir yolculuk. Karab&uuml;k &Uuml;niversitesi bu anlamda bu yolculuğun en dinamik gen&ccedil;lik yıllarında bulunuyor. Bendeniz bu yolculuğun &uuml;&ccedil;&uuml;nc&uuml; nesli olarak bug&uuml;n burada sizlerin huzurunda Rekt&ouml;r&uuml;m&uuml;z Prof. Dr. Refik Polat hocamızdan g&ouml;revi devralıyorum&rdquo; diye konuştu.</p>\r\n<p>Rekt&ouml;r Prof. Dr. Fatih Kırışık, devlette devamlılığın esas olduğuna dikkati &ccedil;ekerek, &ldquo;Burhanettin hocamızla başlayan bu s&uuml;re&ccedil;te, hocamızın bayrağı ileri taşıyan b&uuml;y&uuml;k gayretlerine şahit olduk. Ger&ccedil;ekten Karab&uuml;k &Uuml;niversitesinin &ouml;nemli bir gelişme kaydettiğini g&ouml;zlemliyoruz. İnşallah bayrağı bu noktadan alıp &ccedil;ok daha ileriye hep beraber taşıma gayreti i&ccedil;erisinde olacağımızı bilmenizi istiyorum. &Uuml;niversitede &ccedil;ok kıymetli &ccedil;eşitli &ouml;zelliklerimiz var. Bunlardan bir tanesi huzurlu &ccedil;alışma ortamının varlığı. Bunu korumak ve akademik &ccedil;alışma i&ccedil;in elzem olan bu huzurlu &ccedil;alışma ortamının devamını sağlamak bizim i&ccedil;in son derece &ouml;nemli bir değer. İkincisi akademisyeninden &ouml;ğrencisine, y&ouml;netim birimlerinden idari ve destek personeline kadar herkes i&ccedil;in a&ccedil;ık iletişim i&ccedil;erisinde olmak gayretinde olacağız ve &ccedil;&ouml;z&uuml;m odaklı olarak işlerimizi, faaliyetlerimizi, programlarımızı, planlarımızı y&uuml;r&uuml;tme gayreti i&ccedil;erisinde bulunacağız. Yeni d&ouml;nemimizde kalite, istikrar ve s&uuml;rd&uuml;r&uuml;lebilirlik &ouml;ncelikli ilkelerimiz olacak. S&uuml;re&ccedil; i&ccedil;erisinde birbirimizi &ccedil;ok daha iyi tanıyacağız, planlı metotlu &ccedil;alışma y&ouml;ntemlerini uygulamak i&ccedil;in gayret g&ouml;stereceğiz.</p>\r\n<p>Kuruluşundan bug&uuml;ne Karab&uuml;k &Uuml;niversitesinin gelişimine katkıda bulunan Cumhurbaşkanlığı Y&uuml;ksek İstişare Kurulu &Uuml;yesi Sayın Mehmet Ali Şahin beyefendiye, b&ouml;lge milletvekillerimize, Valimiz Fuat G&uuml;rel&rsquo;e, Belediye Başkanımız Rafet Vergili&rsquo;ye, &ouml;nceki yıllarda g&ouml;rev alan Valilerimize, Kaymakamlarımıza ve Belediye Başkanlarımıza, hassaten KARDEMİR Y&ouml;netim Kurulu &uuml;yelerine, Kamil G&uuml;le&ccedil;, Şefik Dizdar ve T&uuml;rker İnanoğlu beyefendiler başta olmak &uuml;zere hayırsever iş adamlarımıza, esnaf ve ticaret odaları başkanlarımıza, sivil toplum kuruluşları y&ouml;netimlerine ş&uuml;kranlarımı sunuyorum. &Uuml;niversitemizin kuruluşunda ve gelişiminde b&uuml;y&uuml;k emek sahibi olan Kurucu Rekt&ouml;r&uuml;m&uuml;z Prof. Dr. Burhanettin Uysal hocamızı saygı ve rahmetle yad ediyorum. Bug&uuml;n aramızda olmayan Karab&uuml;k &Uuml;niversitesi hocalarına ve idari personeline, vefat etmiş olanlara Allah&rsquo;tan rahmet diliyorum. Başka yerlere ge&ccedil;miş olan g&ouml;revli arkadaşlarımıza başarılar diliyorum. Hizmetlerinin karşılığı elbette &ouml;denmez&rdquo; şeklinde konuştu.</p>\r\n<p>Prof. Dr. Refik Polat&rsquo;a Karab&uuml;k &Uuml;niversitesi mensubu olmasına vesile olması dolayısıyla teşekk&uuml;r eden Rekt&ouml;r. Prof. Dr. Fatih Kırışık, &ldquo;Size, eşiniz hanımefendiye, sevgili &ccedil;ocuklarınıza bundan sonraki hayatınızda sağlık, huzur, başarı ve mutluluklar dilerim. Karab&uuml;k &Uuml;niversitesi Rekt&ouml;rl&uuml;ğ&uuml; g&ouml;revini sizden devralmanın gururunu ve ağır sorumluluğunu &uuml;zerimde taşıdığımı bilmenizi isterim. Allah&rsquo;ın izniyle daha iyisine muvaffak olmak i&ccedil;in elimizden gelen gayreti hep beraber g&ouml;stereceğiz. Bundan sonra da kıymetli fikirlerinizden ve tecr&uuml;belerinizden istifade etmek isteriz. Sağ olun, var olun, yolunuz, bahtınız a&ccedil;ık olsun&rdquo; ifadelerini kullandı.</p>\r\n<p>Konuşmalarının ardından Prof. Dr. Refik Polat ve Rekt&ouml;r Prof. Dr. Fatih Kırışık karşılıklı olarak &ccedil;i&ccedil;ek takdiminde bulundu.</p>', 'awesome,KBU,KARABUK', 1, 1, 1, 1, '08-08-2023', 'August', 1, 3, '2023-08-08 12:53:56', '2023-09-16 06:05:46'),
(3, 10, NULL, 8, 'Türkiye Güneş Ve Kadıoğlu Ailelerinin Mutlu Günü', 'güneş-ve-kadıoğlu-ailelerinin-mutlu-günü', 'upload/news/1773677173268567.jpg', '<p>27. D&ouml;nem AK Parti Karab&uuml;k Milletvekili Niyazi G&uuml;neş&rsquo;in kızı B&uuml;şra G&uuml;neş Kadıoğlu&rsquo;nun d&uuml;ğ&uuml;n t&ouml;reni Ankara Ak plazada ger&ccedil;ekleşti.</p>\r\n<p>B&uuml;şra ve Yasin &ccedil;iftinin hayatlarını birleştirdiği muhteşem d&uuml;ğ&uuml;n t&ouml;renine Karab&uuml;k Valisi Fuat G&uuml;rel, Karab&uuml;k Milletvekilleri Cem Şahin ve Ali Keskinkılı&ccedil; yanı sıra protokol &uuml;yeleri ve siyasi parti temsilcileri katıldı</p>\r\n<p>Karab&uuml;k G&uuml;ndem ailesi olarak B&uuml;şra ve Yasin &Ccedil;iftine bizlerde &ouml;m&uuml;r boyu mutluluklar dileriz</p>', 'awesome,DUGUN,KARABUK', 1, 1, 1, NULL, '09-08-2023', 'August', 1, 2, '2023-08-08 12:59:25', '2023-09-22 03:54:54'),
(4, 7, NULL, 8, 'Wagner\'in Nijer planı deşifre oldu! Darbeyle karışan ülkedeki uranyuma göz dikmişler', 'wagner\'in-nijer-planı-deşifre-oldu!-darbeyle-karışan-ülkedeki-uranyuma-göz-dikmişler', 'upload/news/1773754199950895.jpg', '<p><a class=\"keyword\" title=\"Nijer Haberleri, Nijer Haberi, Nijer Haber\" href=\"https://www.haberler.com/nijer/\"><strong>Nijer</strong></a>\'in se&ccedil;ilmiş Cumhurbaşkanı Muhammed Barzoum 26 Temmuz g&uuml;n&uuml;, bizzat kendisini korumakla g&ouml;revli başkanlık muhafızları tarafından devrildi. Bazoum,&nbsp;<a class=\"keyword\" title=\"Nijer Haberleri, Nijer Haberi, Nijer Haber\" href=\"https://www.haberler.com/nijer/\"><strong>Nijer</strong></a>\'in 1960 yılında&nbsp;<a class=\"keyword\" title=\"Fransa Haberleri, Fransa Haberi, Fransa Haber\" href=\"https://www.haberler.com/fransa/\"><strong>Fransa</strong></a>\'dan bağımsızlığını kazanmasından bu yana se&ccedil;imle iş başına gelen ilk lideriydi. Bazoum\'u devirerek g&ouml;zaltında tutan askerler &uuml;lkenin anayasasını askıya aldıklarını a&ccedil;ıkladılar ve devlet başkanlığı yetkilerini General Abdourahmane Tchiani\'nin &uuml;stlendiğini bildirdiler.&nbsp;<a class=\"keyword\" title=\"Nijer Haberleri, Nijer Haberi, Nijer Haber\" href=\"https://www.haberler.com/nijer/\"><strong>Nijer</strong></a>\'deki darbeyi destekleyen &uuml;lkelerden biri de Rusya olurken, bazı kişilerin g&ouml;steriler sırasında Rus bayrakları taşıdıkları da kameralara yansımıştı. Olayın sebebi de kısa s&uuml;rede anlaşıldı. Rus paralı asker grubu Wagner\'in &uuml;lkedeki Uranyum başta olmak &uuml;zere &ccedil;eşitli madenleri satarak askeri faaliyetlerine mali kaynak sağlamayı planladığı &ouml;ğrenildi.</p>\r\n<p id=\"inpage_reklam\"></p>\r\n<h3 class=\"accordion-title\"><label for=\"subtitle-1\">NİJER NEDEN &Ouml;NEMLİ BİR &Uuml;LKE?</label></h3>\r\n<p class=\"accordion-p\"><a class=\"keyword\" title=\"Nijer Haberleri, Nijer Haberi, Nijer Haber\" href=\"https://www.haberler.com/nijer/\"><strong>Nijer</strong></a>, y&uuml;z&ouml;l&ccedil;&uuml;m&uuml; bakımdan Batı&nbsp;<a class=\"keyword\" title=\"Afrika Haberleri, Afrika Haberi, Afrika Haber\" href=\"https://www.haberler.com/afrika/\"><strong>Afrika</strong></a>\'nın en b&uuml;y&uuml;k &uuml;lkesi. Siyasi olarak ise, son yıllarda, art arda darbeler yaşanan komşuları Mali ve Burkina Faso\'nun yanında, g&ouml;reli demokratik istikrar timsali sayılabilirdi. Stratejik olarak &uuml;lkede Fransız ve ABD &uuml;sleri var ve Nijer bu &uuml;lkelerin İslamcı gruplarla savaşında &ouml;nemli bir \"partner\" olarak g&ouml;r&uuml;l&uuml;yor. Hatta Amerikan Dışişleri Bakanlığı Nijer\'i \"Sahil b&ouml;lgesinin istikrarı bakımından kilit &ouml;nemde\" ve IŞİD ya da El Kaide gibi İslamcı gruplara karşı m&uuml;cadelede \"g&uuml;venilir bir ter&ouml;rle m&uuml;cadele ortağı\" diye tanımlamıştı. Ekonomik olarak ise Nijer, topraklarındaki uranyum madenleri bakımından b&uuml;y&uuml;k &ouml;nem taşıyor ve d&uuml;nya urunyum &uuml;retiminin y&uuml;zde 7\'sini yapıyor. Bu radyoaktif madde &uuml;lke ekonomisi bakımından o kadar b&uuml;y&uuml;k &ouml;nem taşıyor ki başkent Niamey\'deki en b&uuml;y&uuml;k caddelerden birine Uranyum Bulvarı adı verilmiş.</p>', 'Fransa,Afrika,Nijer,Dünya', 1, 1, 1, 1, '09-08-2023', 'August', 1, 1, '2023-08-09 09:23:44', '2023-09-16 06:05:55'),
(5, 3, 4, 8, 'Fenerbahçe\'nin vazgeçtiği Tete\'yi Galatasaray kaptı! İmza için İstanbul\'da', 'fenerbahçe\'nin-vazgeçtiği-tete\'yi-galatasaray-kaptı!-İmza-için-İstanbul\'da', 'upload/news/1773754304060455.jpg', '<p><a class=\"keyword\" title=\"Galatasaray Haberleri, Galatasaray Haberi, Galatasaray Haber\" href=\"https://www.haberler.com/galatasaray/\"><strong>Galatasaray</strong></a>&nbsp;transfer bombalarını patlatmaya devam ediyor. Sarı-kırmızılılar, daha &ouml;nce anlaşmaya vardığı Tete\'yi sağlık kontrol&uuml;nden ge&ccedil;irdi. Bir sorunu &ccedil;ıkmayan futbolcunun transferinin kısa s&uuml;re i&ccedil;erisinde resmen a&ccedil;ıklanması bekleniyor.</p>\r\n<p id=\"inpage_reklam\"></p>\r\n<h3>4 YILLIK S&Ouml;ZLEŞME İMZALAYACAK</h3>\r\n<p>Fanatik\'te yer alan habere g&ouml;re;&nbsp;<a class=\"keyword\" title=\"Galatasaray Haberleri, Galatasaray Haberi, Galatasaray Haber\" href=\"https://www.haberler.com/galatasaray/\"><strong>Galatasaray</strong></a>, Tete\'yi renklerine bağladı. Sağlık kontrol&uuml;nden ge&ccedil;en 23 yaşındaki futbolcunun sarı-kırmızılılarla 4 yıllık s&ouml;zleşme imzalaması bekleniyor.</p>\r\n<h3>MAAŞI VE İMZA PARASI NE KADAR?</h3>\r\n<p>Tete, Galatasaray\'dan yıllık garanti 2.5 milyon euro maaş alacak. Sarı-kırmızılılar, Brezilyalı futbolcuya imza parası olarak ise 3.5 milyon euro &ouml;deyecek.</p>', 'Galatasaray,Spor', 1, 1, 1, 1, '09-08-2023', 'August', 1, 3, '2023-08-09 09:25:23', '2023-09-11 03:21:07'),
(6, 7, NULL, 8, 'Belediye başkanı, gözü gibi baktığı Togg ile kaza yaptı', 'belediye-başkanı,-gözü-gibi-baktığı-togg-ile-kaza-yaptı', 'upload/news/1773754702464301.jpg', '<p><a class=\"keyword\" title=\"Kahramanmaraş Haberleri, Kahramanmaraş Haberi, Kahramanmaraş Haber\" href=\"https://www.haberler.com/kahramanmaras/\"><strong>Kahramanmaraş</strong></a>&nbsp;B&uuml;y&uuml;kşehir Belediye Başkanı Hayrettin G&uuml;ng&ouml;r, kendisine tahsis edilen yerli otomobil Togg ile şehir turuna &ccedil;ıktı. Gezinti sırasında belediye binasının bulunduğu Azerbaycan Bulvarı\'nda talihsiz bir kaza yaşandı.</p>\r\n<p id=\"inpage_reklam\"></p>\r\n<h3>BAŞKA BİR OTOMOBİLLE &Ccedil;ARPIŞTI</h3>\r\n<p><a class=\"keyword\" title=\"Kahramanmaraş Haberleri, Kahramanmaraş Haberi, Kahramanmaraş Haber\" href=\"https://www.haberler.com/kahramanmaras/\"><strong>Kahramanmaraş</strong></a>\'ın plaka numarası ile şehrin adını oluşturan iki kelimenin baş harfleri olan K ve M ile, kentin d&uuml;şman işgalinden kurtuluşu olan 12 Şubat\'ı simgeleyen rakamların yer aldığı \'46 KM 012\' plakalı makam otomobili, plakası &ouml;ğrenilemeyen bir otomobil ile &ccedil;arpıştı.</p>', 'Politika,Güncel', 1, 1, 1, 1, '09-08-2023', 'August', 1, 0, '2023-08-09 09:31:43', NULL),
(7, 9, NULL, 8, 'Bakan Özhaseki\'den İstanbul\'da kentsel dönüşümü hızlandırmak için yeni düzenleme sinyali: Yeter sayısı yüzde 50\'ye indirilmeli', 'bakan-Özhaseki\'den-İstanbul\'da-kentsel-dönüşümü-hızlandırmak-için-yeni-düzenleme-sinyali:-yeter-sayısı-yüzde-50\'ye-indirilmeli', 'upload/news/1773754817297342.jpg', '<p>&Ccedil;evre, Şehircilik ve İklim Değişikliği Bakanı Mehmet &Ouml;zhaseki, Dolmabah&ccedil;e Cumhurbaşkanlığı Ofisinde ger&ccedil;ekleştirilen \'Medya Buluşması\'nda gazete ve televizyonların temsilcileriyle bir araya geldi. Bakan &Ouml;zhaseki, burada yaptığı konuşmada 6 Şubat\'ta yaşanan depremler ve olası İstanbul depremi ile ilgili y&uuml;r&uuml;t&uuml;len &ccedil;alışmalar hakkında bilgiler verdi. İstanbul i&ccedil;in &ouml;zel bir kentsel d&ouml;n&uuml;ş&uuml;m yasası &ccedil;ıkarmayı planladıklarını belirten &Ouml;zhaseki \"Şahsi fikrim kentsel d&ouml;n&uuml;ş&uuml;m kararında yeter sayısının y&uuml;zde 50\'ye kadar inmesi gerektiği y&ouml;n&uuml;nde. Yasa &ccedil;ıkararak kentsel d&ouml;n&uuml;ş&uuml;m&uuml;n &ouml;n&uuml;nde engel olan t&uuml;m yasal boşlukları tıkayacağız\" dedi.</p>\r\n<p id=\"inpage_reklam\"></p>\r\n<h3 class=\"accordion-title\"><label for=\"subtitle-1\">\"6 ŞUBAT BİN YILIN FELAKETİ\"</label></h3>\r\n<p class=\"accordion-p\">6 Şubat\'ın bin yılın felaketi olduğunu savunan &Ouml;zhaseki \"Şu anda bizim b&uuml;t&uuml;n d&uuml;nyamızı, halkımızı, birliğimizi, birikimimizi, b&uuml;t&uuml;n enerjimizi yoğunlaştırdığımız iki tane konu var. Birincisi, 6 Şubat\'ta meydana gelen deprem ve onun ortaya &ccedil;ıkarmış olduğu hasarlar ve giderilmesi konusu. İkincisi de, İstanbul\'umuzun depreme hazırlığı konusu. Hepimizin bildiği gibi 6 Şubat\'ta asrın felaketi de dense bana g&ouml;re bin yılın bir felaketiyle karşı karşıya kaldık. Orada doğrudan 11 ilimizi ama dolaylı olarak da 18 ilimizi etkileyen, 14 milyon vatandaşımızın o tesir alanında kaldığı ve 51 bin canımızı da toprağa verdiğimiz bir ortamla karşılaştık. &Ouml;zetle s&ouml;ylemek gerekirse, 680 bin konutumuz yıkıldı. 170 bin civarında da iş yeri, depo, ahır gibi yerlerimiz adeta yerle yeksan oldu. Maddi hasar eğer soracak olursanız, değişik rakamlar verilebilir. Birtakım hesaplamalara g&ouml;re değişebilir ama her hal&uuml;karda 100 milyar doların &uuml;zerinde\" dedi.</p>\r\n<h3 class=\"accordion-title\"><label for=\"subtitle-2\">\"REZERV KONUT ALANLARI BELİRLEDİK\"</label></h3>\r\n<p class=\"accordion-p\">İstanbul i&ccedil;in yaklaşan deprem tehdidi olduğunu hatırlatan Mehmet &Ouml;zhaseki, \"B&uuml;t&uuml;n bilim adamlarının işaret ettiği gibi, bilen insanların s&ouml;ylediği gibi yaklaşan bir deprem tehdidi var. İstanbul demek T&uuml;rkiye demek, bunun farkındayız. İstanbul\'da yapılacak en g&uuml;zel şey, deprem gelmeden ona hazırlık. Mevlana diyor ki, \'Akıl sonradan ah &ccedil;ekmek i&ccedil;in değil de ibret almak i&ccedil;indir.\' Allah b&ouml;yle vermiştir. Sonradan dizlere vurmanın bir manası yok, bizim de bir an &ouml;nce &ouml;n&uuml;m&uuml;ze bakıp İstanbul\'umuzu da depreme hazırlamamız icap ediyor. Şunu bilelim, yeni olan bir şey değil. Belki depremlerden dolayı &ccedil;ok daha &ouml;n plana &ccedil;ıkan bir s&ouml;z olarak s&ouml;yleniyor ama eskiden beri İstanbul\'umuz d&uuml;nyadaki deprem riski taşıyan 10 ilden birisi. Hocalarımızın, genellikle işaret ettiği gibi s&uuml;renin dolduğu veya &ccedil;ok yaklaştığı o y&ouml;nde bir araya gelip tedbir almamız gerektiği şeklindeki s&ouml;zleri &ouml;nemsiyoruz. İkinci aşamada bizim d&uuml;ş&uuml;nd&uuml;ğ&uuml;m&uuml;z şey, rezerv konut alanları belirledik. Bu belirlediğimiz alanlarda 350 bin konuta kadar yeni sağlam, g&uuml;venilir konutlar yapacağız. O da bizim epeyce ihtiyacımızı g&ouml;recek. &Ccedil;evrede en riskli olan yapıları o yaptığımız yeni yerlere taşıyarak belki de depreme hazırlığın ikinci adımını atmış olacağız\" diye konuştu.</p>\r\n<h3 class=\"accordion-title\"><label for=\"subtitle-3\">\"İSTANBUL İ&Ccedil;İN &Ouml;ZEL YASA HAZIRLIĞI\"</label></h3>\r\n<p class=\"accordion-p\">İstanbul\'a y&ouml;nelik &ouml;zel bir yasa &ccedil;ıkarmayı hesapladıklarını belirten &Ccedil;evre, Şehircilik ve İklim Değişikliği Bakanı Mehmet &Ouml;zhaseki, \"Şu ana kadar 11 yıldır devam eden İstanbul\'daki kentsel d&ouml;n&uuml;ş&uuml;m i&ccedil;inde ne t&uuml;r engellerle karşılaştıysak onları bertaraf edecek, işi hızlandıracak tedbirleri alarak bu yasayı da &ccedil;ıkarmak istiyoruz. Bakanlığımız liderliğinde başlayan toplantılara İstanbul\'da t&uuml;m belediyeleri davet ettik. Bir, ikisi hari&ccedil; 39 il&ccedil;ede hepsi geliyor. İstanbul\'da bu işe katkıda bulunmak isteyen kim varsa gelsin, orada s&ouml;ylesin ve yo haritasını netleştirelim diyoruz. Sonra da gerekirse İstanbul i&ccedil;in &ouml;zel bir yasa &ccedil;ıkartıp bir an &ouml;nce başlayalım. D&uuml;ş&uuml;n&uuml;len depremin altından kalkabilmek &ccedil;ok m&uuml;mk&uuml;n g&ouml;z&uuml;km&uuml;yor. Bu y&uuml;zden bizim hızlı davranmamız gerekiyor. Gerekirse bu konuda hızlı adımlar atarak, meclis &ccedil;alışma d&ouml;neminde değilse bile meclisi başka işler i&ccedil;in değil, sırf bu iş i&ccedil;in davet ederiz\" ifadesini kullandı.</p>\r\n<h3 class=\"accordion-title\"><label for=\"subtitle-4\">\"YETER SAYISI Y&Uuml;ZDE 50\'YE İNDİRİLMELİ\"</label></h3>\r\n<p class=\"accordion-p\">&Ouml;zhaseki, \"İstanbul i&ccedil;in kentsel d&ouml;n&uuml;ş&uuml;mde vatandaşı teşvik edici, zorlayıcı h&uuml;k&uuml;ml&uuml;l&uuml;kler mi getirmeyi planlıyorsunuz. Bu yasanın &ccedil;er&ccedil;evesi ne olacak\" şeklindeki soruya ise, \"Eskiden bir binanın değişimi i&ccedil;in y&uuml;zde 100 muvafakat gerekiyordu, daha sonraki d&ouml;nemde bu 3\'te 2\'ye kadar d&uuml;şt&uuml;. Fakat bina i&ccedil;erisinde itiraz edenler yerine g&ouml;re engeller oluşturdu. 3\'te 2 sağlasanız bile iş başına ge&ccedil;tiğinizde yasa sizi uzunca bir g&uuml;zergaha sokuyor. Orada karar alıp bir an &ouml;nce işe başlayamıyorsunuz. Şahsi fikrim kentsel d&ouml;n&uuml;ş&uuml;m kararında yeter sayısının y&uuml;zde 50\'ye kadar inmesi gerektiği y&ouml;n&uuml;nde. Yasa &ccedil;ıkararak kentsel d&ouml;n&uuml;ş&uuml;m&uuml;n &ouml;n&uuml;nde engel olan t&uuml;m yasal boşlukları tıkayacağız\" yanıtını verdi.</p>\r\n<h3 class=\"accordion-title\"><label for=\"subtitle-5\">\"REZERV ALANINA YAPILACAK KONUTLAR 2 YILDA TESLİM ALINACAK\"</label></h3>\r\n<p class=\"accordion-p\">&Ccedil;evre, Şehircilik ve İklim Değişikliği Bakanı Mehmet &Ouml;zhaseki, rezerv alanlarıyla bir soruya da şu şekilde cevap verdi:</p>\r\n<p class=\"accordion-p\">\"Bizim yapacağımız rezerv alanlarda 350 bin konutluk yer tespit ettik. Oralarda da işe başladığımızda en ge&ccedil; 2 sene i&ccedil;erisinde o binaları da teslim alacağız. En riskli yerlerden başlamak &uuml;zere tekrar vatandaşları oraya doğru y&ouml;nlendireceğiz. Kesin bir şey değil s&ouml;yleyeceğim şey ama Kanal İstanbul Projesi neticesinde &ccedil;ıkacak konutların bir kısmı da İstanbul\'da depreme hazırlık i&ccedil;in orada kullanabiliriz. Bunu Sayın Cumhurbaşkanımız da ifade ettiler. Yeter ki İstanbul\'u geleceği hazırlayalım, depreme daha g&uuml;venli hale getirelim. İstanbul i&ccedil;in genellikle kabul g&ouml;ren g&ouml;r&uuml;ş şu: \'6 milyon civarında bağımsız birim var. Bunun 1.5 milyonu riskli ve 600 bini ilk etapta yıkılacak bina gibi g&ouml;r&uuml;n&uuml;yor. Bizim ilk hedefimiz o 600 bin konutun bir an &ouml;nce g&uuml;venli alanlara doğru taşınması. Biz bunu 5 sene i&ccedil;inde tamamlamayı d&uuml;ş&uuml;n&uuml;yoruz.\"</p>', 'İstanbul,Ekonomi,Güncel', 1, 1, 1, 1, '09-08-2023', 'August', 1, 0, '2023-08-09 09:33:33', NULL),
(8, 4, 3, 8, 'Kim Milyoner Olmak İster\'de seyirciye güvenen yarışmacı 3. soruda elendi', 'kim-milyoner-olmak-İster\'de-seyirciye-güvenen-yarışmacı-3.-soruda-elendi', 'upload/news/1773754891399000.jpg', '<p>Sunuculuğunu Kenan İmirzalıoğlu\'nun yaptığı Kim Milyoner Olmak İster\'de yarışmacı Esra Doğan, 3. soruda takıldı. \"O g&uuml;n\" ile başlayan deyimi bilemeyince joker kullanan yarışmacı, başarısız oldu.</p>\r\n<h3>2 BİN TL KAZANDI</h3>\r\n<p>&Uuml;&ccedil;&uuml;nc&uuml; soruda yarışmacının karşısına, \"O zamandan beri anlamına gelen ve \'o g&uuml;n\' şeklinde başlayan deyim nasıl devam eder?\" sorusu &ccedil;ıktı. Şıklar arasında ise; \'A- O g&uuml;nd&uuml;r\', \'B- D&uuml;nd&uuml;r\', \'C- Bug&uuml;nd&uuml;r\', \'D- Yarındır\' yer aldı. Cevaptan emin olamayan yarışmacı, joker hakkını kullanarak seyirciye sordu. Seyirciler, y&uuml;zde 43 oranında \'A- O g&uuml;nd&uuml;r\' şıkkını tercih etti. Yarışmacı da \'A\' se&ccedil;eneğini se&ccedil;ti. Ancak doğru cevap \'C- Bug&uuml;nd&uuml;r\' se&ccedil;eneği olunca yarışmacı 2 bin TL kazanarak elendi.</p>', 'Magazin,Haberler', 1, 1, 1, 1, '09-08-2023', 'August', 1, 0, '2023-08-09 09:34:43', NULL),
(9, 7, NULL, 8, 'Yeşil altında hırsızlığa karşı önlem! Günlük 1000 TL yevmiye ile ellerinde tüfeklerle nöbet tutuyorlar', 'yeşil-altında-hırsızlığa-karşı-önlem!-günlük-1000-tl-yevmiye-ile-ellerinde-tüfeklerle-nöbet-tutuyorlar', 'upload/news/1773758525863449.jpg', '<p>B&ouml;lgede \'yeşil altın\' olarak adlandırılan Antep fıstığı i&ccedil;in hasat d&ouml;nemi &ouml;ncesi tedbirler artırıldı. Yeni sezon taze fıstığın kilo fiyatının 150 ile 200 liradan alıcı bulması ile hırsızlık olaylarına karşı g&uuml;venlik &ouml;nlemi alan arazi sahipleri, bek&ccedil;i tutup, n&ouml;bet sistemi başlattı. Bek&ccedil;iler g&uuml;nl&uuml;k 1.000 TL yevmiye alıyor.</p>\r\n<h3 class=\"accordion-title\"><label for=\"subtitle-1\">3 AY BOYUNCA 7/24 N&Ouml;BETTELER</label></h3>\r\n<p class=\"accordion-p\">Bek&ccedil;iler, fıstığın olgunlaşmasından hasat d&ouml;nemine kadar ge&ccedil;en 3 aylık s&uuml;rede 7 g&uuml;n 24 saat esasına g&ouml;re n&ouml;bet tutuyor. Jandarmanın bilgisi dahilinde motosikletle ya da yaya olarak devriye atan bek&ccedil;iler, bah&ccedil;eye yaklaşanlara ruhsatlı av t&uuml;feği ile \'uyarı\' ateşinde bulunuyor, yakalanan hırsızlar ise g&uuml;venlik g&uuml;&ccedil;lerine teslim ediliyor.</p>\r\n<h3 class=\"accordion-title\"><label for=\"subtitle-3\">\"G&Uuml;NL&Uuml;K 1000 TL\'YE BEK&Ccedil;İ BULMAKTA ZORLANIYORUZ\"</label></h3>\r\n<p class=\"accordion-p\">Ziraat M&uuml;hendisleri Odası Gaziantep Şube Başkanı Abdulkadir Deniz, ge&ccedil;mişte fıstık bek&ccedil;iliği diye bir mesleğin olmadığını s&ouml;yledi. Fıstığın değeri ile artan hırsızlık olaylarına karşı b&ouml;yle bir y&ouml;ntem geliştirildiğini anlatan Deniz, g&uuml;nl&uuml;k 1000 TL karşılığında arazilerde bek&ccedil;ilerin g&ouml;rev yaptığını s&ouml;yledi.</p>\r\n<p class=\"accordion-p\">Deniz, \"Arazilerdeki bek&ccedil;ilerimiz g&uuml;n boyu n&ouml;bet tutuyor. Fıstık bah&ccedil;elerinde bek&ccedil;ilerimiz yaya veya motosikletleri ile s&uuml;rekli dolaşarak, hırsızlık olaylarının olmasını engelliyor. Bek&ccedil;ilere g&uuml;nl&uuml;k 1.000 TL yevmiye veriyor ve t&uuml;m ihtiya&ccedil;larını karşılıyoruz. Buna rağmen bek&ccedil;i bulmakta zorlanıyoruz\" dedi.</p>', 'Yaşam,Ekonomi,Güncel', 1, 1, 1, 1, '09-08-2023', 'August', 1, 2, '2023-08-09 10:32:29', '2023-09-09 03:35:42'),
(10, 3, 4, 8, 'Fenerbahçe\'de 5 isimle yolların ayrılması gündemde', 'fenerbahçe\'de-5-isimle-yolların-ayrılması-gündemde', 'upload/news/1773764401118836.jpg', '<p class=\"text\">Son olarak Joao Pedro\'nun Gremio\'ya, Diego Rossi\'nin Columbus Crew\'e transferlerinin ardından Fenerbah&ccedil;e\'de ayrılıklar devam edecek. Sarı-Lacivertliler\'in kadrosunda yer alan isimlere y&ouml;nelik talipler dikkat &ccedil;ekiyor.</p>\r\n<p class=\"text\">S&uuml;per Lig\'in yeni takımlarından Pendikspor\'un, Nazım Sangare\'ye talip olduğu bildirildi.</p>\r\n<div id=\"esx-haber-scroll-2\" class=\"esx-haber-scroll\"></div>\r\n<p class=\"text\">Kadroda d&uuml;ş&uuml;n&uuml;lmeyen oyuncuların başında gelen ve s&ouml;zleşmesi gelecek sezon sonunda bitecek olan Nazım konusunda Pendik\'in, Sarı-lacivertlilerle anlaşma aşamasına geldiği &ouml;ğrenildi.</p>\r\n<p class=\"text\">&Ouml;te yandan Samsunspor\'un ise Serdar Dursun i&ccedil;in yakında Fenerbah&ccedil;e\'nin kapısını &ccedil;alacağı iddia edildi.</p>\r\n<h3>Gustavo ve Arao da yolcular arasında</h3>\r\n<p class=\"text\">S&uuml;per Lig &ouml;ncesi Fenerbah&ccedil;e\'de yabancı oyuncu sayısı an itibarıyla 16\'ya ulaştı. 14 yabancı oyuncu kuralının uygulandığı ligde, kontenjanda yer a&ccedil;abilmek i&ccedil;in kolları sıvayan Sarı-Lacivertli y&ouml;netim en az 2 oyuncu ile daha yollarını ayırmaya hazırlanıyor. Son olarak Joao Pedro ve Diego Rossi ile yollar ayrıldı ve Kanarya, bu sayıyı daha da d&uuml;ş&uuml;rmek istiyor.</p>\r\n<p class=\"text\">Kontenjanda yer a&ccedil;mayı planlayan teknik direkt&ouml;r İsmail Kartal, kadroda d&uuml;ş&uuml;nmediği ve Avrupa kadrosuna dahil etmediği isimlere de veda edecek. Bu doğrultuda eğer sakatlığı bulunan Lincoln\'&uuml;n s&ouml;zleşmesi dondurulmaz ise kendisine kul&uuml;p bulması s&ouml;ylenen Gustavo Henrique ile birlikte Suudi Arabistan\'a gitmesi an meselesi olan Willian Arao ile yolların ayrılmasıyla birlikte yabancı sayısı 14\'e d&uuml;şm&uuml;ş olacak.</p>\r\n<h3>Batshuayi\'ye Lens de talip</h3>\r\n<p class=\"text\">Edin Dzeko transferiyle ilk 11\'deki yerini bu sezon muhtemelen kaybedecek olan Michy Batshuayi\'nin takımdaki geleceği b&uuml;y&uuml;k bir merak konusu haline geldi. Suudi Arabistan ve İtalya\'dan Roma\'nın ardından son olarak Fransa\'da ge&ccedil;en sezon harika bir performans g&ouml;steren Lens, Batshuayi i&ccedil;in harekete ge&ccedil;ti.</p>\r\n<div id=\"esx-haber-scroll-10\" class=\"esx-haber-scroll\"></div>\r\n<p class=\"text\">43 milyon Euro\'ya Lois Openda\'yı Leipzig\'e satan sarı-kırmızılıların, Bel&ccedil;ikalı forvet i&ccedil;in 11 milyon Euro civarında bir teklif yaptığı bildirildi.</p>\r\n<p class=\"text\">Tecr&uuml;beli oyuncuya da senelik 2.1 milyon Euro &ouml;neren Lens\'le pazarlıkların devam ettiği bildirildi.</p>\r\n<p class=\"text\">Fransız basınında Lyon\'dan Ekambi\'nin de Kanarya\'ya gelmesi halinde Batshuayi\'nin gidişinin &ouml;n&uuml;n&uuml;n a&ccedil;ılacağı yorumları yapıldı.</p>', 'Fenerbahçe,Spor', 1, 1, 1, 1, '09-08-2023', 'August', 1, 10, '2023-08-09 12:05:52', '2023-09-22 03:57:00'),
(11, 7, NULL, 8, 'Şadi Yazıcı iş makinesinin başına geçti: Marmados Sitesi kentsel dönüşümünü başlattı', 'Şadi-yazıcı-iş-makinesinin-başına-geçti:-marmados-sitesi-kentsel-dönüşümünü-başlattı', 'upload/news/1773764483532281.jpg', '<p class=\"text\">İstanbul\'un&nbsp;<a href=\"https://www.ensonhaber.com/tuzla.htm\" target=\"_blank\" rel=\"noopener tag\">Tuzla</a>&nbsp;il&ccedil;esinde bulunan Marmados Sitesi\'nde uzun s&uuml;redir kentsel d&ouml;n&uuml;ş&uuml;m &ccedil;alışmalarının başlaması i&ccedil;in&nbsp;<a href=\"https://www.ensonhaber.com/belediye.htm\" target=\"_blank\" rel=\"noopener tag\">Belediye</a>&nbsp;Başkanı Şadi Yazıcı tarafından girişimler yapılıyordu.</p>\r\n<p class=\"text\">Birka&ccedil; yıldır Marmados Sitesi sakinleriyle bir araya gelip istişareler ger&ccedil;ekleştiren Yazıcı, m&uuml;jdeli&nbsp;<a title=\"G&uuml;n&uuml;n Haberleri, En Son Haberler\" href=\"https://www.ensonhaber.com/\">haber</a>i sosyal medya hesabından duyurdu.</p>\r\n<div id=\"esx-haber-scroll-2\" class=\"esx-haber-scroll\"></div>\r\n<h3>\"Marmados Sitesi kentsel d&ouml;n&uuml;ş&uuml;m&uuml; başladı\"</h3>\r\n<p class=\"text\">Yazıcı paylaşımında,&nbsp;<em><strong>\"Uzun toplantılar, m&uuml;lk sahipleriyle tam mutabakat ekip arkadaşlarımızla titiz bir &ccedil;alışma ve mutlu son. Marmados Sitesi kentsel d&ouml;n&uuml;ş&uuml;m&uuml; başladı.\"</strong></em> ifadelerini kullandı.</p>\r\n<h3>Operat&ouml;r oldu, kentsel d&ouml;n&uuml;ş&uuml;me start verdi</h3>\r\n<p class=\"text\">Şadi Yazıcı videolu paylaşımında, iş makinesinin başına ge&ccedil;ip, kentsel d&ouml;n&uuml;ş&uuml;me start verdiği anları da paylaştı. Yazıcı, profesyonel bir operat&ouml;r gibi kullandığı iş makinesiyle binaların yıkımını ger&ccedil;ekleştirdi.</p>', 'Belediye,Tuzla', 1, 1, 1, 1, '09-08-2023', 'August', 1, 9, '2023-08-09 12:07:11', '2023-09-11 11:54:01');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `group_name`, `created_at`, `updated_at`) VALUES
(1, 'category.menu', 'web', 'category', '2023-09-17 12:06:49', '2023-09-17 16:27:26'),
(2, 'category.list', 'web', 'category', '2023-09-17 12:08:53', '2023-09-17 12:08:53'),
(3, 'category.add', 'web', 'category', '2023-09-17 12:09:15', '2023-09-17 12:09:15'),
(4, 'category.edit', 'web', 'category', '2023-09-17 12:09:57', '2023-09-17 12:09:57'),
(5, 'category.delete', 'web', 'category', '2023-09-17 12:10:19', '2023-09-17 12:10:19'),
(6, 'subcategory.menu', 'web', 'subcategory', '2023-09-17 12:11:31', '2023-09-17 12:11:31'),
(7, 'subcategory.list', 'web', 'subcategory', '2023-09-17 12:11:47', '2023-09-17 12:11:47'),
(8, 'subcategory.add', 'web', 'subcategory', '2023-09-17 12:12:06', '2023-09-17 12:12:06'),
(9, 'subcategory.edit', 'web', 'subcategory', '2023-09-17 12:12:33', '2023-09-17 12:12:33'),
(10, 'subcategory.delete', 'web', 'subcategory', '2023-09-17 12:13:17', '2023-09-17 12:13:17'),
(11, 'news.menu', 'web', 'news', '2023-09-17 12:14:05', '2023-09-17 12:14:05'),
(12, 'news.list', 'web', 'news', '2023-09-17 12:14:27', '2023-09-17 12:14:27'),
(13, 'news.add', 'web', 'news', '2023-09-17 12:14:51', '2023-09-17 12:14:51'),
(14, 'news.edit', 'web', 'news', '2023-09-17 12:15:02', '2023-09-17 12:15:02'),
(15, 'news.delete', 'web', 'news', '2023-09-17 12:15:13', '2023-09-17 12:15:13'),
(16, 'banner.menu', 'web', 'banner', '2023-09-17 12:15:50', '2023-09-17 12:15:50'),
(18, 'photo.menu', 'web', 'photo', '2023-09-18 03:36:30', '2023-09-18 03:36:30'),
(19, 'photo.list', 'web', 'photo', '2023-09-18 03:36:47', '2023-09-18 03:36:47'),
(20, 'photo.add', 'web', 'photo', '2023-09-18 03:53:46', '2023-09-18 03:53:46'),
(21, 'photo.edit', 'web', 'photo', '2023-09-18 03:53:57', '2023-09-18 03:53:57'),
(22, 'photo.delete', 'web', 'photo', '2023-09-18 03:54:07', '2023-09-18 03:54:07'),
(23, 'video.menu', 'web', 'video', '2023-09-18 03:54:57', '2023-09-18 03:54:57'),
(24, 'video.list', 'web', 'video', '2023-09-18 03:55:07', '2023-09-18 03:55:07'),
(25, 'video.add', 'web', 'video', '2023-09-18 03:55:15', '2023-09-18 03:55:15'),
(26, 'video.edit', 'web', 'video', '2023-09-18 03:55:24', '2023-09-18 03:55:24'),
(27, 'video.delete', 'web', 'video', '2023-09-18 03:55:34', '2023-09-18 03:55:34'),
(28, 'live.menu', 'web', 'live', '2023-09-18 03:56:44', '2023-09-18 03:56:44'),
(29, 'review.menu', 'web', 'review', '2023-09-18 03:57:03', '2023-09-18 03:57:03'),
(30, 'seo.menu', 'web', 'seo', '2023-09-18 03:57:21', '2023-09-18 03:57:21'),
(31, 'setting.menu', 'web', 'admin', '2023-09-18 03:58:02', '2023-09-18 03:58:02'),
(32, 'role.menu', 'web', 'role', '2023-09-18 03:58:14', '2023-09-18 03:58:14');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
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
-- Tablo için tablo yapısı `photo_galleries`
--

CREATE TABLE `photo_galleries` (
  `id` bigint UNSIGNED NOT NULL,
  `photo_gallery` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `post_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `photo_galleries`
--

INSERT INTO `photo_galleries` (`id`, `photo_gallery`, `post_date`, `created_at`, `updated_at`) VALUES
(1, 'upload/photogallery/1776123997941361.jpg', '04 September 2023', NULL, NULL),
(2, 'upload/photogallery/1776123998378477.webp', '04 September 2023', NULL, NULL),
(3, 'upload/photogallery/1776123998516670.jpg', '04 September 2023', NULL, NULL),
(4, 'upload/photogallery/1776123998590558.webp', '04 September 2023', NULL, NULL),
(5, 'upload/photogallery/1776123998700451.jpg', '04 September 2023', NULL, NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint UNSIGNED NOT NULL,
  `news_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `comment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `reviews`
--

INSERT INTO `reviews` (`id`, `news_id`, `user_id`, `comment`, `status`, `created_at`, `updated_at`) VALUES
(1, 11, 2, 'This is very helpful News', '0', '2023-09-09 07:38:45', NULL),
(3, 10, 2, 'This is nice news', '1', '2023-09-09 07:48:32', NULL),
(5, 10, 6, 'This is very nice news post', '1', '2023-09-22 04:22:07', '2023-09-22 04:40:12');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'SuperAdmin', 'web', '2023-09-18 04:21:34', '2023-09-18 04:21:34'),
(2, 'Admin', 'web', '2023-09-18 04:23:37', '2023-09-18 04:23:37'),
(3, 'Editor', 'web', '2023-09-18 04:30:28', '2023-09-18 04:30:28'),
(4, 'Reporter', 'web', '2023-09-18 04:30:45', '2023-09-18 04:30:45'),
(7, 'visitor', 'web', '2023-09-21 09:16:53', '2023-09-21 09:16:53');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(1, 3),
(2, 3),
(3, 3),
(4, 3),
(5, 3),
(31, 4),
(1, 7),
(2, 7),
(3, 7),
(4, 7),
(5, 7);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `seos`
--

CREATE TABLE `seos` (
  `id` bigint UNSIGNED NOT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_author` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keyword` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `seos`
--

INSERT INTO `seos` (`id`, `meta_title`, `meta_author`, `meta_keyword`, `meta_description`, `created_at`, `updated_at`) VALUES
(1, 'Best Online News Site in Country', 'easynews24.com', 'Best New,Easy News,Best in Country,News 24,Online News', 'Besides of Bangla news, easynews24 provides news in English language for foreigners and who use primarily English to get updates of Bangladesh.', NULL, '2023-09-11 05:52:21');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `subcategories`
--

CREATE TABLE `subcategories` (
  `id` bigint UNSIGNED NOT NULL,
  `category_id` int NOT NULL,
  `subcategory_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subcategory_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `subcategories`
--

INSERT INTO `subcategories` (`id`, `category_id`, `subcategory_name`, `subcategory_slug`, `created_at`, `updated_at`) VALUES
(1, 3, 'CRICKET', 'cricket', NULL, '2023-08-07 06:20:41'),
(3, 4, 'ONLINE', 'online', NULL, '2023-08-07 06:20:46'),
(4, 3, 'FOOTBALL', 'football', NULL, '2023-08-07 06:20:49'),
(5, 3, 'HOCKEY', 'hockey', NULL, NULL),
(6, 9, 'BOLLYWOOD', 'bollywood', NULL, NULL),
(7, 9, 'HOLLYWOOD', 'hollywood', NULL, NULL),
(8, 9, 'MOVIE', 'movie', NULL, NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` enum('admin','user') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `photo`, `phone`, `role`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'User', 'user', 'user@gmail.com', NULL, '$2y$10$smFtSRTIK4zmeawgEnvTeu/o0duaMI5.vFjSi9WWkxLXm63xOtw3q', '20230801125132user-1.jpg', '12345678', 'user', 'active', NULL, NULL, '2023-08-02 04:05:11'),
(4, 'Flavie Legros', NULL, 'clotilde74@example.com', '2023-07-27 08:42:47', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, '445.646.7878', 'user', 'active', 'C9ve3WOVLx', '2023-07-27 08:42:47', '2023-07-27 08:42:47'),
(5, 'Tremaine Donnelly', 'tremaine', 'lkoss@example.org', '2023-07-27 08:42:47', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, '559.930.5849', 'admin', 'active', '5lCNPCA9pv', '2023-07-27 08:42:47', '2023-09-21 07:52:28'),
(6, 'Hello', 'Hello', 'hello@gmail.com', NULL, '$2y$10$QJzpo7TKw.ACJRjDyDuVlOw6KQd4Tpo29jRR7aFDrPQdoeoSKnfh.', '20230801123759user-8.jpg', '343434', 'user', 'active', NULL, '2023-08-01 05:16:01', '2023-08-01 09:37:59'),
(8, 'Admin', 'admin', 'admin@gmail.com', NULL, '$2y$10$.xaNXC1I.crU5rMsvZltwO1FYvdCGlwyaM9lSfAK.NKpJgdHuJDpa', '20230808082019user-3.jpg', '787878', 'admin', 'active', NULL, '2023-08-08 05:14:05', '2023-09-21 07:52:17'),
(9, 'Kamal', 'kamal', 'kamal@gmail.com', NULL, '$2y$10$seByo8SBdFdF4dctt6BPU.3wEmQ0rlf7TcGRt7PMQTTydd2WHEI2W', '20230921102403profil.jpg', '232323232323', 'admin', 'active', NULL, '2023-09-20 13:00:48', '2023-09-21 13:05:18'),
(10, 'Elon', 'elon', 'elon@gmail.com', NULL, '$2y$10$d6neArc.ZlLJ8fhAmcr0.OqzQSSwzLoWvxgHQKkIWGHFTpgEWwqli', NULL, '343434341234', 'admin', 'active', NULL, '2023-09-21 07:32:46', '2023-09-21 07:52:22');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `video_galleries`
--

CREATE TABLE `video_galleries` (
  `id` bigint UNSIGNED NOT NULL,
  `video_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `post_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `video_galleries`
--

INSERT INTO `video_galleries` (`id`, `video_image`, `video_title`, `video_url`, `post_date`, `created_at`, `updated_at`) VALUES
(1, 'upload/videogallery/1776466874012844.webp', 'Suriye\'de Savaş Büyüyor! ABD\'yi Korku Sardı, Jet Hızıyla Harekete Geçtiler!', 'https://www.youtube.com/watch?v=b0xzgX2QWkM', '08 September 2023', NULL, '2023-09-08 08:00:31'),
(2, 'upload/videogallery/1776461458797558.webp', 'Zengezur Adımı İran\'ı Kudurttu! Ermenistan\'a Desteklerini Resmi Olarak Açıkladılar', 'https://www.youtube.com/watch?v=3CusqxIVn9s', '08 September 2023', NULL, NULL),
(3, 'upload/videogallery/1776461585986091.webp', 'Yerbilimci Naci Görür 2 Şehir İçin Deprem Uyarısını TGRT Haber Ekranlarında Açıkladı', 'https://www.youtube.com/watch?v=5M8mZ8v31wM', '08 September 2023', NULL, NULL),
(4, 'upload/videogallery/1776461630245105.webp', 'Türkiye Yunanistan Savaşını Başlattılar! Fransa İfşa Oldu', 'https://www.youtube.com/watch?v=TlkhtzRhZi8', '08 September 2023', NULL, NULL);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Tablo için indeksler `live_tvs`
--
ALTER TABLE `live_tvs`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Tablo için indeksler `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Tablo için indeksler `news_posts`
--
ALTER TABLE `news_posts`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Tablo için indeksler `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Tablo için indeksler `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Tablo için indeksler `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Tablo için indeksler `photo_galleries`
--
ALTER TABLE `photo_galleries`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_news_id_foreign` (`news_id`),
  ADD KEY `reviews_user_id_foreign` (`user_id`);

--
-- Tablo için indeksler `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Tablo için indeksler `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Tablo için indeksler `seos`
--
ALTER TABLE `seos`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Tablo için indeksler `video_galleries`
--
ALTER TABLE `video_galleries`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Tablo için AUTO_INCREMENT değeri `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `live_tvs`
--
ALTER TABLE `live_tvs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Tablo için AUTO_INCREMENT değeri `news_posts`
--
ALTER TABLE `news_posts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Tablo için AUTO_INCREMENT değeri `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Tablo için AUTO_INCREMENT değeri `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `photo_galleries`
--
ALTER TABLE `photo_galleries`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Tablo için AUTO_INCREMENT değeri `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Tablo için AUTO_INCREMENT değeri `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Tablo için AUTO_INCREMENT değeri `seos`
--
ALTER TABLE `seos`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Tablo için AUTO_INCREMENT değeri `video_galleries`
--
ALTER TABLE `video_galleries`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_news_id_foreign` FOREIGN KEY (`news_id`) REFERENCES `news_posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
