CREATE TABLE customer (
    customer_id INT PRIMARY KEY AUTO_INCREMENT,
    fname VARCHAR(255),
    lname VARCHAR(255),
    email VARCHAR(255),
    password VARCHAR(255),
    city VARCHAR(255),
    country VARCHAR(255)
);


CREATE TABLE office (
    o_id INT PRIMARY KEY AUTO_INCREMENT,
    city VARCHAR(255),
    country VARCHAR(255)
);


CREATE TABLE car (
    plate_id VARCHAR(255) PRIMARY KEY,
    model VARCHAR(255),
    year INT,
    active bit,
    outofservice bit,
    rented bit,
    o_id INT,
    FOREIGN KEY (o_id) REFERENCES office(o_id)
);


CREATE TABLE reservation (
    reserve_id INT PRIMARY KEY AUTO_INCREMENT,
    payment FLOAT,
    pickupDate DATE,
    returnDate DATE,
    customer_id INT,
    o_id INT,
    plate_id VARCHAR(255),
    FOREIGN KEY (customer_id) REFERENCES customer(customer_id),
    FOREIGN KEY (o_id) REFERENCES office(o_id),
    FOREIGN KEY (plate_id) REFERENCES car(plate_id)
);




INSERT INTO customer (fname, lname, email, password, city, country)
VALUES 
('John', 'Doe', 'john.doe@email.com', 'password123', 'New York', 'USA'),
('Jane', 'Smith', 'jane.smith@email.com', 'securepass', 'London', 'UK'),
('Alice', 'Johnson', 'alice.johnson@email.com', 'mypassword', 'Sydney', 'Australia'),
('mohamed', 'ali', 'mohamed.ali@email.com', 'mohamed123', 'Alexandria', 'Egypt'),
('mahmoud', 'ahmed', 'mahmoud.ahmed@email.com', 'securepassword', 'Cairo', 'Egypt'),
('sameh', 'hussein', 'sameh.hussein@email.com', 'sameh12345', 'Jeddah', 'Saudi Arabia'),
('abo', 'nawaf', 'abo.nawaf@email.com', 'Xlarge123', 'Dubai', 'UAE'),
('jordy', 'elraggal', 'jordy.elraggal@email.com', 'jordy123', 'Madrid', 'Spain'),
('jordy', 'alba', 'jordy.alba@email.com', 'alba123', 'Barcelona', 'Spain'),
('ahmed', 'elraggal', 'ahmed.elraggal@email.com', 'elraggal123', 'Alexandria', 'Egypt'),
('ahmed', 'elsayed', 'ahmed.elsayed@email.com', 'ahmed1234455', 'Cairo', 'Egypt'),
('sarah', 'Johnson', 'sarah.johnson@email.com', 'mypassword11111', 'Manchester', 'UK'),
('abo', 'rabea', 'abo.rabea@email.com', 'hello123', 'New Jersey', 'USA');




INSERT INTO office (city, country)
VALUES 
('New York', 'USA'),
('London', 'UK'),
('Sydney', 'Australia'),
('Tokyo', 'Japan'),
('Paris', 'France'),
('Alexandria', 'Egypt'),
('manchester', 'UK'),
('Cairo', 'Egypt'),
('Jeddah', 'Saudi Arabia'),
('Dubai', 'UAE'),
('Barcelona', 'Spain'),
('Madrid', 'Spain'),
('New Jersey', 'USA');



INSERT INTO car (plate_id, model, year, active, outofservice, rented, o_id)
VALUES 
('ABC123', 'Toyota Camry', 2020, 1, 0, 0, 1),
('XYZ789', 'Honda Accord', 2018, 1, 0, 0, 2),
('DEF456', 'Ford Mustang', 2022, 1, 0, 0, 3),
('GHI789', 'Chevrolet Malibu', 2019, 1, 0, 0, 4),
('ABB285', 'Nissan Versa', 2010, 1, 0, 0, 5),
('XXX190', 'Kia Rio', 2011, 1, 0, 0, 6),
('SSS269', 'Toyota Corolla', 2000, 1, 0, 0, 5),
('SIM096', 'Honda Civic', 2006, 1, 0, 0, 10),
('AAS256', 'Dodge Charger', 2015, 1, 0, 0, 9),
('QSD218', 'Toyota Avalon', 2023, 1, 0, 0, 8),
('QWR206', 'Ford Mustang', 2024, 1, 0, 0, 3),
('WZX547', 'Chevrolet Malibu', 2010, 1, 0, 0, 1);



INSERT INTO reservation (payment, pickupDate, returnDate, customer_id, o_id, plate_id)
VALUES 
(100.0, '2023-01-15', '2023-01-20', 1, 1, 'ABC123'),
(150.0, '2023-02-01', '2023-02-10', 2, 2, 'XYZ789'),
(120.0, '2023-03-10', '2023-03-15', 3, 3, 'DEF456'),
(80.0, '2023-04-05', '2023-04-12', 1, 1, 'GHI789');