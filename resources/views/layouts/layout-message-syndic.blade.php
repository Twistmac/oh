<div class="box box-solid">
    <div class="box">

        <div class="box-body no-padding">
            <div class="mailbox-controls">

                <div class="btn-group">

                </div>


            </div>
            <div class="table-responsive mailbox-messages">
                <table id="table-message" class="table table-hover datatable">
                    <thead>
                    <tr>
                        <th> </th>
                        <th> </th>
                        <th> </th>
                        <th></th>
                        <th>date</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($mp_syndic as $message)
                        <tr class="vue{{ $message['read'] }}" data-key="{{ $message['chatId'] }}">
                            <td> </td>
                            <td class="mailbox-name"><a href="#">
                                    <?php
                                    $user = $membre->getById( $message['senderId'] );
                                    foreach ($user as $us){
                                        echo $us->username;
                                    }
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
                    </tbody>
                </table>
                <!-- /.table -->
            </div>
            <!-- /.mail-box-messages -->
        </div>
        <!-- /.box-body -->
    </div>

</div>