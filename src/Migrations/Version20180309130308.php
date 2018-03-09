<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180309130308 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('CREATE TABLE timeline_event (id INTEGER NOT NULL, type_id INTEGER DEFAULT NULL, name VARCHAR(128) NOT NULL, date_start INTEGER NOT NULL, date_stop INTEGER NOT NULL, description CLOB NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_1BC087E1C54C8C93 ON timeline_event (type_id)');
        $this->addSql('CREATE TABLE timeline_event_type (id INTEGER NOT NULL, name VARCHAR(128) NOT NULL, background VARCHAR(128) NOT NULL, text VARCHAR(128) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('DROP INDEX IDX_91F26D60BAD26311');
        $this->addSql('DROP INDEX IDX_91F26D60166D1F9C');
        $this->addSql('CREATE TEMPORARY TABLE __temp__project_tag AS SELECT project_id, tag_id FROM project_tag');
        $this->addSql('DROP TABLE project_tag');
        $this->addSql('CREATE TABLE project_tag (project_id INTEGER NOT NULL, tag_id INTEGER NOT NULL, PRIMARY KEY(project_id, tag_id), CONSTRAINT FK_91F26D60166D1F9C FOREIGN KEY (project_id) REFERENCES project (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_91F26D60BAD26311 FOREIGN KEY (tag_id) REFERENCES tag (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO project_tag (project_id, tag_id) SELECT project_id, tag_id FROM __temp__project_tag');
        $this->addSql('DROP TABLE __temp__project_tag');
        $this->addSql('CREATE INDEX IDX_91F26D60BAD26311 ON project_tag (tag_id)');
        $this->addSql('CREATE INDEX IDX_91F26D60166D1F9C ON project_tag (project_id)');
        $this->addSql('CREATE TEMPORARY TABLE __temp__tag AS SELECT id, name FROM tag');
        $this->addSql('DROP TABLE tag');
        $this->addSql('CREATE TABLE tag (id INTEGER NOT NULL, name VARCHAR(128) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('INSERT INTO tag (id, name) SELECT id, name FROM __temp__tag');
        $this->addSql('DROP TABLE __temp__tag');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('DROP TABLE timeline_event');
        $this->addSql('DROP TABLE timeline_event_type');
        $this->addSql('DROP INDEX IDX_91F26D60166D1F9C');
        $this->addSql('DROP INDEX IDX_91F26D60BAD26311');
        $this->addSql('CREATE TEMPORARY TABLE __temp__project_tag AS SELECT project_id, tag_id FROM project_tag');
        $this->addSql('DROP TABLE project_tag');
        $this->addSql('CREATE TABLE project_tag (project_id INTEGER NOT NULL, tag_id INTEGER NOT NULL, PRIMARY KEY(project_id, tag_id))');
        $this->addSql('INSERT INTO project_tag (project_id, tag_id) SELECT project_id, tag_id FROM __temp__project_tag');
        $this->addSql('DROP TABLE __temp__project_tag');
        $this->addSql('CREATE INDEX IDX_91F26D60166D1F9C ON project_tag (project_id)');
        $this->addSql('CREATE INDEX IDX_91F26D60BAD26311 ON project_tag (tag_id)');
        $this->addSql('CREATE TEMPORARY TABLE __temp__tag AS SELECT id, name FROM tag');
        $this->addSql('DROP TABLE tag');
        $this->addSql('CREATE TABLE tag (id INTEGER NOT NULL, name VARCHAR(255) NOT NULL COLLATE BINARY, PRIMARY KEY(id))');
        $this->addSql('INSERT INTO tag (id, name) SELECT id, name FROM __temp__tag');
        $this->addSql('DROP TABLE __temp__tag');
    }
}
