<?php
class Article {
  private $annotation;
  private $citation;
  private $autors;
  private $keywords;
  private $references;

  public function __construct($annotation, $citation, $autors, $keywords, $references) {
    $this->annotation = $annotation;
    $this->citation = $citation;
    $this->autors = $autors;
    $this->keywords = $keywords;
    $this->references = $references;
  }

  public function getAnnotation() {
    return $this->annotation;
  }

  public function getCitation() {
    return $this->citation;
  }

  public function getAutors() {
    return $this->autors;
  }

  public function getKeywords() {
    return $this->keywords;
  }

  public function getReferences() {
    return $this->references;
  }
}

class Journal {
  private $name;
  private $articles;
  private $cover;

  public function __construct($name, $articles, $cover) {
    $this->name = $name;
    $this->articles = $articles;
    $this->cover = $cover;
  }

  public function getName() {
    return $this->name;
  }

  public function getArticles() {
    return $this->articles;
  }

  public function getCover() {
    return $this->cover;
  }
}
?>
