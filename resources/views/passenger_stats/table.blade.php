<div class="table-responsive">
    <table class="table" id="passengerStats-table">
        <thead>
            <tr>
                <th>Name</th>
        <th>Lastname</th>
        <th>Address</th>
        <th>Number</th>
        <th>Age</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($passengerStats as $passengerStat)
            <tr>
                <td>{{ $passengerStat->name }}</td>
            <td>{{ $passengerStat->lastname }}</td>
            <td>{{ $passengerStat->address }}</td>
            <td>{{ $passengerStat->number }}</td>
            <td>{{ $passengerStat->age }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['passengerStats.destroy', $passengerStat->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('passengerStats.show', [$passengerStat->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('passengerStats.edit', [$passengerStat->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
