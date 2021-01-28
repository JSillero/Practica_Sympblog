<?php

include_once('blog.php'); 
require_once('./DBAbstractModel.php');

class Comment extends DBAbstractModel{
    private $id;
    private $user;
    private $comment;
    private $blog;/* Alamcena un entero que es el ID del blog asociado. */
    private $created;

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

    public function guardarenBD() {
        $this->query = "INSERT INTO comment(user, comment, blog )
        VALUES(:user, :comment, :blog )";
        $this->parametros['user']= $this->user;
        $this->parametros['comment']= $this->comment;
        $this->parametros['blog']= $this->blog;
/*    A VER QUE HACEMOS CON LOS VALORES dATE     $this->parametros['created']= $this->author;
 */                
        $this->execute_single_query();
        $this->get_results_from_query();
        
        $this->id = $this->lastInsert();
        
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

    public function setUser($user){
        $this->user = $user;
    }

    public function setComment($comment){
        $this->comment = $comment;
    }

    public function setBlog($blog){
        $this->blog = $blog->getId();
    }

    public function getBlog(){
        return $this->blog;
    }
    

    public function setCreated($created){
        $this->created = $created;
    }
    public function getId(){
        return $this->id;
    }
}

?>