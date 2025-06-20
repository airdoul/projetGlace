<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250620091206 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE glaces ADD type_cone_id INT DEFAULT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE glaces ADD CONSTRAINT FK_E07C5E76454B8943 FOREIGN KEY (type_cone_id) REFERENCES type_cone (id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_E07C5E76454B8943 ON glaces (type_cone_id)
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE glaces DROP FOREIGN KEY FK_E07C5E76454B8943
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX IDX_E07C5E76454B8943 ON glaces
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE glaces DROP type_cone_id
        SQL);
    }
}
