<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAdvertisementRequest;
use App\Models\Advertisement;
use App\Services\HasMedia;
use Illuminate\Http\Request;

class AdvertisementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $advertisements = Advertisement::paginate(10);
        return view('advertisement.index', compact('advertisements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('advertisement.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAdvertisementRequest $request)
    {
        $imageName = HasMedia::upload($request->file('image'), public_path('images\advertisements'));
        $data['image'] = $imageName;
        Advertisement::create($data);
        return redirect()->route('advertisements')->with('success', 'Advertisement Created Successfully');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $advertisement = Advertisement::findOrFail($id);
        if (file_exists(public_path('images\advertisements\\' . $advertisement->image))) { //delete old image
            unlink(public_path('images\advertisements\\' . $advertisement->image));
        }
        $advertisement->delete();
        return redirect()->route('advertisements')->with('success', 'Advertisement Deleted Successfully');
    }
}
