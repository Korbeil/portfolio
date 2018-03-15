<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180315160011 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('CREATE TABLE project (id INTEGER NOT NULL, enabled BOOLEAN NOT NULL, title VARCHAR(128) NOT NULL, url VARCHAR(256) NOT NULL, description CLOB NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE project_tag (project_id INTEGER NOT NULL, tag_id INTEGER NOT NULL, PRIMARY KEY(project_id, tag_id))');
        $this->addSql('CREATE INDEX IDX_91F26D60166D1F9C ON project_tag (project_id)');
        $this->addSql('CREATE INDEX IDX_91F26D60BAD26311 ON project_tag (tag_id)');
        $this->addSql('CREATE TABLE post (id INTEGER NOT NULL, enabled BOOLEAN NOT NULL, type VARCHAR(128) NOT NULL, slug VARCHAR(128) NOT NULL, title VARCHAR(128) NOT NULL, subtitle VARCHAR(256) NOT NULL, image VARCHAR(256) NOT NULL, content CLOB NOT NULL, url VARCHAR(256) NOT NULL, created DATETIME NOT NULL, updated DATETIME NOT NULL, posted DATETIME NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE post_tag (post_id INTEGER NOT NULL, tag_id INTEGER NOT NULL, PRIMARY KEY(post_id, tag_id))');
        $this->addSql('CREATE INDEX IDX_5ACE3AF04B89032C ON post_tag (post_id)');
        $this->addSql('CREATE INDEX IDX_5ACE3AF0BAD26311 ON post_tag (tag_id)');
        $this->addSql('CREATE TABLE timeline_event (id INTEGER NOT NULL, type_id INTEGER DEFAULT NULL, enabled BOOLEAN NOT NULL, name VARCHAR(128) NOT NULL, date_start DATETIME NOT NULL, date_stop DATETIME NOT NULL, description CLOB NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_1BC087E1C54C8C93 ON timeline_event (type_id)');
        $this->addSql('CREATE TABLE timeline_event_tag (timeline_event_id INTEGER NOT NULL, tag_id INTEGER NOT NULL, PRIMARY KEY(timeline_event_id, tag_id))');
        $this->addSql('CREATE INDEX IDX_85C49B8321C7B380 ON timeline_event_tag (timeline_event_id)');
        $this->addSql('CREATE INDEX IDX_85C49B83BAD26311 ON timeline_event_tag (tag_id)');
        $this->addSql('CREATE TABLE tag (id INTEGER NOT NULL, name VARCHAR(128) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE timeline_event_type (id INTEGER NOT NULL, name VARCHAR(128) NOT NULL, background VARCHAR(128) NOT NULL, text VARCHAR(128) NOT NULL, PRIMARY KEY(id))');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('DROP TABLE project');
        $this->addSql('DROP TABLE project_tag');
        $this->addSql('DROP TABLE post');
        $this->addSql('DROP TABLE post_tag');
        $this->addSql('DROP TABLE timeline_event');
        $this->addSql('DROP TABLE timeline_event_tag');
        $this->addSql('DROP TABLE tag');
        $this->addSql('DROP TABLE timeline_event_type');
    }
}
