CREATE DATABASE IF NOT EXISTS car_rental_system;
USE car_rental_system;

-- Create the car table
CREATE TABLE car (
    PlateId INT PRIMARY KEY,
    CarName VARCHAR(225) NOT NULL,
    Overview VARCHAR(225),
    PricePerDay INT NOT NULL,
    `Year` YEAR NOT NULL,
    `Image` VARCHAR(300),
    DriverAirbag CHAR(1) NOT NULL,
    `Status` VARCHAR(225),
    Color VARCHAR(225)
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
-- Insert data into the car table
INSERT INTO car (PlateId, CarName, Overview, PricePerDay, `Year`, `Image`, DriverAirbag, `Status`, Color)
VALUES
    (1, 'Toyota Camry', 'Midsize sedan', 50, 2022, 'toyota_camry.jpg', 'Y', 'Available', 'Blue'),
    (2, 'Honda Accord', 'Sedan', 55, 2022, 'honda_accord.jpg', 'Y', 'Rented', 'Red'),
    (3, 'Ford Mustang', 'Sports car', 80, 2022, 'ford_mustang.jpg', 'N', 'Available', 'Yellow'),
    (4, 'Chevrolet Malibu', 'Midsize sedan', 52, 2022, 'chevrolet_malibu.jpg', 'Y', 'Available', 'Silver'),
    (5, 'Nissan Altima', 'Sedan', 48, 2022, 'nissan_altima.jpg', 'N', 'Rented', 'Black'),
    (6, 'BMW 3 Series', 'Luxury sedan', 75, 2022, 'bmw_3_series.jpg', 'Y', 'Available', 'White'),
    (7, 'Tesla Model 3', 'Electric car', 90, 2022, 'tesla_model_3.jpg', 'Y', 'Available', 'Gray'),
    (8, 'Audi A4', 'Luxury sedan', 70, 2022, 'audi_a4.jpg', 'Y', 'Rented', 'Green'),
    (9, 'Jeep Wrangler', 'SUV', 85, 2022, 'jeep_wrangler.jpg', 'N', 'Available', 'Orange'),
    (10, 'Chevrolet Camaro', 'Sports car', 78, 2022, 'chevrolet_camaro.jpg', 'N', 'Available', 'Purple'),
    (11, 'Subaru Outback', 'Crossover', 60, 2022, 'subaru_outback.jpg', 'Y', 'Rented', 'Brown'),
    (12, 'Mercedes-Benz C-Class', 'Luxury sedan', 80, 2022, 'mercedes_c_class.jpg', 'Y', 'Available', 'Gold'),
    (13, 'Kia Sportage', 'Compact SUV', 55, 2022, 'kia_sportage.jpg', 'Y', 'Rented', 'Silver'),
    (14, 'Hyundai Sonata', 'Midsize sedan', 53, 2022, 'hyundai_sonata.jpg', 'N', 'Available', 'Blue'),
    (15, 'Lexus RX', 'Luxury SUV', 95, 2022, 'lexus_rx.jpg', 'Y', 'Available', 'Black'),
    (16, 'Volkswagen Golf', 'Hatchback', 45, 2022, 'volkswagen_golf.jpg', 'N', 'Rented', 'Red'),
    (17, 'Ford Escape', 'Compact SUV', 65, 2022, 'ford_escape.jpg', 'Y', 'Available', 'Yellow'),
    (18, 'Chrysler 300', 'Full-size sedan', 72, 2022, 'chrysler_300.jpg', 'Y', 'Available', 'Silver'),
    (19, 'Mazda CX-5', 'Compact SUV', 58, 2022, 'mazda_cx5.jpg', 'N', 'Rented', 'Black'),
    (20, 'Volvo XC90', 'Luxury SUV', 92, 2022, 'volvo_xc90.jpg', 'Y', 'Available', 'White');
-- Insert additional data into the car table
INSERT INTO car (PlateId, CarName, Overview, PricePerDay, `Year`, `Image`, DriverAirbag, `Status`, Color)
VALUES
    (21, 'Acura MDX', 'Luxury SUV', 88, 2022, 'acura_mdx.jpg', 'Y', 'Available', 'Silver'),
    (22, 'Toyota Prius', 'Hybrid', 60, 2022, 'toyota_prius.jpg', 'Y', 'Rented', 'Blue'),
    (23, 'Ford F-150', 'Pickup truck', 95, 2022, 'ford_f150.jpg', 'N', 'Available', 'Black'),
    (24, 'Chevrolet Traverse', 'Midsize SUV', 75, 2022, 'chevrolet_traverse.jpg', 'Y', 'Available', 'Red'),
    (25, 'Nissan Rogue', 'Compact SUV', 68, 2022, 'nissan_rogue.jpg', 'N', 'Rented', 'White'),
    (26, 'Honda Civic', 'Compact car', 50, 2022, 'honda_civic.jpg', 'Y', 'Available', 'Green'),
    (27, 'GMC Sierra', 'Pickup truck', 98, 2022, 'gmc_sierra.jpg', 'Y', 'Rented', 'Yellow'),
    (28, 'Hyundai Tucson', 'Compact SUV', 55, 2022, 'hyundai_tucson.jpg', 'N', 'Available', 'Orange'),
    (29, 'Mercedes-Benz GLE', 'Luxury SUV', 90, 2022, 'mercedes_gle.jpg', 'Y', 'Available', 'Gray'),
    (30, 'Subaru Impreza', 'Compact car', 48, 2022, 'subaru_impreza.jpg', 'N', 'Rented', 'Brown'),
    (31, 'Audi Q5', 'Luxury SUV', 85, 2022, 'audi_q5.jpg', 'Y', 'Available', 'Gold'),
    (32, 'Kia Sorento', 'Midsize SUV', 72, 2022, 'kia_sorento.jpg', 'Y', 'Available', 'Purple'),
    (33, 'Volkswagen Tiguan', 'Compact SUV', 65, 2022, 'volkswagen_tiguan.jpg', 'N', 'Rented', 'Silver'),
    (34, 'BMW X5', 'Luxury SUV', 95, 2022, 'bmw_x5.jpg', 'Y', 'Available', 'Black'),
    (35, 'Jeep Grand Cherokee', 'Midsize SUV', 80, 2022, 'jeep_grand_cherokee.jpg', 'Y', 'Rented', 'Red'),
    (36, 'Chevrolet Equinox', 'Compact SUV', 58, 2022, 'chevrolet_equinox.jpg', 'N', 'Available', 'Yellow'),
    (37, 'Ford Focus', 'Compact car', 46, 2022, 'ford_focus.jpg', 'Y', 'Available', 'Silver'),
    (38, 'Lexus ES', 'Luxury sedan', 78, 2022, 'lexus_es.jpg', 'Y', 'Rented', 'Blue'),
    (39, 'Toyota Highlander', 'Midsize SUV', 82, 2022, 'toyota_highlander.jpg', 'N', 'Available', 'Green'),
    (40, 'Mazda3', 'Compact car', 52, 2022, 'mazda3.jpg', 'Y', 'Available', 'White');
-- Insert additional data into the car table
INSERT INTO car (PlateId, CarName, Overview, PricePerDay, `Year`, `Image`, DriverAirbag, `Status`, Color)
VALUES
    (41, 'Honda Pilot', 'Midsize SUV', 78, 2022, 'honda_pilot.jpg', 'Y', 'Available', 'Red'),
    (42, 'Ford Explorer', 'Midsize SUV', 80, 2022, 'ford_explorer.jpg', 'Y', 'Rented', 'Blue'),
    (43, 'Chevrolet Silverado', 'Pickup truck', 100, 2022, 'chevrolet_silverado.jpg', 'N', 'Available', 'Black'),
    (44, 'Toyota RAV4', 'Compact SUV', 65, 2022, 'toyota_rav4.jpg', 'Y', 'Available', 'Green'),
    (45, 'Nissan Sentra', 'Compact car', 48, 2022, 'nissan_sentra.jpg', 'N', 'Rented', 'Yellow'),
    (46, 'Jeep Compass', 'Compact SUV', 55, 2022, 'jeep_compass.jpg', 'Y', 'Available', 'Silver'),
    (47, 'Audi A6', 'Luxury sedan', 85, 2022, 'audi_a6.jpg', 'Y', 'Available', 'White'),
    (48, 'Subaru Forester', 'Compact SUV', 60, 2022, 'subaru_forester.jpg', 'N', 'Rented', 'Gray'),
    (49, 'Hyundai Elantra', 'Compact car', 50, 2022, 'hyundai_elantra.jpg', 'Y', 'Available', 'Orange'),
    (50, 'Mercedes-Benz GLC', 'Luxury SUV', 88, 2022, 'mercedes_glc.jpg', 'Y', 'Available', 'Purple'),
    (51, 'Kia Forte', 'Compact car', 46, 2022, 'kia_forte.jpg', 'N', 'Rented', 'Brown'),
    (52, 'Volkswagen Passat', 'Midsize sedan', 62, 2022, 'volkswagen_passat.jpg', 'Y', 'Available', 'Gold'),
    (53, 'Chevrolet Tahoe', 'Full-size SUV', 92, 2022, 'chevrolet_tahoe.jpg', 'Y', 'Available', 'Black'),
    (54, 'BMW 5 Series', 'Luxury sedan', 90, 2022, 'bmw_5_series.jpg', 'Y', 'Rented', 'Red'),
    (55, 'Mazda CX-9', 'Midsize SUV', 75, 2022, 'mazda_cx9.jpg', 'N', 'Available', 'Blue'),
    (56, 'Ford Fusion', 'Midsize sedan', 58, 2022, 'ford_fusion.jpg', 'Y', 'Available', 'Green'),
    (57, 'Lexus GX', 'Luxury SUV', 98, 2022, 'lexus_gx.jpg', 'Y', 'Rented', 'Yellow'),
    (58, 'Toyota Corolla', 'Compact car', 52, 2022, 'toyota_corolla.jpg', 'N', 'Available', 'Silver'),
    (59, 'Acura RDX', 'Compact SUV', 70, 2022, 'acura_rdx.jpg', 'Y', 'Available', 'Red'),
    (60, 'Tesla Model S', 'Electric car', 120, 2022, 'tesla_model_s.jpg', 'Y', 'Available', 'White');
-- Insert additional data into the car table
INSERT INTO car (PlateId, CarName, Overview, PricePerDay, `Year`, `Image`, DriverAirbag, `Status`, Color)
VALUES
    (61, 'Honda Fit', 'Subcompact car', 42, 2022, 'honda_fit.jpg', 'Y', 'Available', 'Blue'),
    (62, 'Ford Edge', 'Midsize SUV', 72, 2022, 'ford_edge.jpg', 'Y', 'Rented', 'Red'),
    (63, 'Chevrolet Camry', 'Midsize sedan', 55, 2022, 'chevrolet_camry.jpg', 'N', 'Available', 'Yellow'),
    (64, 'Toyota Tacoma', 'Pickup truck', 90, 2022, 'toyota_tacoma.jpg', 'Y', 'Available', 'Silver'),
    (65, 'Nissan Maxima', 'Full-size sedan', 68, 2022, 'nissan_maxima.jpg', 'N', 'Rented', 'Black'),
    (66, 'Jeep Renegade', 'Subcompact SUV', 50, 2022, 'jeep_renegade.jpg', 'Y', 'Available', 'Green'),
    (67, 'Audi Q7', 'Luxury SUV', 98, 2022, 'audi_q7.jpg', 'Y', 'Available', 'White'),
    (68, 'Subaru Legacy', 'Midsize sedan', 60, 2022, 'subaru_legacy.jpg', 'Y', 'Rented', 'Gray'),
    (69, 'Hyundai Santa Fe', 'Midsize SUV', 80, 2022, 'hyundai_santa_fe.jpg', 'N', 'Available', 'Orange'),
    (70, 'Mercedes-Benz E-Class', 'Luxury sedan', 85, 2022, 'mercedes_e_class.jpg', 'Y', 'Available', 'Purple'),
    (71, 'Kia Soul', 'Compact car', 48, 2022, 'kia_soul.jpg', 'N', 'Rented', 'Brown'),
    (72, 'Volkswagen Atlas', 'Midsize SUV', 75, 2022, 'volkswagen_atlas.jpg', 'Y', 'Available', 'Gold'),
    (73, 'Chevrolet Volt', 'Hybrid', 65, 2022, 'chevrolet_volt.jpg', 'Y', 'Available', 'Black'),
    (74, 'BMW X3', 'Luxury SUV', 92, 2022, 'bmw_x3.jpg', 'Y', 'Rented', 'Red'),
    (75, 'Mazda6', 'Midsize sedan', 58, 2022, 'mazda6.jpg', 'N', 'Available', 'Yellow'),
    (76, 'Ford Mustang Mach-E', 'Electric SUV', 110, 2022, 'ford_mustang_mach_e.jpg', 'Y', 'Available', 'Silver'),
    (77, 'Lexus IS', 'Compact luxury sedan', 75, 2022, 'lexus_is.jpg', 'Y', 'Rented', 'Blue'),
    (78, 'Toyota 4Runner', 'SUV', 85, 2022, 'toyota_4runner.jpg', 'N', 'Available', 'Green'),
    (79, 'Nissan Versa', 'Subcompact car', 40, 2022, 'nissan_versa.jpg', 'Y', 'Available', 'White'),
    (80, 'Tesla Model X', 'Electric SUV', 115, 2022, 'tesla_model_x.jpg', 'Y', 'Available', 'Black');
-- Insert additional data into the car table
INSERT INTO car (PlateId, CarName, Overview, PricePerDay, `Year`, `Image`, DriverAirbag, `Status`, Color)
VALUES
    (81, 'Honda CR-V', 'Compact SUV', 70, 2022, 'honda_cr_v.jpg', 'Y', 'Available', 'Red'),
    (82, 'Ford Mustang GT', 'Sports car', 95, 2022, 'ford_mustang_gt.jpg', 'Y', 'Rented', 'Blue'),
    (83, 'Chevrolet Malibu Hybrid', 'Hybrid', 62, 2022, 'chevrolet_malibu_hybrid.jpg', 'N', 'Available', 'Yellow'),
    (84, 'Toyota Avalon', 'Full-size sedan', 78, 2022, 'toyota_avalon.jpg', 'Y', 'Available', 'Silver'),
    (85, 'Nissan Pathfinder', 'Midsize SUV', 82, 2022, 'nissan_pathfinder.jpg', 'N', 'Rented', 'Black'),
    (86, 'Jeep Cherokee', 'Compact SUV', 65, 2022, 'jeep_cherokee.jpg', 'Y', 'Available', 'Green'),
    (87, 'Audi A8', 'Luxury sedan', 110, 2022, 'audi_a8.jpg', 'Y', 'Available', 'White'),
    (88, 'Subaru Crosstrek', 'Subcompact SUV', 55, 2022, 'subaru_crosstrek.jpg', 'Y', 'Rented', 'Gray'),
    (89, 'Hyundai Kona', 'Subcompact SUV', 48, 2022, 'hyundai_kona.jpg', 'N', 'Available', 'Orange'),
    (90, 'Mercedes-Benz GLA', 'Subcompact luxury SUV', 85, 2022, 'mercedes_gla.jpg', 'Y', 'Available', 'Purple'),
    (91, 'Kia Telluride', 'Midsize SUV', 92, 2022, 'kia_telluride.jpg', 'Y', 'Available', 'Brown'),
    (92, 'Volkswagen Jetta', 'Compact car', 50, 2022, 'volkswagen_jetta.jpg', 'N', 'Rented', 'Gold'),
    (93, 'Chevrolet Blazer', 'Midsize SUV', 75, 2022, 'chevrolet_blazer.jpg', 'Y', 'Available', 'Black'),
    (94, 'BMW 7 Series', 'Luxury sedan', 120, 2022, 'bmw_7_series.jpg', 'Y', 'Rented', 'Red'),
    (95, 'Mazda CX-30', 'Subcompact SUV', 58, 2022, 'mazda_cx30.jpg', 'N', 'Available', 'Yellow'),
    (96, 'Ford Bronco', 'SUV', 95, 2022, 'ford_bronco.jpg', 'Y', 'Available', 'Silver'),
    (97, 'Lexus NX', 'Compact luxury SUV', 78, 2022, 'lexus_nx.jpg', 'Y', 'Rented', 'Blue'),
    (98, 'Toyota Sienna', 'Minivan', 80, 2022, 'toyota_sienna.jpg', 'N', 'Available', 'Green'),
    (99, 'Nissan Armada', 'Full-size SUV', 98, 2022, 'nissan_armada.jpg', 'Y', 'Available', 'White'),
    (100, 'Tesla Model Y', 'Electric SUV', 105, 2022, 'tesla_model_y.jpg', 'Y', 'Available', 'Black');
