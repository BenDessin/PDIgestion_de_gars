<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220521120921 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE avis (id INT AUTO_INCREMENT NOT NULL, voyages_id INT NOT NULL, commentaire VARCHAR(255) NOT NULL, date_commente DATE NOT NULL, INDEX IDX_8F91ABF0A170CAB9 (voyages_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE billets (id INT AUTO_INCREMENT NOT NULL, montant VARCHAR(255) NOT NULL, mode_paiement VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cars (id INT AUTO_INCREMENT NOT NULL, cathegorie_id INT NOT NULL, matricul VARCHAR(255) NOT NULL, nbrplaces INT NOT NULL, numcars INT NOT NULL, INDEX IDX_95C71D1475654620 (cathegorie_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cars_voyages (cars_id INT NOT NULL, voyages_id INT NOT NULL, INDEX IDX_9F8B52378702F506 (cars_id), INDEX IDX_9F8B5237A170CAB9 (voyages_id), PRIMARY KEY(cars_id, voyages_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cathegorie (id INT AUTO_INCREMENT NOT NULL, classe VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE clients (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, telephone VARCHAR(255) NOT NULL, num_cnib VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE clients_cars (clients_id INT NOT NULL, cars_id INT NOT NULL, INDEX IDX_1BE134F5AB014612 (clients_id), INDEX IDX_1BE134F58702F506 (cars_id), PRIMARY KEY(clients_id, cars_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reservation (id INT AUTO_INCREMENT NOT NULL, billets_id INT NOT NULL, nbre_place VARCHAR(255) NOT NULL, date_reservation DATETIME NOT NULL, INDEX IDX_42C84955B9EBD317 (billets_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE voyages (id INT AUTO_INCREMENT NOT NULL, date_depart DATE NOT NULL, destination VARCHAR(255) NOT NULL, heure_depart DATETIME NOT NULL, heure_arriver DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE voyages_clients (voyages_id INT NOT NULL, clients_id INT NOT NULL, INDEX IDX_3107C392A170CAB9 (voyages_id), INDEX IDX_3107C392AB014612 (clients_id), PRIMARY KEY(voyages_id, clients_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE avis ADD CONSTRAINT FK_8F91ABF0A170CAB9 FOREIGN KEY (voyages_id) REFERENCES voyages (id)');
        $this->addSql('ALTER TABLE cars ADD CONSTRAINT FK_95C71D1475654620 FOREIGN KEY (cathegorie_id) REFERENCES cathegorie (id)');
        $this->addSql('ALTER TABLE cars_voyages ADD CONSTRAINT FK_9F8B52378702F506 FOREIGN KEY (cars_id) REFERENCES cars (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE cars_voyages ADD CONSTRAINT FK_9F8B5237A170CAB9 FOREIGN KEY (voyages_id) REFERENCES voyages (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE clients_cars ADD CONSTRAINT FK_1BE134F5AB014612 FOREIGN KEY (clients_id) REFERENCES clients (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE clients_cars ADD CONSTRAINT FK_1BE134F58702F506 FOREIGN KEY (cars_id) REFERENCES cars (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C84955B9EBD317 FOREIGN KEY (billets_id) REFERENCES billets (id)');
        $this->addSql('ALTER TABLE voyages_clients ADD CONSTRAINT FK_3107C392A170CAB9 FOREIGN KEY (voyages_id) REFERENCES voyages (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE voyages_clients ADD CONSTRAINT FK_3107C392AB014612 FOREIGN KEY (clients_id) REFERENCES clients (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C84955B9EBD317');
        $this->addSql('ALTER TABLE cars_voyages DROP FOREIGN KEY FK_9F8B52378702F506');
        $this->addSql('ALTER TABLE clients_cars DROP FOREIGN KEY FK_1BE134F58702F506');
        $this->addSql('ALTER TABLE cars DROP FOREIGN KEY FK_95C71D1475654620');
        $this->addSql('ALTER TABLE clients_cars DROP FOREIGN KEY FK_1BE134F5AB014612');
        $this->addSql('ALTER TABLE voyages_clients DROP FOREIGN KEY FK_3107C392AB014612');
        $this->addSql('ALTER TABLE avis DROP FOREIGN KEY FK_8F91ABF0A170CAB9');
        $this->addSql('ALTER TABLE cars_voyages DROP FOREIGN KEY FK_9F8B5237A170CAB9');
        $this->addSql('ALTER TABLE voyages_clients DROP FOREIGN KEY FK_3107C392A170CAB9');
        $this->addSql('DROP TABLE avis');
        $this->addSql('DROP TABLE billets');
        $this->addSql('DROP TABLE cars');
        $this->addSql('DROP TABLE cars_voyages');
        $this->addSql('DROP TABLE cathegorie');
        $this->addSql('DROP TABLE clients');
        $this->addSql('DROP TABLE clients_cars');
        $this->addSql('DROP TABLE reservation');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE voyages');
        $this->addSql('DROP TABLE voyages_clients');
    }
}
