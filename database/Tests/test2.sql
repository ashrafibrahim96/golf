INSERT INTO matches (nom , tarif)
VALUES ('9 trous' , 150 );

INSERT INTO matches (nom  , tarif )
VALUES ('18 trous' , 260 );

INSERT INTO locations (nom  , tarif )
VALUES ('caddy' , 60 );
INSERT INTO locations (nom  , tarif )
VALUES ('sac' , 20 );

INSERT INTO actualites (titre  , photo  , texte)
VALUES ('howw' , 'dsccqc' , 'qsdsqdqsd' );

INSERT INTO actualites (titre  , photo  , texte)
VALUES ('howwaaaa' , 'dsfsqfqsfccqc' , 'qsdsqdqsqsdsqdsqdsqd' );

INSERT INTO departs ( couleur )
VALUES ('jaune'  );
INSERT INTO departs ( couleur )
VALUES ('blanc'  );
INSERT INTO departs ( couleur )
VALUES ('bleu'  );
INSERT INTO departs ( couleur )
VALUES ('rouge'  );
INSERT INTO user_partie (user_id ,partie_id , created_at)
VALUES (1, 1,'2020-09-22 11:44:15');


INSERT INTO "clubHouses" (nom ,"GPS" , created_at)
VALUES ('kantaoui', 'position GPS','2020-09-22 11:44:15'); 


INSERT INTO parcours (nom ,nombre_de_trous ,"clubHouse_id" , created_at)
VALUES ('panorama', 18 ,1,'2020-09-22 11:44:15');

INSERT INTO methodes (nom , created_at)
VALUES ('Fairway','2020-09-22 11:44:15'); 
INSERT INTO statistiques (user_id  , fairway , gir , puts , diving_accuracy , "sandSaves" , ss )
VALUES (6 , 25 , 23 , 65 , 44 , 66 , 47);



