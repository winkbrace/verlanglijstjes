<div class="flex items-center mb-1">
    {{-- This is an svg that looks like a checkbox, but there is no checkbox here --}}
    <div class="bg-white border-2 rounded-md border-amber-400 w-5 h-5 flex flex-shrink-0 justify-center items-center focus-within:border-amber-500 md:mr-2">
        {{-- the "checkbox" outline --}}
        <svg class="fill-current hidden w-3 h-3 text-amber-600 pointer-events-none" viewBox="0 0 17 12"></svg>
        {{-- the claim check mark --}}
        <svg class="{{ user()->id->equals($claimedBy) ? '' : 'hidden' }} my-claim fill-current text-green-500" viewBox="0 0 16 16">
            <path d="M13.485 1.431a1.473 1.473 0 0 1 2.104 2.062l-7.84 9.801a1.473 1.473 0 0 1-2.12.04L.431 8.138a1.473 1.473 0 0 1 2.084-2.083l4.111 4.112 6.82-8.69a.486.486 0 0 1 .04-.045z"/>
        </svg>
        {{-- the reserved cross --}}
        <svg class="{{ $claimedBy !== null && ! user()->id->equals($claimedBy) ? '' : 'hidden' }} claimed fill-current text-red-500" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M11.293 3.293a1 1 0 1 1 1.414 1.414L9.414 8l3.293 3.293a1 1 0 0 1-1.414 1.414L8 9.414l-3.293 3.293a1 1 0 0 1-1.414-1.414L6.586 8 3.293 4.707a1 1 0 0 1 1.414-1.414L8 6.586l3.293-3.293Z"/>
        </svg>
    </div>
</div>
