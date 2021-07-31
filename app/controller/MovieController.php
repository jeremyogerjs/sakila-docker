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
}