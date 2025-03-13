@component('mail::message')
# Thank You for Contacting Us

Dear {{ $data['name'] }},

We have received your message and will get back to you shortly.

**Your Message Details:**  
Subject: {{ $data['subject'] }}  
Message: {{ $data['message'] }}

Best regards,<br>
{{ config('app.name') }}
@endcomponent