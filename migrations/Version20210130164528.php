<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210130164528 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE item (id INT AUTO_INCREMENT NOT NULL, todolist_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, content VARCHAR(1000) NOT NULL, created_at DATETIME NOT NULL, INDEX IDX_1F1B251EAD16642A (todolist_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE todolist (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, to_do_list_id INT DEFAULT NULL, email VARCHAR(255) NOT NULL, first_name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, birthday DATETIME NOT NULL, UNIQUE INDEX UNIQ_8D93D649B3AB48EB (to_do_list_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE item ADD CONSTRAINT FK_1F1B251EAD16642A FOREIGN KEY (todolist_id) REFERENCES todolist (id)');
        $this->addSql('ALTER TABLE `user` ADD CONSTRAINT FK_8D93D649B3AB48EB FOREIGN KEY (to_do_list_id) REFERENCES todolist (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE item DROP FOREIGN KEY FK_1F1B251EAD16642A');
        $this->addSql('ALTER TABLE `user` DROP FOREIGN KEY FK_8D93D649B3AB48EB');
        $this->addSql('DROP TABLE item');
        $this->addSql('DROP TABLE todolist');
        $this->addSql('DROP TABLE `user`');
    }
}
