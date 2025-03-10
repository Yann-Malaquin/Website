<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200316102411 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE profil CHANGE notificationmail notificationmail TINYINT(1) DEFAULT \'0\', CHANGE notificationsms notificationsms TINYINT(1) DEFAULT \'0\'');
        $this->addSql('ALTER TABLE sport_meeting CHANGE meeting meeting DATETIME NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE profil CHANGE notificationmail notificationmail TINYINT(1) NOT NULL, CHANGE notificationsms notificationsms TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE sport_meeting CHANGE meeting meeting DATETIME NOT NULL');
    }
}
