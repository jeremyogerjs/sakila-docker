<?php
require('./app/models/Movie.php');
require('./app/models/Category.php');
require('./app/models/Store.php');
require_once('./app/controller/Controller.php');

class MovieController extends Controller
{
    public function index()
    {
        $category = new Category($this -> getDB());
        $categories = $category -> all();

        $stores = new Store($this -> getDB());
        $store = $stores ->all();

        $movie = new Movie($this -> getDB());
        $data = $movie -> all();

        $this ->render('movie.movies',compact('data','categories','store'));
    }

    public function search()
    {
        $category = new Category($this -> getDB());
        $categories = $category -> all();

        $stores = new Store($this -> getDB());
        $store = $stores ->all();

        $movie = new Movie($this -> getDB());
        $query = htmlspecialchars($_POST['query']);

        if($_POST['disponible'] === 'all' && $_POST['categorie'] !== '')
        {
            $data = $movie -> searchAllBy($query,htmlspecialchars($_POST['categorie']),' = '); 
            $this ->render('movie.movies',compact('data','categories','store')); 
        }
        else if($_POST['disponible'] === 'all' && $_POST['categorie'] === "")
        {
            $data = $movie -> searchAllBy($query,htmlspecialchars($_POST['categorie']),' != '); 
            $this ->render('movie.movies',compact('data','categories','store')); 
        }
        else if($_POST['disponible'] === 'louer' && $_POST['categorie'] !== '')
        {
            $data = $movie -> searchBy($query,htmlspecialchars($_POST['categorie']),' = ',' IS NULL '); 
            $this ->render('movie.movies',compact('data','categories','store')); 
        }
        else if($_POST['disponible'] === 'louer' && $_POST['categorie'] === '')
        {
            $data = $movie -> searchBy($query,htmlspecialchars($_POST['categorie']),' != ',' IS NULL '); 
            $this ->render('movie.movies',compact('data','categories','store')); 
        }
        else if($_POST['disponible'] === 'disponible' && $_POST['categorie'] !== '')
        {
            $data = $movie -> searchBy($query,htmlspecialchars($_POST['categorie']),' = ',' IS NULL ');
            $this ->render('movie.movies',compact('data','categories','store')); 
        }
        else if($_POST['disponible'] === 'disponible' && $_POST['categorie'] === '')
        {
            $data = $movie -> searchBy($query,htmlspecialchars($_POST['categorie']),' != ',' IS NOT NULL '); 
            $this ->render('movie.movies',compact('data','categories','store')); 
        }


        // $data = $movie -> searchBy($query); // a compléter 
    
        // $this ->render('movie.movies',compact('data','categories','store'));

    }
    /**
     * 
     * @param int id of film
     */
    public function show($id)
    {
        $movie = new Movie($this -> getDB());

        $data = $movie -> show($id);

        $this -> render('movie.movie',compact('data'));
    }
}