<?php

namespace App\Http\Controllers;

use App\Models\admin_portfolio;
use Illuminate\Http\Request;

class Admin_portfolios extends Controller
{
    // store data
    public function StorePortfolioData(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'img' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Match 'img' with form input
            'language_name' => 'required|string|max:255', // Match 'language_name' with form input
            'url' => 'required|url|max:255', // Add url validation
            'description' => 'required|string|max:255', // Match 'description' with form input
        ]);

        // Create a new portfolio instance
        $portfolio = new admin_portfolio();

        // Store the new file if it exists
        if ($request->hasFile('img')) {
            $profileImagePath = $request->file('img')->store('public/portfolio_images');
            $portfolio->img = $profileImagePath; // Update the model with the file path
        }

        // Set other fields
        $portfolio->language_name = $request->input('language_name');
        $portfolio->description = $request->input('description');
        $portfolio->url = $request->input('url');

        // Save the portfolio instance
        $portfolio->save();

        // Return a success response
        return response()->json(['message' => 'Data inserted successfully!'], 201);
    }
    // Get all data
    public function getPortfolioData()
    {
        // Fetch all portfolio data
        $portfolios = admin_portfolio::all();

        // Define the page title
        $pageTitle = 'Admin Panel - Services';

        // Return the data views with compact
        return view('admin-panel.layouts.ViewsData.PortfolioViewsData', compact('portfolios', 'pageTitle'));
    }

    // update

    public function updatePortfolioData(Request $request, $id)
    {

        // Validate the incoming request
        $request->validate([
        // Match 'img' with form input
            'language_name' => 'required|string|max:255', // Match 'language_name' with form input
            'url' => 'required|url|max:255', // Add url validation
            'description' => 'required|string|max:255', // Match 'description' with form input
        ]);
        // Find the record to update
        $portfolio = admin_portfolio::findOrFail($id);

        // Update the fields
        $portfolio->language_name = $request->input('language_name');
        $portfolio->description = $request->input('description');
        $portfolio->url = $request->input('url');

        if ($request->hasFile('img')) {
            // Store the new file
            $profileImagePath = $request->file('img')->store('public/portfolio_images');
            $portfolio->img = $profileImagePath; // Update the model
        }
        // Save the updated record
        $portfolio->save();

        // Redirect with success message
        return redirect('/Admin/Portfolio/ViewsData')->with('success', 'Data updated successfully!');
    }

    // edit
    public function editPortfolioData($id)
    {
        // Fetch the portfolio instance
        $portfolio = admin_portfolio::find($id);
        // Return the edit view with the portfolio data
        return view('admin-panel/layouts/ViewsData/PortfolioDataUpdate', compact('portfolio'));
    }

    // delete
    public function deletePortfolioData($id){
        // Find the record to delete
        $portfolio = admin_portfolio::findOrFail($id);

        // Delete the record
        $portfolio->delete();

        // Redirect with success message
        return redirect('/Admin/Portfolio/ViewsData')->with('success', 'Data deleted successfully!');
    }




}
