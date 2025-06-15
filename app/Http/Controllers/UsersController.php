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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(UsersModel $usersModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UsersModel $usersModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UsersModel $usersModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UsersModel $usersModel)
    {
        //
    }
}
