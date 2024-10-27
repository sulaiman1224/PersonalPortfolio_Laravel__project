<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;
use App\Models\Feedback;

class AdminComposer
{
    public function compose(View $view)
    {
        // Count feedbacks where status is not 'seen'
        $unseenFeedbackCount = Feedback::where('status', 'not seen')->count();

        // Share the variable with all views in the admin panel
        $view->with('unseenFeedbackCount', $unseenFeedbackCount);
    }
}
