<div class="grid md:grid-cols-3 gap-4 mt-4">
<div    wire:key="field-norm-district_id">
    <x-form.select
    name="district_id"
    label="District"
    data-wire="district_id"
    wire:ignore
    
    required
    wire:model.live="formData.district_id"
>
    <option value="">-- Select District --</option>
    
</x-form.select>
</div><div    wire:key="field-norm-rural_urban">
    <x-form.select
    name="rural_urban"
    label="Rural/Urbar"
    data-wire="rural_urban"
    wire:ignore
    
    required
    wire:model.live="formData.rural_urban"
>
    <option value="">-- Select Rural/Urbar --</option>
    
</x-form.select>
</div><div    wire:key="field-norm-blockurban">
    <x-form.select
    name="blockurban"
    label="Block/Municipality"
    data-wire="blockurban"
    wire:ignore
    
    required
    wire:model.live="formData.blockurban"
>
    <option value="">-- Select Block/Municipality --</option>
    
</x-form.select>
</div></div>
<div class="grid md:grid-cols-3 gap-4 mt-4">
<div    wire:key="field-norm-gpward">
    <x-form.select
    name="gpward"
    label="GP / Ward"
    data-wire="gpward"
    wire:ignore
    
    required
    wire:model.live="formData.gpward"
>
    <option value="">-- Select GP / Ward --</option>
    
</x-form.select>
</div><div    wire:key="field-norm-state">
    <x-form.select
    name="state"
    label="State"
    data-wire="state"
    
    
    required
    wire:model.live="formData.state"
>
    <option value="">-- Select State --</option>
    <option value="19">West Bengal</option>

</x-form.select>
</div><div    wire:key="field-norm-policestation">
    <x-form.input
    type="text"
    name="policestation"
    label="Police Station"
    placeholder="Enter Police Station"
    
    
    required
    
    
    wire:model.live="formData.policestation"
    x-on:input.stop="$el.value = $el.value.replace(/[^A-Za-z .]/g, ''); $wire.set('formData.policestation', $el.value, false)"
/>
</div></div>
<div class="grid md:grid-cols-3 gap-4 mt-4">
<div    wire:key="field-norm-villtowncity">
    <x-form.input
    type="text"
    name="villtowncity"
    label="Village / Town / City"
    placeholder="Enter Village / Town / City"
    
    
    required
    
    
    wire:model.live="formData.villtowncity"
    x-on:input.stop="$el.value = $el.value.replace(/[^A-Za-z .]/g, ''); $wire.set('formData.villtowncity', $el.value, false)"
/>
</div><div    wire:key="field-norm-housepremiseno">
    <x-form.input
    type="text"
    name="housepremiseno"
    label="House / Premise No"
    placeholder="Enter House / Premise No"
    
    
    
    
    
    wire:model.live="formData.housepremiseno"
    
/>
</div><div    wire:key="field-norm-postoffice">
    <x-form.input
    type="text"
    name="postoffice"
    label="Post Office"
    placeholder="Enter Post Office"
    
    
    required
    
    
    wire:model.live="formData.postoffice"
    x-on:input.stop="$el.value = $el.value.replace(/[^A-Za-z .]/g, ''); $wire.set('formData.postoffice', $el.value, false)"
/>
</div></div>
<div class="grid md:grid-cols-3 gap-4 mt-4">
<div    wire:key="field-norm-pincode">
    <x-form.input
    type="text"
    name="pincode"
    label="Pin Code"
    placeholder="Enter Pin Code"
    
    
    required
    
    
    wire:model.blur="formData.pincode"
    x-on:input.stop="$el.value = $el.value.replace(/[^0-9]/g, '').slice(0, 6); $wire.set('formData.pincode', $el.value, false)"
/>
</div></div>
