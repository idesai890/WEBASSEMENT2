CREATE TABLE pets (
    petid INT(11) AUTO_INCREMENT PRIMARY KEY,
    petname VARCHAR(255) NOT NULL,
    type VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    age DECIMAL(4,1) NOT NULL,
    image VARCHAR(255) NOT NULL,
    caption VARCHAR(255) NOT NULL,
    location VARCHAR(255) NOT NULL
INSERT INTO pets (petname, type, description, age, image, caption, location)
VALUES ('Milo', 'Cat', 'Friendly cat', 12.5, 'cat1.jpeg', 'Milo the Cat', 'Melbourne');

);
