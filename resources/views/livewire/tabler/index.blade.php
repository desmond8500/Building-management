<div>
    @component('components.tabler.header', ['title'=> 'Dashboard', 'subtitle'=> 'Dashboard'])

    @endcomponent

    <div class="row g-2">
        @foreach ($cards as $card)
            <a class="col-md-4" href="{{ route("tabler.$card->route") }}">
                <div class="card p-2">
                    <div class="row">
                        <div class="col-auto">
                            <img src="" alt="A" class="avatar avatar-md">
                        </div>
                        <div class="col">
                            <div class="card-title">{{ $card->name }}</div>
                            <div class="text-muted">Description</div>
                        </div>
                        <div class="col-auto">
                            <span class="display-5 fw-bold">{{ $card->count }}</span>
                      </div>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
</div>
