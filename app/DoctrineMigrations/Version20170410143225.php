<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170410143225 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE domain_languages (domain_id INT NOT NULL, language_id INT NOT NULL, INDEX IDX_46A18137115F0EE5 (domain_id), INDEX IDX_46A1813782F1BAF4 (language_id), PRIMARY KEY(domain_id, language_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE domain_languages ADD CONSTRAINT FK_46A18137115F0EE5 FOREIGN KEY (domain_id) REFERENCES domain (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE domain_languages ADD CONSTRAINT FK_46A1813782F1BAF4 FOREIGN KEY (language_id) REFERENCES language (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE domain DROP FOREIGN KEY FK_A7A91E0BA0D15379');
        $this->addSql('DROP INDEX UNIQ_A7A91E0BA0D15379 ON domain');
        $this->addSql('ALTER TABLE domain DROP languages');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE domain_languages');
        $this->addSql('ALTER TABLE domain ADD languages INT DEFAULT NULL');
        $this->addSql('ALTER TABLE domain ADD CONSTRAINT FK_A7A91E0BA0D15379 FOREIGN KEY (languages) REFERENCES language (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_A7A91E0BA0D15379 ON domain (languages)');
    }
}
