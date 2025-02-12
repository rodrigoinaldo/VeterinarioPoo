 /* vai dropar a tabela se ela ja existir*/ 
Drop schema if exists prontuario_vet;
/*criando a tabela*/
Create schema prontuario_vet;
/*usando a tabela*/
USE prontuario_vet;

/*criando a primeria tabela*/
Create Table especie
(
	cd_especie int,
    nm_especie varchar(50),
    /*fazendo a chave de identificação "ID"*/
    constraint pk_especie primary key (cd_especie)
);

Create Table animal 
(
	cd_animal int,
    nm_animal varchar(100),
    cd_especie int,
    constraint pk_animal primary key (cd_animal),
    /*fazendo a chave estrangeira que se refere a tabela especie*/
    constraint fk_animal_especie foreign key (cd_especie) references especie(cd_especie) 
);

Create Table tratamento
(
	cd_tratamento int,
    nm_tratamento varchar(100),
    ds_tratamento text,
    constraint pk_tratamento primary key (cd_tratamento)
);

Create Table prontuario
(
 cd_animal int,
 cd_tratamento int,
 dt_tratamento datetime,
 ds_observacao text,
 
 constraint pk_prontuario primary key (cd_animal, cd_tratamento, dt_tratamento),
 /*chaves estrangeiras*/
 constraint fk_prontuario_animal foreign key (cd_animal)
	references animal(cd_animal),
 constraint fk_prontuario_tratamento foreign key (cd_tratamento)
	references tratamento(cd_tratamento)
);


/*valores dos campos para teste*/
INSERT INTO especie(cd_especie,nm_especie) VALUES (1,'Cachorro');
INSERT INTO especie(cd_especie,nm_especie) VALUES (2,'gato');
INSERT INTO especie(cd_especie,nm_especie) VALUES (3,'coelho');

INSERT INTO animal VALUES (1,'MEG', 1);
INSERT INTO animal VALUES (2,'LUNA', 2);
INSERT INTO animal VALUES (3,'BOLO', 3);

INSERT INTO tratamento VALUES (101,'B-13', 'vacina contra nao sei o que');
INSERT INTO tratamento VALUES (102,'vacina de gripe', 'vacina contra algo de gripe');
INSERT INTO tratamento VALUES (103,'HIV', 'cachorro tem isso?');

INSERT INTO prontuario VALUES (1, 101, '2024-08-30 11:30:00', 'kkkkk');
INSERT INTO prontuario VALUES (1, 102, '2024-08-30 11:30:00', 'morreu');
INSERT INTO prontuario VALUES (2, 101, '2024-08-30 12:30:00', null);
INSERT INTO prontuario VALUES (2, 103, '2024-08-30 ', 'ele tinha?');
INSERT INTO prontuario VALUES (3, 102, '2024-08-30 ', null);