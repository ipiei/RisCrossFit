<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201027142937 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE assister CHANGE id_seance id_seance INT DEFAULT NULL, CHANGE id_user id_user INT DEFAULT NULL');
        $this->addSql('ALTER TABLE evenement CHANGE id_adresse id_adresse INT DEFAULT NULL');
        $this->addSql('ALTER TABLE participer CHANGE id_user id_user INT DEFAULT NULL, CHANGE id_event id_event INT DEFAULT NULL');
        $this->addSql('ALTER TABLE seance CHANGE id_activite id_activite INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD is_verified TINYINT(1) NOT NULL, CHANGE id_adresse id_adresse INT DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE assister CHANGE id_user id_user INT NOT NULL, CHANGE id_seance id_seance INT NOT NULL');
        $this->addSql('ALTER TABLE evenement CHANGE id_adresse id_adresse INT NOT NULL');
        $this->addSql('ALTER TABLE participer CHANGE id_event id_event INT NOT NULL, CHANGE id_user id_user INT NOT NULL');
        $this->addSql('ALTER TABLE seance CHANGE id_activite id_activite INT NOT NULL');
        $this->addSql('ALTER TABLE user DROP is_verified, CHANGE id_adresse id_adresse INT NOT NULL');
    }
}
