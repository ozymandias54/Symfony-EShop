<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221224124321 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE alerts (id INT AUTO_INCREMENT NOT NULL, users_id INT DEFAULT NULL, status VARCHAR(55) NOT NULL, type VARCHAR(55) NOT NULL, details LONGTEXT NOT NULL, create_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', traited_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_F77AC06B67B3B43D (users_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE deliveries (id INT AUTO_INCREMENT NOT NULL, orders_id INT DEFAULT NULL, delivered_by_id INT DEFAULT NULL, address VARCHAR(55) NOT NULL, zipcode VARCHAR(55) NOT NULL, city VARCHAR(65) NOT NULL, price DOUBLE PRECISION NOT NULL, state VARCHAR(55) NOT NULL, INDEX IDX_6F078568CFFE9AD6 (orders_id), INDEX IDX_6F078568BFBEE0DA (delivered_by_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE payments (id INT AUTO_INCREMENT NOT NULL, orders_id INT DEFAULT NULL, ref VARCHAR(45) NOT NULL, payed_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', mode VARCHAR(45) NOT NULL, details LONGTEXT NOT NULL, UNIQUE INDEX UNIQ_65D29B32CFFE9AD6 (orders_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE alerts ADD CONSTRAINT FK_F77AC06B67B3B43D FOREIGN KEY (users_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE deliveries ADD CONSTRAINT FK_6F078568CFFE9AD6 FOREIGN KEY (orders_id) REFERENCES orders (id)');
        $this->addSql('ALTER TABLE deliveries ADD CONSTRAINT FK_6F078568BFBEE0DA FOREIGN KEY (delivered_by_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE payments ADD CONSTRAINT FK_65D29B32CFFE9AD6 FOREIGN KEY (orders_id) REFERENCES orders (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE alerts DROP FOREIGN KEY FK_F77AC06B67B3B43D');
        $this->addSql('ALTER TABLE deliveries DROP FOREIGN KEY FK_6F078568CFFE9AD6');
        $this->addSql('ALTER TABLE deliveries DROP FOREIGN KEY FK_6F078568BFBEE0DA');
        $this->addSql('ALTER TABLE payments DROP FOREIGN KEY FK_65D29B32CFFE9AD6');
        $this->addSql('DROP TABLE alerts');
        $this->addSql('DROP TABLE deliveries');
        $this->addSql('DROP TABLE payments');
    }
}
