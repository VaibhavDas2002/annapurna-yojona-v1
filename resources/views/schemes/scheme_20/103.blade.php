<div x-data="{ sameAsPermanent: false, formData: @entangle('formData').live, sync() { if(this.sameAsPermanent) { this.$nextTick(() => { setTimeout(() => { document.querySelectorAll('[name^=\'cur_\']').forEach(el => delete el.dataset.loaded); if(typeof window.initMasterData === 'function') window.initMasterData(); }, 100); });  } } }" x-init="$watch('sameAsPermanent', v => sync()); ">
<div class="grid md:grid-cols-2 gap-4 mt-4">
<div    wire:key="field-norm-ifscode">
    <x-form.input
    type="text"
    name="ifscode"
    label="IFSC Code"
    placeholder="Enter IFSC Code"
    
    
    required
    
    
    
    wire:model.live="formData.ifscode"
    x-on:input.stop="$el.value = $el.value.toUpperCase().replace(/[^A-Z0-9]/g, '').slice(0, 11); $wire.set('formData.ifscode', $el.value, false)"
/>
</div><div    wire:key="field-norm-bankname">
    <x-form.input
    type="text"
    name="bankname"
    label="Bank Name"
    placeholder="Enter Bank Name"
    
    readonly
    required
    
    
    
    wire:model.live="formData.bankname"
    
/>
</div><div    wire:key="field-norm-bank_branch_name">
    <x-form.input
    type="text"
    name="bank_branch_name"
    label="Bank Branch Name"
    placeholder="Enter Bank Branch Name"
    
    readonly
    required
    
    
    
    wire:model.live="formData.bank_branch_name"
    
/>
</div><div    wire:key="field-norm-bankaccountnumber">
    <x-form.input
    type="text"
    name="bankaccountnumber"
    label="Bank Account Number"
    placeholder="Enter Bank Account Number"
    
    
    required
    
    
    
    wire:model.live="formData.bankaccountnumber"
    x-on:input.stop="$el.value = $el.value.replace(/[^0-9]/g, ''); $wire.set('formData.bankaccountnumber', $el.value, false)"
/>
</div><div    wire:key="field-norm-confirmbankaccountnumber">
    <x-form.input
    type="password"
    name="confirmbankaccountnumber"
    label="Confirm Bank Account Number"
    placeholder="Enter Confirm Bank Account Number"
    
    
    required
    
    
    
    wire:model.live="formData.confirmbankaccountnumber"
    x-on:input.stop="$el.value = $el.value.replace(/[^0-9]/g, ''); $wire.set('formData.confirmbankaccountnumber', $el.value, false)"
/>
</div></div>
</div>
