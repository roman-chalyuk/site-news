<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170412113549 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE banner (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, code LONGTEXT NOT NULL, start_date DATE DEFAULT NULL, end_date DATE DEFAULT NULL, active TINYINT(1) NOT NULL, use_dates TINYINT(1) NOT NULL, bannerPlaces INT DEFAULT NULL, bannerOrders INT DEFAULT NULL, INDEX IDX_6F9DB8E7DE54B4E8 (bannerPlaces), INDEX IDX_6F9DB8E7C5D42553 (bannerOrders), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE banner_sitepage (banner_id INT NOT NULL, site_page_id INT NOT NULL, INDEX IDX_AFC550D9684EC833 (banner_id), INDEX IDX_AFC550D9F7E2812F (site_page_id), PRIMARY KEY(banner_id, site_page_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE banner_domain (banner_id INT NOT NULL, domain_id INT NOT NULL, INDEX IDX_24D7F4FD684EC833 (banner_id), INDEX IDX_24D7F4FD115F0EE5 (domain_id), PRIMARY KEY(banner_id, domain_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE banner_language (banner_id INT NOT NULL, language_id INT NOT NULL, INDEX IDX_D6E2BF96684EC833 (banner_id), INDEX IDX_D6E2BF9682F1BAF4 (language_id), PRIMARY KEY(banner_id, language_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE banner ADD CONSTRAINT FK_6F9DB8E7DE54B4E8 FOREIGN KEY (bannerPlaces) REFERENCES banner_place (id)');
        $this->addSql('ALTER TABLE banner ADD CONSTRAINT FK_6F9DB8E7C5D42553 FOREIGN KEY (bannerOrders) REFERENCES banner_order (id)');
        $this->addSql('ALTER TABLE banner_sitepage ADD CONSTRAINT FK_AFC550D9684EC833 FOREIGN KEY (banner_id) REFERENCES banner (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE banner_sitepage ADD CONSTRAINT FK_AFC550D9F7E2812F FOREIGN KEY (site_page_id) REFERENCES site_page (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE banner_domain ADD CONSTRAINT FK_24D7F4FD684EC833 FOREIGN KEY (banner_id) REFERENCES banner (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE banner_domain ADD CONSTRAINT FK_24D7F4FD115F0EE5 FOREIGN KEY (domain_id) REFERENCES domain (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE banner_language ADD CONSTRAINT FK_D6E2BF96684EC833 FOREIGN KEY (banner_id) REFERENCES banner (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE banner_language ADD CONSTRAINT FK_D6E2BF9682F1BAF4 FOREIGN KEY (language_id) REFERENCES language (id) ON DELETE CASCADE');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE banner_sitepage DROP FOREIGN KEY FK_AFC550D9684EC833');
        $this->addSql('ALTER TABLE banner_domain DROP FOREIGN KEY FK_24D7F4FD684EC833');
        $this->addSql('ALTER TABLE banner_language DROP FOREIGN KEY FK_D6E2BF96684EC833');
        $this->addSql('DROP TABLE banner');
        $this->addSql('DROP TABLE banner_sitepage');
        $this->addSql('DROP TABLE banner_domain');
        $this->addSql('DROP TABLE banner_language');
    }
}
