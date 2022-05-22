<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220512214016 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE produit ADD invest_strat LONGTEXT NOT NULL, ADD repart_sector VARCHAR(255) NOT NULL, ADD repart_geo VARCHAR(255) NOT NULL, ADD info_trim LONGTEXT NOT NULL, ADD life_asset_trim LONGTEXT NOT NULL, ADD subscription_com LONGTEXT NOT NULL, ADD manage_com LONGTEXT NOT NULL, ADD arb_mov_com LONGTEXT NOT NULL, ADD pilot_works_com LONGTEXT NOT NULL, ADD wit_cession_com LONGTEXT NOT NULL, ADD share_muta_com LONGTEXT NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE produit DROP invest_strat, DROP repart_sector, DROP repart_geo, DROP info_trim, DROP life_asset_trim, DROP subscription_com, DROP manage_com, DROP arb_mov_com, DROP pilot_works_com, DROP wit_cession_com, DROP share_muta_com');
    }
}
