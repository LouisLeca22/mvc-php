<?php 

declare(strict_types=1);
namespace App;

use App\Exceptions\ViewNotFoundExcpetion;

class View {
    public function __construct(protected string $view, protected array $params = []){

    }

    public static function make (string $view, array $params = []){
        return new static($view, $params);
    }

    public function render(): string{
        $viewPath = VIEW_PATH.'/'.$this->view.'.php';

        if(!file_exists($viewPath)){
            throw new ViewNotFoundExcpetion();
        }
        ob_start();

        extract($this->params);

        include $viewPath ;

        return (string) ob_get_clean();
    }

    public function __toString()
    {
        return $this->render();
    }

    public function __get($name)
    {
        return $this->params[$name] ?? null;
    }
}

?>