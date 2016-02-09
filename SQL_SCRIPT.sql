use symfonyblog;

INSERT INTO role (id, name)
VALUES 
(1, 'ADMIN'), 
(2, 'USER');

INSERT INTO user (use_mailAdress, use_password, use_roleId, use_username)
VALUES 
("max@mail.fr", "mdp", 1, "zywo"),
("xam@mail.fr", "mdp2", 2, "kaoumyla");

INSERT INTO category (cat_id, cat_name)
VALUES 
(1, "Festival"),
(2, "One night event"),
(3, "Album release"),
(4, "Artist presentation");

INSERT INTO tag (tag_id, tag_name)
VALUES 
(1, "Progressive"),
(2, "Hitech"),
(3, "Full On"),
(4, "Swamp"),
(5, "Forest"),
(6, "Psytrance");

INSERT INTO article (art_title, art_content, art_userId, art_categoryId)
VALUES 
('BOOM', 'Boom festival trance gathering in portugal !', 7, 1),
('OZORA', 'Ozora festival trance gathering in hongrie !', 8, 1);

INSERT INTO article_tag (arttag_article_id, artag_tag_id)
VALUES 
(4, 7),
(4, 8);

-- -----------------------------------------------------------------------

DELETE from article where art_id >= 1;
DELETE from tag where tag_id >= 1;
DELETE from category where cat_id >= 1;
DELETE from user where use_id >= 1;
DELETE from articleTag where id >= 1;

DROP TABLE article;
DROP TABLE user;
DROP TABLE tag;
DROP TABLE category;
DROP TABLE role;
DROP TABLE article_tag;