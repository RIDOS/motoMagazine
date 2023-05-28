CREATE DATABASE IF NOT EXISTS db_motomagazine;

USE db_motomagazine;

CREATE TABLE stamps (
    id         INT NOT NULL AUTO_INCREMENT,
    name_stamp VARCHAR(40),
    PRIMARY KEY (id)
);

CREATE TABLE category (
    id    INT NOT NULL AUTO_INCREMENT,
    title VARCHAR(120),
    PRIMARY KEY (id)
);

CREATE TABLE products (
    id          INT NOT NULL AUTO_INCREMENT,
    about       VARCHAR(140),
    date_create DATE,
    price       DECIMAL,
    id_model    INT NOT NULL,
    id_category INT NOT NULL,
    PRIMARY KEY (id),
    CONSTRAINT product_and_stamp_fk FOREIGN KEY (id_model) REFERENCES stamps(id),
    CONSTRAINT product_and_categories_fk FOREIGN KEY (id_category) REFERENCES category(id)
);

CREATE TABLE customers (
    id            INT NOT NULL AUTO_INCREMENT,
    name          CHAR(40),
    phone         CHAR(40),
    email         CHAR(40),
    register_date DATETIME,
    PRIMARY KEY (id)
);

CREATE TABLE shop (
    id            INT NOT NULL,
    country       VARCHAR(120),
    region        VARCHAR(120),
    city          VARCHAR(120),
    street        VARCHAR(120),
    postal_code   INT(6),
    name          VARCHAR(210),
    telephone     VARCHAR(120),
    opening_hours VARCHAR(120),
    PRIMARY KEY (id)
);

CREATE TABLE roles (
    id    INT NOT NULL AUTO_INCREMENT,
    title VARCHAR(120),
    PRIMARY KEY (id)
);

CREATE TABLE employers (
    id        INT NOT NULL AUTO_INCREMENT,
    name      VARCHAR(120),
    telephone VARCHAR(120),
    id_role   INT NOT NULL,
    id_shop   INT NOT NULL,
    PRIMARY KEY (id),
    CONSTRAINT employers_and_roles_fk FOREIGN KEY (id_role) REFERENCES roles(id),
    CONSTRAINT employers_and_shop_fk FOREIGN KEY (id_shop) REFERENCES shop(id)
);

CREATE TABLE sales (
    id          INT NOT NULL AUTO_INCREMENT,
    id_product  INT NOT NULL,
    id_customer INT NOT NULL,
    id_employ   INT NOT NULL,
    sale_date   DATE,
    amount      DECIMAL COMMENT 'Сумма продажи',
    PRIMARY KEY (id),
    CONSTRAINT sales_and_product_fk FOREIGN KEY (id_product) REFERENCES products(id),
    CONSTRAINT sales_and_employ_fk FOREIGN KEY (id_employ) REFERENCES employers(id),
    CONSTRAINT sales_and_customer_fk FOREIGN KEY (id_customer) REFERENCES customers(id)
);
