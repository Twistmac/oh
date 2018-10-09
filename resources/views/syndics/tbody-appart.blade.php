@foreach($appart as $item)
    <tr>
        <td>{{ $item->id_appartement }}</td>
        <td>{{ $item->username }}</td>
    </tr>
@endforeach