@include('layouts.navigation')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library</title>
    @vite(['resources/css/library.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Protest+Guerrilla&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" href="{{ asset('logo-footer.png') }}" type="image/x-icon">
    <script>

        // Function to show the modal and set the form action

        function showModal(gameId) {
            const modal = document.getElementById('confirmationModal');
            const form = document.getElementById('deleteForm');
            form.action = `/library/remove/${gameId}`; // Set the action for the form
            modal.classList.remove('hidden'); // Show the modal
        }

        // Function to close the modal

        function closeModal() {
            const modal = document.getElementById('confirmationModal');
            modal.classList.add('hidden'); // Hide the modal
        }

        // Function to show success notification

        function showNotification(message) {
            const notification = document.getElementById('notification');
            notification.innerText = message;
            notification.classList.remove('hidden');
            setTimeout(() => {
                notification.classList.add('hidden');
            }, 3000); // Hide notification after 3 seconds
        }
    </script>
</head>
<body class="font-poppins bg-black">

    {{-- hero section  --}}

    <section class="hero text-center content-center">
        <div class="container mx-auto px-4">
          <h1 class="md:text-9xl text-8xl tracking-widest uppercase font-protest text-[#D1BDC6] mb-4">library</h1>
          <p class="md:text-2xl text-xl tracking-wide text-blue-500 uppercase mb-8">
            Discover the Best Free-To-Play Games with Ease!
          </p>
          
          
          @if (session('success'))
          <div id="notification" class="bg-green-200 text-green-800 p-4 rounded mb-4 hidden card">
              {{ session('success') }}
            </div>
            @endif
            
            
        </div>
    </div>
</section>

            {{-- card saying the linrary is empty  --}}

        @if ($games->isEmpty())
        <div class="block mx-auto my-40 max-w-sm p-6 card rounded-lg shadow">
        <p class="mb-2 text-2xl font-bold tracking-tight text-center text-[#D1BDC6]">No games added.</p>
    </div> 
        @else
<div class="container mx-auto my-10">

    {{-- TITLE  --}}
    
    <h2 class="text-4xl font-bold text-center mb-4">YOUR GAMES</h2>
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mt-12">

            {{-- game cards  --}}

            @foreach ($games as $libraryGame)
                <div class="card bg-custom-red rounded-lg overflow-hidden">
                    @if($libraryGame->game->thumbnail)
                        <img src="{{ $libraryGame->game->thumbnail }}" alt="{{ $libraryGame->game->title }}" class="w-full border-b border-[#d1bdc6]">
                    @else
                        <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                            <span class="text-gray-500">No Image Available</span>
                        </div>
                    @endif
                    <div class="p-6">

                        {{-- about the game  --}}

                        <h3 class="text-2xl text-white font-semibold text-center uppercase mb-4">{{ $libraryGame->game->title }}</h3>
                        <p class="text-white mb-4">{{ $libraryGame->game->short_description }}</p>
                        <ul>
                        <li class="mt-2"><strong>Genre:</strong> {{ $libraryGame->game->genre }}</li>
                        <li class="mt-2"><strong>Release Date:</strong> {{ $libraryGame->game->release_date }}</li>
                    </ul>
                    <div class="m-4">

                        {{-- game link  --}}

                    <a href="{{ $libraryGame->game_url }}" target="_blank" rel="noopener noreferrer" class="inline-block bg-red-600 text-white px-4 py-2 rounded text-sm hover:bg-red-700 transition duration-300">
                        View Game
                    </a>

                    {{-- removing the game button  --}}

                        <button onclick="showModal({{ $libraryGame->game_id }})" class="inline-block bg-red-600 text-white px-4 py-2 rounded text-sm hover:bg-red-700 transition duration-300">Remove</button>
                    </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>

<!-- confirming to remove the game modal -->

<div id="confirmationModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
    <div class="card rounded-lg overflow-hidden shadow-lg p-6">

        {{-- header  --}}

        <h2 class="text-lg font-bold mb-4">Confirm Deletion</h2>
        <p>Remove from library?</p>

        {{-- successfully removed the game  --}}

        <form id="deleteForm" action="" method="POST" class="mt-4" onsubmit="showNotification('Game removed from your library!')">
            @csrf
            @method('DELETE')
            <div class="space-x-4">

                {{-- cancel button  --}}

                <button type="button" onclick="closeModal()" class="bg-gray-300 text-black py-2 px-4 rounded">Cancel</button>
                
                {{-- deletion button  --}}

                <button type="submit" class="bg-red-600 text-white py-2 px-4 rounded">Confirm</button>
            </div>
        </form>
    </div>
</div>

</body>
</html>
@include('profile.partials._footer')