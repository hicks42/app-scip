<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220516140712 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE repart_geo CHANGE geo_value geo_value DOUBLE PRECISION NOT NULL');
        $this->addSql('ALTER TABLE repart_sector CHANGE sector_value sector_value DOUBLE PRECISION NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE repart_geo CHANGE geo_value geo_value INT NOT NULL');
        $this->addSql('ALTER TABLE repart_sector CHANGE sector_value sector_value INT NOT NULL');
    }
}
