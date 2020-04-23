<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200415123259 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE sportmeeting DROP FOREIGN KEY FK_68F9D21B8DFEC18C');
        $this->addSql('ALTER TABLE sportmeeting DROP FOREIGN KEY FK_68F9D21B94CCFA9F');
        $this->addSql('ALTER TABLE sportmeeting DROP FOREIGN KEY FK_68F9D21BF475CCD9');
        $this->addSql('DROP INDEX IDX_68F9D21B8DFEC18C ON sportmeeting');
        $this->addSql('DROP INDEX IDX_68F9D21B94CCFA9F ON sportmeeting');
        $this->addSql('DROP INDEX IDX_68F9D21BF475CCD9 ON sportmeeting');
        $this->addSql('ALTER TABLE sportmeeting ADD infrastructure_id INT DEFAULT NULL, ADD team_home_id INT DEFAULT NULL, ADD team_outside_id INT DEFAULT NULL, DROP infrastructure_id_id, DROP id_team_home_id, DROP id_team_outside_id');
        $this->addSql('ALTER TABLE sportmeeting ADD CONSTRAINT FK_68F9D21B243E7A84 FOREIGN KEY (infrastructure_id) REFERENCES infrastructure (id)');
        $this->addSql('ALTER TABLE sportmeeting ADD CONSTRAINT FK_68F9D21BD7B4B9AB FOREIGN KEY (team_home_id) REFERENCES team (id)');
        $this->addSql('ALTER TABLE sportmeeting ADD CONSTRAINT FK_68F9D21B64A00204 FOREIGN KEY (team_outside_id) REFERENCES team (id)');
        $this->addSql('CREATE INDEX IDX_68F9D21B243E7A84 ON sportmeeting (infrastructure_id)');
        $this->addSql('CREATE INDEX IDX_68F9D21BD7B4B9AB ON sportmeeting (team_home_id)');
        $this->addSql('CREATE INDEX IDX_68F9D21B64A00204 ON sportmeeting (team_outside_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE sportmeeting DROP FOREIGN KEY FK_68F9D21B243E7A84');
        $this->addSql('ALTER TABLE sportmeeting DROP FOREIGN KEY FK_68F9D21BD7B4B9AB');
        $this->addSql('ALTER TABLE sportmeeting DROP FOREIGN KEY FK_68F9D21B64A00204');
        $this->addSql('DROP INDEX IDX_68F9D21B243E7A84 ON sportmeeting');
        $this->addSql('DROP INDEX IDX_68F9D21BD7B4B9AB ON sportmeeting');
        $this->addSql('DROP INDEX IDX_68F9D21B64A00204 ON sportmeeting');
        $this->addSql('ALTER TABLE sportmeeting ADD infrastructure_id_id INT DEFAULT NULL, ADD id_team_home_id INT DEFAULT NULL, ADD id_team_outside_id INT DEFAULT NULL, DROP infrastructure_id, DROP team_home_id, DROP team_outside_id');
        $this->addSql('ALTER TABLE sportmeeting ADD CONSTRAINT FK_68F9D21B8DFEC18C FOREIGN KEY (id_team_outside_id) REFERENCES team (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE sportmeeting ADD CONSTRAINT FK_68F9D21B94CCFA9F FOREIGN KEY (infrastructure_id_id) REFERENCES infrastructure (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE sportmeeting ADD CONSTRAINT FK_68F9D21BF475CCD9 FOREIGN KEY (id_team_home_id) REFERENCES team (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_68F9D21B8DFEC18C ON sportmeeting (id_team_outside_id)');
        $this->addSql('CREATE INDEX IDX_68F9D21B94CCFA9F ON sportmeeting (infrastructure_id_id)');
        $this->addSql('CREATE INDEX IDX_68F9D21BF475CCD9 ON sportmeeting (id_team_home_id)');
    }
}
