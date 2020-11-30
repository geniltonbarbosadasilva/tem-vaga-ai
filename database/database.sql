CREATE TABLE Users(
    id int NOT NULL UNIQUE AUTO_INCREMENT,
    email varchar(100) NOT NULL UNIQUE,
    name varchar(100) NOT NULL,
    password varchar(50) NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE Tokens(
    id int NOT NULL UNIQUE AUTO_INCREMENT,
    id_user int NOT NULL,
    code_hash varchar(100) NOT NULL UNIQUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id),
    FOREIGN KEY (id_user) REFERENCES Users(id)
);

CREATE TABLE Properties(
    id int NOT NULL UNIQUE AUTO_INCREMENT,
    id_owner int NOT NULL,
    title varchar(50) NOT NULL,
    price float NOT NULL,
    description text,
    address varchar(100) NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (id_owner) REFERENCES Users(id)
);

CREATE TABLE Rents(
    id int NOT NULL UNIQUE AUTO_INCREMENT,
    id_user int NOT NULL,
    id_property int NOT NULL,
    check_in date NOT NULL,
    check_out date,
    PRIMARY KEY (id),
    FOREIGN KEY (id_user) REFERENCES Users(id),
    FOREIGN KEY (id_property) REFERENCES Properties(id)
);