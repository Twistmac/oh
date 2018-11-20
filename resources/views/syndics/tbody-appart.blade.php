<?php $i=0; ?>
@foreach($appart as $item)
    <?php $i++; ?>
    <tr>
        <td>{{ $i }}</td>
        <td>{{ $item->num_appartement }}</td>
        <td>{{ $item->username }}</td>
    </tr>
@endforeach