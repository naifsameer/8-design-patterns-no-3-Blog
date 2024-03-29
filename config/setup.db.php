<?php


require __DIR__ . ('/../Database.php');


$db = new \app\Database();

// create categories table
$db->createTable("categories", [
  "name" => "varchar(255) NOT NULL"
]);


// create posts table
$db->createTable("posts", [
  "title" =>  "varchar(255) NOT NULL",
  "image" => "varchar(255) NOT NULL",
  "content" => "varchar(255) NOT NULL",
  "author_id" => "int(12) NOT NULL",
  "category_id" =>  "int(12) NOT NULL",
  "created_at" => "date NOT NULL",
]);



// create users table
$db->createTable("users", [
  "name" =>  "varchar(255) NOT NULL",
  "email" => "varchar(100) NOT NULL",
  "password" => "varchar(50) NOT NULL"
]);


// add foreign key :)
$db->query("ALTER TABLE `posts`
    ADD CONSTRAINT `fk_author_post` FOREIGN KEY IF NOT EXISTS (`author_id`)
      REFERENCES `users` (`usersID`),

    ADD CONSTRAINT `fk_category_post` FOREIGN KEY IF NOT EXISTS (`category_id`)
      REFERENCES `categories` (`categoriesID`);
    COMMIT;
");
