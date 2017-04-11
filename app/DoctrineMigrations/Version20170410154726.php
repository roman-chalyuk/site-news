<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170410154726 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE domain ADD mainLanguage INT DEFAULT NULL');
        $this->addSql('ALTER TABLE domain ADD CONSTRAINT FK_A7A91E0BADAE5B77 FOREIGN KEY (mainLanguage) REFERENCES language (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_A7A91E0BADAE5B77 ON domain (mainLanguage)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE domain DROP FOREIGN KEY FK_A7A91E0BADAE5B77');
        $this->addSql('DROP INDEX UNIQ_A7A91E0BADAE5B77 ON domain');
        $this->addSql('ALTER TABLE domain DROP mainLanguage');
    }
}
