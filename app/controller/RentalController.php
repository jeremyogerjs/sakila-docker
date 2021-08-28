<?php
require('./app/models/Rental.php');
require('./app/models/Customer.php');
require_once('./app/models/User.php');
require_once('./app/controller/Controller.php');

class RentalController extends Controller
{
    public function index()
    {
        $this->isAuth();

        $rental = new Rental([], $this->getDB());
        $rentals = $rental->all();
        $this->render('rental.rentals', compact('rentals'));
    }
    /**
     * 
     * @param int id of rental
     */
    public function show($id)
    {
        $this->isAuth();

        $rental = new Rental([], $this->getDB());
        $rentals = $rental->findBy($id, "r.rental_id = ", false);

        $this->render('rental.rental', compact('rentals'));
    }
    public function edit($id)
    {
        $this->isAuth();

        $rental = new Rental([], $this->getDB());

        $rentals = $rental->findBy($id, "r.rental_id = ", false);

        $this->render('rental.endRental', compact('rentals'));
    }
    public function update($id)
    {

        $this->isAuth();

        $rental = new Rental($_POST, $this->getDB());

        $rental->update($id);

        header("location:/locations");
    }
    /**
     * 
     * @param int id of film
     */
    public function create($id)
    {
        $this->isAuth();

        $movies = new Movie($this->getDB());
        $customer = new Customer($this->getDB());
        $user = new User([], $this->getDB());

        $staff = $user->all();
        $customers = $customer->all();
        $movie = $movies->show($id);

        $this->render('rental.createRental', compact('staff', 'customers', 'movie'));
        //renvoie le formulaire vide avec la liste des clients
    }

    public function store($id)
    {
        $this->isAuth();

        $rental = new Rental($_POST, $this->getDB());
        $rental->store($id);

        header("Location:/locations");
    }
    public function search()
    {
        $this->isAuth();

        $rental = new Rental([], $this->getDB());
        $query = htmlspecialchars($_POST['query']);
        $rentals = $rental->searchBy($query);

        $this->render('rental.rentals', compact('rentals'));
    }
}
