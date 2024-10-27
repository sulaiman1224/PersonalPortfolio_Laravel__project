<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\admin_about;
use App\Models\feedback;

class AboutController extends Controller
{
    public function StoreAboutData(Request $request)
    {
        // Validate the incoming request data
         $request->validate([
            'name' =>' required|string|max:250',
            'profession' => 'required|string|max:250',
            'profession_description' => 'required|string',
            'journey' => 'required|string',
            'skill_1_name' => 'required|string|max:250',
            'skill_1_description' => 'required|string',
            'skill_2_name' => 'required|string|max:250',
            'skill_2_description' => 'required|string',
            'skill_3_name' => 'required|string|max:250',
            'skill_3_description' => 'required|string',
            'skill_4_name' => 'required|string|max:250',
            'skill_4_description' => 'required|string',
            'skill_5_name' => 'required|string|max:250',
            'skill_5_description' => 'required|string',
            'my_approach' => 'required|string',
            'lets_connect' => 'required|string',
            'dob' => 'required|date',
            'age' => 'nullable|integer',
            'website' => 'nullable|url|max:2048',
            'email' => 'required|email|max:250|unique:admin_abouts,email',
            'degree' => 'required|string|max:250',
            'phone' => 'required|string|max:250',
            'city' => 'required|string|max:250',
            'freelance' => 'required|string|max:250',
            'first_language_name' => 'required|string|max:250',
            'first_language_pct' => 'required|string|max:250',
            'second_language_name' => 'required|string|max:250',
            'second_language_pct' => 'required|string|max:250',
            'third_language_name' => 'nullable|string|max:250',
            'third_language_pct' => 'nullable|string|max:250',
            'fourth_language_name' => 'nullable|string|max:250',
            'fourth_language_pct' => 'nullable|string|max:250',
            'first_education_title' => 'required|string|max:250',
            'first_education_description' => 'required|string',
            'second_education_title' => 'required|string|max:250',
            'second_education_description' => 'required|string',
            'third_education_title' => 'nullable|string|max:250',
            'third_education_description' => 'nullable|string',
        ]);

        // Create a new instance of the model
        $About = new admin_about();

        if (admin_about::where('profession', $request->profession)->exists()) {
            return response()->json(['message' => 'Record already exists!'], 400);
        }

        // Manually assign specific fields
        $About->name=$request->input('name');
        $About->profession = $request->input('profession');
        $About->profession_description = $request->input('profession_description');
        $About->journey = $request->input('journey');
        $About->skill_1_name = $request->input('skill_1_name');
        $About->skill_1_description = $request->input('skill_1_description');
        $About->skill_2_name = $request->input('skill_2_name');
        $About->skill_2_description = $request->input('skill_2_description');
        $About->skill_3_name = $request->input('skill_3_name');
        $About->skill_3_description = $request->input('skill_3_description');
        $About->skill_4_name = $request->input('skill_4_name');
        $About->skill_4_description = $request->input('skill_4_description');
        $About->skill_5_name = $request->input('skill_5_name');
        $About->skill_5_description = $request->input('skill_5_description');
        $About->my_approach = $request->input('my_approach');
        $About->lets_connect = $request->input('lets_connect');
        $About->dob = $request->input('dob');
        $About->age = $request->input('age');
        $About->website = $request->input('website');
        $About->email = $request->input('email');
        $About->degree = $request->input('degree');
        $About->phone = $request->input('phone');
        $About->city = $request->input('city');
        $About->freelance = $request->input('freelance');
        $About->first_language_name = $request->input('first_language_name');
        $About->first_language_pct = $request->input('first_language_pct');
        $About->second_language_name = $request->input('second_language_name');
        $About->second_language_pct = $request->input('second_language_pct');
        $About->third_language_name = $request->input('third_language_name');
        $About->third_language_pct = $request->input('third_language_pct');
        $About->fourth_language_name = $request->input('fourth_language_name');
        $About->fourth_language_pct = $request->input('fourth_language_pct');
        $About->first_education_title = $request->input('first_education_title');
        $About->first_education_description = $request->input('first_education_description');
        $About->second_education_title = $request->input('second_education_title');
        $About->second_education_description = $request->input('second_education_description');
        $About->third_education_title = $request->input('third_education_title');
        $About->third_education_description = $request->input('third_education_description');

        // Save the model instance to the database
        $About->save();
        // Return a response (e.g., success message or redirect)
      return response()->json(['message' => 'Data saved successfully!'], 201);
    }
     //============================================================================get data =================================================================
     public function getAboutData()  {
            $About = admin_about::all();
            $unseenFeedbackCount = Feedback::where('status', '!=', 'seen')->count();
            // Log the unseen feedback count
            \Log::info('Unseen Feedback Count: ' . $unseenFeedbackCount);
            return view("admin-panel/layouts/ViewsData/AboutViewsData", compact('About','unseenFeedbackCount'));

    }

    // edit

