<?php

namespace Database\Seeders;

use App\Models\Tenant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TenantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // tenant 1
        $t1 =  Tenant::create(
            [
                'id' => 'tenant1',
                'name' => 'Tenant 1',
            ]
        );

        $t1->domains()->create([
            'domain' => 'tenant1.localhost'
        ]);

        // tenant 2
        $t2 =  Tenant::create(
            [
                'id' => 'tenant2',
                'name' => 'Tenant 2',
            ]
        );

        $t2->domains()->create([
            'domain' => 'tenant2.localhost'
        ]);


        // tenant 3
        $t3 =  Tenant::create(
            [
                'id' => 'tenant3',
                'name' => 'Tenant 3',
            ]
        );

        $t3->domains()->create([
            'domain' => 'tenant3.localhost'
        ]);
    }
}
