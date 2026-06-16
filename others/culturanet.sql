-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2024 at 06:20 AM
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
-- Database: `culturanet`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`, `email`) VALUES
(1, 'admin', 'admin000', 'admin@gmail.com'),
(2, 'admin1', '12345678', 'dadad@gmail.com'),
(3, 'admin2', 'admin222', 'admin2@gmail.com'),
(4, 'user4', 'password4', 'user4@example.com'),
(5, 'user5', 'password5', 'user5@example.com'),
(6, 'user6', 'password6', 'user6@example.com'),
(7, 'user7', 'password7', 'user7@example.com'),
(8, 'user8', 'password8', 'user8@example.com'),
(9, 'user9', 'password9', 'user9@example.com'),
(10, 'user10', 'password10', 'user10@example.com');

-- --------------------------------------------------------

--
-- Table structure for table `bookinglist`
--

CREATE TABLE `bookinglist` (
  `booking_id` int(11) NOT NULL,
  `event_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `totalPrice` int(11) DEFAULT NULL,
  `booking_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookinglist`
--

INSERT INTO `bookinglist` (`booking_id`, `event_id`, `user_id`, `quantity`, `totalPrice`, `booking_date`) VALUES
(1, 1, 3, 5, 110, '2024-05-09 04:07:10'),
(2, 18, 3, 4, 120, '2024-05-09 04:07:21'),
(3, 1, 1, 10, 220, '2024-05-09 04:09:39'),
(4, 8, 1, 4, 40, '2024-05-09 04:09:49'),
(5, 24, 1, 6, 120, '2024-05-09 04:09:57'),
(6, 6, 2, 2, 20, '2024-05-09 04:10:53'),
(7, 18, 2, 6, 180, '2024-05-09 04:11:03'),
(8, 27, 2, 5, 100, '2024-05-09 04:11:40'),
(9, 12, 4, 4, 40, '2024-05-09 04:13:17'),
(10, 16, 4, 3, 90, '2024-05-09 04:13:25'),
(11, 16, 4, 6, 180, '2024-05-09 04:13:35'),
(12, 5, 3, 10, 150, '2024-05-09 04:16:31');

-- --------------------------------------------------------

--
-- Table structure for table `events_table`
--

