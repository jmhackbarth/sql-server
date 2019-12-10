CREATE DATABASE Store;
USE Store;

CREATE TABLE Items (id INT NOT NULL AUTO_INCREMENT, name VARCHAR(20) NOT NULL, descr VARCHAR(80) NOT NULL, price FLOAT NOT NULL, PRIMARY KEY (id));


INSERT INTO Items (name, descr, price) VALUES ("Americano", "Mixture of Espresso and Water", "5.59");
INSERT INTO Items (name, descr, price) VALUES ("Espresso", "Pure shot of Espresso", "6.59");
INSERT INTO Items (name, descr, price) VALUES ("Cappuccino", "Espresso With Steamed Milk Foam and Chocolate Powder", "5.59");
INSERT INTO Items (name, descr, price) VALUES ("Latte", "Espresso topped with milk", "5.99");
INSERT INTO Items (name, descr, price) VALUES ("Mocaccino", "Caffe Mocha", "5.99");

CREATE TABLE Users (username VARCHAR(32) NOT NULL, type VARCHAR(8), password VARCHAR(64), PRIMARY KEY (username));

INSERT INTO Users VALUES ("alice", "user", "letmein");
INSERT INTO Users VALUES ("bob", "admin", "password1");
INSERT INTO Users VALUES ("charlie", "user", "dragon");
INSERT INTO Users VALUES ("david", "user", "whyulockme");
INSERT INTO Users VALUES ("eve", "admin", "hackedmywayin");
