<a href="{{ route('admin.command-groups.edit', $commandGroup) }}">
    <button class="btn btn-sm btn-warning">
        <i class="os-icon os-icon-pencil-2"></i> @lang('Edit')
    </button>
</a>

<a href="#">
    <button
        class="btn btn-sm btn-danger delete-button"
        data-route="{{ route('admin.command-groups.destroy', $commandGroup) }}"
    >
        <i class="os-icon os-icon-ui-15"></i> @lang('Delete')
    </button>
</a>
