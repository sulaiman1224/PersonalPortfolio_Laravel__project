<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\admin_official_account;

class Admin_accounts extends Controller
{
    //

    // store data
    public function StoreAccountData(Request $request){
        // validate data
        $request->validate([
        //    url , icon_first_name,icon_second_name,name
        'url' => ['required','url'],
        'icon_first_name' => ['required','string','max:255'],
        'icon_second_name' => ['required','string','max:255'],
        'name' => ['required','string','max:255'],
        ]);

        //
        $account=new admin_official_account();
        $account->url=$request->input('url');
        $account->icon_first_name=$request->input('icon_first_name');
        $account->icon_second_name=$request->input('icon_second_name');
        $account->name=$request->input('name');
        $account->save();
        // return success message

        return response()->json(['message' => 'Data inserted successfully!'], 201);
    }
    // get all data
    public function getAccountData(){
        $Account=admin_official_account::all();
        // return compact
        return view('admin-panel.layouts.ViewsData.AccountViewsData' , compact('Account'));

    }

    // edit data
    public function editAccountData($id){
        $account=admin_official_account::find($id);
        return view('admin-panel.layouts.ViewsData.AccountDataUpdate' , compact('account'));

    }
    // update data
    public function updateAccountData(Request $request, $id){
        $request->validate([
        'url' => ['required','url'],
        'icon_first_name' => ['required','string','max:255'],
        'icon_second_name' => ['required','string','max:255'],
        'name' => ['required','string','max:255'],
        ]);

        $account=admin_official_account::find($id);
        $account->url=$request->input('url');
        $account->icon_first_name=$request->input('icon_first_name');
        $account->icon_second_name=$request->input('icon_second_name');
        $account->name=$request->input('name');
        $account->save();
        // return success message

        return redirect('/Admin/Accounts/ViewsData')->with('success', 'Data updated successfully!');


    }
    // delete data
    public function deleteAccountData($id){
        $account=admin_official_account::find($id);
        $account->delete();
        return redirect('/Admin/Accounts/ViewsData')->with('success', 'Data deleted successfully!');

    }


}
