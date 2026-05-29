<div class="grid md:grid-cols-2 gap-4 mt-4">
<div    wire:key="field-norm-application_date">
    <x-form.input
    type="date"
    name="application_date"
    label="Application Date"
    placeholder="Enter Application Date"
    
    
    required
    :min="$minDate"
    :max="$maxDate"
    wire:model.live="formData.application_date"
    
/>
</div><div    wire:key="field-norm-application_type">
    <div wire:key="field-norm-application_type">
    <x-form.select
        name="application_type"
        label="Application Type"
        data-wire="application_type"
        required
        wire:model.live="formData.application_type"
    >
        <option value="">-- Select Application Type --</option>

        @foreach($appTypeOptions as $value => $label)
            <option value="{{ $value }}">{{ $label }}</option>
        @endforeach

    </x-form.select>
</div>
</div></div>
<div class="grid md:grid-cols-2 gap-4 mt-4">
<div x-data="{
    formData: @entangle('formData').live,
    get isVisible() {
        if (!this.formData) return false;
        return ['2'].includes(String(this.formData.application_type));
    },
    sync() {
        if (!this.isVisible && this.formData.hasOwnProperty('ds_date')) {
            this.formData.ds_date = null;
        }
    },
    init() {
        this.sync();
        this.$watch('formData.application_type', () => this.sync());
    }
}" x-show="isVisible" x-cloak wire:key="field-dep-ds_date">
    <x-form.input
    type="date"
    name="ds_date"
    label="Duare Sarkar Date"
    placeholder="Enter Duare Sarkar Date"
    
    
    
    :min="$minDate"
    :max="$maxDate"
    wire:model.live="formData.ds_date"
    
/>
</div><div x-data="{
    formData: @entangle('formData').live,
    get isVisible() {
        if (!this.formData) return false;
        return ['2'].includes(String(this.formData.application_type));
    },
    sync() {
        if (!this.isVisible && this.formData.hasOwnProperty('ds_registration_no')) {
            this.formData.ds_registration_no = null;
        }
    },
    init() {
        this.sync();
        this.$watch('formData.application_type', () => this.sync());
    }
}" x-show="isVisible" x-cloak wire:key="field-dep-ds_registration_no">
    <x-form.input
    type="text"
    name="ds_registration_no"
    label="Duare Sarkar Registration Number"
    placeholder="Enter Duare Sarkar Registration Number"
    
    
    
    
    
    wire:model.live="formData.ds_registration_no"
    
/>
</div></div>
<div class="grid md:grid-cols-3 gap-4 mt-4">
<div    wire:key="field-norm-beneficiary_name">
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
</div><div    wire:key="field-norm-dob">
    <x-form.input
    type="date"
    name="dob"
    label="Date of Birth"
    placeholder="Enter Date of Birth"
    
    
    required
    :min="$minDOB"
    :max="$maxDOB"
    wire:model.live="formData.dob"
    
/>
</div></div>
<div class="grid md:grid-cols-3 gap-4 mt-4">
<div    wire:key="field-norm-age">
    <x-form.input
    type="text"
    name="age"
    label="Age"
    placeholder="Enter Age"
    
    readonly
    required
    
    
    wire:model.live="formData.age"
    
/>
</div><div    wire:key="field-norm-email">
    <x-form.input
    type="text"
    name="email"
    label="Email Address"
    placeholder="Enter Email Address"
    
    
    
    
    
    wire:model.live="formData.email"
    
/>
</div><div    wire:key="field-norm-ben_father_name">
    <x-form.input
    type="text"
    name="ben_father_name"
    label="Father's Name"
    placeholder="Enter Father's Name"
    
    
    required
    
    
    wire:model.live="formData.ben_father_name"
    x-on:input.stop="$el.value = $el.value.replace(/[^A-Za-z .]/g, ''); $wire.set('formData.ben_father_name', $el.value, false)"
/>
</div></div>
<div class="grid md:grid-cols-3 gap-4 mt-4">
<div    wire:key="field-norm-ben_mother_name">
    <x-form.input
    type="text"
    name="ben_mother_name"
    label="Mother's Name"
    placeholder="Enter Mother's Name"
    
    
    required
    
    
    wire:model.live="formData.ben_mother_name"
    x-on:input.stop="$el.value = $el.value.replace(/[^A-Za-z .]/g, ''); $wire.set('formData.ben_mother_name', $el.value, false)"
/>
</div><div    wire:key="field-norm-mar_statu">
    <x-form.select
    name="mar_statu"
    label="Marital Status"
    data-wire="mar_statu"
    
    
    required
    wire:model.live="formData.mar_statu"
>
    <option value="">-- Select Marital Status --</option>
    <option value="1">Un Married</option>
<option value="2">Married</option>
<option value="3">Widow</option>
<option value="4">Divorcee</option>
<option value="5">Widower</option>

</x-form.select>
</div><div x-data="{
    formData: @entangle('formData').live,
    get isVisible() {
        if (!this.formData) return false;
        return ['2','3','5'].includes(String(this.formData.mar_statu));
    },
    sync() {
        if (!this.isVisible && this.formData.hasOwnProperty('ben_spouse_name')) {
            this.formData.ben_spouse_name = null;
        }
    },
    init() {
        this.sync();
        this.$watch('formData.mar_statu', () => this.sync());
    }
}" x-show="isVisible" x-cloak wire:key="field-dep-ben_spouse_name">
    <x-form.input
    type="text"
    name="ben_spouse_name"
    label="Spouse's Name"
    placeholder="Enter Spouse's Name"
    
    
    
    
    
    wire:model.live="formData.ben_spouse_name"
    x-on:input.stop="$el.value = $el.value.replace(/[^A-Za-z .]/g, ''); $wire.set('formData.ben_spouse_name', $el.value, false)"
/>
</div></div>
<div class="grid md:grid-cols-2 gap-4 mt-4">
<div    wire:key="field-norm-caste">
    <x-form.select
    name="caste"
    label="Caste"
    data-wire="caste"
    
    
    required
    wire:model.live="formData.caste"
>
    <option value="">-- Select Caste --</option>
    <option value="1">SC</option>
<option value="2">ST</option>
<option value="3">OBC</option>
<option value="4">General</option>

</x-form.select>
</div><div x-data="{
    formData: @entangle('formData').live,
    get isVisible() {
        if (!this.formData) return false;
        return ['1','2','3'].includes(String(this.formData.caste));
    },
    sync() {
        if (!this.isVisible && this.formData.hasOwnProperty('caste_cer_no')) {
            this.formData.caste_cer_no = null;
        }
    },
    init() {
        this.sync();
        this.$watch('formData.caste', () => this.sync());
    }
}" x-show="isVisible" x-cloak wire:key="field-dep-caste_cer_no">
    <x-form.input
    type="text"
    name="caste_cer_no"
    label="Caste Certificate Number"
    placeholder="Enter Caste Certificate Number"
    
    
    
    
    
    wire:model.live="formData.caste_cer_no"
    
/>
</div></div>
