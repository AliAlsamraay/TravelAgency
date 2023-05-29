<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'auth_profile_edit',
            ],
            [
                'id'    => 2,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 3,
                'title' => 'permission_create',
            ],
            [
                'id'    => 4,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 5,
                'title' => 'permission_show',
            ],
            [
                'id'    => 6,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 7,
                'title' => 'permission_access',
            ],
            [
                'id'    => 8,
                'title' => 'role_create',
            ],
            [
                'id'    => 9,
                'title' => 'role_edit',
            ],
            [
                'id'    => 10,
                'title' => 'role_show',
            ],
            [
                'id'    => 11,
                'title' => 'role_delete',
            ],
            [
                'id'    => 12,
                'title' => 'role_access',
            ],
            [
                'id'    => 13,
                'title' => 'user_create',
            ],
            [
                'id'    => 14,
                'title' => 'user_edit',
            ],
            [
                'id'    => 15,
                'title' => 'user_show',
            ],
            [
                'id'    => 16,
                'title' => 'user_delete',
            ],
            [
                'id'    => 17,
                'title' => 'user_access',
            ],
            [
                'id'    => 18,
                'title' => 'bookings_management_access',
            ],
            [
                'id'    => 19,
                'title' => 'booking_create',
            ],
            [
                'id'    => 20,
                'title' => 'booking_edit',
            ],
            [
                'id'    => 21,
                'title' => 'booking_show',
            ],
            [
                'id'    => 22,
                'title' => 'booking_delete',
            ],
            [
                'id'    => 23,
                'title' => 'booking_access',
            ],
            [
                'id'    => 24,
                'title' => 'tour_package_create',
            ],
            [
                'id'    => 25,
                'title' => 'tour_package_edit',
            ],
            [
                'id'    => 26,
                'title' => 'tour_package_show',
            ],
            [
                'id'    => 27,
                'title' => 'tour_package_delete',
            ],
            [
                'id'    => 28,
                'title' => 'tour_package_access',
            ],
            [
                'id'    => 29,
                'title' => 'tour_create',
            ],
            [
                'id'    => 30,
                'title' => 'tour_edit',
            ],
            [
                'id'    => 31,
                'title' => 'tour_show',
            ],
            [
                'id'    => 32,
                'title' => 'tour_delete',
            ],
            [
                'id'    => 33,
                'title' => 'tour_access',
            ],
            [
                'id'    => 34,
                'title' => 'hotel_create',
            ],
            [
                'id'    => 35,
                'title' => 'hotel_edit',
            ],
            [
                'id'    => 36,
                'title' => 'hotel_show',
            ],
            [
                'id'    => 37,
                'title' => 'hotel_delete',
            ],
            [
                'id'    => 38,
                'title' => 'hotel_access',
            ],
            [
                'id'    => 39,
                'title' => 'location_create',
            ],
            [
                'id'    => 40,
                'title' => 'location_edit',
            ],
            [
                'id'    => 41,
                'title' => 'location_show',
            ],
            [
                'id'    => 42,
                'title' => 'location_delete',
            ],
            [
                'id'    => 43,
                'title' => 'location_access',
            ],
        ];

        Permission::insert($permissions);
    }
}
