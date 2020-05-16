<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200414125502 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE favorites ADD user_id_id INT DEFAULT NULL, ADD team_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE favorites ADD CONSTRAINT FK_E46960F59D86650F FOREIGN KEY (user_id_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE favorites ADD CONSTRAINT FK_E46960F5B842D717 FOREIGN KEY (team_id_id) REFERENCES team (id)');
        $this->addSql('CREATE INDEX IDX_E46960F59D86650F ON favorites (user_id_id)');
        $this->addSql('CREATE INDEX IDX_E46960F5B842D717 ON favorites (team_id_id)');
        $this->addSql('ALTER TABLE infrastructure DROP FOREIGN KEY FK_D129B19015D64EC');
        $this->addSql('DROP INDEX IDX_D129B19015D64EC ON infrastructure');
        $this->addSql('ALTER TABLE infrastructure DROP sportmeeting_id');
        $this->addSql('ALTER TABLE sportmeeting DROP FOREIGN KEY FK_68F9D21B4A671502');
        $this->addSql('ALTER TABLE sportmeeting DROP FOREIGN KEY FK_68F9D21B85A8ACE2');
        $this->addSql('DROP INDEX IDX_68F9D21B4A671502 ON sportmeeting');
        $this->addSql('DROP INDEX IDX_68F9D21B85A8ACE2 ON sportmeeting');
        $this->addSql('ALTER TABLE sportmeeting ADD infrastructure_id_id INT DEFAULT NULL, ADD id_team_home_id INT DEFAULT NULL, ADD id_team_outside_id INT DEFAULT NULL, DROP team_home_id_id, DROP team_outside_id_id');
        $this->addSql('ALTER TABLE sportmeeting ADD CONSTRAINT FK_68F9D21B94CCFA9F FOREIGN KEY (infrastructure_id_id) REFERENCES infrastructure (id)');
        $this->addSql('ALTER TABLE sportmeeting ADD CONSTRAINT FK_68F9D21BF475CCD9 FOREIGN KEY (id_team_home_id) REFERENCES team (id)');
        $this->addSql('ALTER TABLE sportmeeting ADD CONSTRAINT FK_68F9D21B8DFEC18C FOREIGN KEY (id_team_outside_id) REFERENCES team (id)');
        $this->addSql('CREATE INDEX IDX_68F9D21B94CCFA9F ON sportmeeting (infrastructure_id_id)');
        $this->addSql('CREATE INDEX IDX_68F9D21BF475CCD9 ON sportmeeting (id_team_home_id)');
        $this->addSql('CREATE INDEX IDX_68F9D21B8DFEC18C ON sportmeeting (id_team_outside_id)');
        $this->addSql('ALTER TABLE team DROP FOREIGN KEY FK_C4E0A61F84DDC6B4');
        $this->addSql('DROP INDEX IDX_C4E0A61F84DDC6B4 ON team');
        $this->addSql('ALTER TABLE team DROP favorites_id');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D64984DDC6B4');
        $this->addSql('DROP INDEX IDX_8D93D64984DDC6B4 ON user');
        $this->addSql('ALTER TABLE user DROP favorites_id, CHANGE activate activate TINYINT(1) DEFAULT \'0\' NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE favorites DROP FOREIGN KEY FK_E46960F59D86650F');
        $this->addSql('ALTER TABLE favorites DROP FOREIGN KEY FK_E46960F5B842D717');
        $this->addSql('DROP INDEX IDX_E46960F59D86650F ON favorites');
        $this->addSql('DROP INDEX IDX_E46960F5B842D717 ON favorites');
        $this->addSql('ALTER TABLE favorites DROP user_id_id, DROP team_id_id');
        $this->addSql('ALTER TABLE infrastructure ADD sportmeeting_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE infrastructure ADD CONSTRAINT FK_D129B19015D64EC FOREIGN KEY (sportmeeting_id) REFERENCES sportmeeting (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_D129B19015D64EC ON infrastructure (sportmeeting_id)');
        $this->addSql('ALTER TABLE sportmeeting DROP FOREIGN KEY FK_68F9D21B94CCFA9F');
        $this->addSql('ALTER TABLE sportmeeting DROP FOREIGN KEY FK_68F9D21BF475CCD9');
        $this->addSql('ALTER TABLE sportmeeting DROP FOREIGN KEY FK_68F9D21B8DFEC18C');
        $this->addSql('DROP INDEX IDX_68F9D21B94CCFA9F ON sportmeeting');
        $this->addSql('DROP INDEX IDX_68F9D21BF475CCD9 ON sportmeeting');
        $this->addSql('DROP INDEX IDX_68F9D21B8DFEC18C ON sportmeeting');
        $this->addSql('ALTER TABLE sportmeeting ADD team_home_id_id INT NOT NULL, ADD team_outside_id_id INT NOT NULL, DROP infrastructure_id_id, DROP id_team_home_id, DROP id_team_outside_id');
        $this->addSql('ALTER TABLE sportmeeting ADD CONSTRAINT FK_68F9D21B4A671502 FOREIGN KEY (team_home_id_id) REFERENCES team (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE sportmeeting ADD CONSTRAINT FK_68F9D21B85A8ACE2 FOREIGN KEY (team_outside_id_id) REFERENCES team (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_68F9D21B4A671502 ON sportmeeting (team_home_id_id)');
        $this->addSql('CREATE INDEX IDX_68F9D21B85A8ACE2 ON sportmeeting (team_outside_id_id)');
        $this->addSql('ALTER TABLE team ADD favorites_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE team ADD CONSTRAINT FK_C4E0A61F84DDC6B4 FOREIGN KEY (favorites_id) REFERENCES favorites (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_C4E0A61F84DDC6B4 ON team (favorites_id)');
        $this->addSql('ALTER TABLE user ADD favorites_id INT DEFAULT NULL, CHANGE activate activate INT DEFAULT 0 NOT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D64984DDC6B4 FOREIGN KEY (favorites_id) REFERENCES favorites (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_8D93D64984DDC6B4 ON user (favorites_id)');
    }
}
