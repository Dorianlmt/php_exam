<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250221101733 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E66D71E064B FOREIGN KEY (id_article_id) REFERENCES article (id)');
        $this->addSql('CREATE INDEX IDX_23A0E66D71E064B ON article (id_article_id)');
        $this->addSql('ALTER TABLE cart DROP quantity');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E66D71E064B');
        $this->addSql('DROP INDEX IDX_23A0E66D71E064B ON article');
        $this->addSql('ALTER TABLE cart ADD quantity INT NOT NULL');
    }
}
