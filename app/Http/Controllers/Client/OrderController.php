<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Repository\Client\OrderRepositoryInterface;
use App\Http\Requests\Client\StoreOrderRequest;
use App\Models\Client;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class OrderController extends Controller
{
    private OrderRepositoryInterface $orderRepository;

    public function __construct(OrderRepositoryInterface $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    public function index(): \Illuminate\Http\JsonResponse
    {
        return response()->json([
            'status' => 200,
            'data' => $this->orderRepository->getAllOrders()
        ]);
    }

    public function store(StoreOrderRequest $request): JsonResponse
    {
        try {
            $validatedData = $request->validated();
dd($validatedData);
            $request['transaction'] = rand(9999, 9999999);
            $request['client_id'] = auth()->user()->id;
            $order = $this->orderRepository->createOrder($request->all());

            return response()->json(
                [
                    'data' => $order
                ],
                Response::HTTP_CREATED
            );
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], Response::HTTP_BAD_REQUEST);
        }
    }

    public function destroy($id = 0)
    {
        $this->orderRepository->deleteOrder($id);
        return response()->json(['success' =>'Order Was Deleted'], Response::HTTP_BAD_REQUEST);

    }
}
