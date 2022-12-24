<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221224122848 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE arrivals (id INT AUTO_INCREMENT NOT NULL, create_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', close_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', is_closed TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE arrivals_details (arrivals_id INT NOT NULL, products_id INT NOT NULL, quantity INT NOT NULL, INDEX IDX_6CBBD8BCE9C84D80 (arrivals_id), INDEX IDX_6CBBD8BC6C8A81A9 (products_id), PRIMARY KEY(arrivals_id, products_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE coupons (id INT AUTO_INCREMENT NOT NULL, coupons_types_id INT DEFAULT NULL, code VARCHAR(55) NOT NULL, description LONGTEXT NOT NULL, discount INT NOT NULL, max_usage INT NOT NULL, validity DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', is_valid TINYINT(1) NOT NULL, create_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_F56411183DDD47B7 (coupons_types_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE coupons_types (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(45) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE arrivals_details ADD CONSTRAINT FK_6CBBD8BCE9C84D80 FOREIGN KEY (arrivals_id) REFERENCES arrivals (id)');
        $this->addSql('ALTER TABLE arrivals_details ADD CONSTRAINT FK_6CBBD8BC6C8A81A9 FOREIGN KEY (products_id) REFERENCES products (id)');
        $this->addSql('ALTER TABLE coupons ADD CONSTRAINT FK_F56411183DDD47B7 FOREIGN KEY (coupons_types_id) REFERENCES coupons_types (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE arrivals_details DROP FOREIGN KEY FK_6CBBD8BCE9C84D80');
        $this->addSql('ALTER TABLE arrivals_details DROP FOREIGN KEY FK_6CBBD8BC6C8A81A9');
        $this->addSql('ALTER TABLE coupons DROP FOREIGN KEY FK_F56411183DDD47B7');
        $this->addSql('DROP TABLE arrivals');
        $this->addSql('DROP TABLE arrivals_details');
        $this->addSql('DROP TABLE coupons');
        $this->addSql('DROP TABLE coupons_types');
    }
}
