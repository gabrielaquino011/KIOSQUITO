<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211118233748 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE productos (id INT AUTO_INCREMENT NOT NULL, rubros_id INT NOT NULL, producto VARCHAR(50) NOT NULL, marca VARCHAR(100) NOT NULL, precio DOUBLE PRECISION NOT NULL, descripcion VARCHAR(100) NOT NULL, INDEX IDX_767490E67DC762C3 (rubros_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE rubros (id INT AUTO_INCREMENT NOT NULL, rubro VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE productos ADD CONSTRAINT FK_767490E67DC762C3 FOREIGN KEY (rubros_id) REFERENCES rubros (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE productos DROP FOREIGN KEY FK_767490E67DC762C3');
        $this->addSql('DROP TABLE productos');
        $this->addSql('DROP TABLE rubros');
    }
}
