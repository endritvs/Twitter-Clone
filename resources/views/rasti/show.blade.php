<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shiko Rast</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto px-4 py-8">
        <div class="bg-white rounded-lg shadow-md p-6 max-w-2xl mx-auto">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-3xl font-bold text-gray-800">Detajet e Rastit</h1>
                <a href="{{ route('rasti.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded">
                    Kthehu
                </a>
            </div>

            <div class="space-y-4">
                <div class="border-b border-gray-200 pb-4">
                    <label class="block text-sm font-medium text-gray-500 mb-1">ID</label>
                    <p class="text-lg text-gray-900">{{ $rasti->id }}</p>
                </div>

                <div class="border-b border-gray-200 pb-4">
                    <label class="block text-sm font-medium text-gray-500 mb-1">Emër</label>
                    <p class="text-lg text-gray-900">{{ $rasti->emer }}</p>
                </div>

                <div class="border-b border-gray-200 pb-4">
                    <label class="block text-sm font-medium text-gray-500 mb-1">Rasti</label>
                    <p class="text-lg text-gray-900">{{ $rasti->rasti }}</p>
                </div>

                <div class="border-b border-gray-200 pb-4">
                    <label class="block text-sm font-medium text-gray-500 mb-1">Lloji i Rastit</label>
                    <p class="text-lg text-gray-900">{{ $rasti->lloji_i_rastit }}</p>
                </div>

                <div class="border-b border-gray-200 pb-4">
                    <label class="block text-sm font-medium text-gray-500 mb-1">Krijuar më</label>
                    <p class="text-lg text-gray-900">{{ $rasti->created_at->format('d/m/Y H:i') }}</p>
                </div>

                <div class="pb-4">
                    <label class="block text-sm font-medium text-gray-500 mb-1">Përditësuar më</label>
                    <p class="text-lg text-gray-900">{{ $rasti->updated_at->format('d/m/Y H:i') }}</p>
                </div>

                <div class="flex items-center justify-end space-x-3 mt-6 pt-4 border-t border-gray-200">
                    <a href="{{ route('rasti.edit', $rasti->id) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded">
                        Ndrysho
                    </a>
                    <form action="{{ route('rasti.destroy', $rasti->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded" onclick="return confirm('A jeni të sigurt që dëshironi të fshini këtë rast?')">
                            Fshi
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
