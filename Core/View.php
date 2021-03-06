<?php
namespace Ideal\Core;

class View
{
    /* @var $twig \Twig_Environment */
    protected $templater;
    protected $template;
    protected $vars = array();


    public function __construct($pathToTemplates, $isCache = false)
    {
        // Подгружаем Twig
        require_once 'Library/Twig/Autoloader.php';
        \Twig_Autoloader::register();

        $loader = new \Twig_Loader_Filesystem($pathToTemplates);

        $config = Config::getInstance();
        $params = array();
        if ($isCache) {
            $params['cache'] = DOCUMENT_ROOT . $config->templateCachePath;
        }
        $this->templater = new \Twig_Environment($loader, $params);
    }


    public function loadTemplate($fileName)
    {
        $this->template = $this->templater->loadTemplate($fileName);
    }


    public function render()
    {
        return $this->template->render($this->vars);

    }


    public function __get($name)
    {
        if (isset($this->vars[$name])) {
            return $this->vars[$name];
        }
        return '';
    }


    public function __set($name, $value)
    {
        $this->vars[$name] = $value;
    }

}
