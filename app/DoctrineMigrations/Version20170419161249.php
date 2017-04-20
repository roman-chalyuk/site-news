<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170419161249 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE meta_tag_page (id INT AUTO_INCREMENT NOT NULL, domain INT DEFAULT NULL, lang INT DEFAULT NULL, page INT DEFAULT NULL, newsCategory INT DEFAULT NULL, metaTagsName INT DEFAULT NULL, metaTagsContent INT DEFAULT NULL, INDEX IDX_B448F1DDA7A91E0B (domain), INDEX IDX_B448F1DD31098462 (lang), INDEX IDX_B448F1DDDC96860C (newsCategory), INDEX IDX_B448F1DD140AB620 (page), INDEX IDX_B448F1DDD06A3042 (metaTagsName), INDEX IDX_B448F1DDE8AC8E84 (metaTagsContent), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE meta_tag_page ADD CONSTRAINT FK_B448F1DDA7A91E0B FOREIGN KEY (domain) REFERENCES domain (id)');
        $this->addSql('ALTER TABLE meta_tag_page ADD CONSTRAINT FK_B448F1DD31098462 FOREIGN KEY (lang) REFERENCES language (id)');
        $this->addSql('ALTER TABLE meta_tag_page ADD CONSTRAINT FK_B448F1DDDC96860C FOREIGN KEY (newsCategory) REFERENCES news_category (id)');
        $this->addSql('ALTER TABLE meta_tag_page ADD CONSTRAINT FK_B448F1DD140AB620 FOREIGN KEY (page) REFERENCES site_page (id)');
        $this->addSql('ALTER TABLE meta_tag_page ADD CONSTRAINT FK_B448F1DDD06A3042 FOREIGN KEY (metaTagsName) REFERENCES meta_tag (id)');
        $this->addSql('ALTER TABLE meta_tag_page ADD CONSTRAINT FK_B448F1DDE8AC8E84 FOREIGN KEY (metaTagsContent) REFERENCES meta_tag_content (id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE meta_tag_page');
    }
}
