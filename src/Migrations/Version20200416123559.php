<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200416123559 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE favorites (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, team_id INT NOT NULL, INDEX IDX_E46960F5A76ED395 (user_id), INDEX IDX_E46960F5296CD8AE (team_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sportmeeting (id INT AUTO_INCREMENT NOT NULL, infrastructure_id INT NOT NULL, team_home_id INT NOT NULL, team_outside_id INT NOT NULL, sport VARCHAR(255) NOT NULL, competition VARCHAR(255) NOT NULL, city VARCHAR(255) NOT NULL, meeting DATETIME NOT NULL, isfinish TINYINT(1) NOT NULL, duration_meeting INT NOT NULL, INDEX IDX_68F9D21B243E7A84 (infrastructure_id), INDEX IDX_68F9D21BD7B4B9AB (team_home_id), INDEX IDX_68F9D21B64A00204 (team_outside_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE team (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, sport VARCHAR(255) NOT NULL, logo VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE favorites ADD CONSTRAINT FK_E46960F5A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE favorites ADD CONSTRAINT FK_E46960F5296CD8AE FOREIGN KEY (team_id) REFERENCES team (id)');
        $this->addSql('ALTER TABLE sportmeeting ADD CONSTRAINT FK_68F9D21B243E7A84 FOREIGN KEY (infrastructure_id) REFERENCES infrastructure (id)');
        $this->addSql('ALTER TABLE sportmeeting ADD CONSTRAINT FK_68F9D21BD7B4B9AB FOREIGN KEY (team_home_id) REFERENCES team (id)');
        $this->addSql('ALTER TABLE sportmeeting ADD CONSTRAINT FK_68F9D21B64A00204 FOREIGN KEY (team_outside_id) REFERENCES team (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE favorites DROP FOREIGN KEY FK_E46960F5296CD8AE');
        $this->addSql('ALTER TABLE sportmeeting DROP FOREIGN KEY FK_68F9D21BD7B4B9AB');
        $this->addSql('ALTER TABLE sportmeeting DROP FOREIGN KEY FK_68F9D21B64A00204');
        $this->addSql('DROP TABLE favorites');
        $this->addSql('DROP TABLE sportmeeting');
        $this->addSql('DROP TABLE team');
    }
}
