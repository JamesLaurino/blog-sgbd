@php
    $name = auth()->user()->name;
    $firstLetter = strtoupper(substr($name,0,1));
    $lastLetters = strtoupper(substr($name,-2));
    $color = substr(hash('sha256', $name),0,6);
@endphp

<a style="background-color: {{"#" . $color}}"
   class='nav-link text-dark rounded-circle' href='/dashboard'>
    {{$firstLetter . $lastLetters}}
</a>
