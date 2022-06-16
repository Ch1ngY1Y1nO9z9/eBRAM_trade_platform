<?php

namespace App\Http\Livewire\Calendar;

use Illuminate\Http\Request;
use App\TimeZones\TimeZones;
use App\TokenStore\TokenCache;
use Livewire\Component;
use Microsoft\Graph\Graph;
use Microsoft\Graph\Model;

class Index extends Component
{
    public $listeners = [
        'AS:edit' => 'edit',
        'AS:delete' => 'delete'
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

    public function render()
    {
        $viewData = $this->loadViewData();

        $graph = $this->getGraph();

        // Get user's timezone
        $timezone = TimeZones::getTzFromWindows($viewData['userTimeZone']);

        // Get start and end of week
        $startOfWeek = new \DateTimeImmutable('sunday -1 week', $timezone);
        $endOfWeek = new \DateTimeImmutable('sunday', $timezone);

        $viewData['dateRange'] = $startOfWeek->format('M j, Y') . ' - ' . $endOfWeek->format('M j, Y');

        $queryParams = array(
            'startDateTime' => $startOfWeek->format(\DateTimeInterface::ISO8601),
            'endDateTime' => $endOfWeek->format(\DateTimeInterface::ISO8601),
            // Only request the properties used by the app
            '$select' => 'subject,organizer,start,end,isOnlineMeeting,onlineMeeting,onlineMeetingProvider',
            // Sort them by start time
            '$orderby' => 'start/dateTime',
            // Limit results to 25
            '$top' => 25
        );

        // Append query parameters to the '/me/calendarView' url
        $getEventsUrl = '/me/calendarView?' . http_build_query($queryParams);

        $events = $graph->createRequest('GET', $getEventsUrl)
            // Add the user's timezone to the Prefer header
            ->addHeaders(array(
                'Prefer' => 'outlook.timezone="' . $viewData['userTimeZone'] . '"'
            ))
            ->setReturnType(Model\Event::class)
            ->execute();

        $viewData['events'] = $events;


        return view('livewire.calendar.index', $viewData);
    }

    // <getNewEventFormSnippet>
    public function getNewEventForm()
    {
        $viewData = $this->loadViewData();

        return view('newevent', $viewData);
    }
    // </getNewEventFormSnippet>

    public function delete($id)
    {
        $graph = $this->getGraph();
        $url = '/me/events/' . $id;

        $response = $graph->createRequest('DELETE', $url)
            ->setReturnType(Model\Event::class)
            ->execute();
    }
}
