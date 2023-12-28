CREATE DATABASE IF NOT EXISTS car_rental_system;
USE car_rental_system;

-- Create the car table
CREATE TABLE car (
    PlateId INT PRIMARY KEY,
    CarName VARCHAR(225) NOT NULL,
    Overview VARCHAR(225),
    PricePerDay INT NOT NULL,
    Year YEAR NOT NULL,
    Image VARCHAR(300),
    DriverAirbag CHAR(1) NOT NULL,
    Status VARCHAR(225),
    Color VARCHAR(225),
    OId INT,
    Seating_capacity INT,
    Air_conditioner char(1)
);

-- Create the offices table
CREATE TABLE offices (
    OId INT PRIMARY KEY,
    Country VARCHAR(50) NOT NULL
);

-- Create the category table
CREATE TABLE category (
   CarName VARCHAR(225) PRIMARY KEY,
   BrandName VARCHAR(225) NOT NULL
);

-- Create the users table
CREATE TABLE users (
   SSN CHAR(11) PRIMARY KEY,
   FirstName VARCHAR(120) NOT NULL,
   LastName VARCHAR(120) NOT NULL,
   Email VARCHAR(100) NOT NULL,
   Password VARCHAR (100),
   Address VARCHAR(255),
   city VARCHAR(100),
   country VARCHAR(100),
   admin TinyINT
);
CREATE TABLE Reservation (
Reservation_number INT PRIMARY KEY AUTO_INCREMENT,
SSN char(11),
PlateId INT,
pickup_date Date,
return_date Date,
Payment_method VARCHAR(255),
Total_price INT,
FOREIGN KEY (SSN) REFERENCES users(SSN),
FOREIGN KEY (PlateId) REFERENCES car(PlateId)
);



-- Insert data into Reservation table
INSERT INTO Reservation (Reservation_number, SSN, PlateId, pickup_date, return_date, Payment_method, Total_price) VALUES
(1, '12345678901', 101, '2023-01-01', '2023-01-05', 'Credit Card', 200),
(2, '98765432101', 102, '2023-02-01', '2023-02-10', 'PayPal', 700);
-- Insert data into offices table
INSERT INTO offices (OId, Country) VALUES
(1, 'USA'),
(2, 'Canada');

-- Insert data into category table
INSERT INTO category (CarName, BrandName) VALUES
('Sedan1', 'Toyota'),
('SUV1', 'Ford');

-- Insert data into car table
INSERT INTO car (PlateId, CarName, Overview, PricePerDay, Year, Image, DriverAirbag, Status, Color, Air_conditioner, Seating_capacity, OId ) VALUES
(101, 'Sedan1', 'Comfortable sedan', 50, 2022, 'sedan_image.jpg', 'Y', 'Available', 'Blue', 'Y', 4, 2),
(102, 'SUV1', 'Spacious SUV', 70, 2021, 'suv_image.jpg', 'Y', 'Reserved', 'Black', 'Y', 8, 1);

-- Insert data into users table
INSERT INTO users (SSN, FirstName, LastName, Email, Password, Address, city, country, admin) VALUES
('12345678901', 'John', 'Doe', 'john@example.com', 'password123', '123 Main St', 'City1', 'USA', 0),
('98765432101', 'Jane', 'Smith', 'jane@example.com', 'securepass', '456 Oak St', 'City2', 'Canada', 1);

-- Insert data into Reservation table

-- Insert more data into offices table
INSERT INTO offices (OId, Country) VALUES
(3, 'Germany'),
(4, 'France');

-- Insert more data into category table
INSERT INTO category (CarName, BrandName) VALUES
('Sedan2', 'Honda'),
('SUV2', 'Chevrolet'),
('Compact1', 'Nissan');

-- Insert more data into car table
INSERT INTO car (PlateId, CarName, Overview, PricePerDay, Year, Image, DriverAirbag, Status, Color, Air_conditioner, Seating_capacity, OId) VALUES
(103, 'Sedan2', 'Fuel-efficient sedan', 60, 2020, 'sedan2_image.jpg', 'Y', 'Available', 'Silver', 'Y', 4, 2),
(104, 'SUV2', 'Family-friendly SUV', 80, 2022, 'suv2_image.jpg', 'Y', 'Reserved', 'Red', 'N', 8, 3),
(105, 'Compact1', 'Compact car for city driving', 45, 2021, 'compact_image.jpg', 'N', 'Available', 'White', 'Y', 4, 4),
(106, 'Sedan1', 'Another Sedan for testing', 55, 2023, 'sedan3_image.jpg', 'Y', 'Available', 'Black', 'Y', 1, 2),
(107, 'SUV1', 'Another SUV for testing', 75, 2020, 'suv3_image.jpg', 'Y', 'Reserved', 'Green', 'N', 4, 3);


-- Insert more data into users table
INSERT INTO users (SSN, FirstName, LastName, Email, Password, Address, city, country, admin) VALUES
('11111111111', 'Alice', 'Johnson', 'alice@example.com', 'pass123', '789 Pine St', 'City3', 'Germany', 0),
('22222222222', 'Bob', 'Williams', 'bob@example.com', 'securepass2', '101 Elm St', 'City4', 'France', 0),
('33333333333', 'Admin', 'Adminson', 'admin@example.com', 'adminpass', '456 Birch St', 'City5', 'USA', 1),
('44444444444', 'Eva', 'Miller', 'eva@example.com', 'evapass', '222 Oak St', 'City6', 'Canada', 0);

-- Insert more data into Reservation table
INSERT INTO Reservation (Reservation_number, SSN, PlateId, pickup_date, return_date, Payment_method, Total_price) VALUES
(3, '11111111111', 103, '2023-03-01', '2023-03-10', 'Debit Card', 500),
(4, '22222222222', 104, '2023-04-01', '2023-04-05', 'Credit Card', 320),
(5, '33333333333', 105, '2023-05-01', '2023-05-07', 'PayPal', 315),
(6, '44444444444', 106, '2023-06-01', '2023-06-15', 'Credit Card', 825),
(7, '12345678901', 107, '2023-07-01', '2023-07-20', 'Debit Card', 900),
(8, '98765432101', 103, '2023-08-01', '2023-08-10', 'PayPal', 400),
(9, '11111111111', 104, '2023-09-01', '2023-09-05', 'Credit Card', 250),
(10, '22222222222', 105, '2023-10-01', '2023-10-15', 'Debit Card', 550),
(11, '33333333333', 106, '2023-11-01', '2023-11-07', 'PayPal', 400),
(12, '44444444444', 107, '2023-12-01', '2023-12-20', 'Credit Card', 700);



-- Insert more data into car table INSERT INTO car (PlateId, CarName, Overview, PricePerDay, Year, Image, DriverAirbag, Status, Color, Air_conditioner, Seating_capacity, OId) VALUES (103, 'Sedan2', 'Fuel-efficient sedan', 60, 2020, 'sedan2_image.jpg', 'Y', 'Available', 'Silver', 'Y', 4, 2), (104, 'SUV2', 'Family-friendly SUV', 80, 2022, 'suv2_image.jpg', 'Y', 'Reserved', 'Red', 'N', 8, 3), (105, 'Compact1', 'Compact car for city driving', 45, 2021, 'compact_image.jpg', 'N', 'Available', 'White', 'Y', 4, 4), (106, 'Sedan1', 'Another Sedan for testing', 55, 2023, 'sedan3_image.jpg', 'Y', 'Available', 'Black', 1 ,2), (107, 'SUV1', 'Another SUV for testing', 75, 2020, 'suv3_image.jpg', 'Y', 'Reserved', 'Green', 'N', 4, 3);