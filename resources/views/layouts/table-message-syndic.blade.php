@foreach($mp_syndic as $message)
    <tr class="vue{{ $message['read'] }}" data-key="{{ $message['chatId'] }}">
        <td> </td>
        <td class="mailbox-name"><a href="#">
                <?php
                $user = $membre->getById( $message['senderId'] );
                    echo $user->username;
                ?>
            </a>
        </td>
        <td class="mailbox-subject" style="max-width: 100px;white-space: nowrap;overflow: hidden;text-overflow: ellipsis;">{{ $message['lastMessage'] }} </td>
        <td class="mailbox-attachment"> </td>
        <?php
        //$date=date_create($message->date_send );
        ?>
        <td class="mailbox-date"> {{ $message['timestamp'] }}</td>

    </tr>


@endforeach

