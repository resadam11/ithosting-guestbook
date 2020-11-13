<ul class="list-group w-100">
    @forelse($GuestbookMessages as $GuestbookMessage)
        <li class="list-group-item w-100 mb-2">
            <h4>{{ $GuestbookMessage->name }}</h4>
            <p>{{ $GuestbookMessage->message }}</p>
            <span>{{ $GuestbookMessage->created_at }}</span>
        </li>
    @empty
        <li class="list-group-item">Nincs üzenet</li>
    @endforelse
</ul>