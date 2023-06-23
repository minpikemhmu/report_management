<h1>Preview Email</h1>

<p><strong>To:</strong> {{ implode(', ', $emails) }}</p>
@if (!empty($ccEmails))
    <p><strong>CC:</strong> {{ implode(', ', $ccEmails) }}</p>
@endif
@if (!empty($bccEmails))
    <p><strong>BCC:</strong> {{ implode(', ', $bccEmails) }}</p>
@endif
<p><strong>Subject:</strong> {{ $subject }}</p>

<hr>

{!! $htmlBody !!}

<hr>

<h3>Attachments:</h3>
@foreach ($attachments as $attachment)
    <p>{{ $attachment->getClientOriginalName() }}</p>
@endforeach

<hr>

<form method="POST" action="{{ route('email.confirm-send') }}">
    @csrf
    <input type="hidden" name="email" value="{{ implode(',', $emails) }}">
    <input type="hidden" name="cc" value="{{ implode(',', $ccEmails) }}">
    <input type="hidden" name="bcc" value="{{ implode(',', $bccEmails) }}">

    @foreach ($attachments as $attachment)
        <input type="hidden" name="attachments[]" value="{{ $attachment }}">
    @endforeach

    <input type="hidden" name="body" value="{{ $body }}">
    <input type="hidden" name="subject" value="{{ $subject }}">
    <button type="submit">Send Email</button>
    <a href="{{ route('email.form', ['email' => old('email')]) }}" class="btn btn-sm btn-dark"><i class="fa-solid fa-arrow-left-long"></i>
        back</a>
</form>
