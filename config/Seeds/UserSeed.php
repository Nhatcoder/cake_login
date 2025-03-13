<?php
declare(strict_types=1);

use Authentication\PasswordHasher\DefaultPasswordHasher;
use Migrations\AbstractSeed;

class UserSeed extends AbstractSeed
{
    public function run(): void
    {
        $hasher = new DefaultPasswordHasher();
        $data = [
            [
                'name' => 'Admin User',
                'email' => 'admin@example.com',
                'password' => $hasher->hash('12345678'),
            ],
            // You can add more test users here if needed
        ];

        $table = $this->table('users');
        $table->insert($data)->save();
    }
}