<?php

namespace App\Http\Controllers;

use App\companies;
use App\Http\Requests;
use Illuminate\Http\Request;
use DB;
use Intervention\Image\ImageManager;
use Storage;
use Image;
use App\Http\Requests\companyrequest;




class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $companies = companies::where('del_flag',false)->paginate(10);
        return view('companies.index')->with('data', $companies);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('companies.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     *
     */
    public function store(companyrequest $request)
    {
        $validated = $request->validated();
        
       $success=Companies::create($request->except('_token'));
      
        if($request->hasFile('upload_logo')) 
        {
            $success->logo="public/logos/".$success->id.".jpg";
            $success->save();     
            $name=$success->id.".jpg";
            $request->file('upload_logo')->storeAs('public/logos/',$name);
            // $request->file('upload_logo')->store('public/logos/'.$success->id.'.jpg');
            // $manager = new ImageManager(array('driver' => 'imagick'));
            // $path   = $request->file('upload_logo')->getRealPath();
            // $img = $manager->make($path)->resize(100,100);
            // Storage::put('public/logos/resized/adars.jpg', $img);

        }
        // return redirect()->route('home')->with('success','data added successfully');
        return redirect(route('companies_create'));
    }
   

    /**
     * Display the specified resource.
     *
     * @param  \App\companies  $companies
     * @return \Illuminate\Http\Response
     */
    public function show(companies $companies)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\companies  $companies
     * @return \Illuminate\Http\Response
     */
    public function edit(companies $companies)
    {
        $comp_obj=companies::find($companies)->first();
        return view('companies.edit')->with('companies',$comp_obj);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\companies  $companies
     * @return \Illuminate\Http\Response
     */
    public function update(companyrequest $request, companies $companies)
    {
        $validated = $request->validated();
        $updated_companies=companies::find($companies->id);
        $updated_companies->name=$request->name;
        $updated_companies->email=$request->email;
        $updated_companies->website=$request->website;
        $updated_companies->save();

        if ($request->hasFile('upload_logo')) {
            $name=$updated_companies->id.".jpg";
            $request->file('upload_logo')->storeAs('public/logos/',$name);
            // $manager = new ImageManager(array('driver' => 'imagick'));
            // $path   = $request->file('upload_logo')->getRealPath();
            // $img = $manager->make($path)->resize(100,100);
            // Storage::put('public/logos/resized/adars.jpg', $img);

            }
            return redirect(route('companies'));  
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\companies  $companies
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company = companies::find($id);
        $company->del_flag=true;
        $company->save();
        return redirect(route('companies'));
    }
}
