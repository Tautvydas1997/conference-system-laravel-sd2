<?php

namespace App\Http\Controllers;

use App\Services\ConferenceService;
use App\Services\UserService;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    protected ConferenceService $conferenceService;
    protected UserService $userService;

    public function __construct(ConferenceService $conferenceService, UserService $userService)
    {
        $this->conferenceService = $conferenceService;
        $this->userService = $userService;
    }

    public function index()
    {
        $conferences = $this->conferenceService->all();
        
        return view('employee.index', [
            'conferences' => $conferences,
        ]);
    }

    public function show($id)
    {
        $conference = $this->conferenceService->find($id);
        
        if (!$conference) {
            return redirect()->route('employee.index')->with('error', 'Konferencija nerasta');
        }

        $registeredUsers = $this->conferenceService->getRegisteredUsers($id);
        
        return view('employee.show', [
            'conference' => $conference,
            'registeredUsers' => $registeredUsers,
        ]);
    }
}

