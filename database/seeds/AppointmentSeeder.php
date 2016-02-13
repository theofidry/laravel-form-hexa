<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AppointmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $n = 10;
        $faker = Faker\Factory::create();
        $customerIds = [];
        $customers = [];
        $appointments = [];

        for ($i = 0; $i < $n; $i++) {
            $customer = [
                'id' => $faker->uuid,
                'name' => $faker->name,
                'email' => $faker->email,
            ];

            $customers[] = $customer;
            $customerIds[] = $customer['id'];
        }

        for ($i = 0; $i < $n; $i++) {
            $appointment = [
                'id' => $faker->uuid,
                'datetime' => $faker->dateTime,
                'customer_id' => $faker->randomElement($customerIds),
            ];

            $appointments[] = $appointment;
        }

        DB::table('customers')->insert($customers);
        DB::table('appointments')->insert($appointments);
    }
}
