<x-layout>

    @if ($errors->any())
    @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
        
    @endif
    
    <div class="container mx-auto p-8">
        <h2 class="text-3xl font-bold mb-6">Schedule a New Appointment</h2>
        <form action="{{ route('appointments.store') }}" method="POST" class="bg-white p-6 shadow-md rounded">
            @csrf
            <div class="mb-4">
                <label for="patient_name" class="block text-sm font-medium text-gray-700">Patient Name</label>
                <input type="text" name="patient_name" id="patient_name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
            </div>

            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                <input type="text" name="title" id="title" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
            </div>


            <div class="mb-4">
                <label for="date" class="block text-sm font-medium text-gray-700">Date</label>
                <input type="date" name="date" id="date" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
            </div>

            <div class="mb-4">
                <label for="time" class="block text-sm font-medium text-gray-700">Time</label>
                <input type="time" name="time" id="time" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
            </div>

            <div class="mt-6">
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-500">Schedule</button>
                <a href="{{ route('appointments.index') }}" class="text-gray-600 ml-4">Cancel</a>
            </div>
        </form>
    </div>


</x-layout>