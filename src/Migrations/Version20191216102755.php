<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191216102755 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE TABLE tbl_anwser (id INT NOT NULL, question_id INT DEFAULT NULL, text TEXT NOT NULL, correct BOOLEAN DEFAULT \'true\', PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_DF101C111E27F6BF ON tbl_anwser (question_id)');
        $this->addSql('ALTER TABLE tbl_anwser ADD CONSTRAINT FK_DF101C111E27F6BF FOREIGN KEY (question_id) REFERENCES tbl_question (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP TABLE tbl_anwser');
    }
}
