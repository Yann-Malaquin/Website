<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200415123204 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE sportmeeting DROP FOREIGN KEY FK_68F9D21B94CCFA9F');
        $this->addSql('DROP INDEX IDX_68F9D21B94CCFA9F ON sportmeeting');
        $this->addSql('ALTER TABLE sportmeeting CHANGE infrastructure_id infrastructure_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE sportmeeting ADD CONSTRAINT FK_68F9D21B94CCFA9F FOREIGN KEY (infrastructure_id_id) REFERENCES infrastructure (id)');
        $this->addSql('CREATE INDEX IDX_68F9D21B94CCFA9F ON sportmeeting (infrastructure_id_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE sportmeeting DROP FOREIGN KEY FK_68F9D21B94CCFA9F');
        $this->addSql('DROP INDEX IDX_68F9D21B94CCFA9F ON sportmeeting');
        $this->addSql('ALTER TABLE sportmeeting CHANGE infrastructure_id_id infrastructure_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE sportmeeting ADD CONSTRAINT FK_68F9D21B94CCFA9F FOREIGN KEY (infrastructure_id) REFERENCES infrastructure (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_68F9D21B94CCFA9F ON sportmeeting (infrastructure_id)');
    }
}
