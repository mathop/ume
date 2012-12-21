SELECT *
FROM person_types;

INSERT INTO person_types 
VALUES (null, 'Usuário');

SELECT *
FROM cities;

SELECT *
FROM branches;

DESCRIBE `branches`;

INSERT INTO branches
VALUES (null, 'Ume - Itanhaém');


INSERT INTO cities
VALUES (null, 'Itanhaém');


SELECT *
FROM event_types;

INSERT INTO event_types
VALUES 
(null, 'Embarque Ida'),
(null, 'Desembarque Ida'),
(null, 'Embarque Volta'),
(null, 'Desembarque Volta');

SELECT *
FROM points;

INSERT INTO points
VALUES
(null, 'Ponto um'),
(null, 'Ponto dois'),
(null, 'Ponto três');


SELECT *
FROM periods;


INSERT INTO periods 
VALUES (null, 'Manhã'), (null, 'Tarde'), (null, 'Noite');

