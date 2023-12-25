-- Create the car table
CREATE TABLE car (
    PlateId INT PRIMARY KEY,
    CarName VARCHAR(225) NOT NULL,
    Overview VARCHAR(225),
    PricePerDay INT NOT NULL,
    `Year` YEAR NOT NULL,
    `Image` VARCHAR(300),
    DriverAirbag CHAR(1) NOT NULL,
    `Status` VARCHAR(225);
    Color VARCHAR(225);
);

-- Create the offices table
CREATE TABLE offices (
    `OId` INT PRIMARY KEY,
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
   `Password` VARCHAR (100)
);



-- Insert statements for the car table
INSERT INTO car (PlateId, CarName, Overview, PricePerDay, Year, Image, DriverAirbag, AirConditioner, SeatingCapacity)
VALUES
(1, 'Toyota Camry', 'Sedan', 50, 2022, 'toyota_camry.jpg', 'Y', 'Y', 5),
(2, 'Honda Accord', 'Luxury Sedan', 60, 2022, 'honda_accord.jpg', 'Y', 'Y', 5),
(3, 'Ford Mustang', 'Sports Car', 70, 2022, 'ford_mustang.jpg', 'Y', 'N', 2),
(4, 'Chevrolet Malibu', 'Midsize Sedan', 55, 2022, 'chevrolet_malibu.jpg', 'Y', 'Y', 5),
(5, 'BMW 3 Series', 'Luxury Compact', 65, 2022, 'bmw_3_series.jpg', 'Y', 'Y', 5),
(100, 'Nissan Altima', 'Compact Sedan', 45, 2022, 'nissan_altima.jpg', 'Y', 'N', 4);
-- Insert statements for the car table (continued)
INSERT INTO car (PlateId, CarName, Overview, PricePerDay, Year, Image, DriverAirbag, AirConditioner, SeatingCapacity)
VALUES
(101, 'Hyundai Sonata', 'Family Sedan', 55, 2022, 'hyundai_sonata.jpg', 'Y', 'Y', 5),
(102, 'Mercedes-Benz E-Class', 'Luxury Sedan', 75, 2022, 'mercedes_e_class.jpg', 'Y', 'Y', 5),
(103, 'Audi A4', 'Compact Luxury Sedan', 70, 2022, 'audi_a4.jpg', 'Y', 'Y', 5),
(104, 'Jeep Wrangler', 'Off-Road SUV', 80, 2022, 'jeep_wrangler.jpg', 'Y', 'N', 4),
(105, 'Volkswagen Golf', 'Hatchback', 45, 2022, 'volkswagen_golf.jpg', 'Y', 'N', 5),
(106, 'Subaru Outback', 'Crossover SUV', 65, 2022, 'subaru_outback.jpg', 'Y', 'Y', 5),
(107, 'Chevrolet Tahoe', 'Full-Size SUV', 90, 2022, 'chevrolet_tahoe.jpg', 'Y', 'Y', 8),
(108, 'Mazda CX-5', 'Compact SUV', 60, 2022, 'mazda_cx5.jpg', 'Y', 'Y', 5),
(109, 'Ford Explorer', 'Midsize SUV', 75, 2022, 'ford_explorer.jpg', 'Y', 'Y', 7),
(110, 'Kia Soul', 'Compact Crossover', 50, 2022, 'kia_soul.jpg', 'Y', 'N', 5),
(111, 'Lexus RX', 'Luxury SUV', 85, 2022, 'lexus_rx.jpg', 'Y', 'Y', 5),
(112, 'Tesla Model 3', 'Electric Sedan', 70, 2022, 'tesla_model3.jpg', 'Y', 'Y', 5),
(113, 'Porsche 911', 'Sports Car', 100, 2022, 'porsche_911.jpg', 'Y', 'N', 2),
(114, 'Jaguar F-Type', 'Luxury Sports Car', 110, 2022, 'jaguar_f_type.jpg', 'Y', 'N', 2),
(115, 'Land Rover Range Rover', 'Luxury SUV', 120, 2022, 'land_rover_range_rover.jpg', 'Y', 'Y', 5),
(116, 'Toyota Highlander', 'Midsize SUV', 80, 2022, 'toyota_highlander.jpg', 'Y', 'Y', 7),
(117, 'Nissan Rogue', 'Compact SUV', 55, 2022, 'nissan_rogue.jpg', 'Y', 'Y', 5),
(118, 'Acura MDX', 'Luxury Midsize SUV', 90, 2022, 'acura_mdx.jpg', 'Y', 'Y', 7),
(119, 'Buick Enclave', 'Midsize Crossover', 70, 2022, 'buick_enclave.jpg', 'Y', 'Y', 7),
(120, 'GMC Yukon', 'Full-Size SUV', 95, 2022, 'gmc_yukon.jpg', 'Y', 'Y', 8);
-- Insert statements for the car table (continued)
INSERT INTO car (PlateId, CarName, Overview, PricePerDay, Year, Image, DriverAirbag, AirConditioner, SeatingCapacity)
VALUES
(121, 'Ford Fiesta', 'Compact Car', 40, 2022, 'ford_fiesta.jpg', 'Y', 'N', 5),
(122, 'Chevrolet Camaro', 'Muscle Car', 90, 2022, 'chevrolet_camaro.jpg', 'Y', 'N', 4),
(123, 'Hyundai Tucson', 'Compact SUV', 50, 2022, 'hyundai_tucson.jpg', 'Y', 'Y', 5),
(124, 'Dodge Charger', 'Full-Size Sedan', 80, 2022, 'dodge_charger.jpg', 'Y', 'Y', 5),
(125, 'Subaru Impreza', 'Compact Car', 45, 2022, 'subaru_impreza.jpg', 'Y', 'N', 5),
(126, 'Mitsubishi Outlander', 'Midsize SUV', 60, 2022, 'mitsubishi_outlander.jpg', 'Y', 'Y', 7),
(127, 'Chrysler Pacifica', 'Minivan', 70, 2022, 'chrysler_pacifica.jpg', 'Y', 'Y', 7),
(128, 'Audi Q5', 'Luxury Compact SUV', 75, 2022, 'audi_q5.jpg', 'Y', 'Y', 5),
(129, 'Volvo XC90', 'Luxury SUV', 85, 2022, 'volvo_xc90.jpg', 'Y', 'Y', 7),
(130, 'Kia Telluride', 'Midsize SUV', 80, 2022, 'kia_telluride.jpg', 'Y', 'Y', 7),
(131, 'Infiniti Q50', 'Luxury Sedan', 70, 2022, 'infiniti_q50.jpg', 'Y', 'Y', 5),
(132, 'Honda CR-V', 'Compact SUV', 55, 2022, 'honda_crv.jpg', 'Y', 'Y', 5),
(133, 'Lexus ES', 'Luxury Midsize Sedan', 85, 2022, 'lexus_es.jpg', 'Y', 'Y', 5),
(134, 'Ford Escape', 'Compact SUV', 50, 2022, 'ford_escape.jpg', 'Y', 'Y', 5),
(135, 'Acura RDX', 'Luxury Compact SUV', 65, 2022, 'acura_rdx.jpg', 'Y', 'Y', 5),
(136, 'Mazda3', 'Compact Car', 45, 2022, 'mazda3.jpg', 'Y', 'N', 5),
(137, 'GMC Acadia', 'Midsize SUV', 70, 2022, 'gmc_acadia.jpg', 'Y', 'Y', 7),
(138, 'Toyota RAV4', 'Compact SUV', 55, 2022, 'toyota_rav4.jpg', 'Y', 'Y', 5),
(139, 'Nissan Pathfinder', 'Midsize SUV', 75, 2022, 'nissan_pathfinder.jpg', 'Y', 'Y', 7),
(140, 'Jeep Grand Cherokee', 'Midsize SUV', 80, 2022, 'jeep_grand_cherokee.jpg', 'Y', 'Y', 5);
-- Insert statements for the car table (continued)
INSERT INTO car (PlateId, CarName, Overview, PricePerDay, Year, Image, DriverAirbag, AirConditioner, SeatingCapacity)
VALUES
(141, 'Volkswagen Tiguan', 'Compact SUV', 55, 2022, 'volkswagen_tiguan.jpg', 'Y', 'Y', 5),
(142, 'Chevrolet Equinox', 'Midsize SUV', 65, 2022, 'chevrolet_equinox.jpg', 'Y', 'Y', 5),
(143, 'Ford Edge', 'Midsize SUV', 70, 2022, 'ford_edge.jpg', 'Y', 'Y', 5),
(144, 'BMW X5', 'Luxury SUV', 90, 2022, 'bmw_x5.jpg', 'Y', 'Y', 7),
(145, 'Toyota Prius', 'Hybrid Car', 60, 2022, 'toyota_prius.jpg', 'Y', 'Y', 5),
(146, 'Hyundai Kona', 'Subcompact SUV', 50, 2022, 'hyundai_kona.jpg', 'Y', 'Y', 5),
(147, 'Lexus GX', 'Luxury SUV', 95, 2022, 'lexus_gx.jpg', 'Y', 'Y', 7),
(148, 'Honda Civic', 'Compact Car', 45, 2022, 'honda_civic.jpg', 'Y', 'N', 5),
(149, 'Nissan Murano', 'Midsize SUV', 75, 2022, 'nissan_murano.jpg', 'Y', 'Y', 5),
(150, 'Audi Q7', 'Luxury Midsize SUV', 85, 2022, 'audi_q7.jpg', 'Y', 'Y', 7),
(151, 'Mercedes-Benz GLE', 'Luxury SUV', 95, 2022, 'mercedes_gle.jpg', 'Y', 'Y', 7),
(152, 'Subaru Forester', 'Compact SUV', 55, 2022, 'subaru_forester.jpg', 'Y', 'Y', 5),
(153, 'Chevrolet Traverse', 'Midsize SUV', 70, 2022, 'chevrolet_traverse.jpg', 'Y', 'Y', 7),
(154, 'Volkswagen Passat', 'Midsize Sedan', 60, 2022, 'volkswagen_passat.jpg', 'Y', 'Y', 5),
(155, 'Jeep Compass', 'Compact SUV', 50, 2022, 'jeep_compass.jpg', 'Y', 'Y', 5),
(156, 'Ford Expedition', 'Full-Size SUV', 100, 2022, 'ford_expedition.jpg', 'Y', 'Y', 8),
(157, 'Kia Seltos', 'Subcompact SUV', 45, 2022, 'kia_seltos.jpg', 'Y', 'Y', 5),
(158, 'Toyota Avalon', 'Full-Size Sedan', 80, 2022, 'toyota_avalon.jpg', 'Y', 'Y', 5),
(159, 'Nissan Titan', 'Pickup Truck', 90, 2022, 'nissan_titan.jpg', 'Y', 'N', 5),
(160, 'Tesla Model Y', 'Electric SUV', 75, 2022, 'tesla_model_y.jpg', 'Y', 'Y', 7);


