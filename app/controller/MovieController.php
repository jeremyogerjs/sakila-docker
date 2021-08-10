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

        $this ->render('movies',compact('data','categories','store'));
    }
    /**
     * 
     * @param int id of store
     */
    public function filterByStore($id)
    {
        $category = new Category($this -> getDB());
        $categories = $category -> all();

        $stores = new Store($this -> getDB());
        $store = $stores ->all();
        
        $movie = new Movie($this -> getDB());
        $store_id = htmlspecialchars($id);
        $data = $movie -> whereBy($store_id,'i.store_id');

        $this ->render('movies',compact('data','categories','store'));
    }

    public function filterByCategory()
    {
        $category = new Category($this -> getDB());
        $categories = $category -> all();

        $stores = new Store($this -> getDB());
        $store = $stores ->all();

        $movie = new Movie($this -> getDB());
        $categorie = htmlspecialchars($_POST['categorie']);

        $data = $movie -> whereBy($categorie,'c.category_id');

        $this ->render('movies',compact('data','categories','store'));
    }


    public function search()
    {
        $category = new Category($this -> getDB());
        $categories = $category -> all();

        $stores = new Store($this -> getDB());
        $store = $stores ->all();

        $movie = new Movie($this -> getDB());
        $query = htmlspecialchars($_POST['query']);

        $data = $movie -> findBy($query);
    
        $this ->render('movies',compact('data','categories','store'));

    }
    /**
     * 
     * @param int id of film
     */
    public function show($id)
    {
        $movie = new Movie($this -> getDB());

        $data = $movie -> show($id);

        $this -> render('movie',compact('data'));
    }
}