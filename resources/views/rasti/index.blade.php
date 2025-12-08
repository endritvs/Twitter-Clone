<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rasti - Lista</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto px-4 py-8">
        <div class="bg-white rounded-lg shadow-md p-6">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-3xl font-bold text-gray-800">Rasti</h1>
                <a href="{{ route('rasti.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                    Shto Rast të Ri
                </a>
            </div>
            
            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            @if($rasti->count() > 0)
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white border border-gray-300">
                        <thead class="bg-gray-200">
                            <tr>
                                <th class="px-6 py-3 border-b border-gray-300 text-left text-xs font-medium text-gray-700 uppercase">ID</th>
                                <th class="px-6 py-3 border-b border-gray-300 text-left text-xs font-medium text-gray-700 uppercase">Emër</th>
                                <th class="px-6 py-3 border-b border-gray-300 text-left text-xs font-medium text-gray-700 uppercase">Rasti</th>
                                <th class="px-6 py-3 border-b border-gray-300 text-left text-xs font-medium text-gray-700 uppercase">Lloji i Rastit</th>
                                <th class="px-6 py-3 border-b border-gray-300 text-left text-xs font-medium text-gray-700 uppercase">Veprime</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($rasti as $rast)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4 border-b border-gray-300 text-sm text-gray-900">{{ $rast->id }}</td>
                                    <td class="px-6 py-4 border-b border-gray-300 text-sm text-gray-900">{{ $rast->emer }}</td>
                                    <td class="px-6 py-4 border-b border-gray-300 text-sm text-gray-900">{{ $rast->rasti }}</td>
                                    <td class="px-6 py-4 border-b border-gray-300 text-sm text-gray-900">{{ $rast->lloji_i_rastit }}</td>
                                    <td class="px-6 py-4 border-b border-gray-300 text-sm">
                                        <a href="{{ route('rasti.show', $rast->id) }}" class="text-blue-600 hover:text-blue-800 mr-3">Shiko</a>
                                        <a href="{{ route('rasti.edit', $rast->id) }}" class="text-yellow-600 hover:text-yellow-800 mr-3">Ndrysho</a>
                                        <form action="{{ route('rasti.destroy', $rast->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-800" onclick="return confirm('A jeni të sigurt që dëshironi të fshini këtë rast?')">Fshi</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="mt-4">
                    {{ $rasti->links() }}
                </div>
            @else
                <div class="text-center py-8 text-gray-500">
                    <p>Nuk ka raste të regjistruara.</p>
                </div>
            @endif
        </div>
    </div>
</body>
</html>
