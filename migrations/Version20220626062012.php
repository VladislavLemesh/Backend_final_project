<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220626062012 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE author (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE author_video (author_id INT NOT NULL, video_id INT NOT NULL, INDEX IDX_6A4FFAE1F675F31B (author_id), INDEX IDX_6A4FFAE129C1004E (video_id), PRIMARY KEY(author_id, video_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE author_video ADD CONSTRAINT FK_6A4FFAE1F675F31B FOREIGN KEY (author_id) REFERENCES author (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE author_video ADD CONSTRAINT FK_6A4FFAE129C1004E FOREIGN KEY (video_id) REFERENCES video (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE video ADD CONSTRAINT FK_7CC7DA2C12469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('CREATE INDEX IDX_7CC7DA2C12469DE2 ON video (category_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE author_video DROP FOREIGN KEY FK_6A4FFAE1F675F31B');
        $this->addSql('DROP TABLE author');
        $this->addSql('DROP TABLE author_video');
        $this->addSql('ALTER TABLE video DROP FOREIGN KEY FK_7CC7DA2C12469DE2');
        $this->addSql('DROP INDEX IDX_7CC7DA2C12469DE2 ON video');
    }
}
