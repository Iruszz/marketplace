Hello {{ $user->name }},

Welcome to {{ config('app.name') }} — your new home for buying and selling!

We're excited to have you on board. You can now list items, browse deals, and connect with other users in the marketplace.

Get started by logging in to your account:
{{ url('/login') }}

If you have any questions, we're here to help.

Happy trading!  
The {{ config('app.name') }} Team
