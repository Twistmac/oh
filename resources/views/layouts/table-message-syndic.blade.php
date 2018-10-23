@foreach($mp as $message)
    <tr class="vue{{ $message['read'] }}" data-key="{{ $message['key'] }}">
            <td> </td>
            <input type="hidden" id="id_message" name="messageId" value="{{ $message['messageId'] }}">
            <input type="hidden" id="key_message" name="key_message" value="{{ $message['key'] }}">
            <td class="mailbox-name"><a href="#">
                    <?php
                    $user = $membre->getById( $message['senderId'] );
                    foreach ($user as $us){
                        echo $us->username;
                    }
                    ?>
                </a>
            </td>
            <td class="mailbox-subject" style="max-width: 100px;white-space: nowrap;overflow: hidden;text-overflow: ellipsis;">{{ $message['message'] }}</td>
            <td class="mailbox-attachment"> </td>
            <?php
            //$date=date_create($message->date_send );
            ?>
            <td class="mailbox-date"> {{ $message['timestamp'] }}</td>

    </tr>
@endforeach

