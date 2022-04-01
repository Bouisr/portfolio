-- CREATE DATABASE IF NOT EXISTS `PORTFOLIO` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
-- USE `PORTFOLIO`;

SET FOREIGN_KEY_CHECKS=0;
DROP TABLE IF EXISTS `PF_ROLES`;
DROP TABLE IF EXISTS `PF_MESSAGE_SUBJECTS`;
DROP TABLE IF EXISTS `PF_SKILLS`;
DROP TABLE IF EXISTS `PF_MESSAGES`;
DROP TABLE IF EXISTS `PF_USERS`;
DROP TABLE IF EXISTS `PF_FILES`;
DROP TABLE IF EXISTS `PF_PROJECTS`;
DROP TABLE IF EXISTS `PF_PRODUCTIONS`;
DROP TABLE IF EXISTS `PF_VALIDATE`;
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

CREATE TABLE `PF_SKILLS` (
  `id_skill` SERIAL,
  `label_skill` VARCHAR(255),
  `created_at` DATETIME DEFAULT current_timestamp(),
  `updated_at` DATETIME DEFAULT current_timestamp(),
  PRIMARY KEY (`id_skill`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TRIGGER IF EXISTS `set_update_date_SKILLS`;

CREATE TABLE `PF_FILES` (
  `id_file` SERIAL,
  `name_file` VARCHAR(50),
  `path_file` VARCHAR(255),
  `created_at` DATETIME DEFAULT current_timestamp(),
  PRIMARY KEY (`id_file`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

CREATE TABLE `PF_PROJECTS` (
  `id_project` SERIAL,
  `label_project` VARCHAR(50),
  `context` VARCHAR(500),
  `id_file_img` BIGINT UNSIGNED,
  `created_at` DATETIME DEFAULT current_timestamp(),
  `updated_at` DATETIME DEFAULT current_timestamp(),
  PRIMARY KEY (`id_project`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TRIGGER IF EXISTS `set_update_date_PROJECTS`;

CREATE TABLE `PF_PRODUCTIONS` (
  `id_production` SERIAL,
  `label_production` VARCHAR(50),
  `content` VARCHAR(500),
  `id_project` BIGINT UNSIGNED,
  `id_file_img` BIGINT UNSIGNED,
  `id_file_pdf` BIGINT UNSIGNED,
  `created_at` DATETIME DEFAULT current_timestamp(),
  `updated_at` DATETIME DEFAULT current_timestamp(),
  PRIMARY KEY (`id_production`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TRIGGER IF EXISTS `set_update_date_PRODUCTIONS`;

CREATE TABLE `PF_VALIDATE` (
  `id_skill` BIGINT UNSIGNED,
  `id_production` BIGINT UNSIGNED,
  `created_at` DATETIME DEFAULT current_timestamp(),
  `updated_at` DATETIME DEFAULT current_timestamp(),
  PRIMARY KEY (`id_skill`, `id_production`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TRIGGER IF EXISTS `set_update_date_VALIDATE`;

ALTER TABLE `PF_USERS` ADD FOREIGN KEY (`id_role`) REFERENCES `PF_ROLES` (`id_role`);
ALTER TABLE `PF_MESSAGES` ADD FOREIGN KEY (`id_subject`) REFERENCES `PF_MESSAGE_SUBJECTS` (`id_subject`);
ALTER TABLE `PF_PROJECTS` ADD FOREIGN KEY (`id_file_img`) REFERENCES `PF_FILES` (`id_file`);
ALTER TABLE `PF_PRODUCTIONS` ADD FOREIGN KEY (`id_project`) REFERENCES `PF_PROJECTS` (`id_project`);
ALTER TABLE `PF_PRODUCTIONS` ADD FOREIGN KEY (`id_file_img`) REFERENCES `PF_FILES` (`id_file`);
ALTER TABLE `PF_PRODUCTIONS` ADD FOREIGN KEY (`id_file_pdf`) REFERENCES `PF_FILES` (`id_file`);
ALTER TABLE `PF_VALIDATE` ADD FOREIGN KEY (`id_skill`) REFERENCES `PF_SKILLS` (`id_skill`);
ALTER TABLE `PF_VALIDATE` ADD FOREIGN KEY (`id_production`) REFERENCES `PF_PRODUCTIONS` (`id_production`);

CREATE TRIGGER `set_update_date_ROLES` BEFORE UPDATE ON `PF_ROLES` FOR EACH ROW SET NEW.updated_at=CURRENT_TIMESTAMP();
CREATE TRIGGER `set_update_date_MESSAGE_SUBJECTS` BEFORE UPDATE ON `PF_MESSAGE_SUBJECTS` FOR EACH ROW SET NEW.updated_at=CURRENT_TIMESTAMP();
CREATE TRIGGER `set_update_date_SKILLS` BEFORE UPDATE ON `PF_SKILLS` FOR EACH ROW SET NEW.updated_at=CURRENT_TIMESTAMP();
CREATE TRIGGER `set_update_date_MESSAGES` BEFORE UPDATE ON `PF_MESSAGES` FOR EACH ROW SET NEW.updated_at=CURRENT_TIMESTAMP();
CREATE TRIGGER `set_update_date_USERS` BEFORE UPDATE ON `PF_USERS` FOR EACH ROW SET NEW.updated_at=CURRENT_TIMESTAMP();
CREATE TRIGGER `set_update_date_PROJECTS` BEFORE UPDATE ON `PF_PROJECTS` FOR EACH ROW SET NEW.updated_at=CURRENT_TIMESTAMP();
CREATE TRIGGER `set_update_date_PRODUCTIONS` BEFORE UPDATE ON `PF_PRODUCTIONS` FOR EACH ROW SET NEW.updated_at=CURRENT_TIMESTAMP();
CREATE TRIGGER `set_update_date_VALIDATE` BEFORE UPDATE ON `PF_VALIDATE` FOR EACH ROW SET NEW.updated_at=CURRENT_TIMESTAMP();