<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211220210820 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE Manga ADD id INT AUTO_INCREMENT NOT NULL, ADD start_date DATE NOT NULL, ADD end_date DATE DEFAULT NULL, DROP startDate, DROP endDate, CHANGE nom nom VARCHAR(200) NOT NULL, CHANGE status status VARCHAR(15) NOT NULL, DROP PRIMARY KEY, ADD PRIMARY KEY (id)');
        $this->addSql('ALTER TABLE Tome DROP FOREIGN KEY Tome_ibfk_1');
        $this->addSql('DROP INDEX id_manga ON Tome');
        $this->addSql('ALTER TABLE Tome ADD id INT AUTO_INCREMENT NOT NULL, CHANGE id_manga id_manga INT NOT NULL, CHANGE numero_tome numero_tome INT NOT NULL, CHANGE prix prix DOUBLE PRECISION NOT NULL, CHANGE editeur editeur VARCHAR(50) NOT NULL, DROP PRIMARY KEY, ADD PRIMARY KEY (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE manga MODIFY id INT NOT NULL');
        $this->addSql('ALTER TABLE manga DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE manga ADD endDate DATE DEFAULT NULL, DROP id, DROP start_date, CHANGE nom nom VARCHAR(200) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`, CHANGE status status VARCHAR(50) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`, CHANGE end_date startDate DATE DEFAULT NULL');
        $this->addSql('ALTER TABLE manga ADD PRIMARY KEY (id_manga)');
        $this->addSql('ALTER TABLE tome MODIFY id INT NOT NULL');
        $this->addSql('ALTER TABLE tome DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE tome DROP id, CHANGE id_manga id_manga INT DEFAULT NULL, CHANGE numero_tome numero_tome INT DEFAULT NULL, CHANGE prix prix DOUBLE PRECISION DEFAULT NULL, CHANGE editeur editeur VARCHAR(20) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`');
        $this->addSql('ALTER TABLE tome ADD CONSTRAINT Tome_ibfk_1 FOREIGN KEY (id_manga) REFERENCES Manga (id_manga) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX id_manga ON tome (id_manga)');
        $this->addSql('ALTER TABLE tome ADD PRIMARY KEY (id_tome)');
    }
}
