<?php

    abstract class BaseController {

        protected $app;

        public function __construct(){
            $this->app = App::Get();
        }

        protected function render(string $path, array $data = []): string {
            $twig = $this->app->getTwig();
            $template = $twig->load($path);

            return $template->render($data);
        }

        protected function getAuth(){
            return $this->app->getAuth();
        }
    }