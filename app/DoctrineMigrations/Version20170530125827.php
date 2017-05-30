<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170530125827 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE twitter_content (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, link VARCHAR(255) NOT NULL, active TINYINT(1) NOT NULL, publish_date DATE DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE twitter_user (twitter_content_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_AAD7875A2DE5AAAC (twitter_content_id), INDEX IDX_AAD7875AA76ED395 (user_id), PRIMARY KEY(twitter_content_id, user_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE twitter_domain (twitter_content_id INT NOT NULL, domain_id INT NOT NULL, INDEX IDX_DA2A19BF2DE5AAAC (twitter_content_id), INDEX IDX_DA2A19BF115F0EE5 (domain_id), PRIMARY KEY(twitter_content_id, domain_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE twitter_sitepage (twitter_content_id INT NOT NULL, site_page_id INT NOT NULL, INDEX IDX_B3311D662DE5AAAC (twitter_content_id), INDEX IDX_B3311D66F7E2812F (site_page_id), PRIMARY KEY(twitter_content_id, site_page_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE twitter_language (twitter_content_id INT NOT NULL, language_id INT NOT NULL, INDEX IDX_CA16F2292DE5AAAC (twitter_content_id), INDEX IDX_CA16F22982F1BAF4 (language_id), PRIMARY KEY(twitter_content_id, language_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE twitter_user ADD CONSTRAINT FK_AAD7875A2DE5AAAC FOREIGN KEY (twitter_content_id) REFERENCES twitter_content (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE twitter_user ADD CONSTRAINT FK_AAD7875AA76ED395 FOREIGN KEY (user_id) REFERENCES fos_user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE twitter_domain ADD CONSTRAINT FK_DA2A19BF2DE5AAAC FOREIGN KEY (twitter_content_id) REFERENCES twitter_content (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE twitter_domain ADD CONSTRAINT FK_DA2A19BF115F0EE5 FOREIGN KEY (domain_id) REFERENCES domain (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE twitter_sitepage ADD CONSTRAINT FK_B3311D662DE5AAAC FOREIGN KEY (twitter_content_id) REFERENCES twitter_content (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE twitter_sitepage ADD CONSTRAINT FK_B3311D66F7E2812F FOREIGN KEY (site_page_id) REFERENCES site_page (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE twitter_language ADD CONSTRAINT FK_CA16F2292DE5AAAC FOREIGN KEY (twitter_content_id) REFERENCES twitter_content (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE twitter_language ADD CONSTRAINT FK_CA16F22982F1BAF4 FOREIGN KEY (language_id) REFERENCES language (id) ON DELETE CASCADE');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE twitter_user DROP FOREIGN KEY FK_AAD7875A2DE5AAAC');
        $this->addSql('ALTER TABLE twitter_domain DROP FOREIGN KEY FK_DA2A19BF2DE5AAAC');
        $this->addSql('ALTER TABLE twitter_sitepage DROP FOREIGN KEY FK_B3311D662DE5AAAC');
        $this->addSql('ALTER TABLE twitter_language DROP FOREIGN KEY FK_CA16F2292DE5AAAC');
        $this->addSql('DROP TABLE twitter_content');
        $this->addSql('DROP TABLE twitter_user');
        $this->addSql('DROP TABLE twitter_domain');
        $this->addSql('DROP TABLE twitter_sitepage');
        $this->addSql('DROP TABLE twitter_language');
    }
}
