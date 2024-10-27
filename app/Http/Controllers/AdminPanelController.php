<?php

namespace App\Http\Controllers;
use App\Models\AdminHome;
use App\Models\admin_about;
use App\Models\admin_service;
use App\Models\admin_portfolio;
use App\Models\admin_official_account;
use App\Models\admin_account;
use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminPanelController extends Controller
{
    // admin panel pages controller


    public function admin()
    {


        // Return the view with the unseen feedback count
        return view("admin-panel.layouts.addData.HomeAddData");
    }


    public function AdminHome()
    {


        return view("admin-panel/layouts/addData/HomeAddData");
    }
    public function AdminAbout()
    {
        return view("admin-panel/layouts/addData/AboutAddData" );
    }
    public function AdminServices()
    {
        return view("admin-panel/layouts/addData/ServicesAddData");
    }
    public function AdminPortFolio()
    {
        return view("admin-panel/layouts/addData/PortfolioAddData" );
    }
    public function AdminContact()
    {
        return view("admin-panel/layouts/addData/ContactAddData" );
    }
    public function AdminAccounts()
    {
        return view('admin-panel.layouts.addData.AccountAddData' );
    }


// ===============================================Save admin home data in database routes===============================================
    // save data in database
    public function StoreHomeData(Request $request)
    {
        // Validate input
        $request->validate([
            'Name' => 'required|string|max:50',
            'F_letter' => 'required|string|max:1',
            'Skip_F_letter' => 'required|string|max:50',
            'Profession_1' => 'required|string|max:50',
            'Profession_2' => 'required|string|max:50',
            'Profession_3' => 'required|string|max:50',
            'Descreption' => 'required',
            'Cv' => 'required|mimes:pdf|max:2048',
            'ProfileImage' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Check if a record with the same Name exists
        if (AdminHome::where('Name', $request->Name)->exists()) {
            return response()->json(['message' => 'Record already exists!'], 400);
        }

        $AdminHome = new AdminHome;
        $AdminHome->Name = $request->input('Name');
        $AdminHome->F_letter = $request->input('F_letter');
        $AdminHome->Skip_F_letter = $request->input('Skip_F_letter');
        $AdminHome->Profession_1 = $request->input('Profession_1');
        $AdminHome->Profession_2 = $request->input('Profession_2');
        $AdminHome->Profession_3 = $request->input('Profession_3');
        $AdminHome->Descreption = $request->input('Descreption');

        //Handle ProfileImage file upload
        if ($request->hasFile('ProfileImage')) {
            $profileImagePath = $request->file('ProfileImage')->store('public/profile_images');
            $AdminHome->ProfileImage = $profileImagePath; // Store the file path in the model
        }

        // Handle Cv file upload
        if ($request->hasFile('Cv')) {
            $CvFilepath = $request->file('Cv')->store('public/profile_pdfs');
            $AdminHome->Cv = $CvFilepath; // Store the file path in the model
        }
        $AdminHome->save();

        return response()->json(['message' => 'Data inserted successfully!']);
    }


// ===============================================get from database routes===============================================
    // get data in database
    public function getHomeData()
    {
        $AdminHomes = AdminHome::all();
        $About=admin_about::all();
        $services=admin_service::all();
        $Portfolio=admin_portfolio::all();
        $Account=admin_official_account::all();

        return view("project/layouts/Home", compact('AdminHomes','About','services','Portfolio','Account'));

    }
    public function getNameData()
    {
        $AdminHomes = AdminHome::all();
        return view("project/layouts/main", compact('AdminHomes'));

    }
    public function ViewHomeData(){
        $AdminHomes = AdminHome::all();
        return view("admin-panel/layouts/ViewsData/HomeViewsData", compact('AdminHomes'));
    }
    public function AboutGetId()
    {
        // Fetch data from the AdminHome model
        $adminHomes = AdminHome::all();
        return view("admin-panel/layouts/addData/AboutAddData", compact('adminHomes'));
    }

//=============================================== edit data routes===============================================
public function edit($id){
    $AdminHomes=AdminHome::find($id);
    return view("admin-panel/layouts/ViewsData/HomeDataUpdate",compact('AdminHomes'));
}
public function update(Request $request, $id)
{
    // Validate input
    $request->validate([
        'Name' => 'required|string|max:50',
        'F_letter' => 'required|string|max:1',
        'Skip_F_letter' => 'required|string|max:50',
        'Profession_1' => 'required|string|max:50',
        'Profession_2' => 'required|string|max:50',
        'Profession_3' => 'required|string|max:50',
        'Descreption' => 'required|string',
        'Cv' => 'nullable|mimes:pdf|max:2048',
        'ProfileImage' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Find the record to update
    $AdminHomes = AdminHome::findOrFail($id);

    // Update text fields
    $AdminHomes->Name = $request->input('Name');
    $AdminHomes->F_letter = $request->input('F_letter');
    $AdminHomes->Skip_F_letter = $request->input('Skip_F_letter');
    $AdminHomes->Profession_1 = $request->input('Profession_1');
    $AdminHomes->Profession_2 = $request->input('Profession_2');
    $AdminHomes->Profession_3 = $request->input('Profession_3');
    $AdminHomes->Descreption = $request->input('Descreption');

    // Handle ProfileImage upload
    if ($request->hasFile('ProfileImage')) {
        // Store the new file
        $profileImagePath=$request->file('ProfileImage')->store('public/profile_images');
        $AdminHomes->ProfileImage=$profileImagePath; // Update the model
    }

    // Handle Cv upload
    if ($request->hasFile('Cv')) {
        // Store the new file
        $cvFilePath = $request->file('Cv')->store('public/profile_pdfs');
        $AdminHomes->Cv = $cvFilePath; // Update the model
    }

    // Save the updated record
    $AdminHomes->save();

    // Redirect with success message
    return redirect('/Admin/Home')->with('success', 'Data updated successfully!');
}

public function delete($id){
    $AdminHomes=AdminHome::find($id);
    $AdminHomes->delete();
    return redirect('/Admin/Home');
}
//=======================================Admin about ===========================================
}









