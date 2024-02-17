<?php

    namespace Database\Factories;

    use Illuminate\Database\Eloquent\Factories\Factory;

    /**
     * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
     */
    class OrderFactory extends Factory
    {
        /**
         * Define the model's default state.
         *
         * @return array<string, mixed>
         */
        public function definition(): array
        {
            return [
                'client_id' => rand(1, 20),
                'truck_id' => rand(1, 10),
                'address_id_to' => rand(1, 7),
                'address_id_from' => rand(8, 15),
                'transaction' => rand(9999, 99999),
                'status' => rand(1, 3),
            ];
        }
    }
