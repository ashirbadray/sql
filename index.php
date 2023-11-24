
/** Create A table */

CREATE TABLE customer (
    customerid INT AUTO_INCREMENT PRIMARY KEY,
    customernumber INT NOT NULL UNIQUE CHECK (customernumber > 0),
    lastname VARCHAR(30) NOT NULL,
    firstname VARCHAR(30) NOT NULL,
    areacode INT DEFAULT 71000,
    address VARCHAR(50),
    country VARCHAR(50) DEFAULT 'Malaysia'
);
