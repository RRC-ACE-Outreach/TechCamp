USE techcamp;

CREATE TABLE users (
  id			int(4)			NOT NULL	AUTO_INCREMENT
  , username	varchar(200)	NOT NULL	DEFAULT ''
  , password	varchar(200)	NOT NULL	DEFAULT ''
  , PRIMARY KEY (id)
);

INSERT INTO users (id, username, password) VALUES (1, 'john', '1234');
