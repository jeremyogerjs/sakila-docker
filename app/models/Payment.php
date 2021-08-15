<?php
require_once('Model.php');


class Payment extends Model
{
    //column of table payment
    protected $table = 'payment';

    protected $payment_id;
    protected $customer_id;
    protected $staff_id;
    protected $rental_id;
    protected $amount;
    protected $payment_date;
    protected $last_update;

    public function __construct(array $data = [], $db)
    {
        foreach($data as $key => $value)
        {
            $this ->$key = htmlspecialchars($value);
        }
        parent::__construct($db);
    }
    public function store()
    {
        return $this ->query("INSERT INTO $this -> table (customer_id,staff_id,rental_id,amount,payment_date)
        VALUES (?,?,?,?,?)",[$this ->customer_id,$this ->staff_id,$this ->rental_id,$this ->amount,$this ->payment_date],true);
    }
}
