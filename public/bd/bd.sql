#Ma base de données : 

DROP TABLE IF EXISTS paf;
CREATE TABLE paf(
        matricule_paf     varchar(25),
        nom_paf     varchar(255),
        PRIMARY KEY (matricule_paf)
);



DROP TABLE IF EXISTS activite;
CREATE TABLE activite(
        id_activite     varchar(25),
        designation     varchar(255),
        description     varchar(255),
        lieu     varchar(255),
        id_domaine     varchar(25),
        PRIMARY KEY (id_activite)
);



DROP TABLE IF EXISTS evaluation;
CREATE TABLE evaluation(
        id_evaluation     varchar(25),
        date_evaluation     datetime,
        periode     varchar(25),
        matricule_paf     varchar(25),
        id_activite     varchar(25),
        email_responsable     varchar(255),
        PRIMARY KEY (id_evaluation)
);



DROP TABLE IF EXISTS critere;
CREATE TABLE critere(
        id_critere     varchar(25),
        designation     varchar(255),
        coefficient     integer,
        PRIMARY KEY (id_critere)
);



DROP TABLE IF EXISTS question;
CREATE TABLE question(
        id_question     varchar(25),
        intitule     varchar(500),
        id_critere     varchar(25),
        PRIMARY KEY (id_question)
);



DROP TABLE IF EXISTS user;
CREATE TABLE user(
        email_user     varchar(255),
        name_user     varchar(255),
        id_role_role     varchar(25),
        PRIMARY KEY (email_user)
);



DROP TABLE IF EXISTS role;
CREATE TABLE role(
        id_role     varchar(25),
        designation     varchar(255),
        description     varchar(500),
        PRIMARY KEY (id_role)
);



DROP TABLE IF EXISTS participation;
CREATE TABLE participation(
        email_participant     varchar(255),
        nom_participant     varchar(255),
        poids     Float (25,2),
        performance     integer,
        amelioration     varchar(500),
        swot     varchar(500),
        id_evaluation     varchar(25),
        PRIMARY KEY (email_participant,id_evaluation)
);



DROP TABLE IF EXISTS domaine;
CREATE TABLE domaine(
        id_domaine     varchar(25),
        designation     varchar(255),
        PRIMARY KEY (id_domaine)
);



DROP TABLE IF EXISTS note;
CREATE TABLE note(
        note     integer,
        id_question     varchar(25),
        email_participant     varchar(255),
        id_evaluation     varchar(25),
        PRIMARY KEY (id_question,email_participant,id_evaluation)
);



ALTER TABLE activite ADD CONSTRAINT FK_activite_id_domaine FOREIGN KEY (id_domaine) REFERENCES domaine(id_domaine);
ALTER TABLE evaluation ADD CONSTRAINT FK_evaluation_matricule_paf FOREIGN KEY (matricule_paf) REFERENCES paf(matricule_paf);
ALTER TABLE evaluation ADD CONSTRAINT FK_evaluation_id_activite FOREIGN KEY (id_activite) REFERENCES activite(id_activite);
ALTER TABLE evaluation ADD CONSTRAINT FK_evaluation_email_responsable FOREIGN KEY (email_responsable) REFERENCES user(email_user);
ALTER TABLE question ADD CONSTRAINT FK_question_id_critere FOREIGN KEY (id_critere) REFERENCES critere(id_critere);
ALTER TABLE user ADD CONSTRAINT FK_user_id_role_role FOREIGN KEY (id_role_role) REFERENCES role(id_role);
ALTER TABLE participation ADD CONSTRAINT FK_participation_id_evaluation FOREIGN KEY (id_evaluation) REFERENCES evaluation(id_evaluation) ON DELETE CASCADE;
ALTER TABLE note ADD CONSTRAINT FK_note_id_question FOREIGN KEY (id_question) REFERENCES question(id_question);
ALTER TABLE note ADD CONSTRAINT FK_note_email_participant FOREIGN KEY (email_participant) REFERENCES participation(email_participant);
ALTER TABLE note ADD CONSTRAINT FK_note_id_evaluation FOREIGN KEY (id_evaluation) REFERENCES evaluation(id_evaluation);
