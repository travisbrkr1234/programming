CREATE SCHEMA php_examples;

CREATE TABLE beer (
    id int PRIMARY KEY AUTO_INCREMENT,
    name varchar(255),
    brewery varchar(255),
    abv varchar(255)
);

CREATE USER 'newuser'@'localhost' IDENTIFIED BY 'user_password';
-- CREATE USER 'wyatt'@'localhost' IDENTIFIED BY 'password';

GRANT ALL PRIVILEGES ON {{schema}}.{{table}}  TO '{{user}}'@'localhost';
-- GRANT ALL PRIVILEGES ON php_examples.beer  TO 'wyatt'@'localhost';