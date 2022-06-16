<?php

namespace App\Http\Livewire\Calendar;

use App\TokenStore\TokenCache;
use Livewire\Component;
use Microsoft\Graph\Graph;
use Microsoft\Graph\Model;

class Edit extends Component
{
    private $event;
    public $eventId;
    public $eventSubject;
    public $eventAttendees;
    public $eventStart;
    public $eventEnd;
    public $eventMeeting;
    public $eventBody;

    protected $rules = [
        'eventSubject' => 'nullable|string',
        'eventAttendees' => 'nullable|string',
        'eventStart' => 'required|date',
        'eventEnd' => 'required|date',
        'eventBody' => 'nullable|string',
        'eventMeeting' => 'nullable|boolean'
    ];

    public function mount($id)
    {
        $this->eventId = $id;
        $this->event = $this->getEvent($id);

        $this->eventSubject = $this->event->getSubject();
        $this->eventAttendees = $this->event->getSubject();
        $this->eventStart = $this->transformTime($this->event->getStart()->getDateTime());
        $this->eventEnd = $this->transformTime($this->event->getEnd()->getDateTime());
        $this->eventMeeting = $this->event->getIsOnlineMeeting();
        $this->eventBody = $this->event->getBody()->getContent();
    }

    public function render()
    {
        return view('livewire.calendar.edit');
    }

    public function loadViewData()
    {
        $viewData = [];

        // Check for flash errors
        if (session('error')) {
            $viewData['error'] = session('error');
            $viewData['errorDetail'] = session('errorDetail');
        }

        // Check for logged on user
        if (session('userName')) {
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

    public function getEvent($id)
    {
        $graph = $this->getGraph();

        // POST /me/events
        $response = $graph->createRequest('GET', '/me/events/' . $id)
            ->setReturnType(Model\Event::class)
            ->execute();

        return $response;
    }

    public function transformTime($time)
    {
        $correctFormat = explode('.', $time);

        return $correctFormat[0];
    }

    public function updateNewEvent()
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
        foreach ($attendeeAddresses as $attendeeAddress) {
            array_push($attendees, [
                // Add the email address in the emailAddress property
                'emailAddress' => [
                    'address' => $attendeeAddress
                ],
                // Set the attendee type to required
                'type' => 'required'
            ]);
        }

        if ($this->eventMeeting) {
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
                ],
                'location' => [
                    'displayName' => 'Harry\'s Bar'
                ],
                "allowNewTimeProposals" => true,
                "isOnlineMeeting" => $this->eventSubject,
                "onlineMeetingProvider" => "teamsForBusiness"
            ];
        } else {
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
        }

        // POST /me/events
        $response = $graph->createRequest('PATCH', '/me/events/'.$this->eventId)
            ->attachBody($newEvent)
            ->setReturnType(Model\Event::class)
            ->execute();

        return redirect('/scheduler');
    }
}
