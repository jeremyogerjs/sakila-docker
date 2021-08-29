<?php
require_once('./app/models/Rental.php');
require_once('./app/models/Movie.php');
require_once('./app/models/Customer.php');
require_once('./app/models/Payment.php');
require_once('./app/models/User.php');
require_once('./app/controller/Controller.php');

class RentalController extends Controller
{   
    /**
     * get all rentals
     * 
     * @return view
     * 
     * 
     */
    public function index()
    {
        $this->isAuth();

        $rental = new Rental([], $this->getDB());
        $rentals = $rental->all();
        $this->render('rental.rentals', compact('rentals'));
    }
    /**
     * get rental by id
     * 
     * @param int id of rental
     * @return view
     * 
     * 
     */
    public function show($id)
    {
        $this->isAuth();

        $rental = new Rental([], $this->getDB());
        $rentals = $rental->findBy($id, "r.rental_id = ", false);

        $this->render('rental.rental', compact('rentals'));
    }
    /**
     * update rental by id
     * 
     * @param int -- id de la location
     * @return view
     * 
     * 
     */
    public function edit($id)
    {
        $this->isAuth();

        $rental = new Rental([], $this->getDB());

        $rentals = $rental->findBy($id, "r.rental_id = ", false);

        $this->render('rental.endRental', compact('rentals'));
    }

    /**
     * 
     * update rental by id
     * 
     * 
     * @param int -- id de la location
     * @return void
     * 
     */
    public function update($id)
    {

        $this->isAuth();

        $rental = new Rental($_POST, $this->getDB());

        $rental->update($id);

        header("location:/locations");
    }
    /**
     * render form for create rental
     * 
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

    /**
     * save new rental in db and new payment in db
     * 
     * 
     * @param int -- id de la location
     * @return void 
     * 
     * 
     */
    public function store($id)
    {
        $this->isAuth();
        $rental = new Rental($_POST, $this->getDB());

        $idRental = $rental -> store($id);

        $movies = new Movie($this ->getDB());
        $movie = $movies ->show($id);
        $amount = $movie[0]->rental_rate;

        //creer le paiement
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
    /**
     * 
     * search rental by query
     * 
     * @return view
     * 
     * 
     */
    public function search()
    {
        $this->isAuth();

        $rental = new Rental([], $this->getDB());
        $query = htmlspecialchars($_POST['query']);
        $rentals = $rental->searchBy($query);

        $this->render('rental.rentals', compact('rentals'));
    }
}
