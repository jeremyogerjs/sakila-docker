<?php
require_once('./app/models/Customer.php');
require_once('./app/controller/Controller.php');

class CustomerController extends Controller
{

    public function index()
    {
        $customer = new Customer($this -> getDB());
        $data = $customer -> all();

        $this -> render('customer.customers',compact('data'));
    }
    public function show($id)
    {
        $customer = new Customer($this -> getDB());

        $data = $customer -> findBy($id);

        $this -> render('customer.customer',compact('data'));
    }

    public function search()
    {
        $customer = new Customer($this -> getDB());
        $query = '%'. htmlspecialchars($_POST['query']).'%';

        $data = $customer -> search([$query,$query]);

        $this -> render('customer.customers',compact('data'));
    }
}