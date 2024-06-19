<?php

namespace App\Http\Controllers;

use App\Models\TalkProposal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TalkProposalController extends Controller
{
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'title' => 'required|string|max:255',
            'abstract' => 'required|string',
            'preferred_time_slot' => 'required|string',
        ]);
        
        try {
            
            // Attempt to create the TalkProposal
            $talkProposal = TalkProposal::create([
                'speaker_id' => Auth::id(),
                'title' => $request->input('title'),
                'abstract' => $request->input('abstract'),
                'preferred_time_slot' => $request->input('preferred_time_slot')
            ]);

            // Redirect to the proposal list page
            return redirect('proposal-list');
        } catch (\Exception $e) {
            // Handle any exceptions that occur during the process
            // Log the error or handle it as needed
            return back()->withInput()->with('error', 'An error occurred while saving the proposal. Please try again.');
        }
    }

    public function talkTest(Request $request)
    {
        // Validate the request data
        $request->validate([
            'title' => 'required|string|max:255',
            'abstract' => 'required|string',
            'preferred_time_slot' => 'required|string',
        ]);
        
        try {
            
            // Attempt to create the TalkProposal
            $talkProposal = TalkProposal::create([
                'speaker_id' => Auth::id(),
                'title' => $request->input('title'),
                'abstract' => $request->input('abstract'),
                'preferred_time_slot' => $request->input('preferred_time_slot')
            ]);
            // Return a JSON response indicating success
            return response()->json([
                'message' => 'Proposal successful.',
                'speaker' => $talkProposal
            ], 201); // HTTP status code 201 for resource created
            
        } catch (\Exception $e) {
            // Handle any exceptions that occur during the process
            // Log the error or handle it as needed
            return back()->withInput()->with('error', 'An error occurred while saving the proposal. Please try again.');
        }
    }

    public function index()
    {
        $proposals = TalkProposal::where("speaker_id", Auth::id())->orderBy('preferred_time_slot')->get();
        return view('proposal-list', compact('proposals'));
    }
}
