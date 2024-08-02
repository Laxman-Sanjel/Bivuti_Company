<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;

class CompaniesController extends Controller
{
    public function index(){
        $company=Company::simplepaginate(10);
        return view('Form.companies_form',['result'=>$company]);

    }
    public function store(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // 2MB max
            'website' => 'nullable|url|max:255',
        ]);

        $data = $request->only(['name', 'email', 'website']);

        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('logos', 'public');
            $data['logo'] = $logoPath;
        }

        Company::create($data);

        return redirect()->back()->with('status','data is Successfully Inserted');
    }

    public function Edit($id){
        $com=Company::find($id);
        return view('Form.Update',['company'=>$com]);
      }
    //     public function Update(Request $request,$id){
    //      $company=new Company();
    //      $company->name=$request->input('name');
    //      $company->email=$request->input('email');
    //      $company->website=$request->input('website');
    //      $company->logo=$request->input('logo');
    //      $company->update();
    //      return redirect()->back()->with('status','data is Successfully Updated');
    //  }  
    public function update(Request $request, $id)
    {
        $company = Company::findOrFail($id);
    
        // Validate and update logic
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'website' => 'nullable|url|max:255',
            'logo' => 'nullable|image|dimensions:min_width=100,min_height=100',
        ]);
    
        $company->name = $request->input('name');
        $company->email = $request->input('email');
        $company->website = $request->input('website');
    
        if ($request->hasFile('logo')) {
            if ($company->logo && \Storage::exists('public/' . $company->logo)) {
                \Storage::delete('public/' . $company->logo);
            }
    
            $company->logo = $request->file('logo')->store('logos', 'public');
        }
    
        $company->save();
    
        // Redirect back to the previous page with a success message
        return redirect()->route('companiesform')->with('status', 'Data is successfully updated!');
    }
    


    public function Delete($id){
        $com=Company::find($id);
        $com->delete();
        return redirect()->back()->with('status','Data Delete Successfully');
      }
        
    }
    
