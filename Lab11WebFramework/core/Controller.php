<?php
class Controller {
    public function view($viewPath, $data = []) {
        extract($data);
        include __DIR__ . '/../templates/header.php';
        include $viewPath;
        include __DIR__ . '/../templates/footer.php';
    }
}
