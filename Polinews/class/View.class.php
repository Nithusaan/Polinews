<?php

class View
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }
    
    public function renderPage()
    {
        $message = $this->startHTML();
        $message .= $this->createHead();
        $message .= $this->createNav();
        $message .= $this->createBody();
        $message .= $this->createFooter();
        $message .= $this->endHTML();
        return $message;
    }

    public function startHTML()
    {
        $message = '<!DOCTYPE html>
                    <html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">';
        return $message;
    }

    public function createHead()
    {
        $message = '';
        return $message;
    }

    public function createNav()
    {
        $message = '';
        return $message;
    }

    public function createBody()
    {
        $message = '';
        return $message;
    }
    
    public function createFooter()
    {
        $message = '';
        return $message;
    }
    
    public function endHTML()
    {
        $message = '</body></html>';
        return $message;
    }

    public function __toString()
    {
        $message = $this->renderPage();
        return $message;
    }
}
?>
