<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePassengerStatRequest;
use App\Http\Requests\UpdatePassengerStatRequest;
use App\Repositories\PassengerStatRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class PassengerStatController extends AppBaseController
{
    /** @var  PassengerStatRepository */
    private $passengerStatRepository;

    public function __construct(PassengerStatRepository $passengerStatRepo)
    {
        $this->passengerStatRepository = $passengerStatRepo;
    }

    /**
     * Display a listing of the PassengerStat.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $passengerStats = $this->passengerStatRepository->all();

        return view('passenger_stats.index')
            ->with('passengerStats', $passengerStats);
    }

    /**
     * Show the form for creating a new PassengerStat.
     *
     * @return Response
     */
    public function create()
    {
        return view('passenger_stats.create');
    }

    /**
     * Store a newly created PassengerStat in storage.
     *
     * @param CreatePassengerStatRequest $request
     *
     * @return Response
     */
    public function store(CreatePassengerStatRequest $request)
    {
        $input = $request->all();

        $passengerStat = $this->passengerStatRepository->create($input);

        Flash::success('Passenger Stat saved successfully.');

        return redirect(route('passengerStats.index'));
    }

    /**
     * Display the specified PassengerStat.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $passengerStat = $this->passengerStatRepository->find($id);

        if (empty($passengerStat)) {
            Flash::error('Passenger Stat not found');

            return redirect(route('passengerStats.index'));
        }

        return view('passenger_stats.show')->with('passengerStat', $passengerStat);
    }

    /**
     * Show the form for editing the specified PassengerStat.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $passengerStat = $this->passengerStatRepository->find($id);

        if (empty($passengerStat)) {
            Flash::error('Passenger Stat not found');

            return redirect(route('passengerStats.index'));
        }

        return view('passenger_stats.edit')->with('passengerStat', $passengerStat);
    }

    /**
     * Update the specified PassengerStat in storage.
     *
     * @param int $id
     * @param UpdatePassengerStatRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePassengerStatRequest $request)
    {
        $passengerStat = $this->passengerStatRepository->find($id);

        if (empty($passengerStat)) {
            Flash::error('Passenger Stat not found');

            return redirect(route('passengerStats.index'));
        }

        $passengerStat = $this->passengerStatRepository->update($request->all(), $id);

        Flash::success('Passenger Stat updated successfully.');

        return redirect(route('passengerStats.index'));
    }

    /**
     * Remove the specified PassengerStat from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $passengerStat = $this->passengerStatRepository->find($id);

        if (empty($passengerStat)) {
            Flash::error('Passenger Stat not found');

            return redirect(route('passengerStats.index'));
        }

        $this->passengerStatRepository->delete($id);

        Flash::success('Passenger Stat deleted successfully.');

        return redirect(route('passengerStats.index'));
    }
}
