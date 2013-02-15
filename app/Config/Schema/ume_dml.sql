-- DML do SCHEMA `ume`

-- person_types

INSERT INTO person_types 
VALUES (null, 'Usuário');

-- branches

INSERT INTO branches
VALUES (null, 'Ume - Itanhaém');

-- cities

INSERT INTO cities
VALUES (null, 'Itanhaém');

-- event_types

INSERT INTO event_types
VALUES 
(null, 'Embarque Ida'),
(null, 'Desembarque Ida'),
(null, 'Embarque Volta'),
(null, 'Desembarque Volta');

-- points

INSERT INTO points
VALUES
(null, 'Zona azul'),
(null, 'Zona amarela'),
(null, 'Zona verde'),
(null, 'Unip - Rangel'),
(null, 'Unimonte');

-- periods

INSERT INTO periods 
VALUES (null, 'Manhã'), (null, 'Tarde'), (null, 'Noite');

-- courses

INSERT INTO courses
VALUES 
(null, 'Administração'),
(null, 'Análise e desenvolvimento de sistemas'),
(null, 'Pedagogia'),
(null, 'Petróleo e gás');