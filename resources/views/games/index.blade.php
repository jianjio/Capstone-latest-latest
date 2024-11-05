@include('layouts.navigation')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Games</title>
    @vite(['resources/css/library.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Protest+Guerrilla&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" href="{{ asset('logo-footer.png') }}" type="image/x-icon">
    <script>
        function filterGames() {
            const searchInput = document.getElementById('search').value.toLowerCase();
            const genreSelect = document.getElementById('genre').value;
            const platformSelect = document.getElementById('platform').value;
            const gameCards = document.querySelectorAll('.game-card');

            gameCards.forEach(card => {
                const title = card.querySelector('.game-title').innerText.toLowerCase();
                const genre = card.getAttribute('data-genre');
                const platform = card.getAttribute('data-platform');

                const matchesSearch = title.includes(searchInput);
                const matchesGenre = genreSelect === 'all' || genre === genreSelect;
                const matchesPlatform = platformSelect === 'all' || platform === platformSelect;

                card.style.display = matchesSearch && matchesGenre && matchesPlatform ? 'block' : 'none';
            });
        }

        function showModal() {
            const modal = document.getElementById('successModal');
            modal.classList.remove('hidden');
        }

        function closeModal() {
            const modal = document.getElementById('successModal');
            modal.classList.add('hidden');
        }
    </script>
</head>
<body class="bg-black font-poppins">
    <section class="hero text-center content-center">
        <div class="container mx-auto px-4">
            <h1 class="md:text-9xl text-8xl tracking-widest uppercase font-protest text-[#D1BDC6] mb-4">Games</h1>
            <p class="md:text-2xl text-xl tracking-wide text-blue-500 uppercase mb-8">
                Discover the Best Free-To-Play Games with Ease!
            </p>
        </div>
    </section>

    <div class="container mx-auto mt-10">
        @if (session('success'))
            <div class="hidden" id="successModal" role="dialog">
                <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
                <div class="fixed inset-0 z-10 flex items-center justify-center">
                    <div class="card rounded-lg overflow-hidden shadow-lg p-6">
                        <h2 class="text-lg font-bold mb-4">Success</h2>
                        <p>{{ session('success') }}</p>
                        <div class="mt-4 flex justify-between">
                            <button onclick="closeModal()" class="bg-red-600 text-white py-2 px-4 rounded">Close</button>
                            <a href="/library" class="bg-red-600 text-white py-2 px-4 rounded">Library</a>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                window.onload = function() {
                    showModal();
                };
            </script>
        @endif

        {{-- SEARCH BAR --}}
        <div class="mb-5 flex gap-6">
            <input type="text" id="search" placeholder="Search games..." oninput="filterGames()" class="border bg-slate-400 border-custom-red text-black rounded p-2 w-1/3" />
            
            {{-- Genre Filter --}}
            <select id="genre" onchange="filterGames()" class="border bg-slate-400 border-custom-red text-black rounded">
                <option value="all" class="text-black">All Genres</option>
                @foreach($genres as $genre)
                    <option value="{{ $genre }}" class="border border-custom-red text-black rounded">{{ $genre }}</option>
                @endforeach
            </select>
            
            {{-- Platforms --}}
            <select id="platform" onchange="filterGames()" class="border bg-slate-400 border-custom-red text-black rounded">
                <option value="all" class="text-black">All Platforms</option>
                <option value="mobile" class="text-black">Mobile</option>
                <option value="pc" class="text-black">PC</option>
                
               
            </select>
        </div>

        {{-- GAME CARDS --}}
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mt-12">
            @foreach($games as $game)
                <div class="card game-card bg-custom-red rounded-lg overflow-hidden" data-genre="{{ $game->genre }}" data-platform="{{ $game->platform }}">
                    @if($game->thumbnail)
                        <img src="{{ $game->thumbnail }}" alt="{{ $game->title }}" class="w-full border-b border-[#d1bdc6]">
                    @else
                        <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                            <span class="text-gray-500">No Image Available</span>
                        </div>
                    @endif
                    <div class="p-6">
                        <h3 class="game-title text-2xl text-white font-semibold text-center uppercase mb-4">{{ $game->title }}</h3>
                        <p class="text-white mb-4">{{ $game->short_description }}</p>
                        <ul class="space-y-2">
                            <li><strong>Genre:</strong> {{ $game->genre }}</li>
                            <li><strong>Release Date:</strong> {{ $game->release_date }}</li>
                            <li><strong>Platform:</strong> {{ ucfirst($game->platform) }}</li>
                        </ul>
                    </div>
                    <div class="m-4">
                        <a href="{{ $game->game_url }}" target="_blank" rel="noopener noreferrer" class="inline-block bg-red-600 text-white px-4 py-2 rounded text-sm hover:bg-red-700 transition duration-300">View Game</a>
                        <button onclick="event.preventDefault(); document.getElementById('add-form-{{ $game->id }}').submit();" class="inline-block bg-red-600 text-white px-4 py-2 rounded text-sm hover:bg-red-700 transition duration-300">Add to Library</button>
                        <form id="add-form-{{ $game->id }}" action="{{ route('library.add') }}" method="POST" style="display: none;">
                            @csrf
                            <input type="hidden" name="game_id" value="{{ $game->id }}">
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</body>
</html>
@include('profile.partials._footer')