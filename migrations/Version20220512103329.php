<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220512103329 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE produit ADD share_price DOUBLE PRECISION NOT NULL, ADD share_nbr INT NOT NULL, ADD share_sub_min INT NOT NULL, ADD fruition_delay VARCHAR(255) NOT NULL, ADD withdrawal_value DOUBLE PRECISION NOT NULL, ADD immvable_nbr INT NOT NULL, ADD surface INT NOT NULL, ADD tenant_nbr INT NOT NULL, ADD top INT NOT NULL, ADD tof INT NOT NULL, ADD life_insurance_avaible TINYINT(1) NOT NULL, ADD reserve_ran VARCHAR(255) NOT NULL, ADD works_advance INT NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE produit DROP share_price, DROP share_nbr, DROP share_sub_min, DROP fruition_delay, DROP withdrawal_value, DROP immvable_nbr, DROP surface, DROP tenant_nbr, DROP top, DROP tof, DROP life_insurance_avaible, DROP reserve_ran, DROP works_advance');
    }
}