    public function editAboutData($id)  {
        // get data by id
        $about = admin_about::find($id);
        if (!$about) {
            return response()->json(['message' => 'Record not found!'], 404);
        }
        return view("admin-panel/layouts/ViewsData/AboutDataUpdate", compact('about'));
    }


    //============================================================================update data =================================================================
    public function UpdateAboutData(Request $request, $id)  {
        // update
        $about = admin_about::find($id);

        if (!$about) {
            return response()->json(['message' => 'Record not found!'], 404);
        }

     // Validate the incoming request data
     $request->validate([
        'name' =>' required|string|max:250',
        'profession' => 'required|string|max:250',
        'profession_description' => 'required|string',
        'journey' => 'required|string',
        'skill_1_name' => 'required|string|max:250',
        'skill_1_description' => 'required|string',
        'skill_2_name' => 'required|string|max:250',
        'skill_2_description' => 'required|string',
        'skill_3_name' => 'required|string|max:250',
        'skill_3_description' => 'required|string',
        'skill_4_name' => 'required|string|max:250',
        'skill_4_description' => 'required|string',
        'skill_5_name' => 'required|string|max:250',
        'skill_5_description' => 'required|string',
        'my_approach' => 'required|string',
        'lets_connect' => 'required|string',
        'dob' => 'required|date',
        'age' => 'nullable|integer',
        'website' => 'nullable|url|max:2048',
        'email' => 'required|email|max:250|email',
        'degree' => 'required|string|max:250',
        'phone' => 'required|string|max:250',
        'city' => 'required|string|max:250',
        'freelance' => 'required|string|max:250',
        'first_language_name' => 'required|string|max:250',
        'first_language_pct' => 'required|string|max:250',
        'second_language_name' => 'required|string|max:250',
        'second_language_pct' => 'required|string|max:250',
        'third_language_name' => 'nullable|string|max:250',
        'third_language_pct' => 'nullable|string|max:250',
        'fourth_language_name' => 'nullable|string|max:250',
        'fourth_language_pct' => 'nullable|string|max:250',
        'first_education_title' => 'required|string|max:250',
        'first_education_description' => 'required|string',
        'second_education_title' => 'required|string|max:250',
        'second_education_description' => 'required|string',
        'third_education_title' => 'nullable|string|max:250',
        'third_education_description' => 'nullable|string',
    ]);

    // Update text fields
    $about->name=$request->input('name');
    $about->profession = $request->input('profession');
    $about->profession_description = $request->input('profession_description');
    $about->journey = $request->input('journey');
    $about->skill_1_name = $request->input('skill_1_name');
    $about->skill_1_description = $request->input('skill_1_description');
    $about->skill_2_name = $request->input('skill_2_name');
    $about->skill_2_description = $request->input('skill_2_description');
    $about->skill_3_name = $request->input('skill_3_name');
    $about->skill_3_description = $request->input('skill_3_description');
    $about->skill_4_name = $request->input('skill_4_name');
    $about->skill_4_description = $request->input('skill_4_description');
    $about->skill_5_name = $request->input('skill_5_name');
    $about->skill_5_description = $request->input('skill_5_description');
    $about->my_approach = $request->input('my_approach');
    $about->lets_connect = $request->input('lets_connect');
    $about->dob = $request->input('dob');
    $about->age = $request->input('age');
    $about->website = $request->input('website');
    $about->email = $request->input('email');
    $about->degree = $request->input('degree');
    $about->phone = $request->input('phone');
    $about->city = $request->input('city');
    $about->freelance = $request->input('freelance');
    $about->first_language_name = $request->input('first_language_name');
    $about->first_language_pct = $request->input('first_language_pct');
    $about->second_language_name = $request->input('second_language_name');
    $about->second_language_pct = $request->input('second_language_pct');
    $about->third_language_name = $request->input('third_language_name');
    $about->third_language_pct = $request->input('third_language_pct');
    $about->fourth_language_name = $request->input('fourth_language_name');
    $about->fourth_language_pct = $request->input('fourth_language_pct');
    $about->first_education_title = $request->input('first_education_title');
    $about->first_education_description = $request->input('first_education_description');
    $about->second_education_title = $request->input('second_education_title');
    $about->second_education_description = $request->input('second_education_description');
    $about->third_education_title = $request->input('third_education_title');
    $about->third_education_description = $request->input('third_education_description');
    // Save the model instance to the database
    $about->save();

    // Return a response (e.g., success message or redirect)

    return redirect('/Admin/About/ViewsData')->with('success', 'Data updated successfully!');
    }
// delete
    public function deleteAboutData($id)  {
        // get data by id
        $about = admin_about::find($id);

        if (!$about) {
            return response()->json(['message' => 'Record not found!'], 404);
        }
        // delete
        $about->delete();

        // Return a response (e.g., success message or redirect)
        return redirect('/Admin/About/ViewsData')->with('success', 'Data deleted successfully!');
    }
}
