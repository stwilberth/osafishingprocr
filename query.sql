-- Active: 1731212519931@@127.0.0.1@3306@osafishingprocr

use apren173_osafishingprocr;

use osafishingprocr;

-- add a new column code to the table products
ALTER TABLE products ADD COLUMN code VARCHAR(20);

-- do a column code unique
ALTER TABLE products ADD UNIQUE (code);


-- add column category_id to the table products
ALTER TABLE products ADD COLUMN category_id INT;

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

-- change long name to 100 characters
ALTER TABLE categories MODIFY COLUMN name VARCHAR(100);


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


-- create a new table brands
CREATE TABLE brands (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);


-- add column brand_id to the table products
ALTER TABLE products ADD COLUMN brand_id INT;
-- add foreign key brand_id to the table products
ALTER TABLE products ADD FOREIGN KEY (brand_id) REFERENCES brands(id);

-- add brands to the table brands
-- Marine 
-- Yo-Zuri
-- Penn
-- Borboleta
-- AbuGqrcia
-- Nelson Nacamura
-- Rapala
-- Daiwa
-- Shimano
-- Marine Sports

INSERT INTO `brands` (`id`, `name`, `created_at`, `updated_at`) VALUES (1, 'Otras', '2024-11-06 09:06:00', '2024-11-06 09:06:00');
INSERT INTO `brands` (`id`, `name`, `created_at`, `updated_at`) VALUES (2, 'Marine', '2024-11-06 09:06:00', '2024-11-06 09:06:00');
INSERT INTO `brands` (`id`, `name`, `created_at`, `updated_at`) VALUES (3, 'Yo-Zuri', '2024-11-06 09:06:00', '2024-11-06 09:06:00');
INSERT INTO `brands` (`id`, `name`, `created_at`, `updated_at`) VALUES (4, 'Penn', '2024-11-06 09:06:00', '2024-11-06 09:06:00');
INSERT INTO `brands` (`id`, `name`, `created_at`, `updated_at`) VALUES (5, 'Borboleta', '2024-11-06 09:06:00', '2024-11-06 09:06:00');
INSERT INTO `brands` (`id`, `name`, `created_at`, `updated_at`) VALUES (6, 'AbuGqrcia', '2024-11-06 09:06:00', '2024-11-06 09:06:00');
INSERT INTO `brands` (`id`, `name`, `created_at`, `updated_at`) VALUES (7, 'Nelson Nacamura', '2024-11-06 09:06:00', '2024-11-06 09:06:00');
INSERT INTO `brands` (`id`, `name`, `created_at`, `updated_at`) VALUES (8, 'Rapala', '2024-11-06 09:06:00', '2024-11-06 09:06:00');
INSERT INTO `brands` (`id`, `name`, `created_at`, `updated_at`) VALUES (9, 'Daiwa', '2024-11-06 09:06:00', '2024-11-06 09:06:00');
INSERT INTO `brands` (`id`, `name`, `created_at`, `updated_at`) VALUES (10, 'Shimano', '2024-11-06 09:06:00', '2024-11-06 09:06:00');
INSERT INTO `brands` (`id`, `name`, `created_at`, `updated_at`) VALUES (11, 'Marine Sports', '2024-11-06 09:06:00', '2024-11-06 09:06:00');

-- add categories to the table categories
-- Cañas de Sipining 
-- Cañas de Baitcasting 
-- Carretes de Spining 
-- Carretes de Baitcasting 
-- Señuelos
-- Accesorios
-- Ropa
-- Combos
-- Bolsos
-- Lineas
-- Anzuelos
-- Cajas
-- Otros

INSERT INTO `categories` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES (1, 'Cañas de Sipining', 'Cañas de Sipining', '2024-11-06 09:06:00', '2024-11-06 09:06:00');
INSERT INTO `categories` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES (2, 'Cañas de Baitcasting', 'Cañas de Baitcasting', '2024-11-06 09:06:00', '2024-11-06 09:06:00');
INSERT INTO `categories` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES (3, 'Carretes de Spining', 'Carretes de Spining', '2024-11-06 09:06:00', '2024-11-06 09:06:00');
INSERT INTO `categories` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES (4, 'Carretes de Baitcasting', 'Carretes de Baitcasting', '2024-11-06 09:06:00', '2024-11-06 09:06:00');
INSERT INTO `categories` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES (5, 'Señuelos', 'Señuelos', '2024-11-06 09:06:00', '2024-11-06 09:06:00');
INSERT INTO `categories` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES (6, 'Accesorios', 'Accesorios', '2024-11-06 09:06:00', '2024-11-06 09:06:00');
INSERT INTO `categories` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES (7, 'Ropa', 'Ropa', '2024-11-06 09:06:00', '2024-11-06 09:06:00');
INSERT INTO `categories` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES (8, 'Combos', 'Combos', '2024-11-06 09:06:00', '2024-11-06 09:06:00');
INSERT INTO `categories` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES (9, 'Bolsos', 'Bolsos', '2024-11-06 09:06:00', '2024-11-06 09:06:00');
INSERT INTO `categories` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES (10, 'Lineas', 'Lineas', '2024-11-06 09:06:00', '2024-11-06 09:06:00');
INSERT INTO `categories` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES (11, 'Anzuelos', 'Anzuelos', '2024-11-06 09:06:00', '2024-11-06 09:06:00');
INSERT INTO `categories` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES (12, 'Cajas', 'Cajas', '2024-11-06 09:06:00', '2024-11-06 09:06:00');
INSERT INTO `categories` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES (13, 'Otros', 'Otros', '2024-11-06 09:06:00', '2024-11-06 09:06:00');

