<?php

/* include_once('./comment.php');
 */require_once('./DBAbstractModel.php');

class Blog extends DBAbstractModel{
    private static $incrementador=0;

    public $id;
    public $title;
    public $blog;
    public $image;
    public $author;
    public $tags;
    public $created_at;/* Objeto tipo DateTime? */
    public $updated_at;/* Objeto tipo DateTime ?*/
    public $comments= array();/* Array de objetos Comment */

    /* Modelo singleton. */
    private static $instancia;
    public static function getInstancia()
    {
        if (!isset(self::$instancia)) {
            $miclase = __CLASS__;
            self::$instancia = new $miclase;
        }
    }
    public function __clone()
    {
        trigger_error('La clonación no es permitida!.', E_USER_ERROR);
    }

    /*método para ver la implementación utilizando
    el mecanismo de cargar los datos en la entidad y luego
    persistirlos.
    */
    public function guardarenBD() {
        $this->query = "INSERT INTO blogs(title, blog, image ,author , tags )
        VALUES(:title, :blog, :image, :author, :tags )";
        //$this->parametros['id']= $id;
        $this->parametros['title']= $this->title;
        $this->parametros['blog']= $this->blog;
        $this->parametros['image']= $this->image;
        $this->parametros['author']= $this->author;
        $this->parametros['tags']= $this->tags;
        /* HACER LA FECHA STRING??? O PASARLA A STRING $this->parametros['created_at']= $this->created_at;
        $this->parametros['updated_at']= $this->updated_at; */
        
        $this->execute_single_query();
        $this->get_results_from_query();
        
        $this->id = $this->lastInsert();
        
        foreach ($this->comments as $comment) {
            $comment->setBlog($this);
        }
        
        $this->mensaje = 'Blog añadido.';
    }
    /* get set edit delete sin implementar */
    public function get(){
        echo"a";
    }
    public function set(){
        echo"a";
    }
    public function edit(){
        echo"a";
    }
    public function delete(){
        echo"a";
    }

    public function __construct(){
/*         $this->id = Blog::$incrementador++;
 */        $this->created_at =(new DateTime());
        $this->updated_at = $this->created_at;
        $this->comment = array();
    }

    public function setTitle($title){
        $this->title=$title;
    }

    public function setAuthor($author){
        $this->author=$author;
    }

    public function setBlog($blog){
        $this->blog=$blog;
    }

    public function setImage($image){
        $this->image=$image;
    }

    public function setTags($tags){
        $this->tags=$tags;
    }

    /**
     * Almacena un objeto ded tipo DateTime
     */
    public function setCreated($created){
        $this->created_at=$created;
    }

    public function getCreated(){
        return $this->created_at;
    }

    /**
     * Almacena un objeto ded tipo DateTime
     */
    public function setUpdated($updated){
        $this->updated_at=$updated;
    }

    /* Añade un comentario al array de comentarios */
    public function addComment($comment){
        array_push($this->comments,$comment);
    }

    public function getId(){
        return $this->id;
    }
}



?>