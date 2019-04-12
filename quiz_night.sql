-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u1build0.15.04.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 24, 2016 at 08:39 AM
-- Server version: 5.6.28-0ubuntu0.15.04.1
-- PHP Version: 5.6.4-4ubuntu6.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `quiz_night`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `username` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_turkish_ci NOT NULL DEFAULT 'newpass',
  `time_limit` int(50) NOT NULL,
  `next_question` int(1) NOT NULL,
  `current_question_ID` int(2) NOT NULL,
  `show_started` int(1) NOT NULL,
  `bonus_time` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`, `time_limit`, `next_question`, `current_question_ID`, `show_started`, `bonus_time`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 20, 0, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `group_ID` int(5) NOT NULL,
  `group_name` varchar(150) COLLATE utf8_turkish_ci NOT NULL,
  `grade_12` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `grade_11` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `grade_10` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `grade_9` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `prep` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `teacher_personnel` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `extra` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `password` varchar(50) COLLATE utf8_turkish_ci NOT NULL DEFAULT 'e6053eb8d35e02ae40beeeacef203c1a',
  `connected` int(1) NOT NULL DEFAULT '0',
  `bonus_taken` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`group_ID`, `group_name`, `grade_12`, `grade_11`, `grade_10`, `grade_9`, `prep`, `teacher_personnel`, `extra`, `password`, `connected`, `bonus_taken`) VALUES
(1, 'Topçular Birliği', 'Akıncan Başar', 'Barkın Şimşek', 'Korcan Koç', '', '', '', 'Sinan Kurtulmuş', 'e6053eb8d35e02ae40beeeacef203c1a', 0, 0),
(2, '4 Gün Yürüyemedi', 'Utku Saraçoğlu', 'Efe Bayramgürler', 'Ege Eren', '', '', '', '', 'e6053eb8d35e02ae40beeeacef203c1a', 0, 0),
(3, 'Lölölöl', 'Utku', 'Barkın', 'Kendal', 'Tuluk', 'Ali', 'Alan', '', 'e6053eb8d35e02ae40beeeacef203c1a', 0, 0),
(4, 'Has Kürtler Sarışın Olur', 'Dadlez Sabak', 'Ozan Baykan', '', '', '', 'Cafer Elitoğ', 'Bergüm Ergün', 'e6053eb8d35e02ae40beeeacef203c1a', 0, 0),
(5, 'Sincap Çalan Çello', '', 'Egecan Yazıcı', 'Doğu Tonkur', '', 'Ersagun Ersoy', '', 'Ezgi Tülü', 'e6053eb8d35e02ae40beeeacef203c1a', 0, 0),
(6, 'Sinekler', '', 'İlke Bayazıtlı', 'Tuna Dinçer', 'Tatul Oflaz', '', '', 'Selin Arpacı', 'e6053eb8d35e02ae40beeeacef203c1a', 0, 0),
(7, 'Columva', '', 'Mısra Şengeldi', 'Ayşe Çoban', '', 'İlayda Şen', '', 'Irmak Özyiğit', 'e6053eb8d35e02ae40beeeacef203c1a', 0, 0),
(8, 'Conchita', 'Volkan Balcı', 'Mustafa Uğur Dursun', '', 'Ayşegül Ağacıklar', '', '', 'Gül Sena Altıntaş', 'e6053eb8d35e02ae40beeeacef203c1a', 0, 0),
(9, 'Fakirzzzzz', 'Barış Demirel', 'Azmi Ozan Ateş', '', '', '', 'Çiğdem Korbek', 'Gizem İncesu', 'e6053eb8d35e02ae40beeeacef203c1a', 0, 0),
(10, 'Biz bize yeteriz', 'Deniz Açıkgöz', '', 'Hazal Sabiha Ergelen', '', '', 'Esin Bingöl', '', 'e6053eb8d35e02ae40beeeacef203c1a', 0, 0),
(11, 'Oda 8 Kavun yeriz', '', 'Gökdeniz Akşit', 'Başak Kurt', 'Doğa Aksen', '', '', '', 'e6053eb8d35e02ae40beeeacef203c1a', 0, 0),
(12, 'Çam Ağacı', 'Tolga Parlan', '', 'Elif Yağmur Turan', 'İlayda Yeniceli', '', '', 'Berk Uzunonat', 'e6053eb8d35e02ae40beeeacef203c1a', 0, 0),
(13, 'Şemmame', '', 'Kendal Varoşoğlu', 'Ayça Arbay', 'Işıksu İnci', '', '', 'Şimal Zağra', 'e6053eb8d35e02ae40beeeacef203c1a', 0, 0),
(14, 'Sadece Kağıt Para Girişi Yapınız', 'Murat Polat', 'Onur Çaycı', '', '', '', 'Şaban Aytaş', '', 'e6053eb8d35e02ae40beeeacef203c1a', 0, 0),
(15, 'Anzaklar', 'İbrahim Bozdemir', 'Taylan Adar Avşar', '', '', '', 'Alan Kearin', 'M. Umut Küçükvar', 'e6053eb8d35e02ae40beeeacef203c1a', 0, 0),
(16, 'Sıfıra Oynuyoruz', 'Fem Öncül', 'Yade Doğan', '', 'İlayda Özdemir', '', '', '', 'e6053eb8d35e02ae40beeeacef203c1a', 0, 0),
(17, 'İbrahim Cengiz Gür', 'Semih Karabulut', 'Bengisu Atalay', 'Elif Dilge Gül', '', '', '', 'Esra Yaman', 'e6053eb8d35e02ae40beeeacef203c1a', 0, 0),
(19, 'KKK', '', 'Baran İşcanlı', 'Erkay Zürap', 'Melis Yalçın', '', '', 'Kadir Kaan Kocaman', 'e6053eb8d35e02ae40beeeacef203c1a', 0, 0),
(20, 'Pomodoro', '', 'Ekin Balcı', 'Ece Öz', 'Ergin İspiroğulları', '', '', 'Özgem Elif Acar', 'e6053eb8d35e02ae40beeeacef203c1a', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
  `question_ID` int(5) NOT NULL,
  `question` varchar(500) COLLATE utf8_turkish_ci NOT NULL,
  `answer` varchar(500) COLLATE utf8_turkish_ci NOT NULL,
  `bonus_or_not` int(1) NOT NULL DEFAULT '0',
  `type` varchar(100) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`question_ID`, `question`, `answer`, `bonus_or_not`, `type`) VALUES
(1, 'Paris’te imzalanan iklim değişikliği paktı hangi kısaltma altında yapılmıştır?', 'COP 21 (UN climate “c”onference “o”f “p”arties)', 0, 'Normal'),
(2, 'Hangi ünlü Amerikan outdoor firması kurucusu rafting yaparken hipotermi yüzünden hayatını kaybetti? ', 'The North Face', 0, 'Normal'),
(3, 'Nöbel ödülleri 10 Kasımda hangi iki şehirde sahiplerine verilmiştir? ', 'Stockholm / Oslo', 0, 'Normal'),
(4, '2016’da dijital versiyonuna geçirileceği duyurulan ve Türkiye’deki 20 milyon taşıtı etkileyecek olan şey nedir? ', 'Radyo', 0, 'Normal'),
(5, 'Star Wars Güç Uyanıyor’un galası hangi şehirde yapılmıştır?', 'Los Angeles', 0, 'Normal'),
(6, 'Uluslararası Antalya Film Festivali’nde Altın Portakal en iyi film ödülünü hangi film almıştır? ', 'Sarmaşık', 0, 'Normal'),
(7, 'Aralık ayında toplanan asgari ücret komisyonu hangi bakanlığın bakanı olan kişinin başkanlığında toplanmıştır? fdgfdgf', 'Çalışma ve sosyal güvenlik Bakanlığı', 0, 'Normal'),
(8, 'Yolsuzlukla suçlanan ve sonradan istifa eden Fifa başkanı kimdir? dsfs', 'Sepp Blatter', 0, 'Normal'),
(9, 'MİT tırları kapsamında tutuklanan ve hapse atılan gazeteciler kimlerdir?', 'fdsgfdgfdg', 0, 'Normal'),
(10, '2013 rüşvet skandalı olarak tarihe geçen bu ayda 2. senesi olan ve siyasilerin “yolsuzluk ve rüşvetle mücadele günü” olması şeklinde teklif sunduğu gün hangisidir? ', '17 Aralık', 0, 'Normal'),
(11, 'İngiltere ile Fransa arasında 1756-1763 yılları arasında gerçekleşen mücadelenin adı nedir?', '7 Yıl Savaşları', 1, 'Tarih/History'),
(12, 'Gece giriş kapılarını kapatan devlet hangisidir? ', 'Vatikan', 1, 'Coğrafya/Geography'),
(13, '“ Savaş istiyoruz! En önce vuruldu bunu yazan” ifadesi hangi Alman şair, oyun yazarı, tiyatro yönetmenine aittir? ', 'Bertolt Brecht', 1, 'Edebiyat/Literature'),
(14, 'Yunanca’dan dilimize geçip, marmaros sözcüğünden türetilen ve “parıldayan taş” anlamına gelen sözcük nedir? ', 'Mermer', 1, 'Dil/Language'),
(15, '1998 yılında fırlatılan Uluslar arası Uzay İstasyonu (ISS)’nun kurulmasına katkı sağlayan ve bu uzay ISS komiyonunda yer alan ülkeler hangileridir? (en az 4 cevap)	', 'Amerika/ Rusya/Kanada/Japonya/ Avrupa Birliği', 1, 'Bilim/Science'),
(16, '20.yy’da kaç kez Yaz Olimpiyatları iptal edilmiştir?', '3 (1916-Berlin / 1940-Helsinki / 1944-Londra)', 1, 'Spor/Sports'),
(17, 'Geçetiğimiz günlerde “Müslümanlar ABD’ye alınmasın” diyerek dikkat çeken ABD Başkan Aday Adayı kimdir? 	', 'Donald Trump', 1, 'Politika/Politics'),
(18, 'Türkiye''nin en eski faal bankasının adı nedir?', 'Ziraat Bankası - 1863', 1, 'Ekonomi/Economics'),
(19, '1453 yılında  “Medarisi Semaniye ve Fatih Darüşşifası” adıyla kurulan Türkiyenin en eski üniversitesi hangisidir? 	', 'İstanbul  Üniversitesi Ziraat Bankası - 1863', 1, 'Eğitim/Education'),
(20, 'Salvador  Dali’nin 1951 yılında tamamladığı “Christ of Saint John of the Cross” adıyla tanınan İsa çizimi ilk kez hangi şehirde sergilenmiştir? 	', 'Glasgow', 1, 'Sanat-Kültür/Art-Culture'),
(21, 'Okulmuzda ilk kez hangi eğitim öğretim döneminde IB programı uygulanmaya başlanmıştır. ', '2005-2006 ', 0, 'Normal');

-- --------------------------------------------------------

--
-- Table structure for table `temp_answer`
--

CREATE TABLE IF NOT EXISTS `temp_answer` (
  `group_ID` int(5) NOT NULL,
  `bonus_or_not` int(1) NOT NULL DEFAULT '0',
  `answer` varchar(500) COLLATE utf8_turkish_ci DEFAULT NULL,
  `correct` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `temp_scores`
--

CREATE TABLE IF NOT EXISTS `temp_scores` (
  `group_ID` int(5) NOT NULL,
  `q1` int(5) NOT NULL DEFAULT '0',
  `q2` int(5) NOT NULL DEFAULT '0',
  `q3` int(5) NOT NULL DEFAULT '0',
  `q4` int(5) NOT NULL DEFAULT '0',
  `q5` int(5) NOT NULL DEFAULT '0',
  `q6` int(5) NOT NULL DEFAULT '0',
  `q7` int(5) NOT NULL DEFAULT '0',
  `q8` int(5) NOT NULL DEFAULT '0',
  `q9` int(5) NOT NULL DEFAULT '0',
  `q10` int(5) NOT NULL DEFAULT '0',
  `q11` int(5) NOT NULL DEFAULT '0',
  `q12` int(5) NOT NULL DEFAULT '0',
  `q13` int(5) NOT NULL DEFAULT '0',
  `q14` int(5) NOT NULL DEFAULT '0',
  `q15` int(5) NOT NULL DEFAULT '0',
  `q16` int(5) NOT NULL DEFAULT '0',
  `q17` int(5) NOT NULL DEFAULT '0',
  `q18` int(5) NOT NULL DEFAULT '0',
  `q19` int(5) NOT NULL DEFAULT '0',
  `q20` int(5) NOT NULL DEFAULT '0',
  `total` int(5) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `total_scores`
--

CREATE TABLE IF NOT EXISTS `total_scores` (
  `group_ID` int(5) NOT NULL,
  `december` int(5) NOT NULL DEFAULT '0',
  `january` int(5) NOT NULL DEFAULT '0',
  `february` int(5) NOT NULL DEFAULT '0',
  `march` int(5) NOT NULL DEFAULT '0',
  `april` int(5) NOT NULL DEFAULT '0',
  `may` int(5) NOT NULL DEFAULT '0',
  `total` int(5) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dumping data for table `total_scores`
--

INSERT INTO `total_scores` (`group_ID`, `december`, `january`, `february`, `march`, `april`, `may`, `total`) VALUES
(1, 60, 0, 0, 0, 0, 0, 60),
(2, 15, 0, 0, 0, 0, 0, 15),
(3, 70, 0, 0, 0, 0, 0, 70),
(5, 60, 0, 0, 0, 0, 0, 60),
(6, 0, 0, 0, 0, 0, 0, 0),
(7, 60, 0, 0, 0, 0, 0, 60),
(8, 30, 0, 0, 0, 0, 0, 30),
(9, 60, 0, 0, 0, 0, 0, 60),
(10, 5, 0, 0, 0, 0, 0, 5),
(11, 35, 0, 0, 0, 0, 0, 35),
(12, 45, 0, 0, 0, 0, 0, 45),
(13, 60, 0, 0, 0, 0, 0, 60),
(14, 20, 0, 0, 0, 0, 0, 20),
(15, 35, 0, 0, 0, 0, 0, 35),
(16, 65, 0, 0, 0, 0, 0, 65),
(17, 30, 0, 0, 0, 0, 0, 30),
(18, 40, 0, 0, 0, 0, 0, 40),
(19, 0, 0, 0, 0, 0, 0, 0),
(20, 30, 0, 0, 0, 0, 0, 30);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`username`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
 ADD PRIMARY KEY (`group_ID`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
 ADD PRIMARY KEY (`question_ID`);

--
-- Indexes for table `temp_answer`
--
ALTER TABLE `temp_answer`
 ADD PRIMARY KEY (`group_ID`);

--
-- Indexes for table `temp_scores`
--
ALTER TABLE `temp_scores`
 ADD PRIMARY KEY (`group_ID`);

--
-- Indexes for table `total_scores`
--
ALTER TABLE `total_scores`
 ADD PRIMARY KEY (`group_ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
