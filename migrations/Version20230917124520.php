<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230917124520 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE emprunts (id INT AUTO_INCREMENT NOT NULL, personne_id INT DEFAULT NULL, objet_id INT DEFAULT NULL, date_emprunt DATE NOT NULL, date_retour DATE NOT NULL, INDEX IDX_38FC80DA21BD112 (personne_id), INDEX IDX_38FC80DF520CF5A (objet_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE emprunts ADD CONSTRAINT FK_38FC80DA21BD112 FOREIGN KEY (personne_id) REFERENCES personne (id)');
        $this->addSql('ALTER TABLE emprunts ADD CONSTRAINT FK_38FC80DF520CF5A FOREIGN KEY (objet_id) REFERENCES objets (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE emprunts DROP FOREIGN KEY FK_38FC80DA21BD112');
        $this->addSql('ALTER TABLE emprunts DROP FOREIGN KEY FK_38FC80DF520CF5A');
        $this->addSql('DROP TABLE emprunts');
    }
}
