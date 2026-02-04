CREATE DATABASE IF NOT EXISTS appdb;
USE appdb;

CREATE TABLE IF NOT EXISTS produits (
  id INT AUTO_INCREMENT PRIMARY KEY,
  libelle VARCHAR(100) NOT NULL,
  marque VARCHAR(100) NOT NULL,
  prix INT(10) NOT NULL
);

INSERT INTO produits (libelle, marque, prix) VALUES
('Clavier', 'Logitech', 40),
('Souris', 'Razer', 50);