<div>
    <div class="flex flex-col gap-y-4 text-pretty">
        <p>Type into the title field in such a way that validation would fail, such as removing what you typed so that the <code>required</code> rule kicks in. You will notice that the validation message displayed is not that of the custom one provided in <code>NewPost</code>.</p>
        <p>Then, hit Create, and the requested validation message is displayed instead.</p>
        {{ $this->form }}
        <div class="flex justify-between mx-4 md:mx-0 gap-x-2">
            <button type="submit" class="h-10 px-3 bg-blue-300 rounded-lg ring-1 ring-inset" wire:click="create">
                <span>Create</span>
            </button>
        </div>
    </div>
</div>
