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
        @can('admin.interests.rollback')
            <a href="{{ route('admin.interests.rollback') }}" class="btn btn-danger ml-2">
                {{ __('messages.Rollback Interests') }}
            </a>
        @endcan
    @endif

    @if ($interestMonth && $interestMonth->processed && $interestMonth->approved)
        @can('admin.interests.pay')
            <a href="{{ route('admin.interests.payall') }}" class="btn btn-info">
                {{ __('messages.Mark all as paid') }}
            </a>
        @endcan
    @endif
</div>
