<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170407145657 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE domain (id INT AUTO_INCREMENT NOT NULL, languages INT DEFAULT NULL, name VARCHAR(255) NOT NULL, mainLanguage INT DEFAULT NULL, UNIQUE INDEX UNIQ_A7A91E0BA0D15379 (languages), UNIQUE INDEX UNIQ_A7A91E0BADAE5B77 (mainLanguage), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE domain ADD CONSTRAINT FK_A7A91E0BA0D15379 FOREIGN KEY (languages) REFERENCES language (id)');
        $this->addSql('ALTER TABLE domain ADD CONSTRAINT FK_A7A91E0BADAE5B77 FOREIGN KEY (mainLanguage) REFERENCES language (id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE domain');
    }
}
