CREATE TABLE Utilisateur (
  id INTEGER PRIMARY KEY ,
  pseudo VARCHAR(255),
  mdp VARCHAR(255),
  email VARCHAR(255),
  email_verif BOOLEAN,
  date_inscription DATE
);
CREATE TABLE Annonce(
  id INTEGER PRIMARY KEY,
  categorie VARCHAR(255),
  intituler VARCHAR(255),
  prix FLOAT,
  description VARCHAR(255),
  Localisation
);
