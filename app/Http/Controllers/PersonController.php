<?php

namespace App\Http\Controllers;

use App\Http\Requests\IndexPersonRequest;
use App\Models\Person;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    public function index(IndexPersonRequest $request)
    {
        $people = Person::get()->map(function ($item) use ($request) {
            $item->desiredAge = null;

            $operator = $request->operator;
            $age = $request->age;

            $item->paramsRequest = "$operator $age";

            $item->year_of_birth = Carbon::parse($item->year_of_birth)->format('d-m-Y');

            if ($request->age) {
                $diffYears = now()->diffInYears(Carbon::parse($item->year_of_birth));

                if ($operator == '') {
                    $item->desiredAge = $diffYears == $age ? true : false;

                    return $item;
                }

                $item->desiredAge = $operator == '>' ? $diffYears > $age : $diffYears < $age;
            }

            return $item;
        });

        return view('pages.person.index', compact('people'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Person $person)
    {
        //
    }

    public function edit(Person $person)
    {
        //
    }

    public function update(Request $request, Person $person)
    {
        //
    }

    public function destroy(Person $person)
    {
        //
    }
}