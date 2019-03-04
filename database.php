<?php

/**
 * Permet de récupérer une connexion à la base de données
 *
 * @return PDO
 */
function getPDO() : PDO
{
    $bdd = new PDO("mysql:host=localhost;dbname=blog;charset=utf8", "root", "troiswa", [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
    //pour configurer PDO et decider de personnaliser les attributs de PDO et ici par exemple affiches les erreurs
    return $bdd;
}
/**
 *Permet de récupérer la liste des articles
 *
 * @return array
 */
function getArticles()
{
    $bdd = getPDO();

    $sql = "SELECT art.id, title, art.content, art.creation_date, firstname, lastname, type, count(comments.id) as commentaires 
FROM `articles`AS art JOIN authors AS aut on art.author_id = aut.id 
JOIN categories AS cat on art.category_id = cat.id 
LEFT JOIN comments on art.id = comments.article_id group by art.id 
ORDER BY creation_date DESC";
    $query = $bdd->prepare($sql);
    $query->execute();
    $articles = $query->fetchAll(PDO::FETCH_ASSOC);
    return $articles;
}

function getArticle($id)
{

    $bdd = getPDO();
// $bdd = new PDO("mysql:host=localhost;dbname=blog;charset=utf8", "root", "troiswa");
    $sql = "SELECT art . id, title, art . content, art.category_id, art.author_id, art . creation_date, firstname, lastname, type, count(comments . id) as commentaires
    FROM `articles` as art JOIN authors as aut on art . author_id = aut . id
    JOIN categories as cat on art . category_id = cat . id
    LEFT JOIN comments on art . id = comments . article_id
    WHERE art . id = :id
    group by art . id
    ORDER BY creation_date DESC";
    //ON UTILISE LEFT JOIN POUR FAIRE REMONTER des infos meme si elles ne sont pas dans la table qui les lient 
// ici on a pas de commentaires quand on crée l'article mais il remontera quand même grâce à left join
    $query = $bdd->prepare($sql);
    $query->execute([":id" => $id]);
    $article = $query->fetch(PDO::FETCH_ASSOC);
    return $article;
}

/**
 * Permet de récupérer les commentaires d'un article
 *
 * @return void
 */
function getComments($id)
{
    $bdd = getPDO();
    $bdd = new PDO("mysql:host=localhost;dbname=blog;charset=utf8", "root", "troiswa");
    $sql = "SELECT c . nickname, c . creation_date, c . content, art . id
    FROM `comments` as c
    JOIN articles as art on art . id = c . article_id
    WHERE art . id = :id";
    $query = $bdd->prepare($sql);
    $query->execute([":id" => $id]);
    $commentaires = $query->fetchAll(PDO::FETCH_ASSOC);
    return $commentaires;
}
/**
 * Undocumented function
 *
 * @param string $nickname
 * @param string $comment
 * @param int $articleid
 * @return void
 */
function insertComment($nickname, $comment, $articleid)
{
    $pdo = getPDO();
    $query = $pdo->prepare('INSERT INTO comments SET 
nickname = :nickname,
content = :comment,
article_id = :articleid,
creation_date = :creation_date');
    $query->execute([
        ':nickname' => $nickname,
        ':comment' => $comment,
        ':articleid' => $articleid,
        ':creation_date' => date('Y-m-d H:i:s')
    ]);
}

function getCategorie()
{
    $bdd = getPDO();
    $sql = "SELECT * FROM `categories`";
    $query = $bdd->prepare($sql);
    $query->execute();
    $categories = $query->fetchALL(PDO::FETCH_ASSOC);
    return $categories;
}
function getAuthors()
{
    $bdd = getPDO();
    $sql = "SELECT * FROM `authors`";
    $query = $bdd->prepare($sql);
    $query->execute();
    $authors = $query->fetchALL(PDO::FETCH_ASSOC);
    return $authors;
}

function insertArticle($title, $categories, $authors, $content)
{
    $pdo = getPDO();
    $query = $pdo->prepare('INSERT INTO articles SET
title= :title,
category_id= :category_id,
author_id= :author_id,
content= :content,
creation_date= :creation_date');
    $query->execute([
        ':title' => $title,
        ':category_id' => $categories,
        ':author_id' => $authors,
        ':content' => $content,
        ':creation_date' => date('Y-m-d H:i:s')
    ]);
}

function updateArticle($title, $categories, $authors, $content, $id)
{
    $pdo = getPDO();
    $query = $pdo->prepare('UPDATE articles SET 
title= :title, 
category_id= :category_id,
author_id=:author_id,
content=:content WHERE articles.id=:id');
    $query->execute([
        ':title' => $title,
        ':category_id' => $categories,
        ':author_id' => $authors,
        ':content' => $content,
        ':id' => $id
    ]);
}

function deleteComment($id)
{
    $pdo = getPDO();
    $query = $pdo->prepare('DELETE FROM comments WHERE article_id=:id');
    $query->execute([
        ':id' => $id
    ]);

}
function deleteArticle($id)
{
    $pdo = getPDO();
    $query = $pdo->prepare('DELETE FROM articles WHERE id=:id');
    $query->execute([
        ':id' => $id
    ]);
}
?>