<?php

	namespace App\Http\Controllers\Repository\Client;

	interface OrderRepositoryInterface
	{
        public function getAllOrders($id);
        public function getOrderById($orderId,$id);
        public function deleteOrder($orderId,$id);
        public function createOrder(array $orderDetails);
        public function updateOrder($orderId, array $newDetails,$id);
        public function getFulfilledOrders($id);
	}
