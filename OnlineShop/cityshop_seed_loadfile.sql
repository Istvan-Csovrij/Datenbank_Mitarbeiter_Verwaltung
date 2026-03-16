-- CityShop DataPack (MySQL/MariaDB) – LOAD_FILE Variante
-- Generiert am: 2026-03-03 15:11:05

-- WICHTIG: LOAD_FILE liest Dateien vom MySQL-SERVER-Dateisystem, nicht vom Client.
-- Voraussetzungen:
-- 1) MySQL-User braucht FILE-Rechte (oder entsprechendes Setup).
-- 2) Dateien müssen im erlaubten Verzeichnis liegen (secure_file_priv) und für mysqld lesbar sein.
--    Prüfen: SHOW VARIABLES LIKE 'secure_file_priv';
-- 3) Kopiere den Ordner 'product_images' in dieses Verzeichnis (oder passe @IMG_DIR an).

CREATE DATABASE IF NOT EXISTS cityshop CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE cityshop;

CREATE TABLE IF NOT EXISTS Produkte (
  Artikel_ID INT UNSIGNED NOT NULL AUTO_INCREMENT,
  Preis DECIMAL(10,2) NOT NULL,
  Artikel_Name VARCHAR(255) NOT NULL,
  Hersteller VARCHAR(255) NOT NULL,
  Image MEDIUMBLOB NULL,
  PRIMARY KEY (Artikel_ID)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS Kunden (
  Kunden_ID INT UNSIGNED NOT NULL AUTO_INCREMENT,
  Nachname VARCHAR(150) NOT NULL,
  Vorname VARCHAR(150) NOT NULL,
  Email VARCHAR(255) NOT NULL,
  Password TEXT NOT NULL,
  AGB BIT(1) NOT NULL DEFAULT b'0',
  PRIMARY KEY (Kunden_ID),
  UNIQUE KEY uq_kunden_email (Email)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS Bestellungen (
  ID INT UNSIGNED NOT NULL AUTO_INCREMENT,
  Bestll_ID CHAR(36) NOT NULL,
  Kunde_ID INT UNSIGNED NOT NULL,
  Artikel_ID INT UNSIGNED NOT NULL,
  Menge SMALLINT UNSIGNED NOT NULL,
  PRIMARY KEY (ID),
  KEY idx_best_kunde (Kunde_ID),
  KEY idx_best_artikel (Artikel_ID),
  CONSTRAINT fk_best_kunde FOREIGN KEY (Kunde_ID) REFERENCES Kunden(Kunden_ID)
    ON UPDATE CASCADE ON DELETE RESTRICT,
  CONSTRAINT fk_best_artikel FOREIGN KEY (Artikel_ID) REFERENCES Produkte(Artikel_ID)
    ON UPDATE CASCADE ON DELETE RESTRICT
) ENGINE=InnoDB;

-- Konfig: Pfad zum Ordner product_images auf dem MySQL-Server (mit trailing slash)
-- Beispiel (Linux): SET @IMG_DIR = '/var/lib/mysql-files/product_images/';
-- Beispiel (Windows): SET @IMG_DIR = 'C:/ProgramData/MySQL/MySQL Server 8.0/Uploads/product_images/';
SET @IMG_DIR = 'C:/Users/Student/OneDrive - GFN GmbH (EDU)/Dokumente/Lernfeld-10/Tag-13/product_images/product_images/';

START TRANSACTION;
DELETE FROM Bestellungen;
DELETE FROM Kunden;
DELETE FROM Produkte;

INSERT INTO Produkte (Preis, Artikel_Name, Hersteller, Image) VALUES (29.99, 'CityShop Wireless Earbuds', 'Auraline', LOAD_FILE(CONCAT(@IMG_DIR, 'product_01.png')));
INSERT INTO Produkte (Preis, Artikel_Name, Hersteller, Image) VALUES (59.90, 'CityShop Over-Ear Kopfhörer', 'Auraline', LOAD_FILE(CONCAT(@IMG_DIR, 'product_02.png')));
INSERT INTO Produkte (Preis, Artikel_Name, Hersteller, Image) VALUES (24.50, 'CityShop Bluetooth Lautsprecher Mini', 'SoundNest', LOAD_FILE(CONCAT(@IMG_DIR, 'product_03.png')));
INSERT INTO Produkte (Preis, Artikel_Name, Hersteller, Image) VALUES (12.99, 'CityShop Smartphone Hülle Clear', 'CaseCraft', LOAD_FILE(CONCAT(@IMG_DIR, 'product_04.png')));
INSERT INTO Produkte (Preis, Artikel_Name, Hersteller, Image) VALUES (9.49, 'CityShop Panzerglas 2er Pack', 'ShieldPro', LOAD_FILE(CONCAT(@IMG_DIR, 'product_05.png')));
INSERT INTO Produkte (Preis, Artikel_Name, Hersteller, Image) VALUES (18.90, 'CityShop USB-C Schnellladegerät 30W', 'Voltix', LOAD_FILE(CONCAT(@IMG_DIR, 'product_06.png')));
INSERT INTO Produkte (Preis, Artikel_Name, Hersteller, Image) VALUES (22.95, 'CityShop Powerbank 10000mAh', 'Voltix', LOAD_FILE(CONCAT(@IMG_DIR, 'product_07.png')));
INSERT INTO Produkte (Preis, Artikel_Name, Hersteller, Image) VALUES (19.99, 'CityShop Laptop Sleeve 13 Zoll', 'NordTek', LOAD_FILE(CONCAT(@IMG_DIR, 'product_08.png')));
INSERT INTO Produkte (Preis, Artikel_Name, Hersteller, Image) VALUES (14.99, 'CityShop Wireless Maus', 'NordTek', LOAD_FILE(CONCAT(@IMG_DIR, 'product_09.png')));
INSERT INTO Produkte (Preis, Artikel_Name, Hersteller, Image) VALUES (27.90, 'CityShop Tastatur kompakt', 'KeyFlow', LOAD_FILE(CONCAT(@IMG_DIR, 'product_10.png')));
INSERT INTO Produkte (Preis, Artikel_Name, Hersteller, Image) VALUES (16.49, 'CityShop Edelstahl Trinkflasche 750ml', 'HydraPeak', LOAD_FILE(CONCAT(@IMG_DIR, 'product_11.png')));
INSERT INTO Produkte (Preis, Artikel_Name, Hersteller, Image) VALUES (11.90, 'CityShop Sporthandtuch Microfaser', 'HydraPeak', LOAD_FILE(CONCAT(@IMG_DIR, 'product_12.png')));
INSERT INTO Produkte (Preis, Artikel_Name, Hersteller, Image) VALUES (34.90, 'CityShop LED Schreibtischlampe', 'LumaHome', LOAD_FILE(CONCAT(@IMG_DIR, 'product_13.png')));
INSERT INTO Produkte (Preis, Artikel_Name, Hersteller, Image) VALUES (13.50, 'CityShop Smart Steckdose 1er', 'LumaHome', LOAD_FILE(CONCAT(@IMG_DIR, 'product_14.png')));
INSERT INTO Produkte (Preis, Artikel_Name, Hersteller, Image) VALUES (8.99, 'CityShop Duftkerze Baumwolle', 'CozyNest', LOAD_FILE(CONCAT(@IMG_DIR, 'product_15.png')));
INSERT INTO Produkte (Preis, Artikel_Name, Hersteller, Image) VALUES (14.50, 'CityShop Thermobecher 350ml', 'UrbanBrew', LOAD_FILE(CONCAT(@IMG_DIR, 'product_16.png')));
INSERT INTO Produkte (Preis, Artikel_Name, Hersteller, Image) VALUES (39.90, 'CityShop Wasserkocher 1.7L', 'UrbanBrew', LOAD_FILE(CONCAT(@IMG_DIR, 'product_17.png')));
INSERT INTO Produkte (Preis, Artikel_Name, Hersteller, Image) VALUES (79.00, 'CityShop Smartwatch Sport', 'PulseWear', LOAD_FILE(CONCAT(@IMG_DIR, 'product_18.png')));
INSERT INTO Produkte (Preis, Artikel_Name, Hersteller, Image) VALUES (29.90, 'CityShop Fitness Band', 'PulseWear', LOAD_FILE(CONCAT(@IMG_DIR, 'product_19.png')));
INSERT INTO Produkte (Preis, Artikel_Name, Hersteller, Image) VALUES (44.95, 'CityShop Rucksack 20L', 'MetroPack', LOAD_FILE(CONCAT(@IMG_DIR, 'product_20.png')));

-- Optional: Demo-Kunden (Passwort: nur Demo -> in echt HASH nutzen)
INSERT INTO Kunden (Nachname, Vorname, Email, Password, AGB) VALUES
  ('Muster', 'Max', 'max.muster@cityshop.test', 'demo1234', b'1'),
  ('Beispiel', 'Erika', 'erika.beispiel@cityshop.test', 'demo1234', b'1');

-- Optional: Demo-Bestellungen (UUID via MySQL-Funktion UUID())
INSERT INTO Bestellungen (Bestll_ID, Kunde_ID, Artikel_ID, Menge) VALUES
  (UUID(), 1, 1, 1),
  (UUID(), 1, 4, 2),
  (UUID(), 2, 11, 1);
COMMIT;

-- Hinweis: Wenn Image NULL bleibt, ist LOAD_FILE fehlgeschlagen (Pfad/Rechte/secure_file_priv).