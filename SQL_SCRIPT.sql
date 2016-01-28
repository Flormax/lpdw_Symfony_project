use symfonyblog;

INSERT INTO role (id, name)
VALUES 
(1, 'ADMIN'), 
(2, 'USER');

INSERT INTO user (mailAdress, password, roleId)
VALUES 
("max@mail.fr", "mdp", 1),
("xam@mail.fr", "mdp2", 2);

INSERT INTO category (id, name)
VALUES 
(1, "TRANCE FESTIVALS"),
(2, "TRANCE ONE NIGHT EVENT");

INSERT INTO tag (id, name)
VALUES 
(1, "trance"),
(2, "goa");

INSERT INTO article (title, content, userId, categoryId)
VALUES 
('BOOM', 'Boom festival trance gathering in portugal !', 1, 1),
('OZORA', 'Ozora festival trance gathering in hongrie !', 1, 1);

INSERT INTO articleTag (articleId, tagId)
VALUES 
(1, 1),
(1, 2);

-- -----------------------------------------------------------------------

DELETE from article where id >= 1;
DELETE from tag where id >= 1;
DELETE from category where id >= 1;
DELETE from user where id >= 1;
DELETE from articleTag where id >= 1;

DROP TABLE article;
DROP TABLE user;
DROP TABLE tag;
DROP TABLE category;
DROP TABLE role;
DROP TABLE articleTag;