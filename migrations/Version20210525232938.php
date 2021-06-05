<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210525232938 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE admin (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_880E0D76F85E0677 (username), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE billet CHANGE client client VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE client CHANGE id id VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE mouvement CHANGE client client VARCHAR(255) DEFAULT NULL, CHANGE milesstatut milesstatut INT NOT NULL, CHANGE soldecummule soldecummule INT NOT NULL, CHANGE seuil seuil INT NOT NULL');
        $this->addSql('ALTER TABLE reclamation CHANGE client client VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE transaction CHANGE client client VARCHAR(255) DEFAULT NULL, CHANGE credit credit INT NOT NULL, CHANGE debit debit INT NOT NULL');
        $this->addSql('ALTER TABLE user CHANGE id id VARCHAR(255) NOT NULL, CHANGE verified verified INT NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE admin');
        $this->addSql('ALTER TABLE billet CHANGE client client VARCHAR(255) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`');
        $this->addSql('ALTER TABLE client CHANGE id id VARCHAR(255) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`');
        $this->addSql('ALTER TABLE mouvement CHANGE client client VARCHAR(255) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, CHANGE milesstatut milesstatut INT DEFAULT 0 NOT NULL, CHANGE soldecummule soldecummule INT DEFAULT 0 NOT NULL, CHANGE seuil seuil INT DEFAULT 0 NOT NULL');
        $this->addSql('ALTER TABLE reclamation CHANGE client client VARCHAR(255) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`');
        $this->addSql('ALTER TABLE transaction CHANGE client client VARCHAR(255) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, CHANGE credit credit INT DEFAULT 0 NOT NULL, CHANGE debit debit INT DEFAULT 0 NOT NULL');
        $this->addSql('ALTER TABLE user CHANGE id id VARCHAR(255) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, CHANGE verified verified INT DEFAULT 0 NOT NULL');
    }
}
