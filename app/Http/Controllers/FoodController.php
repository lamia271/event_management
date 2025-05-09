<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Food;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator; 

class FoodController extends Controller
{
    public function foodList()
    {
        $foods = Food::with('event')->get();
        $foods = Food::paginate(4);
        return view('backend.pages.food.foodList', compact('foods'));
    }

    public function foodSearch(Request $request)
    {
        $query = Food::query();

        if ($request->has('search')) {
            $search = $request->search;
            $query->where('name', 'LIKE', '%' . $search . '%')
                  ->orWhere('price', 'LIKE', '%' . $search . '%')
                  ->orWhereHas('event', function ($q) use ($search) {
                      $q->where('name', 'LIKE', '%' . $search . '%');
                  });
        }

        $foods = $query->paginate(4);

        return view('backend.pages.food.foodSearch', compact('foods'));
    }

    public function createFood()
    {
        $events = Event::all();
        return view('backend.pages.food.createFood',compact('events'));
    }

    public function foodStore(Request $request)
    {
        // $checkValidation=$request->except('_token');
        // dd($request->all());

        $checkValidation = Validator::make
        (
            $request->all(),
            [
                'name' => 'required',
                'event_id' => 'required',
                'price' => 'required|integer|min:1',
            ]
        );

        if ($checkValidation->fails()) {
            notify()->error("Something Went Wrong.");
            // notify()->error($checkValidation->getMessageBag());
            return redirect()->back();
        }

        Food::create([
                'name' => $request->name,
                'event_id' => $request->event_id,
                'price' => $request->price,
                
            ]);

        notify()->success('Food Created Successfully.');

        return redirect()->route('admin.food.list');
    }

    public function foodEdit(Request $request, $food_id)
    {
        $events= Event::all();
        $foods = Food::find($food_id);
        return view('backend.pages.food.foodEditForm', compact('foods','events'));
    }

    public function  foodUpdate(Request $request, $food_id)
    {
        $foods = Food::find($food_id);

        $checkValidation = Validator::make
        (
            $request->all(),
            [
                'name' => 'required',
                'event_id' => 'required',
                'price'=>'required'
            ]
        );

        if ($checkValidation->fails()) {
            notify()->error("Something Went Wrong.");
            // notify()->error($checkValidation->getMessageBag());
            return redirect()->back();
        }

        $foods->update([
                'name' => $request->name,
                'event_id' => $request->event_id,
                'price' => $request->price
            ]);
        notify()->success('Food Updated Successfully.');

        return redirect()->route('admin.food.list');
    }

    public function foodDelete($food_id)
    {
        $foods = Food::find($food_id);
        $foods->delete();
        notify()->success('Food Deleted Successfully.');
        return redirect()->back();
        
    }
}
 