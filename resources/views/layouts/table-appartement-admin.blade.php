@foreach($appartement as $appartements)
    <tr>
        <td>{{ $appartements->id_appartement }}</td>
        <td></td>
        <td>{{ $appartements->username }}</td>
        <td>{{ base64_decode($appartements->salt) }}</td>
        <td></td>
        <td>
            <form data-id="{{ $appartements->id }}" class="form-inline" method="get">
                @csrf
                <button type="submit" class="btn btn-flat btn-xs" data-toggle="tooltip" data-placement="top" title="">
                    <span class="{{ $appartements->etat }}"></span>
                </button>
            </form></td>
    </tr>
@endforeach

