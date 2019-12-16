<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191212113409 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SEQUENCE tbl_question_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE tbl_question (id INT NOT NULL, text TEXT NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE question_category (question_id INT NOT NULL, category_id INT NOT NULL, PRIMARY KEY(question_id, category_id))');
        $this->addSql('CREATE INDEX IDX_6544A9CD1E27F6BF ON question_category (question_id)');
        $this->addSql('CREATE INDEX IDX_6544A9CD12469DE2 ON question_category (category_id)');
        $this->addSql('ALTER TABLE question_category ADD CONSTRAINT FK_6544A9CD1E27F6BF FOREIGN KEY (question_id) REFERENCES tbl_question (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE question_category ADD CONSTRAINT FK_6544A9CD12469DE2 FOREIGN KEY (category_id) REFERENCES tbl_category (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE tbl_anwser ADD question_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE tbl_anwser ADD CONSTRAINT FK_DF101C111E27F6BF FOREIGN KEY (question_id) REFERENCES tbl_question (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_DF101C111E27F6BF ON tbl_anwser (question_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE tbl_anwser DROP CONSTRAINT FK_DF101C111E27F6BF');
        $this->addSql('ALTER TABLE question_category DROP CONSTRAINT FK_6544A9CD1E27F6BF');
        $this->addSql('DROP SEQUENCE tbl_question_id_seq CASCADE');
        $this->addSql('DROP TABLE tbl_question');
        $this->addSql('DROP TABLE question_category');
        $this->addSql('DROP INDEX IDX_DF101C111E27F6BF');
        $this->addSql('ALTER TABLE tbl_anwser DROP question_id');
    }
}
