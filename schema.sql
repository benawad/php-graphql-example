CREATE TABLE `pets` (
  `id` int(10) UNSIGNED NOT NULL,
  `owner` longtext DEFAULT NULL,
  `isDog` longtext DEFAULT NULL,
  `sound` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO pets SET `owner`='pet_1_owner', `isDog`='yes', `sound`='woof';
INSERT INTO pets SET `owner`='pet_2_owner', `isDog`='yes', `sound`='grrr';
INSERT INTO pets SET `owner`='pet_3_owner', `isDog`='no', `sound`='moo';
INSERT INTO pets SET `owner`='pet_4_owner', `isDog`='no', `sound`='hello world';
