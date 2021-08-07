<?php
require('./app/models/Movie.php');
class MovieController
{

    public function index()
    {
        $movie = new Movie();
        
        $data = $movie -> all();

        require('./views/movies.php');
    }
    public function show()
    {
        $movie = new Movie();
        
        $data = $movie -> whereBy($_GET['store']);

        require('./views/movies.php');
    }

    public function search()
    {

        $movie = new Movie();
        $query = htmlspecialchars($_POST['query']);
        $data = $movie -> findBy($_GET['store'],$query);

        require('./views/movies.php');

    }
}