CREATE TABLE `events_table` (
  `event_id` int(11) NOT NULL,
  `event_name` varchar(100) NOT NULL,
  `event_description` varchar(100) DEFAULT NULL,
  `event_fullDes` varchar(1000) DEFAULT NULL,
  `event_date` date NOT NULL,
  `event_time` time DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `available_tickets` int(11) DEFAULT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `category` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events_table`
--

INSERT INTO `events_table` (`event_id`, `event_name`, `event_description`, `event_fullDes`, `event_date`, `event_time`, `due_date`, `price`, `available_tickets`, `image_path`, `category`) VALUES
(1, '原神启动-wen kai是神里绫华的狗', 'Immerse yourself in the smooth tunes of jazz as you relax under the twinkling night sky.', 'Indulge in jazz beneath the stars at our event, \"Jazz Night Under the Stars,\" where soulful melodies and tranquil ambiance collide for an unforgettable evening. Join us for an elegant and magical night of music under the twinkling sky.', '2024-05-04', '19:00:00', '2024-04-27', 22.00, 185, '../img/event/1.png', 'music'),
(2, 'Harmony Haven: A Melodic Retreat', 'Find solace in the soothing melodies of this serene musical retreat.', 'Harmony Haven offers a tranquil escape into the world of music, where melodic compositions and serene ambiance create a sanctuary for the soul. Immerse yourself in the gentle harmonies and peaceful rhythms, allowing the music to transport you to a state of tranquility and inner peace.', '2024-06-29', '16:00:00', '2024-06-22', 15.00, 150, '../img/event/2.jpg', 'music'),
(3, 'Rhythmic Revival: A Celebration of Beats', 'Join the rhythm revolution in this vibrant celebration of music and dance.', 'Rhythmic Revival ignites the dance floor with infectious beats and electrifying energy, uniting music lovers in a jubilant celebration of rhythm and movement. From pulsating drum circles to heart-pounding basslines, experience the exhilaration of music that transcends boundaries and unites communities.', '2024-06-30', '12:00:00', '0000-00-00', 25.00, 200, '../img/event/3.jpg', 'music'),
(4, 'Melody Meadow: A Symphony in Nature', 'Harmonize with nature\'s symphony in this enchanting musical gathering.', 'Melody Meadow invites you to harmonize with the natural world, where gentle breezes and rustling leaves provide the backdrop for melodic tunes and harmonious melodies. Bask in the beauty of music amidst lush greenery, experiencing the serene blend of nature\'s sounds and human creativity.', '2024-06-25', '18:30:00', '2024-06-18', 20.00, 150, '../img/event/4.jpg', 'music'),
(5, 'Sonic Serenade: A Night of Musical Magic', 'Be enchanted by a night of mesmerizing musical performances.', 'Sonic Serenade dazzles audiences with an enchanting evening of musical magic, featuring captivating performances by talented artists from diverse genres. Lose yourself in the melodies that weave tales of love, passion, and adventure, creating a symphony of emotions that resonates long after the final note fades away.', '2024-07-05', '17:00:00', '0000-00-00', 15.00, 90, '../img/event/5.jpg', 'music'),
(6, 'Beat Bliss: A Groove-infused Gathering', 'Get into the groove at this lively gathering of music enthusiasts.', 'Beat Bliss pulses with infectious energy as music enthusiasts come together to groove to the rhythm of eclectic beats and funky melodies. From soulful jazz to funky grooves, embark on a musical journey that transcends genres and sparks joy in every heart.', '2024-07-16', '19:30:00', '0000-00-00', 10.00, 148, '../img/event/6.jpg', 'music'),
(7, 'Echo Chamber: A Sound Exploration', 'Dive into a world of sonic exploration at this immersive music event.', 'Echo Chamber invites you to delve into the depths of sound, where experimental compositions and innovative performances push the boundaries of musical expression. Immerse yourself in a sonic landscape where every note reverberates with creativity and curiosity, inviting you to listen, learn, and be inspired.\r\n\r\n', '2024-07-31', '18:00:00', '0000-00-00', 20.00, 180, '../img/event/7.jpg', 'music'),
(8, 'Artistic Odyssey: A Journey Through Creativity', 'Embark on a creative journey at this diverse art event.', 'Artistic Odyssey invites you to explore a diverse array of artistic expressions, from traditional paintings to contemporary installations, in a captivating journey through creativity. Immerse yourself in the vibrant world of art, where each piece tells a unique story and invites you to see the world through the eyes of the artist.', '2024-05-08', '12:00:00', '0000-00-00', 10.00, 76, '../img/event/8.png', 'art'),
(9, 'Canvas Chronicles: Stories in Brushstrokes', 'Discover stories told through brushstrokes at this unique art exhibition.', 'Canvas Chronicles showcases the power of storytelling through art, where every brushstroke and color choice narrates a compelling tale. From captivating landscapes to intimate portraits, experience the narrative richness of each piece as it unfolds before your eyes, inviting you to delve deeper into the artist\'s vision.', '2024-06-06', '09:00:00', '0000-00-00', 15.00, 100, '../img/event/9.jpg', 'art'),
(10, 'Palette Parade: A Celebration of Color', 'Join the celebration of color at this vibrant art showcase.', 'Palette Parade bursts with a kaleidoscope of colors, inviting you to revel in the beauty and diversity of artistic expression. From bold splashes of primary hues to delicate pastel palettes, immerse yourself in a world where color reigns supreme, igniting emotions and inspiring creativity in all who behold it.', '2024-06-21', '10:30:00', '0000-00-00', 15.00, 120, '../img/event/10.jpg', 'art'),
(11, 'Artisanal Alchemy: Transforming Inspiration into Art', 'Witness the alchemy of inspiration at this transformative art event.', 'Artisanal Alchemy celebrates the transformative power of creativity, where inspiration is forged into exquisite works of art through skill and imagination. From raw materials to finished masterpieces, journey alongside artists as they channel their passions and craft beauty from the mundane, leaving you enchanted and inspired by the magic of artistic creation.', '2024-08-23', '09:00:00', '0000-00-00', 18.00, 120, '../img/event/11.jpg', 'art'),
(12, 'Cultural Crossroads: Embracing Heritage Diversity', 'Celebrate diverse heritage at this cultural crossroads event.', 'Cultural Crossroads is a celebration of heritage diversity, where communities come together to honor and showcase their rich cultural traditions. From vibrant performances to interactive exhibits, immerse yourself in the beauty and depth of various heritages, fostering understanding and appreciation for our shared cultural tapestry.', '2024-05-09', '10:00:00', '0000-00-00', 10.00, 76, '../img/event/12.jpg', 'heritage'),
(13, 'Heritage Harmony: Uniting Through Tradition', 'Unite through tradition at this heritage harmony event.', 'Heritage Harmony brings people together through the shared celebration of traditional customs, music, and cuisine. Join us in honoring our collective heritage, fostering connections, and preserving the cultural legacy that enriches our communities.', '2024-06-14', '09:15:00', '0000-00-00', 12.00, 100, '../img/event/13.jpg', 'heritage'),
(14, 'Legacy Fest: Honoring Our Ancestral Roots', 'Honor ancestral roots at this legacy fest event.', 'Legacy Fest is a tribute to our ancestral roots, featuring a tapestry of cultural performances, storytelling, and artisanal crafts. Experience the richness and diversity of our heritage as we come together to celebrate the timeless traditions that shape our identities and unite us as a global family.', '2024-07-24', '09:00:00', '0000-00-00', 15.00, 120, '../img/event/14.jpg', 'heritage'),
(15, 'Roots Revival: Embracing Cultural Heritage', 'Embrace cultural heritage at this roots revival event.', 'Roots Revival is a celebration of cultural heritage, where old traditions meet new interpretations in a dynamic showcase of music, dance, and art. Join us in rediscovering the beauty and significance of our roots, honoring the legacy of our ancestors while embracing the evolution of our cultural identity.', '2024-08-09', '10:15:00', '0000-00-00', 10.00, 80, '../img/event/15.jpg', 'heritage'),
(16, 'Taste of Italy', 'Experience the flavors of authentic Italian cuisine.', 'Savor the essence of Italy with our authentic cuisine, crafted with passion and tradition. Indulge in the rich flavors of homemade pasta, savory sauces, and mouthwatering desserts, transporting you to the streets of Rome with every bite. Join us for an unforgettable dining experience where the taste of Italy comes to life, leaving you craving more of its delicious delights.', '2024-04-10', '18:00:00', '0000-00-00', 30.00, 191, '../img/event/16.jpg', 'Cuisine'),
(17, 'Flavors Fiesta: A Culinary Celebration', 'Indulge in a culinary celebration at this flavors fiesta event.', 'Flavors Fiesta is a feast for the senses, featuring a tantalizing array of dishes from around the world. From exotic spices to familiar favorites, embark on a gastronomic journey that showcases the diversity and richness of global cuisine.', '2024-05-03', '18:30:00', '0000-00-00', 25.00, 100, '../img/event/17.jpg', 'Cuisine'),
(18, 'Taste Temptation: A Journey for Foodies', 'Embark on a foodie journey at this taste temptation event.', 'Taste Temptation invites you to explore the world of gastronomy, where flavors harmonize and ingredients mingle in delicious harmony. From street food to gourmet delicacies, immerse yourself in a culinary adventure that will delight your palate and ignite your passion for food.', '2024-06-07', '17:30:00', '0000-00-00', 30.00, 134, '../img/event/18.png', 'Cuisine'),
(19, 'Cuisine Carnival: A Festive Food Fair', 'Join the festivities at this cuisine carnival event.', 'Cuisine Carnival is a celebration of culinary creativity, where chefs showcase their skills and food enthusiasts come together to savor delectable delights. From mouthwatering dishes to indulgent desserts, experience the joy of food in a vibrant and festive atmosphere that will leave you craving more.', '2024-08-02', '18:00:00', '0000-00-00', 30.00, 120, '../img/event/19.jpg', 'Cuisine'),
(20, 'Style Spectrum: A Fashion Extravaganza', 'Experience a fashion extravaganza at this style spectrum event.', 'Style Spectrum is a dynamic showcase of fashion diversity, featuring a range of styles from avant-garde to timeless elegance. From haute couture to streetwear, immerse yourself in the latest trends and creative expressions that define the ever-evolving world of fashion.', '2024-05-08', '18:00:00', '0000-00-00', 20.00, 250, '../img/event/20.jpg', 'Fashion'),
(21, 'Chic Carnival: Where Fashion Meets Fun', 'Join the fun at this chic carnival fashion event.', 'Chic Carnival is a vibrant celebration of fashion and creativity, where designers and fashion enthusiasts come together to revel in the excitement of style. From runway shows to pop-up shops, indulge in a day of shopping, inspiration, and runway magic that will leave you feeling fabulous and fashion-forward.', '2024-06-14', '15:00:00', '0000-00-00', 35.00, 100, '../img/event/21.jpg', 'Fashion'),
(22, 'Trend Tales: Unveiling Fashion Narratives', 'Discover fashion narratives at this trend tales event.', 'Trend Tales is an exploration of fashion\'s storytelling power, where each garment carries a narrative of style, culture, and identity. From emerging designers to established brands, delve into the stories behind the fashion pieces that shape our wardrobes and define our personal style.', '2024-06-07', '10:00:00', '0000-00-00', 30.00, 150, '../img/event/22.jpg', 'Fashion'),
(23, 'Couture Convergence: Where Fashion Innovates', 'Innovate with fashion at this couture convergence event.', 'Couture Convergence is a hub of fashion innovation, bringing together designers, industry professionals, and fashion enthusiasts to explore the cutting edge of style. From experimental designs to sustainable fashion initiatives, join us in shaping the future of the fashion industry through creativity, collaboration, and forward-thinking.', '2024-08-08', '15:00:00', '0000-00-00', 25.00, 180, '../img/event/23.png', 'Fashion'),
(24, 'Rhythmic Rendezvous: A Dance Extravaganza', 'Join the dance extravaganza at this rhythmic rendezvous.', 'Rhythmic Rendezvous invites you to groove to the beats of electrifying music, showcasing an array of dance styles from around the world. From sizzling salsa to graceful ballet, immerse yourself in a celebration of movement and rhythm that will leave you exhilarated and inspired.', '2024-07-10', '18:00:00', '0000-00-00', 20.00, 174, '../img/event/24.jpg', 'Dance'),
(25, 'Dance Fusion Fiesta: Where Styles Collide', 'Experience the fusion of dance styles at this vibrant fiesta.', 'Dance Fusion Fiesta is a vibrant celebration of diversity and creativity, where dancers from various backgrounds come together to showcase their unique styles and talents. Witness the fusion of traditional and contemporary dance forms, creating a dynamic and unforgettable spectacle of movement and expression.', '2024-06-20', '19:30:00', '0000-00-00', 25.00, 100, '../img/event/25.jpg', 'Dance'),
(26, 'Groove Gala: A Night of Dance Delight', 'Get ready for a night of dance delight at this groove gala.', 'Groove Gala is a night to remember, filled with infectious beats and high-energy performances that will have you dancing the night away. From hip-hop to ballroom, immerse yourself in the excitement of diverse dance styles, surrounded by fellow enthusiasts and an electric atmosphere of celebration.', '2024-07-06', '18:30:00', '0000-00-00', 15.00, 120, '../img/event/26.jpg', 'Dance'),
(27, 'Dance Odyssey: Journey Through Movement', 'Embark on a journey through movement at this dynamic dance event.', 'Dance Odyssey is a dynamic showcase of movement and expression, where dancers take you on a captivating journey through a diverse range of styles and choreography. From graceful elegance to powerful athleticism, experience the beauty and artistry of dance in all its forms, leaving you spellbound and inspired by the limitless possibilities of movement.', '2024-08-15', '15:00:00', '0000-00-00', 20.00, 195, '../img/event/27.jpg', 'Dance'),
(28, 'Aurora Acoustics: A Celestial Concert', 'Experience music under the stars in this celestial concert extravaganza.', 'Aurora Acoustics illuminates the night sky with celestial melodies, offering a transcendent musical experience beneath the shimmering glow of the stars. Let the ethereal ambiance of the cosmos inspire you as talented musicians serenade you with enchanting tunes, creating a symphony of sound that echoes through the heavens.', '2024-04-30', '20:00:00', '0000-00-00', 10.00, 80, '../img/event/28.jpeg', 'music'),
(29, 'Mystic Melodies: An Enigmatic Musical Experience', 'Unravel the mysteries of music at this enigmatic musical experience.', 'Mystic Melodies invites you to unlock the secrets of music through an immersive journey of sonic exploration and mystical performances. Delve into the depths of sound and rhythm, where ancient melodies and modern compositions converge to create a captivating tapestry of musical expression that transcends time and space.', '2024-09-19', '19:00:00', '0000-00-00', 15.00, 180, '../img/event/29.jpeg', 'music');

-- --------------------------------------------------------

--
-- Table structure for table `useraddress`
--

CREATE TABLE `useraddress` (
  `userid` int(11) NOT NULL,
  `addressLine1` varchar(255) DEFAULT '',
  `addressLine2` varchar(255) DEFAULT '',
  `postCode` varchar(20) DEFAULT '',
  `city` varchar(255) DEFAULT '',
  `state` varchar(255) DEFAULT '',
  `region` varchar(255) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `useraddress`
--

INSERT INTO `useraddress` (`userid`, `addressLine1`, `addressLine2`, `postCode`, `city`, `state`, `region`) VALUES
(1, 'test', 'test', '999999', 'test', 'test', 'test'),
(2, '', '', '', '', '', ''),
(3, '', '', '', '', '', ''),
(4, '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `pass` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `registration_date` date NOT NULL DEFAULT current_timestamp(),
  `c-coin` decimal(10,2) DEFAULT 0.00,
  `image_path` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `username`, `email`, `pass`, `first_name`, `last_name`, `phone`, `birthday`, `registration_date`, `c-coin`, `image_path`) VALUES
(1, 'wenkai', 'wenkailow@gmail.com', 'wenkai111', 'wen kai', 'low', NULL, '2024-05-22', '2024-03-15', 620.00, '../img/user/1.jpg'),
(2, 'zhenlun', 'zhenlun@gmail.com', 'zhen1111', 'Au', 'Zhen Lun', NULL, NULL, '2024-05-09', 700.00, '../img/user/2.jpg'),
(3, 'yongleching', 'ching@gmail.com', '14332234', 'Ching', 'Yong Le', NULL, NULL, '2024-05-09', 620.00, '../img/user/3.jpeg'),
(4, 'jx', 'jx@gmail.com', 'jwen2222', 'Low', 'Jwen XIong', NULL, NULL, '2024-05-09', 690.00, '../img/user/4.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `bookinglist`
--
ALTER TABLE `bookinglist`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `event_id` (`event_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `events_table`
--
ALTER TABLE `events_table`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `useraddress`
--
ALTER TABLE `useraddress`
  ADD PRIMARY KEY (`userid`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `bookinglist`
--
ALTER TABLE `bookinglist`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `events_table`
--
ALTER TABLE `events_table`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookinglist`
--
ALTER TABLE `bookinglist`
  ADD CONSTRAINT `bookinglist_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `events_table` (`event_id`),
  ADD CONSTRAINT `bookinglist_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`userid`);

--
-- Constraints for table `useraddress`
--
ALTER TABLE `useraddress`
  ADD CONSTRAINT `useraddress_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`userid`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
