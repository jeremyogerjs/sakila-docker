<?php
require('./app/models/Rental.php');
require('./app/models/Customer.php');
require_once('./app/models/User.php');
require_once('./app/controller/Controller.php');

class RentalController extends Controller
{
    public function index()
    {
        $rental = new Rental([],$this -> getDB());
        $rentals = $rental -> all();

        $this -> render('rental.rentals',compact('rentals'));
    }
    /**
     * 
     * @param int id of rental
     */
    public function show($id)
    {
        $rental = new Rental([],$this -> getDB());
        $rentals = $rental -> findBy($id,"r.rental_id = ",false);

        $this -> render('rental.rental',compact('rentals'));
    }
    public function edit($id)
    {
        // $rental = new Rental($_POST,$this ->getDB());

        // $rental -> update($id);

        // header("Location:/location");
    }
    /**
     * 
     * @param int id of film
     */
    public function create($id)
    {
        $movies = new Movie($this -> getDB());
        $customer = new Customer($this -> getDB());
        $user = new User([],$this -> getDB());

        $staff = $user -> all();
        $customers = $customer -> all();
        $movie = $movies ->show($id);

        $this -> render('rental.rentalForm',compact('staff','customers','movie'));
        //renvoie le formulaire vide avec la liste des customer
    }
    /**
     * @param string id of film
     * 
     */
    public function store()
    {

        $rental = new Rental($_POST,$this -> getDB());
        $rental -> store();

        header("Location:/location");
    }
}
