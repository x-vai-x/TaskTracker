<x-alert alertType="info">
    Assigned to: {{ $user ? ($user['name'] . ' (' . $user['email'] . ')') : 'No user assigned.' }} 
</x-alert>