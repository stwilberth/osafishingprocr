-- Active: 1731211321941@@162.241.61.213@3306@apren173_osafishingprocr

use apren173_osafishingprocr;

-- add a new column code to the table products
ALTER TABLE products ADD COLUMN code VARCHAR(20);

-- do a column code unique
ALTER TABLE products ADD UNIQUE (code);


-- create a new table categories
CREATE TABLE categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(20) NOT NULL
);

-- add column description to the table categories
ALTER TABLE categories ADD COLUMN description VARCHAR(100);

-- add columns timestamp for created_at and updated_at to the table categories
ALTER TABLE categories ADD COLUMN created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP;
ALTER TABLE categories ADD COLUMN updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP;

-- create a new table products_categories
CREATE TABLE products_categories (
    product_id BIGINT UNSIGNED,
    category_id INT,
    PRIMARY KEY (product_id, category_id),
    FOREIGN KEY (product_id) REFERENCES products(id),
    FOREIGN KEY (category_id) REFERENCES categories(id)
);

-- create a new table contact
CREATE TABLE contacts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    message TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- add a new column status type enum to the table contacts, list of status; 0 = unread, 1 = read, 2 = pending, 3 = resolved
ALTER TABLE contacts
ADD status TINYINT DEFAULT 0;

ALTER TABLE contacts
ADD CONSTRAINT chk_status CHECK (status IN (0, 1, 2, 3));


-- delete column status from the table contactsç
ALTER TABLE contacts DROP COLUMN status;

-- add column updated_at and created_at to the table contacts
ALTER TABLE contacts ADD COLUMN updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP;

    -- 'id',
    -- 'product_id',
    -- 'title',
    -- 'path',
    -- 'url',

-- create a new table products_images
CREATE TABLE product_images (
    id INT AUTO_INCREMENT PRIMARY KEY,
    product_id BIGINT UNSIGNED,
    name VARCHAR(50) NOT NULL,
    path VARCHAR(100) NOT NULL,
    url VARCHAR(100) NOT NULL,
    aspect_ratio VARCHAR(5) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (product_id) REFERENCES products(id)
);

-- add column url not null to the table products
ALTER TABLE products ADD COLUMN slug VARCHAR(100) NOT NULL;

-- make column slug unique
ALTER TABLE products ADD UNIQUE (slug);

use apren173_osafishingprocr;
-- add roles to the table roles
INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (1, 'admin', 'web', '2024-11-06 06:41:07', '2024-11-06 09:01:51');
INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (2, 'customer', 'web', '2024-11-06 08:15:39', '2024-11-06 08:15:39');
INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (3, 'Super Admin', 'web', '2024-11-06 09:02:12', '2024-11-06 09:02:12');
INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (4, 'prueba', 'web', '2024-11-06 09:05:26', '2024-11-06 09:05:26');


-- insert permissions to the table permissions
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (1, 'manage products', 'web', '2024-11-06 06:41:40', '2024-11-06 06:41:40');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (2, 'manage users', 'web', '2024-11-06 06:42:00', '2024-11-06 06:42:00');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (3, 'manage permissions', 'web', '2024-11-06 09:02:28', '2024-11-06 09:02:28');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (4, 'prueba', 'web', '2024-11-06 09:05:18', '2024-11-06 09:05:18');


-- model has roles
INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES (1, 'App\\Models\\User', 1);
INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES (3, 'App\\Models\\User', 1);

-- role has permissions
-- permission_id;role_id
-- 1;1
-- 2;1
-- 1;3
-- 2;3
-- 3;3
-- 3;4
-- 4;4
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (1, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (2, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (1, 3);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (2, 3);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (3, 3);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (3, 4);
