<div x-data="{ sameAsPermanent: false, formData: @entangle('formData').live, sync() { if(this.sameAsPermanent) { this.formData.cur_district_id = this.formData.district_id; this.formData.cur_rural_urban = this.formData.rural_urban; this.formData.cur_blockurban = this.formData.blockurban; this.formData.cur_gpward = this.formData.gpward; this.formData.cur_state = this.formData.state; this.formData.cur_policestation = this.formData.policestation; this.formData.cur_pincode = this.formData.pincode; this.formData.cur_housepremiseno = this.formData.housepremiseno; this.formData.cur_postoffice = this.formData.postoffice; this.formData.cur_villtowncity = this.formData.villtowncity; this.formData.cur_test = this.formData.test; this.$nextTick(() => { setTimeout(() => { document.querySelectorAll('[name^=\'cur_\']').forEach(el => delete el.dataset.loaded); if(typeof window.initMasterData === 'function') window.initMasterData(); }, 100); });  } } }" x-init="$watch('sameAsPermanent', v => sync()); $watch('formData.district_id', v => { if(sameAsPermanent) sync(); }); $watch('formData.rural_urban', v => { if(sameAsPermanent) sync(); }); $watch('formData.blockurban', v => { if(sameAsPermanent) sync(); }); $watch('formData.gpward', v => { if(sameAsPermanent) sync(); }); $watch('formData.state', v => { if(sameAsPermanent) sync(); }); $watch('formData.policestation', v => { if(sameAsPermanent) sync(); }); $watch('formData.pincode', v => { if(sameAsPermanent) sync(); }); $watch('formData.housepremiseno', v => { if(sameAsPermanent) sync(); }); $watch('formData.postoffice', v => { if(sameAsPermanent) sync(); }); $watch('formData.villtowncity', v => { if(sameAsPermanent) sync(); }); $watch('formData.test', v => { if(sameAsPermanent) sync(); }); ">
<div class="grid md:grid-cols-2 gap-4 mt-4">
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
</div><div    wire:key="field-norm-gpward">
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
</div><div    wire:key="field-norm-pincode">
    <x-form.input
    type="text"
    name="pincode"
    label="Pin Code"
    placeholder="Enter Pin Code"
    
    
    required
    
    
    
    wire:model.blur="formData.pincode"
    x-on:input.stop="$el.value = $el.value.replace(/[^0-9]/g, '').slice(0, 6); $wire.set('formData.pincode', $el.value, false)"
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
</div><div    wire:key="field-norm-villtowncity">
    <x-form.input
    type="text"
    name="villtowncity"
    label="Village / Town / City"
    placeholder="Enter Village / Town / City"
    
    
    required
    
    
    
    wire:model.live="formData.villtowncity"
    x-on:input.stop="$el.value = $el.value.replace(/[^A-Za-z .]/g, ''); $wire.set('formData.villtowncity', $el.value, false)"
/>
</div><div    wire:key="field-norm-test">
    <x-form.input
    type="text"
    name="test"
    label="test"
    placeholder="Enter test"
    
    
    
    
    
    
    wire:model.live="formData.test"
    
/>
</div></div>
<div class="mt-8 mb-4 p-4 bg-gray-50 border-y border-gray-200">
    <h3 class="text-lg font-bold text-gray-800 mb-2">Current Address</h3>
    <label class="flex items-center gap-2 cursor-pointer">
        <input type="checkbox" x-model="sameAsPermanent" class="w-4 h-4 text-indigo-600 rounded">
        <span class="text-sm font-medium text-gray-700">Same as Permanent Address</span>
    </label>
</div><div class="grid md:grid-cols-2 gap-4 mt-4">
<div    wire:key="field-norm-cur_district_id">
    <x-form.select
    name="cur_district_id"
    label="Current District"
    data-wire="cur_district_id"
    wire:ignore
    ::readonly="sameAsPermanent" ::disabled="sameAsPermanent"
    required
    
    wire:model.live="formData.cur_district_id"
>
    <option value="">-- Select Current District --</option>
    
</x-form.select>
</div><div    wire:key="field-norm-cur_rural_urban">
    <x-form.select
    name="cur_rural_urban"
    label="Current Rural/Urbar"
    data-wire="cur_rural_urban"
    wire:ignore
    ::readonly="sameAsPermanent" ::disabled="sameAsPermanent"
    required
    
    wire:model.live="formData.cur_rural_urban"
