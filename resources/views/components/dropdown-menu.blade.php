<div x-data="{ open: false }" @click.outside="open = false" @close.stop="open = false">
    <div @click="open = ! open">
        {{ $trigger }}
    </div>

    <div x-show="open" style="display: none;" @click="open = false">
        <div>
            {{ $content }}
        </div>
    </div>
</div>
