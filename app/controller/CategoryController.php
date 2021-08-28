<?php
require_once('./app/models/Category.php');
require_once('./app/controller/Controller.php');

class CategoryController extends Controller
{

    public function index()
    {
        $categorie = new Category($this->getDB());

        $categorie->all(['f.title', 'c.name']);
    }
}
