@component('mail::message')

# Nova despesa cadastrada

Foi cadastrada, no seu usuário, uma nova despesa descrita como "{{ $expense->description }}", de valor R$ {{ number_format($expense->amount, 2, ",", ".") }}.

Verifique a plataforma para mais detalhes.

<sub><sup>Ás {{ $currentDate->format('d/m/Y H:i') }}</sup></sub>

@endcomponent
