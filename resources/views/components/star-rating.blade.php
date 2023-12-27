<div class="">
    <!-- Always remember that you are absolutely unique. Just like everyone else. - Margaret Mead -->
    {{-- Star rating goes here --}}
    @if ($rating)
        @for ($i = 1; $i <= 5; $i++)
            {{ $i <= $rating ? '★' : '✩' }}
        @endfor
    @else
        No rating yet
    @endif
</div>

{{-- `php artisan make:component StarRating` => to make a star rating component. --}}
{{-- you can also pass data to components 
    app/view/components/component_name in __construct function  --}}
