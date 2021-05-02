@component('mail::message')
    Vous avez une nouvelle commande.<br>
    @component('mail::button', ['url' => $data['url']])
        Cliquez ici pour l'imprimer
    @endcomponent
    <br>
    Merci.<br>
    {{ config('app.name') }}
@endcomponent
