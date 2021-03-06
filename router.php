<?php

class router
{
    
    private $routing = [

        "/body" =>                  ['controller' => "Student", 'action' => 'body'],
        "/add_admin1" =>            ['controller' => "Student", 'action' => 'add_admin1'],
        "/admin" =>                 ['controller' => "Student", 'action' => 'admin'],
        "/xxx" =>                   ['controller' => "Student", 'action' => 'xxx'],
        "/purchase" =>              ['controller' => "Student", 'action' => 'purchase'],
        "/authorization1" =>        ['controller' => "Student", 'action' => 'authorization1'],
        "/edit1" =>                 ['controller' => "Student", 'action' => 'edit1'],
        "/edit3" =>                 ['controller' => "Student", 'action' => 'edit3'],
        "/clear" =>                 ['controller' => "Student", 'action' => 'clear'],
        "/sessionexit" =>           ['controller' => "Student", 'action' => 'sessionexit'],
        "/delete" =>                ['controller' => "Student", 'action' => 'delete'],
        "/delete_users" =>          ['controller' => "Student", 'action' => 'delete_users'],
        "/user_authorization1" =>   ['controller' => "Student", 'action' => 'user_authorization1'],
        "/user_registration1" =>    ['controller' => "Student", 'action' => 'user_registration1'],

        ];
        
    private $route = null;
    
    function __construct() {
        $this->route = urldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
        
        if(!isset($this->routing[$this->route])){
            header("Location: body");
            die();
        }
   }
    
    
    public function start()
    {
        if(isset($this->routing[$this->route])){
            $route = $this->routing[$this->route];
            
            $controller = 'Controller\\' . $route['controller'] . 'Controller';
            $controller_obj = new $controller();
            return $controller_obj->$route['action']();
        }
    }
}
