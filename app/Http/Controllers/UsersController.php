<?php

namespace App\Http\Controllers;

use App\Models\UsersModel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    private $users = [
    [
        'id' => 1,
        'name' => 'Alice Johnson',
        'email' => 'alice.johnson@example.com',
        'membershipDate' => '2022-01-15',
    ],
    [
        'id' => 2,
        'name' => 'Bob Smith',
        'email' => 'bob.smith@example.com',
        'membershipDate' => '2021-11-30',
    ],
    [
        'id' => 3,
        'name' => 'Carol Williams',
        'email' => 'carol.williams@example.com',
        'membershipDate' => '2023-02-10',
    ],
    [
        'id' => 4,
        'name' => 'David Brown',
        'email' => 'david.brown@example.com',
        'membershipDate' => '2020-08-22',
    ],
    [
        'id' => 5,
        'name' => 'Eva Davis',
        'email' => 'eva.davis@example.com',
        'membershipDate' => '2019-12-05',
    ],
    [
        'id' => 6,
        'name' => 'Frank Miller',
        'email' => 'frank.miller@example.com',
        'membershipDate' => '2021-05-18',
    ],
    [
        'id' => 7,
        'name' => 'Grace Wilson',
        'email' => 'grace.wilson@example.com',
        'membershipDate' => '2023-03-01',
    ],
    [
        'id' => 8,
        'name' => 'Henry Moore',
        'email' => 'henry.moore@example.com',
        'membershipDate' => '2020-07-14',
    ],
    [
        'id' => 9,
        'name' => 'Ivy Taylor',
        'email' => 'ivy.taylor@example.com',
        'membershipDate' => '2022-09-25',
    ],
    [
        'id' => 10,
        'name' => 'Jack Anderson',
        'email' => 'jack.anderson@example.com',
        'membershipDate' => '2018-04-10',
    ],
];

    public function index()
    {
        //
         return response()->json([
                'message' => 'Get Data users successful.',
                'data' => $this->users
            ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        //
         // Validate input
                $validated = $request->validate([
                    'name' => 'required|string',
                    'email' => 'required|email|unique:users,email', // unique check depends on DB, here demo only
                    'membershipDate' => 'required|date',
                ]);

                // Generate a new ID (auto-increment-like logic)
                $newId = count($this->users) + 1;

                // Create new user array
                $newUsers = array_merge($validated, [
                    'id' => $newId,
                    'created_at' => now()->toDateTimeString(),
                    'updated_at' => now()->toDateTimeString(),
                ]);

                // Push to array (only in memory, not stored permanently)
                $this->users[] = $newUsers;

                // Return response
                return response()->json([
                    'message' => 'User created (demo only, not saved).',
                    'data' => $newUsers
                ], 201);
    }

   

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        // Search for the user by ID
                foreach ($this->users as $user) {
                    if ($user['id'] == $id) {
                        return response()->json([
                            'message' => 'User found.',
                            'data' => $user
                        ]);
                    }
                }

                // If author not found
                return response()->json([
                    'message' => 'Users not found.'
                ], 404);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        // Validate input
                    $validated = $request->validate([
                        'name' => 'required|string',
                        'email' => 'required|email|unique:users,email', // unique check depends on DB, here demo only
                        'membershipDate' => 'required|date',
                    ]);

                    foreach ($this->users as &$user) {
                        if ($user['id'] == $id) {
                            // Update only provided fields
                            foreach ($validated as $key => $value) {
                                $user[$key] = $value;
                            }
                            $user['updated_at'] = now()->toDateTimeString();

                            return response()->json([
                                'message' => 'User updated (demo only).',
                                'data' => $user,
                            ]);
                        }
                    }

                    return response()->json([
                        'message' => 'User not found.',
                    ], 404);
    }

    /**
     * Remove the specified resource from storage.
     */
    // delete data by $id
            public function delete($id)
                {
                    foreach ($this->users as $index => $user) {
                        if ($user['id'] == $id) {
                            // Remove user from array
                            array_splice($this->users, $index, 1);

                            return response()->json([
                                'message' => 'User deleted (demo only).',
                            ]);
                        }
                    }

                    return response()->json([
                        'message' => 'User not found.',
                    ], 404);
                }


}
