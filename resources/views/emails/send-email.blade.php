Hello,<br>
This email was sent from the <strong>Synergy Report Management System's Admin Portal</strong>.
<br>

{!! $body !!}

<br>
@if ($attachments && count($attachments) > 0)

    <hr>
    <h3>Attachments:</h3>
    @foreach ($attachments as $attachment)
        <p>{{ $attachment['options']['as'] }}</p>
    @endforeach
    <hr>

@endif

<br> Thanks,<br>
    {{ config('app.name') }}
