<?php

	namespace App\Http\Controllers\Repository\Admin;

	use App\Http\Controllers\Repository\Admin\OrderRepositoryInterface;
    use App\Models\Order;

    class OrderRepository implements OrderRepositoryInterface
	{

        public function getAllOrders()
        {
            return Order::with('addressTo','addressFrom','client','truck')->get();
        }

        public function getOrderById($orderId)
        {
            return Order::findOrFail($orderId);
        }

        public function deleteOrder($orderId)
        {
            Order::destroy($orderId);
        }

        public function createOrder(array $orderDetails)
        {
            return Order::create($orderDetails);
        }

        public function updateOrder($orderId, array $newDetails)
        {
            return Order::whereId($orderId)->update($newDetails);
        }

        public function getFulfilledOrders()
        {
            return Order::where('status', 1);
        }
	}