#!/bin/bash

sudo mysql -u root -p <<MYSQL_SCRIPT
CREATE DATABASE $1;
CREATE USER '$1'@'localhost' IDENTIFIED BY '$2';
GRANT ALL PRIVILEGES ON $1.* TO '$1'@'localhost';
FLUSH PRIVILEGES;
USE $1;
CREATE TABLE check_ups (
  id int NOT NULL AUTO_INCREMENT,
  name varchar(30) NOT NULL,
  include varchar(255) DEFAULT NULL,
  old_price int DEFAULT NULL,
  price int NOT NULL,
  PRIMARY KEY (id)
);
INSERT INTO check_ups (name, include, old_price, price) VALUES
('для мужчин', 'Гормональный скрининг;Тестостерон;Свободный тестостерон;Глобулин, связывающий половые гормоны', 3500, 2800),
('Жизнь без варикоза', 'Прием флеболога;УЗИ вен нижних конечностей', 4100, 3500),
('позвоночника', 'МРТ трех отделов;прием невролога;прием рефлексотерапевта;прием мануального терапевта', 6300, 5200),
('обследование сердца', 'УЗИ;ЭКГ с расшифровкой;и другие обследования', 3500, 2800);
MYSQL_SCRIPT

echo "MySQL database created."
echo "Database:   $1"
echo "Username:   $1"
echo "Password:   $2"