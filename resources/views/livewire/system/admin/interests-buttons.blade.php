<div>
    @if ($interestMonth && !$interestMonth->processed)
        @can('admin.interests.generate')
            <a href="{{ route('admin.interests.generate', $interestMonth) }}" class="btn btn-primary">
                {{ __('messages.Generate Interests') }}
            </a>
        @endcan
    @endif

    @if ($interestMonth && $interestMonth->processed && !$interestMonth->approved)
        @can('admin.interests.approve')
            <a href="{{ route('admin.interests.approve', $interestMonth) }}" class="btn btn-success">
                {{ __('messages.Approve Interests') }}
            </a>
        @endcan
    @endif
</div>
