USE techcamp;

DROP TABLE IF EXISTS db_table;

CREATE TABLE db_table (
    id 		int(11)			NOT NULL	AUTO_INCREMENT
  , column1	varchar(255)	NOT NULL
  , column2	varchar(255)	NOT NULL
  , column3	varchar(255)	NOT NULL
  , column4	varchar(255)	NOT NULL
  , column5	varchar(255)	NOT NULL
  , PRIMARY KEY(id)
);

INSERT INTO db_table (column1, column2, column3, column4, column5)
VALUES	('Pikachu', 35, 55, 40, 90),
        ('Eevee', 55, 55, 50, 55),
        ('Bulbasaur', 45, 49, 49, 45),
        ('Jigglypuff', 115, 45, 20, 25);
