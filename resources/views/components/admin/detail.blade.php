<div>
    <label class="block text-sm font-medium text-gray-500">{{ $label }}</label>
    <p class="text-gray-900 {{ $mono ? 'font-mono' : '' }}">
        {{ $value ?? '—' }}
    </p>
</div>
