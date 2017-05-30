<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170530115257 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE facebook_content (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, link VARCHAR(255) NOT NULL, active TINYINT(1) NOT NULL, publish_date DATE DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE facebook_user (facebook_content_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_9E6AD5848B789053 (facebook_content_id), INDEX IDX_9E6AD584A76ED395 (user_id), PRIMARY KEY(facebook_content_id, user_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE facebook_domain (facebook_content_id INT NOT NULL, domain_id INT NOT NULL, INDEX IDX_40F4F54B8B789053 (facebook_content_id), INDEX IDX_40F4F54B115F0EE5 (domain_id), PRIMARY KEY(facebook_content_id, domain_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE facebook_sitepage (facebook_content_id INT NOT NULL, site_page_id INT NOT NULL, INDEX IDX_6A5D0D528B789053 (facebook_content_id), INDEX IDX_6A5D0D52F7E2812F (site_page_id), PRIMARY KEY(facebook_content_id, site_page_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE facebook_language (facebook_content_id INT NOT NULL, language_id INT NOT NULL, INDEX IDX_137AE21D8B789053 (facebook_content_id), INDEX IDX_137AE21D82F1BAF4 (language_id), PRIMARY KEY(facebook_content_id, language_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE facebook_user ADD CONSTRAINT FK_9E6AD5848B789053 FOREIGN KEY (facebook_content_id) REFERENCES facebook_content (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE facebook_user ADD CONSTRAINT FK_9E6AD584A76ED395 FOREIGN KEY (user_id) REFERENCES fos_user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE facebook_domain ADD CONSTRAINT FK_40F4F54B8B789053 FOREIGN KEY (facebook_content_id) REFERENCES facebook_content (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE facebook_domain ADD CONSTRAINT FK_40F4F54B115F0EE5 FOREIGN KEY (domain_id) REFERENCES domain (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE facebook_sitepage ADD CONSTRAINT FK_6A5D0D528B789053 FOREIGN KEY (facebook_content_id) REFERENCES facebook_content (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE facebook_sitepage ADD CONSTRAINT FK_6A5D0D52F7E2812F FOREIGN KEY (site_page_id) REFERENCES site_page (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE facebook_language ADD CONSTRAINT FK_137AE21D8B789053 FOREIGN KEY (facebook_content_id) REFERENCES facebook_content (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE facebook_language ADD CONSTRAINT FK_137AE21D82F1BAF4 FOREIGN KEY (language_id) REFERENCES language (id) ON DELETE CASCADE');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE facebook_user DROP FOREIGN KEY FK_9E6AD5848B789053');
        $this->addSql('ALTER TABLE facebook_domain DROP FOREIGN KEY FK_40F4F54B8B789053');
        $this->addSql('ALTER TABLE facebook_sitepage DROP FOREIGN KEY FK_6A5D0D528B789053');
        $this->addSql('ALTER TABLE facebook_language DROP FOREIGN KEY FK_137AE21D8B789053');
        $this->addSql('DROP TABLE facebook_content');
        $this->addSql('DROP TABLE facebook_user');
        $this->addSql('DROP TABLE facebook_domain');
        $this->addSql('DROP TABLE facebook_sitepage');
        $this->addSql('DROP TABLE facebook_language');
    }
}
