<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Krijo Rast të Ri</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto px-4 py-8">
        <div class="bg-white rounded-lg shadow-md p-6 max-w-2xl mx-auto">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-3xl font-bold text-gray-800">Krijo Rast të Ri</h1>
                <a href="{{ route('rasti.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded">
                    Kthehu
                </a>
            </div>

            <form action="{{ route('rasti.store') }}" method="POST" class="space-y-4">
                @csrf
                
                <div>
                    <label for="emer" class="block text-sm font-medium text-gray-700 mb-2">Emër</label>
                    <input type="text" name="emer" id="emer" value="{{ old('emer') }}" 
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('emer') border-red-500 @enderror"
                        required>
                    @error('emer')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="rasti" class="block text-sm font-medium text-gray-700 mb-2">Rasti</label>
                    <input type="text" name="rasti" id="rasti" value="{{ old('rasti') }}" 
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('rasti') border-red-500 @enderror"
                        required>
                    @error('rasti')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="lloji_i_rastit" class="block text-sm font-medium text-gray-700 mb-2">Lloji i Rastit</label>
                    <input type="text" name="lloji_i_rastit" id="lloji_i_rastit" value="{{ old('lloji_i_rastit') }}" 
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('lloji_i_rastit') border-red-500 @enderror"
                        required>
                    @error('lloji_i_rastit')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center justify-end space-x-3">
                    <a href="{{ route('rasti.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded">
                        Anulo
                    </a>
                    <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                        Ruaj
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
