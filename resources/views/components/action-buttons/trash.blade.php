<x-auth.form form-action="{{ isset($route) ? $route : '#' }}">
    @method('DELETE')
    <button type="submit" class="btn btn-danger btn-sm"
        onclick="return confirm('{{ __('language.delete_confirmation') }}')">
        <i class="align-middle fas fa-fw fa-trash"></i>
    </button>
</x-auth.form>