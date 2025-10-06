create table users(
    id int AUTO_INCREMENT primary key,
    nom varchar(50),
    email varchar(200) unique not null,
    mdp varchar(50) not null
)

create table transaction(
    id int AUTO_INCREMENT primary key,
    type varchar(50) not null,
    date_transaction datetime DEFAULT CURRENT_TIMESTAMP,
    montant decimal not null,
    description text,
    id_user int,
    foreign key (id_user) references users(id)
)

-- Insertion des utilisateurs
INSERT INTO users (nom, email, mdp) VALUES
('Lova', 'lova@gmail.com', '12345'),
('Tiana', 'tiana@gmail.com', 'abcde');

-- Insertion des transactions
INSERT INTO transaction (type, montant, description, id_user) VALUES
('crédit', 250000, 'Salaire du mois', 1),
('débit', 50000, 'Achat de provisions', 1),
('débit', 30000, 'Achat de carburant', 1),
('crédit', 150000, 'Vente d’objets personnels', 2),
('débit', 70000, 'Paiement facture électricité', 2);
