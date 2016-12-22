CREATE DATABASE IF NOT EXISTS test_kulina;
USE test_kulina;

DROP TABLE IF EXISTS users;
DROP TABLE IF EXISTS review;
CREATE TABLE users (
  id int(10) unsigned NOT NULL AUTO_INCREMENT,
  name varchar(255),
  email varchar(255),
  password varchar(255),
  remember_token varchar(100),
  created_at timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  updated_at timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (id),
  UNIQUE KEY users_email_unique (email)
);

CREATE TABLE review (
  id int(10) unsigned NOT NULL AUTO_INCREMENT,
  order_id int(10) unsigned NOT NULL,
  product_id int(10) unsigned NOT NULL,
  user_id int(10) unsigned NOT NULL,
  review varchar(255),
  rating float(2,1) NOT NULL,
  CONSTRAINT rating_type CHECK (rating >= 0 AND rating <= 5),
  created_at timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  updated_at timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (id),
  FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE ON UPDATE CASCADE
);

INSERT INTO users(name, email, password) VALUES('Rizqy Faishal','rizqyfaishal@hotmail.com','$2y$10$ZLSIicJlJ4Qp7NQpRLyFIuzeob/vzxJrMz3h259Q2f4EAruF6Nlie');

  
