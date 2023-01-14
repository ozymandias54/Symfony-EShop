<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230114215501 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE categories ADD image VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE customers CHANGE users_id users_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE products CHANGE categories_id categories_id INT DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE categories DROP image');
        $this->addSql('ALTER TABLE customers CHANGE users_id users_id INT NOT NULL');
        $this->addSql('ALTER TABLE products CHANGE categories_id categories_id INT NOT NULL');
    }
}
