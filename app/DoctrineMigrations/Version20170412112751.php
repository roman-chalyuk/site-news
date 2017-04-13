<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170412112751 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE banner (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, code LONGTEXT NOT NULL, start_date DATE DEFAULT NULL, end_date DATE DEFAULT NULL, active TINYINT(1) NOT NULL, use_dates TINYINT(1) NOT NULL, bannerPlaces INT DEFAULT NULL, bannerOrders INT DEFAULT NULL, INDEX IDX_6F9DB8E7DE54B4E8 (bannerPlaces), INDEX IDX_6F9DB8E7C5D42553 (bannerOrders), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE banner ADD CONSTRAINT FK_6F9DB8E7DE54B4E8 FOREIGN KEY (bannerPlaces) REFERENCES banner_place (id)');
        $this->addSql('ALTER TABLE banner ADD CONSTRAINT FK_6F9DB8E7C5D42553 FOREIGN KEY (bannerOrders) REFERENCES banner_order (id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE banner');
    }
}
