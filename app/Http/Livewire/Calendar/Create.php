<?php

namespace App\Http\Livewire\Calendar;

use App\TokenStore\TokenCache;
use Illuminate\Http\Request;
use Livewire\Component;
use Microsoft\Graph\Graph;
use Microsoft\Graph\Model;

class Create extends Component
{
    public $eventSubject;
    public $eventAttendees;
    public $eventStart;
    public $eventEnd;
    public $eventBody;

    protected $rules = [
        'eventSubject' => 'nullable|string',
        'eventAttendees' => 'nullable|string',
        'eventStart' => 'required|date',
        'eventEnd' => 'required|date',
        'eventBody' => 'nullable|string'
    ];

    public function loadViewData()
    {
        $viewData = [];

        // Check for flash errors
        if (session('error')) {
            $viewData['error'] = session('error');
            $viewData['errorDetail'] = session('errorDetail');
        }

        // Check for logged on user
        if (session('userName'))
        {
            $viewData['userName'] = session('userName');
            $viewData['userEmail'] = session('userEmail');
            $viewData['userTimeZone'] = session('userTimeZone');
        }

        return $viewData;
    }

    private function getGraph(): Graph
    {
      // Get the access token from the cache
      $tokenCache = new TokenCache();
      $accessToken = $tokenCache->getAccessToken();

      // Create a Graph client
      $graph = new Graph();
      $graph->setAccessToken($accessToken);
      return $graph;
    }

    public function mount()
    {
        $date = date('Y-m-d', time());
        $time = date('h:i', time());
        $this->eventStart = $date.'T'.$time;
        $this->eventEnd = $date.'T'.$time;
    }

    public function render()
    {
        return view('livewire.calendar.create');
    }

    public function createNewEvent()
    {
      // Validate required fields
      $this->validate();

      $viewData = $this->loadViewData();

      $graph = $this->getGraph();

      // Attendees from form are a semi-colon delimited list of
      // email addresses
      $attendeeAddresses = explode(';', $this->eventAttendees);

      // The Attendee object in Graph is complex, so build the structure
      $attendees = [];
      foreach($attendeeAddresses as $attendeeAddress)
      {
        array_push($attendees, [
          // Add the email address in the emailAddress property
          'emailAddress' => [
            'address' => $attendeeAddress
          ],
          // Set the attendee type to required
          'type' => 'required'
        ]);
      }

      // Build the event
      $newEvent = [
        'subject' => $this->eventSubject,
        'attendees' => $attendees,
        'start' => [
          'dateTime' => $this->eventStart,
          'timeZone' => $viewData['userTimeZone']
        ],
        'end' => [
          'dateTime' => $this->eventEnd,
          'timeZone' => $viewData['userTimeZone']
        ],
        'body' => [
          'content' => $this->eventBody,
          'contentType' => 'text'
        ]
      ];

      // POST /me/events
      $response = $graph->createRequest('POST', '/me/events')
        ->attachBody($newEvent)
        ->setReturnType(Model\Event::class)
        ->execute();

      return redirect('/calendar');
    }
}
