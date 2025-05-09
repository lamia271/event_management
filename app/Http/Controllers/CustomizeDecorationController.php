<?php

namespace App\Http\Controllers;

use App\Models\CustomizeDecoration;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CustomizeDecorationController extends Controller
{
    public function customizeDecorationList()
    {
        $customizeDecorations = CustomizeDecoration::with('event')->get();
        $customizeDecorations = CustomizeDecoration::paginate(4);
        return view('backend.pages.customizeDecoration.customizeDecorationList', compact('customizeDecorations'));             
    }

    public function customizeDecorationSearch(Request $request)
    {
        $query = CustomizeDecoration::query();

        if ($request->has('search')) {
            $search = $request->search;
            $query->where('name', 'LIKE', '%' . $search . '%')
                  ->orWhere('price', 'LIKE', '%' . $search . '%')
                  ->orWhereHas('event', function ($q) use ($search) {
                      $q->where('name', 'LIKE', '%' . $search . '%');
                  });
        }

        $decorations = $query->paginate(4);

        return view('backend.pages.customizeDecoration.customizeDecorationSearch', compact('decorations'));
    }


    public function createCustomizeDecoration()
    {
        $events = Event::all();
        return view('backend.pages.customizeDecoration.createCustomizeDecoration',compact('events'));
    }

    public function customizeDecorationStore(Request $request)
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

        CustomizeDecoration::create([
                'name' => $request->name,
                'event_id' => $request->event_id,
                'price' => $request->price,
                
            ]);

        notify()->success('Customize Decoration Created Successfully.');

        return redirect()->route('admin.customize.decoration.list');
    }

    public function customizeDecorationEdit(Request $request, $decoration_id)
    {
        $events= Event::all();
        $decorations = CustomizeDecoration::find($decoration_id);
        return view('backend.pages.customizeDecoration.customizeDecorationEditForm', compact('decorations','events'));

    }

    public function  customizeDecorationUpdate(Request $request, $decoration_id)
    {
        $decorations = CustomizeDecoration::find($decoration_id);

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

        $decorations->update([
                'name' => $request->name,
                'event_id' => $request->event_id,
                'price' => $request->price
            ]);
        notify()->success('Customize Decoration Updated Successfully.');

        return redirect()->route('admin.customize.decoration.list');
    }

    public function customizeDecorationDelete($decoration_id)
    {
        $foods = CustomizeDecoration::find($decoration_id);
        $foods->delete();
        notify()->success('Customize Decoration Deleted Successfully.');
        return redirect()->back();
        
    }
}
