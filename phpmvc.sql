-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 27 Cze 2020, 12:17
-- Wersja serwera: 10.4.11-MariaDB
-- Wersja PHP: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `phpmvc`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `game`
--

CREATE TABLE `game` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `genre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `platform` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:json)',
  `average_rating` decimal(3,2) DEFAULT NULL,
  `review` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number_of_votes` int(11) NOT NULL,
  `sum_of_votes` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `game`
--

INSERT INTO `game` (`id`, `title`, `genre`, `platform`, `average_rating`, `review`, `number_of_votes`, `sum_of_votes`) VALUES
(35, 'Minecraft', 'Survival', '[\"Windows\",\"Mac\",\"Xbox\",\"Switch\",\"Linux\"]', '4.33', 'Fusce ullamcorper lacus at orci tincidunt, et sodales augue cursus. Vivamus varius quam fermentum auctor bibendum.', 3, 13),
(36, 'World of Warcraft', 'MMORPG', '[\"Windows\",\"Mac\",\"Linux\"]', '4.33', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer mollis sem sed commodo vulputate.', 3, 13),
(37, 'Everquest', 'MMORPG', '[\"Windows\"]', '3.50', 'Dolor sit amet, consectetur adipiscing elit. Integer mollis sem sed commodo vulputate.', 2, 7),
(38, 'Gierka', 'Ekonomiczna', '[\"Windows\",\"Mac\"]', '3.00', 'Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Phasellus sed suscipit magna, tempor eleifend magna. Fusce ac mi in nulla rutrum venenatis a nec orci. Sed odio orci, viverra id malesuada eget, gravida ut sem. Nunc vitae diam at odio pretium pulvinar in et urna.', 1, 3),
(39, 'Need for Speed', 'Wyścigowa', '[\"Windows\",\"Mac\",\"Playstation\",\"Xbox\",\"Switch\",\"Linux\"]', '3.50', 'Fusce ullamcorper lacus at orci tincidunt, et sodales augue cursus. Vivamus varius quam fermentum auctor bibendum. Aliquam pretium, neque vel aliquam vestibulum, libero ex vestibulum urna, id lacinia quam lacus eu purus. Quisque at pulvinar nulla. Ut ornare et odio eu blandit.', 2, 7),
(40, 'Counter Strike 1.6', 'FPS', '[\"Windows\",\"Mac\",\"Linux\"]', '4.00', 'Vivamus varius quam fermentum auctor bibendum.', 2, 8),
(41, 'Dota 2', 'MOBA', '[\"Windows\",\"Mac\",\"Linux\"]', '4.50', 'Quisque velit sapien, ultrices vel orci vel, tincidunt pretium metus.', 2, 9),
(42, 'Fajnagra', 'Platformowka', '[\"Mac\",\"Playstation\",\"Switch\"]', '4.00', 'Nulla sodales facilisis orci, et bibendum mauris convallis ut. Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 1, 4),
(43, 'Wesoła Marchewa', 'Battle Royal', '[\"Windows\",\"Playstation\",\"Xbox\",\"Switch\"]', '4.50', 'Phasellus sed suscipit magna, tempor eleifend magna. Fusce ac mi in nulla rutrum venenatis a nec orci.', 2, 9),
(44, 'Zwariowany Pies', 'TBS', '[\"Windows\",\"Playstation\"]', '5.00', 'Proin ac hendrerit mauris.', 1, 5),
(45, 'Wściekły Samochód', 'Bijatyka', '[\"Windows\",\"Playstation\"]', '3.00', 'Vestibulum eget urna consequat, auctor augue at, euismod ipsum.', 1, 3),
(47, 'Wściekły Pies Marian', 'Roguelike', '[\"Windows\",\"Playstation\"]', '4.50', 'Fusce ullamcorper lacus.', 2, 9);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `author` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `news`
--

INSERT INTO `news` (`id`, `author`, `date`, `content`, `title`) VALUES
(21, 'Krystian', '2020-06-27', 'Donec at lorem ac leo sollicitudin dignissim vitae nec ipsum. Sed bibendum nulla quis ex tincidunt mattis. Nam aliquam ultrices dolor, a rutrum eros auctor et. Nam porttitor sapien tortor, id pulvinar odio tristique sed. Vivamus fringilla ac eros nec tincidunt. In in varius ante. Suspendisse consectetur placerat velit non finibus.', 'Lorem'),
(22, 'PanAdministrator', '2020-06-27', 'Quisque rhoncus, velit sit amet mattis placerat, lorem lectus tempus felis, tincidunt placerat mauris mi malesuada elit. Morbi vestibulum imperdiet nulla a tincidunt. Donec quam ipsum, tincidunt porttitor magna varius, rutrum pretium magna.', 'Lorem ipsum dolor'),
(23, 'admin', '2020-06-27', 'Proin volutpat venenatis nibh, ut hendrerit velit consequat eget. In tempus ligula eu dolor viverra iaculis. Cras at mauris a dui posuere molestie eget eget est. Ut sollicitudin posuere ipsum, eget mattis ante. Phasellus tempor eget est nec tempus. Suspendisse a enim vulputate, congue ligula non, sodales augue. Pellentesque scelerisque, tortor at egestas pretium, dui ex pulvinar felis, et sagittis diam ante non sem.', 'Dolor sit amet'),
(24, 'PanAdministrator', '2020-06-27', 'Quisque dignissim commodo consectetur. Vestibulum tristique, orci porta scelerisque maximus, justo elit commodo mi, ut tempor dui justo ut magna. Sed id lacus mattis, semper mauris id, auctor quam. Sed pretium vitae odio semper efficitur. Sed varius vehicula velit, non semper nibh laoreet ut. Cras dui mi, eleifend sit amet ex eget, varius tempor massa. Cras molestie urna quis dapibus cursus.', 'Lorem'),
(25, 'Krystian', '2020-06-27', 'Donec eget neque ac sem sagittis facilisis. Vivamus vestibulum eros et tortor aliquet tempus. Nullam cursus scelerisque porttitor. Nulla convallis malesuada maximus. Etiam non est metus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Curabitur semper, eros nec tempor dictum, dolor augue feugiat nunc, ac faucibus ex risus at erat. Etiam imperdiet placerat accumsan. Nam ac orci vel odio dapibus mattis. Aenean ultrices enim finibus accumsan volutpat. Vivamus condimentum felis blandit laoreet sodales. Maecenas luctus ligula a lacus vehicula, nec sodales massa interdum. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Praesent diam dui, laoreet sed hendrerit ut, pretium bibendum erat. Proin sollicitudin, felis vel semper pellentesque, augue est suscipit metus, vitae mollis felis magna ac neque.\r\n\r\nDonec at lorem ac leo sollicitudin dignissim vitae nec ipsum. Sed bibendum nulla quis ex tincidunt mattis. Nam aliquam ultrices dolor, a rutrum eros auctor et. Nam porttitor sapien tortor, id pulvinar odio tristique sed. Vivamus fringilla ac eros nec tincidunt. In in varius ante. Suspendisse consectetur placerat velit non finibus. Duis ut congue est, sed vulputate libero. Mauris sit amet nisi pulvinar, sollicitudin justo eu, consectetur sem. Nam vestibulum leo eget velit bibendum, nec consequat purus ultrices. Quisque rhoncus, velit sit amet mattis placerat, lorem lectus tempus felis, tincidunt placerat mauris mi malesuada elit. Morbi vestibulum imperdiet nulla a tincidunt. Donec quam ipsum, tincidunt porttitor magna varius, rutrum pretium magna.', 'Curabitur ultrices mattis tellus, porta tempus mauris cursus rhoncus.'),
(26, 'Krystian', '2020-06-27', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras eros lacus, aliquam eget elementum eget, sodales vitae quam. Nam et quam consequat, volutpat nisi id, pulvinar mi. Nunc tincidunt mi vel luctus vehicula. Nullam pretium sed nisi in vulputate. Aliquam ut commodo justo. Cras tincidunt erat nec urna ultricies molestie. Proin eu mi enim. Morbi aliquet fermentum magna at aliquet. Donec euismod elementum erat id ultricies. Aenean fringilla id tortor id condimentum.\r\n\r\nDonec eget neque ac sem sagittis facilisis. Vivamus vestibulum eros et tortor aliquet tempus. Nullam cursus scelerisque porttitor. Nulla convallis malesuada maximus. Etiam non est metus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Curabitur semper, eros nec tempor dictum, dolor augue feugiat nunc, ac faucibus ex risus at erat. Etiam imperdiet placerat accumsan. Nam ac orci vel odio dapibus mattis. Aenean ultrices enim finibus accumsan volutpat. Vivamus condimentum felis blandit laoreet sodales. Maecenas luctus ligula a lacus vehicula, nec sodales massa interdum. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Praesent diam dui, laoreet sed hendrerit ut, pretium bibendum erat. Proin sollicitudin, felis vel semper pellentesque, augue est suscipit metus, vitae mollis felis magna ac neque.', 'In tempus ligula eu dolor viverra iaculis.'),
(27, 'admin', '2020-06-27', 'Donec eget neque ac sem sagittis facilisis. Vivamus vestibulum eros et tortor aliquet tempus. Nullam cursus scelerisque porttitor. Nulla convallis malesuada maximus. Etiam non est metus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Curabitur semper, eros nec tempor dictum, dolor augue feugiat nunc, ac faucibus ex risus at erat. Etiam imperdiet placerat accumsan. Nam ac orci vel odio dapibus mattis. Aenean ultrices enim finibus accumsan volutpat. Vivamus condimentum felis blandit laoreet sodales. Maecenas luctus ligula a lacus vehicula, nec sodales massa interdum. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Praesent diam dui, laoreet sed hendrerit ut, pretium bibendum erat. Proin sollicitudin, felis vel semper pellentesque, augue est suscipit metus, vitae mollis felis magna ac neque.\r\n\r\nDonec at lorem ac leo sollicitudin dignissim vitae nec ipsum. Sed bibendum nulla quis ex tincidunt mattis. Nam aliquam ultrices dolor, a rutrum eros auctor et. Nam porttitor sapien tortor, id pulvinar odio tristique sed. Vivamus fringilla ac eros nec tincidunt. In in varius ante. Suspendisse consectetur placerat velit non finibus. Duis ut congue est, sed vulputate libero. Mauris sit amet nisi pulvinar, sollicitudin justo eu, consectetur sem. Nam vestibulum leo eget velit bibendum, nec consequat purus ultrices. Quisque rhoncus, velit sit amet mattis placerat, lorem lectus tempus felis, tincidunt placerat mauris mi malesuada elit. Morbi vestibulum imperdiet nulla a tincidunt. Donec quam ipsum, tincidunt porttitor magna varius, rutrum pretium magna.\r\n\r\nProin volutpat venenatis nibh, ut hendrerit velit consequat eget. In tempus ligula eu dolor viverra iaculis. Cras at mauris a dui posuere molestie eget eget est. Ut sollicitudin posuere ipsum, eget mattis ante. Phasellus tempor eget est nec tempus. Suspendisse a enim vulputate, congue ligula non, sodales augue. Pellentesque scelerisque, tortor at egestas pretium, dui ex pulvinar felis, et sagittis diam ante non sem.\r\n\r\nCurabitur ultrices mattis tellus, porta tempus mauris cursus rhoncus. Nulla congue faucibus venenatis. In tempor vulputate nibh nec varius. Pellentesque ultricies dolor ut orci posuere sodales. Nunc in sem cursus, tempus nisl eget, finibus lectus. Pellentesque a nunc mauris. Proin viverra nibh a scelerisque mattis. Nam sodales sem felis, nec vehicula mauris iaculis et. Quisque dignissim commodo consectetur. Vestibulum tristique, orci porta scelerisque maximus, justo elit commodo mi, ut tempor dui justo ut magna. Sed id lacus mattis, semper mauris id, auctor quam. Sed pretium vitae odio semper efficitur. Sed varius vehicula velit, non semper nibh laoreet ut. Cras dui mi, eleifend sit amet ex eget, varius tempor massa. Cras molestie urna quis dapibus cursus.', 'Proin eu mi enim. Morbi aliquet fermentum magna at aliquet.'),
(28, 'Krystian', '2020-06-27', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer mollis sem sed commodo vulputate. Morbi at mattis sem, non euismod libero. Mauris eleifend tincidunt sagittis. Vestibulum eget urna consequat, auctor augue at, euismod ipsum. Proin ac hendrerit mauris. Pellentesque rhoncus ornare dignissim. Mauris nibh orci, placerat nec quam quis, interdum pharetra nunc. Nam lobortis orci quis gravida fringilla. Sed semper tortor a mattis gravida.\r\n\r\nFusce ullamcorper lacus at orci tincidunt, et sodales augue cursus. Vivamus varius quam fermentum auctor bibendum. Aliquam pretium, neque vel aliquam vestibulum, libero ex vestibulum urna, id lacinia quam lacus eu purus. Quisque at pulvinar nulla. Ut ornare et odio eu blandit. Sed tempus egestas dictum. Proin sagittis augue eu est ultricies, efficitur pretium nisl congue.\r\n\r\nClass aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Phasellus sed suscipit magna, tempor eleifend magna. Fusce ac mi in nulla rutrum venenatis a nec orci. Sed odio orci, viverra id malesuada eget, gravida ut sem. Nunc vitae diam at odio pretium pulvinar in et urna. Fusce blandit velit sapien, rhoncus pharetra dui rhoncus in. Suspendisse posuere, nunc nec dapibus vulputate, dui lorem vulputate lacus, at laoreet eros ipsum nec metus. Quisque velit sapien, ultrices vel orci vel, tincidunt pretium metus. Aliquam porttitor arcu a turpis egestas ornare. Phasellus aliquet lacus ac consectetur consequat. Quisque pretium, ligula quis vulputate laoreet, leo ipsum dictum arcu, quis vehicula eros sapien sed risus.\r\n\r\nMaecenas eleifend rutrum nisl, eget facilisis orci sodales eget. Fusce maximus turpis elit, quis ultricies dolor efficitur sed. Nam in maximus mi, fermentum ultricies dui. Aliquam quis porta turpis, pulvinar tempor ex. Nulla sodales facilisis orci, et bibendum mauris convallis ut. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas commodo congue sem sit amet dictum. Sed fringilla est ante, a varius ante rhoncus id. Fusce iaculis orci felis, et tincidunt purus maximus vel.', 'Donec vehicula ipsum eget sem pharetra, a consequat urna semper.'),
(29, 'PanAdministrator', '2020-06-27', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer mollis sem sed commodo vulputate. Morbi at mattis sem, non euismod libero. Mauris eleifend tincidunt sagittis. Vestibulum eget urna consequat, auctor augue at, euismod ipsum. Proin ac hendrerit mauris. Pellentesque rhoncus ornare dignissim. Mauris nibh orci, placerat nec quam quis, interdum pharetra nunc. Nam lobortis orci quis gravida fringilla. Sed semper tortor a mattis gravida.\r\n\r\nFusce ullamcorper lacus at orci tincidunt, et sodales augue cursus. Vivamus varius quam fermentum auctor bibendum. Aliquam pretium, neque vel aliquam vestibulum, libero ex vestibulum urna, id lacinia quam lacus eu purus. Quisque at pulvinar nulla. Ut ornare et odio eu blandit. Sed tempus egestas dictum. Proin sagittis augue eu est ultricies, efficitur pretium nisl congue.\r\n\r\nClass aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Phasellus sed suscipit magna, tempor eleifend magna. Fusce ac mi in nulla rutrum venenatis a nec orci. Sed odio orci, viverra id malesuada eget, gravida ut sem. Nunc vitae diam at odio pretium pulvinar in et urna. Fusce blandit velit sapien, rhoncus pharetra dui rhoncus in. Suspendisse posuere, nunc nec dapibus vulputate, dui lorem vulputate lacus, at laoreet eros ipsum nec metus. Quisque velit sapien, ultrices vel orci vel, tincidunt pretium metus. Aliquam porttitor arcu a turpis egestas ornare. Phasellus aliquet lacus ac consectetur consequat. Quisque pretium, ligula quis vulputate laoreet, leo ipsum dictum arcu, quis vehicula eros sapien sed risus.\r\n\r\nMaecenas eleifend rutrum nisl, eget facilisis orci sodales eget. Fusce maximus turpis elit, quis ultricies dolor efficitur sed. Nam in maximus mi, fermentum ultricies dui. Aliquam quis porta turpis, pulvinar tempor ex. Nulla sodales facilisis orci, et bibendum mauris convallis ut. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas commodo congue sem sit amet dictum. Sed fringilla est ante, a varius ante rhoncus id. Fusce iaculis orci felis, et tincidunt purus maximus vel.', 'Sed odio orci, viverra id malesuada eget, gravida ut sem.'),
(30, 'admin', '2020-06-27', 'Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Phasellus sed suscipit magna, tempor eleifend magna. Fusce ac mi in nulla rutrum venenatis a nec orci. Sed odio orci, viverra id malesuada eget, gravida ut sem. Nunc vitae diam at odio pretium pulvinar in et urna. Fusce blandit velit sapien, rhoncus pharetra dui rhoncus in. Suspendisse posuere, nunc nec dapibus vulputate, dui lorem vulputate lacus, at laoreet eros ipsum nec metus. Quisque velit sapien, ultrices vel orci vel, tincidunt pretium metus. Aliquam porttitor arcu a turpis egestas ornare. Phasellus aliquet lacus ac consectetur consequat. Quisque pretium, ligula quis vulputate laoreet, leo ipsum dictum arcu, quis vehicula eros sapien sed risus.', 'Atak kogutów - nowa gra'),
(31, 'Krystian', '2020-06-27', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer mollis sem sed commodo vulputate. Morbi at mattis sem, non euismod libero. Mauris eleifend tincidunt sagittis. Vestibulum eget urna consequat, auctor augue at, euismod ipsum. Proin ac hendrerit mauris. Pellentesque rhoncus ornare dignissim. Mauris nibh orci, placerat nec quam quis, interdum pharetra nunc. Nam lobortis orci quis gravida fringilla. Sed semper tortor a mattis gravida.\r\n\r\nFusce ullamcorper lacus at orci tincidunt, et sodales augue cursus. Vivamus varius quam fermentum auctor bibendum. Aliquam pretium, neque vel aliquam vestibulum, libero ex vestibulum urna, id lacinia quam lacus eu purus. Quisque at pulvinar nulla. Ut ornare et odio eu blandit. Sed tempus egestas dictum. Proin sagittis augue eu est ultricies, efficitur pretium nisl congue.\r\n\r\nClass aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Phasellus sed suscipit magna, tempor eleifend magna. Fusce ac mi in nulla rutrum venenatis a nec orci. Sed odio orci, viverra id malesuada eget, gravida ut sem. Nunc vitae diam at odio pretium pulvinar in et urna. Fusce blandit velit sapien, rhoncus pharetra dui rhoncus in. Suspendisse posuere, nunc nec dapibus vulputate, dui lorem vulputate lacus, at laoreet eros ipsum nec metus. Quisque velit sapien, ultrices vel orci vel, tincidunt pretium metus. Aliquam porttitor arcu a turpis egestas ornare. Phasellus aliquet lacus ac consectetur consequat. Quisque pretium, ligula quis vulputate laoreet, leo ipsum dictum arcu, quis vehicula eros sapien sed risus.\r\n\r\nMaecenas eleifend rutrum nisl, eget facilisis orci sodales eget. Fusce maximus turpis elit, quis ultricies dolor efficitur sed. Nam in maximus mi, fermentum ultricies dui. Aliquam quis porta turpis, pulvinar tempor ex. Nulla sodales facilisis orci, et bibendum mauris convallis ut. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas commodo congue sem sit amet dictum. Sed fringilla est ante, a varius ante rhoncus id. Fusce iaculis orci felis, et tincidunt purus maximus vel.\r\n\r\nMauris non gravida tellus, sed malesuada ante. Donec volutpat blandit tempor. Cras vestibulum sollicitudin metus et imperdiet. Nunc placerat quam sed nisi hendrerit viverra. Aenean consequat odio pharetra dolor sodales mollis. Donec ultricies viverra ante at vehicula. Maecenas et lacus sit amet ex bibendum suscipit at id nulla. Morbi auctor, leo non porta euismod, nisl sapien tempus lectus, id suscipit neque odio ut ex. Donec ullamcorper et nibh a laoreet. Pellentesque sodales at elit id molestie. Praesent sodales vel enim nec lacinia. Donec vehicula ipsum eget sem pharetra, a consequat urna semper.', 'Rozwścieczone orangutany koontratakują'),
(32, 'Krystian', '2020-06-27', 'Fusce ullamcorper lacus at orci tincidunt, et sodales augue cursus. Vivamus varius quam fermentum auctor bibendum. Aliquam pretium, neque vel aliquam vestibulum, libero ex vestibulum urna, id lacinia quam lacus eu purus. Quisque at pulvinar nulla. Ut ornare et odio eu blandit. Sed tempus egestas dictum. Proin sagittis augue eu est ultricies, efficitur pretium nisl congue.\r\n\r\nClass aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Phasellus sed suscipit magna, tempor eleifend magna. Fusce ac mi in nulla rutrum venenatis a nec orci. Sed odio orci, viverra id malesuada eget, gravida ut sem. Nunc vitae diam at odio pretium pulvinar in et urna. Fusce blandit velit sapien, rhoncus pharetra dui rhoncus in. Suspendisse posuere, nunc nec dapibus vulputate, dui lorem vulputate lacus, at laoreet eros ipsum nec metus. Quisque velit sapien, ultrices vel orci vel, tincidunt pretium metus. Aliquam porttitor arcu a turpis egestas ornare. Phasellus aliquet lacus ac consectetur consequat. Quisque pretium, ligula quis vulputate laoreet, leo ipsum dictum arcu, quis vehicula eros sapien sed risus.\r\n\r\nMaecenas eleifend rutrum nisl, eget facilisis orci sodales eget. Fusce maximus turpis elit, quis ultricies dolor efficitur sed. Nam in maximus mi, fermentum ultricies dui. Aliquam quis porta turpis, pulvinar tempor ex. Nulla sodales facilisis orci, et bibendum mauris convallis ut. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas commodo congue sem sit amet dictum. Sed fringilla est ante, a varius ante rhoncus id. Fusce iaculis orci felis, et tincidunt purus maximus vel.', 'Morbi at mattis sem, non euismod libero.'),
(33, 'Krystian', '2020-06-27', 'Maecenas eleifend rutrum nisl, eget facilisis orci sodales eget. Fusce maximus turpis elit, quis ultricies dolor efficitur sed. Nam in maximus mi, fermentum ultricies dui. Aliquam quis porta turpis, pulvinar tempor ex. Nulla sodales facilisis orci, et bibendum mauris convallis ut. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas commodo congue sem sit amet dictum. Sed fringilla est ante, a varius ante rhoncus id. Fusce iaculis orci felis, et tincidunt purus maximus vel.\r\n\r\nMauris non gravida tellus, sed malesuada ante. Donec volutpat blandit tempor. Cras vestibulum sollicitudin metus et imperdiet. Nunc placerat quam sed nisi hendrerit viverra. Aenean consequat odio pharetra dolor sodales mollis. Donec ultricies viverra ante at vehicula. Maecenas et lacus sit amet ex bibendum suscipit at id nulla. Morbi auctor, leo non porta euismod, nisl sapien tempus lectus, id suscipit neque odio ut ex. Donec ullamcorper et nibh a laoreet. Pellentesque sodales at elit id molestie. Praesent sodales vel enim nec lacinia. Donec vehicula ipsum eget sem pharetra, a consequat urna semper.', 'Lorem ipsum dolor sit amet');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:json)',
  `banned` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `roles`, `banned`) VALUES
(31, 'admin', 'admin@admin', '$argon2id$v=19$m=65536,t=4,p=1$bU5keFVvbnN0NXJnOE9xdg$pKtaRI369W6bDT3yaJWDCvMlzawYYmqKOg9LLJgKSTM', '[\"ROLE_ADMIN\"]', 0),
(47, 'PanAdministrator', 'panadministrator@gry-wideo.pl', '$argon2id$v=19$m=65536,t=4,p=1$Qmh1T2FmTi50ckVpbHlvTQ$py7YPIGTYerIdD3DWGAatHG/KK4uEw/aylMwOtaysyU', '[\"ROLE_ADMIN\"]', 0),
(48, 'Krystian', 'adminkrystian@gry-wideo.pl', '$argon2id$v=19$m=65536,t=4,p=1$WWR0WTNmdDducU1BTzJ5bw$M7+wyEdDeTP8hZHnBVLwrwunZZO4pBE/BtE3NwerYAo', '[\"ROLE_ADMIN\"]', 0),
(49, 'KowalskiJanusz', 'januszek@lubiegry.pl', '$argon2id$v=19$m=65536,t=4,p=1$eG9RWldKTTZqTTdSQUo3Qg$EMhuQVEWLdtpmWoS+3Uu6HHM2V7lae7/VZ2x3HoSJmk', '[]', 0),
(50, 'nowy_uzytkownik', 'nowynowy@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$dXkzdEJtLlM2TkFNMDY1eA$PKShOckafOtFAysE9K5TEbzncumvXTKjMNOLlCgohbI', '[]', 0),
(51, 'oceniaczGier', 'oceniaczgier@live.com', '$argon2id$v=19$m=65536,t=4,p=1$aWw2Y01PNTZtZTlqWS8yVg$pjLX/m/Zlj6BYLjjhzFssldFcLGA+i8bySCZjYQgrog', '[]', 0),
(52, 'wscieklyuzytkownik', 'wkurzylemsie@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$dVNiTkg4RjBiVlpoa3dUYw$Q1IMp8PC2O6PMcFo0p5G4I05d1udx8wMG3XYZks92Ho', '[]', 0),
(53, 'ZAPAŁA', 'rozpalamwkominku@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$Q3gxVHdwbGpwUVByOFJEaQ$8SGgRc1ppffXXd+UO2V1WbGYc4BXUpqeCG9F/NGBCsI', '[]', 1),
(55, 'Franek', 'zwariowanykogut@onet.pl', '$argon2id$v=19$m=65536,t=4,p=1$dUNRQzlRV2x4S1hZYW1VVA$dE9AsoZ9b8zzfPCmQOb1qvf9v6FdeUDWU3Tw5wOskZQ', '[]', 0),
(56, 'HotDog', 'hotdoggers@gumiber.com', '$argon2id$v=19$m=65536,t=4,p=1$UEFLMlRuUTdWemJjT0FoWA$DGotdWZPgCJbHDsPOqu7fBf7EMbnWfJhsMY7JTAA7xE', '[]', 0),
(57, 'przeglądaczNowościOGrach', 'przegladacznowosci@gmail.ru', '$argon2id$v=19$m=65536,t=4,p=1$T0NYZk1Zd0dCeTljYlBidQ$t7wm/Y2kG+W8QpZEU/ML9iGQqLfipn8txGa2KIfR0sQ', '[]', 0),
(58, 'orangutan', 'zwariowanyorangutan@gumiber.ru', '$argon2id$v=19$m=65536,t=4,p=1$ck0wL2ExcXM2YUVnRzAyYg$8xAAZFCL35a4OTkqutzHjT+qeQgj847igfXHqGwOW4M', '[]', 1),
(59, 'HardkorowyOceniaczGier', 'oceniamgrynajlepiej@gmail.pl', '$argon2id$v=19$m=65536,t=4,p=1$YmtpOTJrcXVHUzhJYkhXeQ$PwxoQqqvb/awOeOxsdSNSQRx1mtNmfogi/0p9cmYuTY', '[]', 0),
(60, 'ZWARIOWANY_DODAWACZ_GIER', 'zwariowalemnapunkciedodawaniagier@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$YzRtL1F5N1R2ckNqWWtXTQ$lu18qS0BL1mpfx9G5Ews5qJdPaHXsLlVLCqmETeSkkg', '[]', 1),
(61, 'mądryDruidJordan', 'przeczytammmm@onet.pl', '$argon2id$v=19$m=65536,t=4,p=1$MzEuSkZSMGNBLnNvZG5PdQ$Q68EHG8G7pihJjBT/vSeBNJ+tuy5KhD7Oo8lIv8ytsQ', '[]', 0);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `game`
--
ALTER TABLE `game`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `game`
--
ALTER TABLE `game`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT dla tabeli `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT dla tabeli `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
