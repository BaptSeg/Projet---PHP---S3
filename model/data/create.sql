CREATE TABLE Utilisateur (
  id INTEGER PRIMARY KEY ,
  pseudo VARCHAR(255) UNIQUE,
  mdp VARCHAR(255),
  email VARCHAR(255),
  email_verif BOOLEAN,
  date_inscription DATE
);

CREATE TABLE Categorie(
  id INTEGER PRIMARY KEY,
  categorie VARCHAR(255),
);

CREATE TABLE Annonce(
  id INTEGER PRIMARY KEY,
  utilisateur INTEGER,
  intitule VARCHAR(255),
  prix FLOAT,
  description VARCHAR(255),
  date_publication DATE;
  date_suppression DATE;
  ville VARCHAR(255),
  categorie INTEGER,
  FOREIGN KEY(ville) REFERENCES Localisation(ville),
  FOREIGN KEY(categorie) REFERENCES Categorie(id),
  FOREIGN KEY(utilisateur) REFERENCES Utilisateur(id)
);

CREATE TABLE Localisation(
  region VARCHAR(255),
  departement VARCHAR(255),
  ville VARCHAR(255) PRIMARY KEY
);

CREATE TABLE Photos(
  id INTEGER PRIMARY KEY,
  url VARCHAR(255),
  alt  VARCHAR(255)
);
