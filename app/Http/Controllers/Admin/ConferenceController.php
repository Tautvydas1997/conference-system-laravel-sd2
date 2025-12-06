<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreConferenceRequest;
use App\Http\Requests\UpdateConferenceRequest;
use App\Services\ConferenceService;
use Illuminate\Http\Request;

class ConferenceController extends Controller
{
    protected ConferenceService $conferenceService;

    public function __construct(ConferenceService $conferenceService)
    {
        $this->conferenceService = $conferenceService;
    }

    public function index()
    {
        $conferences = $this->conferenceService->all();
        
        return view('conferences.index', [
            'conferences' => $conferences,
            'showCreateButton' => true,
            'showEditButton' => true,
            'showDeleteButton' => true,
        ]);
    }

    public function create()
    {
        return view('conferences.create');
    }

    public function store(StoreConferenceRequest $request)
    {
        $data = $request->validated();
        $data['status'] = 'planned';
        
        $this->conferenceService->create($data);
        
        return redirect()->route('admin.conferences.index')->with('success', __('conferences.created_success'));
    }

    public function edit($id)
    {
        $conference = $this->conferenceService->find($id);
        
        if (!$conference) {
            return redirect()->route('admin.conferences.index')->with('error', 'Konferencija nerasta');
        }
        
        return view('conferences.edit', [
            'conference' => $conference,
        ]);
    }

    public function update(UpdateConferenceRequest $request, $id)
    {
        $conference = $this->conferenceService->find($id);
        
        if (!$conference) {
            return redirect()->route('admin.conferences.index')->with('error', 'Konferencija nerasta');
        }
        
        $this->conferenceService->update($id, $request->validated());
        
        return redirect()->route('admin.conferences.index')->with('success', __('conferences.updated_success'));
    }

    public function destroy($id)
    {
        $conference = $this->conferenceService->find($id);
        
        if (!$conference) {
            return redirect()->route('admin.conferences.index')->with('error', 'Konferencija nerasta');
        }

        if ($conference->status === 'completed') {
            return redirect()->route('admin.conferences.index')->with('error', __('conferences.cannot_delete_completed'));
        }
        
        $this->conferenceService->delete($id);
        
        return redirect()->route('admin.conferences.index')->with('success', __('conferences.deleted_success'));
    }
}

