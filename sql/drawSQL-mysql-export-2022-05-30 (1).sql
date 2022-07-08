CREATE TABLE `dbo`.`users`(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `username` VARCHAR(255) NOT NULL,
    `password` VARCHAR(255) NOT NULL
);
CREATE TABLE `dbo`.`boards`(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(255) NOT NULL,
    `dbo_topic_id` INT NOT NULL
);
CREATE TABLE `dbo`.`wiki`(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(255) NOT NULL,
    `verison` INT NOT NULL
);
CREATE TABLE `dbo`.`topics`(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(255) NOT NULL,
    `author_id` INT NOT NULL
);
CREATE TABLE `dbo`.`author_to_user_id`(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `dbo_topics_author_id` INT NOT NULL,
    `dbo_users_id` INT NOT NULL
);
CREATE TABLE `dbo`.`wiki_content_versioning`(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `dbo_wiki_id` INT NOT NULL,
    `dbo_wiki_version` INT NOT NULL,
    `content` BLOB NOT NULL
);
CREATE TABLE `dbo`.`salts`(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `user_id` INT NOT NULL,
    `salt` VARCHAR(255) NOT NULL
);
CREATE TABLE `dbo`.`wiki_author_versioning`(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `dbo_wiki_id` INT NOT NULL,
    `dbo_author_id` INT NOT NULL
);
ALTER TABLE
    `dbo`.`salts` ADD CONSTRAINT `dbo_salts_user_id_foreign` FOREIGN KEY(`user_id`) REFERENCES `dbo`.`users`(`id`);
ALTER TABLE
    `dbo`.`boards` ADD CONSTRAINT `dbo_boards_dbo_topic_id_foreign` FOREIGN KEY(`dbo_topic_id`) REFERENCES `dbo`.`topics`(`id`);
ALTER TABLE
    `dbo`.`author_to_user_id` ADD CONSTRAINT `dbo_author_to_user_id_dbo_users_id_foreign` FOREIGN KEY(`dbo_users_id`) REFERENCES `dbo`.`users`(`id`);
ALTER TABLE
    `dbo`.`wiki_content_versioning` ADD CONSTRAINT `dbo_wiki_content_versioning_dbo_wiki_id_foreign` FOREIGN KEY(`dbo_wiki_id`) REFERENCES `dbo`.`wiki`(`id`);