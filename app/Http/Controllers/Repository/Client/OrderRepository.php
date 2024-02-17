<?php

	namespace App\Http\Controllers\Repository\Client;

	use App\Http\Controllers\Repository\Client\OrderRepositoryInterface;
    use App\Models\Order;

    class OrderRepository implements OrderRepositoryInterface
	{

        public function getAllOrders($id)
        {
            return Order::where('client_id',$id)->with('addressTo','addressFrom','client','truck')->get();
        }

        public function getOrderById($orderId,$id)
        {
            return Order::where('client_id',$id)->findOrFail($orderId);
        }

        public function deleteOrder($orderId,$id)
        {
            Order::where('client_id',$id)->destroy($orderId);
        }

        public function createOrder(array $orderDetails)
        {
            return Order::create($orderDetails);
        }

        public function updateOrder($orderId, array $newDetails,$id)
        {
            return Order::where('client_id',$id)->whereId($orderId)->update($newDetails);
        }

        public function getFulfilledOrders($id)
        {
            return Order::where('client_id',$id)->where('status', 1);
        }
	}
