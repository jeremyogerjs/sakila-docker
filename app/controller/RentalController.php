<?php
require_once('./app/models/Rental.php');
require_once('./app/models/Movie.php');
require_once('./app/models/Customer.php');
require_once('./app/models/Payment.php');
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
     * @return view of form with data for select
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

        $idRental = $rental -> store($id);

        $movies = new Movie($this ->getDB());
        $movie = $movies ->show($id);
        $amount = $movie[0]->rental_rate;

        $paiment = [
            "staff_id" => intval($_POST['staff_id']),
            "customer_id" => intval($_POST['customer_id']),
            "payment_date" => $_POST['rental_date'],
            "amount" => floatval($amount),
            "rental_id" => intval($idRental)
        ];

        $payment = new Payment($paiment,$this ->getDB());
        $payment->store();
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
