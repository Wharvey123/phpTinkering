create table cars
(
    make        varchar(255) null,
    model       varchar(255) null,
    year        int          null,
    price       float        null,
    id          int auto_increment
        primary key,
    description varchar(255) null
);

create table films
(
    name        varchar(255) null,
    director    varchar(255) null,
    year        int          null,
    id          int auto_increment
        primary key,
    description varchar(255) null
);

INSERT INTO phptinkering.cars (make, model, year, price, id, description) VALUES ('Toyota', 'Corolla', 2020, 20000, 1, 'Conegut per la seva fiabilitat i eficiència de combustible, el Corolla és una berlina compacta que ofereix un viatge còmode i funcions de seguretat avançades, ideal per al dia a dia.');
INSERT INTO phptinkering.cars (make, model, year, price, id, description) VALUES ('Ford', 'Fiesta', 2019, 15000, 2, 'Aquest cotxe subcompacte destaca per la seva maniobrabilitat àgil, disseny esportiu i economia de combustible. Una gran opció per a la conducció urbana amb un motor divertit i eficient.');
INSERT INTO phptinkering.cars (make, model, year, price, id, description) VALUES ('BMW', '320i', 2021, 35000, 3, 'El 320i combina luxe i rendiment en una berlina compacta, amb una conducció precisa, un motor turbo potent i l\'interior d\'alta qualitat que caracteritza BMW.');
INSERT INTO phptinkering.cars (make, model, year, price, id, description) VALUES ('Honda', 'Civic', 2022, 22000, 4, 'Popular per la seva practicitat i disseny esportiu, el Civic combina eficiència amb funcions tecnològiques modernes, sent una opció ideal tant per ciutat com per carretera.');
INSERT INTO phptinkering.cars (make, model, year, price, id, description) VALUES ('Tesla', 'Model 3', 2023, 45000, 5, 'Una berlina totalment elèctrica amb un disseny minimalista i acceleració impressionant, amb tecnologia avançada, capacitats d\'autopilot i zero emissions per a conductors eco-conscients.');
INSERT INTO phptinkering.cars (make, model, year, price, id, description) VALUES ('Volkswagen', 'Golf', 2018, 18000, 6, 'Aquest versàtil compacte ofereix un interior espaiós, conducció suau i bona economia de combustible, ideal tant per desplaçaments diaris com per viatges llargs.');

INSERT INTO phptinkering.films (name, director, year, id, description) VALUES ('Dune', 'Denim Villeneuve', 2020, 1, 'En un futur llunyà, Paul Atreides descobreix la seva destinació al planeta desert Arrakis, ple de perills i visions de futur, on ha d’aprendre a sobreviure i liderar enmig d’una guerra pel recurs més preuat de l’univers.');
INSERT INTO phptinkering.films (name, director, year, id, description) VALUES ('Star Wars', 'George Lucas', 1977, 2, 'Una saga espacial on l\'Aliança Rebel, liderada per Luke Skywalker i la Princesa Leia, lluita contra l\'Imperi Galàctic i Darth Vader per restaurar la pau a la galàxia.');
INSERT INTO phptinkering.films (name, director, year, id, description) VALUES ('Blade Runner 2049', 'Denim Villeneuve', 2017, 3, 'L\'agent K descobreix un secret ocult que amenaça la societat, portant-lo a trobar-se amb Rick Deckard, un exblade runner desaparegut fa anys.');
INSERT INTO phptinkering.films (name, director, year, id, description) VALUES ('Mad Max: Fury Road', 'George Lucas', 2015, 4, 'En un món postapocalíptic, Max ajuda Furiosa a fugir d’un tirà a través del desert, buscant redempció i supervivència en un territori devastat.');
INSERT INTO phptinkering.films (name, director, year, id, description) VALUES ('Avatar', 'James Cameron', 2009, 5, 'Jake Sully, un exmarine, es connecta amb Pandora i la cultura Na\'vi a través d’un avatar, trobant-se en una lluita per salvar el planeta dels interessos humans.');
INSERT INTO phptinkering.films (name, director, year, id, description) VALUES ('2001: A Space Odyssey', 'Stanley Kubrick', 1968, 6, 'Una odissea espacial que explora els orígens de la humanitat i la intel·ligència artificial, revelant una misteriosa presència extraterrestre.');

