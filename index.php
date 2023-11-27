
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

-- Insert values into table
INSERT INTO customer (customernumber, lastname, firstname, areacode, address, country)
VALUES
(100, 'Sham', 'Fang Ying', 418999, 'sdadasfdfd', default),
(200, 'Tan', 'Mei Mei', default, 'adssdsadsd', 'Thailand'),
(300, 'John', 'Albert', default, 'dfdsfsdf', default);

--Display record from table
-- display all records
select * from customer;

--Add new column to table
alter table customer
add phonenumber varchar(20)

--Add values to newly added column/ Update table

-- Update values for specific customer IDs
UPDATE customer SET phonenumber = '1234545346' WHERE customerid = 1;
UPDATE customer SET phonenumber = '45554654' WHERE customerid = 2;


--Delete a column
alter table customer
drop column phonenumber

--Delete table
drop table customer

--Change data type
alter table customer
alter column phonenumber varchar(10)


-- Create table for customers
CREATE TABLE customer (
    CustomerID INT NOT NULL PRIMARY KEY,
    CustomerFirstName VARCHAR(50) NOT NULL,
    CustomerLastName VARCHAR(50) NOT NULL,
    CustomerAddress VARCHAR(50) NOT NULL,
    CustomerSuburb VARCHAR(50),
    CustomerCity VARCHAR(50) NOT NULL,
    CustomerPostCode CHAR(4),
    CustomerPhoneNumber CHAR(12)
);

-- Create table for inventory
CREATE TABLE inventory (
    InventoryID TINYINT NOT NULL PRIMARY KEY,
    InventoryName VARCHAR(50) NOT NULL,
    InventoryDescription VARCHAR(255)
);

-- Create table for employees
CREATE TABLE employee (
    EmployeeID TINYINT NOT NULL PRIMARY KEY,
    EmployeeFirstName VARCHAR(50) NOT NULL,
    EmployeeLastName VARCHAR(50) NOT NULL,
    EmployeeExtension CHAR(4)
);

-- Create table for sales
CREATE TABLE sale (
    SaleID TINYINT NOT NULL PRIMARY KEY,
    CustomerID INT NOT NULL,
    InventoryID TINYINT NOT NULL,
    EmployeeID TINYINT NOT NULL,
    SaleDate DATE NOT NULL,
    SaleQuantity INT NOT NULL,
    SaleUnitPrice DECIMAL(10, 2) NOT NULL,  -- Using DECIMAL for currency values
    FOREIGN KEY (CustomerID) REFERENCES customer(CustomerID),
    FOREIGN KEY (InventoryID) REFERENCES inventory(InventoryID),
    FOREIGN KEY (EmployeeID) REFERENCES employee(EmployeeID)
);

Difference Between INT and TINYINT ?
In MySQL, both INT and TINYINT are numeric data types used to store integer values, but they differ in terms of their storage size and 
the range of values they can represent.

1. INT (Integer):

Storage Size: 4 bytes
Range: -2,147,483,648 to 2,147,483,647 (signed) or 0 to 4,294,967,295 (unsigned)
INT is a standard-size integer that provides a large range of values. It's suitable for most general-purpose integer storage needs.

2. TINYINT:

Storage Size: 1 byte
Range: -128 to 127 (signed) or 0 to 255 (unsigned)
TINYINT is a smaller integer type that occupies less storage space. It's often used when storage efficiency is crucial, especially when 
the range of values is known to be small.


Choosing Between INT and TINYINT:
If your application requires a small range of values (e.g., representing binary flags, status codes), and storage efficiency is a concern, 
you might choose TINYINT.For general-purpose integer storage where a larger range of values is needed, you might choose INT.Keep in mind that 
using a smaller data type like TINYINT can save storage space, but it might have a negligible impact on performance. The choice depends on the 
specific needs and constraints of your application.
Note:
Both INT and TINYINT can be used with or without the UNSIGNED attribute, which determines whether negative values are allowed.If you're dealing with
very large values, you might consider larger integer types like BIGINT.

what is differnce between char and varchar
In SQL, both CHAR and VARCHAR are used to store character string data, but they have some key differences:
Fixed vs. Variable Length:
CHAR: Fixed-length character data type. It always reserves a fixed amount of storage space for the data, padding with spaces 
if the actual data is shorter than the specified length.
VARCHAR: Variable-length character data type. It only stores the actual characters entered and doesn't pad with spaces. It's more storage-efficient 
for variable-length data.
Storage Size:
CHAR: It always occupies the specified length, even if the actual data is shorter. For example, CHAR(10) will always use 10 bytes of storage.
VARCHAR: It only uses the storage space required for the actual data plus one or two bytes for the length of the data. For example, 
if you store "hello" in a VARCHAR(10), it will use 6 bytes (5 for the characters, and 1 for the length).
Performance:
CHAR: Can be more efficient for fixed-length data, especially when the length is consistent, as it avoids the need to store and manage
variable-length information.VARCHAR: More storage-efficient for variable-length data and can save space, especially when dealing with a large amount 
of data with varying lengths.
Trailing Spaces:
CHAR: Pads with spaces to the specified length, which means trailing spaces are always present.
VARCHAR: Does not pad with spaces, and trailing spaces are not stored
In general, use CHAR when the length of the data is fixed, and use VARCHAR when the length is variable. 
The choice between them depends on your specific data requirements and the trade-offs between storage space and performance.


