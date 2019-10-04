<?php

namespace App\Http\Controllers;


use App\employees;
use App\Http\Requests;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\Storeemployees;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    $data = employees::where('del_flag',false)->Paginate(10);

    
       $data= array(
           'data'=>$data,
       ); 
        return view('employees.index')->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = DB::table('companies')->select('id','name')->where('del_flag',false)->get();

        $data = array(
            'data' => $data,
        );
        //return $data;
        return view('employees.add')->with('data',$data);
        
    }

   /**
 * Store the incoming blog post.
 *
 * @param  Storeemployees  $request
 * @return Response
 */
    public function store(Storeemployees $request)
    {
       
        $validated = $request->validated();
        $data = $request->except('_token'); 
      
        $data=array(
            'first_name' =>$request->first_name,
            'last_name' =>$request->last_name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'company'=>$request->company,
            'del_flag'=>false,
            'created_at'=>new Carbon(),
            'updated_at'=>new Carbon()
        );
       
        $success=DB::table('employees')->insert($data);
        return redirect()->route('employees')->with('success','data added successfully');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\employees  $employees
     * @return \Illuminate\Http\Response
     */
    public function show(employees $employees)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     *
     */
    public function edit($id)
    {  
     
        // return $id;
        $employees = DB::table('employees')
                ->leftJoin('companies','employees.company', '=', 'companies.id')
                ->select('employees.*', 'companies.name')
                ->where('employees.id','=',$id)
                ->get();
               // return $id;
        $company = DB::table('companies')->select('id','name')->where('del_flag',false)
                ->get();
          
        return view('employees.edit',compact('employees','company')) ;
    }

    /**
     * Update the specified resource in storage.
  
     * @param  Storeemployees  $request
     * @return Response
     */
    public function update(Storeemployees $request,$id)
    {
        $validated = $request->validated();
        $data=$request->except('_token');  
        $data=array(
            'id'=>$id,
            'first_name' =>$request->first_name,
            'last_name' =>$request->last_name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'company'=>$request->company,
            'del_flag'=>false,
            'updated_at'=>new Carbon(),
        ); 
        
        $success=DB::table('employees')
            ->where('id', $id)
            ->update($data);

            return redirect()->route('employees')->with('success','data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * 
     * 
     */
    public function destroy($id)
    {
        // $data['del_flag'] = 1;
        // $success = employees::where('id', $id)->update($data);
        // return redirect()->route('employees');

        $company = employees::find($id);
        $company->del_flag=true;
        $company->save();
        return redirect(route('employees'));
    }
}
