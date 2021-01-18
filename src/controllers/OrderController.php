<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/Order.php';
require_once __DIR__.'/../repository/OrderRepository.php';

class OrderController extends AppController
{
    private $orderRepository;

    public function __construct()
    {
        parent::__construct();
        $this->orderRepository = new OrderRepository();
    }
    public function order(){
        $this->render('order');
    }
    public function addOrder()
    {
        if (!$this->isPost()) {

            $order = new Order($_POST['name'], $_POST['surname'], $_POST['intention'], $_POST['phone'], $_POST['date']);
            $this->orderRepository->addOrder($order);

        }
        return $this->render('add-order', ['messages' => $this->messages,]);
    }
}