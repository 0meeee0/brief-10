DROP DATABASE IF EXISTS smart_travel2;
CREATE DATABASE smart_travel2;
use smart_travel2;
CREATE TABLE company (
    company_id INT PRIMARY KEY AUTO_INCREMENT,
    company_name VARCHAR(50) NOT NULL,
    image VARCHAR(200)
);

CREATE TABLE users (
    user_id INT PRIMARY KEY AUTO_INCREMENT,
    user_name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role ENUM ('admin', 'operateur', 'client') DEFAULT 'client',
    is_active BOOLEAN DEFAULT 1,
    date_register DATETIME,
    fk_company_id INT,
    FOREIGN KEY (fk_company_id) REFERENCES company(company_id)
);

DELIMITER //

CREATE TRIGGER before_insert_users
BEFORE INSERT ON users
FOR EACH ROW
BEGIN
    IF NOT (
        (NEW.role = 'admin' AND NEW.is_active IS NULL AND NEW.date_register IS NULL AND NEW.fk_company_id IS NULL) OR
        (NEW.role = 'operateur' AND NEW.is_active IS NOT NULL AND NEW.date_register IS NULL AND NEW.fk_company_id IS NOT NULL) OR
        (NEW.role = 'client' AND NEW.is_active IS NOT NULL AND NEW.date_register IS NOT NULL AND NEW.fk_company_id IS NULL)
    ) THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Invalid data for the specified role.';
    END IF;
END //

DELIMITER ;

CREATE TABLE bus (
    immat VARCHAR(30) PRIMARY KEY,
    numbus INT UNIQUE NOT NULL,
    capacite INT NOT NULL,
    fk_company_id INT NOT NULL,
    FOREIGN KEY (fk_company_id) REFERENCES company(company_id)
);

CREATE TABLE road (
    departure_city INT,
    destination_city INT,
    PRIMARY KEY (departure_city, destination_city),
    distance FLOAT NOT NULL,
    duration TIME NOT NULL
);

CREATE TABLE scheduale(
    scheduale_id INT PRIMARY KEY AUTO_INCREMENT,
    hr_dep TIME NOT NULL,
    hr_arv TIME NOT NULL,
    fk_scheduale_id_dep INT NOT NULL,
    fk_scheduale_id_arv INT NOT NULL,
    FOREIGN KEY (fk_scheduale_id_dep, fk_scheduale_id_arv) REFERENCES road(departure_city, destination_city),
    price FLOAT NOT NULL,
    date DATE NOT NULL
);

CREATE TABLE points (
    points_id INT PRIMARY KEY AUTO_INCREMENT,
    points_nbr INT NOT NULL
);

CREATE TABLE reservation (
    reservation_id INT PRIMARY KEY AUTO_INCREMENT,
    fk_email VARCHAR(255) NOT NULL,
    FOREIGN KEY (fk_email) REFERENCES users(email),
    fk_scheduale_id INT NOT NULL,
    FOREIGN KEY (fk_scheduale_id) REFERENCES scheduale(scheduale_id),
    fk_points_id INT UNIQUE NOT NULL,
    FOREIGN KEY (fk_points_id) REFERENCES points(points_id),
    num_sieg INT NOT NULL,
    date_res DATETIME
);

CREATE TABLE notification (
    notification_id INT PRIMARY KEY AUTO_INCREMENT,
    fk_reservation_id INT NOT NULL,
    FOREIGN KEY (fk_reservation_id) REFERENCES reservation(reservation_id),
    msg VARCHAR(100) NOT NULL
);