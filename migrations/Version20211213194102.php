<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211213194102 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE reservations_user');
        $this->addSql('ALTER TABLE reservations ADD uemail_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE reservations ADD CONSTRAINT FK_4DA239912D8C94 FOREIGN KEY (uemail_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_4DA239912D8C94 ON reservations (uemail_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE reservations_user (reservations_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_E3A7B3B8D9A7F869 (reservations_id), INDEX IDX_E3A7B3B8A76ED395 (user_id), PRIMARY KEY(reservations_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE reservations_user ADD CONSTRAINT FK_E3A7B3B8A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE reservations_user ADD CONSTRAINT FK_E3A7B3B8D9A7F869 FOREIGN KEY (reservations_id) REFERENCES reservations (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE reservations DROP FOREIGN KEY FK_4DA239912D8C94');
        $this->addSql('DROP INDEX IDX_4DA239912D8C94 ON reservations');
        $this->addSql('ALTER TABLE reservations DROP uemail_id');
    }
}
