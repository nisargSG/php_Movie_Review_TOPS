
DROP TABLE user;
DROP TABLE movies;
DROP TABLE review;


CREATE TABLE user(id INT AUTO_INCREMENT PRIMARY KEY,name VARCHAR(32),email VARCHAR(32) UNIQUE,password VARCHAR(16));
CREATE TABLE movies(id INT AUTO_INCREMENT PRIMARY KEY,title VARCHAR(32),description VARCHAR(128),release_date DATE,image VARCHAR(64));
CREATE TABLE review(id INT AUTO_INCREMENT PRIMARY KEY, movie_id INT, user_id INT, rating INT,comment VARCHAR(128))

INSERT INTO user(name,email,password) VALUES("User 1","user1@gmail.com","1234"),("User 2","user2@gmail.com","1234");
INSERT INTO movies(title,description,release_date,image) VALUES("title1","desc1","2024-01-01","1.png"),("title2","desc2","2023-01-01","2.png");

select user.id, user.name , review.user_id, review.movie_id,review.rating from user inner join review on user.id = review.user_id where user.id=1 order by user.id;
