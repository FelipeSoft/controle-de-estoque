DROP DATABASE IF EXISTS db_controle_de_estoque;
CREATE DATABASE db_controle_de_estoque;
USE db_controle_de_estoque;

CREATE TABLE `tb_buyers_transactions`(
    `transaction_buyer_id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `product_id` BIGINT UNSIGNED NOT NULL,
    `buyer_id` BIGINT UNSIGNED NOT NULL,
    `quantity` INT NOT NULL,
    `created_at` DATETIME NOT NULL,
    `updated_at` DATETIME NOT NULL
);

CREATE TABLE `tb_inventory`(
    `inventory_id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `product_id` BIGINT UNSIGNED NOT NULL,
    `supplier_id` BIGINT UNSIGNED NOT NULL,
    `current_balance` BIGINT NOT NULL,
    `currency_balance` DOUBLE NOT NULL
);

CREATE TABLE `tb_users`(
    `user_id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(255) NOT NULL,
    `email` VARCHAR(255) NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    `access_level` INT NOT NULL,
    `role` VARCHAR(255) NOT NULL,
    `created_at` DATETIME NOT NULL,
    `updated_at` DATETIME NOT NULL
);

CREATE TABLE `tb_buyers`(
    `buyer_id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(255) NOT NULL,
    `email` VARCHAR(255) NOT NULL,
    `contact_number` VARCHAR(255) NOT NULL,
    `created_at` DATETIME NOT NULL,
    `updated_at` DATETIME NOT NULL
);

CREATE TABLE `tb_suppliers_transactions`(
    `transaction_sup_id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `product_id` BIGINT UNSIGNED NOT NULL,
    `supplier_id` BIGINT UNSIGNED NOT NULL,
    `quantity` INT NOT NULL,
    `created_at` DATETIME NOT NULL,
    `updated_at` DATETIME NOT NULL
);

CREATE TABLE `tb_suppliers`(
    `supplier_id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(255) NOT NULL,
    `email` VARCHAR(255) NOT NULL,
    `contact_number` VARCHAR(255) NOT NULL,
    `created_at` DATETIME NOT NULL,
    `updated_at` DATETIME NOT NULL
);

CREATE TABLE `tb_categories`(
    `category_id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(255) NOT NULL
);

CREATE TABLE `tb_products`(
    `product_id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(255) NOT NULL,
    `unit_price` DOUBLE NOT NULL,
    `cost` DOUBLE NOT NULL,
    `min_stock` INT NOT NULL,
    `category_id` BIGINT UNSIGNED NOT NULL,
    `supplier_id` BIGINT UNSIGNED NOT NULL,
    `created_at` DATETIME NOT NULL,
    `updated_at` DATETIME NOT NULL
);

ALTER TABLE tb_buyers_transactions
ADD FOREIGN KEY (`product_id`) REFERENCES `tb_products`(`product_id`) ON UPDATE CASCADE ON DELETE CASCADE;

ALTER TABLE tb_buyers_transactions
ADD FOREIGN KEY (`buyer_id`) REFERENCES `tb_buyers`(`buyer_id`) ON UPDATE CASCADE ON DELETE CASCADE;

ALTER TABLE tb_inventory
ADD FOREIGN KEY (`product_id`) REFERENCES `tb_products`(`product_id`) ON UPDATE CASCADE ON DELETE CASCADE;

ALTER TABLE tb_inventory
ADD FOREIGN KEY (`supplier_id`) REFERENCES `tb_suppliers`(`supplier_id`) ON UPDATE CASCADE ON DELETE CASCADE;

ALTER TABLE tb_suppliers_transactions
ADD FOREIGN KEY (`product_id`) REFERENCES `tb_products`(`product_id`) ON UPDATE CASCADE ON DELETE CASCADE;

ALTER TABLE tb_suppliers_transactions
ADD FOREIGN KEY (`supplier_id`) REFERENCES `tb_suppliers`(`supplier_id`) ON UPDATE CASCADE ON DELETE CASCADE;

ALTER TABLE tb_products
ADD FOREIGN KEY (`category_id`) REFERENCES `tb_categories`(`category_id`) ON UPDATE CASCADE ON DELETE CASCADE;

ALTER TABLE tb_products
ADD FOREIGN KEY (`supplier_id`) REFERENCES `tb_suppliers`(`supplier_id`) ON UPDATE CASCADE ON DELETE CASCADE;
