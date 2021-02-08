@component('mail::message')
# {{ __('admin.hi') }} {{ $parent_name }}

{{ __('admin.paypayments_message') }}

{{ __('admin.thanks') }},<br>
{{ config('app.name') }}
@endcomponent
