<?php

/**
 * Class App
 * @author Eric Dupertuis
 * @author Maxime Barras
 * @author Michel Cruz
 * @date 04.11.2016
 */
class App
{

    private $config;

    private $flash = [];

    public function __construct($config)
    {
        $this->config = $config;
    }

    public function render($app)
    {
        include_once $this->config['app']['app_dir'].'pages/incs/head.php';
        include_once $this->config['app']['app_dir'].'pages/incs/footer.php';
    }

    public function addFlash($type, $message)
    {
        $this->flash = ['type' => $type, 'message' => $message];
    }

    public function getFlash()
    {
        return $this->flash;
    }

    public function redirect($route) {
        header('Location: /'.$route);
        die();
    }

    /**
     * @return mixed
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * @param mixed $config
     */
    public function setConfig($config)
    {
        $this->config = $config;
    }
}
