<x-layout>
    
    <div class="container mx-auto p-8">
        <h2 class="text-3xl font-bold mb-6">Appointment Details</h2>
        <div class="bg-white p-6 shadow-md rounded">
            <p><strong>Patient Name:</strong> {{ $appointment->patient_name }}</p>
            <p><strong>Topic:</strong> {{ $appointment->title }}</p>
            <p><strong>Date:</strong> {{ $appointment->date }}</p>
            <p><strong>Time:</strong> {{ $appointment->time }}</p>
            <div class="mt-6">
                <a href="{{ route('appointments.index') }}" class="text-blue-600 hover:underline">Back to Appointments</a>
            </div>
        </div>
    </div>

</x-layout>