<?php
require_once('./app/models/Customer.php');
require_once('./app/controller/Controller.php');

class CustomerController extends Controller
{

    /**
     * 
     * get all customer
     * 
     * @return view
     * 
     * 
     */
    public function index()
    {
        $this->isAuth();

        $customer = new Customer($this->getDB());
        $data = $customer->all();

        $this->render('customer.customers', compact('data'));
    }

    /**
     * 
     * get customer by id
     * 
     * @param int $id id of customer
     * @return view
     * 
     * 
     */
    public function show($id)
    {
        $this->isAuth();

        $customer = new Customer($this->getDB());

        $data = $customer->findBy($id);

        $this->render('customer.customer', compact('data'));
    }

    /**
     * 
     * search customer by query
     * 
     * @return view
     * 
     * 
     */
    public function search()
    {
        $this->isAuth();

        $customer = new Customer($this->getDB());
        $query = '%' . htmlspecialchars($_POST['query']) . '%';

        $data = $customer->search([$query]);

        $this->render('customer.customers', compact('data'));
    }
}
