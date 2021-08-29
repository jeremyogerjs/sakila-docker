<?php
require_once('./app/models/Movie.php');
require_once('./app/models/Category.php');
require_once('./app/models/Actor.php');
require_once('./app/models/Store.php');
require_once('./app/controller/Controller.php');

class MovieController extends Controller
{
    public function index()
    {
        $this->isAuth();
        $category = new Category($this->getDB());
        $categories = $category->all();

        $movie = new Movie($this->getDB());
        $data = $movie->all();

        $this->render('movie.movies', compact('data', 'categories'));
    }

    public function search()
    {
        $this->isAuth();

        $category = new Category($this->getDB());
        $categories = $category->all();

        $movie = new Movie($this->getDB());
        $query = htmlspecialchars($_POST['query']);

        if ($_POST['categorie'] !== '') {
            $data = $movie->searchBy($query, htmlspecialchars($_POST['categorie']), ' = ', '>');
            $this->render('movie.movies', compact('data', 'categories'));
        } else if ($_POST['categorie'] === "") {
            $data = $movie->searchBy($query, htmlspecialchars($_POST['categorie']), ' != ');
            $this->render('movie.movies', compact('data', 'categories'));
        }
    }
    /**
     * 
     * @param int id of film
     * 
     */
    public function show($id)
    {
        $this->isAuth();

        $movie = new Movie($this->getDB());
        $actor = new Actor($this->getDB());

        $data = $movie->show($id);
        $actors = $actor->findBy($id);

        $this->render('movie.movie', compact('data', 'actors'));
    }
}
