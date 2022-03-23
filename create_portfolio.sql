-- CREATE DATABASE IF NOT EXISTS `PORTFOLIO` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
-- USE `PORTFOLIO`;

SET FOREIGN_KEY_CHECKS=0;
DROP TABLE IF EXISTS `PF_ROLES`;
DROP TABLE IF EXISTS `PF_MESSAGE_SUBJECTS`;
DROP TABLE IF EXISTS `PF_MESSAGES`;
DROP TABLE IF EXISTS `PF_USERS`;
SET FOREIGN_KEY_CHECKS=1;

CREATE TABLE `PF_ROLES` (
  `id_role` SERIAL,
  `label_role` VARCHAR(50),
  `created_at` DATETIME DEFAULT current_timestamp(),
  `updated_at` DATETIME DEFAULT current_timestamp(),
  PRIMARY KEY (`id_role`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TRIGGER IF EXISTS `set_update_date_ROLES`;

CREATE TABLE `PF_MESSAGE_SUBJECTS` (
  `id_subject` SERIAL,
  `label_subject` VARCHAR(50),
  `created_at` DATETIME DEFAULT current_timestamp(),
  `updated_at` DATETIME DEFAULT current_timestamp(),
  PRIMARY KEY (`id_subject`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TRIGGER IF EXISTS `set_update_date_MESSAGE_SUBJECTS`;

CREATE TABLE `PF_MESSAGES` (
  `id_message` SERIAL,
  `ip_message` VARCHAR(100),
  `firstname_author` VARCHAR(100),
  `lastname_author` VARCHAR(100),
  `email_author` VARCHAR(100),
  `telephone_author` VARCHAR(100),
  `body_message` VARCHAR(500),
  `archive_message` BOOLEAN,
  `id_subject` BIGINT UNSIGNED,
  `created_at` DATETIME DEFAULT current_timestamp(),
  `updated_at` DATETIME DEFAULT current_timestamp(),
  PRIMARY KEY (`id_message`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TRIGGER IF EXISTS `set_update_date_MESSAGES`;

CREATE TABLE `PF_USERS` (
  `id_user` SERIAL,
  `email_user` VARCHAR(50),
  `password_user` VARCHAR(255),
  `firstname_user` VARCHAR(100),
  `lastname_user` VARCHAR(100),
  `id_role` BIGINT UNSIGNED,
  `created_at` DATETIME DEFAULT current_timestamp(),
  `updated_at` DATETIME DEFAULT current_timestamp(),
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TRIGGER IF EXISTS `set_update_date_USERS`;

ALTER TABLE `PF_USERS` ADD FOREIGN KEY (`id_role`) REFERENCES `PF_ROLES` (`id_role`);
ALTER TABLE `PF_MESSAGES` ADD FOREIGN KEY (`id_subject`) REFERENCES `PF_MESSAGE_SUBJECTS` (`id_subject`);

CREATE TRIGGER `set_update_date_ROLES` BEFORE UPDATE ON `PF_ROLES` FOR EACH ROW SET NEW.updated_at=CURRENT_TIMESTAMP();
CREATE TRIGGER `set_update_date_MESSAGE_SUBJECTS` BEFORE UPDATE ON `PF_MESSAGE_SUBJECTS` FOR EACH ROW SET NEW.updated_at=CURRENT_TIMESTAMP();
CREATE TRIGGER `set_update_date_MESSAGES` BEFORE UPDATE ON `PF_MESSAGES` FOR EACH ROW SET NEW.updated_at=CURRENT_TIMESTAMP();
CREATE TRIGGER `set_update_date_USERS` BEFORE UPDATE ON `PF_USERS` FOR EACH ROW SET NEW.updated_at=CURRENT_TIMESTAMP();