<x-layout>

    <div class="min-h-screen flex items-center justify-center">
        <div class="text-center">
            <h1 class="text-4xl font-bold text-blue-700">Doctor's Appointment System</h1>
            <div class="mt-8">
                <a href="{{ route('appointments.index') }}" class="text-white bg-blue-600 px-4 py-2 rounded hover:bg-blue-500">View Appointments</a>
                <a href="{{ route('appointments.create') }}" class="text-white bg-green-600 px-4 py-2 rounded hover:bg-green-500">Schedule Appointment</a>
            </div>
        </div>
    </div>

</x-layout>