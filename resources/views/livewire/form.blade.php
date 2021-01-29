<div>
    <div class="form-group">
        <label for="title">Título</label>
        <input id="title" class="form-control" type="text" name="title" wire:model='title'>
        @error('title')
            <span>{{ $message }}</span>
        @enderror
    </div>
</div>


<div class="form-group">
    <label for="body">Contenido</label>
    <textarea id="body" class="form-control" name="body" rows="2" wire:model='body'></textarea>
    @error('body')
        <span>{{ $message }}</span>
    @enderror
</div>
