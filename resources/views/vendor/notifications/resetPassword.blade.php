@component('mail::message')
<h1>Hello!</h1>

<p>
    Click this button to reset your password.
</p>
<p>
    If you didn't request to reset password, please ignore this message.
</p>

{{-- Action Button --}}
@isset($actionText)
<?php
    switch ($level) {
        case 'success':
        case 'error':
            $color = $level;
            break;
        default:
            $color = 'primary';
    }
?>
@component('mail::button', ['url' => $actionUrl, 'color' => $color])
{{ $actionText }}
@endcomponent
@endisset

@endcomponent
