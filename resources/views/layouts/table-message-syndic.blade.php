@foreach($mp as $message)
    <tr class="vue{{ $message->vue }}">
        <form id="read-message-form" method="post" action="{{ route('syndic.read-message') }}">

            <td><input type="checkbox"></td>
            <input type="hidden" id="id_message" name="id_message" value="{{ $message->id_message }}">
            <td class="mailbox-name"><a href="#">{{ $message->username }}</a></td>
            <td class="mailbox-subject" style="max-width: 100px;white-space: nowrap;overflow: hidden;text-overflow: ellipsis;">{{ $message->messagerie }}</td>
            <td class="mailbox-attachment"></td>
            <?php
            $date=date_create($message->date_send );
            ?>
            <td class="mailbox-date">{{ date_format($date,"d M Y  H:i") }}</td>
        </form>

    </tr>
@endforeach