@extends('template')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 d-flex justify-content-between align-items-center">
                <h2>Email Management</h2>
            </div>
        </div>

        <div class="card mx-auto mb-5 mt-3">
            <div class="card-header py-3 d-flex align-items-center justify-content-between">
                @if (session('success') != null)
                    <div class="alert alert-success alert-dismissible fade show myalert mt-2" role="alert">
                        <strong> ✅ SUCCESS!</strong>
                        {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
            </div>
            <div class="row m-3" id="emailFormContainer">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    {{-- <span class="">Type New Email</span> --}}
                    <span class="">&nbsp;</span>

                    <form id="emailForm" method="POST" action="{{ route('email.confirm-send') }}"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="subject" class="form-label">Enter the Email's Subject</label>
                            <input type="text" name="subject" id="subject" class="form-control"
                                value="{{ old('subject') }}" placeholder="Enter the subject of an email">
                            <div class="form-control-feedback text-danger"> {{ $errors->first('subject') }}
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="form-label">Enter the Email Address(s) to Send</label>
                            <input type="text" name="email" id="email" class="form-control"
                                value="{{ old('email') }}" placeholder="Enter email addresses separated by commas">
                            <div class="form-control-feedback text-danger"> {{ $errors->first('email') }}
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="cc" class="form-label">Enter the CC Email Address(s) to
                                Send</label>
                            <input type="text" name="cc" id="cc" class="form-control"
                                value="{{ old('cc') }}" placeholder="Enter cc email addresses separated by commas">
                            <div class="form-control-feedback text-danger"> {{ $errors->first('cc') }} </div>
                        </div>

                        <div class="form-group">
                            <label for="bcc" class="form-label">Enter the BCC Email Address(s) to
                                Send</label>
                            <input type="text" name="bcc" id="bcc" class="form-control"
                                value="{{ old('bcc') }}" placeholder="Enter bcc email addresses separated by commas">
                            <div class="form-control-feedback text-danger"> {{ $errors->first('bcc') }} </div>
                        </div>

                        <div class="form-group">
                            <label for="attachments" class="form-label">Choose/Upload the Attachment(s) for
                                Email</label>
                            <input type="file" name="attachments[]" id="attachments" multiple
                                accept=".pdf,.doc,.docx,.xlsx,.csv" class="form-control"
                                placeholder="Enter bcc email addresses separated by commas">
                            <div class="form-control-feedback text-danger"> {{ $errors->first('attachments') }}
                            </div>
                        </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-12">
                    <span class="">&nbsp;</span>

                    <div class="form-group">
                        <label for="body" class="form-label">Enter the Email's Body:</label>
                        <textarea name="body" id="body" rows="10" class="form-control" value="{{ old('body') }}"
                            placeholder="Enter the email's body"></textarea>
                        <div class="form-control-feedback text-danger"> {{ $errors->first('body') }} </div>
                    </div>


                    <div>&nbsp;</div>
                    <div>&nbsp;</div>
                    <div>&nbsp;</div>


                    <div class="row">
                        <div class="col-lg-2">&nbsp;</div>
                        <button type="submit" id="send-email-btn" class="btn btn-primary btn-block col-lg-4">Send Email
                            &nbsp;<i class="fa fa-light fa-paper-plane"></i></button>
                        <div class="col-lg-1">&nbsp;</div>
                        <button type="button" id="previewBtn" class="btn btn-info btn-block col-lg-5">Preview Email
                            &nbsp;<i class="fa-solid fa-envelope-open-text"></i></button>
                    </div>

                    </form>
                </div>

            </div>
            <div class="row m-3" id="previewContainer" style="display: none;">
                <h1>Email Preview</h1>
                <p><strong>To:</strong> <span id="previewEmails"></span></p>
                <p><strong>CC:</strong> <span id="previewCC"></span></p>
                <p><strong>BCC:</strong> <span id="previewBCC"></span></p>
                <p><strong>Subject:</strong> <span id="previewSubject"></span></p>
                <hr>
                <strong>Email Body:</strong>
                <div id="previewBody"></div>
                <hr>
                <h3>Attachments:</h3>
                <ul id="previewAttachments"></ul>
                <hr>
                {{-- <button type="button" id="backBtn">Back to Form</button>
                <button type="submit" id="send-email-preview-btn">Send Email</button> --}}

                <div class="col-lg-6 col-md-6 col-sm-12 w-100"></div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="row">
                        {{-- <div class="col-lg-2">&nbsp;</div> --}}
                        <button type="button" id="backBtn" class="btn btn-primary btn-block col-lg-5">
                            <i class="fa-solid fa-arrow-left-long"></i>&nbsp; Back to Form</button>
                        <div class="col-lg-1">&nbsp;</div>
                        <button type="submit" id="send-email-preview-btn" class="btn btn-primary btn-block col-lg-4">Send Email
                            &nbsp;<i class="fa fa-light fa-paper-plane"></i></button>
                    </div>
                </div>

            </div>
        </div>

    </div>
@endsection
@section('script')
    <script type="text/javascript">
        $(document).ready(function() {
            setTimeout(function() {
                $('.myalert').hide();
                showDiv2()
            }, 3000);
        })

        document.getElementById('previewBtn').addEventListener('click', function() {
            // Get form values
            var emails = document.getElementById('email').value;
            var ccs = document.getElementById('cc').value;
            var bccs = document.getElementById('bcc').value;
            var subject = document.getElementById('subject').value;
            var body = document.getElementById('body').value;
            var attachments = document.getElementById('attachments').files;

            // Update preview elements
            document.getElementById('previewEmails').textContent = emails;
            document.getElementById('previewCC').textContent = ccs;
            document.getElementById('previewBCC').textContent = bccs;
            document.getElementById('previewSubject').textContent = subject;
            document.getElementById('previewBody').textContent = body;

            var attachmentsList = document.getElementById('previewAttachments');
            attachmentsList.innerHTML = '';
            for (var i = 0; i < attachments.length; i++) {
                var attachmentItem = document.createElement('li');
                attachmentItem.textContent = attachments[i].name;
                attachmentsList.appendChild(attachmentItem);
            }

            // Show preview and hide form
            document.getElementById('emailFormContainer').style.display = 'none';
            document.getElementById('previewContainer').style.display = 'block';
        });

        document.getElementById('backBtn').addEventListener('click', function() {
            // Hide preview and show form
            document.getElementById('previewContainer').style.display = 'none';
            document.getElementById('emailFormContainer').style.display = 'flex';
        });

        document.getElementById('send-email-preview-btn').addEventListener('click', function() {
            document.getElementById('send-email-btn').click();
        });
    </script>
@endsection

<!-- resources/views/email.blade.php -->