>
    <option value="">-- Select Current Rural/Urbar --</option>
    
</x-form.select>
</div><div    wire:key="field-norm-cur_blockurban">
    <x-form.select
    name="cur_blockurban"
    label="Current Block/Municipality"
    data-wire="cur_blockurban"
    wire:ignore
    ::readonly="sameAsPermanent" ::disabled="sameAsPermanent"
    required
    
    wire:model.live="formData.cur_blockurban"
>
    <option value="">-- Select Current Block/Municipality --</option>
    
</x-form.select>
</div><div    wire:key="field-norm-cur_gpward">
    <x-form.select
    name="cur_gpward"
    label="Current GP / Ward"
    data-wire="cur_gpward"
    wire:ignore
    ::readonly="sameAsPermanent" ::disabled="sameAsPermanent"
    required
    
    wire:model.live="formData.cur_gpward"
>
    <option value="">-- Select Current GP / Ward --</option>
    
</x-form.select>
</div><div    wire:key="field-norm-cur_state">
    <x-form.select
    name="cur_state"
    label="Current State"
    data-wire="cur_state"
    
    ::readonly="sameAsPermanent" ::disabled="sameAsPermanent"
    required
    
    wire:model.live="formData.cur_state"
>
    <option value="">-- Select Current State --</option>
    <option value="19">West Bengal</option>

</x-form.select>
</div><div    wire:key="field-norm-cur_policestation">
    <x-form.input
    type="text"
    name="cur_policestation"
    label="Current Police Station"
    placeholder="Enter Current Police Station"
    
    ::readonly="sameAsPermanent" ::disabled="sameAsPermanent"
    required
    
    
    
    wire:model.live="formData.cur_policestation"
    x-on:input.stop="$el.value = $el.value.replace(/[^A-Za-z .]/g, ''); $wire.set('formData.cur_policestation', $el.value, false)"
/>
</div><div    wire:key="field-norm-cur_pincode">
    <x-form.input
    type="text"
    name="cur_pincode"
    label="Current Pin Code"
    placeholder="Enter Current Pin Code"
    
    ::readonly="sameAsPermanent" ::disabled="sameAsPermanent"
    required
    
    
    
    wire:model.blur="formData.cur_pincode"
    x-on:input.stop="$el.value = $el.value.replace(/[^0-9]/g, '').slice(0, 6); $wire.set('formData.cur_pincode', $el.value, false)"
/>
</div><div    wire:key="field-norm-cur_housepremiseno">
    <x-form.input
    type="text"
    name="cur_housepremiseno"
    label="Current House / Premise No"
    placeholder="Enter Current House / Premise No"
    
    ::readonly="sameAsPermanent" ::disabled="sameAsPermanent"
    
    
    
    
    wire:model.live="formData.cur_housepremiseno"
    
/>
</div><div    wire:key="field-norm-cur_postoffice">
    <x-form.input
    type="text"
    name="cur_postoffice"
    label="Current Post Office"
    placeholder="Enter Current Post Office"
    
    ::readonly="sameAsPermanent" ::disabled="sameAsPermanent"
    required
    
    
    
    wire:model.live="formData.cur_postoffice"
    x-on:input.stop="$el.value = $el.value.replace(/[^A-Za-z .]/g, ''); $wire.set('formData.cur_postoffice', $el.value, false)"
/>
</div><div    wire:key="field-norm-cur_villtowncity">
    <x-form.input
    type="text"
    name="cur_villtowncity"
    label="Current Village / Town / City"
    placeholder="Enter Current Village / Town / City"
    
    ::readonly="sameAsPermanent" ::disabled="sameAsPermanent"
    required
    
    
    
    wire:model.live="formData.cur_villtowncity"
    x-on:input.stop="$el.value = $el.value.replace(/[^A-Za-z .]/g, ''); $wire.set('formData.cur_villtowncity', $el.value, false)"
/>
</div><div    wire:key="field-norm-cur_test">
    <x-form.input
    type="text"
    name="cur_test"
    label="Current test"
    placeholder="Enter Current test"
    
    ::readonly="sameAsPermanent" ::disabled="sameAsPermanent"
    
    
    
    
    wire:model.live="formData.cur_test"
    
/>
</div></div>
</div>
