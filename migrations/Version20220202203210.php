<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220202203210 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE calendar (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, text VARCHAR(255) NOT NULL, poster VARCHAR(255) NOT NULL, type INT NOT NULL, start_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE culture (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, text VARCHAR(255) NOT NULL, poster VARCHAR(255) NOT NULL, family VARCHAR(255) NOT NULL, cycle VARCHAR(255) NOT NULL, exposition VARCHAR(255) NOT NULL, ground VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE culture_culture_category (culture_id INT NOT NULL, culture_category_id INT NOT NULL, INDEX IDX_5EED40BCB108249D (culture_id), INDEX IDX_5EED40BCC8C27365 (culture_category_id), PRIMARY KEY(culture_id, culture_category_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE culture_calendar (culture_id INT NOT NULL, calendar_id INT NOT NULL, INDEX IDX_9E853C7BB108249D (culture_id), INDEX IDX_9E853C7BA40A2C8 (calendar_id), PRIMARY KEY(culture_id, calendar_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE culture_culture_category ADD CONSTRAINT FK_5EED40BCB108249D FOREIGN KEY (culture_id) REFERENCES culture (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE culture_culture_category ADD CONSTRAINT FK_5EED40BCC8C27365 FOREIGN KEY (culture_category_id) REFERENCES culture_category (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE culture_calendar ADD CONSTRAINT FK_9E853C7BB108249D FOREIGN KEY (culture_id) REFERENCES culture (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE culture_calendar ADD CONSTRAINT FK_9E853C7BA40A2C8 FOREIGN KEY (calendar_id) REFERENCES calendar (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE culture_calendar DROP FOREIGN KEY FK_9E853C7BA40A2C8');
        $this->addSql('ALTER TABLE culture_culture_category DROP FOREIGN KEY FK_5EED40BCB108249D');
        $this->addSql('ALTER TABLE culture_calendar DROP FOREIGN KEY FK_9E853C7BB108249D');
        $this->addSql('DROP TABLE calendar');
        $this->addSql('DROP TABLE culture');
        $this->addSql('DROP TABLE culture_culture_category');
        $this->addSql('DROP TABLE culture_calendar');
        $this->addSql('ALTER TABLE culture_category CHANGE name name VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
