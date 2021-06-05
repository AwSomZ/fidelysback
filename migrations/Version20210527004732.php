<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210527004732 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE billet DROP FOREIGN KEY billet_ibfk_1');
        $this->addSql('ALTER TABLE billet ADD CONSTRAINT FK_1F034AF6C7440455 FOREIGN KEY (client) REFERENCES client (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE client CHANGE id id VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE mouvement DROP FOREIGN KEY mouvement_ibfk_1');
        $this->addSql('ALTER TABLE mouvement ADD CONSTRAINT FK_5B51FC3EC7440455 FOREIGN KEY (client) REFERENCES client (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE reclamation DROP FOREIGN KEY creepar');
        $this->addSql('ALTER TABLE reclamation ADD CONSTRAINT FK_CE606404C7440455 FOREIGN KEY (client) REFERENCES client (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE transaction DROP FOREIGN KEY transaction_ibfk_1');
        $this->addSql('ALTER TABLE transaction ADD CONSTRAINT FK_723705D1C7440455 FOREIGN KEY (client) REFERENCES client (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user CHANGE id id VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE billet DROP FOREIGN KEY FK_1F034AF6C7440455');
        $this->addSql('ALTER TABLE billet ADD CONSTRAINT billet_ibfk_1 FOREIGN KEY (client) REFERENCES client (id)');
        $this->addSql('ALTER TABLE client CHANGE id id VARCHAR(255) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`');
        $this->addSql('ALTER TABLE mouvement DROP FOREIGN KEY FK_5B51FC3EC7440455');
        $this->addSql('ALTER TABLE mouvement ADD CONSTRAINT mouvement_ibfk_1 FOREIGN KEY (client) REFERENCES client (id)');
        $this->addSql('ALTER TABLE reclamation DROP FOREIGN KEY FK_CE606404C7440455');
        $this->addSql('ALTER TABLE reclamation ADD CONSTRAINT creepar FOREIGN KEY (client) REFERENCES client (id)');
        $this->addSql('ALTER TABLE transaction DROP FOREIGN KEY FK_723705D1C7440455');
        $this->addSql('ALTER TABLE transaction ADD CONSTRAINT transaction_ibfk_1 FOREIGN KEY (client) REFERENCES client (id)');
        $this->addSql('ALTER TABLE user CHANGE id id VARCHAR(255) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`');
    }
}
