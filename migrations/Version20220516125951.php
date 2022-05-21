<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220516125951 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE repart_geo (id INT AUTO_INCREMENT NOT NULL, produit_id INT NOT NULL, geo_name VARCHAR(185) NOT NULL, geo_value INT NOT NULL, INDEX IDX_D79AE446F347EFB (produit_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE repart_sector (id INT AUTO_INCREMENT NOT NULL, produit_id INT NOT NULL, sector_name VARCHAR(185) NOT NULL, sector_value INT NOT NULL, INDEX IDX_7C993CC4F347EFB (produit_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE repart_geo ADD CONSTRAINT FK_D79AE446F347EFB FOREIGN KEY (produit_id) REFERENCES produit (id)');
        $this->addSql('ALTER TABLE repart_sector ADD CONSTRAINT FK_7C993CC4F347EFB FOREIGN KEY (produit_id) REFERENCES produit (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE repart_geo');
        $this->addSql('DROP TABLE repart_sector');
    }
}
