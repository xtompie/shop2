<?php

interface CategoryCollection {}
interface Category {
    public function subCategories(): CategoryCollection;
}

interface ArticleCollection {}
interface Article {

}
interface ArticleRepository {
    public function findById(string $id): ?Article;
    public function findAll(array $predicates, $order, $limit, $offset): ArticleCollection;
}
interface ArticleComment {
}
interface ArticleCommentCollection {}
interface ArticleCommentRepository {
    public function findAllForArticleId(string $id, $limit, $offset): ArticleCommentCollection;

}