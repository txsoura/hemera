<?php


namespace Domain\Event\Http;


use Domain\Event\ResumeData;
use Illuminate\Http\Request;
use Rapi\Core\Http\Controllers\RapiController;

class EventResumeController extends RapiController
{
    public function resume(Request $request, ResumeData $resume)
    {
        \Log::info("entrou");
        // $this->validate($request, ['dt_start' => 'nullable|date', 'dt_end' => 'nullable|date', 'city' => 'nullable', 'category' => 'nullable']);

        // $resume
        //     ->setStart($request->input('dt_start'))
        //     ->setEnd($request->input('dt_end'))
        //     ->setCity($request->input('city'))
        //     ->setCategory($request->input('category'));

        // return $this->response()->withData($resume->toArray());
    }
}
