INSERT INTO `authours` (`id`, `name`) VALUES (1, 'Михайлов В.И.');
INSERT INTO `authours` (`id`, `name`) VALUES (2, 'Светлана Баскова');
INSERT INTO `geners` (`id`, `name`) VALUES (1, 'Опера');
INSERT INTO `geners` (`id`, `name`) VALUES (2, 'Арт-Хаус');
INSERT INTO `texts` (`id`, `text`) VALUES (1, 'Привет');
INSERT INTO `texts` (`id`, `text`) VALUES (2, 'Справа');
INSERT INTO `texts` (`id`, `text`) VALUES (3, 'Слева');
INSERT INTO `texts` (`id`, `text`) VALUES (4, '<h1>У вас проблемы с сайтом?</h1><h2>Нужна помощь?</h2><p>Телефон:8(812)703-40-40</p>');
INSERT INTO `theatures` (`id`, `name`) VALUES (1, 'Малый');
INSERT INTO `theatures` (`id`, `name`) VALUES (2, 'Большой');
INSERT INTO `tickets` (`id`, `order_count`, `buy_count`, `theature_id`, `name`, `price`, `img`, `description`, `genre_id`, `author_id`) VALUES (2, 444, 444, 1, 'Вишневый сад', '800', NULL, '', 1, 2);
INSERT INTO `tickets` (`id`, `order_count`, `buy_count`, `theature_id`, `name`, `price`, `img`, `description`, `genre_id`, `author_id`) VALUES (3, 4444, 444, 2, 'Театр Е.Н. ГОГОЛЕВА', '555', NULL, '', 2, 1);
INSERT INTO `tickets` (`id`, `order_count`, `buy_count`, `theature_id`, `name`, `price`, `img`, `description`, `genre_id`, `author_id`) VALUES (4, 1111, 3321, 1, 'Театр Островского', '300', NULL, '', 1, 2);
INSERT INTO `tickets` (`id`, `order_count`, `buy_count`, `theature_id`, `name`, `price`, `img`, `description`, `genre_id`, `author_id`) VALUES (5, 222, 1132, 2, 'Светлый ручей', '500', NULL, '', 2, 1);
