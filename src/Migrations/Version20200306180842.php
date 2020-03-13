<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200306180842 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE sport_meeting DROP INDEX UNIQ_54A0AD93243E7A84, ADD INDEX IDX_54A0AD93243E7A84 (infrastructure_id)');
        $this->addSql('ALTER TABLE sport_meeting CHANGE meeting meeting DATETIME NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE sport_meeting DROP INDEX IDX_54A0AD93243E7A84, ADD UNIQUE INDEX UNIQ_54A0AD93243E7A84 (infrastructure_id)');
        $this->addSql('ALTER TABLE sport_meeting CHANGE meeting meeting DATETIME NOT NULL');
    }
}
