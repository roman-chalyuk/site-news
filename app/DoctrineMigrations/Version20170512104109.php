<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170512104109 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE articles (id INT AUTO_INCREMENT NOT NULL, language_id INT DEFAULT NULL, title LONGTEXT NOT NULL, content LONGTEXT NOT NULL, publish_date DATE DEFAULT NULL, force_first_date DATE DEFAULT NULL, force_first TINYINT(1) NOT NULL, active TINYINT(1) NOT NULL, INDEX IDX_BFDD316882F1BAF4 (language_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE articles_domain (articles_id INT NOT NULL, domain_id INT NOT NULL, INDEX IDX_1D91CA261EBAF6CC (articles_id), INDEX IDX_1D91CA26115F0EE5 (domain_id), PRIMARY KEY(articles_id, domain_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE articles_category (articles_id INT NOT NULL, news_category_id INT NOT NULL, INDEX IDX_A7D8EFDB1EBAF6CC (articles_id), INDEX IDX_A7D8EFDB3B732BAD (news_category_id), PRIMARY KEY(articles_id, news_category_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE articles ADD CONSTRAINT FK_BFDD316882F1BAF4 FOREIGN KEY (language_id) REFERENCES language (id)');
        $this->addSql('ALTER TABLE articles_domain ADD CONSTRAINT FK_1D91CA261EBAF6CC FOREIGN KEY (articles_id) REFERENCES articles (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE articles_domain ADD CONSTRAINT FK_1D91CA26115F0EE5 FOREIGN KEY (domain_id) REFERENCES domain (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE articles_category ADD CONSTRAINT FK_A7D8EFDB1EBAF6CC FOREIGN KEY (articles_id) REFERENCES articles (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE articles_category ADD CONSTRAINT FK_A7D8EFDB3B732BAD FOREIGN KEY (news_category_id) REFERENCES news_category (id) ON DELETE CASCADE');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE articles_domain DROP FOREIGN KEY FK_1D91CA261EBAF6CC');
        $this->addSql('ALTER TABLE articles_category DROP FOREIGN KEY FK_A7D8EFDB1EBAF6CC');
        $this->addSql('DROP TABLE articles');
        $this->addSql('DROP TABLE articles_domain');
        $this->addSql('DROP TABLE articles_category');
    }
}
