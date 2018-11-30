<div class="box-header with-border">
    <h3 class="box-title"></h3>
    <div class="pull-right">

    </div>
</div>
<!-- /.box-header -->
<div class="box-body no-padding">
    <div class="mailbox-read-info">
        <?php $res = $membre->getById($_GET['senderId']) ?>
        <h3> {{ $res->username }}</h3>
        <h5> Email: {{ $res->email }} </h5>

            <span class="mailbox-read-time pull-right"></span>
    </div>
    @foreach($conversation as $c)
        <div class="mailbox-read-message">
            <div class="direct-chat-msg" data-id="{{ $c['receivedId'] }}">
                <div data-key="{{ $c['receivedId'] }}" class="direct-chat-text">
                    {{ $c['message'] }}
                    <div class="direct-chat-danger clearfix">
                        <span data-time="{{ $c['receivedId'] }}" class="direct-chat-timestamp">{{ $c['timestamp'] }}</span>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

</div>

<div class="box-footer">
    <form action="" method="post">
        @csrf
        <div class="input-group">
            <input name="message" placeholder="Type Message ..." class="form-control" type="text">
            <input name="senderId" type="hidden" value="">
            <span class="input-group-btn">
                                    <button type="submit" class="btn btn-success btn-flat">Reply</button>
                                </span>
        </div>
    </form>
</div>