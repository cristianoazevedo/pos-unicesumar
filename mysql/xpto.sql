use xpto;

DROP TABLE IF EXISTS `task`;

CREATE TABLE IF NOT EXISTS `task` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `description` text NOT NULL,
    `done` boolean default false,
    `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
    `updated_at` DATETIME,
    PRIMARY KEY (`id`)
)  DEFAULT CHARSET=UTF8;

COMMIT;