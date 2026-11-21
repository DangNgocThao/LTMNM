<?php
class Comment
{
    public $id;
    public $name;
    public $cm;

    public function __construct($id, $name, $cm)
    {
        $this->id = $id;
        $this->name = $name;
        $this->cm = $cm;
    }

    public static function addComment($id, $name, $cm)
    {
        $data = $_SESSION['comment'];
        $t = new Comment($id, $name, $cm);
        $data[] = $t;
        $_SESSION['comment'] = $data;
    }
}
