<x-alert alertType="primary">
    Assigned to: {{ $user ? ($user['name'] . ' (' . $user['email'] . ')') : 'No user assigned.' }} 
</x-alert>