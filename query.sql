use osafishingprocr;

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
