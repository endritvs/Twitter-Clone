<!-- search_results.blade.php -->
<h1>Search Results for "{{ $searchTerm }}"</h1>

@if (count($tables) > 0)
    @foreach ($tables as $table => $results)
        <h2>Table: {{ $table }}</h2>

        <ul>
            @foreach ($results as $result)
                <li>
                    @foreach (get_object_vars($result) as $key => $value)
                        {{ $key }}: {{ $value }}<br>
                    @endforeach
                </li>
            @endforeach
        </ul>
    @endforeach
@else
    <p>No results found.</p>
@endif
