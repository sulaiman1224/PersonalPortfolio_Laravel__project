<?php

namespace App\Http\Controllers;
use App\Models\admin_service;

use Illuminate\Http\Request;

class Admin_services extends Controller
{
    public function StoreServicesData(Request $request){
        // Validate the request
        $request->validate([
            'name' =>'required|string|max:255',
            'icon_name' =>'required|string|max:255',
            'description' =>'required|string',


        ]);

        // Store the data in the database
        $services=new admin_service;
        $services->name=$request->input('name');
        $services->icon_name=$request->input('icon_name');
        $services->description=$request->input('description');
        $services->save();
        return response()->json(['message' => 'Service created successfully'], 201);
        // Return a success response
        // return redirect()->route('admin_services.index')->with('success', 'Service created successfully');
    }



    public function  getServicesData()  {
        $Services=admin_service::all();
        return view("admin-panel/layouts/ViewsData/ServicesViewsData", compact('Services'));

}
// public function  viewServicesData() {

//     return view("admin-panel/layouts/ViewsData/ServicesViewsData");
// }
// update
public function updateServicesData(Request $request, $id) {
    // Validate the request
    $request->validate([
        'name' =>'required|string|max:255',
        'icon_name' =>'required|string|max:255',
        'description' =>'required|string',

    ]);

    // Update the data in the database
    $services=admin_service::find($id);
    $services->name=$request->input('name');
    $services->icon_name=$request->input('icon_name');
    $services->description=$request->input('description');
    $services->save();

    // Return a success response
    return redirect('/Admin/Service/ViewData')->with('success', 'Data updated successfully!');


}

// editServicesData
public function editServicesData($id) {
    $service=admin_service::find($id);
    return view("admin-panel/layouts/ViewsData/ServicesDataUpdate", compact('service'));

}
// deleteServicesData
public function deleteServicesData($id) {
    $services=admin_service::find($id);
    $services->delete();
    return redirect('/Admin/Service/ViewData')->with('success', 'Data deleted successfully!');
}



}

