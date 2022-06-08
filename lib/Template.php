<?php 
class Template{
    protected $template;
    protected $vars = array();

    public function __construct($template)
    {
        $this->template = $template;
    }
    public function __get($id)
    {
        return $this->vars[$id];
    }
    public function __set($id, $value)
    {
        $this->vars[$id] = $value;
    }
    public function __toString()
    {   
        extract($this->vars);
        chdir((dirname($this->template)));
        ob_start();
        include basename($this->template);
        return ob_get_clean();
    }
}
?>