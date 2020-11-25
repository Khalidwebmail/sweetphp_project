<?php

/**
 * Core class
 * Create url and load controller
 * URL pattern - /controller/method/?params
 * @property $controller load current controller
 * @property $method load current method
 * @property $params contain given data with view
 * but it is optional
 */
class Core {
    private $controller = "HomeController";
    private $method = "index";
    private $params = [];
    private $url;

    public function __construct()
    {
        $this->getUrl();
        $this->checkController();
    }
    
    /**
     * getUrl
     *
     * @return $url
     */
    private function getUrl()
    {
        if(isset($_GET["url"]))
        {
            $this->url = rtrim($_GET['url'], '/');
            $this->url = filter_var($this->url, FILTER_SANITIZE_URL);
            $this->url = explode('/', $this->url);
            return $this->url;
        }
    }
    
    /**
     * checkController
     *
     * @return void
     */
    private function checkController()
    {
        if(isset($this->url[0]) && file_exists("../app/Controllers/".ucwords($this->url[0]).".php"))
        {
            $this->controller = ucwords($this->url[0]);
            unset($this->url[0]);
        }
        require_once "../app/Controllers/".$this->controller.".php";
        $this->controller = new $this->controller();

        $this->checkMethod();
    }

    private function checkMethod()
    {
        if(isset($this->url[1]) && method_exists($this->controller, $this->url[1]))
        {
            $this->method = $this->url[1];
            unset($this->url[1]);
        }
        // Get params - Any values left over in url are params
        $this->params = $this->url ? array_values($this->url) : [];

        // Call a callback with an array of parameters
        call_user_func_array([$this->controller, $this->method], $this->params);
    }
}