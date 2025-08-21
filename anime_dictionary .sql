-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 23, 2025 at 03:45 PM
-- Server version: 8.3.0
-- PHP Version: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `anime_dictionary`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `AdminID` varchar(5) NOT NULL,
  `Name` varchar(60) NOT NULL,
  `Password` varchar(6) DEFAULT NULL,
  `Admin_email` varchar(255) NOT NULL,
  `Avatar` varchar(255) NOT NULL,
  PRIMARY KEY (`AdminID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`AdminID`, `Name`, `Password`, `Admin_email`, `Avatar`) VALUES
('A1001', 'Abu', '123456', 'ddd@gmail.com', 'female-avatar.png');

-- --------------------------------------------------------

--
-- Table structure for table `anime`
--

DROP TABLE IF EXISTS `anime`;
CREATE TABLE IF NOT EXISTS `anime` (
  `AnimeID` varchar(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `AnimeTitle` varchar(100) DEFAULT NULL,
  `Author` varchar(100) NOT NULL,
  `PublishedYear` int NOT NULL,
  `Description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Main_Character1` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Main_Character2` varchar(100) NOT NULL,
  `Main_Character3` varchar(100) NOT NULL,
  `Main_Character4` varchar(100) NOT NULL,
  `Main_Character5` varchar(100) NOT NULL,
  `ImagePath` varchar(100) NOT NULL,
  `CategoryID` varchar(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`AnimeID`),
  KEY `CategoryID` (`CategoryID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `anime`
--

INSERT INTO `anime` (`AnimeID`, `AnimeTitle`, `Author`, `PublishedYear`, `Description`, `Main_Character1`, `Main_Character2`, `Main_Character3`, `Main_Character4`, `Main_Character5`, `ImagePath`, `CategoryID`) VALUES
('A001', 'Attack on Titan', 'Hajime Isayama', 2009, 'The world of Attack on Titan is a bleak one, where humanity lives within fortified walls to protect themselves from monstrous humanoid creatures known as Titans. These gargantuan beings, driven by an insatiable hunger for human flesh, have decimated civilization, forcing the survivors into a life of fear and isolation.\r\n\r\nThe story follows Eren Yeager, a young boy who vows revenge against the Titans after witnessing the brutal murder of his mother by one of these creatures. He joins the Scout Regiment, an elite military unit tasked with venturing beyond the walls to investigate the Titans and find a way to defeat them.\r\n\r\nAs Eren and his comrades venture beyond the walls, they discover a world far more complex than they ever imagined. They encounter other human factions, including the Marleyans, a powerful nation that views the people within the walls as enemies. The Marleyans possess advanced technology and their own Titan-like warriors, further complicating the struggle for survival.\r\n\r\nEren, driven by his rage and a desire to protect his loved ones, discovers a hidden power within himself: the ability to transform into a Titan. This newfound strength gives him a sense of purpose and hope, but it also comes with a heavy price. As Eren grapples with his newfound abilities, he begins to question the true nature of his enemies and the morality of his actions.\r\n\r\nThe story delves into complex themes of freedom, prejudice, and the cyclical nature of violence. The lines between hero and villain blur as characters are forced to make difficult choices in a world where survival often requires sacrificing their humanity. The narrative explores the psychological impact of trauma and the corrupting influence of power, as Eren\'s quest for revenge gradually consumes him.\r\n\r\nAs the series progresses, shocking revelations unravel the true history of the world and the origins of the Titans. Long-held beliefs are shattered, and the characters are forced to confront the harsh realities of their existence. The story culminates in a devastating war that threatens to destroy everything they hold dear.\r\n\r\nAttack on Titan is a dark and thought-provoking story that explores the depths of human nature and the complexities of conflict. It is a tale of loss, redemption, and the enduring struggle for freedom in a world filled with uncertainty and despair.', 'Eren Yeager', 'Mikasa Ackerman', 'Armin Alert', 'Hange Zoe', 'Reiner Brau', 'aot.png', 'C001'),
('A002', 'Naruto', 'Masashi Kishimoto', 1999, 'Naruto Uzumaki is a boisterous and energetic young ninja who dreams of becoming the Hokage, the leader of his village, Konohagakure. However, Naruto is ostracized by the villagers due to the Nine-Tailed Demon Fox, a powerful creature sealed within him at birth. This traumatic event led to the death of the Fourth Hokage, Naruto\'s father, who sacrificed himself to save the village.\r\n\r\nDetermined to gain recognition and acceptance, Naruto strives to become stronger. He trains rigorously under the guidance of his mentor, Kakashi Hatake, alongside his teammates, the brooding Sasuke Uchiha and the shy Sakura Haruno. Their missions together teach them valuable lessons about teamwork, friendship, and the importance of protecting those they care about.\r\n\r\nAs Naruto progresses in his ninja training, he encounters numerous challenges and enemies, including rogue ninja, powerful organizations like Akatsuki, and even his own inner demons. He learns various powerful techniques, such as the Shadow Clone Jutsu and the Rasengan, while also grappling with the immense power of the Nine-Tails within him.\r\n\r\nAlong the way, Naruto forms strong bonds with other characters, including his rival Sasuke, who seeks power to avenge his clan\'s massacre. Their relationship evolves into a complex dynamic of friendship, rivalry, and eventual confrontation. Naruto also develops a deep connection with his teacher, Jiraiya, a legendary ninja who guides him both personally and professionally.\r\n\r\nThe story explores themes of friendship, loss, redemption, and the importance of never giving up on one\'s dreams. Naruto\'s unwavering determination and unwavering belief in himself inspire those around him and ultimately lead him to become a hero not only to his village but to the entire ninja world.\r\n\r\nAs the series progresses, the stakes become higher, and the mysteries surrounding the Nine-Tails and the Akatsuki organization are gradually revealed. Naruto faces numerous trials and tribulations, but he always emerges stronger and more determined to achieve his goals. His journey is a testament to the power of perseverance, the importance of friendship, and the enduring human spirit.', 'Naruto Uzumaki', 'Sasuke Uchicha', 'Haruno Sakura', 'Kakashi Hatake', 'Madara Uchicha', 'naruto.png', 'C002'),
('A003', 'One Piece', 'Eiichiro Oda', 1997, 'One Piece follows the adventures of Monkey D. Luffy, a young man who gains the power to stretch like rubber after accidentally eating a Devil Fruit. Inspired by his childhood hero, the legendary pirate Gol D. Roger, Luffy sets out on a journey to find the ultimate treasure, the One Piece, and become the King of the Pirates.\r\n\r\nLuffy assembles a diverse crew of skilled individuals:\r\n\r\nRoronoa Zoro, a master swordsman seeking to become the world\'s greatest swordsman.\r\nNami, a skilled navigator and thief who dreams of mapping the entire world.\r\nUsopp, a cowardly but talented sniper who seeks to become a brave warrior of the sea.\r\nSanji, a skilled cook who believes in chivalry and dreams of finding the All Blue, a legendary sea where all the world\'s fish gather.\r\nTony Tony Chopper, a reindeer who ate a Devil Fruit and gained human-like intelligence and the ability to transform.\r\n\r\nTogether, they embark on a thrilling voyage across the Grand Line, a treacherous sea filled with dangerous creatures, unpredictable weather, and rival pirates. They encounter various islands, each with its own unique culture, inhabitants, and challenges.\r\n\r\nAlong the way, Luffy and his crew face numerous obstacles, including:\r\n\r\nThe World Government, a powerful organization that seeks to maintain order in the world but often oppresses and exploits its citizens.\r\nThe Marines, the military force of the World Government, who hunt down pirates.\r\nOther powerful pirates, such as the Seven Warlords of the Sea, a group of powerful pirates who have made a pact with the World Government.\r\nDespite these challenges, Luffy and his crew persevere, forming strong bonds of friendship and facing their fears. They encounter a wide array of characters, from friendly islanders to formidable foes, each adding depth and complexity to their journey.\r\n\r\nAs their journey progresses, Luffy and his crew uncover the secrets of the world, including the true history of the Void Century, a period of 100 years that has been erased from history books. They learn about the dangers of absolute power and the importance of freedom and justice.\r\n\r\nOne Piece is a long-running and epic adventure that explores themes of friendship, courage, and the pursuit of dreams. It is a tale of exploration, discovery, and the enduring human spirit. Luffy\'s unwavering determination and his crew\'s unwavering loyalty to each other serve as an inspiration to readers of all ages.', 'Monkey.D.Luffey', 'Roronoa Zoro', 'Nami', 'Sanji', 'Tony tony Chopper', 'onepiece.png\r\n', 'C003'),
('A004', 'My Hero Academia', 'Kohei Horikoshi', 2014, 'My Hero Academia (Boku no Hero Academia) is a popular superhero manga and anime series set in a world where superpowers, known as \"Quirks,\" are commonplace. The story follows Izuku Midoriya, a young boy born without a Quirk in a world where they are the norm. Despite this, Izuku dreams of becoming a hero like his idol, All Might, the world\'s greatest hero.\r\n\r\nIzuku\'s life takes a turn when All Might, recognizing Izuku\'s unwavering spirit and kind heart, chooses him to be his successor and grants him his powerful Quirk, One For All. This Quirk allows Izuku to stockpile immense power and pass it on to others, but it also comes with a significant physical toll.\r\n\r\nWith his newfound power, Izuku enrolls in U.A. High School, a prestigious institution for aspiring heroes. There, he trains alongside other students with unique Quirks, including his childhood friend-turned-rival Katsuki Bakugo, the intelligent and resourceful Tenya Iida, and the kind and determined Ochaco Uraraka.\r\n\r\nAs Izuku and his classmates navigate the challenges of hero training, they face various threats, from minor villains to powerful organizations like the League of Villains, led by the enigmatic All For One, a powerful villain who seeks to rule the world.\r\n\r\nThroughout the series, Izuku grapples with the responsibilities of his power, the expectations placed on him as the successor of All Might, and the complexities of heroism. He learns valuable lessons about teamwork, friendship, and the importance of self-sacrifice.\r\n\r\nAs the story progresses, Izuku and his friends face increasingly dangerous challenges, uncovering secrets about the history of Quirks and the origins of All For One. They also confront the moral dilemmas that arise when fighting for justice in a world where the lines between hero and villain can blur.\r\n\r\nMy Hero Academia is a coming-of-age story that explores themes of friendship, perseverance, and the power of believing in oneself. It\'s a tale of growth and self-discovery, as Izuku and his classmates strive to become true heroes, not just for themselves but for the world around them.', 'Izuku Midoriya', 'Katsugi Bakugo', 'Shoto Todoroki', 'All Might', 'Tomura Shigaraki', 'mha.png', 'C004'),
('A005', 'Demon Slayer', 'Koyoharu Gotouge', 2016, 'Demon Slayer: Kimetsu no Yaiba is a Japanese manga series written and illustrated by Koyoharu Gotouge. It follows the story of Tanjiro Kamado, a kind and compassionate young boy whose life is forever changed when his family is brutally attacked and slaughtered by a demon. The only survivors are Tanjiro himself and his younger sister, Nezuko, who has been transformed into a demon.   \r\n\r\nDriven by a deep sense of grief and a desire to find a cure for his sister, Tanjiro embarks on a perilous journey to become a Demon Slayer. He joins the Demon Slayer Corps, a secret organization dedicated to protecting humanity from the demonic threat. Under the guidance of experienced Demon Slayers, Tanjiro learns the art of swordsmanship, mastering a unique breathing technique that allows him to fight demons with incredible speed and power.\r\n\r\nThroughout his journey, Tanjiro encounters a variety of demons, each with their own unique abilities and tragic backstories. He also forms strong bonds with his fellow Demon Slayers, including the impulsive Zenitsu Agatsuma and the stoic Inosuke Hashibira. Together, they face numerous challenges, from battling powerful demons to navigating the political intrigue within the Demon Slayer Corps.\r\n\r\nAs Tanjiro progresses on his journey, he uncovers the dark history of demons and the origins of their existence. He learns about the tragic circumstances that led to the creation of demons and the devastating impact they have had on humanity.\r\n\r\nDemon Slayer is a story of loss, redemption, and the enduring power of human compassion. Tanjiro\'s unwavering determination to save his sister and his unwavering belief in the inherent goodness of others inspire those around him. The series explores themes of family, friendship, and the importance of fighting for what you believe in, even in the face of overwhelming odds.', 'Tanjiro Kamado', 'Nezuko Kamado', 'Zenitsu Agatsuma', 'Inosuke Achibara', 'Muzan Kibutsuji', 'ds.png', 'C001'),
('A006', 'Fullmetal Alchemist', 'Hiromu Arakawa', 2001, 'This act of human transmutation, forbidden in their world, has devastating consequences. Edward loses his left leg and right arm, while Alphonse loses his entire body. To save his brother, Edward sacrifices his right arm and binds Alphonse\'s soul to a large suit of armor.\r\n\r\nTo rectify their mistake, the brothers embark on a dangerous quest to find the Philosopher\'s Stone, a mythical artifact said to grant limitless alchemical power. Along the way, they encounter various individuals, including:\r\n\r\nRoy Mustang: A powerful State Alchemist known as the \"Flame Alchemist\" who becomes a mentor and ally to the Elric brothers.\r\nRiza Hawkeye: Roy Mustang\'s loyal bodyguard and confidante.\r\nMaes Hughes: A kind and compassionate State Alchemist who becomes a close friend of the Elric brothers.\r\nColonel Alexander Armstrong: A strong and somewhat eccentric State Alchemist known for his powerful punches.\r\nScar: A scarred Ishvalan monk seeking revenge against the State Alchemists for the genocide of his people.\r\nAs the brothers delve deeper into their search, they uncover a dark conspiracy involving the creation of artificial Philosopher\'s Stones, which are made by sacrificing human lives. They also learn about the Homunculi, a group of powerful beings created by a corrupt alchemist named Father.\r\n\r\nThe story explores themes of sacrifice, redemption, the dangers of seeking forbidden knowledge, and the importance of human connection. The Elric brothers\' journey is filled with both triumphs and tragedies, as they confront their past mistakes and strive to make amends for their actions.\r\n\r\nFullmetal Alchemist is a complex and thought-provoking story that delves into the depths of human nature and the complexities of the world around us. It is a tale of loss, redemption, and the enduring power of family and friendship.', 'Edward Elric', 'Roy Mustang', 'Alphonse Elric', 'Winry Rockbell', 'King Bradley', 'FA.png', 'C005'),
('A007', 'Sword Art Online', 'Reki Kawahara', 2009, 'Sword Art Online (SAO) is a popular Japanese light novel series that has been adapted into anime, manga, and video games. The story revolves around Kazuto \"Kirito\" Kirigaya, a skilled gamer who finds himself trapped in a deadly virtual reality game called Sword Art Online.\r\n\r\nIn 2022, SAO is released, a groundbreaking virtual reality massively multiplayer online role-playing game (VRMMORPG) that allows players to experience and control their in-game avatars with their minds using a helmet called the NerveGear. Ten thousand players eagerly log in on launch day, excited to explore the immersive world of Aincrad, a colossal steel castle. However, their excitement quickly turns to terror when they discover that they are unable to log out.\r\n\r\nThe game\'s creator, Akihiko Kayaba, appears as a hologram and reveals the horrifying truth: they are trapped within SAO. The only way to escape is to clear all 100 floors of Aincrad and defeat the final boss. If a player dies in the game, they die in real life.\r\n\r\nKirito, having participated in the game\'s beta testing, possesses a slight advantage over other players. He quickly adapts to the harsh reality of SAO and becomes known as a \"Beater,\" a term used to describe beta testers who are feared and often ostracized by other players. Despite this, Kirito forms a strong bond with Asuna Yuuki, another skilled player who becomes his partner in the game.\r\n\r\nTogether, they navigate the treacherous floors of Aincrad, facing deadly monsters, treacherous players, and the constant threat of death. They encounter other players, some friendly, some hostile, and learn to rely on each other for survival. As they progress through the game, Kirito and Asuna develop deep feelings for each other, their virtual relationship evolving into a genuine connection.\r\n\r\nThe story explores the psychological impact of being trapped in a deadly game, the importance of friendship and trust, and the human will to survive in the face of overwhelming odds. It delves into themes of fear, loss, and the power of love in overcoming even the most challenging circumstances.\r\n\r\nAs Kirito and Asuna fight their way to the top of Aincrad, they face numerous trials and tribulations. They confront their own fears and insecurities, and learn to trust each other implicitly. Their journey is a testament to the human spirit\'s resilience and the power of love to conquer even the most daunting obstacles.\r\n\r\nSword Art Online is a thrilling and emotional story that has captivated audiences worldwide. It explores the complexities of virtual reality, the nature of reality itself, and the enduring power of human connection.', 'Kirito', 'Asuna', 'Sinon', 'Eugeo', 'Alice Zuberg', 'sao.png', 'C006'),
('A008', 'Death Note', 'Tsugumi Ohba (writer) and Takeshi Obata (illustrator)', 2003, 'Death Note follows the story of Light Yagami, an exceptionally intelligent and bored high school student who discovers a mysterious notebook called the Death Note. This otherworldly object belongs to a Shinigami (death god) named Ryuk and grants its possessor the power to kill anyone simply by writing their name in it, provided they know their face.\r\n\r\nInitially intrigued by the Death Note\'s power, Light sees it as an opportunity to create a \"new world\" free from crime and evil. He believes that by eliminating criminals and corrupt individuals, he can bring about a utopian society where justice prevails.\r\n\r\nUnder the alias \"Kira,\" Light begins a global killing spree, targeting criminals and those he deems unworthy of life. His actions initially garner widespread public support, with many people praising him as a modern-day vigilante. However, as the death toll rises, the world becomes increasingly gripped by fear and paranoia.\r\n\r\nThe international police, led by the brilliant detective L, are tasked with bringing Kira to justice. L, a reclusive and enigmatic figure, uses his exceptional deductive skills to track Kira\'s movements and unravel his plans. The ensuing cat-and-mouse game between Kira and L becomes a battle of wits and a psychological thriller.\r\n\r\nAs the body count continues to rise, Light becomes increasingly obsessed with his role as Kira. He manipulates those around him, including his classmates and even his own family, to further his agenda. The line between justice and vigilantism blurs, and Light\'s actions begin to have a devastating impact on those he cares about.\r\n\r\nDeath Note explores complex themes of morality, justice, and the corrupting influence of power. It raises profound questions about the nature of good and evil, the limits of justice, and the consequences of playing God.\r\n\r\nThe story delves into the psychological impact of absolute power, as Light\'s descent into darkness is a gradual yet inevitable process. He becomes increasingly isolated and paranoid, consumed by his obsession with creating his ideal world.\r\n\r\nDeath Note is a gripping and thought-provoking story that has captivated audiences worldwide. It is a tale of ambition, obsession, and the dangers of seeking to impose one\'s own will on the world.', 'Light Yagami', 'Ryuk', 'L', 'Mello', 'Misa Amane', 'dn.png\r\n', 'C007'),
('A009', 'Tokyo Revenger', 'Ken Wakui', 2017, 'Tokyo Revengers follows Takemichi Hanagaki, a 26-year-old NEET (Not in Employment, Education, or Training) who learns that his middle school girlfriend, Hinata Tachibana, and her younger brother Naoto, have been killed by the Tokyo Manji Gang, a notorious delinquent gang. Devastated, Takemichi is pushed onto the train tracks by a passing train.\r\n\r\nMiraculously, instead of dying, he travels back in time 12 years to his middle school days. Determined to prevent Hinata\'s death, Takemichi infiltrates the Tokyo Manji Gang, initially to observe and gather information. However, he soon finds himself drawn into the gang\'s internal conflicts and the lives of its members, including the charismatic leader, Mikey, and his right-hand man, Draken.\r\n\r\nTakemichi uses his knowledge of the future to try and alter the course of events, preventing tragic incidents and strengthening the bonds within the gang. He faces numerous challenges, including rival gangs, internal conflicts, and the looming threat of a darker future for the Tokyo Manji Gang.\r\n\r\nThrough his time travels, Takemichi learns about the complexities of friendship, loyalty, and the consequences of one\'s actions. He witnesses the devastating impact of violence and the importance of making positive choices.\r\n\r\nAs the story progresses, Takemichi discovers that a mysterious figure named Kisaki Tetta is manipulating events behind the scenes, orchestrating the Tokyo Manji Gang\'s downfall. He must unravel Kisaki\'s plans and prevent him from destroying the lives of his friends.\r\n\r\nTokyo Revengers is a thrilling and emotional story that explores themes of friendship, redemption, and the power of second chances. It\'s a tale of how one person\'s actions can have a profound impact on the lives of others, and the importance of fighting for what you believe in.', 'Manjiro Sano', 'Takemichi Hanagaki', 'Ken Ryuguji', 'Chifuyu Matsuno', 'Shuji Hanma', 'tokyo-revengers.png', 'C008'),
('A010', 'Jujutsu Kaisen', 'Gege Akutami', 2018, 'Jujutsu Kaisen follows the story of Yuji Itadori, an ordinary high school student with incredible athleticism. His life takes an unexpected turn when he encounters Megumi Fushiguro, a Jujutsu Sorcerer tasked with retrieving a cursed object: the finger of Ryomen Sukuna, a powerful and malevolent being.\r\n\r\nIn a desperate attempt to save his friends, Yuji consumes the finger, becoming Sukuna\'s host. This act thrusts him into the world of Jujutsu Sorcery, where he learns to control his newfound powers and fight against Curses, malevolent spirits born from human negativity.\r\n\r\nYuji enrolls in Tokyo Metropolitan Jujutsu Technical College, a specialized school for training Jujutsu Sorcerers. There, he trains alongside his classmates, Megumi Fushiguro and Nobara Kugisaki, under the guidance of Satoru Gojo, the strongest Jujutsu Sorcerer in the world.\r\n\r\nAs Yuji and his classmates face increasingly dangerous Curses and learn the intricacies of Jujutsu Sorcery, they uncover a hidden world of secrets and conspiracies. They confront powerful enemies, including the enigmatic Suguru Geto, a former Jujutsu Sorcerer who has turned against humanity, and the terrifying Curse Mahito.\r\n\r\nJujutsu Kaisen explores themes of friendship, loss, and the complexities of human nature. It delves into the moral dilemmas faced by Jujutsu Sorcerers as they fight to protect humanity from the forces of evil.\r\n\r\nThe series features intense action sequences, intricate world-building, and a compelling cast of characters. It has garnered widespread acclaim for its unique blend of horror, action, and supernatural elements.', 'Yuji Itadori', 'Gojo Satoru', 'Megumi Fushiguro', 'Nobara Kugisaki', 'Ryomen Sukuna', 'jjk.png', 'C001'),
('A011', 'Bleach', 'Tite Kubo', 2001, 'Bleach tells the story of Ichigo Kurosaki, a seemingly ordinary high school student with the unique ability to see ghosts. His life takes an unexpected turn when he encounters Rukia Kuchiki, a Soul Reaper, a being tasked with guiding lost souls to the afterlife and battling Hollows, monstrous creatures formed from lost souls.\r\n\r\nDuring a confrontation with a Hollow, Rukia is severely injured and forced to transfer her Soul Reaper powers to Ichigo to ensure his survival. This unexpected event thrusts Ichigo into the role of a Substitute Soul Reaper, a position he initially resists but ultimately embraces.\r\n\r\nIchigo\'s newfound powers lead him on a series of thrilling adventures as he navigates the complexities of the spirit world. He learns the intricacies of Soul Reaper techniques, including swordsmanship, spiritual energy manipulation, and advanced combat strategies. He also forms strong bonds with other Soul Reapers, such as his childhood friend Orihime Inoue, the stoic Yasutora \"Chad\" Sado, and the mischievous Uryu Ishida, a Quincy (a race of humans with the ability to absorb and manipulate spiritual energy).\r\n\r\nAs Ichigo delves deeper into the world of Soul Reapers, he uncovers a hidden society known as Soul Society, a realm where Soul Reapers reside and train. He faces numerous challenges, including political intrigue, powerful enemies, and the constant threat of Hollows.\r\n\r\nThe story explores themes of friendship, loss, and the importance of protecting those you care about. Ichigo\'s journey is filled with both triumphs and tragedies, as he grapples with the responsibilities of his newfound powers and the complexities of the world he now inhabits.\r\n\r\nBleach is a fast-paced and action-packed series that blends elements of fantasy, adventure, and supernatural drama. It is a tale of self-discovery and growth, as Ichigo evolves from a seemingly ordinary teenager into a powerful warrior dedicated to protecting the balance between the human world and the spirit world.', 'Ichigo Kurosaki', 'Rukia Kuchiki', 'Uryu Ishida', 'Kisuke Urahara', 'Sosuke Aizen', 'bleach.png', 'C003');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `CategoryID` varchar(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Genre` varchar(30) DEFAULT NULL,
  `Genre_Pic` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`CategoryID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`CategoryID`, `Genre`, `Genre_Pic`) VALUES
('C001', 'Action', 'action.png'),
('C002', 'Adventure', 'adventure.png'),
('C003', 'Fantasy', 'fantasy.png'),
('C004', 'Superhero', 'superhero.png'),
('C005', 'Sci-Fi', 'sci-fi.png'),
('C006', 'Isekai', 'isekai.png'),
('C007', 'Mystery', 'mystery.png'),
('C008', 'Drama', 'drama.png');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

DROP TABLE IF EXISTS `questions`;
CREATE TABLE IF NOT EXISTS `questions` (
  `QuestionID` int NOT NULL AUTO_INCREMENT,
  `Question` text NOT NULL,
  `correctAnswer` varchar(255) NOT NULL,
  `choice1` varchar(255) NOT NULL,
  `choice2` varchar(255) NOT NULL,
  `choice3` varchar(255) NOT NULL,
  `choice4` varchar(255) NOT NULL,
  `QuizID` varchar(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`QuestionID`),
  KEY `QuizID` (`QuizID`)
) ENGINE=InnoDB AUTO_INCREMENT=378 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`QuestionID`, `Question`, `correctAnswer`, `choice1`, `choice2`, `choice3`, `choice4`, `QuizID`) VALUES
(101, 'Who is the main protagonist of Naruto?', 'Naruto Uzumaki', 'Naruto Uzumaki', 'Sasuke Uchiha', 'Kakashi Hatake', 'Sakura Haruno', 'Q004'),
(102, 'What is Naruto\'s dream?', 'To become Hokage', 'To defeat Sasuke', 'To become Hokage', 'To destroy the Akatsuki', 'To master Taijutsu', 'Q004'),
(103, 'What is the nine-tailed beast inside Naruto called?', 'Kurama', 'Shukaku', 'Gyuki', 'Matatabi', 'Kurama', 'Q004'),
(104, 'Who is Naruto\'s rival and best friend?', 'Sasuke Uchiha', 'Gaara', 'Kiba Inuzuka', 'Sasuke Uchiha', 'Shino Aburame', 'Q004'),
(105, 'What village does Naruto belong to?', 'Hidden Leaf Village', 'Hidden Sand Village', 'Hidden Mist Village', 'Hidden Leaf Village', 'Hidden Stone Village', 'Q004'),
(106, 'What is Kakashi\'s signature technique?', 'Chidori', 'Chidori', 'Rasengan', 'Amaterasu', 'Shadow Clone', 'Q004'),
(107, 'What are Naruto\'s favorite food items?', 'Ramen', 'Sushi', 'Bento', 'Rice Balls', 'Ramen', 'Q004'),
(108, 'Who created the Rasengan?', 'Minato Namikaze', 'Minato Namikaze', 'Naruto Uzumaki', 'Jiraiya', 'Kakashi Hatake', 'Q004'),
(109, 'What clan is Sasuke from?', 'Uchiha Clan', 'Uchiha Clan', 'Hyuga Clan', 'Senju Clan', 'Inuzuka Clan', 'Q004'),
(110, 'What is Sakura\'s primary strength?', 'Medical Ninjutsu', 'Medical Ninjutsu', 'Taijutsu', 'Genjutsu', 'Fire Style', 'Q004'),
(111, 'Who is the leader of Team 7?', 'Kakashi Hatake', 'Naruto Uzumaki', 'Jiraiya', 'Iruka Umino', 'Kakashi Hatake', 'Q004'),
(112, 'What is the name of the organization hunting tailed beasts?', 'Akatsuki', 'Akatsuki', 'ANBU', 'Seven Swordsmen', 'Konoha Elders', 'Q004'),
(113, 'Who trains Naruto after the Chunin Exams?', 'Jiraiya', 'Tsunade', 'Jiraiya', 'Orochimaru', 'Kakashi', 'Q004'),
(114, 'What is Gaara\'s primary ability?', 'Sand Manipulation', 'Fire Manipulation', 'Water Manipulation', 'Sand Manipulation', 'Ice Manipulation', 'Q004'),
(115, 'What does Naruto learn to summon?', 'Toads', 'Snakes', 'Dogs', 'Toads', 'Slugs', 'Q004'),
(116, 'Who is the Fifth Hokage?', 'Tsunade', 'Kakashi', 'Jiraiya', 'Hiruzen', 'Tsunade', 'Q004'),
(117, 'What color is Naruto\'s chakra when using Kurama\'s power?', 'Orange', 'Blue', 'Orange', 'Red', 'Yellow', 'Q004'),
(118, 'What is the name of Naruto\'s father?', 'Minato Namikaze', 'Hiruzen Sarutobi', 'Jiraiya', 'Minato Namikaze', 'Tobirama Senju', 'Q004'),
(119, 'What is Sasuke\'s most powerful eye ability?', 'Sharingan', 'Sharingan', 'Byakugan', 'Rinnegan', 'Mangekyo Sharingan', 'Q004'),
(120, 'What is the name of Naruto\'s mother?', 'Kushina Uzumaki', 'Tsunade', 'Hinata Hyuga', 'Kushina Uzumaki', 'Sakura Haruno', 'Q004'),
(121, 'Who is the captain of the Straw Hat Pirates?', 'Monkey D. Luffy', 'Monkey D. Luffy', 'Roronoa Zoro', 'Sanji', 'Usopp', 'Q007'),
(122, 'What is Luffy\'s dream?', 'To become Pirate King', 'To find the One Piece', 'To become Pirate King', 'To destroy the Celestial Dragons', 'To protect Fishman Island', 'Q007'),
(123, 'What fruit did Luffy eat?', 'Gum-Gum Fruit', 'Gum-Gum Fruit', 'Flame-Flame Fruit', 'Ice-Ice Fruit', 'Light-Light Fruit', 'Q007'),
(124, 'Who is Luffy\'s first crewmate?', 'Roronoa Zoro', 'Roronoa Zoro', 'Sanji', 'Nami', 'Usopp', 'Q007'),
(125, 'What is Nami\'s role in the crew?', 'Navigator', 'Navigator', 'Cook', 'Doctor', 'Sniper', 'Q007'),
(126, 'Who is the ship\'s cook?', 'Sanji', 'Sanji', 'Zoro', 'Chopper', 'Franky', 'Q007'),
(127, 'What is the name of the Straw Hat Pirates\' first ship?', 'Going Merry', 'Going Merry', 'Thousand Sunny', 'Red Force', 'Black Pearl', 'Q007'),
(128, 'What is Luffy\'s bounty after the Arlong Park arc?', '30,000,000 Berries', '10,000,000 Berries', '30,000,000 Berries', '50,000,000 Berries', '5,000,000 Berries', 'Q007'),
(129, 'What is Zoro\'s primary fighting style?', 'Three-Sword Style', 'Three-Sword Style', 'One-Sword Style', 'Two-Sword Style', 'Bare-Handed', 'Q007'),
(130, 'Who is Luffy\'s older brother?', 'Portgas D. Ace', 'Sabo', 'Gol D. Roger', 'Portgas D. Ace', 'Shanks', 'Q007'),
(131, 'Who is the clown-like pirate in the early episodes?', 'Buggy', 'Buggy', 'Arlong', 'Kuro', 'Don Krieg', 'Q007'),
(132, 'Who saved Luffy when he was a child?', 'Shanks', 'Ace', 'Garp', 'Sabo', 'Shanks', 'Q007'),
(133, 'What is the Grand Line?', 'A dangerous sea', 'A city', 'A treasure', 'A dangerous sea', 'A marine base', 'Q007'),
(134, 'What weapon does Usopp use?', 'Slingshot', 'Slingshot', 'Sword', 'Gun', 'Bow', 'Q007'),
(135, 'Who is the ship\'s doctor?', 'Chopper', 'Sanji', 'Chopper', 'Zoro', 'Brook', 'Q007'),
(136, 'What is the name of the World Government organization?', 'Marines', 'Marines', 'Celestial Dragons', 'Shichibukai', 'Pirates', 'Q007'),
(137, 'Who is the archaeologist in the crew?', 'Robin', 'Nami', 'Robin', 'Sanji', 'Zoro', 'Q007'),
(138, 'What is Franky\'s role in the crew?', 'Shipwright', 'Cook', 'Swordsman', 'Doctor', 'Shipwright', 'Q007'),
(139, 'What is Luffy\'s signature attack?', 'Gum-Gum Pistol', 'Red Hawk', 'Gum-Gum Pistol', 'Jet Bazooka', 'Elephant Gun', 'Q007'),
(140, 'What is One Piece?', 'A legendary treasure', 'A legendary treasure', 'A weapon', 'A devil fruit', 'An island', 'Q007'),
(141, 'Who is the main protagonist of My Hero Academia?', 'Izuku Midoriya', 'Izuku Midoriya', 'Katsuki Bakugo', 'Shoto Todoroki', 'All Might', 'Q010'),
(142, 'What is Izuku Midoriya\'s hero name?', 'Deku', 'Mighty', 'Shadow', 'Deku', 'Turbo', 'Q010'),
(143, 'What is All Might\'s Quirk called?', 'One For All', 'One For All', 'All For One', 'Explosion', 'Ice', 'Q010'),
(144, 'Who is the number one hero?', 'All Might', 'All Might', 'Endeavor', 'Hawks', 'Best Jeanist', 'Q010'),
(145, 'What is Bakugo\'s Quirk?', 'Explosion', 'Explosion', 'Fire', 'Lightning', 'Ice', 'Q010'),
(146, 'What is Todoroki\'s dual Quirk?', 'Fire and Ice', 'Electricity and Water', 'Fire and Ice', 'Wind and Earth', 'Light and Dark', 'Q010'),
(147, 'What school do the heroes attend?', 'U.A. High', 'U.A. High', 'Shiketsu High', 'Ketsubutsu Academy', 'Hosu Academy', 'Q010'),
(148, 'What is Ochaco Uraraka\'s Quirk?', 'Zero Gravity', 'Explosion', 'Fire', 'Zero Gravity', 'Water', 'Q010'),
(149, 'Who is the principal of U.A. High?', 'Nezu', 'Nezu', 'All Might', 'Eraser Head', 'Midnight', 'Q010'),
(150, 'What is Tenya Iida\'s Quirk?', 'Engine', 'Engine', 'Speed', 'Rocket', 'Dash', 'Q010'),
(151, 'What is All Might\'s true form?', 'Skinny and Weak', 'Tall and Strong', 'Skinny and Weak', 'Average Human', 'Super Buff', 'Q010'),
(152, 'Who is the League of Villains leader?', 'Tomura Shigaraki', 'Dabi', 'Tomura Shigaraki', 'Toga', 'Twice', 'Q010'),
(153, 'What is Tsuyu Asui\'s hero name?', 'Froppy', 'Froppy', 'Tsu', 'Frog Hero', 'Amphibian', 'Q010'),
(154, 'What Quirk does Denki Kaminari use?', 'Electricity', 'Fire', 'Electricity', 'Ice', 'Wind', 'Q010'),
(155, 'What does Eijiro Kirishima\'s Quirk do?', 'Hardens His Body', 'Enhances Strength', 'Hardens His Body', 'Produces Fire', 'Grows Larger', 'Q010'),
(156, 'What is Eraser Head\'s Quirk?', 'Erasing Other Quirks', 'Super Speed', 'Fire Manipulation', 'Erasing Other Quirks', 'Invisibility', 'Q010'),
(157, 'Who is Izuku\'s best friend-turned-rival?', 'Katsuki Bakugo', 'Katsuki Bakugo', 'Shoto Todoroki', 'Tenya Iida', 'Ochaco Uraraka', 'Q010'),
(158, 'What is Mirio Togata\'s Quirk?', 'Permeation', 'Permeation', 'Strength', 'Flight', 'Healing', 'Q010'),
(159, 'Who is the symbol of peace?', 'All Might', 'Endeavor', 'All Might', 'Hawks', 'Nezu', 'Q010'),
(160, 'What is the main antagonist organization?', 'League of Villains', 'League of Villains', 'Hero Society', 'Villain Agency', 'UA Conspiracy', 'Q010'),
(201, 'Who is the main protagonist of Attack on Titan?', 'Eren Yeager', 'Eren Yeager', 'Armin Arlert', 'Levi Ackerman', 'Mikasa Ackerman', 'Q001'),
(202, 'What are the giant creatures called in Attack on Titan?', 'Titans', 'Titans', 'Giants', 'Colossals', 'Ogres', 'Q001'),
(203, 'What is the name of the town where Eren was born?', 'Shiganshina', 'Shiganshina', 'Trost', 'Wall Maria', 'Stohess', 'Q001'),
(204, 'Who is Eren\'s adoptive sister?', 'Mikasa Ackerman', 'Hange Zoë', 'Annie Leonhart', 'Mikasa Ackerman', 'Sasha Blouse', 'Q001'),
(205, 'What is the primary weapon used to fight Titans?', 'ODM Gear', 'ODM Gear', 'Blades', 'Cannons', 'Guns', 'Q001'),
(206, 'What is Eren\'s Titan form called?', 'Attack Titan', 'Colossal Titan', 'Armored Titan', 'Attack Titan', 'Beast Titan', 'Q001'),
(207, 'Who is the leader of the Survey Corps?', 'Erwin Smith', 'Erwin Smith', 'Levi Ackerman', 'Hange Zoë', 'Jean Kirstein', 'Q001'),
(208, 'What is the outermost wall called?', 'Wall Sina', 'Wall Maria', 'Wall Rose', 'Wall Sina', 'Wall Titan', 'Q001'),
(209, 'What is Armin\'s strength in the group?', 'Tactical Intelligence', 'Combat Skills', 'Tactical Intelligence', 'ODM Maneuvering', 'Cooking', 'Q001'),
(210, 'Who is known as humanity\'s strongest soldier?', 'Levi Ackerman', 'Erwin Smith', 'Levi Ackerman', 'Eren Yeager', 'Jean Kirstein', 'Q001'),
(211, 'What is the name of the organization that trains soldiers?', 'Military Training Corps', 'Survey Corps', 'Military Training Corps', 'Garrison Regiment', 'Royal Guard', 'Q001'),
(212, 'What Titan can create hard crystal armor?', 'Female Titan', 'Female Titan', 'Attack Titan', 'Colossal Titan', 'Armored Titan', 'Q001'),
(213, 'What is Sasha Blouse\'s nickname?', 'Potato Girl', 'Potato Girl', 'Bread Girl', 'Scout Girl', 'Meat Girl', 'Q001'),
(214, 'What does the Survey Corps emblem depict?', 'Wings of Freedom', 'Wings of Freedom', 'Sword and Shield', 'Colossal Titan', 'Rising Sun', 'Q001'),
(215, 'Who betrays humanity as the Armored Titan?', 'Reiner Braun', 'Reiner Braun', 'Bertholdt Hoover', 'Annie Leonhart', 'Zeke Yeager', 'Q001'),
(216, 'What is the purpose of the walls?', 'To protect humanity from Titans', 'To store food', 'To protect humanity from Titans', 'To keep people inside', 'To honor the King', 'Q001'),
(217, 'What is Historia Reiss\'s true identity?', 'The rightful heir to the throne', 'A regular villager', 'A Titan shifter', 'The rightful heir to the throne', 'A soldier in hiding', 'Q001'),
(218, 'What ability does the Founding Titan possess?', 'Control other Titans', 'Harden its body', 'Become invisible', 'Control other Titans', 'Create new walls', 'Q001'),
(219, 'What causes Eren to transform into a Titan?', 'Injecting Titan serum', 'Eating a Titan', 'Injecting Titan serum', 'A Titan bite', 'A mysterious crystal', 'Q001'),
(220, 'What is the Colossal Titan known for?', 'Its massive size and steam', 'Its speed and agility', 'Its massive size and steam', 'Its ability to fly', 'Its intelligence', 'Q001'),
(221, 'What is the name of Eren\'s mother?', 'Carla Yeager', 'Carla Yeager', 'Dina Fritz', 'Historia Reiss', 'Mina Carolina', 'Q002'),
(222, 'Which Titan is capable of emitting hot steam?', 'Colossal Titan', 'Colossal Titan', 'Beast Titan', 'Female Titan', 'Attack Titan', 'Q002'),
(223, 'Who is the first Titan shifter revealed in the series?', 'Annie Leonhart', 'Eren Yeager', 'Annie Leonhart', 'Reiner Braun', 'Zeke Yeager', 'Q002'),
(224, 'What is Hange Zoë\'s primary role in the Survey Corps?', 'Titan research', 'Combat strategist', 'Titan research', 'Commander-in-training', 'Medic', 'Q002'),
(225, 'Who is the true heir to the Founding Titan?', 'Historia Reiss', 'Historia Reiss', 'Eren Yeager', 'Zeke Yeager', 'Reiner Braun', 'Q002'),
(226, 'What triggers the Armored and Colossal Titan attack on Shiganshina?', 'To steal the Founding Titan', 'To kill Eren', 'To steal the Founding Titan', 'To destroy humanity', 'To infiltrate the Survey Corps', 'Q002'),
(227, 'What is the full name of the Reiss family\'s secret chapel?', 'The Underground Chapel', 'The Underground Chapel', 'The Chapel of Freedom', 'The Royal Chapel', 'The Titan Chapel', 'Q002'),
(228, 'What is Levi\'s personal hobby?', 'Cleaning', 'Cleaning', 'Swordsmanship', 'Gardening', 'Cooking', 'Q002'),
(229, 'Which Titan is controlled by Zeke Yeager?', 'Beast Titan', 'Beast Titan', 'Attack Titan', 'Armored Titan', 'Cart Titan', 'Q002'),
(230, 'What is the significance of the basement in Eren\'s home?', 'It holds the truth about Titans', 'It holds Titan weapons', 'It holds the truth about Titans', 'It stores Titan serum', 'It contains family heirlooms', 'Q002'),
(231, 'What is Kenny Ackerman\'s relationship to Levi?', 'His uncle', 'His uncle', 'His father', 'His brother', 'His mentor', 'Q002'),
(232, 'What unique power does the War Hammer Titan possess?', 'Creating weapons from hardened material', 'Super strength', 'Creating weapons from hardened material', 'High speed', 'Mind control', 'Q002'),
(233, 'Why does Historia become queen?', 'To unite the people against Titans', 'To replace a corrupt king', 'To unite the people against Titans', 'To keep her safe', 'To lead the Survey Corps', 'Q002'),
(234, 'What is the Marleyan military\'s goal?', 'To take control of Paradis Island', 'To destroy Titans', 'To take control of Paradis Island', 'To free all Eldians', 'To expand their empire', 'Q002'),
(235, 'What causes the Titans to roam aimlessly?', 'Lack of intelligence', 'Lack of intelligence', 'Fear of sunlight', 'Following commands', 'Defective Titan serum', 'Q002'),
(236, 'What does Mikasa\'s red scarf symbolize?', 'Eren\'s promise to protect her', 'Her family heritage', 'Eren\'s promise to protect her', 'Her loyalty to the Survey Corps', 'Her combat skills', 'Q002'),
(237, 'Who is the first commander of the Survey Corps?', 'Keith Shadis', 'Keith Shadis', 'Erwin Smith', 'Hange Zoë', 'Levi Ackerman', 'Q002'),
(238, 'What does \"Paths\" represent in the series?', 'The connection between all Eldians', 'A route to safety', 'The connection between all Eldians', 'A new area in Marley', 'A Titan experiment', 'Q002'),
(239, 'Who devours Marcel, the previous Jaw Titan?', 'Ymir', 'Ymir', 'Zeke Yeager', 'Pieck Finger', 'Bertholdt Hoover', 'Q002'),
(240, 'What is the effect of Titan serum?', 'Transforms humans into Titans', 'Provides super strength', 'Transforms humans into Titans', 'Heals injuries', 'Increases speed', 'Q002'),
(241, 'Who trained Jiraiya?', 'The Third Hokage', 'The Third Hokage', 'Tobirama Senju', 'Hashirama Senju', 'Danzo Shimura', 'Q005'),
(242, 'What is the name of Naruto\'s signature jutsu?', 'Rasengan', 'Rasengan', 'Chidori', 'Shadow Clone Jutsu', 'Amaterasu', 'Q005'),
(243, 'Who is the jinchuriki of the One-Tailed Beast?', 'Gaara', 'Naruto Uzumaki', 'Gaara', 'Killer Bee', 'Yugito Nii', 'Q005'),
(244, 'What is the main ability of the Sharingan?', 'Copying jutsu', 'Enhancing speed', 'Copying jutsu', 'Healing', 'Invisibility', 'Q005'),
(245, 'Who founded the Akatsuki?', 'Yahiko', 'Yahiko', 'Nagato', 'Itachi Uchiha', 'Madara Uchiha', 'Q005'),
(246, 'What is the true identity of Tobi?', 'Obito Uchiha', 'Madara Uchiha', 'Obito Uchiha', 'Zetsu', 'Kakashi Hatake', 'Q005'),
(247, 'What is Orochimaru\'s goal?', 'Immortality', 'Immortality', 'World domination', 'Destroying Konoha', 'Becoming Hokage', 'Q005'),
(248, 'What is the name of the sword used by Zabuza Momochi?', 'Kubikiribocho', 'Kubikiribocho', 'Samehada', 'Kusanagi', 'Totsuka Blade', 'Q005'),
(249, 'What power does the Byakugan grant?', '360-degree vision', 'Super strength', '360-degree vision', 'Time manipulation', 'High-speed regeneration', 'Q005'),
(250, 'Who is the leader of the Seven Ninja Swordsmen?', 'Kisame Hoshigaki', 'Kisame Hoshigaki', 'Zabuza Momochi', 'Mangetsu Hozuki', 'Raiga Kurosuki', 'Q005'),
(251, 'What is Shikamaru\'s signature move?', 'Shadow Possession Jutsu', 'Shadow Clone Jutsu', 'Shadow Possession Jutsu', 'Wind Style: Rasengan', 'Earth Style Wall', 'Q005'),
(252, 'Who possesses the Rinnegan eyes?', 'Nagato', 'Nagato', 'Sasuke Uchiha', 'Kakashi Hatake', 'Minato Namikaze', 'Q005'),
(253, 'What is the name of Naruto\'s parents?', 'Minato and Kushina', 'Minato and Kushina', 'Hiruzen and Biwako', 'Sasuke and Mikoto', 'Fugaku and Mikoto', 'Q005'),
(254, 'What is Tsunade\'s greatest fear?', 'Blood', 'Water', 'Blood', 'Fire', 'Heights', 'Q005'),
(255, 'Who teaches Naruto the Rasengan?', 'Jiraiya', 'Jiraiya', 'Kakashi', 'Iruka', 'Asuma', 'Q005'),
(256, 'What is Kakashi\'s nickname?', 'Copy Ninja', 'Copy Ninja', 'Lightning Blade', 'Shadow Hokage', 'Blue Beast', 'Q005'),
(257, 'What village is known as the Hidden Sand?', 'Sunagakure', 'Kirigakure', 'Sunagakure', 'Kumogakure', 'Iwagakure', 'Q005'),
(258, 'What is the main purpose of Akatsuki?', 'Collecting tailed beasts', 'World peace', 'Collecting tailed beasts', 'Destroying villages', 'Gaining power', 'Q005'),
(259, 'What type of jutsu does Rock Lee specialize in?', 'Taijutsu', 'Ninjutsu', 'Taijutsu', 'Genjutsu', 'Kenjutsu', 'Q005'),
(260, 'Who is the creator of the Chidori?', 'Kakashi Hatake', 'Sasuke Uchiha', 'Kakashi Hatake', 'Orochimaru', 'Itachi Uchiha', 'Q005'),
(261, 'What is the name of Luffy\'s signature attack?', 'Gum-Gum Pistol', 'Gum-Gum Pistol', 'Red Hawk', 'King Kong Gun', 'Elephant Gun', 'Q008'),
(262, 'Who is the navigator of the Straw Hat Pirates?', 'Nami', 'Nami', 'Robin', 'Franky', 'Usopp', 'Q008'),
(263, 'What is the name of the treasure Luffy is searching for?', 'One Piece', 'One Piece', 'Gold D. Roger\'s Treasure', 'The Grand Line', 'Raftel', 'Q008'),
(264, 'What is the name of the ship used by the Straw Hats before the Thousand Sunny?', 'Going Merry', 'Going Merry', 'Baratie', 'Red Force', 'Polar Tang', 'Q008'),
(265, 'What ability does Zoro specialize in?', 'Swordsmanship', 'Swordsmanship', 'Haki', 'Navigation', 'Martial Arts', 'Q008'),
(266, 'Who is the first member to join Luffy\'s crew?', 'Zoro', 'Zoro', 'Nami', 'Sanji', 'Usopp', 'Q008'),
(267, 'What is the name of the doctor of the Straw Hat Pirates?', 'Tony Tony Chopper', 'Tony Tony Chopper', 'Franky', 'Brook', 'Robin', 'Q008'),
(268, 'Who is known as the \"Pirate Hunter\"?', 'Zoro', 'Zoro', 'Sanji', 'Luffy', 'Ace', 'Q008'),
(269, 'What is Nico Robin\'s Devil Fruit ability?', 'Hana Hana no Mi', 'Hana Hana no Mi', 'Gomu Gomu no Mi', 'Soru Soru no Mi', 'Yami Yami no Mi', 'Q008'),
(270, 'Who is the captain of the Red Hair Pirates?', 'Shanks', 'Shanks', 'Kaido', 'Big Mom', 'Blackbeard', 'Q008'),
(271, 'What is the name of the marine who always smokes a cigar?', 'Smoker', 'Smoker', 'Garp', 'Kizaru', 'Fujitora', 'Q008'),
(272, 'Who saved Luffy from execution at Loguetown?', 'Dragon', 'Dragon', 'Shanks', 'Ace', 'Garp', 'Q008'),
(273, 'What is the name of the sea where Fishman Island is located?', 'The New World', 'The New World', 'The Grand Line', 'The East Blue', 'The Calm Belt', 'Q008'),
(274, 'What is Sanji\'s dream?', 'To find the All Blue', 'To find the All Blue', 'To become the Pirate King', 'To become the best swordsman', 'To find the One Piece', 'Q008'),
(275, 'What is the name of Luffy\'s grandfather?', 'Monkey D. Garp', 'Monkey D. Garp', 'Gol D. Roger', 'Monkey D. Dragon', 'Kaido', 'Q008'),
(276, 'What does the \"D\" in Luffy\'s name signify?', 'A mysterious legacy', 'Pirate King', 'A mysterious legacy', 'Destiny', 'Determination', 'Q008'),
(277, 'What is the name of the powerful punches Luffy uses in Gear Second?', 'Jet Pistol', 'Jet Pistol', 'Red Hawk', 'Giant Pistol', 'King Cobra', 'Q008'),
(278, 'What is Brook\'s role in the Straw Hat crew?', 'Musician', 'Musician', 'Cook', 'Navigator', 'Doctor', 'Q008'),
(279, 'What does Usopp often lie about?', 'His adventures', 'His age', 'His adventures', 'His strength', 'His weapons', 'Q008'),
(280, 'What is the main goal of the Revolutionary Army?', 'To overthrow the World Government', 'To gain riches', 'To overthrow the World Government', 'To control the Grand Line', 'To destroy the Yonko', 'Q008'),
(281, 'What is Izuku Midoriya\'s hero name?', 'Deku', 'Deku', 'All Might Jr.', 'Quirkless Hero', 'Green Flash', 'Q011'),
(282, 'Who is the teacher of Class 1-A?', 'Shota Aizawa', 'Shota Aizawa', 'Present Mic', 'All Might', 'Nezu', 'Q011'),
(283, 'What is Katsuki Bakugo\'s quirk?', 'Explosion', 'Explosion', 'Fire', 'Detonation', 'Blast', 'Q011'),
(284, 'What is the name of the prestigious school for heroes?', 'U.A. High School', 'U.A. High School', 'Shiketsu High School', 'I-Island Academy', 'Hero Society Academy', 'Q011'),
(285, 'What is the name of All Might\'s quirk?', 'One For All', 'One For All', 'All For One', 'Smash', 'Detroit Blow', 'Q011'),
(286, 'What is Ochaco Uraraka\'s quirk?', 'Zero Gravity', 'Zero Gravity', 'Levitation', 'Weightlessness', 'Air Control', 'Q011'),
(287, 'Who is the principal of U.A. High?', 'Nezu', 'Nezu', 'Shota Aizawa', 'Present Mic', 'Endeavor', 'Q011'),
(288, 'What is Tenya Iida\'s hero name?', 'Ingenium', 'Speedster', 'Ingenium', 'Turbo', 'Engine', 'Q011'),
(289, 'What is Shoto Todoroki\'s quirk?', 'Half-Cold Half-Hot', 'Fire', 'Half-Cold Half-Hot', 'Ice', 'Thermal Manipulation', 'Q011'),
(290, 'What is the name of the support gear inventor for Deku?', 'Mei Hatsume', 'Mei Hatsume', 'Melissa Shield', 'Power Loader', 'Recovery Girl', 'Q011'),
(291, 'What is the primary goal of the League of Villains?', 'To overthrow hero society', 'To gain wealth', 'To overthrow hero society', 'To destroy U.A.', 'To defeat All Might', 'Q011'),
(292, 'What is Momo Yaoyorozu\'s quirk?', 'Creation', 'Creation', 'Transformation', 'Material Manipulation', 'Alchemy', 'Q011'),
(293, 'What is the name of the U.A. Sports Festival\'s first round?', 'Obstacle Race', 'Obstacle Race', 'Quirk Contest', 'Hero Relay', 'Battle Royale', 'Q011'),
(294, 'What type of quirk does Tsuyu Asui have?', 'Frog', 'Frog', 'Water', 'Amphibian', 'Reptile', 'Q011'),
(295, 'Who is the number two hero during the beginning of the series?', 'Endeavor', 'Endeavor', 'Hawks', 'Best Jeanist', 'All Might', 'Q011'),
(296, 'What is the name of All Might\'s home country?', 'America', 'America', 'Japan', 'Canada', 'England', 'Q011'),
(297, 'What is the name of the first villain Deku fights?', 'Sludge Villain', 'Shigaraki', 'Sludge Villain', 'Nomu', 'Overhaul', 'Q011'),
(298, 'What does Eijiro Kirishima\'s quirk allow him to do?', 'Harden his body', 'Harden his body', 'Become unbreakable', 'Increase his strength', 'Turn into steel', 'Q011'),
(299, 'What is the name of the professional hero who trains Bakugo and Todoroki during their internships?', 'Endeavor', 'Endeavor', 'Hawks', 'Best Jeanist', 'Gran Torino', 'Q011'),
(300, 'What is the real name of the villain known as \"Dabi\"?', 'Toya Todoroki', 'Shigaraki Tomura', 'Toya Todoroki', 'Kai Chisaki', 'Twice', 'Q011'),
(301, 'What was the name of the first known Titan shifter in history?', 'Ymir Fritz', 'Ymir Fritz', 'Karl Fritz', 'Eren Kruger', 'Zeke Yeager', 'Q003'),
(302, 'Who was responsible for the death of Marco Bott?', 'Annie, Reiner, and Bertolt', 'Annie, Reiner, and Bertolt', 'Eren Yeager', 'Kenny Ackerman', 'Porco Galliard', 'Q003'),
(303, 'What is the main reason behind the Colossal Titan’s enormous destructive power?', 'It releases an explosive blast upon transformation', 'It releases an explosive blast upon transformation', 'It has immense physical strength', 'It can harden its skin at will', 'It generates high-speed winds', 'Q003'),
(304, 'Which Titan is known for its exceptional speed?', 'Jaw Titan', 'Jaw Titan', 'Beast Titan', 'Female Titan', 'War Hammer Titan', 'Q003'),
(305, 'Who inherited the War Hammer Titan before Eren?', 'Lara Tybur', 'Lara Tybur', 'Zeke Yeager', 'Pieck Finger', 'Willy Tybur', 'Q003'),
(306, 'What is the name of the military police division responsible for protecting the royal family?', 'First Interior Squad', 'First Interior Squad', 'Garrison Regiment', 'Survey Corps', 'Anti-Personnel Control Squad', 'Q003'),
(307, 'What was Erwin Smith’s ultimate goal?', 'To learn the truth about the world', 'To learn the truth about the world', 'To eradicate all Titans', 'To overthrow the government', 'To reclaim Wall Maria', 'Q003'),
(308, 'Who was the first person to discover Eren’s Titan ability?', 'Hange Zoë', 'Hange Zoë', 'Armin Arlert', 'Mikasa Ackerman', 'Levi Ackerman', 'Q003'),
(309, 'What is the name of the Marleyan general overseeing the Warrior Unit?', 'Theo Magath', 'Theo Magath', 'Zeke Yeager', 'Porco Galliard', 'Udo', 'Q003'),
(310, 'Which event led to the downfall of the royal family inside the walls?', 'The coup led by Erwin and Historia', 'The coup led by Erwin and Historia', 'The invasion of the Colossal Titan', 'The death of Rod Reiss', 'The Great Titan War', 'Q003'),
(311, 'What was the name of the ship used by the alliance to travel to Marley?', 'Azumabito’s flying boat', 'Azumabito’s flying boat', 'The Freedom Ship', 'Marleyan Cruiser', 'Hizuru Stealth Vessel', 'Q003'),
(312, 'How did Eren manipulate Grisha Yeager to take the Founding Titan?', 'He used the Attack Titan’s ability to influence the past', 'He used the Attack Titan’s ability to influence the past', 'He convinced him through words', 'He physically forced him', 'He worked with Zeke to trick him', 'Q003'),
(313, 'Who was the first person to kill a Titan inside the walls?', 'Mikasa Ackerman', 'Mikasa Ackerman', 'Levi Ackerman', 'Eren Yeager', 'Armin Arlert', 'Q003'),
(314, 'What was the real reason behind Zeke’s betrayal of Marley?', 'To euthanize all Eldians', 'To euthanize all Eldians', 'To gain power for himself', 'To help Eren conquer Marley', 'To avenge his parents', 'Q003'),
(315, 'Which member of the Survey Corps was known for their extraordinary combat skills and was given the title “Humanity’s Strongest Soldier”?', 'Levi Ackerman', 'Levi Ackerman', 'Mikasa Ackerman', 'Erwin Smith', 'Jean Kirstein', 'Q003'),
(316, 'What is the name of the technique Levi uses to take down Titans swiftly?', 'Spinning Slashes', 'Spinning Slashes', 'Ackerman Instinct', 'Survey Corps Maneuver', 'Rapid Blade Strikes', 'Q003'),
(317, 'Who was the first Titan shifter to be revealed among the cadets?', 'Annie Leonhart', 'Annie Leonhart', 'Reiner Braun', 'Bertolt Hoover', 'Eren Yeager', 'Q003'),
(318, 'What is the full name of the Ackerman ancestor who served the Eldian King?', 'Kenny Ackerman', 'Kenny Ackerman', 'Uri Reiss', 'Frieda Reiss', 'Rod Reiss', 'Q003'),
(319, 'Which nation aided Paradis in developing weapons and technology against Marley?', 'Hizuru', 'Hizuru', 'Liberio', 'Azumabito Empire', 'Mid-East Union', 'Q003'),
(320, 'What was the fate of Historia Reiss after she became queen?', 'She became pregnant and lived in seclusion', 'She became pregnant and lived in seclusion', 'She led the Survey Corps', 'She joined the military police', 'She fled Paradis', 'Q003'),
(321, 'What is the name of the forbidden technique that Tobirama Senju created?', 'Edo Tensei', 'Edo Tensei', 'Flying Raijin', 'Shadow Clone Jutsu', 'Izanagi', 'Q006'),
(322, 'Who was the first Uchiha to awaken the Mangekyō Sharingan?', 'Madara Uchiha', 'Madara Uchiha', 'Itachi Uchiha', 'Shisui Uchiha', 'Izuna Uchiha', 'Q006'),
(323, 'What is the true identity of Tobi before revealing himself as Obito?', 'Madara Uchiha’s impostor', 'Madara Uchiha’s impostor', 'Zetsu’s puppet', 'A reincarnation of Indra', 'A rogue Senju', 'Q006'),
(324, 'Which of the Hokage was able to use Wood Release naturally?', 'Hashirama Senju', 'Hashirama Senju', 'Tobirama Senju', 'Hiruzen Sarutobi', 'Minato Namikaze', 'Q006'),
(325, 'Who was the original owner of the Rinnegan before it was passed down?', 'Hagoromo Ōtsutsuki', 'Hagoromo Ōtsutsuki', 'Nagato', 'Madara Uchiha', 'Indra Ōtsutsuki', 'Q006'),
(326, 'What is the weakness of the Eight Gates technique?', 'The final gate causes death', 'The final gate causes death', 'It cannot be used for long periods', 'It drains chakra rapidly', 'It slows down movements', 'Q006'),
(327, 'How did Itachi manipulate Sasuke’s battle decisions during their final fight?', 'He implanted Amaterasu in Sasuke’s eyes', 'He implanted Amaterasu in Sasuke’s eyes', 'He used Genjutsu repeatedly', 'He fought at half power', 'He drained Sasuke’s chakra', 'Q006'),
(328, 'What was Danzo’s ultimate goal with the Sharingan implants?', 'To control the world in secrecy', 'To control the world in secrecy', 'To protect the Leaf Village', 'To resurrect Madara', 'To become Hokage', 'Q006'),
(329, 'Which of the Akatsuki members was originally from Amegakure?', 'Pain', 'Pain', 'Itachi Uchiha', 'Kisame Hoshigaki', 'Sasori', 'Q006'),
(330, 'What ability does the Byakugan grant its user?', '360-degree vision and chakra detection', '360-degree vision and chakra detection', 'Sharingan’s predictive ability', 'Elemental jutsu absorption', 'Illusion immunity', 'Q006'),
(331, 'What event led to the Uchiha Clan massacre?', 'The fear of a coup against Konoha', 'The fear of a coup against Konoha', 'Madara Uchiha’s return', 'Danzo’s orders to Itachi', 'Obito’s manipulation', 'Q006'),
(332, 'Which Sage Mode does Kabuto Yakushi use?', 'Snake Sage Mode', 'Snake Sage Mode', 'Frog Sage Mode', 'Slug Sage Mode', 'Shikotsumyaku Sage Mode', 'Q006'),
(333, 'What was the real reason behind Jiraiya’s infiltration of Amegakure?', 'To investigate the leader of the Akatsuki', 'To investigate the leader of the Akatsuki', 'To fight Pain', 'To recover intel from the village', 'To find Orochimaru’s hideout', 'Q006'),
(334, 'How did Madara survive his battle against Hashirama?', 'He used Izanagi to alter reality', 'He used Izanagi to alter reality', 'He was resurrected by Orochimaru', 'He absorbed Hashirama’s chakra', 'He had a secret body double', 'Q006'),
(335, 'Who was the true mastermind behind the Fourth Great Ninja War?', 'Black Zetsu', 'Black Zetsu', 'Madara Uchiha', 'Obito Uchiha', 'Kaguya Ōtsutsuki', 'Q006'),
(336, 'What was Minato Namikaze’s title before he became Hokage?', 'Konoha’s Yellow Flash', 'Konoha’s Yellow Flash', 'Leaf’s Fastest Ninja', 'The Silver Fang', 'The Thunder Shadow', 'Q006'),
(337, 'Why did Orochimaru seek immortality?', 'To learn all jutsu in existence', 'To learn all jutsu in existence', 'To take revenge on Konoha', 'To surpass the Uchiha', 'To create the perfect human', 'Q006'),
(338, 'Which of the tailed beasts is known for its intelligence and wisdom?', 'Kurama', 'Kurama', 'Matatabi', 'Chomei', 'Shukaku', 'Q006'),
(339, 'What was the main purpose of the Infinite Tsukuyomi?', 'To trap all living beings in a dream world', 'To trap all living beings in a dream world', 'To enhance Genjutsu users', 'To unify all villages', 'To revive the Uchiha clan', 'Q006'),
(340, 'Who was the first jinchūriki of Kurama?', 'Mito Uzumaki', 'Mito Uzumaki', 'Kushina Uzumaki', 'Naruto Uzumaki', 'Ashina Uzumaki', 'Q006'),
(341, 'What was the name of the sword that Gol D. Roger wielded?', 'Ace', 'Ace', 'Yoru', 'Shusui', 'Murakumogiri', 'Q009'),
(342, 'Which Devil Fruit allows its user to manipulate souls?', 'Soru Soru no Mi', 'Soru Soru no Mi', 'Yami Yami no Mi', 'Ope Ope no Mi', 'Hobi Hobi no Mi', 'Q009'),
(343, 'What was the true purpose of Bartholomew Kuma’s actions?', 'To protect the Straw Hats secretly', 'To protect the Straw Hats secretly', 'To serve the World Government', 'To test Luffy’s strength', 'To aid the Revolutionary Army', 'Q009'),
(344, 'What is the real identity of Joy Boy?', 'A figure from the Void Century', 'A figure from the Void Century', 'The first Pirate King', 'An ancient Celestial Dragon', 'Gol D. Roger’s ancestor', 'Q009'),
(345, 'Which character is known as the “Strongest Swordsman in the World”?', 'Dracule Mihawk', 'Dracule Mihawk', 'Roronoa Zoro', 'Shanks', 'Silvers Rayleigh', 'Q009'),
(346, 'What is the name of Luffy’s ultimate Gear 5 transformation?', 'Nika Mode', 'Nika Mode', 'Sun God Awakening', 'Boundman Evolution', 'King of the Sea', 'Q009'),
(347, 'Who was the first character to correctly identify Luffy’s Devil Fruit as a Mythical Zoan?', 'Who’s-Who', 'Who’s-Who', 'Kaido', 'Shanks', 'Vegapunk', 'Q009'),
(348, 'Which Admiral possesses the Mori Mori no Mi (Forest-forest fruit)?', 'Ryokugyu', 'Ryokugyu', 'Fujitora', 'Akainu', 'Kizaru', 'Q009'),
(349, 'What is the real reason why Doflamingo can use the “Heavenly Yaksha” ability?', 'He awakened his Devil Fruit', 'He awakened his Devil Fruit', 'He is a Celestial Dragon', 'He stole power from an ancient weapon', 'He used Haki to manipulate others', 'Q009'),
(350, 'Which member of the Rocks Pirates betrayed the crew before their downfall?', 'Kaido', 'Kaido', 'Big Mom', 'Whitebeard', 'Shiki', 'Q009'),
(351, 'What was the name of the ship that took Gol D. Roger on his final journey?', 'Oro Jackson', 'Oro Jackson', 'Thousand Sunny', 'Red Force', 'Going Merry', 'Q009'),
(352, 'What is the ancient weapon Poseidon?', 'Shirahoshi', 'Shirahoshi', 'Pluton', 'Uranus', 'A giant robot', 'Q009'),
(353, 'Which member of the Revolutionary Army is known for their espionage?', 'Koala', 'Koala', 'Ivankov', 'Sabo', 'Lindbergh', 'Q009'),
(354, 'Who was responsible for capturing Ace and handing him to the Marines?', 'Blackbeard', 'Blackbeard', 'Akainu', 'Kizaru', 'Garp', 'Q009'),
(355, 'What was the last island that Roger reached before the Grand Line’s final destination?', 'Lodestar Island', 'Lodestar Island', 'Raftel', 'Jaya', 'Elbaf', 'Q009'),
(356, 'Who was the first person to ever defeat Kaido in battle?', 'Oden Kozuki', 'Oden Kozuki', 'Gol D. Roger', 'Monkey D. Garp', 'Whitebeard', 'Q009'),
(357, 'What was the original name of the Revolutionary Army’s leader before becoming Dragon?', 'Monkey D. Dragon', 'Monkey D. Dragon', 'Saint Dragon', 'D. Drake', 'Hades', 'Q009'),
(358, 'Who is the only character known to have completely escaped Impel Down before Luffy’s arrival?', 'Shiki the Golden Lion', 'Shiki the Golden Lion', 'Doflamingo', 'Crocodile', 'Jinbe', 'Q009'),
(359, 'Why did the World Government fear the Straw Hats’ connection to Nika?', 'Because Nika was the enemy of the Celestial Dragons', 'Because Nika was the enemy of the Celestial Dragons', 'Because Luffy was the reincarnation of Joy Boy', 'Because of their alliance with the Revolutionary Army', 'Because they had a connection to Gol D. Roger', 'Q009'),
(360, 'What does Imu hold as the greatest threat to their rule?', 'The Will of D.', 'The Will of D.', 'The Yonko', 'The Ancient Weapons', 'The Revolutionary Army', 'Q009'),
(361, 'What was the original quirk of All For One’s brother?', 'The ability to pass on quirks', 'The ability to pass on quirks', 'Super Strength', 'Regeneration', 'Time Manipulation', 'Q012'),
(362, 'What is the primary weakness of Overhaul’s Quirk?', 'It takes time to activate', 'It takes time to activate', 'It doesn’t work on non-organic material', 'It drains stamina', 'It requires contact', 'Q012'),
(363, 'Which Pro Hero was the first to deduce that Midoriya’s quirk was passed down?', 'Hawks', 'Hawks', 'Aizawa', 'Endeavor', 'Mirko', 'Q012'),
(364, 'What is the name of the underground villain organization led by All For One?', 'The League of Villains', 'The League of Villains', 'Shie Hassaikai', 'Meta Liberation Army', 'The Deadly Sins', 'Q012'),
(365, 'How did All Might’s injury affect his ability to use One For All?', 'It limited his time limit', 'It limited his time limit', 'It weakened his punches', 'It made him lose his quirk', 'It prevented him from transforming', 'Q012'),
(366, 'What is the key requirement for using Eri’s Quirk effectively?', 'Controlling its output', 'Controlling its output', 'Having a strong body', 'Using it with another quirk', 'Receiving an external boost', 'Q012'),
(367, 'Which villain was revealed to be related to the Todoroki family?', 'Dabi', 'Dabi', 'Shigaraki', 'Overhaul', 'Stain', 'Q012'),
(368, 'How did Midoriya unlock the previous holders’ quirks?', 'By mastering One For All’s full power', 'By mastering One For All’s full power', 'Through a secret ritual', 'By defeating All For One', 'By touching his predecessors’ relics', 'Q012'),
(369, 'Which hero was originally suspected of being a traitor within U.A.?', 'Nezu', 'Nezu', 'Aizawa', 'Hawks', 'Midnight', 'Q012'),
(370, 'What was the true goal of the Paranormal Liberation War?', 'To overthrow hero society', 'To overthrow hero society', 'To recruit new villains', 'To eliminate All Might’s legacy', 'To destroy Tartarus Prison', 'Q012'),
(371, 'Which villain’s Quirk allows them to steal and redistribute quirks?', 'All For One', 'All For One', 'Shigaraki', 'Twice', 'Overhaul', 'Q012'),
(372, 'What was Shigaraki’s main goal in inheriting All For One’s power?', 'To destroy hero society', 'To destroy hero society', 'To kill Midoriya', 'To take revenge on his father', 'To become a hero himself', 'Q012'),
(373, 'Who was the first user of One For All?', 'Yoichi Shigaraki', 'Yoichi Shigaraki', 'Toshinori Yagi', 'Gran Torino', 'Nana Shimura', 'Q012'),
(374, 'Which quirk was most effective in countering All For One’s abilities?', 'Erasure', 'Erasure', 'Explosion', 'Dark Shadow', 'Permeation', 'Q012'),
(375, 'What is the true purpose of Tartarus Prison?', 'To hold dangerous villains with unbreakable security', 'To hold dangerous villains with unbreakable security', 'To experiment on quirk mutations', 'To train new heroes', 'To protect One For All users', 'Q012'),
(376, 'Why did the Hero Commission originally train Hawks as a double agent?', 'To infiltrate villain organizations', 'To infiltrate villain organizations', 'To replace All Might', 'To suppress vigilante groups', 'To become a public symbol', 'Q012'),
(377, 'What unique feature does Shigaraki’s Decay Quirk gain after awakening?', 'It spreads without direct touch', 'It spreads without direct touch', 'It consumes energy from the air', 'It paralyzes its victims', 'It creates explosions', 'Q012');

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

DROP TABLE IF EXISTS `quiz`;
CREATE TABLE IF NOT EXISTS `quiz` (
  `QuizID` varchar(4) NOT NULL,
  `Difficulty` enum('Easy','Normal','Hard') DEFAULT NULL,
  `AnimeID` varchar(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`QuizID`),
  KEY `AnimeID` (`AnimeID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`QuizID`, `Difficulty`, `AnimeID`) VALUES
('Q001', 'Easy', 'A001'),
('Q002', 'Normal', 'A001'),
('Q003', 'Hard', 'A001'),
('Q004', 'Easy', 'A002'),
('Q005', 'Normal', 'A002'),
('Q006', 'Hard', 'A002'),
('Q007', 'Easy', 'A003'),
('Q008', 'Normal', 'A003'),
('Q009', 'Hard', 'A003'),
('Q010', 'Easy', 'A004'),
('Q011', 'Normal', 'A004'),
('Q012', 'Hard', 'A004');

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

DROP TABLE IF EXISTS `result`;
CREATE TABLE IF NOT EXISTS `result` (
  `Result_ID` int NOT NULL AUTO_INCREMENT,
  `NoIC` varchar(12) NOT NULL,
  `QuizID` varchar(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Score` int DEFAULT NULL,
  `TimeTaken` time DEFAULT NULL,
  `DateAttempt` date NOT NULL,
  PRIMARY KEY (`Result_ID`),
  KEY `QuizID` (`QuizID`),
  KEY `NoIC` (`NoIC`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`Result_ID`, `NoIC`, `QuizID`, `Score`, `TimeTaken`, `DateAttempt`) VALUES
(9, '870202345678', 'Q001', 3, '00:00:41', '2025-02-21'),
(10, '870202345678', 'Q003', 4, '00:00:20', '2025-02-21'),
(11, '870202345678', 'Q001', 4, '00:01:44', '2025-02-22'),
(12, '011111010111', 'Q011', 4, '00:00:12', '2025-02-22'),
(13, '011111010111', 'Q009', 2, '00:00:08', '2025-02-22'),
(14, '020202020222', 'Q011', 1, '00:00:10', '2025-02-22'),
(15, '011111010111', 'Q005', 8, '00:01:27', '2025-02-23');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `NoIC` varchar(12) NOT NULL,
  `Username` varchar(100) DEFAULT NULL,
  `Password` varchar(6) DEFAULT NULL,
  `NoTelephone` varchar(11) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Avatar` varchar(255) NOT NULL,
  PRIMARY KEY (`NoIC`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`NoIC`, `Username`, `Password`, `NoTelephone`, `Email`, `Avatar`) VALUES
('011111010111', 'john', '234789', '012345678', 'abcd@gmail.com', 'avatar1.png'),
('020202020222', 'Maxx', '$2y$10', '0177277777', 'cac@gmail.my', 'default-avatar.png'),
('870202345678', 'alice_wonderland', 'alice2', '01099887766', 'alice@example.com', 'avatar2.png'),
('880303456789', 'bob_builder', 'bobfix', '01655667788', 'bob.builder@example.com', 'default-avatar.png'),
('900202020202', 'janedoe', 'xyz789', '0134567890', 'janedoe@example.com', 'avatar2.png'),
('930404567890', 'charlie_brown', 'chuck2', '01333222111', 'charlie.b@example.com', 'default-avatar.png');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `anime`
--
ALTER TABLE `anime`
  ADD CONSTRAINT `anime_ibfk_1` FOREIGN KEY (`CategoryID`) REFERENCES `category` (`CategoryID`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_ibfk_1` FOREIGN KEY (`QuizID`) REFERENCES `quiz` (`QuizID`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `quiz`
--
ALTER TABLE `quiz`
  ADD CONSTRAINT `quiz_ibfk_1` FOREIGN KEY (`AnimeID`) REFERENCES `anime` (`AnimeID`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `result`
--
ALTER TABLE `result`
  ADD CONSTRAINT `result_ibfk_2` FOREIGN KEY (`QuizID`) REFERENCES `quiz` (`QuizID`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `result_ibfk_3` FOREIGN KEY (`NoIC`) REFERENCES `users` (`NoIC`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
