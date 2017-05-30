<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170530130833 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE world_news (id INT AUTO_INCREMENT NOT NULL, language_id INT DEFAULT NULL, title LONGTEXT NOT NULL, small_content LONGTEXT NOT NULL, content LONGTEXT NOT NULL, publish_date DATE DEFAULT NULL, force_first_date DATE DEFAULT NULL, force_first TINYINT(1) NOT NULL, active TINYINT(1) NOT NULL, INDEX IDX_C3175B8482F1BAF4 (language_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE world_news_domain (world_news_id INT NOT NULL, domain_id INT NOT NULL, INDEX IDX_F2B2C5275AE177F7 (world_news_id), INDEX IDX_F2B2C527115F0EE5 (domain_id), PRIMARY KEY(world_news_id, domain_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE world_news_category (world_news_id INT NOT NULL, news_category_id INT NOT NULL, INDEX IDX_2E7C2C285AE177F7 (world_news_id), INDEX IDX_2E7C2C283B732BAD (news_category_id), PRIMARY KEY(world_news_id, news_category_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE world_news_media (world_news_id INT NOT NULL, media_id INT NOT NULL, INDEX IDX_74D1A2BB5AE177F7 (world_news_id), INDEX IDX_74D1A2BBEA9FDD75 (media_id), PRIMARY KEY(world_news_id, media_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE world_news ADD CONSTRAINT FK_C3175B8482F1BAF4 FOREIGN KEY (language_id) REFERENCES language (id)');
        $this->addSql('ALTER TABLE world_news_domain ADD CONSTRAINT FK_F2B2C5275AE177F7 FOREIGN KEY (world_news_id) REFERENCES world_news (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE world_news_domain ADD CONSTRAINT FK_F2B2C527115F0EE5 FOREIGN KEY (domain_id) REFERENCES domain (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE world_news_category ADD CONSTRAINT FK_2E7C2C285AE177F7 FOREIGN KEY (world_news_id) REFERENCES world_news (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE world_news_category ADD CONSTRAINT FK_2E7C2C283B732BAD FOREIGN KEY (news_category_id) REFERENCES news_category (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE world_news_media ADD CONSTRAINT FK_74D1A2BB5AE177F7 FOREIGN KEY (world_news_id) REFERENCES world_news (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE world_news_media ADD CONSTRAINT FK_74D1A2BBEA9FDD75 FOREIGN KEY (media_id) REFERENCES media__media (id) ON DELETE CASCADE');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE world_news_domain DROP FOREIGN KEY FK_F2B2C5275AE177F7');
        $this->addSql('ALTER TABLE world_news_category DROP FOREIGN KEY FK_2E7C2C285AE177F7');
        $this->addSql('ALTER TABLE world_news_media DROP FOREIGN KEY FK_74D1A2BB5AE177F7');
        $this->addSql('DROP TABLE world_news');
        $this->addSql('DROP TABLE world_news_domain');
        $this->addSql('DROP TABLE world_news_category');
        $this->addSql('DROP TABLE world_news_media');
    }
}
