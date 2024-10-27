<?php

namespace App\Http\Controllers;
use App\Models\feedback;

use Illuminate\Http\Request;

class Home_feedback extends Controller
{
    //
    // store data
    public function StoreFeedbackData(Request $request) {
        // Validate the data


            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'subject' => 'required|string|max:255',
                'message' => 'required|string',

            ]);

            $feedback = new feedback();
            $feedback->name = $validated['name'];
            $feedback->email = $validated['email'];
            $feedback->subject = $validated['subject'];
            $feedback->message = $validated['message'];



            // Check for existing feedback with the same content
            $existingFeedback = feedback::where('name', $feedback->name)
                ->where('email', $feedback->email)
                ->where('subject', $feedback->subject)
                ->where('message', $feedback->message)
                ->first();

            if ($existingFeedback) {
                return response()->json(['warning' => 'You already sent this message..'], 400);
            }

            // Save the feedback
            if ($feedback->save()) {
                return response()->json(['message' => 'message sent successfully!'], 200);
            }

            return response()->json(['error' => 'Failed to send feedback.'], 500);
    }
    public function getFeedbackData() {
        // Get all feedbacks
        $feedback = feedback::all();
        // Pass the count and feedback data to the view
        return view('admin-panel/layouts/ViewsData/FeedbackViewsData', compact('feedback'));
    }
    public function getstatusData()
    {
        // Count feedbacks where status is not 'seen'
        $unseenFeedbackCount = feedback::where('status', '!=', 'seen')->count();

        // Log the unseen feedback count
        \Log::info('Unseen Feedback Count: ' . $unseenFeedbackCount);

        // Pass the count to the view
        return view('admin-panel.layouts.addData.Main', compact('unseenFeedbackCount'));
    }

    // update data
    public function updatefeedbackData($id) {
        // Find the feedback with the given ID
        $feedback = feedback::find($id);

        // Update the status to 'seen'
        $feedback->status ='seen';

        // Save the updated feedback
        $feedback->save();
        return redirect('/Admin/Feedback/ViewsData')->with('success', 'updated Status successfully!');
    }
    // editFeedback
    public function editfeedbackData($id) {
        // Find the feedback with the given ID
        $feedback = feedback::find($id);

        // Pass the feedback data to the view for editing
        return view('admin-panel.layouts.ViewsData.FeedbackDataUpdate', compact('feedback'));
    }
    // delete data


    public function deletefeedbackData($id){
        // Find the record to delete
        $feedback =  feedback::findOrFail($id);

        // Delete the record
        $feedback->delete();

        // Redirect with success message
        return redirect('/Admin/Feedback/ViewsData')->with('success', 'Data deleted successfully!');
    }




}
