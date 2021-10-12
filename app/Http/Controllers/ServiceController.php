<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::all();
        return view('services.index')->with(compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('services.create')->with(compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $service = new Service();
        // $service->title = $request->get('title');
        // $service->description = $request->get('description');
        // $service->attachment_1 = $request->get('attachment_1');
        // $service->attachment_2 = $request->get('attachment_2');
        // $service->save();
        // $input = $request->all();
        // $user = auth()->user();
        // $user->service()->create($request->all());
        // $service = Service::create($input);

        $service = new Service();
        $service->title = $request->title;
        $service->description = $request->description;
        $service->user_id = Auth::user()->id;
        
        $service->save();
        $service->categories()->attach($request['category_id']);

        foreach ($request->file('attachment_1', []) as $key => $file)
        {
             $service->addMedia($file)
                    ->toMediaCollection('attachment_1');

        }

        // if($request->hasFile('attachment_1') && $request->file('attachment_1')->isValid()) 
        // {
                
        //     $service->addMediaFromRequest('attachment_1')->toMediaCollection('attachment_1');

        // }
        return redirect()->route('services.index');

        // dd($request);

        // return redirect('/services');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        return view('services.edit')->with(compact('service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        // $service->update($request->only('title','description','attachment_1','attachment_2'));
        $service->update($request->only('title','description','attachment_1'));
        return redirect()
            ->route('services.index')
            ->with(['alert-type' => 'alert-success','alert'=> 'Service updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        $service->categories()->detach();
        $service->delete();


        return redirect()->route('services.index')
            ->with('success', 'Service deleted successfully');
    }
}
