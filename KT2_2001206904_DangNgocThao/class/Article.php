<?php
class Article
{
    public $id;
    public $title;
    public $content;
    public $date;
    public $image;

    public function __construct($id = 0, $title = '', $content = '', $date = '', $image = '')
    {
        $this->id = $id;
        $this->title = $title;
        $this->content = $content;
        $this->date = $date;
        $this->image = $image;
    }

    public static function getAll($filename)
    {
        $lines = explode("\n", file_get_contents($filename));
        $headers = str_getcsv(array_shift($lines));
        $data = array();
        foreach ($lines as $line) {
            $article = new Article();

            foreach (str_getcsv($line) as $key => $field)
                $article->{$headers[$key]} = $field;

            $data[] = $article;
        }
        return $data;
    }

    public static function getOneByID($data, $id)
    {
        foreach ($data as $product) {
            if ($product->id == $id) {
                return $product;
            }
        }
        return null;
    }
}
