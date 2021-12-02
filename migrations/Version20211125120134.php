<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211125120134 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE condidature ADD job_id INT NOT NULL');
        $this->addSql('ALTER TABLE condidature ADD CONSTRAINT FK_FDF2E30BBE04EA9 FOREIGN KEY (job_id) REFERENCES job (id)');
        $this->addSql('CREATE INDEX IDX_FDF2E30BBE04EA9 ON condidature (job_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE condidature DROP FOREIGN KEY FK_FDF2E30BBE04EA9');
        $this->addSql('DROP INDEX IDX_FDF2E30BBE04EA9 ON condidature');
        $this->addSql('ALTER TABLE condidature DROP job_id');
    }
}
