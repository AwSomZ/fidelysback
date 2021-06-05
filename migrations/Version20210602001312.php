<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210602001312 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE billet DROP FOREIGN KEY FK_1F034AF6C7440455');
        $this->addSql('DROP INDEX fk_1f034af6c7440455 ON billet');
        $this->addSql('CREATE INDEX client ON billet (client)');
        $this->addSql('ALTER TABLE billet ADD CONSTRAINT FK_1F034AF6C7440455 FOREIGN KEY (client) REFERENCES client (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE client CHANGE id id VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE mouvement DROP FOREIGN KEY FK_5B51FC3EC7440455');
        $this->addSql('DROP INDEX fk_5b51fc3ec7440455 ON mouvement');
        $this->addSql('CREATE INDEX client ON mouvement (client)');
        $this->addSql('ALTER TABLE mouvement ADD CONSTRAINT FK_5B51FC3EC7440455 FOREIGN KEY (client) REFERENCES client (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE reclamation DROP FOREIGN KEY FK_CE606404C7440455');
        $this->addSql('ALTER TABLE reclamation ADD admin_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE reclamation ADD CONSTRAINT FK_CE606404642B8210 FOREIGN KEY (admin_id) REFERENCES admin (id)');
        $this->addSql('CREATE INDEX IDX_CE606404642B8210 ON reclamation (admin_id)');
        $this->addSql('DROP INDEX fk_ce606404c7440455 ON reclamation');
        $this->addSql('CREATE INDEX creepar ON reclamation (client)');
        $this->addSql('ALTER TABLE reclamation ADD CONSTRAINT FK_CE606404C7440455 FOREIGN KEY (client) REFERENCES client (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE transaction DROP FOREIGN KEY FK_723705D1C7440455');
        $this->addSql('DROP INDEX fk_723705d1c7440455 ON transaction');
        $this->addSql('CREATE INDEX client ON transaction (client)');
        $this->addSql('ALTER TABLE transaction ADD CONSTRAINT FK_723705D1C7440455 FOREIGN KEY (client) REFERENCES client (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user CHANGE id id VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE billet DROP FOREIGN KEY FK_1F034AF6C7440455');
        $this->addSql('DROP INDEX client ON billet');
        $this->addSql('CREATE INDEX FK_1F034AF6C7440455 ON billet (client)');
        $this->addSql('ALTER TABLE billet ADD CONSTRAINT FK_1F034AF6C7440455 FOREIGN KEY (client) REFERENCES client (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE client CHANGE id id VARCHAR(255) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`');
        $this->addSql('ALTER TABLE mouvement DROP FOREIGN KEY FK_5B51FC3EC7440455');
        $this->addSql('DROP INDEX client ON mouvement');
        $this->addSql('CREATE INDEX FK_5B51FC3EC7440455 ON mouvement (client)');
        $this->addSql('ALTER TABLE mouvement ADD CONSTRAINT FK_5B51FC3EC7440455 FOREIGN KEY (client) REFERENCES client (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE reclamation DROP FOREIGN KEY FK_CE606404642B8210');
        $this->addSql('DROP INDEX IDX_CE606404642B8210 ON reclamation');
        $this->addSql('ALTER TABLE reclamation DROP FOREIGN KEY FK_CE606404C7440455');
        $this->addSql('ALTER TABLE reclamation DROP admin_id');
        $this->addSql('DROP INDEX creepar ON reclamation');
        $this->addSql('CREATE INDEX FK_CE606404C7440455 ON reclamation (client)');
        $this->addSql('ALTER TABLE reclamation ADD CONSTRAINT FK_CE606404C7440455 FOREIGN KEY (client) REFERENCES client (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE transaction DROP FOREIGN KEY FK_723705D1C7440455');
        $this->addSql('DROP INDEX client ON transaction');
        $this->addSql('CREATE INDEX FK_723705D1C7440455 ON transaction (client)');
        $this->addSql('ALTER TABLE transaction ADD CONSTRAINT FK_723705D1C7440455 FOREIGN KEY (client) REFERENCES client (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user CHANGE id id VARCHAR(255) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`');
    }
}
