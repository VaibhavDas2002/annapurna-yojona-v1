<div x-data="{ sameAsPermanent: false, formData: @entangle('formData').live, sync() { if(this.sameAsPermanent) { this.$nextTick(() => { setTimeout(() => { document.querySelectorAll('[name^=\'cur_\']').forEach(el => delete el.dataset.loaded); if(typeof window.initMasterData === 'function') window.initMasterData(); }, 100); });  } } }" x-init="$watch('sameAsPermanent', v => sync()); ">
<div class="grid md:grid-cols-2 gap-4 mt-4">
<div    wire:key="field-norm-application_type">
    <div wire:key="field-norm-application_type">
    <x-form.select
        name="application_type"
        label="Application Type"
        data-wire="application_type"
        required
        wire:model.live="formData.application_type"
        :disabled="$isEdit"
    >
        <option value="">-- Select Application Type --</option>

        @foreach($appTypeOptions as $value => $label)
            <option value="{{ $value }}">{{ $label }}</option>
        @endforeach

    </x-form.select>
</div>
</div><div    wire:key="field-norm-beneficiary_name">
    <x-form.input
    type="text"
    name="beneficiary_name"
    label="Applicant Name"
    placeholder="Enter Applicant Name"
    
    
    required
    
    
    
    wire:model.live="formData.beneficiary_name"
    x-on:input.stop="$el.value = $el.value.replace(/[^A-Za-z .]/g, ''); $wire.set('formData.beneficiary_name', $el.value, false)"
/>
</div><div    wire:key="field-norm-mobile_no">
    <x-form.input
    type="text"
    name="mobile_no"
    label="Mobile Number"
    placeholder="Enter Mobile Number"
    
    
    required
    
    
    
    wire:model.blur="formData.mobile_no"
    x-on:input.stop="$el.value = $el.value.replace(/[^0-9]/g, '').slice(0, 10); $wire.set('formData.mobile_no', $el.value, false)"
/>
</div></div>
</div>
