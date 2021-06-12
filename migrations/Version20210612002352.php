<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210612002352 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE user_verification');
        $this->addSql('ALTER TABLE client ADD societe VARCHAR(255) DEFAULT NULL, ADD fonction VARCHAR(255) DEFAULT NULL, ADD telprofessionnel VARCHAR(255) DEFAULT NULL, ADD fax VARCHAR(255) DEFAULT NULL, ADD langue VARCHAR(255) NOT NULL, ADD preference VARCHAR(255) NOT NULL, ADD paiement VARCHAR(255) NOT NULL, ADD habitude VARCHAR(255) NOT NULL, ADD classeh VARCHAR(255) NOT NULL, ADD assistance VARCHAR(255) NOT NULL, ADD type VARCHAR(255) NOT NULL, CHANGE id id VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE user ADD societe VARCHAR(255) DEFAULT NULL, ADD fonction VARCHAR(255) DEFAULT NULL, ADD telprofessionnel VARCHAR(255) DEFAULT NULL, ADD fax VARCHAR(255) DEFAULT NULL, ADD langue VARCHAR(255) NOT NULL, ADD preference VARCHAR(255) NOT NULL, ADD paiement VARCHAR(255) NOT NULL, ADD habitude VARCHAR(255) NOT NULL, ADD classeh VARCHAR(255) NOT NULL, ADD assistance VARCHAR(255) NOT NULL, ADD type VARCHAR(255) NOT NULL, ADD vkey VARCHAR(255) NOT NULL, ADD verified INT NOT NULL, CHANGE id id VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE user_verification (id INT AUTO_INCREMENT NOT NULL, user VARCHAR(255) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, token VARCHAR(5) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, dateconfirmation DATE DEFAULT NULL, datecreation DATE NOT NULL, INDEX user (user), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE user_verification ADD CONSTRAINT user_verification_ibfk_1 FOREIGN KEY (user) REFERENCES user (id)');
        $this->addSql('ALTER TABLE client DROP societe, DROP fonction, DROP telprofessionnel, DROP fax, DROP langue, DROP preference, DROP paiement, DROP habitude, DROP classeh, DROP assistance, DROP type, CHANGE id id VARCHAR(255) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`');
        $this->addSql('ALTER TABLE user DROP societe, DROP fonction, DROP telprofessionnel, DROP fax, DROP langue, DROP preference, DROP paiement, DROP habitude, DROP classeh, DROP assistance, DROP type, DROP vkey, DROP verified, CHANGE id id VARCHAR(255) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`');
    }
}
